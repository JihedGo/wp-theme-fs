<?php

// for the home page
get_header(); // function automatically know to grab a file header.php
?>
<div class="page-wrap">
    <div class="container">
        <?php if (has_post_thumbnail()) : ?>
            <img class="img-fluid img-thumbnail mb-3" src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title() ?>">
        <?php endif; ?>
        <h1><?php the_title(); ?></h1>
        <?php get_template_part('includes/section', 'blogcontent'); // to separte logic and to keep anything organise 
        ?>

        <?php wp_link_pages(); ?>
    </div>
</div>
<?php get_footer(); ?>