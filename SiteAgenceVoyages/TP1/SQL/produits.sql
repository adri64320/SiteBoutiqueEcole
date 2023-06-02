
DROP DATABASE IF EXISTS Produits;
CREATE DATABASE Produits;
USE Produits;

CREATE TABLE Produits (
  id VARCHAR(25) PRIMARY KEY,
  continent VARCHAR(25) NOT NULL,
  ville VARCHAR(25) NOT NULL,
  stock INT,
  pays VARCHAR(25) NOT NULL,
  photos VARCHAR(25) NOT NULL,
  nom VARCHAR(255) NOT NULL,
  prix DECIMAL(10,2) NOT NULL
);

CREATE TABLE clients (
  utilisateur VARCHAR(255) NOT NULL,
  passwords VARCHAR(255) NOT NULL
);

INSERT INTO Produits (id, continent, ville, stock, pays, photos, nom, prix) VALUES
  ("paris", 'europe', 'Paris', 23, 'France', '../img/paris.jpg', 'paris', 150.00),
  ("londres", 'europe', 'Londres', 25, 'Angleterre', '../img/londres.jpg', 'londres', 200.00),
  ("madrid", 'europe', 'Madrid', 12, 'Espagne', '../img/madrid.jpg', 'madrid', 250.00),
  ("dublin", 'europe', 'Dublin', 8, 'Irlande', '../img/dublin.jpg', 'dublin', 300.00),
  ("rome", 'europe', 'Rome', 12, 'Italie', '../img/rome.jpg', 'rome', 280.00),
  ("mexoco", 'amerique', 'Mexico', 2, 'Mexique', '../img/Mexico.jpg', 'mexico', 350.00),
  ("new york", 'amerique', 'New York', 13, 'Etats-Unis', '../img/NewYork.jpg', 'newyork', 400.00),
  ("rio", 'amerique', 'Rio de Janeiro', 12, 'Brésil', '../img/rio.jpg', 'rio', 450.00),
  ("los angeles", 'amerique', 'Los Angeles', 3, 'Etats-Unis', '../img/LA.jpg', 'losangeles', 500.00),
  ("montreal", 'amerique', 'Montreal', 5, 'Canada', '../img/montreal.jpg', 'montreal', 550.00),
  ("tokyo", 'asie', 'Tokyo', 9, 'Japon', '../img/tokyo.jpeg', 'tokyo', 600.00),
  ("pekin", 'asie', 'Pékin', 8, 'Chine', '../img/pekin.jpeg', 'pekin', 650.00),
  ("bangkok", 'asie', 'Bangkok', 13, 'Thailande', '../img/bangkok.jpeg', 'bangkok', 700.00),
  ("singapour", 'asie', 'Singapour', 12, 'Singapour', '../img/singapour.jpeg', 'singapour', 750.00),
  ("hanoi", 'asie', 'Hanoi', 8, 'Vietnam', '../img/hanoi.jpeg', 'hanoi', 800.00);
INSERT INTO clients (utilisateur, passwords) VALUES ("admin","admin");

