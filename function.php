/// add code in function.php how to localize script

wp_enqueue_script( 'twenty-twenty-one-jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js', array('jquery') );

wp_enqueue_script( 'twenty-twenty-one-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );
wp_localize_script( 'twenty-twenty-one-custom', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

