CREATE TABLE pupils (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    address_id INT,  
    medical_information TEXT,  
    class_name varchar(50), 
    birth_date DATE NOT NULL,
    sex VARCHAR(10) NOT NULL,  
    pupil_email VARCHAR(255) NOT NULL,  
    pupil_ID INT NOT NULL UNIQUE,  
    parent_one VARCHAR(100) NOT NULL,
    parent_two VARCHAR(100) NOT NULL,
    contact_number VARCHAR(25) NOT NULL,  
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,  
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (address_id) REFERENCES addresses(id)
);
