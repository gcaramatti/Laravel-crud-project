<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://www.php.net/manual/pt_BR/install.windows.php"><img src="https://travis-ci.org/laravel/framework.svg" alt="PHP Download"></a>
<a href="https://laravel.com/docs/8.x/installation"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Laravel Download"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre o projeto
Importante ressaltar que se trata de um projeto que utiliza a versão 5.8 do Laravel, sendo incompatível com a versão 8.0.2 do PHP.
A versão do PHP utilizada foi a 7.4.9

Esse projeto tem a finalidade de ser um gerenciador de tarefas, onde você pode criar o que foi feito, e ainda tem tratamento de hierarquia, onde o usuário administrador pode visualizar tudo o que foi cadastrado, e o usuário não administrador visualiza apenas o que está no nome dele. Fiz também uma página para visualização dos serviços que o usuário atual atribuiu para algum outro, se houver. Mas que não permite a edição de nenhum dado da tarefa. Apenas o usuário correspondente ao serviço cadastrado pode alterar.

## Como visualizar

Para visualizar o projeto, você deve ter o PHP e o Laravel instalados em seu computador (Links acima com a documentação da instalação)
Comando laravel dentro do cmd | composer global require laravel/installer
Composer update
E utilizar o comando: php artisan migrate para criar as tabelas no banco de dados.
Depois basta utilizar o último comando php artisan serve

Crie um banco de dados dentro do phpmyadmin com o nome de login_dev_pro, ou o que preferir se quiser alterar na .env.

Depois de seguir os passos acima. Já dentro do seu IDE, deve-se utilizar o seguinte comando para abertura do servidor: php artisan serve. E por fim, copiar e colar a URL no seu navegador de preferência

O projeto está sem a base de dados, então em caso de teste, podem criar os próprios usuários e senhas depois de criar as tabelas com o comando php artisan migrate.
