<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Digital Agency Lite
 */

get_header(); ?>

<?php do_action( 'digital_agency_lite_page_top' ); ?>

<main id="maincontent" class="middle-align" role="main"> 
    <div class="container">
        <?php $digital_agency_lite_theme_lay = get_theme_mod( 'digital_agency_lite_page_layout','One Column');
            if($digital_agency_lite_theme_lay == 'One Column'){ ?>
                <?php if(get_theme_mod('digital_agency_lite_single_page_breadcrumb',true) != ''){ ?>
                    <div class="bradcrumbs">
                        <?php digital_agency_lite_the_breadcrumb(); ?>
                    </div>
                <?php }?>
                <?php while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content-page'); 
                endwhile; ?>
        <?php }else if($digital_agency_lite_theme_lay == 'Right Sidebar'){ ?>
            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <?php if(get_theme_mod('digital_agency_lite_single_page_breadcrumb',true) != ''){ ?>
                        <div class="bradcrumbs">
                            <?php digital_agency_lite_the_breadcrumb(); ?>
                        </div>
                    <?php }?>
                    <?php while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content-page'); 
                    endwhile; ?>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
            </div>
        <?php }else if($digital_agency_lite_theme_lay == 'Left Sidebar'){ ?>
            <div class="row">
                <div id="sidebar" class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
                <div class="col-lg-9 col-md-9">
                    <?php if(get_theme_mod('digital_agency_lite_single_page_breadcrumb',true) != ''){ ?>
                        <div class="bradcrumbs">
                            <?php digital_agency_lite_the_breadcrumb(); ?>
                        </div>
                    <?php }?>
                    <?php while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content-page'); 
                    endwhile; ?>
                </div>
            </div>
        <?php }else {?>
            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <?php if(get_theme_mod('digital_agency_lite_single_page_breadcrumb',true) != ''){ ?>
                        <div class="bradcrumbs">
                            <?php digital_agency_lite_the_breadcrumb(); ?>
                        </div>
                    <?php }?>
                    <?php while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content-page'); 
                    endwhile; ?>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
            </div>
        <?php } ?>
    </div>
</main>

<?php do_action( 'digital_agency_lite_page_bottom' ); ?>

<?php get_footer(); ?>