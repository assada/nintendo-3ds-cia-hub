<?php
declare(strict_types = 1);

namespace App\Model;

use Carbon\Carbon;

/**
 * Class GameMetadata
 *
 * @package App\Model
 */
final class GameMetadata
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $image;

    /**
     * @var string
     */
    private $region;

    /**
     * @var string
     */
    private $eshop;

    /**
     * @var int
     */
    private $size;

    /**
     * @var Carbon
     */
    private $uploaded;

    /**
     * GameMetadata constructor.
     * @param string $name
     * @param string $region
     * @param string $image
     * @param string $eshop
     * @param int $size
     * @param int $uploaded
     */
    public function __construct(string $name, string $region, string $image, string $eshop, int $size, int $uploaded)
    {
        $this->name = $name;
        $this->region = $region;
        $this->image = $image;
        $this->eshop = $eshop;
        $this->size = $size;
        $this->uploaded = $uploaded;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getEshop(): string
    {
        return $this->eshop;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getFormattedSize(): string
    {
        return $this->formatBytes($this->size);
    }

    /**
     * @param string $format
     * @return String
     */
    public function getFormattedUploaded(string $format = 'd.m.y'): String
    {
        return Carbon::createFromTimestamp($this->uploaded)->format($format);
    }

    /**
     * @return Carbon
     */
    public function getUploaded(): Carbon
    {
        return $this->uploaded;
    }

    /**
     * @param int $size
     * @param int $precision
     * @return string
     */
    private function formatBytes(int $size, $precision = 2): string
    {
        if ($size > 0) {
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(1024 ** ($base - floor($base)), $precision) . $suffixes[floor($base)];
        }

        return (string)$size;
    }
}
