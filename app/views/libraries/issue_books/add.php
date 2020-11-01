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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Issue Book</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php URLROOT; ?>/libraries/issuebooks/add-issue" method="post"
                                  class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="library_id" class=" form-control-label">Library ID</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="library_id" name="library_id"
                                               placeholder="Enter Library ID ..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="rack_number" class=" form-control-label">Rack</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select class="form-control" name="rack_number" id="rack_number">
                                            <option value="0" selected="selected">----Select Rack Number----</option>
											<?php foreach ( $data['rack_numbers'] as $key => $rack_number ): ?>
                                                <option value="<?php echo $rack_number; ?>"> <?php echo $rack_number; ?></option>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="book_name" class=" form-control-label">Book</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select class="form-control" name="book_id" id="book_id">
                                            <option value="0" selected="selected">----Select Book----</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="author" class=" form-control-label">Author</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="author" readonly name="author" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="subject_code" class=" form-control-label">Subject Code</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="subject_code" readonly name="subject_code"
                                               class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="serial_number" class=" form-control-label">Serial Number</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="serial_number" name="serial_number"
                                               placeholder="Enter Serial Number ..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="due_date" class=" form-control-label">Due Date</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="due_date" name="due_date"
                                               placeholder="Enter Due Date ..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="note" class=" form-control-label">Note</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="note" name="note"
                                               placeholder="Enter Note ..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm"> Add Issue</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#rack_number").change(function () {
            var rack_number = $(this).val();
            $("#book_id").empty();
            $("#book_id").append('<option value="">----Select Book----</option>');
            $("#author").val("");
            $("#subject_code").val("");
            var dataString = 'rack_number=' + rack_number;
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "http://localhost/libraries/issuebooks/getBooksByRackNumber",
                data: dataString,
                cache: false,
                success: function (objects) {
                    console.log(objects)
                    if (objects.length === 0) {
                        $("#book_id").empty();
                        $("#book_id").append('<option value="">----Select Book----</option>');
                    } else {
                        $.each(objects, function (key, value) {
                            if (value.quantity > 0) {
                                $("#book_id").append('<option value=' + value.id + '>' + value.name + '</option>'
                                )
                            }
                        })
                    }
                }
            });
        });
        $("#book_id").change(function () {
            var book_id = $(this).val();
            var dataString = 'book_id=' + book_id;
            $("#author").val("");
            $("#subject_code").val("");
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "http://localhost/libraries/issuebooks/getBookByID",
                data: dataString,
                //cache: false,
                success: function (object) {
                    console.log(object);
                    if (object.length !== 0) {
                        $("#author").val(object.author);
                        $("#subject_code").val(object.subject_code);
                    }
                }
            });
        });
    });
</script>

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>