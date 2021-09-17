<?php 
	 
	include_once 'DbClass.php';
	
	class ComplainClass extends DbClass
	{
		 
		function __construct()
		{
			 $this->connect();
		}

		public function ShowComplain(){  
			$result = $this->db->query("SELECT * FROM complain_table order by com_time desc");
			return $result;
		}
		public function viewComplain($com_id){  
			$result = $this->db->query("SELECT * FROM complain_table where com_id = '$com_id'");
			return $result;
		}
		public function ShowComplainunread(){
			$result = $this->db->query("SELECT * FROM complain_table where com_read=0");
			$result = mysqli_num_rows($result);
			return $result;
		}

		public function SendComplain($data){
			$complain = mysqli_real_escape_string($this->db, $data['complain']);
			$customer_id = mysqli_real_escape_string($this->db, $data['customer_id']);
			$customer_username = mysqli_real_escape_string($this->db, $data['customer_username']);
			$length = strlen ($complain);  
			if (empty($complain)) {
				return $txt = "<p style='color: #e6cdcd;background: #683030;height: 50px;border-radius:10px;padding: 10px;'> Please Write Your Complain</p>";
			}elseif ( $length > 300) {  
				return "<span style = 'color:red';>Maximum 300 Word required.</span>";  
						 
			}else{
				$qry = "INSERT INTO complain_table(complain,customer_id,customer_username)VALUES('$complain','$customer_id','$customer_username')";
				$sendcomp = $this->db->query($qry);
				if ($sendcomp) {
					return $txt = "<p style='color:#ecf0f1; background:#27ae60; height: 50px;border-radius:10px;padding: 10px;'>Complain Send</p>";
				}
			}
		}
		public function Makeread($com_id){
			 $qry = "UPDATE complain_table SET 
					 com_read='1'
					 WHERE com_id = $com_id";
					 $readcom = $this->db->query($qry);
				if ($readcom) {
					return $txt = "complain Send";

				}
		}

	}