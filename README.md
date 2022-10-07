Luego de Descargar el proyecto, ejecutar los siguientes comandos en la consola, si esta en linux favor agregar la palabra sudo al principio de cada comando


1) composer install
2) php bin/console doctrine:database:create (para crear la bd)
3) php bin/console doctrine:schema:update --force (para crear tablas)
4) php bin/console doctrine:fixtures:load

Puedes ejecutar estos comandos tambien para la migracion de la data

    1) php bin/console make:migration php
    2) bin/console doctrine:migrations:migrate

Finalmente ejecutar lo siguiente en la consola

symfony server:start



Cordialmente, <br>
Benjamin Perez.