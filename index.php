
<?php

    session_start(); // zapocinjanje sesija
    if(isset($_POST['username']) && isset($_POST['password']) ){

        include 'korisnik.php'; // uključujemo 'korisnik.php' u trenutni fajl

        // kupimo podatke
        $usern = $_POST['username'];
        $pass = $_POST['password'];


        // kreiramo korisnika
        $korisnik = new Korisnik(null, $usern, $pass);

       // $odgovor = $korisnik->logovanje($usern, $pass,$conn);
        $odgovor = Korisnik::logovanje($korisnik); //pristup funkcija tipa static

        if($odgovor == true){

            $_SESSION['user_id']=$korisnik->id;
            header('Location: home.php');
            exit();
        }
        else{
            ?>
            <html>
                <style>
                    #obavestenje1{
                    position: fixed;
                    /*z-index: 999;*/
                    top:70;
                    color:red;
                    }
                    #obavestenje2{
                        position:fixed;
                        color:red;
                        top:100;
                    }
            
                
                </style>

                <h5 id = obavestenje1>Neuspešna prijava </h5>
                <h7 id = obavestenje2> Korisnicko ime ili šifra nisu korektni !</h7>

            </html>

            <?php
        }
       


    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>FON: Zakazivanje kolokvijuma</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="login-form">
        <div class="main-div card shadow-lg p-4">
            <h2 class="text-center">Prijava</h2>
            <form method="POST" action="#">
                <div class="form-group">
                    <label for="username">Korisničko ime</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4" name="submit">Prijavi se</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
