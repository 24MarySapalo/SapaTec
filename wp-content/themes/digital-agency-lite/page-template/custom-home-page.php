<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); 

if( get_theme_mod('digital_agency_lite_second_color')){
    $digital_agency_lite_about_back1=get_theme_mod('digital_agency_lite_second_color');
  }else{
    $digital_agency_lite_about_back1="#f8d698";
  }
  if( get_theme_mod('digital_agency_lite_fourth_color')){
    $digital_agency_lite_about_back2=get_theme_mod('digital_agency_lite_fourth_color');
  }else{
    $digital_agency_lite_about_back2="#f5af78";
  }
?>

<main id="maincontent" role="main">
  
  <?php do_action( 'digital_agency_lite_before_slider' ); ?>

  <?php if( get_theme_mod( 'digital_agency_lite_slider_arrows', false) != '' || get_theme_mod( 'digital_agency_lite_resp_slider_hide_show', false) != '') { ?>
  <svg class="top_svg" viewBox="0 0 400 400">
    <defs>
      <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
        <stop offset="0%" style="stop-color:<?php echo esc_html($digital_agency_lite_about_back1); ?>;stop-opacity:1"></stop>
        <stop offset="100%" style="stop-color:<?php echo esc_html($digital_agency_lite_about_back2); ?>;stop-opacity:1"></stop>
      </linearGradient>
    </defs>
    <path fill="url(#grad1)" d="M0 0 L403,0 L402,120 C250,250 90,120 0,280 L0,0"></path>
  </svg>

  <section id="slider">
    <?php if(get_theme_mod('digital_agency_lite_slider_type', 'Default slider') == 'Default slider' ){ ?>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'digital_agency_lite_slider_speed',4000)) ?>"> 
      <?php $digital_agency_lite_pages = array();
        for ( $count = 1; $count <= 3; $count++ ) {
          $mod = intval( get_theme_mod( 'digital_agency_lite_slider_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $digital_agency_lite_pages[] = $mod;
          }
        }
        if( !empty($digital_agency_lite_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $digital_agency_lite_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>     
      <div class="carousel-inner" role="listbox">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <div class="container">
              <div class="row">
                <div class="col-lg-7 col-md-7">
                  <div class="carousel-caption">
                    <h1 class="wow slideInDown delay-1000" data-wow-duration="3s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <?php if( get_theme_mod('digital_agency_lite_slider_content_hide_show',true) != ''){ ?>
                      <p class="wow slideInDown delay-1000" data-wow-duration="3s"><?php $digital_agency_lite_excerpt = get_the_excerpt(); echo esc_html( digital_agency_lite_string_limit_words( $digital_agency_lite_excerpt, esc_attr(get_theme_mod('digital_agency_lite_slider_excerpt_number','20')))); ?></p>
                    <?php } ?>
                    <?php if( get_theme_mod('digital_agency_lite_slider_button_text','READ MORE') != ''){ ?>
                      <div class="more-btn wow slideInRight delay-1000" data-wow-duration="3s">
                        <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('digital_agency_lite_slider_button_text',__('READ MORE','digital-agency-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('digital_agency_lite_slider_button_text',__('READ MORE','digital-agency-lite')));?></span></a>
                      </div>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-lg-5 col-md-5">
                  <div class="slider-img">
                    <?php if(has_post_thumbnail()){
                      the_post_thumbnail();
                    } else{?>
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner-circle.png" alt="" />
                    <?php } ?>
                  </div>
                </div>
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
      <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
        <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Previous','digital-agency-lite' );?></span>
      </a>
      <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
        <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Next','digital-agency-lite' );?></span>
      </a>
    </div>
    <div class="clearfix"></div>
        <?php } else if(get_theme_mod('digital_agency_lite_slider_type', 'Advance slider') == 'Advance slider'){?>
          <?php echo do_shortcode(get_theme_mod('digital_agency_lite_advance_slider_shortcode')); ?>
        <?php } ?>
  </section>
  <?php } ?>

  <?php do_action( 'digital_agency_lite_after_slider' ); ?>

  <?php if( get_theme_mod('digital_agency_lite_services_category') != '' ){ ?>

  <section id="digital-services" class="wow zoomInDown delay-1000" data-wow-duration="1.5s">
    <div class="container">
      <div class="heading-text">
        <?php if( get_theme_mod( 'digital_agency_lite_section_title') != '') { ?>
          <h2><?php echo esc_html(get_theme_mod('digital_agency_lite_section_title',''));?></h2>
        <?php } ?>
        <?php if( get_theme_mod( 'digital_agency_lite_section_text') != '') { ?>
          <p class="sec-text"><?php echo esc_html(get_theme_mod('digital_agency_lite_section_text',''));?></p>
        <?php } ?>
      </div>
      <div class="row">
        <?php 
        $digital_agency_lite_catData=  get_theme_mod('digital_agency_lite_services_category');
          if($digital_agency_lite_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html( $digital_agency_lite_catData ,'digital-agency-lite')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="col-lg-4 col-md-4">
                  <div class="inner-box">
                    <?php the_post_thumbnail(); ?>
                    <h3><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                    <p><?php $digital_agency_lite_excerpt = get_the_excerpt(); echo esc_html( digital_agency_lite_string_limit_words( $digital_agency_lite_excerpt, esc_attr(get_theme_mod('digital_agency_lite_services_excerpt_number','20')))); ?></p>
                  </div>
                </div>
              <?php endwhile;
            wp_reset_postdata();
          } ?>
      </div>
    </div>
  </section>

  <?php }?>

  <?php do_action( 'digital_agency_lite_after_service' ); ?>

  <div id="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>

</main>

<?php get_footer(); ?>