Тестовое задание для i2crm
==========================

Установка
---------

1. Притянуть зависимости
`composer install --no-dev`

2. Добавить файл конфигурации базы данных в config/db.php

```
<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=<host>};dbname=<dbname>',
    'username' => '<user>',
    'password' => '<pass>',
    'charset' => 'utf8',
];
```

3. Применить миграции

`php yii migrate`

4. Запустить cron

`php yii cron`

Консольные команды:

Обновить репозитории пользователей

`php yii repository/update` 