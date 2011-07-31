<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
<meta name="viewport" content="width=device-width" />
<meta charset=<?php bloginfo('charset') ?>>
<title><?php bloginfo('name'); wp_title();?></title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head() ?>

</head>

<body <?php body_class(); ?>>  

<div id="topbar">
	<div id="access">	
		<div class="menu">
			<ul>
				<li class="<?php  if ( is_front_page() ) echo ('current_page_item'); ?>">
				<?php /*<a href="<?php echo home_url( '/' ); ?>" title="<?php _e('Home'); ?>" class="top_parent"><?php _e('Home', 'plusish'); ?></a>
				*/ ?></li>
			</ul> 
		</div>
		<?php wp_nav_menu(array( 'container_class' => 'menu-header', 'theme_location' => 'primary-menu',)); ?>			
	</div><!--  #access -->	
	
</div>
<div id="header-wrap">
	<div id="header">
		<div class="wrap">
		<div class="branding">	
			<h1 id="blog-title" class="blogtitle">
            <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name') ?>"><?php bloginfo('name') ?></a></h1>
			<div class="description"><?php //bloginfo('description'); ?> </div>
             
         <div class="searchbox">
           <form id="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
			<div class="searchform">
				<p>
				<input type="text" name="s" id="s"  value="<?php _e('Type your query and press enter to search...','plusish'); ?>" onfocus="this.value='';" />
				
				</p>
			</div>
	</form>
            </div>
		</div><!-- .branding -->	
			
		</div><!-- .wrap -->	
	</div><!--  #header -->		
</div>

<div class="clear"></div>

<div id="wrapper">	
		<div class="clear"></div>
