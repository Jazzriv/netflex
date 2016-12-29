<?php include(start_session.php) ?>
<!DOCTYPE HTML>
<!--
Par : Jean-Loup
Interface utilisateur
Créé : 19/11/16
Dernière modification : 28/12/16
-->
<HTML>
	<HEAD>
		<title>Netflex</title>
		<meta charset = "utf-8"/>
		<link rel = "stylesheet" type="text/css" href="style_bright.css">
	</HEAD>
	<BODY>
			<DIV id = "topbar">
							<input type="button" onclick = "location.href = 'home.php' " id = "logo"/>
							<SPAN id = "searchform">
								<input type = "button" name = "themes" value = "Thèmes" id = "theme_button"/>
								<input type = "text" name="searchbar" placeholder = "Cherchez une série ..." id = "searchbar"/>
								<input type = "submit" value="" id="search_button" />
							</SPAN>
							<button type = "button" name = "toggle" value = "" id = "toggle_navbar"/>
			</DIV>

			<DIV id = "theme_div">
			<?php echo "lala"; ?>
			<!--remplissage de la liste des thèmes -->
				<? include(script.php); ?>
				<br/>
			</DIV>
		<ASIDE id = "navbar">
			<SECTION id="nav_element">
				<DIV id="user_tools">
					<img src = "../img/user_image_PLACEHOLDER.png" id = "user_image"/> PLACEHOLDER NAME
					<form action="profile.html"  id="prof_log_button1">
						<input type = "button" name="profile" value="Profil"/>
					</form>
					<form action="logout.php" method="POST" id="prof_log_button2">
						<input type = "button" name="logout" value="Déconnexion"/>
					</form>
				</DIV>
			</SECTION>
			<SECTION id = "nav_element">
				Journal <br/>
				<table id = "news_table">
					<tr>
						<td id = "nav_section"> EXAMPLE 1 </td>
					</tr>
					<tr>
						<td id = "nav_section"> EXAMPLE 2 </td>
					</tr>
					<tr>
						<td id = "nav_section"> EXAMPLE 3 </td>
					</tr>
				</table>
			</SECTION>
			<SECTION id = "nav_element">
				Planning <br/>

			</SECTION>
		</ASIDE>
		<script src="jquery-3.1.1.js"></script>
		<script src="jquery-ui.js"></script>
		<script src = "user_ui.js"></script>
	</BODY>
</HTML>