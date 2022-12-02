# Assignment
```txt
Der er vist noget galt med det her flag. Rygtet siger at matematikdrillenissen har været på spil.

Men mon ikke man kan finde den primære besked iblandt de mange tal?

4E 43 4E 43 33 33 69 7B 79 20 73 48 62 76 65 73 65 61 6B 64 65 72 73 5F 72 6E 74 20 69 65 72 72 
6B 73 61 61 73 5F 20 6E 65 65 6C 6E 20 72 69 5F 6C 20 6E 69 6B 6A 69 64 61 65 65 75 6E 6C 72 20 
20 20 61 5F 6C 65 74 75 69 64 72 20 64 20 64 65 65 6D 72 6E 20 61 69 74 74 5F 6C 61 65 6C 6C 6D 
65 70 20 61 2C 72 6F 69 74 20 67 6D 69 74 64 20 73 61 65 6D 6B 74 61 20 20 74 64 76 65 72 65 6C 
6D 69 64 3F 61 6C 20 74 6C 3F 61 3F 69 65 6C 6B 72 6C 3A 69 65 7D 

```

Converting from hex in cyberchef yields the following string
`NCNC33i{y sHbveseakders_rnt ierrksaas_ neeln ri_l nikjidaeeunlr   a_letuidr d deemrn aitt_laellmep a,roit gmitd saemkta  tdverelmid?al tl?a?ielkrl:ie}`

The assignment hints towards primenumbers.
Knowing that the first few primes are 2,3,5 highlights that it might be about the position in the string.

0 = n
1 = c
2 = n
3 = c
4 = 3
5 = 3

Gives us the start of the flag `nc3{` which is what we are looking for.


# Solution
```csharp
var input = "78 67 78 67 51 51 105 123 121 32 115 72 98 118 101 115 101 97 107 100 101 114 115 95 114 110 116 32 105 101 114 114 107 115 97 97 115 95 32 110 101 101 108 110 32 114 105 95 108 32 110 105 107 106 105 100 97 101 101 117 110 108 114 32 32 32 97 95 108 101 116 117 105 100 114 32 100 32 100 101 101 109 114 110 32 97 105 116 116 95 108 97 101 108 108 109 101 112 32 97 44 114 111 105 116 32 103 109 105 116 100 32 115 97 101 109 107 116 97 32 32 116 100 118 101 114 101 108 109 105 100 63 97 108 32 116 108 63 97 63 105 101 108 107 114 108 58 105 101 125";
var integers = input.Split(" ").Select(i => int.Parse(i)).ToArray();
for (int i = 0; i < integers.Count(); i++)
{
    if(IsPrime(i))
        Console.Write($"{(char)integers[i]}");
}

bool IsPrime(int number)
{
    if (number == 1) return false;
    if (number == 2) return true;

    var limit = Math.Ceiling(Math.Sqrt(number));

    for (int i = 2; i <= limit; ++i)
        if (number % i == 0)
            return false;
    return true;
}

```

## Flag
`NC3{Hvad_er_en_jul_uden_primtal???}`
