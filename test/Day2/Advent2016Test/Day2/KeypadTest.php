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
        $keys = [
            ['1', '2', '3'],
            ['4', '5', '6'],
            ['7', '8', '9'],
        ];

        $input = "ULL\nRRDDD\nLURDL\nUUUUD";

        $this->keypad->setDirections($input);
        $this->keypad->setKeys($keys);
        $this->assertSame("1985", $this->keypad->getCode('5'));
    }

    public function testCorrectExample()
    {
        $keys = [
            [null, null, '1', null, null],
            [null,  '2', '3',  '4', null],
            ['5',   '6', '7',  '8',  '9'],
            [null,  'A', 'B',  'C', null],
            [null, null, 'D', null, null],
        ];

        $input = "ULL\nRRDDD\nLURDL\nUUUUD";

        $this->keypad->setDirections($input);
        $this->keypad->setKeys($keys);
        $this->assertSame("5DB3", $this->keypad->getCode('5'));
    }
}
