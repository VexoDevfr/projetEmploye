CREATE TABLE equipe (
    numEqu INT(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    code CHAR(5),
    libelle CHAR(20),
    secteur CHAR(5)
)

// PARTIE BONUS ++

CREATE TABLE profil (
    id_profil INT(3),
    libelle_profil CHAR(30),
    CONSTRAINT PK_profil PRIMARY KEY (id_profil)
)

// PARTIE BONUS +++

CREATE TABLE secteur (
    id_secteur INT(3) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    libelle_secteur CHAR(30)
)
