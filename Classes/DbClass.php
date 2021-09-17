<?php 

class DbClass
{
	public $db;
	public function __construct()
	{
		 $this->connect();
	}
	public function connect(){
		$this->db = new mysqli('localhost', 'root', '', 'isp_db');
		if ($this->db == false) {
			$this->error = "Connection fail".$this->db->connect_error;
		}
	}
}

 

?>