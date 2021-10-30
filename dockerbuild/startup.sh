#!/bin/sh
sed -i 's/#LoadModule\ rewrite_module/LoadModule\ rewrite_module/' /etc/apache2/httpd.conf
sed -i 's/#LoadModule\ deflate_module/LoadModule\ deflate_module/' /etc/apache2/httpd.conf
sed -i 's/#LoadModule\ expires_module/LoadModule\ expires_module/' /etc/apache2/httpd.conf
sed -i 's/AllowOverride\ None/AllowOverride\ All/' /etc/apache2/httpd.conf
/usr/sbin/httpd -D FOREGROUND &
/init
