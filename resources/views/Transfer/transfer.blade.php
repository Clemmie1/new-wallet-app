
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Переводы</title>

    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">
    <link rel="mask-icon" color="#6366f1" href="{{asset('assets/favicon/safari-pinned-tab.svg')}}">
    <meta name="msapplication-TileColor" content="#080032">
    <meta name="msapplication-config" content="{{asset('assets/favicon/browserconfig.xml')}}">
    <meta name="theme-color" content="white">
    <!-- Theme mode-->
    <script>
        let mode = window.localStorage.getItem('mode'),
            root = document.getElementsByTagName('html')[0];
        if (mode !== undefined && mode === 'dark') {
            root.classList.add('dark-mode');
        } else {
            root.classList.remove('dark-mode');
        }


    </script>
    <!-- Page loading styles-->
    <style>
        .page-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: all .4s .2s ease-in-out;
            transition: all .4s .2s ease-in-out;
            background-color: #fff;
            opacity: 0;
            visibility: hidden;
            z-index: 9999;
        }
        .dark-mode .page-loading {
            background-color: #121519;
        }
        .page-loading.active {
            opacity: 1;
            visibility: visible;
        }
        .page-loading-inner {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
            opacity: 0;
        }
        .page-loading.active > .page-loading-inner {
            opacity: 1;
        }
        .page-loading-inner > span {
            display: block;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: normal;
            color: #6f788b;
        }
        .dark-mode .page-loading-inner > span {
            color: #fff;
            opacity: .6;
        }
        .page-spinner {
            display: inline-block;
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: .75rem;
            vertical-align: text-bottom;
            background-color: #d7dde2;
            border-radius: 50%;
            opacity: 0;
            -webkit-animation: spinner .75s linear infinite;
            animation: spinner .75s linear infinite;
        }
        .dark-mode .page-spinner {
            background-color: rgba(255,255,255,.25);
        }
        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            }
            50% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }
        @keyframes spinner {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            }
            50% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }

    </style>
    <!-- Page loading scripts-->
    <script>
        (function () {
            window.onload = function () {
                const preloader = document.querySelector('.page-loading');
                preloader.classList.remove('active');
                setTimeout(function () {
                    preloader.remove();
                }, 1500);
            };
        })();

    </script>
    <!-- Import Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet" id="google-font">
    <!-- Vendor styles-->
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{asset('assets/css/theme.min.css')}}">
    <!-- Customizer generated styles-->
    @livewireStyles
</head>
<!-- Body-->
<body class="bg-secondary">

<!-- Page loading spinner-->
{{--<div class="page-loading active">
    <div class="page-loading-inner">
        <div class="page-spinner"></div>
    </div>
</div>--}}

<main class="page-wrapper">

    @include('Components.header')

    <div class="modal fade" id="addCard" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Add new card</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="modal-body needs-validation pt-0" novalidate>
                    <div class="mb-4">
                        <label class="form-label" for="card-name">Name on card</label>
                        <input class="form-control" type="text" placeholder="John Doe" required id="card-name">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="card-number">Card number</label>
                        <div class="input-group">
                            <input class="form-control" type="text" data-format="{&quot;creditCard&quot;: true}" placeholder="XXXX XXXX XXXX XXXX" required id="card-number">
                            <div class="input-group-text py-0">
                                <div class="credit-card-icon"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-2 g-4 pb-2 pb-sm-3 mb-4">
                        <div class="col">
                            <label class="form-label" for="card-expiration">Expiration date</label>
                            <input class="form-control" type="text" data-format="{&quot;date&quot;: true, &quot;datePattern&quot;: [&quot;m&quot;, &quot;y&quot;]}" placeholder="MM/YY" required id="card-expiration">
                        </div>
                        <div class="col">
                            <label class="form-label" for="card-cvv">CVV Code</label>
                            <input class="form-control" type="text" data-format="{&quot;numericOnly&quot;: true, &quot;blocks&quot;: [3]}" placeholder="XXX" required id="card-cvv">
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-sm-row">
                        <button class="btn btn-secondary mb-3 mb-sm-0" type="reset" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary ms-sm-3" type="submit">Save new card</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add new address modal-->
    <div class="modal fade" id="addAddress" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Add new address</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="modal-body needs-validation pt-0" novalidate>
                    <div class="alert alert-warning d-flex mb-4"><i class="ai-triangle-alert fs-xl me-2"></i>
                        <p class="mb-0">Updating your address may affect your <a href='#' class='alert-link'>Tax Location</a></p>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 g-4 pb-2 pb-sm-3 mb-4">
                        <div class="col">
                            <label class="form-label" for="country">Country</label>
                            <select class="form-select" required id="country">
                                <option value="" disabled selected>Select a country</option>
                                <option value="Australia">Australia</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Canada">Canada</option>
                                <option value="Denmark">Denmark</option>
                                <option value="USA">USA</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label" for="city">City</label>
                            <select class="form-select" required id="city">
                                <option value="" disabled selected>Select a city</option>
                                <option value="Sydney">Sydney</option>
                                <option value="Brussels">Brussels</option>
                                <option value="Toronto">Toronto</option>
                                <option value="Copenhagen">Copenhagen</option>
                                <option value="New York">New York</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label" for="state">State</label>
                            <select class="form-select" required id="state">
                                <option value="" disabled selected>Select a state</option>
                                <option value="Arizona">Arizona</option>
                                <option value="California">California</option>
                                <option value="Florida">Florida</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Texas">Texas</option>
                                <option value="Virginia">Virginia</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label" for="address1">Address line 1</label>
                            <input class="form-control" type="text" required id="address1">
                        </div>
                        <div class="col">
                            <label class="form-label" for="address2">Address line 2</label>
                            <input class="form-control" type="text" id="address2">
                        </div>
                        <div class="col">
                            <label class="form-label" for="postcode">Post code</label>
                            <input class="form-control" type="text" data-format="{&quot;delimiter&quot;: &quot;-&quot;, &quot;blocks&quot;: [3, 4], &quot;uppercase&quot;: true}" placeholder="XXX-XXXX" id="postcode">
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="set-primary">
                                <label class="form-check-label text-dark fw-medium" for="set-primary">Set as primary billing address</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-sm-row">
                        <button class="btn btn-secondary mb-3 mb-sm-0" type="reset" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary ms-sm-3" type="submit">Save address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">
        <div class="row pt-sm-2 pt-lg-0 justify-content-center d-flex">

            <div class="col-lg-7 pt-4 pb-2 pb-sm-4">
                <!-- Payment methods-->
                {{--                <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4 mb-4">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                                            <i class="ai-dollar text-primary lead pe-1 me-2"></i>
                                            <h2 class="h4 mb-0">Мой Банк</h2>
                                        </div>
                                        <div class="row g-3 g-xl-4">
                                            <div class="col-md-4 col-sm-6">
                                                <div class="h-100 bg-secondary rounded-3 text-center p-4">
                                                    <div class="h2 text-primary mb-2">0.00₸</div>
                                                    <p class="fs-sm text-muted mb-0">баланс</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="h-100 bg-secondary rounded-3 text-center p-4">
                                                    <div class="h2 text-primary mb-2">0</div>
                                                    <p class="fs-sm text-muted mb-0">пополнений</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="h-100 bg-secondary rounded-3 text-center p-4">
                                                    <div class="h2 text-primary mb-2">0</div>
                                                    <p class="fs-sm text-muted mb-0">переводы</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>--}}

                <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                            <i class="ai-dollar text-primary lead pe-1 me-2"></i>
                            <h2 class="h4 mb-0">Клиенту Wallet</h2>
                        </div>
                        <div class="g-3 g-xl-4">
                            <ul class="nav nav-pills text-center d-flex justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a href="#sendToPhone" class="nav-link active" id="pills-home" data-bs-toggle="pill" role="tab" aria-controls="home" aria-selected="true">
                                        <i class="ai-phone me-2"></i>
                                        Телефон
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#sendToCard" class="nav-link" id="pills-profile" data-bs-toggle="pill" role="tab" aria-controls="profile" aria-selected="false">
                                        <i class="ai-card me-2"></i>
                                        Карта
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="sendToPhone" class="tab-pane fade show active" role="tabpanel" aria-labelledby="pills-home">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Перевод на Кошелек</h4>
                                            @livewire('transfer.send-to-phone')
                                        </div>
                                    </div>
                                </div>
                                <div id="sendToCard" class="tab-pane fade" role="tabpanel" aria-labelledby="pills-profile">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Перевод на Карту WVC</h4>
                                            @livewire('transfer.send-to-card')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Billing address-->

            </div>
        </div>
    </div>
</main>
<!-- Footer-->
@include('Components.footer')
<!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll>
    <svg viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <circle cx="20" cy="20" r="19" fill="none" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></circle>
    </svg><i class="ai-arrow-up"></i></a>
<!-- Vendor scripts: js libraries and plugins-->
@livewireScripts
<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}}"></script>
<script src="{{asset('assets/vendor/cleave.js/dist/cleave.min.js')}}"></script>
<!-- Main theme script-->
<script src="{{asset('assets/js/theme.min.js')}}"></script>
<!-- Customizer-->
<script>
    function setComment(text) {
        document.getElementById('fl-text').value = text;
    }
</script>
</body>
</html>
