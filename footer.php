<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="site-info">
        <div class="bloc-copyright">
            <p class="copyright-footer1"><?php the_field( 'copyright-footer1','option');?></p>
            <p class="copyright-footer"><?php the_field( 'copyright-footer','option');?></p>
            <?php if ( has_nav_menu( 'footer' ) ) : ?>
                <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'twentynineteen' ); ?>">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-menu',
                            'depth'          => 1,
                        )
                    );
                    ?>
                </nav><!-- .footer-navigation -->
            <?php endif; ?>
        </div>

        <div class="bloc-rs">
            <?php if( have_rows('logos-rs-footer','option') ): ?>
                <div class="repeteur-logos-rs">
                    <?php while( have_rows('logos-rs-footer','option') ): the_row();?>
                        <div>
                            <a href="<?php the_sub_field( 'lien-rs-footer','option');?>">
                                <?php
                                $image = get_sub_field('logo-rs-footer','option');
                                ?>
                                <?php echo wp_get_attachment_image( $image, 'full'); ?>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

    </div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
