# Zend\Together


Webseite der Zend\Together-Konferenz.

**Die** Konferenz im deutschsprachigen Raum rund ums ZendFramework


Website of the Zend\Together-conference.

**The** conference in the german-speaking area around the ZendFramework.


# Installation

Beispiel für einen VirtualHost mit Apache2:

    <VirtualHost *>
        ServerName dev.zf-together.com
        DocumentRoot /home/devhost/dev.zf-together.com/public/
        AccessFileName .htaccess

        <Directory /home/devhost/dev.zf-together.com/public/>
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Order allow,deny
            allow from all

            SetEnv APPLICATION_ENV development
        </Directory>
    </VirtualHost>
