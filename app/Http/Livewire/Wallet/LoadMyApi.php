<?php

namespace App\Http\Livewire\Wallet;

use App\Models\Api;
use App\Models\Transfer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoadMyApi extends Component
{
    public $loadData = null;
    public $notFound = false;

    public $keyID = 0;

    protected $listeners = [
        'sweetalertConfirmed',
    ];

    public function sweetalertConfirmed(array $payload)
    {
        Api::where('id', $this->keyID)->delete();
        notyf()
            ->duration(3000)
            ->ripple(false)
            ->addError('Ключ #' . $this->keyID . ' удалён');
        return redirect(route('wallet.home'));
    }

    public function render()
    {
        return view('livewire.wallet.load-my-api');
    }

    public function getApiList()
    {
        $list = Api::where('owner_id', Auth::user()->id)->limit(3)->orderBy('created_at', 'DESC')->get();

        if (!is_null($list)){
            $this->loadData = $list;
        } else {
            $this->loadData = $this->notFound = true;
        }

    }

    public function deleteKey($id){
        $this->keyID = $id;
        return sweetalert()
            ->showCancelButton()
            ->confirmButtonText('Да')
            ->cancelButtonText('Отмена')
            ->addInfo('Вы действительно хотите удалить Ключ #'.$id.'?');
    }
}
