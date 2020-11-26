<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://www.php.net/manual/pt_BR/install.windows.php"><img src="https://travis-ci.org/laravel/framework.svg" alt="PHP Download"></a>
<a href="https://laravel.com/docs/8.x/installation"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Laravel Download"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre o projeto

Esse projeto tem a finalidade de ser um gerenciador de tarefas, onde você pode criar o que foi feito, e ainda tem tratamento de hierarquia, onde o usuário administrador pode visualizar tudo o que foi cadastrado, e o usuário não administrador visualiza apenas o que está no nome dele. Fiz também uma página para visualização dos serviços que o usuário atual atribuiu para algum outro, se houver. Mas que não permite a edição de nenhum dado da tarefa. Apenas o usuário correspondente ao serviço cadastrado pode alterar.

## Como visualizar

Para visualizar o projeto, você deve ter o PHP e o Laravel instalados em seu computador (Links acima com a documentação da instalação)
Comando laravel dentro do cmd | composer global require laravel/installer
E utilizar o comando php artisan migrate, para criar o seu primeiro usuario com e-mail: biel.caramatti180@gmail.com e senha 12345678.
Caso queira alterar algum desses dados, pode-se alterar dentro da pasta Seeds dev-pro-final\database\seeds, e alterar no arquivo "UserSeeders", ou criar com essa seed mesmo e editar dentro do próprio projeto, no botão de editar dados.

Crie um banco de dados dentro do phpmyadmin com o nome de login_dev_pro.

Depois de seguir os passos acima. Já dentro do seu IDE, deve-se utilizar o seguinte comando para abertura do servidor: php artisan serve. E por fim, copiar e colar a URL no seu navegador de preferência

O projeto está sem a base de dados, então em caso de teste, podem criar os próprios usuários e senhas depois de criar as tabelas com o comando php artisan migrate.
