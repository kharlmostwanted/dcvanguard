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
    public $itemCount = 4;
    public $amount;
    public $due_at;
    public $date_from;
    public $date_to;

    public function mount()
    {
        $this->billing = new Billing();
        // add default items
        $lastBilling = $this->client->billings()->latest()
            ->withCasts([
                'start_date' => 'date',
                'end_date' => 'date',
            ])->first();
        if (empty($lastBilling)) {
            //add default items
            $this->items = [
                [
                    'description' => 'due to guards and government',
                    'amount' => '',
                ],
                [
                    'description' => 'agency fee',
                    'amount' => '',
                ],
                [
                    'description' => '12% VAT',
                    'amount' => '',
                ],
                [
                    'description' => 'Less: withholding tax(Agency Fee x 2%)',
                    'amount' => '',
                ],
            ];
        } else {
            $probableStartDate = $lastBilling->end_date->addDays(1);
            $this->billing->start_date = $probableStartDate->format('Y-m-d');
            $this->billing->end_date = $probableStartDate->day < 16 ?  $probableStartDate->addDays(14)->format('Y-m-d') : $probableStartDate->endOfMonth()->format('Y-m-d');
            $this->billing->number_of_guards = $lastBilling->number_of_guards;
            $this->items = $lastBilling->items->map(function ($item) {
                return [
                    'description' => $item->title,
                    'amount' => $item->pivot->price,
                ];
            })->toArray();
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function startDateUpdated()
    {
        $this->billing->end_date = Carbon::parse($this->billing->start_date)->addDays(14)->format('Y-m-d');
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
            'items.*.amount' => 'required|numeric',
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
