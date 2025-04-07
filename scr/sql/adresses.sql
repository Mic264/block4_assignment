CREATE TABLE addresses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    house_number VARCHAR(50),
    street VARCHAR(100),
    city VARCHAR(100),
    postcode VARCHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,  
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);
