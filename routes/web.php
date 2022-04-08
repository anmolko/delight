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


Auth::routes();

Auth::routes([
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::any('/register', function() {
    abort(404);
});

Route::get('/categories', function () {
    return redirect('/blog');
});

Route::get('/slider-list', function () {
    return redirect('/');
});

//ajax load pdf for legal documents page
Route::get('/loadbrocher', 'App\Http\Controllers\FrontController@loadPdf')->name('loadpdf');

Route::get('/career', 'App\Http\Controllers\FrontController@career')->name('career');
Route::get('/team', 'App\Http\Controllers\FrontController@team')->name('team');
Route::get('/album', 'App\Http\Controllers\FrontController@album')->name('album');
Route::get('/album/{album}/', 'App\Http\Controllers\FrontController@albumgallery')->name('album.gallery');
Route::get('/contact-us', 'App\Http\Controllers\FrontController@contact')->name('contact');
Route::post('/contact-us', 'App\Http\Controllers\FrontController@contactStore')->name('contact.store');


Route::get('/', 'App\Http\Controllers\FrontController@index')->name('home');


// Route::get('/post-requirements', 'App\Http\Controllers\FrontController@postRequirement')->name('postRequirement');

//jobs
Route::get('jobs/search/', 'App\Http\Controllers\FrontController@searchJob')->name('searchJob');

Route::get('/jobs','App\Http\Controllers\FrontController@jobs')->name('job.list');
Route::get('/jobs/{slug}','App\Http\Controllers\FrontController@jobSingle')->name('job.single');

//apply job
Route::get('/apply/{id}','App\Http\Controllers\FrontController@apply')->name('apply.job');
Route::post('/apply', 'App\Http\Controllers\JobApplicationController@store')->name('apply.store');

//service category

Route::get('/clients', 'App\Http\Controllers\FrontController@clients')->name('client.frontend');
Route::get('/services', 'App\Http\Controllers\FrontController@services')->name('service.frontend');

Route::get('services/{slug}','App\Http\Controllers\FrontController@serviceSingle')->name('service.single');

//blog
Route::get('blog/search/', 'App\Http\Controllers\FrontController@searchBlog')->name('searchBlog');

Route::get('blog/{slug}','App\Http\Controllers\FrontController@blogSingle')->name('blog.single');
Route::get('/blog/categories/{slug}', 'App\Http\Controllers\FrontController@blogCategories')->name('blog.category');
Route::get('/blog', 'App\Http\Controllers\FrontController@blogs')->name('blog.frontend');
//end blog

//press release

Route::get('/press-release', 'App\Http\Controllers\FrontController@press')->name('press.frontend');
Route::get('press-release/{slug}','App\Http\Controllers\FrontController@pressSingle')->name('press.single');


//slider list single page
Route::get('slider-list/{slug}','App\Http\Controllers\FrontController@sliderSingle')->name('slider.single');


Route::group(['prefix' => 'auth', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('export/{id}', 'App\Http\Controllers\HomeController@export')->name('export');

    //signed-in user routes
    Route::get('/profile', 'App\Http\Controllers\UserController@profile')->name('profile');
    Route::put('/profile/{id}/update', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::put('/profileimage/{id}/update', 'App\Http\Controllers\UserController@imageupdate')->name('user.imageupdate');
    Route::put('/profile/password', 'App\Http\Controllers\UserController@profilepassword')->name('user.password');
    //end of signed-in user routes

    //user
    Route::put('/users/{id}/updates', 'App\Http\Controllers\UserController@userUpdate')->name('users.update');
    Route::put('/password', 'App\Http\Controllers\UserController@password')->name('users.password');
    Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user.index');
    Route::get('/user/create', 'App\Http\Controllers\UserController@create')->name('user.create');
    Route::post('/user', 'App\Http\Controllers\UserController@store')->name('user.store');
    Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::patch('/status/{id}/update', 'App\Http\Controllers\UserController@statusupdate')->name('user-status.update');
    Route::delete('/user/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');

    //End user


    //General setting
    Route::get('/settings', 'App\Http\Controllers\SettingController@index')->name('setting.index');
    Route::post('/settings', 'App\Http\Controllers\SettingController@store')->name('setting.store');
    Route::put('/settings/{id}', 'App\Http\Controllers\SettingController@update')->name('setting.update');
    Route::put('/setting/{id}/images', 'App\Http\Controllers\SettingController@imageupdate')->name('setting.imageupdate');
    Route::put('/settings/{id}/welcome', 'App\Http\Controllers\SettingController@welcomeupdate')->name('welcome.update');
    Route::put('/settings/{id}/status', 'App\Http\Controllers\SettingController@statusupdate')->name('status.update');

    //End of General setting

    //Blog categories

    Route::get('/blog-category', 'App\Http\Controllers\BlogCategoryController@index')->name('blogcategory.index');
    Route::get('/blog-category/create', 'App\Http\Controllers\BlogCategoryController@create')->name('blogcategory.create');
    Route::post('/blog-category', 'App\Http\Controllers\BlogCategoryController@store')->name('blogcategory.store');
    Route::put('/blog-category/{category}', 'App\Http\Controllers\BlogCategoryController@update')->name('blogcategory.update');
    Route::delete('/blog-category/{category}', 'App\Http\Controllers\BlogCategoryController@destroy')->name('blogcategory.destroy');
    Route::get('/blog-category/{category}/edit', 'App\Http\Controllers\BlogCategoryController@edit')->name('blogcategory.edit');

    //End of Blog categories


    //blog

    Route::get('/blogs', 'App\Http\Controllers\BlogController@index')->name('blog.index');
    Route::get('/blogs/create', 'App\Http\Controllers\BlogController@create')->name('blog.create');
    Route::post('/blogs', 'App\Http\Controllers\BlogController@store')->name('blog.store');
    Route::put('/blogs/{blogs}', 'App\Http\Controllers\BlogController@update')->name('blog.update');
    Route::delete('/blogs/{blogs}', 'App\Http\Controllers\BlogController@destroy')->name('blog.destroy');
    Route::get('/blogs/{blogs}/edit', 'App\Http\Controllers\BlogController@edit')->name('blog.edit');
    Route::patch('/blogs/{id}/update', 'App\Http\Controllers\BlogController@updateStatus')->name('blog-status.update');

    //End blog

    //press release

    Route::get('/press-release', 'App\Http\Controllers\PressReleaseController@index')->name('press-release.index');
    Route::get('/press-release/create', 'App\Http\Controllers\PressReleaseController@create')->name('press-release.create');
    Route::post('/press-release', 'App\Http\Controllers\PressReleaseController@store')->name('press-release.store');
    Route::put('/press-release/{press}', 'App\Http\Controllers\PressReleaseController@update')->name('press-release.update');
    Route::delete('/press-release/{press}', 'App\Http\Controllers\PressReleaseController@destroy')->name('press-release.destroy');
    Route::get('/press-release/{press}/edit', 'App\Http\Controllers\PressReleaseController@edit')->name('press-release.edit');
    Route::patch('/press-release/{id}/update', 'App\Http\Controllers\PressReleaseController@updateStatus')->name('press-release-status.update');

    //End press release

    //sliders

    Route::get('/sliders', 'App\Http\Controllers\SliderController@index')->name('sliders.index');
    Route::get('/sliders/create', 'App\Http\Controllers\SliderController@create')->name('sliders.create');
    Route::post('/sliders', 'App\Http\Controllers\SliderController@store')->name('sliders.store');
    Route::put('/sliders/{sliders}', 'App\Http\Controllers\SliderController@update')->name('sliders.update');
    Route::delete('/sliders/{sliders}', 'App\Http\Controllers\SliderController@destroy')->name('sliders.destroy');
    Route::get('/sliders/{sliders}/edit', 'App\Http\Controllers\SliderController@edit')->name('sliders.edit');
    Route::patch('/sliders/{id}/update', 'App\Http\Controllers\SliderController@updateStatus')->name('sliders-status.update');

    //End sliders

    //service category

    Route::get('/service-category', 'App\Http\Controllers\ServiceCategoryController@index')->name('service-category.index');
    Route::get('/service-category/create', 'App\Http\Controllers\ServiceCategoryController@create')->name('service-category.create');
    Route::post('/service-category', 'App\Http\Controllers\ServiceCategoryController@store')->name('service-category.store');
    Route::put('/service-category/{servicecat}', 'App\Http\Controllers\ServiceCategoryController@update')->name('service-category.update');
    Route::delete('/service-category/{servicecat}', 'App\Http\Controllers\ServiceCategoryController@destroy')->name('service-category.destroy');
    Route::get('/service-category/{servicecat}/edit', 'App\Http\Controllers\ServiceCategoryController@edit')->name('service-category.edit');

    //End of service category

    //career

    Route::get('/career', 'App\Http\Controllers\CareerController@index')->name('career.index');
    Route::get('/career/create', 'App\Http\Controllers\CareerController@create')->name('career.create');
    Route::post('/career', 'App\Http\Controllers\CareerController@store')->name('career.store');
    Route::put('/career/{career}', 'App\Http\Controllers\CareerController@update')->name('career.update');
    Route::delete('/career/{career}', 'App\Http\Controllers\CareerController@destroy')->name('career.destroy');
    Route::get('/career/{career}/edit', 'App\Http\Controllers\CareerController@edit')->name('career.edit');



    //End of Career

    //Testimonials

    Route::get('/testimonials', 'App\Http\Controllers\TestimonialController@index')->name('testimonials.index');
    Route::get('/testimonials/create', 'App\Http\Controllers\TestimonialController@create')->name('testimonials.create');
    Route::post('/testimonials', 'App\Http\Controllers\TestimonialController@store')->name('testimonials.store');
    Route::put('/testimonials/{testimonials}', 'App\Http\Controllers\TestimonialController@update')->name('testimonials.update');
    Route::delete('/testimonials/{testimonials}', 'App\Http\Controllers\TestimonialController@destroy')->name('testimonials.destroy');
    Route::get('/testimonials/{testimonials}/edit', 'App\Http\Controllers\TestimonialController@edit')->name('testimonials.edit');

    //End of Testimonials

    //Album

    Route::get('/album', 'App\Http\Controllers\AlbumController@index')->name('album.index');
    Route::get('/album/create', 'App\Http\Controllers\AlbumController@create')->name('album.create');
    Route::post('/album', 'App\Http\Controllers\AlbumController@store')->name('album.store');
    Route::put('/album/{album}', 'App\Http\Controllers\AlbumController@update')->name('album.update');
    Route::delete('/album/{album}', 'App\Http\Controllers\AlbumController@destroy')->name('album.destroy');
    Route::get('/album/{album}/edit', 'App\Http\Controllers\AlbumController@edit')->name('album.edit');
    Route::get('/album/show/{id}', 'App\Http\Controllers\AlbumController@show')->name('album.show');
    Route::put('/album-upload-gallery/{id}', 'App\Http\Controllers\AlbumController@uploadGallery')->name('album-gallery.update');
    Route::post('/album-gallery/image-delete', 'App\Http\Controllers\AlbumController@deleteGallery')->name('album-gallery.delete');
    Route::get('/album-gallery/{id}', 'App\Http\Controllers\AlbumController@getGallery')->name('album-gallery.display');
    //End ofAlbum

    //clients

    Route::get('/clients', 'App\Http\Controllers\ClientController@index')->name('clients.index');
    Route::get('/clients/create', 'App\Http\Controllers\ClientController@create')->name('clients.create');
    Route::post('/clients', 'App\Http\Controllers\ClientController@store')->name('clients.store');
    Route::put('/clients/{clients}', 'App\Http\Controllers\ClientController@update')->name('clients.update');
    Route::delete('/clients/{clients}', 'App\Http\Controllers\ClientController@destroy')->name('clients.destroy');
    Route::get('/clients/{clients}/edit', 'App\Http\Controllers\ClientController@edit')->name('clients.edit');

    //End of clients

    //clients

    Route::get('/awards', 'App\Http\Controllers\AwardController@index')->name('awards.index');
    Route::get('/awards/create', 'App\Http\Controllers\AwardController@create')->name('awards.create');
    Route::post('/awards', 'App\Http\Controllers\AwardController@store')->name('awards.store');
    Route::put('/awards/{awards}', 'App\Http\Controllers\AwardController@update')->name('awards.update');
    Route::delete('/awards/{awards}', 'App\Http\Controllers\AwardController@destroy')->name('awards.destroy');
    Route::get('/awards/{awards}/edit', 'App\Http\Controllers\AwardController@edit')->name('awards.edit');

    //End of clients

    //teams

    Route::get('/teams', 'App\Http\Controllers\TeamController@index')->name('teams.index');
    Route::get('/teams/create', 'App\Http\Controllers\TeamController@create')->name('teams.create');
    Route::post('/teams', 'App\Http\Controllers\TeamController@store')->name('teams.store');
    Route::put('/teams/{teams}', 'App\Http\Controllers\TeamController@update')->name('teams.update');
    Route::delete('/teams/{teams}', 'App\Http\Controllers\TeamController@destroy')->name('teams.destroy');
    Route::get('/teams/{teams}/edit', 'App\Http\Controllers\TeamController@edit')->name('teams.edit');
    Route::post('/teams-sortable','App\Http\Controllers\TeamController@orderUpdate')->name('teams.order');
    //End of teams

    //pages

    Route::get('/pages', 'App\Http\Controllers\PageController@index')->name('pages.index');
    Route::get('/pages/create', 'App\Http\Controllers\PageController@create')->name('pages.create');
    Route::post('/pages', 'App\Http\Controllers\PageController@store')->name('pages.store');
    Route::put('/pages/{pages}', 'App\Http\Controllers\PageController@update')->name('pages.update');
    Route::delete('/pages/{pages}', 'App\Http\Controllers\PageController@destroy')->name('pages.destroy');
    Route::get('/pages/{pages}/edit', 'App\Http\Controllers\PageController@edit')->name('pages.edit');
    Route::patch('/pages/{id}/update', 'App\Http\Controllers\PageController@updateStatus')->name('pages-status.update');

    //End of pages

    //pages section

    Route::get('/section-elements/', 'App\Http\Controllers\SectionElementController@index')->name('section-elements.index');
    Route::get('/section-elements/create/{id}', 'App\Http\Controllers\SectionElementController@create')->name('section-elements.create');
    Route::post('/section-elements', 'App\Http\Controllers\SectionElementController@store')->name('section-elements.store');
    Route::put('/section-elements/{elements}', 'App\Http\Controllers\SectionElementController@update')->name('section-elements.update');
    Route::delete('/section-elements/{elements}', 'App\Http\Controllers\SectionElementController@destroy')->name('section-elements.destroy');
    Route::get('/section-elements/{elements}/edit', 'App\Http\Controllers\SectionElementController@edit')->name('section-elements.edit');
    Route::post('/section-elements/tablist/', 'App\Http\Controllers\SectionElementController@tablistUpdate')->name('section-elements.tablistUpdate');

    //End of pages section

    //for menu
    Route::get('/manage-menus/{slug?}', 'App\Http\Controllers\MenuController@index')->name('menu.index');
    Route::post('/create-menu', 'App\Http\Controllers\MenuController@store')->name('menu.store');
    Route::get('/add-pages-to-menu','App\Http\Controllers\MenuController@addPage')->name('menu.page');
    Route::get('add-post-to-menu','App\Http\Controllers\MenuController@addPost')->name('menu.post');
    Route::get('add-custom-link','App\Http\Controllers\MenuController@addCustomLink')->name('menu.custom');
    Route::get('/update-menu','App\Http\Controllers\MenuController@updateMenu')->name('menu.updateMenu');
    Route::post('/update-menuitem/{id}','App\Http\Controllers\MenuController@updateMenuItem')->name('menu.updatemenuitem');
    Route::get('/delete-menuitem/{id}/{key}/{in?}','App\Http\Controllers\MenuController@deleteMenuItem')->name('menu.deletemenuitem');
    Route::get('/delete-menu/{id}','App\Http\Controllers\MenuController@destroy')->name('menu.delete');

    //job categories

    Route::get('/job-category', 'App\Http\Controllers\JobCategoryController@index')->name('jobcategory.index');
    Route::get('/job-category/create', 'App\Http\Controllers\JobCategoryController@create')->name('jobcategory.create');
    Route::post('/job-category', 'App\Http\Controllers\JobCategoryController@store')->name('jobcategory.store');
    Route::put('/job-category/{category}', 'App\Http\Controllers\JobCategoryController@update')->name('jobcategory.update');
    Route::delete('/job-category/{category}', 'App\Http\Controllers\JobCategoryController@destroy')->name('jobcategory.destroy');
    Route::get('/job-category/{category}/edit', 'App\Http\Controllers\JobCategoryController@edit')->name('jobcategory.edit');

    //End of job categories


    //jobs

    Route::get('/jobs', 'App\Http\Controllers\JobController@index')->name('job.index');
    Route::get('/jobs/create', 'App\Http\Controllers\JobController@create')->name('job.create');
    Route::post('/jobs', 'App\Http\Controllers\JobController@store')->name('job.store');
    Route::put('/jobs/{jobs}', 'App\Http\Controllers\JobController@update')->name('job.update');
    Route::delete('/jobs/{jobs}', 'App\Http\Controllers\JobController@destroy')->name('job.destroy');
    Route::get('/jobs/{jobs}/edit', 'App\Http\Controllers\JobController@edit')->name('job.edit');
    Route::patch('/jobs/{id}/update', 'App\Http\Controllers\JobController@updateStatus')->name('job-status.update');

    //End jobs

    //jobs

    Route::get('/job-application', 'App\Http\Controllers\JobApplicationController@index')->name('apply.index');
    Route::get('/job-application/create', 'App\Http\Controllers\JobApplicationController@create')->name('apply.create');
    Route::put('/job-application/{apply}', 'App\Http\Controllers\JobApplicationController@update')->name('apply.update');
    Route::delete('/job-application/{apply}', 'App\Http\Controllers\JobApplicationController@destroy')->name('apply.destroy');
    Route::get('/job-application/{apply}/edit', 'App\Http\Controllers\JobApplicationController@edit')->name('apply.edit');
    Route::patch('/job-application/{id}/update', 'App\Http\Controllers\JobApplicationController@updateStatus')->name('apply-status.update');

    //End jobs


});

Route::get('/{page}', 'App\Http\Controllers\FrontController@page')
    ->name('page');
