<?php
/**
 *
 * Template Name: Contact Page
 *
 **/
get_header(); ?>

    <main>

        <div class="py-3">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">

                        <?php if (have_posts()) : ?>

                            <?php /* Start the Loop */ ?>

                            <?php while (have_posts()) : the_post(); ?>

                                <?php the_content(); ?>

                            <?php endwhile; ?>

                        <?php endif; ?>

                    </div><!-- col -->

                    <div class="col-lg-5">
                        <div class="pt-1 pb-75 px-50 px-sm-2 bg-light">
                            <h2 class="h3">Contact Information</h2>
                            <?php
                            $removethese = array("(", " ", ")", "-");
                            ?>
                            <table class="tr-valignment">
                                <tr>
                                    <td><strong>Phone: </strong></td>
                                    <td>
                                        <a href="tel:+1<?php echo strip_tel(get_field('phone_number', 'option')); ?>"
                                           class="text-body"><?php echo get_field('phone_number', 'option'); ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>E-mail: </strong></td>
                                    <td>
                                        <a href="mailto:<?php echo get_field('email_address', 'option'); ?>"
                                           class="text-body"><?php echo get_field('email_address', 'option'); ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Address: </strong></td>
                                    <td>
                                        <?php echo get_field('address', 'option'); ?>
                                    </td>
                                </tr>
                            </table>
                            <div class="social-links">
                                <p class="mb-250 font-weight-bold mt-50 small">Join us on:</p>
                                <?php while( have_rows('social_links', 'options') ): the_row(); ?>
                                    <a class="social-link btn btn-link text-secondary px-0 mr-250 py-0" target="_blank" href="<?php the_sub_field('url'); ?>">
                                        <i class="<?php the_sub_field('icon_class'); ?> fa-lg">
                                            <span class="sr-only"><?php the_sub_field('label'); ?></span>
                                        </i>
                                    </a>
                                <?php endwhile; ?>
                            </div><!-- social-links -->
                        </div><!-- bg-light -->

                        <div class="px-0 google-map">
                            <?php $mapurl = get_field('map_embed_code', 'option'); ?>
                            <iframe src="<?php echo $mapurl; ?>" width="600" height="500" style="border:0;"
                                    allowfullscreen="" loading="lazy"></iframe>
                        </div><!-- px-0 -->
                    </div><!-- col -->
                </div><!-- row -->

            </div><!-- container -->
        </div>

    </main>

<?php get_footer();