<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/14/2018
 * Time: 12:44 PM
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
                                        <i class="fa fa-pencil-alt"></i>Time Attendance Device</h3>
                                </div>

                                <div class="card-body">
                                    <form action="<?php echo URLROOT; ?>/attendance/time-attendance-devices/update"
                                          method="post" id="register-form">
                                        <input type="hidden" name="id" value="<?php echo $data['device']->id ?>">

                                        <div class="form-group">
                                            <div class="input-group-addon2">Ip Address *</div>
                                            <div class="input-group">
                                                <input type="text" name="ip" value="<?php echo $data['device']->ip ?>"
                                                       class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">UDP Port *</div>
                                            <div class="input-group">
                                                <input type="text" name="udp_port"
                                                       value="<?php echo $data['device']->udp_port ?>"
                                                       class="form-control" value="4370" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Internal Id</div>
                                            <div class="input-group">
                                                <input type="text" name="internal_id"
                                                       value="<?php echo $data['device']->internal_id ?>"
                                                       class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Com Key</div>
                                            <div class="input-group">
                                                <input type="text" name="com_key"
                                                       value="<?php echo $data['device']->com_key ?>"
                                                       class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Device Name</div>
                                            <div class="input-group">
                                                <input type="text" name="device_name"
                                                       value="<?php echo $data['device']->device_name ?>"
                                                       class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Description</div>
                                            <div class="input-group">
                                                <input type="text" name="description"
                                                       value="<?php echo $data['device']->description ?>"
                                                       class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Soap Port</div>
                                            <div class="input-group">
                                                <input type="text" name="soap_port"
                                                       value="<?php echo $data['device']->soap_port ?>"
                                                       class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Encoding</div>
                                            <div class="input-group">
                                                <input type="text" name="encoding"
                                                       value="<?php echo $data['device']->encoding ?>"
                                                       class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Status</div>
                                            <div class="input-group">
                                                <label class="radiobutton">Active <input type="radio"
                                                                                         name="status" <?php if ( $data['device']->status == 1 ) {
														echo 'checked';
													} ?>
                                                                                         value="1" required><span
                                                            class="radiocheckmark"></span></label>
                                                <label class="radiobutton">Deactive <input type="radio"
                                                                                           name="status" <?php if ( $data['device']->status == 0 ) {
														echo 'checked';
													} ?>
                                                                                           value="0"><span
                                                            class="radiocheckmark"></span></label>
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <input type="button" id="test_conn_btn" class="btn btn-success"
                                                   value="Test Connection">&nbsp <span id="loading"></span> <span
                                                    id="ajax_result"></span>
                                        </div>
                                        <div class="form-actions form-group" id="submit_div">
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
            $(document).ajaxStart(function () {
                $("#loading").show();
            }).ajaxStop(function () {
                $("#loading").hide();
            });

            $("#test_conn_btn").on("click", function (e) {
                /*e.preventDefault();
				$('#register-form').attr('action', "http://localhost/attendance/time-attendance-devices/test-connection").submit();*/
                //e.preventDefault(); // avoid to execute the actual submit of the form.
                $('#loading').empty();
                $('#ajax_result').empty();
                $('#loading').append('<img src="/images/Spinner-1s-37px.gif">');
                var form = $('#register-form');
                var url = "/attendance/time-attendance-devices/test-connection"

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function (data) {
                        $('#loading').empty();
                        $('#ajax_result').empty();
                        if (data) {
                            $('#submit_div').empty();
                            $('#submit_div').append('<input id="submit_button" type="button" class="btn btn-primary" value="Update Device Information">');
                            $('#ajax_result').append('<input class="btn btn-success" value="Successful" disabled>');
                            $('#submit_button').click(function () {
                                $('#register-form').submit();
                            });
                        } else {
                            $('#submit_div').empty();
                            $('#ajax_result').append('<input class="btn btn-danger" value="Failed to Connect" disabled>');
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
                        ip: {
                            //Need Remote Validation
                            required: true,
                        },
                        internal_id: {
                            required: true
                        },
                        com_key: {
                            required: true
                        },
                        device_name: {
                            required: true
                        },
                        description: {
                            required: true
                        },
                        soap_port: {
                            required: true
                        },
                        udp_port: {
                            required: true
                        },
                        encoding: {
                            required: true
                        }
                    },
                    messages: {
                        ip: {
                            required: 'Please enter an ip address of your device',
                        },
                        internal_id: {
                            required: 'Please enter an Internal Id of your device',
                        },
                        com_key: {
                            required: 'Please enter a Com Key of your device',
                        },
                        device_name: {
                            required: 'Please enter a Device Name',
                        },
                        description: {
                            required: 'Please enter description of your device',
                        },
                        soap_port: {
                            required: 'Please enter a SOAP Port of your device',
                        },
                        udp_port: {
                            required: 'Please enter an UDP Port of your device',
                        },
                        encoding: {
                            required: 'Please enter an encoding System',
                        }

                    }
                });

            });

            // Validation Code Ends Here....


        }
    );
</script>


<?php require APPROOT . '/views/layouts/footer.php' ?>



