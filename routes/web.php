<?php

use App\Http\Controllers\Custom\ProjectController;
use App\Http\Controllers\Custom\ServiceController;
use App\Http\Controllers\Custom\BlogController;
use App\Http\Controllers\Custom\AboutController;
use App\Http\Controllers\Custom\ContactController;


Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServicesController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServicesController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::post('services/parse-csv-import', 'ServicesController@parseCsvImport')->name('services.parseCsvImport');
    Route::post('services/process-csv-import', 'ServicesController@processCsvImport')->name('services.processCsvImport');
    Route::resource('services', 'ServicesController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectsController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectsController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::post('projects/parse-csv-import', 'ProjectsController@parseCsvImport')->name('projects.parseCsvImport');
    Route::post('projects/process-csv-import', 'ProjectsController@processCsvImport')->name('projects.processCsvImport');
    Route::resource('projects', 'ProjectsController');

    // Project Categories
    Route::delete('project-categories/destroy', 'ProjectCategoriesController@massDestroy')->name('project-categories.massDestroy');
    Route::post('project-categories/media', 'ProjectCategoriesController@storeMedia')->name('project-categories.storeMedia');
    Route::post('project-categories/ckmedia', 'ProjectCategoriesController@storeCKEditorImages')->name('project-categories.storeCKEditorImages');
    Route::post('project-categories/parse-csv-import', 'ProjectCategoriesController@parseCsvImport')->name('project-categories.parseCsvImport');
    Route::post('project-categories/process-csv-import', 'ProjectCategoriesController@processCsvImport')->name('project-categories.processCsvImport');
    Route::resource('project-categories', 'ProjectCategoriesController');

    // Testimonials
    Route::delete('testimonials/destroy', 'TestimonialsController@massDestroy')->name('testimonials.massDestroy');
    Route::post('testimonials/media', 'TestimonialsController@storeMedia')->name('testimonials.storeMedia');
    Route::post('testimonials/ckmedia', 'TestimonialsController@storeCKEditorImages')->name('testimonials.storeCKEditorImages');
    Route::post('testimonials/parse-csv-import', 'TestimonialsController@parseCsvImport')->name('testimonials.parseCsvImport');
    Route::post('testimonials/process-csv-import', 'TestimonialsController@processCsvImport')->name('testimonials.processCsvImport');
    Route::resource('testimonials', 'TestimonialsController');

    // Blog Post
    Route::delete('blog-posts/destroy', 'BlogPostController@massDestroy')->name('blog-posts.massDestroy');
    Route::post('blog-posts/media', 'BlogPostController@storeMedia')->name('blog-posts.storeMedia');
    Route::post('blog-posts/ckmedia', 'BlogPostController@storeCKEditorImages')->name('blog-posts.storeCKEditorImages');
    Route::post('blog-posts/parse-csv-import', 'BlogPostController@parseCsvImport')->name('blog-posts.parseCsvImport');
    Route::post('blog-posts/process-csv-import', 'BlogPostController@processCsvImport')->name('blog-posts.processCsvImport');
    Route::resource('blog-posts', 'BlogPostController');

    // Team Members
    Route::delete('team-members/destroy', 'TeamMembersController@massDestroy')->name('team-members.massDestroy');
    Route::post('team-members/media', 'TeamMembersController@storeMedia')->name('team-members.storeMedia');
    Route::post('team-members/ckmedia', 'TeamMembersController@storeCKEditorImages')->name('team-members.storeCKEditorImages');
    Route::post('team-members/parse-csv-import', 'TeamMembersController@parseCsvImport')->name('team-members.parseCsvImport');
    Route::post('team-members/process-csv-import', 'TeamMembersController@processCsvImport')->name('team-members.processCsvImport');
    Route::resource('team-members', 'TeamMembersController');

    // Contact Enquiries
    Route::delete('contact-enquiries/destroy', 'ContactEnquiriesController@massDestroy')->name('contact-enquiries.massDestroy');
    Route::post('contact-enquiries/parse-csv-import', 'ContactEnquiriesController@parseCsvImport')->name('contact-enquiries.parseCsvImport');
    Route::post('contact-enquiries/process-csv-import', 'ContactEnquiriesController@processCsvImport')->name('contact-enquiries.processCsvImport');
    Route::resource('contact-enquiries', 'ContactEnquiriesController');

    // Newsletter Subscribers
    Route::delete('newsletter-subscribers/destroy', 'NewsletterSubscribersController@massDestroy')->name('newsletter-subscribers.massDestroy');
    Route::post('newsletter-subscribers/parse-csv-import', 'NewsletterSubscribersController@parseCsvImport')->name('newsletter-subscribers.parseCsvImport');
    Route::post('newsletter-subscribers/process-csv-import', 'NewsletterSubscribersController@processCsvImport')->name('newsletter-subscribers.processCsvImport');
    Route::resource('newsletter-subscribers', 'NewsletterSubscribersController');

    // Site Settings
    Route::delete('site-settings/destroy', 'SiteSettingsController@massDestroy')->name('site-settings.massDestroy');
    Route::post('site-settings/media', 'SiteSettingsController@storeMedia')->name('site-settings.storeMedia');
    Route::post('site-settings/ckmedia', 'SiteSettingsController@storeCKEditorImages')->name('site-settings.storeCKEditorImages');
    Route::post('site-settings/parse-csv-import', 'SiteSettingsController@parseCsvImport')->name('site-settings.parseCsvImport');
    Route::post('site-settings/process-csv-import', 'SiteSettingsController@processCsvImport')->name('site-settings.processCsvImport');
    Route::resource('site-settings', 'SiteSettingsController');

    // Gallery
    Route::delete('galleries/destroy', 'GalleryController@massDestroy')->name('galleries.massDestroy');
    Route::post('galleries/media', 'GalleryController@storeMedia')->name('galleries.storeMedia');
    Route::post('galleries/ckmedia', 'GalleryController@storeCKEditorImages')->name('galleries.storeCKEditorImages');
    Route::post('galleries/parse-csv-import', 'GalleryController@parseCsvImport')->name('galleries.parseCsvImport');
    Route::post('galleries/process-csv-import', 'GalleryController@processCsvImport')->name('galleries.processCsvImport');
    Route::resource('galleries', 'GalleryController');

    // Blog Category
    Route::delete('blog-categories/destroy', 'BlogCategoryController@massDestroy')->name('blog-categories.massDestroy');
    Route::post('blog-categories/parse-csv-import', 'BlogCategoryController@parseCsvImport')->name('blog-categories.parseCsvImport');
    Route::post('blog-categories/process-csv-import', 'BlogCategoryController@processCsvImport')->name('blog-categories.processCsvImport');
    Route::resource('blog-categories', 'BlogCategoryController');

    // Faq
    Route::delete('faqs/destroy', 'FaqController@massDestroy')->name('faqs.massDestroy');
    Route::post('faqs/parse-csv-import', 'FaqController@parseCsvImport')->name('faqs.parseCsvImport');
    Route::post('faqs/process-csv-import', 'FaqController@processCsvImport')->name('faqs.processCsvImport');
    Route::resource('faqs', 'FaqController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

//custom Route

Route::get('/gallery', [App\Http\Controllers\Custom\GalleryController::class, 'index'])->name('custom.gallery');
Route::get('/contact', [ContactController::class, 'index'])->name('custom.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
// About
Route::get('/about', [AboutController::class, 'index'])->name('custom.about');

//custom route
Route::get('/', [App\Http\Controllers\Custom\IndexController::class, 'index'])->name('custom.index');
// Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('custom.projects');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');          // Blog Listing
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show'); 
// Newsletter
Route::post('/newsletter/subscribe', [App\Http\Controllers\Custom\IndexController::class, 'store'])->name('newsletter.subscribe');
