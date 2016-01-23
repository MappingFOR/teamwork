<?php

	class MODULE {
		private $Logger;
		// public static $Menu;
		
		public function __construct() {
			$this->Logger[] = 'Registered module: ' . get_class( $this );
		}
		
		public function getSessionVariable( $Name ) {
			if( isSet( $_SESSION[ get_class( $this ) . $Name ] ) )
				return $_SESSION[ get_class( $this ) . $Name ];
			else
				return false;
		}
		
		public function setSessionVariable( $Name, $Value ) {
			$_SESSION[ get_class( $this ) . $Name ] = $Value;
			return true;
		}
		
		public function useSession() {
			if( session_status() == PHP_SESSION_NONE ) {
				session_start();
			}
		}
		
		public function register() {
			return true;
		}
		
		public function fieldHelper( $Field, $Name, $Default ) {
			if( isSet( $Field[ $Name ] ) )
				return $Field[ $Name ];
			else
				return $Default;
		}
		
		public function getField( $Name, $None ) {
			if( isSet( $_POST[ $Name ] ) )
				return $_POST[ $Name ];
			else
				return $None;
		}
		
		public function createFrame( $Title, $Text ) {
			return '<fieldset><legend>'. $Title .'</legend>'. $Text .'</fieldset>';
		}
		
		public function createForm( $Action, $Structure, $Method ) {
			$FormHTML = '<form action="' . $Action . '" method="' . $Method .'">';
			
			foreach( $Structure as $Field ) {
				$FormHTML .= '<input type="'.$this->fieldHelper($Field, 'Type', '').'" name="'.$this->fieldHelper($Field, 'Name', '').'" value="'.$this->fieldHelper($Field, 'Value', '').'" />';
			}
			
			$FormHTML .= '</form>';
			return $FormHTML;
		}
		
		/*
		public function addMenu( $Href, $Title ) {
			MODULE::$Menu[] = array( $Href, $Title );
		}*/
		
		public function addLog( $Text ) {
			$this->Logger[] = $Text;
		}
		
		public function getLog() {
			return $this->Logger;
		}
	}