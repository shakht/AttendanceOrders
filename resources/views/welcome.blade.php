<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">

    <title>Attendance orders</title>
    <!-- Styles -->
    <style>
        * {
            direction: rtl;
        }

        .center-div {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
<h2>طلبات الحظور</h2>

<div class="align-content-center center-div">
    <div>
        <label for="">اضافة وجبة جديدة</label>
        <input id="new_item" type="text">
        <button id="add_btn">اضافة</button>
    </div>
</div>

<div>
    <table id="item_table" class="table table-bordered">
        <thead>
        <tr class="table-primary">
            <th scope="col">الوجبات</th>
            <th scope="col">محمد حسين</th>
            <th scope="col">رعد</th>
            <th scope="col">مصطفى</th>
            <th scope="col">سجاد</th>
            <th scope="col">امير</th>
            <th scope="col">علي وردي</th>
            <th scope="col">محمدعلي</th>
            <th scope="col">حيدر</th>
            <th scope="col">سجاد</th>
            <th scope="col">حسن</th>
            <th scope="col">المجموع</th>
        </tr>
        </thead>
        <tbody>
        {{--<tr>
            <th scope="row">كباب</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">تمن و فاصوليا</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">تمن و بتيتا</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">وجبة تمن و كباب</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">وجبة كص</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">برياني</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">محشي برياني</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">شاورما برياني</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>--}}
        </tbody>
    </table>

</div>

{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
<script>
    var addButton = document.getElementById("add_btn")
    var newItem = document.getElementById("new_item")
    var table = document.getElementById("item_table").getElementsByTagName('tbody')[0];
    var items = ["كباب", "تمن و فاصوليا", "تمن و بتيتا", "وجبة تمن و كباب", "وجبة كص", "برياني", "محشي برياني", "شاورما على التمن"];

    function createRow(item) {
        var row = '<tr>' +
            '<th scope="row">' + item + '</th>' +
            '<td><input type="checkbox" class="meal-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox" name="' + item + '"></td>' +
            '<td><input class="total-count" value="0" type="number" name="' + item + '"></td>' +
            '</tr>';
        return row;
    }

    items.forEach(function (item) {
        var newRow = createRow(item);
        table.insertAdjacentHTML('beforeend', newRow);
    });

    function attachCheckboxListeners() {
        var rows = table.querySelectorAll('tr');
        rows.forEach(function(row) {
            var checkboxes = row.querySelectorAll('.meal-checkbox');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    updateTotalCount(row);
                });
            });
        });
    }

    attachCheckboxListeners();

    function updateTotalCount(row) {
        var checkboxes = row.querySelectorAll('.meal-checkbox');
        var totalCount = row.querySelector('.total-count');
        var count = 0;

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                count += 1;
            }
        });

        totalCount.value = /*parseInt(totalCount.value) +*/ count;
    }

    addButton.addEventListener('click', function () {
        var newItemValue = newItem.value.trim();
        if (newItemValue === "") {
            alert("يرجى اضافة وجبة اولاََ");
        } else {
            var found = false;
            var rows = table.getElementsByTagName('tr');

            for (var i = 0; i < rows.length; i++) {
                var cell = rows[i].getElementsByTagName('th')[0];
                if (cell.textContent === newItemValue) {
                    found = true;
                    break;
                }
            }

            if (!found) {
                var newRow = createRow(newItemValue);
                console.log("notfound");
                table.insertAdjacentHTML('beforeend', newRow);
                newItem.value = ""; // Clear the input field
                attachCheckboxListeners();
            } else {
                alert("الوجبة موجودة بالفعل");
            }
        }
    });



</script>
</body>
</html>
