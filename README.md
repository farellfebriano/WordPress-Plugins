# WordPress-Plugins

## STEP 1
creating meta data for the plgins

 ```php
 
<?php
/**
 * @package LalalandPlugin
 */
/*
 * Plugin Name: Lalaland Plugin
 * Plugin URI: farellfebriano.com
 * Description: this is a sample plugin
 * Author: Farell Febriano
 * Author URI: farellfebriano.com
 * Version: 0.1
 * License: GPLv2 or later
 */
 ```

Creating a index.php (//Silence is golden)
this is created for safety percution since the file is the first one that 
wordpress look into and serve when we try to use the plugins. 
hence to make a file hidden it is best to create "index.php".


 ## STEP 2
Creating a index.php (//Silence is golden)
this is created for safety percution since the file is the first one that 
wordpress look into and serve when we try to use the plugins. 
hence to make a file hidden it is best to create "index.php".

## STEP 3
secure your plugins with this code. (choose either one)

```php
...
if(!defined('ABSPATH')){
    die;
}

// OR

if(!function_exists('add_action')){
     exit;
 }
 ```

## STEP 4
3 default action to when you use your own plugins (Deactivation, Activation, Uninstall)

```php
...

function activate()
    {
      ...
    }

function deactivation()
    {
       ...
    }

function uninstall()
    {
      ...
    }
 ```

 ## STEP 5
register it function into its each actions

```php
...

//activation
register_activation_hook(__FILE__,array($lalalandPlugin,'activate'));
//deactivation
register_deactivation_hook(__FILE__,array($lalalandPlugin,'deactivation'));
//uninstall
register_uninstall_hook(__FILE__,array($lalalandPlugin,'uninstall'));
 ```




