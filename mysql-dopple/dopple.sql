-- Dopple de Mysql

CREATE TABLE provinces(

    id INTEGER PRIMARY KEY AUTO_INCREMENT,

    name VARCHAR(250)

);

CREATE TABLE cities(

    id INTEGER PRIMARY KEY AUTO_INCREMENT,

    name VARCHAR(250),

    province_id INTEGER NOT NULL,

    FOREIGN KEY(province_id) REFERENCES provinces(id)
);

INSERT INTO provinces (name) VALUES("Lugo");
INSERT INTO provinces (name) VALUES("A Coruña");
INSERT INTO provinces (name) VALUES("Ourense");
INSERT INTO provinces (name) VALUES("Pontevedra");


INSERT INTO cities (name, province_id) VALUES("Vigo", (SELECT id FROM provinces WHERE name = "Pontevedra"));
INSERT INTO cities (name, province_id) VALUES("Pontevedra", (SELECT id FROM provinces WHERE name = "Pontevedra"));

INSERT INTO cities (name, province_id) VALUES("A Coruña", (SELECT id FROM provinces WHERE name = "A Coruña"));
INSERT INTO cities (name, province_id) VALUES("Ferrol", (SELECT id FROM provinces WHERE name = "A Coruña"));
INSERT INTO cities (name, province_id) VALUES("Santiago de Compostela", (SELECT id FROM provinces WHERE name = "A Coruña"));

INSERT INTO cities (name, province_id) VALUES("Lugo", (SELECT id FROM provinces WHERE name = "Lugo"));
INSERT INTO cities (name, province_id) VALUES("Mondoñedo", (SELECT id FROM provinces WHERE name = "Lugo"));
INSERT INTO cities (name, province_id) VALUES("Vilalba", (SELECT id FROM provinces WHERE name = "Lugo"));

INSERT INTO cities (name, province_id) VALUES("Ourense", (SELECT id FROM provinces WHERE name = "Ourense"));
