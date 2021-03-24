<?php
get_header();
?>

<!--page.php-->

<main>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile; ?>

    <?php endif; ?>

</main>

<?php get_footer(); ?>
