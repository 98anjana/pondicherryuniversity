<?php
include 'config.php';

$user_id=$_POST['user_id'];
// echo $user_id;

$sql = "SELECT * FROM `std_details`" ;
$sql_run=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($sql_run)){
?>

<table class="text-dark">
    <td>
        <p><?php echo $row['regno']?></p>
        <p><?php echo $row['name']?></p>
    </td>
</table>


<?php } ?>


<!-- seco -->

<?php
$query="SELECT * FROM `marklist`";
$query_run=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($query_run)){
    ?>

<table class="text-dark">
    <td>
        <span><?php echo $row['sem1']?></span>
        <span><?php echo $row['sem2']?></span>
        <span><?php echo $row['sem3']?></span>
        <span><?php echo $row['sem4']?></span>
        <span><?php echo $row['sem5']?></span>
    </td>
</table>

<?php } ?>
