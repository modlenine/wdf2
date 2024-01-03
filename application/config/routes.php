<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Zone ของเมนูการตั้งค่า
$route['accode.html'] = 'main/main/add_accode_page';
$route['currency.html'] = 'main/main/add_currency_page';
$route['accodemaster.html'] = 'main/main/add_accodeM_page';
$route['userpermission.html'] = 'main/main/manageuser_permission';
// Zone ของเมนูการตั้งค่า


// Zone ของใบ Advance
$route['advance.html'] = 'main/advance';
$route['new-document-advance.html'] = 'main/advance/addnew';
$route['advance_view.html/(:any)/(:any)'] = 'main/advance/advance_viewfull_page/$1/$2';
$route['advance_report.html'] = 'main/advance/advance_report';


// Zone ของใบ Normal
$route['normal.html'] = 'main/normal';
$route['new-document-normal.html'] = 'main/normal/addnew';
$route['normal_view.html/(:any)/(:any)'] = 'main/normal/normal_viewfull_page/$1/$2';
$route['normal_report.html'] = 'main/normal/normal_report';



// Zone ของใบ Salary
$route['salary.html'] = 'main/salary';
$route['new-document-salary.html'] = 'main/salary/addnew';
$route['salary_view.html/(:any)/(:any)'] = 'main/salary/salary_viewfull_page/$1/$2';
$route['salary_report.html'] = 'main/salary/salary_report';


// Zone ของใบ PO
$route['po.html'] = 'main/po';
$route['new-document-po.html'] = 'main/po/addnew';
$route['po_view.html/(:any)/(:any)'] = 'main/po/po_viewfull_page/$1/$2';
$route['po_report.html'] = 'main/po/po_report';