<!--//written by
//Maruf
//5-9-2018-->

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
                                        <i class="fa fa-pencil-alt"></i>Exam</h3>
                                </div>
                                <div class="card-body">
                                    <form id="register-form" action="<?php URLROOT ?>/exam/Exams/editExam" method="post">

                                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                        <div class="form-group">
                                            <div class="input-group-addon2">Name</div>
                                            <div class="input-group">
                                                <input type="text" name="name"
                                                       class="form-control"
                                                       value="<?php echo $data['name'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">From Date</div>
                                            <div class="input-group">
                                                <input type="text" name="from_date"
                                                       class="form-control datepicker"
                                                       value="<?php echo $data['from_date'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">To_Date</div>
                                            <div class="input-group">
                                                <input type="text" name="to_date"
                                                       class="form-control datepicker"
                                                       value="<?php echo $data['to_date'] ?>" required readonly>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="input-group-addon2">Year</div>
                                            <select name="year" id="year" class="form-control">
                                                <option value="0" selected="selected">----Class----</option>
												<?php $year_value = explode( "0", date( "Y" ) );

												for ( $i = 10; $i < $year_value[1]; $i ++ ): ?>
                                                    <option value="20<?php echo $i; ?>">
                                                        20<?php echo $i; ?></option>
												<?php endfor; ?>
                                                <option value="<?php echo $data['year']; ?>"
                                                        selected="selected"><?php echo $data['year']; ?></option>
												<?php $year_value = explode( "0", date( "Y" ) );

												for ( $i = $year_value[1] + 1; $i < 100; $i ++ ): ?>
                                                    <option value="20<?php echo $i; ?>">
                                                        20<?php echo $i; ?></option>
												<?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Note</div>
                                            <div class="input-group">

                                                <textarea name="note" style="border-radius: 5px" class="form-control"
                                                          id="note" rows="5"><?php echo $data['note']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-primary">Confirm</button>
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
        /*date picker code*/
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        /*date picker code ends*/
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
        $("#register-form").validate({
            rules: {
                name: {
                    required: true,
                },
                date: {
                    required: true
                },
                year: {
                    required: true
                },
                note : {
                    required: true
                }



            },
            messages: {
                name: {
                    required: 'Please enter exam name',
                },
                date: {
                    required: 'Please Select a date',

                },
                year: {
                    required: 'Please Select a Year',

                },
                note: {
                    required: 'Enter some note',

                },
            }
        });

    });


</script>

<?php require APPROOT . '/views/layouts/footer.php' ?>
