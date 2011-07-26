<?php get_header( ); ?>
<?php include (TEMPLATEPATH . '/sidebar_left.php'); ?>
	<div id="container">
		<div id="content">
			<h1 class="page-title search-title"><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<div class="linebreak clear"></div>	
			<?php if (have_posts()) : ?>  
			<?php while (have_posts()) : the_post(); ?>

			<!-- Begin post -->
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf(__('Permalink to %s'), esc_html(get_the_title(), 1)) ?>" rel="bookmark"><?php the_title() ?></a></h2>
				<div class="entry-date"><?php unset($previousday); printf(__('%1$s &#8211; %2$s'), the_date('', '', '', false), get_the_time()) ?></div> 
									
					<?php if ( has_post_thumbnail() ) { ?>
					
							<div class="postthumbimg-ds">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
					        	</a>
					    	</div>
						
						
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

<?php endwhile;  ?>

<?php else : ?>

<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<script type="text/javascript">
	                // focus on search field after it has loaded
	                document.getElementById('s') && document.getElementById('s').focus();
</script>				
<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php include (TEMPLATEPATH . '/sidebar_right.php'); ?>
<?php get_footer() ?>