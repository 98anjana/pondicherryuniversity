<?php
   include 'config.php';
   include 'markinsert.php';
   include 'display.php';
 

?>
<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

   <!-- font awesome cdn -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
   <style type="text/css">
      .modal-backdrop {
         background-color: #003366;
      }
   </style>
   <title>pondicherry_university</title>
</head>

<body>
   <?php  include 'admin.php'?>

   <div class="modal fade" id="markModal" tabindex="-1" role="dialog" aria-labelledby="markModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="markModalLabel">Grades</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form id="gradeForm">
               <div class="sts-msg"></div>
                  <div class="form-group mx-auto col-6 col-md-6 col-sm-6">
                  <label for="inputregno">regno</label>
                        <input type="text" id="inputregno" class="form-control" name="regno"> 
                  </div>
                  <div class="form-row">
                     <div class="form-group col-4 col-md-4 col-sm-4">
                        <label for="inputsem1">Sem-1</label>
                        <input type="text" id="inputsem1" class="form-control" name="sem1" placeholder="sem1">
                     </div>
                     <div class="form-group col-4 col-md-4 col-sm-4">
                        <label for="inputsem2">Sem-2</label>
                        <input type="text" id="inputsem2" name="sem2" class="form-control" placeholder="sem2">
                     </div>
                     <div class="form-group col-4 col-md-4 col-sm-4">
                        <label for="inputsem3">Sem-3</label>
                        <input type="text" id="inputsem3" name="sem3" class="form-control" placeholder="sem3">
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-4 col-md-4 col-sm-4">
                        <label for="inputsem4">Sem-4</label>
                        <input type="text" id="inputsem4" class="form-control" name="sem4" placeholder="sem4">
                     </div>
                     <div class="form-group col-4 col-md-4 col-sm-4">
                        <label for="inputsem5">Sem-5</label>
                        <input type="text" id="inputsem5" name="sem5" class="form-control" placeholder="sem5">
                     </div>
                     <div class="form-group col-4 col-md-4 col-sm-4">
                        <label for="inputsem6">Sem-6</label>
                        <input type="text" id="inputsem6" name="sem6" class="form-control" placeholder="sem6">
                     </div>
                  </div>
                  <div class="text-center w-100">
                     <input type="submit" class="btn btn-success mb-3" onclick="addGrade()" name="submit" value="Add Mark" />
                     <!-- hidden inputfield -->
                     <input type="hidden" id="hiddendata">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>



   <!-- Student Details Adding completeModal -->
   <div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="completeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="completeModalLabel">Add Student</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>

            <div class="modal-body">

               <form id="addStudent">
                  <div class="statusMsg"></div>

                  <div class="form-row">
                     <div class="form-group col-md-6 col-6 col-sm-6">
                        <label for="completeregno" class="font-weight-bold">Reg No</label>
                        <input type="text" id="completeregno" class="form-control" name="regno"
                           placeholder="Enter Reg No">
                     </div>
                     <div class="form-group col-md-6 col-6 col-sm-6">
                        <label for="completename" class="font-weight-bold">Name</label>
                        <input type="text" id="completename" name="name" class="form-control" placeholder="Enter Name"
                           autocomplete="username">
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label for="completecourse">Course</label>
                        <select id="completecourse" name="course" class="form-control">
                           <option value="Bsc">BSc</option>
                           <option value="BCA">BCA</option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 mx-auto">
                        <label for="completepwd" class="font-weight-bold">Password</label>
                        <input type="password" id="completepwd" class="form-control" name="pwd"
                           placeholder="Enter Password" autocomplete="current-password">
                     </div>
                  </div>

                  <div class="form-group col-md-6 col-6 col-sm-6">
                     <label for="completefile">File</label>
                     <input type="file" class="form-control" id="completefile" name="file" />
                  </div>

                  <div class="text-center w-100">
                     <button type="submit" id="std_add" class="w-40 btn btn-primary mt-3">Add+</button>

                  </div>
               </form>
            </div>



         </div>
      </div>
   </div>




   <!-- Students Data Update Modal -->
   <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-dark" id="updateModalLabel">Edit Student Details</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>

            <div class="modal-body">
               <form id="updateStudent">

                  <div class="st-msg"></div>

                  <div class="form-row">
                     <div class="form-group col-md-6 col-6 col-sm-6">
                        <label for="updateregno" class="font-weight-bold">Reg No</label>
                        <input type="text" id="updateregno" class="form-control" name="regno"
                           placeholder="Enter Reg No">
                     </div>
                     <div class="form-group col-md-6 col-6 col-sm-6">
                        <label for="updatename" class="font-weight-bold">Name</label>
                        <input type="text" id="updatename" name="name" class="form-control" placeholder="Enter Name">
                     </div>
                  </div>


                  <div class="form-row">
                     <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label for="inputcourse" class="font-weight-bold">Course</label>
                        <select id="updatecourse" name="course" class="form-control">
                           <option value="Bsc">BSc</option>
                           <option value="BCA">BCA</option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label for="file" class="font-weight-bold ">File</label>
                        <!-- <input type="text" name="file_old" value="<?php echo $row['file']; ?>"> -->
                        <img id="previewImg" src="" style="height:50px; width:50px;" />
                        <input type="file" name="file" class="form-control" id="updatefile" />
                     </div>
                  </div>
                  <div class="text-center">
                     <button type="submit" id="updateBtn" class="w-40 btn btn-primary mt-3">Update</button>
                     <!-- hidden inputfield -->
                     <input type="hidden" id="hidden" name="hidden">
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
      $(document).ready(function () {
         displayData();
      });

      // -----------------------------------------------------------------------------------

      // display Function ---
      function displayData() {
         var displayData = "true";

         $.ajax({
            url: "display.php",
            type: "POST",
            data: {
               displaySend: displayData
            },

            success: function (data, status) {
               $('#displayDataTable').html(data)
            }

         });
      }

      // ------------------------------------------------------------------------------------

      // add Student
      $(document).ready(function (e) {
         // Submit form data via Ajax
         $("#addStudent").on('submit', function (e) {
            e.preventDefault();
            console.log("Hiiiiii");

            $.ajax({
               type: 'POST',
               url: 'insert.php',
               data: new FormData(this),
               dataType: 'json',
               contentType: false,
               cache: false,
               processData: false,
               success: function (response) {
                  $('.statusMsg').html('');
                  if (response.status == 1) {
                     $('#addStudent')[0].reset();
                     $('.statusMsg').html('<p class="alert alert-btn text-center" style="color:green;">' + response.message + '</p>');
                  } else {
                     $('.statusMsg').html('<p class="alert alert-btn text-center" style="color:red;">' + response.message + '</p>');
                  }
                  displayData();

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


      //  -----------------------------------------------------------------------------------------

      // Delete record Function 

      function deleteStudent(deleteid) {

         $.ajax({

            url: "delete.php",
            type: "POST",
            data: {
               deleteSend: deleteid
            },
            success: function (data, status) {


               displayData();
            }
         });
      }

      // -------------------------------------------------------------------------------------------

      // data retrieve using jquery parent-row and child-row relation---

      function GetDetails(element, updateid) {
         $('#hidden').val(updateid);
         $.ajax({
            url: "update.php",
            type: "POST",
            data: {
               updateid: updateid,
            },
            success: function (data) {
               // console.log("HUM hum hm hum hum");
               $("#updateModal").modal('show');
               displayData();
            }

         })

         var currentRow = $(element).closest("tr");
         var col1 = currentRow.find('td.regno').html();
         $('#updateregno').val(col1);

         $("#updateregno").prop('disabled', true);
         var col2 = currentRow.find('td.name').html();
         $('#updatename').val(col2);
         var col3 = currentRow.find('td.course').html();
         $('#updatecourse').val(col3);

         var col4 = currentRow.find('td.file img').attr('src');
         // alert(col4);
         $("#previewImg").attr('src', col4).show();

      }


      //   update function 
      $(document).ready(function (e) {
         // Submit form data via Ajax
         $("#updateStudent").on('submit', function (e) {
            e.preventDefault();

            $.ajax({
               type: 'POST',
               url: 'update.php',
               data: new FormData(this),
               dataType: 'json',
               contentType: false,
               cache: false,
               processData: false,
               success: function (response) {
                  $('.st-msg').html('');
                  if (response.status == 1) {
                     
                     $('#updateStudent')[0].reset();
                     $('.st-msg').html('<p class="alert alert-btn text-center" style="color:green;">' + response.message + '</p>');
                  } else {
                     $('.st-msg').html('<p class="alert alert-btn text-center" style="color:red;">' + response.message + '</p>');
                  }

                  $("#updateModal").modal('hide');
                  displayData();
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

      // -------------------------------------------------------------------------------------------

      // mark adding 
      function addMark(element,addid) {
         $('#hiddendata').val(addid);
         $.ajax({
            url: "markinsert.php",
            type: "POST",
            data: {
               addid: addid,
            },
            success: function (data) {
               console.log("Hello Everyone");
            }
         })

         var currentRow = $(element).closest("tr");
         var col1 = currentRow.find('td.regno').html();
         $('#inputregno').val(col1);
         $('#inputregno').prop('disabled', true);

         $('#markModal').modal('show');


      }

      //  addmark function    - - - - 


      function addGrade() {

         var regno = $('#inputregno').val();
         var sem1 = $('#inputsem1').val();
         var sem2 = $('#inputsem2').val();
         var sem3 = $('#inputsem3').val();
         var sem4 = $('#inputsem4').val();
         var sem5 = $('#inputsem5').val();
         var sem6 = $('#inputsem6').val();
         var hiddendata = $('#hiddendata').val();


         $.ajax({
            url: "markinsert.php",
            type: "POST",
            data: {
               regno:regno,
               sem1: sem1,
               sem2: sem2,
               sem3: sem3,
               sem4: sem4,
               sem5: sem5,
               sem6: sem6,
               hiddendata: hiddendata,
            },
            success: function (response) {

               $('.sts-msg').html('');
                  if (response.status == 1) {
                     
                     $('#updateStudent')[0].reset();
                     $('.sts-msg').html('<p class="alert alert-btn text-center" style="color:green;">' + response.message + '</p>');
                  } else {
                     $('.sts-msg').html('<p class="alert alert-btn text-center" style="color:red;">' + response.message + '</p>');
                  }

               $('#markModal').modal('show');
            }
         })


      }

      
   </script>
</body>

</html>