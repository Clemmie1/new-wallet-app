<div>
    <div class="row row-cols-1 row-cols-md-2 g-4" wire:init="loadCards">
        @if(is_null($loadData))
            <div class="col">
                <div class="d-block rounded-3 p-3 p-sm-4 placeholder placeholder-wave" style="height: 132px; width: auto;"></div>
            </div>
            <div class="col">
                <div class="d-block rounded-3 p-3 p-sm-4 placeholder placeholder-wave" style="height: 132px; width: auto;"></div>
            </div>
        @else
            @foreach($loadData as $list)
                <div class="col">
                    <div class="card h-100 rounded-3 p-3 p-sm-4">
                        <div class="d-flex align-items-center pb-2 mb-1">
                            <h3 class="h6 text-nowrap text-truncate mb-0">
                                @if($list->card_blocked)
                                    <span class="badge bg-faded-danger text-danger fs-xs">Закрыта</span>
                                @else
                                    <span class="badge bg-faded-primary text-primary fs-xs">Активна</span>
                                @endif
                            </h3>
                            <div class="d-flex ms-auto">
                                <button class="nav-link fs-xl fw-normal py-1 pe-0 ps-1 ms-2" type="button" data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit" wire:click="getInfo({{$list}})"><i class="ai-edit-alt"></i></button>
                                @if($list->card_blocked)
                                    <button class="nav-link text-success fs-xl fw-normal py-1 pe-0 ps-1 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Открыть карту" wire:click="openCard({{$list->id}})"><i class="ai-lock-open"></i></button>
                                @else
                                    <button class="nav-link text-danger fs-xl fw-normal py-1 pe-0 ps-1 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Закрыть карту" wire:click="closeCard({{$list->id}})"><i class="ai-lock-closed"></i></button>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            @if($list->card_type == "Visa")
                                <svg width="52" height="42" viewBox="0 0 52 42" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.6402 28.2865H18.5199L21.095 12.7244H25.2157L22.6402 28.2865ZM15.0536 12.7244L11.1255 23.4281L10.6607 21.1232L10.6611 21.124L9.27467 14.1256C9.27467 14.1256 9.10703 12.7244 7.32014 12.7244H0.8262L0.75 12.9879C0.75 12.9879 2.73586 13.3942 5.05996 14.7666L8.63967 28.2869H12.9327L19.488 12.7244H15.0536ZM47.4619 28.2865H51.2453L47.9466 12.7239H44.6345C43.105 12.7239 42.7324 13.8837 42.7324 13.8837L36.5873 28.2865H40.8825L41.7414 25.9749H46.9793L47.4619 28.2865ZM42.928 22.7817L45.093 16.9579L46.3109 22.7817H42.928ZM36.9095 16.4667L37.4975 13.1248C37.4975 13.1248 35.6831 12.4463 33.7916 12.4463C31.7469 12.4463 26.8913 13.3251 26.8913 17.5982C26.8913 21.6186 32.5902 21.6685 32.5902 23.7803C32.5902 25.8921 27.4785 25.5137 25.7915 24.182L25.1789 27.6763C25.1789 27.6763 27.0187 28.555 29.8296 28.555C32.6414 28.555 36.8832 27.1234 36.8832 23.2271C36.8832 19.1808 31.1331 18.8041 31.1331 17.0449C31.1335 15.2853 35.1463 15.5113 36.9095 16.4667Z" fill="#2566AF"></path><path d="M10.6611 22.1235L9.2747 15.1251C9.2747 15.1251 9.10705 13.7239 7.32016 13.7239H0.8262L0.75 13.9874C0.75 13.9874 3.87125 14.6235 6.86507 17.0066C9.72766 19.2845 10.6611 22.1235 10.6611 22.1235Z" fill="#E6A540"></path></svg>
                            @else
                                <svg width="52" height="42" viewBox="0 0 52 42" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31.4109 30.6159H20.5938V10.7068H31.4111L31.4109 30.6159Z" fill="#FF5F00"></path><path d="M21.28 20.6617C21.28 16.6232 23.1264 13.0256 26.0016 10.7072C23.8252 8.94968 21.1334 7.99582 18.3618 8.00001C11.5344 8.00001 6 13.6688 6 20.6617C6 27.6547 11.5344 33.3235 18.3618 33.3235C21.1334 33.3277 23.8254 32.3738 26.0018 30.6163C23.1268 28.2983 21.28 24.7005 21.28 20.6617Z" fill="#EB001B"></path><path d="M46.0028 20.6617C46.0028 27.6547 40.4684 33.3235 33.641 33.3235C30.8691 33.3276 28.1768 32.3738 26 30.6163C28.876 28.2979 30.7224 24.7005 30.7224 20.6617C30.7224 16.623 28.876 13.0256 26 10.7072C28.1768 8.94974 30.8689 7.99589 33.6408 8.00001C40.4682 8.00001 46.0026 13.6688 46.0026 20.6617" fill="#F79E1B"></path></svg>
                            @endif

                            <div class="ps-3 fs-sm">
                                <div class="text-dark">{{substr_replace($list->card_number, str_repeat("•", 8), 4, 8)}}</div>
                                <div class="text-muted">На карте {{$list->card_balance}} ₸</div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
                <div class="col">
                    <div class="card h-100 justify-content-center align-items-center border-dashed rounded-3 py-5 px-3 px-sm-4"><a class="stretched-link d-flex align-items-center fw-semibold text-decoration-none" href="#addCard" data-bs-toggle="modal"><i class="ai-circle-plus fs-xl me-2"></i>Создать карту</a></div>
                </div>
        @endif

            @if($modelCC)
                <div class="modal fade show" id="modalCentered" tabindex="-1" role="dialog" aria-modal="true" style="display: block;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Информация о карте</h4>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" wire:click="getInfoClose"></button>
                            </div>
                            <div class="modal-body">
                                @if($infoCC['card_blocked'])
                                    <div class="alert d-flex alert-warning mb-4" role="alert">
                                        <i class="ai-triangle-alert fs-xl pe-1 me-2"></i>
                                        <div>Уважаемый клиент, мы хотели бы сообщить вам, что ваша виртуальная карта была закрыта.</div>
                                    </div>
                                @endif
                                <div class="list-group rounded-1">
                                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        Номер карты
                                        <spa>{{$infoCC['card_number']}}</spa>
                                    </a>
                                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        Тип карты
                                        <spa>{{$infoCC['card_type']}}</spa>
                                    </a>
                                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        Срок действия карты
                                        <spa>{{$infoCC['сard_expiration_Date']}}</spa>
                                    </a>
                                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        CVV карты
                                        <spa>{{$infoCC['сard_cvv']}}</spa>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

    </div>

</div>
