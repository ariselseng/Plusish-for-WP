<?php get_header( ); ?>
<?php include (TEMPLATEPATH . '/sidebar_left.php'); ?>
	<div id="container">
		<div id="content">
			<h1 class="page-title search-title"><?php
					printf( __( 'Tag Archives: %s', 'plusish' ), '<span>' . single_tag_title( '', false ) . '</span>' );
			?></h1>
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
							</div><!-- End Thumb Container -->
						
						<div class="entry-content">
							<?php the_excerpt(''.__('read more <span class="meta-nav">&raquo;</span>').''); ?>
							<?php wp_link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: '), "</div>\n", 'number'); ?>
						</div>
						<div class="clear"></div>				
						
						<div class="entry-meta">
							<?php the_tags(__('<span class="tag-links">Tags '), ", ", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">|</span>\n") ?>
							<?php edit_post_link(__('Edit'), "\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">|</span>\n"); ?>
							<span class="comments-link"><?php comments_popup_link(__('Comment (0)', 'plusish' ), __('Comment (1)', 'plusish' ), __('Comments (%)', 'plusish' )) ?></span>
						</div>
						
					<?php } else { ?>
						<div class="entry-content">
					<?php the_excerpt(''.__('read more <span class="meta-nav">&raquo;</span>').''); ?>
					<?php wp_link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: '), "</div>\n", 'number'); ?>
						</div>
						<div class="clear"></div>
						<div class="entry-meta">
							<?php the_tags(__('<span class="tag-links">Tags ', 'plusish'), ", ", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">|</span>\n") ?>
							<?php edit_post_link(__('Edit'), "\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">|</span>\n"); ?>
							<span class="comments-link"><?php comments_popup_link(__('Comment (0)', 'plusish' ), __('Comment (1)', 'plusish' ), __('Comments (%)', 'plusish' )) ?></span>
						</div>
					<?php }?> 
						
			</div>
			<!-- End post -->

<?php endwhile; endif ?>


		</div><!-- #content -->
	</div><!-- #container -->
	
<?php include (TEMPLATEPATH . '/sidebar_right.php'); ?>
<?php get_footer() ?>
