# Bull
📦 Microservices Playground with Symfony 4.

*Current version: coming soon*

[![Build Status](https://travis-ci.org/Clivern/Bull.svg?branch=master)](https://travis-ci.org/Clivern/Bull)

Installation
------------

In order to run this app do the following:

### 1-Minute Install

- Get the application code and install php dependencies and node packages.
```bash
git clone https://github.com/Clivern/Bull.git bull
cd bull
composer install
cp .env.dist .env
```

- Open `.env` and insert your MySQL database credentials. Let's say it will be look like this:
```yaml
DATABASE_URL=mysql://root:root@127.0.0.1:3306/bull
```

- Run the following command to build database tables
```bash
# To Drop The Database (DEV Purposes)
php bin/console doctrine:database:drop --force

# To Create The Database (DEV Purposes)
php bin/console doctrine:database:create

# Generate Migrations Diff (Not Needed Since Latest with The Repo)
php bin/console doctrine:migrations:generate

# To Update The Database Schema
php bin/console doctrine:schema:update --force
```

- Run the following command to seed our database with one user and default configs
```bash
php bin/console doctrine:fixtures:load
```

- We are ready to run our application
```bash
php -S 127.0.0.1:8000 -t public
```

Open your browser and access the `http://127.0.0.1:8000`


Deploy The Application
----------------------
In order to run and deploy this application on production server, Please do the following during installation.

- Check `check.php` page inside public dir by visiting `http://fqdn.com/check.php`

- Delete `check.php` file.
```bash
rm ./public/check.php
```

- Install/Update your vendors and It is required to provide your database credentials.
```bash
composer install --no-dev --optimize-autoloader
```

- Clear your Symfony Cache
```bash
php bin/console cache:clear --env=prod --no-debug --no-warmup
php bin/console cache:warmup --env=prod
```

- Build your database tables and do seeding.
```bash
php bin/console doctrine:schema:update --force
```

- In case you work with LAMP Server, you will need to configure your apache virtual host.
```
<VirtualHost *:80>
    ServerAdmin admin@bull.com
    ServerName bull.com
    ServerAlias www.bull.com
    DocumentRoot /var/www/bull/public
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
        <Directory /var/www/bull/public>
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
        </Directory>
</VirtualHost>
```

- Please don't forgot to add the suitable folder permissions for example
```bash
sudo chown -R clivern:www-data bull
sudo chown -R 775 bull
```

*For More Info*, Please [check symfony docs](https://symfony.com/doc/current/deployment.html)


Misc
----

### Testing

To run test cases:
```bash
make test
```

or if you want to run all checks and make sure all of them passed:
```bash
make ci
```

To fix code style issue, run the following command:

```bash
make syntax-to-fix
make syntax-fix
```

### Changelog

Version 1.0.0:
```
Coming Soon.
```

### Acknowledgements

© 2018, Clivern. Released under the [MIT License](http://www.opensource.org/licenses/mit-license.php).

**Bull** is authored and maintained by [@clivern](http://github.com/clivern).