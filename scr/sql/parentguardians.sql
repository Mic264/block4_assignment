CREATE TABLE parent_guardians (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    guardian_email VARCHAR(255) NOT NULL,   
    guardian_telephone VARCHAR(20) NOT NULL, 
    address_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,  
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (address_id) REFERENCES addresses(id)
);
