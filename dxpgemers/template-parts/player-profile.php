<?php global $profile; ?>
<div id="fh5co-schedule-section" class="fh5co-lightgray-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="heading-section text-center animate-box">
					<h2>PLAYER STATS</h2>
				</div>
			</div>
		</div>
		<div class="row text-center">
			
			<div class="col-sm-3">
				<div class="program program-schedule" style="height: 230px;display:table;width: 100%;">
					<div class="profile-center-items">
						<span class="profile-items"><?php echo $profile->country; ?></span>
						<h4>Country</h4>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="program program-schedule" style="height: 230px;">
					<div id="circle"
						value="<?php echo dxp_ratio($profile->ratio); ?>"
					></div>
					<h4>Kill / Death Ratio</h4>
				</div>	
			</div>
			
			<div class="col-sm-3">
				<div class="program program-schedule" style="height: 230px;display:table;width: 100%;">
					<div class="profile-center-items">
						<span class="profile-items"><?php echo $profile->kills; ?></span>
						<h4>Kills</h4>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="program program-schedule" style="height: 230px;display:table;width: 100%;">
					<div class="profile-center-items">
						<span class="profile-items"><?php echo $profile->deaths; ?></span>
						<h4>Deaths</h4>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row text-center">
			
			<div class="col-sm-3">
				<div class="program program-schedule" style="height: 230px;display:table;width: 100%;">
					<div class="profile-center-items">
						<span class="profile-items"><?php echo round($profile->assistskill); ?></span>
						<h4>Assist Skill</h4>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="program program-schedule" style="height: 230px;display:table;width: 100%;">
					<div class="profile-center-items">
						<span class="profile-items"><?php echo round($profile->skill); ?></span>
						<h4>Skill</h4>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="program program-schedule" style="height: 230px;display:table;width: 100%;">
					<div class="profile-center-items">
						<span class="profile-items"><?php echo round($profile->teamkills); ?></span>
						<h4>Team Kills</h4>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="program program-schedule" style="height: 230px;display:table;width: 100%;">
					<div class="profile-center-items">
						<span class="profile-items"><?php echo round($profile->teamdeaths); ?></span>
						<h4>Team Deaths</h4>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row text-center">
			
			<div class="col-sm-3">
				<div class="program program-schedule" style="height: 230px;display:table;width: 100%;">
					<div class="profile-center-items">
						<span class="profile-items"><?php echo $profile->winstreak; ?></span>
						<h4>Win Streak</h4>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="program program-schedule" style="height: 230px;display:table;width: 100%;">
					<div class="profile-center-items">
						<span class="profile-items"><?php echo round($profile->rounds); ?></span>
						<h4>Rounds</h4>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="program program-schedule" style="height: 230px;display:table;width: 100%;">
					<div class="profile-center-items">
						<span class="profile-items"><?php echo round($profile->assists); ?></span>
						<h4>Kill Assist</h4>
					</div>
				</div>
			</div>	
			
			<div class="col-sm-3">
				<div class="program program-schedule" style="height: 230px;display:table;width: 100%;">
					<div class="profile-center-items">
						<span class="profile-items"><?php echo $profile->suicides; ?></span>
						<h4>Suicides</h4>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>