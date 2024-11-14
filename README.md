Para utilizar esse projeto, basta ter o php >= 8.1, composer e mysql instalado na maquina. Após isso basta clonar o projeto, copiar o .env.example em um novo
arquivo chamado .env, após isso aponte um banco nas configurações, seguindo esse modelo: 

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=consultas
DB_USERNAME=root
DB_PASSWORD=

Com isso basta gerar a chave da aplicação a partir do comando: php artisan key:generate; 

Após gerar a chave da aplicação crie as tabelas no banco, com o comando: php artisan migrate. O mesmo ira gerar as tabelas com os relacionamentos;

As funcionalidades poderão ser testadas a partir do tinker, utilizando o comando: php artisan tinker

No Tinker, você deve instanciar as controllers antes de poder chamá-las para operações de CRUD:

Para users: $userController = new App\Http\Controllers\UserController;
Para endereços: $addressController = new App\Http\Controllers\AddressController;
Para $appointmentController = new App\Http\Controllers\AppointmentController;


Tutorial Usuário: 

Para criar um usuário, forneça name, cpf, email e telefone:

$request = new Illuminate\Http\Request([
    'name' => 'João Silva',
    'cpf' => '12345678901',
    'email' => 'joao.silva@example.com',
    'telefone' => '123456789'
]);
$userController->create($request);

Para visualizar um usuário específico, forneça o ID do usuário:

$userController->read(1); 

Para atualizar um usuário, forneça o novo valor para os campos desejados e o ID do usuário:

$request = new Illuminate\Http\Request([
    'name' => 'João da Silva',
    'email' => 'joao.dasilva@example.com'
]);
$userController->update($request, 1); (1 representa o id para a função)

Para excluir um usuário, informe o ID:

$userController->delete(1);


Tutorial Endereços: 

Para criar um endereço vinculado a um usuário, preencha os campos e forneça o user_id:

$request = new Illuminate\Http\Request([
    'estado' => 'SP',
    'cidade' => 'São Paulo',
    'rua' => 'Rua A',
    'numero' => '123',
    'cep' => '01234567'
]);

$addressController->create($request, 1); ( 1 representa o id do usuário)


Para visualizar um endereço específico, informe o ID do endereço:
( 1 representa o id do endereço)
$addressController->read(1);  


Para atualizar um endereço, forneça o novo valor para os campos e o ID do endereço:

$request = new Illuminate\Http\Request([
    'cidade' => 'Campinas',
    'estado' => 'SP'
]);
( 1 representa o id do endereço)
$addressController->update($request, 1); 


Para excluir um endereço, informe o ID:
( 1 representa o id do endereço)
$addressController->delete(1);



Tutorial Consultas/Agendamento:


Para criar uma consulta para um paciente, forneça a data_hora e o paciente_id (que representa o id do usuário):

$request = new Illuminate\Http\Request([
    'data_hora' => '2024-12-01 14:00:00'
]);
( 1 representa o id do usuário)
$appointmentController->create($request, 1);


Para visualizar uma consulta específica, informe o ID da consulta:
( 1 representa o id da consulta)
$appointmentController->read(1);

Para reagendar uma consulta, forneça a nova data_hora e o ID da consulta:

$request = new Illuminate\Http\Request([
    'data_hora' => '2024-12-05 09:00:00'
]);
( 1 representa o id da consulta)
$appointmentController->update($request, 1); 


Para cancelar uma consulta, informe o ID da consulta:
( 1 representa o id da consulta)
$appointmentController->cancel(1);

Para confirmar uma consulta, informe o ID da consulta:
( 1 representa o id da consulta)
$appointmentController->confirm(1);

Para excluir uma consulta, informe o ID da consulta:
( 1 representa o id da consulta)
$appointmentController->delete(1);
