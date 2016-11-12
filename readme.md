# Mr.Test

![alt tag](https://github.com/MrRobotTestOrg/Mr.Test/blob/dev/Demo.gif)

## Projeto

Desenvolvimento de uma ferramenta para auxiliar equipes de teste a manterem 
varios projetos (enteprise), com testes funcionais em aplicações web.

## Motivação

Incentivar e incluir pessoas que não gostam de entrar no mundo da codificação
a fundo.

## Instalação

- Composer install
- php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider"
- Configure sua .env
- php artisan migrate:refresh --seed
- Abra http://localhost/mr.test/public/admin

## Tecnologias utilizadas

- Behat (http://behat.org/en/latest/)
- Mink (http://mink.behat.org/en/latest/)
- PhantomJS (http://phantomjs.org/)
- Selenium (http://www.seleniumhq.org/)
- Medoo (http://medoo.in/)
- Laravel Backpack (https://github.com/Laravel-Backpack)
- Vuejs (https://vuejs.org/)