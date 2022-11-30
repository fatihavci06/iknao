<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark navbar-glass-shadow"  style="background-image: none; background-color: #000f3d!important; transition: none 0s ease 0s;">
        <div class="container">
            <a class="navbar-brand" href="{{route('front.index')}}">
                <img style="max-width:255px;"  src="{{asset('tema/public/')}}/beyaz-png.png">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse scrollbar mt-2" id="navbarStandard">
                <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">
                    @guest

                    <li class="nav-item">
                        <a class="nav-link" style="font-size:18px;color:#fff;" href="{{route('front.index')}}"  >Anasayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-size:18px;color:#fff;" href="{{route('front.ilan')}}"  >İlanlar</a>
                    </li>
                    @endguest
                </ul>
                <ul class="navbar-nav ms-auto">


                    @auth

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dashboards">{{Auth::user()->firstname}}</a>
                            <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="dashboards">
                                <div class="bg-white dark__bg-1000 rounded-3 py-2">
                                    <a class="dropdown-item link-600 fw-medium" style="font-size:18px;color:#fff;" href="{{route('front.edit')}}">Profilim</a>

                                    <a class="dropdown-item link-600 fw-medium" style="font-size:18px;color:#fff;" href="{{route('front.logout')}}">Çıkış</a>

                                </div>
                            </div>
                        </li>


                    @else
                        <li class="nav-item">
                            <a class="nav-link" style="font-size:18px;color:#fff;" href="{{route('front.yenibasvuru')}}"  >Yeni Başvuru</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size:18px;color:#fff;" href="{{route('front.giris')}}"  >Giriş yap</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="row text-start justify-content-between align-items-center mb-2">
                        <div class="col-auto">
                            <h5 id="modalLabel">Yeni Başvuru</h5>
                        </div>
                        <div class="col-auto">
                            <p class="fs--1 text-600 mb-0">Have an account? <a href="{{asset('tema/public/')}}pages/authentication/simple/login.html">Giriş</a>
                            </p>
                        </div>
                    </div>
                    <form>
                        <div class="mb-3">
                            <input class="form-control" type="text" autocomplete="on" placeholder="Name" />
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="number" autocomplete="on" placeholder="Email address" />
                        </div>
                        <div class="row gx-2">
                            <div class="mb-3 col-sm-6">
                                <input class="form-control" type="password" autocomplete="on" placeholder="Password" />
                            </div>
                            <div class="mb-3 col-sm-6">
                                <input class="form-control" type="password" autocomplete="on" placeholder="Confirm Password" />
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="modal-register-checkbox" />
                            <label class="form-label" for="modal-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a>
                            </label>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Yeni Başvuru</button>
                        </div>
                    </form>
                    <div class="position-relative mt-4">Y
                        <hr />
                        <div class="divider-content-center">or register with</div>
                    </div>
                    <div class="row g-2 mt-2">
                        <div class="col-sm-6">
                            <a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#">
                                <span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-outline-facebook btn-sm d-block w-100" href="#">
                                <span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
