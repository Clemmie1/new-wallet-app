<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormLogin extends Component
{

    public $phone;
    public $password;

    protected $rules = [
        'password' => 'required|min:6',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
    ];

    protected $messages = [
        'password.required' => 'Введите пароль.',
        'phone.required' => 'Введите Номер телефона.',
        'phone.min' => 'Формат Номер телефона недействителен.',
        'phone.max' => 'Телефон не должен содержать более 11 символов.',
    ];

    protected $validationAttributes = [
        'password' => 'password',
        'phone' => 'phone',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $this->validate();

        $arr = [
            'phone' => $this->phone,
            'password' => $this->password,
        ];

        if (Auth::attempt($arr)){
            $user = Auth::user();

            if (!$user->blocked){
                Auth::login(Auth::user());
                return $this->redirect(route('wallet.home'));
            } else {
                return notyf()
                    ->duration(2000)
                    ->ripple(true)
                    ->addError('Аккаунт заблокирован');
            }
        } else {
            return notyf()
                ->duration(2000)
                ->ripple(true)
                ->addWarning('Неправильные учетные данные');
        }
    }

    public function render()
    {
        return view('livewire.auth.form-login');
    }
}
