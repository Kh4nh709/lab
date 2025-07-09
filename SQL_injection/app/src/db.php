<?php
$host = getenv('MYSQL_HOSTNAME') ?: 'db';
$user = getenv('MYSQL_USER') ?: 'db_user';
$pass = getenv('MYSQL_PASSWORD') ?: 'db_password';
$db = 'user';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Kết nối thất bại: ' . $conn->connect_error);
}

$result = null;

function get_content_blogs_by_id($id){
    global $conn;
    $sql = "SELECT id, title, content, author, comment FROM blogs WHERE id = $id";
    $result = $conn->query($sql); 
    $row = $result->fetch_assoc();
    return $row;
}

function get_username_ch_1($username,$password){
    global $conn;
    $sql = "SELECT username FROM users WHERE username = '$username' AND password = '$password' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

function get_username_ch_2($username){
    global $conn;
    $sql = "SELECT username,password FROM users WHERE username = '$username' ";
    $result = $conn->query($sql);
    if ($result === false) {
        return null;
    }
    $row = $result->fetch_assoc();
    return $row;
}

function get_username_ch_3($username,$password){
    global $conn;
    $sql = "SELECT username,password FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result === false) {
        return null;
    }
    $row = $result->fetch_assoc();
    return $row;
}

function get_blogs_by_id($id){
    global $conn;
    $sql = "SELECT * FROM blogs WHERE id = $id";
    $result = $conn->query($sql);
    return $result;
}

function set_id($id){
    global $conn;
    $sql = "UPDATE tracking SET trackingID = '$id' WHERE id = 1";
    $result = $conn ->query($sql);
}

function get_trackingID(){
    global $conn;
    $sql = "SELECT trackingID FROM tracking WHERE id = 1";
    $result = $conn -> query($sql);
    if ($result === false){
        return null;
    }
    $row = $result->fetch_assoc();
    return $row['trackingID'];
}

function get_flag_by_id($id){
    global $conn;
    $sql = "SELECT flag FROM flag WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

?>