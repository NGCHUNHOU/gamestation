# Gamestation
A plain game news site designed from sratch. Get thing done without framework 
<br><br>
![Gamestation Site Demo](demo.gif)


## Software Packages required 
1. php
2. php extension - pdo and mysqli
2. mysql
3. apache

# Install
## for Windows user
1. install xampp software and then navigate to php folder -> php.ini
2. search for dynamic extension, remove semicolon before extension pdo, mysqli and extension dir to enable pdo mysql extension
3. create and import gamestation database into mysql server 
```
# mysql -uroot -p gamestation < gamestation.sql
```
4. set apache document root to the parent directory of gamestation folder

## for Linux user
1. install packages with apt: php, apache2, php(versionNumber)-mysql mysql-client-(versionNumber) mysql-server
2. enable apache2 rewrite engine 
```
$ a2enmod rewrite
```
3. create and import gamestation database into mysql server 
```
$ mysql -uroot -p gamestation < gamestation.sql
```
4. enable apache2 rewrite engine mod by having the code on site.conf virtual host
```
<Directory /path/to/documentroot>
   Options Indexes FollowSymLinks
   AllowOverride All
   Require all granted
</Directory>
```

# What is Inside ?
1. Home Page with carousel and weekly update table
2. About Page with gamestation photo and sample text
3. News Page with the list of new articles
4. Admin System with webeditor and etc...

# Docker
1. start the site listenning to 5000 web port and 2000 mysql port
```
$ docker run --name gstation -dit -e MYSQL_ROOT_PWD=rootpwd -e MYSQL_USER=username -e MYSQL_USER_PWD=userpassword -e MYSQL_USER_DB=gamestation -p 5000:80 -p 2000:3306 chunhou5741/gamestation 
```
2. restore database otherwise the site cannot initialize without data
```
$ docker exec -it gstation run.sh restore gamestation
```

# License
Gamestation is licensed under Creative Common license. user are able to use, share and build upon the work.
