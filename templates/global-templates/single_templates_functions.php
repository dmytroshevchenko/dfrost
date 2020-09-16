<?php

/*

jQuery('.masonry_grid').find('.one-story-image').each(function (i) {

	if ((i + 1) % 9 == 1) {
		var height_coef = 16 / 9;
	} else if ((i + 1) % 9 == 2) {
		var height_coef = 4 / 5;
	} else if ((i + 1) % 9 == 3) {
		var height_coef = 2 / 3;
	} else if ((i + 1) % 9 == 4) {
		var height_coef = 4 / 5;
	} else if ((i + 1) % 9 == 5) {
		var height_coef = 3 / 2;
	} else if ((i + 1) % 9 == 6) {
		var height_coef = 2 / 3;
	} else if ((i + 1) % 9 == 7) {
		var height_coef = 16 / 9; // need 2 / 3
	} else if ((i + 1) % 9 == 8) {
		var height_coef = 3 / 2;
	} else {
		var height_coef = 16 / 9;
	}
	var width = jQuery(this).width();
	var height = width / height_coef;

	console.log(i + ', r: ' + height_coef + ', w: ' + width + ', h: ' + height);

	jQuery(this).height(height);
});

 */

function one_story_template($id, $show_date=false){

	$bg_image_ratio = 1;
	$bg_image = get_the_post_thumbnail_url($id);
	if ($bg_image !== false) {
		$bg_image_size = getimagesize($bg_image);
		$bg_image_ratio = round($bg_image_size[0]/$bg_image_size[1], 1);
	}

	$link_type_file = false;
	if (get_field('file', $id) || get_field('site', $id)) {
		$link_type_file = true;
		if (get_field('file', $id))
			$on_click = 'window.open(`' . get_field('file', $id) . '`)';
		if (get_field('site', $id))
			$on_click = 'window.open(`' . get_field('site', $id) . '`)';
		$frame = '';
	} else {
		$on_click = 'location.href_=`' . get_permalink($id) . '`';
		$frame = 'frame-story';
	}

	$html = '<div class="grid-item one-story ' . $frame . '" onclick="'.$on_click.'" data-url="' . get_permalink($id) . '" data-post_id="'.$id.'" data-ratio="'.$bg_image_ratio.'">
                <div class="one-story-image">
                <div class="one-story-image-image" style="background-image:url('.$bg_image.')"></div>';
                $html .= '</div>
                <div class="story-content">
                    <div class="story-title">
                        <div class="story-title-title">'.
                            get_the_title( $id ).'
                        </div>
                        <div class="story-cat">';
                        if( $show_date ){
                            $html .= get_the_date('d.m.Y', $id);
                        }else{
                            $html .= wp_get_post_terms( $id, 'story_cat', array('fields' => 'names') )[0];
                        }
                        $html .= '<em></em></div>
                    </div>
                    <div class="story-description">'.
                        get_the_excerpt($id).'
                    </div>';

                    if( get_field('file', $id) || get_field('site', $id) ){
                        $html .= '<div class="story-links">';
                            if( get_field('file', $id) ){
                                $html .= '<a class="download_link" href="#" onclick="return false" data-link="'.get_field('file', $id).'?v='.time().'"><span class="icon-download"></span>'.__('Download', 'understrap-dfrost').'</a>';
                            }
                            if( get_field('site', $id) ){
                                $html .= '<a class="site_link" href="#" onclick="return false" data-link="'.get_field('site', $id).'">'.__('Visit link').'</a>';
                            }
                            $html .= '
                        </div>';
                    }
                $html .= '</div>
            </div>';

	return $html;
}

function one_work_template($id){
	$bg_image_ratio = 1;
	$bg_image = get_the_post_thumbnail_url($id);
	if ($bg_image !== false) {
		$bg_image_size = getimagesize($bg_image);
		$bg_image_ratio = round($bg_image_size[0] / $bg_image_size[1], 1);
	}

	$fields = get_fields($id);

	if (isset($fields['featured_video']) && strlen($fields['featured_video']['url'])) {
		$bg_image_ratio = round($fields['featured_video']['width'] / $fields['featured_video']['height'], 1);
		$video = '<video width="100%" autoplay="" muted="" loop="" playsinline="">'.
			'<source src="'.$fields['featured_video']['url'].'" type="video/mp4"></video>';
	} else {
		$video = '';
	}

	if (strlen($video)) {
		$html = '<div class="grid-item one-work" step="' . $step . '" data-aos="fade-up" data-url="' . get_permalink($id) . '" onclick="location.href_=`'.get_permalink($id). '`" data-post_id="'.$id.'" data-ratio="'.$bg_image_ratio.'">
                <div class="one-work-image" style="background-image:url('.$bg_image.')">'.$video.'
                <div class="one-work-image-image" style="background-image:url('.$bg_image.')"></div>';
	} else {
		$html = '<div class="grid-item one-work" step="' . $step . '" data-aos="fade-up" data-url="' . get_permalink($id) . '" onclick="location.href_=`'.get_permalink($id).'`" data-post_id="'.$id.'" data-ratio="'.$bg_image_ratio.'">
                <div class="one-work-image" style="background-image:url('.$bg_image.')">
                <div class="one-work-image-image" style="background-image:url('.$bg_image.')"></div>';
	}
                $html .= '</div>
                <div class="work-content">
                    <div class="work-title">
                        <div class="work-title-title">'.
                            get_the_title( $id ).'
                        </div>
                        <div class="work-cat work-cat_fix3">'.
                            wp_get_post_terms( $id, 'work_client', array('fields' => 'names') )[0].'
                        </div>
                    </div>
                    <div class="work-description">'.
                        get_the_excerpt($id). '
                    </div>
                </div>
            </div>';

	return $html;
}

?>
