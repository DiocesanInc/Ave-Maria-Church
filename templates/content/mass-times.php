<?php

/**
 * Template part for displaying the content in page-mass-times.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;
?>

<?php $info = TemplateController::getPageHeader(); ?>
<div class="mass-times-background" style="background-image: url(<?php echo $info['bkgd']; ?>);"></div>
<div class="entry-content limit-width">
    <?php if_the_content(); ?>

    <?php get_template_part('template-parts/components/mass-times'); ?>
</div>
