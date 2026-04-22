USE socialmediaapp;

CREATE TABLE adminss(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO adminss(username, password) VALUES ('admin', '12345');


CREATE TABLE jobs(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    company VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    salary VARCHAR(100) NOT NULL,
    description text(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

INSERT INTO jobs(title ,company, location,salary, description) VALUES('PHP Devolopper','TCS','KOLKATA',30000,'Good company');