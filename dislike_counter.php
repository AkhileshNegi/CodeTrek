<?php
$dislike_count = $_POST['dislike_count'] ;
$qid = $_POST['qid'];
$conn = new mysqli('localhost', 'root', '', 'quean');
$sql = "UPDATE questions SET dislikes= '$dislike_count' WHERE qid='$qid'";
mysqli_query($conn, $sql);
?>