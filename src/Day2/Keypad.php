<?php
namespace Advent2016\Day2;

class Keypad
{
    protected $keypad = [];

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

    public function setKeys(array $keys)
    {
        $this->keypad = $keys;
    }

    public function getCode($starting)
    {
        $pos = $this->getPosForKey($starting);
        $code = '';

        foreach($this->directions as $line){
            foreach(str_split($line) as $move){

                $last = $pos;

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

                if(!isset($this->keypad[$pos[0]][$pos[1]]) OR is_null($this->keypad[$pos[0]][$pos[1]])){
                    $pos = $last;
                }
            }

            $code .= $this->keypad[$pos[0]][$pos[1]];
        }

        return $code;
    }

    protected function getPosForKey($search)
    {
        foreach($this->keypad as $r => $row){
            foreach($row as $c => $key){
                if($search == $key){
                    return [$r, $c];
                }
            }
        }

        throw new \Exception('could not find key: ' . $search);
    }

}