<?php 
include '/wamp64/www/php_program/PondicherryUniversity/config.php';
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


  <title>pondicherr_university</title>
</head>

<body>
  <!-- Modal -->
  <div class="modal fade mt-5" id="signup2-content" tabindex="-1" role="dialog" aria-labelledby="signup2-contentLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center bg-dark">
          <h5 class="modal-title w-100" id="signup2-contentLabel" style="color:aliceblue; font-size:30px;">ADMIN_SIGNUP
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form id="SaveAdmin">
          <div class="modal-body">

            <div class="statusMsg"></div>



            <div class="form-group mx-auto col-md-8 col-8 col-sm-8">
              <label class="d-flex justify-content-center" for="inputnamee">User Name</label>
              <input type="text" id="tname" name="tname" class="form-control" placeholder="Enter Name">
            </div>

            <div class="form-row">
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                <label class="d-flex justify-content-center" for="inputemail2">Email</label>
                <input type="text" id="temail" name="temail" class="form-control" placeholder="Enter Email">
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                <label class="d-flex justify-content-center" for="inputpwd2">Password</label>
                <input type="password" id="tpwd" name="tpwd" class="form-control" placeholder="Enter Password">
              </div>
            </div>

            <div class="form-group col-md-8 mx-auto">
              <label for="file">File</label>
              <input type="file" class="form-control" id="file" name="file" />
            </div>
            <div class="text-center w-100 mt-2">
              <p>Already have account ?!<a data-dismiss="modal" data-toggle="modal" class="text-danger"
                  href="#login2-content">Login here</a></p>
            </div>

            <div class="text-center">
              <button type="submit" name="submit" class="btn btn-primary submitBtn" value="SUBMIT">Signup</button>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>


  <script>

    $(document).ready(function (e) {
      // Submit form data via Ajax
      $("#SaveAdmin").on('submit', function (e) {
        e.preventDefault();

        $.ajax({
          type: 'POST',
          url: 'save2.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
      
          success: function (response) {
            $('.statusMsg').html('');
            if (response.status == 1) {
              $('.statusMsg').html('<p class="alert alert-btn text-center" style="color:green;">' + response.message + '</p>');
              $('#SaveAdmin')[0].reset();
            } else {
              $('.statusMsg').html('<p class="alert alert-btn text-center" style="color:red;">' + response.message + '</p>');
              $('#SaveAdmin')[0].reset();
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