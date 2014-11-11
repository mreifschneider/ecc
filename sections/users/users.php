<?php
array_push($GLOBALS['commands'], array ( 'users', 'login', 'eccUser_userLogin'), 
		array ( 'users', 'check_login', 'eccUser_userCheckLogin'));

function eccUser_userCheckLogin() {

	header('Content-Type: application/json');
	$returnArray = array ( 'result' => 'failure');
	if ((isset($_SESSION['userID']) === true) && (isset($_SESSION['userName']) === true)) {
		$returnArray = array ( 'result' => 'success', 'name' => $_SESSION['userName']);
	}
	die(json_encode($returnArray));
}

function eccUser_userLogin( $userEmail = null, $userPassword = null ) {

	$userEmail = $_POST['eccUserEmail'];
	$userPassword = $_POST['eccUserPassword'];

	header('Content-Type: application/json');
	
	$userArray = json_decode(file_get_contents($eccUserFile), true);
	$userMatch = false;
	
	foreach ( $userArray as $user ) {
		if ($user['Email'] === $userEmail) {
			$userMatch = $user;
			break;
		}
	}
	
	if ($userMatch === false) {
		die(json_encode(array ( 'result', 'failure')));
	}
	
	$userHash = $userMatch['Hash'];
	$userID = $userMatch['ID'];
	$userName = $userMatch['FirstName'] . ' ' . $userMatch['LastName'];
	
	$userLoginSalt = substr($userHash, 0, 128);
	
	$userLoginHash = $userLoginSalt . $userPassword;
	for ($counter = 0; $counter < 212; $counter++) {
		$userLoginHash = hash('whirlpool', $userLoginHash);
	}
	$userLoginHash = $userLoginSalt . $userLoginHash;
	
	if ($userLoginHash === $userHash) {
		$_SESSION['userID'] = $userID;
		$_SESSION['userName'] = $userName;
		die(json_encode(array ( 'result' => 'success', 'name' => $userName)));
	}
	die(json_encode(array ( 'result', 'failure')));
}

function eccUser_setPassword( $userEmail, $userPassword ) {

		$userSalt = hash('whirlpool', 
			uniqid(mt_rand(), true) . 'cHJ789__aFH,a-' . $userEmail . '__++27>DAhj-82nda82');
	
	$userHash = $userSalt . $userPassword;
	
	for ($counter = 0; $counter < 212; $counter++) {
		$userHash = hash('whirlpool', $userHash);
	}
	$userHash = $userSalt . $userHash;
	
	$userQuery = "UPDATE User
    SET User.UserHash = '$userHash'
    WHERE User.UserEmail = '$userEmail'; ";
	

}

?>