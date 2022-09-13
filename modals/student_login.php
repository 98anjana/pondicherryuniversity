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
  <div class="modal fade mt-5" id="login-content" tabindex="-1" role="dialog" aria-labelledby="login-contentLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center bg-warning">
          <h5 class="modal-title w-100" id="login-contentLabel" style="color:aliceblue; font-size:30px;">STUDENT_PORTAL
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form id="studentLogin">
          <div class="modal-body">

            <div class="statusMessage"></div>

            <!-- <div class="form-row"> -->
            <div class="form-group col-lg-8 col-md-8 mx-auto">
              <label for="inputregno">Reg No</label>
              <input type="text" id="reg_no" name="regno" class="form-control" placeholder="Enter Reg No"
                autocomplete="regno" value="<?php if(isset($_COOKIE['regno'])) echo $_COOKIE['regno'];?>">
            </div>
            <div class="form-group col-lg-8 col-md-8 mx-auto">
              <label for="inputpwd" class="">Password</label>
              <input type="password" id="p_wd" name="pwd" class="form-control" placeholder="Enter Password"
                autocomplete="new-password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'];?>">
            </div>

            <div class="remember" style="margin-left:120px;">
              <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember" checked>
              <label class="form-check-label" for="remember">remember me</label>
            </div><br>

            <div class="text-center w-100">
              <p>Create Account ?!<a data-dismiss="modal" data-toggle="modal" class="text-danger"
                  href="#signup-content">signup here</a></p>
            </div>
            <div class="text-center">
              <button type="submit" id="std_login" class="w-40 btn btn-primary mt-3">Login</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!--  Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>


  <script type="text/javascript">

    // login page geting code -----------------------------------------
    $(document).ready(function (e) {
      // Submit form data via Ajax
      $("#studentLogin").on('submit', function (e) {
        e.preventDefault();

        $.ajax({
          type: 'POST',
          url: 'fetch.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          success: function (response) {
            console.log("hiiii");
            $('.statusMessage').html('');
            if (response.status == 1) {
              $('#studentLogin')[0].reset();
              $('.statusMessage').html('<p class="alert alert-btn text-center" style="color:green;">' + response.message + '</p>');
            } else {
              $('.statusMessage').html('<p class="alert alert-btn text-center" style="color:red;">' + response.message + '</p>');
            }

            console.log("success");
            // $('#SaveAdmin').css("opacity","");
            // $(".submitBtn").removeAttr("disabled");
            // $("#SaveAdmin").trigger('reset');


          }
        });
      });
    });
  </script>

</body>

</html>