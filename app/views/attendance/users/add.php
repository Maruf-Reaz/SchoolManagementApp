<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/17/2018
 * Time: 11:43 AM
 */
?>
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
                <div class="col-lg-6" style="margin:auto ">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="fa fa-pencil-alt"></i>Add Device User</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?php URLROOT ?>/holidays/holidays/store"
                                          enctype="multipart/form-data"
                                          method="post" id="register-form">

                                        <div class="form-group">
                                            <div class="input-group-addon2">Select Device *</div>
                                            <div class="input-group">
                                                <select id="device_id" name="device_id" class="form-control" required>
                                                    <option value="" selected="selected">Select</option>
													<?php foreach ( $data['att_devices'] as $att_device ): ?>
                                                        <option value="<?php echo $att_device->id; ?>"> <?php echo $att_device->device_name; ?>
                                                            - <?php echo $att_device->description; ?></option>
													<?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-actions form-group">
                                            <input type="button" id="test_conn_btn" class="btn btn-success"
                                                   value="Test Connection">&nbsp <span id="loading"></span> <span
                                                    id="ajax_result"></span>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Select Group *</div>
                                            <div class="input-group">
                                                <select id="type_id" name="type_id" class="form-control" required>
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
                                                       placeholder="ex- S000003"
                                                       class="form-control col-md-6" required> &nbsp;
                                                <input type="button" id="search_btn" name="search" value="Search"
                                                       class="btn btn-success">&nbsp <span id="search_loading"></span>
                                            </div>
                                        </div>
                                        <!--Hidden Group-->
                                        <div class="form-group" id="search_result">

                                        </div>
                                        <!--Hidden Group Ends-->

                                        <!--<div class="form-group">
											<div class="input-group-addon2">Recurrence</div>
											<div class="input-group">
												<label class="radiobutton">Yes <input type="radio" name="recurrence"
																					  value="1" required><span
															class="radiocheckmark"></span></label>
												<label class="radiobutton">No <input type="radio" name="recurrence"
																					 value="0" checked><span
															class="radiocheckmark"></span></label>
											</div>
										</div>-->
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-primary">Add User</button>
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
            //$("#search_loading").show();
        }).ajaxStop(function () {
            $("#loading").hide();
            //$("#search_loading").hide();
        });
        $("#test_conn_btn").on("click", function (e) {
            /*e.preventDefault();
            $('#register-form').attr('action', "http://localhost/attendance/time-attendance-devices/test-connection").submit();*/
            //e.preventDefault(); // avoid to execute the actual submit of the form.
            //$('#submit_div').empty();
            $('#loading').empty();
            $('#ajax_result').empty();
            $('#loading').append('<img src="/images/Spinner-1s-37px.gif">');
            var id = $('#device_id').val();
            var url = "/attendance/time-attendance-devices/test-connection-by-device"

            $.ajax({
                type: "POST",
                url: url,
                data: {id: id}, // serializes the form's elements.
                success: function (data) {
                    $('#loading').empty();
                    $('#ajax_result').empty();
                    if (data) {
                        //$('#submit_div').empty();
                        //$('#submit_div').append('<input id="submit_button" type="button" class="btn btn-primary" value="Add Device">');
                        $('#ajax_result').append('<input class="btn btn-success" value="Successful" disabled>');
                        $('#submit_button').click(function () {
                            $('#register-form').submit();
                        });
                    } else {
                        //$('#submit_div').empty();
                        $('#ajax_result').append('<input class="btn btn-danger" value="Failed to Connect" disabled>');
                    }
                }
            });

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
                $.ajax({
                    type: "POST",
                    url: "/attendance/time-attendance-users/get-user-by-reg-no",
                    data: {type_id: type_id, registration_no: registration_no}, // serializes the form's elements.
                    success: function (data) {
                        $('#search_loading').empty();
                        $('#search_result').empty();
                        if (data) {
                            //$('#submit_div').empty();
                            //$('#submit_div').append('<input id="submit_button" type="button" class="btn btn-primary" value="Add Device">');
                            $("#search_result").append(
                                '<div class="input-group-addon2"> Name </div>' +
                                '<div class="input-group">' +
                                '<input type="text" name="name" value="' + data.name + '" class="form-control" disabled required>' +
                                '</div>'
                            );
                        } else {
                            //$('#submit_div').empty();
                            $('#search_result').append('<input class="btn btn-danger" value="No data found" disabled>');
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

        /*$("#type_id").change(function () {
            var type_id = $(this).val();
            // $("#data_table_body").empty();
            $.post("http://localhost/holidays/Holidays/has-group", {type_id: type_id})
                .done(function (objects) {
                    //console.log(objects)
                    if (objects == true) {
                        //Global Holiday
                        $("#has_group").empty();
                        $("#has_group").append(
                            '<div class="input-group-addon2"> Name </div>' +
                            '<div class="input-group">' +
                            '<input placeholder="ex- Independence Day , Victory Day " type="text" name="name" class="form-control" required>' +
                            '</div>' +
                            '<div class="input-group-addon2">Remarks </div>' +
                            '<div class="input-group">' +
                            '<input placeholder="ex-Bangladesh Became Independent On this day" type="text" name="remarks" class="form-control">' +
                            '</div>' +
                            '<div class="input-group-addon2">Recurrence </div>' +
                            '<div class="input-group">' +
                            '<label class="radiobutton">Yes <input type="radio" name="recurrence" value="1" required><span class="radiocheckmark"></span></label>' +
                            '<label class="radiobutton">No <input type="radio" name="recurrence" value="0" checked><span class="radiocheckmark"></span></label>' +
                            '</div>'
                        );
                    } else {
                        $("#has_group").empty();
                        var options = '';
                        $.each(objects, function (key, value) {
                            options += '<option value="' + value.id + '" class="text-center">' + value.name + '</option>';
                        })
                        $("#has_group").append(
                            '<div class="input-group-addon2">Select a Community </div>' +
                            '<div class="input-group">' +
                            '<select id="group_id" name="group_id" class="form-control" required>' +
                            '<option value="" selected="selected">Select</option>' +
                            options +
                            '</select>' +
                            '</div>' +
                            '<div class="input-group-addon2">Enter Registration Number </div>' +
                            '<div class="input-group">' +
                            '<input placeholder="ex- S012345" type="text" name="registration_no" class="form-control">' +
                            '</div>'
                        );
                        /!*$("#group_id").change(function () {
							var group_id = $(this).val();
							var group_name = $(this).text();
							// $("#data_table_body").empty();
							if (group_name == 'Teacher') {
								$.post("http://localhost/holidays/Holidays/get-data-by-group", {group_id: group_id}).done(function (data) {
									if (data != null) {

									}
								});
							}


						});*!/

                    }
                });
        })*/
    });

</script>

<?php require APPROOT . '/views/layouts/footer.php' ?>
