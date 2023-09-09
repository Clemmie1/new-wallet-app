<div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Кому</th>
            <th>Сумма</th>
            <th>Комментарий</th>
            <th>Дата</th>
        </tr>
        </thead>
        <div wire:init="getLists">
            @if(is_null($loadData))
                <tbody>
                <tr>
                    <th scope="row"><span class="placeholder placeholder-wave rounded col-7"></span></th>
                    <td><span class="placeholder placeholder-wave rounded col-7"></span></td>
                    <td><span class="placeholder placeholder-wave rounded col-8"></span></td>
                    <td><span class="placeholder placeholder-wave rounded col-9"></span></td>
                    <td><span class="placeholder placeholder-wave rounded col-9"></span></td>
                </tr>
                <tr>
                    <th scope="row"><span class="placeholder placeholder-wave rounded col-7"></span></th>
                    <td><span class="placeholder placeholder-wave rounded col-7"></span></td>
                    <td><span class="placeholder placeholder-wave rounded col-8"></span></td>
                    <td><span class="placeholder placeholder-wave rounded col-9"></span></td>
                    <td><span class="placeholder placeholder-wave rounded col-9"></span></td>
                </tr>
                <tr>
                    <th scope="row"><span class="placeholder placeholder-wave rounded col-7"></span></th>
                    <td><span class="placeholder placeholder-wave rounded col-7"></span></td>
                    <td><span class="placeholder placeholder-wave rounded col-8"></span></td>
                    <td><span class="placeholder placeholder-wave rounded col-9"></span></td>
                    <td><span class="placeholder placeholder-wave rounded col-9"></span></td>
                </tr>
                </tbody>
            @else
                @if(!$notFound)
                    @foreach($loadData as $list)
                        <tbody>
                        <tr>
                            <th scope="row">{{$list->id}}</th>
                            <td>+{{\App\Models\User::where('id', $list->recipient_id)->first()->phone}}</td>
                            <td>{{$list->sum}} ₸</td>
                            <td>
                                @if($list->comment == null && $list->comment == '')
                                    -
                                @else
                                    {{$list->comment}}
                                @endif
                            </td>
                            <td data-bs-toggle="tooltip" data-bs-placement="top" title="{{$list->created_at->format('d.m.Y h:i')}}">{{\App\Http\Controllers\TimeController::getTime($list->created_at)}}</td>
                        </tr>
                        </tbody>
                    @endforeach
                @else
                    <p>notFound</p>
                @endif
            @endif
        </div>
    </table>
</div>
