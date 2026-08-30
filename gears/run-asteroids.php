<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $asteroids_imageopt ) ) {
	switch ( $asteroids_imageopt ) {
		case 'image-1':
			echo '<div style="text-align:center;"><a href="#" onclick="' . esc_attr( $asteroids_start ) . ' return false;"><img src="' . esc_url( $asteroids_mainimage ) . '" width="190" height="100" style="border:0;" alt="Asteroids Wordpress Widget" /></a></div>';
			break;

		case 'image-2':
			echo '<div style="text-align:center;"><a href="#" onclick="' . esc_attr( $asteroids_start ) . ' return false;"><img src="' . esc_url( $asteroids_nohoverimage ) . '" onmouseover="this.src=\'' . esc_url( $asteroids_hoverimage ) . '\'" onmouseout="this.src=\'' . esc_url( $asteroids_nohoverimage ) . '\'" style="border:0;" alt="Asteroids Wordpress Widget" /></a></div>';
			break;

		case 'image-3':
			echo '<div style="text-align:center;"><a href="#" onclick="' . esc_attr( $asteroids_start ) . ' return false;"><img src="' . esc_url( $asteroids_rocketimage ) . '" width="90" height="70" style="border:0;" alt="Asteroids Wordpress Widget" /></a></div>';
			break;

		case 'image-4':
			echo '<div style="text-align:center;"><a href="#" onclick="' . esc_attr( $asteroids_start ) . ' return false;"><img src="' . esc_url( $asteroids_arcadered ) . '" width="66" height="120" style="border:0;" alt="Asteroids Wordpress Widget" /></a></div>';
			break;

		case 'image-5':
			echo '<div style="text-align:center;"><a href="#" onclick="' . esc_attr( $asteroids_start ) . ' return false;"><img src="' . esc_url( $asteroids_arcadeyellow ) . '" width="66" height="120" style="border:0;" alt="Asteroids Wordpress Widget" /></a></div>';
			break;

		case 'image-6':
			echo '<div style="text-align:center;"><a href="#" onclick="' . esc_attr( $asteroids_start ) . ' return false;"><img src="' . esc_url( $asteroids_arcadeblack ) . '" width="66" height="120" style="border:0;" alt="Asteroids Wordpress Widget" /></a></div>';
			break;
	}
}

if ( ! empty( $asteroids_buttonopt ) ) {
	switch ( $asteroids_buttonopt ) {
		case 'push-1':
			echo '<div><p style="text-align: center;"><a href="#" onclick="' . esc_attr( $asteroids_start ) . ' return false;"><button type="button">Click to Play Asteroids!!!</button></a></p></div>';
			break;
		case 'text-1':
			echo '<div><p style="text-align: center;"><a href="#" onclick="' . esc_attr( $asteroids_start ) . ' return false;">Click to Play Asteroids!!!</a></p></div>';
			break;
	}
}