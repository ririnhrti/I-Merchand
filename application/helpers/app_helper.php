<?php 

function isLogged()
{
	return isset($_SESSION['member']['isLogged']) && $_SESSION['member']['isLogged'] == true ? true : false;
}

function isLoggedUser()
{
	return isset($_SESSION['user']['isLoggedUser']) && $_SESSION['user']['isLoggedUser'] == true ? true : false;
}

 ?>