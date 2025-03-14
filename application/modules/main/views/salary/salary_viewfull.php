<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแสดงข้อมูลฉบับเต็ม ใบขอเบิกจ่ายเงินเดือน</title>


</head>
<body>
    <div class="main-container">
        <div class="pd-ltr-20">

            <div id="btnControlBar_sal" class="card-box pd-20 height-100-p mb-30" style="display:none;">
                <button type="button" id="btn-editsalary" name="btn-editsalary" class="btn btn-warning"><i class="dw dw-edit-file mr-2"></i>แก้ไข</button>
                <button type="button" id="btn-cancelsalary" name="btn-cancelsalary" class="btn btn-danger"><i class="dw dw-file-21 mr-2"></i>ยกเลิกเอกสาร</button>
            </div>

            <div class="card-box pd-20 height-100-p mb-30">

                <div id="exportform-section-sal" class="mb-2" style="display:none;">
                    <a href="<?=base_url('main/salary/salary_printform/').$formcode."/".$formno?>" target="_blank"><button type="button" id="printForm-sal" name="printForm-sal" class="btn btn-secondary">ปริ้นฟอร์ม</button></a>
                </div>

                <div class="row align-items-center">
					<div class="col-md-12 text-center">
						<h4>ใบขอเบิกจ่ายเงินเดือน ( Salary )</h4>
                        <h6 class="mt-2">เอกสารเลขที่ <span id="showFormno_sal"></span></h6>
                        <h6 class="mt-2">สถานะ <span id="showFormStatus_sal"></span></h6>
					</div>
				</div>
				<hr class="salHr">

                <div id="process_step_section_sal">
                    <?=$this->load->view("salary/salary_process_step")?>
                </div>

                <hr class="salHr">

                <div class="card-box pd-20 height-100-p mb-30">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>บริษัท</b></label>
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-sal-areaid-sc" name="ipv-sal-areaid" value="sc" class="custom-control-input"> 
                                        <label for="ipv-sal-areaid-sc" class="custom-control-label">Salee Colour Public Company Limited.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-sal-areaid-pa" name="ipv-sal-areaid" value="pa" class="custom-control-input"> 
                                        <label for="ipv-sal-areaid-pa" class="custom-control-label">Poly Meritasia Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-sal-areaid-ca" name="ipv-sal-areaid" value="ca" class="custom-control-input"> 
                                        <label for="ipv-sal-areaid-ca"class="custom-control-label">Composite Asia Co.,Ltd.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-sal-areaid-st" name="ipv-sal-areaid" value="st" class="custom-control-input"> <label for="ipv-sal-areaid-st" class="custom-control-label">Subterra Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-sal-areaid-tb" name="ipv-sal-areaid" value="tb" class="custom-control-input"> 
                                        <label for="ipv-sal-areaid-tb"class="custom-control-label">The bubbles Co.,Ltd.</label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>หมายเหตุ</b></label>
                            <input type="text" name="ipv-sal-memo" id="ipv-sal-memo" class="form-control" readonly>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for=""><b>ชื่อผู้ร้องขอ</b></label>
                            <input type="text" name="ipv-sal-username" id="ipv-sal-username" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>รหัสพนักงาน</b></label>
                            <input type="text" name="ipv-sal-ecode" id="ipv-sal-ecode" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>แผนก</b></label>
                            <input type="text" name="ipv-sal-dept" id="ipv-sal-dept" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>วันที่ออกเอกสาร</b></label>
                            <input type="text" name="ipv-sal-date" id="ipv-sal-date" class="form-control" readonly>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for=""><b>ชื่อผู้รับเงิน</b></label>
                            <input type="text" name="ipv-sal-userreceive" id="ipv-sal-userreceive" class="form-control" readonly>
                        </div>
                        <div class="col-md-8">
                            <label for=""><b>รายละเอียดผู้รับเงิน</b></label>
                            <input type="text" name="ipv-sal-userreceiveDetail" id="ipv-sal-userreceiveDetail" class="form-control" readonly>
                        </div>
                    </div>
                    <hr>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for=""><b>สกุลเงิน</b></label>
                            <select name="ipv-sal-currency" id="ipv-sal-currency" class="form-control" readonly></select>
                        </div>
                    </div>

                    <div class="card card-box">
                        <div class="card-header">
                            รายการ
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-12">
                                <!-- <i class="fa fa-plus-circle advAddDetail" data-toggle="tooltip" data-placement="left" title="" data-original-title="เลือกรายการเบิกตรงนี้"></i> -->
                                    <div id="" class="table-responsive">
                                        <table id="tbl_salary_new_view" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="advN-th1">ลำดับ</th>
                                                    <th class="advN-th2">รายการเบิก</th>
                                                    <th class="advN-th3">รหัสฝ่าย</th>
                                                    <th class="advN-th4">Account Code</th>
                                                    <th class="advN-th5">Account Code (Name)</th>
                                                    <th class="advN-th6">จำนวนเงิน</th>
                                                </tr>
                                            </thead>
                                            <tbody id="showDataSallistAftersave_view"></tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-saldetail-priceNonVat" id="ipv-saldetail-priceNonVat" class="form-control" placeholder="ยอดรวม" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ipv-saldetail-vat7" id="ipv-saldetail-vat7" class="form-control" readonly>
                                        <option value="0">ไม่มี Vat</option>
                                        <option value="7">Vat 7%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-saldetail-vat7Price" id="ipv-saldetail-vat7Price" class="form-control" placeholder="จำนวนเงิน Vat" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ipv-saldetail-vat3" id="ipv-saldetail-vat3" class="form-control" readonly>
                                        <option value="0">ไม่มี หัก ณ ที่จ่าย</option>
                                        <option value="1">หัก ณ ที่จ่าย 1%</option>
                                        <option value="2">หัก ณ ที่จ่าย 2%</option>
                                        <option value="3">หัก ณ ที่จ่าย 3%</option>
                                        <option value="5">หัก ณ ที่จ่าย 5%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-saldetail-vat3Price" id="ipv-saldetail-vat3Price" class="form-control" placeholder="จำนวนเงินหัก ณ ที่จ่าย" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-saldetail-priceTotal" id="ipv-saldetail-priceTotal" class="form-control" placeholder="ยอดรวมสุทธิ" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12 bottommargin">
                                    <label><b>รูปภาพ , เอกสารที่เกี่ยวข้อง</b></label><br>
                                    <div id="salary_showImage_view" class="row form-group"></div>
                                </div>
                            </div>

                            <!-- <div class="row form-group">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit" id="btn-saveAdvanceData" name="btn-saveAdvanceData" class="btn btn-success" >บันทึกข้อมูล</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div id="checkbudget_section_sal" style="display:none;">
                    <?=$this->load->view("salary/salary_checkbudget")?>
                </div>
                
                <div id="manager_section_sal" style="display:none;">
                    <?=$this->load->view("salary/salary_manager")?>
                </div>

                <div id="payGroup_section_sal" style="display:none;"></div>

                <div id="ap_section_sal" style="display:none;">
                    <?=$this->load->view("salary/salary_ap")?>
                </div>

                <div id="account_section_sal" style="display:none;">
                    <?=$this->load->view("salary/salary_account")?>
                </div>

                <div id="finance_section_sal" style="display:none;">
                    <?=$this->load->view("salary/salary_finance")?>
                </div>

                <div id="userreceive_section_sal" style="display:none;">
                    <?=$this->load->view("salary/salary_userreceive")?>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>


<script>
    $(document).ready(function(){
        let formcode = "<?php echo $formcode?>";
        let formno = "<?php echo $formno?>";
        let userecode = "<?php echo getUser()->ecode; ?>";
        let userdeptcode = "<?php echo getUser()->DeptCode; ?>";
        let userposi = "<?php echo getUser()->posi; ?>";

        let userpermission = [];
        getUserPermission_sal(userecode);


        // Control print button
        if(userdeptcode == 1003 || userecode == "M1809"){
            $('#exportform-section-sal').css('display' , '');
        }else{
            $('#exportform-section-sal').css('display' , 'none');
        }


        function getUserPermission_sal(ecode)
        {
            if(ecode != ""){
                axios.post(url+'main/salary/getUserPermission_sal' , {
                    action:"getUserPermission_sal",
                    ecode:ecode
                }).then(res=>{
                    // console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        if(res.data.result != null){
                            userpermission = res.data.result;
                            console.log(userpermission);
                        }
                        salary_getDataviewfull();
                    }
                });
            }
        }

        function salary_getDataviewfull()
        {
            if(formcode != ""){
                axios.post(url+'main/salary/salary_getDataviewfull' , {
                    action:'salary_getDataviewfull',
                    formcode:formcode,
                    formno:formno
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){

                        if(res.data.viewfulldata.wdf_status == "Open" || res.data.viewfulldata.wdf_status == "Edit"){
                            if(res.data.viewfulldata.wdf_ecode == userecode){
                                $('#btnControlBar_sal').css('display' , '');
                            }
                            
                        }else if(res.data.viewfulldata.wdf_status == "User cancel"){
                            $('#btnControlBar_sal').css('display' , 'none');
                        }else{
                            $('#btnControlBar_sal').css('display' , 'none');
                        }

                        $('input:radio[name="ipv-sal-areaid"]').on('click' , function(e){
                            e.preventDefault();
                        });

                        // get status to text
                        let resultTextColor = checkStatus_text(res.data.viewfulldata.wdf_status);
                        let status = `<span `+resultTextColor+`>`+res.data.viewfulldata.wdf_status+`</span>`;
                        $('#showFormStatus_sal').html(status);

                        $('#showFormno_sal').html(res.data.viewfulldata.wdf_formno);
                        $('#btn-editsalary').attr({
                            'data_formcode':formcode,
                            'data_formno':formno,
                        });
                        $('#btn-cancelsalary').attr('data_formcode' , formcode);

                        if(res.data.viewfulldata.wdf_areaid == "sc"){
                            $('#ipv-sal-areaid-sc').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "pa"){
                            $('#ipv-sal-areaid-pa').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "ca"){
                            $('#ipv-sal-areaid-ca').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "st"){
                            $('#ipv-sal-areaid-st').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "tb"){
                            $('#ipv-sal-areaid-tb').prop('checked' , true);
                        }

                        let condate = moment(res.data.viewfulldata.wdf_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ipv-sal-memo').val(res.data.viewfulldata.wdf_memo);
                        $('#ipv-sal-username').val(res.data.viewfulldata.wdf_user);
                        $('#ipv-sal-ecode').val(res.data.viewfulldata.wdf_ecode);
                        $('#ipv-sal-dept').val(res.data.viewfulldata.wdf_dept);
                        $('#ipv-sal-date').val(condate);
                        $('#ipv-sal-userreceive').val(res.data.viewfulldata.wdf_userreceive);
                        $('#ipv-sal-userreceiveDetail').val(res.data.viewfulldata.wdf_userreceived_detail);

                        // if(res.data.viewfulldata.wdf_vat1 == 7){
                        //     $('#ipv-advdetail-vat7 option[value="7"]').prop("selected" , true);
                        // }else{
                        //     $('#ipv-advdetail-vat7 option[value="0"]').prop("selected" , true);
                        // }
                        
                        let convat1ToInt = parseInt(res.data.viewfulldata.wdf_vat1);
                        $('#ipv-saldetail-vat7 option[value="'+convat1ToInt+'"]').prop("selected" , true);

                        let convat2ToInt = parseInt(res.data.viewfulldata.wdf_vat2);
                        $('#ipv-saldetail-vat3 option[value="'+convat2ToInt+'"]').prop("selected" , true);

                        $('#ipv-saldetail-priceNonVat').val(res.data.viewfulldata.wdf_pricenonevat);
                        $('#ipv-saldetail-vat7Price').val(res.data.viewfulldata.wdf_pricevat1);
                        $('#ipv-saldetail-vat3Price').val(res.data.viewfulldata.wdf_pricevat2);
                        $('#ipv-saldetail-priceTotal').val(res.data.viewfulldata.wdf_pricewithvat);

                        conpriceWithComma('#ipv-saldetail-priceNonVat');
                        conpriceWithComma('#ipv-saldetail-vat7Price');
                        conpriceWithComma('#ipv-saldetail-vat3Price');
                        conpriceWithComma('#ipv-saldetail-priceTotal');

                        $('#ipv-saldetail-vat7').attr("style", "pointer-events: none;");
                        $('#ipv-saldetail-vat3').attr("style", "pointer-events: none;");

                        let currency = res.data.viewfulldata.wdf_currency;
                        getSalCurrencyFromDb(currency);

                        // WDF Trans Detail
                        let wdf_trans = res.data.viewfulldata_trans;
                        let wdf_trans_html = ``;
                        let runningnumber = 1;
                        $('#tbl_salary_new_view').DataTable().destroy();
                        $('#tbl_salary_new_view').DataTable();
                        
                        for(let i = 0; i < wdf_trans.length; i++){

                            let conPrice = wdf_trans[i].tr_money.split(",").join("");
                            

                            wdf_trans_html += `
                            <tr>
                                <td>`+runningnumber+`</td>
                                <td>`+wdf_trans[i].tr_detailname+`</td>
                                <td>`+wdf_trans[i].tr_detaildeptcode+`</td>
                                <td>`+wdf_trans[i].tr_detailaccode+`</td>
                                <td>`+wdf_trans[i].tr_detailaccodename+`</td>
                                <td>`+numberWithCommas(conPrice)+`</td>
                            </tr>
                            `;
                            runningnumber++;
                        }
                        $('#showDataSallistAftersave_view').html(wdf_trans_html);

                        // Show Image View
                        let wdf_file = res.data.viewfulldata_image;
                        let imageHtml = ``;
                        let ext;
                        for(let i = 0; i < wdf_file.length; i++){
                            ext = wdf_file[i].fi_name.split('.').pop().toLowerCase();

                            if(ext != "pdf"){
                                imageHtml +=`
                                <div class="col-md-4 col-lg-3 col-6 mt-2">
                                    <a href="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" target="_blank">
                                        <img class="runImageView" src="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`">
                                    </a>
                                    <a href="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" target="_blank"><b>`+wdf_file[i].fi_name+`</b></a>
                                </div>
                                `;
                            }else{
                                imageHtml +=`
                                <div class="col-md-4 col-lg-3 col-6 mt-2">
                                    <embed src="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" width="100%" frameborder="0" allowfullscreen>
                                    <a href="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" target="_blank"><b>`+wdf_file[i].fi_name+`</b></a>
                                </div>
                                `;
                            }

                            
                            console.log(ext);
                        }
                        $('#salary_showImage_view').html(imageHtml);

                        checkstatus_controlsection_sal(res.data.viewfulldata.wdf_status , formcode , res.data.viewfulldata.wdf_areaid ,res.data.viewfulldata.wdf_pricewithvat , res.data.viewfulldata.wdf_appgroup , res.data.viewfulldata.wdf_fnc_method , res.data.viewfulldata.wdf_fnc_money , res.data.viewfulldata.wdf_deptcode , res.data.viewfulldata.wdf_ecode);
                         
                    }
                })
            }
        }

        function conpriceWithComma(inputid)
        {
            $(inputid).val(function(index , value){
                value = value.replace(/,/g, '');
                return numberWithCommas(value);
            });
        }

        $(document).on('click' , '#btn-editsalary' , function(){
            const data_formcode = $(this).attr("data_formcode");
            const data_formno = $(this).attr("data_formno");
            location.href = url+'main/salary/salary_edit_page/'+data_formcode+'/'+data_formno;
        });

        $(document).on('click' , '#btn-cancelsalary' , function(){
            const data_formcode = $(this).attr("data_formcode");
            if(data_formcode != ""){
                swal({
                    title: 'ท่านต้องการยกเลิกรายการนี้ ใช่หรือไม่',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText:'ยกเลิก'
                }).then((result)=> {
                    if(result.value == true){
                        cancel_sal(data_formcode);
                    }
                });
            }
        });

        function cancel_sal(data_formcode)
        {
            if(data_formcode != ""){
                axios.post(url+'main/salary/cancel_sal' , {
                    action:'cancel_sal',
                    data_formcode:data_formcode
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Update Data Success"){
                        location.href = url+'salary.html';
                    }
                });
            }
        }

        function checkstatus_controlsection_sal(status , formcode , areaid , pricewithVat , appgroup , fnc_method , fnc_money , doc_deptcode , doc_ecode)
        {
            switch(status){
                case "Open":

                    // Section check budget open
                    $('#checkbudget_section_sal').css('display' , '');
                    // control input

                    if(userpermission.u_budget_section == "yes"){
                        $('#ip-sal-bgsec-user').val("<?php echo getUser()->Fname." ".getUser()->Lname; ?>").prop('readonly' , true);
                        $('#ip-sal-bgsec-dept').val("<?php echo getUser()->Dept; ?>").prop('readonly' , true);
                        $('#ip-sal-bgsec-datetime').val("<?php echo date("d/m/Y H:i:s"); ?>").prop('readonly' , true);
                        $('#check_formcode_bg_sal').val(formcode);
                        $('#check_areaid_bg_sal').val(areaid);
                        $(document).on('keyup' , '#ip-sal-bgsec-creditlimit' ,function(){
                            // skip for arrow keys 
                            if (event.which >= 37 && event.which <= 40) 
                                return; 
                            // format number 
                            $(this).val(function (index, value) { 
                                value = value.replace(/,/g, '');
                                return numberWithCommas(value);
                            });
                        });
                    }else{
                        $('#ip-sal-bgsec-user , #ip-sal-bgsec-dept , #ip-sal-bgsec-datetime , #ip-sal-bgsec-creditlimit , #ip-sal-bgsec-memo').prop('readonly' , true);
                        $('#btn-sal-savecheckbudget').css('display' , 'none');
                    }

                    // Section check budget

                    break;
                case "Edit":

                    // Section check budget open
                    $('#checkbudget_section_sal').css('display' , '');
                    // control input

                    if(userpermission.u_budget_section == "yes"){
                        $('#ip-sal-bgsec-user').val("<?php echo getUser()->Fname." ".getUser()->Lname; ?>").prop('readonly' , true);
                        $('#ip-sal-bgsec-dept').val("<?php echo getUser()->Dept; ?>").prop('readonly' , true);
                        $('#ip-sal-bgsec-datetime').val("<?php echo date("d/m/Y H:i:s"); ?>").prop('readonly' , true);
                        $('#check_formcode_bg_sal').val(formcode);
                        $('#check_areaid_bg_sal').val(areaid);
                        $(document).on('keyup' , '#ip-sal-bgsec-creditlimit' ,function(){
                            // skip for arrow keys 
                            if (event.which >= 37 && event.which <= 40) 
                                return; 
                            // format number 
                            $(this).val(function (index, value) { 
                                value = value.replace(/,/g, '');
                                return numberWithCommas(value);
                            });
                        });
                    }else{
                        $('#ip-sal-bgsec-user , #ip-sal-bgsec-dept , #ip-sal-bgsec-datetime , #ip-sal-bgsec-creditlimit , #ip-sal-bgsec-memo').prop('readonly' , true);
                        $('#btn-sal-savecheckbudget').css('display' , 'none');
                    }

                    // Section check budget

                    break;
                case "Check budget already":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget


                    // Check Manager Section
                    if(doc_deptcode == userdeptcode && userposi > 55){
                        $('#manager_section_sal').css('display' , '');
                        checkpaygroup_sal(pricewithVat , 'sal' , areaid , formcode);
                    }else if(areaid == "tb" && userecode == "M0051" || areaid == "tb" && userecode == "M2076" || areaid == "tb" && userecode == "M0963"){
                        $('#manager_section_sal').css('display' , '');
                        checkpaygroup_sal(pricewithVat , 'sal' , areaid , formcode);
                    }else if(areaid == "sc" && userecode == "M0963" || areaid == "ca" && userecode == "M0963" || areaid == "st" && userecode == "M0963" || areaid == "pa" && userecode == "M0963"){
                        $('#manager_section_sal').css('display' , '');
                        checkpaygroup_sal(pricewithVat , 'sal' , areaid , formcode);
                    }
                    // Section manager approve

                    if(areaid == "tb"){
                        if(userecode == "M1809" || userecode == "M2076" || userecode == "M2222" || userecode == "M0963"){
                            $('#btn-sal-saveManager').css('display' , '');
                        }else{
                            $('#btn-sal-saveManager').css('display' , 'none');
                        }
                    }
                    // Section manager approve

                    break;
                case "Manager approved":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    if(appgroup == 5){
                        $('#ap_section_sal').css('display' , '');

                        if(userpermission.u_ap_section == "yes"){
                            getdata_apApprove_sal(formcode , areaid);
                        }else{
                            $('#ip-sal-apsec-user , #ip-sal-apsec-dept , #ip-sal-apsec-date , #ip-sal-apsec-memo').prop('readonly' , true);
                            $('#btn-sal-saveAP').css('display' , 'none');
                            $('input:radio[id="ip-sal-apsec-money-1"]').prop('checked' , false);
                        }
                        
                    }
                    
                    
                    break;
                case "Wait Executive Group 0 Approve":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Wait Executive Group 1 Approve":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // Check Pay Group for show Another Section
                    break;
                case "Wait Executive Group 2 Approve":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // Check Pay Group for show Another Section
                    
                    break;
                case "Wait Executive Group 3 Approve":
                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    break;
                case "Wait Executive Group 4 Approve":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Executive Group 0 Approved":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section_sal').css('display' , '');


                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove_sal(formcode , areaid);
                    }else{
                        $('#ip-sal-apsec-user , #ip-sal-apsec-dept , #ip-sal-apsec-date , #ip-sal-apsec-memo').prop('readonly' , true);
                        $('#btn-sal-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-sal-apsec-money-1"]').prop('checked' , false);
                    }

                    break;
                case "Executive Group 1 Approved":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section_sal').css('display' , '');


                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove_sal(formcode , areaid);
                    }else{
                        $('#ip-sal-apsec-user , #ip-sal-apsec-dept , #ip-sal-apsec-date , #ip-sal-apsec-memo').prop('readonly' , true);
                        $('#btn-sal-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-sal-apsec-money-1"]').prop('checked' , false);
                    }
                    
                    break;
                case "Executive Group 2 Approved":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section_sal').css('display' , '');


                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove_sal(formcode , areaid);
                    }else{
                        $('#ip-sal-apsec-user , #ip-sal-apsec-dept , #ip-sal-apsec-date , #ip-sal-apsec-memo').prop('readonly' , true);
                        $('#btn-sal-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-sal-apsec-money-1"]').prop('checked' , false);
                    }

                    break;
                case "Executive Group 3 Approved":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section_sal').css('display' , '');


                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove_sal(formcode , areaid);
                    }else{
                        $('#ip-sal-apsec-user , #ip-sal-apsec-dept , #ip-sal-apsec-date , #ip-sal-apsec-memo').prop('readonly' , true);
                        $('#btn-sal-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-sal-apsec-money-1"]').prop('checked' , false);
                    }
                    
                    break;
                case "Executive Group 4 Approved":
                    
                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section_sal').css('display' , '');


                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove_sal(formcode , areaid);
                    }else{
                        $('#ip-sal-apsec-user , #ip-sal-apsec-dept , #ip-sal-apsec-date , #ip-sal-apsec-memo').prop('readonly' , true);
                        $('#btn-sal-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-sal-apsec-money-1"]').prop('checked' , false);
                    }

                    break;
                case "Executive Group 0 Not Approve":
                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    break;
                case "Executive Group 1 Not Approve":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Executive Group 2 Not Approve":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Executive Group 3 Not Approve":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Executive Group 4 Not Approve":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // Check Pay Group for show Another Section
                    break;
                case "Manager not approve":
                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    break;
                case "AP passed inspection":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_sal').css('display' , '');
                    getdata_apApprove_sal(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_sal').css('display' , '');
                    
                    if(userpermission.u_acc_section == "yes"){
                        getdata_accApprove_sal(formcode , areaid);
                    }else{
                        $('#ip-sal-accSec-user , #ip-sal-accSec-dept , #ip-sal-accSec-date , #ip-sal-accSec-memo').prop('readonly' , true);
                        $('#btn-sal-saveAcc').css('display' , 'none');
                    }
                    
                    break;
                case "AP not pass inspection":
                    
                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_sal').css('display' , '');
                    getdata_apApprove_sal(formcode , areaid);
                    
                    break;
                    break;
                case "Account passed inspection":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_sal').css('display' , '');
                    getdata_apApprove_sal(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_sal').css('display' , '');
                    getdata_accApprove_sal(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section_sal').css('display' , '');

                    if(userpermission.u_finance_section == "yes"){
                        getdata_financeApprove_sal(formcode , areaid);
                    }else{
                        $('#ip-sal-fnSec-user , #ip-sal-fnSec-dept , #ip-sal-fnSec-date , #ip-sal-fnSec-memo').prop('readonly' , true);
                        $('#btn-sal-saveFn').css('display' , 'none');
                    }

                    break;
                case "Account not pass inspection":

                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_sal').css('display' , '');
                    getdata_apApprove_sal(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_sal').css('display' , '');
                    getdata_accApprove_sal(formcode , areaid);

                    break;
                case "Wait user receive money":
                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_sal').css('display' , '');
                    getdata_apApprove_sal(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_sal').css('display' , '');
                    getdata_accApprove_sal(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section_sal').css('display' , '');
                    getdata_financeApprove_sal(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section_sal').css('display' , '');

                    if(userpermission.u_userreceive_section == "yes"){
                        getdata_userReceive_sal(formcode , areaid);
                    }else{
                        $('#ip-sal-userReceiveSec-user , #ip-sal-userReceiveSec-dept , #ip-sal-userReceiveSec-date , #ip-sal-userReceiveSec-memo').prop('readonly' , true);
                        $('#btn-sal-saveUserreceive').css('display' , 'none');
                    }

                    break;
                case "Finance not pass inspection":
                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_sal').css('display' , '');
                    getdata_apApprove_sal(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_sal').css('display' , '');
                    getdata_accApprove_sal(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section_sal').css('display' , '');
                    getdata_financeApprove_sal(formcode , areaid);
                    break;
                case "Complete":
                    // Section check budget
                    $('#checkbudget_section_sal').css('display' , '');
                    getdata_checkbudget_sal(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_sal').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_sal(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_sal').css('display' , '');
                    getdata_apApprove_sal(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_sal').css('display' , '');
                    getdata_accApprove_sal(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section_sal').css('display' , '');
                    getdata_financeApprove_sal(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section_sal').css('display' , '');
                    getdata_userReceive_sal(formcode , areaid);

                    break;


    
            }

            process_step_salary(status , appgroup);
        }

        function getdata_checkbudget_sal(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/salary/getdata_checkbudget_sal' , {
                    action:'getdata_checkbudget_sal',
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let bgdata = res.data.checkbudgetData;
                        let condate = moment(bgdata.wdf_bg_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ip-sal-bgsec-user').val(bgdata.wdf_bg_user).prop('readonly' , true);
                        $('#ip-sal-bgsec-dept').val(bgdata.wdf_bg_dept).prop('readonly' , true);
                        $('#ip-sal-bgsec-datetime').val(condate).prop('readonly' , true);
                        $('#ip-sal-bgsec-creditlimit').val(numberWithCommas(bgdata.wdf_bg_creditlimit)).prop('readonly' , true);
                        $('#ip-sal-bgsec-memo').val(bgdata.wdf_bg_memo).prop('readonly' , true);
                        $('#btn-sal-savecheckbudget').css('display' , 'none');
                    }
                });
            }
        }

        function checkpaygroup_sal(pricewithVat , doctype , areaid , formcode)
        {
            let approveGroup = '';
            let areaidGroup = '';
            let paygroupid = '';
            if(pricewithVat != "" && doctype != "" && areaid != ""){
                
                pricewithVat = parseFloat(pricewithVat);
                axios.post(url+'main/salary/checkpaygroup_sal' , {
                    action:'checkpaygroup_sal',
                    doctype:doctype,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        // check scope limit
                        let paygroupArray = res.data.rsPay;
                        for(let i = 0; i < paygroupArray.length; i++){
                            let pricemin = parseFloat(paygroupArray[i].pay_scope_start);
                            let pricemax = parseFloat(paygroupArray[i].pay_scope_end);

                            if(pricewithVat >= pricemin && pricewithVat <= pricemax){
                                approveGroup = paygroupArray[i].approve_group;
                                areaidGroup = paygroupArray[i].areaid;
                                paygroupid = paygroupArray[i].pay_groupid;
                            }else{
                                continue;
                            }
                        }

                        $('#check-mg-paygroupid-sal').val(paygroupid);
                        $('#check-mg-group-sal').val(approveGroup);
                        $('#check-mg-areaid-sal').val(areaid);
                        $('#check-mg-formcode-sal').val(formcode);
                        $('#check-mg-groupareaid-sal').val(areaidGroup);

                        $('#ip-sal-mgrsec-userpost').val("<?php echo getUser()->Fname." ".getUser()->Lname; ?>").prop('readonly' , true);
                        $('#ip-sal-mgrsec-deptpost').val("<?php echo getUser()->Dept; ?>").prop('readonly' , true);
                        $('#ip-sal-mgrsec-datepost').val("<?php echo date("d/m/Y H:i:s"); ?>").prop('readonly' , true);

                        console.log(approveGroup+','+areaidGroup+','+paygroupid);
                        getdata_approveGroup_sal(approveGroup , areaidGroup , formcode , areaid);
                    }
                });
            }

        }



        function getdata_approveGroup_sal(approveGroup , areaidGroup , formcode , areaid)
        {
            if(approveGroup != "" && areaidGroup != ""){
                axios.post(url+'main/salary/getdata_approveGroup_sal' , {
                    action:'getdata_approveGroup_sal',
                    approveGroup:approveGroup,
                    areaidGroup:areaidGroup,
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let check_userecode = "<?php echo getUser()->ecode; ?>";
                        if(approveGroup != 5){
                            $('.lineMgrApp_sal').css('display' , '');
                            let appGroup = res.data.appGroup;
                            let appGroupDetail = res.data.appGroupDetail;
                            let htmlPay = ``;
                            let appNumber = null;

                            let htmlg1 = `
                                <div class="col-md-12 form-group">
                            `;
                                for(let i = 0 ; i < appGroup.length; i++){
                                    appNumber = appGroup[i].app_number;
                                    $('#check-mg-totalLength-sal').val(appNumber);
                                    htmlg1 +=`
                                    <label><b>`+appGroup[i].app_posiname+`</b></label>
                                    <div class="row">
                                        <div class="col-lg-12 form-inline">`;

                                        for(let ii = 0; ii < appGroupDetail.length; ii++){
                                            if(appGroup[i].app_posiname == appGroupDetail[ii].app_posiname){
                                                if(check_userecode == appGroupDetail[ii].app_ecode){
                                                    continue;
                                                }else{
                                                    htmlg1 +=`
                                                    <div class="custom-control custom-checkbox mb-5 ml-3">
                                                        <input type="checkbox" id="ipv-sal-appgd-`+appGroupDetail[ii].app_autoid+`" name="ipv-sal-appgd[]" class="custom-control-input cbGroupDetail_sal" value="`+appGroupDetail[ii].app_ecode+`"
                                                        data_autoid="`+appGroupDetail[ii].app_autoid+`"
                                                        data_group="`+appGroupDetail[ii].app_group+`"
                                                        data_posiname="`+appGroupDetail[ii].app_posiname+`"
                                                        >

                                                        <label for="ipv-sal-appgd-`+appGroupDetail[ii].app_autoid+`" class="custom-control-label"><b>`+appGroupDetail[ii].app_user+`</b></label>
                                                    </div>
                                                    `;
                                                }

                                            }
                                        }   

                                    htmlg1 +=`
                                        </div>
                                    </div>
                                    `;
                                }

                                htmlg1 +=`
                                </div>
                                `;
                                let condition = getConditionTextByGroup_sal(approveGroup , areaid);
                                htmlg1 +=`
                                <div class="col-md-12 form-group">
                                    <span class="conditionText">`+condition+`</span>
                                </div>
                                `;

                                $('#mainG-1-sal').html(htmlg1);

                                let checkboxCount = 0;
                                let checkTeam1Max = 2;
                                let checkTeam2Max = 1;
                                let checkBoxCountT1 = 0;
                                let checkBoxCountT2 = 0;

                                let checkT1MaxG0 = 2;
                                let checkT2MaxG0 = 3;
                                let checkBoxCountG0T1 = 0;
                                let checkBoxCountG0T2 = 0;

                                let checkT1MaxG2 = 1;
                                let checkT2MaxG2 = 1;
                                let checkBoxCountG2T1 = 0;
                                let checkBoxCountG2T2 = 0;

                                let checkT1MaxG4 = 1;
                                let checkT2MaxG4 = 1;
                                let checkBoxCountG4T1 = 0;
                                let checkBoxCountG4T2 = 0;

                                $(document).on('click' , '.cbGroupDetail_sal' , function(){
                                    const data_autoid = $(this).attr('data_autoid');
                                    const data_group = $(this).attr('data_group');
                                    const data_posiname = $(this).attr('data_posiname');

                                    if($(this).is(':checked')){

                                        if($('#check-mg-areaid-sal').val() == "tb"){

                                            if(data_group == 1){

                                                if(data_posiname == "ประธานบริหาร"){
                                                    
                                                    checkboxCount += 3;
                 
                                                }else if(data_posiname == "กรรมการผู้จัดการ"){

                                                    checkboxCount += 3;
        
                                                }else if(data_posiname == "กรรมการบริหาร ชุดที่ 1"){

                                                    checkBoxCountT1 += 1;
                                                    checkboxCount += 1;
                                                    if(checkBoxCountT1 > checkTeam1Max){
                                                        swal({
                                                            title: 'ท่านเลือกเกินจำนวนที่กำหนด',
                                                            type: 'error',
                                                            showConfirmButton: false,
                                                            timer:1000
                                                        }).then(function(){
                                                            checkBoxCountT1 -= 1;
                                                            $('#ipv-sal-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= checkBoxCountT1;
                                                            $('#check-mg-clickLength-sal').val(checkboxCount);
                                                        });
                                                    }

                                                }else if(data_posiname == "กรรมการบริหาร ชุดที่ 2"){

                                                    checkBoxCountT2 += 1;
                                                    checkboxCount += 1;

                                                    if(checkBoxCountT2 > checkTeam2Max){
                                                        swal({
                                                            title: 'ท่านเลือกเกินจำนวนที่กำหนด',
                                                            type: 'error',
                                                            showConfirmButton: false,
                                                            timer:1000
                                                        }).then(function(){
                                                            checkBoxCountT2 -= 1;
                                                            $('#ipv-sal-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= checkBoxCountT2;
                                                            $('#check-mg-clickLength-sal').val(checkboxCount);
                                                        });
                                                    }
                                                   

                                                }

                                                

                                            }else if(data_group == 2){

                                                if(data_posiname == "กรรมการบริหาร ชุดที่ 1"){

                                                    checkBoxCountG2T1 += 1;
                                                    checkboxCount += 1;
                                                    if(checkBoxCountG2T1 > checkT1MaxG2){
                                                        swal({
                                                            title: 'ท่านเลือกเกินจำนวนที่กำหนด',
                                                            type: 'error',
                                                            showConfirmButton: false,
                                                            timer:1000
                                                        }).then(function(){
                                                            checkBoxCountG2T1 -= 1;
                                                            $('#ipv-sal-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength-sal').val(checkboxCount);
                                                        });
                                                    }

                                                }else if(data_posiname == "กรรมการบริหาร ชุดที่ 2"){

                                                    checkBoxCountG2T2 += 1;
                                                    checkboxCount += 1;
                                                    if(checkBoxCountG2T2 > checkT2MaxG2){
                                                        swal({
                                                            title: 'ท่านเลือกเกินจำนวนที่กำหนด',
                                                            type: 'error',
                                                            showConfirmButton: false,
                                                            timer:1000
                                                        }).then(function(){
                                                            checkBoxCountG2T2 -= 1;
                                                            $('#ipv-sal-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength-sal').val(checkboxCount);
                                                        });
                                                    }

                                                }

                                            }else if(data_group == 3){

                                                if(data_posiname == "กรรมการบริหาร ชุดที่ 1" || data_posiname == "กรรมการบริหาร ชุดที่ 2"){
                                                    checkboxCount = checkboxCount+1;
                                                }

                                            }else if(data_group == 4){

                                                if(data_posiname == "ผู้จัดการ ชุดที่ 1"){
                                                    checkboxCount += 1;
                                                    checkBoxCountG4T1 += 1;

                                                    if(checkBoxCountG4T1 > checkT1MaxG4){
                                                        swal({
                                                            title: 'ท่านเลือกเกินจำนวนที่กำหนด',
                                                            type: 'error',
                                                            showConfirmButton: false,
                                                            timer:1000
                                                        }).then(function(){
                                                            checkBoxCountG4T1 -= 1;
                                                            $('#ipv-sal-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength-sal').val(checkboxCount);
                                                        });
                                                    }
                                                }else if(data_posiname == "ผู้จัดการ ชุดที่ 2"){
                                                    checkboxCount += 1;
                                                    checkBoxCountG4T2 += 1;

                                                    if(checkBoxCountG4T2 > checkT2MaxG4){
                                                        swal({
                                                            title: 'ท่านเลือกเกินจำนวนที่กำหนด',
                                                            type: 'error',
                                                            showConfirmButton: false,
                                                            timer:1000
                                                        }).then(function(){
                                                            checkBoxCountG4T2 -= 1;
                                                            $('#ipv-sal-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength-sal').val(checkboxCount);
                                                        });
                                                    }
                                                }

                                            }else if(data_group == 0){

                                                if(data_posiname == "กรรมการบริหาร ชุดที่ 1"){

                                                    checkBoxCountG0T1 += 1;
                                                    checkboxCount += 1;
                                                    if(checkBoxCountG0T1 > checkT1MaxG0){
                                                        swal({
                                                            title: 'ท่านเลือกเกินจำนวนที่กำหนด',
                                                            type: 'error',
                                                            showConfirmButton: false,
                                                            timer:1000
                                                        }).then(function(){
                                                            checkBoxCountG0T1 -= 1;
                                                            $('#ipv-sal-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength-sal').val(checkboxCount);
                                                        });
                                                    }
                                                    
                                                }else if(data_posiname == "กรรมการบริหาร ชุดที่ 2"){

                                                    checkBoxCountG0T2 += 1;
                                                    checkboxCount += 1;
                                                    if(checkBoxCountG0T2 > checkT2MaxG0){
                                                        swal({
                                                            title: 'ท่านเลือกเกินจำนวนที่กำหนด',
                                                            type: 'error',
                                                            showConfirmButton: false,
                                                            timer:1000
                                                        }).then(function(){
                                                            checkBoxCountG0T2 -= 1;
                                                            $('#ipv-sal-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength-sal').val(checkboxCount);
                                                        });
                                                    }

                                                }

                                            }
                                        }else{
                                            if(data_group == 1){
                                                if(data_posiname == "ประธานบริหาร"){
                                                    // checkboxCount = $('input:checkbox[name="ipv-adv-appgd[]"]:checked').length;
                                                    // checkboxCount = checkboxCount+2;
                                                    checkboxCount = checkboxCount+3;
                                                    
                                                }else if(data_posiname == "กรรมการผู้จัดการ"){
                                                    checkboxCount = checkboxCount+3;
                                                }else if(data_posiname == "รองกรรมการผู้จัดการ"){
                                                    checkboxCount = checkboxCount+1;
                                                }
                                            }else if(data_group == 2){
                                                if(data_posiname == "รองกรรมการผู้จัดการ"){
                                                    checkboxCount = checkboxCount+1;
                                                }
                                            }else if(data_group == 3){
                                                if(data_posiname == "รองกรรมการผู้จัดการ"){
                                                    checkboxCount = checkboxCount+1;
                                                }
                                            }else if(data_group == 4){
                                                if(data_posiname == "ผู้จัดการ"){
                                                    checkboxCount = checkboxCount+1;
                                                }
                                            }else if(data_group == 0){
                                                if(data_posiname == "คณะกรรมการบริหาร"){
                                                    checkboxCount = checkboxCount+1;
                                                }
                                            }
                                        }


                                        console.log('check');

                                    }else if(!$(this).is(':checked')){

                                        console.log('uncheck');
                                        if($('#check-mg-areaid-sal').val() == "tb"){

                                            if(data_group == 1){

                                                if(data_posiname == "ประธานบริหาร"){

                                                    checkboxCount -= 3;
                                                    
                                                }else if(data_posiname == "กรรมการผู้จัดการ"){

                                                    checkboxCount -= 3;

                                                }else if(data_posiname == "กรรมการบริหาร ชุดที่ 1"){

                                                    checkBoxCountT1 -= 1;
                                                    checkboxCount -= 1;

                                                }else if(data_posiname == "กรรมการบริหาร ชุดที่ 2"){

                                                    checkBoxCountT2 -= 1;
                                                    checkboxCount -= 1;
                                                }

                                            }else if(data_group == 2){

                                                if(data_posiname == "กรรมการบริหาร ชุดที่ 1"){

                                                    checkBoxCountG2T1 -= 1;
                                                    checkboxCount -= 1;

                                                }else if(data_posiname == "กรรมการบริหาร ชุดที่ 2"){

                                                    checkBoxCountG2T2 -= 1;
                                                    checkboxCount -= 1;

                                                }

                                            }else if(data_group == 3){
                                                if(data_posiname == "กรรมการบริหาร ชุดที่ 1" || data_posiname == "กรรมการบริหาร ชุดที่ 2"){
                                                    checkboxCount = checkboxCount-1;
                                                }
                                            }else if(data_group == 4){

                                                if(data_posiname == "ผู้จัดการ ชุดที่ 1"){

                                                    checkBoxCountG4T1 -= 1;
                                                    checkboxCount -= 1;

                                                }else if(data_posiname == "ผู้จัดการ ชุดที่ 2"){

                                                    checkBoxCountG4T2 -= 1;
                                                    checkboxCount -= 1;

                                                }

                                            }else if(data_group == 0){

                                                if(data_posiname == "กรรมการบริหาร ชุดที่ 1"){

                                                    checkBoxCountG0T1 -= 1;
                                                    checkboxCount -= 1;

                                                }else if(data_posiname == "กรรมการบริหาร ชุดที่ 2"){

                                                    checkBoxCountG0T2 -= 1;
                                                    checkboxCount -= 1;

                                                }
                                                
                                            }
                                        }else{
                                            if(data_group == 1){
                                                if(data_posiname == "ประธานบริหาร"){
                                                    // checkboxCount = $('input:checkbox[name="ipv-adv-appgd[]"]:checked').length;
                                                    // checkboxCount = checkboxCount+2;
                                                    checkboxCount = checkboxCount-3;
                                                    
                                                }else if(data_posiname == "กรรมการผู้จัดการ"){
                                                    checkboxCount = checkboxCount-3;
                                                }else if(data_posiname == "รองกรรมการผู้จัดการ"){
                                                    checkboxCount = checkboxCount-1;
                                                }
                                            }else if(data_group == 2){

                                                if(data_posiname == "รองกรรมการผู้จัดการ"){
                                                    checkboxCount = checkboxCount-1;
                                                }

                                            }else if(data_group == 3){
                                                if(data_posiname == "รองกรรมการผู้จัดการ"){
                                                    checkboxCount = checkboxCount-1;
                                                }
                                            }else if(data_group == 4){
                                                if(data_posiname == "ผู้จัดการ"){
                                                    checkboxCount = checkboxCount-1;
                                                }
                                            }else if(data_group == 0){
                                                if(data_posiname == "คณะกรรมการบริหาร"){
                                                    checkboxCount = checkboxCount-1;
                                                }
                                            }
                                        }



                                    }

                                    

                                    console.log(checkboxCount);


                                    
                                    $('#check-mg-clickLength-sal').val(checkboxCount);

                                    if(checkboxCount > appNumber){
                                        swal({
                                            title: 'ท่านเลือกเกินจำนวนที่กำหนด',
                                            type: 'error',
                                            showConfirmButton: false,
                                            timer:1000
                                        }).then(function(){

                                            if($('#check-mg-areaid-sal').val() == "tb"){

                                                if(data_group == 1){

                                                    if(data_posiname == "ประธานบริหาร"){

                                                        checkboxCount = checkboxCount-3;
                                                        
                                                    }else if(data_posiname == "กรรมการผู้จัดการ"){

                                                        checkboxCount = checkboxCount-3;

                                                    }else if(data_posiname == "กรรมการบริหาร ชุดที่ 1"){

                                                        checkBoxCountT1 -= 1;
                                                        checkboxCount -= 1;

                                                    }else if(data_posiname == "กรรมการบริหาร ชุดที่ 2"){

                                                        checkBoxCountT2 -= 1;
                                                        checkboxCount -= 1;

                                                    }

                                                }else if(data_group == 2){

                                                    if(data_posiname == "กรรมการบริหาร ชุดที่ 1" || data_posiname == "กรรมการบริหาร ชุดที่ 2"){
                                                        checkboxCount = checkboxCount-1;
                                                    }

                                                }else if(data_group == 3){

                                                    if(data_posiname == "กรรมการบริหาร ชุดที่ 1" || data_posiname == "กรรมการบริหาร ชุดที่ 2"){
                                                        checkboxCount = checkboxCount-1;
                                                    }

                                                }else if(data_group == 4){

                                                    if(data_posiname == "ผู้จัดการ"){
                                                        checkboxCount = checkboxCount-1;
                                                    }

                                                }else if(data_group == 0){

                                                    // if(data_posiname == "กรรมการบริหาร ชุดที่ 1"){

                                                    //     checkBoxCountT1 -= 1;
                                                    //     checkboxCount -= 1;

                                                    // }else if(data_posiname == "กรรมการบริหาร ชุดที่ 2"){

                                                    //     checkBoxCountT2 -= 1;
                                                    //     checkboxCount -= 1;

                                                    // }

                                                }
                                            }else{
                                                if(data_group == 1){
                                                    if(data_posiname == "ประธานบริหาร"){
                                                        // checkboxCount = $('input:checkbox[name="ipv-adv-appgd[]"]:checked').length;
                                                        // checkboxCount = checkboxCount+2;
                                                        checkboxCount = checkboxCount-3;
                                                        
                                                    }else if(data_posiname == "กรรมการผู้จัดการ"){
                                                        checkboxCount = checkboxCount-3;
                                                    }else if(data_posiname == "รองกรรมการผู้จัดการ"){
                                                        checkboxCount = checkboxCount-1;
                                                    }
                                                }else if(data_group == 2){
                                                    if(data_posiname == "รองกรรมการผู้จัดการ"){
                                                        checkboxCount = checkboxCount-1;
                                                    }
                                                }else if(data_group == 3){
                                                    if(data_posiname == "รองกรรมการผู้จัดการ"){
                                                        checkboxCount = checkboxCount-1;
                                                    }
                                                }else if(data_group == 4){
                                                    if(data_posiname == "ผู้จัดการ"){
                                                        checkboxCount = checkboxCount-1;
                                                    }
                                                }else if(data_group == 0){
                                                    if(data_posiname == "คณะกรรมการบริหาร"){
                                                        checkboxCount = checkboxCount-1;
                                                    }
                                                }
                                            }




                                            $('#ipv-sal-appgd-'+data_autoid).prop('checked' , false);
                                            $('#check-mg-clickLength-sal').val(checkboxCount);
                                        });
                                    }
                                });
                        }

                    }
                });
            }
        }



        function getData_ManagerApproved_sal(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/salary/getData_ManagerApproved_sal' , {
                    action:"getData_ManagerApproved_sal",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){

                        let approveGroup = res.data.approveGroup;
                        let mgrApproveData = res.data.mgrApproveData;

                        if(mgrApproveData.wdf_mgr_appr == "อนุมัติ"){

                            if(approveGroup != 5){
                                $('.lineMgrApp_sal').css('display' , '');
                                let appGroup = res.data.appGroup;
                                let appGroupDetail = res.data.appGroupDetail;
                                let userApproved = res.data.userApproved;
                                
                                let htmlPay = ``;
                                let appNumber = null;

                                let htmlg1 = `
                                    <div class="col-md-12 form-group">
                                `;
                                    for(let i = 0 ; i < appGroup.length; i++){
                                        appNumber = appGroup[i].app_number;
                                        $('#check-mg-totalLength-sal').val(appNumber);
                                        htmlg1 +=`
                                        <label><b>`+appGroup[i].app_posiname+`</b></label>
                                        <div class="row">
                                            <div class="col-lg-12 form-inline">`;

                                            for(let ii = 0; ii < appGroupDetail.length; ii++){
                                                let checkedData = '';
                                                if(appGroup[i].app_posiname == appGroupDetail[ii].app_posiname){

                                                    for(let iii = 0; iii < userApproved.length; iii++){
                                                        if(appGroupDetail[ii].app_ecode == userApproved[iii].apv_ecode){
                                                            checkedData = 'checked';
                                                        }
                                                    }

                                                    htmlg1 +=`
                                                    <div class="custom-control custom-checkbox mb-5 ml-3">
                                                        <input type="checkbox" id="ipv-sal-appgd-`+appGroupDetail[ii].app_autoid+`" name="ipv-sal-appgd[]" class="custom-control-input cbGroupDetail_sal" `+checkedData+`>

                                                        <label for="ipv-sal-appgd-`+appGroupDetail[ii].app_autoid+`" class="custom-control-label"><b>`+appGroupDetail[ii].app_user+`</b></label>
                                                    </div>

                                                    `;
                                                }
                                            }   

                                        htmlg1 +=`
                                            </div>
                                        </div>
                                        `;
                                    }

                                    htmlg1 +=`
                                    </div>
                                    `;

                                let condition = getConditionTextByGroup_sal(approveGroup , areaid);
                                    htmlg1 +=`
                                    <div class="col-md-12 form-group">
                                        <span class="conditionText">`+condition+`</span>
                                    </div>
                                    `;
                                    
                                    $('#mainG-1-sal').html(htmlg1);

                                    $('input:checkbox[name="ipv-sal-appgd[]"]').on('click' , function(e){
                                        e.preventDefault();
                                    });


                                    getSectionGroup_4_to_0_sal(approveGroup , userApproved , formcode , areaid , mgrApproveData.wdf_status);
                            }

                        }


                        $('input:radio[name="ip-sal-mgrsec-appro"]').on('click' , function(e){
                            e.preventDefault();
                        });

                        if(mgrApproveData.wdf_mgr_appr == "อนุมัติ"){
                            $('#ip-sal-mgrsec-appro-yes').prop('checked' , true);
                        }else{
                            $('#ip-sal-mgrsec-appro-no').prop('checked' , true);
                        }

                        let condateMgr = moment(mgrApproveData.wdf_mgr_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ip-sal-mgrsec-userpost').val(mgrApproveData.wdf_mgr_user).prop('readonly' , true);
                        $('#ip-sal-mgrsec-deptpost').val(mgrApproveData.wdf_mgr_dept).prop('readonly' , true);
                        $('#ip-sal-mgrsec-datepost').val(condateMgr).prop('readonly' , true);
                        $('#ip-sal-mgrsec-memo').val(mgrApproveData.wdf_mgr_memo).prop('readonly' , true);
                        $('#btn-sal-saveManager').css('display' , 'none');
                    }
                });
            }
        }




        function getSectionGroup_4_to_0_sal(approveGroup , userApproved , formcode , areaid , wdfstatus)
        {
            let payGroupHtml = ``;
            let titleHtml = ``;

            if(approveGroup == 0){
               
            }else if(approveGroup == 1){

            }else if(approveGroup == 2){

            }else if(approveGroup == 3){

            }else if(approveGroup == 4){

            }

            for(let i = 0; i<userApproved.length;i++){
                
                    payGroupHtml +=`
                    <div class="card-box pd-20 height-100-p mb-30">
                    <form id="frm_sal_save_paygroup-`+userApproved[i].apv_ecode+`" autocomplete="off" class="needs-validation" novalidate>
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <h4>`+userApproved[i].apv_posiname+`</h4>
                        </div>
                    </div>

                    <div class="salHr mt-3"></div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                        <div class="row">
                                            <div class="col-lg-12 form-inline">
                                                <div class="custom-control custom-radio mb-5 ml-3">
                                                    <input type="radio" id="ip-sal-payGroupsec-appro-yes-`+userApproved[i].apv_ecode+`" name="ip-sal-payGroupsec-appro-`+userApproved[i].apv_ecode+`" value="อนุมัติ" class="custom-control-input payGroupsecAppr_sal" required> 
                                                    <label for="ip-sal-payGroupsec-appro-yes-`+userApproved[i].apv_ecode+`" class="custom-control-label">อนุมัติ</label>
                                                </div> 
                                                <div class="custom-control custom-radio mb-5 ml-3">
                                                    <input type="radio" id="ip-sal-payGroupsec-appro-no-`+userApproved[i].apv_ecode+`" name="ip-sal-payGroupsec-appro-`+userApproved[i].apv_ecode+`" value="ไม่อนุมัติ" class="custom-control-input payGroupsecAppr_sal" required> 
                                                    <label for="ip-sal-payGroupsec-appro-no-`+userApproved[i].apv_ecode+`" class="custom-control-label">ไม่อนุมัติ</label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for=""><b>หมายเหตุ</b></label>
                                    <textarea name="ip-sal-payGroupsec-memo-`+userApproved[i].apv_ecode+`" id="ip-sal-payGroupsec-memo-`+userApproved[i].apv_ecode+`" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for=""><b>ผู้อนุมัติ</b></label>
                                    <input type="text" name="ip-sal-payGroupsec-userpost-`+userApproved[i].apv_ecode+`" id="ip-sal-payGroupsec-userpost-`+userApproved[i].apv_ecode+`" class="form-control" value="`+userApproved[i].apv_user+`" readonly>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for=""><b>ลงวันที่</b></label>
                                    <input type="text" name="ip-sal-payGroupsec-datepost-`+userApproved[i].apv_ecode+`" id="ip-sal-payGroupsec-datepost-`+userApproved[i].apv_ecode+`" class="form-control" value="<?php echo date("d/m/Y H:i:s") ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="btn_sal_sectionPayGroup_`+userApproved[i].apv_ecode+`" class="row align-items-center sectionPayGroupClass_sal" style="display:none;">
                        <div class="col-md-12 text-center">
                            <button type="button" id="btn-sal-savePaygroup-`+userApproved[i].apv_ecode+`" name="btn-sal-savePaygroup-`+userApproved[i].apv_ecode+`" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
                        </div>
                    </div>

                    <input hidden type="text" id="ip-sal-payGroupsec-autoid-`+userApproved[i].apv_ecode+`" name="ip-sal-payGroupsec-autoid-`+userApproved[i].apv_ecode+`" value="`+userApproved[i].apv_autoid+`">
                    <input hidden type="text" id="ip-sal-payGroupsec-formcode-`+userApproved[i].apv_ecode+`" name="ip-sal-payGroupsec-formcode-`+userApproved[i].apv_ecode+`" value="`+formcode+`">
                    <input hidden type="text" id="ip-sal-payGroupsec-areaid-`+userApproved[i].apv_ecode+`" name="ip-sal-payGroupsec-areaid-`+userApproved[i].apv_ecode+`" value="`+areaid+`">
                    <input hidden type="text" id="ip-sal-payGroupsec-totalApp-`+userApproved[i].apv_ecode+`" name="ip-sal-payGroupsec-totalApp-`+userApproved[i].apv_ecode+`" value="`+userApproved.length+`">
                    <input hidden type="text" id="ip-sal-payGroupsec-group-`+userApproved[i].apv_ecode+`" name="ip-sal-payGroupsec-group-`+userApproved[i].apv_ecode+`" value="`+userApproved[i].apv_group+`">
                    </form>
                    </div>
                    `;

                    
                }
            $('#payGroup_section_sal').css('display' , '').html(payGroupHtml);
            let ecodeLogin = "<?php echo getUser()->ecode; ?>";
            $('#btn_sal_sectionPayGroup_'+ecodeLogin).css('display' , '');


            for(let ii = 0; ii<userApproved.length;ii++){
                if(userApproved[ii].apv_approve != null){
                    let radioname = "ip-sal-payGroupsec-appro-"+userApproved[ii].apv_ecode;
                    let condateApproved = moment(userApproved[ii].apv_approve_datetime).format('DD/MM/Y HH:mm:ss');

                    if(userApproved[ii].apv_approve == "อนุมัติ"){
                        $('#ip-sal-payGroupsec-appro-yes-'+userApproved[ii].apv_ecode).prop('checked' , true);
                    }else if(userApproved[ii].apv_approve == "ไม่อนุมัติ"){
                        $('#ip-sal-payGroupsec-appro-no-'+userApproved[ii].apv_ecode).prop('checked' , true);
                    }

                    $("input:radio[name="+radioname+"]").on('click' , function(e){
                        e.preventDefault();
                    });

                    $('#ip-sal-payGroupsec-memo-'+userApproved[ii].apv_ecode).val(userApproved[ii].apv_approve_memo).prop('readonly' , true);
                    $('#ip-sal-payGroupsec-userpost-'+userApproved[ii].apv_ecode).val(userApproved[ii].apv_approve_user);
                    $('#ip-sal-payGroupsec-datepost-'+userApproved[ii].apv_ecode).val(condateApproved);
                    $('#btn-sal-savePaygroup-'+userApproved[ii].apv_ecode).css('display','none');
                }
            }

            // Control when executive not approve
            if(wdfstatus == "Executive Group "+approveGroup+" Not Approve"){
                $('.sectionPayGroupClass_sal').css('display' , 'none');
                $('.payGroupsecAppr_sal').attr('onclick' , 'return false');
            }
            
        }


        $(document).on('click' , '#btn-sal-savePaygroup-'+userecode , function(){
                let radioname = "ip-sal-payGroupsec-appro-"+userecode;
            
                if($('input:radio[name='+radioname+']:checked').length == 0){
                    swal({
                        title: 'กรุณาตรวจสอบข้อมูลให้ถูกต้อง',
                        type: 'error',
                        showConfirmButton: false,
                        timer:1000
                    });
                }else{
                    if($('input:radio[name='+radioname+']:checked').val() == "ไม่อนุมัติ"){
                        if($('#ip-sal-payGroupsec-memo-'+userecode).val() == ""){
                            swal({
                                title: 'กรุณาระบุเหตุผล',
                                type: 'error',
                                showConfirmButton: false,
                                timer:1000
                            });
                        }else{
                            savePayGroup_sal(userecode);
                        }

                    }else if($('input:radio[name='+radioname+']:checked').val() == "อนุมัติ"){
                        savePayGroup_sal(userecode);
                    }

                }
        });

        function savePayGroup_sal(ecode)
        {
            $('#btn-sal-savePaygroup-'+ecode).prop('disabled' , true);

            const form = $('#frm_sal_save_paygroup-'+ecode)[0];
            const data = new FormData(form);
            axios.post(url+'main/salary/savePayGroup_sal' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:1000
                    }).then(function(){
                        location.href = url+'salary.html';
                    });
                }else{
                    swal({
                        title: 'พบความผิดปกติของโปรแกรม กรุณาติดต่อไอที',
                        type: 'error',
                        showConfirmButton: false,
                        timer:1000
                    });
                }
            });
        }


        function getdata_apApprove_sal(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/salary/getdata_apApprove_sal' , {
                    action:"getdata_apApprove_sal",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let apData = res.data.apData;

                        if(apData.wdf_ap_appr != null){
                            let condateAp = moment(apData.wdf_ap_datetime).format('DD/MM/Y HH:mm:ss');

                            if(apData.wdf_ap_appr == "ผ่าน"){
                                $('#ip-sal-apsec-appro-yes').prop('checked' , true);
                            }else if(apData.wdf_ap_appr == "ไม่ผ่าน"){
                                $('#ip-sal-apsec-appro-no').prop('checked' , true);
                            }

                            if(apData.wdf_ap_moneymethod == "เงินสด/โอน"){
                                $('#ip-sal-apsec-money-1').prop('checked' , true);
                            }else if(apData.wdf_ap_moneymethod == "เช็ค"){
                                $('#ip-sal-apsec-money-2').prop('checked' , true);
                            }

                            $('input:radio[name=ip-sal-apsec-money]').on('click' , function(e){e.preventDefault();
                            });

                            $('input:radio[name="ip-sal-apsec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-sal-apsec-user').val(apData.wdf_ap_user).prop('readonly' , true);
                            $('#ip-sal-apsec-dept').val(apData.wdf_ap_dept).prop('readonly' , true);
                            $('#ip-sal-apsec-date').val(condateAp).prop('readonly' , true);
                            $('#ip-sal-apsec-memo').val(apData.wdf_ap_memo).prop('readonly' , true);
                            $('#btn-sal-saveap-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-sal-apsec-user').val(user).prop('readonly' , true);
                            $('#ip-sal-apsec-dept').val(dept).prop('readonly' , true);
                            $('#ip-sal-apsec-date').val(datetime).prop('readonly' , true);

                            $('#check-apsec-formcode-sal').val(formcode);
                            $('#check-apsec-areaid-sal').val(areaid);
                        }

                    }
                });
            }
        }


        function getdata_accApprove_sal(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/salary/getdata_accApprove_sal' , {
                    action:"getdata_accApprove_sal",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let accData = res.data.accData;

                        if(accData.wdf_acc_appr != null){
                            let condateAcc = moment(accData.wdf_acc_datetime).format('DD/MM/Y HH:mm:ss');

                            if(accData.wdf_acc_appr == "ผ่าน"){
                                $('#ip-sal-accSec-appro-yes').prop('checked' , true);
                            }else if(accData.wdf_acc_appr == "ไม่ผ่าน"){
                                $('#ip-sal-accSec-appro-no').prop('checked' , true);
                            }

                            $('input:radio[name="ip-sal-accSec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-sal-accSec-user').val(accData.wdf_acc_user).prop('readonly' , true);
                            $('#ip-sal-accSec-dept').val(accData.wdf_acc_dept).prop('readonly' , true);
                            $('#ip-sal-accSec-date').val(condateAcc).prop('readonly' , true);
                            $('#ip-sal-accSec-memo').val(accData.wdf_acc_memo).prop('readonly' , true);
                            $('#btn-sal-saveacc-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-sal-accSec-user').val(user).prop('readonly' , true);
                            $('#ip-sal-accSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-sal-accSec-date').val(datetime).prop('readonly' , true);

                            $('#check-accsec-formcode-sal').val(formcode);
                            $('#check-accsec-areaid-sal').val(areaid);
                        }

                    }
                });
            }
        }


        function getdata_financeApprove_sal(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/salary/getdata_financeApprove_sal' , {
                    action:"getdata_financeApprove_sal",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let financeData = res.data.financeData;

                        if(financeData.wdf_fn_appr != null){
                            let condateAcc = moment(financeData.wdf_fn_datetime).format('DD/MM/Y HH:mm:ss');

                            if(financeData.wdf_fn_appr == "ผ่าน"){
                                $('#ip-sal-fnSec-appro-yes').prop('checked' , true);
                            }else if(financeData.wdf_fn_appr == "ไม่ผ่าน"){
                                $('#ip-sal-fnSec-appro-no').prop('checked' , true);
                            }

                            $('input:radio[name="ip-sal-fnSec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-sal-fnSec-user').val(financeData.wdf_fn_user).prop('readonly' , true);
                            $('#ip-sal-fnSec-dept').val(financeData.wdf_fn_dept).prop('readonly' , true);
                            $('#ip-sal-fnSec-date').val(condateAcc).prop('readonly' , true);
                            $('#ip-sal-fnSec-memo').val(financeData.wdf_fn_memo).prop('readonly' , true);
                            $('#btn-sal-savefn-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-sal-fnSec-user').val(user).prop('readonly' , true);
                            $('#ip-sal-fnSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-sal-fnSec-date').val(datetime).prop('readonly' , true);

                            $('#check-fnsec-formcode-sal').val(formcode);
                            $('#check-fnsec-areaid-sal').val(areaid);
                        }
                        

                    }
                });
            }
        }


        function getdata_userReceive_sal(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/salary/getdata_userReceive_sal' , {
                    action:"getdata_userReceive_sal",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let userreceiveData = res.data.userreceiveData;

                        if(userreceiveData.wdf_ur_signature != null){
                            let condateUserreceive = moment(userreceiveData.wdf_ur_datetime).format('DD/MM/Y HH:mm:ss');


                            $('#ip-sal-userReceiveSec-user').val(userreceiveData.wdf_ur_user).prop('readonly' , true);
                            $('#ip-sal-userReceiveSec-dept').val(userreceiveData.wdf_ur_dept).prop('readonly' , true);
                            $('#ip-sal-userReceiveSec-date').val(condateUserreceive).prop('readonly' , true);
                            $('#ip-sal-userReceiveSec-memo').val(userreceiveData.wdf_ur_memo).prop('readonly' , true);
                            $('#btn-sal-saveUserreceive-section').css('display' , 'none');
                            $('#smoothed-sal').css('display','none');

                            $('#show_signature_sal').css('display' , '');
                            $('#show_sign_sal').attr('src' , userreceiveData.wdf_ur_signature);

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-sal-userReceiveSec-user').val(user).prop('readonly' , true);
                            $('#ip-sal-userReceiveSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-sal-userReceiveSec-date').val(datetime).prop('readonly' , true);

                            $('#check-userreceivesec-formcode-sal').val(formcode);
                            $('#check-userreceivesec-areaid-sal').val(areaid);
                        }
                        

                    }
                });
            }
        }




        function getConditionTextByGroup_sal(appGroup , areaid)
        {
            let html =``;
            if(appGroup != "" && areaid != ""){
                if(areaid == "tb"){
                    if(appGroup == 0){
                        html = 'คณะกรรมการบริหาร ต้องประกอบด้วย กรรมการชุดที่ 1 จำนวน 2 ท่าน + กรรมการชุดที่ 2 จำนวน 3 ท่าน';
                    }else if(appGroup == 1){
                        html = 'กลุ่ม 1 ต้องประกอบด้วย ประธานบริหาร หรือ กรรมการผู้จัดการ หรือ กรรมการบริหารชุดที่ 1 จำนวน 2 ท่าน + กรรมการบริหารชุดที่ 2 จำนวน 1 ท่าน';
                    }else if(appGroup == 2){
                        html = 'กลุ่ม 2 ต้องประกอบด้วย กรรมการบริหารชุดที่ 1 จำนวน 1 ท่าน + กรรมการบริหารชุดที่ 2 จำนวน 1 ท่าน';
                    }else if(appGroup == 3){
                        html = 'กลุ่ม 3 ต้องประกอบด้วย กรรมการบริหารชุดที่ 1 จำนวน 1 ท่าน หรือ กรรมการบริหารชุดที่ 2 จำนวน 1 ท่าน';
                    }else if(appGroup == 4){
                        html = 'กลุ่ม 4 ต้องประกอบด้วย ผู้จัดการชุดที่ 1 จำนวน 1 ท่าน + ผู้จัดการชุดที่ 2 จำนวน 1 ท่าน';
                    }
                }else{
                    if(appGroup == 0){
                        html = 'ต้องประกอบด้วย คณะกรรมการบริหาร 5 ท่าน';
                    }else if(appGroup == 1){
                        html = 'กลุ่ม 1 ต้องประกอบด้วย ประธานบริหาร หรือ กรรมการผู้จัดการ หรือ รองกรรมการผู้จัดการ 3 ท่าน';
                    }else if(appGroup == 2){
                        html = 'กลุ่ม 2 ต้องประกอบด้วย รองกรรมการผู้จัดการ 2 ท่าน';
                    }else if(appGroup == 3){
                        html = 'กลุ่ม 3 ต้องประกอบด้วย รองกรรมการผู้จัดการ 1 ท่าน';
                    }else if(appGroup == 4){
                        html = 'กลุ่ม 4 ต้องประกอบด้วย ผู้จัดการ 2 ท่าน';
                    }
                }
            }

            return html;
        }


        function process_step_salary(status , appgroup)
        {
            if(status != "" || status != null){
                if(status == "Open" || status == "Edit"){
                    $('.sal-proc-open').addClass('active');

                }else if(status == "User cancel"){
                    $('.sal-proc-open').addClass('notactive');

                }else if(status == "Check budget already"){
                    $('.sal-proc-open').addClass('active');
                    $('.sal-proc-budget').addClass('active');

                }else if(status == "Manager approved" ||
                    status == "Wait Executive Group "+appgroup+" Approve"
                ){
                    $('.sal-proc-open').addClass('active');
                    $('.sal-proc-budget').addClass('active');
                    $('.sal-proc-mgr').addClass('active');

                }else if(status == "Manager not approve"){
                    $('.sal-proc-open').addClass('active');
                    $('.sal-proc-budget').addClass('active');
                    $('.sal-proc-mgr').addClass('notactive');

                }else if(status == "Executive Group "+appgroup+" Approved"){
                    $('.sal-proc-open').addClass('active');
                    $('.sal-proc-budget').addClass('active');
                    $('.sal-proc-mgr').addClass('active');

                    //เมื่อต้องมี Executive อนุมัติ
                    $('.sal-proc-excutive').css('display' , '').addClass('active');
                }else if(status == "Executive Group "+appgroup+" Not Approve"){
                    $('.sal-proc-open').addClass('active');
                    $('.sal-proc-budget').addClass('active');
                    $('.sal-proc-mgr').addClass('active');

                    //เมื่อต้องมี Executive อนุมัติ
                    $('.sal-proc-excutive').css('display' , '').addClass('notactive');
                }else if(status == "AP passed inspection"){
                    $('.sal-proc-open').addClass('active');
                    $('.sal-proc-budget').addClass('active');
                    $('.sal-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.sal-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.sal-proc-ap').addClass('active');
                }else if(status == "AP not pass inspection"){
                    $('.sal-proc-open').addClass('active');
                    $('.sal-proc-budget').addClass('active');
                    $('.sal-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.sal-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.sal-proc-ap').addClass('notactive');

                }else if(status == "Account passed inspection"){
                    $('.sal-proc-open').addClass('active');
                    $('.sal-proc-budget').addClass('active');
                    $('.sal-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.sal-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.sal-proc-ap').addClass('active');
                    $('.sal-proc-acc').addClass('active');

                }else if(status == "Account not pass inspection"){
                    $('.sal-proc-open').addClass('active');
                    $('.sal-proc-budget').addClass('active');
                    $('.sal-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.sal-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.sal-proc-ap').addClass('active');
                    $('.sal-proc-acc').addClass('notactive');

                }else if(status == "Wait user receive money"){
                    $('.sal-proc-open').addClass('active');
                    $('.sal-proc-budget').addClass('active');
                    $('.sal-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.sal-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.sal-proc-ap').addClass('active');
                    $('.sal-proc-acc').addClass('active');
                    $('.sal-proc-finance').addClass('active');

                }else if(status == "Finance not pass inspection"){
                    $('.sal-proc-open').addClass('active');
                    $('.sal-proc-budget').addClass('active');
                    $('.sal-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.sal-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.sal-proc-ap').addClass('active');
                    $('.sal-proc-acc').addClass('active');
                    $('.sal-proc-finance').addClass('notactive');

                }else if(status == "Complete"){
                    $('.sal-proc-open').addClass('active');
                    $('.sal-proc-budget').addClass('active');
                    $('.sal-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.sal-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.sal-proc-ap').addClass('active');
                    $('.sal-proc-acc').addClass('active');
                    $('.sal-proc-finance').addClass('active');
                    $('.sal-proc-userreceive').addClass('active');

                }
            }
        }


        function getSalCurrencyFromDb(currency)
        {
            if(currency === null){
                currency = "THB";
            }
            axios.get(url+'main/salary/getSalCurrencyFromDb').then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let result = res.data.result;
                    let output = ``;
                    for(let i = 0; i < result.length ; i++){
                        output +=`
                        <option value="`+result[i].cu_name+`">`+result[i].cu_name+`</option>
                        `;
                    }
                    $('#ipv-sal-currency').html(output);
                    $('#ipv-sal-currency').attr("style", "pointer-events: none;");
                    $('#ipv-sal-currency option[value="'+currency+'"]').prop("selected" , true);

                    if(currency !== ""){
                        $('.bgBath').text(currency);
                        $('.bgBath2').text(currency);
                    }

                  
                }
            });
        }
        





        



        



    });
</script>