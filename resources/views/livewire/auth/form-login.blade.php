<div>
    <form class="needs-validation" novalidate wire:submit.prevent="login">
        <div class="mb-4">
            <div class="form-floating">
                <input wire:model="phone" class="form-control" type="text" id="fl-text" placeholder="Your name">
                <label for="fl-text">Номер телефона</label>
                @error('phone') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-5">
            <div class="form-floating">
                <input wire:model="password" class="form-control" type="password" id="fl-text" placeholder="Your name">
                <label for="fl-text">Пароль</label>
                @error('password') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
            </div>
        </div>
        <button class="btn btn-lg btn-primary w-100 text-uppercase" type="submit" wire:target="login" wire:loading.remove>Войти</button>
        <button class="btn btn-lg btn-primary w-100 text-uppercase disabled placeholder placeholder-wave" type="submit" wire:target="login" wire:loading>Войти</button>
    </form>

</div>
