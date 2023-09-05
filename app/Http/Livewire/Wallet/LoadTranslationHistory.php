<?php

namespace App\Http\Livewire\Wallet;

use App\Models\Transfer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoadTranslationHistory extends Component
{

    public $loadData = null;
    public $notFound = false;

    public function getLists()
    {
        $list = Transfer::where('sender_id', Auth::user()->id)->orderBy('created_at', 'DESC')->limit(10)->get();

        if (!is_null($list)){
            $this->loadData = $list;
        } else {
            $this->loadData = $this->notFound = true;
        }

    }

    public function render()
    {
        return view('livewire.wallet.load-translation-history');
    }
}
