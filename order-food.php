<?php
    
    $jelovnik = json_decode($_POST['jelovnik'], true);
    $intSupaID = $_POST['supa'];
    $intJeloID = $_POST['gjelo'];
    $intSalataID = $_POST['salata'];
    $intDesertID = $_POST['desert'];
    $intGrams = (int)$_POST['grams'];

    

    $supa = $jelovnik['supa'][$intSupaID];
    echo '<b>Supa ili Corba:</b> ' . $supa['name'] . ', Cena: ' . $supa['price'] . '<br>';

    $jelo = $jelovnik['jelo'][$intJeloID];
    echo '<b>Glavno Jelo:</b> ' . $jelo['name'] . ', Cena: ' . $jelo['price'] . '<br>';
    

    $salata = $jelovnik['salata'][$intSalataID];
    echo '<b>Salata:</b> ' . $salata['name'] . ', Cena: ' . $salata['price'] . '<br>';

    $desert = $jelovnik['desert'][$intDesertID];
    echo '<b>Desert:</b> ' . $desert['name'] . ', Cena: ' . $desert['price'];

    echo '<br>';

    $price = $jelo['price'] * $intGrams / 1000;

    $totalPrice = $price + $soup['price'] + $salata['price'] + $desert['price'];

    echo 'Your Price: ' . $totalPrice;
?>
    