<?php
namespace Advent2016\Day2;

class Keypad
{
    protected $keypad = [
        ['1', '2', '3'],
        ['4', '5', '6'],
        ['7', '8', '9'],
    ];

    /**
     * @var array
     */
    protected $directions = [];

    public function setDirections($directions)
    {
        $this->directions = [];
        foreach(explode("\n", (string) $directions) as $command){
            $this->directions[] = trim($command);
        }
    }

    public function getCode()
    {
        $pos = [1,1];
        $code = '';

        foreach($this->directions as $line){
            foreach(str_split($line) as $move){
                switch(strtolower($move)){
                    case 'u':
                        $pos[0]--;
                        break;
                    case 'd':
                        $pos[0]++;
                        break;
                    case 'l':
                        $pos[1]--;
                        break;
                    case 'r':
                        $pos[1]++;
                        break;
                }

                foreach($pos as $index => $value){
                    if($value > 2){
                        $pos[$index] = 2;
                    }

                    if($value < 0){
                        $pos[$index] = 0;
                    }
                }
            }

            $code .= $this->keypad[$pos[0]][$pos[1]];
        }

        return $code;
    }
}