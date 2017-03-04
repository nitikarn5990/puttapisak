<script>
    $(document).ready(function () {
        $('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        var asInitVals = new Array();
        var oTable = $('#product_type').dataTable({
            "oLanguage": {
                "sSearch": "Search all columns:"
            },
            "aoColumnDefs": [
                {
                    'bSortable': false,
                    'aTargets': [0]
                } //disables sorting for column one
            ],
            'iDisplayLength': 12,
            "sPaginationType": "full_numbers",
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
            }
        });
//        $("tfoot input").keyup(function () {
//            /* Filter on the column based on the index of this element's parent <th> */
//            oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
//        });
//        $("tfoot input").each(function (i) {
//            asInitVals[i] = this.value;
//        });
//        $("tfoot input").focus(function () {
//            if (this.className == "search_init") {
//                this.className = "";
//                this.value = "";
//            }
//        });
//        $("tfoot input").blur(function (i) {
//            if (this.value == "") {
//                this.className = "search_init";
//                this.value = asInitVals[$("tfoot input").index(this)];
//            }
//        });
    });

    function edit_product_type(product_type_ID)
    {
        var send = {"product_type_ID": product_type_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_product_type_byID",
            method: "POST",
            data: send,
            dataType: "json",
            success: function(data)
            {
//                console.log(data);
                if(data)
                {
                    $("#modal-sizes-3").modal('show');
                    $.each(data, function(key, value)
                    {
                        $("#edit_product_type_ID").val(product_type_ID);
                        $("#edit_product_type_Name_TH").val(value.product_type_Name_TH);
                        $("#edit_product_type_Name_EN").val(value.product_type_Name_EN);
                    });
                }
            }
        });
    }

    function delete_product_type(product_type_ID)
    {
        var send = {"product_type_ID": product_type_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/Admin/delete_product_type",
            type: "POST",
            data: send,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.status == true) {
                    $("#alert_msg").modal("show");
                    $("#text_msg").text("ลบสำเร็จ.");
                    setTimeout(function () {
                        $("#alert_msg").modal("hide");
                        location.reload();
                    }, 2000);
                }
            }
        })
    }

</script>
<div class="x_title">
    <h2>จัดการประเภทสินค้า</h2>
</div>
<div class="x_content">
    <!-- เพิ่มประเภทสินค้า -->
    <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มประเภทสินค้า</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">เพิ่มประเภทสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" action="add_product_type/" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า(ไทย)<span class="required">*</span>
                                </label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="product_type_Name_TH" name="product_type_Name_TH" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า(อังกฤษ)<span class="required">*</span>
                                </label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="product_type_Name_EN" name="product_type_Name_EN" type="text" placeholder="Please fill in.">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /เพิ่มประเภทสินค้า -->

    <!-- แก้ไขประเภทสินค้า -->
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขประเภทสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="update_product_type/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <input type="hidden" id="edit_product_type_ID" name="edit_product_type_ID">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า(ไทย)<span class="required">*</span>
                                </label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="edit_product_type_Name_TH" name="edit_product_type_Name_TH" type="text"  placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า(อังกฤษ)<span class="required">*</span>
                                </label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="edit_product_type_Name_EN" name="edit_product_type_Name_EN" type="text" placeholder="Please fill in.">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /แก้ไขประเภทสินค้า -->
    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="product_type" class="table table-striped responsive-utilities jambo_table dataTable" aria-describedby="example_info">
            <thead>
                <tr class="headings" role="row">
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 102px;"><center>ลำดับ</center></th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="50" style="width: 102px;"><center>ประเภทสินค้า(ไทย)</center></th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="50" style="width: 102px;"><center>ประเภทสินค้า(อังกฤษ)</center></th>
                    <th class="no-link last sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 239px;"><center>สถาณะประเภทสินค้า</center></th>
                    <th class="no-link last sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 239px;"><center>แก้ไขประเภทสินค้า</center></th>
                    <th class="no-link last sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 239px;"><center>ลบประเภทสินค้า</center></th>
                </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">

                    <?php
                    $n=0;
                    foreach($data_product_type as $data)
                    {
                    $n++;
                    ?><tr class="pointer odd">
                    <td class=" "><center><?php echo $n; ?></center></td>
                    <td class=" " colspan="50"><center><?php echo $data['product_type_Name_TH'];?></center></td>
                    <td class=" " colspan="50"><center><?php echo $data['product_type_Name_EN'];?></center></td>
                    <td class=" "><center><button class="btn btn-success btn-xs">Active</button></center></td>
                    <td><center><a href="#" onclick="edit_product_type('<?php echo $data['product_type_ID']; ?>')"><i class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2"></i></a></center></td>
                    <td><center><a href="#" onclick="delete_product_type('<?php echo $data['product_type_ID']; ?>')"><i class="fa fa-times"></i></a></center></td>
                        </tr>
                        <?php
                    }
                    ?>
            </tbody>

        </table>
    </div>
</div>

<div class="modal fade" id="alert_msg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ข้อความ</h4>
            </div>
            <div class="modal-body">
                <p id="text_msg"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->