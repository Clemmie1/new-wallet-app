<div>
    <form wire:submit.prevent="sendMoney">
        <div>
            <div class="input-group mb-3">
                <input wire:model="card" type="text" class="form-control form-control-lg" placeholder="Карта WVC">
                <button type="button" class="btn btn-secondary btn-outline-secondary disabled" disabled  wire:target="card" wire:loading>
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>
            </div>
            @error('card') <span class="text-danger fs-sm">{{ $message }}</span> @enderror

            @if(!is_null($target))
                <div wire:ignore>
                    <div class="bg-secondary rounded-3 mb-4">
                        <div class="m-lg-1 p-3">
                            <div class="d-flex align-items-center">
                                <img class="rounded" src="https://ui-avatars.com/api/?name={{substr($target->first_name, 0, 1)}}{{substr($target->last_name, 0, 1)}}&background=0c61cf&color=ffff" width="52" height="42" alt="">
                                <div class="ps-3 fs-sm">
                                    <div class="text-dark fs-lg">{{$target->first_name}} {{substr($target->last_name, 0, 1)}}.</div>
                                    <div class="text-muted">Деньги поступят на Карту</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="mb-3 text-center">
            <input wire:model="sum" class="form-control text-center form-control-lg" type="number" value="0" placeholder="Сумма ₸">
            @error('sum') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
        </div>

        <p class="card-text text-muted text-center">Без комиссии</p>
        <button type="submit" class="btn btn-secondary w-100">ПЕРЕВЕСТИ</button>
    </form>
</div>
