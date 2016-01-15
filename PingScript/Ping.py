#! /usr/bin/env python

import sys
from scapy.all import sr1,IP,ICMP

vars = dict()
 
with open("Ping.txt") as file:
    for line in file:
        eq_index = line.find('=')
        var_name = line[:eq_index].strip()
        number = str(line[eq_index + 1:].strip())
        vars[var_name]=number


p=sr1(IP(dst=vars["Destination"])/ICMP()/vars["Payload"])
	if p: p.show()
