-- Created by: Michaela Vasilakopoulou
-- Date: 08/04/2025
-- Description: SQL script to create a school management system database with tables for teachers, classes, pupils, and parent/guardians.
-- This script creates the database and tables, and inserts initial data into the class_year table.

CREATE DATABASE IF NOT EXISTS school_management_system
DEFAULT CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE school_management_system;

-- Create the tables for the school management system database

CREATE TABLE IF NOT EXISTS class_year (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class VARCHAR(30) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS addresses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    house_number VARCHAR(50),
    street VARCHAR(100),
    city VARCHAR(100),
    postcode VARCHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,  
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);

CREATE TABLE IF NOT EXISTS teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    address_id INT,
    teacher_email VARCHAR(255) UNIQUE NOT NULL,  
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

CREATE TABLE IF NOT EXISTS classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class VARCHAR(15) NOT NULL,  
    class_name VARCHAR(30) UNIQUE NOT NULL,
    building VARCHAR(50) NOT NULL,
    capacity INT NOT NULL,
    current_capacity INT NOT NULL CHECK (current_capacity <= capacity),
    teacher_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,  
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES teachers(id)
);

CREATE TABLE IF NOT EXISTS parent_guardians (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    guardian_email VARCHAR(255) UNIQUE NOT NULL,   
    guardian_telephone VARCHAR(20) NOT NULL, 
    address_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,  
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (address_id) REFERENCES addresses(id)
);

CREATE TABLE IF NOT EXISTS pupils (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    address_id INT,  
    medical_information TEXT,  
    class_name varchar(50), 
    birth_date DATE NOT NULL,
    sex VARCHAR(10) NOT NULL,  
    pupil_email VARCHAR(255) UNIQUE NOT NULL,  
    pupil_ID INT UNIQUE NOT NULL,  
    parent_one VARCHAR(100) NOT NULL,
    parent_two VARCHAR(100) NOT NULL,
    contact_number VARCHAR(25) NOT NULL,  
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,  
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (address_id) REFERENCES addresses(id)
);

CREATE TABLE IF NOT EXISTS pupil_parent_guardian (
    pupil_id INT,
    parent_guardian_id INT,
    PRIMARY KEY (pupil_id, parent_guardian_id),
    created DATETIME DEFAULT CURRENT_TIMESTAMP,  
    last_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (pupil_id) REFERENCES pupils(id),
    FOREIGN KEY (parent_guardian_id) REFERENCES parent_guardians(id)
);
