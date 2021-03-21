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
3. set apache document root to the parent directory of gamestation folder

## for Linux user
1. install packages with apt: php, apache2, php(versionNumber)-mysql mysql-client-(versionNumber) mysql-server
2. enable apache2 rewrite engine 
```
$ a2enmod rewrite
```
3. enable apache2 rewrite engine mod by having the code on site.conf virtual host
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

# License
Gamestation is licensed under Creative Common license. user are able to use, share and build upon the work.