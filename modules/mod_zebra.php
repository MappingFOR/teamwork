<?php

	/*
	
		Autor: Mariusz Olszowski
		Data: 27.01.2016
	
	*/
	
	class ZEBRA extends MODULE {
		public function register() {
			$this->addMenu( 'Zebra', '?ZEBRA' );
		}
		
		public function run() {
			$this->createFrame( 'Jestem zebrą', null );	
		}
	}