<?php
/*
Plugin Name: Open Graph Metatags for Facebook
Plugin URI: http://jordiplana.com/opengraph-metatags-facebook
Description: Adds automatically Open Graph metatags based on the title, content and thumbnail of the post. Install and activate, and you are done!
Version: 1.26
Author: Jordi Plana
Author URI: http://jordiplana.com
*/

add_filter('language_attributes','og_filter');
add_action('wp_head','og_add_metatags');

function og_filter($html){
	$html .= ' prefix="og: http://ogp.me/ns#" ';
	return $html;
}

function og_add_metatags(){
    global $post;
    if(is_singular()){
        ?>
		<!-- OpenGraph Metatags Plugin - jordiplana.com -->
        <meta property="og:title" content="<?php echo $post->post_title; ?>" />
        <meta property="og:description"  content="<?php
            if(!empty($post->post_excerpt)){
                $exc = $post->post_excerpt;
            }else{
                $exc = strip_tags($post->post_content);
				//We try to make our custom excerpt based on the content
                if(strlen($exc)>160){
                    $pos = absint(strpos($exc, ' ',160));
                    if($pos==0){
                        //if there's not any space we split
                        $pos = 160;
                    }
                    $exc = substr($exc,0,$pos).' ...';
                }
            }
            echo trim_return_carriages(strip_shortcodes($exc),' '); //sanitize
        ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
        <?php
		$thumb = '';
		if(current_theme_supports( 'post-thumbnails' )) $thumb = get_post_thumbnail_id($post->ID);
			
			if(!empty($thumb)){
				?>
		<meta property="og:image" content="<?php
					//get the post thumbnail src
					$thumb = wp_get_attachment_image_src($thumb, full);
					if(!empty($thumb[0])){
						echo $thumb[0];
					} ?>" />
				<?php
			}else{
				//Check for image attachments of the post and display the first one
				$attachments = get_children(array('post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'numberposts' => 1));
				if (is_array($attachments)){
					$attachments = array_shift($attachments);
					?>
		<meta property="og:image" content="<?php
						//get the post thumbnail src
						$thumb = wp_get_attachment_image_src($attachments->ID, 'full');
						if(!empty($thumb[0])){
							echo $thumb[0];
						} ?>" />
					<?php
				}
				
			}
		?>
		<meta property="og:locale" content="<?php echo get_locale(); ?>" />
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
		<!-- /OpenGraph Metatags Plugin - jordiplana.com -->
		<?php
    }
}
function trim_return_carriages($output, $replace_with = ''){
	$output = str_replace(array("\n", "\t", "\r"), $replace_with, $output);
	$output = str_replace($replace_with.$replace_with,$replace_with,$output);
	return $output;
}