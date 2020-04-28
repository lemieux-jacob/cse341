<?php
if (isset($_GET['jquery'])) {
  $jquery = $_GET['jquery'] == 0 ? false : true;
} else {
  $jquery = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Week 2: Team Assignment</title>
  <!-- Bootstrap 4 & Dependancies & JQuery (Full Version) -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Application Styles -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="alert alert-info">
    <div class="container">
      <span id="info"></span>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h2>Week 2: Team Assignment</h2>
          </div>
          <div class="card-body">
            <div id="boxes" class="d-flex flex-row justify-content-center">
              <div id="box-1" class="box m-2 p-2">
                Box #1
              </div>
              <div id="box-2" class="box m-2 p-2">
                Box #2
              </div>
              <div id="box-3" class="box m-2 p-2">
                Box #3
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="col-form-label text-right">
                <label for="selector">Select Box: </label>
              </div>
              <div class="col">
                <select class="form-control" id="selector">
                  <option value="#box-1">Box #1</option>
                  <option value="#box-2">Box #2</option>
                  <option value="#box-3">Box #3</option>
                </select>
              </div>
              <div class="col-form-label text-right">
                <label for="picker">Color Picker: </label>
              </div>
              <div class="col">
                <input class="form-control" id="picker" type="color">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <button id="changeColor" class="btn btn-secondary btn-block">Change Color</button>
              </div>
              <div class="col">
                <?php if ($jquery) echo '<button id="btn2" class="btn btn-secondary btn-block">Fade In/Out</button>'; ?>
              </div>
            </div>
            <hr>
            <button id="btn1" class="btn btn-primary btn-block">Click Me</button>
          </div>
        </div>
      </div>
    </div>
    <?php if ($jquery) {
      echo '<a class="btn btn-primary btn-block" href="./?jquery=0">Turn JQuery Off</a>';
      echo '<script src="app_jq.js"></script>';
    } else {
      echo '<a class="btn btn-primary btn-block" href="./">Turn JQuery On</a>';
      echo '<script src="app_js.js"></script>';
    }
    ?>
  </div>
</body>

</html>