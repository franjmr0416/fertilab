# Fertilab
CRUD en php pdo mysql + login

![image](https://user-images.githubusercontent.com/51140256/203928553-778eb6e1-2cf1-4573-b600-2b083c13f412.png)


## Script Base de Datos

`CREATE DATABASE fertilab;`

`CREATE USER "fertilab_user"@"localhost" IDENTIFIED BY "1234";`

`GRANT ALL PRIVILEGES ON fertilab.* TO "fertilab_user"@"localhost";`

`flush privileges;`

`CREATE TABLE usuarios (
	id INT auto_increment NOT NULL,
	nombre varchar(100) NULL,
	apellidos varchar(100) NULL,
	puesto varchar(50) NULL,
	fecha_registro DATE NULL,
	email varchar(100) NOT NULL,
	clave varchar(100) NOT NULL,
	CONSTRAINT usuarios_PK PRIMARY KEY (id)
);`

`CREATE TABLE productos (
	id INT auto_increment NOT NULL,
	nombre varchar(100) NULL,
	descripcion VARCHAR(100) NULL,
	precio NUMERIC NULL,
	fecha_creacion DATE NULL,
	CONSTRAINT productos_PK PRIMARY KEY (id)
);`

`/*DATOS PRUEBA*/`

`INSERT INTO productos (nombre,descripcion,precio,fecha_creacion) VALUES
	 ('ipad','ipad pro 2022',18000,'2022-11-24'),
	 ('Mac Mini','Mac Mini M1 2022',17000,'2022-11-24'),
	 ('Monitor HP','Monitor Led HP 27 inch',5000,'2022-11-24'),
	 ('Minicomponente','Minicomponente LG 500w',7500,'2022-11-24');`
	 
`INSERT INTO usuarios (nombre,apellidos,puesto,fecha_registro,email,clave) VALUES
	 ('Francisco','Morales','admin','2022-11-24','francisco@fertilab.com','fertilab123');`
