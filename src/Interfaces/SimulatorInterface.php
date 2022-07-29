<?php
/**
 * O2Web\HockeyPlayoffs\Interfaces\SimulatorInterface
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

namespace O2Web\HockeyPlayoffs\Interfaces;

use O2Web\HockeyPlayoffs\Interfaces\Entities\LeagueInterface;
use O2Web\HockeyPlayoffs\Interfaces\Entities\TeamInterface;
use O2Web\HockeyPlayoffs\Entities\Team;
use O2Web\HockeyPlayoffs\Entities\Division;
use O2Web\HockeyPlayoffs\Entities\Player;
use O2Web\HockeyPlayoffs\Entities\League;

/**
 * Team Class for Hockey Playoffs Simulator implementation.
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
interface SimulatorInterface
{
    public const DIVISIONS = ["East", "West"];
    public const TEAMS = ["A", "B", "C", "D", "E", "F", "G", "H"];
    public const MAX_NUMBER_OF_MATCHES = 7;

    /**
     * @return LeagueInterface
     */
    public function getLeague(): LeagueInterface;

    /**
     * @return Team
     */
    public function simulate(): Team;

    /**
     * @param Team[]   $finalists finalists
     * @param string[] $divisions divisions
     * @return int
     */
    public function playFinals(array $finalists, array $divisions): int;

    /**
     * @param Division $division division
     * @return Team
     */
    public function playDivision(Division $division): Team;

    /**
     * @param Team[] $teamsToPlay teamsToPlay
     * @return array
     */
    public function playRound(array $teamsToPlay): array;

    /**
     * @param Team $teamA teamA
     * @param Team $teamB teamB
     * @return int
     */
    public function playMatch(Team $teamA, Team $teamB): int;

    /**
     * @param Team $teamA teamA
     * @param Team $teamB teamB
     * @return float
     */
    public function getTeamMaxValue(Team $teamA, Team $teamB): float;

    /**
     * @return float
     */
    public function getWinningNumber(): float;
}
