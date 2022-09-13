<?php
include 'config.php';
if (isset($_POST['displaySend'])) {

  $container='<div class="container d-flex">
  <button type="button" class="btn btn-light mt-5 my-3 border border-secondary" data-toggle="modal"
     data-target="#completeModal">
     <i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Add Student
  </button>';

$container.= '</div>';
    echo $container;
  
    $table = '<table class="ml-5 table table-responsive{-sm|-md|-lg|-xl} mytable">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Sl No</th>
        <th  scope="col">Reg No</th>
        <th  scope="col">Name</th>
        <th  scope="col">Course</th>
        <th scope="col">Image</th>
        <th scope="col" >Operations</th>
       
      </tr>
    </thead>';
    $sql = "SELECT * FROM `std_details`";
    $sql_run = mysqli_query($conn, $sql);
    $number = 1;
    while ($row = mysqli_fetch_assoc($sql_run)) {
      $id = $row['std_id'];
        $regno = $row['regno'];
        $name = $row['name'];
        $course = $row['course'];
        $file=$row['file'];
        $table.= '<tr>
        <td scope="row">' . $number . '</td>
        <td class="regno">' . $regno . '</td>
        <td class="name">' . $name . '</td>
        <td class="course">' . $course . '</td>
        <td class="file"><img src="'.$file.'" height="60px" width="60px"></td>
        <td class="text-white text-center w-30">
        <button class="btn btn-primary" onclick="GetDetails(this,'.$id.')"><i class="fa fa-pencil-square-o " aria-hidden="true"></i></button>
        <button class="btn btn-danger" onclick="deleteStudent('.$id.')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
        <button class="btn btn-success " onclick="addMark(this,'.$id.')"><i class="fa fa-plus-square-o " aria-hidden="true"></i></button>
       </td>
       </tr>';
        $number++;
    }
    $table.= '</table>';
    echo $table;
}

// end --

?>

