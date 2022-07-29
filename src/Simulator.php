<?php
/**
 * O2Web\HockeyPlayoffs\Simulator
 *
 * PHP version 7
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
declare(strict_types=1);

namespace O2Web\HockeyPlayoffs;

use O2Web\HockeyPlayoffs\Interfaces\SimulatorInterface;
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
class Simulator implements SimulatorInterface
{
    public const DIVISIONS = ["East", "West"];
    public const TEAMS = ["A", "B", "C", "D", "E", "F", "G", "H"];
    public const MAX_NUMBER_OF_MATCHES = 7;

    /**
     * @var LeagueInterface
     */
    protected LeagueInterface $league;

    /**
     * Simulator constructor.
     * @param LeagueInterface|null $league league
     */
    public function __construct(LeagueInterface $league = null)
    {
        $this->league = $league ?? new League();
    }

    /**
     * @return LeagueInterface
     */
    public function getLeague(): LeagueInterface
    {
        return $this->league;
    }

    /**
     * @return void
     */
    private function init(): void
    {
        try {
            $teams = [];
            foreach (self::TEAMS as $team) {
                $teams[] = new Team($team);
            }
            $divisions = [];
            foreach (self::DIVISIONS as $division) {
                shuffle($teams);
                $divisions[] = new Division($division, $teams);
            }
            $this->getLeague()->setDivisions($divisions);
        } catch (Exception $e) {
            echo "Failed to initialize Simulator" . PHP_EOL;
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * @return Team
     */
    public function simulate(): Team
    {
        $this->init();
        $finals = [];
        $finalDivisions = [];
        foreach ($this->league->getDivisions() as $division) {
            $finals[] = $this->playDivision($division);
            $finalDivisions[] = $division->getName();
        }
        $championIndex = $this->playFinals($finals, $finalDivisions);
        return $finals[$championIndex];
    }

    /**
     * @param Team[]   $finalists finalists
     * @param string[] $divisions divisions
     * @return int
     */
    public function playFinals(array $finalists, array $divisions): int
    {
        $winCount = [0, 0];
        for ($i = 0; $i <= self::MAX_NUMBER_OF_MATCHES; $i++) {
            $winnerIndex = $this->playMatch($finalists[0], $finalists[1]);
            $winCount[$winnerIndex]++;
            if ($winCount[$winnerIndex] === 4) {
                echo sprintf(
                    "Final %s %s vs %s %s - Winner: %s %s (%d/%d)\n",
                    $divisions[0],
                    $finalists[0]->getName(),
                    $divisions[1],
                    $finalists[1]->getName(),
                    $divisions[$winnerIndex],
                    $finalists[$winnerIndex]->getName(),
                    $winCount[0],
                    $winCount[1],
                );
                return $winnerIndex;
            }
        }
    }

    /**
     * @param Division $division division
     * @return Team
     */
    public function playDivision(Division $division): Team
    {
        echo sprintf("%s Division:\n", $division->getName());
        $teamsToPlay = $division->getTeams();
        $roundsCount = 0;
        while (count($teamsToPlay) > 1) {
            echo sprintf("Round # %d:\n", $roundsCount);
            $teamsToPlay = $this->playRound($teamsToPlay);
            $roundsCount++;
        }
        echo "----------------------\n";
        return $teamsToPlay[0];
    }

    /**
     * @param Team[] $teamsToPlay teamsToPlay
     * @return array
     */
    public function playRound(array $teamsToPlay): array
    {
        $winners = [];
        while (count($teamsToPlay) > 0) {
            $winCount = [0, 0];
            $winner = null;
            for ($i = 0; $i <= self::MAX_NUMBER_OF_MATCHES; $i++) {
                $winnerIndex = $this->playMatch($teamsToPlay[0], $teamsToPlay[1]);
                $winCount[$winnerIndex]++;
                if ($winCount[$winnerIndex] === 4) {
                    $winner = $teamsToPlay[$winnerIndex];
                    echo sprintf(
                        "Serie %s vs %s - Winner: %s (%d/%d)\n",
                        $teamsToPlay[0]->getName(),
                        $teamsToPlay[1]->getName(),
                        $teamsToPlay[$winnerIndex]->getName(),
                        $winCount[0],
                        $winCount[1]
                    );
                    $teamsToPlay = array_slice($teamsToPlay, 2);
                    break;
                }
            }
            $winners[] = $winner;
        }
        return $winners;
    }

    /**
     * @param Team $teamA teamA
     * @param Team $teamB teamB
     * @return int
     */
    public function playMatch(Team $teamA, Team $teamB): int
    {
        $teamAMaxValue = $this->getTeamMaxValue($teamA, $teamB);
        $winningNumber = $this->getWinningNumber();
        if ($teamAMaxValue <= $winningNumber) {
            return 0;
        }
        return 1;
    }

    /**
     * @param Team $teamA teamA
     * @param Team $teamB teamB
     * @return float
     */
    public function getTeamMaxValue(Team $teamA, Team $teamB): float
    {
        $oddsTeamA = $teamA->getOdds();
        $oddsTeamB = $teamB->getOdds();
        $coef = $oddsTeamA - $oddsTeamB;
        return 0.5 + (0.5 * $coef);
    }

    /**
     * @return float
     */
    public function getWinningNumber(): float
    {
        return mt_rand(0, 100) / 100;
    }
}
