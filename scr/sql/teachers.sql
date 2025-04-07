CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    address_id INT,
    teacher_telephone VARCHAR(20) NOT NULL, 
    annual_salary DECIMAL(10, 2) NOT NULL,
    background_check BOOLEAN NOT NULL,
    class VARCHAR(100) NOT NULL, 
    birth_date DATE NOT NULL,
    sex VARCHAR(10) NOT NULL, 
    working_hours INT NOT NULL,
    educational_qualifications VARCHAR(255) NOT NULL, 
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,  
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (address_id) REFERENCES addresses(id)
);
