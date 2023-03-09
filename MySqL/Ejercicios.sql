
EJERCICIO 2
/*
Modificar la comision de los vendedores y ponerla al 2% 
cuando ganan mas de 50000*/

UPDATE Vendedores SET comision=0.5 WHERE sueldo >= 50000;


Ejercico 3

/*INCREMENTAR EL PRECIO DE TODOS LOS COCHES EN UN 2%*/

UPDATE Coches set precio=precio*0.05;


Ejercico 4
/*SACAR TODOS LOS VENDEDORES CUYA 
FECHA ALTA SEA POSTERIOR AL 1 DE JULIO DE 2018*/

SELECT * FROM vendedores WHERE FECHA>="2018-07-1";


Ejercico 5
/*mostrar todos los vendedores con su nombre  y el numero de dias que
llevan en el consesionario.*/

SELECT nombre ,DATEDIFF(CURDATE(), FECHA) AS 'DIAS' FROM vendedores;

Ejercico 6

/*VISUALIZAR EL NOMBRE Y LOS APELLIDOS de los vendedores en una misma 
columnna , su fecha de registro y el dia de la semana en la que se registaron*/

SELECT CONCAT(nombre,'',apellidos) AS 'Nombre y Apellidos', fecha , DAYNAME(fecha) from vendedores;

EJERCICIO 7

/*mostrar el nombre y el salario de los vendedores
 con cargo de 'Ayudane de tienda'*/

 SELECT NOMBRE ,SALARIO from Vendedores where cargo='Ayudante de tienda';

 EJERCICIO 8;

/*VISUALIZAR TODOS LOS CAMPOS EN CUYO MARCA EXISTA LA LETRA A Y 
CUYO MODELO EMPIECE POR LA LTRA F*/

SELECT * FROM COCHES where marca like '%a%' and modelo like '$F%';

EJERCICIO 9
MOSTRAR TODOS LOS VENDEDORES DEL GRUOPO NUMERO ID , ORDENADOS POR SALARIO DE MAYOT A MENOR

SELECT * FROM Vendedores where grupo_id=2 ORDER BY sueldo DESC;


EJERCICIO 1O 

/*Visualizar los apellidos de los vendedores ,
su fecha y su numero de grupo ordenado por fcha descendente , 
mostrar los ultimos 4*/

SELECT apellidos , fecha , id from Vendedores ORDER BY fecha desc LIMIT 4;

Ejercico 11

/*VISUALIZAR TODOS LOS CARGOS Y EL NUMERO DE VENDEDORES QUE HAY EN CADA CARGO*/

SELECT cargo,count(id) from Vendedores GROUP BY cargo ORDER BY COUNT(id) DESC;


EJERCICIO 12

/*CONSEGUIR LA MASA SALARIAL DEL CONSESIONARIO (ANUAL)*/

SELECT SUM(sueldo) as 'Masa Salarial' from Vendedores

EJERCICIO 13 

/*Sacar la media de los sueldos entre todos los vendedores por grupo*/

SELECT AVG(sueldo) AS 'MEDIA SALARIAL' , grupo_id FROM Vendedores GROUP BY grupo_id;


SELECT CEIL(AVG(v.sueldo,2) AS 'MEDIA SALARIAL' , g.nombre from Vendedores 
v inner join Grupos g ON g.id= v.grupo_id 
GROUP by grupo_id;

EJERCICIO  14

/*VISUALIZAR LAS UNIDADES totales vendidas de cada coche a cada cliente.
Mostrando el nombre del producto , numero de cliente y la suma de unidades.
*/
SELECT co.modelo AS 'COCHE',cl.nombre AS 'CLIENTE', 
SUM(cantidad) from Encargos e inner join Coches co ON co.id = e.coche_id 
inner join Clientes1 cl ON cl.id = e.cliente_id 
GROUP BY e.coche_id , e.cliente_id;

EJERCICIO 15

/*MOSTAR LOS CLIENTES QUE MAS PEDIDOS HAN HECHO Y MOSTRAR CUANTOS HICIERON*/

SELECT cliente_id , COUNT(e.id) from Encargos e
inner JOIN Cleintes c ON c.id= e.cliente_id 
GROUP BY cliente_id ORDER BY 2 DESC LIMIT 2 ;

EJERCICIO 16 

/*OBTENER UN LISTADO DE CLIENTES ATENDIDOS POR EL VENDEDOR 'DAVID LOPEZ'*/

SELECT * FROM Clientes1 where vendedor_id 
in (SELECT id from Vendedores where nombre= 'Davi' and apellidos='Lopez')

EJERCICO 17 

/*OBTENER LISTADO CON LOS CARGOS REALIZADOS POR EL CLIENTE LEONYS*/

SELECT * from Encargos e
inner join Clientes1 c ON c.id= e.cliente_id 
inner join Coches co ON co.id = e.coche_id
 where cliente_id in(SELECT id From Clientes1 where nombre='Leonys');


 EJEERCICIO 18

 /*Listar los clientes que han hechi encargo del coche "Honda civic"

 */
 SELECT * from Clientes where id IN
 (SELECT cliente_id  from Encargos WHERE coche_id IN 
 (SELECT id FROM Coches where modelo like "%Honda Civic%"));

 EJERCICIO 19

 /*oBTENER LOS VENDEDORES CON 2 O MAS CLIENTES*/

 SELECT * from Vendedores where id in (SELECT vendedor_id 
 From Clientes1 GROUP by vendedor_id HAVING COUNT(cliente_id)=>2);

 EJERCICIO 20

 /*SELECCIONAR EL GRUPO EN EL QUE TRABAJA EL VENDEDOR CON MAYOR SAlARIO 
 Y MOSTRAR EL NOMBRE DEL GRUPO*/

 SELECT * FROM Grupos where id IN (SELECT grupo_id from Vendedores where sueldo =(
    SELECT MAX(sueldo) from Vendedores
 ));

 EJERCICIO 21

 /*Obtener los nombre y cuidades de los clientes con encargos de 3 unidades adelante*/

 SELECT nombre ,cuidades 
 from Clientes1 where id IN (SELECT cliente_id from Encargos where cantidad >=3);

 ejercicio 22
 
 /*MOSTRAR LISTADO DE CLIENTES (numero de cliente y el nombre) 
 mostrar tambien el numero de vendedory su nombre)*/

 SELECT c.id , c.nombre , v.id , CONCAT(v.nombre ,'', v.apellidos) from Clientes c, Vendedores v
 where c.vendedor_id = v.id;


 EJERCICIO 23

 /*LISTAR TODOS LOS ENCARGOS REALIZADOS CON LA MARCA DEL COCHE Y EL NOMBRE DEL CLIENTE*/

 SELECT e.id , co.marca c.nombre from Encargos e inner JOIN Coches co On co.id = e.coche_id
 inner join Clientes1 c ON c.id = e.cliente_id;

 EJERCICIO 24;

/*LISTAR LOS ENCARGOS CON EL NOMBRE DEL COCHE 
,el nombre del cliente y el nombre  de lacuiad 
,pero unicamente cuando sean de santodomingo*/

SELECT e.id , co.modelo , c.nombre , c.ciudad FROM Encargos e 
inner join coches co ON co.id = e.coche_id inner join Clientes1 c on c.id = e.cliente_id where c.ciudad ='Santo Domingo';

EJERCICIO 25

/*Obtener una lista de los nombres de los clientes 
con el importe de sus encargos acumulado*/

SELECT ci.nombre , SUM(precio*cantidad) as "IMPORTE"
FROM Clientes ci 
inner join Encargos en ON ci.id = en.cliente_id
inner join Coches co On en.coche_id= co.id;

EJERCICIO 26

/*sacar LOS VENDEDORES QUE TIENEN JEFE Y SACAR EL NOMBRE DEL JEFE*/

SELECT V1.nombre AS "VENDEDOR" V2.nombre AS 'JEFE 'from Vendedores V1 
inner JOIN Vendedores V2 ON V1.jefe = V2.id;

EJERCICIO 27

/*VISUALIZAR LOS NOMBRES DE LOS CLIENTES Y LA CANTIAD DE ENCARGOS REALIZADOS 
INCLUYENDO LOS QUE NO HAN REALIZADO ENCARGO*/

INSERT INTO Clientes1 Values (null,'Tienda Organica' 'Santiago' 0, CURDATE());

SELECT c.nombre ,count(e.id) FROM Clientes c 
inner join Encargos e ON c.id = e.cliente_id
GROUP by 1;


ejercico 28

/*MOSTRAR TODOS LOS VENDEDORES Y EL NUMERO DE CLIENTES .
 SE DEBEN MOSTRAR TENGAN O NO CLIENTES*/

 SELECt v.nombre , v.apellidos from Vendedores v left join Clientes c ON c.vendedor_id = v.id
 GROUP by v.id;



EJERCICIO 29;

/*CREAR UNA VISTA LLAMADA VENDEDORES QUE INCLUIRA 
TODOS LOS VENDEDORES DEL GRUPO QUE SE LLAME VENDEDORES A*/

CREATE VIEW Vendedores as SELECT * from Vendedores where grupo_id in 
(SELECT id from Grupos where nombre="Vendedores A")





EJERCICIO 30

/*MOSTRAR LOS DATOS DEL VENDEDOR CON MAS ANTIGUEDAD en el conseionario */

SELECT FROM Vendedores order by fecha ASC LIMIT 1;
/*OBETENER EL COCHE CON MAS UNIDADES VENDIDAD*/


SELECT * from Coches where id IN (SELECT coche_id from Encargos WHERE cantidad IN (SELECT MAX(CANTIDAD) FROM Encargos));










