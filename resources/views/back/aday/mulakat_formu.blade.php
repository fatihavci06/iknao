@extends('layouts.back.master')
@section('content')



    <div class="row g-0">

        <div class="col-xxl-6 px-xxl-2">
            <div class="card h-100">
                <div class="card-header bg-light py-2">
                    <div class="row flex-between-center">
                        <div class="col-auto">
                            <h6 class="mb-0">Mülakat Raporu</h6>
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
                    <form action="{{route('mulakat.raporgonder',['id'=>$aday->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row">

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="user_id">Aday </label>
                                        <select class="form-select" name="user_id" id="user_id"  required>
                                            <option value="{{$aday->id}}" >{{$aday->firstname}}</option>



                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="kampus">Kampüs </label>
                                        <select class="form-select" name="kampus" id="kampus"  required>
                                            <option value="" >Seçiniz</option>
                                            @foreach($campus as $c)
                                                <option value="{{$c->id}}" >{{$c->campus_name}}</option>
                                            @endforeach



                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="izin_tur">Mülakat Türü </label>
                                        <select class="form-select" name="mulakat_tur" id="mulakat_tur"  required>
                                            <option value="" >Seçiniz</option>
                                            <option value="1.Mülakat" >1.Mülakat</option>
                                            <option value="2.Mülakat (Uygulama)" >2.Mülakat (Uygulama)</option>
                                            <option value="3.Mülakat (İş Teklifi Kurucu Görüşmesi)" >3.Mülakat (İş Teklifi Kurucu Görüşmesi)</option>
                                            <option value="4.Sonuç Raporu" >4.Sonuç Raporu</option>




                                        </select>
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
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <label class="form-label" for="customRange1">Yazdığınız nota ek olarak adaya 0 ile 100 arasında bir not veriniz.
                                        </label>
                                        <div class="range">
                                            <input type="range" name="puan" class="form-range " id="myRange" />
                                        </div>
                                            <p style="color:red"><b>Puan: <span id="demo"></span></b></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="belge">Varsa Belge Giriniz</label>
                                    <div class="min-vh-30">
                                        <input type="file" name="belge" id="belge" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="tarih"> Tarih</label>
                                        <input type="datetime-local" class="form-control" id="tarih" value="{{old('tarih',date('Y-m-d H:i:s'))}}" name="tarih">
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
    <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>
@endsection
<!-- <section> close ============================-->
<!-- ============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->
