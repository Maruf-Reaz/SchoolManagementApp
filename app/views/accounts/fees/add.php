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
            <div class="row justify-content-lg-center">
                <div class="col-lg-6">
                    <div class="au-card au-card au-card--no-pad m-b-40">
                        <div class="au-card-title">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                                <i class="fa fa-pencil-alt"></i>Add Class Wise Fee</h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php URLROOT; ?>/accounts/fees/add" method="post"
                                  class="form-horizontal" id="register-form">
                                <div class="form-group">
                                    <div class="input-group-addon2">Class</div>
                                    <div class="rs-select2--dark rs-select2--border col-lg-12">
                                        <select name="class_id" id="class_id" class="js-select2">
                                            <option value="" selected="selected">-Select Class-</option>
											<?php foreach ( $data['classes'] as $class ): ?>
                                                <option value="<?php echo $class->id; ?>"> <?php echo $class->name; ?></option>
											<?php endforeach; ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                        <!--<span class="invalid-feedback"></span>-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Fee Type</div>
                                    <div class="rs-select2--dark rs-select2--border col-lg-12">
                                        <select name="fee_type_id" id="fee_type_id" class="js-select2">
                                            <option value="" selected="selected">-Select Fee Type-</option>
											<?php foreach ( $data['fee_types'] as $fee_type ): ?>
                                                <option value="<?php echo $fee_type->id; ?>"> <?php echo $fee_type->fee_type_name; ?></option>
											<?php endforeach; ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Amount</div>
                                    <div class="input-group">
                                        <input type="text" id="fee_amount" name="fee_amount"
                                               placeholder="Enter Amount..."
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary">Add Fee</button>
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
        $('#fee_type_id').attr('disabled', true);
        $("#class_id").change(function () {
            var class_id = $(this).val();
            if (class_id == "") {
                $('#fee_type_id').attr('disabled', true);
            } else {
                $('#fee_type_id').attr('disabled', false);
            }
            $('#fee_type_id option[selected]').prop('selected', true);
        });
        $("#fee_type_id").change(function () {
            var class_id = $('#class_id').val();
            var fee_type_id = $(this).val();

            var dataString = {class_id: class_id, fee_type_id: fee_type_id};
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "http://localhost/accounts/fees/doesFeeExist",
                data: dataString,
                cache: false,
                success: function (data) {
                    if (data == true) {
                        alert('This type of fee already added for the class');
                    }
                }
            });


        });
        //Validation Code Starts.....
        $(function () {
            $.validator.setDefaults({
                errorClass: 'help-block',
                highlight: function (element) {
                    $(element)
                        .closest('.form-group')
                        .addClass('has-error');
                },
                unhighlight: function (element) {
                    $(element)
                        .closest('.form-group')
                        .removeClass('has-error');
                },
                errorPlacement: function (error, element) {
                    if (element.prop('type') === 'checkbox') {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
            $("#register-form").validate({
                rules: {
                    class_id: {
                        required: true
                    },
                    fee_type_id: {
                        required: true
                    },
                    fee_amount: {
                        required: true,
                        pattern: /^[0-9]+(?:\.[0-9]{1,5})?$/
                    }
                },
                messages: {
                    class_id: {
                        required: 'Please select a class'
                    },
                    fee_type_id: {
                        required: 'Please select a type of fee'
                    },
                    fee_amount: {
                        required: 'Please enter an amount',
                        pattern: 'Please enter a valid amount'
                    }
                }
            });
        });
        // Validation Code Ends Here....
    });
</script>

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>