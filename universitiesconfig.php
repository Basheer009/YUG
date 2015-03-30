
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
        $address = mysqli_real_escape_string($link, strip_tags($_POST['address']));
        $contact = mysqli_real_escape_string($link, strip_tags($_POST['contact']));
        $desc = mysqli_real_escape_string($link, strip_tags($_POST['de']));
		$href = mysqli_real_escape_string($link, strip_tags($_POST['href']));


                 
        if ($_POST['action_type'] == 'add')
        {
            $sql = "insert into universities set
                    name = '$name',
                    address = '$address',
                    contact = '$contact',
                    de = '$desc',
					href = '$href'";
        }else{
            $sql = "update universities set
                    name = '$name',
                    address = '$address',
                    contact = '$contact',
                    de = '$desc',
					href = '$href'
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
    $sql = "select id, name, address,
            contact, de, href
            from universities
            where id = '$id'";
 
    $result = mysqli_query($link, $sql);
 
    if(!$result)
    {
        echo mysqli_error($link);
        exit();
    }
     
    $gresult = mysqli_fetch_array($result);
     
    include 'adduniversities.php';
    exit();
}
//end of edit contact read
 
//Start Delete Contact
if(isset($_POST["action"]) and $_POST["action"]=="delete"){
    $id = (isset($_POST["ci"])? $_POST["ci"] : '');
    $sql = "delete from universities
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
$sql = "select id, name , address , contact, de, href from universities";
 
$result = mysqli_query($link, $sql);
 
if(!$result)
{
    echo mysqli_error($link);
    exit();
}
$universities_list = array();
while($rows = mysqli_fetch_array($result))
{
    $universities_list[] = array('id' => $rows['id'], 
                            'name' => $rows['name'],
                            'address' => $rows['address'],
                            'contact' => $rows['contact'],
                            'de' => $rows['de'],
							'href' => $rows['href']);
}
include 'universitieslist.php';
exit();
?>



