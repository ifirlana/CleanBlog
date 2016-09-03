<?php
class PortfolioCardViewCleanblogWidget extends WP_Widget {
    function __construct() {
      // Instantiate the parent object
      parent::__construct( false, 'Card View' );
      }
    function widget( $args, $instance ) {

      $portfoliocardviewcleanblogwidget_title          = $instance['portfoliocardviewcleanblogwidget_title'];
      $portfoliocardviewcleanblogwidget_post_type          = $instance['portfoliocardviewcleanblogwidget_post_type'];
      $portfoliocardviewcleanblogwidget_category_name      = $instance['portfoliocardviewcleanblogwidget_category_name'];
      $portfoliocardviewcleanblogwidget_posts_per_page      = $instance['portfoliocardviewcleanblogwidget_posts_per_page'];
      $portfoliocardviewcleanblogwidget_col      = $instance['portfoliocardviewcleanblogwidget_col'];
      if(empty($portfoliocardviewcleanblogwidget_col)){
        $portfoliocardviewcleanblogwidget_col = "col-xs-3";
        
        }    

      if(empty($portfoliocardviewcleanblogwidget_post_type)){
        $portfoliocardviewcleanblogwidget_post_type = "portfolio-data";
        
        }    


      if(empty($portfoliocardviewcleanblogwidget_posts_per_page)){
        $portfoliocardviewcleanblogwidget_posts_per_page = 6;
        
        }    
      ?>
      <?php 
          global $post;
          $args = array(
            'post_type' => 'portfolio-data',
            'posts_per_page' => $portfoliocardviewcleanblogwidget_posts_per_page);

          if(!empty($portfoliocardviewcleanblogwidget_category_name)){

              //$args['category'] = $portfoliocardviewcleanblogwidget_category_name;
              $args['tax_query'] = array(
              array(
                'taxonomy' => 'cat_portfoliodata',
                'field' => 'slug',
                'terms' => $portfoliocardviewcleanblogwidget_category_name)
            );
          }
          $posts = get_posts( $args );
        ?>
      <?php if($portfoliocardviewcleanblogwidget_title):?>
        <h3><?php echo $portfoliocardviewcleanblogwidget_title;?></h3><hr />
        <?php endif;?>
      <div class="row" style="margin-bottom: 60px;">
        <?php 
          if ($posts) : 
            foreach ($posts as $key => $value) {
              //print_r($value);
              if(get_the_post_thumbnail($value->ID)) :  
                $url = wp_get_attachment_url( get_post_thumbnail_id($value->ID) );

              else:
                $url = get_template_directory_uri()."/dist/images/home-bg.jpg";
              
              endif;
              ?>
        <div class="<?php echo $portfoliocardviewcleanblogwidget_col;?>">
          <img class="img-responsive" data-toggle="modal" data-target="#myModalurl_<?php echo $value->ID;?>img" src="<?php echo $url; ?>" style="cursor: pointer;" />
          <h4 data-toggle="modal" data-target="#myModalurl_<?php echo $value->ID;?>content" style="cursor: pointer;"><?php echo $value->post_title;?></h4>
        </div>
        <div class="modal fade" id="myModalurl_<?php echo $value->ID;?>img" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Show Detail Image</h4>
              </div>
              <div class="modal-body">
                <div style="overflow: scroll;">
                  <img src="<?php echo $url;?>" />
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="myModalurl_<?php echo $value->ID;?>content" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Detail Content</h4>
              </div>
              <div class="modal-body">
                <div style="overflow: scroll;">
                  <p><?php echo $value->post_content;?></p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
      <!-- end modal -->
        <?php }
          endif; ?>
      </div>
      <?php
      }
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance['portfoliocardviewcleanblogwidget_title']          = strip_tags($new_instance['portfoliocardviewcleanblogwidget_title']);
      $instance['portfoliocardviewcleanblogwidget_post_type']          = strip_tags($new_instance['portfoliocardviewcleanblogwidget_post_type']);
      $instance['portfoliocardviewcleanblogwidget_category_name']      = strip_tags($new_instance['portfoliocardviewcleanblogwidget_category_name']);
      $instance['portfoliocardviewcleanblogwidget_posts_per_page']      = strip_tags($new_instance['portfoliocardviewcleanblogwidget_posts_per_page']);
      $instance['portfoliocardviewcleanblogwidget_col']      = strip_tags($new_instance['portfoliocardviewcleanblogwidget_col']);
     
      return $instance;
      }
    function form( $instance ) {
    // Output admin widget options form
      ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'portfoliocardviewcleanblogwidget_title' ); ?>"><?php echo 'Title :'; ?></label>
        <input type="text" id="<?php echo $this->get_field_id( 'portfoliocardviewcleanblogwidget_title' ); ?>" name="<?php echo $this->get_field_name( 'portfoliocardviewcleanblogwidget_title' ); ?>" value="<?php echo $instance['portfoliocardviewcleanblogwidget_title']; ?>" style="width:100%;" placeholder="*empty" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'portfoliocardviewcleanblogwidget_col' ); ?>"><?php echo 'Col :'; ?></label>
        <input type="text" id="<?php echo $this->get_field_id( 'portfoliocardviewcleanblogwidget_col' ); ?>" name="<?php echo $this->get_field_name( 'portfoliocardviewcleanblogwidget_col' ); ?>" value="<?php echo $instance['portfoliocardviewcleanblogwidget_col']; ?>" style="width:100%;" placeholder="col-xs-3" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'portfoliocardviewcleanblogwidget_post_type' ); ?>"><?php echo 'post type :'; ?></label>
        <input type="text" id="<?php echo $this->get_field_id( 'portfoliocardviewcleanblogwidget_post_type' ); ?>" name="<?php echo $this->get_field_name( 'portfoliocardviewcleanblogwidget_post_type' ); ?>" value="<?php echo $instance['portfoliocardviewcleanblogwidget_post_type']; ?>" style="width:100%;" placeholder="portfolio" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'portfoliocardviewcleanblogwidget_category_name' ); ?>"><?php echo 'category slug :'; ?></label>
        <input type="text" id="<?php echo $this->get_field_id( 'portfoliocardviewcleanblogwidget_category_name' ); ?>" name="<?php echo $this->get_field_name( 'portfoliocardviewcleanblogwidget_category_name' ); ?>" value="<?php echo $instance['portfoliocardviewcleanblogwidget_category_name']; ?>" style="width:100%;" placeholder="*show all" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'portfoliocardviewcleanblogwidget_posts_per_page' ); ?>"><?php echo 'posts per page :'; ?></label>
        <input type="number" id="<?php echo $this->get_field_id( 'portfoliocardviewcleanblogwidget_posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'portfoliocardviewcleanblogwidget_posts_per_page' ); ?>" value="<?php echo $instance['portfoliocardviewcleanblogwidget_posts_per_page']; ?>" style="width:100%;" placeholder="6" />
      </p>
      <?php
    }
}

function cleanblog_plugins_register_widgets_portfoliocardviewcleanblogwidget() {
	register_widget( 'PortfolioCardViewCleanblogWidget' );
}

add_action( 'widgets_init', 'cleanblog_plugins_register_widgets_portfoliocardviewcleanblogwidget' );

?>