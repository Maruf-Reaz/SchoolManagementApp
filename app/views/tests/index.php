<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/15/2018
 * Time: 12:01 PM
 */
?>
<?php /*require APPROOT . '/views/layouts/header.php' */ ?>
<!--Mobile header with Navbar and notification bar-->
<?php /*require APPROOT . '/views/layouts/mobile_header.php' */ ?>
<!--Menu Sidebar with navbar-->
<?php /*require APPROOT . '/views/layouts/menu_sidebar.php' */ ?>
<!--Desktopn header with navbar and header file-->
<?php /*require APPROOT . '/views/layouts/desktop_header.php' */ ?>


<?php /*require APPROOT . '/views/layouts/footer.php' */ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JS Table</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<form action="test" method="post" id="main_form">

    <table id="invoice_table" border="1px">
        <tr>
            <th>Name</th>
            <th>Fee type</th>
            <th>Amount</th>
            <th>Discount</th>
        </tr>
        <tr>
            <input class="id" type="hidden" name="id[]" value="1">
            <td><input class="name" type="text" name="name[]" value="Imran"></td>
            <td><input class="fee_type" type="text" name="fee_type[]" value="Tuition"></td>
            <td><input class="amount" type="text" value="5000"><input type="hidden" name="amount[]" value="5000"></td>
            <td>600</td>
            <td><input type="button" class="update_btn" value="Update"></td>

        </tr>
        <tr>
            <input class="id" type="hidden" name="id[]" value="2">
            <td>Arman<input class="name" type="hidden" name="name[]" value="Arman"></td>
            <td>Tuition<input class="fee_type" type="hidden" name="fee_type[]" value="Tuition"></td>
            <td><input class="amount" type="text" value="5000"><input type="hidden" name="amount[]" value="5000"></td>
            <td>600</td>
            <td>
                <input type="button" class="update_btn" value="Update">
            </td>

        </tr>
        <tr>
            <input class="id" type="hidden" name="id[]" value="3">
            <td>Maruf<input class="name" type="hidden" name="name[]" value="Maruf"></td>
            <td>Tuition<input class="fee_type" type="hidden" name="fee_type[]" value="Tuition"></td>
            <td><input class="amount" type="text" value="5000"><input type="hidden" name="amount[]" value="5000"></td>
            <td>600</td>
            <td>
                <input type="button" class="update_btn" value="Update">
            </td>

        </tr>
    </table>
    <br>
    <input type="submit" value="Submit">
</form>

<!-- <button id="b1">Change</button> -->
<select name="" id="b1">
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
</select>
<script>
    $(document).ready(function () {

        /*$("#main_form").on("submit", function () {
            $("#main_form").serialize();
        });*/

        $("#b1").change(function () {
            $(".amount").val('3000');
            //alert("Hello");
        });
        /*$(document).on('click', '.update_btn', function () {
            console.log(this);
        });*/

        $(".update_btn").click(function () {

            var id = $(this).closest("tr").find(".id").val();
            var name = $(this).closest("tr").find(".name").val();
            var fee_type = $(this).closest("tr").find(".fee_type").val();
            var amount = $(this).closest("tr").find(".amount").val();

            var dataString = {id: id, name: name, fee_type: fee_type, amount: amount};
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "http://localhost/test",
                data: dataString,
                cache: false,
                success: function (objects) {
                    //console.log(objects);
                }
            })
        });
    })

</script>
</body>
</html>
