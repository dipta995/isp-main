<?php
    include_once '../Classes/DbClass.php';

    class PackageClass extends DbClass{
        function __construct()
        {
            $this->connect(); 
        }
        public function insertPackage($data){
            $pacage_name = mysqli_escape_string($this->db, $data['pacage_name']);
            $pacage_speed = mysqli_escape_string($this->db, $data['pacage_speed']);
            $pacage_desc = mysqli_escape_string($this->db, $data['pacage_desc']);
            $pacage_price = mysqli_escape_string($this->db, $data['pacage_price']);
            $offer_status = mysqli_escape_string($this->db, $data['offer_status']);
            $month = mysqli_escape_string($this->db, $data['month']);

            if (empty($pacage_name) || empty($pacage_speed) || empty($pacage_desc) || empty($pacage_price)) {
				$txt = "<span style = 'color:red';>Field must not be empty</span>";
				return $txt;
			}elseif ( strlen($pacage_name) <3) {  
				return "<span style = 'color:red';>Pacage must have 3 digits.</span>";  
						 
			}else{
                $qry = "INSERT into pacage_table(pacage_name,pacage_speed,pacage_desc,pacage_price,offer_status,month)
                values('$pacage_name','$pacage_speed','$pacage_desc','$pacage_price','$offer_status','$month')";
                $result = $this->db->query($qry);
                if($result){
                    $txt = "<div class='alert alert-success'>Successfully new pacage Created</div>";
                    return $txt;
                }
            }
        }
        public function showPackageList(){
            $qry = "SELECT * FROM pacage_table WHERE delete_status=0";
            $result = $this->db->query($qry);
            return $result;
        }
        public function viewSinglePackage($pacid){
            $qry = "SELECT * FROM pacage_table WHERE pacage_id ='$pacid'";
            $result = $this->db->query($qry);
            return $result;
        }
        public function updatePackage($data,$pacid){
            $pacage_name = mysqli_escape_string($this->db, $data['pacage_name']);
            $pacage_speed = mysqli_escape_string($this->db, $data['pacage_speed']);
            $pacage_desc = mysqli_escape_string($this->db, $data['pacage_desc']);
            $pacage_price = mysqli_escape_string($this->db, $data['pacage_price']);
            $offer_status = mysqli_escape_string($this->db, $data['offer_status']);
            $month = mysqli_escape_string($this->db, $data['month']);

            if (empty($pacage_name) || empty($pacage_speed) || empty($pacage_desc) || empty($pacage_price)) {
				$txt = "<span style = 'color:red';>Field must not be empty</span>";
				return $txt;
			}elseif ( strlen($pacage_name) <3) {  
				return "<span style = 'color:red';>Pacage must have 3 digits.</span>";  
						 
            }else{
                $qry = "UPDATE pacage_table
                    SET 
                    pacage_name = '$pacage_name',
                    pacage_speed = '$pacage_speed',
                    pacage_desc = '$pacage_desc',
                    pacage_price = '$pacage_price',
                    offer_status = '$offer_status',
                    month = '$month'
                    WHERE pacage_id = '$pacid'";
                $result = $this->db->query($qry);
                if($result){
                    $txt = "<div class='alert alert-success'>Successfully pacage Updated</div>";
                    return $txt;
                }
            }
        }
        public function delPackage($pacage_id){
            $qry = "UPDATE pacage_table
                SET
                delete_status = '1' 
                WHERE pacage_id='$pacage_id'";
            $result = $this->db->query($qry);
            return $result;
        }
    }
?>