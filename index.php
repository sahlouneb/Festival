<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" 
    integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"
    integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
    <title>C'est la fête au village</title>
</head>
<body>
<?PHP
        



        include "fonction.php";

      echo ' <form  method="POST" action="'.$_SERVER['PHP_SELF'].'" class="form-control">
           
            <label for="lastname_user">Nom</label>
            <input type="text" id="lastname_user" name="lastname_user" required class="form-control">
            <br />
            <label for="firstname_user">Prenom</label>
            <input type="text" id="firstname_user" name="firstname_user" required class="form-control">
            <br />
            <label for="mail">Email</label>
            <input type="email" id="mail_user" name="mail_user" required class="form-control">
            <br />
            <label for="mdp">Mot de passe</label>
            <input type="password id="pass_user" name="pass_user" required class="form-control">
            <br />
            <label for="mdp2">Verification du mot de passe</label>
            <input type="text" id="pass2" name="pass_user" required class="form-control">
            <br />

            <label for="dep">Departement de votre domicile principal</label>';

            echo '<select name="departement_user"  id="departement_user" class="form-control">';
            $connect = maConnection::getInstance();
            var_dump($connect);
            $rq = " SELECT  * FROM departements ";
            var_dump($rq);
            $state = $connect->prepare($rq);
            $state->execute();
            echo var_dump($state);

            echo '<option value="" >Choisir un Département</option>';

            while( $ligne = $state->fetch())
            {
                var_dump($ligne);
                if($ligne["id_dep"] == $_POST["dep"])
                {
                    echo '<option value="'.$ligne["id_dep"].'" selected="selected" >'.$ligne["Name"].'</option>';
                }
                else
                {
                    echo '<option value="'.$ligne["id_dep"].'" >'.$ligne["Name"].'</option>';
                }
            }
            echo' </select>
            <label for="age_user">Age</label>
            <input type="text" id="age_user" name="age_user" required class="form-control">
            <input type="submit" id="submit" name="submit" value="VALIDER"required class="btn btn-success">';
            
            
            
            

        
        
        echo "</form>";

?> 
<?php
        if($_POST){

            $pdo = maConnection::getInstance();

            if(isset($_POST["submit"]))
            {   
                    $result =$pdo->exec("INSERT INTO candidats ( lastname_user, firstname_user, mail_user, pass_user, departement_user, age_user) VALUES ('$_POST[lastname_user]', '$_POST[firstname_user]' , 
                    '$_POST[mail_user]', '$_POST[pass_user]','$_POST[departement_user]', '$_POST[age_user]')");

                    
                    //  echo '<div style="background: green; padding: 10px; ">Votre inscription à bien été validée, nous allons vous contacter prochainement</div>';
                     
    
    
    
    
            }
    



        }



?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
 integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</body>
</html