<?php
    $values = get_post_custom(get_the_ID ());
    
    //set default
    $bg_image =  get_template_directory_uri()."/dist/images/home-bg.jpg";


    $cleanblog_themes_meta_box_intro_h1_text = isset( $values['cleanblog_themes_meta_box_intro_h1_text'] ) ? $values['cleanblog_themes_meta_box_intro_h1_text'] : '';
    $cleanblog_themes_meta_box_intro_span_text = isset( $values['cleanblog_themes_meta_box_intro_span_text'] ) ? $values['cleanblog_themes_meta_box_intro_span_text'] : '';

    $cleanblog_themes_meta_box_intro_banner_select = isset( $values['cleanblog_themes_meta_box_intro_banner_select'] ) ? $values['cleanblog_themes_meta_box_intro_banner_select'] : '';
    if(!empty($cleanblog_themes_meta_box_intro_banner_select) and $cleanblog_themes_meta_box_intro_banner_select != ""){
        $bg_image = get_the_post_thumbnail_url($cleanblog_themes_meta_box_intro_banner_select[0]);
    }
    ?><!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('<?php echo $bg_image;?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1><?php echo $cleanblog_themes_meta_box_intro_h1_text[0];?></h1>
                    <hr class="small">
                    <span class="subheading"><?php echo $cleanblog_themes_meta_box_intro_span_text[0];?></span>
                </div>
            </div>
        </div>
    </div>
</header>