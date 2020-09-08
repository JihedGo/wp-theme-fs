<?php

// for the home page
get_header(); // function automatically know to grab a file header.php
?>
<div class="page-wrap">
    <div class="container">
        <h1><?= single_cat_title(); ?> </h1>
        <?php get_template_part('includes/section', 'archive'); // to separte logic and to keep anything organise 
        ?>
        <?php previous_posts_link(); ?>
        <?php next_posts_link(); ?>
    </div>
</div>
<?php get_footer(); ?>