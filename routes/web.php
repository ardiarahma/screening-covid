<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes([ 'register' => false ]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('monitoring/export/', 'MonitoringController@export')->name('monitoring.export');
    Route::get('skala-kesehatan/export/', 'HasilPsikisWargaController@export')->name('skala-kesehatan.export');
    Route::get('persebaran-pemudik/export/', 'DashboardController@export')->name('persebaran-pemudik.export');
    Route::group(['middleware' => ['role:Super Admin|Perangkat Desa'],'prefix' => 'admin'], function () {
        Route::resource('dashboard', 'DashboardController');
        Route::resource('user', 'UserController')->except('destroy');
        Route::resource('monitoring', 'MonitoringController')->except('destroy');
        Route::resource('covid-pertanyaan', 'PertanyaanController')->except('destroy');
        Route::resource('covid-skor', 'HasilSkorController')->except('destroy');
        Route::resource('psikis-pertanyaan', 'PertanyaanPsikisController')->except('destroy');
        Route::resource('psikis-skor', 'HasilSkorPsikisController')->except('destroy');
        Route::resource('skala-kesehatan', 'HasilPsikisWargaController')->except('destroy');
        Route::resource('gambar', 'GambarController')->except('destroy');
        Route::resource('video', 'VideoController')->except('destroy');

        Route::put('user/profile/{id}', 'UserController@updateProfil')->name('user.update-profil');
        Route::put('user/profile/password/{id}', 'UserController@updatePassword')->name('user.update-password');
    });

    Route::group(['prefix' => 'table'], function () {
        Route::group(['middleware' => ['role:Super Admin|Perangkat Desa']], function () {
            Route::get('data-user', 'UserController@getData');
            Route::get('data-monitoring', 'MonitoringController@getData');
            Route::get('data-monitoring/{id}', 'MonitoringController@getDataShow');
            Route::get('data-covid-pertanyaan', 'PertanyaanController@getData');
            Route::get('data-covid-skor', 'HasilSkorController@getData');
            Route::get('data-psikis-pertanyaan', 'PertanyaanPsikisController@getData');
            Route::get('data-psikis-skor', 'HasilSkorPsikisController@getData');
            Route::get('data-hasil-psikis-warga', 'HasilPsikisWargaController@getData');
            Route::get('data-hasil-monitoring', 'DashboardController@getData');
            Route::get('data-gambar', 'GambarController@getData');
            Route::get('data-video', 'VideoController@getData');
        });

    });

    Route::group(['middleware' => ['role:Super Admin'],'prefix' => 'delete'], function () {
        Route::get('data-user/{id}', 'UserController@destroy')->name('user.destroy');
        Route::get('data-monitoring/{id}', 'MonitoringController@destroy')->name('monitoring.destroy');
        Route::get('data-covid-pertanyaan/{id}', 'PertanyaanController@destroy')->name('covid-pertanyaan.destroy');
        Route::get('data-covid-skor/{id}', 'HasilSkorController@destroy')->name('covid-skor.destroy');
        Route::get('data-psikis-pertanyaan/{id}', 'PertanyaanPsikisController@destroy')->name('psikis-pertanyaan.destroy');
        Route::get('data-psikis-skor/{id}', 'HasilSkorPsikisController@destroy')->name('psikis-skor.destroy');
        Route::get('data-gambar/{id}', 'GambarController@destroy')->name('gambar.destroy');
        Route::get('data-video/{id}', 'VideoController@destroy')->name('video.destroy');
    });
});

Route::group(['prefix'=>'/'], function() {
    Route::get('/', 'WargaController@dashboard');
    Route::get('table/data-warga', 'WargaController@getData');
    Route::get('list/{telepon}', 'WargaController@index')->name('warga.list');

    Route::post('/', 'WargaController@login')->name('warga.login');
    Route::get('isi-data/{telepon}', 'WargaController@isiData')->name('warga.isiData');
    Route::post('update/{telepon}', 'WargaController@update')->name('warga.update');

    Route::get('create/{telepon}', 'WargaController@create')->name('warga.tambah');
    Route::post('store/{telepon}', 'WargaController@store')->name('warga.store');

    Route::get('laporan/{id}', 'WargaController@lapor')->name('warga.lapor');
    Route::post('laporan-send/{id}', 'WargaController@laporStore')->name('warga.kirimLaporan');
    Route::get('laporan/detail/{id}', 'WargaController@laporDetail')->name('warga.detailLaporan');
    Route::get('laporan/edit/{id}', 'WargaController@laporEdit')->name('warga.editLaporan');
    Route::post('laporan/update/{id}', 'WargaController@laporUpdate')->name('warga.updateLaporan');
    Route::get('warga/chart/{id}', 'WargaController@chart')->name('warga.chart');

    Route::get('screening-kesehatan/{id}', 'WargaController@screeningPsikis')->name('warga.screPsi');
    Route::post('screening-kesehatan/{id}', 'WargaController@screeningPsikisStore')->name('warga.kirimScrePsi');
    Route::get('screening-kesehatan/hasil/{uniqPengisian}', 'WargaController@screeningPsikisHasil')->name('warga.hasilScrePsi');

    Route::get('deteksi-dini', 'WargaController@deteksiDini')->name('warga.deteksiDini');
    Route::post('deteksi-dini', 'WargaController@deteksiDiniStore')->name('warga.deteksiDiniStore');

    Route::get('warga/edit/{id}', 'WargaController@edit')->name('warga.edit');
    Route::post('warga/edit/{id}', 'WargaController@updateWarga')->name('warga.updateWarga');

    Route::get('/delete/data-warga/{id}', 'WargaController@destroy')->name('warga.destroy');
});

Route::group(['prefix'=>'select2'], function() {
    Route::get('data/{slug}/{id}', 'DaerahController@getData');
    Route::get('data-kabupaten', 'DaerahController@getDataKabupaten');
    Route::get('data-kecamatan', 'DaerahController@getDataKecamatan');
    Route::get('data-kelurahan', 'DaerahController@getDataKelurahan');
});


Route::get('info-grafik-diy','InfoGrafikController@indexDIY');
Route::get('info-grafik-jateng','InfoGrafikController@indexJATENG');

Route::group(['middleware' => ['auth','role:Super Admin|Perangkat Desa']], function () {
      Route::get('/home', function(){
            return redirect()->route('dashboard.index');
      })->name('home');
});
