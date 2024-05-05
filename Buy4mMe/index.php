<?php include('header.php')?>

		<div class="section banner">

			<div class="wrapper">

				<img class="hero" src="img/me.png" alt="Anonymous says:">
				<div class="button">
					<a href="#">
						<h2>Hey Guys,</h2>
						<p>Check Out My Stuff</p>
					</a>
				</div>
			</div>

		</div>

		<div class="section shirts latest">

			<div class="wrapper">

				<h2>My Latest Stuff</h2>
                <?php 
			$stuff = array();
			$stuff[101]= array("name"=> "AMZONE ECHO", "img"=> "img/stuff/stuff-101.jpg
			" ,"price"=>"600");
			$stuff[102]= array("name"=> "AR DRONE", "img"=> "img/stuff/stuff-102.jpg

			" ,"price"=>"2500");
				
				?>
				<ul class="products">
					<?php 
					foreach ($stuff as $key => $value) {
						echo '	<li><a href="#">
						<img src="'.$value["img"].'" alt="'.$value["name"].'">
						<p>View Details</p>
					</a>
				</li>';
					}
					
					?>
				
												
				</ul>

			</div>

		</div>

	</div>

	<?php include('footer.php') ?>