<?php

/**
 * Partial for the Mass Times component.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

?>

<?php $SatSun = get_field('weekend_masses','options');?>
<?php if (have_rows('schedule', 'options') || $SatSun['saturday_times'] || $SatSun['sunday_times']) : ?>
  <div class="mass-times grid-container">
  <?php if (have_rows('weekend_masses','options')) : while(have_rows('weekend_masses','options')): the_row();?>
    <div class="mass-times-section">
        <h5 class="mass-times-title">
            Weekend Mass Times
        </h5>
        <div class="mass-time-wrapper">
        <?php if (have_rows('saturday_times')) : ?>
            <div class="mass-time">
                <h6 class="mass-time-day">Saturday</h6>
                  <?php while(have_rows('saturday_times')): the_row();?>
                    <div class="mass-time-time">
                        <?php the_sub_field('saturday_time'); ?>
                    </div>
                  <?php endwhile;?>
                </div>
        <?php endif; ?>
        <?php if (have_rows('sunday_times')) : ?>
            <div class="mass-time">
                <h6 class="mass-time-day">Sunday</h6>
                <?php while(have_rows('sunday_times')): the_row();?>
                  <div class="mass-time-time">
                      <?php the_sub_field('sunday_time'); ?>
                  </div>
                <?php endwhile;?>
            </div>
        <?php endif; ?>
        </div>
    </div>
  <?php endwhile; endif; ?>
  <?php if (have_rows('schedule', 'options')):?>
      <?php while (have_rows('schedule', 'options')) : the_row(); ?>
      <div class="mass-times-section">
          <h5 class="mass-times-title">
              <?php the_sub_field('title'); ?>
          </h5>
          <div class="mass-time-wrapper">
          <?php if (have_rows('times', 'options')):?>
            <?php while (have_rows('times','options')) : the_row();
                        get_template_part('template-parts/components/mass-time');
                    endwhile; ?>
                <?php endif;?>
          </div>
      </div>
      <?php endwhile; ?>
  <?php endif;?>
  </div>
<?php else : ?>
  <div class="no-mass-times">
      <h3 class="<?php is_page_template('templates/homepage.php') ? 'has-tertiary-color' : 'has-primary-color'; ?>">Sorry,
          but there are not any masses scheduled at this time.</h3>
  </div>
<?php endif;
