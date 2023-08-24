<?php

namespace App\Http\Livewire\Billings;

use Livewire\Component;
use App\Models\Billing;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $orderBy;
    public $search;
    public $paid;
    public $unpaid;

    public function render()
    {
        return view('livewire.billings.index');
    }

    public function getBillingsProperty()
    {
        return Billing::with('client.representative')->withCasts([
            'start_date' => 'date',
            'end_date' => 'date',
        ])->when(!empty($this->search), function ($query) {
            $query->search($this->search);
        })->when(!empty($this->paid), function ($query) {
            $query->paid();
        })->when(!empty($this->unpaid), function ($query) {
            $query->unpaid();
        })->when(!empty($this->orderBy), function ($query) {
            $query->orderBy($this->orderBy);
        })->paginate(10);
    }

    public function getTotalBillingsProperty()
    {
        return Billing::count();
    }

    public function getOrderByableColumnsProperty()
    {
        return [
            'end_date' => 'Billing Date',
            'Id' => 'id',
        ];
    }

}
