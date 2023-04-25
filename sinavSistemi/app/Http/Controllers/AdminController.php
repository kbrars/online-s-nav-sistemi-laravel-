<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminAnasayfa(){
        $data=array();
        if(Session::has('girisId')){
           $data=User::where('id','=',Session::get('girisId'))->first();   
        }
        return view("admin.adminAnasayfa",compact("data"));
    }

    public function sinavlarSayfasi(){
        $data=array();
        if(Session::has('girisId')){
           $data=User::where('id','=',Session::get('girisId'))->first();   
        }
        $sinavlar=DB::table('sinavlar')->get();
        return view("admin.adminSinavlar",compact("data","sinavlar"));
    }
    public function adminProfil(){
        $data=array();
        if(Session::has('girisId')){
           $data=User::where('id','=',Session::get('girisId'))->first();   
        }
       
        return view("admin.adminProfil",compact("data",));
    }
    //admin profil bilgileri düzenleme işlemi
    public function adminBilgiDuzenleme(){
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
     
        return redirect()->route("adminProfil",compact('data'));
    }

    public function ogretmenlerGoruntuleme(){
        $data=array();
        if(Session::has('girisId')){
           $data=User::where('id','=',Session::get('girisId'))->first();   
        }
        $ogretmenler=DB::table('users')->where("sys_role","öğretmen")->get();
        return view("admin.ogretmenler",compact("data","ogretmenler"));
    }
    public function ogrencileriGoruntuleme(){
        $data=array();
        if(Session::has('girisId')){
           $data=User::where('id','=',Session::get('girisId'))->first();   
        }
        $ogrenciler=DB::table('users')->where("sys_role","öğrenci")->get();
        return view("admin.ogrenciler",compact("data","ogrenciler"));
    }
    public function ogretmenEkleSayfasi(){
        $data=array();
        if(Session::has('girisId')){
           $data=User::where('id','=',Session::get('girisId'))->first();   
        }
       
        return view("admin.ogretmenEkle",compact("data",));
    }
    public function ogretmenEklePost(Request $request){
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
        $user->sys_role="öğretmen";
        $result=$user->save();
        if($result){
          return  back()->with("success","Kayıt basarı ile eklendi");
        }
        else{
            return back()->with('fail',"Kayıt işlemi başarısız");
        }
    }

    public function adminEkleGet(){
        $data=array();
        if(Session::has('girisId')){
           $data=User::where('id','=',Session::get('girisId'))->first();   
        }
        return view("admin.adminEkle",compact("data"));
    }
    public function adminEklePost(Request $request){
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
          $user->sys_role="öğretmen";
          $result=$user->save();
          if($result){
            return  back()->with("success","Kayıt basarı ile eklendi");
          }
          else{
              return back()->with('fail',"Kayıt işlemi başarısız");
          }
      }
    
}
