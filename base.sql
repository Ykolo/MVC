CREATE TABLE Utilisateur(
   IDU INT AUTO_INCREMENT PRIMARY KEY,
   NomU VARCHAR(50),
   Email VARCHAR(50),
   MDP VARCHAR(50)
);

CREATE TABLE Hotel(
   IDH INT AUTO_INCREMENT PRIMARY KEY,
   NomH VARCHAR(50),
   Adresse VARCHAR(50),
   Description VARCHAR(250),
   NbrChambreDispo INT
);

CREATE TABLE Chambre(
   IDC INT AUTO_INCREMENT PRIMARY KEY,
   TypeC VARCHAR(50),
   Numero INT,
   Prix_nuit INT,
   IDH INT NOT NULL,
   FOREIGN KEY(IDH) REFERENCES Hotel(IDH)
);

CREATE TABLE Reservation(
   IDC INT,
   IDU INT,
   Date_debut DATE,
   Date_fin DATE,
   PRIMARY KEY(IDU, IDC),
   FOREIGN KEY(IDU) REFERENCES Utilisateur(IDU),
   FOREIGN KEY(IDC) REFERENCES Chambre(IDC)
);
INSERT INTO Utilisateur (`NomU`, `Email`, `MDP`)
VALUES
    ('John Doe', 'john@example.com', 'mot_de_passe_123'),
    ('Alice Smith', 'alice@example.com', 'mot_de_passe_456'),
    ('Bob Johnson', 'bob@example.com', 'mot_de_passe_789'),
    ('Carol Williams', 'carol@example.com', 'mot_de_passe_012');

INSERT INTO Hotel (`NomH`, `Adresse`, `Description`, `NbrChambreDispo`)
VALUES
    ('Hotel George V', '31 Avenue George V, 75008 Paris', 'Un luxueux hôtel cinq étoiles situé au cœur de Paris.', 100),
    ('Hotel Disney', 'Disneyland Paris, 77777 Marne-la-Vallée', 'Un hôtel familial situé à Disneyland Paris.', 200),
    ('Shangri-La', "10 Avenue d'Iéna, 75116 Paris", 'Un hôtel de luxe offrant une vue imprenable sur la Tour Eiffel.', 150);
INSERT INTO Chambre (`IDH`, `Numero`, `TypeC`, `Prix_nuit`)
VALUES
    (1, '101', 'Simple', 150),
    (1, '102', 'Double', 200),
    (1, '103', 'Suite', 300);
INSERT INTO Chambre (`IDH`, `Numero`, `TypeC`, `Prix_nuit`)
VALUES
    (2, '201', 'Familiale', 250),
    (2, '202', 'Suite', 350),
    (2, '203', 'Suite Familiale', 400);

INSERT INTO Chambre (`IDH`, `Numero`, `TypeC`, `Prix_nuit`)
VALUES
    (3, '301', 'Chambre Deluxe', 300),
    (3, '302', 'Suite Exécutive', 500),
    (3, '303', 'Suite Présidentielle', 800);
INSERT INTO Reservation (`IDC`, `IDU`, Date_debut, Date_fin)
VALUES (1, 1, '2024-07-20', '2024-08-15');
INSERT INTO Reservation (`IDC`, `IDU`, Date_debut, Date_fin)
VALUES (2, 2, '2024-05-01', '2024-05-05');
INSERT INTO Reservation (`IDC`, `IDU`, Date_debut, Date_fin)
VALUES (3, 3, '2024-06-15', '2024-06-20');
