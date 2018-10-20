<?php
$conn = new mysqli('localhost', 'root', '', 'quean');
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT title, description, links FROM questions";
$questions = $conn->query($sql);
?>

	<div class="container mt-5">
		<div class="d-flex justify-content-between mb-3 flex-column flex-md-row">
			<h3 class="font-weight-light mb-0">Questions</h3>
			<div class="d-flex flex-column flex-md-row">
				<form class="form-inline my-2 my-lg-0 mr-md-3" action="search_question.php" method="POST">
					<div class="input-group">
						<input class="form-control" type="search" placeholder="Search question" aria-label="Search" name="search">
						<div class="input-group-append">
							<button class="btn btn-info my-0" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</form>
				<a class="btn btn-outline-primary" href="new-question.php">Ask question</a>
			</div>
		</div>
<?php
if ($questions->num_rows > 0) {
	while($question = $questions->fetch_assoc()) {?>
		<div class="card mb-4 shadow-sm">
			<div class="card-body">
				<h4 class="card-title mb-1">
					<?php echo'<a class="text-body" href="answers.php?question_title='. $question["title"] .'">'?>
						<?php echo $question["title"];?>
					</a>
				</h4>
				<p class="text-secondary mb-0">
				<?php echo $question["description"];?>
				</p>
				<div class="mb-2">
					<?php $links = explode(',', $question["links"]);
					for ($i=0; $i < sizeof($links); $i++) { 
						echo ' <a href="#" class="badge badge-info"> ' . $links["$i"] . '</a>';
					}
					?>
					</div>
					<a href="#" class="card-link"><small>Abhishek Pokhriyal</small></a>
					<small class="text-secondary">asked on</small>
					<small class="text-secondary">Sep 27, 2018</small>
				</p>
				<div class="d-flex text-secondary">
					<div class="mr-3">
						<i class="far fa-thumbs-up"></i>
						<small>14</small>
					</div>
					<div class="mr-3">
						<i class="far fa-thumbs-down"></i>
						<small>1</small>
					</div>
					<div class="mr-3">
						<i class="far fa-comments"></i>
						<a href="answers.html" class="text-secondary"><small>2 answers</small></a>
					</div>
				</div>
			</div>
		</div>
	<?php }
}
else {
	echo "<h4>No questions are asked</h4>";
}
$conn->close();
?>
	</div>
	<footer class="bg-light py-3 text-center mt-1">
		<span class="text-primary"><i class="fas fa-code"></i> Developed at CodeTrek Tehri 2018</span>
	</footer>
</body>
</html>
