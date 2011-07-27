<?php get_header() ?>
<?php include (TEMPLATEPATH . '/sidebar_left.php'); ?>
	<div id="container">
		<div id="content">
			<?php the_post(); ?>
			<div id="nav-above" class="navigation">
				<div class="nav-previous"><?php previous_post_link('%link', __('<span class="meta-nav">&laquo;</span> Previous Post', 'plusish')) ?></div>
				<div class="nav-next"><?php next_post_link('%link', __('Next Post <span class="meta-nav">&raquo;</span>', 'plusish')) ?></div>
			</div>

			 <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
				
				<h2 class="single-entry-title"><?php the_title(); ?></h2>
					
				<div class="linebreak"></div>
				<div class="entry-content">
					<?php the_content(); ?>
					
					
					<div class="clear"></div>
					 <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>
					<?php if (is_single() && function_exists('wp23_related_posts') ) { ?>
						<?php wp23_related_posts(); ?>
					<?php } ?>
 				</div>

				<div class="entry-meta">
                	<g:plusone size="small"></g:plusone>
					<?php plusish_posted_on(); ?>
					<?php plusish_posted_in(); ?>	
					<?php edit_post_link(__('Edit'), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>"); ?>

					
				</div>
				<div class="clear"></div> 
			</div><!-- .post -->


			<?php comments_template( '', true ); ?>


		</div><!-- #content -->
	</div><!-- #container -->

<?php include (TEMPLATEPATH . '/sidebar_right.php'); ?>
<?php get_footer() ?>
