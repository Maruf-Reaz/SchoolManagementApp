<!--//written by
//Maruf
//10-9-2018-->

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
                                        <i class="fa fa-pencil-alt"></i>Mark Distribution</h3>
                                </div>
                                <div class="card-body">
                                    <form id="register-form" action="<?php URLROOT ?>/mark/MarkDistributions/edit" method="post">

                                        <input type="hidden" name="id" value="<?php echo $data['mark_distribution']->id ?>">
                                        <div class="form-group">
                                            <div class="input-group-addon2">Class</div>
                                            <select class="form-control" name="class" id="class">
                                                <option value="<?php echo $data['mark_distribution']->class_id ?>" selected="selected"><?php echo $data['mark_distribution']->class_name ?></option>
			                                    <?php foreach ( $data['classes'] as $class ): ?>
                                                    <option value="<?php echo $class->id; ?>"> <?php echo $class->name; ?></option>
			                                    <?php endforeach; ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>


                                        <div class="form-group">
                                            <div class="input-group-addon2">Mark Type</div>
                                            <div class="input-group">

                                                <input value="<?php echo $data['mark_distribution']->type ?>" type="text"  name="type" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Mark Value</div>
                                            <div class="input-group">
                                                <input value="<?php echo $data['mark_distribution']->value ?>" type="text"  name="value" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                        </div>
                                </div>
								<?php if ( $data['error_bit'] == 1 ): ?>
                                    <script>
                                        alert('Newly added  mark value will exceed the total of 100,So the mark distribution is not edited')
                                    </script>
								<?php endif; ?>

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
                class: {
                    required: true,
                },
                type: {
                    required: true
                },
                value: {
                    required: true
                }
            },
            messages: {
                class: {
                    required: 'Please select a class',
                },
                type: {
                    required: 'Please enter a mark type',

                },
                value: {
                    required: 'Please enter a mark value',

                },

            }
        });

    });
</script>

<?php require APPROOT . '/views/layouts/footer.php' ?>
