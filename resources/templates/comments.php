<div class="comments-section">
	<h3>See what others tell about us</h3>
	<div class="detailBox">
		<div class="titleBox">
			<label>Comment Box</label>
			<button type="button" class="close" aria-hidden="true">&times;</button>
		</div>
		<div class="commentBox">

			<p class="taskDescription">Leave us your feedback - it will improve the quality of our product!</p>
		</div>
		<div class="actionBox">
			<?php for($i = 0; $i < count($commentList); $i++) : ?>
				<ul class="commentList">
					<li>
						<h5 class="commentName"><?= $commentList[$i]["name"]; ?></h5>
						<div class="commentText">
							<p class=""><?= $commentList[$i]["comment"]; ?></p> <span class="date sub-text">on March 5th, 2014</span>
						</div>
					</li>
				</ul>
			<?php endfor ?>
			<form class="form-inline" role="form">
				<div class="form-group nameInput">
					<input class="form-control" type="text" placeholder="Your name" />
				</div>
				<br>
				<div class="form-group commentInput">
					<input class="form-control" type="text" placeholder="Your comments" />
				</div>
				<br>
				<div class="form-group">
					<input type="submit" value="Add comment" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>