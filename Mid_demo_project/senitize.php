<?php function senitize($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;


    }

    function validateEmail($email)
{
    if (preg_match("/^(?=.{1,256}$)[a-z][a-z0-9.-]*[a-z0-9]@[a-z]{2,}(?:\.[a-z0-9]+)*\.[a-z]{2,}$/i", $email)) {
        return true;
    } else {
        return false;
    }
}
?>