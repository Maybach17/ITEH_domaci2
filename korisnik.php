<?php

class Korisnik{
    public $id;
    public $ime;
    public $sifra;

    public function __construct($id=null, $ime=null, $sifra1=null)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->sifra = $sifra1;
    }

    public static function logovanje($korisnik)
    {
        $racunar = 'localhost';
        $sifra = '';
        $baza = 'kolokvijumi';
        $k = 'root';
       
        //kreiranje konekcije i obrada konekcije
        try{
            $konekcija = new mysqli($racunar, $k, $sifra, $baza);
        }
        catch(mysqli_sql_exception $e){
            
            ?>
            <html>
                <style>
                   
                    h4{
                        
                        position: fixed;
                        color:red;
                        top:50;
                        width:50%;
                        text-align: center;
                    }
                </style>
                <h4>Neuspešna konekcija sa bazom korisnika ! </h4>
            </html>
            <?php
            exit();
            
        }

        
        $ime = $konekcija->real_escape_string($korisnik->ime);
        $sifra = $konekcija->real_escape_string($korisnik->sifra);
        $upit = "SELECT * FROM user WHERE username='$ime' AND password='$sifra'";

        $rezultat = $konekcija->query($upit);  

        // obrada rezultata
        if($rezultat->num_rows > 0) {
            return true;
            exit();
        }
        
        return false;

    }

}

?>