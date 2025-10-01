FROM php:7.4-apache

# 安裝必要的PHP擴展
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 啟用Apache mod_rewrite
RUN a2enmod rewrite

# 設置工作目錄
WORKDIR /var/www/html

# 複製專案文件
COPY . /var/www/html/

# 設置Apache文檔根目錄
ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 設置權限
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# 創建健康檢查文件
RUN echo "<?php echo 'OK'; ?>" > /var/www/html/health.php

# 暴露端口 (Railway會自動設置PORT環境變數)
EXPOSE 80

# 創建啟動腳本來處理動態端口
RUN echo '#!/bin/bash\n\
PORT=${PORT:-80}\n\
echo "Listen $PORT" > /etc/apache2/ports.conf\n\
sed -i "s/Listen 80/Listen $PORT/" /etc/apache2/sites-available/000-default.conf\n\
exec apache2-foreground' > /usr/local/bin/start.sh && chmod +x /usr/local/bin/start.sh

# 啟動Apache
CMD ["/usr/local/bin/start.sh"]
