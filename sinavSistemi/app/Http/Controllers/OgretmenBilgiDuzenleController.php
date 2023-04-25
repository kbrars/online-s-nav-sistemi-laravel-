<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OgretmenBilgiDuzenleController extends Controller
{
     //ogretmen bilgi düzenleme sayfasına giriş
     public function ogretmenBilgiSayfasi(){
        $data=array();
        if(Session::has('girisId')){
           $data=User::where('id','=',Session::get('girisId'))->first();   
        }
        return view("ogretmen.ogretmenBilgiDuzenle",compact('data'));
    }
    //ogretmen Bilgi Duzenleme işlemi
    public function ogretmenBilgiDuzenleme(){
        $data=array();
        if(Session::has('girisId')){
           $data=User::where('id','=',Session::get('girisId'))->first();   
        }
        $request=request();
        $sinav_id=$request->sinav_id;
        $data['sinav_id'] = $sinav_id;     
        $sinav_id=$request->sinav_id;
        $affected = DB::table('users')
        ->where('id', $data->id)
        ->update(['isim' =>$request->isim,
        'soyad'=>$request->soyad,
        'okul'=>$request->okul,
        'tckn'=>$request->tckn,
        'email'=>$request->email,
        'telefon'=>$request->telefon,
        'dogumTarihi'=>$request->dogumTarihi,
        'sifre'=>Hash::make($request->sifre),
        ]);
     
        return redirect()->route("ogretmenBilgiSayfasi",compact('data'));
    }


}
