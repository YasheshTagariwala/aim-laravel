<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part('head'); ?>
<body <?php body_class(); ?> id="gybi">
<?php 
global $_globalsettings;
global $ultimatemember;
global $_gybiuser;
um_fetch_user(get_current_user_id());
$_globalsettings=get_option('_gybi_theme_settings');  ?>
<header>
  <div class="container">
    <div class="navsec">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <h1 class="logo" id="logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="GYBI"> <img  src="<?php echo get_template_directory_uri(); ?>/images/Logo.jpg" alt="GYBI" title="GYBI" /> </a></h1>
      </div>
      <div class="social-links">
      <div  class="pull-left ">
       <?php
	    $var = do_shortcode( '[tp widget="dropdown/tpw_dropdown.php"]' );
	    echo $var;
	  ?>
      </div>
        <div class="pull-left social-links-nav"><a href="<?php echo $_globalsettings['google'] ?>" target="_blank"  class="google">google+</a><a href="<?php echo $_globalsettings['linkedin'] ?>" target="_blank"  class="linkedin">linkedin</a><a href="<?php echo $_globalsettings['twitter'] ?>" target="_blank" class="twitter">twitter</a><a href="<?php echo $_globalsettings['facebook'] ?>" target="_blank"  class="facebook">facebook</a><a href="<?php echo esc_url( home_url( '/' ) ); ?>?s" class="search">search</a> </div>
      </div>
      
        <div class="header-right">
      <div id="navbar" class="navbar-collapse collapse mainnavheader">
        <?php
            wp_nav_menu( array(
                'menu'              => 'main-menu',
                'theme_location'    => 'main-menu',
                'depth'             => 2,
                'container'         => false,
                'menu_class'        => 'nav navbar-nav  navbar-left mainnav inlinitem',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
        <div class="inlinitem langauge-menu">
          <?php
	  $var = do_shortcode( '[tp widget="dropdown/tpw_dropdown.php"]' );
	  echo $var;
	  ?>
        </div>
       
      </div>
       <?php
if ( is_user_logged_in() ) { ?>
        <div class="logged-in-menu loginnav  ">
          <div class="um-member-photo-header"> <a data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false" href="#" title="<?php echo um_cap_initials( um_user('display_name') ); ?>"><?php echo get_avatar( um_user('ID')); ?><div class="name">Welcome,
 <?php echo um_user('display_name'); ?></div></a>
            <?php
            wp_nav_menu( array(
                'menu'              => 'user-menu',
                'theme_location'    => 'user-menu',
                'depth'             => 2,
                'container'         => false,
                'menu_class'        => 'dropdown-menu',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
          </div>
        </div>
        <?php } else {?>
        <?php
            wp_nav_menu( array(
                'menu'              => 'login-menu',
                'theme_location'    => 'login-menu',
                'depth'             => 2,
                'container'         => false,
                'menu_class'        => 'nav navbar-nav navbar-right loginnav inlinitem',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
        <?php } ?>
      </div>
    </div>
  </div>
</header>
