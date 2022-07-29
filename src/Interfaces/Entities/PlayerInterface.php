<?php

/**
 * O2Web\HockeyPlayoffs\Interfaces\Entities\PlayerInterface
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
 * A generic interface for Player implementations.
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
interface PlayerInterface
{
    /**
     * @param float $rate rate
     * @throws Exception
     * @return void
     */
    public function setSuccessRate(float $rate);

    /**
     * @return float
     */
    public function getSuccessRate(): float;

    /**
     * @throws Exception
     * @return void
     */
    public function assignRandomSuccessRate(): void;
}
