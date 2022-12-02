@extends('layouts.back.master')
@section('content')



    <div class="row g-0 mt-3">
        <div class="col-lg-9 pe-lg-2">
            <div class="card mb-3 mb-lg-0">
                <div class="card-body">
                   <div class="row"><div class="col 6">Tc Kimlik Nu. : {{$data->tc}}</div><div class="col 6">Ad Soyad : {{$data->firstname}} {{$data->lastname}} </div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Branş. : {{$data->bransInfo->brans_name}}</div><div class="col 6">Cep telefonu : {{$data->cepno}}  </div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Birinci tercih : {{$data->birtercih}} </div><div class="col 6"> İkinci tercih : {{$data->ikitercih}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Üçüncü tercih : {{$data->uctercih}} </div><div class="col 6"> Adres : {{$data->adres}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Eposta : {{$data->eposta}} </div><div class="col 6"> Cinsiyet : {{$data->cinsiyet}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Doğum Tarihi : {{$data->dtarihi}} </div><div class="col 6"> Doğum Yeri : {{$data->dyeri}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Çocuk Sayısı : {{$data->cocuk}} </div><div class="col 6"> Medeni Durum : @if($data->medenidurum==2) Evli @else Bekar  @endif</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Askerlik Durumu : @if($data->askerlikdurum==1) Yapıldı @elseif($data->askerlikdurum==2) Bayan @elseif($data->askerlikdurum==3) Muaf @elseif($data->askerlikdurum==4) Tecilli  @elseif($data->askerlikdurum==5) Yapılmadı @else Sağlık Sebebiyle Muaf @endif </div><div class="col 6"> Tecil : {{$data->tecil}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Kan Grubu : {{$data->kangrubu}} </div><div class="col 6"> Acil Durumda Aranacak Kişi : {{$data->acilkisi}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Aranacak Kişi Tel : {{$data->acilkisitel}} </div><div class="col 6"> Doğum Yeri : {{$data->dyeri}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Son Okul Derece : {{$data->sonOkulderece}} </div><div class="col 6"> Lisans Mezuniyet Tarihi : {{$data->lisMezTar}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Son Okul : {{$data->sonOkul}} </div><div class="col 6"> Lisans Fakülte : {{$data->lfak}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Yük. Lis. Üni.: {{$data->yLuni}} </div><div class="col 6"> Yük. Lis. Fak. : {{$data->yLisfak}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Doktora Uni : {{$data->yDokUni}} </div><div class="col 6"> Doktora Bölüm : {{$data->yDokBolum}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 12">Tecrübe:<br/><p>{{$data->tecrube}}</p></div></div>
                    <hr>

                    <div class="row mt-2"><div class="col 12">Staj:<br/><p>{{$data->staj}}</p></div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">İngilizce Seviye : {{$data->ingSev}} </div><div class="col 6"> Almanca Seviye : {{$data->almSev}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Fransızca Seviye : {{$data->frSev}} </div><div class="col 6"> İspanyolca Seviye : {{$data->isSev}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 6">Doktora Uni : {{$data->yDokUni}} </div><div class="col 6"> Doktora Bölüm : {{$data->yDokBolum}}</div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 12">Ofis Araçları Kullanımı :<br/><p>{{$data->ofisArac}}</p></div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 12">Kurs :<br/><p>{{$data->kurs}}</p></div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 12">Dernek :<br/><p>{{$data->dernek}}</p></div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 12">Uzmanlık :<br/><p>{{$data->uzmanlik}}</p></div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 12">Notlar:<br/><p>{{$data->notlar}}</p></div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 12">Referans 1:<br/><p>{{$data->ref1}}</p></div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 12">Referans 2:<br/><p>{{$data->ref2}}</p></div></div>
                    <hr>
                    <div class="row mt-2"><div class="col 12">Referans 2:<br/><p>{{$data->ref3}}</p></div></div>
                    <hr>

                </div>
            </div>
        </div>
        <div class="col-lg-3 ps-lg-2">
            <div class="sticky-sidebar">
                <div class="card mb-3 fs--1 text-center">
                    <div class="card-body">
                        <h6>Fotoğraf</h6>
                        <img src="{{Storage::url($data->avatar)}}" width="150px" >
                    </div>
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
