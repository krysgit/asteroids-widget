<?php
/*
Plugin Name: Asteroids Game Widget Reloaded
Plugin URI: https://github.com/krysgit/asteroids-widget
Description: Turn your site into the arcade game Asteroids. Destroy webpage contents with your ship. A modernized fork compatible with PHP 8+.
Version: 1.0.0
Author: Krystalia Saldari (Fork of Electric Tree House)
Author URI: https://github.com/krysgit
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Asteroids_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_asteroids',
			'description' => __( 'Play Asteroids and Blow Stuff Up', 'asteroids-widget' ),
		);
		$control_ops = array( 'width' => 500, 'height' => 350 );
		parent::__construct( 'asteroids', __( 'Asteroids Widget', 'asteroids-widget' ), $widget_ops, $control_ops );
	}

	public function widget( $args, $options ) {
		$options = wp_parse_args( (array) $options, array(
			'title'        => '',
			'text'         => '',
			'bullet-color' => false,
			'show'         => 'all',
			'slug'         => '',
			'button-opt'   => 'push-1',
			'image-opt'    => 'none',
			'background'   => false,
			'filter'       => false,
		) );

		$asteroids_title = apply_filters( 'widget_title', empty( $options['title'] ) ? '' : $options['title'], $options, $this->id_base );
		$asteroids_text  = apply_filters( 'widget_text', empty( $options['text'] ) ? '' : $options['text'], $options );
		$asteroids_link  = '<p style="font-size: 70%; text-align: right;">By <a href="http://electrictreehouse.com" rel="noopener noreferrer">Eric</a> and <a href="https://github.com/erkie/erkie.github.com" rel="noopener noreferrer">Erik</a></p>';

		$plugin_url = plugins_url( 'gears/', __FILE__ );

		$asteroids_bk          = esc_url( $plugin_url . 'asteroids-bk.jpg' );
		$asteroids_mainimage   = esc_url( $plugin_url . 'asteroids-image.jpg' );
		$asteroids_rocketimage = esc_url( $plugin_url . 'asteroids-rocket.png' );
		$asteroids_nohoverimage= esc_url( $plugin_url . 'asteroids.jpg' );
		$asteroids_hoverimage  = esc_url( $plugin_url . 'asteroids-hover.jpg' );
		$asteroids_arcadered   = esc_url( $plugin_url . 'arcade-red.png' );
		$asteroids_arcadeyellow= esc_url( $plugin_url . 'arcade-yellow.png' );
		$asteroids_arcadeblack = esc_url( $plugin_url . 'arcade-black.gif' );

		if ( ! empty( $options['bullet-color'] ) ) {
			$address         = esc_url( $plugin_url . 'play-asteroids-yellow.min.js' );
			$asteroids_start = "startAsteroids('yellow','" . esc_js( $address ) . "');";
		} else {
			$address         = esc_url( $plugin_url . 'play-asteroids.min.js' );
			$asteroids_start = "startAsteroids('','" . esc_js( $address ) . "');";
		}

		$asteroids_show      = $options['show'];
		$asteroids_slug      = trim( $options['slug'] );
		$asteroids_buttonopt = $options['button-opt'];
		$asteroids_imageopt  = $options['image-opt'];

		$should_display = false;
		switch ( $asteroids_show ) {
			case 'all':
			case '':
				$should_display = true;
				break;
			case 'front':
				$should_display = is_front_page();
				break;
			case 'post':
				$should_display = ! empty( $asteroids_slug ) ? is_single( explode( ',', $asteroids_slug ) ) : is_single();
				break;
			case 'category':
				$should_display = ! empty( $asteroids_slug ) ? is_category( explode( ',', $asteroids_slug ) ) : is_category();
				break;
			case 'page':
				$should_display = ! empty( $asteroids_slug ) ? is_page( explode( ',', $asteroids_slug ) ) : is_page();
				break;
		}

		if ( ! $should_display ) {
			return;
		}

		echo $args['before_widget'];

		if ( ! empty( $asteroids_title ) ) {
			echo $args['before_title'] . esc_html( $asteroids_title ) . $args['after_title'];
		}

		if ( ! empty( $options['background'] ) ) {
			echo '<div style="background-image: url(' . $asteroids_bk . '); padding:20px 10px;">';
			echo '<div style="text-align:center; color:#fff;">';
		} else {
			echo '<div>';
		}

		include( plugin_dir_path( __FILE__ ) . 'gears/run-asteroids.php' );

		if ( ! empty( $asteroids_text ) ) {
			$formatted_text = ! empty( $options['filter'] ) ? wpautop( $asteroids_text ) : $asteroids_text;
			echo '<div class="asteroidswidget">' . wp_kses_post( $formatted_text ) . '</div>';
		}

		if ( ! empty( $options['background'] ) ) {
			echo '</div></div>';
		} else {
			echo '</div>';
		}

		if ( is_front_page() ) {
			echo $asteroids_link;
		}

		echo $args['after_widget'];
	}

	public function update( $newoptions, $oldoptions ) {
		$options = $oldoptions;
		$options['title']        = sanitize_text_field( $newoptions['title'] );
		$options['text']         = current_user_can( 'unfiltered_html' ) ? $newoptions['text'] : wp_filter_post_kses( $newoptions['text'] );
		$options['filter']       = ! empty( $newoptions['filter'] );
		$options['bullet-color'] = ! empty( $newoptions['bullet-color'] );
		$options['background']   = ! empty( $newoptions['background'] );
		$options['button-opt']   = sanitize_key( $newoptions['button-opt'] );
		$options['image-opt']    = sanitize_key( $newoptions['image-opt'] );
		$options['show']         = sanitize_key( $newoptions['show'] );
		$options['slug']         = sanitize_text_field( $newoptions['slug'] );
		return $options;
	}

	public function form( $options ) {
		$options = wp_parse_args( (array) $options, array(
			'title'        => '',
			'text'         => '',
			'button-opt'   => 'push-1',
			'image-opt'    => 'none',
			'show'         => 'all',
			'slug'         => '',
			'filter'       => false,
			'bullet-color' => false,
			'background'   => false,
		) );

		$title = $options['title'];
		$text  = $options['text'];
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'asteroids-widget' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
    
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php _e( 'Description / Instructions:', 'asteroids-widget' ); ?></label>
			<textarea class="widefat" rows="4" cols="22" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>"><?php echo esc_textarea( $text ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'filter' ) ); ?>">
				<input id="<?php echo esc_attr( $this->get_field_id( 'filter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'filter' ) ); ?>" type="checkbox" <?php checked( $options['filter'] ); ?> />
				<?php _e( 'Auto-Format Text', 'asteroids-widget' ); ?>
			</label><br>
    
			<label for="<?php echo esc_attr( $this->get_field_id( 'bullet-color' ) ); ?>">
				<input id="<?php echo esc_attr( $this->get_field_id( 'bullet-color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bullet-color' ) ); ?>" type="checkbox" <?php checked( $options['bullet-color'] ); ?> />
				<?php _e( 'Change Bullet Color to Yellow', 'asteroids-widget' ); ?>
			</label><br>
    
			<label for="<?php echo esc_attr( $this->get_field_id( 'background' ) ); ?>">
				<input id="<?php echo esc_attr( $this->get_field_id( 'background' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background' ) ); ?>" type="checkbox" <?php checked( $options['background'] ); ?> />
				<?php _e( 'Add Asteroids Background', 'asteroids-widget' ); ?>
			</label>
		</p>
    
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'image-opt' ) ); ?>"><?php _e( 'Show Image Option: ', 'asteroids-widget' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'image-opt' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'image-opt' ) ); ?>" class="widefat">
				<option value="none" <?php selected( $options['image-opt'], 'none' ); ?>>None</option>
				<option value="image-1" <?php selected( $options['image-opt'], 'image-1' ); ?>>Asteroids</option>
				<option value="image-2" <?php selected( $options['image-opt'], 'image-2' ); ?>>Hover</option>
				<option value="image-3" <?php selected( $options['image-opt'], 'image-3' ); ?>>Rocket</option>
				<option value="image-4" <?php selected( $options['image-opt'], 'image-4' ); ?>>Red Arcade</option>
				<option value="image-5" <?php selected( $options['image-opt'], 'image-5' ); ?>>Yellow Arcade</option>
			</select>
		</p>
                    
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button-opt' ) ); ?>"><?php _e( 'Use Button or Text Link: ', 'asteroids-widget' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'button-opt' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'button-opt' ) ); ?>" class="widefat">
				<option value="none" <?php selected( $options['button-opt'], 'none' ); ?>>None</option>
				<option value="push-1" <?php selected( $options['button-opt'], 'push-1' ); ?>>Push Button 1</option>
				<option value="text-1" <?php selected( $options['button-opt'], 'text-1' ); ?>>Text Link 1</option>
			</select>
		</p>
            
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show' ) ); ?>"><?php _e( 'Display only on:', 'asteroids-widget' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'show' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'show' ) ); ?>" class="widefat">
				<option value="all" <?php selected( $options['show'], 'all' ); ?>>All</option>
				<option value="front" <?php selected( $options['show'], 'front' ); ?>>Front Page</option>
				<option value="post" <?php selected( $options['show'], 'post' ); ?>>Post(s)</option>
				<option value="category" <?php selected( $options['show'], 'category' ); ?>>Category</option>
				<option value="page" <?php selected( $options['show'], 'page' ); ?>>Page(s)</option>
			</select>
		</p>
    
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'slug' ) ); ?>"><?php _e( 'Slug, Title, or ID (Comma Separated):', 'asteroids-widget' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'slug' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'slug' ) ); ?>" value="<?php echo esc_attr( $options['slug'] ); ?>" />
		</p>
		<?php
	}
}

add_action( 'widgets_init', function() {
	register_widget( 'Asteroids_Widget' );
} );

// Enqueue Frontend Script
function asteroids_enqueue_scripts() {
	wp_enqueue_script(
		'asteroids-start',
		plugins_url( 'gears/start-asteroids-function.js', __FILE__ ),
		array(),
		'3.0.1',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'asteroids_enqueue_scripts' );

// Shortcode Support
function asteroids_shortcode_handler( $atts ) {
	$plugin_url      = plugins_url( 'gears/', __FILE__ );
	$address         = esc_url( $plugin_url . 'play-asteroids.min.js' );
	$asteroids_start = "startAsteroids('','" . esc_js( $address ) . "');";
	$asteroids_buttonopt = 'push-1';
	$asteroids_imageopt  = 'none';

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'gears/run-asteroids.php' );
	return ob_get_clean();
}
add_shortcode( 'asteroids', 'asteroids_shortcode_handler' );
