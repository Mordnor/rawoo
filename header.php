<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
    crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head() ?>
  <title>Rawoo</title>
</head>

<body>



  <div class="container">
    <div class="row">
      <div class="col-12">
        <header>
          <!-- NAVBAR BOOTSTRAP -->
          <nav class="navbar navbar-expand-lg navbar-light">
            <h2><a class="navbar-brand" href="#">Codishop</a></h2>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://wordpress-shop/index.php/shop/">shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://wordpress-shop/index.php/blog/">blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">about</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">contact</a>
                </li>
              </ul>

              <ul class="navbar-nav ">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user-alt"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-shopping-bag"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-search"></i></a></li>
              </ul>
            </div>
          </nav>
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



