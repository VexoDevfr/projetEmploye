ALTER TABLE employe ADD column numEqu INT(5),
ADD CONSTRAINT FK_employe_equipe FOREIGN KEY (numEqu) REFERENCES equipe(numEqu);
