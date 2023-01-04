<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\ders;
use App\Models\ikgozlem;
use App\Models\sube;
use App\Models\User;
use Illuminate\Http\Request;

class ikgozlemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $campus=Campus::all();
        $sube=sube::all();
        $ders=ders::all();
        $user=User::findOrFail($id);

        return view('back.calisan.gozlem_gir',['campus'=>$campus,'ders'=>$ders,'sube'=>$sube,'user'=>$user]);
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
        $data=new ikgozlem;
        $data->user_id=$request->user_id;
        $data->yonetici=$request->yonetici;
        $data->kampus=$request->kampus;
        $data->ders=$request->ders;
        $data->sube=$request->sube;
        $data->ders_konu=$request->ders_konu;
        $data->tarih=$request->tarih;
        $data->goztur=$request->goztur;
        $data->gozlemnotu=$request->gozlemnotu;
        $data->b1k1=$request->b1k1;
        $data->aciklama1=$request->aciklama1;
        $data->b1k2=$request->b1k2;
        $data->user_id=$request->user_id;
        $data->b1k3=$request->b1k3;
        $data->b1k4=$request->b1k4;
        $data->b1k5=$request->b1k5;
        $data->b1k6=$request->b1k6;
        $data->b1k7=$request->b1k7;
        $data->b1k8=$request->b1k8;
        $data->b2k1=$request->b2k1;
        $data->aciklama2=$request->aciklama2;
        $data->b2k2=$request->b2k2;
        $data->b2k3=$request->b2k3;
        $data->b2k4=$request->b2k4;
        $data->b2k5=$request->b2k5;
        $data->b2k6=$request->b2k6;
        $data->b2k7=$request->b2k7;
        $data->b2k8=$request->b2k8;
        $data->b2k9=$request->b2k9;
        $data->b2k10=$request->b2k10;
        $data->b2k11=$request->b2k11;
        $data->b2k12=$request->b2k12;
        $data->b2k13=$request->b2k13;
        $data->b3k1=$request->b3k1;
        $data->aciklama3=$request->aciklama3;
        $data->b3k2=$request->b3k2;
        $data->b3k3=$request->b3k3;
        $data->b3k4=$request->b3k4;
        $data->b3k5=$request->b3k5;
        $data->b3k6=$request->b3k6;
        $data->b3k7=$request->b3k7;
        $data->save();
        return redirect()->back()->with(['success'=>'Kayıt başarılı']);
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
       $data=ikgozlem::select(['ikgozlems.*','ikgozlems.id as gid'])->where('user_id',$id)->get();
        $user=User::where('id',$id)->firstOrFail();
        return view('back.calisan.gozlem_rapor',['data'=>$data,'user'=>$user]);
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
        $campus=Campus::all();
        $sube=sube::all();
        $ders=ders::all();
        $data=ikgozlem::findOrFail($id);
        $user=User::where('id',$data->user_id)->firstOrFail();

        return view('back.calisan.gozlem_edit',['campus'=>$campus,'ders'=>$ders,'sube'=>$sube,'user'=>$user,'data'=>$data]);
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
        $data=ikgozlem::findOrFail($id);
        $data->user_id=$request->user_id;
        $data->yonetici=$request->yonetici;
        $data->kampus=$request->kampus;
        $data->ders=$request->ders;
        $data->sube=$request->sube;
        $data->ders_konu=$request->ders_konu;
        $data->tarih=$request->tarih;
        $data->goztur=$request->goztur;
        $data->gozlemnotu=$request->gozlemnotu;
        $data->b1k1=$request->b1k1;
        $data->aciklama1=$request->aciklama1;
        $data->b1k2=$request->b1k2;
        $data->user_id=$request->user_id;
        $data->b1k3=$request->b1k3;
        $data->b1k4=$request->b1k4;
        $data->b1k5=$request->b1k5;
        $data->b1k6=$request->b1k6;
        $data->b1k7=$request->b1k7;
        $data->b1k8=$request->b1k8;
        $data->b2k1=$request->b2k1;
        $data->aciklama2=$request->aciklama2;
        $data->b2k2=$request->b2k2;
        $data->b2k3=$request->b2k3;
        $data->b2k4=$request->b2k4;
        $data->b2k5=$request->b2k5;
        $data->b2k6=$request->b2k6;
        $data->b2k7=$request->b2k7;
        $data->b2k8=$request->b2k8;
        $data->b2k9=$request->b2k9;
        $data->b2k10=$request->b2k10;
        $data->b2k11=$request->b2k11;
        $data->b2k12=$request->b2k12;
        $data->b2k13=$request->b2k13;
        $data->b3k1=$request->b3k1;
        $data->aciklama3=$request->aciklama3;
        $data->b3k2=$request->b3k2;
        $data->b3k3=$request->b3k3;
        $data->b3k4=$request->b3k4;
        $data->b3k5=$request->b3k5;
        $data->b3k6=$request->b3k6;
        $data->b3k7=$request->b3k7;
        $data->save();
        return redirect()->back()->with(['success'=>'Kayıt başarılı']);
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
        $data=ikgozlem::findOrFail($id);
        $data->delete();
        return redirect()->back()->with(['success'=>'Kayıt silindi']);
    }
}
