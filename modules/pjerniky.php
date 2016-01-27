<?php

	class WEZ_PIERNICZKA extends MODULE {
		public function register() {
			$this->useSession();
			$this->addMenu('Panel jedzenia pierników', '?WEZ_PIERNICZKA');
			$this->addMenu('Zdobądź pierniki! <3', '?WEZ_PIERNICZKA=runget');
		}

		public function run() {
			$this->createFrame('Stan', 'Masz pierników:' . $this->getSessionVariable('ilosc_pierniczkow') . '<br><a href="?WEZ_PIERNICZKA=ZJEDZ">Zjedz piernik</a>');
		}
		
		public function runget() {
			$this->createFrame('Poproś o pierniczki! <3', '<a href="?WEZ_PIERNICZKA=GET">Poproś</a>');
		}

		public function zjedz() {
			if ($this->getSessionVariable('ilosc_pierniczkow') > 0) {
				$this->setSessionVariable('ilosc_pierniczkow', $this->getSessionVariable('ilosc_pierniczkow') - 1);
				$this->alert('Nie jedz tyle!');	
			} else {
				$this->setSessionVariable('ilosc_pierniczkow', 0);
				$this->alert('Ni mo prjerników :C');	
			}
			$this->run();
		}
		
		public function get() {
			$TMP = rand(3,5);
			$this->setSessionVariable('ilosc_pierniczkow', $this->getSessionVariable('ilosc_pierniczkow') + $TMP );
			$this->createFrame('Otrzymałeś pierniczki!', 'Twój stan pierniczków wzrósł o: ' . $TMP );
		}
	}