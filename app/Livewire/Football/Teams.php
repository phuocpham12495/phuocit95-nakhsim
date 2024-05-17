<?php

namespace App\Livewire\Football;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Rule;

class Teams extends Component
{
    #[Rule("required")]
    public $leagueId;

    public $teams = [];

    public function mount() {

    }

    public function load() {
        $this->validate();

        $endpoint_url = "https://apiv3.apifootball.com";
        $response = Http::get($endpoint_url . '?APIkey=6438957d52f8604b47fe2d367eaa0f4fb69ed3aaeb6f8624a320386a7d178f46&action=get_teams&league_id=' . $this->leagueId);
        $teams = $response->json();
        $this->teams = $teams;
    }

    public function render()
    {
        return view('livewire.football.teams', ["teams" => $this->teams]);
    }
}
