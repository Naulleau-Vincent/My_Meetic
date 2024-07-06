DROP DATABASE IF EXISTS mymeetic;
CREATE DATABASE mymeetic;

USE mymeetic;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS loisir;
DROP TABLE IF EXISTS user_loisir;
DROP TABLE IF EXISTS user_password;

CREATE TABLE user(
    id           INT            NOT NULL AUTO_INCREMENT,
    firstname    VARCHAR(255)   NOT NULL,
    lastname     VARCHAR(255)   NOT NULL,
    email        VARCHAR(255)   NOT NULL UNIQUE,
    birthdate    DATE           NOT NULL,
    gender       VARCHAR(255)   NOT NULL,
    city         VARCHAR(255)   NOT NULL,
    password     VARCHAR(65)    NOT NULL,
    status       BOOLEAN        NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE user_log(
    id           INT            NOT NULL AUTO_INCREMENT,
    user_id      INT            NOT NULL,
    debut_token  DATETIME       NOT NULL,
    fin_token    DATETIME       NOT NULL,
    token        VARCHAR(65)    NOT NULL,
    FOREIGN KEY (user_id)       REFERENCES user(id),
    PRIMARY KEY (id)
);
/*
Creer une table user.log
id
user_id
debut_Token
fin_Token
*/
CREATE TABLE loisir(
    id           INT            NOT NULL AUTO_INCREMENT,
    name         VARCHAR(255)   NOT NULL UNIQUE,
    PRIMARY KEY (id)
);

CREATE TABLE user_loisir(
    id_user      INT            NOT NULL,
    id_loisir    INT            NOT NULL,
    FOREIGN KEY (id_user)       REFERENCES user(id),
    FOREIGN KEY (id_loisir)     REFERENCES loisir(id)
);

INSERT INTO loisir
            (name)
    VALUES  ('Jeux-video'),
            ('Reseaux-sociaux'),
            ('Films et series'),
            ('Lire'),
            ('Musee'),
            ('Musique'),
            ('Sport'),
            ('Voyager'),
            ('Plage'),
            ('Montagne'),
            ('Animaux'),
            ('Bricolage'),
            ('Muscu'),
            ('Arts'),
            ('Jardinage'),
            ('Photographie'),
            ('Theatre'),
            ('Chill'),
            ('Faire la sieste'),
            ('Voitures'),
            ('Dessins animes'),
            ('Vins'),
            ("Jeux dargent"),
            ('Politique'),
            ('Histoire'),
            ('Mathematiques'),
            ('Physique'),
            ('Langues vivantes'),
            ('Couche tôt'),
            ('Couche tard'),
            ('Brunch'),
            ('La poesie'),
            ('***Jean-Luc Kitoko***')
;