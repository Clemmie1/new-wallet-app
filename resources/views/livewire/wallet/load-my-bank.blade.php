<div>
    <div class="row g-3 g-xl-4" wire:init="loadBank">
        @if($loadData)
            <div class="col-md-4 col-sm-6">
                <div class="d-block placeholder placeholder-wave rounded-3" style="height: 110.59px;"></div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="d-block placeholder placeholder-wave rounded-3" style="height: 110.59px;"></div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="d-block placeholder placeholder-wave rounded-3" style="height: 110.59px;"></div>
            </div>
        @else
            <div class="col-md-4 col-sm-6">
                <div class="h-100 bg-secondary rounded-3 text-center p-4">
                    <div class="h4 text-primary mb-2">{{$balance}}₸</div>
                    <p class="fs-sm text-muted mb-0">баланс</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="h-100 bg-secondary rounded-3 text-center p-4">
                    <div class="h4 text-primary mb-2">{{$replenishment}}</div>
                    <p class="fs-sm text-muted mb-0">пополнений</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="h-100 bg-secondary rounded-3 text-center p-4">
                    <div class="h4 text-primary mb-2">{{$translations}}</div>
                    <p class="fs-sm text-muted mb-0">переводы</p>
                </div>
            </div>
        @endif
    </div>
</div>
