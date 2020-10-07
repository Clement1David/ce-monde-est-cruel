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

    public function getChoice()
    {
        $lastoppo=$this->result->getLastChoiceFor($this->opponentSide);
        if ($lastoppo == 'scissors')
            return parent::rockChoice();
        elseif ($lastoppo == 'rock')
            return parent::paperChoice();
        return parent::scissorsChoice();

    }
};
