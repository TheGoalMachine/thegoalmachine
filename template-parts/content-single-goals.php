<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
		<?php





			if (get_field('goals-goalscorer')){ ?>

				<p>This Goal Machine <?php the_field('goals-goalscorer');?></p>
				<!-- <img src="<?php //the_field('company_logo');?> "> -->

			<?php } 

			// while ( have_posts() ) : the_post();

	  //   		get_template_part( 'template-parts/content-single', get_post_format() );

			// endwhile;§
			?>
			<p>Hardcoded URL from the Embedded option in youtube:</p>
			<?php
			if (get_field('goals-youtube_embedded')) {?>

				<iframe width="560" height="315" src="https://www.youtube.com/embed/0xyCr3w4ciI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<!-- Other link https://youtu.be/0xyCr3w4ciI -->
			<?php
			}

			?>
			<p>goals-youtube_url populated from the embedded URL in youtube:</p>
			<?php
			if (get_field('goals-youtube_url')){?>
				<iframe width="600" height="315" src="<?php the_field('goals-youtube_url');?>"></iframe>
			<?php
			}

			?>
			<p>goals-youtube_embedded populated with the full iframe options:</p>
			<?php
			if (get_field('goals-youtube_embedded')){
				the_field('goals-youtube_embedded');
			}


			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
