<?php

namespace App\Http\Livewire\Wallet;

use App\Models\Transfer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoadMyBank extends Component
{

    public $loadData = true;
    public $balance = 0.00;
    public $replenishment = 0;
    public $translations = 0;

    public function loadBank()
    {
        sleep(1);

        $this->balance = Auth::user()->balance;
        $this->replenishment = Transfer::where('recipient_id', Auth::user()->id)->count();
        $this->translations = Transfer::where('sender_id', Auth::user()->id)->count();

        $this->loadData = false;


    }

    public function render()
    {
        return view('livewire.wallet.load-my-bank');
    }
}
