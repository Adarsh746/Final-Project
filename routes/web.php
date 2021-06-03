<?php

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




Route::get('/', function () {
    return view('cmnlayout.profile');
});


Route::resource('search','SearchController');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace'=>'Admin','prefix'=>'admin','as'=>'admin.'],function(){
    
    Auth::routes();

    
   
    Route::get('/', function () {
        return view('admin.auth.login');
    });


    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::group(['middleware'=>'auth:admin'],function(){
        Route::resource('nation','NationController');
        Route::resource('shop','ShopController');
        Route::post('shop/change/{id}', 'ShopController@change')->name('shop.change');
        Route::resource('hospital','HospitalController');
        Route::post('hospital/change/{id}', 'HospitalController@change')->name('hospital.change');
        Route::resource('doctor','DoctorController');
        Route::post('doctor/change/{id}', 'DoctorController@change')->name('doctor.change');

        Route::post('nation/change/{id}', 'NationController@change')->name('nation.change');
        Route::resource('state','StateController');
        Route::post('state/change/{id}', 'StateController@change')->name('state.change');
        Route::resource('district','DistrictController');
        Route::post('district/change/{id}', 'DistrictController@change')->name('district.change');
        Route::resource('post','PostController');
        Route::post('post/change/{id}', 'PostController@change')->name('post.change');
        Route::resource('city','CityController');
        Route::post('city/change/{id}', 'CityController@change')->name('city.change');
        Route::resource('atm','AtmController');
        Route::post('atm/change/{id}', 'AtmController@change')->name('atm.change');
        Route::resource('pumb','PumbController');
        Route::post('pumb/change/{id}', 'PumbController@change')->name('pumb.change');
        Route::resource('matrimony','MatrimonyController');
        Route::resource('realestate','RealEstateController');
        Route::get('realestate/view/{id}','RealEstateController@view')->name('realestate.view');
        Route::resource('useditems','UsedItemsController');
        Route::post('useditems/change/{id}', 'UsedItemsController@change')->name('useditems.change');
        Route::resource('taxi','TaxiController');
        Route::post('taxi/change/{id}', 'TaxiController@change')->name('taxi.change');
        Route::resource('qualification','QualiController');
        Route::post('qualification/change/{id}', 'QualiController@change')->name('qualification.change');
        Route::resource('subject','SubjectController');
        Route::post('subject/change/{id}', 'SubjectController@change')->name('subject.change');
        Route::resource('catagory','ShoppingCatagoryController');
        Route::post('catagory/change/{id}', 'ShoppingCatagoryController@change')->name('catagory.change');
        Route::resource('subcat','ShoppingSubCatagoryController');
        Route::post('subcat/change/{id}', 'ShoppingSubCatagoryController@change')->name('subcat.change');
        Route::resource('shoppro','ShoppingProductController');
        Route::resource('user','UserController');
        Route::resource('emp','EmpController');
        Route::resource('job','JobController');
        Route::post('home/destroy','HomeController@destroy')->name('home.destroy');
        Route::get('view','JobController@status')->name('job.status');
        Route::get('/home/view', 'HomeController@view')->name('home.view');
        Route::get('/home/show/{id}', 'HomeController@show')->name('home.show');
        Route::get('/home/chat/{id}', 'HomeController@chat')->name('home.chat');
        Route::get('home/msg/{id}', 'HomeController@msg')->name('home.msg');
        Route::post('home/send', 'HomeController@send')->name('home.send');
        Route::get('home/openView/{id}', 'HomeController@openView')->name('home.openView');
        Route::resource('doctor','DoctorController');
        Route::post('doctor/change/{id}', 'DoctorController@change')->name('doctor.change');
        Route::resource('meeting','MeetingController');
        Route::post('meeting/change/{id}', 'MeetingController@change')->name('meeting.change');
        Route::resource('case','CaseController');
        Route::post('case/change/{id}', 'CaseController@change')->name('case.change');
        Route::resource('rent','RentController');
        Route::post('rent/change/{id}', 'RentController@change')->name('rent.change');

        
        
        
    });
});
    Route::group(['namespace'=>'User','prefix'=>'user','as'=>'user.'],function(){
        Route::get('welcome', function () {
            return view('user.welcome');

        });
      

        Auth::routes(); 
        Route::get('/show/{id}', 'Auth\RegisterController@show')->name('show');
        Route::get('/showdis/{id}', 'Auth\RegisterController@showdis')->name('showdis');
        Route::get('/showpost/{id}', 'Auth\RegisterController@showpost')->name('showpost');
        Route::get('/showsub/{id}', 'Auth\RegisterController@showsub')->name('showsub');
        Route::get('/showcity/{id}', 'Auth\RegisterController@showcity')->name('showcity');
        Route::get('/showsubcat/{id}', 'Auth\RegisterController@showsubcat')->name('showsubcat');


        Route::get('/', function () {
            return view('user.welcome');
        });
        Route::get('/home', 'HomeController@view')->name('home');
      
        Route::group(['middleware'=>'auth:web'],function(){
            Route::resource('Home','UserController');
            Route::resource('pref','JobpreferenceController');
            Route::resource('job','JobController');
            Route::resource('app','AppController');
            Route::get('app/aja/{id}','AppController@aja');
            Route::post('pref/change','JobpreferenceController@change')->name('pref.change');
            Route::resource('ticket','TicketController');
            Route::get('home/show', 'HomeController@show')->name('home.show');
            Route::get('home/msg/{id}', 'HomeController@msg')->name('home.msg');
            Route::get('home/edit', 'HomeController@edit')->name('home.edit');
            Route::post('home/send', 'HomeController@send')->name('home.send');
            Route::resource('shop','ShopController');
        Route::post('shop/change/{id}', 'ShopController@change')->name('shop.change');
        Route::resource('atm','AtmController');
        Route::post('atm/change/{id}', 'AtmController@change')->name('atm.change');
        Route::resource('pumb','PumbController');
        Route::post('pumb/change/{id}', 'PumbController@change')->name('pumb.change');
        Route::resource('matrimony','MatrimonyController');
        Route::resource('realestate','RealEstateController');
        Route::get('realestate/view/{id}','RealEstateController@view')->name('realestate.view');
        Route::resource('useditems','UsedItemsController');
        Route::post('useditems/change/{id}', 'UsedItemsController@change')->name('useditems.change');
        Route::resource('taxi','TaxiController');
        Route::post('taxi/change/{id}', 'TaxiController@change')->name('taxi.change');
        Route::resource('shoppro','ShoppingProductController');
       Route::resource('hospital','HospitalController');
        Route::post('hospital/change/{id}', 'HospitalController@change')->name('hospital.change');
       Route::resource('meeting','MeetingController');
        Route::post('meeting/change/{id}', 'MeetingController@change')->name('meeting.change');
        Route::resource('emp','empController');
        Route::post('emp/change/{id}', 'empController@change')->name('case.change');
        Route::resource('case','CaseController');
        Route::post('case/change/{id}', 'CaseController@change')->name('case.change');
        Route::resource('rent','RentController');
        Route::post('rent/change/{id}', 'RentController@change')->name('rent.change');
        Route::resource('tool','ToolController');
        Route::post('tool/change/{id}', 'ToolController@change')->name('tool.change');
        Route::resource('User','UserController');
        Route::get('user.edit', 'UserController@edit')->name('user.edit');
        Route::post('user/change/{id}', 'UserController@change')->name('user.change');
        Route::resource('tool','ToolController');
        Route::post('tool/change/{id}', 'ToolController@change')->name('tool.change');
        Route::resource('work','WorkController');
        Route::get('work/show', 'WorkController@show')->name('work.show');
        Route::post('work/change/{id}', 'WorkController@change')->name('work.change');
        Route::resource('book','BookController');
        Route::post('book/change/{id}', 'BookController@change')->name('book.change');
        Route::post('book/show', 'BookController@show')->name('book.show');

 
 
        

        
            
            
        });
    


});


Route::group(['namespace'=>'Franchise','prefix'=>'franchise','as'=>'franchise.'],function(){

    Auth::routes();
   
    Route::get('welcome', function () {
        return view('franchise.welcome');
    });
    Route::get('/', function () {
        return view('/');
    });
    Route::get('/home', 'HomeController@view')->name('home');
  
    Route::group(['middleware'=>'auth:franchise'],function(){
        
        Route::resource('job','JobController');
        Route::resource('emp','EmpController');
        Route::resource('app','AppController');
        Route::resource('user','UserController');
       
        Route::get('home/show', 'HomeController@show')->name('home.show');
        Route::get('home/msg/{id}', 'HomeController@msg')->name('home.msg');
        Route::post('home/send', 'HomeController@send')->name('home.send');
        // Route::get('home/edit', 'HomeController@edit')->name('home.edit');
        Route::post('home/update', 'HomeController@edit')->name('home.update');
        Route::post('home/change/{id}', 'HomeController@change')->name('home.change');
        Route::resource('shop','ShopController');
        Route::post('shop/change/{id}', 'ShopController@change')->name('shop.change');
        Route::resource('post','PostController');
        Route::post('post/change/{id}', 'PostController@change')->name('post.change');
        Route::resource('atm','AtmController');
        Route::post('atm/change/{id}', 'AtmController@change')->name('atm.change');
        Route::resource('pumb','PumbController');
        Route::post('pumb/change/{id}', 'PumbController@change')->name('pumb.change');
        Route::resource('matrimony','MatrimonyController');
        Route::resource('realestate','RealEstateController');
        Route::get('realestate/view/{id}','RealEstateController@view')->name('realestate.view');
        Route::resource('useditems','UsedItemsController');
        Route::post('useditems/change/{id}', 'UsedItemsController@change')->name('useditems.change');
        Route::resource('taxi','TaxiController');
        Route::post('taxi/change/{id}', 'TaxiController@change')->name('taxi.change');
        Route::resource('qualification','QualiController');
        Route::post('qualification/change/{id}', 'QualiController@change')->name('qualification.change');
        Route::resource('subject','SubjectController');
        Route::resource('shoppro','ShoppingProductController');
       Route::resource('hospital','HospitalController');
        Route::post('hospital/change/{id}', 'HospitalController@change')->name('hospital.change');
        Route::resource('doctor','DoctorController');
        Route::post('doctor/change/{id}', 'DoctorController@change')->name('doctor.change');
        Route::resource('user','UserController');
        Route::any('user/update/{id}', 'UserController@update')->name('user.update');
        Route::resource('meeting','MeetingController');
        Route::post('meeting/change/{id}', 'MeetingController@change')->name('meeting.change');
        Route::resource('case','CaseController');
        Route::any('case/change/{id}', 'CaseController@change')->name('case.change');
        Route::resource('rent','RentController');
        Route::post('rent/change/{id}', 'RentController@change')->name('rent.change');
        Route::resource('emp','EmpController');
        Route::get('emp/show', 'EmpController@show')->name('emp.show');
       Route::get('emp.change', 'EmpController@change')->name('emp.edit');
        Route::get('emp.edit', 'EmpController@edit')->name('emp.edit');
        Route::post('emp/change/{id}', 'EmpController@change')->name('emp.change');
        Route::resource('tool','ToolController');
        Route::post('tool/change/{id}', 'ToolController@change')->name('tool.change');
        Route::resource('work','WorkController');
        Route::get('work/change', 'WorkController@change')->name('work.change');
        Route::resource('book','BookController');
        Route::post('book/change/{id}', 'BookController@change')->name('book.change');
        Route::post('book/show', 'BookController@show')->name('book.show');






       
        

    });



});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
