<?php

session_start();

function createCsrf()
{
	$token = base64_encode(openssl_random_pseudo_bytes(32));
	$_SESSION['csrf'] = $token;
	return $token;
}

function destroyCsrf()
{
	unset($_SESSION['csrf']);
}

function validation()
{
	$csrf = isset($_SESSION['csrf']);
	if (isset($_POST['csrf_token'])) {
		if ($_POST['csrf_token'] == $csrf) {
			destroyCsrf();
			return true;
		} else {
			destroyCsrf();
			return false;
		}
		
	} else {
		destroyCsrf();
		return false;
	}
	
}