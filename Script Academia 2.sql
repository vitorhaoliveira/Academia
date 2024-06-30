Create database bdAcademia1;
use bdAcademia1 ;

create table tblogin(
login varchar(30) not null primary Key,
senha varchar(30) not null);

Create table tbAluno(
idAluno int primary key auto_increment
, nomeAluno varchar(40) not null
, cpf char (15)
, endereco varchar(40)
, bairro varchar(40)
, cidade varchar (30)
, estado char(2)
, cep char(9)
, telefone char(14)
, celular char(15)
, email varchar(40)
,senha varchar(12)
, peso decimal(6,3)
, altura decimal(3,2)
, imc decimal(5,3)
, statusAluno varchar(10)
, obs varchar(100)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

create table tbProfessor(
idProfessor int primary key auto_increment
, nomeProfessor varchar(40) not null
, telefone char(14)
, celular char(15)
, email varchar(40)
,senha varchar(12)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

create table tbTurma(
idTurma int primary key auto_increment
, descricao varchar(30)
, horarioInicio time
, horarioTermino time
, idProfessor int 
, foreign key (idProfessor) references tbProfessor(idprofessor) on delete cascade
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


create table tbMatricula(
idMatricula  int primary key auto_increment
, dataMatricula datetime
, idAluno int
, idTurma int
, foreign key (idAluno) references tbAluno(idAluno) on delete cascade
, foreign key (idTurma) references tbTurma(idTurma) on delete cascade
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO tblogin(login, senha) VALUES ('adm', '123');

INSERT INTO tbAluno(nomeAluno, cpf, endereco, bairro, cidade, estado, cep, telefone, celular, email, senha, peso, altura, imc, statusAluno, obs) 
VALUES ('nome3', '111.111.111-11', 'rua', 'bairro', 'cid', 'sp', '11111-111', '(11) 1111-1111', '(11) 99855-8723', 'vipvinigame2@gmail.com', '123123', 103.900, 1.70, 31, 'Ativo', 'obs');

INSERT INTO tbAluno(nomeAluno, cpf, endereco, bairro, cidade, estado, cep, telefone, celular, email, senha, peso, altura, imc, statusAluno, obs) 
VALUES ('João Silva', '222.222.222-22', 'Rua A', 'Centro', 'São Paulo', 'SP', '01234-567', '(11) 2222-2222', '(11) 98765-4321', 'joao.silva@email.com', 'senha123', 80.5, 1.75, 26, 'Ativo', 'Observações sobre João Silva');

INSERT INTO tbAluno(nomeAluno, cpf, endereco, bairro, cidade, estado, cep, telefone, celular, email, senha, peso, altura, imc, statusAluno, obs) 
VALUES ('Maria Souza', '333.333.333-33', 'Av. B', 'Jardins', 'Rio de Janeiro', 'RJ', '98765-432', '(21) 3333-3333', '(21) 99999-8888', 'maria.souza@email.com', 'senha456', 65.2, 1.68, 23, 'Inativo', 'Maria está de férias até agosto.');

INSERT INTO tbAluno(nomeAluno, cpf, endereco, bairro, cidade, estado, cep, telefone, celular, email, senha, peso, altura, imc, statusAluno, obs) 
VALUES ('Pedro Oliveira', '444.444.444-44', 'Rua C', 'Boa Vista', 'Porto Alegre', 'RS', '87654-321', '(51) 4444-4444', '(51) 98765-4321', 'pedro.oliveira@email.com', 'senha789', 95.8, 1.80, 29, 'Ativo', 'Pedro iniciou treinos de musculação.');

INSERT INTO tbProfessor(nomeProfessor, telefone, celular, email, senha) 
VALUES ('João Silva', '(11) 1234-5678', '(11) 91234-5678', 'joao.silva@example.com', 'senha123');

INSERT INTO tbProfessor(nomeProfessor, telefone, celular, email, senha) 
VALUES ('Prof. Carlos', '(11) 3333-3333', '(11) 77777-7777', 'carlos.prof@email.com', 'senha789');

INSERT INTO tbProfessor(nomeProfessor, telefone, celular, email, senha) 
VALUES ('Prof. Ana', '(21) 4444-4444', '(21) 99999-9999', 'ana.prof@email.com', 'senhaabc');

INSERT INTO tbTurma(descricao, horarioInicio, horarioTermino, idProfessor) 
VALUES ('Turma de Musculação', '08:00:00', '10:00:00', 2); 

INSERT INTO tbTurma(descricao, horarioInicio, horarioTermino, idProfessor) 
VALUES ('Turma de Natação', '15:00:00', '17:00:00', 3);  

INSERT INTO tbMatricula(dataMatricula, idAluno, idTurma) 
VALUES (NOW(), 1, 1);   

INSERT INTO tbMatricula(dataMatricula, idAluno, idTurma) 
VALUES (NOW(), 2, 2);  

INSERT INTO tbMatricula(dataMatricula, idAluno, idTurma) 
VALUES (NOW(), 3, 2);  

 














drop table tbProfessor
drop table tbMatricula
drop table tbTurma
drop table tbAluno
drop table tblogin
drop database bdAcademia1

