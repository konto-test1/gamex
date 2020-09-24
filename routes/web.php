<?php
use App\Pages;
use App\Http\Controllers\ContactFormSubmissionController;
use Spatie\Honeypot\ProtectAgainstSpam;

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
Auth::routes();

Route::get('/oferta', 'BlogController@blog');
Route::get('/oferta/{slug}', 'BlogController@blogpost');
Route::get('/oferta/{slug}/{product}', 'BlogController@produkt'); 

Route::post('/send_mail', 'Controller@footer_mail')->name('send_mail')->middleware(ProtectAgainstSpam::class);; 

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::resource('/pages', 'PagesController', [
        'names' => [
            'index' => 'pages',
        ]
    ]);
    Route::resource('/blog', 'BlogController', [
        'names' => [
            'index' => 'blog',
        ]
    ]);
    Route::resource('/categories', 'CategoryController', [
        'names' => [
            'index' => 'categories',
        ]
    ]);
    Route::get('/media', 'MediaController@index')->name('media');
    Route::resource('/account', 'AccountController', [
        'names' => [
            'index' => 'account',
        ]
    ]);
    Route::resource('/settings', 'SettingsController', [
        'names' => [
            'index' => 'settings',
        ]
    ]);
    Route::resource('/sliders', 'SliderController', [
        'names' => [
            'index' => 'sliders',
        ]
    ]);

    Route::post('/slide_items/{id}', 'SliderItemController@store')->name('slide_items');

    Route::get('/changepass','HomeController@changepass');
    Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

    Route::resource('/menu_builder', 'MenuBuilderController', [
        'names' => [
            'index' => 'menu_builder',
        ]   
    ]); 
    Route::get('/register_menu', 'MenuBuilderController@register_menu')->name('register_menu');
    Route::post('/delete_menu/{id}', 'MenuBuilderController@delete_menu')->name('delete_menu');
    Route::post('/store_menu', 'MenuBuilderController@store_menu')->name('store_menu');
    Route::get('/edit_menu/{id}', 'MenuBuilderController@edit_menu')->name('edit_menu');
    Route::post('/edit_menu/{id}', 'MenuBuilderController@update_menu')->name('update_menu');
    Route::post('/send/email', 'SupportController@mail');
    Route::get('/support', 'SupportController@form')->name('support');

    //Nowe
    Route::get('form', 'FormController@create')->name('form.create'); 
    Route::post('/form/update/{id}', 'FormController@update')->name('form.update');
    Route::post('/form/store/{id}', 'FormController@store')->name('form.store');
    Route::post('/save_items', 'FormController@save_items');
    Route::post('/delete_items', 'FormController@delete_items');
    
    //Menu
    Route::get('/creator_menu', 'MenuController@index')->name('menu.index');
    Route::get('/menu/{id}', 'MenuController@create')->name('menu.create');
    Route::get('/menu/delete/{id}', 'MenuController@delete')->name('menu.delete');
    Route::post('/menu', 'MenuController@store')->name('menu.store');
});

Route::get('/{slug?}', 'HomeController@show');
if( !App::runningInConsole() ){
    $pages = App\Pages::all();
    foreach($pages as $page){
        Route::get('/{slug}/{childslug}', 'HomeController@childshow');
    }
}

Route::get('/home', 'HomeController@index')->name('home');
