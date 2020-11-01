<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/22/2018
 * Time: 11:54 AM
 */ ?>
<!--Page header and All CSS Files-->
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12" style="">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="zmdi zmdi-edit"></i>List of Device users</h3>
                                </div>
                                <div class="filters">


                                    <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                        <select class="form-control" name="group_id" id="group_id">
                                            <option value="0" selected="selected">--Select Group--</option>
											<?php foreach ( $data['roles'] as $roles ): ?>
                                                <option value="<?php echo $roles->id; ?>">
													<?php echo $roles->name; ?>
                                                </option>
											<?php endforeach; ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <div class="rs-select2--dark rs-select2--sm rs-select2--border"
                                         style="width: 180px">
                                        <select class="form-control" name="class" id="section">
                                            <option value="0" selected="selected">Class</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>


                                    <a data-toggle="tooltip" title="PDF" class="fa fa-file-pdf" href="#"
                                       style="float: right;font-size: 27px "></a>
                                    <a data-toggle="tooltip" onClick="window.print()" title="Print"
                                       class="fa fa-print" href="#"
                                       style="float: right;padding-right: 15px;font-size: 27px "></a>


                                    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/academic/routines/add"
                                       style="float: right; margin-right: 11px;"><i class="fa fa-plus"
                                                                                    style="padding-right: 7px;"></i>Add
                                        Syllabus</a>

                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action" id="data_table">
                                            <thead>
                                            <tr class="headings">
                                                <th style="width:80px" class="column-title">SN</th>
                                                <th class="column-title">Name</th>
                                                <th class="column-title">Registration</th>
                                                <th class="column-title">Card</th>
                                                <th class="column-title">PIN</th>
                                                <th class="column-title">Fingerprint</th>
                                                <th class="column-title">Password</th>
                                                <th class="column-title">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="data_table_body">
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END DATA TABLE -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#group_id").change(function () {
            var group_id = $(this).val();
            // $("#data_table_body").empty();
            var dataString = 'group_id=' + group_id;
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/academic/sections/getSectionsByClass",
                data: dataString,
                cache: false,
                success: function (objects) {
                    //console.log(objects)
                    if (objects.length === 0) {
                        $("#section").empty();
                        $("#section").append('<option  class="text-center">No sections found</option>');
                    } else {
                        $("#section").empty();
                        $("#section").append('<option value="" class="text-center">Section</option>');
                        //add_to_item_table(objects);
                        $.each(objects, function (key, value) {
                            $("#section").append('<option value="' + value.id + '" class="text-center">' + value.section_name + '</option>')
                        })

                    }
                }
            })
        });
        $("#section").change(function () {
            var class_id = $('#class').val();
            // $("#data_table_body").empty();
            var section_id = $('#section').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/academic/routines/getRoutineByClassAndSection",
                data: {
                    class_id: class_id,
                    section_id: section_id
                },
                cache: false,
                success: function (objects) {
                    console.log(objects)
                    if (objects.length === 0) {
                        $("#data_table_body").empty();
                        $("#data_table_body").append('<tr><td colspan="7" class="text-center"> No data found..Please select a class</td></tr>')
                    } else {
                        //$("#data_table_body").empty();
                        //add_to_item_table(objects);
                        $.each(objects, function (key, value) {
                            var day = '#' + 'day_' + value.day_id;
                            $(day).append(
                                '<td>' + value.subject_name + '<br>' +
                                value.teacher_name + '<br>' +
                                value.starting_time + '--' +
                                value.ending_time + '</td>'
                            )
                        })

                    }
                }
            })
        });
    });
</script>
<?php require APPROOT . '/views/layouts/footer.php' ?>
