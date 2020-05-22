<?php
/**
 * Global variables used in plugin.
 *
 * @package WP User Avatar
 * @version 1.9.13
 */

/**
 * @since 1.8
 * @uses get_intermediate_image_sizes()
 * @uses get_option()
 * @uses wp_max_upload_size()
 */

// Define global variables
global $avatar_default,
       $show_avatars,
       $wpua_avatar_default,
       $wpua_edit_avatar,
       $wpua_resize_crop,
       $wpua_resize_h,
       $wpua_resize_upload,
       $wpua_resize_w,
       $mustache_original,
       $mustache_medium,
       $mustache_thumbnail,
       $mustache_avatar,
       $mustache_admin,
       $upload_size_limit,
       $upload_size_limit_with_units,
       $wpua_user_upload_size_limit,
       $wpua_upload_size_limit,
       $wpua_upload_size_limit_with_units,
       $all_sizes;

// Default avatar name
$avatar_default = get_option('avatar_default');
// Attachment ID of default avatar
$wpua_avatar_default = get_option('avatar_default_wp_user_avatar');

// Booleans
$show_avatars = get_option('show_avatars');
$wpua_edit_avatar = get_option('wp_user_avatar_edit_avatar');
$wpua_resize_crop = get_option('wp_user_avatar_resize_crop');
$wpua_resize_upload = get_option('wp_user_avatar_resize_upload');
// Resize dimensions
$wpua_resize_h = get_option('wp_user_avatar_resize_h');
$wpua_resize_w = get_option('wp_user_avatar_resize_w');


/****************************************************
* @todo now now 
replace this with my own default sizes which are 30,40,50,60,100
* 
****************************************************/

// Default avatar 512x512
$mustache_original = WPUA_URL.'images/wpua.png';
// Default avatar 300x300
$mustache_medium = WPUA_URL.'images/wpua-300x300.png';
// Default avatar 150x150
$mustache_thumbnail = WPUA_URL.'images/wpua-150x150.png';
// Default avatar 96x96
$mustache_avatar = WPUA_URL.'images/wpua-96x96.png';
// Default avatar 32x32
$mustache_admin = WPUA_URL.'images/wpua-32x32.png';
// Server upload size limit
$upload_size_limit = wp_max_upload_size();
// Convert to KB
if($upload_size_limit > 1024) {
  $upload_size_limit /= 1024;
}
$upload_size_limit_with_units = (int) $upload_size_limit.'KB';

// User upload size limit
$wpua_user_upload_size_limit = get_option('wp_user_avatar_upload_size_limit');
if($wpua_user_upload_size_limit == 0 || $wpua_user_upload_size_limit > wp_max_upload_size()) {
  $wpua_user_upload_size_limit = wp_max_upload_size();
}
// Value in bytes
$wpua_upload_size_limit = $wpua_user_upload_size_limit;
// Convert to KB
if($wpua_user_upload_size_limit > 1024) {
  $wpua_user_upload_size_limit /= 1024;
}
$wpua_upload_size_limit_with_units = (int) $wpua_user_upload_size_limit.'KB';

// Check for custom image sizes
$all_sizes = array_merge(get_intermediate_image_sizes(), array('original'));
