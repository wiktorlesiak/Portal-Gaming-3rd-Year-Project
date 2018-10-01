<?php


require_once __DIR__ . '/../src/main_controller.php';

$action = filter_input(INPUT_GET, 'action');

switch ($action) {

    case 'home':
        homepage_action();
        break;
    case 'profile':
        profile_action();
        break;
    case 'about':
        about_action();
        break;
    case 'forum':
        forum_action();
        break;
    case 'shop':
        shop_action();
        break;
    case 'add':
        add_action();
        break;
    case 'cart':
        cart_action();
        break;
    case 'logout':
        logout_action();
        break;
    case 'error':
        error_action();
        break;
    case 'errorActivate':
        errorActivate_action();
        break;
    case 'success':
        success_action();
        break;
    case 'login':
        login_action();
        break;
    case 'delete':
        remove_action();
        break;
    case 'verify':
        verify_action();
        break;
    case 'admin':
        admin_action();
        break;
    case 'add_user':
        add_user_action();
        break;
    case 'edit_user':
        edit_user_action();
        break;
    case 'delete_user':
        delete_user_action();
        break;
    case 'add_update':
        add_update_action();
        break;
    case 'edit_update':
        edit_update_action();
        break;
    case 'delete_update':
        delete_update_action();
        break;
    case 'forgot':
        forgot_action();
        break;
    case 'reset':
        reset_action();
        break;
    case 'reset_password':
        reset_password_action();
        break;
    case 'rating':
        rating_action();
        break;
    case 'add_rating':
        add_rating_action();
        break;
    case 'billing':
        billing_action();
        break;


    case 'main':
    default:
        index_action();

}