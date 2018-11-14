 <!-- CAROUSSEL BOOTSTRAP -->

          <?php
            $params = array(
              'posts_per_page' => 3, 
              'post_type' => 'product',
              'orderby' => 'id',
              'order' => 'DESC'
            ); 
            $wc_query = new WP_Query($params); // (2)
          ?>
          
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="row">
                      <div class="col-6">
                        <img class="img-fluidd-block w-100" src="https://picsum.photos/350/350/?random" alt="Second slide">
                      </div>
                      <div class="col-6">
                        <h3>A Beautiful little wooden table</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-secondary">Show More</a>
                      </div>
                    </div>
                  </div>
              <?php if ($wc_query->have_posts()) : // (3) ?>
	              <?php while ($wc_query->have_posts()) : // (4)?>
                  <?php  $wc_query->the_post(); ?>
                  <div class="carousel-item ">
                    <div class="row">
                      <div class="col-6">
                        <img class="img-fluidd-block w-100" src="<?php  echo the_post_thumbnail_url('thumbnail') ?>" alt="Second slide">
                      </div>
                      <div class="col-6">
                        <h3><?php  the_title(); ?></h3>
                        <p><?php echo $post->post_excerpt?></p>
                        <a href="<?php the_permalink() ?>" class="btn btn-secondary">Show More</a>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); // (5) ?>
                <?php else:  ?>
                  <p>
                    <?php _e( 'No Products' ); // (6) ?>
                  </p>
              <?php endif; ?>   
  </div>

  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

        </header>
      </div> <!-- FIN DIV COL-12 -->
      </div>
  </div>