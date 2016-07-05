<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"><?php 

		the_content(); 
		?></div>
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"><?php 

		wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); 
		?></div>
	</div>
</div>