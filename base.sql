CREATE TABLE utilisateur(
   IDU INT AUTO_INCREMENT,
   NomU VARCHAR(50),
   Email VARCHAR(50),
   MDP VARCHAR(50),
   PRIMARY KEY(IDU)
);

CREATE TABLE ecurie(
   IDE INT,
   NomE VARCHAR(50),
   Logo VARCHAR(100),
   PRIMARY KEY(IDE)
);

CREATE TABLE pilote(
   IDP INT,
   NomP VARCHAR(50),
   PrenomP VARCHAR(50),
   Nationalité VARCHAR(50),
   Photo VARCHAR(100),
   IDE INT NOT NULL,
   PRIMARY KEY(IDP),
   FOREIGN KEY(IDE) REFERENCES ecurie(IDE)
);

CREATE TABLE supporter(
   IDU INT,
   IDP INT,
   PRIMARY KEY(IDU, IDP),
   FOREIGN KEY(IDU) REFERENCES utilisateur(IDU),
   FOREIGN KEY(IDP) REFERENCES pilote(IDP)
);

-- Ecuries
INSERT INTO Ecurie (IDE, NomE, Logo) VALUES (1, 'Alpine', 'img/ecurie/alpine.png');
INSERT INTO Ecurie (IDE, NomE, Logo) VALUES (2, 'Aston Martin', 'img/ecurie/aston_martin.png');
INSERT INTO Ecurie (IDE, NomE, Logo) VALUES (3, 'Ferrari', 'img/ecurie/ferrari.png');
INSERT INTO Ecurie (IDE, NomE, Logo) VALUES (4, 'Haas', 'img/ecurie/haas.png');
INSERT INTO Ecurie (IDE, NomE, Logo) VALUES (5, 'McLaren', 'img/ecurie/mclaren.png');
INSERT INTO Ecurie (IDE, NomE, Logo) VALUES (6, 'Mercedes', 'img/ecurie/mercedes.png');
INSERT INTO Ecurie (IDE, NomE, Logo) VALUES (7, 'Racing Bulls', 'img/ecurie/racing_bulls.png');
INSERT INTO Ecurie (IDE, NomE, Logo) VALUES (8, 'Red Bull', 'img/ecurie/red_bull.png');
INSERT INTO Ecurie (IDE, NomE, Logo) VALUES (9, 'Stake', 'img/ecurie/stake.png');
INSERT INTO Ecurie (IDE, NomE, Logo) VALUES (10, 'Williams', 'img/ecurie/williams.png');

-- Pilotes
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (1, 'Gasly', 'Pierre', 'Français', 1, 'img/pilote/gasly.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (2, 'Ocon', 'Esteban', 'Français', 1, 'img/pilote/ocon.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (3, 'Alonso', 'Fernando', 'Espagnol', 2, 'img/pilote/alonso.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (4, 'Stroll', 'Lance', 'Canadien', 2, 'img/pilote/stroll.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (5, 'Leclerc', 'Charles', 'Monégasque', 3, 'img/pilote/leclerc.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (6, 'Sainz Jr', 'Carlos', 'Espagnol', 3, 'img/pilote/sainz_jr.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (7, 'Magnussen', 'Kevin', 'Danois', 4, 'img/pilote/magnussen.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (8, 'Hülkenberg', 'Nico', 'Allemand', 4, 'img/pilote/hulkenberg.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (9, 'Norris', 'Lando', 'Britannique', 5, 'img/pilote/norris.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (10, 'Piastri', 'Oscar', 'Australien', 5, 'img/pilote/piastri.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (11, 'Hamilton', 'Lewis', 'Britannique', 6, 'img/pilote/hamilton.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (12, 'Russell', 'Georges', 'Britannique', 6, 'img/pilote/russell.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (13, 'Ricciardo', 'Daniel', 'Australien', 7, 'img/pilote/ricciardo.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (14, 'Tsunoda', 'Yuki', 'Japonais', 7, 'img/pilote/tsunoda.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (15, 'Verstappen', 'Max', 'Néerlandais', 8, 'img/pilote/verstappen.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (16, 'Perez', 'Sergio', 'Mexicain', 8, 'img/pilote/perez.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (17, 'Zhou', 'Guanyu', 'Chinois', 9, 'img/pilote/zhou.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (18, 'Bottas', 'Valtteri', 'Finlandais', 9, 'img/pilote/bottas.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (19, 'Sargeant', 'Logan', 'Américain', 10, 'img/pilote/sargeant.png');
INSERT INTO Pilote (IDP, NomP, PrenomP, Nationalité, IDE, Photo) VALUES (20, 'Albon', 'Alexander', 'Thailandais', 10, 'img/pilote/albon.png');
