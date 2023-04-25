<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class loginConroller extends Controller
{
    public function girisSayfasi(){
        return view("girisSayfasi");
    }
      


        public function ogrenciEkle(Request $request){
            $rules=([
                'isim'=>'required',
                'soyad'=>'required',
                'tckn'=>'required',
                'sifre'=>'required',
                'okul'=>'required',
                'dogumTarihi'=>'required',
                'email'=>'required',
                'telefon'=>'required',
    
            ]);
            $customMessages = [
                'isim.required' => 'Lütfen isim giriniz!',
                'soyad.required' => 'Lütfen soyad giriniz!',
                'tckn.required' => 'Lütfen TC kimlik numarası giriniz!',
                'sifre.required' => 'Lütfen şifre giriniz!',
                'okul.required' => 'Lütfen okul giriniz!',
                'email.required' => 'Lütfen e-mail giriniz!',
                'telefon.required' => 'Lütfen telefon numarası giriniz!',
                'dogumTarihi.required' => 'Lütfen doğum tarihi giriniz!',
    
            ];$this->validate($request, $rules, $customMessages);
            $user =new User();
            $user->isim=$request->isim;
            $user->soyad=$request->soyad;
            $user->email=$request->email;
            $user->tckn=$request->tckn;
            $user->telefon=$request->telefon;
            $user->okul=$request->okul;
            $user->sifre=Hash::make($request->sifre);
            $user->dogumTarihi=$request->dogumTarihi;
            $user->sys_role="öğrenci";
            $result=$user->save();
            if($result){
              return  redirect()->route("ogrenciSayfasi")->with("success","Kayıt basarı ile eklendi");
            }
            else{
                return back()->with('fail',"Kayıt işlemi başarısız");
            }
         } 
         
    public function girisYapma(Request $request){
        $request->validate([
            'tckn'=>'required',
            'sifre'=>'required',
        ]);
        $user=User::where('tckn','=',$request->tckn)->first();
        if($user){
            if(Hash::check($request->sifre,$user->sifre)){
                $request->session()->put('girisId',$user->id);
                if($user->sys_role=='öğrenci'){
                    return  redirect()->route("ogrenciSayfasi")->with("success","Kayıt basarı ile eklendi");
                }
                else if($user->sys_role=='öğretmen'){
                   return redirect()->route("ogretmenSayfasi");
                }
                else{
                    return redirect()->route("adminAnasayfa");
                }
              
            }else{
              
                return back()->with('fail','TC kimlik numarası ya da şifre hatalı.');
            }

        }
        else{
            return back()->with('fail','TC kimlik numarası ya da şifre hatalı.');
        }

    }
    public function ogrenciSayfasi(){
        return view('ogrenci.ogrenciAnasayfa');
    }
    //ogretmen sayfası
    public function ogretmenSayfasi(){
        $data=array();
        if(Session::has('girisId')){
           $data=User::where('id','=',Session::get('girisId'))->first();   
        }
        return view("ogretmen.anasayfa",compact('data'));
    }

    public function cikisIslemi(){
        if(Session::has('girisId')){
            Session::pull("girisId");
            return redirect()->route("giriş_kaydol_Sayfasi");
        }
    }
}
