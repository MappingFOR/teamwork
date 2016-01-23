<?php

	/*
	
		Autor: Mariusz Olszowski
		Data: 23.01.2016
	
	*/
	
	class DODAWANIE extends MODULE {
		// register() - metoda uruchamiana przy ładowaniu modułu
		public function register() {
			// Zaznaczenie, że moduł korzysta z sesji
			$this->useSession();
			
			// Przygotowanie pól formularza
			$Fields = array(
				array( 'Name' => 'field_1', 'Type' => 'Text' ),
				array( 'Name' => 'field_2', 'Type' => 'Text' ),
				array( 'Type' => 'submit', 'Value' => 'SEND FORM <3' )
			);
			
			// Wyświetlanie ramki z powitaniem
			echo $this->createFrame( ' Okienko', 'Czesc, jestem Mariusz' );
			
			// Utworzenie ramki z formularzem, przekierowującego na ?DODAWANIE (co uruchamia metodę run())
			echo $this->createFrame( 'Dodawanie liczb - modul Mariusza; Podaj liczby rozne od 0', $this->createForm( '?DODAWANIE', $Fields, 'POST' ) );
		}
		
		// metoda uruchamiania modułu
		public function run() {
			// pobranie liczb z formularza i dodanie
			if( ($F1 = $this->getField('field_1', 0)) && ($F2 = $this->getField('field_2', 0)) ) {
				echo $this->createFrame( 'Wynik dodawnia liczb', $F1 . ' + ' . $F2 . ' = ' . ($F1 + $F2) );
				
				// zwiększenie zmiennej sesji o 1
				$this->setSessionVariable( 'ilosc', $this->getSessionVariable( 'ilosc' ) + 1 );
			}
			
			// wyświetlenie wartości zmiennej sesji
			echo $this->createFrame( 'Ilosc dodawan', $this->getSessionVariable( 'ilosc' ) );
		}
	}