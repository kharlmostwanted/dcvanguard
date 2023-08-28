<?php

namespace App\Http\Livewire\Billings;

use Livewire\Component;
use App\Models\Billing;
use App\Models\Client;
use Carbon\Carbon;
use App\Models\Item;
use Illuminate\Support\Str;

class Create extends Component
{
    public Billing $billing;
    public Client $client;
    public $items = [];
    public $itemCount = 1;
    public $amount;
    public $due_at;
    public $date_from;
    public $date_to;

    public function mount()
    {
        $this->billing = new Billing();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function startDateUpdated()
    {
        $this->billing->end_date = Carbon::parse($this->billing->start_date)->endOfMonth()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.billings.create');
    }

    public function rules()
    {
        return [
            'billing.number_of_guards' => 'required|numeric|min:1',
            'billing.start_date' => 'required|date',
            'billing.end_date' => 'required|date|after:billing.start_date',
            'items.*.description' => 'required|string',
            'items.*.amount' => 'required|numeric|min:1',
        ];
    }

    public function save()
    {
        $this->validate();
        $this->billing->client_id = $this->client->id;
        $this->billing->number = str(str()->random(6))->upper();
        $this->billing->due_at = Carbon::parse($this->billing->end_date)->addDays(7);
        $this->billing->total_price = $this->totalPrice;
        $this->billing->save();

        $items = collect($this->items)
            ->map(function (array $item, int $key) {
                return [
                    Item::firstOrCreate(['title' => $item['description']])->id => [
                        'price' => $item['amount'],
                        'quantity' => 1,
                    ]
                ];
            })->mapWithKeys(function ($item) {
                return $item;
            });

        $this->billing->items()->sync($items->all());


        return redirect()->route('billings.show', $this->billing);
    }

    public function addRow()
    {
        $this->validate();
        $this->itemCount++;
    }

    public function removeItem($itemIndex)
    {
        array_splice($this->items, $itemIndex, 1);
        $this->itemCount--;
    }

    public function getTotalAmountProperty()
    {
        return $this->cleanItems->sum('amount');
    }

    public function getTotalPriceProperty()
    {
        return $this->cleanItems->sum('amount');
    }

    public function getCleanItemsProperty()
    {
        return collect($this->items)->filter(function ($item) {
            return !empty($item['amount']) && !empty($item['description']);
        });
    }
}
