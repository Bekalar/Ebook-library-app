@echo off

if [%2]==[-db] goto rebuildDB
goto :EOF

:rebuildDB
echo "rebuilding database..."
php bin/console doctrine:schema:drop -n -q --force --full-database
del /f .\migrations\*.php
php bin/console make:migration
php bin/console doctrine:migrations:migrate -n -q
php bin/console doctrine:fixtures:load -n -q