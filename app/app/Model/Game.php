<?php
declare(strict_types = 1);

namespace App\Model;

/**
 * Class Game
 *
 * @package App\Model
 */
final class Game
{
    /**
     * @var GameMetadata
     */
    private $metadata;

    /**
     * @var string
     */
    private $link;

    /**
     * Game constructor.
     *
     * @param GameMetadata $metadata
     * @param string $link
     */
    public function __construct(GameMetadata $metadata, string $link)
    {
        $this->metadata = $metadata;
        $this->link = $link;
    }

    public function getMetadata(): GameMetadata
    {
        return $this->metadata;
    }

    public function getLink(): string
    {
        return $this->link;
    }
}
