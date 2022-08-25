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
        <div class="img-background" style="background-image: url('<?php the_field( 'background_image');?>');">
            <div class="logo-page motion text-appear-fadein2">
                <?php
                $image = get_field('logo_page');
                $size = 'custom-logo-slider'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                }
                ?>
            </div>
            <div class="text-chapeau-page motion text-appear-fadein2">
                <h3><?php the_title();?></h3>
                <p><?php the_field( 'texte_introduction');?></p>
                <a href="#fineart" class="scroll link"><img class="mouse-moody" src="http://localhost:8888/leonardovilliger/wp-content/uploads/2020/07/mouse-scroll-noir.png"></a>
            </div>
        </div>
    </div>

    <div>
        <div class="yt-general motion text-appear-bottom" section-id="fineart">
            <div class="yt-cargador">
                <div id="yt-video" class="yt-video">
                    <?php
                    $args = array(
                        'post_type' => 'videos',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'category_name' => 'fine-art',
                    );
                    query_posts($args);

                    while (have_posts()) : the_post();
                        ?>
                        <?php
                        if( get_field('video_en_une') ) {?>
                            <iframe id="id-frame" width="420" height="315" src="https://player.vimeo.com/video/<?php the_field( 'id_vimeo');?>?title=0&byline=0&portrait=0&loop=1" frameborder="0" allow="autoplay"></iframe>
                            <div class="infos-video-une">
                                <h4><?php the_field( 'titre_video');?></h4>
                                <p><?php the_field( 'texte_de_la_video');?></p>
                            </div>
                        <?php } ?>

                    <?php endwhile; wp_reset_query(); ?>
                </div>

                <div class="yt-miniaturas motion text-appear-bottom">

                    <?php
                    $args = array(
                        'post_type' => 'videos',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'category_name' => 'fine-art',
                    );
                    query_posts($args);

                    while (have_posts()) : the_post();
                        ?>

                        <a href="javascript:chargerVideo('id-frame', '<?php the_field( 'id_vimeo');?>?autoplay=1&title=0&byline=0&portrait=0&loop=1&transparent=1');">
                            <img class="icon-video-hover" src="http://localhost:8888/leonardovilliger/wp-content/uploads/2020/08/picto.png">
                            <?php
                            $image = get_field('image_video');
                            $size = 'custom-video'; // (thumbnail, medium, large, full or custom size)
                            if( $image ) {
                                echo wp_get_attachment_image( $image, $size );
                            }
                            ?>
                            <div>
                                <h4><?php the_field( 'titre_video');?></h4>
                                <p class="text-video"><?php the_field( 'texte_de_la_video');?></p>
                            </div>
                        </a>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </div>

    <section class="row-button-contact aligncenter" style="background-image: url('<?php the_field( 'background_bouton_contact');?>');">
        <a class="button-contact" href="mailto:<?php the_field( 'mail_contact');?>">Me contacter</a>
        <div class="bloc-dore"></div>
    </section>

    <section class="section-galerie-white ">
        <h3 class="aligncenter motion text-appear-bottom">Galerie photos</h3>

        <div class="galerie-size motion text-appear-bottom">

            <?php echo do_shortcode('[modula id="346"]'); ?>

        </div>

        <div class="button-toggle motion text-appear-bottom">
          <?php echo do_shortcode('[modula-link id="346"]Voir plus de photos[/modula-link]'); ?>
        </div>
    </section>

    <section class="section-avis">
        <h3 class="aligncenter">Témoignages</h3>

        <div id="slider">

            <p class="control_next">Témoignage suivant <img src="http://localhost:8888/leonardovilliger/wp-content/uploads/2020/08/fleche-2-1.png"></p>
            <p class="control_prev"><img src="http://localhost:8888/leonardovilliger/wp-content/uploads/2020/08/fleche-2.png"> Témoignage précédent</p>
            <?php
            $args = array(
                'post_type' => 'temoignages',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'category_name' => 'fine-art',
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

    <section class="section-insta-white motion text-appear-bottom">
        <h3 class="aligncenter">Instagram</h3>
        <a class="insta-fineart" href="https://www.instagram.com/leonardovilliger.fineart/">@leonardovilliger.Fineart
        </a>
        <div class="insta-feed-moody">
            <?php echo do_shortcode('[instagram-feed user="leonardovilliger.fineart"]'); ?>
        </div>
    </section>

    </div><!-- #primary -->

<?php
get_footer();
