git init

https://phpunit.readthedocs.io/en/9.5/installation.html

composer.init

composer require phpunit/phpunit --dev

composer dumpautoload

phpunit --bootstrap=vendor/autoload.php tests/MyFirstTest.php

-> ./vendor/bin/phpunit tests/MyFirstTest.php

./vendor/bin/phpunit tests/ProductDBTest.php --testdox --colors --bootstrap=tests/bootstrap.php

--debug
--verbose
--colors
