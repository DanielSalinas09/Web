
CREATE DATABASE tienda_tecnologia;
USE tienda_tecnologia;

CREATE TABLE usuarios(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
apellidos       varchar(255),
email           varchar(255) not null,
password        varchar(255) not null,
tipo            varchar(20),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email  UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(NULL, 'martin','jimenez','majiar16@gmail.com','majiar15','admin')

CREATE TABLE categorias(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;



INSERT  INTO categorias VALUES(null,'pc gama baja');
INSERT  INTO categorias VALUES(null,'pc gama media');
INSERT  INTO categorias VALUES(null,'pc gama alta');
INSERT  INTO categorias VALUES(null,'laptos');
INSERT  INTO categorias VALUES(null,'procesadores');
INSERT  INTO categorias VALUES(null,'boards');
INSERT  INTO categorias VALUES(null,'memorias RAM');
INSERT  INTO categorias VALUES(null,'tarjeta grafica');
INSERT  INTO categorias VALUES(null,'monitores');
INSERT  INTO categorias VALUES(null,'teclados');
INSERT  INTO categorias VALUES(null,'fuentes de poder');
INSERT  INTO categorias VALUES(null,'webcam');
INSERT  INTO categorias VALUES(null,'diademas');
INSERT  INTO categorias VALUES(null,'parlantes');
INSERT  INTO categorias VALUES(null,'disco duro mecanico');
INSERT INTO categorias  VALUES(NULL, 'disco duro estado solido');
INSERT INTO categorias  VALUES(NULL, 'mouse');
INSERT INTO categorias  VALUES(NULL, 'chazis');

CREATE TABLE productos(
id              int(255) auto_increment not null,
categoria_id    int(255) not null,
nombre          varchar(100) not null,
descripcion     text,
precio          int(40) not null,
stock           int(40) not null,
oferta          varchar(2),
fecha          date not null,
imagen          varchar(255),
tipo            varchar(5),
socket          varchar(6),
CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_productos_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;


CREATE TABLE pedidos(
id              int(255) auto_increment not null,
usuario_id      int(255) not null,
departamento    varchar(100) not null,
municipio       varchar(100) not null,
direccion       varchar(100) not null,
costo           int(100) not null,
estado          varchar(20) not null,
fecha          date,
hora         time,
MetodoPagp varchar(13),
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedidos_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;


CREATE TABLE productos_pedidos(
id                int(255) auto_increment not null,
pedido_id         int(255) not null,
producto_id       int(255) not null,
unidades          int(10) not null,
CONSTRAINT pk_productos_pedidos PRIMARY KEY(id),
CONSTRAINT fk_productP_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_productoP_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=InnoDb;


SELECT count(id) AS 'agotados' FROM productos WHERE stock = 0;
SELECT max(count(p.id)) FROM usuarios u ,pedidos p group by p.id where p.usuario_id = u.id 
SELECT count(u.id) FROM usuarios u ,pedidos p  where p.usuario_id = u.id and u.id =u.id ;



SELECT u.id , COUNT(u.id) AS 'compras' FROM usuarios u, pedidos p   WHERE  u.id = p.usuario_id GROUP BY u.id LIMIT 0,2;


SELECT u.id , max(p.costo) AS 'mayorCompra' FROM usuarios u, pedidos p   WHERE  u.id = p.usuario_id GROUP BY u.id LIMIT 0,1;

SELECT u.id , DATEDIFF(CURDATE(),p.fecha)  FROM usuarios u, pedidos p   WHERE  u.id = p.usuario_id GROUP BY u.id ;

SELECT u.id , DATEDIFF(CURDATE(),p.fecha)  FROM usuarios u, pedidos p   WHERE  u.id = p.usuario_id GROUP BY u.id ;


INSERT INTO historiac VALUES(NULL , VAR docp, VAR docU);