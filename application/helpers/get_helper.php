<?php
class getfn
{
    private $ci;
    function __construct()
    {
        $this->ci = &get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }

    function gci()
    {
        return $this->ci;
    }
}



function gfn()
{
    $obj = new getfn();
    return $obj->gci();
}



function getDb()
{
    if($_SERVER['HTTP_HOST'] == "localhost"){
        $sql = gfn()->db->query("SELECT * FROM db WHERE db_active = 'active' AND db_autoid = '2' ");
    }else{
        $sql = gfn()->db->query("SELECT * FROM db WHERE db_active = 'active' AND db_autoid = '1' ");
    }
    return $sql->row();
}



function getRuningCode($groupcode)
{
    //100 = wdf , 200 = adv , 300 = sal , 400 = po
    //stepcode fnc = 719 , apc = 729 , accc = 739 , mgrc = 749 , fnc2 = 759 , urc2 = 769 
    $date = date_create();
    $dateTimeStamp = date_timestamp_get($date);
    return $groupcode.$dateTimeStamp;
}

function check_getRuningCode($formcode , $areaid , $doctype , $stepname)
{
    $sql = gfn()->db->query("SELECT $stepname FROM wdf_master WHERE wdf_formcode = '$formcode' AND wdf_areaid = '$areaid' AND wdf_doctype = '$doctype' AND $stepname != '' ");
    return $sql;
}



function valueFormat($inputNumber)
{
    $conToDecimal = floatval($inputNumber);
    $stringafterDot = strstr($conToDecimal, ".");
    $decimalNumber = strlen($stringafterDot);

    if($decimalNumber == 0){
        $conNumber = number_format($inputNumber , 0);
    }else{
        $conNumber = number_format($inputNumber , 4);
    }

    if($conNumber == 0){
        return null;
    }else{
        return $conNumber;
    }
    
}


function valueFormat2($inputNumber)
{
    if(substr($inputNumber , -2 , 1) != 0){
        $rsCheckBumber = number_format($inputNumber,4,'.','');
    }else if(substr($inputNumber , -3 , 1) != 0){
        $rsCheckBumber = number_format($inputNumber,2,'.','');
    }else if(substr($inputNumber , -4 , 1) != 0){
        $rsCheckBumber = number_format($inputNumber,1,'.','');
    }else{
        $rsCheckBumber = number_format($inputNumber,0,'.','');
    }


    return $rsCheckBumber;
}


function getEmailByEcode($ecode)
{
    gfn()->db2 = gfn()->load->database('saleecolour', TRUE);
    if($ecode != ""){
       $sql = gfn()->db2->query("SELECT memberemail FROM member WHERE ecode = '$ecode' ");
        return $sql;
    }
}

function getuserDataByEcode($ecode , $areaidGroup , $group)
{
    if($ecode != "" && $areaidGroup != "" && $group != ""){
        $sql = gfn()->db->query("SELECT app_user , app_posiname FROM approve_group WHERE app_ecode = '$ecode' AND app_areaid = '$areaidGroup' AND app_group = '$group' ");
        if($sql->num_rows() == 0){
            return null;
        }else{
            return $sql->row();
        }
    }
}

function countApprove($formcode , $areaid)
{
    if($formcode != "" && $areaid != ""){
        $sql = gfn()->db->query("SELECT apv_approve FROM approve_user WHERE apv_formcode = '$formcode' AND apv_areaid = '$areaid' AND apv_approve != '' ");
        return $sql;
    }
}




////////////////////////////////////////////
/////////// Print PDF Zone
function getMaindataForPrintForm($formcode , $formno , $doctype)
{
    if($formcode != "" && $formno != ""){
        $sql = gfn()->db->query("SELECT
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
        wdf_master.wdf_vat1_clear,
        wdf_master.wdf_vat2_clear,
        wdf_master.wdf_pricenonevat_clear,
        wdf_master.wdf_pricevat1_clear,
        wdf_master.wdf_pricevat2_clear,
        wdf_master.wdf_pricewithvat_clear,
        wdf_master.wdf_user,
        wdf_master.wdf_ecode,
        wdf_master.wdf_deptcode,
        wdf_master.wdf_dept,
        wdf_master.wdf_datetime,
        wdf_master.wdf_mgr_user,
        wdf_master.wdf_mgr_datetime,
        wdf_master.wdf_paygroup,
        wdf_master.wdf_appgroup,
        wdf_master.wdf_areaidgroup,
        wdf_master.wdf_fnc_method,
        wdf_master.wdf_fnc_money,
        wdf_master.wdf_acc_user,
        wdf_master.wdf_acc_datetime,
        wdf_master.wdf_acc_dept,
        wdf_master.wdf_appgroup_clear,
        wdf_master.wdf_ap_moneymethod,
        wdf_master.wdf_ap_memo
        FROM
        wdf_master
        WHERE wdf_formcode = '$formcode' AND wdf_formno = '$formno' AND wdf_doctype = '$doctype'
        ");

        if($sql->num_rows() != 0){
            return $sql->row();
        }
    }
}


function getTransdataForPrintForm($formcode , $doctype , $type)
{
    if($formcode != "" && $doctype != ""){

        $condition = "";
        if($type == "clear"){
            $condition = "AND tr_mas_type = 'clear' ";
        }else{
            $condition = "AND tr_mas_type IS NULL ";
        }

        $sql = gfn()->db->query("SELECT
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
        WHERE tr_mas_formcode = '$formcode' AND tr_mas_doctype = '$doctype' $condition ORDER BY tr_autoid ASC
        ");

        if($sql->num_rows() != 0){
            return $sql->result();
        }
    }
}




////////////////////////////////////////////
/////////// Dashboard Zone

function getMaindataForDashBoard($doctype)
{
    if($doctype != ""){
        $sql = gfn()->db->query("SELECT
        wdf_master.wdf_autoid,
        wdf_master.wdf_formno,
        wdf_master.wdf_formcode,
        wdf_master.wdf_areaid,
        wdf_master.wdf_doctype,
        wdf_master.wdf_status
        FROM
        wdf_master
        WHERE wdf_doctype = '$doctype'
        ");

        if($sql->num_rows() != 0){
            return $sql;
        }else{
            return false;
        }
    }
}



function getMaindataForDashBoardGroupByDept($doctype)
{
    if($doctype != ""){
        $sql = gfn()->db->query("SELECT
        wdf_master.wdf_autoid,
        wdf_master.wdf_formno,
        wdf_master.wdf_formcode,
        wdf_master.wdf_areaid,
        wdf_master.wdf_doctype,
        wdf_master.wdf_status,
        wdf_master.wdf_dept,
        wdf_master.wdf_deptcode
        FROM
        wdf_master
        WHERE wdf_doctype = '$doctype' GROUP BY wdf_deptcode ORDER BY wdf_deptcode ASC
        ");

        if($sql->num_rows() != 0){
            return $sql;
        }else{
            return false;
        }
    }
}


function getMaindataForDashBoardWithDept($doctype , $deptcode)
{
    if($doctype != "" && $deptcode != ""){
        $sql = gfn()->db->query("SELECT
        wdf_master.wdf_autoid,
        wdf_master.wdf_formno,
        wdf_master.wdf_formcode,
        wdf_master.wdf_areaid,
        wdf_master.wdf_doctype,
        wdf_master.wdf_status
        FROM
        wdf_master
        WHERE wdf_doctype = '$doctype' AND wdf_deptcode = '$deptcode'
        ");

        if($sql->num_rows() != 0){
            return $sql;
        }else{
            return false;
        }
    }
}


function getDataForDashBoardBydeptByStatus($doctype , $deptcode)
{
    if($deptcode != ""){
        $condition = "";
        if(getUser()->posi > 75 || getUser()->ecode == "M1809" || getUser()->DeptCode == 1003 || getUser()->ecode == "M0025" || getUser()->ecode == "M0015"){
            $condition = "wdf_deptcode LIKE '%%' ";
        }else if(getUser()->ecode == "M2076" || getUser()->ecode == "M2077"){
            $condition = "wdf_areaid = 'tb' ";
        }else{
            $condition = "wdf_deptcode = '$deptcode' ";
        }

        $sql = gfn()->db->query("SELECT
        wdf_master.wdf_autoid,
        wdf_master.wdf_formno,
        wdf_master.wdf_formcode,
        wdf_master.wdf_areaid,
        wdf_master.wdf_doctype,
        wdf_master.wdf_status
        FROM
        wdf_master
        WHERE wdf_doctype = '$doctype' AND $condition GROUP BY wdf_status
        ");

        if($sql->num_rows() != 0){
            return $sql;
        }else{
            return false;
        }
    }
}


function getDataForDashBoardBydeptWithStatus($doctype , $deptcode , $status)
{
    if($doctype != "" && $deptcode != "" && $status != ""){

        $condition = "";
        if(getUser()->posi > 75 || getUser()->ecode == "M1809" || getUser()->DeptCode == 1003 || getUser()->ecode == "M0025" || getUser()->ecode == "M0015"){
            $condition = "wdf_deptcode LIKE '%%' ";
        }else if(getUser()->ecode == "M2076" || getUser()->ecode == "M2077"){
            $condition = "wdf_areaid = 'tb' ";
        }else{
            $condition = "wdf_deptcode = '$deptcode' ";
        }

        $sql = gfn()->db->query("SELECT
        wdf_master.wdf_autoid,
        wdf_master.wdf_formno,
        wdf_master.wdf_formcode,
        wdf_master.wdf_areaid,
        wdf_master.wdf_doctype,
        wdf_master.wdf_status
        FROM
        wdf_master
        WHERE wdf_doctype = '$doctype' AND $condition AND wdf_status = '$status'
        ");

        if($sql->num_rows() != 0){
            return $sql;
        }else{
            return false;
        }
    }
}

//check approve user 2505-01-28
function checkapproveUser($ecode , $doctype)
{
    if(!empty($ecode) && !empty($doctype)){
        $sql = gfn()->db->query("SELECT
            approve_user.apv_autoid,
            approve_user.apv_paygroupid,
            approve_user.apv_group,
            approve_user.apv_type,
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
            approve_user.apv_approve_datetime,
            approve_user.apv_status,
            wdf_master.wdf_doctype
            FROM
            approve_user
            INNER JOIN wdf_master ON wdf_master.wdf_formcode = approve_user.apv_formcode
            WHERE apv_ecode = ? AND wdf_doctype = ?
        " , array($ecode , $doctype));

        if($sql->num_rows() > 0){
            $result_array = array_column($sql->result_array() , 'apv_formcode');

            $inclause = implode("','" , $result_array);

            return "('".$inclause."')";
        }
    }
    return null;
}










?>