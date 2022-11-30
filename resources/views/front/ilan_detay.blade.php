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
                   <b> {{$ilandetay->ilan_name}}</b>
                </div>
                <hr/>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$ilandetay->description}}</li>
                    <li class="list-group-item"><a href="{{route('front.yenibasvuru',['brans'=>$ilandetay->ilan_name])}}" style="background-color: #000f3d!important;" class="btn btn-success"> Başvur</a> </li>

                </ul>
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
