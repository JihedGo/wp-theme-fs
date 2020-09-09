<?php

// for the home page
get_header(); // function automatically know to grab a file header.php
?>
<section class="page-wrap">
    <div class="container">
        <section class="row">

            <h3>Search Results: <?= get_search_query(); ?></h3>
            <?php get_template_part('includes/section', 'searchresults'); // to separte logic and to keep anything organise 
            ?>
            <?php previous_posts_link(); ?>
            <?php next_posts_link(); ?>

        </section>
    </div>
</section>
<?php get_footer(); ?>