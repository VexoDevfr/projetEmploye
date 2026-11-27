ALTER TABLE employe ADD column numEqu INT(5),
ADD CONSTRAINT FK_employe_equipe FOREIGN KEY (numEqu) REFERENCES equipe(numEqu);

// BONUS ++
UPDATE employe
SET profil = NULL;
ALTER TABLE employe
    MODIFY COLUMN profil INT(3),
    ADD CONSTRAINT FK_employe_profil FOREIGN KEY (profil)
    REFERENCES profil(id_profil);


UPDATE equipe
SET secteur = NULL;
ALTER TABLE equipe
    MODIFY COLUMN secteur INT(3),
    ADD CONSTRAINT FK_equipe_secteur FOREIGN KEY (secteur)
    REFERENCES secteur(id_secteur);
