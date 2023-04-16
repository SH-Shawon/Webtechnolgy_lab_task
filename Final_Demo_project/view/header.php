<header>
    <h1 align="center">SSI Computer Shop</h1>
    <p align="right">
        Welcome
        <?php if (isset($_SESSION['username'])) {
            echo "$_SESSION[username]";
        }
        ?>
    </p>
    <hr>
    <div align="right">
        <table>

        <td align="left">
            <table >
                <tr>
                    <td >
                    <a href="productManage.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
            </table>
        </td>

          <td>
                <table>
                    <tr>

                        <td>
                        <a href="passwordChange.php">Change Password</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </td>


        
            <td>
                <table>
                    <tr>

                        <td>
                            <a href="editProfile.php">Edit profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>
                            <a href="logout.php">Logout</a>
                        </td>
                    </tr>
                </table>
            </td>
        </table>
    </div>



    <hr>
</header>