<?php

// for the home page
get_header(); // function automatically know to grab a file header.php
?>
<section class="page-wrap">
    <div class="container">
        <section class="row">
            <div class="col-lg-3">
                <?php if (is_active_sidebar('page-sidebar')) : ?>
                    <?php dynamic_sidebar('page-sidebar'); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-9">
                <h1><?php the_title(); ?></h1>
                <?php if (has_post_thumbnail()) : ?>
                    <img class="img-fluid img-thumbnail mb-3 mr-3" src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title() ?>">
                <?php endif; ?>
                <?php get_template_part('includes/section', 'content'); // to separte logic and to keep anything organise 
                ?>
            </div>
        </section>

    </div>
</section>
<?php get_footer(); ?>