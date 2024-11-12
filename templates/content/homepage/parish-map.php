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

<div class="parish-cluster" <?php echo TemplateController::animate("fade",50);?>>
  <h1 class="parish-map-title"><?php echo get_field('parish_scroll_title');?></h1>
  
  <div class="parish-maps limit-width" data-btns="<?php echo count(get_field('parish_maps')); ?>">
      <div class="parish-maps-wrapper">
          <?php $countMap = 0;?>
          <script type="text/javascript">var locations = [];</script>
          <?php while (have_rows('parish_maps')) : the_row();?>
                <div class="parish-map" data-map="<?php echo $countMap;?>">
                  <?php $name = get_sub_field('parish_name');?>
                  <?php $lat = get_sub_field('latitude');?>
                  <?php $lang = get_sub_field('longitude');?>
                  <div id="map<?= $countMap;?>"></div>
                  <script type="text/javascript">
                    var lat = "<?= $lat; ?>";
                    var lang = "<?= $lang; ?>";
                    var name = "<?= $name; ?>";
                    var count = "<?= $countMap;?>";
                    locations.push({name, lat, lang, count});
                  </script>
                  </div>
                <?php $countMap++;?>
          <?php endwhile;?>
          <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDX64QSYbXxJLvkp8NpNGjLAU4NAQ9RfJ4&callback=initMap" defer></script>
      </div>
      <div class="parish-map-slider">
          <?php $countMapText = 0;?>
          <?php while (have_rows('parish_maps')) : the_row();?>
                <div class="parish-text-wrapper" data-map="<?php echo $countMapText;?>">
                    <?php $link = get_sub_field('link');?>
                    <a href="<?= $link['url'];?>" target="<?= $link['target'];?>">
                      <h4 class="parish-title"><?= get_sub_field('parish_name');?></h4>
                    </a>
                    <?php $address = get_sub_field('address');
                    $phone = get_sub_field('phone');
                    $email = get_sub_field('email');?>
                    <?php if($address):?><div>Address: <?php echo $address;?></div><?php endif;?>
                    <?php if($phone):?><div>Phone: <a href="tel:<?php echo $phone;?>"><?php echo $phone;?></a></div><?php endif;?>
                    <?php if($email):?><div>Email: <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></div><?php endif;?>
                </div>
                <?php $countMapText++;?>
          <?php endwhile; ?>
      </div>
  </div>
</div>