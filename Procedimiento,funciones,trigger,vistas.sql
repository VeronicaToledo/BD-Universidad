#-----------------------------------------------------------------------Procedimiento-----------------------------------------------------------------------
#procedimiento ver datos de la taba
DELIMITER $$
create procedure listarEstudiantesPers()
Begin
select e.Fecha_ingreso,e.Fecha_egreso,e.Estado,p.CodPersona
from Estudiantes e,Personas p
where e.codPersona=p.codPersona;
End $$
DELIMITER ;

CALL listarEstudiantesPers();

#Procedimiento para insertar en persona
DELIMITER $$
CREATE PROCEDURE  insertarPersona(
in varCod int,
in varCI varchar(8),
in varNombre varchar (20),
in varA_Primer varchar (20),
in varA_Segundo varchar (20),
in varSexo char (1),
in vartelefono int,
in varDireccion varchar (45))
BEGIN
insert into personas values (varCod,varCI,varNombre,varA_Primer,varA_Segundo,varSexo,vartelefono,varDireccion); 
END $$
DELIMITER ;

call insertarPersona (202211546, 13328852, 'Lorena', 'Escobar', 'Rojas', 'f', 76950418, 'Santa cruz de la sierra');
call insertarPersona (202111044, 13328852, 'Carla', 'fernandes', 'toro', 'f', 78900412, 'Santa cruz de la sierra');
call insertarPersona (202121044, 11328852, 'Carla', 'fernandes', 'toro', 'f', 78900512, 'Santa cruz de la sierra');

select * from Personas;
#-----------------------------------------------------------------------Funcion-----------------------------------------------------------------------
DELIMITER $$
create function num_letras (letras char) returns int
begin
declare cantidad int;
select count(*) into cantidad from personas where Nombre like concat('%',letras,'%');
return cantidad;
end $$
DELIMITER ;

#muestra la cantidad de nombre con determinada letra.
select num_letras('m');
#muestra la primer letra de cada nombre.
SELECT LEFT(Nombre, 1) FROM personas;
#muestra la primer letra de cada nombre y cuantas cantidad de veces que la tiene.
select left(Nombre,1),num_letras(left(Nombre,1)) from personas;

#-----------------------------------------------------------------------Trigger-----------------------------------------------------------------------
create table seRegistroLaIncricion(
hostName varchar(50),
fecha timestamp);

select * from seRegistroLaIncricion;

DELIMITER $$
CREATE TRIGGER RegistroDeIncricion
BEFORE INSERT ON Materias
FOR EACH ROW 
BEGIN       
insert into seRegistroLaIncricion values(@@HOSTNAME,null);
END $$
DELIMITER ;

insert into Materias values(5,'liderasgo','2022-10-05','2022-12-03','inscrito',null,5);
select * from seRegistroLaIncricion;
select * from Materias;

#-----------------------------------------------------------------------Vistas-----------------------------------------------------------------------
CREATE VIEW vistaEstudiantes AS 
select e.Fecha_ingreso,e.Fecha_egreso,e.Estado,p.Nombre
from Estudiantes e,Personas p
where e.CodPersona=p.CodPersona;

select * from vistaEstudiantes;

