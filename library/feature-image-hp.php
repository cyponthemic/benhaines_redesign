<?php
function displayHPFeatureImage($id,$image_field,$image_link){
  $image = get_field($image_field);
  $link =  get_field($image_link);
  if( !empty($image) ):
  $image_title = $image['title'];
  $image_alt = $image['alt'];
  $image_caption = $image['caption'];
  $image_thumb = $image['sizes'][ 'large' ];

  echo '<div id="'.$id.'" class="image-crop image-crop_feature parallax-window small-no-margin-bottom"';
  echo 'dataf-parallax="scroll"';
  echo 'dataf-image-src="'.$image_thumb.'">';
  echo '<a class="image-crop--link" href="'.$link.'">';
    echo '<div class="image-crop--description">';
      echo '<h2 class="center color-white">'.$image_title.'</h2>';
      echo '<p class="center">'.$image_caption.'</p>';
    echo '</div>';
  echo '</a>';
  echo '</div>';
  endif;
}
