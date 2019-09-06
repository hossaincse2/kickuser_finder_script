<?php
include 'include/class.user.php';
$user = new User();
$email = trim($_POST['email']);
$ip_address2 = trim($_POST['ip_address2']);

$stmt = $user->_dbh->prepare("SELECT * FROM subscribe_mail WHERE email=:email");
$stmt->execute(array(':email' => $email));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row['email'] == $email) {
    echo "email";
} else if ($sucess = $user->subscribeMail($email, $ip_address2)) {
    echo "success";
} else {
    echo "fail";
}
?>
