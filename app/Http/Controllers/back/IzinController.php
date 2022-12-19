<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\IlanUser;
use App\Models\izintur;
use App\Models\IzinTalepler;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use DB;
class IzinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function talep()
    {
        //

        $id= Auth::guard('yonetim')->id();
        $personel=User::select('firstname','lastname','id')->where('amir_id',$id)->orWhere('id',$id)->get();
        $izin_tur=izintur::all();

        return view('back.izin.talep_formu',['izin_turler'=>$izin_tur,'personel'=>$personel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function talepkayit(Request $request)
    {
        //
        $request->validate([
            'izin_tur'=>'required',
            'user_id'=>'required',
            'baslangic_tarih'=>'required',
            'bitis_tarih'=>'required',
            'belge' => 'max:15000',


        ]);
        if($request->baslangic_tarih>$request->bitis_tarih){
            return redirect()->back()->with(['danger'=>'Başlangıç tarihi bitiş tarihinden büyük olamaz!!']);
        }
        $varmi=0;
        $varmi=DB::table('izin_taleplers')->where([
            ['baslangic_tarih', '<', $request->baslangic_tarih],
            ['bitis_tarih', '>', $request->baslangic_tarih],
        ])->orWhere([
            ['baslangic_tarih', '<', $request->bitis_tarih],
            ['bitis_tarih', '>', $request->bitis_tarih],
        ])->where('user_id',$request->user_id)->count();
        if($varmi>0){
            return redirect()->back()->with(['danger'=>'Bu tarihlerde planladığınız izniniz bulunmaktadır']);
        }

          $user=User::where('id',$request->user_id)->first();
        $data=new IzinTalepler;
        if(!empty($request->file('belge'))){
            $data->belge=Storage::putFile('izinbelge', $request->file('belge'));  //storage burda

        }

        $data->izin_tur=$request->izin_tur;
        $data->user_id=$request->user_id;
        $data->amir_id=$user->amir_id;
        $data->baslangic_tarih=$request->baslangic_tarih;
        $data->bitis_tarih=$request->bitis_tarih;
        $data->aciklama=$request->description;
        $data->save();
        return redirect()->back()->with(['success'=>'Talep başarıyla oluşturuldu']);
    }
    public function taleplerim(Request $request)
    {
        //

        if ($request->ajax()) {
            $data=IzinTalepler::with(['izininfo'])->where('user_id',Auth::guard('yonetim')->id())->orderByDesc('created_at')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('izin_tur', function($data){

                    $ad = $data->izininfo->izin_tur;
                    return $ad;
                })
                ->addColumn('baslangic_tarih', function($data){

                    $ad = $data->baslangic_tarih;
                    return $ad;

                })
                ->addColumn('bitis_tarih', function($data){

                    $ad = $data->bitis_tarih;
                    return $ad;

                })
                ->addColumn('durum', function($data){

                    $ad = $data->durum;
                    if($data->durum==0){
                        $ad='<a href="#" class="btn btn-sm btn-info">Beklemede</a>';
                    }
                    elseif($data->durum==1){
                        $ad='<a href="#" class="btn btn-sm btn-success">Onaylandı</a>';
                    }
                    else{
                        $ad='<a href="#" class="btn btn-sm btn-danger">Reddedildi</a>';
                    }
                    return $ad;

                })
                ->addColumn('gor', function($data){

                    $btn = '<a href="'.route('izin.talepdetay',$data->id).'" class="edit btn btn-primary btn-sm">Görüntüle</a>';
                    $btn.='<a onclick="return confirmDel();" href="'.route('izin.talepsil',$data->id).'" class="edit btn btn-danger btn-sm " style="margin-left:10px;">Sil</a>';
                    return $btn;
                })
                ->rawColumns(['izin_tur','baslangic_tarih','bitis_tarih','durum','gor'])
                //action sutunu viewe gönderdik,addcolumda kaç sutun eklersek buraya yazarız ve viewda karşılaşadığımız yerde işlem yaparız
                ->make(true);
        }

        return view('back.izin.taleplerim');
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
    }


    public function amironaylananizinler(Request $request)
    {
        //
        if ($request->ajax()) {
            $data=IzinTalepler::with(['userinfo','izininfo'])->where('amir_id',Auth::guard('yonetim')->id())->where('durum',1)->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('ad_soyad', function($data){

                    $ad = $data->userinfo->firstname.' '.$data->userinfo->lastname;
                    return $ad;

                })
                ->addColumn('tc', function($data){

                    $ad = $data->userinfo->tc;
                    return $ad;

                })
                ->addColumn('izin_tur', function($data){

                    $ad = $data->izininfo->izin_tur;
                    return $ad;
                })
                ->addColumn('baslangic_tarih', function($data){

                    $ad = $data->baslangic_tarih;
                    return $ad;

                })
                ->addColumn('bitis_tarih', function($data){

                    $ad = $data->bitis_tarih;
                    return $ad;

                })
                ->addColumn('gor', function($data){

                    $btn = '<a href="'.route('izin.amirdetaygor',$data->id).'" class="edit btn btn-primary btn-sm">Görüntüle</a>';

                    return $btn;
                })
                ->rawColumns(['ad_soyad','tc','izin_tur','baslangic_tarih','bitis_tarih','gor'])
                //action sutunu viewe gönderdik,addcolumda kaç sutun eklersek buraya yazarız ve viewda karşılaşadığımız yerde işlem yaparız
                ->make(true);
        }

        return view('back.izin.amir.onaylanan');
    }
    public function amirreddedilenizinler(Request $request)
    {
        //
        if ($request->ajax()) {
            $data=IzinTalepler::with(['userinfo','izininfo'])->where('amir_id',Auth::guard('yonetim')->id())->where('durum',2)->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('ad_soyad', function($data){

                    $ad = $data->userinfo->firstname.' '.$data->userinfo->lastname;
                    return $ad;

                })
                ->addColumn('tc', function($data){

                    $ad = $data->userinfo->tc;
                    return $ad;

                })
                ->addColumn('izin_tur', function($data){

                    $ad = $data->izininfo->izin_tur;
                    return $ad;
                })
                ->addColumn('baslangic_tarih', function($data){

                    $ad = $data->baslangic_tarih;
                    return $ad;

                })
                ->addColumn('bitis_tarih', function($data){

                    $ad = $data->bitis_tarih;
                    return $ad;

                })
                ->addColumn('gor', function($data){

                    $btn = '<a href="'.route('izin.amirdetaygor',$data->id).'" class="edit btn btn-primary btn-sm">Görüntüle</a>';

                    return $btn;
                })
                ->rawColumns(['ad_soyad','tc','izin_tur','baslangic_tarih','bitis_tarih','gor'])
                //action sutunu viewe gönderdik,addcolumda kaç sutun eklersek buraya yazarız ve viewda karşılaşadığımız yerde işlem yaparız
                ->make(true);
        }

        return view('back.izin.amir.reddedilen');
    }
    public function amirbekleyenizinler(Request $request)
    {
        //


        if ($request->ajax()) {
            $data=IzinTalepler::with(['userinfo','izininfo'])->where('amir_id',Auth::guard('yonetim')->id())->where('durum',0)->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('ad_soyad', function($data){

                    $ad = $data->userinfo->firstname.' '.$data->userinfo->lastname;
                    return $ad;

                })
                ->addColumn('tc', function($data){

                    $ad = $data->userinfo->tc;
                    return $ad;

                })
                ->addColumn('izin_tur', function($data){

                    $ad = $data->izininfo->izin_tur;
                    return $ad;
                })
                ->addColumn('baslangic_tarih', function($data){

                    $ad = $data->baslangic_tarih;
                    return $ad;

                })
                ->addColumn('bitis_tarih', function($data){

                    $ad = $data->bitis_tarih;
                    return $ad;

                })
                ->addColumn('gor', function($data){

                    $btn = '<a href="'.route('izin.amirdetaygor',$data->id).'" class="edit btn btn-primary btn-sm">Görüntüle</a>';

                    return $btn;
                })
                ->rawColumns(['ad_soyad','tc','izin_tur','baslangic_tarih','bitis_tarih','gor'])
                //action sutunu viewe gönderdik,addcolumda kaç sutun eklersek buraya yazarız ve viewda karşılaşadığımız yerde işlem yaparız
                ->make(true);
        }

        return view('back.izin.amir.bekleyenler');




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function talepdetay($id)
    {
        //

        $data=IzinTalepler::findOrFail($id);


        $user= User::where('id',$data->user_id)->first();

        if($user->amir_id==Auth::guard('yonetim')->id() || $data->user_id==Auth::guard('yonetim')->id()){
            $userid= Auth::guard('yonetim')->id();
            $personel=User::select('firstname','lastname','id')->where('amir_id',$userid)->orWhere('id',$userid)->get();
            $izin_tur=izintur::all();

            return view('back.izin.talep_formu_edit',['izin_turler'=>$izin_tur,'personel'=>$personel,'data'=>$data]);
        }

        else{
            return redirect()->back()->with(['success'=>'Yetkiniz bulunmamaktadır!!!!!']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function talepupdate(Request $request, $id)
    {
        //
        $request->validate([
            'izin_tur'=>'required',
            'user_id'=>'required',
            'baslangic_tarih'=>'required',
            'bitis_tarih'=>'required',
            'belge' => 'max:15000',

        ]);

        $user=User::where('id',Auth::guard('yonetim')->id())->first();
        $data=IzinTalepler::findOrFail($id);
        if(!empty($request->file('belge'))){
            Storage::delete($data->belge);
            $data->belge=Storage::putFile('izinbelge', $request->file('belge'));  //storage burda

        }

        $data->izin_tur=$request->izin_tur;
        $data->user_id=$request->user_id;
        $data->amir_id=$user->amir_id;
        $data->baslangic_tarih=$request->baslangic_tarih;
        $data->bitis_tarih=$request->bitis_tarih;
        $data->aciklama=$request->description;
        $data->save();
        return redirect()->back()->with(['success'=>'Talep başarıyla güncellendi']);
    }
    public function amirdetaygor($id)
    {
        $data=IzinTalepler::with(['izininfo','userinfo'])->where('id',$id)->first();


        $user= User::where('id',$data->user_id)->first();

        if(($user->amir_id==Auth::guard('yonetim')->id() || $data->user_id==Auth::guard('yonetim')->id()) ){



            return view('back.izin.amir.talepgor',['data'=>$data]);
        }

        else{
            return redirect()->back()->with(['success'=>'Yetkiniz bulunmamaktadır!!!!!']);
        }
    }

    public function amirbelgeindir($id){

        $belge=IzinTalepler::findOrFail($id);

        if($belge->belge==''){
            return redirect()->back()->with(['danger'=>'Belge Bulunamadı.']);
        }
        return Storage::download($belge->belge);
    }
    public function amironay(Request $request,$id)
    {
        $data=IzinTalepler::where('id',$id)->first();
        $user= User::where('id',$data->user_id)->first();
        if(($user->amir_id==Auth::guard('yonetim')->id() || $data->user_id==Auth::guard('yonetim')->id()) ){




            $data->durum=$request->durum;
            $data->save();
            return redirect()->back()->with(['success'=>'Talep güncellendi']);
        }

        else{
            return redirect()->back()->with(['success'=>'Yetkiniz bulunmamaktadır!!!!!']);
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
      /*  $user_id=Auth::guard('yonetim')->id();
        User::where('id',$user_id)->orWhere('')->first();*/

        $data=IzinTalepler::findOrFail($id);


        $user= User::where('id',$data->user_id)->first();

        if(($user->amir_id==Auth::guard('yonetim')->id() || $data->user_id==Auth::guard('yonetim')->id()) && $data->durum==0){

            Storage::delete($data->belge);
            $data->delete();
            return redirect()->back()->with(['success'=>'Talep Silindi...']);
        }

        else{
            return redirect()->back()->with(['success'=>'Yetkiniz bulunmamaktadır!!!!!']);
        }
    }
}
