
<?php
	//include connection file 
	include_once("../connection.php");
	$db = new dbObj();
	$connString =  $db->getConnstring();

	$submissionCls = new Submission($connString);
	$submissionCls->getVendorData($_POST);  //getting vendor data..
	
	$submissionCls->checkBusinessInfo();  //checking business info..
	$submissionCls->checkClientReference();  //checking client reference..
	$submissionCls->checkProductlist();  //checking product info..
	$submissionCls->checkAgreementState();  //checking product info..
	$submissionCls->checkPayment();  //checking product info..

class Submission {
	protected $conn;
	public $vendordata = array();
	public $checkedResult = "";
	
	function __construct($connString) {
		session_start();
		$this->conn = $connString;
		
	}
	function getVendorData() {
		$sql = "SELECT * FROM `vendor` WHERE vendorid = ".$_SESSION["vendorid"];
		
		$result = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$this->vendordata = $row;
	}
	function checkBusinessInfo() {
		$vendorData = $this->vendordata;
		if($vendorData['business_name'] != "" && $vendorData['address'] != "" && $vendorData['city'] !="" && $vendorData['state'] !="" && $vendorData['zip'] !="" && $vendorData['phone'] !="")
		{
			$this->checkedResult = $this->checkedResult."1";
			$_SESSION["check1"] = 1;			
		}
		else
		{
			$this->checkedResult = $this->checkedResult."0";	
			$_SESSION["check1"] = 0;			
		}	 
	}

	function checkClientReference() {
		$vendorData = $this->vendordata;
		if($vendorData['client1_business'] != "" && $vendorData['client1_poc'] != "" && $vendorData['client1_address'] !="" && $vendorData['client1_phone'] !="" && $vendorData['client1_email'] !="")
		{
			$this->checkedResult = $this->checkedResult."&1"; 
			$_SESSION["check2"] = 1;
		}	
		else
		{
			$this->checkedResult = $this->checkedResult."&0";
			$_SESSION["check2"] = 0;
		}	 
		//echo $this->checkedResult;
	}

	function checkProductlist() {
		$sql = "SELECT * FROM `vendor_products` WHERE vendorid = ".$_SESSION["vendorid"]." LIMIT 1";
		
		$result = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_assoc($result);

		if($row['photofile'] != "")
		{
			$this->checkedResult = $this->checkedResult."&1"; 
			$_SESSION["check3"] = 1;
		}	
		else
		{
			$this->checkedResult = $this->checkedResult."&0";
			$_SESSION["check3"] = 0;
		}	 
		//echo $this->checkedResult;
	}

	function checkAgreementState() {
		$vendorData = $this->vendordata;
		if($vendorData['signed'] == 1 && $vendorData['signed_date'] != "")
		{
			$this->checkedResult = $this->checkedResult."&1"; 
			$_SESSION["check4"] = 1;
		}	
		else
		{
			$this->checkedResult = $this->checkedResult."&0";
			$_SESSION["check4"] = 0;
		}	 
		//echo $this->checkedResult;
	}

	function checkPayment() {
		$vendorData = $this->vendordata;
		if($vendorData['reg_receipt'] != "")
		{
			$this->checkedResult = $this->checkedResult."&1"; 
			$_SESSION["check5"] = 1;
		}	
		else
		{
			$this->checkedResult = $this->checkedResult."&0";
			$_SESSION["check5"] = 0;
		}	 
		echo $this->checkedResult;
	}

}

?>
	