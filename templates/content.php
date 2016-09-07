<article <?php post_class(); ?>>
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
		  <header>
		    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		    <?php get_template_part('templates/entry-meta'); ?>
		  </header>
		  <div class="entry-summary">
		    <?php the_excerpt(); ?>
		  </div>
        </div>
    </div>
</article>
