-- Create Database (If not already created)
CREATE DATABASE IF NOT EXISTS library_db;
USE library_db;

-- Create Contacts Table
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Sample Data
INSERT INTO contacts (name, email, phone, message) 
VALUES 
('John Doe', 'johndoe@example.com', '1234567890', 'Hello, I need assistance with my account.'),
('Jane Smith', 'janesmith@example.com', '0987654321', 'How can I borrow a book online?'),
('Michael Brown', 'michaelb@example.com', '9876543210', 'I want to donate some books.'),
('Emily White', 'emilyw@example.com', '8765432109', 'What are your library timings?');
