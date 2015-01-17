<div class="slider clear">
  <!-- echoing slider if exists -->
  <?php
    if(is_home()){
      if(function_exists('show_flexslider_rotator') && get_field('acf_slider_name_index', 'option')) echo show_flexslider_rotator(get_field('acf_slider_name_index', 'option'));
    } else {
      if(function_exists('show_flexslider_rotator') && get_field('slider_name')) echo show_flexslider_rotator(get_field('slider_name'));
    }
  ?>
  <!-- /slider -->
</div>
