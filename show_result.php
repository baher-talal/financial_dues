<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "financial_dues";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch the report date from the database
$date_sql = "SELECT report_date FROM report_dates ORDER BY id DESC LIMIT 1";
$date_result = $conn->query($date_sql);
$report_date = "2024-08-29"; // Default date

if ($date_result->num_rows > 0) {
  $date_row = $date_result->fetch_assoc();
  $report_date = $date_row['report_date'];
}

// Fetch data from the database
$sql = "SELECT * FROM totals";
$result = $conn->query($sql);
$totals = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $totals[] = $row;
  }
} else {
  // echo "0 results";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>بيان بإجمالى المستحقات طرف هيئة الطرق</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{
      margin-bottom: 6%;
    }

    .container-fluid {
      padding-right: 5%;
      padding-left: 5%;
    }
    .backgroundColorTotal {
      background-color: #e3e3e3;
      border-radius: 5px;
    }

    .no-arrows {
      -moz-appearance: textfield;
    }

    .no-arrows::-webkit-outer-spin-button,
    .no-arrows::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .bg-dark {
      background-color: #000 !important;
    }

    .table td,
    .table th {
      vertical-align: middle !important;
    }

    .backgroundColorGreyDark {
      background-color: #cccccc;
    }

    .backgroundColorGreyOne {
      background-color: #f5f5f5ad;
    }

    .backgroundColorGreyTwo {
      background-color: #d1d1d18f;
    }

    .backgroundColorGreyThree {
      background-color: #d1d1d1;
    }

    .backgroundColorGreyFourth {
      background-color: #bfbfbf;
    }
  </style>
</head>

<body>
  <div class="container-fluid mt-5 text-center">
    <div class="text-center my-5">
      <h4 class="py-2">بيان بإجمالى المستحقات طرف هيئة الطرق حتى</h4>
      <h5 class="py-2">
        <input type="date" id="report_date" value="<?= $report_date ?>" class="text-center form-control d-inline-block w-auto" disabled readonly>
      </h5>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="backgroundColorGreyDark">بيان</th>
          <th class="backgroundColorGreyDark" colspan="2">الإدارة الفنية</th>
          <th class="backgroundColorGreyDark" colspan="4">الإدارة المالية</th>
          <th class="backgroundColorGreyDark" colspan="2">إجمالى الفنية والمالية</th>
          <th class="backgroundColorGreyDark">الإجمالى </th>
        </tr>
        <tr>
          <th>المستخلصات</th>
          <th class="backgroundColorGreyOne">الشركة</th>
          <th class="backgroundColorGreyOne">القابضة</th>
          <th class="backgroundColorGreyTwo">موافقة الشركة</th>
          <th class="backgroundColorGreyTwo">موافقة القابضة</th>
          <th class="backgroundColorGreyThree">بدون موافقة الشركة</th>
          <th class="backgroundColorGreyThree">بدون موافقة القابضة</th>
          <th class="backgroundColorGreyFourth">الشركة</th>
          <th class="backgroundColorGreyFourth">القابضة</th>
          <th class="backgroundColorGreyFourth">العام</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($totals as $index => $total): ?>
          <tr>
            <td><?= $total['description'] ?></td>
            <td class="backgroundColorGreyOne">
              <div class="">
                <input id="total_item<?= $index + 1 ?>" type="number" value="<?= $total['total_item'] ?>" class="total_item text-center form-control no-arrows" disabled readonly />
              </div>
            </td>

            <td class="backgroundColorGreyOne">
              <div class="">
                <input id="b_total_item<?= $index + 1 ?>" type="number" value="<?= $total['b_total_item'] ?>" class="total_item text-center form-control no-arrows" disabled readonly />
              </div>
            </td>

            <td class="backgroundColorGreyTwo">
              <div class="">
                <input id="c_total_item<?= $index + 1 ?>" type="number" value="<?= $total['c_total_item'] ?>" class="total_item text-center form-control no-arrows" disabled readonly />
              </div>
            </td>
            <td class="backgroundColorGreyTwo">
              <div class="">
                <input id="d_total_item<?= $index + 1 ?>" type="number" value="<?= $total['d_total_item'] ?>" class="total_item text-center form-control no-arrows" disabled readonly />
              </div>
            </td>
            <td class="backgroundColorGreyThree">
              <div class="">
                <input id="e_total_item<?= $index + 1 ?>" type="number" value="<?= $total['e_total_item'] ?>" class="total_item text-center form-control no-arrows" disabled readonly />
              </div>
            </td>
            <td class="backgroundColorGreyThree">
              <div class="">
                <input id="f_total_item<?= $index + 1 ?>" type="number" value="<?= $total['f_total_item'] ?>" class="total_item text-center form-control no-arrows" disabled readonly />
              </div>
            </td>
            <td class="backgroundColorGreyFourth">
              <div id="g_total_item<?= $index + 1 ?>" class="border-secondary backgroundColorTotal form-control"><?= $total['g_total_item'] ?></div>
            </td>
            <td class="backgroundColorGreyFourth">
              <div id="h_total_item<?= $index + 1 ?>" class="border-secondary backgroundColorTotal form-control"><?= $total['h_total_item'] ?></div>
            </td>
            <td class="backgroundColorGreyFourth">
              <div id="i_total_item<?= $index + 1 ?>" class="border-secondary backgroundColorTotal form-control"><?= $total['i_total_item'] ?></div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td>إجمالي المستحق للشركة</td>
          <td>
            <div id="result_item_1" class="border-secondary form-control result_item backgroundColorTotal"></div>
          </td>
          <td>
            <div id="result_item_2" class="border-secondary form-control result_item backgroundColorTotal"></div>
          </td>
          <td>
            <div id="result_item_3" class="border-secondary form-control result_item backgroundColorTotal"></div>
          </td>
          <td>
            <div id="result_item_4" class="border-secondary form-control result_item backgroundColorTotal"></div>
          </td>
          <td>
            <div id="result_item_5" class="border-secondary form-control result_item backgroundColorTotal"></div>
          </td>
          <td>
            <div id="result_item_6" class="border-secondary form-control result_item backgroundColorTotal"></div>
          </td>
          <td>
            <div id="result_item_7" class="border-secondary form-control result_item backgroundColorTotal"></div>
          </td>
          <td>
            <div id="result_item_8" class="border-secondary form-control result_item backgroundColorTotal"></div>
          </td>
          <td>
            <div id="result_item_9" class="border-secondary form-control result_item backgroundColorTotal"></div>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      // Existing functions...

      // Handle date change
      $('#report_date').on('change', function() {
        const newDate = $(this).val();
        $.ajax({
          url: 'update_date.php',
          type: 'POST',
          data: {
            report_date: newDate
          },
          success: function(response) {
            console.log(response);
          }
        });
      });

      // Existing code...
    });

    $(document).ready(function() {
      function calculateTotal(prefix) {
        let total = 0;
        for (let i = 1; i <= 13; i++) {
          let value = parseFloat($(`#${prefix}total_item${i}`).val()) || 0;
          total += value;
        }
        return total;
      }

      function calculateCombinedTotal(id1, id2, id3, resultId) {
        const value1 = parseFloat($(`#${id1}`).val()) || 0;
        const value2 = parseFloat($(`#${id2}`).val()) || 0;
        const value3 = parseFloat($(`#${id3}`).val()) || 0;
        const combinedSum = value1 + value2 + value3;
        $(`#${resultId}`).text(combinedSum.toFixed(2));
      }

      function calculateGTotal() {
        let total = 0;
        for (let i = 1; i <= 13; i++) {
          let value = parseFloat($(`#g_total_item${i}`).text()) || 0;
          total += value;
        }
        $('#result_item_7').text(total.toFixed(2));
      }

      function calculateHTotal() {
        let total = 0;
        for (let i = 1; i <= 13; i++) {
          let value = parseFloat($(`#h_total_item${i}`).text()) || 0;
          total += value;
        }
        $('#result_item_8').text(total.toFixed(2));
      }

      function calculateITotal() {
        for (let i = 1; i <= 13; i++) {
          const value1 = parseFloat($(`#g_total_item${i}`).text()) || 0;
          const value2 = parseFloat($(`#h_total_item${i}`).text()) || 0;
          const combinedSum = value1 + value2;
          $(`#i_total_item${i}`).text(combinedSum.toFixed(2));
        }
      }

      function calculateITotalSum() {
        let total = 0;
        for (let i = 1; i <= 13; i++) {
          let value = parseFloat($(`#i_total_item${i}`).text()) || 0;
          total += value;
        }
        $('#result_item_9').text(total.toFixed(2));
      }

      function updateResults() {
        $('#result_item_1').text(calculateTotal('').toFixed(2));
        $('#result_item_2').text(calculateTotal('b_').toFixed(2));
        $('#result_item_3').text(calculateTotal('c_').toFixed(2));
        $('#result_item_4').text(calculateTotal('d_').toFixed(2));
        $('#result_item_5').text(calculateTotal('e_').toFixed(2));
        $('#result_item_6').text(calculateTotal('f_').toFixed(2));
        $('#result_item_7').text(calculateTotal('g_').toFixed(2));
        $('#result_item_8').text(calculateTotal('h_').toFixed(2));
        $('#result_item_9').text(calculateTotal('i_').toFixed(2));

        for (let i = 1; i <= 13; i++) {
          calculateCombinedTotal(`total_item${i}`, `c_total_item${i}`, `e_total_item${i}`, `g_total_item${i}`);
          calculateCombinedTotal(`b_total_item${i}`, `d_total_item${i}`, `f_total_item${i}`, `h_total_item${i}`);
        }

        calculateGTotal();
        calculateHTotal();
        calculateITotal();
        calculateITotalSum();
      }

      $('input[id^="total_item"], input[id^="b_total_item"], input[id^="c_total_item"], input[id^="d_total_item"], input[id^="e_total_item"], input[id^="f_total_item"], input[id^="g_total_item"], input[id^="h_total_item"], input[id^="i_total_item"]').on('input', function() {
        const id = $(this).attr('id');
        const value = $(this).val();
        $.ajax({
          url: 'update.php',
          type: 'POST',
          data: {
            id: id,
            value: value
          },
          success: function(response) {
            console.log(response);
          }
        });
        updateResults();
      });

      updateResults();
    });
  </script>
</body>

</html>