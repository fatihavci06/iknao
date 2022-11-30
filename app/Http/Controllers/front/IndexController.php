<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Ilan;
use App\Models\User;
use App\Models\Brans;
use App\Models\Campus;
use App\Models\university;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ilanlar=Ilan::where('endDate','>',now())->orderBy('id','desc')->get();
        return view('front.index',['ilanlar'=>$ilanlar]);

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
        if($varmi>0){

            $aday= User::where('tc',$request->tc)->first();

            $silinecek=$aday->avatar;
            if(!empty($request->file('avatar'))){
                $aday->avatar=Storage::putFile('avatar', $request->file('avatar'));  //storage burda


            }
            $aday->brans_id=$request->brans_id;
            $aday->firstname=$request->firstname;
            $aday->lastname=$request->lastname;
            $aday->birtercih=$request->birtercih;
            $aday->ikitercih=$request->ikitercih;
            $aday->uctercih=$request->uctercih;
            $aday->cepno=$request->cepno;
            $aday->adres=$request->adres;
            $aday->eposta=$request->eposta;
            $aday->cinsiyet=$request->cinsiyet;
            $aday->dtarihi=$request->dtarihi;
            $aday->dyeri=$request->dyeri;
            $aday->medenidurum=$request->medenidurum;
            $aday->cocuk=$request->cocuk;
            $aday->askerlikdurum=$request->askerlikdurum;
            $aday->tecil=$request->tecil;
            $aday->kangrubu=$request->kangrubu;
            $aday->acilkisi=$request->acilkisi;
            $aday->acilkisitel=$request->acilkisitel;
            $aday->sonOkulderece=$request->sonOkulderece;
            $aday->lisMezTar=$request->lisMezTar;
            $aday->sonOkul=$request->sonOkul;
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
            $random_sifre=rand(100000,999999);
            $aday->password=bcrypt($random_sifre);
            $aday->save();
            return redirect()->back()->with(['success'=>'Ön Kaydınız Alınmıştır.Şifreniz: '.$random_sifre]);
        }
        else{
            $aday= new User();
            $aday->tc=$request->tc;
            if(!empty($request->file('avatar'))){
                $aday->avatar=Storage::putFile('avatar', $request->file('avatar'));  //storage burda

            }
            $aday->brans_id=$request->brans_id;
            $aday->firstname=$request->firstname;
            $aday->lastname=$request->lastname;
            $aday->birtercih=$request->birtercih;
            $aday->ikitercih=$request->ikitercih;
            $aday->uctercih=$request->uctercih;
            $aday->cepno=$request->cepno;
            $aday->adres=$request->adres;
            $aday->eposta=$request->eposta;
            $aday->cinsiyet=$request->cinsiyet;
            $aday->dtarihi=$request->dtarihi;
            $aday->dyeri=$request->dyeri;
            $aday->medenidurum=$request->medenidurum;
            $aday->cocuk=$request->cocuk;
            $aday->askerlikdurum=$request->askerlikdurum;
            $aday->tecil=$request->tecil;
            $aday->kangrubu=$request->kangrubu;
            $aday->acilkisi=$request->acilkisi;
            $aday->acilkisitel=$request->acilkisitel;
            $aday->sonOkulderece=$request->sonOkulderece;
            $aday->lisMezTar=$request->lisMezTar;
            $aday->sonOkul=$request->sonOkul;
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
            $random_sifre=rand(100000,999999);
            $aday->password=bcrypt($random_sifre);
            $aday->save();
            return redirect()->back()->with(['success'=>'Ön Kaydınız Alınmıştır.Şifreniz: '.$random_sifre]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login(Request $req)
    {
        //
        if (Auth::attempt(['tc' => $req->tc, 'password' => $req->password])) {
            // Authentication was successful...
            return redirect()->route('front.index');
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
        $varmi=User::where('tc',$request->tc)->count();
        if($varmi>0){
            $random_sifre=rand(100000,999999);
            $aday=User::where('tc',$request->tc)->first();
            $aday->password=bcrypt($random_sifre);
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
        $data=User::find($id);

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
        $aday= User::find($id);
        $aday->tc=$request->tc;
        $silinecek=$aday->avatar;
        if(!empty($request->file('avatar'))){
            $aday->avatar=Storage::putFile('avatar', $request->file('avatar'));  //storage burda


        }
        $aday->brans_id=$request->brans_id;
        $aday->firstname=$request->firstname;
        $aday->lastname=$request->lastname;
        $aday->birtercih=$request->birtercih;
        $aday->ikitercih=$request->ikitercih;
        $aday->uctercih=$request->uctercih;
        $aday->cepno=$request->cepno;
        $aday->adres=$request->adres;
        $aday->eposta=$request->eposta;
        $aday->cinsiyet=$request->cinsiyet;
        $aday->dtarihi=$request->dtarihi;
        $aday->dyeri=$request->dyeri;
        $aday->medenidurum=$request->medenidurum;
        $aday->cocuk=$request->cocuk;
        $aday->askerlikdurum=$request->askerlikdurum;
        $aday->tecil=$request->tecil;
        $aday->kangrubu=$request->kangrubu;
        $aday->acilkisi=$request->acilkisi;
        $aday->acilkisitel=$request->acilkisitel;
        $aday->sonOkulderece=$request->sonOkulderece;
        $aday->lisMezTar=$request->lisMezTar;
        $aday->sonOkul=$request->sonOkul;
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
        return redirect()->back()->with(['success'=>'Ön Kaydınız Alınmıştır.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ilan()
    {

        $ilanlar=Ilan::where('endDate','>',now())->orderBy('id','desc')->paginate(5);
        return view('front.ilan',['ilan'=>$ilanlar]);
    }
    public function ilan_detay($id)
    {
        //
        $ilandetay=Ilan::findOrfail($id);
        return view('front.ilan_detay',['ilandetay'=>$ilandetay]);
    }
    public function destroy($id)
    {
        //
    }
}
