<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/20/2018
 * Time: 1:29 AM
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
                                        <i class="fa fa-pencil-alt"></i>Search Attendance Device User</h3>
                                </div>
                                <div class="filters">
                                    <a class="btn btn-primary"
                                       href="<?php echo URLROOT; ?>/attendance/time-attendance-users/register-user"
                                       style="float: right; margin-right: 11px;"><i class="fa fa-plus"
                                                                                    style="padding-right: 7px;"></i>Add
                                        User</a>
                                </div>

                                <div class="card-body">
                                    <form action="<?php echo URLROOT; ?>/attendance/time-attendance-users/register-user"
                                          method="post" id="register-form">


                                        <div class="form-group">
                                            <div class="input-group-addon2">Enter a Registration Number *</div>
                                            <div class="input-group">
                                                <input type="text" id="registration_no" name="registration_no"
                                                       placeholder="ex-S000003"
                                                       class="form-control col-md-6" required> &nbsp;
                                                <input type="button" id="search_btn" name="search" value="Search"
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
                                            <div class="input-group-addon2">Card</div>
                                            <div class="input-group">
                                                <input type="text" name="card_view" id="card_view"
                                                       class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Pin</div>
                                            <div class="input-group">
                                                <input type="text" name="pin_view" id="pin_view"
                                                       class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div id="submit_div"></div>
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

                var url = "/attendance/time-attendance-users/get-registered-user-by-reg-no"

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {type_id: type_id, registration_no: registration_no}, // serializes the form's elements.
                    success: function (data) {

                        $('#search_loading').empty();
                        $('#submit_div').empty();
                        $('#search_result').empty();
                        $('input[name="name"]').val('');
                        if (data) {
                            //$('#submit_div').empty();

                            $('#submit_div').append('<div class="input-group"><a class="btn btn-primary" href= "http://localhost/attendance/time-attendance-users/edit-user?reg_no=' + data.registration_no + '">Edit User</a></div>');
                            $('#submit_div').append('<div class="input-group"><a class="btn btn-primary" href= "http://localhost/attendance/time-attendance-users/deactivate-user?reg_no=' + data.registration_no + '">Deactivate User</a></div>');
                            $('#submit_div').append('<a name="name" type="hidden" value="' + data.name + '">');
                            $('input[id="name_view"]').val(data.name);
                            $('input[id="card_view"]').val(data.card);
                            $('input[id="pin_view"]').val(data.pin2);
                        } else {
                            //$('#submit_div').empty();
                            $('input[id="name_view"]').val('');
                            $('input[id="card_view"]').val('');
                            $('input[id="pin_view"]').val('');
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

