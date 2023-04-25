<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginConroller;
use App\Http\Controllers\SinavController;
use App\Http\Controllers\SoruController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\ProjeController;

use App\Http\Controllers\OgretmenBilgiDuzenleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DynamicAddRemoveFieldController;
use Illuminate\Http\Request;




                                 /* GİRİŞ-ÇIKIŞ-KAYITOL İŞLEMLERİ */ 
//giriş-kayıtol sayfası
Route::get("/",[loginConroller::class,"girisSayfasi"])->name("giriş_kaydol_Sayfasi")->middleware('alreadyLoggedIn');
//giriş-kayıtol sayfasında giriş yapma işlemi
Route::post("/login",[loginConroller::class,"girisYapma"])->name("girisYapma");
//giriş-kayıtol sayfasında kayıt olma işlemi
Route::post("/",[loginConroller::class,"ogrenciEkle"])->name('kayıtOlma');
//ogrenci sayfası:
Route::get('/ogrenciGiris',[loginConroller::class,"ogrenciSayfasi"])->name('ogrenciSayfasi');
//ogretmen sayfasi:
Route::get('/OgretmenGiris',[loginConroller::class,"ogretmenSayfasi"])->name('ogretmenSayfasi')->middleware('isLoggedIn');
//ogretmen sayfasi cıkış işlemi
Route::get('/cikis',[loginConroller::class,"cikisIslemi"])->name('cikisIslemi');


                                /* SINAV İŞLEMLERİ  */
//sınav ekleme işlemleri
Route::get('/ogretmenGiris/sinavOlustur',[SinavController::class,"sinavOlusturGet"]);
Route::post('/ogretmenGiris/sinavOlustur',[SinavController::class,"sinavOlusturPost"])->name('sinavOlusturPost');
Route::get("/sinav/{sinav_id}",[SinavController::class,"sinavDuzenleme"])->name("sinavDüzenleme");  
//sınav güncelleme işlemi
Route::post("/sinav/{sinav_id}",[SinavController::class,"sinavDuzenlemePost"])->name("sinavDüzenlemePost");
//sınavlar sayfası
Route::get('/sinavlar',[SinavController::class,'sinavlarGet'])->name('sinavlarGet');
//sınav silme
Route::get("/sinav-sil/{sinav_id}",[SinavController::class,'sinav_silGet'])->name('sinav_silGet');
Route::post("/sinav-sil/{sinav_id}",[SinavController::class,'sinav_silPost'])->name('sinav_silPost');



                                 /* SORU İŞLEMLERİ */
//Soru Ekleme işlemleri
Route::post('/soruEklemeislemi', [SoruController::class, 'soruEkle']);
//soru silme:
//Route::get("/soru-sil/{soru_id}",[SoruController::class,'soru_silGet'])->name('soru_silGet');
Route::post("/soru-sil/{soru_id}",[SoruController::class,'soru_silPost'])->name('soru_silPost');
//soru düzenleme
Route::post('/soru-duzenleme',[SoruController::class,"soru_duzenleme"])->name('soru_duzenleme');


                               /* ÖĞRETMEN SAYFASI İŞLEMLERİ */ 
//ogretmenBilgiSayfasi çağırma
Route::get("/ogretmenBilgiSayfasi",[OgretmenBilgiDuzenleController::class,"ogretmenBilgiSayfasi"])->name('ogretmenBilgiSayfasi');
//ogretmen bilgi düzenleme post
Route::post("/ogretmenBilgiSayfasi",[OgretmenBilgiDuzenleController::class,"ogretmenBilgiDuzenleme"])->name('ogretmenBilgiDuzenleme');

//SORU DÜZENLEME

Route::get("/soru/{soru_id}",[SoruController::class,"soruDuzenlemeGET"])->name("soruDuzenlemeGET");
Route::post("/guncelleme",[SoruController::class,"guncelleme"])->name("guncelleme");
Route::get("/userAdd",[ProjeController::class,"userAdd"]);




                      /* ADMİN SAYFASI */

//admin anasayfa giriş
Route::get("/adminAnasayfa",[AdminController::class,"adminAnasayfa"])->name("adminAnasayfa")->middleware('isLoggedIn');
//sinavlar sayfasi giriş:
Route::get("/tumSınavlar",[AdminController::class,"sinavlarSayfasi"])->name("adminSinavlar");
//Admin Profil sayfası
Route::get("/adminProfil",[AdminController::class,"adminProfil"])->name("adminProfil");
//admin profil bilgileri düzenleme sayfası
Route::post("/adminBilgiSayfasi",[AdminController::class,"adminBilgiDuzenleme"])->name('adminBilgiDuzenleme');
//Öğretmenler
Route::get("ogretmenler",[AdminController::class,"ogretmenlerGoruntuleme"])->name("ogretmenler");
//Öğrenciler
Route::get("ogrenciler",[AdminController::class,"ogrencileriGoruntuleme"])->name("ogrenciler");
//ogretmenEKle
Route::get("ogretmenEkle",[AdminController::class,"ogretmenEkleSayfasi"])->name("ogretmenEkle");

//Öğretmen ekle işlemi
Route::post("/ogretmenEkle",[AdminController::class,"ogretmenEklePost"])->name("ogretmenEklePost");
//Admin Ekle
Route::get("/adminEkle",[AdminController::class,"adminEkleGet"])->name("adminEkleGet");
Route::post("/adminEkle",[AdminController::class,"adminEklePost"])->name("adminEklePost");