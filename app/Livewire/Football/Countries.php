<?php

namespace App\Livewire\Football;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;
use Barryvdh\Debugbar\Facades\Debugbar;

class Countries extends Component
{
    public $countries = [];

    public $errorMsg;

    public function mount() {

    }

    public function load() {
        $endpoint_url = "https://apiv3.apifootball.com";

        try{
            $response = Http::timeout(10)->get($endpoint_url . '?APIkey=6438957d52f8604b47fe2d367eaa0f4fb69ed3aaeb6f8624a320386a7d178f46&action=get_countries');
            if ($response != null) {
                Debugbar::info("Response status: " . $response->status());
                if($response->ok()) {
                    $countries = $response->json();
                    Debugbar::info("countries: ");
                    Debugbar::info($countries);
                    if (isset($countries["error"])) {
                        $this->countries = [];
                        // $this->errorMsg = $players["message"];
                        $this->errorMsg = "No country is found";
                    }
                    else {
                        $this->countries = $countries;
                        $this->errorMsg = "";
                    }
                }
            }
            else {
                $this->errorMsg = 'Response is null';
            }
        } catch (ConnectionException $e) {
            Debugbar::error('e: ' . $e);
            $this->countries = [];
            $this->errorMsg = "Time out, retry it";
            // report($e);
        }
        Debugbar::error($this->errorMsg);
    }

    public function render()
    {
        return view('livewire.football.countries', ["countries" => $this->countries]);
    }
}
