#!/bin/bash

# IP address for the eth1 interface
sudo ip addr flush dev eth1
sudo ip addr add 10.0.2.10/24 dev eth1
sudo ip route add default via 10.0.2.1

# Updating
sudo apt update && sudo apt upgrade -y

# Bind9 installation
sudo apt install bind9 -y

# Copying a file named.conf.options
sudo cp ~/dns/named.conf.options /etc/bind/named.conf.options

# Copying a file named.conf
sudo cp ~/dns/named.conf /etc/bind/named.conf

# Copying a file realbank.net.db
sudo cp ~/dns/realbank.net.db /etc/bind/

# Checking the operation of the bind9 service
sudo service bind9 status
