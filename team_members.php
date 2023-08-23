<!-- For demo purpose -->
<div class="container py-5">
    <div class="row text-center text-white">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4">Team Page</h1>
            <p class="lead mb-0">Using Bootstrap 4 grid and utilities, create a nice team page.</p>
            <p class="lead">Snippet by<a href="https://bootstrapious.com/snippets" class="text-white">
                <u>Bootstrapious</u></a>
            </p>
        </div>
    </div>
</div><!-- End -->


<div class="container">
    <div class="row text-center">

		<?php
			$args = array(
				'post_type' => array('teammember'),
				'posts_per_page' => '4',
			);
		// the query.
		$the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>

			<!-- the loop -->
			<?php
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
			?>
			
				<!-- Team item -->
				<div class="col-xl-3 col-sm-6 mb-5">
					<div class="bg-white rounded shadow-sm py-5 px-4">
						<!-- <img src="https://bootstrapious.com/i/snippets/sn-team/teacher-4.jpg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm"> -->
						<?php the_post_thumbnail('post-thumbnail',['class' => 'img-fluid rounded-circle mb-3 img-thumbnail shadow-sm']); ?>
						<h5 class="mb-0"><?php the_title(); ?></h5><span class="small text-uppercase text-muted"><?PHP THE_CONTENT(); ?></span>
						<ul class="social mb-0 list-inline mt-3">
							<li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
							<li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div><!-- End -->
			
	
			
			<?php endwhile; ?>
			<!-- end of the loop -->
			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>


 
    </div>
</div>