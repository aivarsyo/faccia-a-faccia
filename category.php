<?php

get_header();

?>

<a class="section__text">
    <h1></h1>
    <h2></h2>
</a>

<img class="arrow_icon" src="<?php the_field("arrow_icon") ?>" alt="">

<div id="fullpage">



    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <div class="section" data-title="<?php echo get_the_title(); ?>" data-client="<?php the_field("client") ?>" data-link="<?php echo get_permalink(); ?>" style="background-image: url(<?php the_post_thumbnail_url('thumbnail'); ?>)">

                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full'); ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/placeholder.jpeg" alt="placeholder" />
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif;
    wp_reset_postdata(); ?>

    <div class="section footer" data-title="" data-client="">

        <img class="animation-gif" src="<?php the_field('faccia_animation_gif', 'option') ?>" alt="animation">

        <h5><?php the_field("copyright_notice", "option") ?> <?php echo comicpress_copyright(); ?></h5>

    </div>

</div>



<?php

get_footer('home');

?>