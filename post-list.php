<div class="entry">
	<?php 
	$args = array(
	    'post_type'=> 'post',
	    'post_status' => 'publish',
	    // 'orderBy' => 'id';
	    'posts_per_page' => 3,
	    );
	$myposts = new WP_Query( $args );

	if ( $myposts-> have_posts() ) : ?>
	<div class="my-posts">
	<?php while ( $myposts->have_posts() ) : $myposts->the_post(); ?>
	    <div class="titlepost">
	    	<?php the_title(); ?>
		</div>
	<?php endwhile; ?>
	</div>
	<?php 
		endif;
	 	// wp_reset_postdata(); 
	?>
	<div class="btn">
		<a class="btn btn-primary" data-offset="<?php echo $args['posts_per_page'] ?>" id="load_more" data-id="<?php echo get_the_ID(); ?>" ref="javascript:void(0);">More</a>
	</div>
</div>
