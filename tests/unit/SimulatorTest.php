<?php

/**
 * Test class for the Simulator implementation.
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
namespace O2Web\HockeyPlayoffs;
use O2Web\HockeyPlayoffs\Entities\Team;
use PHPUnit\Framework\TestCase;

class SimulatorTest extends TestCase
{

    /**
     * The exportable Simulator that has to be tested.
     *
     * @var \O2Web\HockeyPlayoffs\Simulator
     */
    protected $simulator;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    protected function setUp(): void
    {
        $this->simulator = $this->getMockForAbstractClass('O2Web\HockeyPlayoffs\Simulator');
    }

    /**
     * Test the Simulate method.
     *
     * @return void
     */
    public function testSimulate()
    {
         $this->assertContainsOnlyInstancesOf(Team::class, [$this->simulator->simulate()]);
    }
}
