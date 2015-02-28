<div class="container-fluid">
	<div class="row">
		<!-- SIDEBAR GOES HERE -->
		<?php require_once("sidebar.php"); ?>

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			
			<h1 class="page-header">Dashboard</h1>
			
			<div class="row">
				<div class="col-md-6">
					<canvas id="totalUsabilityChart"></canvas>
				</div>
				<div class="col-md-6">
					<h2 class="text-left usab-rate">Get total usability rate</h2>
				</div>
			</div>
			<h3 class="text-center" id="detailed-insights-header">Get detailed insights!</h3>
			<div class="row">
				<div class="col-md-4">
					<div class="canvas-holder">
						<canvas id="lineChart1"></canvas>
					</div>
				</div>
				<div class="col-md-4">
					<div class="canvas-holder">
						<canvas id="barChart2"></canvas>
					</div>
				</div>
				<div class="col-md-4">
					<div class="canvas-holder">
						<canvas id="radarChart3"></canvas>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 youtube-video">
					<h3>Learn more about usability</h3>
					<div id="player"></div>
				</div>
			</div>

		</div>
	</div>
</div>