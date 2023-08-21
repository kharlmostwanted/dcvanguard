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

    public function render()
    {
        return view('livewire.billings.index');
    }

    public function getBillingsProperty()
    {
        return Billing::withCasts([
            'start_date' => 'date',
            'end_date' => 'date',
        ])->when(!empty($this->start_date), function ($query) {
            //add filters



        })
            ->paginate(10);
    }

    public function getTotalBillingsProperty()
    {
        return Billing::count();
    }

    public function getOrderByableColumnsProperty()
    {
        return [
            'start_date' => 'Billing Date',
            'Id' => 'Id',
        ];
    }
}
