# CMB2 Switch Button Field Type
Custom Switch Button field type for CMB2 Metabox for WordPress.

## Installation
You can install it as a plugin, or include the main file into your theme or plugin folder.

## Usage:

```php
add_action( 'cmb2_admin_init', 'create_your_metabox' );
if(!function_exists('create_your_metabox')){
  function create_your_metabox(){
    $prefix = '_slug_';

    $cmb2_metabox = new_cmb2_box( array(
        'id'            => $prefix . 'test_metabox',
        'title'         => esc_html__( 'Test Metabox', 'tmv' ),
        'object_types'  => array( 'page'), // Post type
        'priority'   => 'high',
        'context'    => 'normal',
    ) );

    $cmb2_metabox->add_field( array(
        'name'             => esc_html__( 'Dynamically Load', 'text-domain' ),
        'id'               => $prefix . 'metabox_id',
        'desc'             => esc_html__('','text-domain'),
        'type'	           => 'switch',
        'default'          => true, //If it's checked by default 
        'active_value'     => true,
        'inactive_value'   => false
    ) );
  }
}
```

* If you set the active_value and inactive_value to a boolean value such as 1/0, true/false, just use it as below

```php
$test_meta = get_post_meta($post->ID, '_slug_metabox_id', true);

if($test_meta){
  //Do something when it's checked;
}
```

* If you set the active_value and inactive_value to the specific value other than the boolean value, let's say enable/disable, you can use it as:

```php
$test_meta = get_post_meta($post->ID, '_slug_metabox_id', true);

if($test_meta === 'enable'){
  //Do something when it's checked;
}else{
  //Do something when it's unchecked;
}

```


## Screenshot:

<img src="https://github.com/themevan/CMB2-Switch-Button/blob/master/example_screenshot.gif" width="250" />

## Follow us:
- Website: https://www.themevan.com
- Facebook: https://facebook.com/ThemeVan
- Twitter: https://twitter.com/ThemeVan
