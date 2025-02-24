<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company_totals2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
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
  echo "0 results";
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
  </style>
</head>

<body>
  <div class="container mt-5 text-center">
    <div class="text-center my-5">
      <h4 class="py-2">بيان بإجمالى المستحقات طرف هيئة الطرق حتى</h4>
      <h5 class="py-2">29/08/2024</h5>
    </div>

    <div class="row">
      <div class="col-2 p-1">
        <div class="border py-3">
          <span>البيان</span>
        </div>
      </div>

      <div class="col-2 p-1">
        <div class="border pt-1">
          <span>الإدارة الفنية</span>

          <div class="row mx-0">
            <div class="col-6 px-0">
              <div class="border mt-2">
                <span>الشركة</span>
              </div>
            </div>

            <div class="col-6 px-0">
              <div class="border mt-2">
                <span>القابطة</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4 p-1">
        <div class="border pt-1">
          <span>الإدارة المالية</span>
          <div class="border-bottom"></div>

          <div class="row mx-0">
            <div class="col-6 pl-1 pr-0">
              <div class="border">الموافقات</div>
              <div class="row mx-0">
                <div class="col-6 px-0">
                  <div class="border">
                    <span>الشركة</span>
                  </div>
                </div>

                <div class="col-6 px-0">
                  <div class="border">
                    <span>القابطة</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 pl-0 pr-1">
              <div class="border">بدون موافقة</div>
              <div class="row mx-0">
                <div class="col-6 px-0">
                  <div class="border">
                    <span>الشركة</span>
                  </div>
                </div>

                <div class="col-6 px-0">
                  <div class="border">
                    <span>القابضة</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-2 p-1">
        <div class="border pt-1">
          <span>إجمالى الفنية والمالية</span>

          <div class="row mx-0">
            <div class="col-6 px-0">
              <div class="border mt-2">
                <span>الشركة</span>
              </div>
            </div>

            <div class="col-6 px-0">
              <div class="border mt-2">
                <span>القابطة</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-2 p-1">
        <div class="border py-3">
          <span>الإجمالى العام</span>
        </div>
      </div>
    </div>

    <div class="my-1"></div>

    <?php foreach ($totals as $index => $total): ?>
      <div class="row">
        <div class="col-2 p-1">
          <div class="border py-3">
            <span><?= $total['description'] ?></span>
          </div>
        </div>

        <div class="col-2 p-1">
          <div class="py-3">
            <div class="row">
              <div class="col-6">
                <div class="">
                  <input id="total_item<?= $index + 1 ?>" type="number" value="<?= $total['total_item'] ?>" class="total_item text-center form-control no-arrows" />
                </div>
              </div>

              <div class="col-6">
                <div class="">
                  <input id="b_total_item<?= $index + 1 ?>" type="number" value="<?= $total['b_total_item'] ?>" class="total_item text-center form-control no-arrows" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-2 p-1">
          <div class="py-3">
            <div class="row">
              <div class="col-6">
                <div class="">
                  <input id="c_total_item<?= $index + 1 ?>" type="number" value="<?= $total['c_total_item'] ?>" class="total_item text-center form-control no-arrows" />
                </div>
              </div>

              <div class="col-6">
                <div class="">
                  <input id="d_total_item<?= $index + 1 ?>" type="number" value="<?= $total['d_total_item'] ?>" class="total_item text-center form-control no-arrows" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-2 p-1">
          <div class="py-3">
            <div class="row">
              <div class="col-6">
                <div class="">
                  <input id="e_total_item<?= $index + 1 ?>" type="number" value="<?= $total['e_total_item'] ?>" class="total_item text-center form-control no-arrows" />
                </div>
              </div>

              <div class="col-6">
                <div class="">
                  <input id="f_total_item<?= $index + 1 ?>" type="number" value="<?= $total['f_total_item'] ?>" class="total_item text-center form-control no-arrows" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-2 p-1">
          <div class="py-3">
            <div class="row">
              <div class="col-6">
                <div class="border-secondary backgroundColorTotal form-control">
                  <div id="g_total_item<?= $index + 1 ?>" class=""><?= $total['g_total_item'] ?></div>
                </div>
              </div>

              <div class="col-6">
                <div class="border-secondary backgroundColorTotal form-control">
                  <div id="h_total_item<?= $index + 1 ?>" class=""><?= $total['h_total_item'] ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-2 p-1">
          <div class="py-3">
            <div class="row">
              <div class="col-12">
                <div class="border-secondary backgroundColorTotal form-control ">
                  <div id="i_total_item<?= $index + 1 ?>" class=""><?= $total['i_total_item'] ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="my-1"></div>
      <?php endforeach; ?>

    <div class="row mb-5">
      <div class="col-2 p-1">
        <div class="backgroundColorTotal border py-3">
          <span>إجمالي المستحق للشركة</span>
        </div>
      </div>

      <div class="col-2 p-1">
        <div class="py-3">
          <div class="row">
            <div class="col-6">
              <div class="">
                <div id="result_item_1" class="border-secondary form-control result_item backgroundColorTotal"></div>
              </div>
            </div>

            <div class="col-6">
              <div class="">
                <div id="result_item_2" class="border-secondary form-control result_item backgroundColorTotal"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-2 p-1">
        <div class="py-3">
          <div class="row">
            <div class="col-6">
              <div class="">
                <div id="result_item_3" class="border-secondary form-control result_item backgroundColorTotal"></div>
              </div>
            </div>

            <div class="col-6">
              <div class="">
                <div id="result_item_4" class="border-secondary form-control result_item backgroundColorTotal"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-2 p-1">
        <div class="py-3">
          <div class="row">
            <div class="col-6">
              <div class="">
                <div id="result_item_5" class="border-secondary form-control result_item backgroundColorTotal"></div>
              </div>
            </div>

            <div class="col-6">
              <div class="">
                <div id="result_item_6" class="border-secondary form-control result_item backgroundColorTotal"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-2 p-1">
        <div class="py-3">
          <div class="row">
            <div class="col-6">
              <div class="">
                <div id="result_item_7" class="border-secondary form-control result_item backgroundColorTotal"></div>
              </div>
            </div>

            <div class="col-6">
              <div class="">
                <div id="result_item_8" class="border-secondary form-control result_item backgroundColorTotal"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-2 p-1">
        <div class="py-3">
          <div class="row">
            <div class="col-12">
              <div class="">
                <div id="result_item_9" class="border-secondary form-control result_item backgroundColorTotal"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script>
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