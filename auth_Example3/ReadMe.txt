List of active devices (Action to Logout)
Default login 2 minutes
Session Handling using Databse

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user_sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    status TINYINT(1) DEFAULT 1,
    session_active INT DEFAULT 0,
    session_destroy_seconds INT DEFAULT 120,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (id, username, password, email) 
VALUES (1, 'Abdul Hafeez', '123456', 'codehafeez@gmail.com');
