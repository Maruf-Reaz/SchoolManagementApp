<!--Page header and All CSS Files-->
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<form action="<?php URLROOT; ?>/accounts/invoices/addinvoices" method="post"
      id="add_invoice_form">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="au-card au-card au-card--no-pad m-b-40">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="au-card-title"
                                         style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3><i class="fa fa-pencil-alt"></i>Add Multiple Invoice</h3>
                                    </div>
                                    <div class="filters">
                                        <div style="width: 150px"
                                             class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="form-control" name="month" id="month">
                                                <option value="0" selected="selected">-Select Month-</option>
												<?php
												for ( $i = 1; $i <= 12; ++ $i ) {
													$month_name = date( 'F', mktime( 0, 0, 0, $i, 1 ) );
													echo "<option value='$month_name'>$month_name</option>";
												}
												?>
                                            </select>
                                        </div>
                                        <div style="width: 150px"
                                             class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="form-control" name="year" id="year">
                                                <option value="0" selected="selected">-Select Year-</option>
												<?php
												for ( $i = date( 'Y' ); $i >= 1950; $i -- ) {
													echo "<option value='$i'>$i</option>";
												}
												?>
                                            </select>
                                        </div>
                                        <div style="width: 150px"
                                             class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="form-control" id="class_id" name="class_id">
                                                <option value="-1" selected="selected">-Select Class-</option>
												<?php foreach ( $data['classes'] as $class ): ?>
                                                    <option value="<?php echo $class->id; ?>"> <?php echo $class->name; ?></option>
												<?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div style="width: 150px"
                                             class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="form-control" name="section" id="section">
                                                <option value="0" selected="selected">-Select Section-</option>
                                            </select>
                                        </div>
                                        <div style="width: 150px"
                                             class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="form-control" name="fee_type_id" id="fee_type_id">
                                                <option value="0" selected="selected">-Select Fee Type-</option>
												<?php foreach ( $data['fee_types'] as $fee_type ): ?>
                                                    <option value="<?php echo $fee_type->id; ?>"> <?php echo $fee_type->fee_type_name; ?></option>
												<?php endforeach; ?>
                                            </select>
                                            <input type="hidden" id="fee">
                                        </div>
                                    </div>
                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <table class="table table-striped jambo_table bulk_action">
                                                <thead>
                                                <tr class="headings">
                                                    <th class="column-title">S/N</th>
                                                    <th class="column-title">Name</th>
                                                    <th class="column-title">Roll</th>
                                                    <th class="column-title">Fee Type</th>
                                                    <th class="column-title">Amount</th>
                                                    <th class="column-title">Discount (%)</th>
                                                    <th class="column-title">Fine</th>
                                                    <th class="column-title">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody id="data_table_body">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin: auto; margin-top: 10px" class="form-actions form-group">
                                    <button id="addAllButton" type="submit"
                                            class="btn btn-primary" style="margin-bottom: 10px">Add All
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        $('#addAllButton').attr('hidden', true);
        $('#year').attr('disabled', true);
        $('#class_id').attr('disabled', true);
        $('#section').attr('disabled', true);
        $('#fee_type_id').attr('disabled', true);
        $("#month").change(function () {
            var month = $(this).val();
            if (month == "0") {
                $('#year').attr('disabled', true);
            } else {
                $('#year').attr('disabled', false);
            }
            $('#class_id option[selected]').prop('selected', true);
            $('#year option[selected]').prop('selected', true);
            $('#fee_type_id option[selected]').prop('selected', true);
            $('#class_id').attr('disabled', true);
            $('#section').attr('disabled', true);
            $('#fee_type_id').attr('disabled', true);
            $("#data_table_body").empty();
            $('#addAllButton').attr('hidden', true);
        });
        $("#year").change(function () {
            var year = $(this).val();
            if (year == "0") {
                $('#class_id').attr('disabled', true);
            } else {
                $('#class_id').attr('disabled', false);
            }
            $('#class_id option[selected]').prop('selected', true);
            $('#section').attr('disabled', true);
            $('#fee_type_id option[selected]').prop('selected', true);
            $('#fee_type_id').attr('disabled', true);
            $("#data_table_body").empty();
            $('#addAllButton').attr('hidden', true);
        });
        $("#class_id").change(function () {
            $('#addAllButton').attr('hidden', true);
            $('#section').attr('disabled', false);
            $('#fee_type_id').attr('disabled', true);
            var class_id = $(this).val();
            $("#section").empty();
            $("#section").append('<option value="">-Select Section-</option>');
            $("#data_table_body").empty();
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
            var section = $(this).val();
            if (section == "") {
                $('#fee_type_id').attr('disabled', true);
            } else {
                $('#fee_type_id').attr('disabled', false);
            }
            $('#fee_type_id option[selected]').prop('selected', true);
            $("#data_table_body").empty();
            $('#addAllButton').attr('hidden', true);
        });
        $("#fee_type_id").change(function () {
            var fee_type_id = $(this).val();
            if (fee_type_id != "0") {
                var amount = 0;
                var fee_type = document.getElementById('fee_type_id');
                var fee_type_name = fee_type.options[fee_type.selectedIndex].innerHTML;
                if (fee_type_id == 0) {
                    fee_type_name = "";
                } else {
                    fee_type_name = fee_type_name;
                }
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
                            amount = object.fee_amount;
                        }
                    }
                });
                var section_id = $('#section').val();
                var dataString1 = {class_id: class_id, section_id: section_id};
                $.ajax
                ({
                    type: "POST",
                    dataType: 'json',
                    url: "/accounts/invoices/showStudentsByClassAndSection",
                    data: dataString1,
                    cache: false,
                    success: function (objects) {
                        if (objects.length === 0) {
                            $("#data_table_body").empty();
                            $("#data_table_body").append('No Students Found In This Class');
                        } else {
                            $("#data_table_body").empty();
                            //add_to_item_table(objects);
                            $.each(objects, function (key, value) {
                                var month = $('#month').val();
                                var year = $('#year').val();
                                var newDataString = {
                                    student_id: value.id,
                                    fee_type_id: fee_type_id,
                                    month: month,
                                    year: year
                                };
                                $.ajax({
                                    type: "POST",
                                    dataType: 'json',
                                    url: "/accounts/invoices/doesInvoiceExist",
                                    data: newDataString,
                                    cache: false,
                                    success: function (data) {
                                        if (data == true) {
                                            $("#data_table_body").append(
                                                '<tr class="even pointer">' +
                                                '<td>#</td>' +
                                                '<td>' + value.student_name + '</td>' +
                                                '<td>' + value.roll_no + '</td>' +
                                                '<td><input style="width: 150px;margin: auto" type="text" class="form-control fee_type_name" name="fee_type_name" readonly value="' + fee_type_name + '"><input type="hidden" class="student_id" name="student_id[]" value="' + value.id + '"></td>' +
                                                '<td><input style="width: 100px;margin: auto" type="number" step="any" class="form-control amount" readonly name="amount[]" value="' + amount + '"></td>' +
                                                '<td><input style="width: 100px;margin: auto" type="number" step="any" class="form-control discount_in_percentage" name="discount_in_percentage[]" value="0"></td>' +
                                                '<td><input style="width: 100px;margin: auto" type="number" step="any" class="form-control fine" name="fine[]" value="0"></td>' +
                                                '<td><input type="button" disabled class="btn btn-primary btn-sm" value="Added"></td>' +
                                                '</tr>'
                                            );
                                        } else {
                                            $("#data_table_body").append(
                                                '<tr class="even pointer">' +
                                                '<td>#</td>' +
                                                '<td>' + value.student_name + '</td>' +
                                                '<td>' + value.roll_no + '</td>' +
                                                '<td><input style="width: 150px;margin: auto" type="text" class="form-control fee_type_name" name="fee_type_name" readonly value="' + fee_type_name + '"><input type="hidden" class="student_id" name="student_id[]" value="' + value.id + '"></td>' +
                                                '<td><input style="width: 100px;margin: auto" type="number" step="any" class="form-control amount" readonly name="amount[]" value="' + amount + '"></td>' +
                                                '<td><input style="width: 100px;margin: auto" type="number" step="any" class="form-control discount_in_percentage" name="discount_in_percentage[]" value="0"></td>' +
                                                '<td><input style="width: 100px;margin: auto" type="number" step="any" class="form-control fine" name="fine[]" value="0"></td>' +
                                                '<td><input type="button"  class="btn btn-primary btn-sm add_invoice_btn" name="add_invoice_btn[]" value="Add"></td>' +
                                                '</tr>'
                                            );
                                        }
                                        $(".add_invoice_btn").click(function () {
                                            var student_id = $(this).closest("tr").find(".student_id").val();
                                            var amount = $(this).closest("tr").find(".amount").val();
                                            var month = $('#month').val();
                                            var year = $('#year').val();
                                            var fine = $(this).closest("tr").find(".fine").val();
                                            var discount_in_percentage = $(this).closest("tr").find(".discount_in_percentage").val();
                                            var dataString2 = {
                                                class_id: class_id,
                                                section_id: section_id,
                                                student_id: student_id,
                                                fee_type_id: fee_type_id,
                                                amount: amount,
                                                discount_in_percentage: discount_in_percentage,
                                                fine: fine,
                                                month: month,
                                                year: year
                                            };
                                            if (month == "0") {
                                                alert("Month should be selected");
                                                $('#class_id option[selected]').prop('selected', true);
                                                $('#fee_type_id option[selected]').prop('selected', true);
                                                $("#data_table_body").empty();
                                            } else {
                                                if (year == "0") {
                                                    alert("Year should be selected");
                                                    $('#class_id option[selected]').prop('selected', true);
                                                    $('#fee_type_id option[selected]').prop('selected', true);
                                                    $("#data_table_body").empty();
                                                } else {
                                                    $.ajax
                                                    ({
                                                        type: "POST",
                                                        dataType: 'json',
                                                        url: "/accounts/invoices/addIndividualInvoice",
                                                        data: dataString2,
                                                        cache: false,
                                                        success: function (data) {
                                                            if (data == true) {
                                                                alert('successful');
                                                            } else {
                                                                alert('failed');
                                                            }
                                                        }
                                                    });
                                                    $(this).prop("disabled", true);
                                                    $(this).attr('value', 'Added');
                                                }
                                            }
                                        });
                                        $('#addAllButton').attr('hidden', false);
                                    }
                                });
                            });
                        }
                    }
                });
            } else {
                $("#data_table_body").empty();
                $("#data_table_body").append('Please Select a Type of Fee');
                $('#addAllButton').attr('hidden', true);
            }
        });
    });
</script>
<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>