<div>
    <form class="needs-validation" novalidate wire:submit.prevent="register">
        <div class="row row-cols-1 row-cols-sm-2">
            <div class="mb-4">
                <div class="form-floating">
                    <input wire:model="firstName" class="form-control" type="text" id="fl-text" placeholder="Your name">
                    <label for="fl-text">Имя</label>
                    @error('firstName') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-4">
                <div class="form-floating">
                    <input wire:model="lastName" class="form-control" type="text" id="fl-text" placeholder="Your name">
                    <label for="fl-text">Фамилия</label>
                    @error('lastName') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mb-4">
            <div class="form-floating">
                <input wire:model="phone" class="form-control" type="number" id="fl-text" placeholder="Your name">
                <label for="fl-text">Номер телефона</label>
                @error('phone') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-4">
            <div class="form-floating">
                <input wire:model="email" class="form-control" type="email" id="fl-text" placeholder="Your name">
                <label for="fl-text">Почта</label>
                @error('email') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-4">
            <div class="form-floating">
                <input wire:model="password" class="form-control" type="password" id="fl-text" placeholder="Your name">
                <label for="fl-text">Пароль</label>
                @error('password') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
            </div>
        </div>
        <button class="btn btn-lg btn-primary w-100 text-uppercase" type="submit" wire:target="register" wire:loading.remove>Войти</button>
        <button class="btn btn-lg btn-primary w-100 text-uppercase disabled placeholder placeholder-wave" type="button" wire:target="register" wire:loading>Войти</button>
    </form>

</div>
