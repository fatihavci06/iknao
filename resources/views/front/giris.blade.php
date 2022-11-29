@extends('layouts.front.master')
@section('content')
    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <section class="py-0 overflow-hidden light" id="banner" style="height: 700px;">

        <div class="bg-holder overlay" style="background-image:url({{asset('tema/public/')}}/assets/img/generic/bg-1.jpg);background-position: center bottom;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
            <div class="row flex-center pt-8 pt-lg-10 pb-lg-9 pb-xl-0">
                <div class="row justify-content-center g-0 mx-auto">
                    <div class="col-lg-6 col-xl-6 col-xxl-6">
                        <div class="card">
                            <div class="card-header bg-circle-shape bg-shape text-center p-2"><a class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light" href="../../../index.html">falcon</a></div>
                            @if(session('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                            @if(session('false'))
                                <div class="alert alert-danger">{{session('false')}}</div>
                            @endif
                            <div class="card-body p-4">
                                <div class="row flex-between-center">
                                    <div class="col-auto">
                                        <h3>Giriş</h3>
                                    </div>

                                </div>
                                <form action="{{route('front.login')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="split-login-email">Email</label>
                                        <input class="form-control" id="split-login-email" name="email" type="email">
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="split-login-password">Password</label>
                                        </div>
                                        <input class="form-control" id="split-login-password" name="password" type="password">
                                    </div>
                                    <div class="row flex-between-center">

                                        <div class="col-auto"><a class="fs--1" href="../../../pages/authentication/split/forgot-password.html">Şifremi unuttum</a></div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Giriş</button>
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
