<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแสดงข้อมูลฉบับเต็ม ใบเบิกเงินสำรองจ่าย</title>


</head>
<body>
    <div class="main-container">
        <div class="pd-ltr-20">

            <div id="btnControlBar" class="card-box pd-20 height-100-p mb-30" style="display:none;">
                <button type="button" id="btn-editadvance" name="btn-editadvance" class="btn btn-warning"><i class="dw dw-edit-file mr-2"></i>แก้ไข</button>
                <button type="button" id="btn-canceladvance" name="btn-canceladvance" class="btn btn-danger"><i class="dw dw-file-21 mr-2"></i>ยกเลิกเอกสาร</button>
            </div>

            <div class="card-box pd-20 height-100-p mb-30">

                <div id="exportform-section-adv" class="mb-2" style="display:none;">
                    <a href="<?=base_url('main/advance/advance_printform/').$formcode."/".$formno?>" target="_blank"><button type="button" id="printForm-adv" name="printForm-adv" class="btn btn-secondary">ปริ้นฟอร์ม</button></a>
                </div>

                <div class="row align-items-center">
					<div class="col-md-12 text-center">
						<h4>ใบเบิกเงินทดรองจ่าย ( Advance )</h4>
                        <h6 class="mt-2">เอกสารเลขที่ <span id="showFormno_adv"></span></h6>
                        <h6 class="mt-2">สถานะ <span id="showFormStatus_adv"></span></h6>
					</div>
				</div>
				<hr class="advHr">

                <div id="process_step_section">
                    <?=$this->load->view("advance/advance_process_step")?>
                </div>

                <hr class="advHr">

                <div class="card-box pd-20 height-100-p mb-30">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>บริษัท</b></label>
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-adv-areaid-sc" name="ipv-adv-areaid" value="sc" class="custom-control-input"> 
                                        <label for="ipv-adv-areaid-sc" class="custom-control-label">Salee Colour Public Company Limited.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-adv-areaid-pa" name="ipv-adv-areaid" value="pa" class="custom-control-input"> 
                                        <label for="ipv-adv-areaid-pa" class="custom-control-label">Poly Meritasia Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-adv-areaid-ca" name="ipv-adv-areaid" value="ca" class="custom-control-input"> 
                                        <label for="ipv-adv-areaid-ca"class="custom-control-label">Composite Asia Co.,Ltd.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-adv-areaid-st" name="ipv-adv-areaid" value="st" class="custom-control-input"> <label for="ipv-adv-areaid-st" class="custom-control-label">Subterra Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-adv-areaid-tb" name="ipv-adv-areaid" value="tb" class="custom-control-input"> 
                                        <label for="ipv-adv-areaid-tb"class="custom-control-label">The bubbles Co.,Ltd.</label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>หมายเหตุ</b></label>
                            <input type="text" name="ipv-adv-memo" id="ipv-adv-memo" class="form-control" readonly>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for=""><b>ชื่อผู้ร้องขอ</b></label>
                            <input type="text" name="ipv-adv-username" id="ipv-adv-username" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>รหัสพนักงาน</b></label>
                            <input type="text" name="ipv-adv-ecode" id="ipv-adv-ecode" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>แผนก</b></label>
                            <input type="text" name="ipv-adv-dept" id="ipv-adv-dept" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>วันที่ออกเอกสาร</b></label>
                            <input type="text" name="ipv-adv-date" id="ipv-adv-date" class="form-control" readonly>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for=""><b>ชื่อผู้รับเงิน</b></label>
                            <input type="text" name="ipv-adv-userreceive" id="ipv-adv-userreceive" class="form-control" readonly>
                        </div>
                        <div class="col-md-8">
                            <label for=""><b>รายละเอียดผู้รับเงิน</b></label>
                            <input type="text" name="ipv-adv-userreceiveDetail" id="ipv-adv-userreceiveDetail" class="form-control" readonly>
                        </div>
                    </div>
                    <hr>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for=""><b>สกุลเงิน</b></label>
                            <select name="ipv-adv-currency" id="ipv-adv-currency" class="form-control" readonly></select>
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
                                        <table id="tbl_advance_new_view" class="table table-bordered table-striped">
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
                                            <tbody id="showDataAdvlistAftersave_view"></tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-advdetail-priceNonVat" id="ipv-advdetail-priceNonVat" class="form-control" placeholder="ยอดรวม" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ipv-advdetail-vat7" id="ipv-advdetail-vat7" class="form-control" readonly>
                                        <option value="0">ไม่มี Vat</option>
                                        <option value="7">Vat 7%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-advdetail-vat7Price" id="ipv-advdetail-vat7Price" class="form-control" placeholder="จำนวนเงิน Vat" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ipv-advdetail-vat3" id="ipv-advdetail-vat3" class="form-control" readonly>
                                        <option value="0">ไม่มี หัก ณ ที่จ่าย</option>
                                        <option value="1">หัก ณ ที่จ่าย 1%</option>
                                        <option value="2">หัก ณ ที่จ่าย 2%</option>
                                        <option value="3">หัก ณ ที่จ่าย 3%</option>
                                        <option value="5">หัก ณ ที่จ่าย 5%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-advdetail-vat3Price" id="ipv-advdetail-vat3Price" class="form-control" placeholder="จำนวนเงินหัก ณ ที่จ่าย" readonly>
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
                                        <input type="text" name="ipv-advdetail-priceTotal" id="ipv-advdetail-priceTotal" class="form-control" placeholder="ยอดรวมสุทธิ" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12 bottommargin">
                                    <label><b>รูปภาพ , เอกสารที่เกี่ยวข้อง</b></label><br>
                                    <div id="advance_showImage_view" class="row form-group"></div>
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

                <div id="checkbudget_section" style="display:none;">
                    <?=$this->load->view("advance/advance_checkbudget")?>
                </div>
                
                <div id="manager_section" style="display:none;">
                    <?=$this->load->view("advance/advance_manager")?>
                </div>

                <div id="payGroup_section" style="display:none;"></div>

                <div id="ap_section" style="display:none;">
                    <?=$this->load->view("advance/advance_ap")?>
                </div>

                <div id="account_section" style="display:none;">
                    <?=$this->load->view("advance/advance_account")?>
                </div>

                <div id="finance_section" style="display:none;">
                    <?=$this->load->view("advance/advance_finance")?>
                </div>

                <div id="userreceive_section" style="display:none;">
                    <?=$this->load->view("advance/advance_userreceive")?>
                </div>

                <div id="userclearmoney_section" style="display:none;">
                    <?=$this->load->view("advance/advance_user_clearmoney")?>
                </div>

                <div id="financeclearmoney_section" style="display:none;">
                    <?=$this->load->view("advance/advance_finance_clearmoney")?>
                </div>

                <div id="managerclearmoney_section" style="display:none;">
                    <?=$this->load->view("advance/advance_manager_clearmoney")?>
                </div> 

                <div id="payGroupClear_section" style="display:none;"></div>

                <div id="apclearmoney_section" style="display:none;">
                    <?=$this->load->view("advance/advance_ap_clearmoney")?>
                </div>

                <div id="accclearmoney_section" style="display:none;">
                    <?=$this->load->view("advance/advance_account_clearmoney")?>
                </div>

                <div id="finance2clearmoney_section" style="display:none;">
                    <?=$this->load->view("advance/advance_finance2_clearmoney")?>
                </div>

                <div id="userreceiveclear_section" style="display:none;">
                    <?=$this->load->view("advance/advance_userreceive_clearmoney")?>
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
        getUserPermission(userecode);


        // Control print button
        if(userdeptcode == 1003 || userecode == "M1809"){
            $('#exportform-section-adv').css('display' , '');
        }else{
            $('#exportform-section-adv').css('display' , 'none');
        }


        function getUserPermission(ecode)
        {
            if(ecode != ""){
                axios.post(url+'main/advance/getUserPermission' , {
                    action:"getUserPermission",
                    ecode:ecode
                }).then(res=>{
                    // console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        if(res.data.result != null){
                            userpermission = res.data.result;
                            console.log(userpermission);
                        }
                        advance_getDataviewfull();
                    }
                });
            }
        }

        function advance_getDataviewfull()
        {
            if(formcode != ""){
                axios.post(url+'main/advance/advance_getDataviewfull' , {
                    action:'advance_getDataviewfull',
                    formcode:formcode,
                    formno:formno
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){

                        if(res.data.viewfulldata.wdf_status == "Open" || res.data.viewfulldata.wdf_status == "Edit"){
                            if(res.data.viewfulldata.wdf_ecode == userecode){
                                $('#btnControlBar').css('display' , '');
                            }
                            
                        }else if(res.data.viewfulldata.wdf_status == "User cancel"){
                            $('#btnControlBar').css('display' , 'none');
                        }else{
                            $('#btnControlBar').css('display' , 'none');
                        }

                        $('input:radio[name="ipv-adv-areaid"]').on('click' , function(e){
                            e.preventDefault();
                        });

                        // get status to text
                        let resultTextColor = checkStatus_text(res.data.viewfulldata.wdf_status);
                        let status = `<span `+resultTextColor+`>`+res.data.viewfulldata.wdf_status+`</span>`;
                        $('#showFormStatus_adv').html(status);

                        $('#showFormno_adv').html(res.data.viewfulldata.wdf_formno);
                        $('#btn-editadvance').attr({
                            'data_formcode':formcode,
                            'data_formno':formno,
                        });
                        $('#btn-canceladvance').attr('data_formcode' , formcode);

                        if(res.data.viewfulldata.wdf_areaid == "sc"){
                            $('#ipv-adv-areaid-sc').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "pa"){
                            $('#ipv-adv-areaid-pa').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "ca"){
                            $('#ipv-adv-areaid-ca').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "st"){
                            $('#ipv-adv-areaid-st').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "tb"){
                            $('#ipv-adv-areaid-tb').prop('checked' , true);
                        }

                        let condate = moment(res.data.viewfulldata.wdf_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ipv-adv-memo').val(res.data.viewfulldata.wdf_memo);
                        $('#ipv-adv-username').val(res.data.viewfulldata.wdf_user);
                        $('#ipv-adv-ecode').val(res.data.viewfulldata.wdf_ecode);
                        $('#ipv-adv-dept').val(res.data.viewfulldata.wdf_dept);
                        $('#ipv-adv-date').val(condate);
                        $('#ipv-adv-userreceive').val(res.data.viewfulldata.wdf_userreceive);
                        $('#ipv-adv-userreceiveDetail').val(res.data.viewfulldata.wdf_userreceived_detail);

                        // if(res.data.viewfulldata.wdf_vat1 == 7){
                        //     $('#ipv-advdetail-vat7 option[value="7"]').prop("selected" , true);
                        // }else{
                        //     $('#ipv-advdetail-vat7 option[value="0"]').prop("selected" , true);
                        // }
                        
                        let convat1ToInt = parseInt(res.data.viewfulldata.wdf_vat1);
                        $('#ipv-advdetail-vat7 option[value="'+convat1ToInt+'"]').prop("selected" , true);

                        let convat2ToInt = parseInt(res.data.viewfulldata.wdf_vat2);
                        $('#ipv-advdetail-vat3 option[value="'+convat2ToInt+'"]').prop("selected" , true);

                        $('#ipv-advdetail-priceNonVat').val(res.data.viewfulldata.wdf_pricenonevat);
                        $('#ipv-advdetail-vat7Price').val(res.data.viewfulldata.wdf_pricevat1);
                        $('#ipv-advdetail-vat3Price').val(res.data.viewfulldata.wdf_pricevat2);
                        $('#ipv-advdetail-priceTotal').val(res.data.viewfulldata.wdf_pricewithvat);

                        conpriceWithComma('#ipv-advdetail-priceNonVat');
                        conpriceWithComma('#ipv-advdetail-vat7Price');
                        conpriceWithComma('#ipv-advdetail-vat3Price');
                        conpriceWithComma('#ipv-advdetail-priceTotal');

                        $('#ipv-advdetail-vat7').attr("style", "pointer-events: none;");
                        $('#ipv-advdetail-vat3').attr("style", "pointer-events: none;");

                        let currency = res.data.viewfulldata.wdf_currency;
                        getAdvCurrencyFromDb(currency);

                        // WDF Trans Detail
                        let wdf_trans = res.data.viewfulldata_trans;
                        let wdf_trans_html = ``;
                        let runningnumber = 1;
                        $('#tbl_advance_new_view').DataTable().destroy();
                        $('#tbl_advance_new_view').DataTable();
                        
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
                        $('#showDataAdvlistAftersave_view').html(wdf_trans_html);

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
                        $('#advance_showImage_view').html(imageHtml);

                        checkstatus_controlsection(res.data.viewfulldata.wdf_status , formcode , res.data.viewfulldata.wdf_areaid ,res.data.viewfulldata.wdf_pricewithvat , res.data.viewfulldata.wdf_appgroup , res.data.viewfulldata.wdf_fnc_method , res.data.viewfulldata.wdf_fnc_money , res.data.viewfulldata.wdf_deptcode , res.data.viewfulldata.wdf_ecode , res.data.viewfulldata.wdf_appgroup_clear);
                         
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

        $(document).on('click' , '#btn-editadvance' , function(){
            const data_formcode = $(this).attr("data_formcode");
            const data_formno = $(this).attr("data_formno");
            location.href = url+'main/advance/advance_edit_page/'+data_formcode+'/'+data_formno;
        });

        $(document).on('click' , '#btn-canceladvance' , function(){
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
                        cancel_adv(data_formcode);
                    }
                });
            }
        });

        function cancel_adv(data_formcode)
        {
            if(data_formcode != ""){
                axios.post(url+'main/advance/cancel_adv' , {
                    action:'cancel_adv',
                    data_formcode:data_formcode
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Update Data Success"){
                        location.href = url+'advance.html';
                    }
                });
            }
        }

        function checkstatus_controlsection(status , formcode , areaid , pricewithVat , appgroup , fnc_method , fnc_money , doc_deptcode , doc_ecode , appgroup_clear)
        {
            switch(status){
                case "Open":

                    // Section check budget open
                    $('#checkbudget_section').css('display' , '');
                    // control input

                    if(userpermission.u_budget_section == "yes"){
                        $('#ip-bgsec-user').val("<?php echo getUser()->Fname." ".getUser()->Lname; ?>").prop('readonly' , true);
                        $('#ip-bgsec-dept').val("<?php echo getUser()->Dept; ?>").prop('readonly' , true);
                        $('#ip-bgsec-datetime').val("<?php echo date("d/m/Y H:i:s"); ?>").prop('readonly' , true);
                        $('#check_formcode_bg').val(formcode);
                        $('#check_areaid_bg').val(areaid);
                        $(document).on('keyup' , '#ip-bgsec-creditlimit' ,function(){
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
                        $('#ip-bgsec-user , #ip-bgsec-dept , #ip-bgsec-datetime , #ip-bgsec-creditlimit , #ip-bgsec-memo').prop('readonly' , true);
                        $('#btn-savecheckbudget').css('display' , 'none');
                    }

                    // Section check budget

                    break;
                case "Edit":

                    // Section check budget open
                    $('#checkbudget_section').css('display' , '');
                    // control input

                    if(userpermission.u_budget_section == "yes"){
                        $('#ip-bgsec-user').val("<?php echo getUser()->Fname." ".getUser()->Lname; ?>").prop('readonly' , true);
                        $('#ip-bgsec-dept').val("<?php echo getUser()->Dept; ?>").prop('readonly' , true);
                        $('#ip-bgsec-datetime').val("<?php echo date("d/m/Y H:i:s"); ?>").prop('readonly' , true);
                        $('#check_formcode_bg').val(formcode);
                        $('#check_areaid_bg').val(areaid);
                        $(document).on('keyup' , '#ip-bgsec-creditlimit' ,function(){
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
                        $('#ip-bgsec-user , #ip-bgsec-dept , #ip-bgsec-datetime , #ip-bgsec-creditlimit , #ip-bgsec-memo').prop('readonly' , true);
                        $('#btn-savecheckbudget').css('display' , 'none');
                    }

                    // Section check budget

                    break;
                case "Check budget already":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget


                    // Check Manager Section
                    // if(doc_deptcode == userdeptcode && userposi > 55){
                    //     $('#manager_section').css('display' , '');
                    //     checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    // }else if(areaid == "tb" && userecode == "M0051" || areaid == "tb" && userecode == "M2076" || areaid == "tb" && userecode == "M0963" || areaid == "tb" && userecode == "M0025"){
                    //     //Section ของผู้จัดการ TB เปิดให้พี่นิตสามารถเข้าไปอนุมัติได้ 
                    //     $('#manager_section').css('display' , '');
                    //     checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    // }else if(doc_deptcode == '1007'){
                    //     //ปรับเงื่อนไขการอนุมัติให้พี่หนุ่มอนุมัติแค่ของ Production 17-03-2025
                    //     if(userecode == "M0040" || userecode == "M0506"){
                    //         $('#manager_section').css('display' , '');
                    //         checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    //     }
                    // }else if(doc_deptcode == '1010'){
                    //     //ปรับเงื่อนไขการอนุมัติให่พี่นิตอนุมัติ CS & PLANING 17-03-2025
                    //     if(userecode == "M0025"){
                    //         $('#manager_section').css('display' , '');
                    //         checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    //     }
                    // }else if(areaid == "st" && userecode == "M0025"){
                    //     //แก้ไขจากเดิม M2180 K teerasak เป็นคุณ saowanit อนุมัติแทน 23-12-2024
                    //     $('#manager_section').css('display' , '');
                    //     checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    // }else if(doc_deptcode == '1014' || doc_deptcode == '1015'){
                    //     if(userecode == "M0112"){
                    //         $('#manager_section').css('display' , '');
                    //         checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    //     }
                    // }
                    

                    if(areaid === "tb"){
                        // เงื่อนไขของ Thebubbles
                        const tbManagers = ["M0051", "M2076", "M0963", "M0025"];
                        if (tbManagers.includes(userecode)) {
                            $('#manager_section').css('display', '');
                            checkpaygroup(pricewithVat, 'adv', areaid, formcode);
                        }
                    }else if(areaid == "st"){
                        //เงื่อนไขของ Subterra
                        if(userecode === "M0025"){
                            //แก้ไขจากเดิม M2180 K teerasak เป็นคุณ saowanit อนุมัติแทน 23-12-2024
                            $('#manager_section').css('display' , '');
                            checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                        }
                    }else{
                        //เงื่อนไขของ Salee
                        if(doc_deptcode == '1014' || doc_deptcode == '1015'){
                            //แสดงผลของ Section กรณีที่เป็นเอกสารของแผนก Lab , QC
                            if(userecode == "M0112"){
                                //เช็กว่า User ที่ Login เข้ามานั้นใช่ตามเงื่อนไขหรือไม่
                                $('#manager_section').css('display' , '');
                                checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                            }
                        }else if(doc_deptcode == '1010'){
                            //ปรับเงื่อนไขการอนุมัติให่พี่นิตอนุมัติ CS & PLANING 17-03-2025
                            if(userecode == "M0025"){
                                $('#manager_section').css('display' , '');
                                checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                            }
                        }else if(doc_deptcode == '1011'){
                            //ปรับเงื่อนไขการอนุมัติให่พี่เหน่งอนุมัติ แทนพี่แอร์ 23-07-2025
                            if(userecode == "M0015"){
                                $('#manager_section').css('display' , '');
                                checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                            }
                        }else if(doc_deptcode == '1007'){
                            //ปรับเงื่อนไขการอนุมัติให้พี่หนุ่มอนุมัติแค่ของ Production 17-03-2025
                            if(userecode == "M0040" || userecode == "M0506"){
                                $('#manager_section').css('display' , '');
                                checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                            }
                        }else{
                            if(doc_deptcode == userdeptcode && userposi > 55){
                                $('#manager_section').css('display' , '');
                                checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                            }
                        }
                    }

                    break;
                case "Manager approved":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    if(appgroup == 5){
                        $('#ap_section').css('display' , '');

                        if(userpermission.u_ap_section == "yes"){
                            getdata_apApprove(formcode , areaid , appgroup);
                        }else{
                            $('#ip-apsec-user , #ip-apsec-dept , #ip-apsec-date , #ip-apsec-memo').prop('readonly' , true);
                            $('#btn-saveAP').css('display' , 'none');
                            $('input:radio[id="ip-apsec-money-1"]').prop('checked' , false);
                        }
                        
                    }
                    
                    
                    break;
                case "Wait Executive Group 0 Approve":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Wait Executive Group 1 Approve":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Check Pay Group for show Another Section
                    break;
                case "Wait Executive Group 2 Approve":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Check Pay Group for show Another Section
                    
                    break;
                case "Wait Executive Group 3 Approve":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    break;
                case "Wait Executive Group 4 Approve":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Executive Group 0 Approved":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section').css('display' , '');
                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove(formcode , areaid , appgroup);
                    }else{
                        $('#ip-apsec-user , #ip-apsec-dept , #ip-apsec-date , #ip-apsec-memo').prop('readonly' , true);
                        $('#btn-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-apsec-money-1"]').prop('checked' , false);
                    }

                    break;
                case "Executive Group 1 Approved":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve


                    // AP Section
                    $('#ap_section').css('display' , '');
                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove(formcode , areaid , appgroup);
                    }else{
                        $('#ip-apsec-user , #ip-apsec-dept , #ip-apsec-date , #ip-apsec-memo').prop('readonly' , true);
                        $('#btn-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-apsec-money-1"]').prop('checked' , false);
                    }
                    
                    break;
                case "Executive Group 2 Approved":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section').css('display' , '');
                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove(formcode , areaid , appgroup);
                    }else{
                        $('#ip-apsec-user , #ip-apsec-dept , #ip-apsec-date , #ip-apsec-memo').prop('readonly' , true);
                        $('#btn-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-apsec-money-1"]').prop('checked' , false);
                    }

                    break;
                case "Executive Group 3 Approved":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section').css('display' , '');
                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove(formcode , areaid , appgroup);
                    }else{
                        $('#ip-apsec-user , #ip-apsec-dept , #ip-apsec-date , #ip-apsec-memo').prop('readonly' , true);
                        $('#btn-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-apsec-money-1"]').prop('checked' , false);
                    }
                    
                    break;
                case "Executive Group 4 Approved":
                    
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section').css('display' , '');


                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove(formcode , areaid , appgroup);
                    }else{
                        $('#ip-apsec-user , #ip-apsec-dept , #ip-apsec-date , #ip-apsec-memo').prop('readonly' , true);
                        $('#btn-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-apsec-money-1"]').prop('checked' , false);
                    }

                    break;
                case "Executive Group 0 Not Approve":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    break;
                case "Executive Group 1 Not Approve":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Executive Group 2 Not Approve":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Executive Group 3 Not Approve":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Executive Group 4 Not Approve":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    break;
                case "Manager not approve":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    break;
                case "AP passed inspection":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    
                    if(userpermission.u_acc_section == "yes"){
                        getdata_accApprove(formcode , areaid , appgroup);
                    }else{
                        $('#ip-accSec-user , #ip-accSec-dept , #ip-accSec-date , #ip-accSec-memo').prop('readonly' , true);
                        $('#btn-saveAcc').css('display' , 'none');
                    }
                    
                    break;
                case "AP not pass inspection":
                    
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);
                    
                    break;
                    break;
                case "Account passed inspection":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');

                    if(userpermission.u_finance_section == "yes"){
                        getdata_financeApprove(formcode , areaid , appgroup);
                    }else{
                        $('#ip-fnSec-user , #ip-fnSec-dept , #ip-fnSec-date , #ip-fnSec-memo').prop('readonly' , true);
                        $('#btn-saveFn').css('display' , 'none');
                    }

                    break;
                case "Account not pass inspection":

                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    break;
                case "Wait user receive money":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');

                    if(userpermission.u_userreceive_section == "yes"){
                        getdata_userReceive(formcode , areaid , appgroup);
                    }else{
                        $('#ip-userReceiveSec-user , #ip-userReceiveSec-dept , #ip-userReceiveSec-date , #ip-userReceiveSec-memo').prop('readonly' , true);
                        $('#btn-saveUserreceive').css('display' , 'none');
                    }

                    break;
                case "Finance not pass inspection":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);
                    break;
                case "Complete & Wait User Clear Money":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    
                    if(doc_ecode == userecode){
                        getdata_userClearMoney(formcode , areaid , appgroup);
                    }else{
                        $('#ip-userClearSec-money , #ip-userClearSec-memo , #ip-userClearSec-user , #ip-userClearSec-dept , #ip-userClearSec-date').prop('readonly' , true);
                        $('#btn-saveUserclearmoney').css('display' , 'none');
                    }


                    break;
                case "User upload document already":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);
                    if(doc_ecode == userecode){
                        $('#btn-editUserclearmoney').css('display' , '');
                    }else{
                        $('#btn-editUserclearmoney').css('display' , 'none');
                    }

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');

                    if(userpermission.u_finance_clear_section == "yes"){
                        getdata_financeClearMoney(formcode , areaid , appgroup);
                    }else{
                        $('#ip-fnClearSec-money , #ip-fnClearSec-user , #ip-fnClearSec-dept , #ip-fnClearSec-date , #ip-fnClearSec-memo').prop('readonly' , true);
                        $('#btn-savefnClear').css('display','none');
                    }


                    break;
                case "Wait user correct document (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    if(doc_ecode == userecode){
                        getdata_userClearMoney(formcode , areaid);
                    }else{
                        $('#ip-userClearSec-money , #ip-userClearSec-memo , #ip-userClearSec-user , #ip-userClearSec-dept , #ip-userClearSec-date').prop('readonly' , true);
                        $('#btn-saveUserclearmoney').css('display' , 'none');
                    }
                    $('#btn-editUserclearmoney-section').css('display' , '');


                    break;
                case "Finance passed inspection (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');

                        if(userpermission.u_ap_clear_section == "yes"){
                            getdata_apClearMoney(formcode , areaid , fnc_method);
                        }else{

                        }

                    }else{
                        // Section Manager Clear Money

                        if(doc_deptcode == userdeptcode && userposi > 55){
                            $('#managerclearmoney_section').css('display' , '');
                            checkpaygroupClear(fnc_money , 'adv' , areaid , formcode , appgroup);
                        }else if(areaid == "tb" && userecode == "M0051" || areaid == "tb" && userecode == "M2076"){
                            $('#managerclearmoney_section').css('display' , '');
                            checkpaygroupClear(fnc_money , 'adv' , areaid , formcode , appgroup);
                        }else if(doc_deptcode == "1011"){
                            if(userecode == "M0015"){
                                $('#managerclearmoney_section').css('display' , '');
                                checkpaygroupClear(fnc_money , 'adv' , areaid , formcode , appgroup);
                            }
                        }

                        if(areaid == "tb"){
                            if(userecode == "M0051" || userecode == "M1809" || userecode == "M2076" || userecode == "M2222" || userecode == "M0963"){
                                $('#btn-saveManagerClear').css('display' , '');
                            }else{
                                $('#btn-saveManagerClear').css('display' , 'none');
                            }
                        }
                        
                    }

                    break;
                case "Manager approved (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid , fnc_method);
                    }else{

                        if(appgroup_clear == 5){

                            $('#managerclearmoney_section').css('display' , '');
                            getData_ManagerApprovedClear(formcode , areaid);
                            // Section AP clear money
                            $('#apclearmoney_section').css('display' , '');

                            if(userpermission.u_ap_clear_section == "yes"){
                                getdata_apClearMoney(formcode , areaid , fnc_method);
                            }else{
                                $('#ip-apClearSec-user , #ip-apClearSec-dept , #ip-apClearSec-date , #ip-apClearSec-memo').prop('readonly',true);
                                $('#btn-saveAPClear').css('display','none');
                            }

                        }else if(appgroup_clear == 4 || appgroup_clear == 3 || appgroup_clear == 2 || appgroup_clear == 1 || appgroup_clear == 0){
                            // Section Manager Clear Money
                            $('#managerclearmoney_section').css('display' , '');
                            getData_ManagerApprovedClear(formcode , areaid);
                        }else{
                            // Section Manager Clear Money
                            // $('#managerclearmoney_section').css('display' , '');
                            // getData_ManagerApprovedClear(formcode , areaid);

                            // $('#apclearmoney_section').css('display' , '');
                            // if(userpermission.u_ap_clear_section == "yes"){
                            //     getdata_apClearMoney(formcode , areaid);
                            // }else{
                            //     $('#ip-apClearSec-user , #ip-apClearSec-dept , #ip-apClearSec-date , #ip-apClearSec-memo').prop('readonly',true);
                            //     $('#btn-saveAPClear').css('display','none');
                            // }
                        }

                    }

                    break;
                case "Manager not approve (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);
                    $('#btn-editfnClear-section').css('display' , '');


                    break;
                case "Wait Executive Group 0 Approve (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid);
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);
                    }

                    break;
                case "Wait Executive Group 1 Approve (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid);
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);
                    }

                    break;
                case "Wait Executive Group 2 Approve (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid);
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);
                    }

                    break;
                case "Wait Executive Group 3 Approve (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid);
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);
                    }

                    break;
                case "Wait Executive Group 4 Approve (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid);
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);
                    }

                    break;
                case "Executive Group 0 Approved (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid , fnc_method);
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);

                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        if(userpermission.u_ap_clear_section == "yes"){
                            getdata_apClearMoney(formcode , areaid , fnc_method);
                        }else{
                            $('#ip-apClearSec-user , #ip-apClearSec-dept , #ip-apClearSec-date , #ip-apClearSec-memo').prop('readonly',true);
                            $('#btn-saveAPClear').css('display','none');
                        }
                    }

                    break;
                case "Executive Group 1 Approved (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid , fnc_method);
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);

                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        if(userpermission.u_ap_clear_section == "yes"){
                            getdata_apClearMoney(formcode , areaid , fnc_method);
                        }else{
                            $('#ip-apClearSec-user , #ip-apClearSec-dept , #ip-apClearSec-date , #ip-apClearSec-memo').prop('readonly',true);
                            $('#btn-saveAPClear').css('display','none');
                        }
                    }

                    break;
                case "Executive Group 2 Approved (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid , fnc_method);
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);

                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        if(userpermission.u_ap_clear_section == "yes"){
                            getdata_apClearMoney(formcode , areaid , fnc_method);
                        }else{
                            $('#ip-apClearSec-user , #ip-apClearSec-dept , #ip-apClearSec-date , #ip-apClearSec-memo').prop('readonly',true);
                            $('#btn-saveAPClear').css('display','none');
                        }
                    }

                    break;
                case "Executive Group 3 Approved (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid , fnc_method);
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);

                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        if(userpermission.u_ap_clear_section == "yes"){
                            getdata_apClearMoney(formcode , areaid , fnc_method);
                        }else{
                            $('#ip-apClearSec-user , #ip-apClearSec-dept , #ip-apClearSec-date , #ip-apClearSec-memo').prop('readonly',true);
                            $('#btn-saveAPClear').css('display','none');
                        }
                    }

                    break;
                case "Executive Group 4 Approved (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid , fnc_method);
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);

                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        if(userpermission.u_ap_clear_section == "yes"){
                            getdata_apClearMoney(formcode , areaid , fnc_method);
                        }else{
                            $('#ip-apClearSec-user , #ip-apClearSec-dept , #ip-apClearSec-date , #ip-apClearSec-memo').prop('readonly',true);
                            $('#btn-saveAPClear').css('display','none');
                        }
                    }

                    break;
                case "Executive Group 0 Not Approve (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');

                    if(userpermission.u_finance_clear_section == "yes"){
                        getdata_financeClearMoney(formcode , areaid);
                        $('#btn-editfnClear-section').css('display' , '');
                    }else{
                        $('#ip-fnClearSec-money , #ip-fnClearSec-user , #ip-fnClearSec-dept , #ip-fnClearSec-date , #ip-fnClearSec-memo').prop('readonly' , true);
                        $('#btn-savefnClear').css('display','none');
                    }

                    break;
                case "Executive Group 1 Not Approve (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');

                    if(userpermission.u_finance_clear_section == "yes"){
                        getdata_financeClearMoney(formcode , areaid);
                        $('#btn-editfnClear-section').css('display' , '');
                    }else{
                        $('#ip-fnClearSec-money , #ip-fnClearSec-user , #ip-fnClearSec-dept , #ip-fnClearSec-date , #ip-fnClearSec-memo').prop('readonly' , true);
                        $('#btn-savefnClear').css('display','none');
                    }

                    break;
                case "Executive Group 2 Not Approve (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');

                    if(userpermission.u_finance_clear_section == "yes"){
                        getdata_financeClearMoney(formcode , areaid);
                        $('#btn-editfnClear-section').css('display' , '');
                    }else{
                        $('#ip-fnClearSec-money , #ip-fnClearSec-user , #ip-fnClearSec-dept , #ip-fnClearSec-date , #ip-fnClearSec-memo').prop('readonly' , true);
                        $('#btn-savefnClear').css('display','none');
                    }

                    break;
                case "Executive Group 3 Not Approve (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');

                    if(userpermission.u_finance_clear_section == "yes"){
                        getdata_financeClearMoney(formcode , areaid);
                        $('#btn-editfnClear-section').css('display' , '');
                    }else{
                        $('#ip-fnClearSec-money , #ip-fnClearSec-user , #ip-fnClearSec-dept , #ip-fnClearSec-date , #ip-fnClearSec-memo').prop('readonly' , true);
                        $('#btn-savefnClear').css('display','none');
                    }


                    break;
                case "Executive Group 4 Not Approve (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');

                    if(userpermission.u_finance_clear_section == "yes"){
                        getdata_financeClearMoney(formcode , areaid);
                        $('#btn-editfnClear-section').css('display' , '');
                    }else{
                        $('#ip-fnClearSec-money , #ip-fnClearSec-user , #ip-fnClearSec-dept , #ip-fnClearSec-date , #ip-fnClearSec-memo').prop('readonly' , true);
                        $('#btn-savefnClear').css('display','none');
                    }


                    break;
                case "AP passed inspection (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid);

                        // Section acc clear money
                        $('#accclearmoney_section').css('display' , '');
                        if(userpermission.u_acc_clear_section == "yes"){
                            getdata_accClearMoney(formcode , areaid , fnc_method);
                        }else{
                            $('#ip-accClearSec-user , #ip-accClearSec-dept , #ip-accClearSec-date , #ip-accClearSec-memo').prop('readonly' , true);
                            $('#btn-saveAccClear').css('display' , 'none');
                        }
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);

                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid);

                        // Section acc clear money
                        $('#accclearmoney_section').css('display' , '');
 
                        if(userpermission.u_acc_clear_section == "yes"){
                            getdata_accClearMoney(formcode , areaid , fnc_method);
                        }else{
                            $('#ip-accClearSec-user , #ip-accClearSec-dept , #ip-accClearSec-date , #ip-accClearSec-memo').prop('readonly' , true);
                            $('#btn-saveAccClear').css('display' , 'none');
                        }

                        // // Section acc clear money
                        // $('#finance2clearmoney_section').css('display' , '');
                        
                    }



                    break;

                case "AP not pass inspection (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);
                    $('#btn-editfnClear-section').css('display' , '');


                    break;

                case "Account passed inspection (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid);

                        // Section acc clear money
                        $('#accclearmoney_section').css('display' , '');
                        getdata_accClearMoney(formcode , areaid);
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);

                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid);

                        // Section acc clear money
                        $('#accclearmoney_section').css('display' , '');
                        getdata_accClearMoney(formcode , areaid);

                        // // Section acc clear money
                        $('#finance2clearmoney_section').css('display' , '');

                        if(userpermission.u_finance2_clear_section == "yes"){
                            getdata_financeClearMoney2(formcode , areaid);
                        }else{
                            $('#ip-fnClearSec2-user , #ip-fnClearSec2-dept , #ip-fnClearSec2-date , #ip-fnClearSec2-memo').prop('readonly' , true);
                            $('#btn-saveFnClear2').css('display' , 'none');
                        }
                        
                    }

                    break;

                case "Account not pass inspection (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);
                    $('#btn-editfnClear-section').css('display' , '');


                    break;

                case "Wait user receive money (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid);

                        // Section acc clear money
                        $('#accclearmoney_section').css('display' , '');
                        getdata_accClearMoney(formcode , areaid);
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);

                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid);

                        // Section acc clear money
                        $('#accclearmoney_section').css('display' , '');
                        getdata_accClearMoney(formcode , areaid);

                        // // Section acc clear money
                        $('#finance2clearmoney_section').css('display' , '');
                        getdata_financeClearMoney2(formcode , areaid);

                        // Section user receive money
                        $('#userreceiveclear_section').css('display' , '');

                        if(userpermission.u_userreceive_clear_section == "yes"){
                            getdata_userReceiveClear(formcode , areaid);
                        }else{
                            $('#ip-userReceiveClearSec-user , #ip-userReceiveClearSec-dept , #ip-userReceiveClearSec-date , #ip-userReceiveClearSec-memo').prop('readonly' , true);
                            $('#btn-saveUserreceiveClear').css('display' , 'none');
                        }

                        
                    }

                    break;

                case "Finance 2 not pass inspection (Clear Money)":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);
                    $('#btn-editfnClear-section').css('display' , '');


                    break;

                case "Clear money complete":
                    // Section check budget
                    $('#checkbudget_section').css('display' , '');
                    getdata_checkbudget(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section').css('display' , '');
                    getdata_apApprove(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section').css('display' , '');
                    getdata_accApprove(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section').css('display' , '');
                    getdata_financeApprove(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section').css('display' , '');
                    getdata_userReceive(formcode , areaid);

                    //Section user clear money
                    $('#userclearmoney_section').css('display' , '');
                    getdata_userClearMoney(formcode , areaid);

                    //Section finance clear money
                    $('#financeclearmoney_section').css('display','');
                    getdata_financeClearMoney(formcode , areaid);

                    if(fnc_method != "จ่ายเงินคืนให้ผู้ขอ"){
                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid);

                        // Section acc clear money
                        $('#accclearmoney_section').css('display' , '');
                        getdata_accClearMoney(formcode , areaid);
                    }else{
                        // Section Manager Clear Money
                        $('#managerclearmoney_section').css('display' , '');
                        getData_ManagerApprovedClear(formcode , areaid);

                        //Section AP clear money
                        $('#apclearmoney_section').css('display' , '');
                        getdata_apClearMoney(formcode , areaid);

                        // Section acc clear money
                        $('#accclearmoney_section').css('display' , '');
                        getdata_accClearMoney(formcode , areaid);

                        // // Section acc clear money
                        $('#finance2clearmoney_section').css('display' , '');
                        getdata_financeClearMoney2(formcode , areaid);

                        // Section user receive money
                        $('#userreceiveclear_section').css('display' , '');
                        getdata_userReceiveClear(formcode , areaid);

                        
                    }


                    break;
            }

            process_step_advance(status , appgroup , fnc_method , appgroup_clear);
        }

        function getdata_checkbudget(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getdata_checkbudget' , {
                    action:'getdata_checkbudget',
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let bgdata = res.data.checkbudgetData;
                        let condate = moment(bgdata.wdf_bg_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ip-bgsec-user').val(bgdata.wdf_bg_user).prop('readonly' , true);
                        $('#ip-bgsec-dept').val(bgdata.wdf_bg_dept).prop('readonly' , true);
                        $('#ip-bgsec-datetime').val(condate).prop('readonly' , true);
                        $('#ip-bgsec-creditlimit').val(numberWithCommas(bgdata.wdf_bg_creditlimit)).prop('readonly' , true);
                        $('#ip-bgsec-memo').val(bgdata.wdf_bg_memo).prop('readonly' , true);
                        $('#btn-savecheckbudget').css('display' , 'none');
                    }
                });
            }
        }

        function checkpaygroup(pricewithVat , doctype , areaid , formcode)
        {
            let approveGroup = '';
            let areaidGroup = '';
            let paygroupid = '';
            if(pricewithVat != "" && doctype != "" && areaid != ""){
                
                pricewithVat = parseFloat(pricewithVat);
                axios.post(url+'main/advance/checkpaygroup' , {
                    action:'checkpaygroup',
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

                        $('#check-mg-paygroupid').val(paygroupid);
                        $('#check-mg-group').val(approveGroup);
                        $('#check-mg-areaid').val(areaid);
                        $('#check-mg-formcode').val(formcode);
                        $('#check-mg-groupareaid').val(areaidGroup);

                        $('#ip-mgrsec-userpost').val("<?php echo getUser()->Fname." ".getUser()->Lname; ?>").prop('readonly' , true);
                        $('#ip-mgrsec-deptpost').val("<?php echo getUser()->Dept; ?>").prop('readonly' , true);
                        $('#ip-mgrsec-datepost').val("<?php echo date("d/m/Y H:i:s"); ?>").prop('readonly' , true);

                        console.log(approveGroup+','+areaidGroup+','+paygroupid);
                        getdata_approveGroup(approveGroup , areaidGroup , formcode , areaid);
                    }
                });
            }

        }

        function getdata_approveGroup(approveGroup , areaidGroup , formcode , areaid)
        {
            if(approveGroup != "" && areaidGroup != ""){
                axios.post(url+'main/advance/getdata_approveGroup' , {
                    action:'getdata_approveGroup',
                    approveGroup:approveGroup,
                    areaidGroup:areaidGroup,
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let check_userecode = "<?php echo getUser()->ecode; ?>";
                        if(approveGroup != 5){
                            $('.lineMgrApp').css('display' , '');
                            let appGroup = res.data.appGroup;
                            let appGroupDetail = res.data.appGroupDetail;
                            let htmlPay = ``;
                            let appNumber = null;

                            let htmlg1 = `
                                <div class="col-md-12 form-group">
                            `;
                                for(let i = 0 ; i < appGroup.length; i++){
                                    appNumber = appGroup[i].app_number;
                                    $('#check-mg-totalLength').val(appNumber);
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
                                                            <input type="checkbox" id="ipv-adv-appgd-`+appGroupDetail[ii].app_autoid+`" name="ipv-adv-appgd[]" class="custom-control-input cbGroupDetail" value="`+appGroupDetail[ii].app_ecode+`"
                                                            data_autoid="`+appGroupDetail[ii].app_autoid+`"
                                                            data_group="`+appGroupDetail[ii].app_group+`"
                                                            data_posiname="`+appGroupDetail[ii].app_posiname+`"
                                                            >

                                                            <label for="ipv-adv-appgd-`+appGroupDetail[ii].app_autoid+`" class="custom-control-label"><b>`+appGroupDetail[ii].app_user+`</b></label>
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
                                let condition = getConditionTextByGroup(approveGroup , areaid);
                                htmlg1 +=`
                                <div class="col-md-12 form-group">
                                    <span class="conditionText">`+condition+`</span>
                                </div>
                                `;

                                $('#mainG-1').html(htmlg1);

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

                                $(document).on('click' , '.cbGroupDetail' , function(){
                                    const data_autoid = $(this).attr('data_autoid');
                                    const data_group = $(this).attr('data_group');
                                    const data_posiname = $(this).attr('data_posiname');

                                    if($(this).is(':checked')){

                                        if($('#check-mg-areaid').val() == "tb"){

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
                                                            $('#ipv-adv-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= checkBoxCountT1;
                                                            $('#check-mg-clickLength').val(checkboxCount);
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
                                                            $('#ipv-adv-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= checkBoxCountT2;
                                                            $('#check-mg-clickLength').val(checkboxCount);
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
                                                            $('#ipv-adv-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength').val(checkboxCount);
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
                                                            $('#ipv-adv-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength').val(checkboxCount);
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
                                                            $('#ipv-adv-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength').val(checkboxCount);
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
                                                            $('#ipv-adv-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength').val(checkboxCount);
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
                                                            $('#ipv-adv-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength').val(checkboxCount);
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
                                                            $('#ipv-adv-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength').val(checkboxCount);
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
                                        if($('#check-mg-areaid').val() == "tb"){

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


                                    
                                    $('#check-mg-clickLength').val(checkboxCount);

                                    if(checkboxCount > appNumber){
                                        swal({
                                            title: 'ท่านเลือกเกินจำนวนที่กำหนด',
                                            type: 'error',
                                            showConfirmButton: false,
                                            timer:1000
                                        }).then(function(){

                                            if($('#check-mg-areaid').val() == "tb"){

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




                                            $('#ipv-adv-appgd-'+data_autoid).prop('checked' , false);
                                            $('#check-mg-clickLength').val(checkboxCount);
                                        });
                                    }
                                });
                        }

                    }
                });
            }
        }

        function getData_ManagerApproved(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getData_ManagerApproved' , {
                    action:"getData_ManagerApproved",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){

                        let approveGroup = res.data.approveGroup;
                        let mgrApproveData = res.data.mgrApproveData;

                        if(mgrApproveData.wdf_mgr_appr == "อนุมัติ"){
                            if(approveGroup != 5){
                                $('.lineMgrApp').css('display' , '');
                                let appGroup = res.data.appGroup;
                                let appGroupDetail = res.data.appGroupDetail;
                                let userApproved = res.data.userApproved;
                                
                                let htmlg1 = `<div class="col-md-12 form-group">`;

                                // for(let i = 0 ; i < appGroup.length; i++){
                                //     appNumber = appGroup[i].app_number;
                                //     $('#check-mg-totalLength').val(appNumber);
                                //     htmlg1 +=`
                                //     <label><b>`+appGroup[i].app_posiname+`</b></label>
                                //     <div class="row">
                                //         <div class="col-lg-12 form-inline">`;

                                //         for(let ii = 0; ii < appGroupDetail.length; ii++){
                                //             let checkedData = '';
                                //             if(appGroup[i].app_posiname == appGroupDetail[ii].app_posiname){

                                //                 for(let iii = 0; iii < userApproved.length; iii++){
                                //                     if(appGroupDetail[ii].app_ecode == userApproved[iii].apv_ecode){
                                //                         checkedData = 'checked';
                                //                     }
                                //                 }

                                //                 htmlg1 +=`
                                //                 <div class="custom-control custom-checkbox mb-5 ml-3">
                                //                     <input type="checkbox" id="ipv-adv-appgd-`+appGroupDetail[ii].app_autoid+`" name="ipv-adv-appgd[]" class="custom-control-input cbGroupDetail" `+checkedData+`>

                                //                     <label for="ipv-adv-appgd-`+appGroupDetail[ii].app_autoid+`" class="custom-control-label"><b>`+appGroupDetail[ii].app_user+`</b></label>
                                //                 </div>

                                //                 `;
                                //             }
                                //         }   

                                //     htmlg1 +=`
                                //         </div>
                                //     </div>
                                //     `;
                                // }

                                for (let i = 0; i < appGroup.length; i++) {
                                    let appNumber = appGroup[i].app_number;
                                    $('#check-mg-totalLength').val(appNumber);

                                    htmlg1 += `
                                    <label><b>${appGroup[i].app_posiname}</b></label>
                                    <div class="row">
                                        <div class="col-lg-12 form-inline">`;

                                    let mergedData = [];

                                    // 1️⃣ ดึงข้อมูลจาก `appGroupDetail` ที่ตรงกับตำแหน่งนี้ก่อน
                                    for (let ii = 0; ii < appGroupDetail.length; ii++) {
                                        let checkedData = '';

                                        if (appGroup[i].app_posiname == appGroupDetail[ii].app_posiname) {
                                            for (let iii = 0; iii < userApproved.length; iii++) {
                                                if (appGroupDetail[ii].app_ecode == userApproved[iii].apv_ecode) {
                                                    checkedData = 'checked';
                                                }
                                            }

                                            mergedData.push({
                                                autoid: appGroupDetail[ii].app_autoid,
                                                ecode: appGroupDetail[ii].app_ecode,
                                                user: appGroupDetail[ii].app_user,
                                                checked: checkedData
                                            });
                                        }
                                    }

                                    // 2️⃣ เช็คว่ามีค่าใน `userApproved` ที่ไม่มีอยู่ใน `appGroupDetail` หรือไม่ (แต่ต้องเป็นตำแหน่งเดียวกัน)
                                    for (let iii = 0; iii < userApproved.length; iii++) {
                                        let isEcodeExists = mergedData.some(detail => detail.ecode === userApproved[iii].apv_ecode);
                                        
                                        if (!isEcodeExists && appGroup[i].app_posiname == userApproved[iii].apv_posiname) {
                                            // เพิ่มเฉพาะค่าที่ตรงกับตำแหน่ง (app_posiname) เท่านั้น
                                            mergedData.push({
                                                autoid: userApproved[iii].apv_autoid,
                                                ecode: userApproved[iii].apv_ecode,
                                                user: userApproved[iii].apv_user,
                                                checked: 'checked'
                                            });
                                        }
                                    }

                                    // 3️⃣ แสดงผลจาก `mergedData`
                                    for (let data of mergedData) {
                                        htmlg1 += `
                                        <div class="custom-control custom-checkbox mb-5 ml-3">
                                            <input type="checkbox" id="ipv-adv-appgd-${data.autoid}" name="ipv-adv-appgd[]" class="custom-control-input cbGroupDetail" ${data.checked}>
                                            <label for="ipv-adv-appgd-${data.autoid}" class="custom-control-label"><b>${data.user}</b></label>
                                        </div>`;
                                    }

                                    htmlg1 += `</div></div>`;
                                }

                                    htmlg1 +=`
                                    </div>
                                    `;

                                let condition = getConditionTextByGroup(approveGroup , areaid);
                                    htmlg1 +=`
                                    <div class="col-md-12 form-group">
                                        <span class="conditionText">`+condition+`</span>
                                    </div>
                                    `;
                                    $('#mainG-1').html(htmlg1);

                                    $('input:checkbox[name="ipv-adv-appgd[]"]').on('click' , function(e){
                                        e.preventDefault();
                                    });


                                    getSectionGroup_4_to_0(approveGroup , userApproved , formcode , areaid , mgrApproveData.wdf_status);
                            }

                        }


                        $('input:radio[name="ip-mgrsec-appro"]').on('click' , function(e){
                            e.preventDefault();
                        });

                        if(mgrApproveData.wdf_mgr_appr == "อนุมัติ"){
                            $('#ip-mgrsec-appro-yes').prop('checked' , true);
                        }else{
                            $('#ip-mgrsec-appro-no').prop('checked' , true);
                        }

                        let condateMgr = moment(mgrApproveData.wdf_mgr_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ip-mgrsec-userpost').val(mgrApproveData.wdf_mgr_user).prop('readonly' , true);
                        $('#ip-mgrsec-deptpost').val(mgrApproveData.wdf_mgr_dept).prop('readonly' , true);
                        $('#ip-mgrsec-datepost').val(condateMgr).prop('readonly' , true);
                        $('#ip-mgrsec-memo').val(mgrApproveData.wdf_mgr_memo).prop('readonly' , true);
                        $('#btn-saveManager').css('display' , 'none');
                    }
                });
            }
        }

        function getSectionGroup_4_to_0(approveGroup , userApproved , formcode , areaid , wdfstatus)
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
                    <form id="frm_save_paygroup-`+userApproved[i].apv_ecode+`" autocomplete="off" class="needs-validation" novalidate>
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <h4>`+userApproved[i].apv_posiname+`</h4>
                        </div>
                    </div>

                    <div class="advHr mt-3"></div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                        <div class="row">
                                            <div class="col-lg-12 form-inline">
                                                <div class="custom-control custom-radio mb-5 ml-3">
                                                    <input type="radio" id="ip-payGroupsec-appro-yes-`+userApproved[i].apv_ecode+`" name="ip-payGroupsec-appro-`+userApproved[i].apv_ecode+`" value="อนุมัติ" class="custom-control-input payGroupsecAppr" required> 
                                                    <label for="ip-payGroupsec-appro-yes-`+userApproved[i].apv_ecode+`" class="custom-control-label">อนุมัติ</label>
                                                </div> 
                                                <div class="custom-control custom-radio mb-5 ml-3">
                                                    <input type="radio" id="ip-payGroupsec-appro-no-`+userApproved[i].apv_ecode+`" name="ip-payGroupsec-appro-`+userApproved[i].apv_ecode+`" value="ไม่อนุมัติ" class="custom-control-input payGroupsecAppr" required> 
                                                    <label for="ip-payGroupsec-appro-no-`+userApproved[i].apv_ecode+`" class="custom-control-label">ไม่อนุมัติ</label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for=""><b>หมายเหตุ</b></label>
                                    <textarea name="ip-payGroupsec-memo-`+userApproved[i].apv_ecode+`" id="ip-payGroupsec-memo-`+userApproved[i].apv_ecode+`" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for=""><b>ผู้อนุมัติ</b></label>
                                    <input type="text" name="ip-payGroupsec-userpost-`+userApproved[i].apv_ecode+`" id="ip-payGroupsec-userpost-`+userApproved[i].apv_ecode+`" class="form-control" value="`+userApproved[i].apv_user+`" readonly>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for=""><b>ลงวันที่</b></label>
                                    <input type="text" name="ip-payGroupsec-datepost-`+userApproved[i].apv_ecode+`" id="ip-payGroupsec-datepost-`+userApproved[i].apv_ecode+`" class="form-control" value="<?php echo date("d/m/Y H:i:s") ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="btn_sectionPayGroup_`+userApproved[i].apv_ecode+`" class="row align-items-center sectionPayGroupClass" style="display:none;">
                        <div class="col-md-12 text-center">
                            <button type="button" id="btn-savePaygroup-`+userApproved[i].apv_ecode+`" name="btn-savePaygroup-`+userApproved[i].apv_ecode+`" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
                        </div>
                    </div>

                    <input hidden type="text" id="ip-payGroupsec-autoid-`+userApproved[i].apv_ecode+`" name="ip-payGroupsec-autoid-`+userApproved[i].apv_ecode+`" value="`+userApproved[i].apv_autoid+`">
                    <input hidden type="text" id="ip-payGroupsec-formcode-`+userApproved[i].apv_ecode+`" name="ip-payGroupsec-formcode-`+userApproved[i].apv_ecode+`" value="`+formcode+`">
                    <input hidden type="text" id="ip-payGroupsec-areaid-`+userApproved[i].apv_ecode+`" name="ip-payGroupsec-areaid-`+userApproved[i].apv_ecode+`" value="`+areaid+`">
                    <input hidden type="text" id="ip-payGroupsec-totalApp-`+userApproved[i].apv_ecode+`" name="ip-payGroupsec-totalApp-`+userApproved[i].apv_ecode+`" value="`+userApproved.length+`">
                    <input hidden type="text" id="ip-payGroupsec-group-`+userApproved[i].apv_ecode+`" name="ip-payGroupsec-group-`+userApproved[i].apv_ecode+`" value="`+userApproved[i].apv_group+`">
                    </form>
                    </div>
                    `;

                    
                }
            $('#payGroup_section').css('display' , '').html(payGroupHtml);
            let ecodeLogin = "<?php echo getUser()->ecode; ?>";
            $('#btn_sectionPayGroup_'+ecodeLogin).css('display' , '');


            for(let ii = 0; ii<userApproved.length;ii++){
                if(userApproved[ii].apv_approve != null){
                    let radioname = "ip-payGroupsec-appro-"+userApproved[ii].apv_ecode;
                    let condateApproved = moment(userApproved[ii].apv_approve_datetime).format('DD/MM/Y HH:mm:ss');

                    if(userApproved[ii].apv_approve == "อนุมัติ"){
                        $('#ip-payGroupsec-appro-yes-'+userApproved[ii].apv_ecode).prop('checked' , true);
                    }else if(userApproved[ii].apv_approve == "ไม่อนุมัติ"){
                        $('#ip-payGroupsec-appro-no-'+userApproved[ii].apv_ecode).prop('checked' , true);
                    }

                    $("input:radio[name="+radioname+"]").on('click' , function(e){
                        e.preventDefault();
                    });

                    $('#ip-payGroupsec-memo-'+userApproved[ii].apv_ecode).val(userApproved[ii].apv_approve_memo).prop('readonly' , true);
                    $('#ip-payGroupsec-userpost-'+userApproved[ii].apv_ecode).val(userApproved[ii].apv_approve_user);
                    $('#ip-payGroupsec-datepost-'+userApproved[ii].apv_ecode).val(condateApproved);
                    $('#btn-savePaygroup-'+userApproved[ii].apv_ecode).css('display','none');
                }
            }

            // Control when executive not approve
            if(wdfstatus == "Executive Group "+approveGroup+" Not Approve"){
                $('.sectionPayGroupClass').css('display' , 'none');
                $('.payGroupsecAppr').attr('onclick' , 'return false');
            }
            
        }


        $(document).on('click' , '#btn-savePaygroup-'+userecode , function(){
                let radioname = "ip-payGroupsec-appro-"+userecode;
            
                if($('input:radio[name='+radioname+']:checked').length == 0){
                    swal({
                        title: 'กรุณาตรวจสอบข้อมูลให้ถูกต้อง',
                        type: 'error',
                        showConfirmButton: false,
                        timer:1000
                    });
                }else{
                    if($('input:radio[name='+radioname+']:checked').val() == "ไม่อนุมัติ"){
                        if($('#ip-payGroupsec-memo-'+userecode).val() == ""){
                            swal({
                                title: 'กรุณาระบุเหตุผล',
                                type: 'error',
                                showConfirmButton: false,
                                timer:1000
                            });
                        }else{
                            savePayGroup(userecode);
                        }
                    }else if($('input:radio[name='+radioname+']:checked').val() == "อนุมัติ"){
                        savePayGroup(userecode);
                    }
                }
        });

        function savePayGroup(ecode)
        {
            $('#btn-savePaygroup-'+userecode).prop('disabled' , true);
            const form = $('#frm_save_paygroup-'+ecode)[0];
            const data = new FormData(form);
            axios.post(url+'main/advance/savePayGroup' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:1000
                    }).then(function(){
                        location.reload();
                    });
                }
            });
        }


        function getdata_apApprove(formcode , areaid , appgroup ='')
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getdata_apApprove' , {
                    action:"getdata_apApprove",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let apData = res.data.apData;

                        if(apData.wdf_ap_appr != null){
                            let condateAp = moment(apData.wdf_ap_datetime).format('DD/MM/Y HH:mm:ss');

                            if(apData.wdf_ap_appr == "ผ่าน"){
                                $('#ip-apsec-appro-yes').prop('checked' , true);
                            }else if(apData.wdf_ap_appr == "ไม่ผ่าน"){
                                $('#ip-apsec-appro-no').prop('checked' , true);
                            }

                            if(apData.wdf_ap_moneymethod == "เงินสด/โอน"){
                                $('#ip-apsec-money-1').prop('checked' , true);
                            }else if(apData.wdf_ap_moneymethod == "เช็ค"){
                                $('#ip-apsec-money-2').prop('checked' , true);
                            }

                            $('input:radio[name=ip-apsec-money]').on('click' , function(e){e.preventDefault();
                            });

                            $('input:radio[name="ip-apsec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-apsec-user').val(apData.wdf_ap_user).prop('readonly' , true);
                            $('#ip-apsec-dept').val(apData.wdf_ap_dept).prop('readonly' , true);
                            $('#ip-apsec-date').val(condateAp).prop('readonly' , true);
                            $('#ip-apsec-memo').val(apData.wdf_ap_memo).prop('readonly' , true);
                            $('#btn-saveap-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-apsec-user').val(user).prop('readonly' , true);
                            $('#ip-apsec-dept').val(dept).prop('readonly' , true);
                            $('#ip-apsec-date').val(datetime).prop('readonly' , true);

                            $('#check-apsec-formcode').val(formcode);
                            $('#check-apsec-areaid').val(areaid);
                            $('#check-apsec-appGroup').val(appgroup);
                        }

                    }
                });
            }
        }


        function getdata_accApprove(formcode , areaid , appgroup ='')
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getdata_accApprove' , {
                    action:"getdata_accApprove",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let accData = res.data.accData;

                        if(accData.wdf_acc_appr != null){
                            let condateAcc = moment(accData.wdf_acc_datetime).format('DD/MM/Y HH:mm:ss');

                            if(accData.wdf_acc_appr == "ผ่าน"){
                                $('#ip-accSec-appro-yes').prop('checked' , true);
                            }else if(accData.wdf_acc_appr == "ไม่ผ่าน"){
                                $('#ip-accSec-appro-no').prop('checked' , true);
                            }

                            $('input:radio[name="ip-accSec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-accSec-user').val(accData.wdf_acc_user).prop('readonly' , true);
                            $('#ip-accSec-dept').val(accData.wdf_acc_dept).prop('readonly' , true);
                            $('#ip-accSec-date').val(condateAcc).prop('readonly' , true);
                            $('#ip-accSec-memo').val(accData.wdf_acc_memo).prop('readonly' , true);
                            $('#btn-saveacc-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-accSec-user').val(user).prop('readonly' , true);
                            $('#ip-accSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-accSec-date').val(datetime).prop('readonly' , true);

                            $('#check-accsec-formcode').val(formcode);
                            $('#check-accsec-areaid').val(areaid);
                            $('#check-accsec-appGroup').val(appgroup);
                        }

                    }
                });
            }
        }


        function getdata_financeApprove(formcode , areaid , appgroup = '')
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getdata_financeApprove' , {
                    action:"getdata_financeApprove",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let financeData = res.data.financeData;

                        if(financeData.wdf_fn_appr != null){
                            let condateAcc = moment(financeData.wdf_fn_datetime).format('DD/MM/Y HH:mm:ss');

                            if(financeData.wdf_fn_appr == "ผ่าน"){
                                $('#ip-fnSec-appro-yes').prop('checked' , true);
                            }else if(financeData.wdf_fn_appr == "ไม่ผ่าน"){
                                $('#ip-fnSec-appro-no').prop('checked' , true);
                            }

                            $('input:radio[name="ip-fnSec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-fnSec-user').val(financeData.wdf_fn_user).prop('readonly' , true);
                            $('#ip-fnSec-dept').val(financeData.wdf_fn_dept).prop('readonly' , true);
                            $('#ip-fnSec-date').val(condateAcc).prop('readonly' , true);
                            $('#ip-fnSec-memo').val(financeData.wdf_fn_memo).prop('readonly' , true);
                            $('#btn-savefn-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-fnSec-user').val(user).prop('readonly' , true);
                            $('#ip-fnSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-fnSec-date').val(datetime).prop('readonly' , true);

                            $('#check-fnsec-formcode').val(formcode);
                            $('#check-fnsec-areaid').val(areaid);
                            $('#check-fnsec-appGroup').val(appgroup);
                        }
                        

                    }
                });
            }
        }


        function getdata_userReceive(formcode , areaid , appgroup = '')
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getdata_userReceive' , {
                    action:"getdata_userReceive",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let userreceiveData = res.data.userreceiveData;

                        if(userreceiveData.wdf_ur_signature != null){
                            let condateUserreceive = moment(userreceiveData.wdf_ur_datetime).format('DD/MM/Y HH:mm:ss');


                            $('#ip-userReceiveSec-user').val(userreceiveData.wdf_ur_user).prop('readonly' , true);
                            $('#ip-userReceiveSec-dept').val(userreceiveData.wdf_ur_dept).prop('readonly' , true);
                            $('#ip-userReceiveSec-date').val(condateUserreceive).prop('readonly' , true);
                            $('#ip-userReceiveSec-memo').val(userreceiveData.wdf_ur_memo).prop('readonly' , true);
                            $('#btn-saveUserreceive-section').css('display' , 'none');
                            $('#smoothed').css('display','none');

                            $('#show_signature').css('display' , '');
                            $('#show_sign_adv').attr('src' , userreceiveData.wdf_ur_signature);

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-userReceiveSec-user').val(user).prop('readonly' , true);
                            $('#ip-userReceiveSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-userReceiveSec-date').val(datetime).prop('readonly' , true);

                            $('#check-userreceivesec-formcode').val(formcode);
                            $('#check-userreceivesec-areaid').val(areaid);
                            $('#check-userreceivesec-appGroup').val(appgroup);
                        }
                        

                    }
                });
            }
        }


        function getdata_userClearMoney(formcode , areaid , appgroup = '')
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getdata_userClearMoney' , {
                    action:"getdata_userClearMoney",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let userClearMoneyData = res.data.userClearMoneyData;
                        

                        if(userClearMoneyData.wdf_urc_money != null){
                            let condateUserClearMoney = moment(userClearMoneyData.wdf_urc_datetime).format('DD/MM/Y HH:mm:ss');

                            let wdf_trans = res.data.userClearMoneyTrans;

                            
                            $('#ip-userClearSec-user').val(userClearMoneyData.wdf_urc_user).prop('readonly' , true);
                            $('#ip-userClearSec-dept').val(userClearMoneyData.wdf_urc_dept).prop('readonly' , true);
                            $('#ip-userClearSec-date').val(condateUserClearMoney).prop('readonly' , true);
                            $('#ip-userClearSec-memo').val(userClearMoneyData.wdf_urc_memo).prop('readonly' , true);
                            $('#btn-saveUserclearmoney-section').css('display' , 'none');
                            $('#userclearUploadfile_section').css('display' , 'none');

                            if(userClearMoneyData.wdf_status == "User upload document already"){
                                $('#btn-editUserclearmoney-section').css('display','');
                            }
                            
                            $('#btn-editUserclearmoney').attr({
                                'data_formcode':formcode,
                                'data_areaid':areaid
                            });

                            $('#check-userClearSec-formcode').val(formcode);
                            $('#check-userClearSec-areaid').val(areaid);

                            getFile_userClearMoney(formcode , areaid);


                            // WDF Trans Detail

                            let convat1ToInt = parseInt(res.data.userClearMoneyData.wdf_vat1_clear);
                            $('#ip-advdetail-vat7-clear option[value="'+convat1ToInt+'"]').prop("selected" , true);

                            let convat2ToInt = parseInt(res.data.userClearMoneyData.wdf_vat2_clear);
                            $('#ip-advdetail-vat3-clear option[value="'+convat2ToInt+'"]').prop("selected" , true);

                            $('#ip-advdetail-priceNonVat-clear').val(res.data.userClearMoneyData.wdf_pricenonevat_clear);
                            $('#ip-advdetail-vat7Price-clear').val(res.data.userClearMoneyData.wdf_pricevat1_clear);
                            $('#ip-advdetail-vat3Price-clear').val(res.data.userClearMoneyData.wdf_pricevat2_clear);
                            $('#ip-advdetail-priceTotal-clear').val(res.data.userClearMoneyData.wdf_pricewithvat_clear);

                            conpriceWithComma('#ip-advdetail-priceNonVat-clear');
                            conpriceWithComma('#ip-advdetail-vat7Price-clear');
                            conpriceWithComma('#ip-advdetail-vat3Price-clear');
                            conpriceWithComma('#ip-advdetail-priceTotal-clear');

                            $('#ip-advdetail-vat7-clear').attr({
                                "style":"pointer-events: none;",
                                "readonly":"readonly"
                            });
                            $('#ip-advdetail-vat3-clear').attr({
                                "style":"pointer-events: none;",
                                "readonly":"readonly"
                            });



                            let wdf_trans_html = ``;
                            let runningnumber = 1;
                            $('#tbl_advance_newClear').DataTable().destroy();
                            $('#tbl_advance_newClear').DataTable();
                            
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
                            $('.advAddDetailClear').css('display' , 'none');
                            $('#tbl-sectionclear-add').css('display' , 'none');
                            $('#tbl-sectionclear-view').css('display' , '');
                            $('#showDataAdvlistAftersave-view-clear').html(wdf_trans_html);


                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-userClearSec-user').val(user).prop('readonly' , true);
                            $('#ip-userClearSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-userClearSec-date').val(datetime).prop('readonly' , true);

                            $('#check-userClearSec-formcode').val(formcode);
                            $('#check-userClearSec-areaid').val(areaid);
                            $('#check-userClearSec-appGroup').val(appgroup);
                        }
                        

                    }
                });
            }
        }

        function getFile_userClearMoney(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getFile_userClearMoney' , {
                    action:"getFile_userClearMoney",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){

                        // Check Edit Or Not
                        let delClearDis = "";
                        if($('#btn-saveUserclearmoney').text() == "บันทึก"){
                            delClearDis = 'style="display:none;"';
                        }else if($('#btn-saveUserclearmoney').text() == "บันทึกการแก้ไข"){
                            delClearDis = '';
                        }

                        // Show Image View
                        let wdf_clearMoneyfile = res.data.wdf_clearMoneyfile;
                        let imageHtml = `
                            <div class="col-md-12">
                                <span><b>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</b></span><br>
                            </div>`;
                        let ext;
                        for(let i = 0; i < wdf_clearMoneyfile.length; i++){
                            ext = wdf_clearMoneyfile[i].fi_name.split('.').pop().toLowerCase();

                            if(ext != "pdf"){
                                imageHtml +=`
                                <div class="col-md-4 col-lg-3 col-6 mt-2 imageM">
                                    <a href="`+url+wdf_clearMoneyfile[i].fi_path+wdf_clearMoneyfile[i].fi_name+`" data-toggle="lightbox">
                                        <img class="runImageView" src="`+url+wdf_clearMoneyfile[i].fi_path+wdf_clearMoneyfile[i].fi_name+`">
                                    </a>
                                    <a href="`+url+wdf_clearMoneyfile[i].fi_path+wdf_clearMoneyfile[i].fi_name+`" data-toggle="lightbox"><b>`+wdf_clearMoneyfile[i].fi_name+`</b></a>
                                    <i `+delClearDis+` class="fa fa-trash delclear-file-edit" aria-hidden="true" 
                                        data_formcode="`+wdf_clearMoneyfile[i].fi_formcode+`"
                                        data_path="`+wdf_clearMoneyfile[i].fi_path+`"
                                        data_name="`+wdf_clearMoneyfile[i].fi_name+`"
                                        data_areaid="`+wdf_clearMoneyfile[i].fi_areaid+`"
                                    ></i>
                                </div>
                                `;
                            }else{
                                imageHtml +=`
                                <div class="col-md-4 col-lg-3 col-6 mt-2 imageM">
                                    <embed src="`+url+wdf_clearMoneyfile[i].fi_path+wdf_clearMoneyfile[i].fi_name+`" width="100%" frameborder="0" allowfullscreen>
                                    <a href="`+url+wdf_clearMoneyfile[i].fi_path+wdf_clearMoneyfile[i].fi_name+`" target="_blank"><b>`+wdf_clearMoneyfile[i].fi_name+`</b></a>
                                    <i `+delClearDis+` class="fa fa-trash delclear-file-edit" aria-hidden="true" 
                                        data_formcode="`+wdf_clearMoneyfile[i].fi_formcode+`"
                                        data_path="`+wdf_clearMoneyfile[i].fi_path+`"
                                        data_name="`+wdf_clearMoneyfile[i].fi_name+`"
                                        data_areaid="`+wdf_clearMoneyfile[i].fi_areaid+`"
                                    ></i>
                                </div>
                                `;
                            }
                            console.log(ext);
                        }
                        $('#show_imageClearMoney').html(imageHtml);
                    }
                });
            }
        }

        $(document).on('click' , '.delclear-file-edit' , function(){
            swal({
                title: 'ท่านต้องการลบรายการนี้ ใช่หรือไม่',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText:'ยกเลิก'
            }).then((result)=> {
                if(result.value == true){
                    const data_formcode = $(this).attr('data_formcode');
                    const data_path = $(this).attr('data_path');
                    const data_name = $(this).attr('data_name');
                    const data_areaid = $(this).attr('data_areaid');
                    delClearFile_edit(data_formcode , data_path , data_name , data_areaid);
                }
            });
        });
        function delClearFile_edit(data_formcode , data_path , data_name , data_areaid)
        {
            if(data_formcode != "" && data_path != "" && data_name != ""){
                axios.post(url+'main/advance/delClearFile_edit',{
                    action:"delClearFile_edit",
                    data_formcode:data_formcode,
                    data_path:data_path,
                    data_name:data_name
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status =="Delete Data Success"){
                        let wdf_file = res.data.viewfulldata_image;
                        swal({
                            title: 'ลบรูปภาพที่ต้องการสำเร็จ',
                            type: 'success',
                            showConfirmButton: false,
                            timer:1000
                        }).then(function(){
                            getFile_userClearMoney(data_formcode , data_areaid);
                            $('.delclear-file-edit').css('display' , '');
                        });
                    }
                });
            }
        }

        function getdata_financeClearMoney(formcode , areaid , appgroup = '')
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getdata_financeClearMoney' , {
                    action:"getdata_financeClearMoney",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let financeClearData = res.data.financeClearData;
                        let pricewithvat = financeClearData.wdf_pricewithvat;
                        let pricewithvat_clear = financeClearData.wdf_pricewithvat_clear;

                        if(financeClearData.wdf_fnc_appr != null){
                            let condateFinanceClear = moment(financeClearData.wdf_fnc_datetime).format('DD/MM/Y HH:mm:ss');

                            if(financeClearData.wdf_fnc_appr == "ผ่าน"){
                                $('#ip-fnClearSec-appro-yes').prop('checked' , true);
                            }else if(financeClearData.wdf_fnc_appr == "ไม่ผ่าน"){
                                $('#ip-fnClearSec-appro-no').prop('checked' , true);
                            }

                            if(financeClearData.wdf_fnc_method == "รับเงินคืนจากผู้ขอ"){
                                $('#ip-fnClearSec-method-1').prop('checked' , true);
                            }else if(financeClearData.wdf_fnc_method == "จ่ายเงินคืนให้ผู้ขอ"){
                                $('#ip-fnClearSec-method-2').prop('checked' , true);
                            }else if(financeClearData.wdf_fnc_method == "ไม่มีรายการเพิ่มเติม"){
                                $('#ip-fnClearSec-method-3').prop('checked' , true);
                            }

                            $('input:radio[name="ip-fnClearSec-appro"]').attr('onclick' , 'return false');
                            $('input:radio[name="ip-fnClearSec-method"]').attr('onclick' , 'return false');

                            $('#ip-fnClearSec-money').val(numberWithCommas(financeClearData.wdf_fnc_money)).prop('readonly' , true);
                            $('#ip-fnClearSec-user').val(financeClearData.wdf_fnc_user).prop('readonly' , true);
                            $('#ip-fnClearSec-dept').val(financeClearData.wdf_fnc_dept).prop('readonly' , true);
                            $('#ip-fnClearSec-date').val(condateFinanceClear).prop('readonly' , true);
                            $('#ip-fnClearSec-memo').val(financeClearData.wdf_fnc_memo).prop('readonly' , true);
                            $('#btn-savefnClear-section').css('display' , 'none');
                            $('#btn-editfnClear').attr({
                                data_formcode:formcode,
                                data_areaid:areaid
                            });


                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";
                            let totalmoneyWithVat = pricewithvat;
                            let realMoneyWithVat = pricewithvat_clear;


                            $('#ip-fnClearSec-user').val(user).prop('readonly' , true);
                            $('#ip-fnClearSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-fnClearSec-date').val(datetime).prop('readonly' , true);

                            $('#check-fnClearSec-formcode').val(formcode);
                            $('#check-fnClearSec-areaid').val(areaid);
                            

                            let moneyTofinance = 0;
                            // Check Money Condition
                            if(parseFloat(totalmoneyWithVat) > parseFloat(realMoneyWithVat)){
                                moneyTofinance = parseFloat(totalmoneyWithVat) - parseFloat(realMoneyWithVat);
                                // Check finance Money method
                                $('#ip-fnClearSec-method-1').prop('checked' , true);
                            }else if(parseFloat(totalmoneyWithVat) < parseFloat(realMoneyWithVat)){
                                moneyTofinance = parseFloat(realMoneyWithVat) - parseFloat(totalmoneyWithVat);
                                // Check finance Money method
                                $('#ip-fnClearSec-method-2').prop('checked' , true);
                            }else{
                                moneyTofinance = 0.00;
                                // Check finance Money method
                                $('#ip-fnClearSec-method-3').prop('checked' , true);
                            }

                            moneyTofinance = moneyTofinance.toFixed(2);

                            console.log('Total Money : '+totalmoneyWithVat+' Real Money : '+realMoneyWithVat);

                            $('#ip-fnClearSec-money').val(numberWithCommas(moneyTofinance));

                            $('#check-fnClearSec-appGroup').val(appgroup);

                            
                        }
                        

                    }
                });
            }
        }

        // Section เมื่อ Clear เงินแล้วต้องทำเรื่องเบิกเงินคืน
        function checkpaygroupClear(pricewithVat , doctype , areaid , formcode , appgroup = '')
        {
            let approveGroup = '';
            let areaidGroup = '';
            let paygroupid = '';
            if(pricewithVat != "" && doctype != "" && areaid != ""){
                
                pricewithVat = parseFloat(pricewithVat);
                axios.post(url+'main/advance/checkpaygroup' , {
                    action:'checkpaygroup',
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

                        $('#check-mgrClearSec-paygroupid').val(paygroupid);
                        $('#check-mgrClearSec-group').val(approveGroup);
                        $('#check-mgrClearSec-areaid').val(areaid);
                        $('#check-mgrClearSec-formcode').val(formcode);
                        $('#check-mgrClearSec-groupareaid').val(areaidGroup);
                        $('#check-mgrClearSec-appGroup').val(appgroup);

                        let userpost = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                        let deptpost = "<?php echo getUser()->Dept; ?>";
                        let datepost = "<?php echo date("d/m/Y H:i:s"); ?>";
                        $('#ip-mgrClearSec-userpost').val(userpost).prop('readonly' , true);
                        $('#ip-mgrClearSec-deptpost').val(deptpost).prop('readonly' , true);
                        $('#ip-mgrClearSec-datepost').val(datepost).prop('readonly' , true);

                        console.log(approveGroup+','+areaidGroup+','+paygroupid);

                        getdata_approveGroupClear(approveGroup , areaidGroup , formcode , areaid);
                    }
                });
            }

        }

        function getdata_approveGroupClear(approveGroup , areaidGroup , formcode , areaid)
        {
            if(approveGroup != "" && areaidGroup != ""){
                axios.post(url+'main/advance/getdata_approveGroup' , {
                    action:'getdata_approveGroup',
                    approveGroup:approveGroup,
                    areaidGroup:areaidGroup,
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let check_ecode = "<?php echo getUser()->ecode; ?>";
                        if(approveGroup != 5){
                            $('.lineMgrClearApp').css('display' , '');
                            let appGroup = res.data.appGroup;
                            let appGroupDetail = res.data.appGroupDetail;
                            let htmlPay = ``;
                            let appNumber = null;

                            let htmlg1 = `
                                <div class="col-md-12 form-group">
                            `;
                                for(let i = 0 ; i < appGroup.length; i++){
                                    appNumber = appGroup[i].app_number;
                                    $('#check-mgrClearSec-totalLength').val(appNumber);
                                    htmlg1 +=`
                                    <label><b>`+appGroup[i].app_posiname+`</b></label>
                                    <div class="row">
                                        <div class="col-lg-12 form-inline">`;

                                        for(let ii = 0; ii < appGroupDetail.length; ii++){
                                            if(appGroup[i].app_posiname == appGroupDetail[ii].app_posiname){
                                                if(check_ecode == appGroupDetail[ii].app_ecode){
                                                    continue;
                                                }else{
                                                    htmlg1 +=`
                                                    <div class="custom-control custom-checkbox mb-5 ml-3">
                                                        <input type="checkbox" id="ipv-advClear-appgd-`+appGroupDetail[ii].app_autoid+`" name="ipv-advClear-appgd[]" class="custom-control-input cbGroupDetailClear" value="`+appGroupDetail[ii].app_ecode+`"
                                                        data_autoid="`+appGroupDetail[ii].app_autoid+`"
                                                        data_group="`+appGroupDetail[ii].app_group+`"
                                                        data_posiname="`+appGroupDetail[ii].app_posiname+`"
                                                        >

                                                        <label for="ipv-advClear-appgd-`+appGroupDetail[ii].app_autoid+`" class="custom-control-label"><b>`+appGroupDetail[ii].app_user+`</b></label>
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

                                let condition = getConditionTextByGroup(approveGroup , areaid);
                                htmlg1 +=`
                                <div class="col-md-12 form-group">
                                    <span class="conditionText">`+condition+`</span>
                                </div>
                                `;

                                $('#mainClearG-1').html(htmlg1);

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

                                $(document).on('click' , '.cbGroupDetailClear' , function(){
                                    const data_autoid = $(this).attr('data_autoid');
                                    const data_group = $(this).attr('data_group');
                                    const data_posiname = $(this).attr('data_posiname');

                                    if($(this).is(':checked')){

                                        if($('#check-mgrClearSec-areaid').val() == "tb"){

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
                                                            $('#ipv-advClear-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= checkBoxCountT1;
                                                            $('#check-mgrClearSec-clickLength').val(checkboxCount);
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
                                                            $('#ipv-advClear-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= checkBoxCountT2;
                                                            $('#check-mgrClearSec-clickLength').val(checkboxCount);
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
                                                            $('#ipv-advClear-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mgrClearSec-clickLength').val(checkboxCount);
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
                                                            $('#ipv-advClear-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mgrClearSec-clickLength').val(checkboxCount);
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
                                                            $('#ipv-advClear-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mgrClearSec-clickLength').val(checkboxCount);
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
                                                            $('#ipv-advClear-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mgrClearSec-clickLength').val(checkboxCount);
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
                                                            $('#ipv-advClear-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mgrClearSec-clickLength').val(checkboxCount);
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
                                                            $('#ipv-advClear-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mgrClearSec-clickLength').val(checkboxCount);
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
                                        if($('#check-mgrClearSec-areaid').val() == "tb"){

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

                                    

                                    // console.log(checkboxCount);


                                    
                                    $('#check-mgrClearSec-clickLength').val(checkboxCount);

                                    if(checkboxCount > appNumber){
                                        swal({
                                            title: 'ท่านเลือกเกินจำนวนที่กำหนด',
                                            type: 'error',
                                            showConfirmButton: false,
                                            timer:1000
                                        }).then(function(){

                                            if($('#check-mgrClearSec-areaid').val() == "tb"){

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

                                            $('#ipv-advClear-appgd-'+data_autoid).prop('checked' , false);
                                            $('#check-mgrClearSec-clickLength').val(checkboxCount);
                                        });
                                    }
                                });
                        }

                    }
                });
            }
        }

        function getData_ManagerApprovedClear(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getData_ManagerApprovedClear' , {
                    action:"getData_ManagerApprovedClear",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){

                        let approveGroup = res.data.approveGroup;
                        let mgrApproveData = res.data.mgrApproveData;

                        if(mgrApproveData.wdf_mgrc_appr == "อนุมัติ"){

                            if(approveGroup != 5){
                                $('.lineMgrClearApp').css('display' , '');
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
                                        $('#check-mgrClearSec-totalLength').val(appNumber);
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
                                                        <input type="checkbox" id="ipv-advClear-appgd-`+appGroupDetail[ii].app_autoid+`" name="ipv-advClear-appgd[]" class="custom-control-input cbGroupDetailClear" `+checkedData+`>

                                                        <label for="ipv-advClear-appgd-`+appGroupDetail[ii].app_autoid+`" class="custom-control-label"><b>`+appGroupDetail[ii].app_user+`</b></label>
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
                                    $('#mainClearG-1').html(htmlg1);

                                    $('input:checkbox[name="ipv-advClear-appgd[]"]').on('click' , function(e){
                                        e.preventDefault();
                                    });


                                    getSectionGroup_4_to_0Clear(approveGroup , userApproved , formcode , areaid);
                            }

                        }


                        $('input:radio[name="ip-mgrClearSec-appro"]').on('click' , function(e){
                            e.preventDefault();
                        });

                        if(mgrApproveData.wdf_mgrc_appr == "อนุมัติ"){
                            $('#ip-mgrClearSec-appro-yes').prop('checked' , true);
                        }else{
                            $('#ip-mgrClearSec-appro-no').prop('checked' , true);
                        }

                        let condateMgr = moment(mgrApproveData.wdf_mgrc_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ip-mgrClearSec-userpost').val(mgrApproveData.wdf_mgrc_user).prop('readonly' , true);
                        $('#ip-mgrClearSec-deptpost').val(mgrApproveData.wdf_mgrc_dept).prop('readonly' , true);
                        $('#ip-mgrClearSec-datepost').val(condateMgr).prop('readonly' , true);
                        $('#ip-mgrClearSec-memo').val(mgrApproveData.wdf_mgrc_memo).prop('readonly' , true);
                        $('#btn-saveManagerClear').css('display' , 'none');
                    }
                });
            }
        }

        function getSectionGroup_4_to_0Clear(approveGroup , userApproved , formcode , areaid)
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
                    <form id="frm_save_paygroupClear-`+userApproved[i].apv_ecode+`" autocomplete="off" class="needs-validation" novalidate>
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <h4>`+userApproved[i].apv_posiname+`</h4>
                        </div>
                    </div>

                    <div class="advHr mt-3"></div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                        <div class="row">
                                            <div class="col-lg-12 form-inline">
                                                <div class="custom-control custom-radio mb-5 ml-3">
                                                    <input type="radio" id="ip-payGroupClearsec-appro-yes-`+userApproved[i].apv_ecode+`" name="ip-payGroupClearsec-appro-`+userApproved[i].apv_ecode+`" value="อนุมัติ" class="custom-control-input" required> 
                                                    <label for="ip-payGroupClearsec-appro-yes-`+userApproved[i].apv_ecode+`" class="custom-control-label">อนุมัติ</label>
                                                </div> 
                                                <div class="custom-control custom-radio mb-5 ml-3">
                                                    <input type="radio" id="ip-payGroupClearsec-appro-no-`+userApproved[i].apv_ecode+`" name="ip-payGroupClearsec-appro-`+userApproved[i].apv_ecode+`" value="ไม่อนุมัติ" class="custom-control-input" required> 
                                                    <label for="ip-payGroupClearsec-appro-no-`+userApproved[i].apv_ecode+`" class="custom-control-label">ไม่อนุมัติ</label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for=""><b>หมายเหตุ</b></label>
                                    <textarea name="ip-payGroupClearsec-memo-`+userApproved[i].apv_ecode+`" id="ip-payGroupClearsec-memo-`+userApproved[i].apv_ecode+`" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for=""><b>ผู้อนุมัติ</b></label>
                                    <input type="text" name="ip-payGroupClearsec-userpost-`+userApproved[i].apv_ecode+`" id="ip-payGroupClearsec-userpost-`+userApproved[i].apv_ecode+`" class="form-control" value="`+userApproved[i].apv_user+`" readonly>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for=""><b>ลงวันที่</b></label>
                                    <input type="text" name="ip-payGroupClearsec-datepost-`+userApproved[i].apv_ecode+`" id="ip-payGroupClearsec-datepost-`+userApproved[i].apv_ecode+`" class="form-control" value="<?php echo date("d/m/Y H:i:s") ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="btn_sectionPayGroupClear_`+userApproved[i].apv_ecode+`" class="row align-items-center" style="display:none;">
                        <div class="col-md-12 text-center">
                            <button type="button" id="btn-savePaygroupClear-`+userApproved[i].apv_ecode+`" name="btn-savePaygroupClear-`+userApproved[i].apv_ecode+`" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
                        </div>
                    </div>
                    <input hidden type="text" id="ip-payGroupClearsec-autoid-`+userApproved[i].apv_ecode+`" name="ip-payGroupClearsec-autoid-`+userApproved[i].apv_ecode+`" value="`+userApproved[i].apv_autoid+`">
                    <input hidden type="text" id="ip-payGroupClearsec-formcode-`+userApproved[i].apv_ecode+`" name="ip-payGroupClearsec-formcode-`+userApproved[i].apv_ecode+`" value="`+formcode+`">
                    <input hidden type="text" id="ip-payGroupClearsec-areaid-`+userApproved[i].apv_ecode+`" name="ip-payGroupClearsec-areaid-`+userApproved[i].apv_ecode+`" value="`+areaid+`">
                    <input hidden type="text" id="ip-payGroupClearsec-totalApp-`+userApproved[i].apv_ecode+`" name="ip-payGroupClearsec-totalApp-`+userApproved[i].apv_ecode+`" value="`+userApproved.length+`">
                    <input hidden type="text" id="ip-payGroupClearsec-group-`+userApproved[i].apv_ecode+`" name="ip-payGroupClearsec-group-`+userApproved[i].apv_ecode+`" value="`+userApproved[i].apv_group+`">
                    </form>
                    </div>
                    `;

                    
                }
            $('#payGroupClear_section').css('display' , '').html(payGroupHtml);
            let ecodeLogin = "<?php echo getUser()->ecode; ?>";
            $('#btn_sectionPayGroupClear_'+ecodeLogin).css('display' , '');


            for(let ii = 0; ii<userApproved.length;ii++){
                if(userApproved[ii].apv_approve != null){
                    let radioname = "ip-payGroupClearsec-appro-"+userApproved[ii].apv_ecode;
                    let condateApproved = moment(userApproved[ii].apv_approve_datetime).format('DD/MM/Y HH:mm:ss');

                    if(userApproved[ii].apv_approve == "อนุมัติ"){
                        $('#ip-payGroupClearsec-appro-yes-'+userApproved[ii].apv_ecode).prop('checked' , true);
                    }else if(userApproved[ii].apv_approve == "ไม่อนุมัติ"){
                        $('#ip-payGroupClearsec-appro-no-'+userApproved[ii].apv_ecode).prop('checked' , true);
                    }

                    $("input:radio[name="+radioname+"]").on('click' , function(e){
                        e.preventDefault();
                    });

                    $('#ip-payGroupClearsec-memo-'+userApproved[ii].apv_ecode).val(userApproved[ii].apv_approve_memo).prop('readonly' , true);
                    $('#ip-payGroupClearsec-userpost-'+userApproved[ii].apv_ecode).val(userApproved[ii].apv_approve_user);
                    $('#ip-payGroupClearsec-datepost-'+userApproved[ii].apv_ecode).val(condateApproved);
                    $('#btn-savePaygroupClear-'+userApproved[ii].apv_ecode).css('display','none');
                }
            }
            
        }


        $(document).on('click' , '#btn-savePaygroupClear-'+userecode , function(){
                let radioname = "ip-payGroupClearsec-appro-"+userecode;
            
                if($('input:radio[name='+radioname+']:checked').length == 0){
                    swal({
                        title: 'กรุณาตรวจสอบข้อมูลให้ถูกต้อง',
                        type: 'error',
                        showConfirmButton: false,
                        timer:1000
                    });
                }else{
                    if($('input:radio[name='+radioname+']:checked').val() == "ไม่อนุมัติ"){
                        if($("#ip-payGroupClearsec-memo-"+userecode).val() == ""){
                            swal({
                                title: 'กรุณาระบุเหตุผลกำกับด้วยค่ะ',
                                type: 'error',
                                showConfirmButton: false,
                                timer:1000
                            });
                        }else{
                            savePayGroupClear(userecode);
                        }
                    }else if($('input:radio[name='+radioname+']:checked').val() == "อนุมัติ"){
                        savePayGroupClear(userecode);
                    }
                }
        });

        function savePayGroupClear(ecode)
        {
            $('#btn-savePaygroupClear-'+ecode).prop('disabled' , true);
            const form = $('#frm_save_paygroupClear-'+ecode)[0];
            const data = new FormData(form);
            axios.post(url+'main/advance/savePayGroupClear' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:1000
                    }).then(function(){
                        location.href = url+'advance.html';
                    });
                }
            });
        }


        function getdata_apClearMoney(formcode , areaid , fnc_method = '')
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getdata_apClearMoney' , {
                    action:"getdata_apClearMoney",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let apClearData = res.data.apClearData;

                        if(apClearData.wdf_apc_appr != null){
                            let condateApClear = moment(apClearData.wdf_apc_datetime).format('DD/MM/Y HH:mm:ss');

                            if(apClearData.wdf_apc_appr == "ผ่าน"){
                                $('#ip-apClearSec-appro-yes').prop('checked' , true);
                            }else if(apClearData.wdf_apc_appr == "ไม่ผ่าน"){
                                $('#ip-apClearSec-appro-no').prop('checked' , true);
                            }

                            $('input:radio[name="ip-apClearSec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-apClearSec-user').val(apClearData.wdf_apc_user).prop('readonly' , true);
                            $('#ip-apClearSec-dept').val(apClearData.wdf_apc_dept).prop('readonly' , true);
                            $('#ip-apClearSec-date').val(condateApClear).prop('readonly' , true);
                            $('#ip-apClearSec-memo').val(apClearData.wdf_apc_memo).prop('readonly' , true);
                            $('#btn-saveapclear-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-apClearSec-appro-yes').prop('checked' ,true);

                            $('#ip-apClearSec-user').val(user).prop('readonly' , true);
                            $('#ip-apClearSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-apClearSec-date').val(datetime).prop('readonly' , true);

                            $('#check-apClearSec-formcode').val(formcode);
                            $('#check-apClearSec-areaid').val(areaid);
                            $('#check-apClearSec-fncMethod').val(fnc_method);
                        }

                    }
                });
            }
        }

        function getdata_accClearMoney(formcode , areaid , fnc_method = '')
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getdata_accClearMoney' , {
                    action:"getdata_accClearMoney",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let accClearData = res.data.accClearData;
                        let fncMethod = res.data.accClearData.wdf_fnc_method;

                        if(accClearData.wdf_accc_appr != null){
                            let condateAccClear = moment(accClearData.wdf_accc_datetime).format('DD/MM/Y HH:mm:ss');

                            if(accClearData.wdf_accc_appr == "ผ่าน"){
                                $('#ip-accClearSec-appro-yes').prop('checked' , true);
                            }else if(accClearData.wdf_accc_appr == "ไม่ผ่าน"){
                                $('#ip-accClearSec-appro-no').prop('checked' , true);
                            }

                            $('input:radio[name="ip-accClearSec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-accClearSec-user').val(accClearData.wdf_accc_user).prop('readonly' , true);
                            $('#ip-accClearSec-dept').val(accClearData.wdf_accc_dept).prop('readonly' , true);
                            $('#ip-accClearSec-date').val(condateAccClear).prop('readonly' , true);
                            $('#ip-accClearSec-memo').val(accClearData.wdf_accc_memo).prop('readonly' , true);
                            $('#btn-saveaccClear-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-accClearSec-appro-yes').prop('checked' , true);
                            $('#ip-accClearSec-user').val(user).prop('readonly' , true);
                            $('#ip-accClearSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-accClearSec-date').val(datetime).prop('readonly' , true);

                            $('#check-accClearSec-formcode').val(formcode);
                            $('#check-accClearSec-areaid').val(areaid);
                            $('#check-accClearSec-fncmethod').val(fncMethod);
                        }

                    }
                });
            }
        }


        function getdata_financeClearMoney2(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getdata_financeClearMoney2' , {
                    action:"getdata_financeClearMoney2",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let financeClearData = res.data.financeClearData;

                        if(financeClearData.wdf_fnc2_appr != null){
                            let condateFinanceClear = moment(financeClearData.wdf_fnc2_datetime).format('DD/MM/Y HH:mm:ss');

                            if(financeClearData.wdf_fnc2_appr == "ผ่าน"){
                                $('#ip-fnClearSec2-appro-yes').prop('checked' , true);
                            }else if(financeClearData.wdf_fnc2_appr == "ไม่ผ่าน"){
                                $('#ip-fnClearSec2-appro-no').prop('checked' , true);
                            }


                            $('input:radio[name="ip-fnClearSec2-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-fnClearSec2-user').val(financeClearData.wdf_fnc2_user).prop('readonly' , true);
                            $('#ip-fnClearSec2-dept').val(financeClearData.wdf_fnc2_dept).prop('readonly' , true);
                            $('#ip-fnClearSec2-date').val(condateFinanceClear).prop('readonly' , true);
                            $('#ip-fnClearSec2-memo').val(financeClearData.wdf_fnc2_memo).prop('readonly' , true);
                            $('#btn-savefnClear2-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-fnClearSec2-appro-yes').prop('checked' , true);
                            $('#ip-fnClearSec2-user').val(user).prop('readonly' , true);
                            $('#ip-fnClearSec2-dept').val(dept).prop('readonly' , true);
                            $('#ip-fnClearSec2-date').val(datetime).prop('readonly' , true);

                            $('#check-fnClearSec2-formcode').val(formcode);
                            $('#check-fnClearSec2-areaid').val(areaid);

                            
                        }
                        

                    }
                });
            }
        }


        function getdata_userReceiveClear(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getdata_userReceiveClear' , {
                    action:"getdata_userReceiveClear",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let userreceiveData = res.data.userreceiveData;

                        if(userreceiveData.wdf_urc2_signature != null){
                            let condateUserreceive = moment(userreceiveData.wdf_urc2_datetime).format('DD/MM/Y HH:mm:ss');


                            $('#ip-userReceiveClearSec-user').val(userreceiveData.wdf_urc2_user).prop('readonly' , true);
                            $('#ip-userReceiveClearSec-dept').val(userreceiveData.wdf_urc2_dept).prop('readonly' , true);
                            $('#ip-userReceiveClearSec-date').val(condateUserreceive).prop('readonly' , true);
                            $('#ip-userReceiveClearSec-memo').val(userreceiveData.wdf_urc2_memo).prop('readonly' , true);
                            $('#btn-saveUserreceiveClear-section').css('display' , 'none');
                            $('#smoothedClear').css('display','none');

                            $('#show_signatureClear').css('display' , '');
                            $('#show_sign_advClear').attr('src' , userreceiveData.wdf_urc2_signature);

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-userReceiveClearSec-user').val(user).prop('readonly' , true);
                            $('#ip-userReceiveClearSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-userReceiveClearSec-date').val(datetime).prop('readonly' , true);

                            $('#check-userReceiveClearSec-formcode').val(formcode);
                            $('#check-userReceiveClearSec-areaid').val(areaid);
                        }
                        

                    }
                });
            }
        }

        function getConditionTextByGroup(appGroup , areaid)
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


        function process_step_advance(status , appgroup , fnc_method , appgroup_clear)
        {
            if(status != "" || status != null){
                if(status == "Open" || status == "Edit"){
                    $('.adv-proc-open').addClass('active');

                }else if(status == "User cancel"){
                    $('.adv-proc-open').addClass('notactive');

                }else if(status == "Check budget already"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');

                }else if(status == "Manager approved" ||
                    status == "Wait Executive Group "+appgroup+" Approve"
                ){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                }else if(status == "Manager not approve"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('notactive');

                }else if(status == "Executive Group "+appgroup+" Approved"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    //เมื่อต้องมี Executive อนุมัติ
                    $('.adv-proc-excutive').css('display' , '').addClass('active');
                }else if(status == "Executive Group "+appgroup+" Not Approve"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    //เมื่อต้องมี Executive อนุมัติ
                    $('.adv-proc-excutive').css('display' , '').addClass('notactive');
                }else if(status == "AP passed inspection"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                }else if(status == "AP not pass inspection"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('notactive');

                }else if(status == "Account passed inspection"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');

                }else if(status == "Account not pass inspection"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('notactive');

                }else if(status == "Wait user receive money"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');

                }else if(status == "Finance not pass inspection"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('notactive');

                }else if(status == "Complete & Wait User Clear Money"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');

                }else if(status == "User upload document already"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('active');

                }else if(status == "Finance passed inspection (Clear Money)"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('active');
                    $('.adv-proc-financeClear').addClass('active');

                    if(fnc_method == "จ่ายเงินคืนให้ผู้ขอ"){
                        $('#process_step_clearNormal').css('display' , 'none');
                        $('#process_step_clearSpeacial').css('display' , '');
                    }

                }else if(status == "Wait user correct document (Clear Money)"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('rejectactive');
                    $('.adv-proc-financeClear').addClass('notactive');

                }else if(status == "Manager approved (Clear Money)" || status == "Wait Executive Group "+appgroup_clear+" Approve (Clear Money)"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('active');
                    $('.adv-proc-financeClear').addClass('active');

                    if(fnc_method == "จ่ายเงินคืนให้ผู้ขอ"){
                        $('#process_step_clearNormal').css('display' , 'none');
                        $('#process_step_clearSpeacial').css('display' , '');
                    }
                    $('.adv-proc-mgrClear').addClass('active');

                }else if(status == "Manager not approve (Clear Money)"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('active');
                    $('.adv-proc-financeClear').addClass('rejectactive');

                    if(fnc_method == "จ่ายเงินคืนให้ผู้ขอ"){
                        $('#process_step_clearNormal').css('display' , 'none');
                        $('#process_step_clearSpeacial').css('display' , '');
                    }
                    $('.adv-proc-mgrClear').addClass('notactive');

                }else if(status == "Executive Group "+appgroup_clear+" Approved (Clear Money)"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('active');
                    $('.adv-proc-financeClear').addClass('active');

                    if(fnc_method == "จ่ายเงินคืนให้ผู้ขอ"){
                        $('#process_step_clearNormal').css('display' , 'none');
                        $('#process_step_clearSpeacial').css('display' , '');
                    }
                    $('.adv-proc-mgrClear').addClass('active');
                    $('.adv-proc-excutiveClear').addClass('active');

                }else if(status == "Executive Group "+appgroup_clear+" Not Approve (Clear Money)"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('active');
                    $('.adv-proc-financeClear').addClass('rejectactive');

                    if(fnc_method == "จ่ายเงินคืนให้ผู้ขอ"){
                        $('#process_step_clearNormal').css('display' , 'none');
                        $('#process_step_clearSpeacial').css('display' , '');
                    }
                    $('.adv-proc-mgrClear').addClass('rejectactive');
                    $('.adv-proc-excutiveClear').addClass('notactive');

                }else if(status == "AP passed inspection (Clear Money)"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('active');
                    $('.adv-proc-financeClear').addClass('active');

                    if(fnc_method == "จ่ายเงินคืนให้ผู้ขอ"){
                        $('#process_step_clearNormal').css('display' , 'none');
                        $('#process_step_clearSpeacial').css('display' , '');
                    }else{
                        $('#process_step_clearNormal').css('display' , '');
                        $('#process_step_clearSpeacial').css('display' , 'none');
                    }
                    $('.adv-proc-mgrClear').addClass('active');
                    $('.adv-proc-excutiveClear').addClass('active');
                    $('.adv-proc-apClear').addClass('active');

                }else if(status == "AP not pass inspection (Clear Money)"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('active');
                    $('.adv-proc-financeClear').addClass('rejectactive');

                    if(fnc_method == "จ่ายเงินคืนให้ผู้ขอ"){
                        $('#process_step_clearNormal').css('display' , 'none');
                        $('#process_step_clearSpeacial').css('display' , '');
                    }
                    $('.adv-proc-mgrClear').addClass('rejectactive');
                    $('.adv-proc-excutiveClear').addClass('rejectactive');
                    $('.adv-proc-apClear').addClass('notactive');

                }else if(status == "Account passed inspection (Clear Money)"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('active');
                    $('.adv-proc-financeClear').addClass('active');

                    if(fnc_method == "จ่ายเงินคืนให้ผู้ขอ"){
                        $('#process_step_clearNormal').css('display' , 'none');
                        $('#process_step_clearSpeacial').css('display' , '');
                    }
                    $('.adv-proc-mgrClear').addClass('active');
                    $('.adv-proc-excutiveClear').addClass('active');
                    $('.adv-proc-apClear').addClass('active');
                    $('.adv-proc-accClear').addClass('active');

                }else if(status == "Account not pass inspection (Clear Money)"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('active');
                    $('.adv-proc-financeClear').addClass('rejectactive');

                    if(fnc_method == "จ่ายเงินคืนให้ผู้ขอ"){
                        $('#process_step_clearNormal').css('display' , 'none');
                        $('#process_step_clearSpeacial').css('display' , '');
                    }
                    $('.adv-proc-mgrClear').addClass('rejectactive');
                    $('.adv-proc-excutiveClear').addClass('rejectactive');
                    $('.adv-proc-apClear').addClass('rejectactive');
                    $('.adv-proc-accClear').addClass('notactive');

                }else if(status == "Wait user receive money (Clear Money)"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('active');
                    $('.adv-proc-financeClear').addClass('active');

                    if(fnc_method == "จ่ายเงินคืนให้ผู้ขอ"){
                        $('#process_step_clearNormal').css('display' , 'none');
                        $('#process_step_clearSpeacial').css('display' , '');
                    }
                    $('.adv-proc-mgrClear').addClass('active');
                    $('.adv-proc-excutiveClear').addClass('active');
                    $('.adv-proc-apClear').addClass('active');
                    $('.adv-proc-accClear').addClass('active');
                    $('.adv-proc-financeClear2').addClass('active');

                }else if(status == "Finance 2 not pass inspection (Clear Money)"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('active');
                    $('.adv-proc-financeClear').addClass('rejectactive');

                    if(fnc_method == "จ่ายเงินคืนให้ผู้ขอ"){
                        $('#process_step_clearNormal').css('display' , 'none');
                        $('#process_step_clearSpeacial').css('display' , '');
                    }
                    $('.adv-proc-mgrClear').addClass('rejectactive');
                    $('.adv-proc-excutiveClear').addClass('rejectactive');
                    $('.adv-proc-apClear').addClass('rejectactive');
                    $('.adv-proc-accClear').addClass('rejectactive');
                    $('.adv-proc-financeClear2').addClass('notactive');

                }else if(status == "Clear money complete"){
                    $('.adv-proc-open').addClass('active');
                    $('.adv-proc-budget').addClass('active');
                    $('.adv-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.adv-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.adv-proc-ap').addClass('active');
                    $('.adv-proc-acc').addClass('active');
                    $('.adv-proc-finance').addClass('active');
                    $('.adv-proc-userreceive').addClass('active');
                    $('.adv-proc-userClear').addClass('active');
                    $('.adv-proc-financeClear').addClass('active');

                    if(fnc_method == "จ่ายเงินคืนให้ผู้ขอ"){
                        $('#process_step_clearNormal').css('display' , 'none');
                        $('#process_step_clearSpeacial').css('display' , '');
                    }

                    $('.adv-proc-mgrClear').addClass('active');
                    $('.adv-proc-excutiveClear').addClass('active');
                    $('.adv-proc-apClear').addClass('active');
                    $('.adv-proc-accClear').addClass('active');
                    $('.adv-proc-financeClear2').addClass('active');
                    $('.adv-proc-userreceiveClear').addClass('active');

                }
            }
        }


        function getAdvCurrencyFromDb(currency)
        {
            if(currency === null){
                currency = "THB";
            }
            axios.get(url+'main/advance/getAdvCurrencyFromDb').then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let result = res.data.result;
                    let output = ``;
                    for(let i = 0; i < result.length ; i++){
                        output +=`
                        <option value="`+result[i].cu_name+`">`+result[i].cu_name+`</option>
                        `;
                    }
                    $('#ipv-adv-currency').html(output);
                    $('#ipv-adv-currency').attr("style", "pointer-events: none;");
                    $('#ipv-adv-currency option[value="'+currency+'"]').prop("selected" , true);

                    if(currency !== ""){
                        $('.bgBath').text(currency);
                        $('.bgBath2').text(currency);
                    }

                    if(currency !== "THB"){
                        $('#ip-advdetail-vat7-clear').attr("style", "pointer-events: none;");
                        $('#ip-advdetail-vat3-clear').attr("style", "pointer-events: none;");
                        vat3 = 0;
                        vat7 = 0;
                    }else{
                        $('#ip-advdetail-vat7-clear').attr("style", "pointer-events: ;");
                        $('#ip-advdetail-vat3-clear').attr("style", "pointer-events: ;");
                    }

                  
                }
            });
        }
        





        



        



    });
</script>