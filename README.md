<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## О проекте

Проект написан на Laravel + Vuejs. На главной странице 2 рабочие вкладки - "Добавить запись" и "Все записи"</br>
Обернут проект в докер(nginx, fom, postgresql контейнеры). </br>
Имеется сваггер по ссылке "api/documentation/for/notebook".</br>
Вся структура приложения держится на 5 апи запросах('/api/v1/...'), выполняющимися контроллером расположенном в Notebook/Notebook.php.
