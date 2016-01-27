<?php

	class WEZ_PIERNICZKA extends MODULE {
		public function register() {
			$this->useSession();
			$this->addMenu('Weź Mariusza', '?WEZ_PIERNICZKA');
		}

		public function run() {

			$this->createFrame('Weź Mariusza', 'Masz pierników:' . $this->getSessionVariable('ilosc_pierniczkow') . '<br><a href="?WEZ_PIERNICZKA=ZJEDZ">Zjedz piernik</a>');

		}

		public function zjedz() {
			if ($this->getSessionVariable('ilosc_pierniczkow') > 0) {
				$this->setSessionVariable('ilosc_pierniczkow', $this->getSessionVariable('ilosc_pierniczkow') - 1);
				$this->alert('Nie jedz tyle Mariusz.');	
			} else {
				$this->alert('Już zjadłeś za dużo grubasie.');	
			}
			$this->run();
		}
	}