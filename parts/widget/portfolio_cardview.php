<?php
class PortfolioCardViewCleanblogWidget extends WP_Widget {
    function __construct() {
      // Instantiate the parent object
      parent::__construct( false, 'Portfolio - Card View' );
      }
    function widget( $args, $instance ) {

      //$portfoliocardviewcleanblogwidget                = $instance['portfoliocardviewcleanblogwidget'];
      echo "Hello World!";
      }
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
   
      //$instance['portfoliocardviewcleanblogwidget']       = strip_tags( $new_instance['portfoliocardviewcleanblogwidget']);
     
      return $instance;
      }
    function form( $instance ) {
    // Output admin widget options form
    }
}

function cleanblog_plugins_register_widgets_portfoliocardviewcleanblogwidget() {
	register_widget( 'PortfolioCardViewCleanblogWidget' );
}

add_action( 'widgets_init', 'cleanblog_plugins_register_widgets_portfoliocardviewcleanblogwidget' );

?>