<?php

/**
 * Template part for displaying the content in ministry-groups.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\MinistriesController;
use Celine\Theme\Controllers\TemplateController;

?>

<div class="ministry-funnel entry-content max-width">
    <?php $groups = MinistriesController::getMinistryGroups();
    foreach($groups as $group) : ?>
    <div class="ministry-group-wrapper">
      <?php $image = get_field('ministry_group_image', $group);
      if($image):?>
        <a href="<?php echo get_term_link($group)?>" class="ministry-group-link"
            style="background-image: url(<?php echo $image['url'];?>);" <?php echo TemplateController::animate("fade"); ?>>
            <h2 class="has-white-color">
                <?php echo $group->name; ?>
            </h2>
        </a>
      <?php else:?>
        <a href="<?php echo get_term_link($group)?>" class="ministry-group-link"
            style="background-image: url(<?php echo get_field('ministry_featured_image','options');?>);"
            <?php echo TemplateController::animate("fade"); ?>>
            <h2 class="has-white-color test">
                <?php echo $group->name; ?>
            </h2>
        </a>
      <?php
      endif; ?>
    </div>
    <?php endforeach; ?>
</div>
