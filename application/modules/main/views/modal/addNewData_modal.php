<div id="addnewdata_vue">

    <div class="modal fade bs-example-modal-lg" id="addNewData_modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <form id="frm_savemainData" autocomplete="off" @submit.prevent="saveMaindata" class="needs-validation" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">เพิ่มข้อมูลหลัก</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="modal-header">
                    
                    <div>
                        <button type="submit" class="btn btn-success" id="btn-saveMain">
                            <i class="fi-save mr-2"></i>บันทึก
                        </button>
                        <!-- <button type="button" class="btn btn-danger" id="btn-closeMain" data-dismiss="modal">
                            <i class="fi-x mr-2"></i>ปิด
                        </button> -->
                    </div>
                    <div></div>
                </div>

                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for=""><b>กรุณาเลือกบริษัท </b><span class="textRequest">*</span></label>
                            <select name="m_areaid" id="m_areaid" class="form-control" required>
                                <option value="">เลือกบริษัท</option>
                                <option value="sln">Salee Colour Public Company Limited.</option>
                                <option value="poly">Poly Meritasia Co.,Ltd.</option>
                                <option value="ca">Composite Asia Co.,Ltd.</option>
                            </select>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for=""><b>Production Number </b><span class="textRequest">*</span></label>
                            <input type="text" name="m_product_number" id="m_product_number" class="form-control" @keyup="searchProductNo" @click="productno_null" required>
                            <div id="m_showpd"></div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for=""><b>เลือกเครื่องจักร </b><span class="textRequest">*</span></label>
                            <input type="text" name="m_template_name" id="m_template_name" class="form-control" @keyup="searchTemplate" required>
                            <div id="m_showTemplate"></div>
                            <input hidden type="text" name="m_template_code" id="m_template_code" class="form-control">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for=""><b>Order (kg.) </b><span class="textRequest">*</span></label>
                            <input type="text" name="m_order" id="m_order" class="form-control" required>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for=""><b>Batch Size </b></label>
                            <input type="text" name="m_batchsize" id="m_batchsize" class="form-control">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for=""><b>Work Type</b> <span class="textRequest">*</span></label>
                            <select name="m_worktype" id="m_worktype" class="form-control m_worktype" required>
                                <option value="">กรุณาเลือกประเภทงาน</option>
                                <option value="Normal">Normal</option>
                                <option value="Adjust">Adjust</option>
                            </select>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for=""><b>Run </b><span class="textRequest">*</span></label>
                            <div id="showRunList"></div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for=""><b>Temperature </b><span class="textRequest">*</span></label>
                            <input type="text" name="m_temperature" id="m_temperature" class="form-control" readonly>
                        </div>
                        
                        <div class="col-lg-6 form-group">
                            <label for=""><b>Item Number</b></label>
                            <input type="text" name="m_item_number" id="m_item_number" class="form-control" readonly>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for=""><b>Batch Number</b></label>
                            <input type="text" name="m_batch_number" id="m_batch_number" class="form-control" readonly>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for=""><b>Date</b></label>
                            <input type="text" name="m_datetime" id="m_datetime" class="form-control" value="<?=date("d/m/Y")?>" readonly>
                        </div>
                    </div>
                    
                </div>
               
            </div>
        </form>
        </div>
    </div>

</div>    
    


    <script>
        $(document).ready(function(){
            let url = "<?php echo base_url(); ?>";
            loadRunList();

            // Vue Zone
            let addnewdata_vue = new Vue({
                el:"#addnewdata_vue",
                data:{
                    
                },
                methods: {
                    searchTemplate()
                    {
                        if($('#m_template_name').val() != ""){
                            axios.post(url+'main/searchTemplate' , {
                                action:"searchTemplate",
                                templatename:$('#m_template_name').val()
                            }).then(res => {
                                console.log(res.data);
                                let templatedataAr = res.data.templatedata;
                                let outputHtml = `<ul class="list-group mt-2 m_selectTemplateUl">`;
                                for(let i = 0; i < templatedataAr.length; i++){
                                    outputHtml += `
                                    <li class="list-group-item list-group-item list-group-item-action m_selectTemplate"
                                        data_master_name="`+templatedataAr[i].master_name+`"
                                        data_master_temcode="`+templatedataAr[i].master_temcode+`"
                                        data_master_temperature="`+templatedataAr[i].master_temperature+`"
                                    >
                                        <span>`+templatedataAr[i].master_name+`</span>
                                    </li>
                                    `;
                                }
                                outputHtml += `</ul>`;
                                $('#m_showTemplate').html(outputHtml);
                            });
                        }else{
                            $('#m_showTemplate').html('');
                        }
                        
                    },
                    searchProductNo()
                    {
                        if($('#m_product_number').val() != ""){
                            axios.post(url+'main/searchProductNo' , {
                                action:"searchProductNo",
                                m_product_number:$('#m_product_number').val(),
                                m_areaid:$('#m_areaid').val()
                            }).then(res => {
                                console.log(res);
                                $('#m_showpd').html(res.data);
                            });
                        }else{
                            $('#m_showpd').html('');
                        }


                        if($('#m_areaid').val() == ""){
                            $('#m_areaid').addClass('inputNull');
                            $('#m_product_number').val('');
                        }else{
                            $('#m_areaid').removeClass('inputNull');
                            $('#m_product_number').val();
                        }

                        
                    },
                    saveMaindata()
                    {
                        $('#btn-saveMain').prop('disabled' , true);

                        if($('#m_template_code').val() == ""){
                            $('#m_template_name').val('');
                        }
                        const form = $('#frm_savemainData')[0];
                        const data = new FormData(form);

                        axios.post(url+'main/saveMaindata',data,{

                        }).then(res => {
                            if(res.data.status == "Insert Data Success"){
                                // location.href = url+''+res.data.templateformno
                                
                                swal({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                type: 'success',
                                showConfirmButton: false,
                                timer:800
                                }).then(function(){
                                    location.href = url+'viewfulldata.html/'+res.data.templateformno;
                                });
                            }else{
                                swal({
                                title: 'กรุณากรอกข้อมูลให้ครบ',
                                type: 'error',
                                showConfirmButton: false,
                                timer:800
                                }).then(function(){
                                    $('#btn-saveMain').prop('disabled' , false);
                                });
                            }
                            console.log(res);
                        });
                    },
                    productno_null()
                    {
                        if($('#m_areaid').val() == ""){
                            $('#m_areaid').addClass('inputNull');
                            $('#m_product_number').val('');

                        }else{
                            $('#m_areaid').removeClass('inputNull');
                            $('#m_product_number').val();
                        }
                    }
                },
                created() {
                    
                },
            });
            // Vue Zone


            $(document).on('keyup' , '#m_typeofbag' , function(){
                if($(this).val() != ""){
                    //Query
                    searchBag($(this).val());
                }else{
                    $('#showBagCode').html('');
                }
            });


            $(document).on('change' , '#m_areaid' , function(){
                console.log($(this).val());
                $('#frm_savemainData input[name=m_product_number]').val('');
                $('#frm_savemainData input[name=m_template_name]').val('');
                $('#frm_savemainData input[name=m_order]').val('');
                $('#frm_savemainData input[name=m_std_output]').val('');
                $('#frm_savemainData input[name=m_temperature]').val('');
                $('#frm_savemainData input[name=m_item_number]').val('');
                $('#frm_savemainData input[name=m_batch_number]').val('');
                
                $('#frm_savemainData input[name=m_batchsize]').val('');
                $('#frm_savemainData input[name=m_worktype]').val('');
                $('#frm_savemainData input[name=m_run]').val('');
            });



            $(document).on('click' , '.m_selectTemplate' , function(){
                const data_master_name = $(this).attr("data_master_name");
                const data_master_temcode = $(this).attr("data_master_temcode");
                const data_master_temperature = $(this).attr("data_master_temperature");

                $('#m_template_name').val(data_master_name);
                $('#m_template_code').val(data_master_temcode);
                $('#m_temperature').val(data_master_temperature);
                $('#m_showTemplate').html('');

            });


            $(document).on('click' , '.prodid_attr' , function(){

                $('#m_template_name').val('');
                $('#m_worktype').val('');
                $('#m_run').val('');

                const data_prodid = $(this).attr("data_prodid");
                const data_prodiduse = $(this).attr("data_prodiduse");
                const data_itemid = $(this).attr("data_itemid");
                const data_inventbatchid = $(this).attr("data_inventbatchid");
                const data_dataareaid = $(this).attr("data_dataareaid");
                const data_slc_orgreference = $(this).attr("data_slc_orgreference");
                let data_bpc_batchsize = $(this).attr("data_bpc_batchsize");
                let data_qtysched = $(this).attr("data_qtysched");

                data_qtysched = parseFloat(data_qtysched);
                data_bpc_batchsize = parseFloat(data_bpc_batchsize);

                $('#m_item_number').val(data_itemid);
                $('#m_batch_number').val(data_inventbatchid);
                $('#m_product_number').val(data_prodid);
                $('#m_batchsize').val(data_bpc_batchsize);
                $('#m_order').val(data_qtysched);
                $('#m_showpd').html('');

                $('#m_worktype').attr({
                    data_dataareaid:data_dataareaid,
                    data_prodid:data_prodid,
                });


                searchTemplate(data_itemid);

            });

            function searchTemplate(itemnumber)
            {
                if(itemnumber != ""){
                    axios.post(url+'main/searchTemplateByItemnumber' , {
                        action:"searchTemplate",
                        itemnumber:itemnumber
                    }).then(res => {
                        console.log(res.data);
                        let templatedataAr = res.data.templatedata;
                        let outputHtml = `<ul class="list-group mt-2 m_selectTemplateUl">`;
                        for(let i = 0; i < templatedataAr.length; i++){
                            outputHtml += `
                            <li class="list-group-item list-group-item list-group-item-action m_selectTemplate"
                                data_master_name="`+templatedataAr[i].master_name+`"
                                data_master_temcode="`+templatedataAr[i].master_temcode+`"
                                data_master_temperature="`+templatedataAr[i].master_temperature+`"
                            >
                                <span>`+templatedataAr[i].master_name+`</span>
                            </li>
                            `;
                        }
                        outputHtml += `</ul>`;
                        $('#m_showTemplate').html(outputHtml);
                    });
                }else{
                    $('#m_showTemplate').html('');
                }
                
            }

            $(document).on('change' , '.m_worktype' , function(){
                const data_dataareaid = $(this).attr("data_dataareaid");
                const data_prodid = $(this).attr("data_prodid");

                if($('#m_product_number').val() != ""){
                    if($('#m_worktype').val() == "Adjust"){
                        checkpdforvalidatework(data_prodid , data_dataareaid);
                    }
                }else{
                    swal({
                        title: 'กรุณาเลือก PD ก่อนค่ะ',
                        type: 'error',
                        showConfirmButton: false,
                        timer:1000
                    }).then(function(){
                        $('#m_worktype').val('');
                    });
                }
                
            });

            function checkpdforvalidatework(productionNumber , dataareaid)
            {
                if(productionNumber != "" && dataareaid != ""){
                    axios.post(url+'main/checkpdforvalidatework' , {
                        action:"checkpdforvalidatework",
                        productionNumber:productionNumber,
                        dataareaid:dataareaid
                    }).then(res=>{
                        console.log(res.data);
                        if(res.data.status == "Select Data Success"){

                            if(res.data.pdtype == "Normal"){
                                swal({
                                    title: 'PD เลขที่ '+productionNumber+' ยังไม่เคยมิกซ์งาน ไม่สามารถ Adjust ได้ค่ะ',
                                    type: 'error',
                                    showConfirmButton: true,
                                }).then(function(){
                                    $('#m_worktype').val(res.data.pdtype);
                                });
                            }else if(res.data.pdtype == "Adjust"){
                                if(res.data.pdstatus == 1){
                                    $('#m_worktype').val(res.data.pdtype);
                                }else if(res.data.pdstatus == 0){
                                    swal({
                                        title: 'กรุณารันงานของ PD เลขที่ '+productionNumber+' ให้จบก่อนค่ะ',
                                        type: 'error',
                                        showConfirmButton: true,
                                    }).then(function(){
                                        $('#m_worktype').val('');
                                    });
                                }
                            }
                        }
                    });
                }
            }


            function loadRunList()
            {
                let maxrun = 10;
                let output = '';
                output +=`
                <select id="m_run" name="m_run" class="form-control" required>
                    <option value="">กรุณาเลือกรายการ</option>
                `;
                for(let i = 1; i <= maxrun ; i ++){
                    output +=`
                    <option value="`+i+`">`+i+`</option>
                    `;
                }
                output +=`
                </select>
                `;
                $('#showRunList').html(output);
            }




            // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();


        });
    </script>