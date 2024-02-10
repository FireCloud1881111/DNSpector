#!/bin/bash

# Update
sudo apt update && sudo apt upgrade -y

# Installation MySQL Server
sudo apt install mysql-server -y

# Installation PHP and PHP modules for Apache
sudo apt install php libapache2-mod-php php-mysql -y

# Deleting the index.html file from /var/www/html
sudo rm /var/www/html/index.html

# Copying the index.php file to /var/www/html
sudo cp ~/DNSpector/WWW/index.php /var/www/html/

# Skopiowanie pliku login.php do /var/www/html
sudo cp ~/DNSpector/WWW/login.php /var/www/html/

# Copying the login.php file to /var/www/html
sudo cp ~/DNSpector/WWW/dashboard.php /var/www/html/

# Import of the "realbanking" database into MySQL
sudo mysql -u root realbanking < ~/DNSpector/WWW/realbanking.sql

# Execution of commands in MySQL
sudo mysql -u root <<EOF
CREATE USER 'adminwww'@'localhost' IDENTIFIED BY 'Pa$$w0rd2';
GRANT ALL PRIVILEGES ON realbanking.* TO 'adminwww'@'localhost';
FLUSH PRIVILEGES;
exit
EOF

# Changed DNS address to 10.0.2.10
sudo sed -i 's/nameserver.*/nameserver 10.0.2.10/' /etc/resolv.conf

# Restart Apache2
sudo service apache2 restart

# Restart MySQL
sudo service mysql restart
