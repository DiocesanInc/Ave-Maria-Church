<?php

/**
 * Template Name: Cluster
 *
 * The template for displaying the Homepage Template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package patrick
 */

get_header();
?>

<div class="content-area" id="primary">
    <main class="site-main page-template-homepage" id="main">
        <?php get_template_part("templates/content/homepage/hero"); ?>
        <?php get_template_part("templates/content/homepage/parishes"); ?>
        <?php get_template_part("templates/content/homepage/banner"); ?>
        <?php get_template_part("templates/content/homepage/featured-buttons"); ?>
        <?php get_template_part("templates/content/homepage/lower-banner"); ?>
        <?php get_template_part("templates/content/homepage/social-banner"); ?>
        <?php get_template_part("templates/content/homepage/calendar"); ?>

    </main>
</div>

<?php get_footer();
