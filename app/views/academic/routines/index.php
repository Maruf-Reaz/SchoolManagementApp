<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/25/2018
 * Time: 2:20 AM
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
    .rs-select2--dark {
        margin-right: 20px;
    }
</style>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding-left-right">
                                <div class="au-card-title">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="zmdi zmdi-edit"></i>Routine</h3>
                                </div>
                                <div class="filters">
                                    <div class="rs-select2--dark rs-select2 m-r-10 rs-select2--border col-lg-2 col-xs-12">
                                        <select class="form-control js-select2" name="class" id="class">
                                            <option value="0" selected="selected">--Select Class--</option>
                                            <?php foreach ( $data['classes'] as $class ): ?>
                                            <option value="<?php echo $class->id; ?>">
                                                <?php echo $class->name; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--dark rs-select2 rs-select2--border col-lg-2 col-xs-12">
                                        <select class="form-control js-select2" name="class" id="section">
                                            <option value="0" selected="selected">Section</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/academic/routines/add"><i class="fa fa-plus"></i>Add Syllabus</a>

                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action" id="data_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th class="column-title">Day</th>
                                                    <th class="column-title">1st</th>
                                                    <th class="column-title">2nd</th>
                                                    <th class="column-title">3rd</th>
                                                    <th class="column-title">4th</th>
                                                    <th class="column-title">5th</th>
                                                    <th class="column-title">6th</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data_table_body">
                                                <tr id="day_1">
                                                    <td class="column-title"><strong>Saturday</strong></td>
                                                </tr>
                                                <tr id="day_2">
                                                    <td class="column-title"><strong>Sunday</strong></td>
                                                </tr>
                                                <tr id="day_3">
                                                    <td class="column-title"><strong>Monday</strong></td>
                                                </tr>
                                                <tr id="day_4">
                                                    <td class="column-title"><strong>Tuesday</strong></td>
                                                </tr>
                                                <tr id="day_5">
                                                    <td class="column-title"><strong>Wednesday</strong></td>
                                                </tr>
                                                <tr id="day_6">
                                                    <td class="column-title"><strong>Thursday</strong></td>
                                                </tr>
                                                <tr id="day_7">
                                                    <td class="column-title"><strong>Friday</strong></td>
                                                </tr>

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
    $(document).ready(function() {
        $("#class").change(function() {
            var class_id = $(this).val();
            // $("#data_table_body").empty();
            var dataString = 'class_id=' + class_id;
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/academic/sections/getSectionsByClass",
                data: dataString,
                cache: false,
                success: function(objects) {
                    //console.log(objects)
                    if (objects.length === 0) {
                        $("#section").empty();
                        $("#section").append('<option  class="text-center">No sections found</option>');
                    } else {
                        $("#section").empty();
                        $("#section").append('<option value="" class="text-center">Section</option>');
                        //add_to_item_table(objects);
                        $.each(objects, function(key, value) {
                            $("#section").append('<option value="' + value.id + '" class="text-center">' + value.section_name + '</option>')
                        })

                    }
                }
            })
        });
        $("#section").change(function() {
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
                success: function(objects) {
                    console.log(objects)
                    if (objects.length === 0) {
                        $("#data_table_body").empty();
                        $("#data_table_body").append('<tr><td colspan="7" class="text-center"> No data found..Please select a class</td></tr>')
                    } else {
                        //$("#data_table_body").empty();
                        //add_to_item_table(objects);
                        $.each(objects, function(key, value) {
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