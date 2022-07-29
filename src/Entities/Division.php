<?php
/**
 * O2Web\HockeyPlayoffs\Entities\Division
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

use O2Web\HockeyPlayoffs\Interfaces\Entities\DivisionInterface;

/**
 * Division Class for Hockey Playoffs Simulator implementation.
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
class Division implements DivisionInterface
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var array
     */
    protected array $teams;

    /**
     * Division constructor.
     * @param string $name  Name
     * @param Team[] $teams Teams
     * @return void
     */
    public function __construct(string $name = "", array $teams = [])
    {
        $this->setTeams($teams);
        $this->setName($name);
    }

    /**
     * @return array
     */
    public function getTeams(): array
    {
        return $this->teams;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Team[] $teams Teams
     * @return void
     */
    public function setTeams(array $teams)
    {
        $this->teams = $teams;
    }

    /**
     * @param string $name Name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
