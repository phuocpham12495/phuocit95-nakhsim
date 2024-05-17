<?php

namespace App\Livewire\Football;

use Livewire\Component;

class Tab extends Component
{
    public $showCountries = false;
    public $showCompetitions = false;
    public $showTeams= false;
    public $showPlayers = false;

    public function selectCountries() {
        $this->showCountries = true;
        $this->showCompetitions = false;
        $this->showTeams = false;
        $this->showPlayers = false;
    }

    public function selectCompetitions() {
        $this->showCountries = false;
        $this->showCompetitions = true;
        $this->showTeams = false;
        $this->showPlayers = false;
    }

    public function selectTeams() {
        $this->showCountries = false;
        $this->showCompetitions = false;
        $this->showTeams = true;
        $this->showPlayers = false;
    }

    public function selectPlayers() {
        $this->showCountries = false;
        $this->showCompetitions = false;
        $this->showTeams = false;
        $this->showPlayers = true;
    }

    public function render()
    {
        return view('livewire.football.tab');
    }
}
