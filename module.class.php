<?php

	class MODULE {
		private $Logger;
		public static $Menu;
		
		public function register() {
			$this->Logger[] = 'Registered module: ' . get_class( $this );
		}

		public function getFile( string $FileName ) {
			return file_get_contents( $FileName );
		}
		
		public function createForm( string $Action, array $Structure, string $Method ) {
			$FormHTML;
			
			foreach( $Structure as $Field ) {
				
			}
			
			return $FormHTML;
		}
		
		public function addMenu( $Href, $Title ) {
			MODULE::$Menu[] = array( $Href, $Title );
		}
		
		public function addLog( $Text ) {
			$this->Logger[] = $Text;
		}
		
		public function getLog() {
			return $this->Logger;
		}
	}