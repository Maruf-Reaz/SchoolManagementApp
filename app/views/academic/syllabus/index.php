<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/5/2018
 * Time: 11:52 AM
 */
?>
    <!--Page header and All CSS Files-->
<?php require APPROOT . '/views/layouts/header.php' ?>
    <!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
    <!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
    <!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

    <style>
        table.jambo_table tbody tr td a.btn-primary {
            font-size: 18px;
            line-height: 1.6;
        }
    </style>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding-left-right">
                                    <div class="au-card-title">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3><i class="zmdi zmdi-edit"></i>Syllabus</h3>
                                    </div>

                                    <div class="filters">
                                        <!--Class-->
                                        <div class="rs-select2--dark rs-select2 rs-select2--border col-lg-2 col-xs-12">
                                            <select class="form-control js-select2" name="class" id="class">
                                                <option value="0" selected="selected">Select Class</option>
                                                <?php foreach ($data['classes'] as $class): ?>
                                                    <option value="<?php echo $class->id; ?>">
                                                        <?php echo $class->name; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>

                                        <a class="btn btn-primary" href="<?php echo URLROOT; ?>/academic/syllabuses/add"><i class="fa fa-plus"></i>Add
                                            Syllabus</a>

                                    </div>
                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-striped jambo_table bulk_action">
                                                <thead>
                                                <tr class="headings">
                                                    <th class="column-title">S/N</th>
                                                    <th class="column-title">Ttile</th>
                                                    <th class="column-title">Description</th>
                                                    <th class="column-title">Date</th>
                                                    <th class="column-title">Uploader</th>
                                                    <th class="column-title">File</th>
                                                    <th class="column-title">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody id="data_table_body">
                                                <?php foreach ($data['syllabuses'] as $key => $syllabus): ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $key + 1; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $syllabus->title; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $syllabus->description; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $syllabus->date; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $syllabus->user_id; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $syllabus->file_name; ?>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-default"
                                                                        data-toggle="dropdown" aria-expanded="false"><i
                                                                            class="fa fa-ellipsis-v"></i></button>
                                                                <ul class="dropdown-menu pull-right" role="menu">
                                                                    <li>
                                                                        <a href="<?php echo URLROOT ?>/file/syllabuses/<?php echo $syllabus->file_name; ?>"><i
                                                                                    class="fa fa-download fa-lg"></i>
                                                                            Download</a></li>
                                                                    <li>
                                                                        <a href="<?php echo URLROOT ?>/academic/syllabuses/edit/<?php echo $syllabus->id; ?>"><i
                                                                                    class="fa fa-edit fa-lg"></i>
                                                                            Edit</a></li>
                                                                    <li><a onclick="alert('Are you sure ?')"
                                                                           href="<?php echo URLROOT ?>/academic/syllabuses/delete/<?php echo $syllabus->id; ?>"><i
                                                                                    class="fa fa-trash fa-lg"></i>
                                                                            Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                <tr class="headings">
                                                    <th class="column-title">S/N</th>
                                                    <th class="column-title">Ttile</th>
                                                    <th class="column-title">Description</th>
                                                    <th class="column-title">Date</th>
                                                    <th class="column-title">Uploader</th>
                                                    <th class="column-title">File</th>
                                                    <th class="column-title">Action</th>
                                                </tr>
                                                </tfoot>
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
            $("#class").change(function () {
                var class_id = $(this).val();
                // $("#data_table_body").empty();
                var dataString = 'class_id=' + class_id;
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/academic/syllabuses/getSyllabusByClass",
                    data: dataString,
                    cache: false,
                    success: function (objects) {
                        console.log(objects)
                        if (objects.length === 0) {
                            $("#data_table_body").empty();
                            $("#data_table_body").append('<tr><td colspan="7" class="text-center"> No data found..Please select a class</td></tr>')
                        } else {
                            $("#data_table_body").empty();
                            //add_to_item_table(objects);
                            $.each(objects, function (key, value) {

                                $("#data_table_body").append('<tr>' +
                                    '<td>' + eval(key + 1) + '</td>' +
                                    '<td>' + value.title + '</td>' +
                                    '<td>' + value.description + '</td>' +
                                    '<td>' + value.date + '</td>' +
                                    '<td>' + value.user_id + '</td>' +
                                    '<td>' + value.file_name + '</td>' +
                                    '<td>' +
                                    '<div class="btn-group">' +
                                    '<button type="button" class="btn btn-default" data-toggle="dropdown" aria-expanded="false">' + '<i class="fa fa-ellipsis-v">' + '</i></button>' +
                                    '<ul class="dropdown-menu pull-right" role="menu">' +
                                    '<li>' +
                                    "<a href= '/file/syllabuses/" + value.file_name + "' class='btn btn-primary'><i class='fa fa-download'></i>Download</a>" + '</li>' +
                                    '<li>' +
                                    "<a href= '/academic/syllabuses/edit/" + value.id + "' class='btn btn-primary'><i class='fa fa-edit'></i>Edit</a>" +
                                    '</li>' +
                                    '<li>' + "<a href= '/academic/syllabuses/delete/" + value.id + "' class='btn btn-danger'><i class='fa fa-trash'></i>Delete</a>" + '</li>' +
                                    '</ul>' +
                                    '</div>' +
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
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function () {

            $('#example2').DataTable({
                "pagingType": "full_numbers",
                "dom": 'tB<"right"rpl>',
                "columnDefs": [{
                    "searchable": true,
                }],

                buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                ]
            });
            $('#example2 tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search" class="form-control bottom-search"/>');
            });
            // DataTable
            var table = $('#example2').DataTable();
            // Apply the search
            table.columns().every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>