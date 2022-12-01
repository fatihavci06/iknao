<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
        return view('back.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('back.giris');
    }
    public function loginpost(Request $req)
    {
        $req->validate([

            'tc'=>'required',
            'password'=>'required',
        ]);
        if (Auth::guard('yonetim')->attempt(['tc' => $req->tc, 'password' => $req->password,'rol'=>!0])) {
            // Authentication was successful...
            return redirect()->route('back.index');
        }
        else{
            return redirect()->route('back.giris')->with(['false'=>'Hata!']);
        }

    }
    public function logout()
    {
        Auth::guard('yonetim')->logout();
        return redirect()->route('back.giris');;
    }
    public function sifremiunuttum()
    {
        //
        return view('back.sifremiunuttum');
    }
    public function sifremiunuttumpost(Request $request)
    {

        $varmi=User::where('tc',$request->tc)->where('cepno',$request->cepno)->count();
        $personel=User::where('tc',$request->tc)->first();
        if($varmi>0 && $personel->rol!=0){
            $random_sifre=rand(100000,999999);

            $personel->password=bcrypt($random_sifre);
            $personel->save();
            return redirect()->back()->with(['success'=>'Şifreniz: '.$random_sifre]);
        }
        else{
            return redirect()->back()->with(['danger'=>'sisteme kayıtlı kullanıcı bulunmamaktadır']);
        }
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
