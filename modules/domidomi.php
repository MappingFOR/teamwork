<?php

	class DOMIDOMI extends MODULE {
		public function register() {
			$this->useSession();
			$this->addMenu('Lista zakupów', '?DOMIDOMI');
			
			if( ($Pole = $this->getField('nazwa', false)) != false ) {
				$this->setSessionVariable('lista', array_merge(array($Pole), $this->getSessionVariable('lista') ) );
			}
			
		}
		
		public function run() {
			echo '<style> li { list-style-type: none; } input[type="checkbox"]:checked ~ span { color: #F4F; }</style>';
			$this->createFrame('Lista zakupow', '<ul><li><input type="checkbox" /><span>' . implode( '</span></li><li><input type="checkbox" checked /><span>', $this->getSessionVariable('lista') ) . '</span></li></ul><a href="?DOMIDOMI=VIEW">Dodaj nowy...</a>' );
		}
		
		public function view() {
			$this->run();
			
			$Fields = array(
				array('Type' => 'text', 'Name' => 'nazwa'),
				array('Type' => 'submit', 'Value' => 'Dodaj')
			);
			
			$this->createFrame( 'asd', $this->createForm( '.', $Fields, 'POST' ) );
		}
	}
	
	
	