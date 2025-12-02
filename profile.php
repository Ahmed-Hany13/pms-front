<?php include "inc/header.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>
<body>
    <table border="1" cellpadding="40" cellspacing="0" width="70%" align="center" bgcolor="#f9f9f9">
        <tr bgcolor="#3c0768ff">
            <th><font color="white">Field</font></th>
            <th><font color="white">Value</font></th>
        </tr>
        <tr>
            <td><b>Name:</b></td>
            <td><?php echo $_SESSION['auth']['name']; ?></td>
        </tr>
        <tr>
            <td><b>Email:</b></td>
            <td><?php echo $_SESSION['auth']['email']; ?></td>
        </tr>
    </table>
</body>
</html>
















<?php include "inc/footer.php"; ?>