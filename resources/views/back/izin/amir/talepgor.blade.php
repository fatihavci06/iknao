@extends('layouts.back.master')
@section('content')



    <div class="row g-0">

        <div class="col-xxl-6 px-xxl-2">
            <div class="card h-100">
                <div class="card-header bg-light py-2">
                    <div class="row flex-between-center">
                        <div class="col-auto">
                            <h6 class="mb-0">İzin Talep Detay</h6>
                        </div>
                        <div class="col-auto d-flex">
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-top-products" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-top-products"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body h-100">
                    @if(session('success'))
                        <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                            <div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
                            <p class="mb-0 flex-1">{{session('success')}}</p>
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                        @if(session('danger'))
                            <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                                <div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
                                <p class="mb-0 flex-1">{{session('danger')}}</p>
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    @if($errors->any())
                            <div class="alert alert-warning border-2 d-flex align-items-center" role="alert">

                                <ul>
                               @foreach($errors->all() as $e)

                                    <li>{{$e}}</li>

                                 @endforeach
                                </ul>
                            </div>
                    @endif

                    <div class="container">
                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="user_id"><b>Personel</b>  </label>
                                        <p>{{$data->userinfo->firstname}} {{$data->userinfo->lastname}} </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="user_id"><b>Tc Kimlik Nu.</b>  </label>
                                    <p>{{$data->userinfo->firstname}} {{$data->userinfo->tc}} </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="izin_tur"><b>İzin Türü</b> </label>
                                    <p>{{$data->izininfo->izin_tur}}  </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="belge"><b>Belge</b></label>
                                <div class="min-vh-30">
                                    @if($data->belge!='')
                                    <a href="{{route('izin.amirbelgeindir',$data->id)}}" class="btn btn-download-cv btn-info rounded-pill"> Belgeyi İndir </a>
                                    @else
                                        <p>Belge bulunmamaktadır.</p>
                                    @endif
                                </div>
                            </div>


                        </div>
                        <div class="row">


                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="baslangic_tarih"><b>Başlangıç Tarihi</b></label>
                                    <p>{{$data->baslangic_tarih}}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bitis_tarih"><b>Bitiş Tarihi</b></label>
                                    <p>{{$data->bitis_tarih}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label" for="description"><b>Açıklama</b></label>
                                <div class="min-vh-30">
                                    <p>{{$data->aciklama}}</p>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('izin.amironay',$data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-4">

                                    <div class="col-6">
                                    <select name="durum" class="form-control">
                                        <option value="0" @if($data->durum==0) selected @endif>Beklemede</option>
                                        <option value="1" @if($data->durum==1) selected @endif>Onayla</option>
                                        <option value="2" @if($data->durum==2) selected @endif>Reddet</option>
                                    </select>
                                    </div>
                                <div class="col-6">

                                    <button class="btn btn-primary form-control">Kaydet</button>
                                </div>
                            </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script src="{{asset('tema/public/')}}/vendors/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 250
        });
    </script>
@endsection
<!-- <section> close ============================-->
<!-- ============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->
