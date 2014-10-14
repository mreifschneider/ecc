<?php

/**
 * 
 * @return boolean|null 
 */
function userDatabase_userLogin( $userEmail, $userPassword ) {

	$database = $GLOBALS['database'];
	
	$userEmail = mysqli_real_escape_string($database, $userEmail);
	$userPassword = mysqli_real_escape_string($database, $userPassword);
	
	$userLoginQuery = "SELECT User.UserHash AS 'userHash', User.UserUserID AS 'userID' 
	FROM User
	WHERE User.UserEmail = '$userEmail'
	LIMIT 1; ";
	
	$userLoginResult = mysqli_query($database, $userLoginQuery);
	if ($userLoginResult === false) {
		return null;
	}
	$userLoginRow = mysqli_fetch_assoc($userLoginResult);
	$userHash = $userLoginRow['userHash'];
	$userID = $userLoginRow['userID'];
	
	mysqli_free_result($userLoginResult);
	
	$userLoginSalt = substr($userHash, 0, 128);

	
	
	$userLoginHash = $userLoginSalt . $userLoginPassword;
	for ($counter = 0; $counter < 212; $counter++) {
		$userLoginHash = hash('whirlpool', $userLoginHash);
	}
	$userLoginHash = $userLoginSalt . $userLoginHash;
	
	if ($userLoginHash === $userHash) {
		$_SESSION['userID'] = $userID;
		return true;
	}
	return false;
}

function userDatabase_setPassword( $userEmail, $userPassword ) {

	$database = $GLOBALS['database'];
	$userEmail = mysqli_real_escape_string($userEmail);
	
	$userSalt = hash('whirlpool', 
			uniqid(mt_rand(), true) . 'cHJ789__aFH,a-' . $userEmail . '__++27>DAhj-82nda82');
	
	$userHash = $userSalt . $userPassword;
	
	for ($counter = 0; $counter < 212; $counter++) {
		$userHash = hash('whirlpool', $userHash);
	}
	$userHash = mysqli_real_escape_string($database, $userSalt . $userHash);
	
	$userQuery = "UPDATE User
    SET User.UserHash = '$userHash'
    WHERE User.UserEmail = '$userEmail'; ";
	
	mysqli_query($database, $userQuery);
	
	if (intval(mysqli_affected_rows($database) ) === 1) {
		return true;
	}
	return false;
}

?>