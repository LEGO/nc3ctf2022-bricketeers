# To be xor not to be?

Points: 135

> To be xor not to be?
>
> [to_be_xor_to_be](./to_be_xor_to_be)

## Walk through

Finally a reversing challenge! Something I am terribly bad at but eager to improve.  
Title suggests we need to do some xor magic, based on what the binary does.

I couldn't execute the binary due to too old GLIBC on my VM so I had to upgrade that (no biggie).  
Running the binary asked for a password. I guess first step is to find the password.  

So I fired up radare2 and took at look at main.  
It compares the input with the string `Julemand`.
Tried that, and what do you know, a flag came out. Was that really it?! What about the xors?

*sigh* that really was it.  
It was even in the strings, right after the input password prompt. Like, the first thing anyone (not me I guess) would have tried.  
Thought this one would be a bit harder..

Flag was: `nc3{x0r_Xox_x0R_hvor?}`