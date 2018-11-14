<?php 	
$query = new WP_Query( array( 'cat' => 19 ) );
get_header(); 
$parameters = array( 'type' => 'product', 'taxonomy' => 'product_cat' ); 
$categories = get_categories( $parameters ); 

?>

<div class="col-12 main">
	<!-- listing categories -->
	<nav>
		<ul>
		<?php foreach ($categories as $cat) { ?>
			<li><a href="<?php echo get_term_link($cat->slug, 'product_cat') ?>"><?php echo $cat->name; ?></a></li>
		<?php } ?>
		</ul>
		<a href="#">All Products >></a>
	</nav>

	<section>

		<div class="row">
<?php
	$params = array(
		'posts_per_page' => 6, 
		'post_type' => 'product',
		
	); 
	$wc_query = new WP_Query($params); // (2)
?>
	<?php if ($wc_query->have_posts()) : // (3) ?>
	<?php while ($wc_query->have_posts()) : // (4)?>
	<div class="col-4 mb-5">
		<?php  $wc_query->the_post(); ?>
		<img class="img-fluid img-thumbnail w-100" src="<?php  echo the_post_thumbnail_url('thumbnail') ?>">
		<h4><?php  the_title(); ?></h4>
		<p> <?php $rating = get_post_meta( get_the_ID(), '_wc_average_rating', true ); 
		echo $rating . ' / 5.00' ?> </p>
		<p><?php 
			$sale_price = get_post_meta(get_the_ID(), '_sale_price', true);
			 echo $sale_price . ' € '?>
		</p>
	</div>
<?php endwhile; ?>
<?php wp_reset_postdata(); // (5) ?>
<?php else:  ?>
<p>
     <?php _e( 'No Products' ); // (6) ?>
</p>
<?php endif; ?>
			<div class="col-12 text-center mt-5 mb-5">
				<a href="" class="btn btn-secondary">Show All</a>
			</div>
		</div>
	</section>
</div>



<?php get_footer(); ?>







<!-- // Start the loop.
// while ( have_posts() ) : the_post();

// the_content();

// End the loop.
// endwhile;?> -->