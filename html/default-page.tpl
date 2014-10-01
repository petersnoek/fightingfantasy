<!doctype html>

<html>
	<head>
		<title>{pagetitle}</title>
		<link href='/css/style.css' rel='stylesheet' type='text/css'>
	</head>

	<body>	
		<div class="container">
		
			<div class="header">
				<div id="nav">
					<ul>
						<li><a href="#">Milk</a></li>
						<li><a href="#">Eggs</a></li>
						<li><a href="#">Cheese</a></li>
						<li><a href="#">Vegetables</a></li>
						<li><a href="#">Fruit</a></li>
					</ul>
				</div>
			
				<!-- START BLOCK : error -->
				<div class='box error' >(error) {errormsg} </div> 
				<!-- END BLOCK : error -->
				
				<!-- START BLOCK : status -->
				<div class='box statusupdate' >{statusupdate}</div> 
				<!-- END BLOCK : status -->

			</div>  <!-- end header -->
			
			<div class="sidebar">
			
				<!-- START BLOCK : stats -->
				<div class='box stats' >
				<span>STATS</span>
				Health: {health}<br>
				Stamina: {stamina}<br>
				XP: {xp}<br>
				</div> 
				<!-- END BLOCK : stats -->

				<div class='box inventory' >
				<span>INVENTORY</span>
				<!-- START BLOCK : inventory -->
				{item}: {count}<br>
				<!-- END BLOCK : inventory -->
				</div> 
			
			</div>  <!-- end sidebar -->
			
			<div class="box content">
				<!-- START BLOCK : location -->
				<h1>{l_name}</h1>
				<p>{l_description}</p>
				<!-- END BLOCK : location -->
				
				<div id="battle">
					the battle box!<br>
					<a href="/heal">Heal</a><br>
					<a href="/flee">Flee</a><br>
					
				</div> <!-- end battle -->
				
			</div>  <!-- end content -->
			
			{debug}
			
		</div>
	
	</body>
</html>