<?php

	class MO_MODULE extends MODULE {
		public function register() {
			$this->addLog('Registered MO_MODULE');
			$this->addMenu('MO', 'MO_MODULE.php');
		}
		
		public function run() {
			if( getForm('abc') ) {
				
			} else {
				
			}
		}
	}