# Assignment
You are given a zip file, containing a text file and another zip file
The secondary zip file is password protected, but contains a `.pcap` file.

The text file contains 
`"udali menya"aDtZjWevoYiXT4nxCQC43PuD5mmkVvJQcnz5CTyj2mgzxEx4J`

The ending `aDtZjWevoYiXT4nxCQC43PuD5mmkVvJQcnz5CTyj2mgzxEx4J` appears to be a base58 encoded string
Which yields `Koden til zipfilen er: brunk@gerMUMS`.

With the password in hand, we can go look at the pcap file.
The pcap file contains 26 TCP packets from 192.168.0.1 to 192.168.0.2 all to the port "13337".

Looking at the byte values for all packets, the packet timestamp values appears to contain ascii characters
![image](https://user-images.githubusercontent.com/5294032/205256299-6a9345c4-8590-4d7d-a00a-b8b12ae79e47.png)

Looking at all of them yields

# Flag
`nc3{D0nt_dro9_10g1c_60m65}`
