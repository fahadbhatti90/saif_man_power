<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AchievementsController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\ApplyForJobController;

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

Route::group(['middleware' => ['auth', 'admin']], function (){

    // Setting Controller
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('settings', [SettingsController::class, 'update'])->name('update-setting');


    // Admin Controller
    Route::get('backend/index', [AdminController::class, 'index'])->name('backend/index');
    Route::get('change-password', [AdminController::class, 'updatePassword'])->name('change-password');
    Route::put('change-password/{id}', [AdminController::class, 'changePassword']);

    // User Controller
    Route::get('show-user', [UserController::class, 'show'])->name('show-user');
    Route::get('add-user', [UserController::class,'index'])->name('add-user');
    Route::post('store-user', [UserController::class, 'store'])->name('store-user');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('edit-user');
    Route::put('user{id}', [UserController::class, 'update'])->name('update-user');
    Route::put('changeStatus-user', [UserController::class, 'changeStatus'])->name('changeStatus-user');

    // Slider Controller
    Route::get('show-slider', [SliderController::class, 'show'])->name('show-slider');
    Route::get('add-slider', [SliderController::class, 'index'])->name('add-slider');
    Route::post('store-slider', [SliderController::class, 'store'])->name('store-slider');
    Route::get('slider/{id}/edit', [SliderController::class, 'edit'])->name('edit-slider');
    Route::put('slider{id}', [SliderController::class, 'update'])->name('update-slider');
    Route::put('changeStatus-slider', [SliderController::class, 'changeStatus'])->name('changeStatus-slider');

    //Achievements Controller
    Route::get('show-achievements', [AchievementsController::class, 'show'])->name('show-achievements');
    Route::get('add-achievements', [AchievementsController::class, 'index'])->name('add-achievements');
    Route::post('store-achievements', [AchievementsController::class, 'store'])->name('store-achievements');
    Route::get('achievements/{id}/edit', [AchievementsController::class, 'edit'])->name('edit-achievements');
    Route::put('achievements{id}', [AchievementsController::class, 'update'])->name('update-achievements');
    Route::put('changeStatus-achievements', [AchievementsController::class, 'changeStatus'])->name('changeStatus-achievements');

    //JobCategory Controller
    Route::get('show-jobcategory', [JobCategoryController::class, 'show'])->name('show-jobcategory');
    Route::get('add-jobcategory', [JobCategoryController::class, 'index'])->name('add-jobcategory');
    Route::post('store-jobcategory', [JobCategoryController::class, 'store'])->name('store-jobcategory');
    Route::post('add-job-category-ajax', [JobCategoryController::class, 'addAjax'])->name('add-job-category-ajax');
    Route::get('jobcategory/{id}/edit', [JobCategoryController::class, 'edit'])->name('edit-jobcategory');
    Route::put('jobcategory{id}', [JobCategoryController::class, 'update'])->name('update-jobcategory');
    Route::put('changeStatus-jobcategory', [JobCategoryController::class, 'changeStatus'])->name('changeStatus-jobcategory');

    //OurTeam Controller
    Route::get('show-ourteam', [OurTeamController::class, 'show'])->name('show-ourteam');
    Route::get('add-ourteam', [OurTeamController::class, 'index'])->name('add-ourteam');
    Route::post('store-ourteam', [OurTeamController::class, 'store'])->name('store-ourteam');
    Route::get('ourteam/{id}/edit', [OurTeamController::class, 'edit'])->name('edit-ourteam');
    Route::put('ourteam{id}', [OurTeamController::class, 'update'])->name('update-ourteam');
    Route::put('changeStatus-ourteam', [OurTeamController::class, 'changeStatus'])->name('changeStatus-ourteam');

    // Job Controller
    Route::get('show-job', [JobController::class, 'show'])->name('show-job');
    Route::get('add-job', [JobController::class, 'index'])->name('add-job');
    Route::post('store-job', [JobController::class, 'store'])->name('store-job');
    Route::get('job/{id}/edit', [JobController::class, 'edit'])->name('edit-job');
    Route::put('job{id}', [JobController::class, 'update'])->name('update-job');
    Route::put('changeStatus-job', [JobController::class, 'changeStatus'])->name('changeStatus-job');
    Route::post('get-countries', [JobController::class, 'countries'])->name('get-countries');
    // ContactUs Controller
    Route::get('show-contactus', [ContactusController::class, 'show'])->name('show-contactus');
    Route::put('changeStatus-contactus', [ContactusController::class, 'changeStatus'])->name('changeStatus-contactus');

    // Apply For Job Controller
    Route::get('show-applyjob', [ApplyForJobController::class, 'show'])->name('show-applyjob');
    Route::put('changeStatus-applyjob', [ApplyForJobController::class, 'changeStatus'])->name('changeStatus-applyjob');


    // Client Controller
    Route::get('show-client', [ClientController::class, 'show'])->name('show-client');
    Route::get('add-client', [ClientController::class, 'index'])->name('add-client');
    Route::post('store-client', [ClientController::class, 'store'])->name('store-client');
    Route::get('client/{id}/edit', [ClientController::class, 'edit'])->name('edit-client');
    Route::put('client{id}', [ClientController::class, 'update'])->name('update-client');
    Route::put('changeStatus-client', [ClientController::class, 'changeStatus'])->name('changeStatus-client');


});


 Route::get('/', [HomeController::class, 'index'])->name('home');
 Route::get('/', [HomeController::class, 'showHomePageData'])->name('show-data');
 //Route::get('/', [ApplyForJobController::class, 'index'])->name('get-jobapply');
 Route::post('store-jobapply', [ApplyForJobController::class, 'store'])->name('store-jobapply');

Route::get('/backend/login', function () {
    return view('backend.login');
});

// Route::get('/', function () {
//     return view('frontend/home');
// });

Route::get('/about-us', [JobController::class, 'jobCount'])->name('jobcount');

Route::get('/services', [JobController::class, 'jobsCount'])->name('jobscount');

Route::get('/our_team', [OurTeamController::class, 'showTeamMembers'])->name('show-team-member');

Route::get('/achievements', [AchievementsController::class, 'showAchievements'])->name('showAchievements');

Route::get('contact-us', [ContactusController::class, 'index'])->name('add-contactus');
Route::post('store-contactus', [ContactusController::class, 'store'])->name('store-contactus');

Route::get('/job', [JobCategoryController::class, 'showJobCategories'])->name('showJobCategories');

Route::get('/job-list', [JobController::class, 'showJobs'])->name('showJobs');

Route::get('/job-detail/{id}', [JobController::class, 'showJobDetails'])->name('show-job-details');
Route::get('/job-list/{id}', [JobController::class, 'showJobCategoryDetails'])->name('show-job-category-details');
Route::get('/current-jobs/', [JobController::class, 'showCurrentJobs'])->name('show-current-jobs');


Route::get('/post-job', [JobController::class, 'indexPostJob'])->name('post-job');
Route::post('store-PostJob', [JobController::class, 'storePostJob'])->name('store-PostJob');

Route::get('/confirmation', [JobController::class, 'confirmPostJob'])->name('confirmation');

// Route::get('/backend/index', function () {
//     return view('/backend/index');
// });

Route::resource('products', ProductController::class);

// Route::get('users', UserController::class.'@index');

Auth::routes();

