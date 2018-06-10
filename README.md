# CMB2 Switch Button Field Type
Custom Switch Button field type for CMB2 Metabox for WordPress.

## Installation
You can install it as a plugin, or include the main file into your theme or plugin folder.

## Usage:

```
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
        'type'	           => 'switch'
    ) );
  }
}
```
