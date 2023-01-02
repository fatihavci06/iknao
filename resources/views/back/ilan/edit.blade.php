@extends('layouts.back.master')
@section('content')



    <div class="row g-0">

        <div class="col-xxl-6 px-xxl-2">
            <div class="card h-100">
                <div class="card-header bg-light py-2">
                    <div class="row flex-between-center">
                        <div class="col-auto">
                            <h6 class="mb-0">İlan Düzenle</h6>
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
                    @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                               @foreach($errors->all() as $e)

                                    <li>{{$e}}</li>

                                 @endforeach
                                </ul>
                            </div>
                    @endif
                    <form action="{{route('ilan.update',['id'=>$ilan->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">İlan Başlığı</label>
                                    <input class="form-control" required name="ilan_name" id="exampleFormControlInput1" type="text" placeholder="Türkçe Öğretmeni" value="{{old('ilan_name',$ilan->ilan_name)}}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="istur">İş Türü </label>
                                    <select class="form-select" name="istur" id="istur"  required>
                                        <option value="" >Seçiniz</option>
                                        <option value="Yarı Zamanlı"  @if(old('istur',$ilan->istur)=='Yarı Zamanlı') selected @endif >Yarı Zamanlı</option>
                                        <option value="Tam Zamanlı"  @if(old('istur',$ilan->istur)=='Tam Zamanlı') selected @endif >Tam Zamanlı</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="durum">Durum</label>
                                    <select class="form-select" name="durum" id="durum"  required>
                                        <option value="" >Seçiniz</option>
                                        <option value="2" @if(old('durum',$ilan->durum)==2) selected @endif >Aktif</option>
                                        <option value="1" @if(old('durum',$ilan->durum)==1) selected @endif >Pasif</option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label" for="konum">Konum</label>
                                <input class="form-control" type="text" id="konum" name="konum" value="{{$ilan->konum}}" required>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="konum">Kampus</label>
                                <select class="form-select" name="kampus" aria-label="Default select example" required>
                                    <option value="" >Seçiniz</option>
                                    @foreach($kampusler as $k)
                                    <option @if(old('konum',$ilan->kampus)==$k->campus_name) selected @endif value="{{$k->campus_name}}">{{$k->campus_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Bitiş Tarihi</label>
                                    <input required class="form-control" name="endDate" id="exampleFormControlInput1" type="date" value="{{old('endDate',$ilan->endDate)}}"  />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label" for="belge">Varsa Belge Giriniz</label>
                                <div class="min-vh-30">
                                    <input type="file" name="belge" id="belge" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label" for="description">Açıklama</label>
                                <div class="min-vh-30">
                                    <textarea  class="tinymce d-none" id="description" name="description">{{old('description',$ilan->description)}}</textarea>
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
