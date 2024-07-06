DROP TABLE IF EXISTS sucursal;
DROP TABLE IF EXISTS usuario;
DROP TABLE IF EXISTS categoria;
DROP TABLE IF EXISTS articulo;
DROP TABLE IF EXISTS ventas;
DROP TABLE IF EXISTS detalle_venta;
DROP TABLE IF EXISTS envios;
DROP TABLE IF EXISTS detalle_envio;
DROP TABLE IF EXISTS fotocopiadoras;
DROP TABLE IF EXISTS copias;
DROP TABLE IF EXISTS clientes;
DROP TABLE IF EXISTS fallas;
DROP TABLE IF EXISTS marcas;
DROP TABLE IF EXISTS mantenimientos;
RANGOS 1037  3084  5131

CREATE TABLE sucursal (
id_sucursal INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nombreS VARCHAR(30) NOT NULL UNIQUE,
direccion_S VARCHAR(50) NOT NULL UNIQUE,
estado_S INT(1) NOT NULL);

CREATE TABLE usuario (
id_usuario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
fk_id_sucursal INT NOT NULL,
usuario_U VARCHAR(30) NOT NULL UNIQUE,
password_U VARCHAR(20) NOT NULL UNIQUE,
nombre_U VARCHAR(50) NOT NULL,
area_U VARCHAR(30) NOT NULL,
tipo_U VARCHAR(30) NOT NULL,
correo_U VARCHAR(50) NOT NULL,
telefono_U INTEGER(8) NOT NULL,
estado_U INT(1) NOT NULL DEFAULT 1,
fecha_U TIMESTAMP NOT NULL,
foto_U VARCHAR(40) NOT NULL,
update_U DATE NOT NULL);

CREATE TABLE categoria (
id_categoria INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nombre_C VARCHAR(30) NOT NULL,
estado_C INT(1) NOT NULL,
fecha_C DATE NOT NULL);

CREATE TABLE marcas (
id_marca INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nombre_marca VARCHAR(50) NOT NULL UNIQUE,
foto_marca VARCHAR(60) NOT NULL,
column_4 INT NOT NULL);


CREATE TABLE articulo (
id_articulo INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
codigo_A VARCHAR(30),
fk_id_sucursal INT NOT NULL,
fk_id_categoria INT NOT NULL,
fk_id_usuario INT NOT NULL,
fk_id_marca INT,
descripcion_A VARCHAR(200) NOT NULL,
compatibilidad_A VARCHAR(60),
fecha_A TIMESTAMP NOT NULL,
stock_A INT(3) NOT NULL,
cantidad_A INT(5) NOT NULL,
unimed_A VARCHAR(10) NOT NULL,
modelo_A VARCHAR(30) NOT NULL,
calidad_A VARCHAR(20) NOT NULL,
precio_neto_A FLOAT(6) NOT NULL,
precio_venta_A FLOAT(6) NOT NULL,
estado_A INT(1) NOT NULL,
imagenes_A VARCHAR(60) NOT NULL,
tipo_A VARCHAR(10) NOT NULL,
update_A DATE NOT NULL);

CREATE TABLE clientes (
id_cliente INT PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
ci_Cl INT(10) NOT NULL,
nombre_Cl VARCHAR(40) NOT NULL,
clasificacion_Cl VARCHAR(50) NOT NULL,
direccion_Cl VARCHAR(50) NOT NULL,
telefono_Cl INT(10) NOT NULL);

CREATE TABLE fotocopiadoras (
id_fotocopiadora INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
fk_id_sucursal INT NOT NULL,
serial_M VARCHAR(20) NOT NULL UNIQUE,
descripcion_M VARCHAR(50) NOT NULL,
marca_M VARCHAR(30) NOT NULL,
c_inicial_M INT(8) NOT NULL,
c_final_M INT(10) NOT NULL,
fecha_registro_M DATE NOT NULL,
estado_M INT(1) NOT NULL);

CREATE TABLE ventas (
id_venta INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
fk_id_sucursal INT NOT NULL,
fk_id_usuario INT NOT NULL,
id_cliente_V INT(4) NOT NULL,
cliente_V VARCHAR(30) NOT NULL,
fecha_V DATE NOT NULL,
importe_V FLOAT(5) NOT NULL,
compovante_V VARCHAR(10) NOT NULL,
numero_factura_V INT(15) NOT NULL,
nit_V INT(15) NOT NULL,
nit_cliente_V INT(15) NOT NULL,
numero_autorizacion_V INT(15) NOT NULL,
fecha_limite_V DATE NOT NULL,
control_V INT(15) NOT NULL,
qrfoto_V VARCHAR(40) NOT NULL,
leyenda_V VARCHAR(40) NOT NULL,
facturado_V INT(1) NOT NULL);

CREATE TABLE detalle_venta (
fk_id_venta INT NOT NULL,
fK_id_producto INT NOT NULL,
cantidad_DV INT(4) NOT NULL,
precio_DV FLOAT(5) NOT NULL,
sub_total_DV FLOAT(5) NOT NULL);

CREATE TABLE envios (
id_envio INT(5) PRIMARY KEY AUTO_INCREMENT NOT NULL,
fk_id_sucursal INT NOT NULL,
fk_id_usuario INT NOT NULL,
total_E FLOAT(5) NOT NULL,
tipo_E VARCHAR(10) NOT NULL,
responsable_E VARCHAR(30) NOT NULL,
impreso_E INT(1) NOT NULL,
fecha_E DATE NOT NULL);

CREATE TABLE detalle_envio (
fk_id_envio INT(5) NOT NULL,
fk_id_producto INT NOT NULL,
cantidad_DE INT(5) NOT NULL,
precio_DE FLOAT(5) NOT NULL,
sub_total_DE FLOAT(5) NOT NULL);


CREATE TABLE copias (
id_copia INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
fk_id_sucursal INT NOT NULL,
fk_id_maquina INT NOT NULL,
fk_id_usuario INT NOT NULL,
fk_id_cliente INT NOT NULL,
tipo VARCHAR(5) NOT NULL,
vales INT(10) NOT NULL,
sobrantes INT(5),
copias INT(6) NOT NULL,
precio FLOAT(5) NOT NULL,
codigo INT(5) UNIQUE,
nombre_cliente VARCHAR(40) NOT NULL,
sub_total FLOAT(5) NOT NULL,
fecha DATE NOT NULL,
tipo_pago VARCHAR(5) NOT NULL);



CREATE TABLE fallas (
id_falla INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
fk_id_sucursal INT NOT NULL,
fk_id_maquina INT NOT NULL,
fk_id_usuario INT NOT NULL,
cantidad_F INT(4) NOT NULL,
precio_F FLOAT(4) NOT NULL,
tipo_F VARCHAR(5) NOT NULL,
fecha_F DATE NOT NULL,
imagen_F VARCHAR(50) NOT NULL);


CREATE TABLE mantenimientos (
id_mantenimiento INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
fk_id_cliente INT NOT NULL,
fk_id_usuario INT NOT NULL,
fk_id_venta INT,
modelo VARCHAR(40) NOT NULL,
contador INT(20) NOT NULL,
fecha_recepcion DATE NOT NULL,
fecha_entrega DATE NOT NULL,
tipo VARCHAR(20) NOT NULL,
total FLOAT(10) NOT NULL,
estado VARCHAR(20) NOT NULL);

ALTER TABLE usuario ADD CONSTRAINT usuario_fk_id_sucursal_sucursal_id_sucursal FOREIGN KEY (fk_id_sucursal) REFERENCES sucursal(id_sucursal);
ALTER TABLE articulo ADD CONSTRAINT articulo_fk_id_sucursal_sucursal_id_sucursal FOREIGN KEY (fk_id_sucursal) REFERENCES sucursal(id_sucursal);
ALTER TABLE articulo ADD CONSTRAINT articulo_fk_id_categoria_categoria_id_categoria FOREIGN KEY (fk_id_categoria) REFERENCES categoria(id_categoria);
ALTER TABLE articulo ADD CONSTRAINT articulo_fk_id_usuario_usuario_id_usuario FOREIGN KEY (fk_id_usuario) REFERENCES usuario(id_usuario);
ALTER TABLE articulo ADD CONSTRAINT articulo_fk_id_marca_marcas_id_marca FOREIGN KEY (fk_id_marca) REFERENCES marcas(id_marca);
ALTER TABLE ventas ADD CONSTRAINT ventas_fk_id_sucursal_sucursal_id_sucursal FOREIGN KEY (fk_id_sucursal) REFERENCES sucursal(id_sucursal);
ALTER TABLE ventas ADD CONSTRAINT ventas_fk_id_usuario_usuario_id_usuario FOREIGN KEY (fk_id_usuario) REFERENCES usuario(id_usuario);
ALTER TABLE detalle_venta ADD CONSTRAINT detalle_venta_fk_id_venta_ventas_id_venta FOREIGN KEY (fk_id_venta) REFERENCES ventas(id_venta);
ALTER TABLE detalle_venta ADD CONSTRAINT detalle_venta_fK_id_producto_articulo_id_articulo FOREIGN KEY (fK_id_producto) REFERENCES articulo(id_articulo);
ALTER TABLE envios ADD CONSTRAINT envios_fk_id_sucursal_sucursal_id_sucursal FOREIGN KEY (fk_id_sucursal) REFERENCES sucursal(id_sucursal);
ALTER TABLE envios ADD CONSTRAINT envios_fk_id_usuario_usuario_id_usuario FOREIGN KEY (fk_id_usuario) REFERENCES usuario(id_usuario);
ALTER TABLE detalle_envio ADD CONSTRAINT detalle_envio_fk_id_envio_envios_id_envio FOREIGN KEY (fk_id_envio) REFERENCES envios(id_envio);
ALTER TABLE detalle_envio ADD CONSTRAINT detalle_envio_fk_id_producto_articulo_id_articulo FOREIGN KEY (fk_id_producto) REFERENCES articulo(id_articulo);
ALTER TABLE fotocopiadoras ADD CONSTRAINT fotocopiadoras_fk_id_sucursal_sucursal_id_sucursal FOREIGN KEY (fk_id_sucursal) REFERENCES sucursal(id_sucursal);
ALTER TABLE copias ADD CONSTRAINT copias_fk_id_sucursal_sucursal_id_sucursal FOREIGN KEY (fk_id_sucursal) REFERENCES sucursal(id_sucursal);
ALTER TABLE copias ADD CONSTRAINT copias_fk_id_maquina_fotocopiadoras_id_fotocopiadora FOREIGN KEY (fk_id_maquina) REFERENCES fotocopiadoras(id_fotocopiadora);
ALTER TABLE copias ADD CONSTRAINT copias_fk_id_usuario_usuario_id_usuario FOREIGN KEY (fk_id_usuario) REFERENCES usuario(id_usuario);
ALTER TABLE copias ADD CONSTRAINT copias_fk_id_cliente_clientes_id_cliente FOREIGN KEY (fk_id_cliente) REFERENCES clientes(id_cliente);
ALTER TABLE fallas ADD CONSTRAINT fallas_fk_id_sucursal_sucursal_id_sucursal FOREIGN KEY (fk_id_sucursal) REFERENCES sucursal(id_sucursal);
ALTER TABLE fallas ADD CONSTRAINT fallas_fk_id_maquina_fotocopiadoras_id_fotocopiadora FOREIGN KEY (fk_id_maquina) REFERENCES fotocopiadoras(id_fotocopiadora);
ALTER TABLE fallas ADD CONSTRAINT fallas_fk_id_usuario_usuario_id_usuario FOREIGN KEY (fk_id_usuario) REFERENCES usuario(id_usuario);
ALTER TABLE mantenimientos ADD CONSTRAINT mantenimientos_fk_id_cliente_clientes_id_cliente FOREIGN KEY (fk_id_cliente) REFERENCES clientes(id_cliente);
ALTER TABLE mantenimientos ADD CONSTRAINT mantenimientos_fk_id_usuario_usuario_id_usuario FOREIGN KEY (fk_id_usuario) REFERENCES usuario(id_usuario);
ALTER TABLE mantenimientos ADD CONSTRAINT mantenimientos_fk_id_venta_ventas_id_venta FOREIGN KEY (fk_id_venta) REFERENCES ventas(id_venta);