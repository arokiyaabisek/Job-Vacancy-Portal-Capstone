-- Run this in phpMyAdmin (or the MySQL tab in XAMPP) to create the database and table.

CREATE DATABASE IF NOT EXISTS job_portal;
USE job_portal;

CREATE TABLE IF NOT EXISTS job_vacancies (
  id INT AUTO_INCREMENT PRIMARY KEY,

  -- Company details
  company VARCHAR(80) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(10) NOT NULL,
  contact VARCHAR(50),
  website VARCHAR(150),
  industry VARCHAR(50) NOT NULL,
  size VARCHAR(20) NOT NULL,
  address VARCHAR(150) NOT NULL,
  city VARCHAR(40) NOT NULL,
  pincode VARCHAR(6) NOT NULL,
  gstin VARCHAR(15),

  -- Job details
  vacid VARCHAR(20),
  posted VARCHAR(20),
  title VARCHAR(60) NOT NULL,
  dept VARCHAR(50) NOT NULL,
  jobtype VARCHAR(20) NOT NULL,
  mode VARCHAR(20) NOT NULL,
  location VARCHAR(60) NOT NULL,
  openings INT NOT NULL,
  exp INT NOT NULL,
  level VARCHAR(30) NOT NULL,
  salmin INT NOT NULL,
  salmax INT NOT NULL,
  qualification VARCHAR(30) NOT NULL,
  deadline DATE NOT NULL,
  skills VARCHAR(150) NOT NULL,
  description TEXT NOT NULL,

  -- Hiring process
  applymail VARCHAR(100) NOT NULL,
  joining VARCHAR(30) NOT NULL,
  interview VARCHAR(20) NOT NULL,
  shift VARCHAR(20) NOT NULL,
  benefits VARCHAR(255),
  notes VARCHAR(300),

  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
