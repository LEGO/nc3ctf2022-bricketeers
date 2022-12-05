# Assignment
You are given huge JPEG (2.8 MB) with a hint of a hidden message in the image.

Loading the image into [Aperi'Solve](https://www.aperisolve.com), it will give you a lot of information e.g. it contains 7 sub images but more interesting is:

> **Common password(s):** Nissebanden, natskyggebryg, Flæskesteg, guldøl, flæskesteg, FLÆSKESTEG, NATSKYGGEBRYG, fokker, little, GULDØL, NISSEBANDEN, julegaver, JULEGAVER, _nor_VAN_gogh}, nc3{, a_RAMbrandt, IKKE julegaver, somethingsecret.txt, bmMze25vdF9leGFjdGx5, nissebanden, null

Already here you can smell the flag with: `_nor_VAN_gogh}`, `nc3{` and `a_RAMbrandt`, but _not exactly_ as the flag is **NOT** `nc3{a_RAMbrandt_nor_VAN_gogh}`.

There is however also a base64 encoded string `bmMze25vdF9leGFjdGx5` which decoded is `nc3{not_exactly` and if we combine the information from above we get:

# Flag
`nc3{not_exactlya_RAMbrandt_nor_VAN_gogh}`
