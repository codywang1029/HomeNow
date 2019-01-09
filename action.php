<!DOCTYPE html>
<html>
<body>

 <style>
  a:link, a:visited {
    color: white;
    font-size: 20px;
    text-align: right;
    font-family: "Arial", Sans-serif;
    margin-top:20px;
    text-decoration: none;
    width: 50%;
  }

  div.bot {
    width: 100%;
    text-align: center;
   
}
div.top {
    position: absolute;
    top: 0px;
    right: 0px;
    width: 100%;
    text-align: left;
    padding-bottom:  5px;
    padding-top: 5px;
    font-size=12px;
    font-family: "Arial", Sans-serif;
    
    color: white;
    background-color:Turquoise ;
}
  div.mid {
    margin:auto;
    width: 100%;
    right: 0px;
    text-align: left;
    padding: 5px;
    color: Black;
    font-size: 18px;
    font-family: "Arial", Sans-serif;
  }
  input[type=search] {
    width: 40%;
    padding: 10px 20px;
    margin: 8px 10px;
    box-sizing: border-box;
    border: 2px solid Cyan;
    border-radius: 4px;
  }
  input[type=text] {
    width: 10%;
    padding: 10px 20px;
    margin: 8px 10px;
    box-sizing: border-box;
    border: 2px solid Cyan;
    border-radius: 4px;
  }
hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;
}
  input[type=reset]{
    background-color: MediumTurquoise ;
    color: white;
    padding: 6px 8px;
    text-align: center;
    font-size: 15px;
    width:30%;
    font-family: "Arial", Sans-serif;
  }
  input[type=submit]{
    background-color: MediumTurquoise ;
    color: white;
    padding: 6px 8px;
    text-align: center;
    font-size: 15px;
    width:30%;
    font-family: "Arial", Sans-serif;
  }
  
  input[type=submit]:hover{
      background-color:DarkTurquoise;
  }
  input[type=reset]:hover{
      background-color:DarkTurquoise;
  }
  select {
      box-sizing: border-box;
      display: inline-block;
      width: 12%;
      padding: 5px 10px;
      margin: 8px 10px;
      font-size: 13px;
      box-sizing: border-box;
      border: 2px solid Cyan;
      border-radius: 4px;
      font-family: "Arial", Sans-serif;
  }
  .button {
    background-color: MediumTurquoise ;
    color: white;
    padding: 6px 8px;
    text-align: center;
    width:50%;
    font-size: 15px;
    font-family: "Arial", Sans-serif;
  }
  
  .button:hover {
    background-color: DarkTurquoise;
  }
   p {
     text-align: center;
     color: WhiteSmoke;
     font-size: 80px;
     margin: auto;
     font-family: "Arial", Sans-serif;
   }
   input {
     width: 10%

     padding: 12px 20px;
     margin: 8px 0;
   }
  html { 
  background: url(background_opacity.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
   </style>
   
 
<?php
    echo "<div class=top>Database Condition: Connecting to database...</div>";
    $dbhost = "localhost:3306";
    $dbuser = "homenowproject_sxu46";
    $dbpass = "Jerry1997!";
    $dbname = "homenowproject_lol";
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    if($conn -> connect_error) {
      die("Could not connect: " . mysql_error());
    }
    echo "<div class=top>Connected successfully! <br></div>";
    echo "<br>";
    
    //echo $_POST["user_name"].$_POST["user_pw"].$_POST["user_loc"].$_POST["user_university"];
    

    if($_POST["action"] == "insert") {
        //User(username, password, current_location, university)
        if($_POST["table"] == "user") {
            $user_name = $_POST["user_name"];
            $user_pw = $_POST["user_pw"];
            $user_loc = $_POST["user_loc"];
            $user_university = $_POST["user_university"];
            if($user_name == "" || $user_pw == "" || $user_loc == "" || $user_university == "") {
                //echo "Empty input! Please try again!";
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Empty input! Please try again!');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            }
            
            $sql = "INSERT INTO `user`(`user_name`, `user_pw`, `user_loc`, `user_university`) VALUES('$user_name', '$user_pw', '$user_loc', '$user_university')";
            
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not insert data: ' . mysql_error());
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Insertion Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
        //Apartment(name, rating, gallery, contact_information)
        else if($_POST["table"] == "apt") {
            $apt_name = $_POST["apt_name"];
            $apt_rating = $_POST["apt_rating"];
            $apt_contact = $_POST["apt_contact"];
            if($apt_name == "" || $apt_rating == "" || $apt_contact == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Empty input! Please try again!');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            }
            $sql = "INSERT INTO `apt`(`apt_name`, `apt_rating`, `apt_contact`) VALUES('$apt_name', '$apt_rating', '$apt_contact')";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not insert data: ' . mysql_error());
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Insertion Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();    
        }
        //Address(map_pin, apartment_name, neighborhood_crime_rate, nearby_bus_station, distance_to_school)
        else if($_POST["table"] == "addr") {
            $addr_pin = $_POST["addr_pin"];
            $addr_name = $_POST["addr_name"];
            $addr_crime = $_POST["addr_crime"];
            $addr_bus = $_POST["addr_bus"];
            $addr_dist = $_POST["addr_dist"];
            if($addr_pin == "" || $addr_name == "" || $addr_crime == "" || $addr_bus == "" || $addr_dist == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Empty input! Please try again!');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            }
            
            $sql = "INSERT INTO `addr`(`addr_pin`, `addr_name`, `addr_crime`, `addr_bus`, `addr_dist`) VALUES('$addr_pin', '$addr_name', '$addr_crime', '$addr_bus', '$addr_dist')";
            
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not update data: ' . mysql_error());    
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Insertion Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
        //Company(name, rating) 
        else if($_POST["table"] == "company") {
            $company_name = $_POST["company_name"];
            $company_rating = $_POST["company_rating"];
            if($company_name == "" || $company_rating == "") {
               echo ("<script LANGUAGE='JavaScript'>
                window.alert('Empty input! Please try again!');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            }
            
            $sql = "INSERT INTO `company`(`company_name`, `company_rating`) VALUES('$company_name', '$company_rating')";
            
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not update data: ' . mysql_error());    
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Insertion Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
        //Room(apartment_name, number_of_bathrooms, amenities, number_of_bedrooms, rent)
        else if($_POST["table"] == "cond") {
            //if($_POST["table"] == "room")
            $cond_name = $_POST["cond_name"];
            $cond_bed = $_POST["cond_bed"];
            $cond_bath = $_POST["cond_bath"];
            $cond_amen = $_POST["cond_amen"];
            $cond_rent = $_POST["cond_rent"];
            if($cond_name == "" || $cond_bed == "" || $cond_bath == "" || $cond_amen == "" || $cond_rent == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Empty input! Please try again!');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            }
            
            $sql = "INSERT INTO `cond`(`cond_name`, `cond_bed`, `cond_bath`, `cond_amen`, `cond_rent`) VALUES('$cond_name', '$cond_bed', '$cond_bath', '$cond_amen', '$cond_rent')";
            
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not update data: ' . mysql_error());    
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Insertion Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
        else if($_POST["table"] == "located") {
            $loc_pin = $_POST["loc_pin"];
            $loc_apt = $_POST["loc_apt"];
            if($loc_pin == "" || $loc_apt == "") {
                echo "Empty input! Please try again!";
            }
            $sql = "INSERT INTO `loc`(`loc_pin`, `loc_apt`) VALUES('$loc_pin', '$loc_apt')";
            $db = mysql_select_db('sxu46_test', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not insert data: ' . mysql_error());
            }
            echo "Successfully inserted!";
            $conn->close();
        }
        else {
            //if($_POST["table"] == "belongs_to")
            $belong_apt = $_POST["belong_apt"];
            $belong_company = $_POST["belong_company"];
            if($belong_apt == "" || $belong_company == "") {
                echo "Empty input! Please try again!";
            }
            $sql = "INSERT INTO `belong`(`belong_apt`, `belong_company`) VALUES('$belong_apt', '$belong_company')";
            $db = mysql_select_db('sxu46_test', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not insert data: ' . mysql_error());
            }
            echo "Successfully inserted!";
            $conn->close();
        }
    }
    else if($_POST["action"] == "update") {
        if($_POST["table"] == "user") {
            $user_name = $_POST["user_name"];
            $user_pw = $_POST["user_pw"];
            $user_loc = $_POST["user_loc"];
            $user_university = $_POST["user_university"];
            $user_w = $_POST["user_where"];
            if ($user_name != "") {
                $user_name = "user_name = '$user_name',";
            }
            if ($user_pw != "") {
                $user_pw = "user_pw = '$user_pw',";
            }
            if ($user_loc != "") {
                $user_loc = "user_loc = '$user_loc',";
            }
            if ($user_university != "") {
                $user_university = "user_university = '$user_university',";
            }
            if ($user_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
             
                //die ("Failed: condition cannot be empty");
            }
            $temp = $user_name. " " .$user_pw. " " .$user_loc. " " .$user_university;
            $temp = rtrim($temp, ", ");
            $sql = "UPDATE `user` " . "SET $temp " . "WHERE $user_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die("Could not update data: " . mysql_error());
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Update Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
        else if($_POST["table"] == "apt") {
            $apt_name = $_POST["apt_name"];
            $apt_rating = $_POST["apt_rating"];
            $apt_contact = $_POST["apt_contact"];
            $apt_w = $_POST["apt_where"];
            if ($apt_name != "") {
                $apt_name = "apt_name = '$apt_name',";
            }
            if ($apt_rating != "") {
                $apt_rating = "apt_rating = '$apt_rating',";
            }
            if ($apt_contact != "") {
                $apt_contact = "apt_contact = '$apt_contact',";
            }
            if ($apt_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $temp = $apt_name. " " .$apt_rating. " " .$apt_contact;
            $temp = rtrim($temp, ", ");
            $sql = "UPDATE `apt` " . "SET $temp " . "WHERE $apt_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die("Could not update data: " . mysql_error());
            }
           echo ("<script LANGUAGE='JavaScript'>
                window.alert('Update Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
        else if($_POST["table"] == "addr") {
            $addr_pin = $_POST["addr_pin"];
            $addr_name = $_POST["addr_name"];
            $addr_crime = $_POST["addr_crime"];
            $addr_bus = $_POST["addr_bus"];
            $addr_dist = $_POST["addr_dist"];
            $addr_w = $_POST["addr_where"];
            if ($addr_pin != "") {
                $addr_pin = "addr_pin = '$addr_pin',";
            }
            if ($addr_name != "") {
                $addr_name = "addr_name = '$addr_name',";
            }
            if ($addr_crime != "") {
                $addr_crime = "addr_crime = '$addr_crime',";
            }
            if ($addr_bus != "") {
                $addr_bus = "addr_bus = '$addr_bus',";
            }
            if ($addr_dist != "") {
                $addr_dist = "addr_dist = '$addr_dist',";
            }
            if ($addr_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $temp = $addr_pin. " " .$addr_name. " " .$addr_crime. " " .$addr_bus. " " .$addr_dist;
            $temp = rtrim($temp, ", ");
            $sql = "UPDATE `addr` " . "SET $temp " . "WHERE $addr_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die("Could not update data: " . mysql_error());
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Update Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
        else if($_POST["table"] == "company") {
            $company_name = $_POST["company_name"];
            $company_rating = $_POST["company_rating"];
            $company_w = $_POST["company_where"];
            if ($company_name != "") {
                $company_name = "company_name = '$company_name',";
            }
            if ($company_rating != "") {
                $company_rating = "company_rating = '$company_rating',";
            }
            if ($company_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $temp = $company_name. " " .$company_rating;
            $temp = rtrim($temp, ", ");
            $sql = "UPDATE `company` " . "SET $temp " . "WHERE $company_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die("Could not update data: " . mysql_error());
            }
            
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Update Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
             
            $conn->close();
        }
        else if($_POST["table"] == "cond") {
            //if($_POST["table"] == "room")
            $cond_name = $_POST["cond_name"];
            $cond_bed = $_POST["cond_bed"];
            $cond_bath = $_POST["cond_bath"];
            $cond_amen = $_POST["cond_amen"];
            $cond_rent = $_POST["cond_rent"];
            $cond_w = $_POST["cond_where"];
            if ($cond_name != "") {
            $cond_name = "cond_name = '$cond_name',";
            }
            if ($cond_bed != "") {
            $cond_bed = "cond_bed = '$cond_bed',";
            }
            if ($cond_bath != "") {
            $cond_bath = "cond_bath = '$cond_bath',";
            }
            if ($cond_amen != "") {
            $cond_amen = "cond_amen = '$cond_amen',";
            }
            if ($cond_rent != "") {
            $cond_rent = "cond_rent = '$cond_rent',";
            }
            if ($cond_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $temp = $cond_name. " " .$cond_bed. " " .$cond_bath. " " .$cond_amen. " " .$cond_rent;
            $temp = rtrim($temp, ", ");
            $sql = "UPDATE `cond` " . "SET $temp " . "WHERE $cond_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die("Could not update data: " . mysql_error());
            }
           echo ("<script LANGUAGE='JavaScript'>
                window.alert('Update Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
        else if($_POST["table"] == "located") {
            $loc_pin = $_POST["loc_pin"];
            $loc_apt = $_POST["loc_apt"];
            $loc_w = $_POST["loc_where"];
            if ($loc_pin != "") {
            $loc_pin = "loc_pin = '$loc_pin',";
            }
            if ($loc_apt != "") {
            $loc_apt = "loc_apt = '$loc_apt',";
            }
            if ($loc_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $temp = $loc_pin. " " .$loc_apt;
            $temp = rtrim($temp, ", ");
            $sql = "UPDATE `loc` " . "SET $temp " . "WHERE $loc_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die("Could not update data: " . mysql_error());
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Update Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();    
        }
        else {
           //if($_POST["table"] == "belongs_to")
           $belong_apt = $_POST["belong_apt"];
            $belong_company = $_POST["belong_company"];
            $belong_w = $_POST["belong_where"];
            if ($belong_apt != "") {
            $belong_apt = "belong_apt = '$belong_apt',";
            }
            if ($belong_company != "") {
            $belong_company = "belong_company = '$belong_company',";
            }
            if ($belong_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $temp = $belong_apt. " " .$belong_company;
            $temp = rtrim($temp, ", ");
            $sql = "UPDATE `belong` " . "SET $temp " . "WHERE $belong_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die("Could not update data: " . mysql_error());
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Update Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
    }
    else if($_POST["action"] == "delete") {
        if($_POST["table"] == "user") {
            $user_w= $_POST["user_where"];
            if ($user_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $sql = "DELETE FROM `user` " . "WHERE $user_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not delete data: ' . mysql_error());
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Deletion Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
        else if($_POST["table"] == "apt") {
            $apt_w= $_POST["apt_where"];
            if ($apt_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $sql = "DELETE FROM `apt` " . "WHERE $apt_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not delete data: ' . mysql_error());
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Deletion Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
        else if($_POST["table"] == "addr") {
            $addr_w= $_POST["addr_where"];
            if ($addr_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $sql = "DELETE FROM `addr` " . "WHERE $addr_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not delete data: ' . mysql_error());
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Deletion Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();    
        }
        else if($_POST["table"] == "company") {
            $company_w= $_POST["company_where"];
            if ($company_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $sql = "DELETE FROM `company` " . "WHERE $company_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not delete data: ' . mysql_error());
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Deletion Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
        else if($_POST["table"] == "cond") {
            //if($_POST["table"] == "room")
            if ($cond_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $sql = "DELETE FROM `cond` " . "WHERE $cond_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not delete data: ' . mysql_error());
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Deletion Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
        else if($_POST["table"] == "located") {
            $loc_w= $_POST["loc_where"];
            if ($loc_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $sql = "DELETE FROM `loc` " . "WHERE $loc_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not delete data: ' . mysql_error());
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Deletion Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();    
        }
        else {
           //if($_POST["table"] == "belongs_to")
            $belong_w= $_POST["belong_where"];
            if ($belong_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $sql = "DELETE FROM `belong` " . "WHERE $belong_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not delete data: ' . mysql_error());
            }
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Deletion Successful');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
            $conn->close();
        }
    }
    else {
        #if($_POST["action"] == "select")
        if($_POST["table"] == "user") {
            $user_name = $_POST["user_name_c"];
            $user_pw = $_POST["user_pw_c"];
            $user_loc = $_POST["user_loc_c"];
            $user_university = $_POST["user_university_c"];
            $user_w = $_POST["user_where"];
            if ($user_name != "") {
            $user_name = "`user_name`,";
            }
            if ($user_pw != "") {
            $user_pw = "`user_pw`,";
            }
            if ($user_loc != "") {
            $user_loc = "`user_loc`,";
            }
            if ($user_university != "") {
            $user_university = "`user_university`,";
            }
            if ($user_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $temp = $user_name. " " .$user_pw. " " .$user_loc. " " .$user_university;
            $temp = rtrim($temp, ", ");
            $sql = "SELECT $temp FROM `user` WHERE $user_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not get data: ' . mysql_error());
            }
            
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                echo 
                "<div class=mid>user_name :{$row['user_name']} <br>
                user_pw :{$row['user_pw']} <br>
                user_loc :{$row['user_loc']} <br>
                user_university :{$row['user_university']}
                <hr/>
                </div>";
            }
            echo "<div class=bot><a class='button' href='data_manager.php'>Go Back</a></div>";
            $conn->close();
        }
        else if($_POST["table"] == "apt") {
            $apt_name = $_POST["apt_name_c"];
            $apt_rating = $_POST["apt_rating_c"];
            $apt_contact = $_POST["apt_contact_c"];
            $apt_w = $_POST["apt_where"];
            if ($apt_name != "") {
            $apt_name = "`apt_name`,";
            }
            if ($apt_rating != "") {
            $apt_rating = "`apt_rating`,";
            }
            if ($apt_contact != "") {
            $apt_contact = "`apt_contact`,";
            }
            if ($apt_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $temp = $apt_name. " " .$apt_rating. " " .$apt_contact;
            $temp = rtrim($temp, ", ");
            $sql = "SELECT $temp FROM `apt` WHERE $apt_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not get data: ' . mysql_error());
            }
            
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                echo
                "<div class=mid>apt_name :{$row['apt_name']} <br>
                apt_rating :{$row['apt_rating']} <br>
                apt_contact :{$row['apt_contact']}<hr/>
                </div>";
            }
           echo "<div class=bot><a class='button' href='data_manager.php'>Go Back</a></div>";
            $conn->close();
        }
        else if($_POST["table"] == "addr") {
            $addr_pin = $_POST["addr_pin_c"];
            $addr_name = $_POST["addr_name_c"];
            $addr_crime = $_POST["addr_crime_c"];
            $addr_bus = $_POST["addr_bus_c"];
            $addr_dist = $_POST["addr_dist_c"];
            $addr_w = $_POST["addr_where"];
            if ($addr_pin != "") {
            $addr_pin = "`addr_pin`,";
            }
            if ($addr_name != "") {
            $addr_name = "`addr_name`,";
            }
            if ($addr_crime != "") {
            $addr_crime = "`addr_crime`,";
            }
            if ($addr_bus != "") {
            $addr_bus = "`addr_bus`,";
            }
            if ($addr_dist != "") {
            $addr_dist = "`addr_dist`,";
            }
            if ($addr_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $temp = $addr_pin. " " .$addr_name. " " .$addr_crime. " " .$addr_bus. " " .$addr_dist;
            $temp = rtrim($temp, ", ");
            $sql = "SELECT $temp FROM `addr` WHERE $addr_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not get data: ' . mysql_error());
            }
            
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                echo
                "<div class=mid>addr_pin :{$row['addr_pin']} <br>
                addr_name :{$row['addr_name']} <br>
                addr_crime :{$row['addr_crime']} <br>
                addr_bus :{$row['addr_bus']} <br>
                addr_dist :{$row['addr_dist']} <hr/>
                </div>";
            }
            echo "<div class=bot><a class='button' href='data_manager.php'>Go Back</a></div>";
            $conn->close();
        }
        else if($_POST["table"] == "company") {
            $company_name = $_POST["company_name_c"];
            $company_rating = $_POST["company_rating_c"];
            $company_w = $_POST["company_where"];
            if ($company_name != "") {
            $company_name = "`company_name`,";
            }
            if ($company_rating != "") {
            $company_rating = "`company_rating`,";
            }
            if ($company_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $temp = $company_name. " " .$company_rating;
            $temp = rtrim($temp, ", ");
            $sql = "SELECT $temp FROM `company` WHERE $company_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not get data: ' . mysql_error());
            }
           
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                echo
                "<div class=mid>company_name :{$row['company_name']} <br>
                company_rating :{$row['company_rating']} <hr/>
                </div>";
            }
            echo "<div class=bot><a class='button' href='data_manager.php'>Go Back</a></div>";
            $conn->close();
        }
        else if($_POST["table"] == "cond") {
            //if($_POST["table"] == "room")
            $cond_name = $_POST["cond_name_c"];
            $cond_bed = $_POST["cond_bed_c"];
            $cond_bath = $_POST["cond_bath_c"];
            $cond_amen = $_POST["cond_amen_c"];
            $cond_rent = $_POST["cond_rent_c"];
            $cond_w = $_POST["cond_where"];
            if ($cond_name != "") {
            $cond_name = "`cond_name`,";
            }
            if ($cond_bed != "") {
            $cond_bed = "`cond_bed`,";
            }
            if ($cond_bath != "") {
            $cond_bath = "`cond_bath`,";
            }
            if ($cond_amen != "") {
            $cond_amen = "`cond_amen`,";
            }
            if ($cond_rent != "") {
            $cond_rent = "`cond_rent`,";
            }
            if ($cond_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $temp = $cond_name. " " .$cond_bed. " " .$cond_bath. " " .$cond_amen. " " .$cond_rent;
            $temp = rtrim($temp, ", ");
            $sql = "SELECT $temp FROM `cond` WHERE $cond_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not get data: ' . mysql_error());
            }
           
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                echo
                "<div class=mid>cond_name :{$row['cond_name']} <br>".
                "cond_bed :{$row['cond_bed']} <br>
                cond_bath :{$row['cond_bath']} <br>
                cond_amen :{$row['cond_amen']} <br>
                cond_rent :{$row['cond_rent']} <hr/>
                </div>";
            }
            echo "<div class=bot><a class='button' href='data_manager.php'>Go Back</a></div>";
            $conn->close();
        }
        else if($_POST["table"] == "located") {
            $loc_pin = $_POST["loc_pin_c"];
            $loc_apt = $_POST["loc_apt_c"];
            $loc_w = $_POST["loc_where"];
            if ($loc_pin != "") {
            $loc_pin = "`loc_pin`,";
            }
            if ($loc_apt != "") {
            $loc_apt = "`loc_apt`,";
            }
            if ($loc_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $temp = $loc_pin. " " .$loc_apt;
            $temp = rtrim($temp, ", ");
            $sql = "SELECT $temp FROM `loc` WHERE $loc_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not get data: ' . mysql_error());
            }
           
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                echo
                "<div class=mid>loc_pin :{$row['loc_pin']} <br>
                loc_apt :{$row['loc_apt']} <hr/>
                </div>";
            }
           echo "<div class=bot><a class='button' href='data_manager.php'>Go Back</a></div>";
            $conn->close();
        }
        else {
           //if($_POST["table"] == "belongs_to")
           $belong_apt = $_POST["belong_apt_c"];
            $belong_company = $_POST["belong_company_c"];
            $belong_w = $_POST["belong_where"];
            if ($belong_apt != "") {
            $belong_apt = "`belong_apt`,";
            }
            if ($belong_company != "") {
            $belong_company = "`belong_company`,";
            }
            if ($belong_w == "") {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed: condition cannot be empty');
                window.location.href='http://homenowproject.web.engr.illinois.edu/data_manager.php';
              </script>");
              die("");
                //die ("Failed: condition cannot be empty");
            }
            $temp = $belong_apt. " " .$belong_company;
            $temp = rtrim($temp, ", ");
            $sql = "SELECT $temp FROM `belong` WHERE $belong_w";
            $db = mysql_select_db('homenowproject_lol', $conn);
            if (!$db){
                die ("Failed: " . mysql_error());
            }
            $result = mysql_query($sql, $conn);
            if(!$result) {
                die('Could not get data: ' . mysql_error());
            }
           
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                echo
                "<div class=mid>belong_apt :{$row['belong_apt']} <br>
                belong_company :{$row['belong_company']} <hr/>
                </div>";
            }
            echo "<div class=bot><a class='button' href='data_manager.php'>Go Back</a></div>";
            $conn->close();
        }
    }
    
?>


</body>
</html>