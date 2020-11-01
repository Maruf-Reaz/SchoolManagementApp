<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktop header with navbar and header file-->
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
                                        <i class="fa fa-pencil-alt"></i>Grade</h3>
                                </div>

                                <div class="card-body">
                                    <form id="register-form" action="<?php URLROOT ?>/exam/Grades/addGrade"
                                          method="post">

                                        <div class="form-group">
                                            <div class="input-group-addon2">Grade Name</div>
                                            <div class="input-group">
                                                <input type="text" name="grade_name"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Grade Point</div>
                                            <div class="input-group">
                                                <input type="text" name="grade_point"
                                                       class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Mark From</div>
                                            <div class="input-group">
                                                <input type="text" name="mark_from"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Mark Upto</div>
                                            <div class="input-group">
                                                <input type="text" name="mark_upto"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Note</div>
                                            <div class="input-group">
                                                <input type="text" name="note"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-primary">Add</button>
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
                grade_name: {
                    required: true,
                },
                grade_point: {
                    required: true
                },
                mark_from: {
                    required: true
                },
                mark_upto : {
                    required: true
                },
                note : {
                    required: true
                }



            },
            messages: {
                grade_name: {
                    required: 'Please enter grade name',
                },
                grade_point: {
                    required: 'Please Enter a grade point',

                },
                mark_from: {
                    required: 'Please Enter mark',

                },
                mark_upto: {
                    required: 'Please Enter a mark',

                },
                note: {
                    required: 'Enter some note',

                },
            }
        });

    });
</script>


<?php require APPROOT . '/views/layouts/footer.php' ?>
