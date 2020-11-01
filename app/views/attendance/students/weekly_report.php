<?php require APPROOT . '/views/layouts/header.php' ?>

<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<style>
    .table thead th {
        border-right: 0.5px solid #dee2e6;
        border-right: 0.5px solid #dee2e6;
        vertical-align: middle;
    }
    
    .column-title {
        border: 1px solid #dee2e6;
        vertical-align: middle;
    }
    
    .table thead td {
        border-right: 0.5px solid #dee2e6;
    }

    table.jambo_table tbody tr td {
        border-right: 0.5px solid #dee2e6;
    }
    .table th,
    .table td {
        padding-right: 0px;
        padding-left: 0px;
        padding-top: 0.45rem;
        padding-bottom: 0.45rem;
    }

    table.jambo_table tbody tr:hover td {
        padding-right: 0px;
        padding-left: 0px;
        padding-top: 0.45rem;
        padding-bottom: 0.45rem;
    }

    .table thead th {
        border: 1px solid #dee2e6;
        font-weight: 400;
    }

    .table tbody tr td {
        width: 1px solid red;
    }
    
    .rs-select2--dark {
        margin-right: 20px;
    }
</style>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12" style="">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40" style="padding-bottom: 40px;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title" style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="zmdi zmdi-edit"></i>Attendance
                                        Weekly
                                        <?php echo ! empty( $data['week_of_the_year'] ) ? '- ' . $data['week_of_the_year'] : ''; ?>
                                    </h3>
                                </div>
                                <div class="filters">
                                    <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                        <select class="form-control js-select2" name="class_id" id="class" required>
                                            <option>Class</option>
                                            <?php foreach ( $data['classes'] as $class ): ?>
                                            <?php if ( ! empty( $data['class_id'] ) ): ?>
                                            <?php if ( $data['class_id'] == $class->id ): ?>
                                            <option value="<?php echo $class->id ?>" selected="selected">
                                                <?php echo $class->name; ?>
                                            </option>
                                            <?php else: ?>
                                            <option value="<?php echo $class->id ?>">
                                                <?php echo $class->name; ?>
                                            </option>
                                            <?php endif; ?>
                                            <?php else: ?>
                                            <option value="<?php echo $class->id ?>">
                                                <?php echo $class->name; ?>
                                            </option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <div class="rs-select2--dark rs-select2--sm rs-select2--border" style="width: 180px">
                                        <select class="form-control js-select2" name="section_id" id="section" required>
                                            <option value="0" selected="selected">Section</option>
                                            <?php if ( ! empty( $data['section_id'] ) && ! empty( $data['class_id'] ) ): ?>
                                            <?php foreach ( $data['sections'] as $section ): ?>
                                            <?php if ( $data['section_id'] == $section->id ): ?>
                                            <option selected value="<?php echo $section->id; ?>">
                                                <?php echo $section->section_name; ?>
                                            </option>
                                            <?php else: ?>
                                            <option value="<?php echo $section->id; ?>">
                                                <?php echo $section->section_name; ?>
                                            </option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <!--Prev Button-->
                                    <input type="hidden" id="prev_week" value="<?php echo ! empty( $data['prev_week'] ) ? $data['prev_week'] : '' ?>">

                                    <a href="#" data-toggle="tooltip" id="prev_button" title="Previous Week" style="font-size:17px; color: #666; background: #fff; padding: 0.3rem 0.7rem; border: 1px solid #e5e5e5; margin-left: 20px;" class="btn-lg btn-primary" value="Previous"><i style="color: #909090" class="fa fa-angle-double-left fa-lg"></i></a>

                                    <!--Dates-->
                                    <input style="width: 181px; height: 37px" class="week-picker au-input" id="weekpicker" type="text" placeholder="date" autocomplete="off" value="10">

                                    <!--Next Button-->
                                    <input type="hidden" id="next_week" value="<?php echo ! empty( $data['next_week'] ) ? $data['next_week'] : '' ?>">
                                    <a href="#" data-toggle="tooltip" id="next_button" title="Next Week" style="font-size:17px; color: #666; background: #fff; padding: 0.3rem 0.7rem; border: 1px solid #e5e5e5; margin-right: 20px;" class="btn-lg btn-primary" value="Next"><i style="color: #909090" class="fa fa-angle-double-right  fa-lg"></i></a>

                                    <!--Show Report Button-->
                                    <input data-toggle="tooltip" id="show_report_button" title="Show report" type="button" class="btn btn-primary" value="Show Report">

                                    <!--Export Button-->

                                    <a data-toggle="tooltip" onClick="window.print()" title="PDF" class="fa fa-file-pdf" href="#" style="float: right; padding-top: 6px;font-size: 27px "></a>
                                    <a data-toggle="tooltip" onClick="window.print()" title="Print" class="fa fa-print" href="#" style="float: right; padding-top: 6px;padding-right: 15px;font-size: 27px "></a>

                                    <!--<style>
											.table th,
											.table td {
												padding: 0.75rem;
											}
										</style>-->


                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" class="column-title">
                                                        S/N
                                                    </th>
                                                    <th rowspan="2" class="column-title">
                                                        St.R
                                                    </th>
                                                    <th rowspan="2" class="column-title">
                                                        Student Name
                                                    </th>
                                                    <!--Day-->
                                                    <?php if ( ! empty( $data['day_names'] ) ): ?>
                                                    <?php foreach ( $data['day_names'] as $key => $date ): ?>
                                                    <th colspan="1" class="column-title">
                                                        <?php echo $key; ?>
                                                    </th>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>


                                                    <th rowspan="2" class="column-title">
                                                        Total <br> Present
                                                    </th>
                                                    <th rowspan="2" class="column-title">
                                                        Total <br> Absent
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <?php if ( ! empty( $data['day_names'] ) ): ?>
                                                    <?php foreach ( $data['day_names'] as $day_name ): ?>
                                                    <?php if ( $day_name == 'Friday' || $day_name == 'Saturday' ): ?>
                                                    <th class="column-title">
                                                        <?php echo $day_name; ?>
                                                    </th>
                                                    <?php else: ?>
                                                    <th class="column-title">
                                                        <?php echo $day_name; ?>
                                                    </th>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <?php else: ?>
                                                <tr class="column-title">
                                                    <td colspan="30">
                                                        No data found. Please select a Class ,Section and a Date.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tbody>
                                                <?php if ( ! empty( $data['student_attendances'] ) ): ?>
                                                <?php foreach ( $data['student_attendances'] as $key => $attendance ): ?>
                                                <tr data-toggle="tooltip" title="<?php echo $attendance['name']; ?>">
                                                    <td class="text-black">
                                                        <?php echo $key + 1; ?>
                                                    </td>
                                                    <td class="text-black">
                                                        <?php echo $attendance['roll']; ?>
                                                    </td>
                                                    <td class="text-black">
                                                        <?php echo $attendance['name']; ?>
                                                    </td>

                                                    <?php foreach ( $attendance['days'] as $day ): ?>
                                                    <?php if ( $day == 'A' ): ?>
                                                    <td class="text-danger">
                                                        <?php echo $day; ?>
                                                    </td>
                                                    <?php else: ?>
                                                    <td class="text-black">
                                                        <?php echo $day; ?>
                                                    </td>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>

                                                    <td class="text-black">
                                                        <?php echo $attendance['total_present']; ?>
                                                    </td>
                                                    <td class="text-black">0</td>
                                                </tr>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
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
    var weekpicker, start_date, end_date;

    function set_week_picker(date) {
        start_date = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay());
        end_date = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 6);
        weekpicker.datepicker('update', start_date);
        weekpicker.val(start_date.getFullYear() + '-' + (start_date.getMonth() + 1) + '-' + start_date.getDate() + ' = ' + (end_date.getFullYear()) + '-' + (end_date.getMonth() + 1) + '-' + end_date.getDate());
    }

    $(document).ready(function() {
        weekpicker = $('.week-picker');
        console.log(weekpicker);
        weekpicker.datepicker({
            autoclose: true,
            forceParse: false,
            container: '#week-picker-wrapper',
        }).on("changeDate", function(e) {
            set_week_picker(e.date);
        });
        $('.week-prev').on('click', function() {
            var prev = new Date(start_date.getTime());
            prev.setDate(prev.getDate() - 1);
            set_week_picker(prev);
        });
        $('.week-next').on('click', function() {
            var next = new Date(end_date.getTime());
            next.setDate(next.getDate() + 1);
            set_week_picker(next);
        });
        set_week_picker(new Date);

        $("#show_report_button").click(function() {
            var date = $("#weekpicker").val();
            var res = date.split("=");
            var start_date = res[0].trim();
            var end_date = res[1].trim();
            var class_id = $("#class").val();
            var section_id = $("#section").val();
            var url = 'weekly-report?sdate=' + start_date + '&edate=' + end_date + '&class=' + class_id + '&section=' + section_id;
            $(location).attr("href", url);
        });
        $("#prev_button").click(function() {
            var date = $("#prev_week").val();
            var class_id = $("#class").val();
            var section_id = $("#section").val();
            var url = 'weekly-report?sdate=' + date + '&class=' + class_id + '&section=' + section_id;
            $(location).attr("href", url);
        });
        $("#next_button").click(function() {
            var date = $("#next_week").val();
            var class_id = $("#class").val();
            var section_id = $("#section").val();
            var url = 'weekly-report?sdate=' + date + '&class=' + class_id + '&section=' + section_id;
            $(location).attr("href", url);
        });
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
                        $.each(objects, function(key, value) {
                            $("#section").append('<option value="' + value.id + '" class="text-center">' + value.section_name + '</option>')
                        })

                    }
                }
            })
        });
    });
</script>


<?php require APPROOT . '/views/layouts/footer.php' ?>