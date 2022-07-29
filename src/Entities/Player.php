<?php
/**
 * O2Web\HockeyPlayoffs\Entities\Player
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

namespace O2Web\HockeyPlayoffs\Entities;

use O2Web\HockeyPlayoffs\Interfaces\Entities\PlayerInterface;
use O2Web\HockeyPlayoffs\Exceptions\InvalidRateException;

/**
 * Player Class for Hockey Playoffs Simulator implementation.
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
class Player implements PlayerInterface
{
    public const MIN_SUCCESS_RATE = 0.15;
    public const MAX_SUCCESS_RATE = 1;

    /**
     * @var float
     */
    protected float $successRate;

    /**
     * Player constructor.
     * @throws InvalidRateException
     */
    public function __construct()
    {
        $this->assignRandomSuccessRate();
    }

    /**
     * @param float $rate Rate
     * @throws InvalidRateException
     * @return void
     */
    public function setSuccessRate(float $rate)
    {
        if (!$this->isValidRate($rate)) {
            throw new InvalidRateException(
                sprintf("Rate must be between %f and %f", self::MIN_SUCCESS_RATE, self::MAX_SUCCESS_RATE)
            );
        }
        $this->successRate = $rate;
    }

    /**
     * @return float
     */
    public function getSuccessRate(): float
    {
        return $this->successRate;
    }

    /**
     * @throws InvalidRateException
     * @return void
     */
    public function assignRandomSuccessRate(): void
    {
        $this->setSuccessRate(
            mt_rand(
                intval(self::MIN_SUCCESS_RATE * 100),
                intval(self::MAX_SUCCESS_RATE * 100)
            ) / 100
        );
    }

    /**
     * @param float $rate Rate
     * @return bool
     */
    protected function isValidRate(float $rate): bool
    {
        return (self::MIN_SUCCESS_RATE <= $rate && self::MAX_SUCCESS_RATE >= $rate);
    }
}
