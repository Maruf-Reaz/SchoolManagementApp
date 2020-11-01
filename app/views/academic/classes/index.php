<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/1/2018
 * Time: 1:02 PM
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
        tfoot tr.footer-datatable th:nth-child(1).column-title input.form-control.bottom-search {
            display: none;
        }

        tfoot tr.footer-datatable th:nth-child(4).column-title input.form-control.bottom-search {
            display: none;
        }

        .filters {
            background: transparent;
        }

        .filters .btn-primary {
            margin-bottom: 6px;
        }
    </style>


    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="x_panel au-card p-0 mb-0">
                        <div class="col-lg-12 col-sm-12 col-xs-12 p-0">
                            <div class="au-card-title">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3><i class="zmdi zmdi-edit"></i>Class</h3>
                            </div>
                            <div class="filters">
                                <a class="btn btn-primary btn-sm btn-rounded float-right"
                                   href="<?php echo URLROOT; ?>/academic/classes/add"><i class="fa fa-plus pr-2"></i>Add
                                    Class</a>
                            </div>
                            <div class="x_content">
                                <div class="">
                                    <table id="example2" class="table table-striped jambo_table bulk_action table-responsive-sm table-responsive-md table-bordered">
                                        <thead>
                                        <tr class="headings">
                                            <th>S/N</th>
                                            <th>Class</th>
                                            <th>Class Numeric</th>
                                            <th class="th-lg">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($data['classes'] as $key => $class): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $key + 1; ?>
                                                </td>
                                                <td>
                                                    <?php echo $class->name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $class->numeric_value; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo URLROOT ?>/academic/classes/edit/<?php echo $class->id; ?>"
                                                       class="btn btn-primary btn-sm border-0">Edit</a>
                                                </td>


                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr class="footer-datatable">
                                            <th class="column-title">S/N</th>
                                            <th class="column-title">Class</th>
                                            <th class="column-title">Class Numeric</th>
                                            <!--<th class="column-title">Teacher Name</th>-->
                                            <!--<th class="column-title">Note</th>-->
                                            <th style="width: 100px;" class="column-title">Action</th>

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

    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function () {

            $('#example2').DataTable({
                /*"pagingType": "full_numbers",*/
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