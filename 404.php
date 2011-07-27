<?php get_header() ?>
<?php include (TEMPLATEPATH . '/sidebar_left.php'); ?>	

	<div id="container">
		<div id="content">

                       <div id="post-0" class="post error404 not-found">
	                                
	                                <div class="entry-content">
	                                        <p><strong>404.</strong><?php _e(' That’s an error.', 'plusish'); ?></p>
											<p><?php _e(' The requested URL /404 was not found on this server. That’s all we know.', 'plusish'); ?></p>
                                            <div class="linebreak clear"></div>	
                                        <?php get_search_form(); ?>
                                </div><!-- .entry-content -->
                        </div><!-- #post-0 -->
	

		</div><!-- #content -->
	</div><!-- #container -->
	<php <script type="text/javascript">
	                // focus on search field after it has loaded
	                document.getElementById('s') && document.getElementById('s').focus();
	</script>
	

<?php include (TEMPLATEPATH . '/sidebar_right.php'); ?>	
<?php get_footer() ?>
