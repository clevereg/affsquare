<div class="wrapper container">
	<?php 
	
	    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            the_content(); 
        } // end while
    } // end if
	?>
</div>