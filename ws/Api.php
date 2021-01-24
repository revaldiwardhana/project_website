<?php 
 
 require_once 'DbConnect.php';
 
 $response = array();
 
 if(isset($_GET['apicall'])){
 
 switch($_GET['apicall']){
 
 case 'signup':
 if(isTheseParametersAvailable(array('nama_lengkap',
 	'alamat',
 	'no_telp',
 	'username',
 	'password',
 	'level_user'))){
 $nama_lengkap = $_POST['nama_lengkap']; 
 $alamat = $_POST['alamat']; 
 $no_telp = $_POST['no_telp'];
 $username	 = $_POST['username	'];
 $password = md5($_POST['password']);
 $level_user = $_POST['level_user']; 
 
 $stmt = $conn->prepare("SELECT id FROM user WHERE username = ?");
 $stmt->bind_param("s", $username);
 $stmt->execute();
 $stmt->store_result();
 
 if($stmt->num_rows > 0){
 $response['error'] = true;
 $response['message'] = 'User already registered';
 $stmt->close();
 }else{
 $stmt = $conn->prepare("INSERT INTO user (nama_lengkap, alamat, no_telp, username, password, level_user) VALUES (?, ?, ?, ?, ?,?)");
 $stmt->bind_param("ssssss", $nama_lengkap, $alamat, $no_telp, $username, $password, $level_user);
 
 if($stmt->execute()){
 $stmt = $conn->prepare("SELECT id_user, id_user, username, email, gender FROM users WHERE username = ?"); 
 $stmt->bind_param("s",$username);
 $stmt->execute();
 $stmt->bind_result($userid, $id, $username, $email, $gender);
 $stmt->fetch();
 
 $user = array(
 'id_user'=>$id_user, 
 'nama_lengkap'=>$nama_lengkap, 
 'alamat'=>$alamat,
 'no_telp'=>$no_telp,
 'username'=>$username,
 'password'=>$password,
 'level_user'=>$level_user
 );
 
 $stmt->close();
 
 $response['error'] = false; 
 $response['message'] = 'User registered successfully'; 
 $response['user'] = $user; 
 }
 }
 
 }else{
 $response['error'] = true; 
 $response['message'] = 'required parameters are not available'; 
 }
 
 break; 
 
 case 'login':
 
 if(isTheseParametersAvailable(array('username', 'password'))){
 
 $username = $_POST['username'];
 $password = md5($_POST['password']); 
 
 $stmt = $conn->prepare("SELECT id_user, nama_lengkap, alamat, no_telp, username, password, level_user, FROM user WHERE username = ? AND password = ?");
 $stmt->bind_param("ss",$username, $password);
 
 $stmt->execute();
 
 $stmt->store_result();
 
 if($stmt->num_rows > 0){
 
 $stmt->bind_result($id_user, $nama_lengkap, $alamat, $no_telp, $username, $password, $level_user);
 $stmt->fetch();
 
 $user = array(
'id_user'=>$id_user, 
 'nama_lengkap'=>$nama_lengkap, 
 'alamat'=>$alamat,
 'no_telp'=>$no_telp,
 'username'=>$username,
 'password'=>$password,
 'level_user'=>$level_user
 );
 
 $response['error'] = false; 
 $response['message'] = 'Login successfull'; 
 $response['user'] = $user; 
 }else{
 $response['error'] = false; 
 $response['message'] = 'Invalid username or password';
 }
 }
 break; 
 
 default: 
 $response['error'] = true; 
 $response['message'] = 'Invalid Operation Called';
 }
 
 }else{
 $response['error'] = true; 
 $response['message'] = 'Invalid API Call';
 }
 
 echo json_encode($response);
 
 function isTheseParametersAvailable($params){
 
 foreach($params as $param){
 if(!isset($_POST[$param])){
 return false; 
 }
 }
 return true; 
 }