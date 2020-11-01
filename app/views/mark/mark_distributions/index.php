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
                <div class="col-lg-12">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="zmdi zmdi-edit"></i>Mark Distribution</h3>
                                </div>
                                <div class="filters">


                                    <div class="rs-select2--dark rs-select2--md rs-select2--border">
                                        <select class="form-control" name="class" id="class">
                                            <option selected="selected">Class</option>
											<?php foreach ( $data['classes'] as $class ): ?>
                                                <option value="<?php echo $class->id; ?>"> <?php echo $class->name; ?></option>
											<?php endforeach; ?>                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <a data-toggle="tooltip" title="Add Mark Distribution" class="fa fa-plus"
                                       href="<?php echo URLROOT; ?>/mark/MarkDistributions/add"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>

                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">

                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-titlet">#</th>
                                                <th class="column-titlet">Class</th>
                                                <th class="column-titlet">Type</th>
                                                <th class="column-titlet">Value</th>
                                                <th class="column-titlet">Options</th>
                                            </tr>
                                            </thead>
                                            <tbody id="data_table_body">
											<?php $i = 0;
											foreach ( $data['mark_distributions'] as $mark_distribution ): ?>
                                                <tr class="even pointer">
                                                    <input type="hidden" name="id">
                                                    <td><?php echo $i += 1 ?></td>
                                                    <td><?php echo $mark_distribution->class_name ?></td>
                                                    <td><?php echo $mark_distribution->type ?></td>
                                                    <td><?php echo $mark_distribution->value ?></td>
                                                    <td>
                                                        <div
                                                                class="btn-group">
                                                            <button style="padding-top: 2px;padding-bottom: 2px;"
                                                                    type="button" class="btn btn-default"
                                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                                        class="fa fa-ellipsis-v"></i></button>
                                                            <ul class="dropdown-menu pull-right" role="menu"
                                                                style="box-shadow: 0px 0px 20px 5px #888888;">
                                                                <li><a
                                                                            href="<?php echo URLROOT ?>/mark/MarkDistributions/showMarkDistribution/<?php echo $mark_distribution->id; ?>"><i
                                                                                class="fa fa-edit fa-lg"></i> Edit</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
											<?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
								<?php if ( $data['error_bit'] == 1 ): ?>
                                    <script>
                                        alert('Addition of this mark will exceed the total of 100,So the mark distribution is not added')
                                    </script>
								<?php endif; ?>
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
        $("#class").change(function () {
            var class_id = $(this).val();
            //$("#data_table_body").empty();
            var dataString = 'class_id=' + class_id;
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "/mark/MarkDistributions/getMarkDistributionsByClass",
                data: dataString,
                cache: false,
                success: function (objects) {
                    console.log(objects)
                    if (objects.length === 0) {
                        $("#data_table_body").empty();
                        $("#data_table_body").append('<tr><td colspan="7" class="text-center"> No data found..Please select another class</td></tr>')
                    } else {
                        $("#data_table_body").empty();
                        //add_to_item_table(objects);
                        $.each(objects, function (key, value) {
                            $("#data_table_body").append('<tr>' +
                                '<td>' + eval(key + 1) + '</td>' +
                                '<td>' + value.class_name + '</td>' +
                                '<td>' + value.type + '</td>' +
                                '<td>' + value.value + '</td>' +
                                "<td>" +
                                '<div data-toggle="tooltip" title="View Options" class="btn-group"> <button style="padding-top: 2px;padding-bottom: 2px;"' +
                                ' type="button" class="btn btn-default" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i>' +
                                '</button>  <ul class="dropdown-menu pull-right" role="menu" style="box-shadow: 0px 0px 5px 1px #888888;"> '
                                + ' <li><a data-toggle="tooltip" title="Edit"' +
                                ' href="http://localhost/mark/MarkDistributions/showMarkDistribution/' + value.id + '"><i class="fa fa-edit fa-lg"></i> Edit</a> ' +
                                ' </ul> </div> ' +
                                '</td>' +
                                '</tr>'
                            )
                        })

                    }
                }
            })
        });
    });
</script>



<?php require APPROOT . '/views/layouts/footer.php' ?>
