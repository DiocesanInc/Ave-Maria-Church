<?php

/**
 * Single Mass Time section for the Mass Times component.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

$label = $args['label'];
$detail = $args['detail'];
?>

<div class="mass-time">
    <h6 class="mass-time-day"><?php the_sub_field('day'); ?></h6>
    <?php if (have_rows('times_times', 'options')):?>
      <?php while (have_rows('times_times', 'options')) : the_row(); ?>
      <div class="mass-time-time">
          <?php the_sub_field('times_time'); ?>
      </div>
      <?php endwhile; ?>
    <?php endif;?>
</div>
