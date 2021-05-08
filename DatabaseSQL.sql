-- drop existing tables (if they exist)
DROP TABLE IF EXISTS Donation;
DROP TABLE IF EXISTS Recipient;
DROP TABLE IF EXISTS Exhibit;
DROP TABLE IF EXISTS Member;
DROP TABLE IF EXISTS Contact_Information;
DROP TABLE IF EXISTS Donor;
DROP TABLE IF EXISTS Organization;



CREATE TABLE Organization (
	OrgName VARCHAR(255) PRIMARY KEY,
	OrgType VARCHAR(255) NOT NULL, 
	Description VARCHAR(255) NOT NULL, 
	TotalOrgDonation FLOAT NOT NULL
);

INSERT INTO Organization (OrgName, OrgType, Description, TotalOrgDonation)
VALUES ('Coffman Foundation', 'Research', 'Foundation to better the research and museum communities', 10000.00);

INSERT INTO Organization (OrgName, OrgType, Description, TotalOrgDonation)
VALUES ('Herrington Home', 'nonprofit', 'Shelter to help homeless kids find homes', 10001.00);



CREATE TABLE Donor (
	MemId INT PRIMARY KEY,
	FirstName VARCHAR(255) NOT NULL, 
	LastName VARCHAR(255) NOT NULL,
	Age INTEGER NOT NULL CHECK (Age > 0),
	Veteran BIT NOT NULL,
	TotalDonations FLOAT NOT NULL CHECK (TotalDonations > 0),
	OrgName VARCHAR(255),
	FOREIGN KEY (OrgName) REFERENCES Organization(OrgName)
);

INSERT INTO Donor (MemId, FirstName, LastName, Age, Veteran, TotalDonations, OrgName)
VALUES (68421, 'Joel', 'Coffman', 37, 1, 10000.00, 'Coffman Foundation');

INSERT INTO Donor (MemId, FirstName, LastName, Age, Veteran, TotalDonations, OrgName)
VALUES (22022, 'Michael', 'Herrington', 21, 0, 10001.00, 'Herrington Home');










CREATE TABLE Contact_Information (
	MemId INT PRIMARY KEY,
	FirstName VARCHAR(255) NOT NULL,
	LastName VARCHAR(255) NOT NULL,
	Phone VARCHAR(255) NOT NULL CHECK (Phone  LIKE '[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]'),
	Email VARCHAR(255),
	Address VARCHAR(255) NOT NULL,
	FOREIGN KEY (MemId) REFERENCES Donor(MemId)
);

INSERT INTO Contact_Information (MemId, FirstName, LastName, Phone, Email, Address)
VALUES (68421, 'Joel', 'Coffman', '7193337664', 'joel.coffman@usafa.edu', '1234 Coff Drive');

INSERT INTO Contact_Information (MemId, FirstName, LastName, Phone, Email, Address)
VALUES (22022, 'Michael', 'Herrington', '6789209641', 'c22michael.herrington@afacademy.af.edu', '2360 Vandenberg Dr');



CREATE TABLE Exhibit (
	ExhibitName VARCHAR(255) PRIMARY KEY,
	ExhibitDesc VARCHAR(255) NOT NULL,
	
TotalExhibitDonation FLOAT NOT NULL CHECK (TotalExhibitDonation > 0)
);



INSERT INTO Exhibit (ExhibitName, ExhibitDesc, TotalExhibitDonation)
VALUES('P38', 'P-38 Lightining',  10000.00);

INSERT INTO Exhibit (ExhibitName, ExhibitDesc, TotalExhibitDonation)
VALUES ('F4U', 'F4U Corsair', 10001.00);

INSERT INTO Exhibit (ExhibitName, ExhibitDesc, TotalExhibitDonation)
VALUES ('B25', 'B25', 10001.00);

CREATE TABLE Member (
	OrgName VARCHAR(255) PRIMARY KEY,
	MemId INT ,
	FOREIGN KEY (MemId) REFERENCES Donor(MemId)
);

INSERT INTO Member (OrgName, MemID)
VALUES ('Coffman Foundation', 68421);

INSERT INTO Member (OrgName, MemID)
VALUES ('Herrington Home', 22022);


CREATE TABLE Recipient (
	ExhibitName VARCHAR(255) PRIMARY KEY,
	MemId INT ,
	FOREIGN KEY (MemId) REFERENCES Donor(MemId)
);

INSERT INTO Recipient (ExhibitName, MemId)
VALUES ('P38', 68421);

INSERT INTO Recipient (ExhibitName, MemId)
VALUES ('B25', 22022);

CREATE TABLE Donation (
	ID INT auto_increment Primary KEY,
	MemId INT ,
	ExhibitName VARCHAR(255) NOT NULL,
	Amount FLOAT NOT NULL CHECK (Amount > 0),
	FOREIGN KEY (MemId) REFERENCES Donor(MemId),
	FOREIGN KEY (ExhibitName) REFERENCES Exhibit(ExhibitName)
);

INSERT INTO Donation (MemID, ExhibitName, Amount)
VALUES (68421, 'P38',10000.00);

INSERT INTO Donation (MemID, ExhibitName, Amount)
VALUES (22022, 'B25',10001.00);
