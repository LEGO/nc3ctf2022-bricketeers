# Kollisionsnissen

Points: 200

> Nissebanditten har opgraderet til et dobbelt nisseinput.
> Opgaven kan tilgås her "tryhackme.com/jr/webopgaver2022". Start derefter maskinen og få tildelt dens IP-adresse. Opgaven kører på port 8083 f.eks. http://10.10.102.76:8083/.

## Walk through

Once more, there's a show code button but this time there's two inputs!  
Let's check the code:

```php
<!DOCTYPE html>
<html lang="en">
<title></title>

<body>
<div id="phpbox3">
    <form method="POST">
    <p> <input type="text" name="input1" required>
    <input type="text" name="input2" required>
      <button type="submit">Submit</button></p>
    </form>
</div>

<?php

require 'flag.php';
if (isset($_POST['input1']) and isset($_POST['input2'])) {
    $b = $_POST['input1'];
    $p = $_POST['input2'];

    echo "<p>Input1 = " . $b . "</p>";
        echo "<p>Input2 = " . $p . "</p>";

    $hb = hash('sha256', $b);
    $hp = hash('sha256', $p);


    if($b == $p) {
        echo "<span style='color:red;'>Forkert</span>";
    }

    else if(hash('sha256', $b)  === hash('sha256', $p))
    {
        HvorErMitFlag();
    }
    else if(hash('md5', $b)  === substr(hash('sha1', $p),-strlen(hash('md5', $b))) )
        {
        HvorErMitFlag();
        }
    else if(hash('sha1', $b)  === substr(hash('sha256', $p),-strlen(hash('sha1', $b))) )
        {
                HvorErMitFlag();
        }
    else if(substr(hash('sha256', $b),strlen(hash('md5', $b)))  === substr(hash('sha256', $p),-strlen(hash('md5', $p))) )
        {
                HvorErMitFlag();
        }
    else {
        echo "<span style='color:red;'>Stadig forkert</span>";
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

Hmm, so hash collisions.  
A lot of weird compares using substrings.

md5 length: 32
sha1 length: 40
sha2 length: 64

Probably not very feasable to hit any of those collisions, there must be another way.  
After some testing, it seems `hash()` doesn't really like getting arrays instead of strings.  
Comparing two identical error messages, instead of hashes, will give us the flag.  

So, let us simply send array data instead of string data:  
`input1[]=hest&input2[]=ko`

Worked like a charm and the flag is: `nc3{Du_fandt_den_rigtige_type}`

## Almost too easy, right?

I did not just sit down and end up with the above solution.  
This task took me deep into a near depression. I have tried so many different, dumb things, including trying to create those collisions!