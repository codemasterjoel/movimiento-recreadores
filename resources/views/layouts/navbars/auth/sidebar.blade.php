<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 pb-2" id="sidenav-main" style="overflow-y: hidden;">
    <div class="sidenav-header mb-12">
        <i class="fas fa-times p-3 cursor-pointer text-seconsdary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="py-4">
            <img src="{{asset('img/logo.png')}}" class="">
        </a>
    </div>
    <div class=" navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            {{-- INICIO --}}    
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <span class="material-icons {{ in_array(request()->route()->getName(),['dashboard']) ? 'text-white' : 'text-dark' }}">home</span>
                    </div>
                    <span class="nav-link-text ms-1"><b>INICIO</b></span>
                </a>
            </li>
            {{-- REGISTRO DE LSB --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'recreador' ? 'active' : '' }}" href="{{route('recreador')}}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons {{ in_array(request()->route()->getName(),['recreador']) ? 'text-white' : 'text-dark' }}">person</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>RECREADORES</b></span>
                    </a>
                </li>
            {{-- REGISTRO DE NBC --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'nbc' ? 'active' : '' }}" href="{{route('nbc')}}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons {{ in_array(request()->route()->getName(),['nbc']) ? 'text-white' : 'text-dark' }}">groups</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>ESTRUCTURA</b></span>
                    </a>
                </li>
             
            @if (auth()->user()->nivel_id == 1)
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'formacion' ? 'active' : '' }}" href="{{route('formacion')}}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons {{ in_array(request()->route()->getName(),['formacion']) ? 'text-white' : 'text-dark' }}">auto_stories</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>FORMACIÓN</b></span>
                    </a>
                </li>  
            @endif

            @if (auth()->user()->nivel_id == 1)
            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">CONFIGURACIÓN</h6>
            </li>
            @endif
                @if (auth()->user()->nivel_id == 1)
            @endif
            <li class="nav-item">
                <a href="{{ url('logout') }}" class=" nav-link btn bg-gradient-danger active text-white" role="button" aria-pressed="true">Salir</a>
            </li>
        </ul>
    </div>
</aside>
