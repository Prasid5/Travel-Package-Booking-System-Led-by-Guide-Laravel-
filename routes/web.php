<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\TouristsController;
use App\Http\Controllers\DiscountsController;
use App\Http\Controllers\GuidesController;
use App\Http\controllers\AdminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\TripDetailsController;
use App\Http\Middleware\NoCache;
use App\Http\Middleware\ValidAdmin;
use App\Http\Middleware\ValidUser;
use App\Http\Middleware\ValidGuide;
use Illuminate\Http\Request;

// .........................Tourist......................................
Route::get('/home',[TouristsController::class,'home'])->middleware(NoCache::class);
Route::get('/gallery',[TouristsController::class,'gallery'])->middleware(NoCache::class);
Route::get('/tourist/registration',[TouristsController::class,'registrationpage'])->middleware(NoCache::class);
Route::post('/tourist/registration',[TouristsController::class,'register'])->middleware(NoCache::class);
Route::get('/login',[TouristsController::class,'loginpage'])->middleware(NoCache::class);
Route::post('/login',[TouristsController::class,'login'])->middleware(NoCache::class);
Route::get('/destination', [TripsController::class, 'selecttrip'])->middleware(NoCache::class);
Route::post('/destination',[TripsController::class,'triprequest'])->middleware(ValidUser::class);
Route::get('/tripcancel',[TripsController::class,'tripcancelling'])->middleware(ValidUser::class);
Route::get('/touristprofile',[TouristsController::class,'viewtouristprofile'])->middleware(ValidUser::class);
Route::get('/touristedit',[TouristsController::class,'touristedit'])->middleware(ValidUser::class);
Route::post('/edittouristprofile/{id}',[TouristsController::class,'edittouristprofile'])->middleware(ValidUser::class);
Route::get('/guideprofile/tourist',[GuidesController::class,'viewguideprofile'])->middleware(ValidUser::class);
Route::post('/touristlogout',[TouristsController::class,'logout']);

// .........................GUIDE......................................
Route::get('/guidelogin',[GuidesController::class,'guideloginpage'])->middleware(NoCache::class);
Route::post('/guidelogin',[GuidesController::class,'guidelogin'])->middleware(NoCache::class);
Route::get('/guidehome',[GuidesController::class,'guidehome'])->middleware(ValidGuide::class);
Route::get('/guidetripdetail',[TripDetailsController::class,'tripview'])->middleware(ValidGuide::class);
Route::get("/triplist/guide", [TripsController::class, 'triprequestslistview'])->middleware(ValidGuide::class);
Route::get("/acceptedtrip",[TripsController::class,'acceptedtrip'])->middleware(ValidGuide::class);
Route::get("/trip/accepted/{id}/{guide_id}",[TripsController::class,"triprequestaccepting"])->middleware(ValidGuide::class);
Route::get('/guideprofile',[GuidesController::class,'viewguideprofile'])->middleware(ValidGuide::class);
Route::get('/guide/edit',[GuidesController::class,'guideedit'])->middleware(ValidGuide::class);
Route::post('/editguideprofile/{id}', [GuidesController::class,'editguideprofile'])->middleware(ValidGuide::class);
Route::get('/touristprofile/guide',[TouristsController::class,'viewtouristprofile'])->middleware(ValidGuide::class);
Route::post('/guidelogout',[GuidesController::class,'logout']);




// .........................ADMIN......................................
Route::get('/adminregister',[AdminController::class,'registrationpage'])->middleware(NoCache::class);
Route::post('/adminregister',[AdminController::class,'register'])->middleware(NoCache::class);
Route::get('/adminlogin',[AdminController::class,'loginpage'])->middleware(NoCache::class);
Route::post('/adminlogin',[AdminController::class,'login'])->middleware(NoCache::class);
Route::get('/editadmin/{id}',[AdminController::class,'adminedit'])->middleware(ValidAdmin::class);
Route::post('/editadmin/{id}',[AdminController::class,'updateadmin'])->middleware(ValidAdmin::class);
Route::get('/adminhome',[AdminController::class,'adminhome'])->middleware(ValidAdmin::class);
Route::get('/admingallery',[AdminController::class,'admingallery'])->middleware(ValidAdmin::class);


Route::get('/tourist/detail',[TouristsController::class,'touristlistview'])->middleware(ValidAdmin::class);
Route::get('/touristedit/{id}',[TouristsController::class,'touristedit'])->middleware(ValidAdmin::class);
Route::post('/touristupdate/{id}', [TouristsController::class, 'updatetourist'])->middleware(ValidAdmin::class);
Route::get('/deletetourist/{tourist_id}',[TouristsController::class,'deletetourist'])->middleware(ValidAdmin::class);


Route::get('/guide/register',[GuidesController::class,'registrationpage'])->middleware(ValidAdmin::class);
Route::post('/guide/register',[GuidesController::class,'guideregister'])->middleware(ValidAdmin::class);
Route::get('/guide/list',[GuidesController::class,'guidelistview'])->middleware(ValidAdmin::class);
Route::get('/guide/edit/{id}',[GuidesController::class,'guideedit'])->middleware(ValidAdmin::class);
Route::post('/guide/update/{id}', [GuidesController::class, 'updateguide'])->middleware(ValidAdmin::class);
Route::get('/guide/delete/{id}',[GuidesController::class,'deleteguide'])->middleware(ValidAdmin::class);

Route::get("/triplist/admin", [TripsController::class, 'triprequestslistview'])->middleware(ValidAdmin::class);
Route::post("/triprequestupdate/{id}", [TripsController::class, 'triprequestupdate'])->middleware(ValidAdmin::class);
Route::get("/tripdelete/{trip_id}", [TripsController::class, 'triprequestdelete'])->middleware(ValidAdmin::class);
Route::get('/tripadd',[TripDetailsController::class,'tripaddpage'])->middleware(ValidAdmin::class);
Route::post('/tripadd',[TripDetailsController::class,'tripadd'])->middleware(ValidAdmin::class);
Route::get('/tripdetail',[TripDetailsController::class,'tripview'])->middleware(ValidAdmin::class);
Route::post('/admin/tripdetailupdate/{id}', [TripDetailsController::class, 'tripupdate'])->middleware(ValidAdmin::class);
Route::get('/admin/deletetripdetail/{id}', [TripDetailsController::class, 'tripdelete'])->middleware(ValidAdmin::class);

Route::get('/discountadd',[DiscountsController::class,'discountaddpage'])->middleware(ValidAdmin::class);
Route::post('/discountadd',[DiscountsController::class,'discountadd'])->middleware(ValidAdmin::class);
Route::post('/admin/discountupdate/{id}', [DiscountsController::class, 'discountupdate'])->middleware(ValidAdmin::class);
Route::get('/admin/deletediscount/{id}', [DiscountsController::class, 'discountdelete'])->middleware(ValidAdmin::class);
Route::post('/adminlogout',[AdminController::class,'logout']);



Route::get('/ugp',function(){
    return view('admin.gprofile');
});
Route::get('/test',function(){
    return view('user.test');
});

Route::get('/back',function(){
    return redirect()->back();
});

Route::get('/sendmail',[EmailController::class,'sendmail']);
Route::get('/otp',function(){
    return view('user.otp');
}
);
Route::post('/otp',[TouristsController::class,'checkotp']);

