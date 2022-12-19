<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
            $data = User::with('bransInfo')->where('rol',0)->get();
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

                    $ad = $data->bransInfo->brans_name;
                    return $ad;

                })
                ->addColumn('gor', function($data){

                    $btn = '<a href="'.route('back.adaydetay',$data->id).'" class="edit btn btn-primary btn-sm">Aday CV</a>';
                    $btn.= '<a href="'.route('back.adaydetay',$data->id).'" class="edit btn btn-warning btn-sm" style="margin-left:5px;">Düzenle</a>';
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
            $data = User::with('bransInfo')->where('rol',1)->get();
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

                    $ad = $data->bransInfo->brans_name;
                    return $ad;

                })
                ->addColumn('gor', function($data){

                    $btn = '<a href="'.route('back.adaydetay',$data->id).'" class="edit btn btn-primary btn-sm">Aday CV</a>';
                    $btn.= '<a href="'.route('back.adaydetay',$data->id).'" class="edit btn btn-warning btn-sm" style="margin-left:5px;">Düzenle</a>';
                    return $btn;
                })
                ->rawColumns(['ad','soyad','tc','brans','gor'])
                //action sutunu viewe gönderdik,addcolumda kaç sutun eklersek buraya yazarız ve viewda karşılaşadığımız yerde işlem yaparız
                ->make(true);
        }
        return view('back.calisan.calisan_liste');
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
