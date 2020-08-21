
CREATE TABLE usuario ( 
	email varchar(100) NOT NULL, 
	nombre varchar(30) NOT NULL, 
	fechaNac date NOT NULL, 
	password varchar(30) NOT NULL, 
	CONSTRAINT pk_usuario PRIMARY KEY (email) 
);
CREATE TABLE usuario_administrador (
	email varchar(100) NOT NULL, 
	CONSTRAINT pk_usuario_administrador PRIMARY KEY (email), 
	CONSTRAINT fk_usuario__administrador_usuario FOREIGN KEY (email) REFERENCES usuario (email) 
);
CREATE TABLE usuario_revisor (
	email varchar(100) NOT NULL, 
	CONSTRAINT pk_usuario_revisor PRIMARY KEY (email), 
	CONSTRAINT fk_usuario_revisor__usuario FOREIGN KEY (email) REFERENCES usuario (email) 
);
CREATE TABLE usuario_colaborador (
	email varchar(100) NOT NULL, 
	CONSTRAINT pk_usuario_colaborador PRIMARY KEY (email), 
	CONSTRAINT fk_usuario_colaborador__usuario FOREIGN KEY (email) REFERENCES usuario (email) 
);
CREATE TABLE lista (
	IDlista integer(6) AUTO_INCREMENT NOT NULL,
	email varchar(100) NOT NULL,
	descripcion varchar(30) NOT NULL,
	publica boolean NOT NULL DEFAULT 0,
	CONSTRAINT pk_lista PRIMARY KEY (IDlista, email),
	CONSTRAINT fk_lista__usuario FOREIGN KEY (email) REFERENCES usuario (email)
);
CREATE TABLE etiqueta (
	IDetiqueta integer(6) AUTO_INCREMENT NOT NULL,
	descripcion varchar(30) NOT NULL,
	CONSTRAINT pk_etiqueta PRIMARY KEY (IDetiqueta)
);
CREATE TABLE etiqueta_publico (
	IDetiqueta integer(6) NOT NULL,
	CONSTRAINT pk_etiqueta_publico PRIMARY KEY (IDetiqueta),
	CONSTRAINT fk_etiqueta_publico__etiqueta FOREIGN KEY (IDetiqueta) REFERENCES etiqueta (IDetiqueta)
);
CREATE TABLE etiqueta_lugar (
	IDetiqueta integer(6) NOT NULL,
	CONSTRAINT pk_etiqueta_lugar PRIMARY KEY (IDetiqueta),
	CONSTRAINT fk_etiqueta_lugar__etiqueta FOREIGN KEY (IDetiqueta) REFERENCES etiqueta (IDetiqueta)
);
CREATE TABLE etiqueta_otro (
	IDetiqueta integer(6) NOT NULL,
	CONSTRAINT pk_etiqueta_otro PRIMARY KEY (IDetiqueta),
	CONSTRAINT fk_etiqueta_otro__etiqueta FOREIGN KEY (IDetiqueta) REFERENCES etiqueta (IDetiqueta)
);
CREATE TABLE autor (
	IDautor integer(6) AUTO_INCREMENT NOT NULL,
	nombre  varchar(30) NOT NULL,
	CONSTRAINT pk_autor PRIMARY KEY (IDautor)
);
CREATE TABLE cancion (
	IDcancion integer(6) AUTO_INCREMENT NOT NULL,
	IDautor integer(6) NOT NULL,
	titulo varchar(60) NOT NULL,
	linkLetra varchar(150),
	linkVideo varchar(150),
	linkSpotify varchar(150),
	CONSTRAINT pk_cancion PRIMARY KEY (IDcancion, IDautor),
	CONSTRAINT fk_cancion__autor FOREIGN KEY (IDautor) REFERENCES autor (IDautor)
);
CREATE TABLE album (
	IDalbum integer(6) AUTO_INCREMENT NOT NULL,
	nombre varchar(30) NOT NULL,
	anio integer(4),
	discografica varchar(30),
	CONSTRAINT pk_album PRIMARY KEY (IDalbum)
);
CREATE TABLE genero (
	IDgenero integer(6) AUTO_INCREMENT NOT NULL,
	descripcion varchar(30) NOT NULL,
	CONSTRAINT pk_genero PRIMARY KEY (IDgenero)
);
CREATE TABLE interpreta (
	IDcancion integer(6) NOT NULL,
	IDautor integer(6) NOT NULL,
	CONSTRAINT pk_interpreta PRIMARY KEY (IDcancion, IDautor),
	CONSTRAINT fk_interpreta__cancion FOREIGN KEY (IDcancion) REFERENCES cancion (IDcancion),
	CONSTRAINT fk_interpreta__autor FOREIGN KEY (IDautor) REFERENCES autor (IDautor)
);
CREATE TABLE pertenece (
	IDcancion integer(6) NOT NULL,
	IDautor integer(6) NOT NULL,
	IDalbum integer(6) NOT NULL,
	CONSTRAINT pk_pertenece PRIMARY KEY (IDcancion, IDautor, IDalbum),
	CONSTRAINT fk_pertenece__cancion FOREIGN KEY (IDcancion) REFERENCES cancion (IDcancion),
	CONSTRAINT fk_pertenece__autor FOREIGN KEY (IDautor) REFERENCES autor (IDautor),
	CONSTRAINT fk_pertenece__album FOREIGN KEY (IDalbum) REFERENCES album (IDalbum)
);
CREATE TABLE tiene (
	IDcancion integer(6) NOT NULL,
	IDautor integer(6) NOT NULL,
	IDalbum integer(6) NOT NULL,
	IDgenero integer(6) NOT NULL,
	CONSTRAINT pk_tiene PRIMARY KEY (IDcancion, IDautor, IDalbum, IDgenero),
	CONSTRAINT fk_tiene__cancion FOREIGN KEY (IDcancion) REFERENCES cancion (IDcancion),
	CONSTRAINT fk_tiene__autor FOREIGN KEY (IDautor) REFERENCES autor (IDautor),
	CONSTRAINT fk_tiene__album FOREIGN KEY (IDalbum) REFERENCES album (IDalbum),
	CONSTRAINT fk_tiene__genero FOREIGN KEY (IDgenero) REFERENCES genero (IDgenero)
);
CREATE TABLE asigna (
	email varchar(100) NOT NULL,
	IDetiqueta integer(6) NOT NULL,
	CONSTRAINT pk_asigna PRIMARY KEY (email, IDetiqueta),
	CONSTRAINT fk_asigna__usuario FOREIGN KEY (email) REFERENCES usuario (email),
	CONSTRAINT fk_asigna__etiqueta FOREIGN KEY (IDetiqueta) REFERENCES etiqueta (IDetiqueta)
);
CREATE TABLE sigue (
	IDsigue varchar(100) NOT NULL,
	IDseguido varchar(100) NOT NULL,
	CONSTRAINT pk_sigue PRIMARY KEY (IDsigue, IDseguido),
	CONSTRAINT fk_sigue_sigue__usuario FOREIGN KEY (IDsigue) REFERENCES usuario (email),
	CONSTRAINT fk_sigue_seguido__usuario FOREIGN KEY (IDseguido) REFERENCES usuario (email)
);
CREATE TABLE crea (
	IDlista integer(6) NOT NULL,
	email varchar(100) NOT NULL,
	CONSTRAINT pk_crea PRIMARY KEY (IDlista, email),
	CONSTRAINT fk_crea__lista FOREIGN KEY (IDlista) REFERENCES lista (IDlista),
	CONSTRAINT fk_crea__usuario FOREIGN KEY (email) REFERENCES usuario (email)
);
CREATE TABLE contiene (
	IDlista integer(6) NOT NULL,
	IDcancion integer(6) NOT NULL,
	IDautor integer(6) NOT NULL,
	IDalbum integer(6) NOT NULL,
	IDgenero integer(6) NOT NULL,
	CONSTRAINT pk_contiene PRIMARY KEY (IDlista, IDcancion, IDautor, IDalbum, IDgenero),
	CONSTRAINT fk_contiene__lista FOREIGN KEY (IDlista) REFERENCES lista (IDlista),
	CONSTRAINT fk_contiene__cancion FOREIGN KEY (IDcancion) REFERENCES cancion (IDcancion),
	CONSTRAINT fk_contiene__autor FOREIGN KEY (IDautor) REFERENCES autor (IDautor),
	CONSTRAINT fk_contiene__album FOREIGN KEY (IDalbum) REFERENCES album (IDalbum),
	CONSTRAINT fk_contiene__genero FOREIGN KEY (IDgenero) REFERENCES genero (IDgenero)
);
CREATE TABLE integra (
	email varchar(100) NOT NULL,
	IDetiqueta integer(6) NOT NULL,
	IDcancion integer(6) NOT NULL,
	IDautor integer(6) NOT NULL,
	IDalbum integer(6) NOT NULL,
	IDgenero integer(6) NOT NULL,
	cantidad integer(6) NOT NULL DEFAULT 0,
	CONSTRAINT pk_integra PRIMARY KEY (email, IDetiqueta, IDcancion, IDautor, IDalbum, IDgenero),
	CONSTRAINT fk_integra_email__asigna FOREIGN KEY (email) REFERENCES asigna (email),
	CONSTRAINT fk_integra_etiqueta__asigna FOREIGN KEY (IDetiqueta) REFERENCES asigna (IDetiqueta),
	CONSTRAINT fk_integra__cancion FOREIGN KEY (IDcancion) REFERENCES cancion (IDcancion),
	CONSTRAINT fk_integra__autor FOREIGN KEY (IDautor) REFERENCES autor (IDautor),
	CONSTRAINT fk_integra__album FOREIGN KEY (IDalbum) REFERENCES album (IDalbum),
	CONSTRAINT fk_integra__genero FOREIGN KEY (IDgenero) REFERENCES genero (IDgenero)
);
CREATE TABLE modifica (
	email varchar(100) NOT NULL,
	IDcancion integer(6) NOT NULL,
	IDautor integer(6) NOT NULL,
	IDalbum integer(6) NOT NULL,
	IDgenero integer(6) NOT NULL,
	fechaSugerencia timestamp NOT NULL,
	tabla varchar(30) NOT NULL,
	campo varchar(30) NOT NULL,
	valor varchar(150) NOT NULL,
	autorizado boolean DEFAULT 0,
	fechaRevision timestamp,
	usuarioRevisor varchar(100),
	CONSTRAINT pk_modifica PRIMARY KEY (email, IDcancion, IDautor, IDalbum, IDgenero),
	CONSTRAINT fk_modifica__usuario_colaborador FOREIGN KEY (email) REFERENCES usuario_colaborador (email),
	CONSTRAINT fk_modifica__cancion FOREIGN KEY (IDcancion) REFERENCES cancion (IDcancion),
	CONSTRAINT fk_modifica__autor FOREIGN KEY (IDautor) REFERENCES autor (IDautor),
	CONSTRAINT fk_modifica__album FOREIGN KEY (IDalbum) REFERENCES album (IDalbum),
	CONSTRAINT fk_genero__genero FOREIGN KEY (IDgenero) REFERENCES genero (IDgenero)
);
