<?php
/**
 * O2Web\HockeyPlayoffs\Entities\League
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

use O2Web\HockeyPlayoffs\Interfaces\Entities\LeagueInterface;
use O2Web\HockeyPlayoffs\Interfaces\Entities\DivisionInterface;

/**
 * League Class for Hockey Playoffs Simulator implementation.
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
class League implements LeagueInterface
{
    /**
     * @var DivisionInterface[]
     */
    protected array $divisions;

    /**
     * League constructor.
     * @param DivisionInterface[] $divisions divisions
     * @return void
     */
    public function __construct(array $divisions = [])
    {
        $this->setDivisions($divisions);
    }

    /**
     * @return DivisionInterface[]
     */
    public function getDivisions(): array
    {
        return $this->divisions;
    }

    /**
     * @param DivisionInterface[] $divisions divisions
     * @return void
     */
    public function setDivisions(array $divisions): void
    {
        $this->divisions = $divisions;
    }
}
