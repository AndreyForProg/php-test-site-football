<?php
namespace App\Entity;

/**
 * Class Player
 * @package App\Entity
 */
class Player
{
    private const PLAY_PLAY_STATUS = 'play';
    private const BENCH_PLAY_STATUS = 'bench';

    /**
     * @var int
     */
    private int $number;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $position;

    /**
     * @var string
     */
    private string $goals;

    /**
     * @var string
     */
    private string $yellowCards;

    /**
     * @var string
     */
    private string $playStatus;

    /**
     * @var int
     */
    private int $inMinute;

    /**
     * @var int
     */
    private int $outMinute;

    /**
     * Player constructor.
     * @param int $number
     * @param string $name
     * @param string $position
     */

    public function __construct(int $number, string $name, string $position)
    {
        $this->number = $number;
        $this->name = $name;
        $this->playStatus = self::BENCH_PLAY_STATUS;
        $this->inMinute = 0;
        $this->outMinute = 0;
        $this->position = $position;
        $this->yellowCards = 0;
        $this->redCards = 0;
        $this->goals = 0;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
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
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function getGoals(): string
    {
        return $this->goals;
    }

    public function addGoal(): void
    {
        $this->goals += 1;
    }

    /**
     * @return string
     */
    public function getYellowCards(): string
    {
        return $this->yellowCards;
    }

    public function addYellowCard(): void
    {
        $this->yellowCards += 1;
    }

    /**
     * @return string
     */
    public function getRedCard(): string
    {
        return $this->redCards;
    }

    public function addRedCard(): void
    {
        $this->redCards += 1;
    }

    /**
     * @return int
     */
    public function getInMinute(): int
    {
        return $this->inMinute;
    }

    /**
     * @return int
     */
    public function getOutMinute(): int
    {
        return $this->outMinute;
    }

    /**
     * @return bool
     */
    public function isPlay(): bool
    {
        return $this->playStatus === self::PLAY_PLAY_STATUS;
    }

    /**
     * @return int
     */
    public function getPlayTime(): int
    {
        if(!$this->outMinute) {
            return 0;
        }

        // Time when player became to play include first minute
        $inMinute = $this->inMinute - 1;
        return $this->outMinute - $inMinute;
    }

    /**
     * @param int $minute
     */
    public function goToPlay(int $minute): void
    {
        $this->inMinute = $minute;
        $this->playStatus = self::PLAY_PLAY_STATUS;
    }

    /**
     * @param int $minute
     */
    public function goToBench(int $minute): void
    {
        $this->outMinute = $minute;
        $this->playStatus = self::BENCH_PLAY_STATUS;
    }
}