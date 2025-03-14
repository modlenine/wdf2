<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($_SERVER['HTTP_HOST'] == "localhost"){
	$mysqlServer = "192.168.20.22";

	// $mssql = "192.168.10.60";
	// $mssqlDB_sln = "SLC_STD_TEST";
	// $mssqlDB_tbb = "APPLY_STD_TEST";

	$mssql = "192.168.10.54";
	$mssqlDB_sln = "SLC_STD";
	$mssqlDB_tbb = "APPLY_STD";

}else{
	$mysqlServer = "localhost";
	$mssql = "192.168.10.54";
	$mssqlDB_sln = "SLC_STD";
	$mssqlDB_tbb = "APPLY_STD";
}



$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => $mysqlServer,
	'username' => 'ant',
	'password' => 'Ant1234',
	'database' => 'wdf2',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);



$db['saleecolour'] = array(
	'dsn'	=> '',
	'hostname' => $mysqlServer,
	'username' => 'ant',
	'password' => 'Ant1234',
	'database' => 'saleecolour',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);


//new config
$db['mssql_sln'] = array(
	'dsn' => '',
	'hostname' => $mssql,
	'username' => 'dataconnector',
	'password' => 'Admin1234',
	'database' => $mssqlDB_sln,
	'dbdriver' => 'sqlsrv',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => TRUE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
   );


   $db['mssql_tbb'] = array(
	'dsn' => '',
	'hostname' => $mssql,
	'username' => 'dataconnector',
	'password' => 'Admin1234',
	'database' => $mssqlDB_tbb,
	'dbdriver' => 'sqlsrv',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => TRUE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
   );



