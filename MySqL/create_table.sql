
/*
INT(n cifras)               ENTERO
integer(n cifras)           ENTERO (maximo 42923425)
varchar (N caracteres)      STRING (ALFANUMERICO (MAXIMO 250))
Char                        STRING/ALFANUMERICO 
float(N CIFRAS , N DECIMALES) DECIMAL / COMA FLOTANTE
date
MEDIUMTEXT   16 MILLONS
LONGTEXT    4 BILLONES 


/*CREAR TABLA

*/




CREATE table Usuarios(
id int(10) not null,
nombre varchar(250)not null,
lastname varchar(250)not null,
email varchar(250)not null,
passwordd varchar(250)not null
CONSTRAINT pk_usuarios PRIMARY KEY(id)
);


//INSERTAR FILAS SOLO CON CIERTAS COLUMNAS

INSERT INTO usuarios (email,password) values ('admin@gamil.com','julio');


///
SELECT email .(7*7) as 'OPERACION' from usuarios;

SELECT  apellido IFNULL(apellido ,'ESTE CAMPO ESTA VACIO') FROM usuarios;

SELECT nombre ,apellidos from usuarios where year(fecha)=2019;

SELECT nombre, apelldos from usuarios where year(fecha) !=2019 or is NULL(fecha);

SELECT email FROM usuarios WHERE apellidos LIKE '%a%' and PASSWORD = 1234;


SELECT * from USUARIOS WHERE YEAR(FECHA)%2=0;

///
LIMIT ORDER BY

SELECT * FROM USUARIO LIMIT 2;
///UPDATE
UPDATE USUARIO SET FECHA= CURDATE() WHERE ID= 4;


///ELIMINAR

DELETE FROM USUARIOS WHERE EMAIL= "ADMIN@GMAIL.COM";


SELECT titulo FROM entradas GROUP BY categoria_id

select count(titulo) AS "NUMERO DE ENTRADAS" ,categoria_id FROM entradas GROUP BY CATEGORIA_ID;


insert INTO categorias values(null ,'Accion');
insert INTO categorias values(null ,'Rol');
insert INTO categorias values(null ,'Deportes');

insert INTO entradas values(null ,1,1,'GTA 5', 'reviw del gta 5','GTA ONLINE NOVEDADES',CURDATE());

insert INTO entradas values(null ,1,2,'GTA 5', 'reviw del gta 5','GTA ONLINE NOVEDADES',CURDATE());

insert INTO entradas values(null ,1,3,'GTA 5', 'reviw del gta 5','GTA ONLINE NOVEDADES',CURDATE());
/*
FUNCIONES DE AGRUPAMIENTO

AVG  SACAR LA MEDIA
COUNT CONTAR EL NUMERO DE ELEMENTOS
MAX  VALOR MMAX
MIN   VALOR MIN
SUM  SUMAR TODO
*/


SELECT AVG(id) AS "media de entradas" FROM entradas;

/*SUBCONSULTAS*/
/*USUARIOS QUE SOLAMENTE TIENEN ENTRADAS*/
SELECT * FROM usuarios where id IN (select usuario_id FROM ENTRADAS);

/*USUARIOS QUE SOLAMENTE NO TIENEN ENTRADAS*/
SELECT * FROM usuarios where id not (select usuario_id FROM ENTRADAS);

/*sacar los usuarios que tengan alguna entrada que en su titulo hable de GTA*/

SELECT nombre ,apellidos where id IN(SELECT usuario_id from entradas where titulo LIKE "%GTA%");


/*mostrar todas las entradas de la categria accion utilizando su nombre
*/
SELECT categoria_id,titulo from entradas where categoria_id IN (SELECT id from categorias where nombre= "Deportes");

/*Mostrar las cetgorias con mas de 3 entradas */
select nombre from categorias where
(select categoria_id from entradas GROUP BY categoria_id having count(categoria_id)>=3)
/*Mostrar los usuarios que crearon una entrada un martes*/

select * from usuarios WHERE ID IN

(select usuario_id ,titulo FROM ENTRADAS WHERE DAYOFWEEK(fecha)=3)
 

Mostar el nombre de el usuario que tenga mas entradas

Mostrar las categorias sin entradas

*/
