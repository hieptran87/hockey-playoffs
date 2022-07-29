<?php

/**
 * O2Web\HockeyPlayoffs\Interfaces\Entities\DivisionInterface
 *
 * PHP version 8,8
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
 * A generic interface for Division implementations.
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
interface DivisionInterface
{
    /**
     * @return array
     */
    public function getTeams(): array;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param Team[] $teams teams
     * @return void
     */
    public function setTeams(array $teams);

    /**
     * @param string $name name
     * @return void
     */
    public function setName(string $name): void;
}
