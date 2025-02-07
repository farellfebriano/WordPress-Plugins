# Creating custom post

## STEP 1

we need to create class that will consist of our plugin functionality. This functionality will
seperated into 3 part (activation, deactivation, uninstall )

```php
// asume all you have done all the init code that required for creating wordpress plugins

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
        register_post_type('book',
        [   'public'=>true,
            'label'=>'book'
        ]
        );
    }
}

```
