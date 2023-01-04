<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\ikmulakat;
use App\Models\ikperformans;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ikperformansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $data=User::where('id',$id)->firstOrFail();
        return view('back.calisan.performans_gir',['data'=>$data]);


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

            'user_id'=>'required',
            'baslik'=>'required',
            'mulakat_tur'=>'required',
            'belge' => 'max:500000',
            'tarih'=>'required',
            's1'=>'required',
            's2'=>'required',
            's3'=>'required',
            's4'=>'required',
            's5'=>'required',
            's6'=>'required',
            's7'=>'required',
            's8'=>'required',
            's9'=>'required',
            's10'=>'required',
            's11'=>'required',
            's12'=>'required',
            's13'=>'required',
            's14'=>'required',
            'file' => 'max:500000',


        ]);
        $data=new ikperformans;
        $data->user_id=$request->user_id;
        $data->baslik=$request->baslik;
        $data->mulakat_tur=$request->mulakat_tur;
        if(!empty($request->file('belge'))){
            $data->belge=Storage::putFile('izinbelge', $request->file('belge'));  //storage burda

        }
        $data->tarih=$request->tarih;
        $data->description=$request->description;
        $data->s1=$request->s1;
        $data->aciklama1=$request->aciklama1;
        $data->s2=$request->s2;
        $data->s3=$request->s3;
        $data->s4=$request->s4;
        $data->s5=$request->s5;
        $data->s6=$request->s6;
        $data->aciklama6=$request->aciklama6;
        $data->s7=$request->s7;
        $data->s8=$request->s8;
        $data->aciklama8=$request->aciklama8;
        $data->s9=$request->s9;
        $data->aciklama9=$request->aciklama9;
        $data->s10=$request->s10;
        $data->aciklama10=$request->aciklama10;
        $data->s11=$request->s11;
        $data->aciklama11=$request->aciklama11;
        $data->s12=$request->s12;
        $data->aciklama12=$request->aciklama12;
        $data->s13=$request->s13;
        $data->aciklama13=$request->aciklama13;
        $data->s14=$request->s14;
        $data->aciklama14=$request->aciklama14;
        $data->save();
        return redirect()->back()->with(['success'=>'Performans Raporu Gönderildi']);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function raporlar($id)
    {
        //
        $data=ikperformans::join('users','ikperformans.user_id','users.id')->where('ikperformans.user_id',$id)->select(['ikperformans.id as pid','ikperformans.mulakat_tur','users.firstname','users.lastname'])->get();
        if($data->count()==0){
            abort(404);
        }
        return view('back.calisan.performans_rapor',['data'=>$data]);
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
         $data=ikperformans::join('users','ikperformans.user_id','users.id')->where('ikperformans.id',$id)->select(['ikperformans.id as pid','ikperformans.*','users.*'])->firstOrFail();
        return view('back.calisan.performans_edit',['data'=>$data]);
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

            'user_id'=>'required',
            'baslik'=>'required',
            'mulakat_tur'=>'required',
            'belge' => 'max:500000',
            'tarih'=>'required',
            's1'=>'required',
            's2'=>'required',
            's3'=>'required',
            's4'=>'required',
            's5'=>'required',
            's6'=>'required',
            's7'=>'required',
            's8'=>'required',
            's9'=>'required',
            's10'=>'required',
            's11'=>'required',
            's12'=>'required',
            's13'=>'required',
            's14'=>'required',
            'file' => 'max:500000',


        ]);
        $data=ikperformans::find($id);
        $data->user_id=$request->user_id;
        $data->baslik=$request->baslik;
        $data->mulakat_tur=$request->mulakat_tur;
        if(!empty($request->file('belge'))){
            $data->belge=Storage::putFile('izinbelge', $request->file('belge'));  //storage burda

        }
        $data->tarih=$request->tarih;
        $data->description=$request->description;
        $data->s1=$request->s1;
        $data->aciklama1=$request->aciklama1;
        $data->s2=$request->s2;
        $data->s3=$request->s3;
        $data->s4=$request->s4;
        $data->s5=$request->s5;
        $data->s6=$request->s6;
        $data->aciklama6=$request->aciklama6;
        $data->s7=$request->s7;
        $data->s8=$request->s8;
        $data->aciklama8=$request->aciklama8;
        $data->s9=$request->s9;
        $data->aciklama9=$request->aciklama9;
        $data->s10=$request->s10;
        $data->aciklama10=$request->aciklama10;
        $data->s11=$request->s11;
        $data->aciklama11=$request->aciklama11;
        $data->s12=$request->s12;
        $data->aciklama12=$request->aciklama12;
        $data->s13=$request->s13;
        $data->aciklama13=$request->aciklama13;
        $data->s14=$request->s14;
        $data->aciklama14=$request->aciklama14;
        $data->save();
        return redirect()->back()->with(['success'=>'Performans Raporu Gönderildi']);
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
        $data=ikperformans::findOrFail($id);
        Storage::delete($data->belge);
        $data->delete();
        return redirect()->back()->with(['success'=>'Talep Silindi...']);
    }
}
