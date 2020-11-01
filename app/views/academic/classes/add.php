<!--Page header and All CSS Files-->
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>
<div class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-lg-center">
            <div class="col-lg-6">
                <div class="x_panel au-card">
                    <div class="au-card-title">
                        <div class="bg-overlay bg-overlay--blue"></div>
                        <h3>
                            <i class="zmdi zmdi-edit"></i>Add Class</h3>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?php echo URLROOT; ?>/academic/classes/add" method="post" id="register_form"
                              class="form-horizontal">
                            <!--Class Name-->
                            <div class="form-group">
                                <div class="input-group-addon2">Name</div>
                                <div class="input-group">
                                    <input type="text" id="name" name="name"
                                           placeholder="Enter Class name..ex- One,two,three"
                                           class="form-control">
                                </div>
                            </div>
                            <!--Numeric Value-->


                            <div class="form-group">
                                <div class="input-group-addon2">Numeric Value</div>
                                <div class="input-group">

                                    <input type="number" id="numeric_value" name="numeric_value"
                                           placeholder="Enter Class numeric value..ex- 1,2,3"
                                           class="form-control">
                                </div>
                            </div>


                            <!--Assign Class-->

                            <!--<div class="form-group">
                                   <div class="input-group-addon2">Assign Teacher</div>
                                    <div class="input-group">
                                       
                                        <select name="teacher_id" id="select" class="form-control <?php /*echo ! empty($data['teacher_id_error']) ? 'is-invalid' : '' */ ?>">
                                            <option value="">Please select</option>
                                            <option value="1">Maruf Reaz</option>
                                            <option value="2">Imran Khan</option>
                                            <option value="3">Nayeem</option>
                                        </select>
                                        <span class="invalid-feedback">
                                            <?php /*echo $data['teacher_id_error']; */ ?></span>
                                    </div>
                                </div>-->

                            <!--<div class="form-group">
                                <div class="input-group-addon2">Note (Optional)</div>
                                <div class="input-group">

                                    <input type="text" id="note" name="note"
                                           placeholder="Enter a note..." class="form-control">
                                </div>
                            </div>-->
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-default rounded-pill ml-0 mt-4">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        //Validation Code Starts.....
        $(document).ajaxStart(function () {
            $("#loading").show();
        }).ajaxStop(function () {
            $("#loading").hide();
        });
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
            $("#register_form").validate({
                rules: {
                    name: {
                        //Need Remote Validation
                        required: true,
                    },
                    numeric_value: {
                        required: true
                    },
                },
                messages: {
                    name: {
                        required: 'Please enter a name',
                    },
                    numeric_value: {
                        required: 'Please enter an Numeric Value',
                    }

                }
            });

        });

        // Validation Code Ends Here....

    });

</script>

<!--Footer file -->
<?php require APPROOT . '/views/layouts/footer.php' ?>