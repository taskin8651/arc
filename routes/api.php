<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Services
    Route::post('services/media', 'ServicesApiController@storeMedia')->name('services.storeMedia');
    Route::apiResource('services', 'ServicesApiController');

    // Projects
    Route::post('projects/media', 'ProjectsApiController@storeMedia')->name('projects.storeMedia');
    Route::apiResource('projects', 'ProjectsApiController');

    // Project Categories
    Route::post('project-categories/media', 'ProjectCategoriesApiController@storeMedia')->name('project-categories.storeMedia');
    Route::apiResource('project-categories', 'ProjectCategoriesApiController');

    // Testimonials
    Route::post('testimonials/media', 'TestimonialsApiController@storeMedia')->name('testimonials.storeMedia');
    Route::apiResource('testimonials', 'TestimonialsApiController');

    // Blog Post
    Route::post('blog-posts/media', 'BlogPostApiController@storeMedia')->name('blog-posts.storeMedia');
    Route::apiResource('blog-posts', 'BlogPostApiController');

    // Team Members
    Route::post('team-members/media', 'TeamMembersApiController@storeMedia')->name('team-members.storeMedia');
    Route::apiResource('team-members', 'TeamMembersApiController');

    // Contact Enquiries
    Route::apiResource('contact-enquiries', 'ContactEnquiriesApiController');

    // Newsletter Subscribers
    Route::apiResource('newsletter-subscribers', 'NewsletterSubscribersApiController');

    // Site Settings
    Route::post('site-settings/media', 'SiteSettingsApiController@storeMedia')->name('site-settings.storeMedia');
    Route::apiResource('site-settings', 'SiteSettingsApiController');

    // Gallery
    Route::post('galleries/media', 'GalleryApiController@storeMedia')->name('galleries.storeMedia');
    Route::apiResource('galleries', 'GalleryApiController');

    // Blog Category
    Route::apiResource('blog-categories', 'BlogCategoryApiController');

    // Faq
    Route::apiResource('faqs', 'FaqApiController');
});
