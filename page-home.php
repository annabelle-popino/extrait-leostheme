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

    <section class="section-slider motion text-appear-fadein">
        <button id="play-button" data-id="video1" class="pause transition-fineart"><h3>Fine ARt</h3></button>
        <button id="play-button" data-id="video1" class="play transition-fineart opacity"><h3>Fine Art</h3></button>
        <div class="fineart">
            <div class="bloc-white-moody"></div>
            <div class="background-fineart"></div>

            <iframe class="id-frame-home" id="video1" src="https://player.vimeo.com/video/<?php the_field( 'video_fine_art');?>?api=1&player_id=video1&autoplay=1&muted=1&loop=1" frameborder="0" allow="autoplay"></iframe>

            <div class="infos-slider-black">
                <?php
                $image = get_field('logo-slider-black');
                $size = 'custom-logo-slider'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                };?>
                <div>
                    <a class="link-fineart" href="http://localhost:8888/leonardovilliger/fine-art/">Entrez dans l'univers Fine art</a>
                </div>
                <a href="#home" class="scroll link"><img class="mouse-moody" src="http://localhost:8888/leonardovilliger/wp-content/uploads/2020/07/mouse-scroll-noir.png"></a>
            </div>
        </div>

        <div class="moody">
            <div class="bloc-white"></div>
            <div class="background-moody"></div>
            <iframe class="videomoody id-frame-home" id="video2" width="420" height="315" src="https://player.vimeo.com/video/<?php the_field( 'video_moody');?>?api=1&player_id=video2&loop=1" frameborder="0" allow="autoplay"></iframe>
            <button id="play-button" data-id="video2" class="play2 transition-moody "><h3 class="transi-button-play">Moody</h3></button>
            <div class="infos-slider ">
                <?php
                $image = get_field('logo-slider');
                $size = 'custom-logo-slider'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                };?>
                <div>
                    <a class="link-moody" href="http://localhost:8888/leonardovilliger/moody/">Entrez dans l'univers Moody</a>
                </div>
                <a href="#home" class="scroll link">
                    <img class="mouse-moody" src="http://localhost:8888/leonardovilliger/wp-content/uploads/2020/08/mouse-scroll-blanc.png"></a>
            </div>
        </div>
    </section>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <section class="section-apropos motion text-appear-bottom" section-id="home">
                <div>
                    <?php
                    $image = get_field('image-apropos');
                    $size = 'custom-apropos'; // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                    };?>
                </div>
                <div class="content-presentation">
                    <h3><?php the_field( 'titre-apropos');?></h3>
                    <p><?php the_field( 'texte-apropos');?></p>
                </div>
            </section>

            <section class="section-equipe motion text-appear-bottom" style="background-image:url('<?php the_field('image-background-equipe'); ?>');">
                <div class="back-blue">
                    <div class="equipe-container">
                        <div class="equipe-intro">
                            <h3 class="color-white aligncenter"><?php the_field( 'titre-equipe');?></h3>
                            <p class="text-content aligncenter color-white"><?php the_field( 'intro-equipe');?></p>
                        </div>
                        <div class="equipe-repeteur">
                            <?php if( have_rows('membres_equipe') ): ?>
                                <div class="equipe-membres">
                                    <?php while( have_rows('membres_equipe') ): the_row();
                                        $image = get_sub_field('photo-membre-equipe');
                                        ?>
                                        <article class="article-membre">
                                            <div class="bloc-membre aligncenter">
                                                <?php echo wp_get_attachment_image( $image, 'custom-membre' ); ?>
                                                <p class="text-content-membre aligncenter color-white"><?php the_sub_field('presentation-membre-equipe'); ?></p>
                                                <div class="bloc-blue"></div>
                                            </div>
                                            <p class="title-dore aligncenter color-white"><?php the_sub_field('prenom-membre-equipe'); ?></p>
                                            <p class="text-content-bold aligncenter color-white"><?php the_sub_field('metier-membre-equipe'); ?></p>
                                        </article>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-avis motion text-appear-bottom">
                <h3 class="aligncenter">Témoignages</h3>

                <div id="slider">

                    <p class="control_next">Témoignage suivant <img src="http://localhost:8888/leonardovilliger/wp-content/uploads/2020/08/fleche-2-1.png"></p>
                    <p class="control_prev"><img src="http://localhost:8888/leonardovilliger/wp-content/uploads/2020/08/fleche-2.png"> Témoignage précédent</p>
                    <?php
                    $args = array(
                        'post_type' => 'temoignages',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'ASC'
                    );
                    query_posts($args);?>
                    <ul>
                        <?php while (have_posts()) : the_post();
                            ?>

                            <li>
                                <div class="text-slide">
                                    <h4><?php the_title(); ?></h4>
                                    <?php the_content(); ?>
                                </div>
                                <div class="list-background-white"></div>
                                <div class="list-background-moody" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');"></div>
                            </li>
                        <?php endwhile; wp_reset_query(); ?>
                    </ul>
            </section>

            <section class="section-medias">
                <h3 class="aligncenter color-white motion text-appear-bottom"><?php the_field( 'titre-publie');?></h3>

                <div class="medias-repeteur motion text-appear-bottom">
                    <?php if( have_rows('logos-publie') ): ?>
                        <div class="repeteur-logos">
                            <?php while( have_rows('logos-publie') ): the_row();?>
                            <div>
                                <a href="<?php the_sub_field( 'lien_logo-publie');?>">
                                <?php
                                $image = get_sub_field('image-logos-publie');
                                ?>
                                <?php echo wp_get_attachment_image( $image, 'full'); ?>
                                </a>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
