<?php

namespace App\Livewire\Football;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Rule;
use Illuminate\Http\Client\ConnectionException;
use Barryvdh\Debugbar\Facades\Debugbar;


class Teams extends Component
{
    #[Rule('required')]
    public $leagueId;

    public $teams = [];

    public $errorMsg;

    public function mount() {

    }

    public function load() {
        $this->validate();

        $endpoint_url = 'https://apiv3.apifootball.com';

        try{
            $response = Http::timeout(10)->get($endpoint_url . '?APIkey=6438957d52f8604b47fe2d367eaa0f4fb69ed3aaeb6f8624a320386a7d178f46&action=get_teams&league_id=' . $this->leagueId);
            if ($response != null) {
                Debugbar::info('Response status: ' . $response->status());
                if($response->ok()) {
                    $teams = $response->json();
                    //remove players from all teams
                    // foreach ($teams as &$team) {
                    //     unset($team['players']);
                    // }
                    Debugbar::info('teams: ');
                    Debugbar::info($teams);
                    if (isset($teams['error'])) {
                        $this->teams = [];
                        // $this->errorMsg = $teams['message'];
                        $this->errorMsg = 'No team is found';
                    }
                    else {
                        $this->teams = $teams;
                        $this->errorMsg = '';
                    }
                }
            }
            else {
                $this->errorMsg = 'Response is null';
            }
        } catch (ConnectionException $e) {
            Debugbar::error('e: ' . $e);
            $this->teams = [];
            $this->errorMsg = 'Time out, retry it';
            // report($e);
        }

        Debugbar::error($this->errorMsg);
    }

    public function render()
    {
        return view('livewire.football.teams', ['teams' => $this->teams]);
    }
}
