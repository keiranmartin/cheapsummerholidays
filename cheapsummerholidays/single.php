<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header('blog'); ?>

<style>
#main img{
    width: 100%;
    height: auto;
    margin-top: 100px;
    border-radius: 15px;
    box-shadow: 0px 0px 52px -5px rgba(0,0,0,0.75);
}

.social-icons{
    position: fixed;
    right: 10px;
    top: 50%;
    opacity: 0;
}

.social-icons img{
    display: block;
}

.social-icons img:hover{
  transform: scale(1.3);
}

.social-icons img{
    margin-bottom: 10px;
}

.card img{
    width: 100%;
    height: 213px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.card{
    border-radius: 15px;
    margin-bottom: 100px !important;
    background-color: #0473AA;
}

.card:hover{
    transform: scale(1.05);
    transition: all 0.5s;
    cursor: pointer;
}

.card a{
    color: white;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    font-size: 25px;
}

.card a:hover{
    text-decoration: none;

}

.recent{
    margin-top: 50px;
    margin-bottom: 50px;
}

.recent h2{
    margin-bottom: 40px;
}


.progressContainer{
  position: fixed;
  top: 82.94px;
  left: 0;
  width: 100%;
  height: 10px;
  background: gray;
  z-index: 1029;
}
.progress{
  height: 10px;
  background: #FCBB02;
  width: 0;
  transition: width 0.2s;
}



@media only screen and (max-width: 942px) {
  .social-icons img{
    display: inline !important;
    }
  .social-icons{
      position: inherit;
      text-align: center !important;
      margin: 50px auto 0 auto;
  }
  .social-icons img:hover{
  transform: scale(1.1);
  }
}

@media only screen and (max-width: 575px) {
    .card{
        margin-bottom: 10px !important;
    }
  }



</style>

<section>
  <div class="container dashed">
    <div class="row">




      <div id="" class="content-area text-justify offset-md-2 col-md-8"> <!-- offset-md-2 -->
        <main id="main" class="site-main" role="main">

          <div class="progressContainer"><div id="progress" class="progress"></div></div>

          <?php while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/post/content', get_post_format() );

            the_post_thumbnail(); ?>

            <div class="title text-center"> <?php the_title(); ?> </div>

            <div class="text text-justify"> <?php the_content(); ?> </div>

              <?php
                endwhile;
              ?>

        </main> <!-- #main -->
      </div>    <!-- #primary -->

      <div class="social-icons">
        <a href="#"><img class="facebook" src="/wp-content/themes/cheapsummerholidays/img/facebook-square.svg" alt=""></a>
        <a href="#"><img class="twitter" src="/wp-content/themes/cheapsummerholidays/img/twitter-square.svg" alt=""></a>
        <a href="#"><img class="linkedin" src="/wp-content/themes/cheapsummerholidays/img/linkedin.svg" alt=""></a>
        <a href="#"><img class="whatsapp" src="/wp-content/themes/cheapsummerholidays/img/whatsapp-square.svg" alt=""></a>
      </div>

      <div class="col-md-12 text-center recent">
        <h2>Recent Posts</h2>
        <div class="card-deck">

          <!-- Recent Post Loop -->
          <?php
          	$args = array( 'numberposts' => '3', 'post__not_in' => array( $post->ID ) );
          	$recent_posts = wp_get_recent_posts( $args );

          	foreach( $recent_posts as $recent ){
              $thumbnail = get_the_post_thumbnail( $recent["ID"] );
          		echo '<div class="card"><a href="' . get_permalink($recent["ID"]) . '">'. $thumbnail .'' .   $recent["post_title"].'</a> </div> ';
          	}
          	wp_reset_query();
          ?>
          <!-- / Recent Post Loop -->

        </div>  <!-- /Card-deck -->
      </div>    <!-- /Recent -->
    </div>      <!-- /.row -->
  </div>        <!-- /.container -->



</section>

<script>

var currentPage = window.location.href;

jQuery(window).scroll(function(){
    if(jQuery(document).scrollTop() > 50){
      jQuery(".social-icons").animate({opacity: "1"});
      jQuery('.facebook').on('click', function(){
        window.location.href = "https://www.facebook.com/sharer/sharer.php?u=" + currentPage;
      });
      jQuery('.twitter').on('click', function(){
        window.location.href = "https://twitter.com/home?status=Check%20out%20this%20blog%20post%20" + currentPage;
      });
      jQuery('.linkedin').on('click', function(){

        window.location.href = "https://www.linkedin.com/shareArticle?mini=true&url=" + currentPage.slice(0,-1) + '&title=Cheap%20Summer%20Holidays%20Blog&summary=Check%20out%20this%20post&source=CheapSummerHolidays';
      });
      jQuery('.whatsapp').on('click', function(){
        window.location.href = "https://wa.me/?text=Check%20out%20this%20blog%20post" + "%20" + currentPage;
      });
    };
  });


  function updateProgress(num1, num2){
    var percent = Math.ceil( num1 / num2 * 100 ) + '%';
    document.getElementById('progress').style.width = percent;
  }

  window.addEventListener('scroll', function(){
    var top = window.scrollY;
    var height = document.body.getBoundingClientRect().height - window.innerHeight;
    updateProgress(top, height);
  });

</script>

<?php get_footer(); ?>
