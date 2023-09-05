<?php

namespace App\Http\Livewire\Wallet;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoadMyCards extends Component
{

    public $loadData = null;
    public $ccID = 0;
    public $modelCC = false;
    public $infoCC = null;
    protected $listeners = [
        'sweetalertConfirmed',
    ];

    public function closeCard($id)
    {
        $this->ccID = $id;
        return sweetalert()
            ->showCancelButton()
            ->confirmButtonText('Да')
            ->cancelButtonText('Отмена')
            ->addInfo('Вы действительно хотите закрыть карту?');
    }

    public function loadCards()
    {

        $get = Card::where('owner_id', Auth::user()->id)->limit(2)->get();
        if (!is_null($get)){
            $this->loadData = $get;
        }
    }


    public function sweetalertConfirmed(array $payload)
    {
        Card::where('id', $this->ccID)->update([
            'card_blocked' => 1
        ]);
        notyf()
            ->duration(3000)
            ->ripple(false)
            ->addWarning('Карта закрыта');
        return redirect(route('wallet.home'));
    }

    public function openCard($id)
    {
        Card::where('id', $id)->update([
            'card_blocked' => 0
        ]);
        notyf()
            ->duration(3000)
            ->ripple(false)
            ->addSuccess('Карта открыта');
        return redirect(route('wallet.home'));
    }

    public function getInfo(array $i)
    {
        $this->infoCC = $i;
        return $this->modelCC = true;
    }

    public function getInfoClose()
    {
        return $this->modelCC = false;
    }

    public function render()
    {
        return view('livewire.wallet.load-my-cards');
    }
}
