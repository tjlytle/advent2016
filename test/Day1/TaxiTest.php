<?php
namespace Advent2016Test\Day1;

use Advent2016\Day1\Taxi;

class TaxiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Taxi
     */
    protected $taxi;

    public function setUp()
    {
        $this->taxi = new Taxi();
    }

    /**
     * @param $directions
     * @param $distance
     * @dataProvider getExamples
     */
    public function testExamples($directions, $distance)
    {
        $this->taxi->setDirections($directions);
        $this->assertSame($distance, $this->taxi->getDistance());
    }

    public function getExamples()
    {
        return [
            ["R2, L3", 5],
            ["R2, R2, R2", 2],
            ["R5, L5, R5, R3", 12]
        ];
    }

    public function testLocationTracking()
    {
        $example = 'R8, R4, R4, R8';

        $this->taxi->setDirections($example);
        $this->assertSame(4, $this->taxi->getFirstRevisit());
    }

    public function testLocationOffByOne()
    {
        $example = 'R6, R3, R2, R2, R4';

        $this->taxi->setDirections($example);
        $this->assertSame(7, $this->taxi->getFirstRevisit());
    }
}
