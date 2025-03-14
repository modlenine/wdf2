<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
    }


    public function load_accode_list()
    {


        // DB table to use
        $table = 'list_accode_by_dept';

        // Table's primary key
        $primaryKey = 'detailwdf_id';

        $columns = array(
            array('db' => 'detailwdf_name', 'dt' => 0),
            array('db' => 'detailwdf_accodename', 'dt' => 1),
            array('db' => 'detailwdf_accode', 'dt' => 2),
            array('db' => 'detailwdf_deptcode', 'dt' => 3),
            array('db' => 'detailwdf_id', 'dt' => 4,
                'formatter' => function($data , $row){
                    $output = '
                    <i class="dw dw-trash1 delAccode"
                        data_accode_id="'.$data.'"
                    ></i>
                    <i class="dw dw-edit-file ml-2 editAccode"
                        data_accode_id="'.$data.'"
                    ></i>
                    ';
                    return $output;
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

        // if (getUser()->ecode == "M1848" || getUser()->ecode == "M0051" || getUser()->ecode == "M0112") {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else if (getUser()->posi > 75) {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else {
        //     echo json_encode(
        //         SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "m_owner = '$ecode' ")
        //     );
        // }

        if($deptcode == "1003" || $ecode == "M1809"){
            echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
            );
        }else{
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "detailwdf_deptcode = '$deptcode' ")
            );
        }
        
    }

    public function load_currency_list()
    {


        // DB table to use
        $table = 'wdf_currency';

        // Table's primary key
        $primaryKey = 'cu_autoid';

        $columns = array(
            array('db' => 'cu_name', 'dt' => 0),
            array('db' => 'cu_symbol', 'dt' => 1),
            array('db' => 'cu_user', 'dt' => 2),
            array('db' => 'cu_ecode', 'dt' => 3),
            array('db' => 'cu_datetime', 'dt' => 4 ,
                'formatter' => function($d , $row){
                    return conDateTimeFromDb($d);
                }
            ),
            array('db' => 'cu_autoid', 'dt' => 5,
                'formatter' => function($data , $row){
                    if($data != 1){
                        $output = '
                        <i class="dw dw-trash1 delCurrency"
                            data_currency_id="'.$data.'"
                        ></i>
                        <i class="dw dw-edit-file ml-2 editCurrency"
                            data_currency_id="'.$data.'"
                        ></i>
                        ';
                    }else{
                        $output = '';
                    }

                    return $output;
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

        // if($deptcode == "1003" || $ecode == "M1809"){
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // }else{
        //     echo json_encode(
        //         SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, null)
        //     );
        // }

        echo json_encode(
            SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
        
    }
    

    public function load_accode_master()
    {
       $received_data = json_decode(file_get_contents("php://input"));
       if($received_data->action == "load_accode_master"){

            $searchText = $received_data->accodesearch;
            $idArr = explode(" ", $searchText); 
            $context = " CONCAT(acmas_masname,' ', 
            acmas_accode) ";

            $condition = " $context LIKE '%" . implode("%' OR $context LIKE '%", $idArr) . "%' ";

            $sql = $this->db->query("SELECT  
            acmas_masname ,  
            acmas_accode
            FROM accode_master  
            WHERE $condition 
            ORDER BY acmas_autoid DESC");

            $output = array(
                "msg" => "ดึงข้อมูล AcCode สำเร็จ",
                "status" => "Select Data Success",
                "accodeData" => $sql->result()
            );

       }else{
            $output = array(
                "msg" => "ดึงข้อมูล AcCode ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "accodeData" => null
            );
       }
       echo json_encode($output);
    }

    public function saveAcCodeTb()
    {
        if($this->input->post("create_aclistname") != ""){
            // Check Name Duplicate
            $name = $this->input->post("create_aclistname");
            $accodeName = $this->input->post("setting_accodename");
            $accode = $this->input->post("setting_accode");
            $dept = getUser()->DeptCode;

            $resultCheck = $this->checkDuplicateAccode($name , $accodeName , $accode , $dept);
            if($resultCheck == "Found"){
                $output = array(
                    "msg" => "พบข้อมูลซ้ำในระบบ",
                    "status" => "Found Duplicate Data"
                );
            }else{
                $insertAccode = array(
                    "detailwdf_name" => $name,
                    "detailwdf_accodename" => $accodeName,
                    "detailwdf_accode" => $accode,
                    "detailwdf_deptcode" => $dept
                );
                $this->db->insert("detail_wdf" , $insertAccode);
                $output = array(
                    "msg" => "บันทึกข้อมูลสำเร็จ",
                    "status" => "Insert Data Success"
                );
            }
            echo json_encode($output);

        }
    }
    public function saveEditAcCodeToDb()
    {
        if($this->input->post("create_aclistname") != ""){
            // Check Name Duplicate
            $name = $this->input->post("create_aclistname");
            $accodeName = $this->input->post("setting_accodename");
            $accode = $this->input->post("setting_accode");
            $dept = getUser()->DeptCode;
            $accode_id = $this->input->post("accode_id");

            $resultCheck = $this->checkDuplicateAccode($name , $accodeName , $accode , $dept);
            if($resultCheck == "Found"){
                $output = array(
                    "msg" => "พบข้อมูลซ้ำในระบบหรือข้อมูลไม่มีการเปลี่ยนแปลง",
                    "status" => "Found Duplicate Data"
                );
            }else{
                $updateAccode = array(
                    "detailwdf_name" => $name,
                    "detailwdf_accodename" => $accodeName,
                    "detailwdf_accode" => $accode,
                    "detailwdf_deptcode" => $dept
                );
                $this->db->where("detailwdf_id" , $accode_id);
                $this->db->update("detail_wdf" , $updateAccode);
                $output = array(
                    "msg" => "อัพเดตข้อมูลสำเร็จ",
                    "status" => "Update Data Success"
                );
            }
            echo json_encode($output);

        }
    }
    private function checkDuplicateAccode($name , $accodeName , $accode , $dept)
    {
        $sql = $this->db->query("SELECT detailwdf_name , detailwdf_accodename , detailwdf_accode , detailwdf_deptcode FROM detail_wdf WHERE detailwdf_name = '$name' AND detailwdf_accodename = '$accodeName' AND detailwdf_accode = '$accode' AND detailwdf_deptcode = '$dept' ");

        if($sql->num_rows() != 0){
            return "Found";
        }else{
            return "Not Found";
        }
    }


    public function saveCurrencyTb()
    {
        if($this->input->post("cu_name") != ""){
            // Check Name Duplicate
            $cu_name = $this->input->post("cu_name");
            $cu_symbol = $this->input->post("cu_symbol");

            $resultCheck = $this->checkDuplicateCurrency($cu_name , $cu_symbol);

            if($resultCheck == "Found"){
                $output = array(
                    "msg" => "พบข้อมูลซ้ำในระบบ",
                    "status" => "Found Duplicate Data"
                );
            }else{
                $insertCurrency = array(
                    "cu_name" => $cu_name,
                    "cu_symbol" => $cu_symbol,
                    "cu_user" => getUser()->Fname." ".getUser()->Lname,
                    "cu_ecode" => getUser()->ecode,
                    "cu_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->insert("wdf_currency" , $insertCurrency);
                $output = array(
                    "msg" => "บันทึกข้อมูลสำเร็จ",
                    "status" => "Insert Data Success"
                );
            }
            echo json_encode($output);

        }
    }
    public function saveEditCurrencyToDb()
    {
        if($this->input->post("cu_name") != ""){
            // Check Name Duplicate
            $cu_name = $this->input->post("cu_name");
            $cu_symbol = $this->input->post("cu_symbol");
            $cu_autoid = $this->input->post("cu_autoid");

            $resultCheck = $this->checkDuplicateCurrency($cu_name , $cu_symbol);

            if($resultCheck == "Found"){
                $output = array(
                    "msg" => "พบข้อมูลซ้ำในระบบหรือข้อมูลไม่มีการเปลี่ยนแปลง",
                    "status" => "Found Duplicate Data"
                );
            }else{
                $updateCurrency = array(
                    "cu_name" => $cu_name,
                    "cu_symbol" => $cu_symbol,
                    "cu_user" => getUser()->Fname." ".getUser()->Lname,
                    "cu_ecode" => getUser()->ecode,
                    "cu_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->where("cu_autoid" , $cu_autoid);
                $this->db->update("wdf_currency" , $updateCurrency);
                $output = array(
                    "msg" => "อัพเดตข้อมูลสำเร็จ",
                    "status" => "Update Data Success"
                );
            }
            echo json_encode($output);

        }
    }
    private function checkDuplicateCurrency($cu_name , $cu_symbol)
    {
        $sql = $this->db->query("SELECT * FROM wdf_currency WHERE cu_name = '$cu_name' AND cu_symbol = '$cu_symbol' ");

        if($sql->num_rows() != 0){
            return "Found";
        }else{
            return "Not Found";
        }
    }


    public function delAccode()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "delAccode"){
            $accodeid = $received_data->accode_id;
            $this->db->where("detailwdf_id" , $accodeid);
            $this->db->delete("detail_wdf");

            $output = array(
                "msg" => "ลบข้อมูล Accode สำเร็จ",
                "status" => "Delete Data Success"
            );
        }else{
            $output = array(
                "msg" => "ลบข้อมูล Accode สำเร็จ",
                "status" => "Delete Data Not Success"
            );
        }
        echo json_encode($output);
    }

    public function delCurrency()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "delCurrency"){
            $cu_autoid = $received_data->data_currency_id;
            $this->db->where("cu_autoid" , $cu_autoid);
            $this->db->delete("wdf_currency");

            $output = array(
                "msg" => "ลบข้อมูล Currency สำเร็จ",
                "status" => "Delete Data Success"
            );
        }else{
            $output = array(
                "msg" => "ลบข้อมูล Currency สำเร็จ",
                "status" => "Delete Data Not Success"
            );
        }
        echo json_encode($output);
    }

    public function delAccodeM()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "delAccodeM"){
            $accodeid = $received_data->accode_id;
            $this->db->where("acmas_autoid" , $accodeid);
            $this->db->delete("accode_master");

            $output = array(
                "msg" => "ลบข้อมูล Accode สำเร็จ",
                "status" => "Delete Data Success"
            );
        }else{
            $output = array(
                "msg" => "ลบข้อมูล Accode สำเร็จ",
                "status" => "Delete Data Not Success"
            );
        }
        echo json_encode($output);
    }

    public function getaccodeFromDb()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getaccodeFromDb"){
            $accode_id = $received_data->accode_id;
            $sql = $this->db->query("SELECT detailwdf_name , detailwdf_accodename , detailwdf_accode , detailwdf_deptcode FROM detail_wdf WHERE detailwdf_id = '$accode_id' ");
            if($sql->num_rows() != 0){
                $output = array(
                    "msg" => "ดึงข้อมูล Accode เพื่อมาแก้ไขสำเร็จ",
                    "status" => "Select Data Success",
                    "get_accode" => $sql->row()
                );
            }else{
                $output = array(
                    "msg" => "ดึงข้อมูล Accode ไม่สำเร็จ",
                    "status" => "Select Data Not Success",
                    "get_accode" => null
                );
            }
            echo json_encode($output);
        }
    }


    public function getCurrencyFromDb()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getCurrencyFromDb"){
            $cu_autoid = $received_data->data_currency_id;
            $sql = $this->db->query("SELECT * FROM wdf_currency WHERE cu_autoid = '$cu_autoid' ");
            if($sql->num_rows() != 0){
                $output = array(
                    "msg" => "ดึงข้อมูล Currency เพื่อมาแก้ไขสำเร็จ",
                    "status" => "Select Data Success",
                    "get_currency" => $sql->row()
                );
            }else{
                $output = array(
                    "msg" => "ดึงข้อมูล Currency ไม่สำเร็จ",
                    "status" => "Select Data Not Success",
                    "get_accode" => null
                );
            }
            echo json_encode($output);
        }
    }


    public function getaccodeMFromDb()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getaccodeMFromDb"){
            $accode_id = $received_data->accode_id;
            $sql = $this->db->query("SELECT acmas_masname , acmas_accode FROM accode_master WHERE acmas_autoid = '$accode_id' ");
            if($sql->num_rows() != 0){
                $output = array(
                    "msg" => "ดึงข้อมูล Accode เพื่อมาแก้ไขสำเร็จ",
                    "status" => "Select Data Success",
                    "get_accode" => $sql->row()
                );
            }else{
                $output = array(
                    "msg" => "ดึงข้อมูล Accode ไม่สำเร็จ",
                    "status" => "Select Data Not Success",
                    "get_accode" => null
                );
            }
            echo json_encode($output);
        }
    }


    public function load_accodeM_list()
    {
        // DB table to use
        $table = 'list_accode_master';

        // Table's primary key
        $primaryKey = 'acmas_autoid';

        $columns = array(
            array('db' => 'acmas_masname', 'dt' => 0),
            array('db' => 'acmas_accode', 'dt' => 1),
            array('db' => 'acmas_userpost', 'dt' => 2),
            array('db' => 'acmas_datetime', 'dt' => 3,
                'formatter' => function($data , $row){
                    return conDateTimeFromDb($data);
                }
            ),
            array('db' => 'acmas_autoid', 'dt' => 4,
                'formatter' => function($data , $row){
                    $output = '
                    <i class="dw dw-trash1 delAccodeM"
                        data_acmas_autoid="'.$data.'"
                    ></i>
                    <i class="dw dw-edit-file ml-2 editAccodeM"
                        data_acmas_autoid="'.$data.'"
                    ></i>
                    ';
                    return $output;
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

        // if (getUser()->ecode == "M1848" || getUser()->ecode == "M0051" || getUser()->ecode == "M0112") {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else if (getUser()->posi > 75) {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else {
        //     echo json_encode(
        //         SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "m_owner = '$ecode' ")
        //     );
        // }

        echo json_encode(
            SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }

    public function saveAcCodeMasterToDb()
    {
        if($this->input->post("accountcodename") != "" && $this->input->post("accountcode")){
            $accodeMname = $this->input->post("accountcodename");
            $accodeMcode = $this->input->post("accountcode");

            // Check Duplicate Data
            $resultDuplicate = $this->checkDuplicateAccodeM($accodeMname , $accodeMcode);
            if($resultDuplicate == "Found"){
                $output = array(
                    "msg" => "พบข้อมูลซ้ำในระบบ",
                    "status" => "Found Duplicate Data"
                );
            }else if($resultDuplicate == "Not Found"){
                $arInsertData = array(
                    "acmas_masname" => $accodeMname,
                    "acmas_accode" => $accodeMcode,
                    "acmas_userpost" => getUser()->Fname." ".getUser()->Lname,
                    "acmas_ecodepost" => getUser()->ecode,
                    "acmas_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->insert("accode_master" , $arInsertData);
                $output = array(
                    "msg" => "บันทึกข้อมูลสำเร็จ",
                    "status" => "Insert Data Success"
                );
            }
            echo json_encode($output);
        }
    }
    public function saveEditAcCodeMToDb()
    {
        if($this->input->post("accountcodename") != "" && $this->input->post("accountcode") != ""){
            $accodeMname = $this->input->post("accountcodename");
            $accodeMcode = $this->input->post("accountcode");
            $accodeId = $this->input->post("acmas_autoid");

            // Check Duplicate Data
            $resultDuplicate = $this->checkDuplicateAccodeM($accodeMname , $accodeMcode);
            if($resultDuplicate == "Found"){
                $output = array(
                    "msg" => "พบข้อมูลซ้ำในระบบหรือไม่มีการเปลี่ยนแปลงของข้อมูล",
                    "status" => "Found Duplicate Data"
                );
            }else if($resultDuplicate == "Not Found"){
                $arUpdateData = array(
                    "acmas_masname" => $accodeMname,
                    "acmas_accode" => $accodeMcode,
                    "acmas_userpost" => getUser()->Fname." ".getUser()->Lname,
                    "acmas_ecodepost" => getUser()->ecode,
                    "acmas_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->where("acmas_autoid" , $accodeId);
                $this->db->update("accode_master" , $arUpdateData);
                $output = array(
                    "msg" => "บันทึกการแก้ไขข้อมูลสำเร็จ",
                    "status" => "Update Data Success"
                );
            }
            echo json_encode($output);

        }
    }
    private function checkDuplicateAccodeM($accodeMname , $accodeMcode)
    {
        if($accodeMname != "" && $accodeMcode != ""){
            $sql = $this->db->query("SELECT acmas_masname , acmas_accode FROM accode_master WHERE acmas_masname = '$accodeMname' AND acmas_accode = '$accodeMcode' ");
            if($sql->num_rows() != 0){
                return "Found";
            }else{
                return "Not Found";
            }
        }
    }


    public function getlist_userpermission()
    {
        

        // DB table to use
        $table = 'list_userpermission';

        // Table's primary key
        $primaryKey = 'u_autoid';

        $columns = array(
            array('db' => 'u_ecode', 'dt' => 0),
            array('db' => 'u_username', 'dt' => 1),
            array('db' => 'u_fullname', 'dt' => 2),
            array('db' => 'u_dept', 'dt' => 3),
            array('db' => 'u_datetime', 'dt' => 4,
                'formatter' => function($data , $row){
                    return conDateTimeFromDb($data);
                }
            ),
            array('db' => 'u_userstatus' , 'dt' => 5),
            array('db' => 'u_autoid' , 'dt' => 6 ,
            'formatter' => function($data , $row){
                $output = '
                <i class="dw dw-trash1 delUser"
                    data_autoid="'.$data.'"
                ></i>
                <i class="dw dw-edit-file ml-2 editUser"
                    data_autoid="'.$data.'"
                ></i>
                ';
                return $output;
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

        // if (getUser()->ecode == "M1848" || getUser()->ecode == "M0051" || getUser()->ecode == "M0112") {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else if (getUser()->posi > 75) {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else {
        //     echo json_encode(
        //         SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "m_owner = '$ecode' ")
        //     );
        // }

        if($deptcode == "1003" || $ecode == "M1809"){
            echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
            );
        }else{
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "u_deptcode = '$deptcode' ")
            );
        }
    }

    public function saveUserpermission()
    {
        if($this->input->post("ip-username-md") != ""){
            $arInsert = array(
                "u_username" => $this->input->post("ip-username-md"),
                "u_fullname" => $this->input->post("ip-fullname-md"),
                "u_ecode" => $this->input->post("ip-ecode-md"),
                "u_email" => $this->input->post("ip-email-md"),
                "u_dept" => $this->input->post("ip-dept-md"),
                "u_deptcode" => $this->input->post("ip-deptcode-md"),
                "u_datetime" => date("Y-m-d H:i:s"),
                "u_userstatus" => "active",
                "u_doctype_adv" => "yes",
                "u_doctype_wdf" => "yes",
                "u_doctype_sal" => "yes",
                "u_budget_section" => $this->input->post("ip-userper-budget"),
                "u_ap_section" => $this->input->post("ip-userper-ap"),
                "u_acc_section" => $this->input->post("ip-userper-ac"),
                "u_finance_section" => $this->input->post("ip-userper-fn"),
                "u_userreceive_section" => $this->input->post("ip-userper-ur"),
                "u_finance_clear_section" => $this->input->post("ip-userper-fnc"),
                "u_ap_clear_section" => $this->input->post("ip-userper-apc"),
                "u_acc_clear_section" => $this->input->post("ip-userper-acc"),
                "u_finance2_clear_section" => $this->input->post("ip-userper-fn2"),
                "u_userreceive_clear_section" => $this->input->post("ip-userper-urc")
            );
            $this->db->insert("user_permission" , $arInsert);
    
            $output = array(
                "msg" => "บันทึกข้อมูลสำเร็จ",
                "status" => "Insert Data Success"
            );
        }else{
            $output = array(
                "msg" => "บันทึกข้อมูลไม่สำเร็จ",
                "status" => "Insert Data Not Success"
            );
        }
        echo json_encode($output);

    }


    public function getDataUserPermission()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getDataUserPermission"){
            $u_autoid = $received_data->u_autoid;
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
            WHERE u_autoid = $u_autoid
            ");

            $output = array(
                "msg" => "ดึงข้อมูล User permission สำเร็จ",
                "status" => "Select Data Success",
                "userPermissionData" => $sql->row()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล User permission ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "userPermissionData" => null
            );
        }
        echo json_encode($output);
    }



    public function saveEditUserPermission()
    {
        if($this->input->post("ipe-autoid-check") != ""){
            $u_autoid = $this->input->post("ipe-autoid-check");
            $arUpdateUserPermission = array(
                "u_budget_section" => $this->input->post("ipe-userper-budget"),
                "u_ap_section" => $this->input->post("ipe-userper-ap"),
                "u_acc_section" => $this->input->post("ipe-userper-ac"),
                "u_finance_section" => $this->input->post("ipe-userper-fn"),
                "u_userreceive_section" => $this->input->post("ipe-userper-ur"),
                "u_finance_clear_section" => $this->input->post("ipe-userper-fnc"),
                "u_ap_clear_section" => $this->input->post("ipe-userper-apc"),
                "u_acc_clear_section" => $this->input->post("ipe-userper-acc"),
                "u_finance2_clear_section" => $this->input->post("ipe-userper-fn2"),
                "u_userreceive_clear_section" => $this->input->post("ipe-userper-urc")
            );

            $this->db->where("u_autoid" , $u_autoid);
            $this->db->update("user_permission" , $arUpdateUserPermission);

            $output = array(
                "msg" => "อัพเดตข้อมูล User Permission สำเร็จ",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "อัพเดตข้อมูล User Permission ไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }



    public function getDataWaitApprove()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getDataWaitApprove"){

            $resultData = [];
            $receiveData = "";
            $sqlgetDataMain = "";
            $deptcode = getUser()->DeptCode;
            $posi = getUser()->posi;

            $ecode = $received_data->ecode;
            $conditionDept = "";

            // check Account
            if($deptcode == 1003){
                $conditionDept = "wdf_deptcode LIKE '%%'";
            }else{
                if($posi > 75 || $ecode == "M0015" || $ecode == "M0025" || $ecode == "M1809"){
                    $conditionDept = "wdf_deptcode LIKE '%%'";
                }else if($ecode == "M2076" || $ecode == "M2077"){
                    $conditionDept = "wdf_areaid = 'tb'";
                }else if($ecode == "M0051"){
                    $conditionDept = "wdf_deptcode LIKE '%%'";
                }else if($ecode == "M0040"){
                    $conditionDept = "wdf_deptcode IN ('1010' , '1007') AND wdf_areaid IN ('sc' , 'ca' , 'pa')";
                }else{
                    $conditionDept = "wdf_deptcode = '$deptcode'";
                }
            }

            $sql = $this->db->query("SELECT
            approve_user.apv_autoid,
            approve_user.apv_group,
            approve_user.apv_type,
            approve_user.apv_ecode,
            approve_user.apv_formcode,
            approve_user.apv_areaid,
            approve_user.apv_email,
            approve_user.apv_datetime,
            approve_user.apv_approve,
            approve_user.apv_status
            FROM
            approve_user
            WHERE apv_ecode = '$ecode' AND apv_approve IS NULL ORDER BY apv_autoid DESC
            ");


            $sqlGetWaitApprove = $this->db->query("SELECT
            wdf_master.wdf_autoid,
            wdf_master.wdf_formno,
            wdf_master.wdf_formcode,
            wdf_master.wdf_areaid,
            wdf_master.wdf_doctype,
            wdf_master.wdf_deptcode,
            wdf_master.wdf_status,
            wdf_master.wdf_memo,
            wdf_master.wdf_userreceive,
            wdf_master.wdf_pricewithvat,
            wdf_master.wdf_user,
            wdf_master.wdf_ecode,
            wdf_master.wdf_appgroup,
            wdf_master.wdf_appgroup_clear,
            wdf_master.wdf_datetime
            FROM
            wdf_master
            WHERE $conditionDept AND 
            wdf_status IN ('Check budget already' , 
            'Executive Group 0 Approved' , 
            'Executive Group 1 Approved' , 
            'Executive Group 2 Approved' , 
            'Executive Group 3 Approved' , 
            'Executive Group 4 Approved' , 
            'Wait Executive Group 0 Approve' , 
            'Wait Executive Group 1 Approve' , 
            'Wait Executive Group 2 Approve' , 
            'Wait Executive Group 3 Approve' , 
            'Wait Executive Group 4 Approve' , 
            'AP passed inspection' , 
            'Account passed inspection' , 
            'Wait user receive money' , 
            'Complete & Wait User Clear Money' , 
            'User upload document already' , 
            'Wait user correct document (Clear Money)' , 
            'Finance passed inspection (Clear Money)' , 
            'Manager approved (Clear Money)' , 
            'Executive Group 0 Approved (Clear Money)' , 
            'Executive Group 1 Approved (Clear Money)' , 
            'Executive Group 2 Approved (Clear Money)' , 
            'Executive Group 3 Approved (Clear Money)' , 
            'Executive Group 4 Approved (Clear Money)' , 
            'AP passed inspection (Clear Money)' , 
            'Account passed inspection (Clear Money)' , 
            'Wait user receive money (Clear Money)',
            'Open',
            'Manager approved')
            ");


            foreach($sql->result() as $rs){
                // Get Data Main
                $sqlgetDataMain = $this->db->query("SELECT
                wdf_master.wdf_autoid,
                wdf_master.wdf_formno,
                wdf_master.wdf_formcode,
                wdf_master.wdf_areaid,
                wdf_master.wdf_doctype,
                wdf_master.wdf_status,
                wdf_master.wdf_memo,
                wdf_master.wdf_userreceive,
                wdf_master.wdf_pricewithvat,
                wdf_master.wdf_user,
                wdf_master.wdf_appgroup,
                wdf_master.wdf_appgroup_clear,
                wdf_master.wdf_datetime
                FROM
                wdf_master
                WHERE wdf_formcode = '$rs->apv_formcode'
                ");

                $resultData[] = $sqlgetDataMain->row();
            }



            $output = array(
                "msg" => "ดึงข้อมูลการอนุมัติสำเร็จ",
                "status" => "Select Data Success",
                "resultCount" => $sql->num_rows(),
                "resultData" => $resultData,
                "resultData_user" => $sqlGetWaitApprove->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลการอนุมัติไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "resultCount" => null
            );
        }
        echo json_encode($output);
    }


    public function getUserApp()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getUserApp"){
            $ecode = $received_data->ecode;

            $sql = $this->db->query("SELECT
            approve_user.apv_group,
            approve_user.apv_type,
            approve_user.apv_user,
            approve_user.apv_ecode,
            approve_user.apv_posiname,
            approve_user.apv_formcode,
            approve_user.apv_areaid,
            approve_user.apv_email,
            approve_user.apv_datetime,
            approve_user.apv_approve,
            approve_user.apv_approve_memo,
            approve_user.apv_approve_user,
            approve_user.apv_approve_datetime,
            approve_user.apv_status
            FROM
            approve_user
            WHERE apv_ecode = '$ecode' AND apv_approve IS NULL
            ");

            $output = array(
                "msg" => "ดึงข้อมูล User Approve สำเร็จ",
                "status" => "Select Data Success",
                "userApproveResult" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล User Approve ไม่สำเร็จ",
                "status" => "Select Data Not Success",
            );
        }
        echo json_encode($output);
    }




    

}/* End of file ModelName.php */



?> 