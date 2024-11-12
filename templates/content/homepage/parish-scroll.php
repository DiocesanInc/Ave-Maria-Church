<?php

/**
 * Partial template for a single featured button
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */
use Celine\Theme\Controllers\TemplateController;
?>

<div class="parish-cluster parishFlex" <?php echo TemplateController::animate("fade",50);?>>
  <h1 class="parish-scroll-title"><?php echo get_field('parish_scroll_title');?></h1>
  <div class="parishScroll"
      data-btns="<?php echo count(get_field('parish_scroll')); ?>">
      <div class="testimonials-carousel carousel">
          <?php while (have_rows('parish_scroll')) : the_row();?>
            <div class="testimonial carousel-item">
              <?php $link = get_sub_field('parish');?>
                <a href="<?= $link['url'];?>" target="<?= $link['target'];?>"><h4 class="testimonial-title"><?= $link['title'];?></h4></a>
            </div>
          <?php endwhile; ?>
      </div>
  </div>
</div>