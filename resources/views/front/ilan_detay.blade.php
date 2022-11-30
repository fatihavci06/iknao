@extends('layouts.front.master')
@section('content')
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

    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="bg-200 text-center " style="margin-bottom: 144px;">

        <div class="container mt-6 mb-6 text-center mx-auto">

            <div class="card" style="width: 100%">
                <div class="card-header">
                   <b> {{$ilandetay->ilan_name}} - {{$ilandetay->konum}} </b>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">{{$ilandetay->description}}</div>

                </div>
                <hr/>
                <div class="row mb-5">
                    <div class="col-lg-12">
                    <a href="{{route('front.yenibasvuru',['brans'=>$ilandetay->ilan_name])}}" style="background-color: #000f3d!important;" class="btn btn-success"> Başvur</a>

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
