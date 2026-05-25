FROM php:8.2-apache

# Outils de base + extensions PHP utiles (pdo_mysql au cas où la BDD soit branchée plus tard)
RUN apt-get update \
 && apt-get install -y --no-install-recommends libzip-dev unzip \
 && docker-php-ext-install pdo_mysql zip \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Activer mod_rewrite pour les .htaccess (front controller + URL propres)
RUN a2enmod rewrite

# DocumentRoot : on pointe directement sur /public pour servir le site à la racine
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Autoriser les .htaccess (AllowOverride All) sur /var/www
RUN printf '<Directory /var/www/>\n    AllowOverride All\n    Require all granted\n</Directory>\n' > /etc/apache2/conf-available/override.conf \
 && a2enconf override

# Copie de l'application
WORKDIR /var/www/html
COPY . /var/www/html/

# Permissions raisonnables
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
