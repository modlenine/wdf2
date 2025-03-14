<!--
* bootstrap-fileinput v5.5.3
* http://plugins.krajee.com/file-input
*
* Author: Kartik Visweswaran
* Copyright: 2014 - 2022, Kartik Visweswaran, Krajee.com
*
* Licensed under the BSD-3-Clause
* https://github.com/kartik-v/bootstrap-fileinput/blob/master/LICENSE.md
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Krajee JQuery Plugins - &copy; Kartik</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link href="<?=base_url('assets/')?>fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
    <link href="<?=base_url('assets/')?>fileinput/themes/explorer-fa5/theme.css" media="all" rel="stylesheet" type="text/css"/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?=base_url('assets/js/axios.min.js')?>"></script>

    <script src="<?=base_url('assets/')?>fileinput/js/plugins/buffer.min.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/js/plugins/filetype.min.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/js/locales/fr.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/js/locales/es.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/themes/fa5/theme.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/themes/explorer-fa5/theme.js" type="text/javascript"></script>
</head>
<body>
<div class="container my-4">
    <h1>Bootstrap File Input Examples
        <small><a href="https://github.com/kartik-v/bootstrap-fileinput-samples"><i
                class="glyphicon glyphicon-download"></i> Download Sample Files</a></small>
    </h1>
    <h4>Bootstrap Version: <script>document.write($.fn.fileinputBsVersion);</script></h4>
    <hr>
    <!-- <form enctype="multipart/form-data">
        <div class="file-loading">
            <input id="kv-explorer" type="file" multiple>
        </div>
        <br>
        <div class="file-loading">
            <input id="file-0a" class="file" type="file" multiple data-min-file-count="1" data-theme="fa5">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </form> -->
    <!-- <hr>
    <h5>Preupload Validation</h5>
    <input id="file-0" name="file-0" type="file">
    <br>
    <textarea id="description" rows=3" class="form-control" placeholder="Enter description for the files selected..."></textarea>
    <br>
    <form enctype="multipart/form-data">
        <label for="file-0b">Test invalid input type</label>
        <div class="file-loading">
            <input id="file-0b" name="file-0b" class="file" type="text" multiple data-min-file-count="1" data-theme="fa5">
        </div>
        <script>
            $(document).on('ready', function () {
                $("#file-0b").fileinput();
            });
        </script>
    </form> -->
    <hr>
    <form id="frm_saveDataPoNew" enctype="multipart/form-data">

        <label for="">test</label>
        <div class="form-group">
            <div class="file-loading">
                <input id="file-1" name="file-1[]" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2" data-theme="fa5">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <button type="button" id="btn-save" name="btn-save" class="btn btn-primary">บันทึก</button>
            </div>
        </div>
    </form>

</div>
</body>
<script>

    $("#file-1").fileinput({
        theme: 'fa5',
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
    /*
     $(".file").on('fileselect', function(event, n, l) {
     alert('File Selected. Name: ' + l + ', Num: ' + n);
     });
     */
    $("#file-3").fileinput({
        theme: 'fa5',
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewAsData: true,
        initialPreview: [
            "http://lorempixel.com/1920/1080/transport/1",
            "http://lorempixel.com/1920/1080/transport/2",
            "http://lorempixel.com/1920/1080/transport/3"
        ],
        initialPreviewConfig: [
            {caption: "transport-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
            {caption: "transport-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
            {caption: "transport-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3}
        ]
    });
    $("#file-4").fileinput({
        theme: 'fa5',
        uploadExtraData: {kvId: '10'}
    });
    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });
    /*
     $('#file-4').on('fileselectnone', function() {
     alert('Huh! You selected no files.');
     });
     $('#file-4').on('filebrowse', function() {
     alert('File browse clicked for #file-4');
     });
     */
    $(document).ready(function () {

        $('#btn-save').click(function(){
            uploadfile();
        });


        function uploadfile()
        {
            const form = $('#frm_saveDataPoNew')[0];
            const data = new FormData(form);
            axios.post('http://localhost/intsys/wdf2/main/po/saveDataPoNew' , data , {
                    header:{
                        'Content-Type' : 'multipart/form-data'
                    },
                }).then(res=>{
                    console.log(res.data);
                    // if(res.data.status == "Insert Data Success"){
                    //     swal({
                    //         title: 'บันทึกข้อมูลเรียบร้อย',
                    //         type: 'success',
                    //         showConfirmButton: false,
                    //         timer:1000
                    //     }).then(function(){
                    //         // location.href = url+'po_view.html/'+formcode+'/'+formno;
                    //     });
                    // }
                });
        }


        $("#test-upload").fileinput({
            'theme': 'fa5',
            'showPreview': false,
            'allowedFileExtensions': ['jpg', 'png', 'gif'],
            'elErrorContainer': '#errorBlock'
        });
        $("#kv-explorer").fileinput({
            'theme': 'explorer-fa5',
            'uploadUrl': '#',
            overwriteInitial: false,
            initialPreviewAsData: true,
            initialPreview: [
                "http://lorempixel.com/1920/1080/nature/1",
                "http://lorempixel.com/1920/1080/nature/2",
                "http://lorempixel.com/1920/1080/nature/3"
            ],
            initialPreviewConfig: [
                {caption: "nature-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
                {caption: "nature-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
                {caption: "nature-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3}
            ]
        });
        /*
         $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
         alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
         });
         */
        $('#inp-add-1').on('change', function() {
            var $plugin = $('#inp-add-2').data('fileinput');
            $plugin.addToStack($(this)[0].files[0])
        });
        $('#inp-add-2').fileinput({
            uploadUrl: '#',
            //uploadUrl: 'http://localhost/plugins/test-upload',
            initialPreviewAsData: true,
            initialPreview: [
                "https://dummyimage.com/640x360/a0f.png&text=Transport+1",
                "https://dummyimage.com/640x360/3a8.png&text=Transport+2",
                "https://dummyimage.com/640x360/6ff.png&text=Transport+3"
            ],
            initialPreviewConfig: [
                {caption: "transport-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1, zoomData: 'https://dummyimage.com/1920x1080/a0f.png&text=Transport+1', description: '<h5>NUMBER 1</h5> The first choice for transport. This is the future.'},
                {caption: "transport-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2, zoomData: 'https://dummyimage.com/1920x1080/3a8.png&text=Transport+2', description: '<h5>NUMBER 2</h5> The second choice for transport. This is the future.'},
                {caption: "transport-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3, zoomData: 'https://dummyimage.com/1920x1080/6ff.png&text=Transport+3', description: '<h5>NUMBER 3</h5> The third choice for transport. This is the future.'}
            ]
        });
    });
</script>
</html>