#!/bin/bash
# Updating
sudo apt update -y

# Bind9 installation
sudo apt install bind9 -y

# Copying a file named.conf.options
sudo cp ~/DNSpector/DNS/named.conf.options /etc/bind/named.conf.options

# Copying a file named.conf
sudo cp ~/DNSpector/DNS/named.conf /etc/bind/named.conf

# Copying a file realbank.net.db
sudo cp ~/DNSpector/DNS/realbanking.net.db /etc/bind/

# Copying a file 10.10.11.db
sudo cp ~/DNSpector/DNS/10.10.11.db /etc/bind/

# Restart the bind9 service
sudo service bind9 restart

# Checking the operation of the bind9 service
sudo service bind9 status
