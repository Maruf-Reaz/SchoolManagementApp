<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/18/2018
 * Time: 9:57 PM
 */
?>

<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Nav bar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with nav bar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktop header with nav bar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6" style="margin:auto ">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="fa fa-pencil-alt"></i>Register Attendance Device User</h3>
                                </div>

                                <div class="card-body">
                                    <form action="<?php echo URLROOT; ?>/attendance/time-attendance-users/register-user"
                                          method="post" id="register-form">

                                        <div class="form-group">
                                            <div class="input-group-addon2">Select Group *</div>
                                            <div class="input-group">
                                                <select id="type_id" name="group_id" class="form-control" required>
                                                    <option value="" selected="selected">Select</option>
													<?php foreach ( $data['att_allowed_roles'] as $att_allowed_role ): ?>
                                                        <option value="<?php echo $att_allowed_role->id; ?>"> <?php echo $att_allowed_role->name; ?></option>
													<?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Registration Number *</div>
                                            <div class="input-group">
                                                <input type="text" id="registration_no" name="registration_no"
                                                       placeholder="ex-S000003"
                                                       class="form-control col-md-6" required> &nbsp;
                                                <input type="button" id="search_btn" name="search" value="Get"
                                                       class="btn btn-success">&nbsp <span id="search_loading"></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="input-group-addon2">Name</div>
                                            <div class="input-group">
                                                <input type="text" name="name" id="name_view" value=""
                                                       class="form-control" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Password</div>
                                            <div class="input-group">
                                                <input type="text" name="password" id="password" value=""
                                                       class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Card</div>
                                            <div class="input-group">
                                                <input type="text" name="card"
                                                       class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Select Privilage *</div>
                                            <div class="input-group">
                                                <select id="type_id" name="privilege" class="form-control" required>
                                                    <option value="" selected="selected">Select</option>
													<?php foreach ( $data['privilages'] as $privilage ): ?>
                                                        <option value="<?php echo $privilage['id']; ?>"> <?php echo $privilage['name']; ?></option>
													<?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="submit_div"></div>

                                        <div class="form-actions form-group">
                                            <input type="submit" class="btn btn-primary"
                                                   value="Register User">
                                        </div>

                                </div>
                                </form>
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
                    group_id: {
                        //Need Remote Validation
                        required: true,
                    },
                    registration_no: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    card: {
                        required: true
                    },
                    privilege: {
                        required: true
                    }
                },
                messages: {
                    group_id: {
                        //Need Remote Validation
                        required: 'Please Select a group',
                    },
                    registration_no: {
                        required: 'Please enter a Registration Number',
                    },
                    name: {
                        required: 'Please enter a Name',
                    },
                    password: {
                        required: 'Please enter a Password',
                    },
                    card: {
                        required: 'Please enter Card Number',
                    },
                    privilege: {
                        required: 'Please Select Privilege',
                    }
                }
            });

        });
        $(document).ajaxStart(function () {
            $("#loading").show();
            //$("#search_loading").show();
        }).ajaxStop(function () {
            $("#loading").hide();
            //$("#search_loading").hide();
        });
        $("#search_btn").on("click", function (e) {
            /*e.preventDefault();
            $('#register-form').attr('action', "http://localhost/attendance/time-attendance-devices/test-connection").submit();*/
            //e.preventDefault(); // avoid to execute the actual submit of the form.
            //$('#submit_div').empty();
            $('#search_loading').empty();
            $('#search_result').empty();
            $('#search_loading').append('<img src="/images/Spinner-1s-37px.gif">');
            var type_id = $('#type_id').val();
            var registration_no = $('#registration_no').val();
            if (type_id != 0 && registration_no != null && registration_no != '') {

                var url = "/attendance/time-attendance-users/get-user-by-reg-no"

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {type_id: type_id, registration_no: registration_no}, // serializes the form's elements.
                    success: function (data) {

                        $('#search_loading').empty();
                        $('#search_result').empty();
                        $('input[name="name"]').val('');
                        $('input[name="password"]').val('');

                        if (data) {
                            //$('#submit_div').empty();
                            if (data.already_exists) {
                                $.alert({
                                    title: 'User already Registered',
                                    content: 'The User is already registerd',
                                    type: 'red',
                                    typeAnimated: true,
                                });
                            } else {

                                $('#register-form').append('<input name="id" type="hidden" value="' + data.id + '">');
                                $('#register-form').append('<input name="name" type="hidden" value="' + data.name + '">');
                                $('input[id="name_view"]').val(data.name);
                                $('input[id="password"]').val('12345');
                            }
                        } else {
                            //$('#submit_div').empty();
                            $('input[id="name"]').val('');
                            $('input[id="name_view"]').val('');
                            $('input[id="password"]').val('');
                            $.alert({
                                title: 'User not found',
                                content: 'The user not found , Please check the registration number',
                                type: 'red',
                                typeAnimated: true,
                            });
                        }
                    }
                });
            } else {
                $.alert({
                    title: 'Alert!',
                    content: 'Please Select a Group and enter a registration number',
                    type: 'red',
                    typeAnimated: true,
                });
                $('#search_loading').empty();
            }
        });
    });

</script>


<?php require APPROOT . '/views/layouts/footer.php' ?>



