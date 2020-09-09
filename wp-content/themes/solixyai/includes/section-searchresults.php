<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="card mb-3">
            <div class="card-body d-flex justify-content-center align-items-center">
                <?php if (has_post_thumbnail()) : ?>
                    <img class="img-fluid img-thumbnail mb-3 mr-3" src="<?php the_post_thumbnail_url('blog-small'); ?>" alt="<?php the_title() ?>">
                <?php endif; ?>
                <div class="blog-content ">
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); // t9asser blog 
                    ?>
                    <a class="btn btn-success" href="<?php the_permalink() ?>">read more</a>
                </div>

            </div>
        </div>
    <?php endwhile;
else : ?>
    There are no results for your search query <?php get_search_query(); ?>
<?php endif; ?>