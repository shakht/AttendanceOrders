<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">

    <title>Attendance orders</title>
    <!-- Styles -->
    <style>
        body {
            background: linear-gradient(to bottom, #d8f4fd, #ffffff) no-repeat; /* Change colors as needed */
        }

        * {
            direction: rtl;
        }

        .center-div {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 22px;
        }

        th, td {
            text-align: center;
        }

        /*!* Custom checkbox style *!
        .custom-checkbox {
            display: inline-block;
            width: 20px; !* Set width *!
            height: 20px; !* Set height *!
            border: 2px solid #d10909; !* Set border color *!
            border-radius: 5px; !* Set border radius *!
            position: relative;
        }

        !* Hide default checkbox *!
        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
        }

        !* Checkmark *!
        .custom-checkbox::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 12px; !* Set checkmark size *!
            height: 12px; !* Set checkmark size *!
            background-color: #ff0c0c; !* Set checkmark color *!
            border-radius: 2px; !* Set checkmark border radius *!
            display: none;
        }

        !* Show checkmark when checkbox is checked *!
        .custom-checkbox input[type="checkbox"]:checked ::before {
            display: block;
        }*/

        input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        /* Style the custom radio button */
        input[type="checkbox"]::before {
            content: "";
            display: inline-block;
            border-radius: 4px;

            width: 20px; /* Adjust the width as needed */
            height: 20px; /* Adjust the height as needed */
            border: 2px solid #374C70; /* Border color */
            /*background-color: #374C70; !* Background color when not checked *!*/
            margin-right: 8px; /* Adjust spacing between the bullet and label */
        }

        input[type="checkbox"]:checked::before {
            background-color: #00B6E6; /* Background color when checked */
            border-color: #00B6E6; /* Border color when checked */
        }
    </style>
</head>
<body>
<h2 style="display: flex; justify-content: center;">طلبات الحظور</h2>

<div class="align-content-center center-div">
    <div class="form-group text-center">
        <input type="text" id="new_item" class="form-control" placeholder="أدخل وجبة جديدة">
        <button id="add_btn" class="btn btn-primary mt-2">Add</button>
    </div>
</div>

<div class="align-content-center center-div">
    <div class="form-group text-center">
        <input type="text" id="new_person" class="form-control" placeholder="اضافة شخص جديد">
        <button id="add_new_person_btn" class="btn btn-primary mt-2">Add</button>
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
            <th scope="col">حسن</th>
            <th scope="col">العدد الكلي</th>
            <th scope="col">السعر</th> <!-- New column for item price -->
            <th scope="col">السعر الإجمالي</th> <!-- New column for total price -->
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

    <!-- Label to display total price -->
    <div>
        <label for="total_price">السعر الإجمالي للعناصر المحددة:</label>
        <span id="total_price_lbl">0</span>
    </div>
</div>

{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
<script>
    var addButton = document.getElementById("add_btn")
    var newItem = document.getElementById("new_item")
    var table = document.getElementById("item_table").getElementsByTagName('tbody')[0];
    var totalPriceLabel = document.getElementById("total_price_lbl");

    var items = ["كباب", "مقلوبة", "تمن و فاصوليا", "تمن و بتيتا", "وجبة تمن و كباب", "وجبة كص", "شاورما دجاج", "برياني", "محشي بيذنجان", "شاورما على التمن"];

    document.addEventListener('DOMContentLoaded', function () {
        attachCheckboxListeners();
    });

    function createRow(item) {
        var row = '<tr>' +
            '<th scope="row">' + item + '</th>' +
            '<td><input type="checkbox" class="meal-checkbox custom-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox custom-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox custom-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox custom-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox custom-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox custom-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox custom-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox custom-checkbox" name="' + item + '"></td>' +
            '<td><input type="checkbox" class="meal-checkbox custom-checkbox" name="' + item + '"></td>' +
            '<td><input class="total-count" value="0" type="number" name="' + item + '"></td>' +
            '<td><input type="text" class="price" name="' + item + '" value="2000"></td>' + <!-- New column for item price -->
            '<td><input data-price="' + item + '" class="total-price" value="0" type="text" name="' + item + '"></td>' +
            '</tr>';
        return row;
    }

    items.forEach(function (item) {
        var newRow = createRow(item);
        table.insertAdjacentHTML('beforeend', newRow);
    });

    function attachCheckboxListeners() {
        var rows = table.querySelectorAll('tr');
        rows.forEach(function (row) {
            var checkboxes = row.querySelectorAll('.meal-checkbox');
            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    updateTotalCount(row);
                    updateTotalPrice(row);
                    updateTotalPriceLbl();
                });
            });
        });
    }

    function updateTotalCount(row) {
        var checkboxes = row.querySelectorAll('.meal-checkbox');
        var totalCount = row.querySelector('.total-count');
        var count = 0;

        checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
                count += 1;
            }
        });

        totalCount.value = /*parseInt(totalCount.value) +*/ count;
    }

    function updateTotalPrice(row) {
        var checkboxes = row.querySelectorAll('.meal-checkbox');
        var priceInput = row.querySelector('.price');
        var totalPriceInput = row.querySelector('.total-price');
        var totalPrice = 0;

        checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
                totalPrice += parseFloat(priceInput.value);
            }
        });
        totalPriceInput.value = totalPrice;
    }

    function updateTotalPriceLbl() {
        var totalPrice = 0;
        var totalPriceInputs = document.querySelectorAll('.total-price');

        totalPriceInputs.forEach(function (totalPriceInput) {
            console.log(totalPriceInput.getAttribute('data-price'))
            var price = parseFloat(totalPriceInput.getAttribute('data-price')) || 0;
            totalPrice += price;
        });

        totalPriceLabel.textContent = totalPrice.toFixed(2);
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
