<?php
/**
 * O2Web\HockeyPlayoffs\Interfaces\Entities\TeamInterface
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
 * A generic interface for Team implementations.
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
interface TeamInterface
{
    /**
     * @return Player[]
     */
    public function getPlayers(): array;

    /**
     * @param Player[] $players players
     * @return void
     */
    public function setPlayers(array $players);

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name name
     * @return void
     */
    public function setName(string $name): void;

    /**
     * @return float
     */
    public function getOdds(): float;
}
