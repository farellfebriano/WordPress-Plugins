<?php

/**
 * @package LalalandPlugin
 */
/*
Plugin Name: Lalaland Plugin
Plugin URI: farellfebriano.com
Description: this is a sample plugin
Author: Farell Febriano
Author URI: farellfebriano.com
Version: 0.1
License: GPLv2 or later

 */

// ABSPATH --> Is the file location where this wordpress is located
// this variable will created when the wordpres first load, hence this code
// will let the plugins die if other try to access it without inside wordpress admin
if(!defined('ABSPATH')){
    die;
}



//other way to do it, this means that the wordpress is not installed properly

// if(!function_exists('add_action')){
//     exit;
// }


class LalalandPlugin
{
    function __construct()
    {
        add_action('init', array($this, 'add_custom_post_type'));
    }
    function activate()
    {
        $this->add_custom_post_type();
        //generate a CPT
        $this->add_custom_post_type();// backup plan when init hooks is not working
        //flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivation()
    {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function uninstall()
    {
        // delete CPT
        // delete all the plugin data from the DB
    }

    function add_custom_post_type()
    {
       register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
    }
}

if(class_exists('LalalandPlugin'))
{
    $lalalandPlugin=new LalalandPlugin();
}

//activation
register_activation_hook(__FILE__,array($lalalandPlugin,'activate'));
//deactivation
register_deactivation_hook(__FILE__,array($lalalandPlugin,'deactivation'));
//uninstall
register_uninstall_hook(__FILE__,array($lalalandPlugin,'uninstall'));
