<?php
/**
 * Template Name: Home
 */
?>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <?php 
    global $post;      
    $args=array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'orderby'          => 'date',
            'order'            => 'DESC', 
            'posts_per_page'=>-1,
        );
    $posts = get_posts( $args );
    if ($posts) : 

        foreach ($posts as $post) {         
            
            setup_postdata($post);
            ?>
            <div class="post-preview">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <h2 class="post-title">
                        <?php the_title();?>
                    </h2>
                    <h3 class="post-subtitle">
                        <?php the_content(); ?>
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#"><?php the_author();?></a> on <?php the_date(); ?></p>
            </div>
            <hr>
            <?php
        }

        wp_reset_postdata();
    endif;
        ?>
        <!--
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">
                        Man must explore, and this is exploration at its greatest
                    </h2>
                    <h3 class="post-subtitle">
                        Problems look mighty small from 150 miles up
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
            </div>
            <hr>
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">
                        I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
                    </h2>
                </a>
                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 18, 2014</p>
            </div>
            <hr>
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">
                        Science has not yet mastered prophecy
                    </h2>
                    <h3 class="post-subtitle">
                        We predict too much for the next year and yet far too little for the next ten.
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on August 24, 2014</p>
            </div>
            <hr>
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">
                        Failure is not an option
                    </h2>
                    <h3 class="post-subtitle">
                        Many say exploration is part of our destiny, but it’s actually our duty to future generations.
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on July 8, 2014</p>
            </div>
            <hr>
            -->
        <!-- Pager 
            <ul class="pager">
                <li class="next">
                    <a href="?get=all">Older Posts &rarr;</a>
                </li>
            </ul>
            -->
        </div>
    </div>
</div>