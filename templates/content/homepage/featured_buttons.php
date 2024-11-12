<?php

/**
 * Partial for the Homepage template's Featured Buttons.
 *
 * @package Celine
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

 use Celine\Theme\Controllers\TemplateController;

if (have_rows('featured_buttons')) : ?>
<div class="featured-buttons" <?php echo TemplateController::isAnimated();?>
    data-btns="<?php echo count(get_field('featured_buttons')); ?>">
    <h2 class="featured-buttons-title"><?php echo get_field('featured_buttons_title');?></h2>
    <div class="featured-buttons-wrapper" <?php echo TemplateController::animate("fade-up",50);?>>
        <?php while (have_rows('featured_buttons')) : the_row();
            get_template_part("template-parts/components/featured", "button");
        endwhile; ?>
    </div>
</div>
<?php endif;
