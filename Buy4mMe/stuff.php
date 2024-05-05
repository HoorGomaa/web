<?php include('header.php'); ?>	
<?php include('connection.php');

$query = "SELECT * FROM stuff";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc(($result))){
    $stuff[$row['id']] = array(
        "name" => $row["name"],
        "img" => $row["img"],
        "price" => $row["price"],
    );
}?>
	<div class="page shirts section">
	    <div class="wrapper">
	        <h1>My Full Catalog of Stuff</h1>
			<ul class="products">

				<?php foreach($stuff as $key => $value){
				echo '
					<li>
						<a href="#">
							<img src="'.$value["img"]. '" alt="'.$value["name"].'"/>
							<p>'.$value["name"].'</p>
						</a>
					</li>'	
				;
			} ?>	
				</ul>
	    
	    
	    
	    </div>    
	</div>
</div>
<?php include('footer.php'); ?>	
