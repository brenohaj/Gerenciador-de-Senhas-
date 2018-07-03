CREATE TABLE gerenciador_senha;


	CREATE TABLE usuarios(

	id int not null PRIMARY KEY AUTO_INCREMENT,
	usuario varchar(50) not null ,
	email varchar (100) not null,
	senha varchar(32) not null


	);


	CREATE TABLE senhas(

	id_senhas int not null PRIMARY KEY AUTO_INCREMENT,
	id_usuario int not null,
	id_categoria_ int not null,
	descricao varchar(99) not null,
	credencial varchar (99) not null,
	senha varchar(50) not null,
	observacao varchar(99) not null,
	data_inclusao datetime default current_timestamp

	);


	CREATE TABLE categoria(

	id int not null PRIMARY KEY,
	nome_categoria varchar(30) not null



	);

INSERT INTO categoria ('id', 'nome_categoria') VALUES ('1','Redes Socias');
INSERT INTO categoria ('id', 'nome_categoria') VALUES ('2','FTP');





