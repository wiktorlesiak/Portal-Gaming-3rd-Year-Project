<?php
/**
 * Main Controller
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'portalgaming');
define('DB_USER', 'root');
define('DB_PASS', 'root');


function index_action()
{


    require_once __DIR__ . '/../templates/index.php';
}

/**
 * Function to show index
 */
function homepage_action()
{

    require_once __DIR__ . '/../templates/home.php';
}

function profile_action()
{
    $pageTitle = "profile page";
    require_once __DIR__ . '/../templates/profile.php';
}

/**
 * Function to show about page
 */
function about_action()

{
    $pageTitle = "about page";
    require_once __DIR__ . '/../templates/about.php';
}


/**
 * Function to show forum page
 */
function forum_action()
{
    $pageTitle = "forum page";
    require_once __DIR__ . '/../public/forum/index.php';
}

/**
 * Function to show shop page
 */
function shop_action()
{


    $pageTitle = "shop page";
    require_once __DIR__ . '/../templates/function.php';
}

function add_action()
{


    $pageTitle = "add";
    require_once __DIR__ . '/../templates/shop.php';
}

function cart_action()
{


    $pageTitle = "cart";
    require_once __DIR__ . '/../templates/cart.php';
}

function logout_action()
{


    $pageTitle = "cart";
    require_once __DIR__ . '/../templates/logout.php';
}

function error_action()
{


    $pageTitle = "error";
    require_once __DIR__ . '/../templates/error.php';
}
function errorActivate_action()
{


    $pageTitle = "errorActivate";
    require_once __DIR__ . '/../templates/errorActivate.php';
}
function verify_action()
{
    $pageTitle = "verify";
    require_once __DIR__ . '/../templates/verify.php';
}

function success_action()
{
    $pageTitle = "success";
    require_once __DIR__ . '/../templates/success.php';
}

function forgot_action()
{
    $pageTitle = "forgot";
    require_once __DIR__ . '/../templates/forgot.php';
}
function login_action()
{
    require_once __DIR__ . '/../templates/login.php';
}
function remove_action()
{
    require_once __DIR__ . '/../templates/shop.php';
}
function topics_action()
{
    require_once __DIR__ . '/../templates/topics.php';
}
function search_action()

{
    $pageTitle = "search page";
    require_once __DIR__ . '/../templates/search.php';
}

function admin_action()
{
    require_once __DIR__ . '/../templates/admin/admin.php';
}
function add_user_action()
{
    require_once __DIR__ . '/../templates/admin/add_user.php';
}

function delete_user_action()
{
    require_once __DIR__ . '/../templates/admin/delete_user.php';
}
function edit_user_action()
{
    require_once __DIR__ . '/../templates/admin/edit_user.php';
}

function add_update_action()
{
    require_once __DIR__ . '/../templates/admin/add_update.php';
}

function delete_update_action()
{
    require_once __DIR__ . '/../templates/admin/delete_update.php';
}
function edit_update_action()
{
    require_once __DIR__ . '/../templates/admin/edit_update.php';
}
function reset_action()
{
    require_once __DIR__ . '/../templates/reset.php';
}

function reset_password_action()
{
    require_once __DIR__ . '/../templates/reset_password.php';
}
function rating_action()
{
    require_once __DIR__ . '/../templates/rating/rating.php';
}
function add_rating_action()
{
    require_once __DIR__ . '/../templates/rating/add_rating.php';
}
function billing_action()
{
    require_once __DIR__ . '/../templates/billing.php';
}


?>