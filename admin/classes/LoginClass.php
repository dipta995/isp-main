<?php 
	 
	include_once "../Classes/DbClass.php";
    
	class LoginClass extends DbClass
	{
		function __construct()
		{ 
			 $this->connect();
		}

		public function adminlogin($email, $pass){
			if(empty($email)||empty($pass)){
				$txt = "<span style='color:#e6cdcd;background:#683030;height:30px;border-radius:10px;padding:10px;'>Field must not be empty</span>";
					return $txt;
			}else{

			
			$result = $this->db->query("SELECT * FROM admin_table WHERE admin_email = '$email' AND admin_password='$pass'");
			$value = mysqli_fetch_array($result);
			
				if (mysqli_num_rows($result)>0) {
					session_start();
					$_SESSION['loginauth'] = 'admin';
					$_SESSION['admin_id'] = $value['admin_id'];
					$_SESSION['username'] = $value['admin_email'];
					$_SESSION['status'] = $value['status'];
						header('Location: index.php');
				 }
				 else{
				 	$txt = "<span style='color:#e6cdcd;background:#683030;height:30px;border-radius:10px;padding:10px;'>Incorrect Email or Password</span>";
					return $txt;
				}
			}
		}

		public function insertAdminName($data, $file){
			$admin_email = mysqli_real_escape_string($this->db, $data['admin_email']);
			$admin_password = mysqli_real_escape_string($this->db, $data['admin_password']);
			$status = mysqli_real_escape_string($this->db, $data['status']);

			$lengthpass = strlen ($admin_password);  

			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $file['image']['name'];
			$file_size = $file['image']['size'];
			$file_temp = $file['image']['tmp_name'];

			$div            = explode('.', $file_name);
			$file_ext       = strtolower(end($div));
			$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext; 
			$uploaded_image = "images/admin/".$unique_image;
			$move_image = "../images/admin/".$unique_image;
			if (empty($admin_email) || empty($admin_password) || empty($status)){
				$txt = "<span style = 'color:red';>Field must not be empty</span>";
				return $txt;
			}
			else {
				$result = $this->db->query("SELECT * FROM admin_table WHERE admin_email = '$admin_email'");
				 
				if (mysqli_num_rows($result)>0) {
					$txt = "<span style = 'color:red';>Already Taken Email</span>";
					return $txt;
				}else{
					if ( $lengthpass < 6) {  
						return "<span style = 'color:red';>Password must have 6 digits.</span>";  
								 
					}else{

					
	
					$qry = "INSERT into admin_table(admin_email,admin_password,image,status)
					values('$admin_email','$admin_password','$uploaded_image','$status')";
					$result = $this->db->query($qry);
					if($result){
						move_uploaded_file($file_temp, $move_image);
						$txt = "<div class='alert alert-success'>Successfully New Role Created</div>";
						return $txt;
					}
				}
				}
			}
		}
		public function viewAdminName(){
			$qry = "SELECT * from admin_table";
			$result = $this->db->query($qry);
			return $result;
		}
		public function deleteAdmin($id){
			$qry = "SELECT * from admin_table where admin_id = '$id'";
            $result = $this->db->query($qry);
            if($result){
                while($delimg = $result->fetch_assoc()){
                    $dellink = '../'.$delimg['image'];
                    unlink($dellink);
                }
				
            }
            $query = "DELETE from admin_table where admin_id = '$id'";
            $deldata = $this->db->query($query);
            if($deldata){
                $txt = "<span style='color:green; font-size: 15px;'>Successfully Deleted</span>";
                return $txt;
            }
		}
		public function viewAdmin($adminid){
			$qry = "SELECT * from admin_table where admin_id = '$adminid'";
			$result = $this->db->query($qry);
			return $result;
		}

		public function updateAdmin($data, $adminid, $file){
			$admin_email = mysqli_real_escape_string($this->db, $data['admin_email']);
			$admin_password = mysqli_real_escape_string($this->db, $data['admin_password']);
			$status = mysqli_real_escape_string($this->db, $data['status']);
			$lengthpass = strlen ($admin_password);  

			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $file['image']['name'];
			$file_size = $file['image']['size'];
			$file_temp = $file['image']['tmp_name'];

			$div            = explode('.', $file_name);
			$file_ext       = strtolower(end($div));
			$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "images/admin/".$unique_image;
			$move_image = "../images/admin/".$unique_image;

			if (empty($admin_email) || empty($admin_password) || empty($status)) {
                $txt = "<span style='color:red; font-size: 15px;'>Field must not be empty</span>";
                return $txt;
            }else if ( $lengthpass < 6) {  
				return "<span style = 'color:red';>Password must have 6 digits.</span>";  
						 
			}else{
              if (!empty($file_name)) {
                
                 $query = "UPDATE admin_table
                                SET
                                admin_email             	= '$admin_email',
                                admin_password          	= '$admin_password',
                                image                 		= '$uploaded_image',
                                status                 		= '$status'

                                WHERE admin_id              = '$adminid'";
								move_uploaded_file($file_temp, $move_image);
              	} else{
                 $query = "UPDATE admin_table
                                SET
                                admin_email             	= '$admin_email',
                                admin_password          	= '$admin_password',
                                image                 		= '$uploaded_image',
                                status                 		= '$status'

                                WHERE admin_id              = '$adminid'";
              }
			  	$result = $this->db->query($query);
                if ($result) {
                  $txt=  "<span style='color:green; font-size: 15px;'>SuccessFully Profile Updated</span>";
                  return $txt;
                }else{
                  $txt=  "<span style='color:red; font-size: 15px;'>Someting went wrong please try again</span>";
                  return $txt;
                }
            }
         
             	
		}

	}
 ?>