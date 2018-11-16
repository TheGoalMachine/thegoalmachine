<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php


				$query_args = array(
				'post_type'      => 'goals',
				'posts_per_page' => 1,
				'orderby'        => 'meta_value_num', 
			    'meta_key'	   	 => 'goals-rating',
			    //'meta_key'	   	 => 'goals-rating',
			    'order'          => 'DESC'
			    //'orderby'        => 'goals-rating'
				);

				$result = new WP_Query( $query_args );
				//$posts  = $result->posts;
			?>
				<!--<pre>
				  <?php 
				  	//var_dump($result);
				  	//var_dump($posts);
				  	//var_dump($posts[0]->guid);
				  	//var_dump($posts[0]->ID);
				  	//var_dump($posts[0]->post_name);

				    //var_dump($result->have_posts());

				  	//the_field('goals-goalscorer')
				  ?>
				</pre> -->
				
				<?php

				//echo $result['posts']->guid;

				if ($result->have_posts()){
		 			?>
		 			<!-- <h1> Inside if</h1> -->
		 			<?php 
					//while ( $result->have_posts() ) : the_post();
					while ( $result->have_posts() ) : $result->the_post(); ?>
						
						 <!-- <h2> inside while</h2> -->
						<?php
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content-page', 'front');
						//get_post_format() );

					// End the loop.
					endwhile;
				}else{
					echo'No Goals Found';
				};

				echo "return";

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main> 
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
