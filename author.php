<?php get_header() ?>
<?php include (TEMPLATEPATH . '/sidebar_left.php'); ?>
	<div id="container">
		<div id="content">

<?php the_post() ?>

			<h2 class="page-title author"><?php printf(__('Author Archives: <span class="vcard">%s</span>'), "<a class='url fn n' href='$authordata->user_url' title='$authordata->display_name' rel='me'>$authordata->display_name</a>") ?></h2>

			<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<div id="entry-author-info" class="hentry">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description" class="entry-content">
							<h3><?php printf( __( '%s' ), get_the_author() ); ?></h3>
							<p><?php the_author_meta( 'description' ); ?></p>
						</div><!-- #author-description	-->
					</div><!-- #entry-author-info -->
					<div class="linebreak clear"></div>
			<?php endif; ?>

<?php rewind_posts(); while (have_posts()) : the_post(); ?>

			<!-- Begin post -->
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf(__('Link to %s'), esc_html(get_the_title(), 1)) ?>" rel="bookmark"><?php the_title() ?></a></h2>
				<div class="entry-date"><?php unset($previousday); printf(__('%1$s &#8211; %2$s'), the_date('', '', '', false), get_the_time()) ?></div> 
									
					<?php if ( has_post_thumbnail() ) { ?>
							<div class="postthumbimg-ds">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
					        	</a>
							</div><!-- End Thumb Container -->
						
						<div class="entry-content">
							<?php the_excerpt(''.__('read more <span class="meta-nav">&raquo;</span>').''); ?>
							<?php wp_link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: '), "</div>\n", 'number'); ?>
						</div>
						<div class="clear"></div>				
						
						<div class="entry-meta">
							<?php the_tags(__('<span class="tag-links">Tags '), ", ", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">|</span>\n") ?>
							<?php edit_post_link(__('Edit'), "\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">|</span>\n"); ?>
							<span class="comments-link"><?php comments_popup_link(__('Comment (0)'), __('Comment (1)'), __('Comments (%)')) ?></span>
						</div>
						
					<?php } else { ?>
						<div class="entry-content">
					<?php the_excerpt(''.__('read more <span class="meta-nav">&raquo;</span>').''); ?>
					<?php wp_link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: '), "</div>\n", 'number'); ?>
						</div>
						<div class="clear"></div>
						<div class="entry-meta">
							<?php the_tags(__('<span class="tag-links">Tags '), ", ", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">|</span>\n") ?>
							<?php edit_post_link(__('Edit'), "\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">|</span>\n"); ?>
							<span class="comments-link"><?php comments_popup_link(__('Comment (0)'), __('Comment (1)'), __('Comments (%)')) ?></span>
						</div>
					<?php }?> 
						
			</div>
			<!-- End post -->

<?php endwhile ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php include (TEMPLATEPATH . '/sidebar_right.php'); ?>
<?php get_footer() ?>