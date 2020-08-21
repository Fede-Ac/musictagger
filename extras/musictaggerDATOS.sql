USE musictagger;
INSERT INTO usuario VALUES ('pedro.gonzalez@ejemplo.com','Pedro Gonzalez','1990-12-20','password1234');
INSERT INTO usuario VALUES ('maria.gomez@ejemplo.com','Maria Gomez','1994-11-01','password1234');
INSERT INTO usuario VALUES ('juan.rodriguez@ejemplo.com','Juan Rodriguez','1998-04-25','password1234');
INSERT INTO usuario VALUES ('antonio.lopez@ejemplo.com','Antonio Lopez','1988-07-30','password1234');
INSERT INTO usuario VALUES ('ana.martinez@ejemplo.com','Ana Martinez','1991-01-02','password1234');
INSERT INTO usuario VALUES ('luis.gimenez@ejemplo.com','Luis Gimenez','1996-11-20','password1234');
INSERT INTO usuario VALUES ('francisco.diaz@ejemplo.com','Francisco Diaz','1997-05-10','password1234');
INSERT INTO usuario_administrador VALUES ('francisco.diaz@ejemplo.com');
INSERT INTO usuario_administrador VALUES ('pedro.gonzalez@ejemplo.com');
INSERT INTO usuario_revisor VALUES ('ana.martinez@ejemplo.com');
INSERT INTO usuario_revisor VALUES ('maria.gomez@ejemplo.com');
INSERT INTO usuario_colaborador VALUES ('juan.rodriguez@ejemplo.com');
INSERT INTO usuario_colaborador VALUES ('antonio.lopez@ejemplo.com');
INSERT INTO usuario_colaborador VALUES ('luis.gimenez@ejemplo.com');
INSERT INTO lista VALUES (NULL,'ana.martinez@ejemplo.com','oldies',1);
INSERT INTO lista VALUES (NULL,'ana.martinez@ejemplo.com','2020',1);
INSERT INTO lista VALUES (NULL,'maria.gomez@ejemplo.com','pop',0);
INSERT INTO etiqueta VALUES (NULL,'infantil');
INSERT INTO etiqueta VALUES (NULL,'Lenguaje inapropiado');
INSERT INTO etiqueta VALUES (NULL,'romantica');
INSERT INTO etiqueta VALUES (NULL,'boda');
INSERT INTO etiqueta VALUES (NULL,'cumpleaños infantil');
INSERT INTO etiqueta VALUES (NULL,'15 años');
INSERT INTO etiqueta VALUES (NULL,'divertido');
INSERT INTO etiqueta_publico VALUES (1);
INSERT INTO etiqueta_publico VALUES (2);
INSERT INTO etiqueta_lugar VALUES (4);
INSERT INTO etiqueta_publico VALUES (5);
INSERT INTO etiqueta_publico VALUES (6);
INSERT INTO etiqueta_otro VALUES (3);
INSERT INTO etiqueta_otro VALUES (7);
INSERT INTO autor VALUES (NULL,'Xuxa');
INSERT INTO autor VALUES (NULL,'Bad Bunny');
INSERT INTO autor VALUES (NULL,'Christina Aguilera');
INSERT INTO autor VALUES (NULL,'Felix Mendelssohn');
INSERT INTO autor VALUES (NULL,'Canciones Infantiles');
INSERT INTO autor VALUES (NULL,'Johann Strauss');
INSERT INTO cancion VALUES (NULL,1,'Xuxa Ilarie','https://www.youtube.com/watch?v=NrXTcaG4oso','','https://open.spotify.com/track/1k7fKhUfxC3wl1JFgrcKa4?autoplay=true');
INSERT INTO cancion VALUES (NULL,1,'Todo el mundo está feliz','https://www.youtube.com/watch?v=e4m8l3eqBF0','https://www.musica.com/letras.asp?letra=920596','');
INSERT INTO cancion VALUES (NULL,2,'La difícil','https://www.youtube.com/watch?v=fEYUoBgYKzw','','');
INSERT INTO cancion VALUES (NULL,3,'El beso del final','https://www.youtube.com/watch?v=i7OdS7cpWQ8','','https://open.spotify.com/track/49Fq9Tv1bnkkmNwgNAzJI1?autoplay=true');
INSERT INTO cancion VALUES (NULL,4,'Marcha numpcial','https://www.youtube.com/watch?v=TkaACllacOI','','https://open.spotify.com/track/0BYaeCd5XBoKTdClXw0ZtY?autoplay=true');
INSERT INTO cancion VALUES (NULL,5,'Chuchuwa','','','');
INSERT INTO cancion VALUES (NULL,6,'Danubio Azul','https://www.youtube.com/watch?v=4FcTYF0OBSg','','');
INSERT INTO album VALUES (NULL,'YHLQMDLG',2020,'');
INSERT INTO interpreta VALUES (1,1);
INSERT INTO interpreta VALUES (2,1);
INSERT INTO interpreta VALUES (3,2);
INSERT INTO interpreta VALUES (4,3);
INSERT INTO interpreta VALUES (5,4);
INSERT INTO interpreta VALUES (6,5);
INSERT INTO interpreta VALUES (7,6);
INSERT INTO genero VALUES (NULL,'Clásica');
INSERT INTO genero VALUES (NULL,'Infantil');
INSERT INTO genero VALUES (NULL,'Balada');
INSERT INTO genero VALUES (NULL,'Reggaeton');
INSERT INTO pertenece VALUES (3,2,1);
INSERT INTO tiene VALUES (3,2,1,4);
INSERT INTO asigna VALUES ('ana.martinez@ejemplo.com',2);
INSERT INTO sigue VALUES ('maria.gomez@ejemplo.com','ana.martinez@ejemplo.com');
INSERT INTO crea VALUES (1,'ana.martinez@ejemplo.com');
INSERT INTO crea VALUES (2,'ana.martinez@ejemplo.com');
INSERT INTO crea VALUES (3,'maria.gomez@ejemplo.com');
INSERT INTO contiene VALUES (3,3,2,1,4);
INSERT INTO integra VALUES ('ana.martinez@ejemplo.com',2,3,2,1,4,1);
INSERT INTO modifica (email,IDcancion,IDautor,IDalbum,IDgenero,fechaSugerencia,tabla,campo,valor,autorizado) VALUES ('luis.gimenez@ejemplo.com',3,2,1,4,'2020-07-28 00:26:03','cancion','linkLetra','https://www.musica.com/letras.asp?letra=2507313',NULL);
