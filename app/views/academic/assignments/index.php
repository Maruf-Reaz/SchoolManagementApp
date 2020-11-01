<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/16/2018
 * Time: 11:57 AM
 */
?>
<!--Page header and All CSS Files-->
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<style>
    table.jambo_table tbody tr td .btn-group .dropdown-menu li a {
        padding: 6px 12px;
    }

    table.jambo_table tbody tr td a.btn-primary {
        font-size: 18px;
        line-height: 1.6;
    }
</style>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php flash( 'assignment_message' ) ?>
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding-left-right">
                                <div class="au-card-title">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="zmdi zmdi-edit"></i>Assignments</h3>
                                </div>
                                <div class="filters">
                                    <!--==================================================================
								DROPDOWN
	====================================================================-->
                                    <div class="rs-select2--dark rs-select2 rs-select2--border col-lg-2 col-xs-12">
                                        <select class="form-control js-select2" name="class" id="class">
                                            <option value="0" selected="selected">Class</option>
                                            <?php foreach ( $data['classes'] as $class ): ?>
                                            <option value="<?php echo $class->id; ?>">
                                                <?php echo $class->name; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/academic/assignments/add"></i>Add Assignment</a>

                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped jambo_table bulk_action">
                                            <thead>
                                                <tr class="headings">
                                                    <th class="column-title">S/N</th>
                                                    <th class="column-title">Ttile</th>
                                                    <th class="column-title">Description</th>
                                                    <th class="column-title">Deadline</th>
                                                    <th class="column-title">Section</th>
                                                    <th class="column-title">File</th>
                                                    <th class="column-title">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data_table_body">
                                                <tr>
                                                    <td colspan="7" class="text-center alert alert-danger">Please Select a class</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
    $(document).ready(function() {
        $("#class").change(function() {
            var class_id = $(this).val();
            // $("#data_table_body").empty();
            var dataString = 'class_id=' + class_id;
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/academic/assignments/getAssignmentsByClass",
                data: dataString,
                cache: false,
                success: function(objects) {
                    console.log(objects);
                    if (objects.length === 0) {
                        $("#data_table_body").empty();
                        $("#data_table_body").append('<tr><td colspan="7" class="text-center alert alert-danger"> No data found..Please select a class</td></tr>')
                    } else {
                        $("#data_table_body").empty();
                        //add_to_item_table(objects);
                        $.each(objects, function(key, value) {
                            var sections = "";
                            $.each(value.sections, function(key, value) {
                                sections = sections + value.name + "<br>"
                            });
                            //console.log(value.sections);
                            $("#data_table_body").append('<tr>' +
                                '<td>' + eval(key + 1) + '</td>' +
                                '<td>' + value.title + '</td>' +
                                '<td>' + value.description + '</td>' +
                                '<td>' + value.deadline + '</td>' +
                                '<td>' + sections + '</td>' +
                                '<td>' + value.file_name + '</td>' +
                                '<td>' +
                                '<div class="btn-group">' +
                                '<button type="button" class="btn btn-default" data-toggle="dropdown" aria-expanded="false">' + '<i class="fa fa-ellipsis-v">' + '</i>' + '</button>' +
                                '<ul class="dropdown-menu pull-right" role="menu">' +
                                '<li>' +
                                "<a href= 'http://localhost/file/assignments/" + value.file_name + "' class='btn btn-primary'><i class='fa fa-download fa-lg'></i>Download</a>" + '</li>' +
                                '<li>' +
                                "<a href= 'http://localhost/academic/assignments/edit/" + value.id + "' class='btn btn-primary'><i class='fa fa-edit fa-lg'></i>Edit</a>" + '</li>' +
                                '<li>' +
                                "<a href= 'http://localhost/academic/assignments/delete/" + value.id + "' class='btn btn-primary'><i class='fa fa-trash fa-lg'></i>Delete</a>" + '</li>' +
                                '</ul>' +
                                '</div>' +
                                '</td>' +
                                '</tr>'
                            )
                        })

                    }
                }
            })
        });
    });
</script>
<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>