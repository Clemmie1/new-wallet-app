<?php

namespace App\Http\Livewire\Transfer;

use App\Models\Transfer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class SendToPhone extends Component
{
    public $phone;
    public $sum = null;
    public $comment = null;

    public $target = null;
    public $recipient_id = 0;

    protected $rules = [
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
        'sum' => 'required|numeric|min:100|max:1000000',
    ];

    protected $messages = [
        'phone.required' => 'Введите Номер телефона.',
        'phone.min' => 'Формат Номер телефона недействителен.',
        'phone.max' => 'Телефон не должен содержать более 11 символов.',

        'sum.required' => 'Введите сумму.',
        'sum.min' => 'Минимальный перевод 100 ₸',
        'sum.max' => 'Максимальный перевод 1 МЛН ₸',
    ];

    protected $validationAttributes = [
        'phone' => 'phone',
        'sum' => 'sum',
    ];


    public function updated($propertyName)
    {
        /*if ($this->phone != null && $this->phone != ''){
            $this->target = null;
            $this->validateOnly($propertyName);
            $user = User::where('phone', $this->phone)->first();
            $this->recipient_id = $user->id;
            return $this->target = $user;
        }*/
        $this->target = null;
        $this->validateOnly($propertyName);

        if (User::where('phone', $this->phone)->exists()){
            $user = User::where('phone', $this->phone)->first();
            $this->recipient_id = $user->id;
            return $this->target = $user;
        }
    }


    public function sendMoney()
    {
        $this->validate();

        $user = Auth::user();

        if ($user->phone == $this->phone){
            notyf()
                ->duration(2000)
                ->position('x', 'center')
                ->position('y', 'top')
                ->addError('Невозможно сделать перевод');
            return;
        }

        if (User::where('phone', $this->phone)->doesntExist()){
            notyf()
                ->duration(2000)
                ->position('x', 'center')
                ->position('y', 'top')
                ->addWarning('Клиент не найден');
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
            'recipient_id' => $this->recipient_id,
            'sum' => $this->sum,
            'comment' => $this->comment ?? null,
        ]);
        $newBalance = $user->balance - $this->sum;

        Auth::user()->decrement('balance', $this->sum);
        User::where('id', $this->recipient_id)->increment('balance', $this->sum);

        notyf()
            ->ripple(true)
            ->addSuccess('Деньги отправлены Клиенту на счет');
        return $this->redirect(route('wallet.home'));
        /*return dd([
            'phone' => $this->recipient_id,
            'sum' => $this->sum,
            'com' => $this->comment ?? null,
        ]);*/


    }

    public function render()
    {
        return view('livewire.transfer.send-to-phone');
    }
}
