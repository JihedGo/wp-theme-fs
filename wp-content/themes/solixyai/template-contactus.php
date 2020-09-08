<?php

/*
        Template Name: Contact Us
    */
?>
<?php

// for the home page
get_header(); // function automatically know to grab a file header.php
?>
<div class="container">
    <h1><?php the_title(); ?></h1>
    <div class="row">
        <div class="col-lg-6">
            This is where the contact form goes
        </div>
        <div class="col-lg-6">

            <?php get_template_part('includes/section', 'content'); // to separte logic and to keep anything organise 
            ?>
        </div>
    </div>

</div>
<?php get_footer(); ?>