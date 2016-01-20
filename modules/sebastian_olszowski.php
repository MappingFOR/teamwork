<?php

	class SEBASTIAN_OLSZOWSKI extends MODULE {
		public function register() {
			$this->addLog('Zostałem dodany');
			$this->addLog( $this->add( 2,3 ) );
		}
		
		public function add( $A, $B ) {
			return $A + $B;
		}
		
		public function run() {
			echo 1;
		}
	}