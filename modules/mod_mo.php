<?php

	class MO_MODULE extends MODULE {
		public function register() {
			$Fields = array(
				array( 'Name' => 'field_1', 'Type' => 'Text' ),
				array( 'Name' => 'field_2', 'Type' => 'Text' ),
				array( 'Type' => 'submit', 'Value' => 'SEND FORM <3' )
			);
			
			echo $this->createFrame( 'Dodawanie liczb - modul Mariusza', $this->createForm( '?MO_MODULE', $Fields, 'POST' ) );
			echo $this->createFrame( ' Okienko', 'Czesc, jestem Mariusz' );
		}
		
		public function run() {
			if( ($F1 = $this->getField('field_1', 0)) && ($F2 = $this->getField('field_2', 0)) ) {
				echo $this->createFrame( 'Wynik dodawnia liczb', $F1 . ' + ' . $F2 . ' = ' . ($F1 + $F2) );
			}
			
			echo 123;
		}
	}