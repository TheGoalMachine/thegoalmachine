<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<!-- <h1>Text added after the Title for Home only.</h1> -->
	</header><!-- .entry-header -->

	<?php //twentysixteen_post_thumbnail(); 

		//var_dump(get_field('goals-goalscorer'));
		if (get_field('goals-goalscorer')){ ?>
			<h1 class="goal_machine">This Goal Machine is<h1>
			<h1 class="goal_machine blink"><?php the_field('goals-goalscorer');?></h1>
			<!-- <img src="<?php //the_field('company_logo');?> "> -->
		<?php 
		} 

		if (get_field('goals-rating')){ ?>
			<h2 class="goal_machine">Goal rating of <?php the_field('goals-rating');?> </h2>
		<?php 
		}
		
		if (get_field('goals-youtube_embedded')){
			the_field('goals-youtube_embedded');
		}
	?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
	?>

</article><!-- #post-## -->
