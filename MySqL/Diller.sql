CREATE TABLE Coches (

id  int(10) not null AUTO_INCREMENT,
modelo  varchar(250) not null,
marca  varchar(250) not null,
precio  int(20) not null ,
stock   int(255) not null ,
CONSTRAINT PK_COCHES PRIMARY KEY(id)
)ENGINE=INNODB;

CREATE TABLE  Grupos(
id  int(10) not null AUTO_INCREMENT,
nombre  varchar(250) not null,
ciudad  varchar(250) not null,
CONSTRAINT PK_grupo PRIMARY KEY(id)
)ENGINE=INNODB;

CREATE TABLE  Vendedores(
    id  int(10) not null AUTO_INCREMENT,
    grupo_id  int(10) not null ,
    jefe  int(10) not null ,
    nombre  varchar(250) not null,
    apellidos  varchar(250) not null,
    cargo   varchar(250) not null,
    fecha  DATE,
    sueldo int(10) not null ,
    comision float(10,2) not null ,
    CONSTRAINT PK_vendedoreS PRIMARY KEY(id),
    CONSTRAINT PK_vendedores_grupo  FOREIGN KEY(grupo_id) REFERENCES Grupos(id),
    CONSTRAINT PK_vendedores_jefe  FOREIGN KEY(jefe) REFERENCES Vendedores(id)
)ENGINE=INNODB;

CREATE TABLE Clientes(
    id int(10) not null AUTO_INCREMENT,
    vendedor_id  int(10) not null ,
    nombre  varchar(250) not null,
    ciudad  varchar(250) not null,
    gastado  float(50,2),
    CONSTRAINT PK_Clientes PRIMARY KEY(id),
    CONSTRAINT PK_Clientes_vendedor FOREIGN KEY(vendedor_id) REFERENCES vendedores(id)
)ENGINE=INNODB;

CREATE TABLE Encargos(
id int(10) not null AUTO_INCREMENT,
cliente_id  int(10) not null,
coche_id  int(10) not null ,
cantidad  int(100) not null ,
fecha date,
CONSTRAINT PK_encargo PRIMARY KEY(id),
CONSTRAINT FK_ENCArGO_CLIENTE FOREIGN KEY(cliente_id) REFERENCES Clientes(id),
CONSTRAINT FK_ENCARGO_COCHE FOREIGN KEY(coche_id) REFERENCES Coches(id)
)ENGINE=INNODB;


/*RELLENAR LA BASE DE DATOS CON INFO.

REPASAR LAS SECCIONES */