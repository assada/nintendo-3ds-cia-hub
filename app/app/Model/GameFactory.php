<?php
declare(strict_types = 1);

namespace App\Model;

use Illuminate\Support\Arr;
use \RuntimeException;
use Illuminate\Support\Facades\Storage;

/**
 * Class GameFactory
 *
 * @package App\Model
 */
class GameFactory
{
    /**
     * @var GameMetadataFactory
     */
    private $gameMetadataFactory;

    /**
     * GameFactory constructor.
     * @param GameMetadataFactory $gameMetadataFactory
     */
    public function __construct(GameMetadataFactory $gameMetadataFactory)
    {
        $this->gameMetadataFactory = $gameMetadataFactory;
    }

    /**
     * @param string $gameDir
     * @return Game|null
     * @throws RuntimeException
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function get(string $gameDir): ?Game
    {
        $map = array_reduce(Storage::disk('public')->allFiles($gameDir), static function($result, $x) {
            $result[substr($x, strpos($x, '.') + 1)] = $x;

            return $result;
        });

        $metadataFile = Arr::get($map, 'json');
        $gameFile = Arr::get($map, 'cia');

        if(null === $metadataFile) {
            return null;
        }

        return new Game($this->gameMetadataFactory->get($metadataFile, $gameFile), Storage::url($gameFile));
    }
}
