<?php
/*
Plugin Name: CMB2 Switch Button
Description: https://github.com/themevan/CMB2-Switch-Button/
Version: 1.0
Author: ThemeVan
Author URI: https://www.themevan.com
License: GPL-2.0+
*/
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;
if( !class_exists( 'CMB2_Switch_Button' ) ) {
    /**
     * Class CMB2_Radio_Image
     */
    class CMB2_Switch_Button {
        public function __construct() {
            add_action( 'cmb2_render_switch', array( $this, 'callback' ), 10, 5 );
            add_action( 'admin_head', array( $this, 'admin_head' ) );
        }
        public function callback($field, $escaped_value, $object_id, $object_type, $field_type_object) {
           $field_name = $field->_name();
           
           $args = array(
	           			'type'  => 'checkbox',
	           			'id'	=> $field_name,
	           			'name'  => $field_name,
	           			'desc'	=> '',
	           			'value' => 'on',
	           		);
           if($escaped_value == 'on'){
           	  $args['checked'] = 'checked';
           }

           echo '<label class="cmb2-switch">';
           echo $field_type_object->input($args);
           echo '<span class="cmb2-slider round"></span>';
           echo '</label>';
           $field_type_object->_desc( true, true );
        }

        public function admin_head() {
            ?>
        <style>
        .cmb2-switch {
				  position: relative;
				  display: inline-block;
				  width: 49px;
				  height: 23px;
				}

				.cmb2-switch input {display:none;}

				.cmb2-slider {
				  position: absolute;
				  cursor: pointer;
				  top: 0;
				  left: 0;
				  right: 0;
				  bottom: 0;
				  background-color: #ccc;
				  -webkit-transition: .4s;
				  transition: .4s;
				}

				.cmb2-slider:before {
				  position: absolute;
				  content: "";
				  height: 17px;
				  width: 17px;
				  left: 3px;
				  bottom: 3px;
				  background-color: white;
				  -webkit-transition: .4s;
				  transition: .4s;
				}

				input:checked + .cmb2-slider {
				  background-color: #2196F3;
				}

				input:focus + .cmb2-slider {
				  box-shadow: 0 0 1px #2196F3;
				}

				input:checked + .cmb2-slider:before {
				  -webkit-transform: translateX(26px);
				  -ms-transform: translateX(26px);
				  transform: translateX(26px);
				}

				/* Rounded sliders */
				.cmb2-slider.round {
				  border-radius: 34px;
				}

				.cmb2-slider.round:before {
				  border-radius: 50%;
				}
        </style>
        <?php
        }
    }
    $cmb2_switch_button = new CMB2_Switch_Button();
}
