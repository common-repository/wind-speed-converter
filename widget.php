<?php
	
	class wind_widget extends \WP_Widget {
		
		function __construct() {
			parent::__construct( 'wind_widget', __( 'Windspeed Converter Widget', 'windspeed' ) );
		}
		
		public function widget( $args, $instance ) {
			if ( isset( $instance['title'] ) ) {
				$title = apply_filters( 'widget_title', $instance['title'] );
			} else {
				$title = '';
			}
			
			echo $args['before_widget'];
			
			echo '<div id="wind_converter" class="wind_converter">';
			echo '<h3 class="widget-title">' . $title . '</h3>';
			echo '<form name="form_wind_converter">';
			if ( isset( $instance['kmh'] ) && $instance['kmh'] == 1 ) {
				echo '<div id="kmh" class="field"><label>';
				_e( "Km/h", 'windspeed' );
				echo '</label><input type="text" name="kmh" class="input_field" /></div>';
			}
			if ( isset( $instance['mph'] ) && $instance['mph'] == 1 ) {
				echo '<div id="mph" class="field"><label>';
				_e( "Mph", 'windspeed' );
				echo '</label><input type="text" name="mph" class="input_field" /></div>';
			}
			if ( isset( $instance['beaufort'] ) && $instance['beaufort'] == 1 ) {
				echo '<div id="beaufort" class="field"><label>';
				_e( "Beaufort", 'windspeed' );
				echo '</label><input type="text" name="beaufort" class="input_field" /></div>';
			}
			if ( isset( $instance['ms'] ) && $instance['ms'] == 1 ) {
				echo '<div id="ms" class="field"><label>';
				_e( "M/s", 'windspeed' );
				echo '</label><input type="text" name="ms" class="input_field" /></div>';
			}
			if ( isset( $instance['knots'] ) && $instance['knots'] == 1 ) {
				echo '<div id="knots" class="field"><label>';
				_e( "Knots", 'windspeed' );
				echo '</label><input type="text" name="knots" class="input_field" /></div>';
			}
			echo '<div class="field message"></div>';
			echo '<div class="clear"></div>';
			if ( isset( $instance['link'] ) && ( $instance['link'] != 1 || empty( $instance['link'] ) ) ) {
				echo '<div id="link"><a href="http://www.ostheimer.at" target="_blank" title="Ostheimer Wordpress Webdesign and SEO">by Ostheimer.at</a></div>';
			}
			
			echo '</form>';
			echo '</div>';
			echo $args['after_widget'];
		}
		
		public function form( $instance ) {
			$title    = $instance['title'];
			$kmh      = $instance['kmh'];
			$mph      = $instance['mph'];
			$beaufort = $instance['beaufort'];
			$ms       = $instance['ms'];
			$knots    = $instance['knots'];
			$link     = $instance['link'];
			
			// Display the Widget-Control
			echo '<div class="widget-content">';
			echo '<p><label for="' . $this->get_field_id( 'title' ) . '">';
			_e( "Title", 'windspeed' );
			echo ' <input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" type="text" value="' . $title . '" /></label></p>';
			if ( $kmh == 1 ) {
				echo '<p><input id="' . $this->get_field_id( 'kmh' ) . '" type="checkbox" name="' . $this->get_field_name( 'kmh' ) . '" value="1" checked="checked" /><label for="'
				     . $this->get_field_id( 'kmh' ) . '"> ';
				_e( "Km/h", 'windspeed' );
				echo '</label></p>';
			} else {
				echo '<p><input id="' . $this->get_field_id( 'kmh' ) . '" type="checkbox" name="' . $this->get_field_name( 'kmh' ) . '" value="1" /><label for="' . $this->get_field_id( 'kmh' )
				     . '"> ';
				_e( "Km/h", 'windspeed' );
				echo '</label></p>';
			}
			if ( $mph == 1 ) {
				echo '<p><input id="' . $this->get_field_id( 'mph' ) . '" type="checkbox" name="' . $this->get_field_name( 'mph' ) . '" value="1" checked="checked" /><label for="'
				     . $this->get_field_id( 'mph' ) . '"> ';
				_e( "Mph", 'windspeed' );
				echo '</label></p>';
			} else {
				echo '<p><input id="' . $this->get_field_id( 'mph' ) . '" type="checkbox" name="' . $this->get_field_name( 'mph' ) . '" value="1" /><label for="' . $this->get_field_id( 'mph' )
				     . '"> ';
				_e( "Mph", 'windspeed' );
				echo '</label></p>';
			}
			if ( $beaufort == 1 ) {
				echo '<p><input id="' . $this->get_field_id( 'beaufort' ) . '" type="checkbox" name="' . $this->get_field_name( 'beaufort' ) . '" value="1" checked="checked" /><label for="'
				     . $this->get_field_id( 'beaufort' ) . '"> ';
				_e( "Beaufort", 'windspeed' );
				echo '</label></p>';
			} else {
				echo '<p><input id="' . $this->get_field_id( 'beaufort' ) . '" type="checkbox" name="' . $this->get_field_name( 'beaufort' ) . '" value="1" /><label for="'
				     . $this->get_field_id( 'beaufort' ) . '"> ';
				_e( "Beaufort", 'windspeed' );
				echo '</label></p>';
			}
			if ( $ms == 1 ) {
				echo '<p><input type="checkbox" id="' . $this->get_field_id( 'ms' ) . '" name="' . $this->get_field_name( 'ms' ) . '" value="1" checked="checked" /><label for="'
				     . $this->get_field_id( 'ms' ) . '"> ';
				_e( "M/s", 'windspeed' );
				echo '</label></p>';
			} else {
				echo '<p><input type="checkbox" id="' . $this->get_field_id( 'ms' ) . '" name="' . $this->get_field_name( 'ms' ) . '" value="1" /><label for="' . $this->get_field_id( 'ms' ) . '"> ';
				_e( "M/s", 'windspeed' );
				echo '</label></p>';
			}
			if ( $knots == 1 ) {
				echo '<p><input type="checkbox" id="' . $this->get_field_id( 'knots' ) . '" name="' . $this->get_field_name( 'knots' ) . '" value="1" checked="checked" /><label for="'
				     . $this->get_field_id( 'knots' ) . '"> ';
				_e( "Knots", 'windspeed' );
				echo '</label></p>';
			} else {
				echo '<p><input type="checkbox" id="' . $this->get_field_id( 'knots' ) . '" name="' . $this->get_field_name( 'knots' ) . '" value="1" /><label for="' . $this->get_field_id( 'knots' )
				     . '"> ';
				_e( "Knots", 'windspeed' );
				echo '</label></p>';
			}
			echo '<br />';
			if ( $link == 1 ) {
				echo '<p><input type="checkbox" id="' . $this->get_field_id( 'link' ) . '" name="' . $this->get_field_name( 'link' ) . '" value="1" checked="checked" /><label for="'
				     . $this->get_field_id( 'link' ) . '"> ';
				_e( "Hide Link?", 'windspeed' );
				echo '</label></p>';
			} else {
				echo '<p><input type="checkbox" id="' . $this->get_field_id( 'link' ) . '" name="' . $this->get_field_name( 'link' ) . '" value="1" /><label for="' . $this->get_field_id( 'link' )
				     . '"> ';
				_e( "Hide Link?", 'windspeed' );
				echo '</label></p>';
			}
			echo '</div>';
		}
		
		public function update( $new_instance, $old_instance ) {
			$instance = [];
			foreach ( [ 'title', 'kmh', 'mph', 'beaufort', 'ms', 'knots', 'link' ] as $key ) {
				if ( isset( $new_instance[ $key ] ) ) {
					$instance[ $key ] = strip_tags( stripslashes( $new_instance[ $key ] ) );
				}
			}
			
			return $instance;
		}
	}