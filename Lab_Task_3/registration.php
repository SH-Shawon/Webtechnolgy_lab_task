<!-- Registration -->
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $flag = true;
    if (empty($_POST["fname"])){
        $flag = false;
        echo "Fill First Name <br>";
    }
    if (empty($_POST["lname"])){
        $flag = false;
        echo "Fill Last Name <br>";
    } 
    if (empty($_POST["ftname"])){
        $flag = false;
        echo "Fill Father's Name <br>";
    } 
    if (empty($_POST["mtname"])){
        $flag = false;
        echo "Fill Mother's Name <br>";
    } 
    if (empty($_POST["gender"])){
        $flag = false;
        echo "Select Gender <br>";
    } 
    if (empty($_POST["birthday"])){
        $flag = false;
        echo "Fill Date of Birth <br>";
    } 
    // $bg= sanitizing($_POST["bg"]);
    // if ($bg=='Default'){
    //     $flag = false;
    //     echo "Select Blood Group <br>";
    // } 
    if (empty($_POST["email"])){
        $flag = false;
        echo "Fill Email<br>";
    } 
    if (empty($_POST["phnno"])){
        $flag = false;
        echo "Fill phnno/Mobile <br>";
    } 
    if (empty($_POST["website"])){
        $flag = false;
        echo "Fill websitesite URL <br>";
    } 
    if (empty($_POST["address"])){
        $flag = false;
        echo "Fill Present Address <br>";
    } 
    if (empty($_POST["username"])){
        $flag = false;
        echo "Fill Username <br>";
    } 
    if (empty($_POST["password"])){
        $flag = false;
        echo "Fill Password <br>";
    } 

    if($flag==true) {
        $fname = sanitizing($_POST["fname"]);
        $lname = sanitizing($_POST["lname"]);
        $ftname = sanitizing($_POST["ftname"]);
        $mtname = sanitizing($_POST["mtname"]);
        $gender = sanitizing($_POST["gender"]);
        $birthday = sanitizing($_POST["birthday"]);
        $bg = sanitizing($_POST["bg"]);
        $email = sanitizing($_POST["email"]);
        $phnno = sanitizing($_POST["phnno"]);
        $website = sanitizing($_POST["website"]);
        $address = sanitizing($_POST["address"]);
        $username = sanitizing($_POST["username"]);
        $password = sanitizing($_POST["password"]);
        // echo "<br><h1>Submission Successful</h1><br>";

        echo '
        <br><h1>Registration</h1><br><br>
        <fieldset>
        <legend><b>General Information:</b></legend>
        <table>
            <tr>
                <td>
                    <label for="fname"><b>First Name</b></label>
                </td>
                <td>
                    <b>: </b>'.$fname.'
                </td>
            </tr>
            <tr>
                <td>
                    <label for="lname"><b>Last Name</b></label>
                </td>
                <td>
                    <b>: </b>'.$lname.'
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ftname"><b>Fathers Name</b></label>
                </td>
                <td>
                    <b>: </b>'.$ftname.'
                </td>
            </tr>
            <tr>
                <td>
                    <label for="mtname"><b>Mothers Name</b></label>
                </td>
                <td>
                    <b>: </b>'.$mtname.'
                </td>
            </tr>
            <tr>
                <td>
                    <label for="male"><b>Gender</b></label>
                </td>
                <td>
                    <b>: </b>'.$gender.'
                </td>
            </tr>
            <tr>
                <td>
                    <label for="birthday"><b>Date of Birth</b></label>
                </td>
                <td>
                    <b>: </b>'.$birthday.'
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bg"><b>Blood Group</b></label>
                </td>
                <td>
                    <b>: </b>'.$bg.'
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
            <legend><b>Contact Information:</b></legend>
            <table>
                <tr>
                    <td>
                        <label for="email"><b>Email</b></label>
                    </td>
                    <td>
                        <b>: </b>'.$email.'
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phnno"><b>phnno/Mobile</b></label>
                    </td>
                    <td>
                        <b>: </b>'.$phnno.'
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="website"><b>websitesite</b></label>
                    </td>
                    <td>
                        <b>: </b>'.$website.'
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address"><b>Present Address</b></label>
                    </td>
                    <td>
                        <b>: </b>'.$address.'
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend><b>Account Information:</b></legend>
            <table>
                <tr>
                    <td>
                        <label for="username"><b>Username</b></label>
                    </td>
                    <td>
                        <b>: </b>'.$username.'
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password"><b>Password</b></label>
                    </td>
                    <td>
                        <b>: </b>'.$password.'
                    </td>
                </tr>
            </table>
        </fieldset>
        ';
     
    }
}
function sanitizing($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>