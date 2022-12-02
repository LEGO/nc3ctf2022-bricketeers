# Assignment
```html
<!DOCTYPE html>
<html>
<head>
    <title>Gæt et tal!</title>
</head>
<body>
    Flaget er umuligt at få, bare glem det.
    <form method="post" action="/">
        <input type="text" name="random"><input type="submit" value="Gæt">
    </form>
    <!-- YmVz+GcgP2QzYnVn -->
</body>
</html>
```

The comment is a base64 encoded string that yields `besøg ?d3bug`

going to that page gives us a look into what is going on

```php
 <?php
session_start();
define('CHALLENGE', true);

if(isset($_GET['d3bug'])) {
    die(highlight_file(__FILE__));
}

if(isset($_POST['random'])) {
    $flag = $_POST['random'];

    if($flag !== bin2hex(random_bytes(32))) {
        header("Location: /");
    }

    require_once 'flag.php';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gæt et tal!</title>
</head>
<body>
    <?php
    if(isset($the_flag)) {
        echo "Her er flaget: ", $the_flag;
    } else {
        echo 'Flaget er umuligt at få, bare glem det.';
    }
    ?>

    <form method="post" action="/">
        <input type="text" name="random"><input type="submit" value="Gæt">
    </form>
    <!-- YmVz+GcgP2QzYnVn -->
</body>
</html>
1
```

Going to `/flag` yields a string, that doesnt appear to be anything. 
`Du fandt flaget! Her er det: Q2JWM0hNZWliazBEMFZRZDlvdEFGWVBRbXo5NTViSXUxc1M2bFI5UmZ6TlZaNjBhdjRma1phV21jWGZZTUgwdFBk`
A redherring perhaps... or a string that is decoded behinds the scenes.

What we do see is that if we get the random number wrong, we are redirected with a header, but not till after the page reloads

Not following the redirect gives us the flag.
# Flag
nc3{Hov hov! Ikke snyde!}
