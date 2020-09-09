<?php

// for the home page
get_header(); // function automatically know to grab a file header.php
//get_header('secondary'); // if i have another header
?>
<section class="page-wrap">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php get_template_part('includes/section', 'content'); // to separte logic and to keep anything organise 
        ?>
        <?php get_search_form(); ?>
    </div>
    <?php get_footer(); ?>
</section>