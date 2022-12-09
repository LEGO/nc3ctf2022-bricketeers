# Assignment
Det er nissen der står herude og banker på.

You get 2 files;
* banke-paa
* banke-paa.pcapng

the first file is an elf-file, so we try to run it
`./banke-paa [kodeord [ip adresse]`

The pcap files contains a lot of icmp packets, probably references by the "banker" part of the assignment.
we know that flags start med `nc3{` so we try that towards `127.0.0.1` which is the ip address of the icmp packets

it spits out
```
Knock: 31357
Knock: 31415
Knock: 31528
Knock: 31361
```

which fits with the first 4 icmp packet, ports. - we are on to something.
Brute force to find the correct port and move on

`./banke-paa 'nc3{julemanden banker aldrig paa!}' 127.0.0.1`

# Flag
nc3{julemanden banker aldrig paa!}
