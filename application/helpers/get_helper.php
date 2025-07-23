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

function get_wdfdatalist($doctype, $ecode)
{
    $request = $_POST;
    $deptcode = getUser()->DeptCode;

    // ดึงพารามิเตอร์จาก DataTables
    $search = $request['search']['value'];
    $orderColumn = $request['order'][0]['column'];
    $orderDir = $request['order'][0]['dir'];
    $start = $request['start'];
    $length = $request['length'];
    $draw = $request['draw'];

    // รายชื่อคอลัมน์สำหรับเรียง
    $columns = [
        'wdf_formno',
        'wdf_areaid',
        'wdf_user',
        'wdf_ecode',
        'wdf_dept',
        'wdf_datetime',
        'wdf_pricewithvat',
        'wdf_currency',
        'wdf_ap_memo',
        'wdf_status',
    ];
    $orderBy = $columns[$orderColumn];

    // ตรวจสอบสิทธิ์ approve
    $sqlcheckApproveUser = gfn()->db->query("SELECT 
    approve_user.apv_formcode 
    FROM approve_user
    WHERE approve_user.apv_ecode = ? AND EXISTS (
      SELECT 1 FROM wdf_master 
      WHERE wdf_master.wdf_formcode = approve_user.apv_formcode 
        AND wdf_master.wdf_doctype = ?
    )", array($ecode , $doctype));
    $formcodeArray = array_column($sqlcheckApproveUser->result_array(), 'apv_formcode');
    $useWhereIn = count($formcodeArray) > 0;

    // สร้างเงื่อนไขพื้นฐาน
    $sql = "FROM wdf_master WHERE wdf_doctype = ?";
    $params = [$doctype];

    // ถ้ามีสิทธิ์ดูเพิ่มเติม
    if ($useWhereIn) {
        $condition = "";
        //M0282 = พี่ป้อน  , M2066 = พี่ภิ , M0140 = พี่โบ้ , M1344 = พี่แอร์
        if(in_array($ecode, ["M0282", "M2066", "M0140", "M1344"])){
            $condition = " AND wdf_deptcode = '$deptcode'";
        }else if(in_array($ecode, ["M2076", "M2077", "M0051"])){
        //M2076 = ฐปนีย์ TB , M2077 = ธนวีร์ TB , M0051 = นิพนธ์ TB
            $condition = " AND wdf_areaid = 'TB'";
        }else if($ecode == "M0963"){
        //M0963 = พี่ภพ ได้สิทธิ์ดูรายการของ TheBubbles ทุกรายการ
            $condition = "AND (wdf_areaid IN ('tb') OR wdf_deptcode = '$deptcode')";
        }else{
            $condition = "";
        }

        $formcodeArray = array_unique($formcodeArray);
        $placeholders = implode(',', array_fill(0, count($formcodeArray), '?'));
        $sql = "FROM wdf_master WHERE (wdf_doctype = ? $condition OR wdf_formcode IN ($placeholders))";
        $params = array_merge($params, $formcodeArray);

    }else{
        if($deptcode != "1003" && $ecode != "M1809"){
            if($ecode == "M0963"){
                //M0963 = พี่ภพ ได้สิทธิ์ดูรายการของ TheBubbles ทุกรายการ
                $sql .= " AND (wdf_areaid IN ('tb') OR wdf_deptcode = ?)";
                $params[] = $deptcode;
            }else{
                $sql .= " AND wdf_deptcode = ?";
                $params[] = $deptcode;
            }
        }
    }


        //Filter zone
        $startDate_filter = $request['startDate_filter'];
        $endDate_filter = $request['endDate_filter'];
        $company_filter = $request['company_filter'];
        $user_filter = $request['user_filter'];
        $dept_filter = $request['dept_filter'];
        $status_filter = $request['status_filter'];
    
    
        // วันที่
        if ($startDate_filter != "0" && $endDate_filter != "0") {
            $sql .= " AND wdf_datetime BETWEEN ? AND ?";
            $params[] = "$startDate_filter 00:00:01";
            $params[] = "$endDate_filter 23:59:59";
        } elseif ($startDate_filter != "0") {
            $sql .= " AND wdf_datetime BETWEEN ? AND ?";
            $params[] = "$startDate_filter 00:00:01";
            $params[] = "$startDate_filter 23:59:59";
        } elseif ($endDate_filter != "0") {
            $sql .= " AND wdf_datetime BETWEEN ? AND ?";
            $params[] = "$endDate_filter 00:00:01";
            $params[] = "$endDate_filter 23:59:59";
        }
    
        // บริษัท
        if ($company_filter != "0") {
            $sql .= " AND wdf_areaid = ?";
            $params[] = $company_filter;
        }
    
        // ผู้ใช้
        if ($user_filter != "0") {
            $sql .= " AND wdf_user LIKE ?";
            $params[] = "%$user_filter%";
        }
    
        // แผนก
        if ($dept_filter != "0") {
            $sql .= " AND wdf_deptcode = ?";
            $params[] = $dept_filter;
        }
    
        // สถานะ
        if ($status_filter != "0") {
            $con_status = conStatusNumToText($status_filter, $doctype);
            $sql .= " AND wdf_status = ?";
            $params[] = $con_status;
        }
        //Filter zone

    // เงื่อนไขค้นหา
    // if (!empty($search)) {
    //     $sql .= " AND (
    //         wdf_formno LIKE ? OR
    //         wdf_user LIKE ? OR
    //         wdf_status LIKE ?
    //     )";
    //     $params = array_merge($params, array_fill(0, 3, "%$search%"));
    // }

    // 🔽 เพิ่มตรงนี้!
    foreach ($request['columns'] as $index => $column) {
        $colName = $columns[$index]; // ใช้ index mapping จาก DataTables
        $searchValue = $column['search']['value'];

        if (!empty($searchValue)) {
            $sql .= " AND $colName LIKE ?";
            $params[] = "%$searchValue%";
        }
    }


    // หาจำนวนรวมก่อนแบ่งหน้า
    $totalQuery = gfn()->db->query("SELECT COUNT(*) AS cnt $sql", $params);
    $recordsTotal = $totalQuery->row()->cnt;

    // เพิ่มการเรียง + แบ่งหน้า
    $sql .= " ORDER BY $orderBy $orderDir LIMIT ?, ?";
    $params[] = (int)$start;
    $params[] = (int)$length;

    $dataQuery = gfn()->db->query("SELECT wdf_formno,
        wdf_formcode,
        wdf_areaid,
        wdf_doctype,
        wdf_status,
        wdf_user,
        wdf_ecode,
        wdf_deptcode,
        wdf_dept,
        DATE_FORMAT(wdf_datetime , '%d/%m/%Y %H:%i:%s') AS wdf_datetime,
        FORMAT(wdf_pricewithvat , 2) AS wdf_pricewithvat,
        wdf_ap_memo,
        wdf_currency $sql", $params);

        $data = [];

        $companyMap = [
            "sc" => "Salee Colour",
            "pa" => "Poly Meritasia",
            "ca" => "Composite Asia",
            "st" => "Subterra",
            "tb" => "The bubbles"
        ];

        foreach ($dataQuery->result() as $row) {
            $companyName = isset($companyMap[$row->wdf_areaid]) ? $companyMap[$row->wdf_areaid] : "Unknown";
            // เพิ่มลง array สำหรับ json
            $data[] = [
                "wdf_formno" => $row->wdf_formno,
                "wdf_formcode" => $row->wdf_formcode,
                "wdf_areaid" => $companyName, // ใช้ชื่อบริษัทที่แปลงแล้ว
                "wdf_doctype" => $row->wdf_doctype,
                "wdf_status" => $row->wdf_status,
                "wdf_user" => $row->wdf_user,
                "wdf_ecode" => $row->wdf_ecode,
                "wdf_deptcode" => $row->wdf_deptcode,
                "wdf_dept" => $row->wdf_dept,
                "wdf_datetime" => $row->wdf_datetime,
                "wdf_pricewithvat" => $row->wdf_pricewithvat,
                "wdf_ap_memo" => $row->wdf_ap_memo,
                "wdf_currency" => $row->wdf_currency
            ];
        }

    // ส่ง JSON กลับ
    header('Content-Type: application/json');
    echo json_encode([
        'draw' => intval($draw),
        'recordsTotal' => $recordsTotal,
        'recordsFiltered' => $recordsTotal,
        'data' => $data
    ]);
}


function get_wdfdatalist_report($doctype, $ecode)
{
    $request = $_POST;
    $deptcode = getUser()->DeptCode;

    // ตรวจสอบสิทธิ์ approve
    $sqlcheckApproveUser = gfn()->db->query("SELECT 
        approve_user.apv_formcode 
        FROM approve_user
        WHERE approve_user.apv_ecode = ? AND EXISTS (
            SELECT 1 FROM wdf_master 
            WHERE wdf_master.wdf_formcode = approve_user.apv_formcode 
            AND wdf_master.wdf_doctype = ?
        )", array($ecode , $doctype));

    $formcodeArray = array_column($sqlcheckApproveUser->result_array(), 'apv_formcode');
    $useWhereIn = count($formcodeArray) > 0;

    // สร้างเงื่อนไขพื้นฐาน
    $sql = "FROM wdf_master WHERE wdf_doctype = ?";
    $params = [$doctype];

    // ถ้ามีสิทธิ์ดูเพิ่มเติม
    if ($useWhereIn) {
        $condition = "";
        if(in_array($ecode, ["M0282", "M2066", "M0140", "M1344"])){
            $condition = " AND wdf_deptcode = '$deptcode'";
        } else if(in_array($ecode, ["M2076", "M2077", "M0051"])){
            $condition = " AND wdf_areaid = 'TB'";
        } else if($ecode == "M0963"){
            $condition = "AND (wdf_areaid IN ('tb') OR wdf_deptcode = '$deptcode')";
        }

        $formcodeArray = array_unique($formcodeArray);
        $placeholders = implode(',', array_fill(0, count($formcodeArray), '?'));
        $sql = "FROM wdf_master WHERE (wdf_doctype = ? $condition OR wdf_formcode IN ($placeholders))";
        $params = array_merge($params, $formcodeArray);

    } else {
        if($deptcode != "1003"){
            if($ecode == "M0963"){
                $sql .= " AND (wdf_areaid IN ('tb') OR wdf_deptcode = ?)";
                $params[] = $deptcode;
            } else {
                $sql .= " AND wdf_deptcode = ?";
                $params[] = $deptcode;
            }
        }
    }

    // Filter zone
    $startDate_filter = $request['startDate_filter'];
    $endDate_filter = $request['endDate_filter'];
    $company_filter = $request['company_filter'];
    $user_filter = $request['user_filter'];
    $dept_filter = $request['dept_filter'];
    $status_filter = $request['status_filter'];

    if ($startDate_filter != "0" && $endDate_filter != "0") {
        $sql .= " AND wdf_datetime BETWEEN ? AND ?";
        $params[] = "$startDate_filter 00:00:01";
        $params[] = "$endDate_filter 23:59:59";
    } elseif ($startDate_filter != "0") {
        $sql .= " AND wdf_datetime BETWEEN ? AND ?";
        $params[] = "$startDate_filter 00:00:01";
        $params[] = "$startDate_filter 23:59:59";
    } elseif ($endDate_filter != "0") {
        $sql .= " AND wdf_datetime BETWEEN ? AND ?";
        $params[] = "$endDate_filter 00:00:01";
        $params[] = "$endDate_filter 23:59:59";
    }

    if ($company_filter != "0") {
        $sql .= " AND wdf_areaid = ?";
        $params[] = $company_filter;
    }

    if ($user_filter != "0") {
        $sql .= " AND wdf_user LIKE ?";
        $params[] = "%$user_filter%";
    }

    if ($dept_filter != "0") {
        $sql .= " AND wdf_deptcode = ?";
        $params[] = $dept_filter;
    }

    if ($status_filter != "0") {
        $con_status = conStatusNumToText($status_filter, $doctype);
        $sql .= " AND wdf_status = ?";
        $params[] = $con_status;
    }

    // ดึงข้อมูลทั้งหมดแบบ client-side
    $dataQuery = gfn()->db->query("SELECT wdf_formno,
        wdf_formcode,
        wdf_areaid,
        wdf_doctype,
        wdf_status,
        wdf_user,
        wdf_ecode,
        wdf_deptcode,
        wdf_dept,
        DATE_FORMAT(wdf_datetime , '%d/%m/%Y %H:%i:%s') AS wdf_datetime,
        FORMAT(wdf_pricewithvat , 2) AS wdf_pricewithvat,
        wdf_ap_memo,
        wdf_currency $sql", $params);

    $data = [];

    $companyMap = [
        "sc" => "Salee Colour",
        "pa" => "Poly Meritasia",
        "ca" => "Composite Asia",
        "st" => "Subterra",
        "tb" => "The bubbles"
    ];

    foreach ($dataQuery->result() as $row) {
        $companyName = isset($companyMap[$row->wdf_areaid]) ? $companyMap[$row->wdf_areaid] : "Unknown";
        $data[] = [
            "wdf_formno" => $row->wdf_formno,
            "wdf_formcode" => $row->wdf_formcode,
            "wdf_areaid" => $companyName,
            "wdf_doctype" => $row->wdf_doctype,
            "wdf_status" => $row->wdf_status,
            "wdf_user" => $row->wdf_user,
            "wdf_ecode" => $row->wdf_ecode,
            "wdf_deptcode" => $row->wdf_deptcode,
            "wdf_dept" => $row->wdf_dept,
            "wdf_datetime" => $row->wdf_datetime,
            "wdf_pricewithvat" => $row->wdf_pricewithvat,
            "wdf_ap_memo" => $row->wdf_ap_memo,
            "wdf_currency" => $row->wdf_currency
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($data);
}


function query_wdfApproveUser($placeholders , $doctype , $formcodeArray)
{
    $sql = gfn()->db->query("SELECT
        wdf_formno,
        wdf_formcode,
        wdf_areaid,
        wdf_doctype,
        wdf_status,
        wdf_user,
        wdf_ecode,
        wdf_deptcode,
        wdf_dept,
        wdf_datetime,
        wdf_pricewithvat,
        wdf_ap_memo,
        wdf_currency
    FROM wdf_master
    WHERE wdf_doctype = ?
    AND wdf_formcode IN ($placeholders)
    ", array_merge(array($doctype), $formcodeArray));

    return $sql;
}

function query_wdfNormalUser($doctype)
{
    $sql = gfn()->db->query("SELECT
    wdf_formno,
    wdf_formcode,
    wdf_areaid,
    wdf_doctype,
    wdf_status,
    wdf_user,
    wdf_ecode,
    wdf_deptcode,
    wdf_dept,
    wdf_datetime,
    wdf_pricewithvat,
    wdf_ap_memo,
    wdf_currency
    FROM wdf_master
    WHERE wdf_doctype = ?
    " , array($doctype));
    return $sql;
}










?>