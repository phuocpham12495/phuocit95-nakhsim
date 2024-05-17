<?php

namespace App\Livewire\Football;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Rule;

class Competitions extends Component
{
    #[Rule("required")]
    public $countryId;

    public $competitions = [];

    public function mount() {

    }

    public function load() {
        //validate
        // $this->validate([
        //     "countryId" => "required",
        // ]);

        $this->validate();

        $endpoint_url = "https://apiv3.apifootball.com";
        $response = Http::get($endpoint_url . '?APIkey=6438957d52f8604b47fe2d367eaa0f4fb69ed3aaeb6f8624a320386a7d178f46&action=get_leagues&country_id=' . $this->countryId);
        $competitions = $response->json();
        $this->competitions = $competitions;
    }

    public function render()
    {
        return view('livewire.football.competitions', ["competitions" => $this->competitions]);
    }
}
