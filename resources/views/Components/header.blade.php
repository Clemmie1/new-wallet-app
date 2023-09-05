<header class="navbar navbar-expand-lg fixed-top">
    <div class="container"><a class="navbar-brand pe-sm-3" href="index.html"><span class="text-primary flex-shrink-0 me-2">
              <svg version="1.1" width="35" height="32" viewBox="0 0 36 33" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M35.6,29c-1.1,3.4-5.4,4.4-7.9,1.9c-2.3-2.2-6.1-3.7-9.4-3.7c-3.1,0-7.5,1.8-10,4.1c-2.2,2-5.8,1.5-7.3-1.1c-1-1.8-1.2-4.1,0-6.2l0.6-1.1l0,0c0.6-0.7,4.4-5.2,12.5-5.7c0.5,1.8,2,3.1,3.9,3.1c2.2,0,4.1-1.9,4.1-4.2s-1.8-4.2-4.1-4.2c-2,0-3.6,1.4-4,3.3H7.7c-0.8,0-1.3-0.9-0.9-1.6l5.6-9.8c2.5-4.5,8.8-4.5,11.3,0L35.1,24C36,25.7,36.1,27.5,35.6,29z"></path>
              </svg></span>Around</a>
        <div class="form-check form-switch mode-switch order-lg-2 me-3 me-lg-4 ms-auto" data-bs-toggle="mode">
            <input class="form-check-input" type="checkbox" id="theme-mode">
            <label class="form-check-label" for="theme-mode"><i class="ai-sun fs-lg"></i></label>
            <label class="form-check-label" for="theme-mode"><i class="ai-moon fs-lg"></i></label>
        </div>
        <!-- User signed in state. Account dropdown on screens > 576px-->
        <div class="dropdown nav d-none d-sm-block order-lg-3"><a class="nav-link d-flex align-items-center p-0" href="#" data-bs-toggle="dropdown" aria-expanded="false"><img class="border rounded-circle" src="https://ui-avatars.com/api/?name={{substr(\Illuminate\Support\Facades\Auth::user()->first_name, 0,1)}}{{substr(\Illuminate\Support\Facades\Auth::user()->last_name, 0,1)}}&background=0c61cf&color=ffff" width="48" alt="{{\Illuminate\Support\Facades\Auth::user()->first_name}}">
                <div class="ps-2">
                    <div class="fs-xs lh-1 opacity-60">Привет,</div>
                    <div class="fs-sm dropdown-toggle">{{\Illuminate\Support\Facades\Auth::user()->first_name}}</div>
                </div></a>
            <div class="dropdown-menu dropdown-menu-end my-1">
                <a class="dropdown-item" href="{{route('wallet.home')}}"><i class="ai-dollar fs-lg opacity-70 me-2"></i>Мой банк</a>
                <a class="dropdown-item" href="{{route('wallet.transfer')}}"><i class="ai-send fs-lg opacity-70 me-2"></i>Переводы</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" onclick="location.href='{{route('auth.logout')}}'"><i class="ai-logout fs-lg opacity-70 me-2"></i>Выйти</a>
            </div>
        </div>
        <button class="navbar-toggler ms-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
        <nav class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav navbar-nav-scroll me-auto" style="--ar-scroll-height: 520px;">
                <li class="nav-item"><a class="nav-link" href="{{route('wallet.home')}}">Мой банк</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('wallet.transfer')}}">Переводы</a></li>
                <li class="nav-item dropdown d-sm-none border-top mt-2 pt-2"><a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false"><img class="border rounded-circle" src="https://ui-avatars.com/api/?name={{\Illuminate\Support\Facades\Auth::user()->first_name}}&background=0c61cf&color=ffff" width="48" alt="{{\Illuminate\Support\Facades\Auth::user()->first_name}}">
                        <div class="ps-2">
                            <div class="fs-xs lh-1 opacity-60">Привет,</div>
                            <div class="fs-sm dropdown-toggle">{{\Illuminate\Support\Facades\Auth::user()->first_name}}</div>
                        </div></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('wallet.home')}}"><i class="ai-dollar fs-lg opacity-70 me-2"></i>Мой банк</a>
                        <a class="dropdown-item" href="{{route('wallet.transfer')}}"><i class="ai-send fs-lg opacity-70 me-2"></i>Переводы</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" onclick="location.href='{{route('auth.logout')}}'"><i class="ai-logout fs-lg opacity-70 me-2"></i>Выйти</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
