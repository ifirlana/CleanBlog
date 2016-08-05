<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><ul class="nav navbar-nav navbar-right"><?php
          
          if (has_nav_menu('primary_navigation')) :
          /*  wp_nav_menu(['theme_location' => 'primary_navigation', 
              'menu_class' => 'nav navbar-nav navbar-right',
              'container' => 'container']);
          */
            $locations = get_nav_menu_locations();
            $menu = wp_get_nav_menu_object( $locations[ 'primary_navigation' ] );
            $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

            $count = 0;
            $submenu = false;
            foreach( $menuitems as $item ):
                $link = $item->url;
                $title = $item->title;
                // item does not have a parent so menu_item_parent equals 0 (false)
                $style = "";
                if ( !$item->menu_item_parent ):
                // save this id for later comparison with sub-menu items
                  $parent_id = $item->ID;
                  if($item->object_id == get_the_ID ()){
                    $style .= "style=\"font-weight:bold;\"";
                  
                  }
                 ?>
            <li class="item">
                <a href="<?php echo $link; ?>" class="dropdown-button nav-font" data-activates="dropdownID-<?php echo $parent_id;?>" <?php echo $style;?>>
                    <?php echo $title; ?>
                </a>
            </li>
            <?php
                endif;
            $count++; 
            
            endforeach; 
          endif;
        ?></ul></div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<?php /*
<header class="banner">
  <div class="container">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <nav class="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
*/?>