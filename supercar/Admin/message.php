<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages Client</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<main>

    <table>
        <thead>
        <a class="link back"  href="admin.php"> Admin</a>
<br>
</br>
        <?php
        include_once "connect_ddb.php";
        //liste des utilisateurs
        $sql= "SELECT nom, email, commentaire FROM contact";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            //afficher les utilisateurs
       ?>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>commentaire</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($row = $result->fetch_assoc()){

       ?>    
            <tr>
                <td><?php echo $row["nom"];?></td>
                <td><?php echo $row["email"];?></td>
                <td><?php echo $row["commentaire"];?></td>
            </tr>

            <?php
            }
        }
        else{
            echo " <p class='message'>0 utilisateur présent!</p>";
        }
           ?>
        </tbody>
    </table>
</main>

</body>
</html>