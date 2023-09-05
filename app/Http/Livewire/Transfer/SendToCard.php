<?php

namespace App\Http\Livewire\Transfer;

use App\Models\Card;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class SendToCard extends Component
{
    public $card;
    public $sum = null;

    public $target = null;
    public $ccOwner = 0;

    protected $rules = [
        'card' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:15|max:17',
        'sum' => 'required|numeric|min:100|max:1000000',
    ];

    protected $messages = [
        'card.required' => 'Введите Номер WVC.',
        'card.min' => 'Формат карты недействителен.',
        'card.max' => 'Карта не должена содержать более 11 символов.',

        'sum.required' => 'Введите сумму.',
        'sum.min' => 'Минимальный перевод 100 ₸',
        'sum.max' => 'Максимальный перевод 1 МЛН ₸',
    ];

    protected $validationAttributes = [
        'card' => 'card',
        'sum' => 'sum',
    ];


    public function updated($propertyName)
    {
        $this->target = null;
        $this->validateOnly($propertyName);
        $cc = Card::where('card_number', $this->card)->first();
        $this->ccOwner = $cc->owner_id;
        if (!is_null($cc)){
            return $this->target = User::where('id', $cc->owner_id)->first();
        }
//        if ($cc){
//            return $this->target = User::where('id', $cc->owner_id)->first();
//        }

    }


    public function sendMoney()
    {
        $this->validate();

        $user = Auth::user();


        if (Card::where('card_number', $this->card)->doesntExist()){
            notyf()
                ->duration(2000)
                ->position('x', 'center')
                ->position('y', 'top')
                ->addWarning('Карта WVC не найдена');
            return;
        }

        if ($this->sum >= Auth::user()->balance){
            notyf()
                ->duration(2000)
                ->position('x', 'center')
                ->position('y', 'top')
                ->addWarning('Не достаточно средств');
            return;
        }

        Transfer::create([
            'sender_id' => Auth::id(),
            'recipient_id' => $this->ccOwner,
            'sum' => $this->sum,
            'comment' => 'Превод/Пополнение с карты',
        ]);

        Auth::user()->decrement('balance', $this->sum);
        Card::where('card_number', $this->card)->increment('card_balance', $this->sum);

        notyf()
            ->ripple(true)
            ->addSuccess('Деньги отправлены Клиенту на счет');
        return $this->redirect(route('wallet.home'));
    }

    public function render()
    {
        return view('livewire.transfer.send-to-card');
    }
}
