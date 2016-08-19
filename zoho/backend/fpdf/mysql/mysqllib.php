<?php
  include 'mysqlconstants.php';
    error_reporting(E_ALL ^ E_DEPRECATED);

  /* -----------------------------------------------------------------
     Function: Connectdb()
     Description: Establish a connection to the database.
     ---------------------------------------------------------------*/
  function Connectdb() {
    include 'mysqlconstants.php';
    $db_handle = mysql_connect($databasehost, $databaseusername,
                                             $databasepassword);
    if(!$db_handle) {
      die ('Error!!! Could not connect to database' . mysql_error());
    } /* if */
    /* Store the handle in a session variable. */
    $_SESSION['dbHandle'] = $db_handle;
    return("connected");
  }

  /* -----------------------------------------------------------------
     Function: Opendb()
     Description: Open a connection to the database.
     ---------------------------------------------------------------*/
  function Opendb() {
    include 'mysqlconstants.php';
    $db_handle = $_SESSION['dbHandle'];
    if(!$db_handle) {
      die ('Error!! Database not connected' . mysql_error());
    } /* if */
    $error_status = mysql_select_db($databasename, $db_handle);
    if(!$error_status) {
      die ('Error!! Could not open database' . mysql_error());
    }  /* if */
    return ("opened");
  }

  /* -----------------------------------------------------------------
     Functions for getting tuple (field) name in table
     userpersonalinfo.
     ---------------------------------------------------------------*/
  function get_userpersonalinfo_uid(){
    include 'mysqlconstants.php';
    return ($userpersonalinfo_uid_field);
  }
  function get_userpersonalinfo_uname() {
    include 'mysqlconstants.php';
    return ($userpersonalinfo_uname_field);
  }
  function get_userpersonalinfo_uemail() {
    include 'mysqlconstants.php';
    return ($userpersonalinfo_uemail_field);
  }

  /* -----------------------------------------------------------------
     Functions for getting tuple (field) value in table
     userpersonalinfo.
     ---------------------------------------------------------------*/
  function readuid_userpersonalinfo($uname,$pwd) {
    include 'mysqlconstants.php';
    $query_result =
       mysql_query("SELECT * FROM ".$tuser." where 
                   ".$userpersonalinfo_uloginname_field."='".$uname."'
                             and 
                   ".$userpersonalinfo_uloginpwd_field."='".$pwd."'");
    if(!$query_result) {
      die(mysql_error()." >>>>> getusername err");
    } /* if */
    $row = mysql_fetch_array($query_result);
    if ($debug){
       print ('<br>UID :'.$row[$userpersonalinfo_uid_field]);
    }
    return ($row[$userpersonalinfo_uid_field]);
  }
/* -----------------------------------------------------------------
     Functions for getting tuple (field) value in table
     salespersonalinfo.
     ---------------------------------------------------------------*/
  function readuid_salespersonalinfo($uname,$pwd) {
    include 'mysqlconstants.php';
    $query_result =
       mysql_query("SELECT * FROM ".$tsalesuser." where 
                   ".$salespersonalinfo_uloginname_field."='".$uname."'
                             and 
                   ".$salespersonalinfo_uloginpwd_field."='".$pwd."'");
    if(!$query_result) {
      die(mysql_error()." >>>>> getusername err");
    } /* if */
    $row = mysql_fetch_array($query_result);
    if ($debug){
       print ('<br>UID :'.$row[$salespersonalinfo_uid_field]);
    }
    return ($row[$salespersonalinfo_uid_field]);
  }



  /* -----------------------------------------------------------------
     Functions for reading a single value from a database
     based on the table name, the matching parameter and the
     user id.
     ---------------------------------------------------------------*/
  function readparam($ref_id, $uid, $param, $tablename) {
    include 'mysqlconstants.php';
    $query_result = mysql_query("SELECT * FROM ".$tablename."
                                 where ".$ref_id."='".$uid."'");
    if(!$query_result) {
      die(mysql_error()." >>>>> getuid err");
    } /* if */
    $row = mysql_fetch_array($query_result);
    return ($row[$param]);
  }

  function writeparam($ref_id, $id, $param, $val, $tablename)
  {
    include 'mysqlconstants.php';
    if ($debug){
      print '<br>'.$ref_id.";". $id.";". $param.";". 
            $val.";".$tablename;
    }
    $query_result = mysql_query("UPDATE `$tablename` 
                                 SET $param = '$val'
                                 WHERE ".$ref_id." = '".$id."'");
    if(!$query_result) {
      die(mysql_error()." >>>>> getting uid err");
    } /* if */
    return ($query_result);
  }

  function writeparam_mulref($ref_id1, $id1, $ref_id2,
                             $id2, $param, $val, $tablename)
  {
    include 'mysqlconstants.php';
    if ($debug){
      print '<br>'.$ref_id.";". $id.";". $param.";". 
            $val.";".$tablename;
    }
    $query_result = mysql_query("UPDATE `$tablename` 
                                 SET $param = '$val'
                                 WHERE ".$ref_id1." = '".$id1."' and
                                 ".$ref_id2." = '".$id2."' ");

    if(!$query_result) {
      die(mysql_error()." >>>>> get uid err");
    } /* if */
    return ($query_result);
  }

 /*------------------------------------------------------------------------
  * Functiion to read /write all the columns in the table corresponding
    to a particular parameter.  Function to read all the rows in the table
    corresponding to a particular parameter.
  * ---------------------------------------------------------------------*/
  function read_column($tablename, $param)
  {
    include 'mysqlconstants.php';
    $query_result = mysql_query("SELECT $param FROM $tablename");
    if(!$query_result) {
      die(mysql_error()." >>>>> getnewclientid err");
      return ('1');
    }

    $i = 0;
    while($row = mysql_fetch_array($query_result)) {
      $column[$i] = $row[0];
      $i++;
    } /* while */
    return ($column);
  }

  function write_column($tablename, $param, $val)
  {
    include 'mysqlconstants.php';
    $query_result = mysql_query("UPDATE $tablename
                                       SET $param = '".$val."'
                                       WHERE $param IS NOT NULL");
    if(!$query_result){
                  die(mysql_error." >>>>>> field name error");
    }/* if */
  }

  function read_row($tablename, $param, $val){
    include 'mysqlconstants.php';
   // $debug=1;
    if ($debug){
      print ('<br>In getdat function: passed values are: 
             '.$tablename.','.$param.','.$val);
    }
    $query_result = mysql_query("select * from $tablename
                                 where $param = '".$val."'");
    if(!$query_result){
            $return_val = '0sd';
      return $return_val;
    }
    $row = mysql_fetch_array($query_result);
    $field_values = $row;
    return($field_values);
  }
  
  
  
  
function write_row($tablename, $uid, $userEmail, $password){
   include 'mysqlconstants.php';
    
    $query_result = mysql_query("INSERT INTO $tablename VALUES ('$uid', '$userEmail', '$password')");

    if(!$query_result) {
      die(mysql_error()." >>>>> get uid err");
    } /* if */
    return ($query_result);
  }
  
  
    /* -----------------------------------------------------------------
     Functions for getting tuple (field) value in table
     admin_users.
     ---------------------------------------------------------------*/
  function readuid_admin_details($uname,$pwd) {
    include 'mysqlconstants.php';
    $query_result =
       mysql_query("SELECT * FROM ".$admin_details." where 
                   ".$admin_email."='".$uname."'
                             and 
                   ".$admin_pass."='".$pwd."'");
    if(!$query_result) {
      die(mysql_error()." >>>>> getusername err");
    } /* if */
    $row = mysql_fetch_array($query_result);
    if ($debug){
       print ('<br>UID :'.$row[$userpersonalinfo_uid_field]);
    }
    return ($row[$admin_uid]);
  }
  
  function readuid_reseller_details($uname,$pwd) {
    include 'mysqlconstants.php';

    $query_result =
       mysql_query("SELECT * FROM ".$reseller_details." where 
                   ".$reseller_email."='".$uname."'
                             and 
                   ".$reseller_pass."='".$pwd."'");

    if(!$query_result) {
      die(mysql_error()." >>>>> getusername err");
    } /* if */
    $row = mysql_fetch_array($query_result);
    if ($debug){
       print ('<br>UID :'.$row[$reseller_email]);
    }
	
    $_SESSION['reseller_zid'] = $row[$reseller_zid];
    return ($row[$reseller_email]);
  }

  function readuid_reseller_fulldetails() {
    include 'mysqlconstants.php';
	$reseller_id = $_SESSION['reseller_zid'] ;
    $query_result =
       mysql_query("SELECT reseller_zid,fname,lname,email,phone,discount FROM reseller_contact where ".$reseller_zid." = '".$reseller_id."'");
    if(!$query_result) {
      die(mysql_error()." >>>>> getusername err");
    } /* if */
	
    $row = mysql_fetch_array($query_result);

    //return ($row['discount']);
	return $row;
	}

  /* add new user to the table */
    function insert_into_user($tablename,$uid,$email_add,$password,$status){
        include 'mysqlconstants.php';
        $query_result = mysql_query("INSERT INTO $tuser VALUES ('$uid', '$email_add', '$password','$status')");
        if(!$query_result) {
            die(mysql_error()." >>>>> get uid err");
        } /* if */
        return ($query_result);
    }
  
    function GetCompanyDetail($val){
    include 'mysqlconstants.php';
    if ($debug){
      print ('<br>In getdat function: passed values is: 
             '.$val);
    }
    $query_result = mysql_query("select * from reseller_contact
                                 where reseller_zid = '".$val."'");
    if(!$query_result){
            $return_val = '0sd';
      return $return_val;
    }
    $row = mysql_fetch_array($query_result);
    $field_values = $row;
    return($field_values);
  }
  
  function clieninfoupdate($FirstName,$LastName,$Email,$Password,$Phone,$Id)
  {
    include 'mysqlconstants.php';
    if ($debug){
      print '<br>'.$FirstName.";". $LastName.";". $Email.";". 
            $Phone;
    }
    $query_result = mysql_query("update reseller_contact set fname='".$FirstName."',lname = '".$LastName."',email = '".$Email."', password = '".$Password."', phone='".$Phone."' where reseller_zid = '".$Id."'");
    if(!$query_result) {
      die(mysql_error()." >>>>> getting uid err");
    } /* if */
    return ($query_result);
  }

  function whiteboxDomain()
  {
    include 'mysqlconstants.php';
include 'config.php';
    $db_handle = mysql_connect($wbdatabasehost, $wbdatabaseusername,
                                             $wbdatabasepassword);
    if(!$db_handle) {
      die ('Error!!! Could not connect to database' . mysql_error());
    } /* if */
    /* Store the handle in a session variable. */
    $_SESSION['dbHandle'] = $db_handle;
    $db_handle = $_SESSION['dbHandle'];
    if(!$db_handle) {
      die ('Error!! Database not connected' . mysql_error());
    } /* if */
    $error_status = mysql_select_db($wbdatabasename, $db_handle);
    if(!$error_status) {
      die ('Error!! Could not open database' . mysql_error());
    }  /* if */

	$query_result = mysql_query("SELECT * FROM `ch_whitebox` wb, `ch_account` ac WHERE `master_account_id` = `account_id` ");
    if(!$query_result){
            $return_val = 'null';
      return $return_val;
    }
    	$a=array();
    	$b=array();

	while($row  = mysql_fetch_array($query_result))
	{
		if($row['domain'] != $WBUCFDomain)
		{
			//$arr = $row['domain']."=".$row['z_account_id'];
			//array_push($a,$arr);
		}

		if($row['domain'] == $WBUCFDomain)
		{
			//$arr1 = $row['domain']."=".$row['z_account_id'];
		}

	}
	$arr1 = $WBUCFDomain."=".$accountId;
array_unshift($a, $arr1);

    $field_values = $a;

    return($field_values);

  }
?>