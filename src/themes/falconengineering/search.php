<?php
get_header();
?>
<main class="my-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <?php if (have_posts()) :
                $postCount = 0; ?>

                <?php /* Start the Loop */
                global $query_string;
                $s = str_replace("s=", "", $query_string); ?>

                <?php while (have_posts()) : the_post();
                    $postCount++;
                    global $post;
                    if ($postCount == 1) {
                        $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-portrait-feature');
                        ?>
                        <article class="feature">
                            <h2 class="h3 mb-150">Search results for "<?= $s ?>"</h2>
                        </article>
                    <?php } ?>
                    <article class="search-result">
                        <h3 class="h4"><a href="<?php the_permalink() ?>" class="text-body"><?php the_title(); ?></a>
                        </h3>
                        <a href="<?php the_permalink() ?>" class="text-body"><?php the_excerpt(); ?></a>
                    </article>
                <?php endwhile; ?>
            </div> <!-- end other-posts -->
            <?php else: ?>

                    <h3>Sorry, there were no results</h3>
                    <p class="small mb-0">Your search for "<?= $s ?>" returned no results. Please try searching for
                        something else.</p>
            <?php endif; ?>
        </div><!-- col -->
    </div><!-- row -->
    </div><!-- container -->
</main>
<?php get_footer(); ?>
