<!-- //////// -->
<!-- Homepage -->
<!-- \\\\\\\\ -->

<?php get_header(); ?>

<?php // echo do_shortcode('[rev_slider alias="hero"]'); ?>

<section id="hero">
	<div class="container-fluid">
		<div class="row text-center hero">
			<div class="offset-md-3 col-md-6 mt-5">
				<img class="logo" src="/wp-content/themes/cheapsummerholidays/img/logo-white-bold.png" alt="">
				<h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h2>
			</div>
		</div>
	</div>
</section>

<script src="https://sbhc.portalhc.com/209559/searchbox/451122"></script>

<section id="blog">
  <div class="container">
    <div class="row">
      <?php
      $args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'category_name' => 'Uncategorized',
          'posts_per_page' => 5,
      );
      $arr_posts = new WP_Query( $args );

      if ( $arr_posts->have_posts() ) :

          while ( $arr_posts->have_posts() ) :
              $arr_posts->the_post();
              ?>
              <div class="col-md-4"><div class="card text-center"><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <?php
                  if ( has_post_thumbnail() ) :
                      the_post_thumbnail();
                  endif;
                  ?>
                  <!-- <div class="date">
                  <?php
                    // echo get_the_date();
                  ?>
                  </div> -->
                  <header class="entry-header">
                      <h1 class="entry-title"><?php the_title(); ?></h1>
                  </header>
                  <div class="entry-content text-center">
                      <?php the_excerpt(); ?>

                      <a class="btn btn-post" href="<?php the_permalink(); ?>">Read More...</a>
                  </div>
              </article></div></div>
              <?php
          endwhile;
      endif;?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
