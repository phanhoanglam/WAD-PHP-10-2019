<?php 
	class Connect {
		protected $server = 'localhost';
		protected $username = 'root';
		protected $password = '';
		protected $database = 'wad-php-1019';

		public function connect() {
			$connect = mysqli_connect($this->server, $this->username, $this->password, $this->database);
			mysqli_set_charset($connect,"utf8");
			return $connect;
		}

	}
?>