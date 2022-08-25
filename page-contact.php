<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

    <div class="section-intro">
        <div class="img-background-contact" style="background-image: url('<?php the_field( 'background_contact');?>');">
            <div class="text-chapeau-page">
                <h3><?php the_title();?></h3>
                <p><?php the_field( 'texte_introduction_contact');?></p>
            </div>
        </div>
    </div>

    <section class="section-contact">
        <div class="contact-tel">
            <h4><?php the_field( 'titre-tel');?></h4>
            <p class="tel"><?php the_field( 'telephone_contact');?></p>
        </div>
        <div class="contact-reseaux">
            <h4><?php the_field( 'titre-contact-rs');?></h4>
            <div class="logo-contact-rs">
                <a href="<?php the_field( 'lien_logo_1');?>"><img src="<?php the_field( 'logo-rs-contact1');?>"></a>
                <a href="<?php the_field( 'lien_logo_2');?>"><img src="<?php the_field( 'logo-rs-contact2');?>"></a>
                <a href="<?php the_field( 'lien_logo_3');?>"><img src="<?php the_field( 'logo-rs-contact3');?>"></a>
            </div>
        </div>
    </section>

    <section class="section-form-contact">
        <h4>Ou écrivez moi</h4>
        <div class="form-contact">
            <?php echo do_shortcode('[contact-form-7 id="269" title="Formulaire de contact 1"]'); ?>
        </div>
    </section>

    <section class="section-presta" style="background-image: url('<?php the_field( 'background_presta');?>');">
        <div class="background-blanc">
            <div class="bloc-presta">
                <?php
                $image = get_field('image_de_la_prestation1');
                $size = 'custom-presta'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                };?>
                <p class="title-presta"><?php the_field( 'nom_de_la_prestation1');?></p>
                <p class="price-presta"><?php the_field( 'prix_de_la_prestation');?></p>
                <p class="list-presta"><?php the_field( 'details_de_la_prestation');?></p>
            </div>
            <div class="bloc-presta">
                <?php
                $image = get_field('image_de_la_prestation2');
                $size = 'custom-presta'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                };?>
                <p class="title-presta"><?php the_field( 'nom_de_la_prestation2');?></p>
                <p class="price-presta"><?php the_field( 'prix_de_la_prestation2');?></p>
                <p class="list-presta"><?php the_field( 'details_de_la_prestation2');?></p>
            </div>
            <div class="bloc-presta">
                <?php
                $image = get_field('image_de_la_prestation3');
                $size = 'custom-presta'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                };?>
                <p class="title-presta"><?php the_field( 'nom_de_la_prestation3');?></p>
                <p class="price-presta"><?php the_field( 'prix_de_la_prestation3');?></p>
                <p class="list-presta"><?php the_field( 'details_de_la_prestation3');?></p>
            </div>
        </div>
    </section>

<?php
get_footer();
