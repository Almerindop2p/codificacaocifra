<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        require './_class/Criptografia.php';
        $cripto = new Criptografia();
        // $cripto->gerarCifra(); gerar cifra
        // $cripto->verificarCifra(); // validar a cifra verificando se existe repeticoes
        echo '<pre>';
        print_r( $cripto->encodeCifra("Junior"));
        echo '</pre>';
        echo $cripto->decodeCifra("ZolpRJWoxOBOXitRlHvwKsLx");
        ?>
    </body>
</html>
