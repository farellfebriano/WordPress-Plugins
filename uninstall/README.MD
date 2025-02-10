# UNINSTALL WORDPRESS PLUGIN
Instead us the <wordpress-plugins-name>.php file to code out uninstall code. Wordpress provide the uninstall.php 
file as the file for us to code our uninstall steps. There will be 2 way to do this. The first ways is using `foreach` 
and the other one is deleting all the data straight from the wordpress db. 

## STEP 1 
always check is the `WP_UNINSTALL_PLUGIN` is initiate to make sure that only admin that can delete our plugins. 

```php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}
```
