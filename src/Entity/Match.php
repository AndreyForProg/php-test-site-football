<?php

namespace App\Entity;

/**
 * Class Match
 * @package App\Entity
 */
class Match
{
    public const INFO_MESSAGE_TYPE             = 'info';
    public const DANGEROUS_MOMENT_MESSAGE_TYPE = 'dangerousMoment';
    public const GOAL_MESSAGE_TYPE             = 'goal';
    public const YELLOW_CARD_MESSAGE_TYPE      = 'yellowCard';
    public const RED_CARD_MESSAGE_TYPE         = 'redCard';
    public const REPLACE_PLAYER_MESSAGE_TYPE   = 'replacePlayer';

    private const MESSAGE_TYPES = [
        self::INFO_MESSAGE_TYPE,
        self::DANGEROUS_MOMENT_MESSAGE_TYPE,
        self::GOAL_MESSAGE_TYPE,
        self::YELLOW_CARD_MESSAGE_TYPE,
        self::RED_CARD_MESSAGE_TYPE,
        self::REPLACE_PLAYER_MESSAGE_TYPE,
    ];

    /**
     * @var string
     */
    private string $id;
    private \DateTime $date;

    /**
     * @var string
     */
    private string $tournament;

    /**
     * @var Stadium
     */
    private Stadium $stadium;

    /**
     * @var Team
     */
    private Team $homeTeam;

    /**
     * @var Team
     */
    private Team $awayTeam;

    /**
     * @var array
     */
    private array $messages;

    public function __construct(string $id, \DateTime $date, string $tournament, Stadium $stadium, Team $homeTeam, Team $awayTeam)
    {
        $this->id = $id;
        $this->date = $date;
        $this->tournament = $tournament;
        $this->stadium = $stadium;
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
        $this->messages = [];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getTournament(): string
    {
        return $this->tournament;
    }

    /**
     * @return Stadium
     */
    public function getStadium(): Stadium
    {
        return $this->stadium;
    }

    /**
     * @return Team
     */
    public function getHomeTeam(): Team
    {
        return $this->homeTeam;
    }

    /**
     * @return Team
     */
    public function getAwayTeam(): Team
    {
        return $this->awayTeam;
    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param string $minute
     * @param string $text
     * @param string $type
     */
    public function addMessage(string $minute, string $text, string $type): void
    {
        $this->assertCorrectType($type);

        $this->messages[] = [
            'minute' => $minute,
            'text'   => $text,
            'type'   => $type,
        ];
    }

    /**
     * @param string $type
     */
    private function assertCorrectType(string $type): void
    {
        if (!in_array($type, self::MESSAGE_TYPES, true)) {
            throw new \Exception(
                sprintf(
                    'Message type "%s" not supported. Available types: "%s".',
                    $type,
                    implode('", "', self::MESSAGE_TYPES)
                )
            );
        }
    }
}