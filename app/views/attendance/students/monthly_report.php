<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/22/2018
 * Time: 12:36 PM
 */ ?>

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
            border-bottom: 1px solid #dee2e6;
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
                    <div class="col-lg-12"
                    ">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40 p-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="zmdi zmdi-edit"></i>Attendance
                                        Monthly
                                        <?php echo !empty($data['month_name_with_year']) ? ' - ' . $data['month_name_with_year'] : ''; ?>
                                        | Total Working Days
                                        <?php echo !empty($data['total_working_days']) ? ' - ' . $data['total_working_days'] : ''; ?>
                                    </h3>
                                </div>
                                <div class="filters">
                                    <div class="rs-select2--dark rs-select2 m-r-10 rs-select2--border col-lg-2 col-xs-12">
                                        <select class="form-control js-select2" name="class_id" id="class" required>
                                            <option>Class</option>
                                            <?php foreach ($data['classes'] as $class): ?>
                                                <?php if (!empty($data['class_id'])): ?>
                                                    <?php if ($data['class_id'] == $class->id): ?>
                                                        <option value="<?php echo $class->id ?>"
                                                                selected="selected">
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

                                    <div class="rs-select2--dark rs-select2 rs-select2--border col-lg-2 col-xs-12">
                                        <select class="form-control js-select2" name="section_id" id="section"
                                                required>
                                            <option value="0" selected="selected">Section</option>
                                            <?php if (!empty($data['section_id']) && !empty($data['class_id'])): ?>
                                                <?php foreach ($data['sections'] as $section): ?>
                                                    <?php if ($data['section_id'] == $section->id): ?>
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

                                    <a href="#" id="prev_button"
                                       class="btn-lg btn-primary" value="Previous"><i style="color: #909090"
                                                                                      class="fa fa-angle-double-left fa-lg"></i></a>
                                    <input type="hidden" id="prev_month"
                                           value="<?php echo !empty($data['prev_month']) ? $data['prev_month'] : '' ?>">
                                    <!--Month-->
                                    <!--Dates-->
                                    <input id="monthpicker" name="monthpicker" class="datepicker au-input"
                                           type="text" placeholder="date" autocomplete="off"
                                           value="<?php echo !empty($data['current_year']) ? (string)$data['current_year'] . '-' : '' . !empty($data['current_month']) ? (string)$data['current_month'] : '' ?>">

                                    <!--Next Button-->
                                    <a href="#" id="next_button"
                                       class="btn-lg btn-primary" value="Next"><i style="color: #909090"
                                       class="fa fa-angle-double-right  fa-lg"></i></a>

                                    <!--<a data-toggle="tooltip" id="next_button" title="Next" class="fa fa-angle-right fa-lg" href="#" style="margin: 0 10px" value="Next"></a>-->

                                    <!--<input data-toggle="tooltip" id="next_button" title="Next" type="button" s class="btn btn-primary" value="Next">-->
                                    <input type="hidden" id="next_month"
                                           value="<?php echo !empty($data['next_month']) ? $data['next_month'] : '' ?>">
                                    <!--Show Report Button-->
                                    <input data-toggle="tooltip" id="show_report_button" title="Show report"
                                           type="button" class="btn btn-primary" value="Show Report">

                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                            <tr>
                                                <th rowspan="2" class="column-title"
                                                    style="vertical-align: middle; border-right-width: 1px; border-right-style: solid;">
                                                    S/N
                                                </th>
                                                <th rowspan="2" class="column-title"
                                                    style="vertical-align: middle; border-right-width: 1px;border-right-style: solid;">
                                                    St.R
                                                </th>
                                                <th rowspan="2" class="column-title"
                                                    style="vertical-align: middle; border-right-width: 1px;border-right-style: solid; width: 120px;">
                                                    Student Name
                                                </th>
                                                <?php if (!empty($data['days_in_month'])): ?>
                                                    <?php for ($date = 1; $date <= $data['days_in_month']; $date++): ?>
                                                        <th colspan="1" class="column-title"
                                                            style="border-right-width: 1px;border-right-style: solid;">
                                                            <?php echo $date; ?>
                                                        </th>
                                                    <?php endfor; ?>
                                                <?php endif; ?>

                                                <th rowspan="2" class="column-title"
                                                    style="vertical-align: middle; border-right-width: 1px;border-right-style: solid;">
                                                    Total <br> Present
                                                </th>
                                                <th rowspan="2" class="column-title"
                                                    style="vertical-align: middle; border-right-width: 1px;border-right-style: solid;">
                                                    Total <br> Absent
                                                </th>
                                            </tr>
                                            <tr>
                                                <?php if (!empty($data['day_names'])): ?>
                                                    <?php foreach ($data['day_names'] as $day_name): ?>
                                                        <?php if ($day_name == 'Fr' || $day_name == 'Sa'): ?>
                                                            <th class="column-title"
                                                                style="background-color: #ff3547; border-right-width: 1px;border-right-style: solid;">
                                                                <?php echo $day_name; ?>
                                                            </th>
                                                        <?php else: ?>
                                                            <th class="column-title"
                                                                style="border-right-width: 1px;border-right-style: solid;">
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
                                            <?php if (!empty($data['student_attendances'])): ?>
                                                <?php foreach ($data['student_attendances'] as $key => $attendance): ?>
                                                    <tr data-toggle="tooltip"
                                                        title="<?php echo $attendance['name']; ?>">
                                                        <td class="text-black">
                                                            <?php echo $key + 1; ?>
                                                        </td>
                                                        <td class="text-black">
                                                            <?php echo $attendance['roll']; ?>
                                                        </td>
                                                        <td class="text-black">
                                                            <?php echo $attendance['name']; ?>
                                                        </td>

                                                        <?php foreach ($attendance['days'] as $day): ?>
                                                            <?php if ($day == 'A'): ?>
                                                                <td class="text-danger">
                                                                    <?php echo $day; ?>
                                                                </td>
                                                            <?php elseif ($day == 'PH'): ?>
                                                                <td style="color:#FF4500">
                                                                    <?php echo $day; ?>
                                                                </td>
                                                            <?php elseif ($day == 'SL'): ?>
                                                                <td style="color:#FF0D73">
                                                                    <?php echo $day; ?>
                                                                </td>
                                                            <?php elseif ($day == 'V'): ?>
                                                                <td style="color:#4fbd4f">
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
                                                        <td class="text-black">
                                                            <?php echo $attendance['total_absent']; ?>
                                                        </td>
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
    </div>


    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                autoclose: true,
                setDate: new Date(),
                format: "yyyy-mm",
                startView: "months",
                minViewMode: "months",

            });
            /*$("#monthpicker").bootstrapMaterialDatePicker({
                        format: "M/YYYY",
                        lang: "br",
                        time: false
                    });*/
            $("#show_report_button").click(function () {
                var date = $("#monthpicker").val();
                var res = date.split("-");
                var year = res[0];
                var month = res[1];
                var class_id = $("#class").val();
                var section_id = $("#section").val();
                var url = 'monthly-report?year=' + year + '&month=' + month + '&class=' + class_id + '&section=' + section_id;
                $(location).attr("href", url);
            });
            $("#prev_button").click(function () {
                var date = $("#prev_month").val();
                var res = date.split("-");
                var year = res[0];
                var month = res[1];
                var class_id = $("#class").val();
                var section_id = $("#section").val();
                var url = 'monthly-report?year=' + year + '&month=' + month + '&class=' + class_id + '&section=' + section_id;
                $(location).attr("href", url);
            });
            $("#next_button").click(function () {
                var date = $("#next_month").val();
                var res = date.split("-");
                var year = res[0];
                var month = res[1];
                var class_id = $("#class").val();
                var section_id = $("#section").val();
                var url = 'monthly-report?year=' + year + '&month=' + month + '&class=' + class_id + '&section=' + section_id;
                $(location).attr("href", url);
            });
            $("#class").change(function () {
                var class_id = $(this).val();
                // $("#data_table_body").empty();
                var dataString = 'class_id=' + class_id;
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
                            $.each(objects, function (key, value) {
                                $("#section").append('<option value="' + value.id + '" class="text-center">' + value.section_name + '</option>')
                            })

                        }
                    }
                })
            });
        });
    </script>
<?php require APPROOT . '/views/layouts/footer.php' ?>