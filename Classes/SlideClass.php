<?php

	include_once "DbClass.php";

    class SlideClass extends DbClass{
        function __construct()
		{
			 $this->connect();
		}
        public function insertSlide($data, $file){
            $caption = mysqli_real_escape_string($this->db, $data['caption']);
            
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div            = explode('.', $file_name);
            $file_ext       = strtolower(end($div));
            $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "images/".$unique_image;
            $move_image = "../images/".$unique_image;
           

           
           if(empty($file_ext)){
                $txt = "<span style='color:red; font-size: 15px;'>Image is required</span>";
                return $txt;
            }else if(empty($caption)){
                $txt = "<span style='color:red; font-size: 15px;'>Caption is required</span>";
                return $txt;
            }else{
                move_uploaded_file($file_temp, $move_image);
                $query = "INSERT INTO slide_table(image,caption)VALUES('$uploaded_image','$caption')"; 
            $insert_row = $this->db->query($query);
                    $txt = "<span style='color:green; font-size: 15px;'>Image Added Successfully</span>";
                    return $txt;
             
            }
        }
        public function showSlide(){
            $query = "SELECT * from slide_table";
            $result = $this->db->query($query);
            return $result;
        }
        public function editSlide($id){
            
        }
        public function delSlide($id){
            $query = "SELECT * from slide_table where id = '$id'";
            $result = $this->db->query($query);
            if($result){
                while($delimg = $result->fetch_assoc()){
                    $dellink = '../'.$delimg['image'];
                    unlink($dellink);
                }
            }
            $query = "DELETE from slide_table where id = '$id'";
            $deldata = $this->db->query($query);
            if($deldata){
                $txt = "<span style='color:green; font-size: 15px;'>Successfully Deleted</span>";
                return $txt;
            }
        }
}
?>