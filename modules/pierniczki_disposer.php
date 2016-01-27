<?php

	class PIERNICZKI_DISPOSER extends MODULE {
		public function register() {
			$this->useSession();
			$this->addMenu('Zdobądź pierniki! <3', '?PIERNICZKI_DISPOSER');
		}
		
		public function run() {
			$this->createFrame('Poproś Dominikę o pierniczki! <3', '<a href="?PIERNICZKI_DISPOSER=GET">Poproś</a>');
		}
		
		public function get() {
			$TMP = rand(3,5);
			$this->setSessionVariable('ilosc_pierniczkow', $this->getSessionVariable('ilosc_pierniczkow') + $TMP );
			$this->createFrame('Otrzymałeś pierniczki!', 'Twój stan pierniczków wzrósł o: ' . $TMP );
			
			$this->alert( ' ni mosz pjernikuff ' );
		}
	}