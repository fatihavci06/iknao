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

            <div class="card" style="margin-left:8%;width: 80%">



                <div class="card-header">
                    <table class="table">

                        <tbody>
                        <tr>
                            <th scope="row">Başlık</th>
                            <td>{{$ilandetay->ilan_name}}</td>

                        </tr>
                        <tr>
                            <th scope="row">İş Türü</th>
                            <td>{{$ilandetay->istur}}</td>

                        </tr>
                        <tr>
                            <th scope="row">Konum</th>
                            <td>{{$ilandetay->konum}}</td>

                        </tr>
                        <tr>
                            <th scope="row">Kampüs</th>
                            <td>{{$ilandetay->kampus}}</td>

                        </tr>



                        </tbody>
                    </table>
                </div>


                <div class="container" style="width: 80%">
                    <h4 style="margin-bottom: 18px;">GENEL NİTELİKLER VE İŞ TANIMI</h4>
                    <div class="col-lg-12" style="text-align: left">{!! $ilandetay->description  !!} </div>

                </div>
                <hr/>
                <div class="row mb-5">
                    <div class="col-lg-12">
                    <a href="{{route('front.yenibasvuru',['brans'=>$ilandetay->ilan_name,'id'=>$ilandetay->id])}}" style="background-color: #000f3d!important;" class="btn btn-success"> Başvur</a>

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
