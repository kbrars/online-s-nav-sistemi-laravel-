<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Secenek;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class SoruController extends Controller
{
  //soru ekleme
  public function soruEkleme()
  {
    return "deneme";
  }

  public function soruEkle(Request $request)
  {

    $rules = [
      'secenek.*' => 'required',
      'soru_metni' => 'required',
      'cevapInput' => 'required',
    ];
    $customMessages = [
      'secenek.*.required' => 'Seceneği boş bırakmayınız!',
      'soru_metni.required' => 'Soru metnini boş bırakmayınız!',
      'cevapInput.required' => 'Lütfen doğru seçeneği işareteyiniz!',
    ];
    $this->validate($request, $rules, $customMessages);
    $soru_id =  DB::table('sorular')->insertGetId([
      "soru_metni" => $request->soru_metni,
      "sinav_id" => $request->sinav_id,
    ]);
    $ind = 0;
    foreach ($request->secenek as $key => $value) {
      $secenek = new Secenek();
      $secenek->secenek = $value;
      $secenek->soru_id = $soru_id;
      if ('secenek[' . $key . ']' == $request->cevapInput) {
        $secenek->durum = "true";
      } else {
        $secenek->durum = "false";
      }
      $result = $secenek->save();
      $ind++;
    }
    return back()->with('success', 'Todos Has Been Created Successfully.');
  }
  //soru silme
  public function soru_silGet($soru_id)
  {
    return redirect()->route("soru_silPost", $soru_id);
  }
  public function soru_silPost($soru_id)
  {
    $sinav = DB::table('sorular')->where('soru_id', $soru_id)->first();
    $sinav_id = $sinav->sinav_id;
    DB::table('sorular')->where('soru_id', $soru_id)->delete();
    return redirect()->route("sinavDüzenleme", $sinav_id);
  }
  //SORU DÜZENLEME
  public function soruDuzenlemeGET($soru_id)
  {
    $data = array();
    if (Session::has('girisId')) {
      $data = User::where('id', '=', Session::get('girisId'))->first();
    }
    $ogrt = $data->isim . " " . $data->soyad;

    $secenekler = DB::table('seceneks')->where('soru_id', $soru_id)->get();
    $soru = DB::table('sorular')->where('soru_id', $soru_id)->first();
    $data["soru_metni"] = $soru->soru_metni;
    $data["soru_id"] = $soru_id;
    return view("ogretmen.soruDuzenleme", compact("secenekler", "data"));
  }
  public function guncelleme(Request $request)
  {
    $i=0;
    $soru_id = $request->soru_id;
    $rules = [
      'secenek.*' => 'required',
      'soru_metni' => 'required',
      'cevapInput' => 'required',
    ];
    $customMessages = [
      'secenek.*.required' => 'Seceneği boş bırakmayınız!',
      'soru_metni.required' => 'Soru metnini boş bırakmayınız!',
      'cevapInput.required' => 'Lütfen doğru seçeneği işareteyiniz!',
    ];
    $this->validate($request, $rules, $customMessages);
     foreach ($request->secenek as $key=>$val){
          if($key=="yeni"){
            if(is_array($val)){
              foreach($val as $dizi){                
                if ("secenek[yeni][".array_keys ($val)[$i] ."]" == $request->cevapInput) {
                  $durum = "true";
                } else {
                  $durum = "false";
                }                 
                $i++;
                DB::table('seceneks')->insert(
                  ['secenek' => $dizi, 'soru_id' => $soru_id,'durum'=>$durum]
                );             
             }
            }
   
          }else{
            if ('secenek[' . $key . ']' == $request->cevapInput) {
              $durum = "true";
            } else {
              $durum = "false";
            }           
              DB::table('seceneks')->where('id',$key)->update(['secenek'=>$val,'durum'=>$durum]);
          }
      }
      DB::table('seceneks')->where('secenek', 'silindi456789')->delete();
      return redirect()->route("soruDuzenlemeGET", $request->soru_id);
    }  
}
