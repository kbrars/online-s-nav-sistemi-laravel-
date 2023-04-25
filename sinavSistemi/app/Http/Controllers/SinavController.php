<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SinavController extends Controller
{    
    //sınav oluştur sayfası
    public function sinavOlusturGet(){
      $data=array();
      if(Session::has('girisId')){
         $data=User::where('id','=',Session::get('girisId'))->first();   
      }
      return view("ogretmen.sinavOlustur",compact('data'));
    }
     //sınav oluşturma işlemi
        public function sinavOlusturPost(Request $request){
           $request = request();
           $rules = [
             'sinav_adi' => 'required',
             'sinav_aciklama' => 'required',
             'ogretmen' => 'required',
             'sinav_tarihi' => 'required',
             'sinav_süresi' => 'required',
           ];
           $customMessages = [
             'sinav_adi.required' => 'Sınav başlığı giriniz!',
             'sinav_aciklama.required' => 'Sınav açıklaması giriniz!',
             'sinav_tarihi.required' => 'Sınav tarihi giriniz!',
             'sinav_süresi.required' => 'Sınav süresini giriniz!',
           ];
           $this->validate($request, $rules, $customMessages);
           $sinav_id = DB::table('sinavlar')->insertGetId([
             "sinav_süresi" => "$request->sinav_süresi",
             "sinav_adi" => "$request->sinav_adi",
             "sinav_aciklama" => "$request->sinav_aciklama",
             "sinav_tarihi" => "$request->sinav_tarihi",
             "ogretmen" => "$request->ogretmen",
           ]);   
           return redirect()->route("sinavDüzenleme", $sinav_id);
        }

     //sinav düzenleme sayfasi
     public function sinavDuzenleme($sinav_id){
        if(Session::has('girisId')){
            $data=User::where('id','=',Session::get('girisId'))->first();   
         }
 
         $sinavlar=DB::table('sinavlar')->where('sinav_id',$sinav_id)->first();
        $data['sinav_id'] = $sinav_id;
        $data['sinav_aciklama']=$sinavlar->sinav_aciklama;
        $data['sinav_adi']=$sinavlar->sinav_adi;
        $data['sinav_tarihi']=$sinavlar->sinav_tarihi;
        $data['sinav_süresi']=$sinavlar->sinav_süresi;
        $sorular=DB::table('sorular')->where('sinav_id',$sinav_id)->get();
       // $secenekler=DB::table('secenekler')->where('soru_id',$soru_id)->get();
        return view("ogretmen.sinavDuzenleme", $data,compact('data','sorular'));
     }
     
     //sinav düzenleme sayfası
     public function sinavDuzenlemePost($sinav_id){
        $request=request();
        $sinav_id=$request->sinav_id;
        $data['sinav_id'] = $sinav_id;     
        $sinav_id=$request->sinav_id;
        $affected = DB::table('sinavlar')
        ->where('sinav_id', $request->sinav_id)
        ->update(['sinav_adi' =>$request->sinav_adi,
        'sinav_aciklama'=>$request->sinav_aciklama,
        'sinav_tarihi'=>$request->sinav_tarihi,
        'sinav_süresi'=>$request->sinav_süresi,
    
    ]);  
    return redirect()->route("sinavDüzenleme",$sinav_id);
     }
     //sınavlar sayfası görüntüleme
    public function sinavlarGet(){
       $data=array();
       if(Session::has('girisId')){
          $data=User::where('id','=',Session::get('girisId'))->first();   
       }
       $ogrt=$data->isim." ".$data->soyad;
       $sinavlar=DB::table('sinavlar')->where('ogretmen',$ogrt)->get();
       return view("ogretmen.sinavlar",compact('data','sinavlar'));
    }
 
     //sinav silme
    public function sinav_silGet($id){       
       DB::table('sinavlar')->where('sinav_id',$id)->delete();
       return redirect()->route("sinavlarPost",$id);
    }

    public function sinav_silPost($id){      
      DB::table('sinavlar')->where('sinav_id',$id)->delete();
      return redirect()->route("sinavlarGet");
    }
}
