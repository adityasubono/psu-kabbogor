<?php

use App\Perumahans;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    $nama = 'Aditya Home :)';
//    return view('index', ['nama' => $nama]);
////    return 'hello ikan';
//});
//
//Route::get('/about', function () {
//    $nama = 'Aditya About :)';
//    return view('about', ['nama' => $nama]);
//});

Route::get('/', 'BerandaController@index');
Route::get('/about', 'PagesController@about');

Route::get('/mahasiswa', 'MahasiswaController@index');

////student.......
////Display All Data List Students
//Route::get('/students', 'StudentsController@index');
////Creating Input Data Student
//Route::get('/students/create', 'StudentsController@create');
////Show Data Student By id (one data)
//Route::get('/students/{student}', 'StudentsController@show');
////Insert Data Student in Store (database)
//Route::post('/students/', 'StudentsController@store');
////Delete Data Student
//Route::delete('/students/{student}','StudentsController@destroy');
////Get Data Edit Data Student To HTML
//Route::get('/students/{student}/edit', 'StudentsController@edit');
////Input Data Edit To Database
//Route::patch('/students/{student}','StudentsController@update');
//

Route::resource('students','StudentsController');

//Product....
Route::get('/addmore','ProductAddMoreController@addMore');
Route::post('/addmore','ProductAddMoreController@addMorePost');

//PSU Beranda....
Route::get('/beranda', 'BerandaController@index');

//PSU Rekapitulasi....
Route::get('/rekapitulasi', 'RekapitulasiController@index');



//PSU Data User....
//Route::get('/users', 'UserController@index');
//Route::get('/users/create', 'UserController@create');
//Route::post('/users/', 'UserController@store');
//Route::delete('/users/{user}','UserController@destroy');
//Route::get('/users/{user}/edit', 'UserController@edit');
//Route::patch('/users/{user}','UserController@update');

//Data Kecamatan
Route::get('/kecamatans','KecamatansController@index');
Route::get('/kecamatans/create', 'KecamatansController@create');
Route::post('/kecamatans/', 'KecamatansController@store');


//Data Kelurahan
Route::get('/kelurahans','KelurahansController@index');
Route::get('/kelurahans/create', 'KelurahansController@create');
Route::post('/kelurahans/', 'KelurahansController@store');
Route::get('/kelurahans/get/{id}', 'KelurahansController@getKelurahan');
Route::get('/perumahans/get/{id}', 'KelurahansController@getKelurahan');

//Data User
Route::resource('users','UserController');

//==========================================================================================
//ROUTE PSU PERUMAHAN =====================================================================
//==========================================================================================
//PSU PSU Perumahan
Route::get('/perumahans', 'PerumahansController@index');
Route::get('/perumahans/export_excel', 'PerumahansController@export_excel');
Route::post('/perumahans/import_excel', 'PerumahansController@import_excel');
Route::post('/perumahans/filter', 'PerumahansController@filter');
Route::get('/perumahans/create', 'PerumahansController@create');
Route::post('/perumahans/', 'PerumahansController@store');
Route::get('/perumahans/edit/{perumahans}', 'PerumahansController@edit');
Route::patch('/perumahans/update/{perumahans}', 'PerumahansController@update');
Route::delete('/perumahans/delete/{perumahans}', 'PerumahansController@destroy');
Route::get('/perumahans/{perumahan}', 'PerumahansController@detailPerumahan');


//Filter PSU Perumahan
Route::post('/filter/perumahans', 'FiltersPerumahansController@index');

//PSU Data Sarana
Route::get('/saranas/{id}', 'SaranasController@index');
Route::post('/saranas/store', 'SaranasController@store');
Route::get('/saranas/edit/{sarana}', 'SaranasController@edit');
Route::patch('/saranas/update/{sarana}', 'SaranasController@update');
Route::delete('/saranas/delete/{sarana}', 'SaranasController@destroy');

//PSU Data Foto Sarana ( Perumahan )
Route::get('/fotosaranas/{id}', 'FotoSaranasController@index');
Route::post('/fotosaranas/store', 'FotoSaranasController@store');
Route::get('/fotosaranas/edit/{fotoSarana}', 'FotoSaranasController@edit');
Route::patch('/fotosaranas/update/{id}', 'FotoSaranasController@update');
Route::post('/fotosaranas/delete','FotoSaranasController@destroy');

//PSU Data Koordinat Sarana
Route::get('/koordinatsarana/{id}', 'KoordinatSaranasController@index');
Route::get('/tampilpetasemua/', 'KoordinatSaranasController@showallmaps');
Route::post('/koordinatsarana/store', 'KoordinatSaranasController@store');
Route::get('/koordinatsarana/edit/{koordinatSarana}', 'KoordinatSaranasController@edit');
Route::patch('/koordinatsarana/update/{koordinatSarana}', 'KoordinatSaranasController@update');
Route::delete('/koordinatsarana/delete/{koordinatsarana}','KoordinatSaranasController@destroy');
Route::get('/koordinatsarana/show/{id}', 'KoordinatSaranasController@show');


//PSU Data Jalan dan Saluran
Route::get('/jalansalurans/{id}', 'JalanSaluransController@index');
Route::post('/jalansalurans/store', 'JalanSaluransController@store');
Route::get('/jalansalurans/edit/{jalanSaluran}', 'JalanSaluransController@edit');
Route::patch('/jalansalurans/update/{jalanSaluran}', 'JalanSaluransController@update');
Route::delete('/jalansalurans/delete/{jalanSaluran}', 'JalanSaluransController@destroy');


//PSU Data Foto Jalan Saluran
Route::get('/fotojalansalurans/{id}', 'FotoJalanSaluranController@index');
Route::post('/fotojalansalurans/store', 'FotoJalanSaluranController@store');
Route::get('/fotojalansalurans/edit/{fotoJalanSaluran}', 'FotoJalanSaluranController@edit');
Route::patch('/fotojalansalurans/update/{id}', 'FotoJalanSaluranController@update');
Route::post('/fotojalansalurans/delete', 'FotoJalanSaluranController@destroy');

//PSU Data Koordinat Jalan dan Saluran
//Route::post('/tampilpetasemua/peta', 'KoordinatJalanSaluranController@tampilsemuapeta');
Route::get('/koordinatjalansalurans/{id}', 'KoordinatJalanSaluranController@index');
Route::post('/koordinatjalansalurans/store', 'KoordinatJalanSaluranController@store');
Route::get('/koordinatjalansalurans/edit/{koordinatJalanSaluran}', 'KoordinatJalanSaluranController@edit');
Route::patch('/koordinatjalansalurans/update/{koordinatJalanSaluran}', 'KoordinatJalanSaluranController@update');
Route::delete('/koordinatjalansalurans/delete/{koordinatJalanSaluran}', 'KoordinatJalanSaluranController@destroy');
Route::get('/koordinatjalansalurans/show/{id}', 'KoordinatJalanSaluranController@show');


//PSU Data Taman
Route::get('/tamans/{id}', 'TamansController@index');
Route::post('/tamans/store', 'TamansController@store');
Route::get('/tamans/edit/{taman}', 'TamansController@edit');
Route::patch('/tamans/update/{taman}', 'TamansController@update');
Route::delete('/tamans/delete/{taman}', 'TamansController@destroy');

//PSU Data Foto Taman
Route::get('/fototamans/{id}', 'FotoTamansController@index');
Route::post('/fototamans/store', 'FotoTamansController@store');
Route::get('/fototamans/edit/{fotoTaman}', 'FotoTamansController@edit');
Route::patch('/fototamans/update/{fotoTaman}', 'FotoTamansController@update');
Route::post('/fototamans/delete/', 'FotoTamansController@destroy');

//PSU Data Koordinat Taman
Route::get('/koordinattamans/{id}', 'KoordinatTamansController@index');
Route::post('/koordinattamans/store', 'KoordinatTamansController@store');
Route::get('/koordinattamans/edit/{koordinatTaman}', 'KoordinatTamansController@edit');
Route::patch('/koordinattamans/update/{koordinatTaman}', 'KoordinatTamansController@update');
Route::delete('/koordinattamans/delete/{koordinatTaman}', 'KoordinatTamansController@destroy');
Route::get('/tampilpetasemua/', 'KoordinatTamansController@showallmaps');
Route::get('/koordinattamans/show/{id}', 'KoordinatTamansController@show');


//PSU Data Koordinat Perumahan
Route::get('/koordinatperumahans/{id}', 'KoordinatPerumahansController@index');
Route::post('/koordinatperumahans/store', 'KoordinatPerumahansController@store');
Route::get('/koordinatperumahans/edit/{koordinatPerumahan}', 'KoordinatPerumahansController@edit');
Route::patch('/koordinatperumahans/update/{koordinatPerumahan}', 'KoordinatPerumahansController@update');
Route::delete('/koordinatperumahans/delete/{koordinatPerumahan}', 'KoordinatPerumahansController@destroy');

//PSU Data CCTV Perumahan
Route::get('/cctvperumahans/{id}', 'CCTVPerumahansController@index');
Route::post('/cctvperumahans/store', 'CCTVPerumahansController@store');
Route::get('/cctvperumahans/edit/{cCTVPerumahan}', 'CCTVPerumahansController@edit');
Route::patch('/cctvperumahans/update/{cCTVPerumahan}', 'CCTVPerumahansController@update');
Route::delete('/cctvperumahans/delete/{cCTVPerumahan}', 'CCTVPerumahansController@destroy');


//PSU PSU Perumahan..../Rekapitulasi
Route::get('/rekapitulasi/perumahans', 'RekapitulasiPerumahanController@index');

//PSU PSU Perumahan..../Monitoring Perumahan
Route::get('/monitoring/perumahans', 'MonitoringCCTVPerumahanController@index');







//==========================================================================================
//ROUTE PSU PERTAMANAN =====================================================================
//==========================================================================================
//PSU PERTAMANAN
Route::get('/pertamanans', 'PertamanansController@index');
Route::get('/pertamanans/create', 'PertamanansController@create');
Route::post('/pertamanans', 'PertamanansController@store');
Route::get('/pertamanans/edit/{pertamanan}', 'PertamanansController@edit');
Route::patch('/pertamanans/update/{pertamanan}', 'PertamanansController@update');
Route::delete('/pertamanans/delete/{pertamanan}', 'PertamanansController@destroy');
Route::post('/pertamanans/filter', 'PertamanansController@filter');
Route::get('/pertamanans/show/{pertamanan}', 'PertamanansController@show');
Route::post('/pertamanans/filter', 'PertamanansController@filter');
Route::get('/pertamanans/export', 'PertamanansController@export');
Route::post('/pertamanans/import', 'PertamanansController@import');

//PSU PERTAMANAN (REKAPITULASI)
Route::get('/pertamanans/rekapitulasi', 'RekapitulasiPertamananController@index');

//PSU PERTAMANAN ( PETUGAS )=============================================================
Route::get('/petugas/{id}', 'PetugasController@index');
Route::post('/petugas/store', 'PetugasController@store');
Route::get('/petugas/edit/{petugas}', 'PetugasController@edit');
Route::patch('/petugas/update/{petugas}', 'PetugasController@update');
Route::delete('/petugas/delete/{petugas}', 'PetugasController@destroy');

//PSU PERTAMANAN ( FOTO PERTAMANAN )=============================================================
Route::get('/fotopertamanans/{id}', 'FotoPertamanansController@index');
Route::post('/fotopertamanans/store', 'FotoPertamanansController@store');
Route::get('/fotopertamanans/edit/{id}', 'FotoPertamanansController@edit');
Route::put('/fotopertamanans/update/{id}', 'FotoPertamanansController@update');
Route::post('/fotopertamanans/delete', 'FotoPertamanansController@destroy');

//PSU PERTAMANAN ( PEMELIHARAAN )=============================================================
Route::get('/pemeliharaans/{id}', 'PemeliharaansController@index');
Route::post('/pemeliharaans/store', 'PemeliharaansController@store');
Route::get('/pemeliharaans/edit/{pemeliharaan}', 'PemeliharaansController@edit');
Route::patch('/pemeliharaans/update/{pemeliharaan}', 'PemeliharaansController@update');
Route::delete('/pemeliharaans/delete/{pemeliharaan}', 'PemeliharaansController@destroy');


//PSU PERTAMANAN ( HARDSCAPE )=============================================================
Route::get('/hardscapes/{id}', 'HardscapesController@index');
Route::post('/hardscapes/store', 'HardscapesController@store');
Route::get('/hardscapes/edit/{hardscape}', 'HardscapesController@edit');
Route::patch('/hardscapes/update/{hardscape}', 'HardscapesController@update');
Route::delete('/hardscapes/delete/{hardscape}', 'HardscapesController@destroy');


//PSU PERTAMANAN ( SOFTSCAPE )=============================================================
Route::get('/softscapes/{id}', 'SoftscapesController@index');
Route::post('/softscapes/store', 'SoftscapesController@store');
Route::get('/softscapes/edit/{softscape}', 'SoftscapesController@edit');
Route::patch('/softscapes/update/{softscape}', 'SoftscapesController@update');
Route::delete('/softscapes/delete/{softscape}', 'SoftscapesController@destroy');

//PSU PERTAMANAN ( KOORDINAT PERTAMANAN )//=========================================================
Route::get('/koordinatpertamanans/{id}', 'KoordinatPertamanansController@index');
Route::post('/koordinatpertamanans/store', 'KoordinatPertamanansController@store');
Route::get('/koordinatpertamanans/edit/{koordinatPertamanan}', 'KoordinatPertamanansController@edit');
Route::patch('/koordinatpertamanans/update/{koordinatPertamanan}', 'KoordinatPertamanansController@update');
Route::delete('/koordinatpertamanans/delete/{koordinatPertamanan}', 'KoordinatPertamanansController@destroy');
Route::get('/koordinatpertamanans/peta/{id}', 'KoordinatPertamanansController@show');


//PSU PERTAMANAN ( CCTV PERTAMANAN )=============================================================
Route::get('/cctvpertamanans/{id}', 'CctvPertamanansController@index');
Route::post('/cctvpertamanans/store', 'CctvPertamanansController@store');
Route::get('/cctvpertamanans/edit/{cctvPertamanan}', 'CctvPertamanansController@edit');
Route::patch('/cctvpertamanans/update/{cctvPertamanan}', 'CctvPertamanansController@update');
Route::delete('/cctvpertamanans/delete/{cctvPertamanan}', 'CctvPertamanansController@destroy');

//PSU PSU Perumahan..../Monitoring Pertamanan
Route::get('/monitoring/pertamanans', 'MonitoringCCTVPertamananController@index');




//==========================================================================================
//Route PSU PERMUKIMAN =====================================================================
//==========================================================================================
//PSU Permukiman ( TPU )
Route::get('/permukimans', 'PermukimansController@index');
Route::get('/permukimans/create', 'PermukimansController@create');
Route::post('/permukimans/store', 'PermukimansController@store');
Route::get('/permukimans/{permukiman}/edit', 'PermukimansController@edit');
Route::patch('/permukimans/{permukiman}', 'PermukimansController@update');
Route::delete('/permukimans/delete/{id}', 'PermukimansController@destroy');
Route::post('/permukimans/filter', 'PermukimansController@filter');
Route::get('/permukimans/show/{id}', 'PermukimansController@show');
Route::get('/permukimans/export', 'PermukimansController@export');
Route::post('/permukimans/import', 'PermukimansController@import');

//PSU Permukiman ( TPU ) -> ( Rekapitulasi Permukiman Grafik )
Route::get('/rekapitulasi/permukimans', 'RekapitulasiPermukimanController@index');

//PSU Permukiman ( TPU ) -> ( Pengelola )
Route::get('/pengelolas/{id}', 'PengelolahsController@index');
Route::post('/pengelolas/store', 'PengelolahsController@store');
Route::get('/pengelolas/edit/{pengelolah}', 'PengelolahsController@edit');
Route::patch('/pengelolas/update/{pengelola}','PengelolahsController@update');
Route::delete('/pengelolas/delete/{pengelolah}','PengelolahsController@destroy');

//PSU Permukiman ( TPU ) -> ( Foto TPU )=====================================================
Route::get('/fototpus/{id}', 'FototpusController@index');
Route::post('/fototpus/store', 'FototpusController@store');
Route::get('/fototpus/edit/{id}', 'FototpusController@edit');
Route::post('/fototpus/delete','FototpusController@destroy');
Route::put('/fototpus/update/{id}', 'FototpusController@update');

//PSU Permukiman ( TPU ) -> ( Inventaris )===================================================
Route::get('/inventaris/{id}', 'InventarisController@index');
Route::post('/inventaris/store', 'InventarisController@store');
Route::get('/inventaris/edit/{inventaris}','InventarisController@edit');
Route::patch('/inventaris/update/{inventaris}','InventarisController@update');
Route::delete('/inventaris/delete/{inventaris}','InventarisController@destroy');

//PSU Permukiman ( TPU ) -> ( Koordinat TPU )================================================
Route::get('/koordinattpus/{id}', 'KoordinattpusController@index');
Route::post('/koordinattpus/store', 'KoordinattpusController@store');
Route::get('/koordinattpus/edit/{koordinattpu}','KoordinattpusController@edit');
Route::patch('/koordinattpus/update/{koordinattpu}','KoordinattpusController@update');
Route::delete('/koordinattpus/delete/{koordinattpu}','KoordinattpusController@destroy');
Route::get('/koordinattpus/show/{id}','KoordinattpusController@show');

//PSU Permukiman ( TPU ) -> ( CCTV Permukiman )==============================================
Route::get('/cctvtpus/{id}', 'CCTVPermukimansController@index');
Route::post('/cctvtpus/store', 'CCTVPermukimansController@store');
Route::get('/cctvtpus/edit/{cCTVPermukiman}','CCTVPermukimansController@edit');
Route::patch('/cctvtpus/update/{cCTVPermukiman}','CCTVPermukimansController@update');
Route::delete('/cctvtpus/delete/{cCTVPermukiman}','CCTVPermukimansController@destroy');

//PSU PSU Permukiman..../Monitoring Permukiman
Route::get('/monitoring/permukimans', 'MonitoringCCTVPermukimanController@index');






//PSU PSU Perumahan..../Monitoring


//Data Sarana
//Route::post('/perumahans/', 'SaranasController@store');
//
















//PSU Kegitanan Fisik....
Route::get('/kegiatanfisik', 'MakerPermukimanController@index');













Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
