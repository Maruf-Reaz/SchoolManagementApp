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
                <div class="col-sm-6" style="margin: auto">
                    <form action="<?php URLROOT ?>/Smses/showRecipient" method="post">
                        <div class="au-card au-card au-card--no-pad m-b-40" style="box-shadow: 0px 0px 3px 0px #888888;">

                            <div class="au-card-title" style="padding: 20px; background-image:url('<?php echo htmlspecialchars( URLROOT ) ?>/images/bg-title-01.jpg');">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3>
                                    <i class="zmdi zmdi-edit"></i>Show Sms Recipients</h3>
                            </div>

                            <center>
                                <div style="margin-left: 10px; margin-top: 11px; margin-bottom: 11px;" class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                    <select class="form-control" name="role" tabindex="-1" aria-hidden="true">
                                        <option selected="selected">Role</option>
                                        <option value="1">Teacher</option>
                                        <option value="2">Guardian</option>
                                        <option value="3">Employee</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </center>
                            <center style="margin-bottom:20px">
                                <button type="submit" class="btn btn-primary">Show</button>
                            </center>
                        </div>
                    </form>
                </div>
                <div id="check_table" class="col-lg-12" style="margin-bottom: 50px;display:<?php echo $data['display'] ?> ">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12" style="">
                                <div class="au-card-title" style="background-image:url('<?php echo htmlspecialchars( URLROOT ) ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="fa fa-pencil-alt"></i>Recipients</h3>
                                </div>
                                <form style="margin-top: 28px;" action="<?php URLROOT ?>/Smses/submitRecipients" method="post">
                                   
                                   <div class="filters">
                                    


                                    <!--<a data-toggle="tooltip" onclick="window.print()" title="" class="fa fa-file-pdf" href="#" style="float: right;padding-top:3px;font-size: 27px " data-original-title="PDF"></a>
                                    <a data-toggle="tooltip" onclick="window.print()" title="" class="fa fa-print" href="#" style="float: right;padding-top:3px;padding-right: 15px;font-size: 27px " data-original-title="Print"></a>-->

                                </div>
                                   
                                   
                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <table class="table table-striped jambo_table bulk_action">
                                                <thead>
                                                    <tr class="headings">
                                                        <th class="column-title">S/N</th>
                                                        <th class="column-title">Photo</th>
                                                        <th class="column-title">Name</th>
                                                        <th class="column-title">Email</th>
                                                        <th class="column-title">Phone</th>
                                                        <th style="width: 150px;">
                                                            <label style="font-size: 13px; margin-bottom: 0px" class="au-checkbox"> <i class="fa fa-check"></i> All
                                                                <input id="check" type="checkbox" name="check">
                                                                <span class="au-checkmark" style="display: none;"></span>
                                                            </label>
                                                        </th>


                                                        <!--<th style="width: 210px">
                                                            <input type="checkbox" id="check" name="check" >Check All/ Uncheck All<br>
                                                        </th>-->
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php if ( $data['status'] == null ): ?>
                                                </tbody>
                                                <?php else: ?>
                                                <?php $i = 0;
												foreach ( $data['recipients'] as $recipient ): ?>

                                                <tr class="even pointer">
                                                    <td class=" ">
                                                        <?php echo $i += 1 ?>
                                                    </td>
                                                    <?php if ( $data['type'] == 1 ) : ?>
                                                    <td class=" "><img class="img-40" src="<?php URLROOT; ?>/images/teachers/<?php echo $recipient->photo ?>" alt="image">
                                                    </td>
                                                    <?php else: ?>
                                                    <td class=" "><img class="img-40" src="<?php URLROOT; ?>/images/guardians/<?php echo $recipient->photo ?>" alt="image">
                                                    </td>
                                                    <?php endif; ?>
                                                    <?php if ( $data['type'] == 2 ) : ?>
                                                    <td class=" ">
                                                        <?php echo $recipient->guardian_name ?>
                                                    </td>
                                                    <?php else: ?>
                                                    <td class=" ">
                                                        <?php echo $recipient->name ?>
                                                    </td>
                                                    <?php endif; ?>
                                                    <td class=" ">
                                                        <?php echo $recipient->email ?>
                                                    </td>
                                                    <?php if ( $data['type'] == 2 ) : ?>
                                                    <td class=" ">
                                                        <?php echo $recipient->contact_number ?>
                                                    </td>
                                                    <?php else: ?>
                                                    <td class=" ">
                                                        <?php echo $recipient->phone ?>
                                                    </td>
                                                    <?php endif; ?>
                                                    <td style="width: 150px;padding-top: 6px;padding-bottom: 29px;">
                                                        <label style="font-size: 13px; margin-bottom: 0px" class="au-checkbox">
                                                            <input id="" type="checkbox" value="<?php echo $recipient->id?>" name="send_checkbox[]">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <input type="hidden" id="send_status[]" value="0">
                                                </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                                <?php endif; ?>
                                            </table>

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sms_template" class="col-lg-12" style="margin:auto; display: <?php echo $data['display'] ?>;">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title" style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="fa fa-pencil-alt"></i>SMS Template</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group-addon2">Select Template</div>
                                        <div class="input-group">

                                            <select name="template_id" id="template_id" class="form-control ">
                                                <option value="" selected="selected">Sms Template</option>
                                                <?php foreach ( $data['templates'] as $template ): ?>
                                                <option value="<?php echo $template->id; ?>">
                                                    <?php echo $template->title; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="invalid-feedback">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group-addon2">Body</div>
                                        <div class="input-group">

                                            <textarea name="body" style="border-radius: 5px" class="form-control" id="sms_body" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <?php if ($data['type'] == 2):?>
                                    <input type="hidden" value="2" name="type">
                                    <?php elseif($data['type'] ==1 ): ?>
                                    <input type="hidden" value="1" name="type">
                                    <?php else: ?>
                                    <input type="hidden" value="3" name="type">
                                    <?php endif; ?>

                                    <div class="form-actions form-group">
                                        <button type="submit" class="btn btn-primary">Send Sms</button>

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
</div>
    
    <script>
        $(document).ready(function() {

            $("#check").change(function() {
                if ($(this).is(":checked")) {
                    $(":checkbox").prop('checked', true);
                    alert("All Checked");

                } else {
                    $(":checkbox").prop('checked', false);
                    alert("All Unchecked");

                }

            })

            $("#template_id").change(function() {
                var template = $(this).val();
                $("#sms_body").empty();
                // $("#data_table_body").empty();
                var dataString = 'template=' + template;
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "http://localhost/smses/getSmsBody",
                    data: dataString,
                    cache: false,
                    success: function(objects) {
                        console.log(objects);
                        if (objects.length === 0) {} else {
                            document.getElementById("sms_body").innerHTML = objects.body;
                        }
                    }

                });

            });

        });
    </script>

    <?php require APPROOT . '/views/layouts/footer.php' ?>