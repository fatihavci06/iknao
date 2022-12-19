@extends('layouts.back.master')
@section('content')



    <div class="row g-0">

        <div class="col-xxl-6 px-xxl-2">
            <div class="card h-100">
                <div class="card-header bg-light py-2">
                    <div class="row flex-between-center">
                        <div class="col-auto">
                            <h6 class="mb-0">İzin Talebi</h6>
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
                    <form action="{{route('izin.taleppost')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="container">
                        <div class="row">

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="user_id">Personel </label>
                                    <select class="form-select" name="user_id" id="user_id"  required>
                                        <option value="" >Seçiniz</option>
                                        @foreach($personel as $p)
                                            <option value="{{$p->id}}"  @if(old('user_id')==$p->id)) selected @endif >{{$p->firstname}} {{$p->lastname}} </option>

                                        @endforeach


                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="izin_tur">İzin Türü </label>
                                    <select class="form-select" name="izin_tur" id="izin_tur"  required>
                                        <option value="" >Seçiniz</option>
                                        @foreach($izin_turler as $i)
                                        <option value="{{$i->id}}" @if(old('izin_tur')==$i->id)) selected @endif >{{$i->izin_tur}}</option>

                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="belge">Varsa Belge Giriniz</label>
                                <div class="min-vh-30">
                                    <input type="file" name="belge" id="belge" class="form-control">
                                </div>
                            </div>


                        </div>
                        <div class="row">


                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="baslangic_tarih">Başlangıç Tarihi</label>
                                    <input type="datetime-local" class="form-control" id="baslangic_tarih" value="{{old('baslangic_tarih')}}" name="baslangic_tarih">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bitis_tarih">Bitiş Tarihi</label>
                                    <input type="datetime-local" id="bitis_tarih" class="form-control" name="bitis_tarih" value="{{old('bitis_tarih')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label" for="description">Açıklama</label>
                                <div class="min-vh-30">
                                    <textarea  class="tinymce d-none" id="description" name="description">{{old('description')}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
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
