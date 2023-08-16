<?php
//Get All languge Option
function getAlllanguges()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "languages ORDER BY id  DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;
   
}

//Get particular languge Using id
function getSwLanguage($arg)
{
    global $conn;
    
    $sql = "SELECT * FROM  " . TBL . "languages WHERE id ='" . $arg . "'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

?>