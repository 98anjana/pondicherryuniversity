<?php
include 'config.php';
if (isset($_POST['displaySend'])) {
    $table = '<table class="table mytable w-60 mx-auto mt-5">
    <thead class="thead-secondary">
      <tr>
        <th scope="col">Sl No</th>
        <th  scope="col">Reg No</th>
        <th scope="col">Name</th>
        <th  scope="col">Sem-1</th>
        <th  scope="col">Sem-2</th>
        <th  scope="col">Sem-3</th>
        <th  scope="col">Sem-4</th>
        <th  scope="col">Sem-5</th>
        <th  scope="col">Sem-6</th>
        <th scope="col">bin</th>
      </tr>
    </thead>';
    $sql = "SELECT std_details.std_id,std_details.regno,std_details.name, marklist.sem1, marklist.sem2,marklist.sem3, marklist.sem4,marklist.sem5,marklist.sem6 
    FROM std_details INNER JOIN marklist ON std_details.std_id = marklist.std_id;";
    $sql_run = mysqli_query($conn, $sql);
    $number = 1;
    while ($row = mysqli_fetch_assoc($sql_run)) {
        $id = $row['std_id'];
        $regno = $row['regno'];
        $name=$row['name'];
        $sem1=$row['sem1'];
        $sem2=$row['sem2'];
        $sem3=$row['sem3'];
        $sem4=$row['sem4'];
        $sem5=$row['sem5'];
        $sem6=$row['sem6'];
        $table.= '<tr>
        <td class="std_id">' . $number . '</td>
        <td class="regno">' .$regno . '</td>
        <td class="name">'.$name.'</td>
        <td class="sem1">'.$sem1.'</td>
        <td class="sem2">'.$sem2.'</td>
        <td class="sem3">'.$sem3.'</td>
        <td class="sem4">'.$sem4.'</td>
        <td class="sem5">'.$sem5.'</td>
        <td class="sem6">'.$sem6.'</td>
       <td><button  class="btn btn-danger text-white" onclick="deleteStudent('.$id.')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>

       </tr>';
        $number++;
    }
    $table.= '</table>';
    echo $table;
}
// end --

?>
