<?php

/**
 * O2Web\HockeyPlayoffs\Interfaces\Entities\LeagueInterface
 *
 * PHP version 7,8
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
declare(strict_types=1);

namespace O2Web\HockeyPlayoffs\Interfaces\Entities;

/**
 * A generic interface for League implementations.
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
interface LeagueInterface
{
    /**
     * @return Division[]
     */
    public function getDivisions(): array;

    /**
     * @param Division[] $divisions divisions
     * @return void
     */
    public function setDivisions(array $divisions): void;
}
