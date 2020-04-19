DROP DATABASE IF EXISTS roca;

CREATE DATABASE roca;

USE roca;

/*ALTER SESSION SET CONSTRAINTS = DEFERRED;*/

/*DROP TABLE IF EXISTS job_opening;
DROP TABLE IF EXISTS search_committee;
DROP TABLE IF EXISTS association;
DROP TABLE IF EXISTS company;
DROP TABLE IF EXISTS employee;
DROP TABLE IF EXISTS applicants;*/

CREATE TABLE IF NOT EXISTS association(
	association_id INT NOT NULL,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(100),
    address VARCHAR(50),
    id_number INT NOT NULL,
    CONSTRAINT association_pk PRIMARY KEY (association_id)
);

CREATE TABLE IF NOT EXISTS company(
	id_number INT NOT NULL,
    name VARCHAR(30) NOT NULL,
    address VARCHAR(50),
    description VARCHAR(100),
    employee_id INT NOT NULL,
    jobOpening_id INT NOT NULL,
    CONSTRAINT company_pk PRIMARY KEY (id_number)
);

CREATE TABLE IF NOT EXISTS employee(
	employee_id INT NOT NULL,
    name VARCHAR(15),
    last_name VARCHAR(15),
    email VARCHAR(30),
    address VARCHAR(50),
    resume VARCHAR(1000),
    id_number INT NOT NULL,
    CONSTRAINT employee_pk PRIMARY KEY (employee_id)
);

CREATE TABLE IF NOT EXISTS job_opening(
	opening_id INT NOT NULL,
    description VARCHAR(100),
    date VARCHAR(15),
    status VARCHAR(15),
    company_id INT NOT NULL,
    applicants_id INT NOT NULL,
    searchCommittee_id INT NOT NULL,
    CONSTRAINT job_opening_pk PRIMARY KEY (opening_id)
);

CREATE TABLE IF NOT EXISTS applicants(
	applicants_id INT NOT NULL,
    name VARCHAR(15),
    last_name VARCHAR(15),
    resume VARCHAR(1000),
    statusOfApplication VARCHAR(15),
    CONSTRAINT applicants_pk PRIMARY KEY (applicants_id)
);

CREATE TABLE IF NOT EXISTS search_committee(
	searchCommittee_id INT NOT NULL,
    employee_id INT NOT NULL,
    opening_id INT NOT NULL,
    CONSTRAINT search_committee_pk PRIMARY KEY (searchCommittee_id)
);

/*ALTER TABLE association ADD CONSTRAINT association_company_fk FOREIGN KEY (id_number) REFERENCES company (id_number);
ALTER TABLE company ADD CONSTRAINT company_employee_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id);
ALTER TABLE company ADD CONSTRAINT company_job_opening_fk FOREIGN KEY (jobOpening_id) REFERENCES job_opening (opening_id);
ALTER TABLE employee ADD CONSTRAINT employee_company_fk FOREIGN KEY (id_number) REFERENCES company (id_number);
ALTER TABLE job_opening ADD CONSTRAINT job_opening_company_fk FOREIGN KEY (company_id) REFERENCES company (id_number);
ALTER TABLE job_opening ADD CONSTRAINT job_opening_applicants_fk FOREIGN KEY (applicants_id) REFERENCES applicants (applicants_id);
ALTER TABLE job_opening ADD CONSTRAINT job_opening_search_committee_fk FOREIGN KEY (searchCommittee_id) REFERENCES search_committee (searchCommittee_id);
ALTER TABLE search_committee ADD CONSTRAINT search_committee_employee_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id);
ALTER TABLE search_committee ADD CONSTRAINT search_committee_job_opening_fk FOREIGN KEY (opening_id) REFERENCES job_opening (opening_id);*/