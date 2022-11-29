@extends('layouts.front.master')
@section('style')
    <style>
        h1 {
            text-align: center;
        }
        h2 {
            margin: 0;
        }
        #multi-step-form-container {
            margin-top: 5rem;
        }
        .text-center {
            text-align: center;
        }
        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }
        .pl-0 {
            padding-left: 0;
        }
        .button {
            padding: 0.7rem 1.5rem;
            border: 1px solid #4361ee;
            background-color: #4361ee;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-btn {
            border: 1px solid #0e9594;
            background-color: #0e9594;
        }
        .mt-3 {
            margin-top: 2rem;
        }
        .d-none {
            display: none;
        }
        .form-step {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            padding: 3rem;
        }
        .font-normal {
            font-weight: normal;
        }
        ul.form-stepper {
            counter-reset: section;
            margin-bottom: 3rem;
        }
        ul.form-stepper .form-stepper-circle {
            position: relative;
        }
        ul.form-stepper .form-stepper-circle span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateY(-50%) translateX(-50%);
        }
        .form-stepper-horizontal {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }
        ul.form-stepper > li:not(:last-of-type) {
            margin-bottom: 0.625rem;
            -webkit-transition: margin-bottom 0.4s;
            -o-transition: margin-bottom 0.4s;
            transition: margin-bottom 0.4s;
        }
        .form-stepper-horizontal > li:not(:last-of-type) {
            margin-bottom: 0 !important;
        }
        .form-stepper-horizontal li {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: start;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }
        .form-stepper-horizontal li:not(:last-child):after {
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            height: 1px;
            content: "";
            top: 32%;
        }
        .form-stepper-horizontal li:after {
            background-color: #dee2e6;
        }
        .form-stepper-horizontal li.form-stepper-completed:after {
            background-color: #4da3ff;
        }
        .form-stepper-horizontal li:last-child {
            flex: unset;
        }
        ul.form-stepper li a .form-stepper-circle {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-right: 0;
            line-height: 1.7rem;
            text-align: center;
            background: rgba(0, 0, 0, 0.38);
            border-radius: 50%;
        }
        .form-stepper .form-stepper-active .form-stepper-circle {
            background-color: #4361ee !important;
            color: #fff;
        }
        .form-stepper .form-stepper-active .label {
            color: #4361ee !important;
        }
        .form-stepper .form-stepper-active .form-stepper-circle:hover {
            background-color: #4361ee !important;
            color: #fff !important;
        }
        .form-stepper .form-stepper-unfinished .form-stepper-circle {
            background-color: #f8f7ff;
        }
        .form-stepper .form-stepper-completed .form-stepper-circle {
            background-color: #0e9594 !important;
            color: #fff;
        }
        .form-stepper .form-stepper-completed .label {
            color: #0e9594 !important;
        }
        .form-stepper .form-stepper-completed .form-stepper-circle:hover {
            background-color: #0e9594 !important;
            color: #fff !important;
        }
        .form-stepper .form-stepper-active span.text-muted {
            color: #fff !important;
        }
        .form-stepper .form-stepper-completed span.text-muted {
            color: #fff !important;
        }
        .form-stepper .label {
            font-size: 1rem;
            margin-top: 0.5rem;
        }
        .form-stepper a {
            cursor: default;
        }
    </style>
@endsection
@section('content')
    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <section class="py-0 overflow-hidden light" id="banner">

        <div class="bg-holder overlay" style="background-image:url({{asset('tema/public/')}}/assets/img/generic/bg-1.jpg);background-position: center bottom;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
            <div class="row flex-center pt-8 pt-lg-10 pb-lg-9 pb-xl-0">
                <div class="col-md-11 col-lg-8 col-xl-4 pb-7 pb-xl-9 text-center text-xl-start"><a class="btn btn-outline-danger mb-4 fs--1 border-2 rounded-pill" href="#!"><span class="me-2" role="img" aria-label="Gift">🎁</span>Become a pro</a>
                    <h1 class="text-white fw-light">Bring <span class="typed-text fw-bold" data-typed-text='["design","beauty","elegance","perfection"]'></span><br />to your webapp</h1>
                    <p class="lead text-white opacity-75">With the power of Falcon, you can now focus only on functionaries for your digital products, while leaving the UI design on us!</p><a class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2" href="#!">Start building with the falcon<span class="fas fa-play ms-2" data-fa-transform="shrink-6 down-1"></span></a>
                </div>
                <div class="col-xl-7 offset-xl-1 align-self-end mt-4 mt-xl-0"><!--<a class="img-landing-banner rounded" href="{{asset('tema/public/')}}index.html"><img class="img-fluid" src="{{asset('tema/public/')}}/assets/img/generic/dashboard-alt.jpg" alt="" /></a></div> -->
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-3 bg-light shadow-sm ">

        <div class="container mt-5">
            <div class="row">
                <h1 style="margin-bottom: -30px;">Yeni Başvuru</h1>
                <div id="multi-step-form-container" class="col-lg-12 col-sm-12 col-xs-12">
                    <!-- Form Steps / Progress Bar -->
                    <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                        <!-- Step 1 -->
                        <li class="form-stepper-active text-center form-stepper-list" step="1">
                            <a class="mx-2">
                                <span class="form-stepper-circle">
                                    <span>1</span>
                                </span>
                                <div class="label">Üyelik Bilgileri</div>
                            </a>
                        </li>
                        <!-- Step 2 -->
                        <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                            <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>2</span>
                    </span>
                                <div class="label text-muted">Kampüs Tercihleri</div>
                            </a>
                        </li>
                        <!-- Step 3 -->
                        <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                            <a class="mx-2">
                                <span class="form-stepper-circle text-muted">
                                    <span>3</span>
                                </span>
                                <div class="label text-muted">İletişim Bilgileri</div>
                            </a>
                        </li>
                        <li class="form-stepper-unfinished text-center form-stepper-list" step="4">
                            <a class="mx-2">
                                <span class="form-stepper-circle text-muted">
                                    <span>4</span>
                                </span>
                                <div class="label text-muted">Genel Bilgiler</div>
                            </a>
                        </li>
                        <li class="form-stepper-unfinished text-center form-stepper-list" step="5">
                            <a class="mx-2">
                                <span class="form-stepper-circle text-muted">
                                    <span>5</span>
                                </span>
                                <div class="label text-muted">Eğitim Bilgileri</div>
                            </a>
                        </li>
                        <li class="form-stepper-unfinished text-center form-stepper-list" step="6">
                            <a class="mx-2">
                                <span class="form-stepper-circle text-muted">
                                    <span>6</span>
                                </span>
                                <div class="label text-muted">Deneyimler</div>
                            </a>
                        </li>
                        <li class="form-stepper-unfinished text-center form-stepper-list" step="7">
                            <a class="mx-2">
                                <span class="form-stepper-circle text-muted">
                                    <span>7</span>
                                </span>
                                <div class="label text-muted">Nitelikler</div>
                            </a>
                        </li>
                        <li class="form-stepper-unfinished text-center form-stepper-list" step="8">
                            <a class="mx-2">
                                <span class="form-stepper-circle text-muted">
                                    <span>8</span>
                                </span>
                                <div class="label text-muted">Referanslar</div>
                            </a>
                        </li>
                    </ul>
                    <!-- Step Wise Form Content -->
                    <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST" action="{{route('front.basvurukayit')}}">
                        <!-- Step 1 Content -->
                        @csrf
                        <section id="step-1" class="form-step">
                                                        <!-- Step 1 input fields -->
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="container">
                                        <label for="avatar">Vesikalık</label>
                                        <input type="file" name="avatar" id="avatar" class="form-control">
                                        </div>
                                        <div class="container mt-4">
                                            <label for="tc">Tc Kimlik Numarası</label>
                                            <input type="text" name="tc" id="tc" class="form-control">
                                        </div>
                                        <div class="container mt-4">
                                            <label for="brans">Branş</label>
                                            <select id="brans" name="brans" class="form-select">
                                                @foreach($brans as $b)
                                                <option>{{$b->brans_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">


                                        <div class="container">
                                            <label for="firstname">Adınız</label>
                                            <input type="text" id="firstname" name="firstname" class="form-control">
                                        </div>
                                        <div class="container mt-4">
                                            <label for="lastname">Soyadınız</label>
                                            <input type="text" id="lastname" name="lastname" class="form-control">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="ml-2 mt-4 container">
                                <button class="button btn-navigate-form-step "  type="button" step_number="2">İleri</button>
                            </div>
                        </section>
                        <!-- Step 2 Content, default hidden on page load. -->
                        <section id="step-2" class="form-step d-none">

                            <!-- Step 2 input fields -->
                            <div class="container mt-4">

                                    <div class="col-lg-6">
                                        <label for="birtercih">1.Tercih</label>
                                        <select id="birtercih" name="birtercih" class="form-select">
                                            <option value="">Seçiniz</option>
                                            @foreach($campus as $c)
                                                <option value="{{$c->id}}">{{$c->campus_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                            </div>
                            <div class="container mt-4">

                                <div class="col-lg-6">
                                    <label for="ikitercih" >2.Tercih</label>
                                    <select id="ikitercih" name="ikitercih" class="form-select">
                                        <option value="">Seçiniz</option>
                                        @foreach($campus as $c)
                                            <option value="{{$c->id}}">{{$c->campus_name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>
                            <div class="container mt-4">

                                <div class="col-lg-6">
                                    <label for="uctercih">3.Tercih</label>
                                    <select id="uctercih" name="uctercih" class="form-select">
                                        <option value="">Seçiniz</option>
                                        @foreach($campus as $c)
                                            <option value="{{$c->id}}">{{$c->campus_name}}</option>
                                        @endforeach

                                    </select>

                                </div>

                            </div>
                            <div class="mt-4 container">
                                <button class="button btn-navigate-form-step" type="button" step_number="1">Geri</button>
                                <button class="button btn-navigate-form-step" type="button" step_number="3">İleri</button>
                            </div>
                        </section>
                        <section id="step-3" class="form-step d-none">

                            <!-- Step 2 input fields -->
                            <div class=" mt-4">
                                <div class="col-lg-6">


                                    <div class="container">
                                        <label for="cepno">Cep Telefonu <span style="color:red;">( Başında 0 olmadan 10 haneli olarak yazınız. )</span></label>
                                        <input type="text" id="cepno" name="cepno" class="form-control">
                                    </div>
                                    <div class="container mt-1">
                                        <label for="adres">Adres</label>
                                        <textarea id="adres" name="adres" class="form-control"></textarea>
                                    </div>
                                    <div class="container mt-1">
                                        <label for="eposta">Eposta</label>
                                        <input type="text"  name="eposta" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="mt-4 container">
                                <button class="button btn-navigate-form-step" type="button" step_number="2">Geri</button>
                                <button class="button btn-navigate-form-step" type="button" step_number="4">İleri</button>
                            </div>
                        </section>
                        <section id="step-4" class="form-step d-none">

                            <!-- Step 2 input fields -->
                            <div class="mt-4 row ">
                                <div class="col-lg-6">
                                    <div class="container">
                                        <label for="cinsiyet">Cinsiyet</label>
                                        <select name="cinsiyet" id="cinsiyet" class="form-control">
                                            <option value="">Seçiniz</option>
                                            <option value="Erkek">Erkek</option>
                                            <option value="Kadın">Kadın</option>
                                        </select>
                                        <label for="dtarihi" class="mt-4">Doğum Tarihi</label>
                                        <input type="date"  id="dtarihi"   name="dtarihi" class="form-control">
                                        <label for="dyeri" class="mt-4">Doğum Yeri</label>
                                        <input type="text"  id="dyeri" name="dyeri"  class="form-control">
                                        <label for="medenidurum" class="mt-4">Medeni Durumu</label>
                                        <select name="medenidurum" id="medenidurum" class="form-control">
                                            <option value="">Seçiniz</option>
                                            <option value="2">Evli</option>
                                            <option value="1">Bekar</option>
                                        </select>
                                        <label for="cocuk" class="mt-4">(Varsa) Çocuklarınızın Yaşları</label>
                                        <input type="text" id="cocuk" name="cocuk" class="form-control">


                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <label for="askerlikdurum" class="">Askerlik Durumu</label>
                                        <select name="askerlikdurum" id="askerlikdurum" class="form-control">
                                            <option value="">Seçiniz</option>
                                            <option value="1">Yapıldı</option>
                                            <option value="2">Bayan muaf</option>
                                            <option value="3">Tecilli</option>
                                            <option value="4">Yapılmadı</option>
                                            <option value="5">Sağlık Sebiyle Muaf</option>
                                        </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="tecil" class="">Tecil Tarihi</label>
                                            <input type="date" class="form-control" id="tecil" name="tecil">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <label for="kangrubu" class="mt-4">Kan Grubu</label>
                                        <select name="kangrubu" id="kangrubu" class="form-control">
                                            <option value="">Seçiniz</option>
                                            <option value="0RH+">0 RH +</option>
                                            <option value="0RH-">0 RH -</option>
                                            <option value="ARH+">A RH +</option>
                                            <option value="ARH-">A RH -</option>
                                            <option value="BRH+">B RH +</option>
                                            <option value="BRH-">B RH -</option>
                                            <option value="ABRH+">AB RH +</option>
                                            <option value="ABRH-">AB RH -</option>

                                        </select>
                                        <label for="acilkisi" class="mt-4">Acil Durumlarda Ulaşılacak Kişi</label>
                                        <input type="text" class="form-control" name="acilkisi" id="acilkisi">
                                        <label for="acilkisitel" class="mt-4">Acil Durumlarda Aranacak Kişinin Telefonu</label>
                                        <input type="text" class="form-control" name="acilkisitel" id="acilkisitel">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="mt-4 container">
                                <button class="button btn-navigate-form-step" type="button" step_number="3">Geri</button>
                                <button class="button btn-navigate-form-step" type="button" step_number="5">İleri</button>
                            </div>
                        </section>
                        <section id="step-5" class="form-step d-none">

                            <!-- Step 2 input fields -->
                            <div class="row mt-4">

                                <div class="col-lg-6">
                                    <label for="sonOkulderece" >En son mezun olduğunuz okul derecesi</label>
                                    <select name="sonOkulderece" id="sonOkulderece" class="form-control">
                                        <option value="">Seçiniz</option>
                                        <option value="İlköğretim">Ortaokul Mezunu</option>
                                        <option value="Lise">Lise Mezunu</option>
                                        <option value="Yüksek Okul">2 Yıllık Yüksek Okul</option>
                                        <option value="Lisans">Lisans</option>
                                        <option value="Yüksek Lisans">Yüksek Lisans</option>
                                        <option value="Doktora">Doktora</option>
                                        <option value="Doktora Sonrası">Doktora Sonrası</option>


                                    </select>
                                    <label for="lisMezTar" class="mt-4">Lisans Üniversite Mezuniyet Tarihi</label>
                                    <select name="lisMezTar" id="sonOkulderece" class="form-control">
                                        <option value="" name="lisMezTar" selected="">Yıl Seçiniz</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>

                                    </select>
                                    <label for="sonOkul" class="mt-4">Lisans Üniversite</label>
                                    <select name="sonOkul" id="sonOkul" name="lisUni" class="form-control">
                                        <option value="">Seçiniz</option>
                                        @foreach($university as $u)
                                            <option value="{{$u->id}}">{{$u->university_name}}</option>
                                        @endforeach

                                    </select>
                                    <label for="lFak" class="mt-4">Lisans Fakülte/Bölüm</label>
                                    <input type="text" class="form-control" name="lFak" id="lFak">
                                 </div>
                                <div class="col lg-6">
                                    <label for="yLuni" class="">Yüksek Lisans Üniversite</label>
                                    <input type="text" class="form-control" name="yLuni" id="yLuni">
                                    <label for="yLisfak" class="mt-4">Yüksek Lisans Fakülte/Bölüm</label>
                                    <input type="text" class="form-control" name="yLisfak" id="yLisfak">
                                    <label for="yDokUni" class="mt-4">Doktora Üniversite</label>
                                    <input type="text" name="yDokUni" class="form-control" id="yDokUni">
                                    <label for="yDokBolum" class="mt-4">Doktora Bölüm</label>
                                    <input type="text" id="yDokBolum" name="yDokBolum" class="form-control" >


                                </div>
                            </div>
                            <div class="mt-4">
                                <button class="button btn-navigate-form-step" type="button" step_number="4">Geri</button>
                                <button class="button btn-navigate-form-step" type="button" step_number="6">İleri</button>
                            </div>
                        </section>
                        <section id="step-6" class="form-step d-none">

                            <!-- Step 2 input fields -->
                            <div class="mt-4">
                                <div class="col lg-6">
                                <label for="tecrübe" >Tecrübe</label>
                                <textarea class="form-control" id="tecrübe" name="tecrübe"></textarea>
                                    <label for="staj" class="mt-4">Stajlar</label>
                                    <textarea class="form-control" id="staj" name="staj"></textarea>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button class="button btn-navigate-form-step" type="button" step_number="5">Geri</button>
                                <button class="button btn-navigate-form-step" type="button" step_number="7">İleri</button>
                            </div>
                        </section>
                        <section id="step-7" class="form-step d-none">

                            <!-- Step 2 input fields -->
                            <div class="row mt-4">
                                <div class="col-lg-6">
                                    <label for="ingSev">İngilizce Seviyesi</label>
                                    <select name="ingSev" id="ingSev" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="0" selected="">BELİRLENMEDİ</option>
                                    </select>
                                    <label for="almSev" class="mt-4">Almanca Seviyesi</label>
                                    <select name="almSev" id="almSev" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="0" selected="">BELİRLENMEDİ</option>
                                    </select>
                                    <label for="frSev" class="mt-4">Fransızca Seviyesi</label>
                                    <select name="frSev" id="frSev" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="0" selected="">BELİRLENMEDİ</option>
                                    </select>
                                    <label for="isSev" class="mt-4">İspanyolca Seviyesi</label>
                                    <select name="isSev" id="isSev" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="0" selected="">BELİRLENMEDİ</option>
                                    </select>
                                    <label for="ofisArac" class="mt-4">Ofis Araçları/Yazılımlar</label>
                                    <textarea class="form-control" id="ofisArac" name="ofisArac"></textarea>

                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label for="kurs" >Katıldığınız Kurs/Seminer</label>
                                    <textarea class="form-control" id="kurs" name="kurs"></textarea>
                                    <label for="dernek"  class="mt-4">Üyesi bulunduğunuz Dernek / Kulüp / Oda adları</label>
                                    <textarea class="form-control" id="dernek" name="dernek"></textarea>
                                    <label for="uzmanlik"  class="mt-4">Uzmanlık alanlarınız</label>
                                    <textarea class="form-control" id="uzmanlik" name="uzmanlik"></textarea>
                                    <label for="notlar"  class="mt-4">Eklemek İstediğiniz Notlarınız (varsa) yazınız</label>
                                    <textarea class="form-control" id="notlar" name="notlar"></textarea>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button class="button btn-navigate-form-step" type="button" step_number="6">Geri</button>
                                <button class="button btn-navigate-form-step" type="button" step_number="8">İleri</button>
                            </div>
                        </section>
                        <!-- Step 3 Content, default hidden on page load. -->
                        <section id="step-8" class="form-step d-none">

                            <!-- Step 3 input fields -->
                            <div class="mt-4">
                                <label for="ref1"  class="">1.Referans <span style="color:red;">( Adı,Soyadı,Görevi,Telefonu )</span></label>
                                <textarea class="form-control" id="ref1" name="ref1"></textarea>
                                <label for="ref2"  class="mt-4">2.Referans <span style="color:red;">( Adı,Soyadı,Görevi,Telefonu )</span></label>
                                <textarea class="form-control" id="ref2" name="ref2"></textarea>
                                <label for="ref3"  class="mt-4">3.Referans <span style="color:red;">( Adı,Soyadı,Görevi,Telefonu )</span></label>
                                <textarea class="form-control" id="ref3" name="ref3"></textarea>
                                <label  class="mt-4"><b>Yasal Hatırlatma</b><p>Eğitim Kurumlarımızda kayıtlı olan ticari iletişim araçlarınıza, ürün ve faaliyetlerimiz ile sınırlı olmak kaydıyla, tanıtım amaçlı ilan ve reklam yanında ticari elektronik ileti gönderilecek olup, elektronik ticari ileti almak istemediğiniz takdirde, aşağıdaki seçenekte seçiminizi yapınız.</p></label>
                                <div class="row">
                                    <div class="col-lg-12"> <input type="radio" name="smsonay" value="1" checked="" id="sms1"><label for="sms1">SMS ve E-POSTA ALMAK İSTİYORUM</label></div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12"> <input type="radio" name="smsonay" value="0" id="sms2" ><label for="sms2">SMS ve E-POSTA ALMAK İSTEMİYORUM</label></div>

                                </div>


                            </div>
                            <div class="mt-4">
                                <button class="button btn-navigate-form-step" type="button" step_number="7">Geri</button>
                                <button class="button submit-btn" type="submit">Kaydet</button>
                            </div>
                        </section>

                    </form>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->

@endsection
    <!-- <section> close ============================-->
    <!-- ============================================-->



@section('js')
    <script>
    /**
    * Define a function to navigate betweens form steps.
    * It accepts one parameter. That is - step number.
    */
    const navigateToFormStep = (stepNumber) => {
    /**
    * Hide all form steps.
    */
    document.querySelectorAll(".form-step").forEach((formStepElement) => {
    formStepElement.classList.add("d-none");

    });
    /**
    * Mark all form steps as unfinished.
    */
    document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
    formStepHeader.classList.add("form-stepper-unfinished");
    formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
    });
    /**
    * Show the current form step (as passed to the function).
    */
    document.querySelector("#step-" + stepNumber).classList.remove("d-none");

    /**
    * Select the form step circle (progress bar).
    */
    const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
    /**
    * Mark the current form step as active.
    */
    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
    formStepCircle.classList.add("form-stepper-active");
    /**
    * Loop through each form step circles.
    * This loop will continue up to the current step number.
    * Example: If the current step is 3,
    * then the loop will perform operations for step 1 and 2.
    */
    for (let index = 0; index < stepNumber; index++) {
    /**
    * Select the form step circle (progress bar).
    */
    const formStepCircle = document.querySelector('li[step="' + index + '"]');
    /**
    * Check if the element exist. If yes, then proceed.
    */
    if (formStepCircle) {
    /**
    * Mark the form step as completed.
    */
    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
    formStepCircle.classList.add("form-stepper-completed");
    }
    }
    };
    /**
    * Select all form navigation buttons, and loop through them.
    */
    document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
    /**
    * Add a click event listener to the button.
    */
    formNavigationBtn.addEventListener("click", () => {
    /**
    * Get the value of the step.
    */
    const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
    /**
    * Call the function to navigate to the target form step.
    */
    navigateToFormStep(stepNumber);
    });
    });

    </script>
    <script>

    </script>
@endsection
    <!-- ============================================-->
    <!-- <section> begin ============================-->
