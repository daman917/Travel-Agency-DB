drop table ATTRACTIONRESERVATION cascade constraints;
drop table ATTRACTIONS cascade constraints;
drop table BRINGSLUGGAGE cascade constraints;
drop table BUSDRIVER cascade constraints;
drop table CITY cascade constraints;
drop table CUSTOMER cascade constraints;
drop table CUSTOMEREMAILS cascade constraints;
drop table DRIVERTRANSPORTS cascade constraints;
drop table EMPLOYEE cascade constraints;
drop table HELPSCUSTOMER cascade constraints;
drop table HOTEL cascade constraints;
drop table HOTELFLOORS cascade constraints;
drop table HOTELRESERVATION cascade constraints;
drop table JOINTOUR cascade constraints;
drop table TOURGOESTO cascade constraints;
drop table TOURGROUPGUIDES cascade constraints;
drop table TOURGUIDE cascade constraints;
drop table TRAVELAGENCY cascade constraints;
drop table TRAVELAGENT cascade constraints;
drop table TRAVELCITY cascade constraints;

-- CREATE TABLES --
CREATE TABLE Employee (
  	ID INT PRIMARY KEY,
    AgencyName CHAR(256) NOT NULL,
  	EmployeeName CHAR(256)
);

CREATE TABLE BusDriver (
    ID INT PRIMARY KEY,
    FOREIGN KEY (ID) REFERENCES Employee
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE TourGuide (
    ID INT PRIMARY KEY,
    FOREIGN KEY (ID) REFERENCES Employee
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE TravelAgent (
    ID INT PRIMARY KEY,
    FOREIGN KEY (ID) REFERENCES Employee
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE City (
  	CityCoords CHAR(256) PRIMARY KEY,
  	CityName CHAR(256)
);

CREATE TABLE Attractions (
    AttractionCoordinates CHAR(256) PRIMARY KEY, 
    AttractionName CHAR(256),
    CityCoords CHAR(256) NOT NULL,
    FOREIGN KEY (CityCoords) REFERENCES City
        ON DELETE CASCADE
);

CREATE TABLE AttractionReservation (
    AttractionBookingID CHAR(256) PRIMARY KEY, 
    AttractionCoordinates CHAR(256) NOT NULL, 
    StartTime TIMESTAMP, 
    EndTime TIMESTAMP,
    AgentID INT NOT NULL,
    FOREIGN KEY (AttractionCoordinates) REFERENCES Attractions
        ON DELETE CASCADE,
    FOREIGN KEY (AgentID) REFERENCES TravelAgent
        ON DELETE CASCADE
);

CREATE TABLE Customer (
  	ID INT PRIMARY KEY,
  	CustomerName CHAR(256)
);

CREATE TABLE CustomerEmails (
	CustomerName CHAR(256) PRIMARY KEY,
	Email CHAR(256) UNIQUE
);

CREATE TABLE Hotel (
	HotelName CHAR(256), 
    HotelLocation CHAR(256),
    CityCoords CHAR(256) NOT NULL, 
    Rate INT,
    PRIMARY KEY (HotelName, HotelLocation),
    FOREIGN KEY (CityCoords) REFERENCES City
        ON DELETE CASCADE
);

CREATE TABLE HotelReservation (
	HotelBookingID CHAR(256) PRIMARY KEY, 
    RoomNum INT, 
    CheckIn TIMESTAMP, 
    CheckOut TIMESTAMP, 
    ID INT NOT NULL,
    HotelName CHAR(256) NOT NULL, 
    HotelLocation CHAR(256) NOT NULL,
    FOREIGN KEY (ID) REFERENCES Customer
        ON DELETE CASCADE,
    FOREIGN KEY (HotelName, HotelLocation) REFERENCES Hotel
        ON DELETE CASCADE
);

CREATE TABLE HotelFloors (
	RoomNum INT PRIMARY KEY,
	FloorNum INT
);

CREATE TABLE TourGroupGuides(
	ID CHAR(256) PRIMARY KEY,
	GuideID INT NOT NULL,
	NumGuests INT,
	FOREIGN KEY (GuideID) REFERENCES TourGuide(ID)
        ON DELETE CASCADE
);

CREATE TABLE JoinTour(
	CustomerID INT,
	TourID CHAR(256),
	PRIMARY KEY(CustomerID, TourID),
	FOREIGN KEY (CustomerID) REFERENCES Customer(ID)
        ON DELETE CASCADE,
	FOREIGN KEY (TourID) REFERENCES TourGroupGuides(ID)
        ON DELETE CASCADE
);

CREATE TABLE DriverTransports(
	CID INT,
	BID INT,
	DriverRoute CHAR(256),
	PRIMARY KEY(CID, BID),
	FOREIGN KEY (CID) REFERENCES Customer(ID)
        ON DELETE CASCADE,
    FOREIGN KEY (BID) REFERENCES BusDriver(ID)
        ON DELETE CASCADE
);

CREATE TABLE TourGoesTo(
	Coordinates CHAR(256),
	ID CHAR(256),
	PRIMARY KEY(Coordinates, ID),
	FOREIGN KEY (Coordinates) REFERENCES Attractions
        ON DELETE CASCADE,
	FOREIGN KEY (ID) REFERENCES TourGroupGuides(ID)
        ON DELETE CASCADE
);

CREATE TABLE TravelAgency (
	AgencyName CHAR(256) PRIMARY KEY
);

CREATE TABLE BringsLuggage(
	ID INTEGER,
	NUM INTEGER,
	PRIMARY KEY(ID, NUM),
	FOREIGN KEY (ID) REFERENCES Customer
        ON DELETE CASCADE
);

CREATE TABLE HelpsCustomer(
    AgencyName CHAR(256),
    ID INTEGER,
    PAYMENT FLOAT,
    PRIMARY KEY(AgencyName, ID),
    FOREIGN KEY (AgencyName) REFERENCES TravelAgency
        ON DELETE CASCADE,
    FOREIGN KEY (ID) REFERENCES Customer
        ON DELETE CASCADE
);


CREATE TABLE TravelCity(
	CityCoords CHAR(256),
	ID INTEGER,
    DateStart DATE,
	DateEnd DATE,
	PRIMARY KEY(CityCoords, ID),
	FOREIGN KEY (CityCoords) REFERENCES City
        ON DELETE CASCADE,
	FOREIGN KEY(ID) REFERENCES Customer
        ON DELETE CASCADE
);

-- POPULATE TABLES --
INSERT ALL 
    INTO Employee VALUES (11, 'Expedia', 'Rob Teller')
    INTO Employee VALUES(23, 'Reliance', 'Emily Samt')
    INTO Employee VALUES(65, 'Expedia', 'Eric Smith')
    INTO Employee VALUES(4, 'Expedia', 'Robert Dell')
    INTO Employee VALUES(6, 'Reliance', 'Sarah Conners')
    INTO Employee VALUES(19, 'Reliance', 'Sammy Geen')
    INTO Employee VALUES(45, 'Travel GO', 'John Johnson')
    INTO Employee VALUES(33, 'Travel GO', 'Britney Ho')
    INTO Employee VALUES(89, 'Expedia', 'Samantha Mayweather')
    INTO Employee VALUES(101, 'Travel GO', 'Carl Jersey')
    INTO Employee VALUES(22, 'Reliance', 'Sam Carlson')
    INTO Employee VALUES(46, 'Travel GO', 'Jonny Roberts')
    INTO Employee VALUES(74, 'Travel GO', 'Harold Hamsden')
    INTO Employee VALUES(88, 'Expedia', 'Richard Gab')
    INTO Employee VALUES(99, 'Travel GO', 'Carlos McMan')
SELECT * FROM DUAL;

INSERT ALL
    INTO  BusDriver VALUES (11)
    INTO  BusDriver VALUES (23)
    INTO  BusDriver VALUES (65)
    INTO  BusDriver VALUES (4)
    INTO  BusDriver VALUES (6)
SELECT * FROM DUAL;

INSERT ALL 
    INTO TourGuide VALUES (19)
    INTO TourGuide VALUES (45)
    INTO TourGuide VALUES (33)
    INTO TourGuide VALUES (89)
    INTO TourGuide VALUES (101)
SELECT * FROM DUAL;

INSERT ALL 
    INTO TravelAgent VALUES (22)
    INTO TravelAgent VALUES (46)
    INTO TravelAgent VALUES (74)
    INTO TravelAgent VALUES (88)
    INTO TravelAgent VALUES (99)
SELECT * FROM DUAL;

INSERT ALL 
    INTO City VALUES ('48.8566 N, 2.3522 E', 'Paris')
    INTO City VALUES ('51.5072 N, 0.1276 W', 'London')
    INTO City VALUES ('41.9028 N, 12.4964 E', 'Rome')
    INTO City VALUES ('43.6532 N, 79.3832 W', 'Toronto')
    INTO City VALUES ('40.7128 N, 74.0060 W', 'New York')
SELECT * FROM DUAL;

INSERT ALL 
    INTO Customer VALUES (1, 'Bob Smith')
    INTO Customer VALUES (2, 'Maggie Rab')
    INTO Customer VALUES (6, 'Tom Saggen')
    INTO Customer VALUES (4, 'Elise Saggen')
    INTO Customer VALUES (11, 'Sammy El')
    INTO Customer VALUES (22, 'Tyler Travel')
SELECT * FROM DUAL;

INSERT ALL 
    INTO Attractions VALUES ('48.8584 N, 2.2945 E', 'Eiffel Tower', '48.8566 N, 2.3522 E')
    INTO Attractions VALUES ('51.5014 N, 0.1419 W', 'Buckingham Palace', '51.5072 N, 0.1276 W')
    INTO Attractions VALUES ('41.8902 N, 12.4922 E', 'Colosseum', '41.9028 N, 12.4964 E')
    INTO Attractions VALUES ('43.6426 N, 79.3871 W', 'CN Tower', '43.6532 N, 79.3832 W')
    INTO Attractions VALUES ('40.7484 N, 73.9857 W', 'Empire State Building', '40.7128 N, 74.0060 W')
SELECT * FROM DUAL;

INSERT ALL 
    INTO AttractionReservation VALUES ('r34567', '48.8584 N, 2.2945 E', TIMESTAMP '2022-06-05 12:00:00', TIMESTAMP '2022-07-05 19:00:00', 22)
    INTO AttractionReservation VALUES ('r44892', '41.8902 N, 12.4922 E', TIMESTAMP '2023-07-28 10:00:00', TIMESTAMP '2023-08-04 10:00:00', 46)
    INTO AttractionReservation VALUES ('r90123', '51.5014 N, 0.1419 W', TIMESTAMP '2021-02-15 12:00:00', TIMESTAMP '2021-03-01 12:00:00', 74)
    INTO AttractionReservation VALUES ('r01459', '40.7484 N, 73.9857 W', TIMESTAMP '2022-08-05 14:00:00', TIMESTAMP '2022-08-08 14:00:00', 88)
    INTO AttractionReservation VALUES ('r75823', '43.6426 N, 79.3871 W', TIMESTAMP '2021-07-22 12:00:00', TIMESTAMP '2021-07-30 13:00:00', 99)
SELECT * FROM DUAL;

INSERT ALL 
    INTO Hotel VALUES ('Romeos', 'Rome', '41.9028 N, 12.4964 E', 19)
    INTO Hotel VALUES ('La Place Sinclaire', 'Paris', '48.8566 N, 2.3522 E', 22)
    INTO Hotel VALUES ('Hotel Belfast', 'Paris', '48.8566 N, 2.3522 E', 30)
    INTO Hotel VALUES ('Ramada', 'Toronto', '43.6532 N, 79.3832 W', 25)
    INTO Hotel VALUES ('Four Seasons', 'Toronto', '43.6532 N, 79.3832 W', 40)
    INTO Hotel VALUES ('Jeremys Hotel', 'London',  '51.5072 N, 0.1276 W', 21)
    INTO Hotel VALUES ('Four Seasons', 'New York', '40.7128 N, 74.0060 W', 35)
    INTO Hotel VALUES ('Hotel Belfast', 'New York', '40.7128 N, 74.0060 W', 25)
SELECT * FROM DUAL;

INSERT ALL 
    INTO HotelReservation VALUES ('b45890', 314, TIMESTAMP '2023-07-29 08:00:00', TIMESTAMP '2023-08-02 11:00:00', 6, 'Romeos', 'Rome')
    INTO HotelReservation VALUES ('b45891', 315, TIMESTAMP '2023-07-29 08:00:00', TIMESTAMP '2023-08-02 11:00:00', 4, 'Romeos', 'Rome')
    INTO HotelReservation VALUES ('b30567', 101, TIMESTAMP '2021-02-16 09:00:00', TIMESTAMP '2021-03-01 11:00:00', 1, 'Jeremys Hotel', 'London')
    INTO HotelReservation VALUES ('b92301', 904, TIMESTAMP '2022-08-06 08:00:00', TIMESTAMP '2022-08-08 11:00:00', 2, 'Four Seasons', 'New York')
    INTO HotelReservation VALUES ('b20199', 502, TIMESTAMP '2022-06-05 09:00:00', TIMESTAMP '2022-07-03 10:00:00', 11, 'La Place Sinclaire', 'Paris')
SELECT * FROM DUAL;

INSERT ALL 
    INTO HotelFloors VALUES (314, 3)
    INTO HotelFloors VALUES (315, 3)
    INTO HotelFloors VALUES (101, 1)
    INTO HotelFloors VALUES (904, 9)
    INTO HotelFloors VALUES (502, 5)
SELECT * FROM DUAL;

INSERT ALL 
    INTO TourGroupGuides VALUES ('t45678', 33, 12)
    INTO TourGroupGuides VALUES ('t18973', 101, 25)
    INTO TourGroupGuides VALUES ('t18974', 101, 15)
    INTO TourGroupGuides VALUES ('t00054', 89, 0)
    INTO TourGroupGuides VALUES ('t67430', 45, 9)
    INTO TourGroupGuides VALUES ('t45419', 19, 14)
SELECT * FROM DUAL;

INSERT ALL 
    INTO JoinTour VALUES (6,  't18973')
    INTO JoinTour VALUES (4, 't18973')
    INTO JoinTour VALUES (11, 't67430')
    INTO JoinTour VALUES (2, 't45419')
    INTO JoinTour VALUES (1, 't45678')
SELECT * FROM DUAL;

INSERT ALL 
    INTO DriverTransports VALUES (6, 23, 'Romeos To Colosseum')
    INTO DriverTransports VALUES (4, 23, 'Romeos To Colosseum')
    INTO DriverTransports VALUES (11, 65, 'La Place Sinclaire To Eiffel Tower')
    INTO DriverTransports VALUES (2, 11, 'Four Seasons To Empire  State Building')
    INTO DriverTransports VALUES (1, 4, 'Jeremy’s Hotel to Buckingham Palace') 
SELECT * FROM DUAL;

INSERT ALL 
    INTO TourGoesTo VALUES ('41.8902 N, 12.4922 E', 't18973' )
    INTO TourGoesTo VALUES ('41.8902 N, 12.4922 E', 't18974' )
    INTO TourGoesTo VALUES ('43.6426 N, 79.3871 W', 't00054')
    INTO TourGoesTo VALUES ('48.8584 N, 2.2945 E', 't67430')
    INTO TourGoesTo VALUES ('40.7484 N, 73.9857 W', 't45419')
    INTO TourGoesTo VALUES ('51.5014 N, 0.1419 W', 't45678')
SELECT * FROM DUAL;

INSERT ALL 
    INTO TravelAgency VALUES ('Expedia')
    INTO TravelAgency VALUES ('Reliance')
    INTO TravelAgency VALUES ('Travel Go')
    INTO TravelAgency VALUES ('Guide Me')
    INTO TravelAgency VALUES ('Movement Travel')
SELECT * FROM DUAL;

INSERT ALL 
    INTO CustomerEmails VALUES ('Bob Smith', 'bobsmith51@gmail.com')
    INTO CustomerEmails VALUES ('Maggie Rab', 'mrab@gmail.com')
    INTO CustomerEmails VALUES ('Tom Saggen', 'toms85@gmail.com')
    INTO CustomerEmails VALUES ('Elise Saggen', 'elises544@gmail.com')
    INTO CustomerEmails VALUES ('Sammy El', 'sel62@hotmail.com')
SELECT * FROM DUAL;

INSERT ALL 
    INTO BringsLuggage VALUES (1, 1)
    INTO BringsLuggage VALUES (2, 1)
    INTO BringsLuggage VALUES (2, 2)
    INTO BringsLuggage VALUES (6, 1)
    INTO BringsLuggage VALUES (6, 2)
    INTO BringsLuggage VALUES (6, 3)
    INTO BringsLuggage VALUES (4, 1)
    INTO BringsLuggage VALUES (11, 1)
SELECT * FROM DUAL;

INSERT ALL 
    INTO HelpsCustomer VALUES ('Expedia', 6, 1200)
    INTO HelpsCustomer VALUES ('Expedia', 4, 0)
    INTO HelpsCustomer VALUES ('Travel Go', 11, 300)
    INTO HelpsCustomer VALUES ('Guide Me', 1, 450)
    INTO HelpsCustomer VALUES ('Reliance', 2, 800)
SELECT * FROM DUAL;

INSERT ALL 
    INTO TravelCity VALUES ('41.9028 N, 12.4964 E', 6, DATE '2023-07-29', DATE '2023-08-02')
    INTO TravelCity VALUES ('41.9028 N, 12.4964 E', 4, DATE '2023-07-29', DATE '2023-08-02')
    INTO TravelCity VALUES ('48.8566 N, 2.3522 E', 11, DATE '2022-06-05', DATE '2022-07-03')
    INTO TravelCity VALUES ('40.7128 N, 74.0060 W', 2, DATE '2022-08-06', DATE '2022-08-08')
    INTO TravelCity VALUES ('51.5072 N, 0.1276 W', 2, DATE '2021-02-16', DATE '2021-03-01')
    INTO TravelCity VALUES ('41.9028 N, 12.4964 E', 22, DATE '2023-07-29', DATE '2023-08-02')
    INTO TravelCity VALUES ('48.8566 N, 2.3522 E', 22, DATE '2022-06-05', DATE '2022-07-03')
    INTO TravelCity VALUES ('40.7128 N, 74.0060 W', 22, DATE '2022-08-06', DATE '2022-08-08')
    INTO TravelCity VALUES ('51.5072 N, 0.1276 W', 22, DATE '2021-02-16', DATE '2021-03-01')
    INTO TravelCity VALUES ('43.6532 N, 79.3832 W', 22, DATE '2023-05-16', DATE '2023-06-12')
SELECT * FROM DUAL;
