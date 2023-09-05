<div>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            @if(!$load)
                <div>
                    <div class="modal-header border-0">
                        <h4 class="modal-title">Выпустить карту</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <br>
                    <img class="mb-4" src="{{asset('assets/card.png')}}" >
                    <div class="accordion" id="accordionDefault">
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Что такое виртуальная карта</button>
                            </h3>
                            <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionDefault">
                                <div class="accordion-body fs-sm">
                                    Это просто реквизиты, которые выпускаются мгновенно: номер карты, срок действия и CVV-код. На карте нет имени держателя — укажите свое, если при оплате это поле обязательное.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Условия и тарифы</button>
                            </h3>
                            <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionDefault">
                                <div class="accordion-body fs-sm">
                                    <div class="list-group rounded-1">
                                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            Выпуск
                                            <spa>бесплатно</spa>
                                        </a>
                                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            Срок действия карты
                                            <spa>1-9 лет</spa>
                                        </a>
                                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            Пополнение
                                            <spa>бесплатно</spa>
                                        </a>
                                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            Обслуживание карты
                                            <spa>бесплатно</spa>
                                        </a>
                                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            Комиссия при оплате по РК
                                            <spa>0%</spa>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary w-100 text-uppercase" wire:click="createCard">Выпустить</button>
                    </div>
                </div>
            @else
                <div class="text-center fs-sm">
                    <img src="https://cdn.pixabay.com/animation/2022/07/29/03/42/03-42-11-849_512.gif" class="mb-4">
                    <span class="text-muted text-center">Выпуск карты WVC...<br>Пожалуйста, подождите, и не перезагружайте страницу.</span>
                    <br>
                    <br>
                </div>
            @endif

        </div>
    </div>
</div>
