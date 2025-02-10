# Creating Custom Post

## STEP 1

we need to create class that will consist of our plugin functionality. This functionality will
seperated into 3 part (activation, deactivation, uninstall)
<br></br>
be mindfull, every stage of the code (activation, deactivation, uninstall), we need to ` flush_rewrite_rules();`
like the example bellow

```php
// asume all you have done all the init code that required for creating wordpress plugins

class LalalandPlugin
{
    function __construct()
    {
        // initiate the custom post
        add_action('init', array($this, 'add_custom_post_type'));
    }

    function activate()
    {
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
        flush_rewrite_rules();
    }

    function add_custom_post_type()
    {
        register_post_type('book',
        [   'public'=>true,
            'label'=>'book'
        ]
        );
    }
}
```

# Uninstall Custom Posts

Instead us the <wordpress-plugins-name>.php file to code out uninstall code. Wordpress provide the uninstall.php
file as the file for us to code our uninstall steps. There will be 2 way to do this. The first ways is using `foreach`
and the other one is deleting all the data straight from the wordpress db.

## One Way
### STEP 1

always check is the `WP_UNINSTALL_PLUGIN` is initiate to make sure that only admin that can delete our plugins.

```php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}
```

### STEP 2

`$books` will get all the books that we create it and assign it into a variable called `$books`. Then, we will loops the it and delete it with `wp_delete_post`
```php
$books = get_posts( array( 'post_type' => <the name of the posts>, 'numberposts' => -1 ) );

foreach( $books as $book ) {
wp_delete_post( $book->ID, true );
}
```

## Two Way
It is better to use this way in cautioins and having really good knowledge regarding wordpress dabase structure since it might
erase all the database. 

```php
// Access the database via SQL
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );
```


