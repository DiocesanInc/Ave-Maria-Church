<?php

/**
 * Partial for the Homepage Banner section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<?php $fontColor = TemplateController::getFontColor("top_banner"); ?>
<?php $bgColor = TemplateController::getBackgroundColor("top_banner"); ?>

<div class="top-banner banner-container teaser-box ">
    <div class="banner-image-wrapper" <?php echo TemplateController::animate("fade-up",50); ?>>
        <img class="teaser-img" src="<?php echo get_field("banner_image")["url"]; ?>" />
    </div>

    <div class="teaser-content-wrapper <?php echo "$bgColor $fontColor"?>" <?php echo TemplateController::animate("fade-left",50); ?>>
        <div class="teaser-content-wrapper-inner">
          <?php if(get_field('mass_or_mission')==1):?>
            <?php if (get_field('banner_title')) : ?>
            <h2 class="teaser-title <?php echo "$fontColor"?>">
                <?php echo get_field('banner_title'); ?>
            </h2>
            <?php endif; ?>

            <?php if (get_field('banner_content')) : ?>
            <p class="teaser-content <?php echo "$fontColor"?>">
                <?php echo get_field("banner_content"); ?>
            </p>
            <?php endif; ?>

          <?php else: ?>
            <?php if (get_field('banner_title')) : ?>
              <h2 class="teaser-title <?php echo "$fontColor"?>">
                  <?php echo get_field('banner_title'); ?>
              </h2>
            <?php endif; ?>
            <div class="mass-times grid col-2">
                <?php if (get_field('weekend_masses','options')['saturday_times']) : ?>
                <div class="mass-times-section">
                    <h4 class="mass-times-title <?php echo "$fontColor"?>">
                        Saturday
                    </h4>
                    <div class="mass-time">
                    <?php if(have_rows('weekend_masses','options')):
                        while(have_rows('weekend_masses','options')): the_row();?>
                        <?php if(have_rows('saturday_times','options')):
                          while(have_rows('saturday_times','options')): the_row();?>
                          <div class="mass-time-time <?php echo "$fontColor"?>">
                                <?php echo get_sub_field('saturday_time'); ?>
                          </div>
                        <?php endwhile; endif;?>
                    <?php endwhile; endif;?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if (get_field('weekend_masses','options')['sunday_times']) : ?>
                <div class="mass-times-section">
                    <h4 class="mass-times-title <?php echo "$fontColor"?>">
                        Sunday
                    </h4>
                    <div class="mass-time">
                    <?php if(have_rows('weekend_masses','options')):
                        while(have_rows('weekend_masses','options')): the_row();?>
                        <?php if(have_rows('sunday_times','options')):
                          while(have_rows('sunday_times','options')): the_row();?>
                          <div class="mass-time-time <?php echo "$fontColor"?>">
                                <?php echo get_sub_field('sunday_time'); ?>
                          </div>
                        <?php endwhile; endif;?>
                    <?php endwhile; endif;?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
          <?php endif;?>
          <?php if (have_rows('banner_links')) : ?>
          <div class="links-container">
              <?php while (have_rows('banner_links')) : the_row();
                  echo acf_link(get_sub_field("banner_link"), 'the-button');
              endwhile; ?>
          </div>
          <?php endif; ?>
        </div>
    </div>
</div>
