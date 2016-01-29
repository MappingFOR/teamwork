<?php

	class DOMIDOMI extends MODULE {
		public function register() {
			$this->useSession();
			
			if( empty( $this->getSessionVariable('lista') ) ) {
				$this->setSessionVariable('lista', array( array('Nazwa' => 'Mariusz', 'Checked' => true), array('Nazwa' => 'Dominika', 'Checked' => false), array('Nazwa' => 'Pierniczky', 'Checked' => true) ));
			}
			
			$this->addMenu('Lista zakupów', '?DOMIDOMI');
			
			if( ($Pole = $this->getField('nazwa', false)) != false ) {
				$Pole = array( 'Nazwa' => $this->getField('nazwa', false), 'Checked' => false );
				
				$this->setSessionVariable('lista', array_merge( array($Pole), $this->getSessionVariable('lista') ) );
			}
		}
		
		public function run() {
			echo '<style> .domidomi a { text-decoration: none; }  li { list-style-type: none; } input[type="checkbox"]:checked ~ span { color: #F4F; }</style>';
			$PreHTMLed = '';
			
			if( !empty( $this->getSessionVariable('lista') ) )
			foreach( $this->getSessionVariable('lista') as $ID => $Element ) {
				$PreHTMLed .= '<a href="?DOMIDOMI=TOGGLE&ID='.$ID.'"><li><input type="checkbox" '.($Element['Checked'] ? 'checked' : '').' /> '. $Element['Nazwa'] .'</li></a>';
			}
			
			$this->createFrame('Do wzięcia', ($PreHTMLed ? '<ul class="domidomi">'.$PreHTMLed.'</ul>' : '') . '<a href="?DOMIDOMI=VIEW">Dodaj nowy...</a>' );
		}
		
		public function toggle() {
			if( isSet( $_GET['ID'] ) )
				if( !empty( $List = $this->getSessionVariable('lista') ) ) {
					$List[ $_GET['ID'] ]['Checked'] = !$List[ $_GET['ID'] ]['Checked'];
					$this->setSessionVariable('lista', $List);
				}
				
			$this->run();
		}
		
		public function view() {
			$this->run();
			
			$Fields = array(
				array('Type' => 'text', 'Name' => 'nazwa'),
				array('Type' => 'submit', 'Value' => 'Dodaj')
			);
			
			$this->createFrame( 'Dodawanie elementu', $this->createForm( '?DOMIDOMI', $Fields, 'POST' ) );
		}
		
		public function reset() {
			$this->setSessionVariable('lista', array());
		}
	}
	
	
	