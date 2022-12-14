@extends('layouts.back.master')
@section('css')


    <link href="{{asset('tema/public/')}}/assets/css/query.dataTables.min.css" rel="stylesheet" id="user-style-default">
@endsection
@section('content')
    <div class="container" style="width: 1100px;margin-left:-57px;">
        @if(session('success'))

            <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                <div class="bg-success me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span></div>
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
    <div class="row g-3">

        <div class="col-12">

            <div class="card mb-3 mt-3" >
                <div class="card-header">
                    <div class="row flex-between-end">
                        <div class="col-auto align-self-center">
                            <h5 class="mb-0" data-anchor="data-anchor" id="jquery-datatables-default-example">Performans Gir ({{$data->firstname}}  {{$data->lastname}})</h5>
                        </div>
                        <form action="{{route('performans.raporlarupdate',$data->pid)}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="container">
                            <div class="row mt-3">

                                <div class="col-4">

                                        <label class="form-label" for="user_id">Personel {{$data->pid}} </label>
                                        <select class="form-select" name="user_id" id="user_id"  required>
                                            <option value="{{$data->id}}" >{{$data->firstname}} {{$data->lastname}}</option>



                                        </select>

                                </div>
                                <div class="col-8">

                                        <label class="form-label" for="baslik">Ba??l??k </label>
                                        <input type="text" name="baslik" id="baslik" class="form-control" required value="{{old('baslik',$data->baslik)}}">

                                </div>
                            </div>
                            <div class="row mt-3">

                                <div class="col-6">

                                        <label class="form-label" for="izin_tur">T??r </label>
                                        <select class="form-select" name="mulakat_tur" id="mulakat_tur"  required>
                                            <option value="" >Se??iniz</option>
                                            <option value="PERFORMANS" @if(old('mulakat_tur',$data->mulakat_tur)=='PERFORMANS') selected @endif>PERFORMANS RAPORU</option>
                                            <option value="MUTABAKAT" @if(old('mulakat_tur',$data->mulakat_tur)=='MUTABAKAT') selected @endif>MUTABAKAT-PERFORMANS G??R????MES??</option>
                                            <option value="RAPOR" @if(old('mulakat_tur',$data->mulakat_tur)=='RAPOR') selected @endif>KURUCU RAPORU</option>
                                            <option value="??????IKI??" @if(old('mulakat_tur',$data->mulakat_tur)=='??????IKI??') selected @endif>????TEN ??IKI?? RAPORU</option>




                                        </select>

                                </div>
                                <div class="col-6">

                                        <label class="form-label" for="tarih"> Tarih</label>
                                        <input type="datetime-local" class="form-control" id="tarih" value="{{old('tarih',$data->tarih)}}" name="tarih">

                                </div>
                            </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <label class="form-label" for="aciklama">M??d??r-????retmen G??r????me Raporu</label>
                                        <div class="min-vh-30">
                                            <textarea  class="form-control" id="aciklama" name="description">{{old('description',$data->description)}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="form-label" for="belge">Varsa Belge Giriniz</label>
                                    <div class="min-vh-30">
                                        <input type="file" name="belge" id="belge" class="form-control">
                                    </div>
                                </div>
                            <table class="table table-striped mt-3">
                                <thead>
                                <tr style="background-color: #8dffba;">
                                    <th width="35%">SINIF ?????? PERFORMANS DE??ERLEND??RME KR??TERLER??
                                    </th>
                                    <th width="9%">??OK ??Y??	</th>
                                    <th width="7%">??Y??</th>
                                    <th width="7%">ORTALAMA</th>
                                    <th width="7%">YETERS??Z</th>
                                    <th>BU KR??TERLER HAKKINDA Y??NET??C??N??N A??IKLAMASI, KANAAT??, TESP??TLER, ??RNEK OLAY, G??ZLEM, ANEKDOT VB.</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>????retmen s??n??fta karga??a, g??r??lt?? olmadan dersini i??ler.	</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s1" value="4" @if(old('s1',$data->s1)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s1" value="3" @if(old('s1',$data->s1)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s1" value="2" @if(old('s1',$data->s1)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s1" value="1" @if(old('s1',$data->s1)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td rowspan="5"><textarea rows="20" name="aciklama1" class="form-control">{{old('aciklama1',$data->aciklama1)}}</textarea></td>
                                </tr>
                                <tr>
                                    <td>Alan bilgisi/hakimiyeti yeterlidir.	</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s2" value="4" @if(old('s2',$data->s2)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s2" value="3" @if(old('s2',$data->s2)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s2" value="2" @if(old('s2',$data->s2)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s2" value="1" @if(old('s2',$data->s2)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>

                                </tr>
                                <tr>
                                    <td>????rencilerinin kal??c?? ????renmesini sa??lamak i??in ders esnas??nda farkl?? y??ntem-teknikler/ ara??lar/materyaller/teknoloji kullan??r.	</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s3" value="4" @if(old('s3',$data->s3)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s3" value="3" @if(old('s3',$data->s3)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s3" value="2" @if(old('s3',$data->s3)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s3" value="1" @if(old('s3',$data->s3)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>

                                </tr>
                                <tr>
                                    <td> Her dersin sonunda ????rencinin anlamas??n?? kontrol eder. Belirledi??i g??nlerde ????renciye ??dev ya da ek ??al????ma verir. Bir sonraki ders mutlaka ????renciye verilen g??revleri kontrol eder.		</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s4" value="4" @if(old('s4',$data->s4)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s4" value="3"  @if(old('s4',$data->s4)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s4" value="2"  @if(old('s4',$data->s4)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s4" value="1"  @if(old('s4',$data->s4)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>

                                </tr>
                                <tr>
                                    <td> Her dersin sonunda ????rencinin anlamas??n?? kontrol eder. Belirledi??i g??nlerde ????renciye ??dev ya da ek ??al????ma verir. Bir sonraki ders mutlaka ????renciye verilen g??revleri kontrol eder.		</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s5" value="4" @if(old('s5',$data->s5)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s5" value="3" @if(old('s5',$data->s5)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s5" value="2" @if(old('s5',$data->s5)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s5" value="1" @if(old('s5',$data->s5)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped">
                                <thead>
                                <tr style="background-color: #8dffba;">
                                    <th width="35%">Y??NET??C?? HAR??C??NDE B??R??MLER TARAFINDAN DOLDURULACAK KR??TERLER
                                    </th>
                                    <th width="9%">??OK ??Y??	</th>
                                    <th width="7%">??Y??</th>
                                    <th width="7%">ORTALAMA</th>
                                    <th width="7%">YETERS??Z</th>
                                    <th>BU KR??TERLER HAKKINDA Y??NET??C??N??N A??IKLAMASI, KANAAT??, TESP??TLER, ??RNEK OLAY, G??ZLEM, ANEKDOT VB.</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>Z??MRE BA??KANI KANAAT??<br/>
                                        Z??mre ??al????malar??na kat??l??m ve uyum, z??mre i??i ileti??im, mesleki dayan????ma, tak??m ??al????mas??, i??lerin zaman??nda ve gerekti??i ??ekilde bitirilmesi Z??mre ba??kan?? olmad?????? hallerde, Y??netici taraf??ndan doldurulur.	</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s6" value="4" @if(old('s6',$data->s6)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s6" value="3" @if(old('s6',$data->s6)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s6" value="2" @if(old('s6',$data->s6)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s6" value="1" @if(old('s6',$data->s6)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td rowspan="2"><textarea rows="10" name="aciklama6" class="form-control">{{old('aciklama6',$data->aciklama6)}}</textarea></td>
                                </tr>
                                <tr>
                                    <td>M??D??R YRD.KANAAT?? <br/>
                                        ??zin, n??bet, veli ileti??imi, idari ??al????malara kat??l??m M??d??r Yrd. olmad?????? hallerde, Y??netici taraf??ndan doldurulur.	</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s7" value="4" @if(old('s7',$data->s7)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s7" value="3" @if(old('s7',$data->s7)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s7" value="2" @if(old('s7',$data->s7)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s7" value="1" @if(old('s7',$data->s7)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>

                                </tr>
                                <tr>
                                    <td>PORTAL KULLANIMI<br/>
                                        Mesleki Geli??im birimi taraf??ndan, raporlan??r. ??devlerin portaldan takibi, ????renci geli??im notlar??, portal tablo ve formlar??n??n doldurulmas??	</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s8" value="4" @if(old('s8',$data->s8)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s8" value="3" @if(old('s8',$data->s8)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s8" value="2" @if(old('s8',$data->s8)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s8" value="1" @if(old('s8',$data->s8)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <textarea rows="5" class="form-control" name="aciklama8">{{old('aciklama8',$data->aciklama8)}}</textarea>
                                    </td>

                                </tr>
                                <tr>
                                    <td>DERS G??ZLEM?? 1 SONUCU</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s9" value="4" @if(old('s9',$data->s9)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s9" value="3" @if(old('s9',$data->s9)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s9" value="2" @if(old('s9',$data->s9)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s9" value="1" @if(old('s9',$data->s9)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <textarea rows="5" class="form-control" name="aciklama9">{{old('aciklama9',$data->aciklama9)}}</textarea>
                                    </td>

                                </tr>
                                <tr>
                                    <td>DERS G??ZLEM?? 2 SONUCU</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s10" value="4" @if(old('s10',$data->s10)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s10" value="3" @if(old('s10',$data->s10)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s10" value="2" @if(old('s10',$data->s10)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s10" value="1" @if(old('s10',$data->s10)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <textarea rows="5" class="form-control" name="aciklama10">{{old('aciklama10',$data->aciklama10)}}</textarea>
                                    </td>

                                </tr>
                                <tr>
                                    <td>??Z??N, RAPOR VE D??S??PL??N<br>
                                        ??nsan Kaynaklar?? Birimi taraf??ndan raporlan??r</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s11" value="4" @if(old('s11',$data->s11)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s11" value="3" @if(old('s11',$data->s11)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s11" value="2" @if(old('s11',$data->s11)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s11" value="1" @if(old('s11',$data->s11)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <textarea rows="5" class="form-control" name="aciklama11">{{old('aciklama11',$data->aciklama11)}}</textarea>
                                    </td>

                                </tr>
                                <tr>
                                    <td>????RENC?? ANKET?? SONU??LARI<br/>
                                        ????renci anketi uygulanmayan s??n??flarda, Y??netici taraf??ndan doldurulur.</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s12" value="4" @if(old('s12',$data->s12)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s12" value="3" @if(old('s12',$data->s12)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s12" value="2" @if(old('s12',$data->s12)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s12" value="1" @if(old('s12',$data->s12)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <textarea rows="5" class="form-control" name="aciklama12">{{old('aciklama12',$data->aciklama12)}}</textarea>
                                    </td>

                                </tr>
                                <tr>
                                    <td>VEL?? ANKET?? SONU??LARI<br/>
                                        ????renci anketi uygulanmayan s??n??flarda, Y??netici taraf??ndan doldurulur.</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s13" value="4" @if(old('s13',$data->s13)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s13" value="3" @if(old('s13',$data->s13)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s13" value="2" @if(old('s13',$data->s13)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s13" value="1" @if(old('s13',$data->s13)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <textarea rows="5" class="form-control" name="aciklama13">{{old('aciklama13',$data->aciklama13)}}</textarea>
                                    </td>

                                </tr>
                                <tr>
                                    <td>SONU??<br>
                                        Sistem taraf??ndan, otomatik olarak, aritmetik ortalama al??narak hesaplanmaktad??r. Y??netici, sadece a????klama k??sm??n?? doldurabilir.</td>
                                    <td>
                                        <label class="form-check-custom success">
                                            <input type="radio" name="s14" value="4" @if(old('s14',$data->s14)==4) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s14" value="3" @if(old('s14',$data->s14)==3) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s14" value="2" @if(old('s14',$data->s14)==2) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="form-check-custom danger">
                                            <input type="radio" name="s14" value="1" @if(old('s14',$data->s14)==1) checked @endif>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <textarea rows="5" class="form-control" name="aciklama14">{{old('aciklama14',$data->aciklama14)}}</textarea>
                                    </td>

                                </tr>
                                </tbody>
                            </table>






                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-primary form-control">Kaydet</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    </form>
                </div>
                <div class="card-header">
                    <div class="row flex-between-end">
                        <div class="table-responsive">


            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('js')



    <script language="javascript"> function confirmDel() { var agree=confirm("Bu ilan?? silmek istedi??inizden emin misiniz?\nBu i??lem geri al??namaz!"); if (agree) { return true ; } else { return false ;} } </script>
@endsection
<!-- <section> close ============================-->
<!-- ============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->
