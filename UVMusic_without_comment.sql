CREATE TABLE Usuario(
					login VARCHAR(20) PRIMARY KEY,
					password VARCHAR(80),
					nombres VARCHAR(50),
					apellidos VARCHAR(50),
					fecha_nac DATE,
					correo VARCHAR(50),
					fecha_reg TIMESTAMP DEFAULT CURRENT_TIMESTAMP
					);
					
CREATE TABLE Coleccion(login_usuario VARCHAR(20) PRIMARY KEY, 
						FOREIGN KEY (login_usuario) REFERENCES Usuario(login)
						ON UPDATE CASCADE ON DELETE NO ACTION 
						);
						
CREATE TABLE Cancion(
					id INT AUTO_INCREMENT PRIMARY KEY,
					titulo VARCHAR(50) NOT NULL,
					interprete VARCHAR(70) NOT NULL,
					genero VARCHAR(20) NOT NULL,
					album VARCHAR(50) NOT NULL,
					no_reproducciones INT DEFAULT 0,
					no_compras INT DEFAULT 0,
					precio FLOAT,
					url VARCHAR(100) NOT NULL,
					login_usuario VARCHAR(20) NOT NULL,
					FOREIGN KEY (login_usuario) REFERENCES Usuario(login)
					ON UPDATE CASCADE ON DELETE NO ACTION
					);

CREATE TABLE Lista_de_Reproduccion(
									id_coleccion VARCHAR(20),
									nombre VARCHAR(50),
									PRIMARY KEY (id_coleccion, nombre),
									FOREIGN KEY (id_coleccion) REFERENCES Coleccion(login_usuario)
									ON UPDATE CASCADE ON DELETE NO ACTION
									);


CREATE TABLE Canciones_por_Lista_Reprod(
										id_coleccion VARCHAR(20),
										nombre_lista VARCHAR(50),
										id_cancion INT,
										PRIMARY KEY (id_coleccion, nombre_lista, id_cancion),
										FOREIGN KEY (id_coleccion, nombre_lista) REFERENCES Lista_de_Reproduccion(id_coleccion, nombre)
										ON UPDATE CASCADE ON DELETE NO ACTION,
										FOREIGN KEY (id_cancion) REFERENCES Cancion(id)
										ON UPDATE CASCADE ON DELETE NO ACTION
										);

CREATE TABLE Alerta(
					id INT AUTO_INCREMENT PRIMARY KEY,
					descripcion TEXT
					);
										
CREATE TABLE Alertas_Usuario(
							login_usuario VARCHAR(20),
							id_alerta INT,
							PRIMARY KEY (login_usuario, id_alerta),
							FOREIGN KEY (login_usuario) REFERENCES Usuario(login)
							ON UPDATE CASCADE ON DELETE NO ACTION,
							FOREIGN KEY (id_alerta) REFERENCES Alerta(id)
							ON UPDATE CASCADE ON DELETE NO ACTION
							);
							
CREATE TABLE canciones_subidas(
										login_usuario VARCHAR(20),
										id_cancion INT,
										fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
										PRIMARY KEY (login_usuario, id_cancion),
										FOREIGN KEY (login_usuario) REFERENCES Coleccion(login_usuario)
										ON UPDATE CASCADE ON DELETE NO ACTION,
										FOREIGN KEY (id_cancion) REFERENCES Cancion(id)
										ON UPDATE CASCADE ON DELETE NO ACTION
										);

CREATE TABLE canciones_resaltadas(
								login_usuario VARCHAR(20),
								id_cancion INT,
								PRIMARY KEY (login_usuario, id_cancion),
								FOREIGN KEY (login_usuario) REFERENCES Usuario(login)
								ON UPDATE CASCADE ON DELETE NO ACTION,
								FOREIGN KEY (id_cancion) REFERENCES Cancion(id)
								ON UPDATE CASCADE ON DELETE NO ACTION
										);

CREATE TABLE canciones_compartidas(
									login_usuario_envia VARCHAR(20),
									id_cancion INT,
									login_usuario_recibe VARCHAR(20),
									PRIMARY KEY (login_usuario_envia, id_cancion),
									FOREIGN KEY (login_usuario_envia) REFERENCES Usuario(login)
									ON UPDATE CASCADE ON DELETE NO ACTION,
									FOREIGN KEY (id_cancion) REFERENCES Cancion(id)
									ON UPDATE CASCADE ON DELETE NO ACTION
									);			
									
CREATE TABLE canciones_compradas(
									id_compra INT AUTO_INCREMENT,
									login_usuario VARCHAR(20),
									id_cancion INT,
									fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
									PRIMARY KEY (id_compra, login_usuario, id_cancion),
									FOREIGN KEY (login_usuario) REFERENCES Usuario(login)
									ON UPDATE CASCADE ON DELETE NO ACTION,
									FOREIGN KEY (id_cancion) REFERENCES Cancion(id)
									ON UPDATE CASCADE ON DELETE NO ACTION
									);	
									
CREATE TABLE canciones_por_coleccion(
									id_coleccion VARCHAR(20),
									id_cancion INT,
									PRIMARY KEY (id_coleccion, id_cancion),
									FOREIGN KEY (id_coleccion) REFERENCES Coleccion(login_usuario)
									ON UPDATE CASCADE ON DELETE NO ACTION,
									FOREIGN KEY (id_cancion) REFERENCES Cancion(id)
									ON UPDATE CASCADE ON DELETE NO ACTION
									);	

CREATE TABLE Genero(
					id INT AUTO_INCREMENT PRIMARY KEY,
					nombre_genenro VARCHAR(30) UNIQUE
					);

CREATE TABLE Interprete(
						id int AUTO_INCREMENT PRIMARY KEY,
						nombre VARCHAR(50)
						);

CREATE TABLE Interprete_por_genero(
									id_interprete INT,
									id_genero INT,
									PRIMARY KEY(id_interprete, id_genero),
									FOREIGN KEY (id_interprete) REFERENCES Interprete(id)
									ON UPDATE CASCADE ON DELETE NO ACTION,
									FOREIGN KEY (id_genero) REFERENCES Genero(id)
									ON UPDATE CASCADE ON DELETE NO ACTION
									);

CREATE TABLE Album(
					nombre VARCHAR(50) PRIMARY KEY,
					id_genero INT, 
					fecha TIMESTAMP,
					cartula VARCHAR(100),
					FOREIGN KEY (id_genero) REFERENCES Genero(id)
					ON UPDATE CASCADE ON DELETE NO ACTION
					);
					
CREATE TABLE Canciones_por_album(
									nombre_album VARCHAR(50),
									id_cancion int,
									PRIMARY KEY(nombre_album, id_cancion),
									FOREIGN KEY (nombre_album) REFERENCES Album(nombre)
									ON UPDATE CASCADE ON DELETE NO ACTION,
									FOREIGN KEY (id_cancion) REFERENCES Cancion(id)
									ON UPDATE CASCADE ON DELETE NO ACTION
								); 
