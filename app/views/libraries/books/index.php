<!--Page header and All CSS Files-->
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
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <a class="au-btn au-btn-icon au-btn--green au-btn--small"
                               href="<?php URLROOT; ?>/libraries/books/add">
                                <i class="zmdi zmdi-plus"></i>Add Book</a>
                        </div>
                        <div class="table-data__tool-right">
                            <input class="form-control input-lg" type="text" placeholder="Search" id="search_book"
                                   name="search_book" aria-label="Search">
                        </div>
                    </div>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Author</th>
                                <th>Subject Code</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Rack Number</th>
                                <th>Status</th>
                                <th class="text-lg-center">Action</th>
                            </tr>
                            </thead>
                            <tbody id="data_table_body">
							<?php foreach ( $data['books'] as $key => $book ): ?>
                                <tr>
                                    <td><?php echo $key += 1; ?></td>
                                    <td><?php echo $book->name ?></td>
                                    <td><?php echo $book->author ?></td>
                                    <td><?php echo $book->subject_code ?></td>
                                    <td><?php echo $book->price ?></td>
                                    <td><?php echo $book->quantity ?></td>
                                    <td><?php echo $book->rack_number ?></td>
                                    <td><?php echo ( $book->quantity > 0 ) ? 'available' : 'unavailable' ?></td>
                                    <td>
                                        <a onclick=""
                                           href="<?php echo URLROOT ?>/libraries/books/show-issues/<?php echo $book->id; ?>"
                                           class="btn btn-warning"><i class="zmdi zmdi-view-agenda"></i>view issues</a>
                                        <a onclick=""
                                           href="<?php echo URLROOT ?>/libraries/books/edit/<?php echo $book->id; ?>"
                                           class="btn btn-primary"><i class="zmdi zmdi-edit"></i>edit</a>&nbsp;
                                        <a onclick="alert('Are you sure ?')"
                                           href="<?php echo URLROOT ?>/libraries/books/delete/<?php echo $book->id; ?>"
                                           class="btn btn-danger"><i class="zmdi zmdi-delete"></i>delete</a>
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

<script>
    $(document).ready(function () {
        $("#search_book").keyup(function () {
            var name_of_book = $(this).val();
            var dataString = 'name_of_book=' + name_of_book;
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "http://localhost/libraries/books/showBookByName",
                data: dataString,
                cache: false,
                success: function (objects) {
                    console.log(objects)
                    if (objects.length === 0) {
                        $("#data_table_body").empty();
                        $("#data_table_body").append('<tr><td colspan="9" class="text-center"> No Book With This Name..</td></tr>')
                    } else {
                        $("#data_table_body").empty();
                        //add_to_item_table(objects);
                        $.each(objects, function (key, value) {
                            var view = "<a href= 'http://localhost/libraries/books/show-issues/" + value.id + "' class='btn btn-warning'><i class='zmdi zmdi-view-agenda'></i>view issues</a>";
                            var edit = "<a href= 'http://localhost/libraries/books/edit/" + value.id + "' class='btn btn-primary'><i class='zmdi zmdi-edit'></i>edit</a>";
                            var del = "<a onclick='confirmation()' href= 'http://localhost/libraries/books/delete/" + value.id + "' class='btn btn-danger'><i class='zmdi zmdi-delete'></i>delete</a>";
                            var status = (value.quantity > 0 ? "available" : "unavailable");
                            $("#data_table_body").append('<tr>' +
                                '<td>' + eval(key + 1) + '</td>' +
                                '<td>' + value.name + '</td>' +
                                '<td>' + value.author + '</td>' +
                                '<td>' + value.subject_code + '</td>' +
                                '<td>' + value.price + '</td>' +
                                '<td>' + value.quantity + '</td>' +
                                '<td>' + value.rack_number + '</td>' +
                                '<td>' + status + '</td>' +
                                "<td>" +
                                view + ' ' +
                                edit + ' ' +
                                del + ' ' +
                                "</td>" +
                                '</tr>'
                            )
                        })
                    }
                }
            })
        });
    });

    function confirmation() {
        alert('Are you sure ?');
    }
</script>

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>
