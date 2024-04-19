CREATE TABLE webapi_categories(
  id INT UNSIGNED AUTO_INCREMENT,
  name VARCHAR(128) NOT NULL,

  PRIMARY KEY(id)
);

INSERT INTO webapi_categories(name) VALUES
( "ピザ" ), ( "ドリンク" );