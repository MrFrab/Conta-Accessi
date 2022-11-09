<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@700&display=swap" rel="stylesheet">
  <style>
    body{
      background-color: gray;
      color: white;
      font-family: 'Nanum Gothic', sans-serif;
    }
    .main {
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>

<body>
  <h1 style="text-align:center; margin-top:50px">Contatore di accessi con PHP Ajax</h1>
  <p style="text-align:center;">(refresha la pagina)</p>

  <div class="main">
  <?php



  $nomefile = "accessi.txt";           // file dove si memorizza il totale accessi
  if (file_exists($nomefile)) {              // verifica dell'esistenza del file
    $idfile = fopen($nomefile, "r+");       // se esiste gia viene aperto in lettura
    // se non si riesce ad aprirlo viene creato un messaggio di errore
    if (!$idfile)
      die($msg = "il file &nomefile non ?stato aperto <BR>");
    // se il file viene aperto si leggono dieci caratteri e messi in $conta_accessi
    $conta_accessi = (int)fread($idfile, 10);     // il casting da stringa in intero
    fclose($idfile);                              // chiusura file
  } else {
    // se il file non esiste viene creato e aperto contemporaneamente
    $idfile = fopen($nomefile, "w+");
    if (!$idfile)
      die($msg = "il file &nomefile non e' stato aperto<BR>");
    // se il file viene aperto correttamente 
    $conta_accessi = 0;                     // si inizializza la variabile conta_accessi
    fclose($idfile);                        // chiusura del file
  }

  $conta_accessi++;                         // incremento contatore di accessi  
  $idfile = fopen($nomefile, "w+");         // apertura del file in scrittura     
  if (!$idfile)
    die($msg = "il file &nomefile non e' stato aperto<BR>");
  // se il file aperto correttamente si scrive nel file del contatore di accessi
  fwrite($idfile, $conta_accessi);
  fclose($idfile);                          // chiusura file


  if ($conta_accessi < 10) {
    if ($conta_accessi == 1) {
      echo "<img class='img' src='1.gif'>";
    }
    if ($conta_accessi == 2) {
      echo "<img class='img' src='2.gif'>";
    }
    if ($conta_accessi == 3) {
      echo "<img class='img' src='3.gif'>";
    }
    if ($conta_accessi == 4) {
      echo "<img class='img' src='4.gif'>";
    }
    if ($conta_accessi == 5) {
      echo "<img class='img' src='5.gif'>";
    }
    if ($conta_accessi == 6) {
      echo "<img class='img' src='6.gif'>";
    }
    if ($conta_accessi == 7) {
      echo "<img class='img' src='7.gif'>";
    }
    if ($conta_accessi == 8) {
      echo "<img class='img' src='8.gif'>";
    }
    if ($conta_accessi == 9) {
      echo "<img class='img' src='9.gif'>";
    }
  } else {
    $arr = str_split($conta_accessi, strlen($conta_accessi) / 2);


    $primacifra = $arr[0];
    $secondacifra = $arr[1];
    if ($conta_accessi > 99) {
      $terzacifra = $arr[2];
    }
    if ($conta_accessi > 999) {
      $quartacifra = $arr[3];
    }


    echo '<img src="' . $primacifra . '.gif">';
    echo '<img src="' . $secondacifra . '.gif">';
    if ($conta_accessi > 99) {
      echo '<img src="' . $terzacifra . '.gif">';
    }
    if ($conta_accessi > 999) {
      echo '<img src="' . $quartacifra . '.gif">';
    }
  }




  // visualizza il contatore accessi  
  echo ('<div style="display:flex; align-items: center;
  flex-direction: column; padding:50px">
        <p>Aumenta<a href=contaAccessi.php><img src="piu.png"  width=41 height=30 border=0></a></font></p>
        <p>Diminuisci<a href=azzera.php><img src="meno.webp"  width=41 height=30 border=0></a></font></p>
        </div>');
  // echo ('<p>Aumenta<a href=contaAccessi.php><img src="piu.webp"  width=41 height=30 border=0></a></font></p>');
  // echo ('<p>Diminuisci<a href=azzera.php><img src="meno.webp"  width=41 height=30 border=0></a></font></p>');
  ?>
</body>
</div>
</html>
