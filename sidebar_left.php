<div class="sidebar-left">
	<ul class="xoxo">
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Left Sidebar") ) : ?>
    <p class="text-side">Default left sidebar stuff here!</p>
<?php endif; ?>

	</ul>
</div><!-- #secondary .sidebar -->