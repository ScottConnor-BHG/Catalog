<!DOCTYPE html>
<html>
	<head>
				<meta charset="utf-8"/>
				<meta name="viewport" content ="width=device-width, initial-scale=1, maximum-scale=1"/>
				<?php echo $this->Html->css('styles');?>
				<title>My Catalog - <?php echo $title_for_layout;?></title>
	</head>
	<body>
				<div id="HeaderWrapper">
						<div id="Header">
								<h1><a href=""><span>My Catalog</span></a></h1>
														<div id = "Navigation" class = "widthWrapper">
							<ul>
																	<?php
									if(AuthComponent::user())
									{
										echo '<li><a href="/users/logout">Log Out</a></li>';
									}else
									{
										echo '<li><a href="/users/login">Log In</a></li>';
									}
									?>
									<li><a href="/Items">Items</a></li>
									<li><a href="/Categories">Categories</a></li>
									<li><a href="/Users">Users</a></li>

							</ul>
						</div>
						</div>
						<div id="Search" class ="searchInput">
								<input type="text" value="" name=""/>
								<button>Search</button>
						</div>
						<div>
								
						</div>
				</div>
				<div id="MainBody">
					<div id="Content" class="widthWrapper">
						<?php echo $this->fetch('content');?>
					</div>
				</div>
 	</body>
</html>