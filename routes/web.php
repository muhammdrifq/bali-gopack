<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Application\AuthController;
use App\Http\Controllers\Application\LoginAdminAppController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TbArtikelController;
use App\Http\Controllers\TbContactController;
use App\Http\Controllers\TbGaleriController;
use App\Http\Controllers\TbHalamanController;
use App\Http\Controllers\TbKategoriArtikelController;
use App\Http\Controllers\TbKategoriGaleriController;
use App\Http\Controllers\TbKategoriKegiatanController;
use App\Http\Controllers\TbKegiatanController;
use App\Http\Controllers\TbKelembagaanController;
use App\Http\Controllers\TbKeuntunganController;
use App\Http\Controllers\TbLinkController;
use App\Http\Controllers\TbMenuController;
use App\Http\Controllers\TbPenggunaController;
use App\Http\Controllers\TbPertanyanController;
use App\Http\Controllers\TbPerusahaanController;
use App\Http\Controllers\TbPetaController;
use App\Http\Controllers\TbSettingController;
use App\Http\Controllers\TbSlideController;
use App\Http\Controllers\TbSubmenuController;
use App\Http\Controllers\TbTentangController;
use App\Http\Controllers\TbTestimoniController;
use App\Http\Controllers\TbWilayahController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PublicController::class, 'welcome']);
Route::get('/m=>{tb_menu:slug}', [PublicController::class, 'menu']);
Route::get('/s=>{tb_submenu:slug}', [PublicController::class, 'submenu']);
Route::get('/galeri/{tb_kategori_galeri:slug}', [
    PublicController::class,
    'galeri',
]);
Route::get('/artikel/{tb_kategori_artikel:slug}', [
    PublicController::class,
    'artikel',
]);
Route::get('/artikel/{tb_kategori_artikel}/{tb_artikel:slug}', [
    PublicController::class,
    'artikelDetail',
]);
Route::get('/produk/{produk:slug}', [PublicController::class, 'produkDetail']);

Route::get('/contact', function () {
    return view('member.contact');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/admin/login', [LoginAdminController::class, 'index'])
    ->name('loginAdmin')
    ->middleware('guest');
Route::post('/admin/login/proses', [
    LoginAdminController::class,
    'authenticate',
]);
Route::get('geoportal', [TbPetaController::class, 'geo']);
Route::get('/geoportal/{tb_petas:id}', [TbPetaController::class, 'detail']);

// Route Admin CMS
Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']],
    function () {
        Route::get('logout', [LoginAdminController::class, 'logout']);
        Route::get('/', function () {
            return redirect('admin/dashboard');
        });
        Route::get('dashboard', [AdminController::class, 'index']);
        Route::get('module', [AdminController::class, 'module']);
        Route::resource('kategori-artikel', TbKategoriArtikelController::class);
        Route::resource(
            'kategori-kegiatan',
            TbKategoriKegiatanController::class
        );
        Route::resource('perusahaan', TbPerusahaanController::class);
        Route::resource('testimoni', TbTestimoniController::class);
        Route::resource('kategori-galeri', TbKategoriGaleriController::class);
        Route::resource('artikel', TbArtikelController::class);
        Route::resource('kontak', TbContactController::class);
        Route::resource('kelembagaan', TbKelembagaanController::class);
        Route::resource('kegiatan', TbKegiatanController::class);
        Route::resource('halaman', TbHalamanController::class);
        Route::resource('menu', TbMenuController::class);
        Route::resource('link', TbLinkController::class);
        Route::resource('tentang', TbTentangController::class);
        Route::resource('keuntungan', TbKeuntunganController::class);
        Route::resource('pertanyaan', TbPertanyanController::class);
        Route::resource('produk', ProdukController::class);
        Route::resource('header-setting', HeaderController::class);

        // Route::resource('submenu', TbSubmenuController::class);
        Route::get('menu/{tb_menu:slug}/submenu', [
            TbSubMenuController::class,
            'index',
        ]);
        Route::get('menu/{tb_menu:slug}/submenu/create', [
            TbSubMenuController::class,
            'create',
        ]);
        Route::post('menu/{tb_menu:slug}/submenu/store', [
            TbSubMenuController::class,
            'store',
        ]);
        Route::get('menu/{tb_menu:slug}/submenu/{id}/edit', [
            TbSubMenuController::class,
            'edit',
        ]);
        Route::post('menu/{tb_menu:slug}/submenu/{id}/update', [
            TbSubMenuController::class,
            'update',
        ]);
        Route::post('menu/{tb_menu:slug}/submenu/{id}/destroy', [
            TbSubMenuController::class,
            'destroy',
        ]);
        Route::resource('slide', TbSlideController::class);
        Route::resource('galeri', TbGaleriController::class);
        Route::resource('wilayah', TbWilayahController::class);
        Route::resource('pengguna', TbPenggunaController::class);
        Route::resource('peta', TbPetaController::class);
        Route::post('urutan/{id}/atas', [TbMenuController::class, 'atas']);
        Route::post('urutan/{id}/bawah', [TbMenuController::class, 'bawah']);
        Route::post('menu/{tb_menu:slug}/submenu/urutan/{id}/atas', [
            TbSubMenuController::class,
            'atas',
        ]);
        Route::post('menu/{tb_menu:slug}/submenu/urutan/{id}/bawah', [
            TbSubMenuController::class,
            'bawah',
        ]);
        Route::get('setting', [TbSettingController::class, 'index']);
        Route::get('setting', [TbSettingController::class, 'index']);
        Route::post('setting/judul', [TbSettingController::class, 'judul']);
        Route::post('setting/lokasi', [TbSettingController::class, 'lokasi']);
        Route::post('setting/medsos', [TbSettingController::class, 'medsos']);
        Route::post('{id}/uaktif', [
            TbPenggunaController::class,
            'statusAktif',
        ]);
        Route::post('{id}/unonaktif', [
            TbPenggunaController::class,
            'statusNonaktif',
        ]);
        Route::post('upload', [TbArtikelController::class, 'upload'])->name(
            'upload'
        );
        Route::get('urutan', [TbMenuController::class, 'urutan']);
        Route::get('urutan/{id}', [TbMenuController::class, 'urutanedit']);
        Route::post('urutan/{id}/proses', [
            TbMenuController::class,
            'urutanproses',
        ]);
        Route::get('profile', [TbPenggunaController::class, 'profile']);
        Route::post('profile/{id}/edit', [
            TbPenggunaController::class,
            'profileEdit',
        ]);
        Route::get('akun', [TbPenggunaController::class, 'akun']);
        Route::post('akun/{id}/edit', [
            TbPenggunaController::class,
            'akunEdit',
        ]);
    }
);
Route::post('contact/store', [TbContactController::class, 'store'])->name(
    'contact.store'
);

Auth::routes([
    'register' => false,
    'login' => false,
]);







// ROUTE ADMIN APP
Route::get('/app/admin/login', [LoginAdminAppController::class, 'index'])
    ->name('loginAdminApp')
    ->middleware('guest');
Route::post('/app/admin/login/proses', [
    LoginAdminAppController::class,
    'authenticate',
]);

Route::group(
    ['prefix' => 'app', 'middleware' => ['auth', 'role:admin']],
    function () {
        Route::get('logout', [LoginAdminAppController::class, 'logout']);
        Route::get('/', function () {
            return redirect('admin/dashboard');
        });
        Route::get('admin/dashboard', [
            LoginAdminAppController::class,
            'dashboard',
        ]);
    }
);

// ROUTE CUSTOMER
Route::get('/app/login', [AuthController::class, 'login'])->name('login');
Route::post('/app/login', [AuthController::class, 'authenticate'])->name(
    'auth.authenticate'
);
// Register
Route::get('/app/register', [AuthController::class, 'register'])->name(
    'auth.register'
);
Route::post('/app/register', [AuthController::class, 'store'])->name(
    'auth.store'
);
// Logout
Route::post('/app/logout', [AuthController::class, 'logout'])->name(
    'auth.logout'
);

Route::group(
    ['prefix' => 'app'],
    function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('/', function () {
            return redirect('customer/dashboard');
        });
        Route::get('customer/dashboard', [
            AuthController::class,
            'dashboard',
        ]);
    }
);



