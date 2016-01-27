<?php

	if( !defined( 'HTML_DOM' ) ) die('HTML_DOM_NOT_INCLUDED');
	
	class TEMPLATE extends MODULE {
		public static $Structure;
		
		public static function getStructure() {
			return $this->Structure;
		}
		
		public function __construct( $Filename = 'tpl.html' ) {
			if( is_file( TEMPLATES . $Filename ) ) {
				$this::$Structure = file_get_html( TEMPLATES . $Filename );
			}
		}
		
		public function render() {
			$this::$Structure->find('title', 0)->innertext = 'Tytuł';
			echo $this::$Structure;
		}
	}
	
	$Template = new TEMPLATE( 'tpl.html' );