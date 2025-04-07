CREATE TABLE classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class VARCHAR(15) NOT NULL,  
    class_name VARCHAR(30) NOT NULL,
    building VARCHAR(50) NOT NULL,
    capacity INT NOT NULL,
    current_capacity INT NOT NULL CHECK (current_capacity <= capacity),
    teacher_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,  
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES teachers(id)
);
