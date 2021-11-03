create database db_contados20212t;

-- Criando Databases --
show databases;
-- Permite visualizar os databases existentens -- 

-- Permite selecionar o database que será utilizado -- 
use db_contados20212t;






-- Criando  Tabela --
create table tblCliente 
(
  idCliente int not null auto_increment primary key,
  nome varchar(100)  not null,
  rg varchar(15) not null,
  cpf varchar (20) not null,
  telefone varchar (20),
  celular varchar (20),
  email varchar(60),
  obs text
); 

-- Mostrando a criação das Tabelas -- 
show tables;

-- Permite visualizar os Atributos -- 
select * from tblCliente;

use db_contados20212t;

/* Permite visualizar a estrutura criada da tabela*/
desc tblcliente;

select * from tblcliente;

use db_contados20212t;

 insert into tblcliente ( nome, rg, cpf, telefone, celular, email, obs ) values ('Luan', '312312312312', '43123131231231', '4214412', '11960220071', 'dasmnjdasnda@jdsjfnsdjfs.com', 'fdsgggds' );
 
	