<?php
namespace Advent2016Test\Day2;
use Advent2016\Day2\Keypad;


class KeypadTest extends \PHPUnit_Framework_TestCase
{
    protected $keypad;

    public function setUp()
    {
        $this->keypad = new Keypad();
    }

    public function testExample()
    {
        $input = "ULL\nRRDDD\nLURDL\nUUUUD";

        $this->keypad->setDirections($input);
        $this->assertSame("1985", $this->keypad->getCode());
    }

    public function testCorrectExample()
    {
        $input = "ULL\nRRDDD\nLURDL\nUUUUD";

        $this->keypad->setDirections($input);
        $this->assertSame("5DB3", $this->keypad->getCode());
    }
}
