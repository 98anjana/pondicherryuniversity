<?php 

include '/wamp64/www/php_program/PondicherryUniversity/config.php';
// include '/wamp64/www/php_program/PondicherryUniversity/save.php';

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>pondicherry_university</title>

</head>

<body>
  <!-- Modal -->
  <div class="modal fade mt-5" id="signup-content" tabindex="-1" role="dialog" aria-labelledby="signup-contentLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center bg-danger">
          <h5 class="modal-title w-100" id="signup-contentLabel" style="color:aliceblue; font-size:30px;">STUDENT_PORTAL
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form id="saveStudent">
          <div class="modal-body">

            <div class="statusMesg"></div>


            <div class="form-row">
              <div class="form-group col-md-6 col-6 col-sm-6">
                <label for="inputregno">Reg No</label>
                <input type="text" id="regno" name="regno" class="form-control" placeholder="Enter Reg No">
              </div>
              <div class="form-group col-md-6 col-6 col-sm-6">
                <label for="inputname">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                <label for="inputcourse">Course</label>
                <select id="course" name="course" class="form-control">
                  <option value="Bsc">BSc</option>
                  <option value="BCA">BCA</option>
                </select>
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                <label for="inputpwd1">Password</label>
                <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Enter Password">
              </div>
            </div>

            <div class="form-rowcol-md-6 col-lg-6 col-6 mx-auto ">
              <label for="file">File</label>
              <input type="file" class="form-control" id="file" name="file" />
            </div>

            <div class="text-center w-100 mt-2">
              <p>Already have account ?!<a data-dismiss="modal" data-toggle="modal" class="text-danger"
                  href="#login-content">Login here</a></p>
            </div>

            <div class="text-center">
              <button type="submit" id="button" class="w-40 btn btn-primary mt-3">Signup</button>
            </div>

        </form>
      </div>

    </div>
  </div>
  </div>


  <!-- Optional JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!--  Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>


  <script type="text/javascript">

    $(document).ready(function (e) {
      // Submit form data via Ajax
      $("#saveStudent").on('submit', function (e) {
        e.preventDefault();

        $.ajax({
          type: 'POST',
          url: 'save.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,

          success: function (response) {
            $('.statusMesg').html('');
            if (response.status == 1) {
              // $('#saveStudent')[0].reset();
              $('.statusMesg').html('<p class="alert alert-btn text-center" style="color:green;">' + response.message + '</p>');
            } else {
              $('.statusMesg').html('<p class="alert alert-btn text-center" style="color:red;">' + response.message + '</p>');
              $('#saveStudent')[0].reset();
            }
          }
        });
      });
    });

    $("#file").change(function () {
      var file = this.files[0];
      var fileType = file.type;
      var match = ['image/jpeg', 'image/png', 'image/jpg'];
      if (!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))) {
        alert('Sorry, only JPG, JPEG, & PNG files are allowed.');
        $("#file").val('');
        return false;
      }
    });



  </script>

</body>

</html>