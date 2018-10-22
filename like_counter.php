<?php
$like_count = $_POST['like_count'] ;
$qid = $_POST['qid'];
$conn = new mysqli('localhost', 'root', '', 'quean');
$sql = "UPDATE questions SET likes= '$like_count' WHERE qid='$qid'";
mysqli_query($conn, $sql);
echo $qid;
?>