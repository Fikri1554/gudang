<?php $this->load->view("gudang/menu"); ?>
<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#idBtnAddForm").click(function() {
            clearForm();
            $("#idDataTable").hide();
            $("#idForm").show(255);
        });
    });

    function saveData() {
        document.documentElement.scrollTop = 0;
        var formData = new FormData();

        formData.append('txtIdEdit', $('#txtIdEdit').val());
        formData.append('slcFloor', $('#slcFloor').val());
        formData.append('slcRack', $('#slcRack').val());
        formData.append('slcLevel', $('#slcLevel').val());
        formData.append('slcCompany', $('#slcCompany').val());
        formData.append('slcDivisi', $('#slcDivisi').val());
        formData.append('txtYear', $('#txtYear').val());
        formData.append('txtTitle', $('#txtTitle').val());
        formData.append('txtRemark', $('#txtRemark').val());
        formData.append('txtDocNo', $('#txtDocNo').val());

        $("#idLoading").show();
        $("#btnSave").attr("disabled", true);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('gudang/saveData'); ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                alert(response);
                clearForm();
                reloadPage();
            }
        });
    }

    function editData(id) {
        $("#idLoading").show();
        $("#idDataTable").hide();

        $.post('<?php echo base_url("gudang/getDataEdit"); ?>', {
                id: id
            },
            function(data) {
                $('#txtIdEdit').val(data['rsl'][0].id);
                $('#slcFloor').val(data['rsl'][0].floor);
                $('#slcRack').val(data['rsl'][0].rack);
                $('#slcLevel').val(data['rsl'][0].level);
                $('#slcCompany').val(data['rsl'][0].company);
                $('#slcDivisi').val(data['rsl'][0].divisi);
                $('#txtYear').val(data['rsl'][0].year);
                $('#txtTitle').val(data['rsl'][0].title);
                $('#txtRemark').val(data['rsl'][0].remark);
                $('#txtDocNo').val(data['rsl'][0].document_no);

                $("#idForm").show(255);
                $("#idLoading").hide();
            },
            "json"
        );
    }

    function delData(id) {
        var cfm = confirm('Delete Data..??');
        if (cfm) {
            $("#idLoading").show();
            $.post('<?php echo base_url("gudang/deleteData"); ?>', {
                    id: id
                },
                function(data) {
                    alert(data);
                    reloadPage();
                },
                "json"
            );
        }
    }

    function clearForm() {
        $('#txtIdEdit').val('');
        $('#slcFloor').val('');
        $('#slcRack').val('');
        $('#slcLevel').val('');
        $('#slcCompany').val('');
        $('#slcDivisi').val('');
        $('#txtYear').val('');
        $('#txtTitle').val('');
        $('#txtRemark').val('');
        $('#txtDocNo').val('');
    }

    function reloadPage() {
        window.location = "<?php echo base_url('gudang/getData');?>";
    }
    </script>
</head>

<body>
    <div class="main-container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h5 class="page-title" align="right">
                    <div class="spinner-border spinner-border-sm text-red" id="idLoading" style="display:none;"></div>
                    <i>:: Data Gudang ::</i>
                </h5>
            </div>
        </div>
        <div id="idDataTable">
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <button type="button" class="btn btn-info btn-sm btn-block" id="idBtnAddForm">
                        <i class="fa fa-plus"></i> Add</button>
                </div>
            </div>
            <div class="row" id="btnNavAtas">
                <div class="col-md-2">
                    <select class="form-control input-sm" id="idSlcType">
                        <option value="appNo">App No</option>
                        <option value="vessel">Vessel</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control input-sm" id="txtSearch" value="" placeholder="Search Text"
                        autocomplete="off">
                </div>
                <div class="col-md-2">
                    <button type="button" id="btnSearch" class="btn btn-warning btn-sm btn-block" title="Add"><i
                            class="fa fa-search"></i> Search</button>
                </div>
                <div class="col-md-2">
                    <button type="button" onclick="reloadPage();" id="btnSearch"
                        class="btn btn-success btn-sm btn-block" title="Add"><i class="fa fa-refresh"></i>
                        Refresh</button>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-md-12 col-xs-12">
                    <div class="table-responsive">
                        <table
                            class="table table-border table-striped table-bordered table-condensed table-advance table-hover">
                            <thead>
                                <tr style="background-color: #4F2B59;height:20px;">
                                    <th
                                        style="vertical-align: middle; width:5%;text-align:center;color:#FFFFFF;font-weight:bold;">
                                        No</th>
                                    <th
                                        style="vertical-align: middle; width:15%;text-align:center;color:#FFFFFF;font-weight:bold;">
                                        Floor&nbsp/&nbspRack&nbsp/&nbspLevel</th>
                                    <th
                                        style="vertical-align: middle; width:15%;text-align:center;color:#FFFFFF;font-weight:bold;">
                                        Title</th>
                                    <th
                                        style="vertical-align: middle; width:15%;text-align:center;color:#FFFFFF;font-weight:bold;">
                                        Remark</th>
                                    <th
                                        style="vertical-align: middle; width:15%;text-align:center;color:#FFFFFF;font-weight:bold;">
                                        Company</th>
                                    <th
                                        style="vertical-align: middle; width:15%;text-align:center;color:#FFFFFF;font-weight:bold;">
                                        Divisi</th>
                                    <th
                                        style="vertical-align: middle; width:15%;text-align:center;color:#FFFFFF;font-weight:bold;">
                                        Year&nbsp/&nbspDoc.&nbspNo</th>
                                    <th
                                        style="vertical-align: middle; width:5%;text-align:center;color:#FFFFFF;font-weight:bold;">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody id="idTbody">
                                <?php echo $trNya; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="idForm" style="background-color:#E1D7E4;padding:10px;display:none;">
            <div class="row" style="text-align: right;">
                <div class="col-md-12 col-xs-12">
                    <i><b>: FORM DATA ::</b></i>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label class="form-label" for="slcFloor">Floor :</label>
                    <select class="form-control form-control-sm" id="slcFloor">
                        <?php echo $slcFloor; ?>
                    </select>
                </div>
                <div class="col-md-2 col-xs-12">
                    <label class="form-label" for="slcRack">Rack :</label>
                    <select class="form-control form-control-sm" id="slcRack">
                        <?php echo $slcRack; ?>
                    </select>
                </div>
                <div class="col-md-2 col-xs-12">
                    <label class="form-label" for="slcLevel">Level :</label>
                    <select class="form-control form-control-sm" id="slcLevel">
                        <option value="">- Select -</option>
                        <option value="level 1">Level 1</option>
                        <option value="level 2">Level 2</option>
                        <option value="level 3">Level 3</option>
                        <option value="level 4">Level 4</option>
                        <option value="level 5">Level 5</option>
                    </select>
                </div>
                <div class="col-md-3 col-xs-12">
                    <label class="form-label" for="slcCompany">Company :</label>
                    <select class="form-control form-control-sm" id="slcCompany">
                        <?php echo $slcCompany; ?>
                    </select>
                </div>
                <div class="col-md-3 col-xs-12">
                    <label class="form-label" for="slcDivisi">Divisi :</label>
                    <select class="form-control form-control-sm" id="slcDivisi">
                        <?php echo $slcDivisi; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <label class="form-label" for="txtTitle">Title :</label>
                    <input type="text" class="form-control form-control-sm" id="txtTitle" placeholder="Title">
                </div>
                <div class="col-md-4 col-xs-12">
                    <label class="form-label" for="txtRemark">Remark :</label>
                    <textarea class="form-control" id="txtRemark"></textarea>
                </div>
                <div class="col-md-2 col-xs-12">
                    <label class="form-label" for="txtDocNo">Document No :</label>
                    <input type="text" class="form-control form-control-sm" id="txtDocNo" placeholder="Doc. No">
                </div>
                <div class="col-md-2 col-xs-12">
                    <label class="form-label" for="txtYear">Year :</label>
                    <input type="text" class="form-control form-control-sm" id="txtYear" placeholder="Year">
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-md-6 col-xs-12">
                    <input type="hidden" id="txtIdEdit" value="">
                    <button type="button" id="btnSave" class="btn btn-primary btn-sm btn-block" onclick="saveData();">
                        <i class="fa fa-save"></i> Save</button>
                </div>
                <div class="col-md-6 col-xs-12">
                    <button type="button" class="btn btn-danger btn-sm btn-block" onclick="reloadPage();">
                        <i class="fa fa-ban"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>