<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $orderBy;
    public $search;
    public $inGoodStanding = false;
    public $inBadStanding = false;

    public function render()
    {
        return view('livewire.clients.index');
    }

    public function getClientsProperty()
    {
        return Client::with('representative')->withBalance()
            ->orderBy($this->orderBy ?? 'company_name', 'ASC')
            ->when(!empty($this->search), function ($query) {
                $query->search($this->search);
            })->when($this->inGoodStanding && !$this->inBadStanding, function ($query) {
                $query->inGoodStanding();
            })->when($this->inBadStanding && !$this->inGoodStanding, function ($query) {
                $query->inBadStanding();
            })
            ->latest()
            ->paginate(10);
    }

    public function getTotalClientsProperty()
    {
        return Client::count();
    }


    public function getOrderByableColumnsProperty()
    {
        return [
            'company_name' => 'Company Name',
            'Id' => 'Id',
        ];
    }
}
