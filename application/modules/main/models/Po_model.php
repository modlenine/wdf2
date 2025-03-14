<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Po_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model("poemail_model" , "poemail");

        $this->db_mssqlSln = $this->load->database('mssql_sln' , true);
        $this->db_mssqlTbb = $this->load->database('mssql_tbb' , true);
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


    public function saveDataPoNew()
    {
        if($this->input->post("ip-po-areaid") != "" && $this->input->post("ip-podetail-priceTotal") != ""){
            $getFormCode = getRuningCode(400);
            $getFormNo = getFormNo_po();

            // Save Data to wdf_master table
            $arinsertData = array(
                "wdf_formno" => $getFormNo,
                "wdf_formcode" => $getFormCode,
                "wdf_areaid" => $this->input->post("ip-po-areaid"),
                "wdf_doctype" => "po",
                "wdf_status" => "Open",
                "wdf_currency" => $this->input->post("ip-po-currency"),
                "wdf_ponumber" => $this->input->post("ip-po-ponumber"),
                "wdf_memo" => $this->input->post("ip-po-memo"),
                "wdf_userreceive" => $this->input->post("ip-po-userreceive"),
                "wdf_userreceived_detail" => $this->input->post("ip-po-userreceiveDetail"),
                "wdf_vat1" => $this->input->post("ip-podetail-vat7"),
                "wdf_vat2" => $this->input->post("ip-podetail-vat3"),
                "wdf_pricenonevat" => conPrice($this->input->post("ip-podetail-priceNonVat")),
                "wdf_pricevat1" => conPrice($this->input->post("ip-podetail-vat7Price")),
                "wdf_pricevat2" => conPrice($this->input->post("ip-podetail-vat3Price")),
                "wdf_pricewithvat" => conPrice($this->input->post("ip-podetail-priceTotal")),
                "wdf_user" => getUser()->Fname." ".getUser()->Lname,
                "wdf_ecode" => getUser()->ecode,
                "wdf_deptcode" => getUser()->DeptCode,
                "wdf_dept" => getUser()->Dept,
                "wdf_datetime" => date("Y-m-d H:i:s"),
            );
            $this->db->insert("wdf_master" , $arinsertData);
            // Save Data to wdf_master table


            // Save wdf trans
            $detailAutoid = $this->input->post("input-accode");
            foreach($detailAutoid as $key => $detailAutoids){
                $arinsertTrans = array(
                    "tr_mas_formcode" => $getFormCode,
                    "tr_areaid" => $this->input->post("ip-po-areaid"),
                    "tr_mas_doctype" => "po",
                    // "tr_detail_refid" => $detailAutoids,

                    "tr_itemid" => $this->input->post("inputs-itemid")[$key],
                    "tr_itemname" => $this->input->post("inputs-itemname")[$key],
                    "tr_itemgroup" => $this->input->post("inputs-itemgroup")[$key],

                    "tr_detailname" => $this->input->post("input-detaillist")[$key],
                    "tr_detaildeptcode" => $this->input->post("input-deptcode")[$key],
                    "tr_detailaccode" => $detailAutoids,
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
            $fileInput = "ip-podetail-file";
            uploadImagePo($fileInput , $getFormCode , $this->input->post("ip-po-areaid"));

            $this->poemail->send_to_ap($getFormCode , $getFormNo);
            

            $output = array(
                "msg" => "บันทึกข้อมูลสำเร็จ",
                "status" => "Insert Data Success",
                "formcode" => $getFormCode,
                "formno" => $getFormNo,
                "filedata" => $_FILES['ip-podetail-file']['name']
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูลไม่สำเร็จ",
                "status" => "Insert Data Not Success",
            );
        }

        echo json_encode($output);
    }

    public function uploadfile()
    {
        $data = $_FILES['file'];
        $output = array(
            "result" => $data
        );
        echo json_encode($output);
    }

    public function sendDataTOManager()
    {
        $this->poemail->send_to_ap($getFormCode , $getFormNo);
    }

    public function saveDataPoNew_edit()
    {
        if($this->input->post("ipe-po-areaid") != "" && $this->input->post("ipe-podetail-priceTotal") != ""){

            $formcode = $this->input->post("edit_formcode_po");

            // Save Data to wdf_master table
            $arUpdateData = array(
                "wdf_areaid" => $this->input->post("ipe-po-areaid"),
                "wdf_doctype" => "po",
                "wdf_status" => "Edit",
                "wdf_currency" => $this->input->post("ipe-po-currency"),
                "wdf_ponumber" => $this->input->post("ipe-po-ponumber"),
                "wdf_memo" => $this->input->post("ipe-po-memo"),
                "wdf_userreceive" => $this->input->post("ipe-po-userreceive"),
                "wdf_userreceived_detail" => $this->input->post("ipe-po-userreceiveDetail"),
                "wdf_vat1" => $this->input->post("ipe-podetail-vat7"),
                "wdf_vat2" => $this->input->post("ipe-podetail-vat3"),
                "wdf_pricenonevat" => conPrice($this->input->post("ipe-podetail-priceNonVat")),
                "wdf_pricevat1" => conPrice($this->input->post("ipe-podetail-vat7Price")),
                "wdf_pricevat2" => conPrice($this->input->post("ipe-podetail-vat3Price")),
                "wdf_pricewithvat" => conPrice($this->input->post("ipe-podetail-priceTotal")),
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
            $this->db->where("tr_mas_doctype" , "po");
            $this->db->delete("wdf_trans");

            $detailAutoid = $this->input->post("inpute-po-detailautoid");
            foreach($detailAutoid as $key => $detailAutoids){
                $arinsertTrans = array(
                    "tr_mas_formcode" => $formcode,
                    "tr_areaid" => $this->input->post("ipe-po-areaid"),
                    "tr_mas_doctype" => "po",
                    "tr_detail_refid" => $detailAutoids,

                    "tr_itemid" => $this->input->post("inputse-itemid")[$key],
                    "tr_itemname" => $this->input->post("inputse-itemname")[$key],
                    "tr_itemgroup" => $this->input->post("inputse-itemgroup")[$key],

                    "tr_detailname" => $this->input->post("inpute-po-detaillist")[$key],
                    "tr_detaildeptcode" => $this->input->post("inpute-po-deptcode")[$key],
                    "tr_detailaccode" => $this->input->post("inpute-po-accode")[$key],
                    "tr_detailaccodename" => $this->input->post("inpute-po-accodename")[$key],
                    "tr_money" => conPrice($this->input->post("inpute-po-price")[$key]),
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
            $fileInput = "ipe-podetail-file";
            uploadImagePo($fileInput , $formcode , $this->input->post("ipe-po-areaid"));
            

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

    public function po_list_filter($startDate , $endDate , $company , $user , $dept , $status)
    {
        // DB table to use
        $table = 'list_po';

        // Table's primary key
        $primaryKey = 'wdf_autoid';

        $columns = array(
            array('db' => 'wdf_formno', 'dt' => 0,
                'formatter' => function($d , $row){
                    $formcode = conFormNoToFormCode($d);
                    $output ='
                    <a href="javascript:void(0)" class="select_form_po"
                        data_formcode="'.$formcode.'"
                        data_formno="'.$d.'"
                    ><b>'.$d.'</b></a>
                    ';
                    return $output;
                }
            ),
            array('db' => 'wdf_ponumber', 'dt' => 1),
            array('db' => 'wdf_areaid', 'dt' => 2 ,
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
            array('db' => 'wdf_user', 'dt' => 3),
            array('db' => 'wdf_ecode', 'dt' => 4),
            array('db' => 'wdf_dept', 'dt' => 5),
            array('db' => 'wdf_datetime', 'dt' => 6 ,
                'formatter' => function($d , $row){
                    return conDateTimeFromDb($d);
                }
            ),
            array('db' => 'wdf_pricewithvat', 'dt' => 7 ,
                'formatter' => function($d , $row){
                    return number_format($d , 2);
                }
            ),
            array('db' => 'wdf_currency', 'dt' => 8 ,
                'formatter' => function($d , $row){
                    if($d === null){
                        $d = "THB";
                    }
                    return $d;
                }
            ),
            array('db' => 'wdf_ap_memo', 'dt' => 9 ,
                'formatter' => function($d , $row){
                    // if(strlen($d) > 40){
                    //     $d = substr($d , 0 , 40) . '...';
                    // }else{
                    //     $d = $d;
                    // }

                    return $d;
                }
            ),
            array('db' => 'wdf_status', 'dt' => 10,
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
            $con_status = conStatusNumToText($status , "sal");
            $query_status = "AND wdf_status = '$con_status' ";
        }


        if($deptcode == "1003" || $ecode == "M1809"){
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "$sql_searchBydate $query_company $query_user $query_dept $query_status")
            );
        }else if($posi > 75 || $ecode == "M0025" || $ecode == "M0015" || $ecode == "M0051"){
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "$sql_searchBydate $query_company $query_user $query_dept $query_status")
            );
        }else if($ecode == "M2076" || $ecode == "M2077"){
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_areaid IN ('tb') AND $sql_searchBydate $query_company $query_user $query_status")
            );
        }else if($ecode == "M0040"){//พี่หนุ่ม
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_deptcode IN ('1010' , '1007') AND wdf_areaid IN ('sc','ca','pa') AND $sql_searchBydate $query_company $query_user $query_dept $query_status")
            );
        }else{
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "wdf_deptcode = '$deptcode' AND $sql_searchBydate $query_company $query_user $query_dept $query_status")
            );
        }
    }

    public function po_getDataviewfull()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "po_getDataviewfull"){

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
            wdf_master.wdf_ponumber,
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
            wdf_master.wdf_fnc_money
            FROM
            wdf_master
            WHERE wdf_formcode = '$formcode' AND wdf_formno = '$formno' AND wdf_doctype = 'po'
            ");

            $queryTrans = $this->po_getwdftrans($formcode);
            $queryImage = $this->po_getImage($formcode);

            $output = array(
                "msg" => "ดังข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "viewfulldata" => $sql->row(),
                "viewfulldata_trans" => $queryTrans->result(),
                "viewfulldata_image" => $queryImage->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "viewfulldata" => null,
                "viewfulldata_trans" => null,
                "viewfulldata_image" => null
            );
        }
        echo json_encode($output);
    }

    private function po_getwdftrans($formcode)
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
        WHERE tr_mas_formcode = '$formcode' AND tr_mas_doctype = 'po' ORDER BY tr_autoid ASC
        ");

        return $sql;
    }

    private function po_getImage($formcode)
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
        WHERE fi_formcode = '$formcode' AND fi_doctype = 'po' ORDER BY fi_autoid ASC
        ");
        return $sql;
    }

    public function delFile_edit_po()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "delFile_edit_po"){
            $formcode = $received_data->data_formcode;
            $filepath = $received_data->data_path;
            $filename = $received_data->data_name;

            $path = $_SERVER['DOCUMENT_ROOT']."/intsys/wdf2/".$filepath.$filename;
            unlink($path);

            $this->db->where("fi_formcode" , $formcode);
            $this->db->where("fi_name" , $filename);
            $this->db->where("fi_doctype" , "po");
            $this->db->delete("wdf_files");

            $queryFile = $this->po_getImage($formcode);

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

    public function cancel_po()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "cancel_po"){
            $formcode = $received_data->data_formcode;

            //update old status
            //Send to notifycenter
            $notifyformno = conFormcodeToFormNo($formcode);
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            $arUpdateStatus = array(
                "wdf_status" => "User cancel"
            );
            $this->db->where("wdf_formcode" , $formcode);
            $this->db->update("wdf_master" , $arUpdateStatus);

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

    public function saveAp_po()
    {
        if($this->input->post("ip-po-apsec-appro") != ""){
            $formcode = $this->input->post("check-apsec-formcode-po");
            $areaid = $this->input->post("check-apsec-areaid-po");
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = conFormcodeToFormNo($formcode);
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            // Check status
            $apApprove = $this->input->post("ip-po-apsec-appro");
            $apStatus = "";
            if($apApprove == "ผ่าน"){
                $apStatus = "AP passed inspection";
            }else if($apApprove == "ไม่ผ่าน"){
                $apStatus = "AP not pass inspection";
            }
            $apUpdate = array(
                "wdf_ap_appr" => $this->input->post("ip-po-apsec-appro"),
                "wdf_ap_memo" => $this->input->post("ip-po-apsec-memo"),
                "wdf_ap_moneymethod" => $this->input->post("ip-po-apsec-money"),
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

            $this->poemail->send_to_account($formcode , $formno);

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

    public function getdata_apApprove_po()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_apApprove_po"){
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
            wdf_master.wdf_ap_datetime
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

    public function saveAcc_po()
    {
        if($this->input->post("ip-po-accSec-appro") != ""){
            $formcode = $this->input->post("check-accsec-formcode-po");
            $areaid = $this->input->post("check-accsec-areaid-po");
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = conFormcodeToFormNo($formcode);
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            // Check status
            $accApprove = $this->input->post("ip-po-accSec-appro");
            $accStatus = "";
            if($accApprove == "ผ่าน"){
                $accStatus = "Account passed inspection";
            }else if($accApprove == "ไม่ผ่าน"){
                $accStatus = "Account not pass inspection";
            }
            $apUpdate = array(
                "wdf_acc_appr" => $this->input->post("ip-po-accSec-appro"),
                "wdf_acc_memo" => $this->input->post("ip-po-accSec-memo"),
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

            $this->poemail->send_to_finance($formcode , $formno);

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

    public function getdata_accApprove_po()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_accApprove_po"){
            $formcode = $received_data->formcode;
            $areaid = $received_data->areaid;

            $sql = $this->db->query("SELECT
            wdf_master.wdf_acc_appr,
            wdf_master.wdf_acc_memo,
            wdf_master.wdf_acc_user,
            wdf_master.wdf_acc_dept,
            wdf_master.wdf_acc_deptcode,
            wdf_master.wdf_acc_ecode,
            wdf_master.wdf_acc_datetime
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

    public function saveFn_po()
    {
        if($this->input->post("ip-po-fnSec-appro") != ""){
            $formcode = $this->input->post("check-fnsec-formcode-po");
            $areaid = $this->input->post("check-fnsec-areaid-po");
            $formno = conFormcodeToFormNo($formcode);

            //update old status
            //Send to notifycenter
            $notifyformno = conFormcodeToFormNo($formcode);
            $notifyprogramname = "WDF";
            $notifystatus = "action done";
            $notifytype = "take action";

            $this->notifycenter->updatedataAction_template($notifyformno , $notifyprogramname , $notifystatus , $notifytype);
            //Send to notifycenter
            //update old status

            // Check status
            $fnApprove = $this->input->post("ip-po-fnSec-appro");
            $fnStatus = "";
            if($fnApprove == "ผ่าน"){
                $fnStatus = "Complete";
            }else if($fnApprove == "ไม่ผ่าน"){
                $fnStatus = "Finance not pass inspection";
            }
            $apUpdate = array(
                "wdf_fn_appr" => $this->input->post("ip-po-fnSec-appro"),
                "wdf_fn_memo" => $this->input->post("ip-po-fnSec-memo"),
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

            // Save File
            // $fileInput = "ip-po-fnSec-file";
            // uploadImagePoFn($fileInput , $formcode , $areaid);

            $this->poemail->send_to_user($formcode , $formno);

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

    public function uploadfileFnSec()
    {
            if($this->input->post("ip-pof-formcode") != "" && $this->input->post("ip-pof-areaid") != ""){
                $formcode = $this->input->post("ip-pof-formcode");
                $areaid = $this->input->post("ip-pof-areaid");
                // Save File
                $fileInput = "ip-po-fnSec-file";
                uploadImagePoFn($fileInput , $formcode , $areaid);

                $output = array(
                    "msg" => "อัพโหลดไฟล์สำเร็จ",
                    "status" => "Update Data Success"
                );
            }else{
                $output = array(
                    "msg" => "อัพโหลดไฟล์ไม่สำเร็จ",
                    "status" => "Update Data Not Success"
                );
            }
        
        echo json_encode($output);
    }

    public function getdata_financeApprove_po()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getdata_financeApprove_po"){
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

            $resultFileFnSec = $this->getFileFnSection($formcode , $areaid);

            $output = array(
                "msg" => "ดึงข้อมูล FINANCE สำเร็จ",
                "status" => "Select Data Success",
                "financeData" => $sql->row(),
                "financeFile" => $resultFileFnSec->result()
            );

        }else{
            $output = array(
                "msg" => "ดึงข้อมูล FINANCE ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "financeData" => null,
                "financeFile" => null
            );
        }
        echo json_encode($output);
    }
    private function getFileFnSection($formcode , $areaid)
    {
        $sql = $this->db->query("SELECT * FROM wdf_files WHERE fi_formcode = '$formcode' AND fi_areaid = '$areaid' AND fi_doctype = 'po_fn'");
        return $sql;
    }

    public function getUserPermission_po()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getUserPermission_po"){
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


    public function getMaximumMoney_po()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getMaximumMoney_po"){
            $groupAreaid = $received_data->groupAreaid;
            $doctype = $received_data->doctype;

            if($groupAreaid != "" && $doctype != ""){
                $sql = $this->db->query("SELECT
                pay_group.pay_autoid,
                pay_group.pay_groupid,
                pay_group.pay_scope_start,
                pay_group.pay_scope_end,
                pay_group.pay_doctype,
                pay_group.approve_group,
                pay_group.areaid
                FROM
                pay_group
                WHERE areaid = '$groupAreaid' AND pay_doctype = '$doctype'
                ORDER BY pay_groupid DESC LIMIT 1
                ");

                $output = array(
                    "msg" => "ดึงข้อมูล Max money สำเร็จ",
                    "status" => "Select Data Success",
                    "maxmoney" => $sql->row()
                );
            }else{
                $output = array(
                    "msg" => "ดึงข้อมูล Max money ไม่สำเร็จ",
                    "status" => "Select Data Not Success",
                    "maxmoney" => null
                );
            }
            echo json_encode($output);
        }
    }


    public function loadDataForFilter_po()
    {
        $userDeptCode = getUser()->DeptCode;
        $userPosi = getUser()->posi;
        $userEcode = getUser()->ecode;

        $condition_user = "";
        $condition_dept = "";
        $condition_status = "";

        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadDataForFilter_po"){

            // Get User By Dept Data
            if($userDeptCode == 1003 || $userEcode == "M1809"){
                $condition_user = "";
            }else{
                $condition_user = "AND wdf_deptcode = '$userDeptCode' ";
            }

            $sql_get_user = $this->db->query("SELECT
            wdf_master.wdf_user,
            wdf_master.wdf_ecode
            FROM
            wdf_master
            WHERE wdf_doctype = 'po' $condition_user
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
            WHERE wdf_doctype = 'po' $condition_dept
            GROUP BY wdf_dept ORDER BY wdf_deptcode ASC");
            // Get dept


            // Get Status
            $sql_get_status = $this->db->query("SELECT
            status_master.st_autoid,
            status_master.st_name
            FROM
            status_master
            WHERE st_po = 'yes' ORDER BY st_order ASC
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


    public function po_reportlist_filter($startDate , $endDate , $company , $user , $dept , $status)
    {
        // DB table to use
        $table = 'list_po';

        // Table's primary key
        $primaryKey = 'wdf_autoid';

        $columns = array(
            array('db' => 'wdf_formno', 'dt' => 0,
                'formatter' => function($d , $row){
                    $formcode = conFormNoToFormCode($d);
                    $output ='
                    <a href="javascript:void(0)" class="select_form_po"
                        data_formcode="'.$formcode.'"
                        data_formno="'.$d.'"
                    ><b>'.$d.'</b></a>
                    ';
                    return $output;
                }
            ),
            array('db' => 'wdf_ponumber', 'dt' => 1),
            array('db' => 'wdf_areaid', 'dt' => 2 ,
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
            array('db' => 'wdf_user', 'dt' => 3),
            array('db' => 'wdf_ecode', 'dt' => 4),
            array('db' => 'wdf_dept', 'dt' => 5),
            array('db' => 'wdf_datetime', 'dt' => 6 ,
                'formatter' => function($d , $row){
                    return conDateTimeFromDb($d);
                }
            ),
            array('db' => 'wdf_pricewithvat', 'dt' => 7 ,
                'formatter' => function($d , $row){
                    return number_format($d , 2);
                }
            ),
            array('db' => 'wdf_currency', 'dt' => 8 ,
                'formatter' => function($d , $row){
                    if($d === null){
                        $d = "THB";
                    }
                    return $d;
                }
            ),
            array('db' => 'wdf_ap_memo', 'dt' => 9),
            array('db' => 'wdf_status', 'dt' => 10,
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
            $con_status = conStatusNumToText($status , "sal");
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

    public function getPoCurrencyFromDb()
    {
        $sql = $this->db->query("SELECT * FROM wdf_currency ORDER BY cu_autoid ASC");
        $output = array(
            "msg" => "ดึงข้อมูลสกุลเงินสำเร็จ",
            "status" => "Select Data Success",
            "result" => $sql->result()
        );

        echo json_encode($output);
    }
    
    public function del_file_fnSec()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "del_file_fnSec"){
            $data_fiautoid = $received_data->data_fiautoid;
            $data_fipath = $received_data->data_fipath;
            $data_finame = $received_data->data_finame;

            $this->db->where("fi_autoid" , $data_fiautoid);
            $this->db->delete("wdf_files");

            $path = $_SERVER['DOCUMENT_ROOT']."/intsys/wdf2/".$data_fipath.$data_finame;
            unlink($path);

            $output = array(
                "msg" => "ลบรูปภาพสำเร็จ",
                "status" => "Delete Data Success"
            );
        }else{
            $output = array(
                "msg" => "ลบรูปภาพไม่สำเร็จ",
                "status" => "Delete Data Not Success"
            );
        }

        echo json_encode($output);
    }

    public function getVendinformation()
    {

        $searchText = $this->input->post("vendDataSearch");
        $dataareaid = $this->input->post("dataareaid");


        // $mssqlSln = $this->db_mssqlSln->query("SELECT TOP 50
        //         a.bpc_whtid,
        //         a.accountnum,
        //         a.name,
        //         a.slc_fname,
        //         a.slc_lname,
        //         a.address,
        //         b.street,
        //         a.phone,
        //         a.paymtermid,
        //         CASE
        //             WHEN a.dataareaid = 'sln' THEN 'Salee Colour'
        //             WHEN a.dataareaid = 'ca' THEN 'Composite Asia'
        //             WHEN a.dataareaid = 'poly' THEN 'Poly Meritasia'
        //             ELSE a.dataareaid
        //         END AS dataareaid_long,
        //         a.dataareaid,
        //         a.vendgroup,
        //         a.email
        //     FROM vendtable a
        //     INNER JOIN slc_vendaddress b ON a.accountnum = b.accountnum AND a.dataareaid = b.dataareaid
        //     WHERE a.bpc_whtid != '' 
        //     AND a.accountnum LIKE 'TH%'
        //     AND a.dataareaid NOT IN ('cos', 'new', 'poly', 'slc')
        //     AND (
        //         a.name LIKE '%$searchText%' 
        //         OR a.accountnum LIKE '%$searchText%' 
        //         OR a.bpc_whtid LIKE '%$searchText%'
        //     )
        //     ORDER BY a.name ASC;
        // ");

        // เรียกใช้ฟังก์ชันสำหรับค้นหาข้อมูลจากฐานข้อมูลต่าง ๆ
        $mssqlSln = $this->queryVendorData($this->db_mssqlSln, $searchText , $dataareaid);
        $mssqlTbb = $this->queryVendorData($this->db_mssqlTbb, $searchText , $dataareaid);

        // ตรวจสอบข้อมูลจากฐานข้อมูล sln และ tbb
        $useSql = ($mssqlSln->num_rows() == 0 && $mssqlTbb->num_rows() !== 0) ? $mssqlTbb : $mssqlSln;

        $output = array(
            "msg" => "ดึงข้อมูล Vendor สำเร็จ",
            "status" => "Select Data Success",
            "result" => $useSql->result(),
            "dataareaid" => $dataareaid
        );

        echo json_encode($output);
    }

    // สร้างฟังก์ชันสำหรับการค้นหาข้อมูลในแต่ละฐานข้อมูล
    private function queryVendorData($db, $searchText , $dataareaid)
    {
        $sql = "
            SELECT TOP 100
                a.bpc_whtid,
                a.accountnum,
                a.name,
                a.slc_fname,
                a.slc_lname,
                a.address,
                b.street,
                a.phone,
                a.paymtermid,
                CASE
                    WHEN a.dataareaid = 'sln' THEN 'Salee Colour'
                    WHEN a.dataareaid = 'ca' THEN 'Composite Asia'
                    WHEN a.dataareaid = 'poly' THEN 'Poly Meritasia'
                    ELSE a.dataareaid
                END AS dataareaid_long,
                a.dataareaid,
                a.vendgroup,
                a.email
            FROM vendtable a
            INNER JOIN slc_vendaddress b ON a.accountnum = b.accountnum AND a.dataareaid = b.dataareaid
            WHERE a.bpc_whtid != ''
            AND a.dataareaid NOT IN ('cos', 'new', 'poly', 'slc')
            AND a.dataareaid = '$dataareaid'
            AND (
                a.name LIKE '%$searchText%' 
                OR a.accountnum LIKE '%$searchText%' 
                OR a.bpc_whtid LIKE '%$searchText%'
            )
            ORDER BY a.name ASC;
        ";

        return $db->query($sql);
    }


    public function getPoByVendor()
    {
        if(!empty($this->input->post("data_accountnum")) && !empty($this->input->post("data_dataareaid"))){
            $data_accountnum = $this->input->post("data_accountnum");
            $data_dataareaid = $this->input->post("data_dataareaid");

            $mssqlSln = $this->queryPo($this->db_mssqlSln , $data_accountnum , $data_dataareaid);

            // ตรวจสอบข้อมูลจากฐานข้อมูล sln และ tbb
            // $useSql = ($mssqlSln->num_rows() == 0 && $mssqlTbb->num_rows() !== 0) ? $mssqlTbb : $mssqlSln;

            $dataPo = [];

            foreach ($mssqlSln->result() as $rs) {
                // ตรวจสอบว่า checkPoUpload คืนค่า query object ที่ถูกต้อง
                // $queryCheckUpload = $this->checkPoUpload($rs->purchid, $rs->dataareaid);
    
                    $result = array(
                        "purchaseorderid" => $rs->purchaseorderid,
                        "purchid" => $rs->purchid,
                        "purchorderdocnum" => $rs->purchorderdocnum,
                        "invoiceaccount" => $rs->invoiceaccount,
                        "dataareaid" => $rs->dataareaid,
                        "deliverydate" => $rs->deliverydate,
                        "bpc_documentdate" => $rs->bpc_documentdate,
                        "purchorderdate" => $rs->purchorderdate,
                        "bpc_purchasereqno" => $rs->bpc_purchasereqno,
                        "qty" => $rs->qty,
                        "salesorderbalance" => $rs->salesorderbalance,
                        "amount" => $rs->amount,
                        "items" => $rs->items,
                        "batchid" => $rs->batchid,
                        "itemnames" => $rs->itemnames,
                        "purchunit" => $rs->purchunit,
                        "purchstatus_text" => $rs->purchstatus_text,
                        "purchstatus" => $rs->purchstatus,
                        "currencycode" => $rs->currencycode,
                        "dimension" => $rs->dimension
                    );

                    // เพิ่มรายการลงใน array
                    $dataPo[] = $result;
            }

            $output = array(
                "msg" => "ดึงข้อมูล po main สำเร็จ",
                "status" => "Select Data Success",
                "result" => $dataPo
            );
            
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล po main ไม่สำเร็จ",
                "status" => "Select Data Not Success",
            );
        }

        echo json_encode($output);
    }
    private function queryPo($db , $accountnum , $dataareaid)
    {
        if(!empty($accountnum) && !empty($dataareaid)){
            $sql = "SELECT 
                    vendpurchorderjour.purchaseorderid,
                    vendpurchorderjour.purchid,
                    vendpurchorderjour.purchorderdocnum,
                    vendpurchorderjour.invoiceaccount,
                    vendpurchorderjour.dataareaid,
                    FORMAT(vendpurchorderjour.deliverydate, 'dd-MM-yyyy') AS deliverydate,
                    FORMAT(vendpurchorderjour.bpc_documentdate, 'dd-MM-yyyy') AS bpc_documentdate,
                    FORMAT(vendpurchorderjour.purchorderdate, 'dd-MM-yyyy') AS purchorderdate,
                    vendpurchorderjour.bpc_purchasereqno ,
                    vendpurchorderjour.qty,
                    vendpurchorderjour.salesorderbalance,
                    vendpurchorderjour.amount,
                    STRING_AGG(vendpurchordertrans.itemid, ', ') AS items,
                    STRING_AGG(vendpurchordertrans.name, ', ') AS itemnames,
                    STRING_AGG(inventdim.inventbatchid, ', ') AS batchid,
                    vendpurchordertrans.purchunit,
                    CASE
                        WHEN purchtable.purchstatus = 1 THEN 'Open order'
                        WHEN purchtable.purchstatus = 2 THEN 'Received'
                        WHEN purchtable.purchstatus = 3 THEN 'Invoiced'
                        WHEN purchtable.purchstatus = 4 THEN 'Canceled'
                        ELSE CAST(purchtable.purchstatus AS varchar)
                    END AS purchstatus_text,
                    purchtable.purchstatus,
                    purchtable.currencycode,
                    purchtable.dimension
                FROM 
                    vendpurchorderjour
                INNER JOIN (
                    -- Subquery เพื่อหา purchaseorderid ที่มากที่สุดสำหรับแต่ละ purchid
                    SELECT 
                        purchid,
                        MAX(purchaseorderid) AS max_purchaseorderid
                    FROM 
                        vendpurchorderjour
                    WHERE 
                        bpc_documentdate > '2024-01-01'
                        AND invoiceaccount = '$accountnum'
                        AND dataareaid = '$dataareaid'
                    GROUP BY 
                        purchid
                ) AS max_orders 
                    ON vendpurchorderjour.purchid = max_orders.purchid
                    AND vendpurchorderjour.purchaseorderid = max_orders.max_purchaseorderid
                INNER JOIN vendpurchordertrans
                    ON vendpurchorderjour.purchaseorderid = vendpurchordertrans.purchaseorderid
                    AND vendpurchorderjour.purchid = vendpurchordertrans.purchid
                    AND vendpurchorderjour.dataareaid = vendpurchordertrans.dataareaid
                INNER JOIN inventdim
                    ON vendpurchordertrans.inventdimid = inventdim.inventdimid
                    AND vendpurchordertrans.dataareaid = inventdim.dataareaid
                INNER JOIN purchtable
                    ON vendpurchorderjour.purchid = purchtable.purchid
                    AND vendpurchorderjour.invoiceaccount = purchtable.invoiceaccount
                    AND vendpurchorderjour.dataareaid = purchtable.dataareaid
                WHERE purchtable.purchstatus = 1
                GROUP BY 
                    vendpurchorderjour.purchaseorderid,
                    vendpurchorderjour.purchid,
                    vendpurchorderjour.purchorderdocnum,
                    vendpurchorderjour.invoiceaccount,
                    vendpurchorderjour.dataareaid,
                    vendpurchordertrans.purchunit,
                    vendpurchorderjour.deliverydate,
                    vendpurchorderjour.bpc_documentdate,
                    vendpurchorderjour.purchorderdate,
                    vendpurchorderjour.bpc_purchasereqno ,
                    vendpurchorderjour.qty,
                    vendpurchorderjour.salesorderbalance,
                    vendpurchorderjour.amount,
                    purchtable.purchstatus,
                    purchtable.currencycode,
                    purchtable.dimension
                ORDER BY 
                    vendpurchorderjour.purchaseorderid DESC
            ";

            return $db->query($sql);
        }
    }

    private function checkPoUpload($purchid , $dataareaid)
    {
        if(!empty($purchid) && !empty($dataareaid)){

            if($dataareaid == "sln"){
                $dataareaid = "sc";
            }else if($dataareaid == "poly"){
                $dataareaid = "pa";
            }else if($dataareaid == "ca"){
                $dataareaid = "ca";
            }else if($dataareaid == "st"){
                $dataareaid = "st";
            }else if($dataareaid == "tbb"){
                $dataareaid = "tb";
            }

            $sql = $this->db->query("SELECT
            wdf_ponumber FROM wdf_master
            WHERE wdf_ponumber = ? AND wdf_areaid = ? AND wdf_status NOT IN ('User cancel')
            " , array($purchid , $dataareaid));

            return $sql;
        }else{
            return false;
        }
    }


    public function getPoDetail()
    {
        if($this->input->post("dataareaid") != "" && $this->input->post("purchid") != "" && $this->input->post("purchaseorderid") != ""){
            $dataareaid = $this->input->post("dataareaid");
            $purchid = $this->input->post("purchid");
            $purchaseorderid = $this->input->post("purchaseorderid");

            $queryPoDetail = $this->queryDetail($this->db_mssqlSln , $dataareaid , $purchid , $purchaseorderid);

            //check duplicate data on accountpo_master
            foreach($queryPoDetail->result() as $rs){
                $accode = $rs->ledgeraccountid;
                $detailname = $rs->name;
                $userpost = getUser()->Fname.' '.getUser()->Lname;
                $deptcode = getUser()->DeptCode;

                $sqlAccodePo = $this->db->get_where('accode_master' , array('acmas_accode' => $accode));

                $this->db->where("detailwdf_accode" , $accode);
                $this->db->where("detailwdf_deptcode" , $deptcode);
                $this->db->where("detailwdf_name" , $detailname);
                $sqlAccodeDetail = $this->db->get("detail_wdf");

                if($sqlAccodePo->num_rows() == 0){
                    $arInsertData = array(
                        "acmas_accode" => $accode ,
                        "acmas_masname" => $rs->accountname,
                        "acmas_userpost" => $userpost,
                        "acmas_datetime" => date("Y-m-d H:i:s")
                    );
                    $this->db->insert('accode_master', $arInsertData);
                }

                if($sqlAccodeDetail->num_rows() == 0){
                    $arInsertDetailData = array(
                        "detailwdf_name" => $rs->name,
                        "detailwdf_accodename" => $rs->accountname,
                        "detailwdf_accode" => $accode ,
                        "detailwdf_deptcode" => getUser()->DeptCode
                    );
                    $this->db->insert('detail_wdf', $arInsertDetailData);
                }

            }

            $output = array(
                "msg" => "ดึงข้อมูลรายละเอียดของ Po สำเร็จ",
                "status" => "Select Data Success",
                "result" => $queryPoDetail->result()
                // "dataareaid" => $dataareaid , 
                // "purchid" => $purchid ,
                // "purchaseorderid" => $purchaseorderid
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Succes"
            );
        }
        echo json_encode($output);
    }
    private function queryDetail($db , $dataareaid , $purchid , $purchaseorderid)
    {
        if(!empty($db) && !empty($dataareaid) && !empty($purchid) && !empty($purchaseorderid)){
            $sql = "SELECT 
                a.origpurchid , 
                a.itemid , 
                a.qty , 
                a.purchunit ,
                a.purchprice , 
                -- a.lineamount ,
                FORMAT(a.lineamount, 'N2') AS lineamount,
                a.discamount ,
                a.lineamounttax , 
                a.name,
                a.dataareaid ,
                a.bpc_discount,
                a.purchaseorderid,
                b.inventbatchid,
                c.itemgroupid,
                d.ledgeraccountid,
                e.accountname,
                a.currencycode,
                a.dimension,
                CASE
                    WHEN f.purchstatus = 1 THEN 'Open order'
                    WHEN f.purchstatus = 2 THEN 'Received'
                    WHEN f.purchstatus = 3 THEN 'Invoiced'
                    WHEN f.purchstatus = 4 THEN 'Canceled'
                    ELSE CAST(f.purchstatus AS varchar)
                END AS purchstatus_text,
                f.purchstatus
            FROM VendPurchOrderTrans a
            LEFT JOIN inventdim b ON a.inventdimid = b.inventdimid AND a.dataareaid = b.dataareaid
            LEFT JOIN inventtable c ON a.itemid = c.itemid AND a.dataareaid = c.dataareaid
            INNER JOIN inventposting d ON c.itemgroupid = d.itemrelation AND d.dataareaid = a.dataareaid
            LEFT JOIN ledgertable e ON d.ledgeraccountid = e.accountnum AND e.dataareaid = a.dataareaid
            INNER JOIN purchtable f
                ON a.purchid = f.purchid
                AND a.dataareaid = f.dataareaid
            WHERE a.dataareaid = '$dataareaid' AND a.OrigPurchId = '$purchid' AND a.purchaseorderid = '$purchaseorderid' AND d.inventaccounttype = 3
            ORDER BY a.linenum ASC
            ";

            return $db->query($sql);
        }
    }


    
    

}/* End of file ModelName.php */


?>