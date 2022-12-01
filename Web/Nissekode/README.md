# NisseInput2

Points: 199

> Nisserne har desværre mistet deres kode... Kan du ikke lige hjælpe med at finde en ny?
> Opgaven kan tilgås her "tryhackme.com/jr/php2022". Start derefter maskinen og få tildelt dens IP-adresse. Opgaven kører på port 8082 f.eks. http://10.10.102.76:8082/.

## Walk through

Yet another one-input form.

Checking the source has an interesting comment:

```html
   <!-- gniggubed rof gubed? -->
```

Reverse and we get:
> ?debug for debugging

Trying to add `?debug` to the url and we get the source! That should help.

```php
 <?php
session_start();

define('CHALLENGE', true);

if(isset($_GET['debug'])) {
    die(highlight_file(__FILE__));
}

function invalid() {
    $_SESSION['err'] = "Ugyldig kode.";
    header("Location: /");
    die();
}

if(isset($_POST['serienummer'])) {
    $chunks = explode("-", $_POST['serienummer']);

    if(sizeof($chunks) !== 4) {
        invalid();
    }

    foreach($chunks as $chunk) {
        if(strlen($chunk) !== 4) {
            invalid();
        }
    }

    list($a, $b, $c, $d) = $chunks;

    $s = 0;
    for($i = 0; $i < 4; $i++) {
        $s += intval($a[$i]);
    }

    if(!(19 <= $s && $s <= 21)) {
         invalid();
    }

    $s = intval($b);
    if($s <= 0x256 || !(65 <= ord($b[3]) && ord($b[3]) <= 70)) {
        invalid();
    }
    
    $v = intval($c);
    $s = 1;
    while($v > 0) {
        $s *= $v % 10;
        $v = intdiv($v, 10);
    }

    if(!(0x005a <= $s || $s <= 0x1337)) {
        invalid();
    }

    if($a == $c) {
        invalid();
    }

    for($i = 0; $i < sizeof($chunks); $i++) {
        $chunk = $chunks[$i];
        $s = 0;
        foreach(str_split($chunk) as $w) {
            $s += ord($w);
        }

        $cb = intval($chunks[3][$i]);
        if($s & 1 != $cb) {
            invalid();
        }
    }
    
    require_once 'flag.php';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Indtast korrekt serienummer!</title>
</head>
<body>
    <?php
    if(isset($_SESSION['err'])) {
        echo $_SESSION['err'];
        unset($_SESSION['err']);
    }

    if(isset($the_flag)) {
        echo $the_flag;
    }
    ?>
    <form method="post" action="/">
    Angiv serienummer: <input type="text" name="serienummer"><input type="submit" value="Tjek">
    </form>
    <!-- gniggubed rof gubed? -->
</body>
</html>
1
```

Alright, we need to reverse the logic and come up with a valid serial number. Fun..

```php
$chunks = explode("-", $_POST['serienummer']);

if(sizeof($chunks) !== 4) {
    invalid();
}
```

Alright, so it splits on `-` and needs to have 4 chunks.

```php
    foreach($chunks as $chunk) {
        if(strlen($chunk) !== 4) {
            invalid();
        }
    }
```

Each chunk also needs to be 4 characters long.

```php
    list($a, $b, $c, $d) = $chunks;

    $s = 0;
    for($i = 0; $i < 4; $i++) {
        $s += intval($a[$i]);
    }

    if(!(19 <= $s && $s <= 21)) {
         invalid();
    }
```

Now it gets exciting!  
First chunk is being checked here only. It needs to be 20 if you add up all the numbers.
Easy, so the first chunk is `5555`

```php
    $s = intval($b);
    if($s <= 0x256 || !(65 <= ord($b[3]) && ord($b[3]) <= 70)) {
        invalid();
    }
```

This was a bit harder for me but basically if it reads the int value of the chunk, it needs to be higher than 0x256 which is 598.  
Furthermore, the 4th value needs to be a character that has a bytevalue between 65 and 70.  
`E` is 69 (*nice*) so lets roll with that.  
Can't be all `E`'s though, they don't have int values!  
So, `600E` as the second chunk, fits the requirements.

The last two chunks I already had filled with `1`'s and that worked. No need to bother looking at those checks then!

Flag is: `nc3{Why s0 s3r14l! 4f3fa3}`