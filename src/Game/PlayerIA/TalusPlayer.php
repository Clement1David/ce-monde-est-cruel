<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class TalusPlayers
 * @package Hackathon\PlayerIA
 * @author Clément DAVID
 */
class TalusPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;
    
    public function Onechoice($lastoppo)
    {
        $count = 0;
        $oppo_array =  $this->result->getChoicesFor($this->opponentSide);
        for ($k = 1; $k < count($oppo_array); $k++)
        {
            if ($oppo_array[$k] == $oppo_array[$k - 1])
                $count++;
        }
        if ($count ==  $this->result->getNbRound())
        {
            if ($lastoppo == 'scissors')
                return parent::rockChoice();
            elseif ($lastoppo == 'rock')
                return parent::paperChoice();
            return parent::scissorsChoice();

        }
        return;
        
    }

    public function getChoice()
    {
        $mylast =  $this->result->getLastChoiceFor($this->mySide);
        $lastoppo = $this->result->getLastChoiceFor($this->opponentSide);
        $this->Onechoice($lastoppo);
        if ($lastoppo == 'scissors')
            return parent::rockChoice();
        elseif ($lastoppo == 'rock')
            return parent::paperChoice();
        return parent::scissorsChoice();

    }
};
