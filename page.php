<?php get_header() ?>
<?php include (TEMPLATEPATH . '/sidebar_left.php'); ?>
	<div id="container">
		<div id="content">

<?php the_post() ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="entry-title"><?php the_title(); ?></h2>
				<div class="linebreak clear"></div>
				<div class="entry-content">
<?php the_content() ?>

<?php wp_link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: '), "</div>\n", 'number'); ?>

<div class="clear"></div>
<?php edit_post_link(__('Edit'),'<span class="edit-link">','</span>') ?>

				</div>
			</div><!-- .post -->

<?php comments_template(); ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php include (TEMPLATEPATH . '/sidebar_right.php'); ?>
<?php get_footer() ?>