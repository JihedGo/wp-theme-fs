<?php

// for the home page
get_header(); // function automatically know to grab a file header.php
?>
<div class="page-wrap">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php if (has_post_thumbnail()) : ?>
            <div class="gallery">
                <a href="<?php the_post_thumbnail_url('blog-large'); ?>"><img class="img-fluid img-thumbnail mb-3" src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title() ?>">
                </a>
            </div>
        <?php endif; ?>
        <?php $gallery = get_field('gallery');
        if ($gallery) :
        ?> <div class="gallery mb-5">
                <?php
                foreach ($gallery as $image) :
                ?>
                    <a href="<?= $image['sizes']['blog-large'] ?>">
                        <img src="<?= $image['sizes']['blog-small'] ?>" class="img-fluid img-thumbnail" />
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-6">
                <?php get_template_part('includes/section', 'cars'); // to separte logic and to keep anything organise 
                ?>

                <?php wp_link_pages(); ?>
            </div>
            <div class="col-lg-6">

                <?php get_template_part('includes/form', 'enquiry'); ?>
                <ul>
                    <?php
                    /*<li>Color : <?php echo get_post_meta($post->ID, 'Color', true/*string ) </li>
                     //if (get_post_meta($post->ID, 'Registration', true)) : ?>
                        <li>Registration : <?php echo get_post_meta($post->ID, 'Registration') </li>
                     endif;*/
                    ?>

                    <li>Colour : <?php the_field('colour'); ?></li>
                    <li>Registration: <?php the_field('registration'); ?></li>
                </ul>
                <h3>Features</h3>
                <ul>
                    <?php if (have_rows('features')) : ?>
                        <?php while (have_rows('features')) : the_row(); ?>
                            <li><?php echo get_sub_field('feature'); ?></li>
                        <?php endwhile; ?>
                    <?php endif ?>
                </ul>

                <!--<?php $gallery = get_field('gallery');
                    if ($gallery) :
                    ?> <div class="gallery">
                        <?php
                        foreach ($gallery as $image) :
                        ?>
                            <a href="<?= $image['sizes']['blog-large'] ?>">
                                <img src="<?= $image['sizes']['blog-small'] ?>" class="img-float" />
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>-->

            </div>
        </div>

    </div>
</div>
<?php get_footer(); ?>