<!--//written by
//Maruf
//5-9-2018
-->

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
                                    <h3><i class="zmdi zmdi-edit"></i>Exam</h3>
                                </div>
                                <div class="filters">

                                    <div class="rs-select2--dark rs-select2--sm rs-select2--border" style="width: 180px">
                                        <select name="year" id="year" class="form-control">
			                                <?php $year_value = explode( "0", date( "Y" ) );
			                                for ( $i = 10; $i < $year_value[1]; $i ++ ): ?>
                                                <option value="20<?php echo $i; ?>">
                                                    20<?php echo $i; ?></option>
			                                <?php endfor; ?>
                                            <option value="<?php echo date( "Y" ); ?>"
                                                    selected="selected"><?php echo date( "Y" ); ?></option>
			                                <?php $year_value = explode( "0", date( "Y" ) );

			                                for ( $i = $year_value[1] + 1; $i < 100; $i ++ ): ?>
                                                <option value="20<?php echo $i; ?>">
                                                    20<?php echo $i; ?></option>
			                                <?php endfor; ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <a data-toggle="tooltip" title="Add Exam" class="fa fa-plus"
                                       href="<?php echo URLROOT; ?>/exam/Exams/add"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>

                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">

                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-titlet">#</th>
                                                <th class="column-titlet">Exam Name</th>
                                                <th class="column-titlet">Starting Date</th>
                                                <th class="column-titlet">Ending Date</th>
                                                <th class="column-titlet">Note</th>
                                                <th class="column-titlet">Options</th>

                                            </tr>
                                            </thead>
                                            <tbody id="data_table_body">
											<?php $i = 0;
											foreach ( $data['exams'] as $exam ): ?>

                                                <tr class="even pointer">
                                                    <input type="hidden" name="id">
                                                    <td><?php echo $i += 1 ?></td>
                                                    <td><?php echo $exam->name ?></td>
                                                    <td><?php echo $exam->from_date ?></td>
                                                    <td><?php echo $exam->to_date ?></td>
                                                    <td><?php echo $exam->note ?></td>
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
                                                                            href="<?php echo URLROOT ?>/exam/Exams/showExam/<?php echo $exam->id; ?>"><i
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
        $("#year").change(function () {
            var year = $(this).val();
            //$("#data_table_body").empty();
            var dataString = 'year=' + year;
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "/exam/exams/getExamByYEar",
                data: dataString,
                cache: false,
                success: function (objects) {
                    console.log(objects)
                    if (objects.length === 0) {
                        $("#data_table_body").empty();
                        $("#data_table_body").append('<tr><td colspan="7" class="text-center"> No data found..Please select a year</td></tr>')
                    } else {
                        $("#data_table_body").empty();
                        //add_to_item_table(objects);
                        $.each(objects, function (key, value) {

                            $("#data_table_body").append('<tr>' +
                                '<td>' + eval(key + 1) + '</td>' +
                                '<td>' + value.name + '</td>' +
                                '<td>' + value.date + '</td>' +
                                '<td>' + value.from_date + '</td>' +
                                '<td>' + value.to_date + '</td>' +
                                "<td>" +
                                '<div data-toggle="tooltip" title="View Options" class="btn-group"> <button style="padding-top: 2px;padding-bottom: 2px;"' +
                                ' type="button" class="btn btn-default" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i>' +
                                '</button>  <ul class="dropdown-menu pull-right" role="menu" style="box-shadow: 0px 0px 5px 1px #888888;"> '
                                + ' <li><a data-toggle="tooltip" title="Edit"' +
                                ' href="/exam/Exams/showExam/' + value.id + '"><i class="fa fa-edit fa-lg"></i> Edit</a> ' +
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
