# Sæt Dig

Points: 198

>Nisserne har glemt hvordan de kommer ind til flaget, der skal vidst sættes nogle ting...
>Opgaven kan tilgås her "tryhackme.com/jr/php2022". Start derefter maskinen og få tildelt dens IP-adresse. Opgaven kører på port 8081 f.eks. http://10.10.102.76:8081/.

## Walk through

When we open the page, we get the following message:
> Hov, GET parameter q mangler. 

Alright, let's add q..

```txt
GET /?q=q HTTP/1.1
```

> Hov, POST parameter q mangler.

Alright, let's change to a post request and add q..

```txt
POST /?q=q HTTP/1.1
Content-Type: application/x-www-form-urlencoded

q=q
```

> Hov, cookie q mangler.

*sigh*

Adding cookie...

```txt
Cookie: q=q
```

> Hov, du skal bruge q browser.

```txt
User-Agent: q
```

> Hov, du skal komme fra q.

Guess what? We add another header..

```txt
x-forwarded-for: q
```

Oh my god, it was the last one!

> Sådan, her er flaget: nc3{http_k4n_alt1d_brug3s!}