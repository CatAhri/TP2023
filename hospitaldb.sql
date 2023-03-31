CREATE DATABASE hospital;
CREATE TABLE doctors (
    id INT,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    speciality VARCHAR(255),
    CONSTRAINT pk_doctors_id PRIMARY KEY (id)
);

CREATE TABLE patients (
    id INT,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    doctor_id INT,
    CONSTRAINT fk_doctor_id FOREIGN KEY (doctor_id) REFERENCES doctors(id)
);
