# Framework MVC con PHP

Este Framework hace uso de URLs amigables si utiliza XAMPP o LAMPP normalmente ya vienen activadas por defecto, en el caso de usar Apache2 en GNU/Linux será necesario activarlas.

**Activar URLs amigables en GNU/Linux**

Activamos el modulo rewrite
> sudo a2enmod rewrite

Reiniciamos Apache2
> sudo systemctl restart apache2

Configuramos el servidor para aceptar archivos .htaccess.
Accedemos al siguiente archivo con un editor de texto por ejemplo nano
> sudo nano /etc/apache2/sites-available/000-default.conf

Dentro de la etiqueta </VirtualHost> despues de la linea **DocumentRoot /var/www/html** pegamos el siguiente codigo.

	<Directory /var/www/html>
		Options Indexes FollowSymLinks MultiViews
		AllowOverride All
		Require all granted
	</Directory>

Reiniciamos Apache2
> sudo systemctl restart apache2

con esta configuración ya deberíamos poder hacer uso de las URLs 