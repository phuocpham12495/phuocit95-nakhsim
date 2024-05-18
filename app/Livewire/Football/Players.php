<?php

namespace App\Livewire\Football;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Rule;
use Illuminate\Http\Client\ConnectionException;
use Barryvdh\Debugbar\Facades\Debugbar;

class Players extends Component
{
    #[Rule("required")]
    public $playerName;

    public $players = [];

    public $errorMsg;

    public function mount() {

    }

    public function load() {
        $this->validate();

        $endpoint_url = "https://apiv3.apifootball.com";

        try{
            $response = Http::timeout(10)->get($endpoint_url . '?APIkey=6438957d52f8604b47fe2d367eaa0f4fb69ed3aaeb6f8624a320386a7d178f46&action=get_players&player_name=' . $this->playerName);
            if ($response != null) {
                Debugbar::info("Response status: " . $response->status());
                if($response->ok()) {
                    $players = $response->json();
                    Debugbar::info("players: ");
                    Debugbar::info($players);
                    if (isset($players["error"])) {
                        $this->players = [];
                        // $this->errorMsg = $players["message"];
                        $this->errorMsg = "No player is found";
                    }
                    else {
                        $this->players = $players;
                        $this->errorMsg = "";
                    }
                }
            }
            else {
                $this->errorMsg = 'Response is null';
            }
        } catch (ConnectionException $e) {
            Debugbar::error('e: ' . $e);
            $this->players = [];
            $this->errorMsg = "Time out, retry it";
            // report($e);
        }
        Debugbar::error($this->errorMsg);
    }

    public function render()
    {
        return view('livewire.football.players', ["players" => $this->players]);
    }
}
