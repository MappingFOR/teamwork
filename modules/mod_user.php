<?php

	/*
	
		Autor: Mariusz Olszowski
		Data: 27.01.2016
	
	*/
	
	class USER extends MODULE {
		public function register() {
			$this->addMenuTitle( 'Użytkownik' );
			$this->addMenu( 'Lista użytkowników', '?USER' );
		
			if( $this->willRun() ) {
				$this->addMenu( 'Przeglądaj', '?USER=VIEW' );
				$this->addMenu( 'Dodaj', '?USER=ADD' );
				$this->addMenu( 'Edytuj', '?USER=EDIT' );
			}
			
			$this->addMenuSeparator();
		}
		
		public function run() {
			$this->createFrame( 'Zarządzanie użytkownikami', null );			
		}
		
		public function edit() {
			$this->createFrame('EDIT','widok edycji');
		}
		
		public function add() {
			$this->createFrame('ADD','widok dodawania');
		}
		
		public function view() {
			$this->createFrame('VIEW','widok podglądu');
		}
	}