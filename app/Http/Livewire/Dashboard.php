<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\Billing;
use App\Models\Client;
use App\Models\Payment;

class Dashboard extends Component
{
    public $date_from;
    public $date_to;

    public function mount()
    {
        $this->date_from = Carbon::now()->subDays(30)->format('Y-m-d');
        $this->date_to = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function updatedDateFrom()
    {
        $this->date_to = Carbon::parse($this->date_from)->addDays(30)->format('Y-m-d');
    }

    public function billings()
    {
        return Billing::whereBetween('created_at', [
            Carbon::parse($this->date_from)->startOfDay(),
            Carbon::parse($this->date_to)->endOfDay()
        ]);
    }

    public function clients()
    {
        return Client::whereBetween('created_at', [
            Carbon::parse($this->date_from)->startOfDay(),
            Carbon::parse($this->date_to)->endOfDay()
        ]);
    }

    public function payments()
    {
        return Payment::whereHas('billing')
            ->whereBetween('created_at', [
                Carbon::parse($this->date_from)->startOfDay(),
                Carbon::parse($this->date_to)->endOfDay()
            ]);
    }
}
