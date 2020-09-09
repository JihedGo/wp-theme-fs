<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php the_content(); ?>

        <?php
        $tags = get_the_tags();
        if ($tags) :
            foreach ($tags as $tag) :
        ?>
                <a class="badge badge-success" href="<?= get_tag_link($tag->term_id); ?>"><?= $tag->name ?></a>
        <?php endforeach;
        endif
        ?>


        <?php
        $categories = get_the_category();
        foreach ($categories as $cat) : ?>
            <a href="<?= get_category_link($cat->term_id) ?>"><?= $cat->name ?></a>
        <?php endforeach; ?>
        <?= get_the_date('d-m-Y H:i'); ?>
        <?php //comments_template(); 
        ?>


<?php endwhile;
else : endif; ?>