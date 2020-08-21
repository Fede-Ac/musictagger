
CREATE TABLE usuario ( 
	idUsuario integer(10) AUTO_INCREMENT NOT NULL,
	email varchar(100) NOT NULL, 
	nombre varchar(30) NOT NULL, 
	fechaNac date NOT NULL, 
	password varchar(100) NOT NULL,
	remember_token varchar(100),
	updated_at varchar(100),
	created_at varchar(100),
	CONSTRAINT pk_usuario PRIMARY KEY (idUsuario) 
);
CREATE TABLE usuario_administrador (
	idUsuario integer(10) AUTO_INCREMENT NOT NULL,
	CONSTRAINT pk_usuario_administrador PRIMARY KEY (idUsuario), 
	CONSTRAINT fk_usuario__administrador_usuario FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario) 
);
CREATE TABLE usuario_revisor (
	idUsuario integer(10) AUTO_INCREMENT NOT NULL,
	CONSTRAINT pk_usuario_revisor PRIMARY KEY (idUsuario), 
	CONSTRAINT fk_usuario_revisor__usuario FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario) 
);
CREATE TABLE usuario_colaborador (
	idUsuario integer(10) AUTO_INCREMENT NOT NULL,
	CONSTRAINT pk_usuario_colaborador PRIMARY KEY (idUsuario), 
	CONSTRAINT fk_usuario_colaborador__usuario FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario) 
);
CREATE TABLE lista (
	IDlista integer(6) AUTO_INCREMENT NOT NULL,
	idUsuario integer(10) NOT NULL,
	descripcion varchar(30) NOT NULL,
	publica boolean NOT NULL DEFAULT 0,
	CONSTRAINT pk_lista PRIMARY KEY (IDlista, idUsuario),
	CONSTRAINT fk_lista__usuario FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario)
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
	idUsuario integer(10) NOT NULL,
	IDetiqueta integer(6) NOT NULL,
	CONSTRAINT pk_asigna PRIMARY KEY (idUsuario, IDetiqueta),
	CONSTRAINT fk_asigna__usuario FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario),
	CONSTRAINT fk_asigna__etiqueta FOREIGN KEY (IDetiqueta) REFERENCES etiqueta (IDetiqueta)
);
CREATE TABLE sigue (
	IDsigue integer(10) NOT NULL,
	IDseguido integer(10) NOT NULL,
	CONSTRAINT pk_sigue PRIMARY KEY (IDsigue, IDseguido),
	CONSTRAINT fk_sigue_sigue__usuario FOREIGN KEY (IDsigue) REFERENCES usuario (idUsuario),
	CONSTRAINT fk_sigue_seguido__usuario FOREIGN KEY (IDseguido) REFERENCES usuario (idUsuario)
);
CREATE TABLE crea (
	IDlista integer(6) NOT NULL,
	idUsuario integer(10) NOT NULL,
	CONSTRAINT pk_crea PRIMARY KEY (IDlista, idUsuario),
	CONSTRAINT fk_crea__lista FOREIGN KEY (IDlista) REFERENCES lista (IDlista),
	CONSTRAINT fk_crea__usuario FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario)
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
	idUsuario integer(10) NOT NULL,
	IDetiqueta integer(6) NOT NULL,
	IDcancion integer(6) NOT NULL,
	IDautor integer(6) NOT NULL,
	IDalbum integer(6) NOT NULL,
	IDgenero integer(6) NOT NULL,
	cantidad integer(6) NOT NULL DEFAULT 0,
	CONSTRAINT pk_integra PRIMARY KEY (idUsuario, IDetiqueta, IDcancion, IDautor, IDalbum, IDgenero),
	CONSTRAINT fk_integra_idUsuario__asigna FOREIGN KEY (idUsuario) REFERENCES asigna (idUsuario),
	CONSTRAINT fk_integra_etiqueta__asigna FOREIGN KEY (IDetiqueta) REFERENCES asigna (IDetiqueta),
	CONSTRAINT fk_integra__cancion FOREIGN KEY (IDcancion) REFERENCES cancion (IDcancion),
	CONSTRAINT fk_integra__autor FOREIGN KEY (IDautor) REFERENCES autor (IDautor),
	CONSTRAINT fk_integra__album FOREIGN KEY (IDalbum) REFERENCES album (IDalbum),
	CONSTRAINT fk_integra__genero FOREIGN KEY (IDgenero) REFERENCES genero (IDgenero)
);
CREATE TABLE modifica (
	idUsuario integer(10) NOT NULL,
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
	CONSTRAINT pk_modifica PRIMARY KEY (idUsuario, IDcancion, IDautor, IDalbum, IDgenero),
	CONSTRAINT fk_modifica__usuario_colaborador FOREIGN KEY (idUsuario) REFERENCES usuario_colaborador (idUsuario),
	CONSTRAINT fk_modifica__cancion FOREIGN KEY (IDcancion) REFERENCES cancion (IDcancion),
	CONSTRAINT fk_modifica__autor FOREIGN KEY (IDautor) REFERENCES autor (IDautor),
	CONSTRAINT fk_modifica__album FOREIGN KEY (IDalbum) REFERENCES album (IDalbum),
	CONSTRAINT fk_genero__genero FOREIGN KEY (IDgenero) REFERENCES genero (IDgenero)
);
