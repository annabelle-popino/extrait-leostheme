<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentynineteen' ); ?></a>

    <header id="masthead" class="<?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">

        <div class="site-branding-container">
            <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
        </div><!-- .site-branding-container -->

        <?php if ( is_singular() && twentynineteen_can_show_post_thumbnail() ) : ?>
            <div class="site-featured-image">
                <?php

                $classes = 'entry-header';
                if ( ! empty( $discussion ) && absint( $discussion->responses ) > 0 ) {
                    $classes = 'entry-header has-discussion';
                }
                ?>

                <?php rewind_posts(); ?>
            </div>
        <?php endif; ?>
    </header><!-- #masthead -->

    <div id="content" class="site-content">