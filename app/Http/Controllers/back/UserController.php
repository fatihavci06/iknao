<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\adayprofil;
use App\Models\Campus;
use App\Models\ikmulakat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        if ($request->ajax()) {
            $data=User::join('adayprofils','adayprofils.user_id','users.id')
                ->join('brans','adayprofils.brans_id','brans.id')->where('users.rol',0)
                ->select(['users.*','brans.brans_name','adayprofils.id','users.id as userid'])->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('ad', function($data){

                    $ad = $data->firstname;
                    return $ad;
                })
                ->addColumn('soyad', function($data){

                    $ad = $data->lastname;
                    return $ad;

                })
                ->addColumn('tc', function($data){

                    $ad = $data->tc;
                    return $ad;

                })
                ->addColumn('brans', function($data){

                    $ad = $data->brans_name;

                    return $ad;

                })
                ->addColumn('gor', function($data){

                    $btn = '<a href="'.route('back.adaydetay',$data->userid).'" class="edit btn btn-primary btn-sm">CV</a>';
                    $btn.= '<a href="'.route('aday.mulakatgir',$data->userid).'" class="edit btn btn-warning btn-sm" style="margin-left:5px;">Mülakat Gir</a>';
                    $btn.= '<a href="'.route('aday.mulakatlar',$data->userid).'" class="edit btn btn-success btn-sm" style="margin-left:5px;">Mülakatlar</a>';
                    return $btn;
                })
                ->rawColumns(['ad','soyad','tc','brans','gor'])
                //action sutunu viewe gönderdik,addcolumda kaç sutun eklersek buraya yazarız ve viewda karşılaşadığımız yerde işlem yaparız
                ->make(true);
        }
        return view('back.aday.aday_liste');
    }
    public function calisan(Request $request)
    {

        if ($request->ajax()) {
            $data=User::join('adayprofils','adayprofils.user_id','users.id')->join('brans','adayprofils.brans_id','brans.id')->where('users.rol',1)->select(['users.*','brans.brans_name','adayprofils.id','users.id as userid'])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('ad', function($data){

                    $ad = $data->firstname;
                    return $ad;
                })
                ->addColumn('soyad', function($data){

                    $ad = $data->lastname;
                    return $ad;

                })
                ->addColumn('tc', function($data){

                    $ad = $data->tc;
                    return $ad;

                })
                ->addColumn('brans', function($data){

                    $ad = $data->brans_name;
                    return $ad;

                })
                ->addColumn('gor', function($data){

                    $btn = '<a href="'.route('back.adaydetay',$data->userid).'" style="margin-left:5px;margin-top:5px;" class="edit btn btn-primary btn-sm">CV</a><br/>';

                    $btn.= '<a href="'.route('performans.index',$data->userid).'" class="edit btn btn-success btn-sm" style="margin-left:5px;margin-top:5px;">Performans Gir</a>';
                    $btn.= '<a href="'.route('performans.raporlar',$data->userid).'" class="edit btn btn-success btn-sm" style="margin-left:5px;margin-top:5px;">Perf. Rapor</a>';
                    $btn.= '<a href="'.route('gozlem.index',$data->userid).'" class="edit btn btn-warning btn-sm" style="margin-left:5px;margin-top:5px;">Gözlem Gir</a>';
                    $btn.= '<a href="'.route('gozlem.raporlar',$data->userid).'" class="edit btn btn-warning btn-sm" style="margin-left:5px;margin-top:5px;">Gözlem Rpr.</a>';
                    return $btn;
                })
                ->rawColumns(['ad','soyad','tc','brans','gor'])
                //action sutunu viewe gönderdik,addcolumda kaç sutun eklersek buraya yazarız ve viewda karşılaşadığımız yerde işlem yaparız
                ->make(true);
        }
        return view('back.calisan.calisan_liste');
    }
    public function mulakatlarliste($id,Request $request)
    {

        // ikmulakat::join('adayprofils','adayprofils.user_id','ikmulakats.user_id')->get();

         $data=ikmulakat::join('adayprofils','adayprofils.user_id','ikmulakats.user_id')
            ->join('users','users.id','ikmulakats.user_id')
           ->where('ikmulakats.user_id',$id)
           ->select(['adayprofils.*','users.*','ikmulakats.*','ikmulakats.id as mid'])
            ->get();
         if($data->count()==0){
             abort(404);

         }
        return view('back.aday.mulakat_liste',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mulakatdetay($id)
    {
        //

          $aday=ikmulakat::where('ikmulakats.id',$id)
            ->join('users','users.id','ikmulakats.user_id')
            ->select(['ikmulakats.*','users.*','ikmulakats.id as ikid'])
            ->firstOrFail();
        $campus=Campus::all();
        return view('back.aday.mulakat_formu_edit',['aday'=>$aday,'campus'=>$campus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mulakatupdate(Request $request,$id)
    {
        //
        $request->validate([
            'kampus'=>'required',
            'mulakat_tur'=>'required',
            'description'=>'required',
            'puan'=>'required',
            'tarih'=>'required',
            'belge' => 'max:15000',
        ]);
        $data=ikmulakat::findOrFail($id);
        $data->user_id=$request->user_id;
        $data->kampus=$request->kampus;
        $data->mulakat_tur=$request->mulakat_tur;
        $data->aciklama=$request->description;
        $data->puan=$request->puan;
        $data->tarih=$request->tarih;
        if(!empty($request->file('belge'))){
            $data->belge=Storage::putFile('mulakat', $request->file('belge'));  //storage burda

        }
        $data->save();
        return redirect()->back()->with(['success'=>'Rapor güncellendi']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mulakat($id)
    {
        //
        $aday=User::findOrFail($id);
        $campus=Campus::all();
        return view('back.aday.mulakat_formu',['aday'=>$aday,'campus'=>$campus]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mulakatpost(Request $request,$id)
    {
        //
        $request->validate([
            'kampus'=>'required',
            'mulakat_tur'=>'required',
            'description'=>'required',
            'puan'=>'required',
            'tarih'=>'required',
            'belge' => 'max:15000',
        ]);
        $data=new ikmulakat;
        $data->user_id=$request->id;
        $data->kampus=$request->kampus;
        $data->mulakat_tur=$request->mulakat_tur;
        $data->aciklama=$request->description;
        $data->puan=$request->puan;
        $data->tarih=$request->tarih;
        if(!empty($request->file('belge'))){
            $data->belge=Storage::putFile('mulakat', $request->file('belge'));  //storage burda

        }
        $data->save();
        return redirect()->back()->with(['success'=>'Rapor oluşturuldu']);



    }
    public function mulakatbelge(Request $request, $id)
    {
        //
        $aday=ikmulakat::findOrFail($id);
        if($aday->belge==''){
            return redirect()->back()->with(['status'=>'cv bulunamadı']);
        }
        return Storage::download($aday->belge);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
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
    }
}
