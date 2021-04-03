<?php
get_header();
?>

<!--page.php-->

<main class="my-3">

    <?php if (get_field('page_intro')): ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="lead text-center mb-2">
                        <?php the_field('page_intro'); ?>
                    </div><!-- lead -->
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    <?php endif; ?>

    <?php if (is_page([36])) : ?>

        <?php if (have_rows('breakdown_blocks')): ?>
            <div class="container">
                <div class="row">
                    <?php $counter = 0; while (have_rows('breakdown_blocks')) : the_row(); ?>
                        <?php if ($counter == 0) {
                            $durationDelay = 600;
                        } elseif ($counter == 1) {
                            $durationDelay = 1000;
                        } elseif ($counter == 2) {
                            $durationDelay = 1400;
                        }
                        ?>
                        <div class="col-12 col-lg" data-aos="fade-up" data-aos-duration="<?php echo $durationDelay; ?>">

                            <div class="breakdown-blocks mb-75 mb-lg-0">
                                <div class="bg-secondary py-50 px-75">
                                    <h3 class="h4 semi-bold text-white mb-0"><?php the_sub_field('block_title'); ?></h3>
                                </div>
                                <div class="px-75 pt-50 pb-75">
                                    <?php the_sub_field('block_text'); ?>
                                </div>
                            </div>

                        </div><!-- col -->

                    <?php $counter++; endwhile; ?>
                </div><!-- row -->
            </div><!-- container -->
        <?php endif; ?>


        <?php if (have_rows('pingpongs')): ?>
            <?php while (have_rows('pingpongs')) : the_row(); ?>

                <?php
                $icon = get_sub_field('icon');
                $image = get_sub_field('image');
                ?>

                <div
                    class="my-lg-3 ping-bg <?php if (get_sub_field('position') == 'right'): ?>ping--right <?php else : ?>ping--left <?php endif; ?>d-flex"
                    style="background-image: url(<?php echo esc_url($image['url']); ?>);"
                    id="<?php the_sub_field('block_id'); ?>">
                    <div class="container px-50 px-xl-0 position-relative z-index-100">
                        <div class="row align-content-center h-100">
                            <div
                                class="col-lg-6 <?php if (get_sub_field('position') == 'right'): ?>ml-auto<?php endif; ?>">

                                <img src="<?php echo esc_url($image['url']); ?>"
                                     alt="<?php echo esc_url($image['alt']); ?>"
                                     class="d-block img-fluid d-lg-none mt-2">

                                <div class="ping-content" data-aos="<?php if (get_sub_field('position') == 'right'): ?>fade-left<?php else: ?>fade-right<?php endif; ?>" data-aos-duration="1000">
                                    <?php if (get_sub_field('icon')): ?>
                                        <img src="<?php echo esc_url($icon['url']); ?>"
                                             alt="<?php echo esc_url($icon['alt']); ?>"
                                             class="d-block mb-250 ping-icon--size">
                                    <?php endif; ?>

                                    <h2 class="h2 semi-bold"><?php the_sub_field('title'); ?></h2>

                                    <?php if (get_field('sub_title')): ?>
                                        <h3 class="h4 semi-bold"><?php the_sub_field('sub_title'); ?></h3>
                                    <?php endif; ?>

                                    <?php the_sub_field('content'); ?>

                                    <?php if (get_sub_field('collapsable_content_list')): ?>

                                        <?php if (have_rows('collapsable_content_list')): ?>
                                            <ul class="list-unstyled">
                                                <?php $counter = 0;
                                                while (have_rows('collapsable_content_list')) : the_row(); ?>
                                                    <li class="mb-0 pb-0">
                                                        <div class="border-bottom border-secondary px-75 py-50 collapse-trigger">
                                                            <a class="h4 semi-bold" data-toggle="collapse"
                                                               data-target="#collapse-<?php echo $counter ?>"
                                                               aria-expanded="false" aria-controls="collapseExample">
                                                            <span
                                                                class="d-flex justify-content-xs-between align-items-center">
                                                            <?php the_sub_field('title_tab'); ?>  <i
                                                                    class="fas fa-chevron-right pl-50"></i>
                                                            </span>

                                                            </a>
                                                        </div>
                                                        <div class="collapse panel-collapse" id="collapse-<?php echo $counter ?>">
                                                            <div class="card card-body border-0 rounded-0">
                                                                <?php the_sub_field('content_area'); ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php $counter++; endwhile; ?>
                                            </ul>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <?php if (get_sub_field('button_link')): ?>
                                        <a href="<?php the_field('button_link'); ?>"
                                           class="btn btn-primary"><?php the_field('button_label'); ?></a>
                                    <?php endif; ?>
                                </div><!-- ping-content -->

                            </div><!-- col -->
                        </div><!-- row -->
                    </div><!-- container-->
                </div><!-- ping-bg -->

            <?php endwhile; ?>
        <?php endif; ?>


    <?php elseif (is_page([40])) : ?>

        <?php if (have_rows('pingpongs')): ?>
            <?php while (have_rows('pingpongs')) : the_row(); ?>

                <?php
                $icon = get_sub_field('icon');
                $image = get_sub_field('image');
                ?>

                <div
                    class="my-lg-3 ping-bg <?php if (get_sub_field('position') == 'right'): ?>ping--right <?php else : ?>ping--left <?php endif; ?>d-flex"
                    style="background-image: url(<?php echo esc_url($image['url']); ?>);">
                    <div class="container px-50 px-xl-0 position-relative z-index-100">
                        <div class="row align-content-center h-100">
                            <div
                                class="col-lg-6 <?php if (get_sub_field('position') == 'right'): ?>ml-auto<?php endif; ?>">

                                <div class="ping-content" data-aos="<?php if (get_sub_field('position') == 'right'): ?>fade-left<?php else: ?>fade-right<?php endif; ?>" data-aos-duration="1000">

                                    <?php if (get_sub_field('icon')): ?>
                                        <img src="<?php echo esc_url($icon['url']); ?>"
                                             alt="<?php echo esc_url($icon['alt']); ?>"
                                             class="d-block mb-250 ping-icon--size">
                                    <?php endif; ?>

                                    <h2 class="h2 semi-bold"><?php the_sub_field('title'); ?></h2>

                                    <?php if (get_field('sub_title')): ?>
                                        <h3 class="h4 semi-bold"><?php the_sub_field('sub_title'); ?></h3>
                                    <?php endif; ?>

                                    <?php the_sub_field('content'); ?>

                                    <?php if (get_sub_field('collapsable_content_list')): ?>

                                        <?php if (have_rows('collapsable_content_list')): ?>
                                            <ul class="list-unstyled">
                                                <?php $counter = 0;
                                                while (have_rows('collapsable_content_list')) : the_row(); ?>
                                                    <li class="mb-0">
                                                        <div class="border-bottom border-secondary py-250">
                                                            <a class="h4 text-primary semi-bold " data-toggle="collapse"
                                                               data-target="#collapse-<?php echo $counter ?>"
                                                               aria-expanded="false" aria-controls="collapseExample">
                                                            <span
                                                                class="d-flex justify-content-xs-between align-items-center">
                                                            <?php the_sub_field('title_tab'); ?>  <i
                                                                    class="fas fa-chevron-right"></i>
                                                            </span>

                                                            </a>
                                                        </div>
                                                        <div class="collapse" id="collapse-<?php echo $counter ?>">
                                                            <div class="card card-body border-0 rounded-0">
                                                                <?php the_sub_field('content_area'); ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php $counter++; endwhile; ?>
                                            </ul>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <?php if (get_sub_field('button_link')): ?>
                                        <a href="<?php the_field('button_link'); ?>"
                                           class="btn btn-primary"><?php the_field('button_label'); ?></a>
                                    <?php endif; ?>
                                </div><!-- ping-content -->

                                <img src="<?php echo esc_url($image['url']); ?>"
                                     alt="<?php echo esc_url($image['alt']); ?>"
                                     class="d-block img-fluid d-lg-none mb-2">

                            </div><!-- col -->
                        </div><!-- row -->
                    </div><!-- container-->
                </div><!-- ping-bg -->

            <?php endwhile; ?>
        <?php endif; ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <?php if (have_posts()) : ?>

                            <?php while (have_posts()) : the_post(); ?>

                                <?php the_content(); ?>

                            <?php endwhile; ?>

                        <?php endif; ?>

                    </div><!-- col -->
                </div><!-- row -->

                <?php if (have_rows('team_members')): ?>

                    <div class="row">

                        <div class="col-12">
                            <h2 class="h1 semi-bold" data-aos="fade-up">Principals</h2>
                        </div>


                        <?php $count = 0;
                        while (have_rows('team_members')) : the_row();
                            $photo = get_sub_field('photo'); ?>

                            <div class="col-sm-6 col-xxxl-4" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1500">
                                <a data-toggle="modal" data-target="#modal-<?php echo $count; ?>">
                                    <div class="stacker stacker--team bg-info text-white position-relative"
                                         style="background-image: url(<?php echo esc_url($photo['url']); ?>); background-size: cover; background-position: center;">
                                        <div class="block__tint-overlay"></div>
                                        <div class="stacker-content position-relative z-index-100">
                                            <h2 class="stacker-title text-white"><?php the_sub_field('name'); ?></h2>
                                            <p>
                                                <?php the_sub_field('name'); ?><br>
                                                <?php the_sub_field('job_title'); ?>
                                            </p>
                                            <div class="btn btn-outline-light">Read Full Bio</div>
                                        </div><!-- stacker-content -->
                                    </div><!-- stacker -->
                                </a>
                            </div><!-- col -->

                            <div class="modal fade" id="modal-<?php echo $count; ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-2">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h2 class="h3"><?php the_sub_field('name'); ?></h2>
                                            <?php the_sub_field('full_bio'); ?>
                                        </div><!-- modal-body -->
                                    </div><!-- modal-content -->
                                </div><!-- modal-dialog -->
                            </div><!-- modal -->

                            <?php $count++; endwhile; ?>

                    </div><!-- row -->
                <?php endif; ?>
            </div><!-- container -->
        </section>

    <?php else : ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <?php if (have_posts()) : ?>

                            <?php while (have_posts()) : the_post(); ?>

                                <?php the_content(); ?>

                            <?php endwhile; ?>

                        <?php endif; ?>

                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>

    <?php endif; ?>


</main>

<?php get_footer(); ?>
