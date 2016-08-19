<?php
 /* Constants definition File. */

/*---------------------------------------------------------*/
// debug is for printing debug messages on the webpage
/*---------------------------------------------------------*/
$debug = 0;

//descsctiption of database
/*---------------------------------------------------------*/
$databasename = getenv('RESELLER_MYSQL_NAME') ?: 'UCF_admin';
$databasehost = getenv('RESELLER_MYSQL_HOST') ?: 'localhost';
$databaseusername = getenv('RESELLER_MYSQL_USER') ?: 'root';
$databasepassword = getenv('RESELLER_MYSQL_PASSWORD') ?: '';

/*---------------------------------------------------------*/

//descsctiption of database for white box connectivity
/*---------------------------------------------------------*/
$wbdatabasename = getenv('RESELLER_WB_MYSQL_NAME') ?: 'ucfdb_working_synced';	//'WBUCF';
$wbdatabasehost = getenv('RESELLER_WB_MYSQL_HOST') ?: 'localhost';
$wbdatabaseusername = getenv('RESELLER_WB_MYSQL_USER') ?: 'root';
$wbdatabasepassword = getenv('RESELLER_WB_MYSQL_PASSWORD') ?: '';

/*---------------------------------------------------------*/

//tables names variables
/*---------------------------------------------------------*/
$tuser='userpersonalinfo';
$tustatus='userstatus';
$tsalesuser='salespersonalinfo';
$admin_details='admin_users';
$email_messages_table='email_message_setting';
$reseller_details = 'reseller_contact';
$client_contact = 'client_contact';
/*---------------------------------------------------------*/

// Description of userpersonalinfo
/*---------------------------------------------------------*/
$userpersonalinfo_uid_field='uid';
$userpersonalinfo_uloginname_field='uloginname';
$userpersonalinfo_uloginpwd_field='uloginpwd';
$userpersonalinfo_flag_field='InfoFlag';
$userpersonalinfo_uname_field='uname';
$userpersonalinfo_uemail_field='uemail';


//Description of admin_users
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
$admin_uid = 'admin_id';
$admin_email = 'admin_email_add';
$admin_pass = 'admin_password';

//Description of reseller_users
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
$reseller_zid = 'reseller_zid';
$reseller_email = 'email';
$reseller_pass = 'password';


/* **************************************************** */

$domaintable = 'ch_account';


   
?>