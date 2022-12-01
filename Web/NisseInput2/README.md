# NisseInput2

Points: 200

> Nissebanditten er på spil igen, skynd dig at få flaget.
> Opgaven kan tilgås her "tryhackme.com/jr/webopgaver2022". Start derefter maskinen og få tildelt dens IP-adresse. Opgaven kører på port 8082 f.eks. http://10.10.102.76:8082/.


## Walk through

Same as [before](../NisseInput/README.md), there is an input and a show code button.  
Code is php again.  

```php
<!DOCTYPE html>
<html lang="en">
<title></title>

<body>

<div id="phpbox1">
    <form method="post">
    
       <p> <input type="text" name="input" required>
      <button type="submit">Submit</button></p>

    </form>
</div>

<?php
require 'flag.php';

if (isset($_POST['input'])) {

    $secret = $_POST['input'];
    $hash = hash("sha256" , $secret);
    if ( $hash == '0')
    {
        KomMedFlaget();
    } 
    else {
        echo "<p>Forkert</p>";
        
    }
}

?>

<form method="post">
      <p><button type="submit" name="kode">Vis kode</button></p>
</form>



<?php

if(array_key_exists('kode', $_POST)) {
    button1();
}

function button1() {
    show_source("index.php");
}




?>

</body>
</html>
```

So, all we need to do is make the hash output 0, right?

PHP has the wonderful "issue" of type juggling which makes a lot of things equal, even when they don't look the same.  
A great example of this is ANY string that starts with `0e` followed by only numbers. Could be a sha256 hash, right?!

**TIME TO BRUTEFORCE**  
Actually, lets try to google some magic strings first.  
Found this wonderful file on github: https://github.com/spaze/hashes/blob/master/sha256.md  
Using `TyNOQHUS` as the input, generated a valid hash and we got the flag: `nc3{Du_er_jo_typen_der_kan_Jonglere}`