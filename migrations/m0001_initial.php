<?php

class m0001_initial {
    public function up()
    {
        $db = \app\Core\Application::$app->db;
        $SQL = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                status TINYINT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                role INT 
                
) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
        $SQL2 = "CREATE TABLE documents (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nrfaktury INT NOT NULL,
                nrkontrahenta INT NOT NULL,
                vatid INT NOT NULL,
                kwotanetto DECIMAL NOT NULL,
                kwotapodatkuvat DECIMAL NOT NULL,
                kwotabrutto DECIMAL NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                
) ENGINE=INNODB;";
        $db->pdo->exec($SQL2);

        $SQL3 = "CREATE TABLE files(
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                image VARCHAR(255) NOT NULL
) ENGINE=INNODB;";
        $db->pdo->exec($SQL3);

    }


    public function down()
    {
        $db = \app\Core\Application::$app->db;
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}