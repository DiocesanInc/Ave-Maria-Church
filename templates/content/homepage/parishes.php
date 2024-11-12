<?php

/**
 * Partial for the Homepage template's parish.
 *
 * @package Celine
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

use Celine\Theme\Controllers\TemplateController;

if (have_rows('parish_buttons')&&(get_field('cluster_style') == 'buttons')) : ?>
<div class="parish-cluster featured-buttons parishBtns"
    data-btns="<?php echo count(get_field('parish_buttons')); ?>">
    <h1 class="parish-scroll-title"><?php echo get_field('parish_scroll_title');?></h1>
    <div class="featured-buttons-wrapper parishButtons" <?php echo TemplateController::animate("fade-up",50);?>>
        <?php while (have_rows('parish_buttons')) : the_row();
            get_template_part("template-parts/components/parish", "button");
        endwhile; ?>
    </div>
</div>
<?php elseif(have_rows('parish_carousel')&&(get_field('cluster_style') == 'carousel')) : ?>

<div class="buttons-container carousel" data-btns="<?php echo count(get_field('parish_carousel')); ?>" <?php echo TemplateController::animate("fade-up",50);?>>
    <?php while (have_rows('parish_carousel')) : the_row(); ?>
    <div class="button carousel-item">
        <?php if (get_sub_field('is_image') && get_sub_field('image')) : ?>
        <img src="<?= get_sub_field('image')['url'] ?? ''; ?>" class="button-image" alt="<?= get_sub_field('parish_name'); ?>" />
        <?php else : ?>
        <?= get_sub_field('fa_icon'); ?>
        <?php endif; ?>

        <?php if (get_sub_field('parish_name')) : ?>
        <h4 class="button-title"><?= get_sub_field('parish_name'); ?></h4>
        <?php endif; ?>

        <?php if (get_sub_field('content')) : ?>
        <div class="button-text"><?= get_sub_field('content'); ?></div>
        <?php endif; ?>

        <a href="<?= get_sub_field('button')['url'] ?? ''; ?>" target="<?= get_sub_field('button')['target'] ?? ''; ?>" class="the-button"><?= get_sub_field('button')['title'] ?? ''; ?></a>
    </div>
    <?php endwhile; ?>
</div>
<?php get_template_part('template-parts/components/carousel', 'arrows', ['controls' => 'buttons-container']); ?>
<?php elseif(have_rows('parish_scroll')&&(get_field('cluster_style') == 'scroll')) : 
get_template_part("template-parts/homepage/parish", "scroll");?>
<?php elseif(have_rows('parish_maps')&&(get_field('cluster_style') == 'map')) : 
get_template_part("template-parts/homepage/parish", "map");?>
<?php endif;
