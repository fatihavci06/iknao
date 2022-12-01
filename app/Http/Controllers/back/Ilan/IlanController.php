<?php

namespace App\Http\Controllers\back\Ilan;

use App\Http\Controllers\Controller;
use App\Models\Brans;
use App\Models\Campus;
use App\Models\Ilan;
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
            'endDate'=>'required',
            'description'=>'required',
        ]);
        $varmi=Brans::where('brans_name',$request->ilan_name)->count();
        if($varmi==0){
            Brans::create(['brans_name'=>$request->ilan_name]);
        }
        Ilan::create([
           'ilan_name'=>$request->ilan_name,
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
            $data = Ilan::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){ // harici bir column dönderdik
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">id'.$data->id.'</a>'; //idleri tek tek ekrana veriyoruz tabi bunu ek sütun olarak tabloya işliyoruz. sütun ismi actiın
                    return $btn;
                })
                ->rawColumns(['action'])//action sutunu viewe gönderdik,addcolumda kaç sutun eklersek buraya yazarız ve viewda karşılaşadığımız yerde işlem yaparız
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
    public function show($id)
    {
        //
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
