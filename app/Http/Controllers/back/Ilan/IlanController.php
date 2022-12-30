<?php

namespace App\Http\Controllers\back\Ilan;

use App\Http\Controllers\Controller;
use App\Models\Brans;
use App\Models\Campus;
use App\Models\Ilan;
use App\Models\IlanUser;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class IlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kampusler=Campus::all();
        return view('back.ilan.ekle',['kampusler'=>$kampusler]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $request->validate([
            'ilan_name'=>'required|min:5',
            'konum'=>'required',
            'kampus'=>'required',
            'istur'=>'required',
            'endDate'=>'required',
            'description'=>'required',
        ]);
        $varmi=Brans::where('brans_name',$request->ilan_name)->count();
        if($varmi==0){
            Brans::create(['brans_name'=>$request->ilan_name]);
        }
        Ilan::create([
           'ilan_name'=>$request->ilan_name,
            'kampus'=>$request->kampus,
            'durum'=>$request->durum,
            'istur'=>$request->istur,
            'konum'=>$request->konum,
            'endDate'=>$request->endDate,
            'description'=>$request->description


        ]);
        return redirect()->back()->with(['success'=>'İlan Başarıyla yayınlanmıştır']);

    }
    public function liste(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = Ilan::orderByDesc('id')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('edit', function($data){

                    $btn = '<a href="'.route('ilan.edit',$data->id).'" class="edit btn btn-primary btn-sm">Düzenle</a>';
                    $btn.= '<a onclick="return confirmDel();" href="'.route('ilan.delete',$data->id).'" style="margin-left:5px;" class=" edit btn btn-danger btn-sm">Sil</a>';
                    $btn .= '<a href="'.route('ilan.basvurular',$data->id).'" style="margin-left:5px;" class="edit btn btn-success btn-sm">Başvurular</a>';
                    return $btn;
                })
                ->addColumn('durum', function($data){


                    if($data->durum==2){
                        $btn ='Aktif';
                    }
                    else{
                        $btn ='Pasif';
                    }
                    return $btn;
                })
                ->rawColumns(['edit','durum'])
                //action sutunu viewe gönderdik,addcolumda kaç sutun eklersek buraya yazarız ve viewda karşılaşadığımız yerde işlem yaparız
                ->make(true);
        }
        return view('back.ilan.ilan_liste');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function onbasvuruliste(Request $request)
    {
        //



        if ($request->ajax()) {
            $data=IlanUser::join('users','users.id','ilan_users.user_id')
                ->join('adayprofils','adayprofils.user_id','ilan_users.user_id')
                ->join('brans','brans.id','adayprofils.brans_id')
                ->where('ilan_users.ilan_id',0)
                ->select(['ilan_users.*','brans.*','users.*'])
                ->get();
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

                    $btn = '<a href="'.route('back.adaydetay',$data->user_id).'" class="edit btn btn-primary btn-sm">Detaylı İncele</a>';

                    return $btn;
                })
                ->rawColumns(['ad','soyad','tc','brans','gor'])
                //action sutunu viewe gönderdik,addcolumda kaç sutun eklersek buraya yazarız ve viewda karşılaşadığımız yerde işlem yaparız
                ->make(true);
        }
        return view('back.ilan.ilan_onbasvuru_liste');

    }
    public function tumbasvuruliste(Request $request)
    {
        //


      //     $data=User::join('adayprofils','adayprofils.user_id','users.id')->join('brans','adayprofils.brans_id','brans.id')->where('users.id',$id)->first();


        if ($request->ajax()) {
            $data=IlanUser::join('adayprofils','adayprofils.user_id','ilan_users.user_id')
                ->join('brans','brans.id','adayprofils.brans_id')
                ->join('users','users.id','adayprofils.user_id')
                ->select(['users.*','brans.brans_name'])
                ->get();
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

                    $btn = '<a href="'.route('back.adaydetay',$data->id).'" class="edit btn btn-primary btn-sm">Detaylı İncele</a>';

                    return $btn;
                })
                ->rawColumns(['ad','soyad','tc','brans','gor'])
                //action sutunu viewe gönderdik,addcolumda kaç sutun eklersek buraya yazarız ve viewda karşılaşadığımız yerde işlem yaparız
                ->make(true);
        }
        return view('back.ilan.ilan_tumbasvuru_liste');

    }
    public function basvurular($id,Request $request)
    {


        if ($request->ajax()) {
            $data=IlanUser::join('adayprofils','adayprofils.user_id','ilan_users.user_id')
                ->join('ilans','ilans.id','ilan_users.ilan_id')
                ->join('users','users.id','adayprofils.user_id')
                ->join('brans','brans.id','adayprofils.brans_id')
                ->select(['users.*','ilans.*','users.id as userid','brans.*'])
                ->where('ilan_users.ilan_id',$id)
                ->get();
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

                    $btn = '<a href="'.route('back.adaydetay',$data->userid).'" class="edit btn btn-primary btn-sm">Detaylı İncele</a>';

                    return $btn;
                })
                ->rawColumns(['ad','soyad','tc','brans','gor'])
                //action sutunu viewe gönderdik,addcolumda kaç sutun eklersek buraya yazarız ve viewda karşılaşadığımız yerde işlem yaparız
                ->make(true);
        }
        return view('back.ilan.ilan_basvurular');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ilan=Ilan::findOrFail($id);
        $kampusler=Campus::all();
        return view('back.ilan.edit',['kampusler'=>$kampusler,'ilan'=>$ilan]);
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

        $request->validate([
            'ilan_name'=>'required|min:5',
            'kampus'=>'required',
            'istur'=>'required',
            'konum'=>'required',
            'endDate'=>'required',
            'description'=>'required',
        ]);
        $varmi=Brans::where('brans_name',$request->ilan_name)->count();
        if($varmi==0){
            Brans::create(['brans_name'=>$request->ilan_name]);
        }
        $ilan=Ilan::findOrFail($id);
        $ilan->ilan_name=$request->ilan_name;
        $ilan->konum=$request->konum;
        $ilan->kampus=$request->kampus;
        $ilan->istur=$request->istur;
        $ilan->durum=$request->durum;
        $ilan->endDate=$request->endDate;
        $ilan->description=$request->description;
        $ilan->save();

        return redirect()->back()->with(['success'=>'İlan Başarıyla yayınlanmıştır']);
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
        $data=Ilan::findOrFail($id);
        $data->delete();
        return redirect()->back()->with(['success'=>'İlan başarıyla silindi']);
    }
}
