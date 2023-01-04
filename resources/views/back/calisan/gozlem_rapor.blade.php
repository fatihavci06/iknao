@extends('layouts.back.master')
@section('css')


    <link href="{{asset('tema/public/')}}/assets/css/query.dataTables.min.css" rel="stylesheet" id="user-style-default">
@endsection
@section('content')
    <div class="container">
        @if(session('success'))

            <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                <div class="bg-danger me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span></div>
                <p class="mb-0 flex-1">{{session('success')}}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
    <div class="row g-3 " style="margin-bottom: 30px;">

        <div class="col-12">

            <div class="card mb-3 mt-3" >
                <div class="card-header">
                    <div class="row flex-between-end">
                        <div class="col-auto align-self-center">
                            <h5 class="mb-0" data-anchor="data-anchor" id="jquery-datatables-default-example"> Mülakat Listesi ({{$user->firstname}} &nbsp {{$user->lastname}})<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#jquery-datatables-default-example" style="padding-left: 0.375em;"></a></h5>
                        </div>

                    </div>
                </div>
                <div class="card-header " style="margin-bottom: 30px;">
                    <div class="row flex-between-end" >
                        <div class="table-responsive">
                            <div id="tableExample3" style="margin-bottom: 30px;" data-list='{"valueNames":["name","email"],"page":5,"pagination":true}'>
                                <div class="row justify-content-end g-0">
                                    <div class="col-auto col-sm-5 mb-3">
                                        <form>
                                            <div class="input-group">
                                                <input class="form-control form-control-sm shadow-none search" type="search" placeholder="Search..." aria-label="search" />
                                                <div class="input-group-text bg-transparent"><span class="fa fa-search fs--1 text-600"></span></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive scrollbar">
                                    <table class="table table-bordered table-striped fs--1 mb-0">
                                        <thead class="bg-200 text-900">
                                        <tr>
                                            <th class="sort" data-sort="name">Tür</th>
                                            <th class="sort" data-sort="email">Detay</th>

                                        </tr>
                                        </thead>
                                        <tbody class="list">
                                        @foreach($data as $d)
                                        <tr>
                                            <td class="name">{{$d->goztur}}</td>
                                            <td class="email"><a href="{{route('gozlem.edit',['id'=>$d->gid])}}" class="btn btn-sm btn-primary">Düzenle</a>
                                                <a href="{{route('gozlem.sil',['id'=>$d->gid])}}" class="btn btn-sm btn-warning" onclick="return confirmDel()">Sil</a>

                                            </td>

                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                                    <ul class="pagination mb-0"></ul>
                                    <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                                </div>
                            </div>

        </table>

            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('js')


    <script src="{{asset('tema/public/')}}/vendors/jquery/jquery.dataTables.min.js"> </script>

    <script language="javascript"> function confirmDel() { var agree=confirm("Bu ilanı silmek istediğinizden emin misiniz?\nBu işlem geri alınamaz!"); if (agree) { return true ; } else { return false ;} } </script>
@endsection
<!-- <section> close ============================-->
<!-- ============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->
