<?php
$var = $_POST['n'] ;
$conn = new mysqli('localhost', 'root', '', 'quean');
$sql = "UPDATE questions SET dislikes= '$var' WHERE qid='1'";
mysqli_query($conn, $sql);
?>