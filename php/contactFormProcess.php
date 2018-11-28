<?php
/*contactFormProcess.php
*/
include "../../db_connect.php";
//session_start();
if (mysqli_query($mysqli, "insert into contact_messages(subject, content, full_name, email) values ('{$_POST['contact-subject']}', '{$_POST['contact-message']}', '{$_POST['contact-name']}', '{$_POST['contact-email']}')")) {
    header("Location: ../pages/business/contact.php?success=true");
}
else {
    echo mysqli_error($mysqli);
}
mysqli_close($mysqli);
