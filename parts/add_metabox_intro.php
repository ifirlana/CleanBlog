<?php
/** meta box page attribute We Hiring Dropdown Pages link
======================================================*/
add_action('admin_init', 'cleanblog_themes_meta_box_intro_admin_init');
add_action( 'save_post', 'cleanblog_themes_meta_box_intro_callback_save' );

function cleanblog_themes_meta_box_intro_admin_init() {
	add_meta_box( 'cleanblog-meta-box-intro-page-id', 
                  'Intro Banner',       		
                  'cleanblog_meta_box_callback', 	
                  'page',              			
                  'normal',            			
                  'high' );            		
	add_meta_box( 'cleanblog-meta-box-intro-post-id', 
                  'Intro Banner',       		
                  'cleanblog_meta_box_callback', 	
                  'post',              			
                  'normal',            			
                  'high' );  	
}

function cleanblog_meta_box_callback(){
  //echo "HELLO World!";
  global $post;
  
  $values = get_post_custom( $post->ID );
  $text_h1 = isset( $values['cleanblog_themes_meta_box_intro_h1_text'] ) ? $values['cleanblog_themes_meta_box_intro_h1_text'] : '';
  $text_span = isset( $values['cleanblog_themes_meta_box_intro_span_text'] ) ? $values['cleanblog_themes_meta_box_intro_span_text'] : '';

  $banner_select = isset( $values['cleanblog_themes_meta_box_intro_banner_select'] ) ? $values['cleanblog_themes_meta_box_intro_banner_select'] : '';


  wp_nonce_field( 'mekar_meta_box_nonce', 'meta_box_nonce' );   
  ?>
	<p><strong>Heading</strong></p>
	<label class="screen-reader-text" for="cleanblog_themes_meta_box_intro_h1_text">Heading</label>
	<input type="text" name="cleanblog_themes_meta_box_intro_h1_text" id="cleanblog_themes_meta_box_intro_h1_text" value="<?php echo $text_h1[0];?>" placeholder="[:en]...[:id]..." style="width: 100%;" />

	<p><strong>Sub Heading</strong></p>
	<label class="screen-reader-text" for="cleanblog_themes_meta_box_intro_span_text">Sub Heading</label>
	<input type="text" name="cleanblog_themes_meta_box_intro_span_text" id="cleanblog_themes_meta_box_intro_span_text" value="<?php echo $text_span[0];?>" placeholder="[:en]...[:id]..." style="width: 100%;"/>
  <?php

  // run custom type post_type
  global $post;
  
  $args = array('post_type' => 'banner','posts_per_page'=>-1);
  $posts = get_posts( $args );
  
  if($posts): ?>
    <p><strong>Select Banner</strong></p>
    <label class="screen-reader-text" for="cleanblog_themes_meta_box_intro_banner_select">Change Banner Image</label>
      <select name="cleanblog_themes_meta_box_intro_banner_select" id="cleanblog_themes_meta_box_intro_banner_select">
      <?php
        if($banner_select[0] and !empty($banner_select[0])):        
        ?>
        <option value="<?php echo $banner_select[0]?>"><?php echo get_the_title($banner_select[0]);?></option>
      <?php 
    endif;
      ?>
        <option value="">-- Default -- </option>
        <?php
      foreach ($posts as $post) {
        setup_postdata($post);
        ?>
        <option value="<?php echo $post->ID;?>"><?php the_title();?></option>
        <?php
      }
      ?>
      </select>
      <?php
      wp_reset_postdata();
  endif;
}

function cleanblog_themes_meta_box_intro_callback_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'mekar_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    ); 

     // Make sure your data is set before trying to save it
    if( isset( $_POST['cleanblog_themes_meta_box_intro_h1_text'] ) )
        update_post_meta( $post_id, 'cleanblog_themes_meta_box_intro_h1_text', wp_kses( $_POST['cleanblog_themes_meta_box_intro_h1_text'], $allowed ) );
         
    if( isset( $_POST['cleanblog_themes_meta_box_intro_span_text'] ) )
        update_post_meta( $post_id, 'cleanblog_themes_meta_box_intro_span_text', esc_attr( $_POST['cleanblog_themes_meta_box_intro_span_text'] ) );
      
    if( isset( $_POST['cleanblog_themes_meta_box_intro_banner_select'] ) )
        update_post_meta( $post_id, 'cleanblog_themes_meta_box_intro_banner_select', esc_attr( $_POST['cleanblog_themes_meta_box_intro_banner_select'] ) );

}
