Drop database if exists universidad;
create database Universidad;
use Universidad;

create table Personas (
CodPersona int primary key,
CI varchar(8) not null,
Nombre varchar (20) not null,
A_Primer varchar (20) not null,
A_Segundo varchar (20) null,
Sexo char (1) not null,
telefono int unique not null,
Direccion varchar (45) not null );

#estudianntes
Insert into Personas values (202111004, 11321152, 'Veronica', 'Toledo', 'Rojas', 'f', 78965412, 'El Torno- Puerto Rico');
Insert into Personas values (202111005, 11321151, 'Esteban', 'Toledo', null, 'M', 78965413, 'El Torno- Puerto Rico');

#docentes
insert into Personas values (202111048, 15935848, 'Mario', 'Rodríguez', 'Álvarez', 'M', 77865412, 'Santa cruz de la sierra');
insert into Personas values (201811078, 18485714, 'Carlos', 'Sánchez ', 'Pérez ', 'M', 79875428, 'Santa cruz de la sierra');

#personal
insert into Personas values (202111087, 14935848, 'Maria', 'Pérez', 'Martínez', 'F', 79565412, 'Santa cruz de la sierra- La Guardia');
insert into Personas values (201811098, 18985714, 'Juan', 'Álvarez ', 'Pérez ', 'M', 72575428, 'Santa cruz de la sierra');

select * from Personas;

create table Personal (
idPersonal int primary key auto_increment not null,
area varchar(60) not null,
codPersona int not null, 
Foreign key (codPersona) references Personas (codPersona));


Insert into Personal (area, codPersona) values ('Dirección Financiera',202111087);
Insert into Personal (area, codPersona) values ('Dirección de Tecnologías de Información y Comunicación',201811098);

#drop table Personal;

select * from Personal;

/*AREAS FUNCIONALES: Dirección Administrativa de Postgrados, Dirección de Bienestar, Organizacional
Dirección Financiera, Dirección de Gestión Humana, Dirección de Mercadeo, Dirección de Proyectos Administrativos
Dirección de Servicios Administrativos, Dirección de Tecnologías de Información y Comunicación
Dirección de Unidades de Servicio y Logística Empresarial, Auditoría, Oficina Jurídica, Oficina de Planeación.*/

create table Docente (
idDocente int primary key  not null auto_increment,
Profecional varchar(35) not null,
codPersona int,
Foreign key (codPersona) references Personas (codPersona));

Insert into Docente (Profecional, codPersona) values ('Administración De Empresas',202111048);
Insert into Docente (Profecional, codPersona) values ('Ingeniero Informático',201811078);

select * from Docente;
#drop table Docente;

create table Estudiantes (
idEstudiantes int primary key auto_increment,
Fecha_ingreso date not null,
Fecha_egreso date null,
Estado varchar (8) not null,
codPersona int not null, 
Foreign key (codPersona) references Personas (codPersona));


Insert into Estudiantes (Fecha_ingreso,Fecha_egreso, Estado, codPersona) values ('2021-02-19','2024-12-05' ,'Activo',202111004);
Insert into Estudiantes (Fecha_ingreso,Fecha_egreso, Estado, codPersona) values ('2020-02-19',null ,'Activo',202111005);
Insert into Estudiantes (Fecha_ingreso,Fecha_egreso, Estado, codPersona) values ('2020-02-19',null ,'Activo',202211546);
Insert into Estudiantes (Fecha_ingreso,Fecha_egreso, Estado, codPersona) values ('2020-02-20',null ,'Activo',202111044);
Insert into Estudiantes (Fecha_ingreso,Fecha_egreso, Estado, codPersona) values ('2020-02-20',null ,'Activo',202121044);

select * from Estudiantes;
#drop table Estudiantes;
truncate table Estudiantes;


create table Horario (
idHorario int primary key not null,
Entrada time  not null,
Salida time not null,
Fecha varchar (35) not null,
codPersona int not null,
Foreign key (codPersona) references Personas (codPersona));


Insert into Horario values (1,'18:45:00','21:15:00','Martes 15 de noviembre de 2022' ,202111004);
Insert into Horario values (2,'18:45:00','21:15:00','Miércoles 16 de noviembre de 2022' ,202111004);

select * from Horario;
drop table Horario;
truncate table Horario;

create table Asistencia (
idAsistencia int primary key auto_increment,
A_Fecha date not null,
A_Estado char (8) not null,
codPersona int not null,
Foreign key (codPersona) references Personas (codPersona));

Insert into Asistencia (A_Fecha, A_Estado, codPersona) values ('2021-02-19','Presente' ,202111004);
Insert into Asistencia (A_Fecha, A_Estado, codPersona) values ('2021-02-19','Presente' ,202111005);

select * from Asistencia;
drop table Asistencia;
truncate table Asistencia;

create table Grupo (
IdGrupo int primary key not null,
G_Nombre varchar (14) not null,
G_Tipo char (16) not null,
idEstudiantes int not null,
Foreign key (idEstudiantes) references Estudiantes (idEstudiantes));

Insert into Grupo  values (1,'GRP-I/2022-15','Central Nocturno' ,1);
Insert into Grupo values (2,'GRP-II/2022-11','Campus Matutino' ,2);

select * from Grupo;
#drop table Grupo;
truncate table Grupo;

create table Carreras (
idCarrera int primary key not null,
Nombre_C char (26)  not null,
Sigla Varchar (10) not null,
idEstudiantes int not null,
Foreign key (idEstudiantes) references Estudiantes (idEstudiantes));

Insert into Carreras  values (1,'Ingenieria informatica','II',1);
Insert into Carreras  values (2,'Trabajo social','TS',2);
Insert into Carreras  values (3,'Trabajo social','TS',3);
Insert into Carreras  values (4,'Trabajo social','TS',4);
Insert into Carreras  values (5,'Ingenieria informatica','II',5);

select * from Carreras;
#drop table Carreras;
truncate table Carreras;

create table Materias (
idMateria int primary key not null,
M_Nombre char (30)  not null,
M_Inicio date not null,
M_Fin date not null,
Estado_M char (8) not null,
idDocente int,
idCarrera int,
Foreign key (idDocente) references Docente (idDocente),
Foreign key (idCarrera) references Carreras (idCarrera));

Insert into Materias values (1,'liderasgo','2022-10-05','2022-12-03','inscrito',null,1);
Insert into Materias values (2,'Sistema de informacion I','2022-10-05','2022-12-03','inscrito',null,2);
Insert into Materias values (3,'Sistema de informacion I','2022-10-05','2022-12-03','inscrito',null,3);
Insert into Materias values (4,'liderasgo','2022-10-05','2022-12-03','inscrito',null,4);


select * from Materias;
drop table Materias;
truncate table Materias;

create table Aulas (
idAula int primary key not null,
A_Nombre varchar (8)  not null,
Capacidad tinyint not null,
idMateria int not null,
Foreign key (idMateria) references Materias (idMateria));


Insert into Aulas  values (1,'AUL-223','35',1);
Insert into Aulas  values (2,'AUL-233','45',2);

select * from Aulas;
#drop table Aulas;
truncate table Aulas;

create table Calificaciones (
idCalificacion int primary key not null,
Puntaje float not null,
C_Estado char (9) not null,
idMateria int not null,
Foreign key (idMateria) references Materias (idMateria));

Insert into Calificaciones  values (1,85.5,'Aprovado',1);
Insert into Calificaciones  values (2,75.8,'Aprovado',2);

select * from Calificaciones;
drop table Calificaciones;
truncate table calificaciones;

create table Becas (
IdBecas int primary key not null,
Descuento Tinyint not null,
idEstudiantes int not null,
Foreign key (idEstudiantes) references Estudiantes (idEstudiantes));

Insert into Becas  values (1,35,1);
Insert into Becas  values (2,20,2);

select * from Becas;
drop table Becas;
truncate table Becas;

