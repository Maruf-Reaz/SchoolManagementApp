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
                                <i class="fa fa-pencil-alt"></i>Add Payment</h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php URLROOT; ?>/accounts/payments/add-payment" method="post"
                                  id="register-form">
                                <div class="form-group">
                                    <div class="input-group-addon2">Registration Number</div>
                                    <div class="input-group">
                                        <input type="text" id="registration_number" name="registration_number"
                                               class="form-control">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Student</div>
                                    <div class="input-group">
                                        <input type="text" id="student" readonly name="student" class="form-control">
                                        <input type="hidden" id="student_id" name="student_id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Due Amount</div>
                                    <div class="input-group">
                                        <input type="text" id="due_amount" readonly name="due_amount"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Paid Amount</div>
                                    <div class="input-group">
                                        <input type="text" id="paid_amount" name="paid_amount"
                                               class="form-control" placeholder="Enter Amount To Be Paid..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Discount</div>
                                    <div class="input-group">
                                        <input type="text" id="discount" name="discount"
                                               class="form-control" value="0" placeholder="Enter Discount..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Payment Method</div>
                                    <div class="input-group">
                                        <select name="payment_method_id" id="payment_method_id" class="form-control ">
                                            <option value="" selected="selected">-Select Payment Method-</option>
											<?php foreach ( $data['payment_methods'] as $payment_method ): ?>
                                                <option value="<?php echo $payment_method->id; ?>"><?php echo $payment_method->payment_method_name; ?></option>
											<?php endforeach; ?>
                                        </select>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group" id="bankDiv">
                                    <div class="input-group-addon2">Bank</div>
                                    <div class="input-group">
                                        <select name="bank_id" id="bank_id" class="form-control ">
                                            <option value="" selected="selected">-Select Bank-</option>
											<?php foreach ( $data['banks'] as $bank ): ?>
                                                <option value="<?php echo $bank->id; ?>"><?php echo $bank->bank_name; ?></option>
											<?php endforeach; ?>
                                        </select>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Date</div>
                                    <div class="input-group">
                                        <input type="text" id="date" name="date" readonly class="form-control"
                                               value="<?php echo date( 'Y-m-d' ); ?>">
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary">Add Payment</button>
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
        bankDiv.style.visibility = 'hidden';
        bankDiv.style.display = 'none';
        $('#payment_method_id').attr('disabled', true);

        $("#registration_number").keyup(function () {
            $('#payment_method_id').attr('disabled', false);
            var registration_number = $('#registration_number').val();
            var dataString = {registration_number: registration_number};
            $("#student").val("");
            $("#due_amount").val("");
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "/accounts/invoices/getStudentByRegistrationNumber",
                data: dataString,
                cache: false,
                success: function (object) {
                    if (object == null) {
                        $("#student").val("No Student Found");
                        $("#student_id").val("");
                        $("#due_amount").val("N/A");
                    } else {
                        $("#student").val(object.name);
                        $("#student_id").val(object.id);
                        var dataString1 = 'student_id=' + object.id;
                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: "/accounts/invoices/getDueAmount",
                            data: dataString1,
                            cache: false,
                            success: function (data) {
                                if (data.length === 0) {
                                    $("#due_amount").val("N/A");
                                } else {
                                    $("#due_amount").val(data);
                                }
                            }
                        });
                    }
                }
            });
        });
        $("#payment_method_id").change(function () {
            var payment_method = document.getElementById('payment_method_id');
            var payment_method_name = payment_method.options[payment_method.selectedIndex].innerHTML;
            if (payment_method_name.trim() == "Cheque") {
                bankDiv.style.visibility = 'visible';
                bankDiv.style.display = 'block';
            } else {
                bankDiv.style.visibility = 'hidden';
                bankDiv.style.display = 'none';
            }
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
                    registration_number: {
                        required: true,
                        remote: '/accounts/invoices/doesStudentExist'
                    },
                    paid_amount: {
                        required: true,
                        pattern: /^[0-9]+(?:\.[0-9]{1,5})?$/
                    },
                    discount: {
                        required: true,
                        pattern: /^[0-9]+(?:\.[0-9]{1,5})?$/
                    },
                    payment_method_id: {
                        required: true
                    },
                    bank_id: {
                        required: true
                    }
                },
                messages: {
                    registration_number: {
                        required: 'Please enter registration number'
                    },
                    paid_amount: {
                        required: 'Please enter amount to be paid',
                        pattern: 'Please enter a valid amount'
                    },
                    discount: {
                        required: 'Please enter a discount',
                        pattern: 'Please enter a valid discount'
                    },
                    payment_method_id: {
                        required: 'Please select a payment method'
                    },
                    bank_id: {
                        required: 'Please select a bank'
                    }
                }
            });

        });
        // Validation Code Ends Here....
    });
</script>

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>