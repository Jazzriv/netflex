/*
Par : Jean-Loup
Code interface utilisateur
Créé : 20/11/16
Dernière modification : 20/11/16
*/

function toggleNav(){
	
}

$(document).ready(function(){
	/*
		Base state of "Theme" list (searchbar) : hidden
		Base state of navbar : hidden
	*/
	$('#theme_div').hide();
	$('ASIDE#navbar').hide();

	/*
		Navbar hide and show
	*/
	$('#toggle_navbar').on("click",function(){
		if($('ASIDE#navbar').is(":hidden")){
		$('ASIDE#navbar').show(150);
	}
	else{
		$('ASIDE#navbar').hide(150);
	}
	});

	/*
		Theme list div hide and show
	*/
	$('#theme_button').on("click",function(){
		if($('#theme_div').is(":hidden")){
		$('#theme_div').show(50);
	}
	else{
		$('#theme_div').hide(50);
	}
	});
});
