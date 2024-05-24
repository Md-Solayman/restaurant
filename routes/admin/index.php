<?php


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    require  'category.php';
    require  'product.php';
    require  'settings.php';
    require  'payment_settings.php';
    require  'coupon.php';
    require  'delivery.php';
    require  'order.php';
    require  'daily_offer.php';
    require  'daily_offer_title.php';
    require  'banner_slider.php';
    require  'app_banner.php';
    require  'chef.php';
    require  'testimonial.php';
    require  'counter.php';
    require  'blog_category.php';
    require  'blog.php';
    require  'about.php';
    require  'contact.php';
    require  'terms_condition.php';
    require  'reservation_time.php';
    require  'reservation.php';
    require  'newsletter.php';
    require  'social_link.php';
    require  'footer.php';
    require  'menu-builder.php';
    require  'custom_page_builder.php';
    require  'product_rating.php';
    require  'clear_database.php';
});
