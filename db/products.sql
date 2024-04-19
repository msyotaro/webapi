CREATE TABLE webapi_products(
  id INT UNSIGNED AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  price INT UNSIGNED DEFAULT 0,
  category INT UNSIGNED NOT NULL,

  PRIMARY KEY(id)
);


INSERT INTO webapi_products(
  name,
  price,
  category
)
VALUES
(
  "ペペロニピザ",
  1600,
  1
),
(
  "コーラ",
  200,
  2
);