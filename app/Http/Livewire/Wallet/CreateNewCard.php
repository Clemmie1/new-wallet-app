<?php

namespace App\Http\Livewire\Wallet;

use App\Http\Controllers\CreditCardController;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateNewCard extends Component
{
    public $load = false;

    public function createCard()
    {
        $this->load = true;

        $getCard = CreditCardController::gen();

        if (Card::where('owner_id', Auth::id())->count()  >= 2){
            notyf()
                ->duration(9999999)
                ->dismissible(true)
                /*->position('x', 'center')
                ->position('y', 'top')*/
                ->addError('Превышен лимит на выпуск карт WVC');
            return;
        }
        Card::create([
            'owner_id' => Auth::id(),
            'card_number' => ''.$getCard['creditCardNumber'].'',
            'card_type' => $getCard['creditCardType'],
            'сard_expiration_Date' => $getCard['creditCardExpirationDate'],
            'сard_cvv' => $getCard['creditCardCVV'],
        ]);
    }

    public function render()
    {
        return view('livewire.wallet.create-new-card');
    }
}
