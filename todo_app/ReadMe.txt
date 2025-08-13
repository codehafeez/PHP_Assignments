create database = todo_app

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_name VARCHAR(255) NOT NULL,
    task_description TEXT NOT NULL,
    task_status ENUM('Pending', 'In Progress', 'Completed') NOT NULL DEFAULT 'Pending',
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


INSERT INTO users (name, email, password, role)
VALUES (
    'admin', 
    'admin@example.com', 
    '$2y$10$2TkpXPSgVFc77mXyTniO5OQ4Q4bu74pcrlWP7/uUIVlfs.YVaKMgK',  -- Password=>admin@example.com
    'admin'  -- Changed to 'admin' role since this is an admin account
);

