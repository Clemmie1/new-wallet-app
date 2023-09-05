<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormRegister extends Component
{
    public $firstName;
    public $lastName;
    public $phone;
    public $email;
    public $password;

    protected $rules = [
        'firstName' => 'required|max:13',
        'lastName' => 'required|max:13',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
    ];

    protected $messages = [
        'email.required' => 'Введите почту.',
        'email.email' => 'Формат адреса электронной почты недействителен.',

        'firstName.required' => 'Введите имя.',
        'firstName.max' => 'Имя не должно превышать 13 символов.',


        'lastName.required' => 'Введите фомилию.',
        'lastName.max' => 'Фомилия не должно превышать 13 символов.',

        'password.required' => 'Введите пароль.',
        'phone.required' => 'Введите Номер телефона.',
        'phone.min' => 'Формат Номер телефона недействителен.',
        'phone.max' => 'Телефон не должен содержать более 11 символов.',
    ];

    protected $validationAttributes = [
        'firstName' => 'firstName',
        'lastName' => 'lastName',
        'email' => 'email address',
        'password' => 'password',
        'phone' => 'phone',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $this->validate();

        if (User::where('email', $this->email)->exists())
        {
            notyf()
                ->duration(2000)
                ->ripple(true)
                ->addWarning('Почта уже используется');
            return;
        }

        if (User::where('phone', $this->phone)->exists())
        {
            notyf()
                ->duration(2000)
                ->ripple(true)
                ->addWarning('Номер телефона уже используется');
            return;
        }



        $user = new User();

        $user->create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => bcrypt($this->password),
        ]);

        $arr = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        Auth::attempt($arr);
        Auth::login(Auth::user());
        return notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('There was a problem re-activating your account.');
    }

    public function render()
    {
        return view('livewire.auth.form-register');
    }
}
