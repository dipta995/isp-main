<?php 
	 
	include_once 'DbClass.php';

	class LoginClass extends DbClass
	{
		function __construct()
		{
			 $this->connect();
		}

		public function Customerlogin($user,$pass){
			$result = $this->db->query("SELECT * FROM customer_table WHERE customer_username = '$user' AND customer_password='$pass'");
			$value = mysqli_fetch_array($result);
			
				if (mysqli_num_rows($result)>0) {
					$_SESSION['loginauth'] = 'customer';
					$_SESSION['customerid'] = $value['customer_id'];
					$_SESSION['username'] = $value['customer_username'];
				 
						
					return "<script>window.location='index.php';</script>";
				 

				 }
				 else{
				 	return "<span style='color:#e6cdcd;background:#683030;height:30px;border-radius:10px;padding:10px;'>Incorrect UserName or Password</span>";
					
				}
		}

		public function CustomerReg($data){
			
			$firstName = mysqli_real_escape_string($this->db, $data['firstName']);
			$lastName = mysqli_real_escape_string($this->db, $data['lastName']);
			$customer_email = mysqli_real_escape_string($this->db, $data['customer_email']);
			$customer_username = mysqli_real_escape_string($this->db, $data['customer_username']);
			$customer_phone = mysqli_real_escape_string($this->db, $data['customer_phone']);
			$area_id = mysqli_real_escape_string($this->db, $data['area_id']);
			$customer_password = mysqli_real_escape_string($this->db, $data['customer_password']);
			$length = strlen ($customer_phone);  
			$lengthpass = strlen ($customer_password);  

			$result = $this->db->query("SELECT * FROM customer_table where customer_email='$customer_email'");
				 $rowcount = mysqli_num_rows($result);

			if (empty($area_id) || empty($customer_password) || empty($firstName) ||empty($lastName) ||empty($customer_email) ||empty($customer_username) ||empty($customer_phone)) {
				return "<span style = 'color:red';>Field Must not be Empty</span>";
			
			}elseif (!preg_match ("/^[a-zA-z]*$/", $firstName) ) {  
				return "<span style = 'color:red';>Only alphabets and whitespace are allowed For First name</span>";  
						 
			}elseif (!preg_match ("/^[a-zA-z]*$/", $lastName) ) {  
				return "<span style = 'color:red';>Only alphabets and whitespace are allowed For Last name</span>";  
						  
			}elseif ( $length != 11) {  
				return "<span style = 'color:red';>Mobile must have 11 digits.</span>";  
						 
			}elseif ( $lengthpass < 6) {  
				return "<span style = 'color:red';>Password must have 6 digits.</span>";  
						 
			}elseif ( $rowcount>0) {
				return "<span style = 'color:red';>(".$customer_email.")This Email Already exist</span>";
			}
			
			else{
		 
			$result = $this->db->query("SELECT * FROM customer_table WHERE customer_username = '$customer_username'");
			
				$value = mysqli_fetch_array($result);
				
				if (mysqli_num_rows($result)>0) {
					if(!empty($value['customer_email'])){
						return "<span style='color:#e6cdcd;background:#683030;height:30px;border-radius:10px;padding:10px;'>Already Registered</span>";
					}else{


					$customer_id = $value['customer_id'];

					$query = "UPDATE customer_table SET 
					firstName='$firstName',
					lastName='$lastName',
					customer_email='$customer_email',
					customer_username='$customer_username',
					customer_phone='$customer_phone',
					area_id='$area_id',
					customer_password='$customer_password'
					WHERE customer_id = $customer_id";

					$createnew = $this->db->query($query);
					}
					if ($createnew) {
						return  "<script> window.location = 'login.php';</script>";
					

					} else{
						return "<span style='color:#e6cdcd;background:#683030;height:30px;border-radius:10px;padding:10px;'>Something Wrong Please Contact and Collect your user Name First</span>";
						
					}

				}
	 		}
	 

		}
	
			public function insertUser($data){
			$customer_username = mysqli_real_escape_string($this->db, $data['customer_username']);

			if (!empty($customer_username)) {
				$result = $this->db->query("SELECT * FROM customer_table WHERE customer_username = '$customer_username'");
				 
				if (mysqli_num_rows($result)>0) {
					$txt = "<span style = 'color:red';>This Username Already Taken</span>";
					return $txt;
				}else{
				$qry = "INSERT INTO customer_table(customer_username)VALUES('$customer_username')";
				$sendcomp = $this->db->query($qry);
					if ($sendcomp) {
						return $txt = "<span style = 'color:green';>Successfully New user name created</span>";
					}
				}
			}else{
					$txt = "<span style = 'color:red';>Field must not be empty</span>";
					return $txt;
			}
			}

			public function updateUser($data, $id){
				$customer_username = mysqli_real_escape_string($this->db, $data['customer_username']);
				if(empty($customer_username)){
					$txt = "<span style = 'color:red';>Field must not be empty</span>";
					return $txt;
				}else{
					$result = $this->db->query("SELECT * FROM customer_table WHERE customer_username = '$customer_username'");
					if (mysqli_num_rows($result)>0) {
						$txt = "<span style = 'color:red';>This Username Already Taken</span>";
						return $txt;
					}else{
					$qry = "UPDATE customer_table SET customer_username = '$customer_username'
					where customer_id = $id";
					$result = $this->db->query($qry);
					if ($result) {
						$txt=  "<span style='color:green; font-size: 15px;'>SuccessFully username updated</span>";
						return $txt;
					  }
					}
				}
			}

			public function showUserList(){
				$qry = "SELECT * FROM customer_table";
				$result = $this->db->query($qry);
				return $result;
			}

			public function ShowCustomerlist(){
				$qry = "SELECT * FROM customer_table left join area_table on customer_table.area_id = area_table.areaId";
				$result = $this->db->query($qry);
				return $result;
			}

			public function blockuser($subs_id){
				$qry = "UPDATE customer_table SET 
						blockuser='1'
						WHERE customer_id = $subs_id";
						$readcom = $this->db->query($qry);
					if ($readcom) {
						return $txt = "complain Send";
					}
			}
			public function unblockuser($subs_id){
				$qry = "UPDATE customer_table SET  
						blockuser='0'
						WHERE customer_id = $subs_id";
						$readcom = $this->db->query($qry);
				if ($readcom) {
					return $txt = "complain Send";

				}
			}

			public function catUserById($id){
				$qry = "SELECT * from customer_table WHERE customer_id = '$id'";
				$result = $this->db->query($qry);
				return $result;
			}

			public function delUser($id){
				$qry = "DELETE from customer_table WHERE customer_id = '$id'";
				$result = $this->db->query($qry);
				if($result){
					$txt = "<span style = 'color:red';>Successfully deleted</span>";
					return $txt;
				}
			}
	}
 ?>