<?php

namespace App\Http\Livewire\Wallet;

use App\Models\Api;
use App\Models\Card;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateNewApi extends Component
{

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
            ->addWarning('Ключ #' . $this->keyID . ' удалён');
        return redirect(route('wallet.home'));
    }

    public function createApi()
    {
        sleep(1);
        Api::create([
            'owner_id' => Auth::user()->id,
            'api_key' => Uuid::uuid4(),
        ]);

        notyf()
            ->ripple(true)
            ->addSuccess('Ключ создан');

        return $this->redirect(route('wallet.home'));
    }

    public function delKey($id){
        $this->keyID = $id;
        return sweetalert()
            ->showCancelButton()
            ->confirmButtonText('Да')
            ->cancelButtonText('Отмена')
            ->addInfo('Вы действительно хотите удалить Ключ #'.$id.'?');
    }


    public function render()
    {
        return view('livewire.wallet.create-new-api');
    }
}
