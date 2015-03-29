
<?php
session_start();
include '/include/config.php';
$id = $_SESSION['id'];
//Insert or  contact information
if(isset($_POST['action_type']))
{
    if ($_POST['action_type'] == 'add' or $_POST['action_type'] == 'edit')
    {
        $id = mysqli_real_escape_string($link, strip_tags($_POST['id']));
        $name = mysqli_real_escape_string($link, strip_tags($_POST['name']));
        $username = mysqli_real_escape_string($link, strip_tags($_POST['username']));
        $email = mysqli_real_escape_string($link, strip_tags($_POST['email']));
        $password = mysqli_real_escape_string($link, strip_tags($_POST['password']));


                 
        if ($_POST['action_type'] == 'add')
        {
			$pass=md5($password);
            $sql = "insert into users set
                    name = '$name',
                    username = '$username',
                    email = '$email',
                    password = '$pass'";
        }else{
            $sql = "update users set
                    name = '$name',
                    username = '$username',
                    email = '$email',
                    password = '$password',
                    where id = '$id'";
        }
         
         
        if (!mysqli_query($link, $sql))
        {
            echo 'Error Saving Data. ' . mysqli_error($link);
            exit();
        }
    }
}
//Start of edit contact read
$gresult = ''; //declare global variable
if(isset($_POST["action"]) and $_POST["action"]=="edit"){
    $id = (isset($_POST["ci"])? $_POST["ci"] : '');
    $sql = "select id, name, username,
            email, password
            from users
            where id = '$id'";
 
    $result = mysqli_query($link, $sql);
 
    if(!$result)
    {
        echo mysqli_error($link);
        exit();
    }
     
    $gresult = mysqli_fetch_array($result);
     
    include 'addusers.php';
    exit();
}
//end of edit contact read
 
//Start Delete Contact
if(isset($_POST["action"]) and $_POST["action"]=="delete"){
    $id = (isset($_POST["ci"])? $_POST["ci"] : '');
    $sql = "delete from users
            where id = '$id'";
 
    $result = mysqli_query($link, $sql);
 
    if(!$result)
    {
        echo mysqli_error($link);
        exit();
    }
     
}
//End Delete Contact

//Read contact information from database
$sql = "select id, name , username , email, password from users";
 
$result = mysqli_query($link, $sql);
 
if(!$result)
{
    echo mysqli_error($link);
    exit();
}
$users_list = array();
while($rows = mysqli_fetch_array($result))
{
    $users_list[] = array('id' => $rows['id'], 
                            'name' => $rows['name'],
                            'username' => $rows['username'],
                            'email' => $rows['email'],
                            'password' => $rows['password']);
}
include 'userslist.php';
exit();
?>



