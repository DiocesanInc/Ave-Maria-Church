<?php

/**
 * Template part for displaying single pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celine
 */

use Celine\Theme\Controllers\MinistriesController;
use Celine\Theme\Controllers\TemplateController;

$group = get_the_terms(get_post(), "ministry-group");
$group = $group[0];

$backLink = MinistriesController::getMinistryBackLink();

$contacts = MinistriesController::getStaffMembersByMinistry();

$contentFontColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["content_font_color"] : "black";
$contentBackgroundColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["content_background_color"] : "white";

?>

<article class="entry-content single-ministry-article">
    <div class="the-content" style="background: <?php echo $contentBackgroundColor;?>;" <?php echo TemplateController::animate("fade"); ?>>
        <div style="--tab-content-color: <?php echo $contentFontColor;?>; color: <?php echo $contentFontColor;?>;"> 
            <?php the_content(); ?>
            <?php if(is_single()): ?>
            <div class="back-button-container align-center" <?php echo TemplateController::animate("fade-up"); ?>>
                    <a href="<?php echo MinistriesController::ministryIsSlider() ? $backLink : get_term_link($group); ?>"
                        class="the-button"
                        title="back">
                        Go Back
                    </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</article>
<?php if ($contacts) : ?>
<div class="contact-persons-container">
    <?php foreach ($contacts as $contact) : ?>
    <?php
            $c = $contact["contact"] ?? '';
            $isStaff = $contact["is_staff"] ?? '';
            $hasStaffImage = get_the_post_thumbnail_url($c) ? get_the_post_thumbnail_url($c) : get_template_directory_uri() . '/assets/img/person.jpg';
            $image = $isStaff ? $hasStaffImage : get_template_directory_uri() . '/assets/img/person.jpg';
            $name = $isStaff ? $c->post_title ?? '' : $contact["contact_name"] ?? '';
            $phone = $isStaff ? get_field("phone", $c) : $contact["contact_phone_number"] ?? '';
            $email = $isStaff ? get_field("email", $c) : $contact["contact_email"] ?? '';
            ?>
    <div class="contact-person-wrapper staff-single teaser-box flex-column">
        <?php if ($image) : ?>
        <div class="contact-image">
            <img src="<?php echo $image; ?>" class="staff-image teaser-img" alt="<?php echo $name; ?>" />
        </div>
        <?php endif; ?>
        <div class="teaser-content-wrapper flex-column">
            <?php if ($name) : ?>
            <h3 class="staff-name teaser-title">
                <?php echo $name; ?>
            </h3>
            <?php endif; ?>
            <div class="teaser-content">
                <?php if ($email) : ?>
                <div class="contact-person-email">
                    <a href="mailto: <?php echo $email; ?>" class="has-underline-hover">
                        <i class="fa fa-envelope"></i>
                        <?php echo $email; ?>
                    </a>
                </div>
                <?php endif; ?>
                <?php if ($phone) : ?>
                <div class="contact-person-phone">
                    <a href="<?php echo phone_link($phone); ?>" class="has-underline-hover">
                        <i class="fa fa-phone"></i>
                        <?php echo $phone; ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>