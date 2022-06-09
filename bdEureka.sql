-- Base de Datos Eureka Expeditions
-- Autores: Bejar Espinoza Joel Wenceslao, Florez Mejia Miguel Adriano,
--	    Fuentes Avilés Edy nestor, Maza García Julio César
-- Fecha: 27/04/22
DROP DATABASE IF EXISTS bdEurekaExpeditions;

CREATE DATABASE IF NOT EXISTS bdEurekaExpeditions;

USE bdEurekaExpeditions;

-- Crear la tabla tUsuario
DROP TABLE IF EXISTS tUsuario;
CREATE TABLE IF NOT EXISTS tUsuario(
  codUsuario CHAR(5) NOT NULL,
  contrasenia VARCHAR(70) NOT NULL,
  cargo VARCHAR(10) NOT NULL,
  PRIMARY KEY(codUsuario)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Crear tabla tCliente
DROP TABLE IF EXISTS tCliente;
CREATE TABLE IF NOT EXISTS tCliente(
  codCliente INT(11) NOT NULL AUTO_INCREMENT,
  nombres VARCHAR(50) NOT NULL,  
  apellidos VARCHAR(70) NOT NULL,
  nroIdentidad VARCHAR(20) NOT NULL,
  edad INT NOT NULL,
  celular VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL,
  usuario CHAR(5) NOT NULL,
  PRIMARY KEY(codCliente),
  FOREIGN KEY(usuario) REFERENCES tUsuario(codUsuario)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Crear tabla tEmpleado
DROP TABLE IF EXISTS tEmpleado;
CREATE TABLE IF NOT EXISTS tEmpleado(
  codEmpleado CHAR(5) NOT NULL,
  nombres VARCHAR(50) NOT NULL,  
  apellidos VARCHAR(70) NOT NULL,
  nroIdentidad VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL,
  usuario CHAR(5) NOT NULL,
  PRIMARY KEY(codEmpleado),
  FOREIGN KEY(usuario) REFERENCES tUsuario(codUsuario)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Crear la tabla tPaquete
DROP TABLE IF EXISTS tPaquete;
CREATE TABLE IF NOT EXISTS tPaquete(
  codPaquete CHAR(5) NOT NULL,
  caracteristicas VARCHAR(100) NOT NULL,
  duracion VARCHAR(20) NOT NULL,
  precio NUMERIC(10,2) NOT NULL,
  PRIMARY KEY(codPaquete)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Crear la tabla tReserva
DROP TABLE IF EXISTS tReserva;
CREATE TABLE IF NOT EXISTS tReserva(
  codReserva INT(11) NOT NULL AUTO_INCREMENT,
  codCliente INT(11) NOT NULL,
  codPaquete CHAR(5) NOT NULL,
  fechaInicio DATE NOT NULL,
  fechaFin DATE NOT NULL,
  cantidad INT NOT NULL,
  PRIMARY KEY(codReserva),
  FOREIGN KEY(codCliente) REFERENCES tCliente(codCliente),
  FOREIGN KEY(codPaquete) REFERENCES tPaquete(codPaquete)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Insercion de datos
INSERT INTO tUsuario VALUES('U0001','asd156Q','Empleado');
INSERT INTO tUsuario VALUES('U0002','fre784P','Empleado');
INSERT INTO tUsuario VALUES('U0003','wed478T','Cliente');
INSERT INTO tUsuario VALUES('U0004','bgf024K','Cliente');
INSERT INTO tUsuario VALUES('U0005','okj148R','Cliente');
INSERT INTO tUsuario VALUES('U0006','opi321J','Cliente');
SELECT * FROM tUsuario

INSERT INTO tCliente VALUES('','Maria','Quispe Huaman','87451692',22,'957562147','quisMa98@gmail.com','U0003');
INSERT INTO tCliente VALUES('','Jose','Valdivia Caceres','56241126',27,'954716550','pepitoVal@gmail.com','U0004');
INSERT INTO tCliente VALUES('','Hilario','Zapata Leon','75412265',21,'987450026','hilzale_99@gmail.com','U0005');
INSERT INTO tCliente VALUES('','Oscar','Choque Vilca','12485762',30,'957643102','oscar_CHOVIL@gmail.com','U0006');
SELECT * FROM tCliente

INSERT INTO tEmpleado VALUES('E0001','Juan','Herrera Cayo','56870059','juansito@gmail.com','U0001');
INSERT INTO tEmpleado VALUES('E0002','Luis','Leon Castillo','56887512','luLeonC@gmail.com','U0002');
SELECT * FROM tEmpleado

INSERT INTO tPaquete VALUES('P0001','Camino Inca','4 dias - 3 noches',699);
INSERT INTO tPaquete VALUES('P0002','Valle Sagrado','1 dia - 0 noches',200);
INSERT INTO tPaquete VALUES('P0003','Ausangate','3 dias - 2 noches',450);
INSERT INTO tPaquete VALUES('P0004','Machu Picchu','1 dias - 0 noches',150);
INSERT INTO tPaquete VALUES('P0005','Montaña de 7 colores','1 dia - 0 noches',80);
INSERT INTO tPaquete VALUES('P0006','Inti Punku','1 dia - 0 noches',50);
SELECT * FROM tPaquete

INSERT INTO tReserva VALUES('',2,'P0001','2022/05/15','2022/05/19',1);
INSERT INTO tReserva VALUES('',4,'P0003','2022/05/24','2022/05/25',2);
INSERT INTO tReserva VALUES('',1,'P0004','2022/06/09','2022/06/10',1);
INSERT INTO tReserva VALUES('',3,'P0002','2022/06/22','2022/06/25',1);
SELECT * FROM tReserva