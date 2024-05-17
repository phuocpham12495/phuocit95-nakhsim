<?php

namespace App\Livewire\Football;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Countries extends Component
{
    public $countries = [];

    public function mount() {

    }

    public function load() {

        $this->dispatch('$refresh');
        $endpoint_url = "https://apiv3.apifootball.com";
        $response = Http::get($endpoint_url . '?APIkey=6438957d52f8604b47fe2d367eaa0f4fb69ed3aaeb6f8624a320386a7d178f46&action=get_countries');
        $countries = $response->json();
        $this->countries = $countries;
        $this->dispatch('$refresh');
        $this->isLoading = false;
    }

    public function render()
    {
        return view('livewire.football.countries', ["countries" => $this->countries]);
    }
}
