<?php
declare(strict_types = 1);

namespace App\Model;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

/**
 * Class GameMetadataFactory
 *
 * @package App\Model
 */
class GameMetadataFactory
{
    /**
     * @param string $metadataFile
     * @param string|null $gameFile
     *
     * @return GameMetadata|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function get(string $metadataFile, ?string $gameFile): ?GameMetadata
    {
        $metadata = $this->readMetadata($metadataFile);

        if(null !== $metadata) {
            return new GameMetadata(
                Arr::get($metadata, 'name', 'Unknown'),
                Arr::get($metadata, 'region', 'Unknown'),
                Arr::get($metadata, 'image', ''),
                Arr::get($metadata, 'eshop', ''),
                $this->getFileSize($gameFile),
                Arr::get($metadata, 'uploaded', 0)
            );
        }

        return null;
    }

    /**
     * @param string $file
     * @return int
     */
    private function getUploaded(string $file): int
    {
        if(!Storage::disk('public')->exists($file)) {
            throw new FileNotFoundException($file);
        }

        return Storage::disk('public')->lastModified($file);
    }

    /**
     * @param string|null $file
     * @return int
     */
    private function getFileSize(?string $file): int
    {
        if(null === $file || !Storage::disk('public')->exists($file)) {
            return 0;
        }

        return Storage::disk('public')->size($file);
    }

    /**
     * @param string $file
     * @return array|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function readMetadata(string $file): ?array
    {
        if(!Storage::disk('public')->exists($file)) {
            throw new FileNotFoundException($file);
        }

        if(Str::endsWith($file,'.json') && Storage::disk('public')->exists($file)) {
            $result = json_decode(Storage::disk('public')->get($file), true);
            $result['uploaded'] = $this->getUploaded($file);

            return $result;
        }

        return null;
    }
}
