<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_theme_mod('organic_farm_slider_arrows') != ''){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php
          for ( $i = 1; $i <= 4; $i++ ) {
            $mod =  get_theme_mod( 'organic_farm_post_setting' . $i );
            if ( 'page-none-selected' != $mod ) {
              $organic_farm_slide_post[] = $mod;
            }
          }
           if( !empty($organic_farm_slide_post) ) :
          $args = array(
            'post_type' =>array('post','page'),
            'post__in' => $organic_farm_slide_post
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
            <div class="carousel-caption">
              <h2><?php the_title();?></h2>
              <p class="mb-0"><?php $excerpt = get_the_excerpt(); echo esc_html( organic_farm_string_limit_words( $excerpt, 25 )); ?></p>
              <div class="home-btn my-4">
                <a class="py-3 px-4" href="<?php the_permalink(); ?>"><?php echo esc_html('Read More','solar-renewable-energy'); ?></a>
              </div>
            </div>
          </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon p-3" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon p-3" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <section id="middle-sec">
    <div class="container">
      <div class="row">
        <?php
          for ( $organic_farm_s = 1; $organic_farm_s <= 3; $organic_farm_s++ ) {
            $organic_farm_mod =  get_theme_mod( 'organic_farm_middle_sec_settigs' . $organic_farm_s );
            if ( 'page-none-selected' != $organic_farm_mod ) {
              $organic_farm_post[] = $organic_farm_mod;
            }
          }
           if( !empty($organic_farm_post) ) :
          $organic_farm_args = array(
            'post_type' =>array('post','page'),
            'post__in' => $organic_farm_post
          );
          $organic_farm_query = new WP_Query( $organic_farm_args );
          if ( $organic_farm_query->have_posts() ) :
            $organic_farm_s = 1;
        ?>
        <?php  while ( $organic_farm_query->have_posts() ) : $organic_farm_query->the_post(); ?>
          <div class="col-lg-4 col-md-4">
            <div class="inner-box p-3 text-center text-md-left text-lg-left">
              <div class="row">
                <div class="col-lg-4 col-md-12 align-self-center">
                  <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
                </div>
                <div class="col-lg-8 col-md-12 pl-lg-0 align-self-center">
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                  <p class="mb-0"><?php $excerpt = get_the_excerpt(); echo esc_html( organic_farm_string_limit_words( $excerpt, 8 )); ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php $organic_farm_s++; endwhile;
        wp_reset_postdata();?>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
      </div>
    </div>
  </section>

  <section id="home-mission" class="py-5">
    <div class="container">
      <?php if( get_theme_mod('solar_renewable_energy_grocery_cate_title') != '' ){ ?>
        <h3 class="text-center mb-5"><?php echo esc_html(get_theme_mod('solar_renewable_energy_grocery_cate_title','')); ?></h3>
      <?php }?>
      
      <?php $solar_renewable_energy_catData1 =  get_theme_mod('solar_renewable_energy_category_setting');
        if($solar_renewable_energy_catData1){ 
          $args = array(
        'post_type' => 'post',
        'category_name' => esc_html($solar_renewable_energy_catData1 ,'solar-renewable-energy'),
        'post_per_page' => get_theme_mod('solar_renewable_energy_category_number')
          ); ?>
        <div class="row">
          <?php $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
          while( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-lg-6 col-md-12 col-sm-12">
              <div class="cat-box mb-4">
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="cat-img">
                      <?php the_post_thumbnail(); ?>
                    </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-7 align-self-center">
                    <div class="cat-content">
                      <h4><?php the_title(); ?></h4>
                      <p class="mb-0"><?php $excerpt = get_the_excerpt(); echo esc_html( organic_farm_string_limit_words( $excerpt, 15 )); ?></p>
                      <a class="" href="<?php the_permalink(); ?>"><?php echo esc_html('Read More','solar-renewable-energy'); ?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php $i++; endwhile; 
            wp_reset_postdata(); ?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif; ?>
        </div>
      <?php }?>
    </div>
  </section>
</main>

<?php get_footer(); ?>