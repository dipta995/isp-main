<?php 

	include_once 'DbClass.php';

	class PackageClass extends DbClass
	{
		public $today;
		 
		function __construct()
		{
			 $this->connect();
			 $this->today = date('Y-m-d');
		}

		public function ShowAllpack(){
			$result = $this->db->query("SELECT * FROM pacage_table WHERE delete_status = 0"); 
			return $result;
		}

		public function ShowAllpacksearch($search){
			 
			if ($search=='offer') {
				$result = $this->db->query("SELECT * FROM pacage_table WHERE delete_status = 0 AND offer_status = 1" ); 
				 
			}elseif ($search=='regular') {
				$result = $this->db->query("SELECT * FROM pacage_table WHERE delete_status = 0 AND offer_status = 0");
			}
			else{
				$result = $this->db->query("SELECT * FROM pacage_table WHERE delete_status = 0");
			}
			return $result;
		}
		public function ShowAllpacklimit(){
			$result = $this->db->query("SELECT * FROM pacage_table WHERE delete_status = 0 AND offer_status = 1 LIMIT 3"); 
			return $result;
		}
		
		public function ShowSelectedpack($packid){
			$result = $this->db->query("SELECT * FROM pacage_table WHERE pacage_id = $packid");
			return $result;
		}
		 public function ShowSelectedpackcus($customer_id){
			$result = $this->db->query("SELECT * FROM pacage_table left join subscribe_pacage on subscribe_pacage.pacage_id = pacage_table.pacage_id WHERE subscribe_pacage.customer_id='$customer_id' order by confirmation asc");
			return $result; 
		}
		 
		
		public function ApplyPack($data, $pacage_id, $customer_id){
			$subs_id = "";
		 
			$pacage_amount = mysqli_real_escape_string($this->db, $data['pacage_amount']);
			$subscribe_month = mysqli_real_escape_string($this->db, $data['subscribe_month']);
			$account_no = mysqli_real_escape_string($this->db, $data['account_no']);
			$code_no = mysqli_real_escape_string($this->db, $data['code_no']);
			$getway = mysqli_real_escape_string($this->db, $data['getway']);
			$length = strlen ($account_no);  
			if (empty($subscribe_month) || empty($account_no) || empty($code_no)|| empty($getway)) {
				return $txt = "<div style='color: red; height: 35px; border-radius: 10px; padding: 10px;'>Field Must not be empty</div>";
			}elseif ( $length < 11) {  
				return "<span style = 'color:red';>Account No must have 11 digits.</span>";  
						 
			}
			
			
			
			
			else{
				$result = $this->db->query("SELECT * FROM subscribe_pacage WHERE customer_id = '$customer_id' and pacage_id=$pacage_id and confirmation =1 or confirmation=0 ");
				$value = mysqli_fetch_array($result);
				if (!empty($value['subs_id']) && $value['subs_id']!=NULL) {
					$subs_id = $value['subs_id'];
				}
			
				if (mysqli_num_rows($result)>0) {
					 
					return $result = "<span style='color:#ecf0f1;background:red;height:30px;border-radius:10px;padding:10px;'>Already Added. To use Another Pack delect Present Subscription first</span>";

				}else{

				$qry = "INSERT INTO subscribe_pacage(pacage_id,customer_id,pacage_amount,subscribe_month,applytime,account_no,code_no,getway)VALUES('$pacage_id','$customer_id','$pacage_amount','$subscribe_month','$this->today','$account_no','$code_no','$getway')";
				$sendcomp = $this->db->query($qry);
				if ($sendcomp) {
					return  "<script> window.location = 'mysubcription.php';</script>";
					return $txt = "<span style='color:#ecf0f1;background:#27ae60;height:30px;border-radius:10px;padding:10px;'>Subscription added successfuly</span>";
				}
				}

			}
		}


		public function pacagealgorithm($customer_id){
			$qry = "SELECT * FROM subscribe_pacage WHERE customer_id=$customer_id";
			$result = $this->db->query($qry);
			$GETDATA = mysqli_fetch_array($result);
			$subscribe_month="";
			$aplytime="";
				if (mysqli_num_rows($result)>0) {
			$aplytime = $GETDATA['applytime'];
			$subscribe_month = $GETDATA['subscribe_month'];
		}
			$finishmonth = date('Y-m-d', strtotime("+$subscribe_month months", strtotime($aplytime)));
			if ($finishmonth==$this->today) {
				  $query = "UPDATE subscribe_pacage SET 
					 subscribe_month=0,
					 confirmation=3 
					 WHERE customer_id=$customer_id";
					$result = $this->db->query($query);
			}
		}

		public function datecountadmin($month,$apply){
			return $finishmonth = date('Y-m-d', strtotime("+$month months", strtotime($apply)));	 
		}

		public function SubsupdateasPaid($subs_id){
			 	$qry = "UPDATE subscribe_pacage SET 
					 	confirmation='1'
					 	WHERE subs_id = $subs_id";
					$result = $this->db->query($qry);
					if($result){
						return "<script>window.location='package.php';</script>";
					}
		}
		public function Subscribepackforadmin(){
			$qry = "SELECT * FROM subscribe_pacage INNER JOIN pacage_table ON subscribe_pacage.pacage_id = pacage_table.pacage_id INNER JOIN customer_table ON subscribe_pacage.customer_id = customer_table.customer_id order by confirmation asc";
			$result = $this->db->query($qry);
			return $result;
		}

public function delpackuser($id){
	$query = "DELETE from subscribe_pacage where subs_id = '$id'";
	$deldata = $this->db->query($query);
	if($deldata){
		return "<script>window.location='mysubcription.php';</script>";
		
		
	}
}

	}