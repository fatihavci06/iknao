@extends('layouts.front.master')
@section('content')
    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <section class="py-0 overflow-hidden light" id="banner" style="margin-top: 55px;">

        <div class="bg-holder overlay" style="background-image:url({{asset('tema/public/')}}/assets/img/generic/kariyer.png);background-position: center bottom;">
        </div>
        <!--/.bg-holder-->

        <div class="container" style="width: 100%;height: 750px;">
            <div class="row flex-center pt-8 pt-lg-10 pb-lg-9 pb-xl-0">
                <div class="col-md-11 col-lg-8 col-xl-8 pb-7 pb-xl-9 text-center text-xl-start">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('front.ara')}}" >

                            <div class="row">

                                <div class="col-lg-9 col-7 col-sm-9 col-xs-9 col-md-9"><input type="text" class="form-control" name="kelime" placeholder="Türkçe Öğretmeni"></div>
                                <div class="col-lg-3 col-5 col-sm-3 col-xs-3 col-md-3"><button class="btn btn-primary form-control" style="background: #000f3d!important;">İlan Ara</button></div>

                            </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-md-11 col-lg-12 col-xl-12 pb-7 pb-xl-9 text-center text-xl-start">
                    <h1 class="text-white fw-light text-center">Kariyerin zirvesi <span class="typed-text fw-bold" data-typed-text='["Nesibe Aydın Eğitim Kurumları"]'></span><br /> </h1>

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
    <section class="bg-200 text-center" >
        <h2 style="margin-top: -60px;">Açık Pozisyonlar </h2>
        <div class="container mt-3">

            <div class="row justify-content-center">

                <div class="col-lg-9 col-xl-8">

                    <div class="swiper-container theme-slider" data-swiper='{"autoplay":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"slideToClickedSlide":true}'>
                        <div class="swiper-wrapper">
                            @foreach($ilanlar as $ilan)
                            <div class="swiper-slide">

                                <div class="px-5 px-sm-6">
                                    <p class="fs-sm-1 fs-md-2 fst-italic text-dark"><a href="{{route('front.ilan_detay',['id'=>$ilan->id])}}">{{$ilan->ilan_name}}</a></p>
                                    <p class="fs-0 text-600">{{ \Carbon\Carbon::parse($ilan->created_at)->diffForHumans() }}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="swiper-nav">
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->

@endsection
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
