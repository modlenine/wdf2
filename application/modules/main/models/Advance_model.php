<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Advance_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model("advanceemail_model" , "advemail");
    }

    public function getAcCodeList()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getAcCodeList"){

            $inputAccode = $received_data->accodeInput;
            $deptcode = getUser()->DeptCode;

            $idArr = explode(" ", $inputAccode); 
            $context = " CONCAT(detailwdf_name,' ', 
            detailwdf_accodename,' ', 
            detailwdf_accode) "; 
            $condition = " $context LIKE '%" . implode("%' OR $context LIKE '%", $idArr) . "%' "; 
            $sql = $this->db->query("SELECT
                detail_wdf.detailwdf_id,
                detail_wdf.detailwdf_refid,
                detail_wdf.detailwdf_name,
                detail_wdf.detailwdf_accodename,
                detail_wdf.detailwdf_accode,
                detail_wdf.detailwdf_deptcode
                FROM
                detail_wdf 
                WHERE $condition AND detailwdf_deptcode = '$deptcode'
                ORDER BY detailwdf_accodename ASC
            ");

            $output = array(
                "msg" => "ดึงข้อมูลรายการบัญชีสำเร็จ",
                "status" => "Select Data Success",
                "result" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลรายการบัญชีไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "result" => $sql->result()
            );
        }

        echo json_encode($output);
    }


    public function saveDataAdvanceNew()
    {
        if($this->input->post("ip-adv-areaid") != "" && $this->input->post("ip-advdetail-priceTotal") != ""){
            $getFormCode = getRuningCode(100);
            $getFormNo = getFormNo_adv();

            // Save Data to wdf_master table
            $arinsertData = array(
                "wdf_formno" => $getFormNo,
                "wdf_formcode" => $getFormCode,
                "wdf_areaid" => $this->input->post("ip-adv-areaid"),
                "wdf_doctype" => "adv",
                "wdf_status" => "Open",
                "wdf_currency" => $this->input->post("ip-adv-currency"),
                "wdf_memo" => $this->input->post("ip-adv-memo"),
                "wdf_userreceive" => $this->input->post("ip-adv-userreceive"),
                "wdf_userreceived_detail" => $this->input->post("ip-adv-userreceiveDetail"),
                "wdf_vat1" => $this->input->post("ip-advdetail-vat7"),
                "wdf_vat2" => $this->input->post("ip-advdetail-vat3"),
                "wdf_pricenonevat" => conPrice($this->input->post("ip-advdetail-priceNonVat")),
                "wdf_pricevat1" => conPrice($this->input->post("ip-advdetail-vat7Price")),
                "wdf_pricevat2" => conPrice($this->input->post("ip-advdetail-vat3Price")),
                "wdf_pricewithvat" => conPrice($this->input->post("ip-advdetail-priceTotal")),
                "wdf_user" => getUser()->Fname." ".getUser()->Lname,
                "wdf_ecode" => getUser()->ecode,
                "wdf_deptcode" => getUser()->DeptCode,
                "wdf_dept" => getUser()->Dept,
                "wdf_datetime" => date("Y-m-d H:i:s"),
            );
            $this->db->insert("wdf_master" , $arinsertData);
            // Save Data to wdf_master table


            // Save wdf trans
            $detailAutoid = $this->input->post("input-detailautoid");
            foreach($detailAutoid as $key => $detailAutoids){
                $arinsertTrans = array(
                    "tr_mas_formcode" => $getFormCode,
                    "tr_areaid" => $this->input->post("ip-adv-areaid"),
                    "tr_mas_doctype" => "adv",
                    "tr_detail_refid" => $detailAutoids,
                    "tr_detailname" => $this->input->post("input-detaillist")[$key],
                    "tr_detaildeptcode" => $this->input->post("input-deptcode")[$key],
                    "tr_detailaccode" => $this->input->post("input-accode")[$key],
                    "tr_detailaccodename" => $this->input->post("input-accodename")[$key],
                    "tr_money" => conPrice($this->input->post("input-price")[$key]),
                    "tr_username" => getUser()->Fname." ".getUser()->Lname,
                    "tr_ecode" => getUser()->ecode,
                    "tr_deptcode" => getUser()->DeptCode,
                    "tr_dept" => getUser()->Dept,
                    "tr_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->insert("wdf_trans" , $arinsertTrans);
            }
            // Save wdf trans


            // Save File
            $fileInput = "ip-advdetail-file";
            uploadImageAdv($fileInput , $getFormCode , $this->input->post("ip-adv-areaid"));

            $this->advemail->send_tobudget($getFormCode , $getFormNo);

            $output = array(
                "msg" => "บันทึกข้อมูลสำเร็จ",
                "status" => "Insert Data Success",
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูลไม่สำเร็จ",
                "status" => "Insert Data Not Success",
            );
        }

        echo json_encode($output);
    }

    public function saveDataAdvanceNew_edit()
    {
        if($this->input->post("ipe-adv-areaid") != "" && $this->input->post("ipe-advdetail-priceTotal") != ""){

            $formcode = $this->input->post("edit_formcode");

            // Save Data to wdf_master table
            $arUpdateData = array(
                "wdf_areaid" => $this->input->post("ipe-adv-areaid"),
                "wdf_doctype" => "adv",
                "wdf_status" => "Edit",
                "wdf_currency" => $this->input->post("ipe-adv-currency"),
                "wdf_memo" => $this->input->post("ipe-adv-memo"),
                "wdf_userreceive" => $this->input->post("ipe-adv-userreceive"),
                "wdf_userreceived_detail" => $this->input->post("ipe-adv-userreceiveDetail"),
                "wdf_vat1" => $this->input->post("ipe-advdetail-vat7"),
                "wdf_vat2" => $this->input->post("ipe-advdetail-vat3"),
                "wdf_pricenonevat" => conPrice($this->input->post("ipe-advdetail-priceNonVat")),
                "wdf_pricevat1" => conPrice($this->input->post("ipe-advdetail-vat7Price")),
                "wdf_pricevat2" => conPrice($this->input->post("ipe-advdetail-vat3Price")),
                "wdf_pricewithvat" => conPrice($this->input->post("ipe-advdetail-priceTotal")),
                "wdf_user" => getUser()->Fname." ".getUser()->Lname,
                "wdf_ecode" => getUser()->ecode,
                "wdf_deptcode" => getUser()->DeptCode,
                "wdf_dept" => getUser()->Dept,
                "wdf_datetime" => date("Y-m-d H:i:s"),
            );
            $this->db->where("wdf_formcode" , $formcode);
            $this->db->update("wdf_master" , $arUpdateData);
            // Save Data to wdf_master table


            // Save wdf trans
            // Delete Frist
            $this->db->where("tr_mas_formcode" , $formcode);
            $this->db->where("tr_mas_doctype" , "adv");
            $this->db->delete("wdf_trans");

            $detailAutoid = $this->input->post("inpute-detailautoid");
            foreach($detailAutoid as $key => $detailAutoids){
                $arinsertTrans = array(
                    "tr_mas_formcode" => $formcode,
                    "tr_areaid" => $this->input->post("ipe-adv-areaid"),
                    "tr_mas_doctype" => "adv",
                    "tr_detail_refid" => $detailAutoids,
                    "tr_detailname" => $this->input->post("inpute-detaillist")[$key],
                    "tr_detaildeptcode" => $this->input->post("inpute-deptcode")[$key],
                    "tr_detailaccode" => $this->input->post("inpute-accode")[$key],
                    "tr_detailaccodename" => $this->input->post("inpute-accodename")[$key],
                    "tr_money" => conPrice($this->input->post("inpute-price")[$key]),
                    "tr_username" => getUser()->Fname." ".getUser()->Lname,
                    "tr_ecode" => getUser()->ecode,
                    "tr_deptcode" => getUser()->DeptCode,
                    "tr_dept" => getUser()->Dept,
                    "tr_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->insert("wdf_trans" , $arinsertTrans);
            }
            // Save wdf trans


            // Save File
            $fileInput = "ipe-advdetail-file";
            uploadImageAdv($fileInput , $formcode , $this->input->post("ipe-adv-areaid"));
            

            $output = array(
                "msg" => "บันทึกข้อมูลสำเร็จ",
                "status" => "Insert Data Success",
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูลไม่สำเร็จ",
                "status" => "Insert Data Not Success",
            );
        }

        echo json_encode($output);
    }


    // public function advance_list()
    // {
    //     // DB table to use
    //     $table = 'list_advance';

    //     // Table's primary key
    //     $primaryKey = 'wdf_autoid';

    //     $columns = array(
    //         array('db' => 'wdf_formno', 'dt' => 0,
    //             'formatter' => function($d , $row){
    //                 $formcode = conFormNoToFormCode($d);
    //                 $output ='
    //                 <a href="javascript:void(0)" class="select_form"
    //                     data_formcode="'.$formcode.'"
    //                     data_formno="'.$d.'"
    //                 ><b>'.$d.'</b></a>
    //                 ';
    //                 return $output;
    //             }
    //         ),
    //         array('db' => 'wdf_areaid', 'dt' => 1 ,
    //             'formatter' => function($d , $row){
    //                 $resultCon = "";
    //                 switch($d){
    //                     case "sc":
    //                         $resultCon = "Salee Colour";
    //                         break;
    //                     case "pa":
    //                         $resultCon = "Poly Meritasia";
    //                         break;
    //                     case "ca":
    //                         $resultCon = "Composite Asia";
    //                         break;
    //                     case "st":
    //                         $resultCon = "Subterra";
    //                         break;
    //                     case "tb":
    //                         $resultCon = "The bubbles";
    //                         break;
    //                 }
    //                 return $resultCon;
    //             }
    //         ),
    //         array('db' => 'wdf_user', 'dt' => 2),
    //         array('db' => 'wdf_ecode', 'dt' => 3),
    //         array('db' => 'wdf_dept', 'dt' => 4),
    //         array('db' => 'wdf_datetime', 'dt' => 5 ,
    //             'formatter' => function($d , $row){
    //                 return conDateTimeFromDb($d);
    //             }
    //         ),
    //         array('db' => 'wdf_pricewithvat', 'dt' => 6 ,
    //             'formatter' => function($d , $row){
    //                 return number_format($d , 2);
    //             }
    //         ),
    //         array('db' => 'wdf_status', 'dt' => 7,
    //             'formatter' => function($d , $row){
    //                 $colorText = conColorTextStatus($d);
    //                 $statusHtml = '<b><span '.$colorText.'>'.$d.'</span></b>';
    //                 return $statusHtml;
    //             }
    //         ),
    //     );

    //     // SQL server connection information
    //     $sql_details = array(
    //         'user' => getDb()->db_username,
    //         'pass' => getDb()->db_password,
    //         'db'   => getDb()->db_databasename,
    //         'host' => getDb()->db_host
    //     );

    //     /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    //     * If you just want to use the basic configuration for DataTables with PHP
    //     * server-side, there is no need to edit below this line.
    //     */
    //     require('server-side/scripts/ssp.class.php');

    //     $ecode = getUser()->ecode;
    //     $deptcode = getUser()->DeptCode;
    //     $posi = getUser()->posi;


    //     if($deptcode == "1003" || $ecode == "M1809"){
    //         echo json_encode(
    //             SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
    //         );
    //     }else if($posi > 75){
    //         echo json_encode(
    //             SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
    //         );
    //     }else if($ecode == "M0051"){
    //         echo json_encode(
    //             SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_deptcode = '$deptcode' OR wdf_areaid IN ('tb') ")
    //         );
    //     }else if($ecode == "M2076"){
    //         echo json_encode(
    //             SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_areaid IN ('tb') ")
    //         );
    //     }else{
    //         echo json_encode(
    //             SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_deptcode = '$deptcode' ")
    //         );
    //     }
    // }

    public function advance_list_filter($startDate , $endDate , $company , $user , $dept , $status)
    {
        // DB table to use
        $table = 'list_advance';

        // Table's primary key
        $primaryKey = 'wdf_autoid';

        $columns = array(
            array('db' => 'wdf_formno', 'dt' => 0,
                'formatter' => function($d , $row){
                    $formcode = conFormNoToFormCode($d);
                    $output ='
                    <a href="javascript:void(0)" class="select_form"
                        data_formcode="'.$formcode.'"
                        data_formno="'.$d.'"
                    ><b>'.$d.'</b></a>
                    ';
                    return $output;
                }
            ),
            array('db' => 'wdf_areaid', 'dt' => 1 ,
                'formatter' => function($d , $row){
                    $resultCon = "";
                    switch($d){
                        case "sc":
                            $resultCon = "Salee Colour";
                            break;
                        case "pa":
                            $resultCon = "Poly Meritasia";
                            break;
                        case "ca":
                            $resultCon = "Composite Asia";
                            break;
                        case "st":
                            $resultCon = "Subterra";
                            break;
                        case "tb":
                            $resultCon = "The bubbles";
                            break;
                    }
                    return $resultCon;
                }
            ),
            array('db' => 'wdf_user', 'dt' => 2),
            array('db' => 'wdf_ecode', 'dt' => 3),
            array('db' => 'wdf_dept', 'dt' => 4),
            array('db' => 'wdf_datetime', 'dt' => 5 ,
                'formatter' => function($d , $row){
                    return conDateTimeFromDb($d);
                }
            ),
            array('db' => 'wdf_pricewithvat', 'dt' => 6 ,
                'formatter' => function($d , $row){
                    return number_format($d , 2);
                }
            ),
            array('db' => 'wdf_currency', 'dt' => 7 ,
                'formatter' => function($d , $row){
                    if($d === null){
                        $d = "THB";
                    }
                    return $d;
                }
            ),
            array('db' => 'wdf_ap_memo', 'dt' => 8),
            array('db' => 'wdf_status', 'dt' => 9,
                'formatter' => function($d , $row){
                    $colorText = conColorTextStatus($d);
                    $statusHtml = '<b><span '.$colorText.'>'.$d.'</span></b>';
                    return $statusHtml;
                }
            ),
        );

        // SQL server connection information
        $sql_details = array(
            'user' => getDb()->db_username,
            'pass' => getDb()->db_password,
            'db'   => getDb()->db_databasename,
            'host' => getDb()->db_host
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * If you just want to use the basic configuration for DataTables with PHP
        * server-side, there is no need to edit below this line.
        */
        require('server-side/scripts/ssp.class.php');

        $ecode = getUser()->ecode;
        $deptcode = getUser()->DeptCode;
        $posi = getUser()->posi;

        $sql_searchBydate = "";
        
        if($startDate == "0" && $endDate == "0"){
            $sql_searchBydate = "wdf_datetime LIKE '%%' ";
        }else if($startDate == "0" && $endDate != "0"){
            $sql_searchBydate = "wdf_datetime BETWEEN '$endDate 00:00:01' AND '$endDate 23:59:59' ";
        }else if($startDate != "0" && $endDate != "0"){
            $sql_searchBydate = "wdf_datetime BETWEEN '$startDate 00:00:01' AND '$endDate 23:59:59' ";
        }else if($startDate != "0" && $endDate == "0"){
            $sql_searchBydate = "wdf_datetime BETWEEN '$startDate 00:00:01' AND '$startDate 23:59:59' ";
        }



        $query_company = "";
        if($company == "0"){
            $query_company = "";
        }else{
            $query_company = "AND wdf_areaid = '$company' ";
        }

        $query_user = "";
        if($user == "0"){
            $query_user = "";
        }else{
            $query_user = "AND wdf_ecode = '$user' ";
        }

        $query_dept = "";
        if($dept == "0"){
            $query_dept = "";
        }else{
            $query_dept = "AND wdf_deptcode = '$dept' ";
        }

        $query_status = "";
        $con_status = "";
        if($status == "0"){
            $query_status = "";
        }else{
            $con_status = conStatusNumToText($status , "adv");
            $query_status = "AND wdf_status = '$con_status' ";
        }


        //check approve_user 2025-01-28
        $inclause = checkapproveUser($ecode , "adv");
        $query_approve_user = "";
        if($inclause){
            $query_approve_user = "OR wdf_formcode IN $inclause";
        }else{
            $query_approve_user = "";
        }



        if($deptcode == "1003" || $ecode == "M1809"){
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "$sql_searchBydate $query_company $query_user $query_dept $query_status")
            );
        }else if($posi > 75 || $ecode == "M0025" || $ecode == "M0015" || $ecode == "M0051"){
            //กำหนดสิทธิ์ให้ พี่นิต , พี่เหน่ง , พี่พล
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "$sql_searchBydate $query_company $query_user $query_dept $query_status $query_approve_user")
            );
        }else if($ecode == "M2076" || $ecode == "M2077"){
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_areaid IN ('tb') AND $sql_searchBydate $query_company $query_user $query_status")
            );
        }else if($ecode == "M0040"){
            //กำหนดสิทธิ์สำหรับพี่หนุ่ม
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_deptcode IN ('1007') AND wdf_areaid IN ('sc','ca','pa') AND $sql_searchBydate $query_company $query_user $query_dept $query_status $query_approve_user")
            );
        }else if($ecode == "M0112"){
            //กำหนดสิทธิ์สำหรับพี่ยูง
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_deptcode IN ('1014' , '1015' , '1006') AND $sql_searchBydate $query_company $query_user $query_dept $query_status $query_approve_user")
            );
        }else{
            if($ecode == "M0963"){
                //กำหนดสิทธิ์สำหรับพี่ภพ
                echo json_encode(
                    SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_areaid IN ('tb') OR wdf_deptcode = '$deptcode' AND $sql_searchBydate $query_company $query_user $query_dept $query_status $query_approve_user")
                );
            }else{
                echo json_encode(
                    SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_deptcode = '$deptcode' AND $sql_searchBydate $query_company $query_user $query_dept $query_status $query_approve_user")
                );
            }
        }
    }


    public function advance_getDataviewfull()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "advance_getDataviewfull"){

            $formcode = $received_data->formcode;
            $formno = $received_data->formno;

            $sql = $this->db->query("SELECT
            wdf_master.wdf_autoid,
            wdf_master.wdf_formno,
            wdf_master.wdf_formcode,
            wdf_master.wdf_areaid,
            wdf_master.wdf_doctype,
            wdf_master.wdf_status,
            wdf_master.wdf_currency,
            wdf_master.wdf_memo,
            wdf_master.wdf_userreceive,
            wdf_master.wdf_userreceived_detail,
            wdf_master.wdf_vat1,
            wdf_master.wdf_vat2,
            wdf_master.wdf_pricenonevat,
            wdf_master.wdf_pricevat1,
            wdf_master.wdf_pricevat2,
            wdf_master.wdf_pricewithvat,
            wdf_master.wdf_user,
            wdf_master.wdf_ecode,
            wdf_master.wdf_deptcode,
            wdf_master.wdf_dept,
            wdf_master.wdf_datetime,
            wdf_master.wdf_paygroup,
            wdf_master.wdf_appgroup,
            wdf_master.wdf_areaidgroup,
            wdf_master.wdf_fnc_method,
            wdf_master.wdf_fnc_money,
            wdf_master.wdf_appgroup_clear
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_formno = '$formno' AND wdf_doctype = 'adv'
            ");

            $queryTrans = $this->advance_getwdftrans($formcode);
            $queryImage = $this->advance_getImage($formcode);

            $output = array(
                "msg" => "ดังข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "viewfulldata" => $sql->row(),
                "viewfulldata_trans" => $queryTrans->result(),
                "viewfulldata_image" => $queryImage->result()
            );
        }else{
            $output = array(
                "msg" => "ดังข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "viewfulldata" => null,
                "viewfulldata_trans" => null,
                "viewfulldata_image" => null
            );
        }
        echo json_encode($output);
    }

    private function advance_getwdftrans($formcode)
    {
        $sql = $this->db->query("SELECT
        wdf_trans.tr_autoid,
        wdf_trans.tr_mas_formcode,
        wdf_trans.tr_areaid,
        wdf_trans.tr_mas_doctype,
        wdf_trans.tr_detail_refid,
        wdf_trans.tr_detailname,
        wdf_trans.tr_detaildeptcode,
        wdf_trans.tr_detailaccode,
        wdf_trans.tr_detailaccodename,
        wdf_trans.tr_money,
        wdf_trans.tr_username,
        wdf_trans.tr_ecode,
        wdf_trans.tr_deptcode,
        wdf_trans.tr_dept,
        wdf_trans.tr_datetime
        FROM
        wdf_trans
        WHERE tr_mas_formcode = '$formcode' AND tr_mas_doctype = 'adv' AND tr_mas_type IS NULL ORDER BY tr_autoid ASC
        ");

        return $sql;
    }

    private function advance_getImage($formcode)
    {
        $sql = $this->db->query("SELECT
        wdf_files.fi_autoid,
        wdf_files.fi_name,
        wdf_files.fi_formcode,
        wdf_files.fi_areaid,
        wdf_files.fi_doctype,
        wdf_files.fi_path,
        wdf_files.fi_username,
        wdf_files.fi_ecode,
        wdf_files.fi_deptcode,
        wdf_files.fi_datetime
        FROM
        wdf_files
        WHERE fi_formcode = '$formcode' AND fi_doctype = 'adv' ORDER BY fi_autoid ASC
        ");
        return $sql;
    }


    public function delFile_edit()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "delFile_edit"){
            $formcode = $received_data->data_formcode;
            $filepath = $received_data->data_path;
            $filename = $received_data->data_name;

            $path = $_SERVER['DOCUMENT_ROOT']."/intsys/wdf2/".$filepath.$filename;
            unlink($path);

            $this->db->where("fi_formcode" , $formcode);
            $this->db->where("fi_name" , $filename);
            $this->db->where("fi_doctype" , "adv");
            $this->db->delete("wdf_files");

            $queryFile = $this->advance_getImage($formcode);

            $output = array(
                "msg" => "ลบไฟล์เสร็จเรียบร้อยแล้ว",
                "status" => "Delete Data Success",
                "viewfulldata_image" => $queryFile->result()
            );
        }else{
            $output = array(
                "msg" => "ลบไฟล์ไม่สำเร็จ",
                "status" => "Delete Data Not Success",
                "viewfulldata_image" => null
            );
        }

        echo json_encode($output);
    }


    public function cancel_adv()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "cancel_adv"){

            $formcode = $received_data->data_formcode;
            $arUpdateStatus = array(
                "wdf_status" => "User cancel"
            );
            $this->db->where("wdf_formcode" , $formcode);
            $this->db->update("wdf_master" , $arUpdateStatus);

            //update old status
            //Send to notifycenter
            $notifyformno = conFormcodeToFormNo($formcode);
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            $output = array(
                "msg" => "ยกเลิกเอกสารเรียบร้อยแล้ว",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "ยกเลิกเอกสารไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }


    public function save_checkbudget()
    {
        if($this->input->post("ip-bgsec-creditlimit") != ""){
            $formcode = $this->input->post("check_formcode_bg");
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = $formno;
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            $arsaveCheckBudget = array(
                "wdf_bg_creditlimit" => conPrice($this->input->post("ip-bgsec-creditlimit")),
                "wdf_bg_memo" => $this->input->post("ip-bgsec-memo"),
                "wdf_bg_user" => getUser()->Fname." ".getUser()->Lname,
                "wdf_bg_dept" => getUser()->Dept,
                "wdf_bg_deptcode" => getUser()->DeptCode,
                "wdf_bg_ecode" => getUser()->ecode,
                "wdf_bg_datetime" => date("Y-m-d H:i:s"),
                "wdf_status" => "Check budget already"
            );
            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_doctype" , "adv");
            $this->db->where("wdf_areaid" , $this->input->post("check_areaid_bg"));
            $this->db->update("wdf_master" , $arsaveCheckBudget);


            $this->advemail->send_to_manager($formcode , $formno);

            $output = array(
                "msg" => "บันทึกผลการเช็ค Budget เรียบร้อยแล้ว",
                "status" => "Insert Data Success"
            );
        }else{
            $output = array(
                "msg" => "บันทึกผลการเช็ค Budget ไม่สำเร็จ",
                "status" => "Insert Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function getdata_checkbudget()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_checkbudget"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            $sql = $this->db->query("SELECT 
            wdf_bg_creditlimit,
            wdf_bg_memo,
            wdf_bg_user,
            wdf_bg_dept,
            wdf_bg_deptcode,
            wdf_bg_ecode,
            wdf_bg_datetime
            FROM wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_doctype = 'adv' AND wdf_areaid = '$areaid'
            ");

            $output = array(
                "msg" => "ดึงข้อมูลการตรวจสอบ Budget สำเร็จ",
                "status" => "Select Data Success",
                "checkbudgetData" => $sql->row()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลการตรวจสอบ Budget สำเร็จ",
                "status" => "Select Data Success",
                "checkbudgetData" => null
            );
        }

        echo json_encode($output);
    }


    public function checkpaygroup()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "checkpaygroup"){
            $areaid = $received_data->areaid;
            $doctype = $received_data->doctype;
            if($areaid != "tb"){
                $areaid = "sc,pa,ca,st";
            }

            $sql = $this->db->query("SELECT
            pay_groupid,
            pay_scope_start,
            pay_scope_end,
            pay_doctype,
            approve_group,
            areaid
            FROM pay_group
            WHERE pay_doctype = '$doctype' AND areaid = '$areaid' ORDER BY pay_autoid ASC
            ");

            $output = array(
                "msg" => "ดึงข้อมูล Pay group สำเร็จ",
                "status" => "Select Data Success",
                "rsPay" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล Pay group ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "rsPay" => null
            );
        }
        echo json_encode($output);
    }


    public function getdata_approveGroup()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_approveGroup"){
            $approveGroup = $received_data->approveGroup;
            $areaidGroup = $received_data->areaidGroup;
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            $getUserpost = $this->db->query("SELECT wdf_user , wdf_ecode , wdf_deptcode , wdf_dept , wdf_status FROM wdf_master WHERE wdf_formcode = '$formcode' AND wdf_areaid = '$areaid' ");

            $userDeptCode = "";
            $wdfstatus = "";
            if($getUserpost->num_rows() != 0){
                $userDeptCode = $getUserpost->row()->wdf_deptcode;
                $wdfstatus = $getUserpost->row()->wdf_status;
            }

            $sql = $this->getUserGroup($approveGroup , $areaidGroup , $wdfstatus);
            $sqlUserInGroup = $this->getUserInGroup($approveGroup , $areaidGroup , $userDeptCode , $areaid);
            


            $output = array(
                "msg" => "ดึงข้อมูล approve group สำเร็จ",
                "status" => "Select Data Success",
                "appGroup" => $sql->result(),
                "appGroupDetail" => $sqlUserInGroup->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล approve group ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "appGroup" => null,
                "appGroupDetail" => null
            );
        }
        echo json_encode($output);
    }
    private function getUserGroup($approveGroup , $areaidGroup , $wdfstatus)
    {
        $ecodeManagerLogin = "";
        if($approveGroup != "" && $areaidGroup != ""){
            $sqlOnlyGroup4 = "";
            if($areaidGroup == "tb"){
                $ecodeManagerLogin = getUser()->ecode;
                if($approveGroup == 4){
                    if($wdfstatus == "Finance passed inspection (Clear Money)" || $wdfstatus == "Check budget already"){
                        if($ecodeManagerLogin == "M2222" || $ecodeManagerLogin == "M2076"){
                            $sqlOnlyGroup4 = "AND app_posiname != 'ผู้จัดการ ชุดที่ 1' "; 
                        }else if($ecodeManagerLogin == "M0051" || $ecodeManagerLogin == "M0025"){
                            $sqlOnlyGroup4 = "AND app_posiname != 'ผู้จัดการ ชุดที่ 2' "; 
                        }
                    }else{
                        $sqlOnlyGroup4 = "";
                    }
                     
                }else{
                    $sqlOnlyGroup4 = "";
                }
            }else{
                $sqlOnlyGroup4 = "";
            }



            $sql = $this->db->query("SELECT
            app_autoid,
            app_group,
            app_posiname,
            app_areaid,
            app_number,
            app_deptcode,
            app_deptcode2,
            app_deptcode3
            FROM approve_group
            WHERE app_group = '$approveGroup' AND app_status = 'Active' AND app_areaid = '$areaidGroup' AND app_group != 5 $sqlOnlyGroup4 GROUP BY app_posiname ORDER BY app_group_order ASC
            ");
            return $sql;
        }
        
    }
    private function getUserInGroup($approveGroup , $areaidGroup , $userDeptCode , $areaid)
    {

        if($approveGroup != "" && $areaidGroup != ""){
            $sqlOnlyGroup4 = "";
            $mgr2ForSt = "";

            if($areaidGroup == "tb"){

                if(getUser()->ecode == "M2076" || getUser()->ecode == "M2222"){
                    if($approveGroup == 4){
                        $sqlOnlyGroup4 = "AND app_ecode NOT IN ('M2076' , 'M2222')";
                    }else{
                        $sqlOnlyGroup4 = "";
                    }
                }else if(getUser()->ecode == "M0051" || getUser()->ecode == "M0025"){
                    if($approveGroup == 4){
                        $sqlOnlyGroup4 = "AND app_ecode NOT IN ('M0051','M0025')";
                    }else{
                        $sqlOnlyGroup4 = "";
                    }
                }else{
                    $sqlOnlyGroup4 = "";
                }
            }else{
                if($areaid == "st"){
                    if($approveGroup == 4){
                        //กำหนดผู้จัดการคนที่ 2 เป็นพี่ป้อน M0282 เท่านั้น
                        $mgr2ForSt = "AND app_ecode = 'M0282'";
                    }else{
                        $mgr2ForSt = "";
                    }

                }else{
                    if($approveGroup == 4){
                        $sqlOnlyGroup4 = "AND app_deptcode != '$userDeptCode'";
                    }else{
                        $sqlOnlyGroup4 = "";
                    }
                }

            }

            // if($areaidGroup == "tb"){
            //     $ecodeManagerLogin = getUser()->ecode;
            //     if($approveGroup == 4){
            //         if($wdfstatus == "Finance passed inspection (Clear Money)" || $wdfstatus == "Check budget already"){
            //             if($ecodeManagerLogin == "M2222" || $ecodeManagerLogin == "M2076"){
            //                 $sqlOnlyGroup4 = "AND app_posiname != 'ผู้จัดการ ชุดที่ 1' "; 
            //             }else if($ecodeManagerLogin == "M0051"){
            //                 $sqlOnlyGroup4 = "AND app_posiname != 'ผู้จัดการ ชุดที่ 2' "; 
            //             }
            //         }else{
            //             $sqlOnlyGroup4 = "";
            //         }

                     
            //     }else if($approveGroup == 3 || $approveGroup == 2 || $approveGroup == 1){
            //         if($wdfstatus == "Finance passed inspection (Clear Money)" || $wdfstatus == "Check budget already"){
            //             $sqlOnlyGroup4 = "AND app_ecode != '$ecodeManagerLogin' ";
            //         }else{
            //             $sqlOnlyGroup4 = "";
            //         }

            //     }else{
            //         $sqlOnlyGroup4 = "";
            //     }
            // }else{
            //     if($approveGroup == 4){
            //         $sqlOnlyGroup4 = "AND app_deptcode != '$userDeptCode'";
            //     }else{
            //         $sqlOnlyGroup4 = "";
            //     }
            // }

            $sqlUserInGroup = $this->db->query("SELECT
            app_autoid,
            app_group,
            app_username,
            app_user,
            app_posiname,
            app_ecode,
            app_areaid,
            app_deptcode,
            app_deptcode2,
            app_deptcode3
            FROM approve_group
            WHERE app_group = '$approveGroup' AND app_status = 'Active' AND app_areaid = '$areaidGroup' AND app_group != 5 $sqlOnlyGroup4 $mgr2ForSt ORDER BY app_group_order ASC , app_user ASC
            ");
            return $sqlUserInGroup;
        }
    }


    public function saveManager()
    {
        if($this->input->post("ip-mgrsec-appro") != ""){
            $formcode = $this->input->post("check-mg-formcode");
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = $formno;
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            // Save data to wdf_master table
            if($this->input->post("ip-mgrsec-appro") == "อนุมัติ"){
                $managerStatus = "Manager approved";
            }else{
                $managerStatus = "Manager not approve";
            }
            
            $arInsertManager = array(
                "wdf_mgr_appr" => $this->input->post("ip-mgrsec-appro"),
                "wdf_mgr_memo" => $this->input->post("ip-mgrsec-memo"),
                "wdf_mgr_user" => getUser()->Fname." ".getUser()->Lname,
                "wdf_mgr_dept" => getUser()->Dept,
                "wdf_mgr_deptcode" => getUser()->DeptCode,
                "wdf_mgr_datetime" => date("Y-m-d H:i:s"),
                "wdf_status" => $managerStatus,

                "wdf_paygroup" => $this->input->post("check-mg-paygroupid"),
                "wdf_appgroup" => $this->input->post("check-mg-group"),
                "wdf_areaidgroup" => $this->input->post("check-mg-groupareaid")
            );
            $this->db->where("wdf_formcode" , $this->input->post("check-mg-formcode"));
            $this->db->where("wdf_areaid" , $this->input->post("check-mg-areaid"));
            $this->db->update("wdf_master" , $arInsertManager);
            // Save data to wdf_master table


            if($this->input->post("ip-mgrsec-appro") == "อนุมัติ"){
                if($this->input->post("check-mg-group") != 5){

                    $checkEcode = $this->input->post("ipv-adv-appgd");
                    $areaidGroup = $this->input->post("check-mg-groupareaid");
                    $group = $this->input->post("check-mg-group");
    
                    foreach($checkEcode as $key => $checkEcodes){
                        // Save data to approve user table
                        $getEmail = getEmailByEcode($checkEcodes);
                        if($getEmail->num_rows() != 0){
                            $getEmail = $getEmail->row()->memberemail;
                        }else{
                            $getEmail = null;
                        }
    
                        $getUserByEcode = getuserDataByEcode($checkEcodes , $areaidGroup , $group)->app_user;
                        $getPosinameByEcode = getuserDataByEcode($checkEcodes , $areaidGroup , $group)->app_posiname;
                        
                        $arInsertApproveUser = array(
                            "apv_paygroupid" => $this->input->post("check-mg-paygroupid"),
                            "apv_group" => $group,
                            "apv_user" => $getUserByEcode,
                            "apv_ecode" => $checkEcodes,
                            "apv_posiname" => $getPosinameByEcode,
                            "apv_formcode" => $this->input->post("check-mg-formcode"),
                            "apv_areaidgroup" => $areaidGroup,
                            "apv_areaid" => $this->input->post("check-mg-areaid"),
                            "apv_email" => $getEmail,
                            "apv_datetime" => date("Y-m-d H:i:s")
                        );
                        $this->db->insert("approve_user" , $arInsertApproveUser);
                    }
                    $this->advemail->send_to_excutive($formcode , $formno);
                }else{
                    //ถ้า AppGroup ส่งEmail ไปหา AP
                    $this->advemail->send_to_ap($formcode , $formno);
                }
            }






            $output = array(
                "msg" => "บันทึกข้อมูลส่วนของ Manager สำเร็จ",
                "status" => "Insert Data Success"
            );
            
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูลส่วนของ Manager ไม่สำเร็จ",
                "status" => "Insert Data Not Success"
            );
        }
        echo json_encode($output);
    }


    public function getData_ManagerApproved()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getData_ManagerApproved"){

            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;
            $approveGroup = "";
            $areaidGroup = "";
            $posiname = "";

            $sqlgetMgr = $this->db->query("SELECT
            wdf_master.wdf_mgr_appr,
            wdf_master.wdf_mgr_memo,
            wdf_master.wdf_mgr_user,
            wdf_master.wdf_mgr_dept,
            wdf_master.wdf_mgr_deptcode,
            wdf_master.wdf_mgr_datetime,
            wdf_master.wdf_paygroup,
            wdf_master.wdf_appgroup,
            wdf_master.wdf_areaidgroup,
            wdf_master.wdf_deptcode,
            wdf_master.wdf_status
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_doctype = 'adv' AND wdf_areaid = '$areaid'
            ");

            // Check Group 5
            $appGroup ="";
            $appGroupDetail = "";
            $userApproved = "";
            $mgrApproveData = "";
            $approveGroup = "";
            $posiname = "";

            $userDeptCode = "";
            $wdfstatus = "";
            if($sqlgetMgr->num_rows() != 0){

                $userDeptCode = $sqlgetMgr->row()->wdf_deptcode;
                $wdfstatus = $sqlgetMgr->row()->wdf_status;

                if($sqlgetMgr->row()->wdf_appgroup != 5){
                    // Get data user approve
                    $userApproved = $this->getUserApprovedFromDb($formcode , $areaid);
                    // Check Data
                }else{
                    $userApproved = null;
                }
            }

            $approveGroup = $sqlgetMgr->row()->wdf_appgroup;

            if($userApproved != null){
                if($userApproved->num_rows() != 0){
                    // $approveGroup = $userApproved->row()->apv_group;
                    $areaidGroup = $userApproved->row()->apv_areaidgroup;
                    $posiname = $userApproved->row()->apv_posiname;

                    $appGroup = $this->getUserGroupAped_adv($approveGroup , $areaidGroup , $posiname);
                    $appGroupDetail = $this->getUserInGroupAped_adv($approveGroup , $areaidGroup , $userDeptCode , $areaid);
                }else{
                    $areaidGroup = null;
                    $posiname = null;
                    $appGroup = null;
                    $appGroupDetail = null;
                }


            }else{
                // $approveGroup = null;
                $areaidGroup = null;
                $posiname = null;
                $appGroup = null;
                $appGroupDetail = null;
            }


            if($appGroup != null){
                $appGroup = $appGroup->result();
            }else{
                $appGroup = null;
            }

            if($appGroupDetail != null){
                $appGroupDetail = $appGroupDetail->result();
            }else{
                $appGroupDetail = null;
            }

            if($userApproved != null){
                $userApproved = $userApproved->result();
            }else{
                $userApproved = null;
            }

            
            


            $output = array(
                "msg" => "ดึงข้อมูล Manager Approve สำเร็จ",
                "status" => "Select Data Success",
                "appGroup" => $appGroup,
                "appGroupDetail" => $appGroupDetail,
                "userApproved" => $userApproved,
                "mgrApproveData" => $sqlgetMgr->row(),
                "approveGroup" => $approveGroup,
                "posiname" => $posiname
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล Manager Approve ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "appGroup" => null,
                "appGroupDetail" => null,
                "userApproved" => null,
                "mgrApproveData" => null,
                "approveGroup" => null,
                "posiname" => null
            );
        }

        echo json_encode($output);
    }

    private function getUserGroupAped_adv($approveGroup , $areaidGroup , $posiname)
    {
        if($approveGroup != "" && $areaidGroup != ""){
            
            $sql = $this->db->query("SELECT
            app_autoid,
            app_group,
            app_posiname,
            app_areaid,
            app_number,
            app_deptcode,
            app_deptcode2,
            app_deptcode3
            FROM approve_group
            WHERE app_group = '$approveGroup' AND app_status = 'Active' AND app_areaid = '$areaidGroup' AND app_group != 5 GROUP BY app_posiname ORDER BY app_group_order ASC
            ");
            return $sql;
        }
        
    }
    private function getUserInGroupAped_adv($approveGroup , $areaidGroup , $userDeptCode , $areaid)
    {
        if($approveGroup != "" && $areaidGroup != ""){
            $mgr2ForSt = "";
            if($areaid == "st"){
                //กำหนดผู้จัดการคนที่ 2 เป็นพี่ป้อน M0282 เท่านั้น
                $mgr2ForSt = "AND app_ecode = 'M0282'";
            }

            $sqlUserInGroup = $this->db->query("SELECT
            app_autoid,
            app_group,
            app_username,
            app_user,
            app_posiname,
            app_ecode,
            app_areaid,
            app_deptcode,
            app_deptcode2,
            app_deptcode3
            FROM approve_group
            WHERE app_group = '$approveGroup' AND app_status = 'Active' AND app_areaid = '$areaidGroup' AND app_group != 5 $mgr2ForSt ORDER BY app_group_order ASC
            ");
            return $sqlUserInGroup;
        }
    }

    private function getUserApprovedFromDb($formcode , $areaid)
    {
        if($formcode != "" && $areaid  != ""){
            $sql = $this->db->query("SELECT
            approve_user.apv_autoid,
            approve_user.apv_paygroupid,
            approve_user.apv_group,
            approve_user.apv_user,
            approve_user.apv_ecode,
            approve_user.apv_posiname,
            approve_user.apv_formcode,
            approve_user.apv_areaidgroup,
            approve_user.apv_areaid,
            approve_user.apv_email,
            approve_user.apv_datetime,
            approve_user.apv_approve,
            approve_user.apv_approve_memo,
            approve_user.apv_approve_user,
            approve_user.apv_approve_datetime
            FROM
            approve_user
            WHERE apv_formcode = '$formcode' AND apv_areaid = '$areaid' AND apv_type is null
            ");
            return $sql;
        }
    }


    private function getUserApprovedFromDbClear($formcode , $areaid)
    {
        if($formcode != "" && $areaid  != ""){
            $sql = $this->db->query("SELECT
            approve_user.apv_autoid,
            approve_user.apv_paygroupid,
            approve_user.apv_group,
            approve_user.apv_user,
            approve_user.apv_ecode,
            approve_user.apv_posiname,
            approve_user.apv_formcode,
            approve_user.apv_areaidgroup,
            approve_user.apv_areaid,
            approve_user.apv_email,
            approve_user.apv_datetime,
            approve_user.apv_approve,
            approve_user.apv_approve_memo,
            approve_user.apv_approve_user,
            approve_user.apv_approve_datetime
            FROM
            approve_user
            WHERE apv_formcode = '$formcode' AND apv_areaid = '$areaid' AND apv_type = 'Clear money' AND apv_status = 'Active'
            ");
            return $sql;
        }
    }



    public function savePayGroup()
    {
        $ecode = getUser()->ecode;
        if($this->input->post("ip-payGroupsec-appro-".$ecode) != ""){
            $formcode = $this->input->post("ip-payGroupsec-formcode-".$ecode);
            $areaid = $this->input->post("ip-payGroupsec-areaid-".$ecode);
            $totalApprove = $this->input->post("ip-payGroupsec-totalApp-".$ecode);
            $group = $this->input->post("ip-payGroupsec-group-".$ecode);
            $formno = conFormcodeToFormNo($formcode);

            $arInsertData = array(
                "apv_approve" => $this->input->post("ip-payGroupsec-appro-".$ecode),
                "apv_approve_memo" => $this->input->post("ip-payGroupsec-memo-".$ecode),
                "apv_approve_user" => getUser()->Fname." ".getUser()->Lname,
                "apv_approve_datetime" => date("Y-m-d H:i:s")
            );
            $this->db->where("apv_autoid" , $this->input->post("ip-payGroupsec-autoid-".$ecode));
            $this->db->update("approve_user" , $arInsertData);

            $statusText = "";
            // Update status
           
                $countAppNow = $this->countApprove($formcode , $areaid);

                $checkApproveStatus = 1;
                foreach($countAppNow->result() as $rs){
                    if($rs->apv_approve == "อนุมัติ"){
                        $checkApproveStatus = $checkApproveStatus*1;
                    }else if($rs->apv_approve == "ไม่อนุมัติ"){
                        $checkApproveStatus = $checkApproveStatus*0;
                    }
                }

                if($checkApproveStatus == 1){
                    if($countAppNow->num_rows() != $totalApprove){
                    
                        $statusText = "Wait Executive Group $group Approve";
    
                    }else if($countAppNow->num_rows() == $totalApprove){

                        //update old status
                        //Send to notifycenter
                        $notifyformno = $formno;
                        $notifyprogramname = "WDF";
                        $notifystatus = "action done";
                        $notifytype = "take action";

                        $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
                        //Send to notifycenter
                        //update old status
    
                        $statusText = "Executive Group $group Approved";
                        $this->advemail->send_to_apExcutive($formcode , $formno);
                    }
                }else if($checkApproveStatus == 0){

                    //update old status
                    //Send to notifycenter
                    $notifyformno = $formno;
                    $notifyprogramname = "WDF";
                    $notifystatus = "action done";
                    $notifytype = "take action";

                    $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
                    //Send to notifycenter
                    //update old status
                    
                    $statusText = "Executive Group $group Not Approve";
                }
                

            


            $arupdateStatus = array(
                "wdf_status" => $statusText
            );
            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $arupdateStatus);


            $output = array(
                "msg" => "บันทึกข้อมูลการอนุมัติจากผู้มีอำนาจสำเร็จ",
                "status" => "Insert Data Success",
                "check" => $countAppNow->num_rows(),
                "formcode" => $formcode." ".$areaid
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูลการอนุมัติจากผู้มีอำนาจ ไม่สำเร็จ",
                "status" => "Insert Data Not Success"
            );
        }
        echo json_encode($output);
    }

    private function countApprove($formcode , $areaid)
    {
        if($formcode != "" && $areaid != ""){
            $sql = $this->db->query("SELECT apv_approve FROM approve_user WHERE apv_formcode = '$formcode' AND apv_areaid = '$areaid' AND apv_approve != '' AND apv_type is null ");
            return $sql;
        }
    }


    private function countApproveClear($formcode , $areaid)
    {
        if($formcode != "" && $areaid != ""){
            $sql = $this->db->query("SELECT apv_approve FROM approve_user WHERE apv_formcode = '$formcode' AND apv_areaid = '$areaid' AND apv_approve != '' AND apv_type = 'Clear money' AND apv_status = 'Active' ");
            return $sql;
        }
    }


    public function saveAp()
    {
        if($this->input->post("ip-apsec-appro") != ""){
            $formcode = $this->input->post("check-apsec-formcode");
            $areaid = $this->input->post("check-apsec-areaid");
            $appGroup = $this->input->post("check-apsec-appGroup");
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = $formno;
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            // Check status
            $apApprove = $this->input->post("ip-apsec-appro");
            $apStatus = "";
            if($apApprove == "ผ่าน"){
                $apStatus = "AP passed inspection";
            }else if($apApprove == "ไม่ผ่าน"){
                $apStatus = "AP not pass inspection";
            }
            $apUpdate = array(
                "wdf_ap_appr" => $this->input->post("ip-apsec-appro"),
                "wdf_ap_memo" => $this->input->post("ip-apsec-memo"),
                "wdf_ap_moneymethod" => $this->input->post("ip-apsec-money"),
                "wdf_ap_user" => getUser()->Fname." ".getUser()->Lname,
                "wdf_ap_dept" => getUser()->Dept,
                "wdf_ap_deptcode" => getUser()->DeptCode,
                "wdf_ap_ecode" => getUser()->ecode,
                "wdf_ap_datetime" => date("Y-m-d H:i:s"),
                "wdf_status" => $apStatus
            );
            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $apUpdate);

            if($appGroup != 5){
                $this->advemail->send_to_accountExcutive($formcode , $formno);
            }else{
                $this->advemail->send_to_account($formcode , $formno);
            }

            $output = array(
                "msg" => "บันทึกข้อมูล AP เรียบร้อยแล้ว",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูล AP ไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }


    public function getdata_apApprove()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_apApprove"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            $sql = $this->db->query("SELECT
            wdf_master.wdf_ap_appr,
            wdf_master.wdf_ap_memo,
            wdf_master.wdf_ap_moneymethod,
            wdf_master.wdf_ap_user,
            wdf_master.wdf_ap_dept,
            wdf_master.wdf_ap_deptcode,
            wdf_master.wdf_ap_ecode,
            wdf_master.wdf_ap_datetime,
            wdf_master.wdf_appgroup
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_areaid = '$areaid'
            ");

            $output = array(
                "msg" => "ดึงข้อมูล AP สำเร็จ",
                "status" => "Select Data Success",
                "apData" => $sql->row()
            );

        }else{
            $output = array(
                "msg" => "ดึงข้อมูล AP ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "apData" => null
            );
        }
        echo json_encode($output);
    }


    public function saveAcc()
    {
        if($this->input->post("ip-accSec-appro") != ""){
            $formcode = $this->input->post("check-accsec-formcode");
            $areaid = $this->input->post("check-accsec-areaid");
            $appGroup = $this->input->post("check-accsec-appGroup");
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = $formno;
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            // Check status
            $accApprove = $this->input->post("ip-accSec-appro");
            $accStatus = "";
            if($accApprove == "ผ่าน"){
                $accStatus = "Account passed inspection";
            }else if($accApprove == "ไม่ผ่าน"){
                $accStatus = "Account not pass inspection";
            }
            $apUpdate = array(
                "wdf_acc_appr" => $this->input->post("ip-accSec-appro"),
                "wdf_acc_memo" => $this->input->post("ip-accSec-memo"),
                "wdf_acc_user" => getUser()->Fname." ".getUser()->Lname,
                "wdf_acc_dept" => getUser()->Dept,
                "wdf_acc_deptcode" => getUser()->DeptCode,
                "wdf_acc_ecode" => getUser()->ecode,
                "wdf_acc_datetime" => date("Y-m-d H:i:s"),
                "wdf_status" => $accStatus
            );
            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $apUpdate);

            if($appGroup != 5){
                $this->advemail->send_to_financeExcutive($formcode , $formno);
            }else{
                $this->advemail->send_to_finance($formcode , $formno);
            }

            $output = array(
                "msg" => "บันทึกข้อมูล ACC เรียบร้อยแล้ว",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูล ACC ไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }



    public function getdata_accApprove()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_accApprove"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            $sql = $this->db->query("SELECT
            wdf_master.wdf_acc_appr,
            wdf_master.wdf_acc_memo,
            wdf_master.wdf_acc_user,
            wdf_master.wdf_acc_dept,
            wdf_master.wdf_acc_deptcode,
            wdf_master.wdf_acc_ecode,
            wdf_master.wdf_acc_datetime,
            wdf_master.wdf_appgroup
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_areaid = '$areaid'
            ");

            $output = array(
                "msg" => "ดึงข้อมูล ACC สำเร็จ",
                "status" => "Select Data Success",
                "accData" => $sql->row()
            );

        }else{
            $output = array(
                "msg" => "ดึงข้อมูล ACC ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "accData" => null
            );
        }
        echo json_encode($output);
    }


    public function saveFn()
    {
        if($this->input->post("ip-fnSec-appro") != ""){
            $formcode = $this->input->post("check-fnsec-formcode");
            $areaid = $this->input->post("check-fnsec-areaid");
            $appGroup = $this->input->post("check-fnsec-appGroup");
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = $formno;
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            // Check status
            $fnApprove = $this->input->post("ip-fnSec-appro");
            $fnStatus = "";
            if($fnApprove == "ผ่าน"){
                $fnStatus = "Wait user receive money";
            }else if($fnApprove == "ไม่ผ่าน"){
                $fnStatus = "Finance not pass inspection";
            }
            $apUpdate = array(
                "wdf_fn_appr" => $this->input->post("ip-fnSec-appro"),
                "wdf_fn_memo" => $this->input->post("ip-fnSec-memo"),
                "wdf_fn_user" => getUser()->Fname." ".getUser()->Lname,
                "wdf_fn_dept" => getUser()->Dept,
                "wdf_fn_deptcode" => getUser()->DeptCode,
                "wdf_fn_ecode" => getUser()->ecode,
                "wdf_fn_datetime" => date("Y-m-d H:i:s"),
                "wdf_status" => $fnStatus
            );
            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $apUpdate);


            if($appGroup != 5){
                $this->advemail->send_to_userExcutive($formcode , $formno);
            }else{
                $this->advemail->send_to_user($formcode , $formno);
            }

            $output = array(
                "msg" => "บันทึกข้อมูล FINANCE เรียบร้อยแล้ว",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูล FINANCE ไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }


    public function getdata_financeApprove()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_financeApprove"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            $sql = $this->db->query("SELECT
            wdf_master.wdf_fn_appr,
            wdf_master.wdf_fn_memo,
            wdf_master.wdf_fn_user,
            wdf_master.wdf_fn_dept,
            wdf_master.wdf_fn_deptcode,
            wdf_master.wdf_fn_ecode,
            wdf_master.wdf_fn_datetime
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_areaid = '$areaid'
            ");

            $output = array(
                "msg" => "ดึงข้อมูล FINANCE สำเร็จ",
                "status" => "Select Data Success",
                "financeData" => $sql->row()
            );

        }else{
            $output = array(
                "msg" => "ดึงข้อมูล FINANCE ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "financeData" => null
            );
        }
        echo json_encode($output);
    }


    public function saveUserReceive()
    {
        if($this->input->post("output") != ""){
            $formcode = $this->input->post("check-userreceivesec-formcode");
            $areaid = $this->input->post("check-userreceivesec-areaid");
            $appGroup = $this->input->post("check-userreceivesec-appGroup");
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = $formno;
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            // Check status
            
            $apUpdate = array(
                "wdf_ur_signature" => $this->input->post("output"),
                "wdf_ur_memo" => $this->input->post("ip-userReceiveSec-memo"),
                "wdf_ur_user" => getUser()->Fname." ".getUser()->Lname,
                "wdf_ur_dept" => getUser()->Dept,
                "wdf_ur_deptcode" => getUser()->DeptCode,
                "wdf_ur_ecode" => getUser()->ecode,
                "wdf_ur_datetime" => date("Y-m-d H:i:s"),
                "wdf_status" => "Complete & Wait User Clear Money"
            );
            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $apUpdate);

            if($appGroup != 5){
                $this->advemail->send_to_userClearExcutive($formcode , $formno);
            }else{
                $this->advemail->send_to_userClear($formcode , $formno);
            }

            $output = array(
                "msg" => "บันทึกข้อมูล User Receive เรียบร้อยแล้ว",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูล User Receive ไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }


    public function getdata_userReceive()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_userReceive"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            $sql = $this->db->query("SELECT
            wdf_master.wdf_ur_signature,
            wdf_master.wdf_ur_memo,
            wdf_master.wdf_ur_user,
            wdf_master.wdf_ur_dept,
            wdf_master.wdf_ur_deptcode,
            wdf_master.wdf_ur_ecode,
            wdf_master.wdf_ur_datetime
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_areaid = '$areaid'
            ");

            $output = array(
                "msg" => "ดึงข้อมูล User receive สำเร็จ",
                "status" => "Select Data Success",
                "userreceiveData" => $sql->row()
            );

        }else{
            $output = array(
                "msg" => "ดึงข้อมูล User receive ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "userreceiveData" => null
            );
        }
        echo json_encode($output);
    }


    public function getdata_userClearMoney()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_userClearMoney"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            // Get master Data
            $sql = $this->db->query("SELECT
            wdf_master.wdf_urc_money,
            wdf_master.wdf_urc_memo,
            wdf_master.wdf_urc_user,
            wdf_master.wdf_urc_dept,
            wdf_master.wdf_urc_deptcode,
            wdf_master.wdf_urc_ecode,
            wdf_master.wdf_urc_datetime,
            wdf_master.wdf_status,
            wdf_master.wdf_pricewithvat,
            wdf_master.wdf_vat1_clear,
            wdf_master.wdf_vat2_clear,
            wdf_master.wdf_pricenonevat_clear,
            wdf_master.wdf_pricevat1_clear,
            wdf_master.wdf_pricevat2_clear,
            wdf_master.wdf_pricewithvat_clear
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_areaid = '$areaid'
            ");

            // Get Image Data
            $sqlImage = $this->db->query("SELECT
            wdf_files.fi_autoid,
            wdf_files.fi_name,
            wdf_files.fi_formcode,
            wdf_files.fi_areaid,
            wdf_files.fi_doctype,
            wdf_files.fi_path,
            wdf_files.fi_username,
            wdf_files.fi_ecode,
            wdf_files.fi_deptcode,
            wdf_files.fi_datetime
            FROM
            wdf_files
            WHERE fi_formcode = '$formcode' AND fi_areaid = '$areaid' AND fi_doctype = 'adv clear money'
            ");

            // Get Transection Data
            $sqlTransection = $this->advance_getwdftransClear($formcode , $areaid);

            $output = array(
                "msg" => "ดึงข้อมูล User clear money สำเร็จ",
                "status" => "Select Data Success",
                "userClearMoneyData" => $sql->row(),
                "wdf_clearMoneyfile" => $sqlImage->result(),
                "userClearMoneyTrans" => $sqlTransection->result()
            );

        }else{
            $output = array(
                "msg" => "ดึงข้อมูล User clear money ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "userClearMoneyData" => null,
                "wdf_clearMoneyfile" => null,
                "userClearMoneyTrans" => null
            );
        }
        echo json_encode($output);
    }
    private function advance_getwdftransClear($formcode , $areaid)
    {
        $sql = $this->db->query("SELECT
        wdf_trans.tr_autoid,
        wdf_trans.tr_mas_formcode,
        wdf_trans.tr_areaid,
        wdf_trans.tr_mas_doctype,
        wdf_trans.tr_detail_refid,
        wdf_trans.tr_detailname,
        wdf_trans.tr_detaildeptcode,
        wdf_trans.tr_detailaccode,
        wdf_trans.tr_detailaccodename,
        wdf_trans.tr_money,
        wdf_trans.tr_username,
        wdf_trans.tr_ecode,
        wdf_trans.tr_deptcode,
        wdf_trans.tr_dept,
        wdf_trans.tr_datetime
        FROM
        wdf_trans
        WHERE tr_mas_formcode = '$formcode' AND tr_areaid = '$areaid' AND tr_mas_doctype = 'adv' AND tr_mas_type = 'clear' ORDER BY tr_autoid ASC
        ");

        return $sql;
    }


    public function saveUserclearmoney()
    {
        if($this->input->post("ip-advdetail-priceTotal-clear") != ""){

            $formcode = $this->input->post("check-userClearSec-formcode");
            $areaid = $this->input->post("check-userClearSec-areaid");
            $appGroup = $this->input->post("check-userClearSec-appGroup");
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = $formno;
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            // Check status
            
            $apUpdate = array(
                "wdf_urc_money" => conPrice($this->input->post("ip-advdetail-priceTotal-clear")),
                "wdf_urc_memo" => $this->input->post("ip-userClearSec-memo"),
                "wdf_urc_user" => getUser()->Fname." ".getUser()->Lname,
                "wdf_urc_dept" => getUser()->Dept,
                "wdf_urc_deptcode" => getUser()->DeptCode,
                "wdf_urc_ecode" => getUser()->ecode,
                "wdf_urc_datetime" => date("Y-m-d H:i:s"),
                "wdf_status" => "User upload document already",
                "wdf_vat1_clear" => $this->input->post("ip-advdetail-vat7-clear"),
                "wdf_vat2_clear" => $this->input->post("ip-advdetail-vat3-clear"),
                "wdf_pricenonevat_clear" => conPrice($this->input->post("ip-advdetail-priceNonVat-clear")),
                "wdf_pricevat1_clear" => conPrice($this->input->post("ip-advdetail-vat7Price-clear")),
                "wdf_pricevat2_clear" => conPrice($this->input->post("ip-advdetail-vat3Price-clear")),
                "wdf_pricewithvat_clear" => conPrice($this->input->post("ip-advdetail-priceTotal-clear"))
            );
            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $apUpdate);

            // Save File
            $fileInput = "ip-userClearSec-file";
            uploadImageAdvClearMoney($fileInput , $formcode , $areaid);



            // Save wdf trans User Clear Money Section
            // Delete Data Trans Frist
            $sqlGetTransForCheck = $this->db->query("SELECT tr_mas_formcode FROM wdf_trans WHERE tr_mas_formcode = '$formcode' AND  tr_areaid = '$areaid' AND tr_mas_doctype = 'adv' AND tr_mas_type = 'clear' ");
            if($sqlGetTransForCheck->num_rows() != 0){
                $this->db->where("tr_mas_formcode" , $formcode);
                $this->db->where("tr_areaid" , $areaid);
                $this->db->where("tr_mas_doctype" , "adv");
                $this->db->where("tr_mas_type" , "clear");
                $this->db->delete("wdf_trans");
            }

            $detailAutoid = $this->input->post("input-detailautoid");
            foreach($detailAutoid as $key => $detailAutoids){
                $arinsertTrans = array(
                    "tr_mas_formcode" => $formcode,
                    "tr_areaid" => $areaid,
                    "tr_mas_doctype" => "adv",
                    "tr_detail_refid" => $detailAutoids,
                    "tr_detailname" => $this->input->post("input-detaillist")[$key],
                    "tr_detaildeptcode" => $this->input->post("input-deptcode")[$key],
                    "tr_detailaccode" => $this->input->post("input-accode")[$key],
                    "tr_detailaccodename" => $this->input->post("input-accodename")[$key],
                    "tr_money" => conPrice($this->input->post("input-price")[$key]),
                    "tr_username" => getUser()->Fname." ".getUser()->Lname,
                    "tr_ecode" => getUser()->ecode,
                    "tr_deptcode" => getUser()->DeptCode,
                    "tr_dept" => getUser()->Dept,
                    "tr_datetime" => date("Y-m-d H:i:s"),
                    "tr_mas_type" => "clear"
                );
                $this->db->insert("wdf_trans" , $arinsertTrans);
            }
            // Save wdf trans User Clear Money Section


            if($appGroup == 4 || $appGroup == 3 || $appGroup == 2 || $appGroup == 1 || $appGroup == 0){
                $this->advemail->send_to_financeClearExcutive($formcode , $formno);
            }else if($appGroup == 5){
                $this->advemail->send_to_financeClear($formcode , $formno);
            }



            $output = array(
                "msg" => "บันทึกข้อมูล User Clear Money เรียบร้อยแล้ว",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูล User Clear Money ไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }


    public function checkUserClearFile()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "checkUserClearFile"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;
            $sql = $this->db->query("SELECT
            wdf_files.fi_autoid,
            wdf_files.fi_formcode
            FROM
            wdf_files
            WHERE fi_formcode = '$formcode' AND fi_areaid = '$areaid' AND fi_doctype = 'adv clear money'");

            $output = array(
                "msg" => "ตรวจสอบไฟล์สำหรับเคลียร์เงินเรียบร้อยแล้ว",
                "status" => "Select Data Success",
                "checkfile" => $sql->num_rows()
            );
        }else{
            $output = array(
                "msg" => "ตรวจสอบไฟล์สำหรับเคลียร์เงินเรียบร้อยแล้ว",
                "status" => "Select Data Success",
                "checkfile" => 0
            );
        }
        echo json_encode($output);
    }


    public function getFile_userClearMoney()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getFile_userClearMoney"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;
            $sqlImage = $this->db->query("SELECT
            wdf_files.fi_autoid,
            wdf_files.fi_name,
            wdf_files.fi_formcode,
            wdf_files.fi_areaid,
            wdf_files.fi_doctype,
            wdf_files.fi_path,
            wdf_files.fi_username,
            wdf_files.fi_ecode,
            wdf_files.fi_deptcode,
            wdf_files.fi_datetime
            FROM
            wdf_files
            WHERE fi_formcode = '$formcode' AND fi_areaid = '$areaid' AND fi_doctype = 'adv clear money'
            ");

            $output = array(
                "msg" => "โหลดรูปภาพการเคลียร์เงินสำเร็จ",
                "status" => "Select Data Success",
                "wdf_clearMoneyfile" => $sqlImage->result()
            );
        }else{
            $output = array(
                "msg" => "โหลดรูปภาพการเคลียร์เงินไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "wdf_clearMoneyfile" => null
            );
        }
        echo json_encode($output);
    }


    public function delClearFile_edit()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "delClearFile_edit"){
            $formcode = $received_data->data_formcode;
            $filepath = $received_data->data_path;
            $filename = $received_data->data_name;

            $path = $_SERVER['DOCUMENT_ROOT']."/intsys/wdf2/".$filepath.$filename;
            unlink($path);

            $this->db->where("fi_formcode" , $formcode);
            $this->db->where("fi_name" , $filename);
            $this->db->where("fi_doctype" , "adv clear money");
            $this->db->delete("wdf_files");

            $queryFile = $this->advance_getImage($formcode);

            $output = array(
                "msg" => "ลบไฟล์เสร็จเรียบร้อยแล้ว",
                "status" => "Delete Data Success",
                "viewfulldata_image" => $queryFile->result()
            );
        }else{
            $output = array(
                "msg" => "ลบไฟล์ไม่สำเร็จ",
                "status" => "Delete Data Not Success",
                "viewfulldata_image" => null
            );
        }

        echo json_encode($output);
    }


    public function getdata_financeClearMoney()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_financeClearMoney"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            $sql = $this->db->query("SELECT
            wdf_master.wdf_fnc_method,
            wdf_master.wdf_fnc_money,
            wdf_master.wdf_fnc_appr,
            wdf_master.wdf_fnc_memo,
            wdf_master.wdf_fnc_user,
            wdf_master.wdf_fnc_dept,
            wdf_master.wdf_fnc_deptcode,
            wdf_master.wdf_fnc_ecode,
            wdf_master.wdf_fnc_datetime,
            wdf_master.wdf_pricewithvat,
            wdf_master.wdf_pricewithvat_clear
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_areaid = '$areaid'
            ");

            $output = array(
                "msg" => "ดึงข้อมูล FINANCE Clear สำเร็จ",
                "status" => "Select Data Success",
                "financeClearData" => $sql->row()
            );

        }else{
            $output = array(
                "msg" => "ดึงข้อมูล FINANCE Clear ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "financeClearData" => null
            );
        }
        echo json_encode($output);
    }


    public function editStatusUserclearmoney()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "editStatusUserclearmoney"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            $arupdateClearEdit = array(
                "wdf_status" => "Wait user edit document (Clear money)",
                "wdf_urc_datetime_modify" => date("Y-m-d H:i:s")
            );
            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $arupdateClearEdit);

            $output = array(
                "msg" => "เริ่มต้นการแก้ไขเอกสารการเคลียร์เงิน",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "แก้ไขเอกสารการเคลียร์เงินไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function saveFnClear()
    {
        if($this->input->post("ip-fnClearSec-method") != "" && $this->input->post("ip-fnClearSec-appro") != ""){

            $formcode = $this->input->post("check-fnClearSec-formcode");
            $areaid = $this->input->post("check-fnClearSec-areaid");
            $financeAppr = $this->input->post("ip-fnClearSec-appro");
            $appGroup = $this->input->post("check-fnClearSec-appGroup");
            $formno = conFormcodeToFormNo($formcode);
            $financeClearStatus = "";
            $fnc_stepcode = "";

            //update old status
            //Send to notifycenter
            $notifyformno = $formno;
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status
            
            //Check stepcode
            $check_getRuncode = check_getRuningCode($formcode , $areaid , "adv" , "wdf_fnc_stepcode");
            if($check_getRuncode->num_rows() == 0){
                $fnc_stepcode = getRuningCode(719);
            }else{
                $fnc_stepcode = $check_getRuncode->row()->wdf_fnc_stepcode;
            }

            if($financeAppr == "ผ่าน"){
                $financeClearStatus = "Finance passed inspection (Clear Money)";

                $arUpdateFnClear = array(
                    "wdf_fnc_stepcode" => $fnc_stepcode,
                    "wdf_fnc_method" => $this->input->post("ip-fnClearSec-method"),
                    "wdf_fnc_money" => conPrice($this->input->post("ip-fnClearSec-money")),
                    "wdf_fnc_appr" => $financeAppr,
                    "wdf_fnc_memo" => $this->input->post("ip-fnClearSec-memo"),
                    "wdf_fnc_user" => getUser()->Fname." ".getUser()->Lname,
                    "wdf_fnc_dept" => getUser()->Dept,
                    "wdf_fnc_deptcode" => getUser()->DeptCode,
                    "wdf_fnc_ecode" => getUser()->ecode,
                    "wdf_fnc_datetime" => date("Y-m-d H:i:s"),
                    "wdf_status" => $financeClearStatus
                );



            }else if($financeAppr == "ไม่ผ่าน"){
                $financeClearStatus = "Wait user correct document (Clear Money)";

                $arInsertTohistory = array(
                    "ch_formcode" => $formcode,
                    "ch_areaid" => $areaid,
                    "ch_doctype" => "adv",
                    "ch_stepcode" => $fnc_stepcode,
                    "ch_memo" => $this->input->post("ip-fnClearSec-memo"),
                    "ch_user" => getUser()->Fname." ".getUser()->Lname,
                    "ch_ecode" => getUser()->ecode,
                    "ch_datetime" => date("Y-m-d H:i:s"),
                );
                $this->db->insert("cancle_history" , $arInsertTohistory);

                $arUpdateFnClear = array(
                    "wdf_fnc_stepcode" => $fnc_stepcode,
                    "wdf_fnc_appr" => null,
                    "wdf_status" => $financeClearStatus
                );

            }



            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $arUpdateFnClear );

            if($financeAppr == "ผ่าน"){
                if($this->input->post("ip-fnClearSec-method") == "จ่ายเงินคืนให้ผู้ขอ"){
                    if($appGroup == 4 || $appGroup == 3 || $appGroup == 2 || $appGroup == 1 || $appGroup == 0){
                        $this->advemail->send_to_mgrClearExcutiveHave($formcode , $formno);
                    }else if($appGroup == 5){
                        $this->advemail->send_to_mgrClearHave($formcode , $formno);
                    }
                }else{
                    if($appGroup == 4 || $appGroup == 3 || $appGroup == 2 || $appGroup == 1 || $appGroup == 0){
                        $this->advemail->send_to_apClearExcutiveNone($formcode , $formno);
                    }else if($appGroup == 5){
                        $this->advemail->send_to_apClearNone($formcode , $formno);
                    }
                }
            }

            $output = array(
                "msg" => "บันทึกการตรวจสอบข้อมูลของ Finance สำเร็จ",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "บันทึกการตรวจสอบข้อมูลของ Finance ไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }


    public function getdata_apClearMoney()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_apClearMoney"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            $sql = $this->db->query("SELECT
            wdf_master.wdf_apc_appr,
            wdf_master.wdf_apc_memo,
            wdf_master.wdf_apc_user,
            wdf_master.wdf_apc_dept,
            wdf_master.wdf_apc_deptcode,
            wdf_master.wdf_apc_ecode,
            wdf_master.wdf_apc_datetime
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_areaid = '$areaid'
            ");

            $output = array(
                "msg" => "ดึงข้อมูล AP Clear สำเร็จ",
                "status" => "Select Data Success",
                "apClearData" => $sql->row()
            );

        }else{
            $output = array(
                "msg" => "ดึงข้อมูล AP ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "apClearData" => null
            );
        }
        echo json_encode($output);
    }

    public function saveApClear()
    {
        if($this->input->post("ip-apClearSec-appro") != ""){
            $formcode = $this->input->post("check-apClearSec-formcode");
            $areaid = $this->input->post("check-apClearSec-areaid");
            
            $fncMethod = $this->input->post("check-apClearSec-fncMethod");
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = $formno;
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            // Check status
            $apApprove = $this->input->post("ip-apClearSec-appro");
            $apStatus = "";
            $apc_stepcode = "";

            //Check stepcode
            $check_getRuncode = check_getRuningCode($formcode , $areaid , "adv" , "wdf_apc_stepcode");
            if($check_getRuncode->num_rows() == 0){
                $apc_stepcode = getRuningCode(729);
            }else{
                $apc_stepcode = $check_getRuncode->row()->wdf_apc_stepcode;
            }


            if($apApprove == "ผ่าน"){
                $apStatus = "AP passed inspection (Clear Money)";

                $apUpdate = array(
                    "wdf_apc_stepcode" => $apc_stepcode,
                    "wdf_apc_appr" => $this->input->post("ip-apClearSec-appro"),
                    "wdf_apc_memo" => $this->input->post("ip-apClearSec-memo"),
                    "wdf_apc_user" => getUser()->Fname." ".getUser()->Lname,
                    "wdf_apc_dept" => getUser()->Dept,
                    "wdf_apc_deptcode" => getUser()->DeptCode,
                    "wdf_apc_ecode" => getUser()->ecode,
                    "wdf_apc_datetime" => date("Y-m-d H:i:s"),
                    "wdf_status" => $apStatus
                );

            }else if($apApprove == "ไม่ผ่าน"){
                $apStatus = "AP not pass inspection (Clear Money)";

                $apUpdate = array(
                    "wdf_apc_stepcode" => $apc_stepcode,
                    "wdf_apc_appr" => null,
                    "wdf_apc_memo" => $this->input->post("ip-apClearSec-memo"),
                    "wdf_apc_user" => getUser()->Fname." ".getUser()->Lname,
                    "wdf_apc_dept" => getUser()->Dept,
                    "wdf_apc_deptcode" => getUser()->DeptCode,
                    "wdf_apc_ecode" => getUser()->ecode,
                    "wdf_apc_datetime" => date("Y-m-d H:i:s"),
                    "wdf_status" => $apStatus
                );

                $apvUpdate = array(
                    "apv_status" => "Inactive"
                );
                $this->db->where("apv_formcode" , $formcode);
                $this->db->where("apv_areaid" , $areaid);
                $this->db->where("apv_type" , "Clear money");
                $this->db->update("approve_user" , $apvUpdate);

                $arInsertTohistory = array(
                    "ch_formcode" => $formcode,
                    "ch_areaid" => $areaid,
                    "ch_doctype" => "adv",
                    "ch_stepcode" => $apc_stepcode,
                    "ch_memo" => $this->input->post("ip-apClearSec-memo"),
                    "ch_user" => getUser()->Fname." ".getUser()->Lname,
                    "ch_ecode" => getUser()->ecode,
                    "ch_datetime" => date("Y-m-d H:i:s"),
                );
                $this->db->insert("cancle_history" , $arInsertTohistory);
            }

            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $apUpdate);

            $appGroup = getDataAppGroup($formcode , $areaid)->wdf_appgroup;
            $appGroupClear = getDataAppGroup($formcode , $areaid)->wdf_appgroup_clear;
            if($apApprove == "ผ่าน"){
                if($fncMethod != "จ่ายเงินคืนให้ผู้ขอ"){
                    if($appGroup == 4 || $appGroup == 3 || $appGroup == 2 || $appGroup == 1 || $appGroup == 0){
                        $this->advemail->send_to_accountClearExcutiveNone($formcode , $formno);
                    }else if($appGroup == 5){
                        $this->advemail->send_to_accountClearNone($formcode , $formno);
                    }
                }else{
                    if($appGroup == 4 || $appGroup == 3 || $appGroup == 2 || $appGroup == 1 || $appGroup == 0){
                        if($appGroupClear == 4 || $appGroupClear == 3 || $appGroupClear == 2 || $appGroupClear == 1 || $appGroupClear == 0){
                            $this->advemail->send_to_accountClearExHaveEx($formcode , $formno);
                        }else if($appGroupClear == 5){
                            $this->advemail->send_to_accountClearExHaveG5($formcode , $formno);
                        }
                    }else if($appGroup == 5){
                        if($appGroupClear == 4 || $appGroupClear == 3 || $appGroupClear == 2 || $appGroupClear == 1 || $appGroupClear == 0){
                            $this->advemail->send_to_accountClearHaveEx($formcode , $formno);
                        }else if($appGroupClear == 5){
                            $this->advemail->send_to_accountClearHaveG5($formcode , $formno);
                        }
                    }
                }
            }

            $output = array(
                "msg" => "บันทึกข้อมูล AP Clear เรียบร้อยแล้ว",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูล AP Clear ไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }

    public function getdata_accClearMoney()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_accClearMoney"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            $sql = $this->db->query("SELECT
            wdf_master.wdf_accc_appr,
            wdf_master.wdf_accc_memo,
            wdf_master.wdf_accc_user,
            wdf_master.wdf_accc_dept,
            wdf_master.wdf_accc_deptcode,
            wdf_master.wdf_accc_ecode,
            wdf_master.wdf_accc_datetime,
            wdf_master.wdf_fnc_method
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_areaid = '$areaid'
            ");

            $output = array(
                "msg" => "ดึงข้อมูล ACC Clear สำเร็จ",
                "status" => "Select Data Success",
                "accClearData" => $sql->row(),
            );

        }else{
            $output = array(
                "msg" => "ดึงข้อมูล ACC Clear ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "accClearData" => null
            );
        }
        echo json_encode($output);
    }

    public function saveAccClear()
    {
        if($this->input->post("ip-accClearSec-appro") != ""){
            $formcode = $this->input->post("check-accClearSec-formcode");
            $areaid = $this->input->post("check-accClearSec-areaid");
            $fncMethod = $this->input->post("check-accClearSec-fncmethod");
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = $formno;
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            // Check status
            $accApprove = $this->input->post("ip-accClearSec-appro");
            $accStatus = "";
            $accc_stepcode = "";

            //Check stepcode
            $check_getRuncode = check_getRuningCode($formcode , $areaid , "adv" , "wdf_accc_stepcode");
            if($check_getRuncode->num_rows() == 0){
                $accc_stepcode = getRuningCode(739);
            }else{
                $accc_stepcode = $check_getRuncode->row()->wdf_accc_stepcode;
            }

            if($accApprove == "ผ่าน"){
                if($fncMethod != "จ่ายเงินคืนให้ผู้ขอ"){
                    $accStatus = "Clear money complete";
                }else{
                    $accStatus = "Account passed inspection (Clear Money)";
                }

                $apUpdate = array(
                    "wdf_accc_stepcode" => $accc_stepcode,
                    "wdf_accc_appr" => $this->input->post("ip-accClearSec-appro"),
                    "wdf_accc_memo" => $this->input->post("ip-accClearSec-memo"),
                    "wdf_accc_user" => getUser()->Fname." ".getUser()->Lname,
                    "wdf_accc_dept" => getUser()->Dept,
                    "wdf_accc_deptcode" => getUser()->DeptCode,
                    "wdf_accc_ecode" => getUser()->ecode,
                    "wdf_accc_datetime" => date("Y-m-d H:i:s"),
                    "wdf_status" => $accStatus
                );

            }else if($accApprove == "ไม่ผ่าน"){
                $accStatus = "Account not pass inspection (Clear Money)";

                $apUpdate = array(
                    "wdf_accc_stepcode" => $accc_stepcode,
                    "wdf_accc_appr" => null,
                    "wdf_apc_appr" => null,
                    "wdf_accc_memo" => $this->input->post("ip-accClearSec-memo"),
                    "wdf_accc_user" => getUser()->Fname." ".getUser()->Lname,
                    "wdf_accc_dept" => getUser()->Dept,
                    "wdf_accc_deptcode" => getUser()->DeptCode,
                    "wdf_accc_ecode" => getUser()->ecode,
                    "wdf_accc_datetime" => date("Y-m-d H:i:s"),
                    "wdf_status" => $accStatus
                );

                $apvUpdate = array(
                    "apv_status" => "Inactive"
                );
                $this->db->where("apv_formcode" , $formcode);
                $this->db->where("apv_areaid" , $areaid);
                $this->db->where("apv_type" , "Clear money");
                $this->db->update("approve_user" , $apvUpdate);

                $arInsertTohistory = array(
                    "ch_formcode" => $formcode,
                    "ch_areaid" => $areaid,
                    "ch_doctype" => "adv",
                    "ch_stepcode" => $accc_stepcode,
                    "ch_memo" => $this->input->post("ip-accClearSec-memo"),
                    "ch_user" => getUser()->Fname." ".getUser()->Lname,
                    "ch_ecode" => getUser()->ecode,
                    "ch_datetime" => date("Y-m-d H:i:s"),
                );
                $this->db->insert("cancle_history" , $arInsertTohistory);
            }

            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $apUpdate);


            $appGroup = getDataAppGroup($formcode , $areaid)->wdf_appgroup;
            $appGroupClear = getDataAppGroup($formcode , $areaid)->wdf_appgroup_clear;
            if($fncMethod != "จ่ายเงินคืนให้ผู้ขอ"){
                if($appGroup == 4 || $appGroup == 3 || $appGroup == 2 || $appGroup == 1 || $appGroup == 0){
                    $this->advemail->send_to_userCompleteClearExcutiveNone($formcode , $formno);
                }else if($appGroup == 5){
                    $this->advemail->send_to_userCompleteClearNone($formcode , $formno);
                }
            }else{
                if($appGroup == 4 || $appGroup == 3 || $appGroup == 2 || $appGroup == 1 || $appGroup == 0){
                    if($appGroupClear == 4 || $appGroupClear == 3 || $appGroupClear == 2 || $appGroupClear == 1 || $appGroupClear == 0){
                        $this->advemail->send_to_financeClearExHaveEx($formcode , $formno);
                    }else if($appGroupClear == 5){
                        $this->advemail->send_to_financeClearExHaveG5($formcode , $formno);
                    }
                }else if($appGroup == 5){
                    if($appGroupClear == 4 || $appGroupClear == 3 || $appGroupClear == 2 || $appGroupClear == 1 || $appGroupClear == 0){
                        $this->advemail->send_to_financeClear2HaveEx($formcode , $formno);
                    }else if($appGroupClear == 5){
                        $this->advemail->send_to_financeClear2HaveG5($formcode , $formno);
                    }
                }
            }

            $output = array(
                "msg" => "บันทึกข้อมูล ACC Clear เรียบร้อยแล้ว",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูล ACC Clear ไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }

    public function saveManagerClear()
    {
        if($this->input->post("ip-mgrClearSec-appro") != ""){
            $formcode = $this->input->post("check-mgrClearSec-formcode");
            $areaid = $this->input->post("check-mgrClearSec-areaid");
            $mgrc_stepcode = getRuningCode(749);
            $formno = conFormcodeToFormNo($formcode);
            $appGroup = $this->input->post("check-mgrClearSec-appGroup");

            //update old status
            //Send to notifycenter
            $notifyformno = $formno;
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            // Save data to wdf_master table
            if($this->input->post("ip-mgrClearSec-appro") == "อนุมัติ"){
                $managerStatus = "Manager approved (Clear Money)";

                $arInsertManager = array(
                    "wdf_mgrc_appr" => $this->input->post("ip-mgrClearSec-appro"),
                    "wdf_mgrc_memo" => $this->input->post("ip-mgrClearSec-memo"),
                    "wdf_mgrc_user" => getUser()->Fname." ".getUser()->Lname,
                    "wdf_mgrc_dept" => getUser()->Dept,
                    "wdf_mgrc_deptcode" => getUser()->DeptCode,
                    "wdf_mgrc_datetime" => date("Y-m-d H:i:s"),
                    "wdf_status" => $managerStatus,
    
                    "wdf_paygroup_clear" => $this->input->post("check-mgrClearSec-paygroupid"),
                    "wdf_appgroup_clear" => $this->input->post("check-mgrClearSec-group"),
                    "wdf_areaidgroup_clear" => $this->input->post("check-mgrClearSec-groupareaid")
                );

            }else{
                $managerStatus = "Manager not approve (Clear Money)";

                $arInsertTohistory = array(
                    "ch_formcode" => $formcode,
                    "ch_areaid" => $areaid,
                    "ch_doctype" => "adv",
                    "ch_stepcode" => $mgrc_stepcode,
                    "ch_memo" => $this->input->post("ip-mgrClearSec-memo"),
                    "ch_user" => getUser()->Fname." ".getUser()->Lname,
                    "ch_ecode" => getUser()->ecode,
                    "ch_datetime" => date("Y-m-d H:i:s"),
                );
                $this->db->insert("cancle_history" , $arInsertTohistory);

                $arInsertManager = array(
                    "wdf_status" => $managerStatus
                );
            }
            

            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $arInsertManager);
            // Save data to wdf_master table


            if($this->input->post("ip-mgrClearSec-appro") == "อนุมัติ"){
                if($this->input->post("check-mgrClearSec-group") != 5){

                    $checkEcode = $this->input->post("ipv-advClear-appgd");
                    $areaidGroup = $this->input->post("check-mgrClearSec-groupareaid");
                    $group = $this->input->post("check-mgrClearSec-group");
    
                    foreach($checkEcode as $key => $checkEcodes){
                        // Save data to approve user table
                        $getEmail = getEmailByEcode($checkEcodes);
                        if($getEmail->num_rows() != 0){
                            $getEmail = $getEmail->row()->memberemail;
                        }else{
                            $getEmail = null;
                        }
    
                        $getUserByEcode = getuserDataByEcode($checkEcodes , $areaidGroup , $group)->app_user;
                        $getPosinameByEcode = getuserDataByEcode($checkEcodes , $areaidGroup , $group)->app_posiname;
                        
                        $arInsertApproveUser = array(
                            "apv_paygroupid" => $this->input->post("check-mgrClearSec-paygroupid"),
                            "apv_group" => $group,
                            "apv_user" => $getUserByEcode,
                            "apv_ecode" => $checkEcodes,
                            "apv_posiname" => $getPosinameByEcode,
                            "apv_formcode" => $this->input->post("check-mgrClearSec-formcode"),
                            "apv_areaidgroup" => $areaidGroup,
                            "apv_areaid" => $this->input->post("check-mgrClearSec-areaid"),
                            "apv_email" => $getEmail,
                            "apv_datetime" => date("Y-m-d H:i:s"),
                            "apv_type" => "Clear money",
                            "apv_status" => "Active"
                        );
                        $this->db->insert("approve_user" , $arInsertApproveUser);
                    }
                }
            }

            $appGroupClear = $this->input->post("check-mgrClearSec-group");
            if($appGroup == 4 || $appGroup == 3 || $appGroup == 2 || $appGroup == 1 || $appGroup == 0){
                if($appGroupClear == 5){
                    $this->advemail->send_to_apClearExcutiveHaveG5($formcode , $formno);
                }else if($appGroupClear == 4 || $appGroupClear == 3 || $appGroupClear == 2 || $appGroupClear == 1 || $appGroupClear == 0){
                    $this->advemail->send_to_excutiveClearExHave($formcode , $formno);
                }
            }else if($appGroup == 5){
                if($appGroupClear == 5){
                    $this->advemail->send_to_apClearHaveG5($formcode , $formno);
                }else if($appGroupClear == 4 || $appGroupClear == 3 || $appGroupClear == 2 || $appGroupClear == 1 || $appGroupClear == 0){
                    $this->advemail->send_to_excutiveClearHave($formcode , $formno);
                }
            }


            $output = array(
                "msg" => "บันทึกข้อมูลส่วนของ Manager สำเร็จ",
                "status" => "Insert Data Success"
            );
            
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูลส่วนของ Manager ไม่สำเร็จ",
                "status" => "Insert Data Not Success"
            );
        }
        echo json_encode($output);
    }

    public function getData_ManagerApprovedClear()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getData_ManagerApprovedClear"){

            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;
            $approveGroup = "";
            $areaidGroup = "";
            $posiname = "";

            $sqlgetMgr = $this->db->query("SELECT
            wdf_master.wdf_mgrc_appr,
            wdf_master.wdf_mgrc_memo,
            wdf_master.wdf_mgrc_user,
            wdf_master.wdf_mgrc_dept,
            wdf_master.wdf_mgrc_deptcode,
            wdf_master.wdf_mgrc_datetime,
            wdf_master.wdf_paygroup_clear,
            wdf_master.wdf_appgroup_clear,
            wdf_master.wdf_areaidgroup_clear,
            wdf_master.wdf_deptcode,
            wdf_master.wdf_status
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_doctype = 'adv' AND wdf_areaid = '$areaid'
            ");

            // Check Group 5
            $appGroup ="";
            $appGroupDetail = "";
            $userApproved = "";
            $mgrApproveData = "";
            $approveGroup = "";
            $posiname = "";

            $userDeptCode = "";
            $wdfstatus = "";
            if($sqlgetMgr->num_rows() != 0){

                $userDeptCode = $sqlgetMgr->row()->wdf_deptcode;
                $wdfstatus = $sqlgetMgr->row()->wdf_status;

                if($sqlgetMgr->row()->wdf_appgroup_clear != 5){
                    // Get data user approve
                    $userApproved = $this->getUserApprovedFromDbClear($formcode , $areaid);
                    // Check Data
                }else{
                    $userApproved = null;
                }
            }

            $approveGroup = $sqlgetMgr->row()->wdf_appgroup_clear;

            if($userApproved != null){
                if($userApproved->num_rows() != 0){
                    // $approveGroup = $userApproved->row()->apv_group;
                    $areaidGroup = $userApproved->row()->apv_areaidgroup;
                    $posiname = $userApproved->row()->apv_posiname;

                    $appGroup = $this->getUserGroup($approveGroup , $areaidGroup , $wdfstatus);
                    $appGroupDetail = $this->getUserInGroup($approveGroup , $areaidGroup , $userDeptCode , $wdfstatus);
                }else{
                    $areaidGroup = null;
                    $posiname = null;
                    $appGroup = null;
                    $appGroupDetail = null;
                }


            }else{
                // $approveGroup = null;
                $areaidGroup = null;
                $posiname = null;
                $appGroup = null;
                $appGroupDetail = null;
            }


            if($appGroup != null){
                $appGroup = $appGroup->result();
            }else{
                $appGroup = null;
            }

            if($appGroupDetail != null){
                $appGroupDetail = $appGroupDetail->result();
            }else{
                $appGroupDetail = null;
            }

            if($userApproved != null){
                $userApproved = $userApproved->result();
            }else{
                $userApproved = null;
            }

            
            


            $output = array(
                "msg" => "ดึงข้อมูล Manager Approve Clear สำเร็จ",
                "status" => "Select Data Success",
                "appGroup" => $appGroup,
                "appGroupDetail" => $appGroupDetail,
                "userApproved" => $userApproved,
                "mgrApproveData" => $sqlgetMgr->row(),
                "approveGroup" => $approveGroup,
                "posiname" => $posiname
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล Manager Approve Clear ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "appGroup" => null,
                "appGroupDetail" => null,
                "userApproved" => null,
                "mgrApproveData" => null,
                "approveGroup" => null,
                "posiname" => null
            );
        }

        echo json_encode($output);
    }

    public function savePayGroupClear()
    {
        $ecode = getUser()->ecode;
        if($this->input->post("ip-payGroupClearsec-appro-".$ecode) != ""){
            $formcode = $this->input->post("ip-payGroupClearsec-formcode-".$ecode);
            $areaid = $this->input->post("ip-payGroupClearsec-areaid-".$ecode);
            $totalApprove = $this->input->post("ip-payGroupClearsec-totalApp-".$ecode);
            $group = $this->input->post("ip-payGroupClearsec-group-".$ecode);
            $formno = conFormcodeToFormNo($formcode);

            $arInsertData = array(
                "apv_approve" => $this->input->post("ip-payGroupClearsec-appro-".$ecode),
                "apv_approve_memo" => $this->input->post("ip-payGroupClearsec-memo-".$ecode),
                "apv_approve_user" => getUser()->Fname." ".getUser()->Lname,
                "apv_approve_datetime" => date("Y-m-d H:i:s")
            );
            $this->db->where("apv_autoid" , $this->input->post("ip-payGroupClearsec-autoid-".$ecode));
            $this->db->update("approve_user" , $arInsertData);

            $statusText = "";
            // Update status
           
                $countAppNow = $this->countApproveClear($formcode , $areaid);

                $checkApproveStatus = 1;
                foreach($countAppNow->result() as $rs){
                    if($rs->apv_approve == "อนุมัติ"){
                        $checkApproveStatus = $checkApproveStatus*1;
                    }else if($rs->apv_approve == "ไม่อนุมัติ"){
                        $checkApproveStatus = $checkApproveStatus*0;
                    }
                }

                $appGroup = getDataAppGroup($formcode , $areaid)->wdf_appgroup;

                if($checkApproveStatus == 1){
                    if($countAppNow->num_rows() != $totalApprove){
                    
                        $statusText = "Wait Executive Group $group Approve (Clear Money)";
    
                    }else if($countAppNow->num_rows() == $totalApprove){

                        //update old status
                        //Send to notifycenter
                        $notifyformno = $formno;
                        $notifyprogramname = "WDF";
                        $notifystatus = "action done";
                        $notifytype = "take action";

                        $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
                        //Send to notifycenter
                        //update old status
    
                        $statusText = "Executive Group $group Approved (Clear Money)";
                        if($appGroup == 4 || $appGroup == 3 || $appGroup == 2 || $appGroup == 1 || $appGroup == 0){
                            $this->advemail->send_to_apClearExHaveEx($formcode , $formno);
                        }else if($appGroup == 5){
                            $this->advemail->send_to_apClearHaveEx($formcode , $formno);
                        }
                    }
                }else if($checkApproveStatus == 0){
                    $statusText = "Executive Group $group Not Approve (Clear Money)";

                    $apvUpdate = array(
                        "apv_status" => "Inactive"
                    );
                    $this->db->where("apv_formcode" , $formcode);
                    $this->db->where("apv_areaid" , $areaid);
                    $this->db->where("apv_type" , "Clear money");
                    $this->db->update("approve_user" , $apvUpdate);
                }
                

            


            $arupdateStatus = array(
                "wdf_status" => $statusText
            );
            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $arupdateStatus);

            $output = array(
                "msg" => "บันทึกข้อมูลการอนุมัติจากผู้มีอำนาจสำเร็จ",
                "status" => "Insert Data Success",
                "check" => $countAppNow->num_rows(),
                "formcode" => $formcode." ".$areaid
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูลการอนุมัติจากผู้มีอำนาจ ไม่สำเร็จ",
                "status" => "Insert Data Not Success"
            );
        }
        echo json_encode($output);
    }

    public function getdata_financeClearMoney2()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_financeClearMoney2"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            $sql = $this->db->query("SELECT
            wdf_master.wdf_fnc2_appr,
            wdf_master.wdf_fnc2_memo,
            wdf_master.wdf_fnc2_user,
            wdf_master.wdf_fnc2_dept,
            wdf_master.wdf_fnc2_deptcode,
            wdf_master.wdf_fnc2_ecode,
            wdf_master.wdf_fnc2_datetime
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_areaid = '$areaid'
            ");

            $output = array(
                "msg" => "ดึงข้อมูล FINANCE Clear2 สำเร็จ",
                "status" => "Select Data Success",
                "financeClearData" => $sql->row()
            );

        }else{
            $output = array(
                "msg" => "ดึงข้อมูล FINANCE Clear2 ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "financeClearData" => null
            );
        }
        echo json_encode($output);
    }

    public function saveFnClear2()
    {
        if($this->input->post("ip-fnClearSec2-appro") != ""){

            $formcode = $this->input->post("check-fnClearSec2-formcode");
            $areaid = $this->input->post("check-fnClearSec2-areaid");
            $financeAppr = $this->input->post("ip-fnClearSec2-appro");
            $financeClearStatus = "";
            $fnc2_stepcode = "";
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = $formno;
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            //Check stepcode
            $check_getRuncode = check_getRuningCode($formcode , $areaid , "adv" , "wdf_fnc2_stepcode");
            if($check_getRuncode->num_rows() == 0){
                $fnc2_stepcode = getRuningCode(739);
            }else{
                $fnc2_stepcode = $check_getRuncode->row()->wdf_fnc2_stepcode;
            }


            if($financeAppr == "ผ่าน"){
                $financeClearStatus = "Wait user receive money (Clear Money)";

                $arUpdateFnClear = array(
                    "wdf_fnc2_stepcode" => $fnc2_stepcode,
                    "wdf_fnc2_appr" => $financeAppr,
                    "wdf_fnc2_memo" => $this->input->post("ip-fnClearSec2-memo"),
                    "wdf_fnc2_user" => getUser()->Fname." ".getUser()->Lname,
                    "wdf_fnc2_dept" => getUser()->Dept,
                    "wdf_fnc2_deptcode" => getUser()->DeptCode,
                    "wdf_fnc2_ecode" => getUser()->ecode,
                    "wdf_fnc2_datetime" => date("Y-m-d H:i:s"),
                    "wdf_status" => $financeClearStatus
                );

            }else if($financeAppr == "ไม่ผ่าน"){
                $financeClearStatus = "Finance 2 not pass inspection (Clear Money)";

                $arUpdateFnClear = array(
                    "wdf_fnc2_stepcode" => $fnc2_stepcode,
                    "wdf_fnc2_appr" => null,
                    "wdf_apc_appr" => null,
                    "wdf_accc_appr" => null,
                    "wdf_fnc2_memo" => $this->input->post("ip-fnClearSec2-memo"),
                    "wdf_fnc2_user" => getUser()->Fname." ".getUser()->Lname,
                    "wdf_fnc2_dept" => getUser()->Dept,
                    "wdf_fnc2_deptcode" => getUser()->DeptCode,
                    "wdf_fnc2_ecode" => getUser()->ecode,
                    "wdf_fnc2_datetime" => date("Y-m-d H:i:s"),
                    "wdf_status" => $financeClearStatus
                );

                $apvUpdate = array(
                    "apv_status" => "Inactive"
                );
                $this->db->where("apv_formcode" , $formcode);
                $this->db->where("apv_areaid" , $areaid);
                $this->db->where("apv_type" , "Clear money");
                $this->db->update("approve_user" , $apvUpdate);

                $arInsertTohistory = array(
                    "ch_formcode" => $formcode,
                    "ch_areaid" => $areaid,
                    "ch_doctype" => "adv",
                    "ch_stepcode" => $fnc2_stepcode,
                    "ch_memo" => $this->input->post("ip-fnClearSec2-memo"),
                    "ch_user" => getUser()->Fname." ".getUser()->Lname,
                    "ch_ecode" => getUser()->ecode,
                    "ch_datetime" => date("Y-m-d H:i:s"),
                );
                $this->db->insert("cancle_history" , $arInsertTohistory);
            }


            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $arUpdateFnClear );


            $appGroup = getDataAppGroup($formcode , $areaid)->wdf_appgroup;
            $appGroupClear = getDataAppGroup($formcode , $areaid)->wdf_appgroup_clear;

            if($appGroup == 4 || $appGroup == 3 || $appGroup == 2 || $appGroup == 1 || $appGroup == 0){
                if($appGroupClear == 4 || $appGroupClear == 3 || $appGroupClear == 2 || $appGroupClear == 1 || $appGroupClear == 0){
                    $this->advemail->send_to_userreceiveClearExHaveEx($formcode , $formno);
                }else if($appGroupClear == 5){
                    $this->advemail->send_to_userreceiveClearExHaveG5($formcode , $formno);
                }
            }else if($appGroup == 5){
                if($appGroupClear == 4 || $appGroupClear == 3 || $appGroupClear == 2 || $appGroupClear == 1 || $appGroupClear == 0){
                    $this->advemail->send_to_userreceiveClearHaveEx($formcode , $formno);
                }else if($appGroupClear == 5){
                    $this->advemail->send_to_userreceiveClearHaveG5($formcode , $formno);
                }
            }

            $output = array(
                "msg" => "บันทึกการตรวจสอบข้อมูลของ Finance2 สำเร็จ",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "บันทึกการตรวจสอบข้อมูลของ Finance2 ไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }

    public function saveUserReceiveClear()
    {
        if($this->input->post("output_clear") != ""){
            $formcode = $this->input->post("check-userReceiveClearSec-formcode");
            $areaid = $this->input->post("check-userReceiveClearSec-areaid");
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = $formno;
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            // Check status
            
            $apUpdate = array(
                "wdf_urc2_signature" => $this->input->post("output_clear"),
                "wdf_urc2_memo" => $this->input->post("ip-userReceiveClearSec-memo"),
                "wdf_urc2_user" => getUser()->Fname." ".getUser()->Lname,
                "wdf_urc2_dept" => getUser()->Dept,
                "wdf_urc2_deptcode" => getUser()->DeptCode,
                "wdf_urc2_ecode" => getUser()->ecode,
                "wdf_urc2_datetime" => date("Y-m-d H:i:s"),
                "wdf_status" => "Clear money complete"
            );
            $this->db->where("wdf_formcode" , $formcode);
            $this->db->where("wdf_areaid" , $areaid);
            $this->db->update("wdf_master" , $apUpdate);



            $appGroup = getDataAppGroup($formcode , $areaid)->wdf_appgroup;
            $appGroupClear = getDataAppGroup($formcode , $areaid)->wdf_appgroup_clear;

            if($appGroup == 4 || $appGroup == 3 || $appGroup == 2 || $appGroup == 1 || $appGroup == 0){
                if($appGroupClear == 4 || $appGroupClear == 3 || $appGroupClear == 2 || $appGroupClear == 1 || $appGroupClear == 0){
                    $this->advemail->send_to_userCompleteClearExHaveEx($formcode , $formno);
                }else if($appGroupClear == 5){
                    $this->advemail->send_to_userCompleteClearExHaveG5($formcode , $formno);
                }
            }else if($appGroup == 5){
                if($appGroupClear == 4 || $appGroupClear == 3 || $appGroupClear == 2 || $appGroupClear == 1 || $appGroupClear == 0){
                    $this->advemail->send_to_userCompleteClearHaveEx($formcode , $formno);
                }else if($appGroupClear == 5){
                    $this->advemail->send_to_userCompleteClearHaveG5($formcode , $formno);
                }
            }


            $output = array(
                "msg" => "บันทึกข้อมูล User Receive Clear เรียบร้อยแล้ว",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูล User Receive Clear ไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }
    

    public function getdata_userReceiveClear()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_userReceiveClear"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            $sql = $this->db->query("SELECT
            wdf_master.wdf_urc2_signature,
            wdf_master.wdf_urc2_memo,
            wdf_master.wdf_urc2_user,
            wdf_master.wdf_urc2_dept,
            wdf_master.wdf_urc2_deptcode,
            wdf_master.wdf_urc2_ecode,
            wdf_master.wdf_urc2_datetime
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_areaid = '$areaid'
            ");

            $output = array(
                "msg" => "ดึงข้อมูล User receive clear สำเร็จ",
                "status" => "Select Data Success",
                "userreceiveData" => $sql->row()
            );

        }else{
            $output = array(
                "msg" => "ดึงข้อมูล User receive clear ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "userreceiveData" => null
            );
        }
        echo json_encode($output);
    }


    public function getUserPermission()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getUserPermission"){
            $ecode = $received_data->ecode;
            $sql = $this->db->query("SELECT
            user_permission.u_autoid,
            user_permission.u_username,
            user_permission.u_fullname,
            user_permission.u_ecode,
            user_permission.u_email,
            user_permission.u_dept,
            user_permission.u_deptcode,
            user_permission.u_datetime,
            user_permission.u_userstatus,
            user_permission.u_doctype_adv,
            user_permission.u_doctype_wdf,
            user_permission.u_doctype_sal,
            user_permission.u_newdoc,
            user_permission.u_mgr_section,
            user_permission.u_budget_section,
            user_permission.u_ap_section,
            user_permission.u_acc_section,
            user_permission.u_finance_section,
            user_permission.u_userreceive_section,
            user_permission.u_clearmoney,
            user_permission.u_finance_clear_section,
            user_permission.u_mgr_clear_section,
            user_permission.u_ap_clear_section,
            user_permission.u_acc_clear_section,
            user_permission.u_finance2_clear_section,
            user_permission.u_userreceive_clear_section
            FROM
            user_permission
            WHERE u_ecode = '$ecode'
            ");

            $output = array(
                "msg" => "ดึงข้อมูล User Permission สำเร็จ",
                "status" => "Select Data Success",
                "result" => $sql->row()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล User Permission สำเร็จ",
                "status" => "Select Data Success",
                "result" => null
            );
        }
        echo json_encode($output);
    }


    public function loadDataForFilter()
    {
        $userDeptCode = getUser()->DeptCode;
        $userPosi = getUser()->posi;
        $userEcode = getUser()->ecode;

        $condition_user = "";
        $condition_dept = "";
        $condition_status = "";

        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadDataForFilter"){

            // Get User By Dept Data
            if($userDeptCode == 1003 || $userEcode == "M1809"){
                $condition_user = "";
            }else if($userEcode == "M0040"){
                $condition_user = "AND wdf_deptcode IN ('1010' , '1007') AND wdf_areaid IN ('sc','pa','ca')";
            }else{
                $condition_user = "AND wdf_deptcode = '$userDeptCode' ";
            }

            $sql_get_user = $this->db->query("SELECT
            wdf_master.wdf_user,
            wdf_master.wdf_ecode
            FROM
            wdf_master
            WHERE wdf_doctype = 'adv' $condition_user
            GROUP BY wdf_user ORDER BY wdf_user ASC");
            // Get User By Dept Data


            // Get dept
            if($userDeptCode == 1003 || $userEcode == "M1809"){
                $condition_dept = "";
            }else{
                $condition_dept = "AND wdf_deptcode = '$userDeptCode' ";
            }

            $sql_get_dept = $this->db->query("SELECT
            wdf_master.wdf_dept,
            wdf_master.wdf_deptcode
            FROM
            wdf_master
            WHERE wdf_doctype = 'adv' $condition_dept
            GROUP BY wdf_dept ORDER BY wdf_deptcode ASC");
            // Get dept


            // Get Status
            // if($userDeptCode == 1003 || $userEcode == "M1809"){
            //     $condition_status = "";
            // }else{
            //     $condition_status = "AND wdf_deptcode = '$userDeptCode' ";
            // }

            $sql_get_status = $this->db->query("SELECT
            status_master.st_autoid,
            status_master.st_name
            FROM
            status_master
            WHERE st_adv = 'yes' ORDER BY st_order ASC
            ");



            $output = array(
                "msg" => "ดึงข้อมูลที่จะใช้ Filter สำเร็จ",
                "status" => "Select Data Success",
                "filterUser" => $sql_get_user->result(),
                "filterDept" => $sql_get_dept->result(),
                "filterStatus" => $sql_get_status->result()
            );


        }else{
            $output = array(
                "msg" => "ดึงข้อมูลที่จะใช้ Filter ไม่สำเร็จ",
                "status" => "Select Data Not Success",
            );
        }

        echo json_encode($output);
    }


    public function advance_reportlist_filter($startDate , $endDate , $company , $user , $dept , $status)
    {
        // DB table to use
        $table = 'list_advance';

        // Table's primary key
        $primaryKey = 'wdf_autoid';

        $columns = array(
            array('db' => 'wdf_formno', 'dt' => 0,
                'formatter' => function($d , $row){
                    $formcode = conFormNoToFormCode($d);
                    $output ='
                    <a href="javascript:void(0)" class="select_form"
                        data_formcode="'.$formcode.'"
                        data_formno="'.$d.'"
                    ><b>'.$d.'</b></a>
                    ';
                    return $output;
                }
            ),
            array('db' => 'wdf_areaid', 'dt' => 1 ,
                'formatter' => function($d , $row){
                    $resultCon = "";
                    switch($d){
                        case "sc":
                            $resultCon = "Salee Colour";
                            break;
                        case "pa":
                            $resultCon = "Poly Meritasia";
                            break;
                        case "ca":
                            $resultCon = "Composite Asia";
                            break;
                        case "st":
                            $resultCon = "Subterra";
                            break;
                        case "tb":
                            $resultCon = "The bubbles";
                            break;
                    }
                    return $resultCon;
                }
            ),
            array('db' => 'wdf_user', 'dt' => 2),
            array('db' => 'wdf_ecode', 'dt' => 3),
            array('db' => 'wdf_dept', 'dt' => 4),
            array('db' => 'wdf_datetime', 'dt' => 5 ,
                'formatter' => function($d , $row){
                    return conDateTimeFromDb($d);
                }
            ),
            array('db' => 'wdf_pricewithvat', 'dt' => 6 ,
                'formatter' => function($d , $row){
                    return number_format($d , 2);
                }
            ),
            array('db' => 'wdf_currency', 'dt' => 7 ,
                'formatter' => function($d , $row){
                    if($d === null){
                        $d = "THB";
                    }
                    return $d;
                }
            ),
            array('db' => 'wdf_ap_memo', 'dt' => 8),
            array('db' => 'wdf_status', 'dt' => 9,
                'formatter' => function($d , $row){
                    $colorText = conColorTextStatus($d);
                    $statusHtml = '<b><span '.$colorText.'>'.$d.'</span></b>';
                    return $statusHtml;
                }
            ),
        );

        // SQL server connection information
        $sql_details = array(
            'user' => getDb()->db_username,
            'pass' => getDb()->db_password,
            'db'   => getDb()->db_databasename,
            'host' => getDb()->db_host
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * If you just want to use the basic configuration for DataTables with PHP
        * server-side, there is no need to edit below this line.
        */
        require('server-side/scripts/ssp.class.php');

        $ecode = getUser()->ecode;
        $deptcode = getUser()->DeptCode;
        $posi = getUser()->posi;

        $sql_searchBydate = "";
        
        if($startDate == "0" && $endDate == "0"){
            $sql_searchBydate = "wdf_datetime LIKE '%%' ";
        }else if($startDate == "0" && $endDate != "0"){
            $sql_searchBydate = "wdf_datetime BETWEEN '$endDate 00:00:01' AND '$endDate 23:59:59' ";
        }else if($startDate != "0" && $endDate != "0"){
            $sql_searchBydate = "wdf_datetime BETWEEN '$startDate 00:00:01' AND '$endDate 23:59:59' ";
        }else if($startDate != "0" && $endDate == "0"){
            $sql_searchBydate = "wdf_datetime BETWEEN '$startDate 00:00:01' AND '$startDate 23:59:59' ";
        }



        $query_company = "";
        if($company == "0"){
            $query_company = "";
        }else{
            $query_company = "AND wdf_areaid = '$company' ";
        }

        $query_user = "";
        if($user == "0"){
            $query_user = "";
        }else{
            $query_user = "AND wdf_ecode = '$user' ";
        }

        $query_dept = "";
        if($dept == "0"){
            $query_dept = "";
        }else{
            $query_dept = "AND wdf_deptcode = '$dept' ";
        }

        $query_status = "";
        $con_status = "";
        if($status == "0"){
            $query_status = "";
        }else{
            $con_status = conStatusNumToText($status , "adv");
            $query_status = "AND wdf_status = '$con_status' ";
        }


        if($deptcode == "1003" || $ecode == "M1809"){
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "$sql_searchBydate $query_company $query_user $query_dept $query_status")
            );
        }else if($posi > 75){
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "$sql_searchBydate $query_company $query_user $query_dept $query_status")
            );
        }else if($ecode == "M0051"){
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_deptcode = '$deptcode' OR wdf_areaid IN ('tb') AND $sql_searchBydate $query_company $query_user  $query_status")
            );
        }else if($ecode == "M2076"){
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_areaid IN ('tb') AND $sql_searchBydate $query_company $query_user $query_status")
            );
        }else{
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_deptcode = '$deptcode' AND $sql_searchBydate $query_company $query_user $query_dept $query_status")
            );
        }
    }


    public function getAdvCurrencyFromDb()
    {
        $sql = $this->db->query("SELECT * FROM wdf_currency ORDER BY cu_autoid ASC");
        $output = array(
            "msg" => "ดึงข้อมูลสกุลเงินสำเร็จ",
            "status" => "Select Data Success",
            "result" => $sql->result()
        );

        echo json_encode($output);
    }


    
    

}/* End of file ModelName.php */


?>