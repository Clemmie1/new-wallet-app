<div>
    <div wire:init="getApiList">
        @if(is_null($loadData))
            <div class="d-block placeholder placeholder-wave rounded mb-4" style="width: auto; height: 90px;"></div>
            <div class="d-block placeholder placeholder-wave rounded mb-4" style="width: auto; height: 90px;"></div>
            <div class="d-block placeholder placeholder-wave rounded mb-4" style="width: auto; height: 90px;"></div>
        @else
            @if(!$notFound)
              @foreach($loadData as $list)
                    <div class="col mb-4">
                        <div class="card h-100 rounded-3 p-3 p-sm-4">
                            <div class="d-flex align-items-center pb-2 mb-1">
                                <h6 class="h6 text-nowrap text-truncate mb-0"><span class="badge bg-secondary fs-sm">{{\App\Http\Controllers\TimeController::getTime($list->created_at)}}</span></h6>
                                <div class="d-flex ms-auto">
                                    <button class="nav-link fs-xl fw-normal py-1 pe-0 ps-1 ms-2" onclick="copyContent()"><i class="ai-copy"></i></button>
                                    <button class="nav-link text-danger fs-xl fw-normal py-1 pe-0 ps-1 ms-2" wire:click="deleteKey({{$list->id}})"><i class="ai-trash"></i></button>
                                </div>
                            </div>
                            <p class="mb-0" id="myInput">KEY: {{$list->api_key}}</p>
                        </div>
                    </div>
              @endforeach
            @else
                <div class="py3">
                    <p class="text-center">notFound</p>
                </div>
            @endif
        @endif
    </div>
    <script>
        let text = document.getElementById('myInput').innerHTML;
        alert(text);
        // const copyContent = async () => {
        //     try {
        //         await navigator.clipboard.writeText(text);
        //         console.log('Content copied to clipboard');
        //     } catch (err) {
        //         console.error('Failed to copy: ', err);
        //     }
        // }
    </script>
</div>
