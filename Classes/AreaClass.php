<?php 

	include_once 'DbClass.php';

	class AreaClass extends DbClass
	{
		 
		function __construct()
		{
			 $this->connect();
		}

		public function ShowArea(){
			return $result = $this->db->query("SELECT * FROM area_table where junk=0");
		}

		public function shwoareabyid($id){
			return $result = $this->db->query("SELECT * FROM area_table where junk=0 AND areaId = $id");
		}
		public function addarea($data)
		{
			$areaName = mysqli_real_escape_string($this->db, $data['areaName']);
			if (empty($areaName)) {
				return "<span style='color:red;'>Field must not be empty</span>";
			}else{
			$qry = "INSERT INTO area_table(areaName)VALUES('$areaName')";
				$sendcomp = $this->db->query($qry);
				if ($sendcomp) {
					return $txt = "<p style='color:#ecf0f1; background:#27ae60; height: 50px;border-radius:10px;padding: 10px;'>Complain Send</p>";
				}
			}
		}

		public function delarea($id)
		{
			$query = "UPDATE area_table SET 
			junk='1'
			WHERE areaId=$id";
		   $result = $this->db->query($query);
		   if ($result) {
			   return  "<script> window.location = 'add_area.php';</script>";
			   echo $txt = "<p style='color:#ecf0f1; background:#27ae60; height: 50px;border-radius:10px;padding: 10px;'>removed</p>";
		}
		}

		public function updatear($data,$id)
		{
			$areaName = mysqli_real_escape_string($this->db, $data['areaName']);
			if (empty($areaName)) {
				 return "<span style='color:red;'>Field must not be empty</span>";
			}else{

			
			 
			$query = "UPDATE area_table SET 
			areaName='$areaName'
			WHERE areaId=$id ";
		   $result = $this->db->query($query);
		   if ($result) {
			return  "<script> window.location = 'add_area.php';</script>";
			echo $txt = "<p style='color:#ecf0f1; background:#27ae60; height: 50px;border-radius:10px;padding: 10px;'>UPDATED </p>";
		}
	}
		}
	}
?>
 