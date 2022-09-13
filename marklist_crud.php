<?php
include 'config.php';
include 'marklist_display.php';


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <title>pondicherry_university</title>
  </head>
  <body>
   
 <div class="container">
 <button class="btn btn-warning my-3 border mt-5" onclick="students()">Student Details</button>

<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<!--  -->
  <div id="displayMark"></div>
  </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--  Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>


    <script type="text/javascript">
    
      $(document).ready(function(){
        displayData();
      });


      function displayData(){
        var displayData="true";

        $.ajax({
           url:"marklist_display.php",
             type:"POST",
             data:{
               displaySend:displayData
             },
         
             success:function(data,status){
               $('#displayMark').html(data)
             }
         
          });
          }

        function students(){
          window.location.href="u_details.php";
        }

        // All details popup

        function show(element){
        var currentRow = $(element).closest("tr");
        var user_id= currentRow.find('td.std_id').html();
       
        $.ajax({
          url:"info.php",
          type:"POST",
          data:{
            user_id:user_id,
            
          },
          success:function(response){
 
            $('.modal-body').html(response);
            $('#infoModal').modal('show');
          }
         

        });
      
        }

        

        // delete function ------

        function deleteStudent(deleteid){

          $.ajax({
            url:"delete2.php",
            type:"POST",
            data:{
              deleteSend:deleteid,
            },
            success:function(data){
              displayData()
            }
          })

        }

   
    </script>

  </body>
</html>