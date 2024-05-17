<?php

namespace App\Livewire\Football;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Rule;

class Players extends Component
{
    #[Rule("required")]
    public $playerName;

    public $players = [];

    public function mount() {

    }

    public function load() {
        $this->validate();

        $endpoint_url = "https://apiv3.apifootball.com";
        $response = Http::get($endpoint_url . '?APIkey=6438957d52f8604b47fe2d367eaa0f4fb69ed3aaeb6f8624a320386a7d178f46&action=get_players&player_name=' . $this->playerName);
        $players = $response->json();
        $this->players = $players;
    }

    public function render()
    {
        return view('livewire.football.players', ["players" => $this->players]);
    }
}
