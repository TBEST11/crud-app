<?php

use function PHPSTORM_META\type;

require_once ('./db.php');
$db= new Database();
if(isset($_POST['action']) && $_POST['action']=="view"){
    $output="";
    $data = $db->read();
    if($db->totalRowCount($sl=null)>0){ 
        $output .=' <table class=" table table-striped table-sm table-bordered">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';
         foreach($data as $row){
            $output.=' <tr class="text-center text-secondary">
            <td>'.$row['id'].'</td>
            <td>'.$row['first_name'].'</td>
            <td>'.$row['last_name'].'</td>
            <td> '.$row['email'].'</td>
            <td>'.$row['phone'].'</td>
                <td>
                    <a href="#" title="View Details" class="text-success infobtn" id="view-'.$row['id'].' "data-toggle="modal" data-target="#viewModal" data-user-id="'.$row['id'].'"> <i class="fas fa-info-circle fa-lg">&nbsp;&nbsp;</i></a>
                    <a href="#" title="Edit" class="text-primary editbtn" data-toggle="modal"  id="edit-'.$row['id'].' " data-user-id="'.$row['id'].'"> <i class="fas fa-edit fa-lg">&nbsp;&nbsp;</i></a>
                    <a href="#" title="Delete" class="text-danger delbtn" id="delete-'.$row['id'].' " data-user-id="'.$row['id'].'"> <i class="fas fa-trash alt fa-lg">&nbsp;&nbsp;</i></a>
                  </td> </tr>';
            
        }
        
        $output .='</tbody>
        </table>';
        echo $output;
    }
    else{

    echo '<h3 class= "text-center text-secondary mt-5">:(No  any User present in the database!)</h3>';
    }
}
 if(isset($_POST['action']) && $_POST['action'] =="insert"){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $db->insert($fname, $lname, $email, $phone);
 }
 if(isset($_POST['edit_id'])){
    $id=$_POST['edit_id'];
    $row = $id->getUserById($id);
    echo json_encode($row);
 }
 if(isset($_POST['action']) && $_POST['action'] =="update"){
    $fname=$_POST['id'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $db->update($id,$fname, $lname, $email, $phone);
 }
 if(isset($_POST['del_id'])){
    $id=$_POST['del_id'];
    $id->delete($id);
 }

 if(isset($_POST['info_id'])){
    $id=$_POST['info_id'];
    $row = $id->getUserById($id);
    echo json_encode($row);

 }
 if(isset($_GET['export']) && $_GET['export'] =="excel"){
    header("Content-Type :application/xls"); 
    header("Content-Disposition: attachment; filename=user.xls");
    header("pragma: no-cache");
    header("expires: 0");
    $data = $id->read();
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th></tr>';
    foreach ($data as $row){
        echo '<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['fisrt_name'].'</td>
        <td>'.$row['last_name'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['phone'].'</td>
        </tr>';
    }
    echo '</table>';
 }
?>