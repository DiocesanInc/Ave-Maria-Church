<?php

/**
 * Partial template for a single featured button
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

if (get_sub_field('link')) :
    $link = get_sub_field('link');
    $icon  = get_sub_field('image');
    $target = $link['target'];
    $title  = $link['title'];
    $url    = $link['url'];
    if ($link["url"]) :?>

      <a href="<?php echo $url; ?>" class="featured-button"
          target="<?php echo $target; ?>" title="<?php echo $title; ?>"
          style="background-image: url(<?php echo $icon; ?>)">
          <h1 class="button-title has-white-color">
              <?php echo $title; ?>
          </h1>
      </a>
    <?php endif;
endif;
