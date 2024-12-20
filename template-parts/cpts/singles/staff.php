<?php

/**
 * Template part for displaying a single Staff Member.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  <?php if (get_the_title() || get_field('position') || get_field('phone') || get_field('email') || get_the_post_thumbnail()) : ?>
    <div class="single-top">
      <?php if (get_the_post_thumbnail()) : ?>
        <div class="single-thumbnail"><?php the_post_thumbnail('medium'); ?></div>
      <?php endif; ?>

      <?php if (get_the_title() || get_field('position') || get_field('phone') || get_field('email')) : ?>
        <div class="single-info">
          <?php if (get_field('page_title')) : ?>
            <h1 class="single-title"><?php echo get_field('page_title'); ?></h1>
          <?php endif; ?>
          <?php if (get_the_title()) : ?>
            <h4 class="single-title"><?php the_title(); ?></h4>
          <?php endif; ?>

          <?php if (get_field('position')) : ?>
            <h3 class="staff-position"><?php echo get_field('position'); ?></h3>
          <?php endif; ?>

          <?php if (get_field('email')) : ?>
              <a href="mailto: <?php echo get_field("email"); ?>" class="">
                  <i class="fa fa-envelope"></i>
              </a>
          <?php endif; ?>

          <?php if (get_field('phone')) : ?>
              <a href="<?php echo phone_link(get_field("phone")); ?>" class="">
                  <i class="fa fa-phone"></i>
              </a>
          <?php endif; ?>

        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <div class="single-content">
    <?php the_content();

    wp_link_pages(array(
      'before' => '<div class="page-links">' . esc_html__('Pages:', 'celine'),
      'after'  => '</div>',
    )); ?>

    <!-- <a href="<?= get_post_type_archive_link(get_post_type()); ?>" class="the-button has-primary-background-color has-secondary-background-color-hover has-white-color" title="View All <?= get_post_type_object(get_post_type())->label; ?>">View All <?= get_post_type_object(get_post_type())->label; ?></a> -->
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
