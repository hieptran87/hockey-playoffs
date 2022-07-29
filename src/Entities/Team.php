<?php
/**
 * O2Web\HockeyPlayoffs\Entities\Team
 *
 * PHP version 8
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
declare(strict_types=1);

namespace O2Web\HockeyPlayoffs\Entities;

use O2Web\HockeyPlayoffs\Interfaces\Entities\TeamInterface;
use O2Web\HockeyPlayoffs\Interfaces\Entities\PlayerInterface;

/**
 * Team Class for Hockey Playoffs Simulator implementation.
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
class Team implements TeamInterface
{
    public const DEFAULT_NUMBER_OF_PLAYERS = 21;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var Player[]
     */
    protected array $players;

    /**
     * Team constructor.
     * @param string   $name    Name
     * @param Player[] $players Players
     */
    public function __construct(string $name = '', array $players = [])
    {
        $this->setName($name);
        if (empty($players)) {
            for ($i = 0; $i < self::DEFAULT_NUMBER_OF_PLAYERS; $i++) {
                $players[] = new Player();
            }
        }
        $this->setPlayers($players);
    }

    /**
     * @return Player[]
     */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /**
     * @param Player[] $players Players
     * @return void
     */
    public function setPlayers(array $players)
    {
        $this->players = $players;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name Name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getOdds(): float
    {
        $successRates = [];
        foreach ($this->getPlayers() as $player) {
            $successRates[] = $player->getSuccessRate();
        }
        $countRates = count($successRates);
        if ($countRates === 0) {
            return 0;
        }
        return array_sum($successRates) / $countRates;
    }
}
