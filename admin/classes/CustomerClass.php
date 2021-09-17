<?php 
	 
	include_once "../Classes/DbClass.php";
    
	class CustomerClass extends DbClass
	{
		function __construct()
		{
			 $this->connect();
		}
			public function ShowCustomerlistreg(){
				$qry = "SELECT * FROM customer_table left join area_table on customer_table.area_id = area_table.areaId WHERE area_id != 0";
				$result = $this->db->query($qry);
				return $result;
			}
			public function blockuser($subs_id){
					$qry = "UPDATE customer_table SET 
							blockuser='1'
							WHERE customer_id = $subs_id";
						$result = $this->db->query($qry);
					if ($result) {
						return $txt = "Block Successfuly";
					}
			}
			public function unblockuser($subs_id){
					$qry = "UPDATE customer_table SET  
							blockuser='0'
							WHERE customer_id = $subs_id";
						$result = $this->db->query($qry);
				if ($result) {
					return $txt = "Unblock Successfuly";

				}
			}

    }
?>