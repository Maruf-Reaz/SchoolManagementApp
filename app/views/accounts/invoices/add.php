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
                <div class="col-lg-6" style="margin: auto">
                    <div class="au-card au-card au-card--no-pad m-b-40">
                        <div class="au-card-title"
                             style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                                <i class="zmdi zmdi-edit"></i>Add Single Invoice</h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php URLROOT; ?>/accounts/invoices/add" method="post">
                                <div class="form-group">
                                    <div class="input-group-addon2">Month</div>
                                    <div class="input-group">

                                        <select name="month" id="month" class="form-control ">
                                            <option value="0" selected="selected">-Select Month-</option>
											<?php
											for ( $i = 1; $i <= 12; ++ $i ) {
												$month_name = date( 'F', mktime( 0, 0, 0, $i, 1 ) );
												echo "<option value='$month_name'>$month_name</option>";
											}
											?>
                                        </select>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Year</div>
                                    <div class="input-group">

                                        <select name="year" id="year" class="form-control ">
                                            <option value="0" selected="selected">-Select Year-</option>
											<?php
											for ( $i = date( 'Y' ); $i >= 1950; $i -- ) {
												echo "<option value='$i'>$i</option>";
											}
											?>
                                        </select>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Class</div>
                                    <div class="input-group">

                                        <select name="class_id" id="class_id" class="form-control ">
                                            <option value="-1" selected="selected">-Select Class-</option>
											<?php foreach ( $data['classes'] as $class ): ?>
                                                <option value="<?php echo $class->id; ?>"> <?php echo $class->name; ?></option>
											<?php endforeach; ?>
                                        </select>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Section</div>
                                    <div class="input-group">

                                        <select name="section" id="section" class="form-control ">
                                            <option value="0" selected="selected">-Select Section-</option>
                                        </select>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Registration Number</div>
                                    <div class="input-group">

                                        <select name="registration_number" id="registration_number"
                                                class="form-control ">
                                            <option value="" selected="selected">-Select Registration Number-</option>
                                        </select>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Student</div>
                                    <div class="input-group">

                                        <input type="text" id="student" name="student" readonly class="form-control">
                                        <input type="hidden" id="student_id" name="student_id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Fee Type</div>
                                    <div class="input-group">

                                        <select name="fee_type_id" id="fee_type_id" class="form-control ">
                                            <option value="0" selected="selected">-Select Fee Type-</option>
											<?php foreach ( $data['fee_types'] as $fee_type ): ?>
                                                <option value="<?php echo $fee_type->id; ?>"> <?php echo $fee_type->fee_type_name; ?></option>
											<?php endforeach; ?>
                                        </select>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Amount</div>
                                    <div class="input-group">

                                        <input type="number" step="any" id="amount" name="amount" class="form-control"
                                               readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Fine</div>
                                    <div class="input-group">

                                        <input type="number" step="any" id="fine" name="fine" class="form-control"
                                               placeholder="Enter Fine..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Discount</div>
                                    <div class="input-group">

                                        <input type="number" step="any" id="discount" name="discount"
                                               class="form-control" placeholder="Enter Percentage of Discount..."
                                               required>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary">Add Invoice</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#class_id").change(function () {
            var class_id = $(this).val();
            $("#section").empty();
            $("#section").append('<option value="">-Select Section-</option>');
            $("#registration_number").empty();
            $("#registration_number").append('<option value="">-Select Registration Number-</option>');
            $("#student").val("");
            $("#student_id").val("");
            $('#fee_type_id option[selected]').prop('selected', true);
            $("#amount").val("");
            var dataString = 'class_id=' + class_id;
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "/academic/sections/getSectionsByClass",
                data: dataString,
                cache: false,
                success: function (objects) {
                    if (objects.length === 0) {
                        $("#section").empty();
                        $("#section").append('<option value="">-Select Section-</option>');
                    } else {
                        $.each(objects, function (key, value) {
                            $("#section").append('<option value=' + value.id + '>' + value.section_name + '</option>');
                        })
                    }
                }
            });
        });
        $("#section").change(function () {
            var class_id = $('#class_id').val();
            var section_id = $(this).val();
            $("#registration_number").empty();
            $("#registration_number").append('<option value="">-Select Registration Number-</option>');
            $("#student").val("");
            $("#student_id").val("");
            $('#fee_type_id option[selected]').prop('selected', true);
            $("#amount").val("");
            var dataString = {class_id: class_id, section_id: section_id};
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "/accounts/invoices/showStudentsByClassAndSection",
                data: dataString,
                cache: false,
                success: function (objects) {
                    if (objects.length === 0) {
                        $("#registration_number").empty();
                        $("#registration_number").append('<option value="">-Select Registration Number-</option>');
                    } else {
                        $.each(objects, function (key, value) {
                            $("#registration_number").append('<option value=' + value.registration_no + '>' + value.registration_no + '</option>');
                        })
                    }
                }
            });
        });
        $("#registration_number").change(function () {
            var class_id = $('#class_id').val();
            var section_id = $('#section').val();
            var registration_number = $(this).val();
            var dataString = {class_id: class_id, section_id: section_id, registration_number: registration_number};
            $("#student").val("");
            $("#student_id").val("");
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "/accounts/invoices/showStudentByClassSectionAndRegistrationNumber",
                data: dataString,
                cache: false,
                success: function (object) {
                    if (object === null) {
                        $("#student").val("No Student Found! ");
                        $("#student_id").val("");
                    } else {
                        $("#student").val(object.student_name);
                        $("#student_id").val(object.id);
                    }
                }
            });
        });
        $("#fee_type_id").change(function () {
            var fee_type_id = $(this).val();
            var class_id = $('#class_id').val();
            var dataString = {class_id: class_id, fee_type_id: fee_type_id};
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "/accounts/invoices/showFeeByClassAndFeeType",
                data: dataString,
                cache: false,
                success: function (object) {
                    if (object.length != 0) {
                        $("#amount").val(object.fee_amount);
                    }
                }
            });
        });
    });
</script>

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>