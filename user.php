
<?php
	//include connection file 
	include_once("connection.php");
	$db = new dbObj();
	$connString =  $db->getConnstring();

	//$params = $_REQUEST;
	
	$action = $_POST['action'];
	//echo $last_name;
	$empCls = new Employee($connString);

	switch($action) {
	 case 'reg':
		$empCls->insertEmployee($_POST);
	 break;
	 case 'login':
		$empCls->login($_POST);
	 break;
	 
	}
	
class Employee {
	protected $conn;
	protected $data = array();
	//public isExist = 0;
	function __construct($connString) {
		session_start();
		$this->conn = $connString;
	}
	
	function login($params) {
		$login_email = $_POST['login_email'];
		$login_password = $_POST['login_password'];
		$sql = "SELECT * FROM vendor WHERE email ='".$login_email."' AND pword = '".$login_password."' LIMIT 1";
		
		$result = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if($row['vendorid'] != NULL){
			$_SESSION["vendorid"] = $row['vendorid'];
			$_SESSION["email"] = $row['email'];
			$_SESSION["pword"] = $row['pword'];
			$_SESSION["first_name"] = $row['first_name'];
			$_SESSION["last_name"] = $row['last_name'];
			$_SESSION["status"] = $row['status'];
			$_SESSION["business_name"] = $row['business_name'];
			$_SESSION["address"] = $row['address'];
			$_SESSION["city"] = $row['city'];
			$_SESSION["state"] = $row['state'];
			$_SESSION["zip"] = $row['zip'];
			$_SESSION["phone"] = $row['phone'];
			$_SESSION["fax"] = $row['fax'];
			$_SESSION["website"] = $row['website'];
			$_SESSION["signed"] = $row['signed'];
			$_SESSION["signed_date"] = $row['signed_date'];
			$_SESSION["facebook"] = $row['facebook'];
			$_SESSION["twitter"] = $row['twitter'];
			$_SESSION["othersm"] = $row['othersm'];
			$_SESSION["client1_business"] = $row['client1_business'];
			$_SESSION["client1_poc"] = $row['client1_poc'];
			$_SESSION["client1_address"] = $row['client1_address'];
			$_SESSION["client1_phone"] = $row['client1_phone'];
			$_SESSION["client1_email"] = $row['client1_email'];
			$_SESSION["client2_business"] = $row['client2_business'];
			$_SESSION["client2_poc"] = $row['client2_poc'];
			$_SESSION["client2_address"] = $row['client2_address'];
			$_SESSION["client2_phone"] = $row['client2_phone'];
			$_SESSION["client2_email"] = $row['client2_email'];
			$_SESSION["client3_business"] = $row['client3_business'];
			$_SESSION["client3_poc"] = $row['client3_poc'];
			$_SESSION["client3_address"] = $row['client3_address'];
			$_SESSION["client3_phone"] = $row['client3_phone'];
			$_SESSION["client3_email"] = $row['client3_email'];
			$_SESSION["reg_receipt"] = $row['reg_receipt'];
			$_SESSION["good_bbs"] = $row['good_bbs'];
			$_SESSION["principal_title"] = $row['principal_title'];
			$_SESSION["link_related"] = $row['link_related'];
			$_SESSION["prev_license"] = $row['prev_license'];
			$_SESSION["memberid"] = $row['memberid'];
			$_SESSION["sale_online"] = $row['sale_online'];

			if($row['business_name'] != "" && $row['address'] != "" && $row['city'] !="" && $row['state'] !="" && $row['zip'] !="" && $row['phone'] !="")
				$_SESSION["check1"] = 1;	
			else
				$_SESSION["check1"] = 0;	

			if($row['client1_business'] != "" && $row['client1_poc'] != "" && $row['client1_address'] !="" && $row['client1_phone'] !="" && $row['client1_email'] !="")
				$_SESSION["check2"] = 1;			
			else
				$_SESSION["check2"] = 0;			

			$this->checkProductlist();

			if($row['signed'] == 1 && $row['signed_date'] != "")
				$_SESSION["check4"] = 1;	
			else
				$_SESSION["check4"] = 0;

			if($row['reg_receipt'] != "")
				$_SESSION["check5"] = 1;	
			else
				$_SESSION["check5"] = 0;	
			
			if ($row['app_submit_date']!=""){
				//app already submitted disable check - turn everyting on
				$_SESSION["locked"] = 1;
				
			}else{
				//run submit check
				$_SESSION["locked"] = 0;
			}
			if($row['email'] == "brinsons@yahoo.com")
				echo 1;
			else
			  echo 0;
		}
		else
		  echo "false"; 
  
			
	}
	function checkProductlist() {
		$sql = "SELECT * FROM `vendor_products` WHERE vendorid = ".$_SESSION["vendorid"]." LIMIT 1";
		
		$result = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_assoc($result);

		if($row['photofile'] != "")
			$_SESSION["check3"] = 1;
		else
			$_SESSION["check3"] = 0;
		//echo $this->checkedResult;
	}

	function insertEmployee($params) {
		date_default_timezone_set('America/Los_Angeles');
		$date = date('Y-m-d h:i:s a', time());
		if($this->checkExist($params) == "true"){
			echo 0;
			return;
		}else{
			$sql = "INSERT INTO `vendor` (first_name, last_name, pword, email, date_signedup, status, hq_status, reg_amount) VALUES('" . $params["first_name"] . "', '" . $params["last_name"] . "','" . $params["pword"] . "','" . $params["email"] . "', '". $date ."', 'Pending', 'Pending', '100.00');  ";
			$result = mysqli_query($this->conn, $sql) or die("error to insert employee data");

			$sql1 = "SELECT MAX(vendorid) as id FROM vendor";
			$result1 = mysqli_query($this->conn, $sql1);
			$row = mysqli_fetch_assoc($result1);
			
			$_SESSION["vendorid"] = $row['id'];
			$_SESSION["email"] = $params['email'];
			$_SESSION["pword"] = $params['pword'];
			$_SESSION["first_name"] = $params['first_name'];
			$_SESSION["last_name"] = $params['last_name'];
			$_SESSION["status"] = "Pending";
			$_SESSION["signed"] = 0;
			$_SESSION["signed_date"] = '';
			//mkdir('/products/'.$_SESSION["vendorid"], 0777, true);			
			
			echo $result;			
		}		
		
	}
	
	function checkExist($params) {
		
		$sql = $where = '';
		if( !empty($params['action']))
			$action = $params['action'];
		
		if( !empty($params['email']) ) {   
			$where .=" WHERE ";
			$where .=" email = '".$params['email']."'";
	   }

	   // getting total number records without any search
		$sql = "SELECT * FROM `vendor` ";
		
		//concatenate search sql if value exist
		if(isset($where) && $where != '') {

			$sql .= $where;
		}
		$queryRecords = mysqli_query($this->conn, $sql) or die($sql);
		
		$row = mysqli_fetch_assoc($queryRecords);
		if(count($row) > 0) return "true";
		else return "false";

	}	
}

?>
	