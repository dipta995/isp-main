<?php 
	 
	include_once "../Classes/DbClass.php";
    
	class EmployeeClass extends DbClass
	{
		function __construct()
		{
			 $this->connect();
		}
		public function insertEmployee($data, $file){
			$e_name = mysqli_real_escape_string($this->db, $data['e_name']);
			$e_number = mysqli_real_escape_string($this->db, $data['e_number']);
			$e_address = mysqli_real_escape_string($this->db, $data['e_address']);
			$emp_salary = mysqli_real_escape_string($this->db, $data['emp_salary']);

			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $file['e_image']['name'];
			$file_size = $file['e_image']['size'];
			$file_temp = $file['e_image']['tmp_name'];

			$div            = explode('.', $file_name);
			$file_ext       = strtolower(end($div));
			$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "images/admin/".$unique_image;
			$move_image = "../images/admin/".$unique_image;

			if (empty($e_name) || empty($e_number) || empty($e_address)) {
				$txt = "<span style = 'color:red';>Field must not be empty</span>";
				return $txt;
			}else{
                move_uploaded_file($file_temp, $move_image);

                $qry = "INSERT into employee_table(e_name,e_number,e_address,e_image,emp_emp_salary)
                values('$e_name','$e_number','$e_address','$uploaded_image','$emp_salary')";
                $result = $this->db->query($qry);
                if($result){
                    $txt = "<div class='alert alert-success'>Successfully New Employee Created</div>";
                    return $txt;
                }
            }
		}

		public function searchselery($data)
		{
			$month = mysqli_real_escape_string($this->db, $data['month']);
			$year = mysqli_real_escape_string($this->db, $data['year']);
			if (empty($month)|| empty($year)) {
				$txt = "<span style = 'color:red';>No result Found</span>";
				return $txt;
			}else{
				$qry = "SELECT * from salary_table LEFT JOIN employee_table ON employee_table.ID = salary_table.e_ID where  month like '%{$month}%' and  year like '%{$year}%' ";
			$result = $this->db->query($qry);
			return $result;
			}
		}
		public function viewEmployee(){
			$qry = "SELECT * from employee_table";
			$result = $this->db->query($qry);
			return $result;
		}
	 
		public function employeeViewbyid($id){
			$qry = "SELECT * from employee_table where ID = $id";
			$result = $this->db->query($qry);
			$value = mysqli_fetch_assoc($result);
			return $value;
		}
		public function deleteEmployee($id){
			$qry = "SELECT * from employee_table where ID = '$id'";
            $result = $this->db->query($qry);
            if($result){
                while($delimg = $result->fetch_assoc()){
                    $dellink = '../'.$delimg['e_image'];
                    unlink($dellink);
                }
            }
            $query = "DELETE from employee_table where ID = '$id'";
            $deldata = $this->db->query($query);
            if($deldata){
                $txt = "<span style='color:green; font-size: 15px;'>Successfully Deleted</span>";
                return $txt;
            }
		}
		public function viewSingleEmployee($employeeid){
			$qry = "SELECT * from employee_table where ID = '$employeeid'";
			$result = $this->db->query($qry);
			return $result;
		}

		public function updateEmployee($data, $employeeid, $file){
			$e_name = mysqli_real_escape_string($this->db, $data['e_name']);
			$e_number = mysqli_real_escape_string($this->db, $data['e_number']);
			$e_address = mysqli_real_escape_string($this->db, $data['e_address']);
			$emp_salary = mysqli_real_escape_string($this->db, $data['emp_salary']);
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $file['e_image']['name'];
			$file_size = $file['e_image']['size'];
			$file_temp = $file['e_image']['tmp_name'];

			$div            = explode('.', $file_name);
			$file_ext       = strtolower(end($div));
			$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "images/admin/".$unique_image;
			$move_image = "../images/admin/".$unique_image;

			if (empty($e_name) || empty($e_number) || empty($e_address)) {
				$txt = "<span style = 'color:red';>Field must not be empty</span>";
				return $txt;
			}else{
              if (!empty($file_ext)) {
                move_uploaded_file($file_temp, $move_image);
                 $query = "UPDATE employee_table
                                SET
                                e_name             	= '$e_name',
                                e_number          	= '$e_number',
                                e_address          	= '$e_address',
								emp_salary          = '$emp_salary',
                                e_image             = '$uploaded_image'

                                WHERE ID       		= '$employeeid'";
              	} else{
                 $query = "UPDATE employee_table
                                SET
                                e_name             	= '$e_name',
                                e_number          	= '$e_number',
                                e_address          	= '$e_address',
								emp_salary          = '$emp_salary'

                                WHERE ID            = '$employeeid'";
              }
			  	$result = $this->db->query($query);
                if ($result) {
                  $txt=  "<span style='color:green; font-size: 15px;'>SuccessFully employee Updated</span>";
                  return $txt;
                }else{
                  $txt=  "<span style='color:red; font-size: 15px;'>Try again</span>";
                  return $txt;
                }
            }
		}
		public function insertSalary($data){
			$e_ID = mysqli_real_escape_string($this->db, $data['e_ID']);
			$month = mysqli_real_escape_string($this->db, $data['month']);
			$salary = mysqli_real_escape_string($this->db, $data['salary']);
			$year = mysqli_real_escape_string($this->db, $data['year']);

			if (empty($salary) || empty($year)) {
				$txt = "<span style = 'color:red';>Field must not be empty</span>";
				return $txt;
			}else{
				$result = $this->db->query("SELECT * FROM salary_table WHERE month = '$month' && year = '$year' && e_ID = '$e_ID'");
                
                if(mysqli_num_rows($result)>0){
                    $txt = "<div class='alert alert-danger'>Month and Year already exist</div>";
                    return $txt;
                }else{
					$qry = "INSERT into salary_table(e_ID,month,salary,year)
                	values('$e_ID','$month','$salary','$year')";
                	$result = $this->db->query($qry);
					if($result){
						$txt = "<div class='alert alert-success'>Successfully inserted</div>";
                    	return $txt;
					}
					
				}
            }
		}

		public function viewSalary($month,$year){
			$qry = "SELECT * FROM salary_table LEFT JOIN employee_table ON employee_table.ID = salary_table.e_ID  where  month like '%{$month}%' and  year like '%{$year}%' ";
			$result = $this->db->query($qry);
			return $result;
		}
		public function deleteSalary($id){
			$qry = "DELETE FROM salary_table WHERE s_id='$id'";
			$delsalary =$this->db->query($qry);
			if($delsalary){
                $txt = "<span style='color:green; font-size: 15px;'>Successfully Deleted</span>";
                return $txt;
            }
		}
		public function viewSingleSalary($salaryid){
			$qry = "SELECT * FROM salary_table LEFT JOIN employee_table ON employee_table.ID = salary_table.e_ID where s_id = '$salaryid'";
			$result = $this->db->query($qry);
			return $result;
		}
		public function viewEditSalary($salaryid){
			$qry = "SELECT * FROM salary_table LEFT JOIN employee_table ON employee_table.ID = salary_table.e_ID where s_id = '$salaryid'";
			$result = $this->db->query($qry);
			return $result;
		}
		public function updateSalary($data,$salaryid){
			$e_ID = mysqli_real_escape_string($this->db, $data['e_ID']);
			$month = mysqli_real_escape_string($this->db, $data['month']);
			$salary = mysqli_real_escape_string($this->db, $data['salary']);
			$year = mysqli_real_escape_string($this->db, $data['year']);

			if (empty($salary) || empty($year)) {
				$txt = "<span style = 'color:red';>Field must not be empty</span>";
				return $txt;
			}else{
				$qry = "UPDATE salary_table
							SET
							e_ID             	= '$e_ID',
							month          		= '$month',
							salary          	= '$salary',
							year             	= '$year'

							WHERE s_id          = '$salaryid'";
            }
			$result = $this->db->query($qry);
			if($result){
				$txt = "<span style='color:green; font-size: 15px;'>Salary Updated SuccessFully</span>";
				return $txt;
			}
		}
	}
 ?>