<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\adayprofil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdayController extends Controller
{

    public static function avatarcek(){ //dışarıdan fonksiyonun çağrılabilmesi için mutlaka public static olmalı

        $user=adayprofil::select(['id','avatar'])->where('user_id',Auth::guard('yonetim')->id())->first();
        return $user->avatar;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adaydetay($id)
    {
        //

        $data=User::join('adayprofils','adayprofils.user_id','users.id')->join('brans','adayprofils.brans_id','brans.id')->where('users.id',$id)->first();
        return view('back.aday.detay',['data'=>$data]);

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
