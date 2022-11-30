@extends('layouts.front.master')
@section('content')
    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <section class="py-0 overflow-hidden light" id="banner" style="height: 800px;">

        <div class="bg-holder overlay" style="background-image:url({{asset('tema/public/')}}/assets/img/generic/kariyer.png);background-position: center bottom;">
        </div>
        <!--/.bg-holder-->

        <div class="container " style="margin-top:-30px;">
            <div class="row flex-center pt-8 pt-lg-10 pb-lg-9 pb-xl-0">
                <div class="row justify-content-center g-0 mx-auto">
                    <div class="col-lg-6 col-xl-6 col-xxl-6">
                        <div class="card">
                            <div class="card-header bg-circle-shape bg-shape text-center p-2"><a class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light" href="#">Nesibe Aydın Okulları</a></div>
                            @if(session('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                            @if(session('danger'))
                                <div class="alert alert-danger">{{session('danger')}}</div>
                            @endif
                            <div class="card-body p-4">
                                <div class="row flex-between-center">
                                    <div class="col-auto">
                                        <h3>Şifremi unuttum</h3>
                                    </div>

                                </div>
                                <form action="{{route('front.sifremiunuttumpost')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="split-login-email">Tc</label>
                                        <input class="form-control" id="split-login-email" name="tc" type="number" required>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="split-login-password">Telefon Numarası</label>
                                        </div>
                                        <input class="form-control" id="split-login-password" name="cepno" type="number" required>
                                    </div>
                                    <div class="row flex-between-center">

                                        <div class="col-auto"><a class="fs--1" href="{{route('front.giris')}}">Giriş yap</a></div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Sıfırla</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>>
                <div class="col-xl-7 offset-xl-1 align-self-end mt-4 mt-xl-0"><!--<a class="img-landing-banner rounded" href="{{asset('tema/public/')}}index.html"><img class="img-fluid" src="{{asset('tema/public/')}}/assets/img/generic/dashboard-alt.jpg" alt="" /></a></div> -->
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




<!-- ============================================-->
<!-- <section> begin ============================-->
