<?php

namespace App\Http\Livewire\Billings;

use Livewire\Component;
use App\Models\Billing;
use Livewire\WithPagination;
use App\Models\Payment;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $orderBy;
    public $search;
    public $paid;
    public $unpaid;
    public $dueDateFrom;
    public $dueDateTo;

    public function render()
    {
        return view('livewire.billings.index');
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function billings()
    {
        return Billing::with('client.representative')->withCasts([
            'start_date' => 'date',
            'end_date' => 'date',
        ])->withSum('payments as paid', 'amount')
            ->when(!empty($this->search), function ($query) {
                $query->search($this->search);
            })->when(!empty($this->paid), function ($query) {
                $query->paid();
            })->when(!empty($this->unpaid), function ($query) {
                $query->unpaid();
            })->when(!empty($this->orderBy), function ($query) {
                $query->orderBy($this->orderBy);
            })->when(!empty($this->dueDateFrom) && !empty($this->dueDateTo), function ($query) {
                $query->whereBetween('end_date', [$this->dueDateFrom, $this->dueDateTo]);
            });
    }

    public function payments()
    {
        return Payment::whereHas('billing', function ($query) {
            $query->when(!empty($this->search), function ($query) {
                $query->search($this->search);
            })->when(!empty($this->paid), function ($query) {
                $query->paid();
            })->when(!empty($this->unpaid), function ($query) {
                $query->unpaid();
            })->when(!empty($this->orderBy), function ($query) {
                $query->orderBy($this->orderBy);
            })->when(!empty($this->dueDateFrom) && !empty($this->dueDateTo), function ($query) {
                $query->whereBetween('end_date', [$this->dueDateFrom, $this->dueDateTo]);
            });
        });
    }

    public function getBillingsProperty()
    {
        return $this->billings()->paginate(10);
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
