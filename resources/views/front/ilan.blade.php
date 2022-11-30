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
    <section class="bg-200 text-center">

        <div class="container mt-6">
            <div class="row justify-content-center mt-3">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="card" style="width: 100%;" >



                        <div class="row mt-3 mb-3" >
                            <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4" ><b>Pozisyon</b></div>
                            <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4" ><b>Kampüs</b></div>
                            <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4" ><b>Yayınlanma Zamanı</b></div>


                        </div>





                    </div>
                </div>
            </div>
            @foreach($ilan as $i)
            <div class="row justify-content-center mt-3">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="card" style="width: 100%;" >



                                <div class="row mt-3 mb-3" >
                                    <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4" ><a href="{{route('front.ilan_detay',['id'=>$i->id])}}"> {{$i->ilan_name}} </a></div>
                                    <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4" >{{ $i->konum }}</div>
                                    <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4" >{{ \Carbon\Carbon::parse($i->created_at)->diffForHumans() }}</div>


                                </div>





                    </div>
                </div>
            </div>
            @endforeach

                <div class="col-4 col-lg-12 mt-5 mx-auto text-center" > <span>{{ $ilan->links() }}</span></div>
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
