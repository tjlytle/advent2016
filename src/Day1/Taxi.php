<?php


namespace Advent2016\Day1;


class Taxi
{
    /**
     * @var array
     */
    protected $directions = [];

    public function setDirections($directions)
    {
        $this->directions = [];
        foreach(explode(',', (string) $directions) as $command){
            $this->directions[] = trim($command);
        }
    }

    public function getDistance()
    {
        $north = 0;
        $east  = 0;

        $heading = 'north';

        foreach($this->directions as $command){
            $turn = substr($command, 0, 1);
            $distance = substr($command, 1);

            $heading = $this->getHeading($heading, $turn);

            switch($heading){
                case 'north':
                    $north += $distance;
                    break;
                case 'south':
                    $north -= $distance;
                    break;
                case 'east':
                    $east += $distance;
                    break;
                case 'west':
                    $east -= $distance;
                    break;
            }
        }

        return abs($north) + abs($east);
    }

    protected function getHeading($current, $turn)
    {
        $map = [
            'northr' => 'east',
            'northl' => 'west',
            'southr' => 'west',
            'southl' => 'east',
            'eastr'  => 'south',
            'eastl'  => 'north',
            'westr'  => 'north',
            'westl'  => 'south',
        ];

        return $map[$current . strtolower($turn)];
    }

    public function getFirstRevisit()
    {
        $north = 0;
        $east  = 0;

        $heading = 'north';

        $history = [];

        foreach($this->directions as $command){
            $turn = substr($command, 0, 1);
            $distance = substr($command, 1);

            $heading = $this->getHeading($heading, $turn);

            for($s = 1; $s <= $distance; $s++){
                switch($heading){
                    case 'north':
                        $north++;
                        break;
                    case 'south':
                        $north--;
                        break;
                    case 'east':
                        $east++;
                        break;
                    case 'west':
                        $east--;
                        break;
                }

                $location = $north . ':' . $east;

                if(in_array($location, $history)){
                    return abs($north) + abs($east);
                }

                $history[] = $location;

            }
        }
    }
}