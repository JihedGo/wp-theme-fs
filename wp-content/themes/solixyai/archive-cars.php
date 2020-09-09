<?php

// for the home page
get_header(); // function automatically know to grab a file header.php
?>
<section class="page-wrap">
    <div class="container">
        <section class="row">
            <div class="col-lg-3">
                <?php if (is_active_sidebar('blog-sidebar')) : ?>
                    <?php dynamic_sidebar('blog-sidebar'); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-9">
                <?php get_template_part('includes/section', 'archive'); // to separte logic and to keep anything organise 
                ?>
                <?php previous_posts_link(); ?>
                <?php next_posts_link(); ?>
            </div>
        </section>
    </div>
</section>
<?php get_footer(); ?>