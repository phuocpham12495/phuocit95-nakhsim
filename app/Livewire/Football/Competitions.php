<?php

namespace App\Livewire\Football;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Rule;
use Illuminate\Http\Client\ConnectionException;
use Barryvdh\Debugbar\Facades\Debugbar;

class Competitions extends Component
{
    #[Rule("required")]
    public $countryId;

    public $competitions = [];

    public $errorMsg;

    public function mount() {

    }

    public function load() {
        //validate
        // $this->validate([
        //     "countryId" => "required",
        // ]);

        $this->validate();

        $endpoint_url = "https://apiv3.apifootball.com";

        try{
            $response = Http::timeout(10)->get($endpoint_url . '?APIkey=6438957d52f8604b47fe2d367eaa0f4fb69ed3aaeb6f8624a320386a7d178f46&action=get_leagues&country_id=' . $this->countryId);
            if ($response != null) {
                Debugbar::info("Response status: " . $response->status());
                if($response->ok()) {
                    $competitions = $response->json();
                    Debugbar::info("competitions: ");
                    Debugbar::info($competitions);
                    if (isset($competitions["error"])) {
                        $this->competitions = [];
                        // $this->errorMsg = $competitions["message"];
                        $this->errorMsg = "No competition is found";
                    }
                    else {
                        $this->competitions = $competitions;
                        $this->errorMsg = "";
                    }
                }
            }
            else {
                $this->errorMsg = 'Response is null';
            }
        } catch (ConnectionException $e) {
            Debugbar::error('e: ' . $e);
            $this->competitions = [];
            $this->errorMsg = "Time out, retry it";
            // report($e);
        }
        Debugbar::error($this->errorMsg);
    }

    public function render()
    {
        return view('livewire.football.competitions', ["competitions" => $this->competitions]);
    }
}
