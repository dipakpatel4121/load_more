add_action( 'wp_ajax_nopriv_get_data', 'my_ajax_handler' );
add_action( 'wp_ajax_get_data', 'my_ajax_handler' );

function my_ajax_handler() {
    // wp_send_json_success(data);
    global $post;
    $offset = isset($_POST['offset']) ? $_POST['offset'] : 4;
    $args = array(
	    'post_type'=> 'post',
	    'post_status' => 'publish',
	    'posts_per_page' => 2,
	    'offset'=> $offset
	    );
    $query = new WP_Query($args);
    
    $return_html = "";
    //$arr = [];
    if($query->have_posts()):
    	while ($query->have_posts()) : $query->the_post();
            $return_html .= '<div class="titlepost">'.get_the_title().'</div>';
            /*$arr[] = [
                'title' => get_the_title()
            ];*/
    	endwhile;
    	wp_reset_postdata();
    endif;
    if($query->post_count > 0){
        $offset += $query->post_count;
        $return_data = ['offset' => $offset,'html_data' => $return_html];
        wp_send_json_success($return_data);
    }else{
        wp_send_json_error();
    }
}
