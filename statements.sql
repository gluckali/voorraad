CREATE DATABASE struggles;
USE struggles;

CREATE TABLE medewerker(
    id INT NOT NULL AUTO_INCREMENT,
    voorletters VARCHAR(250) NOT NULL,
    voorvoegsels VARCHAR(250),
    achternaam VARCHAR(250) NOT NULL,
    gebruikersnaam VARCHAR(250) NOT NULL,
    wachtwoord VARCHAR(250) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE klant(
    id INT NOT NULL AUTO_INCREMENT,
    voorletters VARCHAR(250) NOT NULL,
    tussenvoegsel VARCHAR(250),
    achternaam VARCHAR(250) NOT NULL,
    adres VARCHAR(250) NOT NULL,
    gebruikersnaam VARCHAR(250) NOT NULL,
    wachtwoord VARCHAR(250) NOT NULL,
    PRIMARY KEY(id)
);
CREATE TABLE artikel(
    id INT NOT NULL AUTO_INCREMENT,
    artikel VARCHAR(250) NOT NULL,
    prijs DECIMAL(5,2),
    PRIMARY KEY(id)
);

CREATE TABLE winkel(
    id INT NOT NULL AUTO_INCREMENT,
    winkelnaam VARCHAR(250) NOT NULL,
    winkeladres VARCHAR(250) NOT NULL,
    winkelpostcode VARCHAR(250) NOT NULL,
    vestigingsplaats VARCHAR(250) NOT NULL,
    telefoonnummer VARCHAR(250) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE bestelling(
    id INT NOT NULL AUTO_INCREMENT,
    aantal INT NOT NULL,
    afgehaald VARCHAR(250) NOT NULL,
    klant_id INT NOT NULL,
    medewerker_id INT NOT NULL,
    artikel_id INT NOT NULL,
    winkel_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(klant_id) REFERENCES klant(id),
    FOREIGN KEY(medewerker_id) REFERENCES medewerker(id),
    FOREIGN KEY(artikel_id) REFERENCES artikel(id),
    FOREIGN KEY(winkel_id) REFERENCES winkel(id)
);
CREATE TABLE drank(
    id INT NOT NULL AUTO_INCREMENT,
    dranknaam VARCHAR(250) NOT NULL,
    prijs DECIMAL (5,2),
    PRIMARY KEY(id)
);

CREATE TABLE eten(
    id INT NOT NULL AUTO_INCREMENT,
    etennaam VARCHAR(250) NOT NULL,
    prijs DECIMAL (5,2),
    PRIMARY KEY(id)
);

CREATE TABLE bar (
    id INT NOT NULL AUTO_INCREMENT,
    aantal INT (11) NOT NULL,
    totaal DECIMAL (5,2), 
    drank_id INT NOT NULL,
    FOREIGN KEY(drank_id) REFERENCES drank(id),
    PRIMARY KEY(id)
);

CREATE TABLE keuken (
    id INT NOT NULL AUTO_INCREMENT,
    aantal INT (11) NOT NULL,
    totaal DECIMAL (5,2), 
    eten_id INT NOT NULL,
    FOREIGN KEY(eten_id) REFERENCES eten(id),
    PRIMARY KEY(id)
);

--  calc in here
-- CREATE TABLE eten (
--     id INT NOT NULL AUTO_INCREMENT,
--     eten varchar(255) NOT NULL,
--     reserveren_id INT NOT NULL,
--     FOREIGN KEY (reserveren_id) REFERENCES reserveren(id),
--     PRIMARY KEY (id)
-- );

-- CREATE TABLE reserveren(
--     id INT NOT NULL AUTO_INCREMENT,
--     naam VARCHAR(250) NOT NULL,
--     adres VARCHAR(250) NOT NULL,
--     plaats VARCHAR(250) NOT NULL,
--     telefoon VARCHAR(250) NOT NULL,
--     eten_id INT NOT NULL,
--     PRIMARY KEY(id),
--     FOREIGN KEY(eten_id) REFERENCES eten(id)
-- );

-- SELECT bar.aantal, drank.dranknaam, (drank.prijs*bar.aantal) as totaal
-- FROM bar INNER JOIN drank ON drank.id = bar.drank_id