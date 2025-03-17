<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแสดงข้อมูลฉบับเต็ม ใบขอเบิกจ่าย</title>


</head>
<body>
    <div class="main-container">
        <div class="pd-ltr-20">

            <div id="btnControlBar_nor" class="card-box pd-20 height-100-p mb-30" style="display:none;">
                <button type="button" id="btn-editnormal" name="btn-editnormal" class="btn btn-warning"><i class="dw dw-edit-file mr-2"></i>แก้ไข</button>
                <button type="button" id="btn-cancelnormal" name="btn-cancelnormal" class="btn btn-danger"><i class="dw dw-file-21 mr-2"></i>ยกเลิกเอกสาร</button>
            </div>

            <div class="card-box pd-20 height-100-p mb-30">

                <div id="exportform-section-nor" class="mb-2" style="display:none;">
                    <a href="<?=base_url('main/normal/normal_printform/').$formcode."/".$formno?>" target="_blank"><button type="button" id="printForm-nor" name="printForm-nor" class="btn btn-secondary">ปริ้นฟอร์ม</button></a>
                </div>

                <div class="row align-items-center">
					<div class="col-md-12 text-center">
						<h4>ใบขอเบิกจ่าย ( Normal )</h4>
                        <h6 class="mt-2">เอกสารเลขที่ <span id="showFormno_nor"></span></h6>
                        <h6 class="mt-2">สถานะ <span id="showFormStatus_nor"></span></h6>
					</div>
				</div>
				<hr class="norHr">

                <div id="process_step_section_nor">
                    <?=$this->load->view("normal/normal_process_step")?>
                </div>

                <hr class="norHr">

                <div class="card-box pd-20 height-100-p mb-30">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>บริษัท</b></label>
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-nor-areaid-sc" name="ipv-nor-areaid" value="sc" class="custom-control-input"> 
                                        <label for="ipv-nor-areaid-sc" class="custom-control-label">Salee Colour Public Company Limited.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-nor-areaid-pa" name="ipv-nor-areaid" value="pa" class="custom-control-input"> 
                                        <label for="ipv-nor-areaid-pa" class="custom-control-label">Poly Meritasia Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-nor-areaid-ca" name="ipv-nor-areaid" value="ca" class="custom-control-input"> 
                                        <label for="ipv-nor-areaid-ca"class="custom-control-label">Composite Asia Co.,Ltd.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-nor-areaid-st" name="ipv-nor-areaid" value="st" class="custom-control-input"> <label for="ipv-nor-areaid-st" class="custom-control-label">Subterra Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-nor-areaid-tb" name="ipv-nor-areaid" value="tb" class="custom-control-input"> 
                                        <label for="ipv-nor-areaid-tb"class="custom-control-label">The bubbles Co.,Ltd.</label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>หมายเหตุ</b></label>
                            <input type="text" name="ipv-nor-memo" id="ipv-nor-memo" class="form-control" readonly>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for=""><b>ชื่อผู้ร้องขอ</b></label>
                            <input type="text" name="ipv-nor-username" id="ipv-nor-username" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>รหัสพนักงาน</b></label>
                            <input type="text" name="ipv-nor-ecode" id="ipv-nor-ecode" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>แผนก</b></label>
                            <input type="text" name="ipv-nor-dept" id="ipv-nor-dept" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>วันที่ออกเอกสาร</b></label>
                            <input type="text" name="ipv-nor-date" id="ipv-nor-date" class="form-control" readonly>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for=""><b>ชื่อผู้รับเงิน</b></label>
                            <input type="text" name="ipv-nor-userreceive" id="ipv-nor-userreceive" class="form-control" readonly>
                        </div>
                        <div class="col-md-8">
                            <label for=""><b>รายละเอียดผู้รับเงิน</b></label>
                            <input type="text" name="ipv-nor-userreceiveDetail" id="ipv-nor-userreceiveDetail" class="form-control" readonly>
                        </div>
                    </div>
                    <hr>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for=""><b>สกุลเงิน</b></label>
                            <select name="ipv-nor-currency" id="ipv-nor-currency" class="form-control" readonly></select>
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
                                        <table id="tbl_normal_new_view" class="table table-bordered table-striped">
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
                                            <tbody id="showDataNorlistAftersave_view"></tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-nordetail-priceNonVat" id="ipv-nordetail-priceNonVat" class="form-control" placeholder="ยอดรวม" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ipv-nordetail-vat7" id="ipv-nordetail-vat7" class="form-control" readonly>
                                        <option value="0">ไม่มี Vat</option>
                                        <option value="7">Vat 7%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-nordetail-vat7Price" id="ipv-nordetail-vat7Price" class="form-control" placeholder="จำนวนเงิน Vat" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ipv-nordetail-vat3" id="ipv-nordetail-vat3" class="form-control" readonly>
                                        <option value="0">ไม่มี หัก ณ ที่จ่าย</option>
                                        <option value="1">หัก ณ ที่จ่าย 1%</option>
                                        <option value="2">หัก ณ ที่จ่าย 2%</option>
                                        <option value="3">หัก ณ ที่จ่าย 3%</option>
                                        <option value="5">หัก ณ ที่จ่าย 5%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-nordetail-vat3Price" id="ipv-nordetail-vat3Price" class="form-control" placeholder="จำนวนเงินหัก ณ ที่จ่าย" readonly>
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
                                        <input type="text" name="ipv-nordetail-priceTotal" id="ipv-nordetail-priceTotal" class="form-control" placeholder="ยอดรวมสุทธิ" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12 bottommargin">
                                    <label><b>รูปภาพ , เอกสารที่เกี่ยวข้อง</b></label><br>
                                    <div id="normal_showImage_view" class="row form-group"></div>
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

                <div id="checkbudget_section_nor" style="display:none;">
                    <?=$this->load->view("normal/normal_checkbudget")?>
                </div>
                
                <div id="manager_section_nor" style="display:none;">
                    <?=$this->load->view("normal/normal_manager")?>
                </div>

                <div id="payGroup_section_nor" style="display:none;"></div>

                <div id="ap_section_nor" style="display:none;">
                    <?=$this->load->view("normal/normal_ap")?>
                </div>

                <div id="account_section_nor" style="display:none;">
                    <?=$this->load->view("normal/normal_account")?>
                </div>

                <div id="finance_section_nor" style="display:none;">
                    <?=$this->load->view("normal/normal_finance")?>
                </div>

                <div id="userreceive_section_nor" style="display:none;">
                    <?=$this->load->view("normal/normal_userreceive")?>
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
        getUserPermission_nor(userecode);


        // Control print button
        if(userdeptcode == 1003 || userecode == "M1809"){
            $('#exportform-section-nor').css('display' , '');
        }else{
            $('#exportform-section-nor').css('display' , 'none');
        }


        function getUserPermission_nor(ecode)
        {
            if(ecode != ""){
                axios.post(url+'main/normal/getUserPermission_nor' , {
                    action:"getUserPermission_nor",
                    ecode:ecode
                }).then(res=>{
                    // console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        if(res.data.result != null){
                            userpermission = res.data.result;
                            console.log(userpermission);
                        }
                        normal_getDataviewfull();
                    }
                });
            }
        }

        function normal_getDataviewfull()
        {
            if(formcode != ""){
                axios.post(url+'main/normal/normal_getDataviewfull' , {
                    action:'normal_getDataviewfull',
                    formcode:formcode,
                    formno:formno
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){

                        if(res.data.viewfulldata.wdf_status == "Open" || res.data.viewfulldata.wdf_status == "Edit"){
                            if(res.data.viewfulldata.wdf_ecode == userecode){
                                $('#btnControlBar_nor').css('display' , '');
                            }
                            
                        }else if(res.data.viewfulldata.wdf_status == "User cancel"){
                            $('#btnControlBar_nor').css('display' , 'none');
                        }else{
                            $('#btnControlBar_nor').css('display' , 'none');
                        }

                        $('input:radio[name="ipv-nor-areaid"]').on('click' , function(e){
                            e.preventDefault();
                        });

                        // get status to text
                        let resultTextColor = checkStatus_text(res.data.viewfulldata.wdf_status);
                        let status = `<span `+resultTextColor+`>`+res.data.viewfulldata.wdf_status+`</span>`;
                        $('#showFormStatus_nor').html(status);

                        $('#showFormno_nor').html(res.data.viewfulldata.wdf_formno);
                        $('#btn-editnormal').attr({
                            'data_formcode':formcode,
                            'data_formno':formno,
                        });
                        $('#btn-cancelnormal').attr('data_formcode' , formcode);

                        if(res.data.viewfulldata.wdf_areaid == "sc"){
                            $('#ipv-nor-areaid-sc').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "pa"){
                            $('#ipv-nor-areaid-pa').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "ca"){
                            $('#ipv-nor-areaid-ca').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "st"){
                            $('#ipv-nor-areaid-st').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "tb"){
                            $('#ipv-nor-areaid-tb').prop('checked' , true);
                        }

                        let condate = moment(res.data.viewfulldata.wdf_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ipv-nor-memo').val(res.data.viewfulldata.wdf_memo);
                        $('#ipv-nor-username').val(res.data.viewfulldata.wdf_user);
                        $('#ipv-nor-ecode').val(res.data.viewfulldata.wdf_ecode);
                        $('#ipv-nor-dept').val(res.data.viewfulldata.wdf_dept);
                        $('#ipv-nor-date').val(condate);
                        $('#ipv-nor-userreceive').val(res.data.viewfulldata.wdf_userreceive);
                        $('#ipv-nor-userreceiveDetail').val(res.data.viewfulldata.wdf_userreceived_detail);

                        // if(res.data.viewfulldata.wdf_vat1 == 7){
                        //     $('#ipv-advdetail-vat7 option[value="7"]').prop("selected" , true);
                        // }else{
                        //     $('#ipv-advdetail-vat7 option[value="0"]').prop("selected" , true);
                        // }
                        
                        let convat1ToInt = parseInt(res.data.viewfulldata.wdf_vat1);
                        $('#ipv-nordetail-vat7 option[value="'+convat1ToInt+'"]').prop("selected" , true);

                        let convat2ToInt = parseInt(res.data.viewfulldata.wdf_vat2);
                        $('#ipv-nordetail-vat3 option[value="'+convat2ToInt+'"]').prop("selected" , true);

                        $('#ipv-nordetail-priceNonVat').val(res.data.viewfulldata.wdf_pricenonevat);
                        $('#ipv-nordetail-vat7Price').val(res.data.viewfulldata.wdf_pricevat1);
                        $('#ipv-nordetail-vat3Price').val(res.data.viewfulldata.wdf_pricevat2);
                        $('#ipv-nordetail-priceTotal').val(res.data.viewfulldata.wdf_pricewithvat);

                        conpriceWithComma('#ipv-nordetail-priceNonVat');
                        conpriceWithComma('#ipv-nordetail-vat7Price');
                        conpriceWithComma('#ipv-nordetail-vat3Price');
                        conpriceWithComma('#ipv-nordetail-priceTotal');

                        $('#ipv-nordetail-vat7').attr("style", "pointer-events: none;");
                        $('#ipv-nordetail-vat3').attr("style", "pointer-events: none;");

                        let currency = res.data.viewfulldata.wdf_currency;
                        getNorCurrencyFromDb(currency);

                        // WDF Trans Detail
                        let wdf_trans = res.data.viewfulldata_trans;
                        let wdf_trans_html = ``;
                        let runningnumber = 1;
                        $('#tbl_normal_new_view').DataTable().destroy();
                        $('#tbl_normal_new_view').DataTable();
                        
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
                        $('#showDataNorlistAftersave_view').html(wdf_trans_html);

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
                        $('#normal_showImage_view').html(imageHtml);

                        checkstatus_controlsection_nor(res.data.viewfulldata.wdf_status , formcode , res.data.viewfulldata.wdf_areaid ,res.data.viewfulldata.wdf_pricewithvat , res.data.viewfulldata.wdf_appgroup , res.data.viewfulldata.wdf_fnc_method , res.data.viewfulldata.wdf_fnc_money , res.data.viewfulldata.wdf_deptcode , res.data.viewfulldata.wdf_ecode);
                         
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

        $(document).on('click' , '#btn-editnormal' , function(){
            const data_formcode = $(this).attr("data_formcode");
            const data_formno = $(this).attr("data_formno");
            location.href = url+'main/normal/normal_edit_page/'+data_formcode+'/'+data_formno;
        });

        $(document).on('click' , '#btn-cancelnormal' , function(){
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
                        cancel_nor(data_formcode);
                    }
                });
            }
        });

        function cancel_nor(data_formcode)
        {
            if(data_formcode != ""){
                axios.post(url+'main/normal/cancel_nor' , {
                    action:'cancel_nor',
                    data_formcode:data_formcode
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Update Data Success"){
                        location.href = url+'normal.html';
                    }
                });
            }
        }

        function checkstatus_controlsection_nor(status , formcode , areaid , pricewithVat , appgroup , fnc_method , fnc_money , doc_deptcode , doc_ecode)
        {
            switch(status){
                case "Open":

                    // Section check budget open
                    $('#checkbudget_section_nor').css('display' , '');
                    // control input

                    if(userpermission.u_budget_section == "yes"){
                        $('#ip-nor-bgsec-user').val("<?php echo getUser()->Fname." ".getUser()->Lname; ?>").prop('readonly' , true);
                        $('#ip-nor-bgsec-dept').val("<?php echo getUser()->Dept; ?>").prop('readonly' , true);
                        $('#ip-nor-bgsec-datetime').val("<?php echo date("d/m/Y H:i:s"); ?>").prop('readonly' , true);
                        $('#check_formcode_bg_nor').val(formcode);
                        $('#check_areaid_bg_nor').val(areaid);
                        $(document).on('keyup' , '#ip-nor-bgsec-creditlimit' ,function(){
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
                        $('#ip-nor-bgsec-user , #ip-nor-bgsec-dept , #ip-nor-bgsec-datetime , #ip-nor-bgsec-creditlimit , #ip-nor-bgsec-memo').prop('readonly' , true);
                        $('#btn-nor-savecheckbudget').css('display' , 'none');
                    }

                    // Section check budget

                    break;
                case "Edit":

                    // Section check budget open
                    $('#checkbudget_section_nor').css('display' , '');
                    // control input

                    if(userpermission.u_budget_section == "yes"){
                        $('#ip-nor-bgsec-user').val("<?php echo getUser()->Fname." ".getUser()->Lname; ?>").prop('readonly' , true);
                        $('#ip-nor-bgsec-dept').val("<?php echo getUser()->Dept; ?>").prop('readonly' , true);
                        $('#ip-nor-bgsec-datetime').val("<?php echo date("d/m/Y H:i:s"); ?>").prop('readonly' , true);
                        $('#check_formcode_bg_nor').val(formcode);
                        $('#check_areaid_bg_nor').val(areaid);
                        $(document).on('keyup' , '#ip-nor-bgsec-creditlimit' ,function(){
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
                        $('#ip-nor-bgsec-user , #ip-nor-bgsec-dept , #ip-nor-bgsec-datetime , #ip-nor-bgsec-creditlimit , #ip-nor-bgsec-memo').prop('readonly' , true);
                        $('#btn-nor-savecheckbudget').css('display' , 'none');
                    }

                    // Section check budget

                    break;
                case "Check budget already":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget


                    // Check Manager Section
                    if(doc_deptcode == userdeptcode && userposi > 55){
                        $('#manager_section_nor').css('display' , '');
                        checkpaygroup_nor(pricewithVat , 'wdf' , areaid , formcode);
                    }else if(areaid == "tb" && userecode == "M0051" || areaid == "tb" && userecode == "M2076" || areaid == "tb" && userecode == "M0963"){
                        $('#manager_section_nor').css('display' , '');
                        checkpaygroup_nor(pricewithVat , 'wdf' , areaid , formcode);
                    }else if(doc_deptcode == '1007'){
                        if(userecode == "M0040" || userecode == "M0506"){
                            $('#manager_section_nor').css('display' , '');
                            checkpaygroup_nor(pricewithVat , 'wdf' , areaid , formcode);
                        }
                    }else if(doc_deptcode == '1010'){
                        if(userecode == "M0025"){
                            $('#manager_section_nor').css('display' , '');
                            checkpaygroup_nor(pricewithVat , 'wdf' , areaid , formcode);
                        }
                    }else if(areaid == "st" && userecode == "M0025"){
                        //แก้ไขจากเดิม M2180 K teerasak เป็นคุณ saowanit อนุมัติแทน 23-12-2024
                        $('#manager_section_nor').css('display' , '');
                        checkpaygroup_nor(pricewithVat , 'wdf' , areaid , formcode);
                    }else if(doc_deptcode == '1014' || doc_deptcode == '1015'){
                        if(userecode == "M0112"){
                            $('#manager_section_nor').css('display' , '');
                            checkpaygroup_nor(pricewithVat , 'wdf' , areaid , formcode);
                        }
                    }
                    // Section manager approve

                    if(areaid == "tb"){
                        if(userecode == "M0051" || 
                        userecode == "M1809" || 
                        userecode == "M2076" || 
                        userecode == "M2222" || 
                        userecode == "M0963"){
                            $('#btn-nor-saveManager').css('display' , '');
                        }else{
                            $('#btn-nor-saveManager').css('display' , 'none');
                        }
                    }
                    // Section manager approve

                    break;
                case "Manager approved":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    if(appgroup == 5){
                        $('#ap_section_nor').css('display' , '');

                        if(userpermission.u_ap_section == "yes"){
                            getdata_apApprove_nor(formcode , areaid);
                        }else{
                            $('#ip-nor-apsec-user , #ip-nor-apsec-dept , #ip-nor-apsec-date , #ip-nor-apsec-memo').prop('readonly' , true);
                            $('#btn-nor-saveAP').css('display' , 'none');
                            $('input:radio[id="ip-nor-apsec-money-1"]').prop('checked' , false);
                        }
                        
                    }
                    
                    
                    break;
                case "Wait Executive Group 0 Approve":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Wait Executive Group 1 Approve":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // Check Pay Group for show Another Section
                    break;
                case "Wait Executive Group 2 Approve":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // Check Pay Group for show Another Section
                    
                    break;
                case "Wait Executive Group 3 Approve":
                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    break;
                case "Wait Executive Group 4 Approve":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Executive Group 0 Approved":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section_nor').css('display' , '');


                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove_nor(formcode , areaid);
                    }else{
                        $('#ip-nor-apsec-user , #ip-nor-apsec-dept , #ip-nor-apsec-date , #ip-nor-apsec-memo').prop('readonly' , true);
                        $('#btn-nor-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-nor-apsec-money-1"]').prop('checked' , false);
                    }

                    break;
                case "Executive Group 1 Approved":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section_nor').css('display' , '');


                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove_nor(formcode , areaid);
                    }else{
                        $('#ip-nor-apsec-user , #ip-nor-apsec-dept , #ip-nor-apsec-date , #ip-nor-apsec-memo').prop('readonly' , true);
                        $('#btn-nor-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-nor-apsec-money-1"]').prop('checked' , false);
                    }
                    
                    break;
                case "Executive Group 2 Approved":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section_nor').css('display' , '');


                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove_nor(formcode , areaid);
                    }else{
                        $('#ip-nor-apsec-user , #ip-nor-apsec-dept , #ip-nor-apsec-date , #ip-nor-apsec-memo').prop('readonly' , true);
                        $('#btn-nor-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-nor-apsec-money-1"]').prop('checked' , false);
                    }

                    break;
                case "Executive Group 3 Approved":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section_nor').css('display' , '');


                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove_nor(formcode , areaid);
                    }else{
                        $('#ip-nor-apsec-user , #ip-nor-apsec-dept , #ip-nor-apsec-date , #ip-nor-apsec-memo').prop('readonly' , true);
                        $('#btn-nor-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-nor-apsec-money-1"]').prop('checked' , false);
                    }
                    
                    break;
                case "Executive Group 4 Approved":
                    
                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // AP Section
                    $('#ap_section_nor').css('display' , '');


                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove_nor(formcode , areaid);
                    }else{
                        $('#ip-nor-apsec-user , #ip-nor-apsec-dept , #ip-nor-apsec-date , #ip-nor-apsec-memo').prop('readonly' , true);
                        $('#btn-nor-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-nor-apsec-money-1"]').prop('checked' , false);
                    }

                    break;
                case "Executive Group 0 Not Approve":
                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    break;
                case "Executive Group 1 Not Approve":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Executive Group 2 Not Approve":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Executive Group 3 Not Approve":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    
                    break;
                case "Executive Group 4 Not Approve":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // Check Pay Group for show Another Section
                    break;
                case "Manager not approve":
                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve


                    // Check Pay Group for show Another Section
                    break;
                case "AP passed inspection":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_nor').css('display' , '');
                    getdata_apApprove_nor(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_nor').css('display' , '');
                    
                    if(userpermission.u_acc_section == "yes"){
                        getdata_accApprove_nor(formcode , areaid);
                    }else{
                        $('#ip-nor-accSec-user , #ip-nor-accSec-dept , #ip-nor-accSec-date , #ip-nor-accSec-memo').prop('readonly' , true);
                        $('#btn-nor-saveAcc').css('display' , 'none');
                    }
                    
                    break;
                case "AP not pass inspection":
                    
                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_nor').css('display' , '');
                    getdata_apApprove_nor(formcode , areaid);
                    
                    break;
                    break;
                case "Account passed inspection":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_nor').css('display' , '');
                    getdata_apApprove_nor(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_nor').css('display' , '');
                    getdata_accApprove_nor(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section_nor').css('display' , '');

                    if(userpermission.u_finance_section == "yes"){
                        getdata_financeApprove_nor(formcode , areaid);
                    }else{
                        $('#ip-nor-fnSec-user , #ip-nor-fnSec-dept , #ip-nor-fnSec-date , #ip-nor-fnSec-memo').prop('readonly' , true);
                        $('#btn-nor-saveFn').css('display' , 'none');
                    }

                    break;
                case "Account not pass inspection":

                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_nor').css('display' , '');
                    getdata_apApprove_nor(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_nor').css('display' , '');
                    getdata_accApprove_nor(formcode , areaid);

                    break;
                case "Wait user receive money":
                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_nor').css('display' , '');
                    getdata_apApprove_nor(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_nor').css('display' , '');
                    getdata_accApprove_nor(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section_nor').css('display' , '');
                    getdata_financeApprove_nor(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section_nor').css('display' , '');

                    if(userpermission.u_userreceive_section == "yes"){
                        getdata_userReceive_nor(formcode , areaid);
                    }else{
                        $('#ip-nor-userReceiveSec-user , #ip-nor-userReceiveSec-dept , #ip-nor-userReceiveSec-date , #ip-nor-userReceiveSec-memo').prop('readonly' , true);
                        $('#btn-nor-saveUserreceive').css('display' , 'none');
                    }

                    break;
                case "Finance not pass inspection":
                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_nor').css('display' , '');
                    getdata_apApprove_nor(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_nor').css('display' , '');
                    getdata_accApprove_nor(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section_nor').css('display' , '');
                    getdata_financeApprove_nor(formcode , areaid);
                    break;
                case "Complete":
                    // Section check budget
                    $('#checkbudget_section_nor').css('display' , '');
                    getdata_checkbudget_nor(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_nor').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_nor(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_nor').css('display' , '');
                    getdata_apApprove_nor(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_nor').css('display' , '');
                    getdata_accApprove_nor(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section_nor').css('display' , '');
                    getdata_financeApprove_nor(formcode , areaid);

                    // Section Wait User Receive Money
                    $('#userreceive_section_nor').css('display' , '');
                    getdata_userReceive_nor(formcode , areaid);

                    break;


    
            }

            process_step_normal(status , appgroup);
        }

        function getdata_checkbudget_nor(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/normal/getdata_checkbudget_nor' , {
                    action:'getdata_checkbudget_nor',
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let bgdata = res.data.checkbudgetData;
                        let condate = moment(bgdata.wdf_bg_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ip-nor-bgsec-user').val(bgdata.wdf_bg_user).prop('readonly' , true);
                        $('#ip-nor-bgsec-dept').val(bgdata.wdf_bg_dept).prop('readonly' , true);
                        $('#ip-nor-bgsec-datetime').val(condate).prop('readonly' , true);
                        $('#ip-nor-bgsec-creditlimit').val(numberWithCommas(bgdata.wdf_bg_creditlimit)).prop('readonly' , true);
                        $('#ip-nor-bgsec-memo').val(bgdata.wdf_bg_memo).prop('readonly' , true);
                        $('#btn-nor-savecheckbudget').css('display' , 'none');
                    }
                });
            }
        }

        function checkpaygroup_nor(pricewithVat , doctype , areaid , formcode)
        {
            let approveGroup = '';
            let areaidGroup = '';
            let paygroupid = '';
            if(pricewithVat != "" && doctype != "" && areaid != ""){
                
                pricewithVat = parseFloat(pricewithVat);
                axios.post(url+'main/normal/checkpaygroup_nor' , {
                    action:'checkpaygroup_nor',
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

                        $('#check-mg-paygroupid-nor').val(paygroupid);
                        $('#check-mg-group-nor').val(approveGroup);
                        $('#check-mg-areaid-nor').val(areaid);
                        $('#check-mg-formcode-nor').val(formcode);
                        $('#check-mg-groupareaid-nor').val(areaidGroup);

                        $('#ip-nor-mgrsec-userpost').val("<?php echo getUser()->Fname." ".getUser()->Lname; ?>").prop('readonly' , true);
                        $('#ip-nor-mgrsec-deptpost').val("<?php echo getUser()->Dept; ?>").prop('readonly' , true);
                        $('#ip-nor-mgrsec-datepost').val("<?php echo date("d/m/Y H:i:s"); ?>").prop('readonly' , true);

                        console.log(approveGroup+','+areaidGroup+','+paygroupid);
                        getdata_approveGroup_nor(approveGroup , areaidGroup , formcode , areaid);
                    }
                });
            }

        }



        function getdata_approveGroup_nor(approveGroup , areaidGroup , formcode , areaid)
        {
            if(approveGroup != "" && areaidGroup != ""){
                axios.post(url+'main/normal/getdata_approveGroup_nor' , {
                    action:'getdata_approveGroup_nor',
                    approveGroup:approveGroup,
                    areaidGroup:areaidGroup,
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    //การแสดงผลของตัวเลือก ผู้จัดการคนที่สองโดนล็อคด้วยรหัสแผนก 
                    if(res.data.status == "Select Data Success"){
                        let check_userecode = "<?php echo getUser()->ecode; ?>";
                        if(approveGroup != 5){
                            $('.lineMgrApp_nor').css('display' , '');
                            let appGroup = res.data.appGroup;
                            let appGroupDetail = res.data.appGroupDetail;
                            let htmlPay = ``;
                            let appNumber = null;

                            let htmlg1 = `
                                <div class="col-md-12 form-group">
                            `;
                                for(let i = 0 ; i < appGroup.length; i++){
                                    appNumber = appGroup[i].app_number;
                                    $('#check-mg-totalLength-nor').val(appNumber);
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
                                                        <input type="checkbox" id="ipv-nor-appgd-`+appGroupDetail[ii].app_autoid+`" name="ipv-nor-appgd[]" class="custom-control-input cbGroupDetail_nor" value="`+appGroupDetail[ii].app_ecode+`"
                                                        data_autoid="`+appGroupDetail[ii].app_autoid+`"
                                                        data_group="`+appGroupDetail[ii].app_group+`"
                                                        data_posiname="`+appGroupDetail[ii].app_posiname+`"
                                                        >

                                                        <label for="ipv-nor-appgd-`+appGroupDetail[ii].app_autoid+`" class="custom-control-label"><b>`+appGroupDetail[ii].app_user+`</b></label>
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
                                let condition = getConditionTextByGroup_nor(approveGroup , areaid);
                                htmlg1 +=`
                                <div class="col-md-12 form-group">
                                    <span class="conditionText">`+condition+`</span>
                                </div>
                                `;

                                $('#mainG-1-nor').html(htmlg1);

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

                                $(document).on('click' , '.cbGroupDetail_nor' , function(){
                                    const data_autoid = $(this).attr('data_autoid');
                                    const data_group = $(this).attr('data_group');
                                    const data_posiname = $(this).attr('data_posiname');

                                    if($(this).is(':checked')){

                                        if($('#check-mg-areaid-nor').val() == "tb"){

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
                                                            $('#ipv-nor-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= checkBoxCountT1;
                                                            $('#check-mg-clickLength-nor').val(checkboxCount);
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
                                                            $('#ipv-nor-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= checkBoxCountT2;
                                                            $('#check-mg-clickLength-nor').val(checkboxCount);
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
                                                            $('#ipv-nor-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength-nor').val(checkboxCount);
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
                                                            $('#ipv-nor-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength-nor').val(checkboxCount);
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
                                                            $('#ipv-nor-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength-nor').val(checkboxCount);
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
                                                            $('#ipv-nor-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength-nor').val(checkboxCount);
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
                                                            $('#ipv-nor-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength-nor').val(checkboxCount);
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
                                                            $('#ipv-nor-appgd-'+data_autoid).prop('checked' , false);
                                                            checkboxCount -= 1;
                                                            $('#check-mg-clickLength-nor').val(checkboxCount);
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
                                        if($('#check-mg-areaid-nor').val() == "tb"){

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

                                    $('#check-mg-clickLength-nor').val(checkboxCount);

                                    if(checkboxCount > appNumber){
                                        swal({
                                            title: 'ท่านเลือกเกินจำนวนที่กำหนด',
                                            type: 'error',
                                            showConfirmButton: false,
                                            timer:1000
                                        }).then(function(){

                                            if($('#check-mg-areaid-nor').val() == "tb"){

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




                                            $('#ipv-nor-appgd-'+data_autoid).prop('checked' , false);
                                            $('#check-mg-clickLength-nor').val(checkboxCount);
                                        });
                                    }
                                });
                        }

                    }
                });
            }
        }

        function getData_ManagerApproved_nor(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/normal/getData_ManagerApproved_nor' , {
                    action:"getData_ManagerApproved_nor",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){

                        let approveGroup = res.data.approveGroup;
                        let mgrApproveData = res.data.mgrApproveData;

                        if (mgrApproveData.wdf_mgr_appr == "อนุมัติ") {
                            if (approveGroup != 5) {
                                $('.lineMgrApp_nor').css('display', '');
                                let appGroup = res.data.appGroup;
                                let appGroupDetail = res.data.appGroupDetail;
                                let userApproved = res.data.userApproved;

                                let htmlg1 = `<div class="col-md-12 form-group">`;

                                for (let i = 0; i < appGroup.length; i++) {
                                    let appNumber = appGroup[i].app_number;
                                    $('#check-mg-totalLength-nor').val(appNumber);

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
                                            <input type="checkbox" id="ipv-nor-appgd-${data.autoid}" name="ipv-nor-appgd[]" class="custom-control-input cbGroupDetail_nor" ${data.checked}>
                                            <label for="ipv-nor-appgd-${data.autoid}" class="custom-control-label"><b>${data.user}</b></label>
                                        </div>`;
                                    }

                                    htmlg1 += `</div></div>`;
                                }

                                htmlg1 += `</div>`;

                                let condition = getConditionTextByGroup_nor(approveGroup, areaid);
                                htmlg1 += `
                                <div class="col-md-12 form-group">
                                    <span class="conditionText">${condition}</span>
                                </div>`;

                                $('#mainG-1-nor').html(htmlg1);

                                $('input:checkbox[name="ipv-nor-appgd[]"]').on('click', function (e) {
                                    e.preventDefault();
                                });

                                getSectionGroup_4_to_0_nor(approveGroup, userApproved, formcode, areaid, mgrApproveData.wdf_status);
                            }
                        }

                        $('input:radio[name="ip-nor-mgrsec-appro"]').on('click', function (e) {
                            e.preventDefault();
                        });

                        if (mgrApproveData.wdf_mgr_appr == "อนุมัติ") {
                            $('#ip-nor-mgrsec-appro-yes').prop('checked', true);
                        } else {
                            $('#ip-nor-mgrsec-appro-no').prop('checked', true);
                        }

                        let condateMgr = moment(mgrApproveData.wdf_mgr_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ip-nor-mgrsec-userpost').val(mgrApproveData.wdf_mgr_user).prop('readonly', true);
                        $('#ip-nor-mgrsec-deptpost').val(mgrApproveData.wdf_mgr_dept).prop('readonly', true);
                        $('#ip-nor-mgrsec-datepost').val(condateMgr).prop('readonly', true);
                        $('#ip-nor-mgrsec-memo').val(mgrApproveData.wdf_mgr_memo).prop('readonly', true);
                        $('#btn-nor-saveManager').css('display', 'none');

                    }
                });
            }
        }




        function getSectionGroup_4_to_0_nor(approveGroup , userApproved , formcode , areaid , wdfstatus)
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
                    <form id="frm_nor_save_paygroup-`+userApproved[i].apv_ecode+`" autocomplete="off" class="needs-validation" novalidate>
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <h4>`+userApproved[i].apv_posiname+`</h4>
                        </div>
                    </div>

                    <div class="norHr mt-3"></div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                        <div class="row">
                                            <div class="col-lg-12 form-inline">
                                                <div class="custom-control custom-radio mb-5 ml-3">
                                                    <input type="radio" id="ip-nor-payGroupsec-appro-yes-`+userApproved[i].apv_ecode+`" name="ip-nor-payGroupsec-appro-`+userApproved[i].apv_ecode+`" value="อนุมัติ" class="custom-control-input payGroupsecAppr_nor" required> 
                                                    <label for="ip-nor-payGroupsec-appro-yes-`+userApproved[i].apv_ecode+`" class="custom-control-label">อนุมัติ</label>
                                                </div> 
                                                <div class="custom-control custom-radio mb-5 ml-3">
                                                    <input type="radio" id="ip-nor-payGroupsec-appro-no-`+userApproved[i].apv_ecode+`" name="ip-nor-payGroupsec-appro-`+userApproved[i].apv_ecode+`" value="ไม่อนุมัติ" class="custom-control-input payGroupsecAppr_nor" required> 
                                                    <label for="ip-nor-payGroupsec-appro-no-`+userApproved[i].apv_ecode+`" class="custom-control-label">ไม่อนุมัติ</label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for=""><b>หมายเหตุ</b></label>
                                    <textarea name="ip-nor-payGroupsec-memo-`+userApproved[i].apv_ecode+`" id="ip-nor-payGroupsec-memo-`+userApproved[i].apv_ecode+`" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for=""><b>ผู้อนุมัติ</b></label>
                                    <input type="text" name="ip-nor-payGroupsec-userpost-`+userApproved[i].apv_ecode+`" id="ip-nor-payGroupsec-userpost-`+userApproved[i].apv_ecode+`" class="form-control" value="`+userApproved[i].apv_user+`" readonly>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for=""><b>ลงวันที่</b></label>
                                    <input type="text" name="ip-nor-payGroupsec-datepost-`+userApproved[i].apv_ecode+`" id="ip-nor-payGroupsec-datepost-`+userApproved[i].apv_ecode+`" class="form-control" value="<?php echo date("d/m/Y H:i:s") ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="btn_nor_sectionPayGroup_`+userApproved[i].apv_ecode+`" class="row align-items-center sectionPayGroupClass_nor" style="display:none;">
                        <div class="col-md-12 text-center">
                            <button type="button" id="btn-nor-savePaygroup-`+userApproved[i].apv_ecode+`" name="btn-nor-savePaygroup-`+userApproved[i].apv_ecode+`" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
                        </div>
                    </div>

                    <input hidden type="text" id="ip-nor-payGroupsec-autoid-`+userApproved[i].apv_ecode+`" name="ip-nor-payGroupsec-autoid-`+userApproved[i].apv_ecode+`" value="`+userApproved[i].apv_autoid+`">
                    <input hidden type="text" id="ip-nor-payGroupsec-formcode-`+userApproved[i].apv_ecode+`" name="ip-nor-payGroupsec-formcode-`+userApproved[i].apv_ecode+`" value="`+formcode+`">
                    <input hidden type="text" id="ip-nor-payGroupsec-areaid-`+userApproved[i].apv_ecode+`" name="ip-nor-payGroupsec-areaid-`+userApproved[i].apv_ecode+`" value="`+areaid+`">
                    <input hidden type="text" id="ip-nor-payGroupsec-totalApp-`+userApproved[i].apv_ecode+`" name="ip-nor-payGroupsec-totalApp-`+userApproved[i].apv_ecode+`" value="`+userApproved.length+`">
                    <input hidden type="text" id="ip-nor-payGroupsec-group-`+userApproved[i].apv_ecode+`" name="ip-nor-payGroupsec-group-`+userApproved[i].apv_ecode+`" value="`+userApproved[i].apv_group+`">
                    </form>
                    </div>
                    `;

                    
                }
            $('#payGroup_section_nor').css('display' , '').html(payGroupHtml);
            let ecodeLogin = "<?php echo getUser()->ecode; ?>";
            $('#btn_nor_sectionPayGroup_'+ecodeLogin).css('display' , '');


            for(let ii = 0; ii<userApproved.length;ii++){
                if(userApproved[ii].apv_approve != null){
                    let radioname = "ip-nor-payGroupsec-appro-"+userApproved[ii].apv_ecode;
                    let condateApproved = moment(userApproved[ii].apv_approve_datetime).format('DD/MM/Y HH:mm:ss');

                    if(userApproved[ii].apv_approve == "อนุมัติ"){
                        $('#ip-nor-payGroupsec-appro-yes-'+userApproved[ii].apv_ecode).prop('checked' , true);
                    }else if(userApproved[ii].apv_approve == "ไม่อนุมัติ"){
                        $('#ip-nor-payGroupsec-appro-no-'+userApproved[ii].apv_ecode).prop('checked' , true);
                    }

                    $("input:radio[name="+radioname+"]").on('click' , function(e){
                        e.preventDefault();
                    });

                    $('#ip-nor-payGroupsec-memo-'+userApproved[ii].apv_ecode).val(userApproved[ii].apv_approve_memo).prop('readonly' , true);
                    $('#ip-nor-payGroupsec-userpost-'+userApproved[ii].apv_ecode).val(userApproved[ii].apv_approve_user);
                    $('#ip-nor-payGroupsec-datepost-'+userApproved[ii].apv_ecode).val(condateApproved);
                    $('#btn-nor-savePaygroup-'+userApproved[ii].apv_ecode).css('display','none');
                }
            }

            // Control when executive not approve
            if(wdfstatus == "Executive Group "+approveGroup+" Not Approve"){
                $('.sectionPayGroupClass_nor').css('display' , 'none');
                $('.payGroupsecAppr_nor').attr('onclick' , 'return false');
            }
            
        }


        $(document).on('click' , '#btn-nor-savePaygroup-'+userecode , function(){
                let radioname = "ip-nor-payGroupsec-appro-"+userecode;
            
                if($('input:radio[name='+radioname+']:checked').length == 0){
                    swal({
                        title: 'กรุณาตรวจสอบข้อมูลให้ถูกต้อง',
                        type: 'error',
                        showConfirmButton: false,
                        timer:1000
                    });
                }else{
                    if($('input:radio[name='+radioname+']:checked').val() == "ไม่อนุมัติ"){
                        if($('#ip-nor-payGroupsec-memo-'+userecode).val() == ""){
                            swal({
                                title: 'กรุณาระบุเหตุผล',
                                type: 'error',
                                showConfirmButton: false,
                                timer:1000
                            });
                        }else{
                            savePayGroup_nor(userecode);
                        }

                    }else if($('input:radio[name='+radioname+']:checked').val() == "อนุมัติ"){
                        savePayGroup_nor(userecode);
                    }

                }
        });

        function savePayGroup_nor(ecode)
        {
            $('#btn-nor-savePaygroup-'+ecode).prop('disabled' , true);

            const form = $('#frm_nor_save_paygroup-'+ecode)[0];
            const data = new FormData(form);
            axios.post(url+'main/normal/savePayGroup_nor' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:1000
                    }).then(function(){
                        location.href = url+'normal.html';
                    });
                }
            });
        }


        function getdata_apApprove_nor(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/normal/getdata_apApprove_nor' , {
                    action:"getdata_apApprove_nor",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let apData = res.data.apData;

                        if(apData.wdf_ap_appr != null){
                            let condateAp = moment(apData.wdf_ap_datetime).format('DD/MM/Y HH:mm:ss');

                            if(apData.wdf_ap_appr == "ผ่าน"){
                                $('#ip-nor-apsec-appro-yes').prop('checked' , true);
                            }else if(apData.wdf_ap_appr == "ไม่ผ่าน"){
                                $('#ip-nor-apsec-appro-no').prop('checked' , true);
                            }

                            if(apData.wdf_ap_moneymethod == "เงินสด"){
                                $('#ip-nor-apsec-money-1').prop('checked' , true);
                            }else if(apData.wdf_ap_moneymethod == "โอน"){
                                $('#ip-nor-apsec-money-2').prop('checked' , true);
                            }else if(apData.wdf_ap_moneymethod == "เช็ค"){
                                $('#ip-nor-apsec-money-3').prop('checked' , true);
                            }

                            $('input:radio[name=ip-nor-apsec-money]').on('click' , function(e){e.preventDefault();
                            });

                            $('input:radio[name="ip-nor-apsec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-nor-apsec-user').val(apData.wdf_ap_user).prop('readonly' , true);
                            $('#ip-nor-apsec-dept').val(apData.wdf_ap_dept).prop('readonly' , true);
                            $('#ip-nor-apsec-date').val(condateAp).prop('readonly' , true);
                            $('#ip-nor-apsec-memo').val(apData.wdf_ap_memo).prop('readonly' , true);
                            $('#btn-nor-saveap-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-nor-apsec-user').val(user).prop('readonly' , true);
                            $('#ip-nor-apsec-dept').val(dept).prop('readonly' , true);
                            $('#ip-nor-apsec-date').val(datetime).prop('readonly' , true);

                            $('#check-apsec-formcode-nor').val(formcode);
                            $('#check-apsec-areaid-nor').val(areaid);
                        }

                    }
                });
            }
        }


        function getdata_accApprove_nor(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/normal/getdata_accApprove_nor' , {
                    action:"getdata_accApprove_nor",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let accData = res.data.accData;

                        if(accData.wdf_acc_appr != null){
                            let condateAcc = moment(accData.wdf_acc_datetime).format('DD/MM/Y HH:mm:ss');

                            if(accData.wdf_acc_appr == "ผ่าน"){
                                $('#ip-nor-accSec-appro-yes').prop('checked' , true);
                            }else if(accData.wdf_acc_appr == "ไม่ผ่าน"){
                                $('#ip-nor-accSec-appro-no').prop('checked' , true);
                            }

                            $('input:radio[name="ip-nor-accSec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-nor-accSec-user').val(accData.wdf_acc_user).prop('readonly' , true);
                            $('#ip-nor-accSec-dept').val(accData.wdf_acc_dept).prop('readonly' , true);
                            $('#ip-nor-accSec-date').val(condateAcc).prop('readonly' , true);
                            $('#ip-nor-accSec-memo').val(accData.wdf_acc_memo).prop('readonly' , true);
                            $('#btn-nor-saveacc-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-nor-accSec-user').val(user).prop('readonly' , true);
                            $('#ip-nor-accSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-nor-accSec-date').val(datetime).prop('readonly' , true);

                            $('#check-accsec-formcode-nor').val(formcode);
                            $('#check-accsec-areaid-nor').val(areaid);
                        }

                    }
                });
            }
        }


        function getdata_financeApprove_nor(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/normal/getdata_financeApprove_nor' , {
                    action:"getdata_financeApprove_nor",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let financeData = res.data.financeData;

                        if(financeData.wdf_fn_appr != null){
                            let condateAcc = moment(financeData.wdf_fn_datetime).format('DD/MM/Y HH:mm:ss');

                            if(financeData.wdf_fn_appr == "ผ่าน"){
                                $('#ip-nor-fnSec-appro-yes').prop('checked' , true);
                            }else if(financeData.wdf_fn_appr == "ไม่ผ่าน"){
                                $('#ip-nor-fnSec-appro-no').prop('checked' , true);
                            }

                            $('input:radio[name="ip-nor-fnSec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-nor-fnSec-user').val(financeData.wdf_fn_user).prop('readonly' , true);
                            $('#ip-nor-fnSec-dept').val(financeData.wdf_fn_dept).prop('readonly' , true);
                            $('#ip-nor-fnSec-date').val(condateAcc).prop('readonly' , true);
                            $('#ip-nor-fnSec-memo').val(financeData.wdf_fn_memo).prop('readonly' , true);
                            $('#btn-nor-savefn-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-nor-fnSec-user').val(user).prop('readonly' , true);
                            $('#ip-nor-fnSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-nor-fnSec-date').val(datetime).prop('readonly' , true);

                            $('#check-fnsec-formcode-nor').val(formcode);
                            $('#check-fnsec-areaid-nor').val(areaid);
                        }
                        

                    }
                });
            }
        }


        function getdata_userReceive_nor(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/normal/getdata_userReceive_nor' , {
                    action:"getdata_userReceive_nor",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let userreceiveData = res.data.userreceiveData;

                        if(userreceiveData.wdf_ur_signature != null){
                            let condateUserreceive = moment(userreceiveData.wdf_ur_datetime).format('DD/MM/Y HH:mm:ss');


                            $('#ip-nor-userReceiveSec-user').val(userreceiveData.wdf_ur_user).prop('readonly' , true);
                            $('#ip-nor-userReceiveSec-dept').val(userreceiveData.wdf_ur_dept).prop('readonly' , true);
                            $('#ip-nor-userReceiveSec-date').val(condateUserreceive).prop('readonly' , true);
                            $('#ip-nor-userReceiveSec-memo').val(userreceiveData.wdf_ur_memo).prop('readonly' , true);
                            $('#btn-nor-saveUserreceive-section').css('display' , 'none');
                            $('#smoothed-nor').css('display','none');

                            $('#show_signature_nor').css('display' , '');
                            $('#show_sign_nor').attr('src' , userreceiveData.wdf_ur_signature);

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-nor-userReceiveSec-user').val(user).prop('readonly' , true);
                            $('#ip-nor-userReceiveSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-nor-userReceiveSec-date').val(datetime).prop('readonly' , true);

                            $('#check-userreceivesec-formcode-nor').val(formcode);
                            $('#check-userreceivesec-areaid-nor').val(areaid);
                        }
                        

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



        function getConditionTextByGroup_nor(appGroup , areaid)
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


        function process_step_normal(status , appgroup)
        {
            if(status != "" || status != null){
                if(status == "Open" || status == "Edit"){
                    $('.nor-proc-open').addClass('active');

                }else if(status == "User cancel"){
                    $('.nor-proc-open').addClass('notactive');

                }else if(status == "Check budget already"){
                    $('.nor-proc-open').addClass('active');
                    $('.nor-proc-budget').addClass('active');

                }else if(status == "Manager approved" ||
                    status == "Wait Executive Group "+appgroup+" Approve"
                ){
                    $('.nor-proc-open').addClass('active');
                    $('.nor-proc-budget').addClass('active');
                    $('.nor-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.nor-proc-excutive').css('display' , '');
                    }

                }else if(status == "Manager not approve"){
                    $('.nor-proc-open').addClass('active');
                    $('.nor-proc-budget').addClass('active');
                    $('.nor-proc-mgr').addClass('notactive');

                }else if(status == "Executive Group "+appgroup+" Approved"){
                    $('.nor-proc-open').addClass('active');
                    $('.nor-proc-budget').addClass('active');
                    $('.nor-proc-mgr').addClass('active');

                    //เมื่อต้องมี Executive อนุมัติ
                    $('.nor-proc-excutive').css('display' , '').addClass('active');
                }else if(status == "Executive Group "+appgroup+" Not Approve"){
                    $('.nor-proc-open').addClass('active');
                    $('.nor-proc-budget').addClass('active');
                    $('.nor-proc-mgr').addClass('active');

                    //เมื่อต้องมี Executive อนุมัติ
                    $('.nor-proc-excutive').css('display' , '').addClass('notactive');
                }else if(status == "AP passed inspection"){
                    $('.nor-proc-open').addClass('active');
                    $('.nor-proc-budget').addClass('active');
                    $('.nor-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.nor-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.nor-proc-ap').addClass('active');
                }else if(status == "AP not pass inspection"){
                    $('.nor-proc-open').addClass('active');
                    $('.nor-proc-budget').addClass('active');
                    $('.nor-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.nor-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.nor-proc-ap').addClass('notactive');

                }else if(status == "Account passed inspection"){
                    $('.nor-proc-open').addClass('active');
                    $('.nor-proc-budget').addClass('active');
                    $('.nor-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.nor-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.nor-proc-ap').addClass('active');
                    $('.nor-proc-acc').addClass('active');

                }else if(status == "Account not pass inspection"){
                    $('.nor-proc-open').addClass('active');
                    $('.nor-proc-budget').addClass('active');
                    $('.nor-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.nor-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.nor-proc-ap').addClass('active');
                    $('.nor-proc-acc').addClass('notactive');

                }else if(status == "Wait user receive money"){
                    $('.nor-proc-open').addClass('active');
                    $('.nor-proc-budget').addClass('active');
                    $('.nor-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.nor-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.nor-proc-ap').addClass('active');
                    $('.nor-proc-acc').addClass('active');
                    $('.nor-proc-finance').addClass('active');

                }else if(status == "Finance not pass inspection"){
                    $('.nor-proc-open').addClass('active');
                    $('.nor-proc-budget').addClass('active');
                    $('.nor-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.nor-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.nor-proc-ap').addClass('active');
                    $('.nor-proc-acc').addClass('active');
                    $('.nor-proc-finance').addClass('notactive');

                }else if(status == "Complete"){
                    $('.nor-proc-open').addClass('active');
                    $('.nor-proc-budget').addClass('active');
                    $('.nor-proc-mgr').addClass('active');

                    if(appgroup != 5){
                        //เมื่อต้องมี Executive อนุมัติ
                        $('.nor-proc-excutive').css('display' , '').addClass('active');
                    }

                    $('.nor-proc-ap').addClass('active');
                    $('.nor-proc-acc').addClass('active');
                    $('.nor-proc-finance').addClass('active');
                    $('.nor-proc-userreceive').addClass('active');

                }
            }
        }




        function getNorCurrencyFromDb(currency)
        {
            if(currency === null){
                currency = "THB";
            }
            axios.get(url+'main/normal/getNorCurrencyFromDb').then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let result = res.data.result;
                    let output = ``;
                    for(let i = 0; i < result.length ; i++){
                        output +=`
                        <option value="`+result[i].cu_name+`">`+result[i].cu_name+`</option>
                        `;
                    }
                    $('#ipv-nor-currency').html(output);
                    $('#ipv-nor-currency').attr("style", "pointer-events: none;");
                    $('#ipv-nor-currency option[value="'+currency+'"]').prop("selected" , true);

                    if(currency !== ""){
                        $('.bgBath').text(currency);
                        $('.bgBath2').text(currency);
                    }

                  
                }
            });
        }
        





        



        



    });
</script>