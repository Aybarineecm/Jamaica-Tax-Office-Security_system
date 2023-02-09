DROP DATABASE IF EXISTS TAJ;
CREATE DATABASE TAJ;
USE TAJ;

--
-- Table structure for table `users`
-- STORES EMPLOYEE AND SECURITY TABLES
--

-- Managers at TAJ
DROP TABLE IF EXISTS Managers;
CREATE TABLE Managers (
    id INT(11) NOT NULL auto_increment,
    firstname VARCHAR(50) NOT NULL default '',
    lastname VARCHAR(50) NOT NULL default '',
    username VARCHAR(50) NOT NULL default '',
    password VARCHAR(50) NOT NULL default '',
    created_at DATETIME NOT NULL,
    PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

LOCK TABLES Managers WRITE;
INSERT INTO Managers VALUES (1, 'Manager1', 'surname', 'Man1@TAJ', 'Password123', CURRENT_TIMESTAMP);
INSERT INTO Managers VALUES (2, 'Manager2', 'surname', 'Man2@TAJ', 'Unlock123', CURRENT_TIMESTAMP);
UNLOCK TABLES;


-- Employees at TAJ
DROP TABLE IF EXISTS Employees;
CREATE TABLE Employees (
    id INT(11) NOT NULL auto_increment,
    firstname VARCHAR(50) NOT NULL default '',
    lastname VARCHAR(50) NOT NULL default '',
	job_position VARCHAR(50) NOT NULL default '',
    floornum INT(2) NOT NULL,
    TRN INT(9) NOT NULL,
    created_at DATETIME NOT NULL,
    PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


-- Employees in building
DROP TABLE IF EXISTS PresentEmployees;
CREATE TABLE PresentEmployees (
    employee_id INT(11) NOT NULL,
    FOREIGN KEY (employee_id) REFERENCES Employees(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;


-- Clock In/Out Log
DROP TABLE IF EXISTS EmployeesLog;
CREATE TABLE EmployeesLog (
    lognum INT(11) NOT NULL auto_increment,
    employee_id INT(11) NOT NULL,
    log_type VARCHAR(50) NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY (lognum),
    FOREIGN KEY (employee_id) REFERENCES Employees(id),
    CHECK (log_type = 'IN' OR log_type = 'OUT')
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;


-- Security at TAJ
DROP TABLE IF EXISTS Security;
CREATE TABLE Security (
    id INT(11) NOT NULL auto_increment,
    firstname VARCHAR(50) NOT NULL default '',
    lastname VARCHAR(50) NOT NULL default '',
    username VARCHAR(50) NOT NULL default '',
    password VARCHAR(50) NOT NULL default '',
    created_at DATETIME NOT NULL,
    PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

LOCK TABLES Security WRITE;
INSERT INTO Security VALUES (1, 'Security1', 'surname', 'Sec1@TAJ', 'Hello123', CURRENT_TIMESTAMP);
UNLOCK TABLES;


-- Visitors in building
DROP TABLE IF EXISTS Vistors;
CREATE TABLE Visitors (
    tid varchar(50) NOT NULL,
    government_id VARCHAR(50) NOT NULL,
    firstname VARCHAR(50) NOT NULL default '',
    lastname VARCHAR(50) NOT NULL default '',
    purpose VARCHAR(50) NOT NULL default 'Accounts',
    floornum INT(2) NOT NULL,
    dateandtime VARCHAR(50) NOT NULL default '';
    CHECK (purpose = 'Accounts' OR purpose = 'Auditing' OR purpose = 'Human Relations')
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;


-- Visitor Entry/Exit Log
DROP TABLE IF EXISTS VisitorsLog;
CREATE TABLE VisitorsLog (
    lognum INT(11) NOT NULL auto_increment,
    government_id INT(11) NOT NULL,
    firstname VARCHAR(50) NOT NULL default '',
    lastname VARCHAR(50) NOT NULL default '',
    purpose VARCHAR(50) NOT NULL default 'Accounts',
    floornum INT(2) NOT NULL,
    log_type VARCHAR(50) NOT NULL default 'IN',
    PRIMARY KEY (lognum),
    CHECK (purpose = 'Accounts' OR purpose = 'Auditing' OR purpose = 'Human Relations'),
    CHECK (log_type = 'IN' OR log_type = 'OUT')
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;


GRANT ALL PRIVILEGES ON TAJ.* TO 'project_user'@'localhost' IDENTIFIED BY 'password123';