<?php

namespace App\Http\Livewire\Billings;

use App\Models\Billing;
use Livewire\Component;
use App\Models\Payment;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Client;

class Show extends Component
{
    use LivewireAlert;
    public Billing $billing;
    public Client $client;
    public Payment $payment;

    public function mount()
    {
        $this->resetPayment();
    }

    public function resetPayment()
    {
        $this->payment  = new Payment();
        $this->payment->billing_id = $this->billing->id;
        $this->payment->amount = $this->totalAmount;
        $this->payment->or_number = 'OR-' . $this->billing->number . '-' . $this->billing->payments->count() + 1;
        $this->payment->received_at = now()->format('m/d/Y');
        $this->payment->check_date = now()->format('m/d/Y');
    }

    public function rules()
    {
        return [
            'payment.amount' => 'required|numeric|min:1',
            'payment.received_at' => 'required|date',
            'payment.or_number' => 'required|string',
            'payment.check_number' => 'nullable|string',
            'payment.check_bank' => 'nullable|string',
            'payment.check_date' => 'nullable|date',
            'payment.billing_id' => 'required|in:' . $this->billing->id,
        ];
    }

    public function render()
    {
        $this->client = $this->billing->client;
        return view('livewire.billings.show');
    }

    public function getTotalAmountProperty()
    {
        return $this->billing->items->sum('pivot.price');
    }

    public function markPaid()
    {
        Payment::Create([
            'or_number' => 'OR-' . $this->billing->number . '-' . $this->billing->payments->count() + 1,
            'billing_id' => $this->billing->id,
            'amount' => $this->totalAmount,
            'received_at' => now(),
        ]);
        $this->alert('success', 'Payment Details Saved!', [
            'position' => 'bottom-end'
        ]);
    }

    public function delete()
    {
        // $this->billing->items()->detach();
        $this->billing->delete();
        session()->flash('success', 'Billing deleted successfully');
    }

    public function addPayment()
    {
        $this->validate();
        //format payment date to be mysql friendly format
        $this->payment->received_at = Carbon::parse($this->payment->received_at)->format('Y-m-d');
        $this->payment->check_date = Carbon::parse($this->payment->check_date)->format('Y-m-d');
        $this->payment->save();
        //format the dates back to be human friendly
        $this->payment->received_at = Carbon::parse($this->payment->received_at)->format('m/d/Y');
        $this->payment->check_date = Carbon::parse($this->payment->check_date)->format('m/d/Y');
        $this->billing->refresh();
        $this->resetPayment();
        $this->emit('billingUpdated');
        //flash the success message
        $this->alert('success', 'Payment Details Saved!', [
            'position' => 'bottom-end'
        ]);
    }

    public function getPaymentsProperty()
    {
        return $this->billing->payments()->withCasts([
            'received_at' => 'datetime',
            'check_date' => 'datetime',
        ])->get();
    }

    public function deletePayment($paymentId)
    {
        $payment = Payment::find($paymentId);
        $payment->delete();
        $this->billing->refresh();
        $this->emit('billingUpdated');
        $this->alert('success', 'Payment Deleted!', [
            'position' => 'bottom-end'
        ]);
    }
}
