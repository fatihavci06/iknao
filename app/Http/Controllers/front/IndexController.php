<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Ilan;
use App\Models\IlanUser;
use App\Models\User;
use App\Models\adayprofil;
use App\Models\Brans;
use App\Models\Campus;
use App\Models\university;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
{

    public static function getBransId($brans_name){ //dışarıdan fonksiyonun çağrılabilmesi için mutlaka public static olmalı

        $brans=Brans::where('brans_name',$brans_name)->first();



        return $brans->id;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kampusler=Campus::all();
        $ilanlar=Ilan::where('endDate','>',now())->orderBy('id','desc')->get();
        return view('front.index',['ilanlar'=>$ilanlar,'kampus'=>$kampusler]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function yenibasvuru()
    {
        //

        $brans=Brans::all();
        $campus=Campus::all();
        $university=university::all();
        return view('front.yenibasvuru',['brans'=>$brans,'campus'=>$campus,'university'=>$university]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $varmi=User::where('tc',$request->tc)->count();

        if($varmi>0) {
            $user= User::where('tc',$request->tc)->first();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->eposta;

            $user->rol = 0;
            $user->tc = $request->tc;
            $user->cepno = $request->cepno;
            $user->password = bcrypt(123456);

            $data = $user->save();
            if ($data) {
                $aday = adayprofil::where('user_id',$user->id)->first();

                if (!empty($request->file('avatar'))) {
                   $aday->avatar = Storage::putFile('avatar', $request->file('avatar'));  //storage burda

                }
                $aday->user_id = $user->id;
                $user_id=$user->id;
                $aday->brans_id=$request->brans_id;

                $aday->birtercih=$request->birtercih;
                $aday->ikitercih=$request->ikitercih;
                $aday->uctercih=$request->uctercih;

                $aday->adres=$request->adres;

                $aday->cinsiyet=$request->cinsiyet;
                $aday->dtarihi=$request->dtarihi;
                $aday->dyeri=$request->dyeri;
                $aday->medenidurum=$request->medenidurum;
                $aday->cocuk=$request->cocuk;
                $aday->askerlik_durumu=$request->askerlik_durumu;
                $aday->tecil=$request->tecil;
                $aday->kangrubu=$request->kangrubu;
                $aday->acilkisi=$request->acilkisi;
                $aday->acilkisitel=$request->acilkisitel;
                $aday->sonOkulderece=$request->sonOkulderece;
                $aday->lisUni=$request->lisUni;
                $aday->lisMezTar=$request->lisMezTar;
                $aday->sonOkul_id=$request->sonOkul;
                $aday->lFak=$request->lFak;
                $aday->yLuni=$request->yLuni;
                $aday->yLisfak=$request->yLisfak;
                $aday->yDokUni=$request->yDokUni;
                $aday->yDokBolum=$request->yDokBolum;
                $aday->tecrube=$request->tecrube;
                $aday->staj=$request->staj;
                $aday->ingSev=$request->ingSev;
                $aday->almSev=$request->almSev;
                $aday->frSev=$request->frSev;
                $aday->isSev=$request->isSev;
                $aday->ofisArac=$request->ofisArac;
                $aday->kurs=$request->kurs;
                $aday->dernek=$request->dernek;
                $aday->uzmanlik=$request->uzmanlik;
                $aday->notlar=$request->notlar;
                $aday->ref1=$request->ref1;
                $aday->ref2=$request->ref2;
                $aday->ref3=$request->ref3;
                $aday->smsonay=$request->smsonay;
                $aday->save();
                if(isset($request->ilanno)){


                    IlanUser::updateOrCreate(
                        ['ilan_id'=>$request->ilanno,'user_id'=>$user_id],//Eğer  sepetUrun tablosunda sepetid ve urun_id varsa güncelleme işlemi yapar.Eğer yoksa sepet_id urun_id,adet,tutar,durum sutunlarına bu verileri ekler

                        ['ilan_id'=>$request->ilanno,'user_id'=>$user_id]
                    );
                }
                else{
                    IlanUser::updateOrCreate(
                        ['ilan_id'=>0,'user_id'=>$user_id],//Eğer  sepetUrun tablosunda sepetid ve urun_id varsa güncelleme işlemi yapar.Eğer yoksa sepet_id urun_id,adet,tutar,durum sutunlarına bu verileri ekler

                        ['ilan_id'=>0,'user_id'=>$user_id]
                    );
                }
                return redirect()->back()->with(['success' => 'Ön başvurunuz alındı']);
            } else {
                return redirect()->back()->with(['danger' => 'Hata var']);
            }
        }
        else{
            $user= new User;
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->eposta;

            $user->rol = 0;
            $user->tc = $request->tc;
            $user->cepno = $request->cepno;
            $user->password = bcrypt(123456);

            $data = $user->save();
            if ($data) {
                $aday = new adayprofil;
                if (!empty($request->file('avatar'))) {
                    $aday->avatar = Storage::putFile('avatar', $request->file('avatar'));  //storage burda

                }
                $aday->user_id = $user->id;
                $aday->brans_id=$request->brans_id;

                $aday->birtercih=$request->birtercih;
                $aday->ikitercih=$request->ikitercih;
                $aday->uctercih=$request->uctercih;

                $aday->adres=$request->adres;

                $aday->cinsiyet=$request->cinsiyet;
                $aday->dtarihi=$request->dtarihi;
                $aday->dyeri=$request->dyeri;
                $aday->medenidurum=$request->medenidurum;
                $aday->cocuk=$request->cocuk;
                $aday->askerlik_durumu=$request->askerlikdurum;
                $aday->tecil=$request->tecil;
                $aday->kangrubu=$request->kangrubu;
                $aday->acilkisi=$request->acilkisi;
                $aday->acilkisitel=$request->acilkisitel;
                $aday->sonOkulderece=$request->sonOkulderece;
                $aday->lisMezTar=$request->lisMezTar;
                $aday->lisUni=$request->lisUni;
                $aday->sonOkul_id=$request->sonOkul;
                $aday->lFak=$request->lFak;
                $aday->yLuni=$request->yLuni;
                $aday->yLisfak=$request->yLisfak;
                $aday->yDokUni=$request->yDokUni;
                $aday->yDokBolum=$request->yDokBolum;
                $aday->tecrube=$request->tecrube;
                $aday->staj=$request->staj;
                $aday->ingSev=$request->ingSev;
                $aday->almSev=$request->almSev;
                $aday->frSev=$request->frSev;
                $aday->isSev=$request->isSev;
                $aday->ofisArac=$request->ofisArac;
                $aday->kurs=$request->kurs;
                $aday->dernek=$request->dernek;
                $aday->uzmanlik=$request->uzmanlik;
                $aday->notlar=$request->notlar;
                $aday->ref1=$request->ref1;
                $aday->ref2=$request->ref2;
                $aday->ref3=$request->ref3;
                $aday->smsonay=$request->smsonay;
                $aday->save();
                if(isset($request->ilanno)){


                    IlanUser::updateOrCreate(
                        ['ilan_id'=>$request->ilanno,'user_id'=>$user->id],//Eğer  sepetUrun tablosunda sepetid ve urun_id varsa güncelleme işlemi yapar.Eğer yoksa sepet_id urun_id,adet,tutar,durum sutunlarına bu verileri ekler

                        ['ilan_id'=>$request->ilanno,'user_id'=>$user->id]
                    );
                }
                else{
                    IlanUser::updateOrCreate(
                        ['ilan_id'=>0,'user_id'=>$aday->id],//Eğer  sepetUrun tablosunda sepetid ve urun_id varsa güncelleme işlemi yapar.Eğer yoksa sepet_id urun_id,adet,tutar,durum sutunlarına bu verileri ekler

                        ['ilan_id'=>0,'user_id'=>$aday->id]
                    );
                }
                return redirect()->back()->with(['success' => 'Ön başvurunuz alındı']);
            } else {
                return redirect()->back()->with(['danger' => 'Hata var']);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function basvurularim()
    {
        $id=Auth::id();

         $ilan=IlanUser::join('ilans','ilans.id','ilan_users.ilan_id')->where('ilan_users.user_id',$id)->paginate(5);

        return view('front.basvurularim',['ilan'=>$ilan]);
        //
    }
    public function login(Request $req)
    {
        //
        if (Auth::attempt(['tc' => $req->tc, 'password' => $req->password])) {
            // Authentication was successful...
            return redirect()->route('front.edit');
        }
        else{
            return redirect()->back()->with(['false'=>'Giriş başarısız']);
        }
    }
    public function giris()
    {
        return view('front.giris');
        //
    }
    public function logout()
    {
        //
        Auth::logout();
        return redirect()->route('front.index');
    }
    public function sifremiunuttum()
    {
        //

        return view('front.sifremi_unuttum');
    }

    public function sifremiunuttumpost(Request $request)
    {
        $varmi=User::where('tc',$request->tc)->where('cepno',$request->cepno)->count();
        if($varmi>0){
            $random_sifre=rand(100000,999999);
            $aday=User::where('tc',$request->tc)->first();
            $aday->password=bcrypt(123456);
            $aday->save();
            return redirect()->back()->with(['success'=>'Şifreniz: '.$random_sifre]);
        }
        else{
            return redirect()->back()->with(['danger'=>'sisteme kayıtlı kullanıcı bulunmamaktadır']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $id=Auth::id();
         $data=User::with('adayinfo')->find($id);

        $brans=Brans::all();
        $campus=Campus::all();
        $university=university::all();
        return view('front.basvuru_duzenle',['brans'=>$brans,'campus'=>$campus,'university'=>$university,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=Auth::id();
        $user= User::find($id);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email_kurum = $request->eposta;
        $user->email = $request->email;
        $user->rol = 0;
        $user->tc = $request->tc;
        $user->cepno = $request->cepno;


        $data = $user->save();
        if ($data) {
            $aday = adayprofil::where('user_id',$id)->first();
            $silinecek=$aday->avatar;

            if (!empty($request->file('avatar'))) {
                $aday->avatar = Storage::putFile('avatar', $request->file('avatar'));  //storage burda
                Storage::delete($silinecek);
            }
            $aday->user_id = $user->id;
            $aday->brans_id=$request->brans_id;

            $aday->birtercih=$request->birtercih;
            $aday->ikitercih=$request->ikitercih;
            $aday->uctercih=$request->uctercih;

            $aday->adres=$request->adres;

            $aday->cinsiyet=$request->cinsiyet;
            $aday->dtarihi=$request->dtarihi;
            $aday->dyeri=$request->dyeri;
            $aday->medenidurum=$request->medenidurum;
            $aday->cocuk=$request->cocuk;
            $aday->askerlik_durumu=$request->askerlikdurum;
            $aday->tecil=$request->tecil;
            $aday->kangrubu=$request->kangrubu;
            $aday->acilkisi=$request->acilkisi;
            $aday->acilkisitel=$request->acilkisitel;
            $aday->sonOkulderece=$request->sonOkulderece;
            $aday->lisMezTar=$request->lisMezTar;
            $aday->lisUni=$request->lisUni;
            $aday->sonOkul_id=$request->sonOkul;
            $aday->lFak=$request->lFak;
            $aday->yLuni=$request->yLuni;
            $aday->yLisfak=$request->yLisfak;
            $aday->yDokUni=$request->yDokUni;
            $aday->yDokBolum=$request->yDokBolum;
            $aday->tecrube=$request->tecrube;
            $aday->staj=$request->staj;
            $aday->ingSev=$request->ingSev;
            $aday->almSev=$request->almSev;
            $aday->frSev=$request->frSev;
            $aday->isSev=$request->isSev;
            $aday->ofisArac=$request->ofisArac;
            $aday->kurs=$request->kurs;
            $aday->dernek=$request->dernek;
            $aday->uzmanlik=$request->uzmanlik;
            $aday->notlar=$request->notlar;
            $aday->ref1=$request->ref1;
            $aday->ref2=$request->ref2;
            $aday->ref3=$request->ref3;
            $aday->smsonay=$request->smsonay;
            $aday->save();
            return redirect()->back()->with(['success' => 'Profiliniz başarıyla güncellendi']);
        } else {
            return redirect()->back()->with(['danger' => 'Hata var']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ilan()
    {

        $ilanlar=Ilan::where('endDate','>',now())->where('durum',2)->orderBy('id','desc')->paginate(5);
        return view('front.ilan',['ilan'=>$ilanlar]);
    }
    public function ilan_detay($id)
    {
        //
        $ilandetay=Ilan::findOrfail($id);
        return view('front.ilan_detay',['ilandetay'=>$ilandetay]);
    }
    public function ara(Request $request)
    {
        //

        $istur=$request->istur;
        $konum=$request->konum;
        $kampus=$request->kampus;
        $kelime=$request->kelime;
        if(empty($kelime)&& empty($konum)&& empty($kampus)&& empty($istur)){
            return redirect()->back()->with(['false'=>'Lütfen bir seçim yapınız']);
        }
        $ara=Ilan::where('endDate','>',now())->when($istur, function ($q) use ($istur) {
            return $q->where('istur', 'like', '%'.$istur.'%');
        })
            ->when($konum, function ($q) use ($konum) {
                return $q->where('konum', 'like', '%'.$konum.'%');
            })
            ->when($kampus, function ($q) use ($kampus) {
                return $q->where('kampus', 'like', '%'.$kampus.'%');
            })
            ->when($kelime, function ($q) use ($kelime) {
                return $q->where('ilan_name', 'like', '%'.$kelime.'%');
            })
            ->paginate(5);
        $kacadet=Ilan::when($istur, function ($q) use ($istur) {
            return $q->where('istur', 'like', '%'.$istur.'%');
        })
            ->when($konum, function ($q) use ($konum) {
                return $q->where('konum', 'like', '%'.$konum.'%');
            })
            ->when($kampus, function ($q) use ($kampus) {
                return $q->where('kampus', 'like', '%'.$kampus.'%');
            })
            ->when($kelime, function ($q) use ($kelime) {
                return $q->where('ilan_name', 'like', '%'.$kelime.'%');
            })->count();



        return view('front.ilan_ara',['ilan'=>$ara,'kacadet'=>$kacadet]);

    }
    public function indirilan($id)
    {
        //

        $data=Ilan::findOrFail($id);
        if($data->belge==''){
            return redirect()->back()->with(['status'=>'bulunamadı']);
        }
        return Storage::download($data->belge);
    }
}
