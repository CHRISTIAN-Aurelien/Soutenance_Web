#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Company
#------------------------------------------------------------

CREATE TABLE Company(
        ID_COMPANY    Int  Auto_increment  NOT NULL ,
        DESCRIPTION   Varchar (180) NOT NULL ,
        COMPANY_NAME  Varchar (50) NOT NULL ,
        SECTOR        Varchar (50) NOT NULL ,
        INTERN_NUMBER Int NOT NULL
	,CONSTRAINT Company_PK PRIMARY KEY (ID_COMPANY)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Promotions
#------------------------------------------------------------

CREATE TABLE Promotions(
        ID_PROMOTIONS  Int  Auto_increment  NOT NULL ,
        PROMOTION_NAME Varchar (50) NOT NULL ,
	CONSTRAINT Promotions_PK PRIMARY KEY (ID_PROMOTIONS)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        ID_PERSON     Int  Auto_increment  NOT NULL ,
        LAST_NAME     Char (50) NOT NULL ,
        FIRST_NAME    Char (50) NOT NULL ,
        CENTER        Char (50) NOT NULL ,
        LOGIN         Varchar (50) NOT NULL ,
        PASSWORD      Varchar (50) NOT NULL ,
        ID_PROMOTIONS Int
	,CONSTRAINT User_PK PRIMARY KEY (ID_PERSON)

	,CONSTRAINT User_Promotions_FK FOREIGN KEY (ID_PROMOTIONS) REFERENCES Promotions(ID_PROMOTIONS)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ROLE
#------------------------------------------------------------

CREATE TABLE ROLE(
        ID_ROLE   Int  Auto_increment  NOT NULL ,
        Name_ROLE Varchar (50) NOT NULL
	,CONSTRAINT ROLE_PK PRIMARY KEY (ID_ROLE)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Locality
#------------------------------------------------------------

CREATE TABLE Locality(
        ID_LOCALITY Int  Auto_increment  NOT NULL ,
        CITY        Varchar (50) NOT NULL ,
        POSTAL_CODE Int NOT NULL ,
        STREET      Varchar (50) NOT NULL ,
        NUMBER      Int NOT NULL ,
        ID_COMPANY  Int NOT NULL
	,CONSTRAINT Locality_PK PRIMARY KEY (ID_LOCALITY)

	,CONSTRAINT Locality_Company_FK FOREIGN KEY (ID_COMPANY) REFERENCES Company(ID_COMPANY) on delete cascade
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Internship
#------------------------------------------------------------

CREATE TABLE Internship(
        ID_OFFERS     Int  Auto_increment  NOT NULL ,
        TITLE         Varchar (50) NOT NULL ,
        DESCRIPTION   Varchar (180) NOT NULL ,
        SKILLS        Varchar (50) NOT NULL ,
        DURATION      Int NOT NULL ,
        REMUNERATION  Int NOT NULL ,
        OFFER_DATE    Date NOT NULL ,
        PLACES_NUMBER Int NOT NULL ,
        ID_LOCALITY   Int NOT NULL
	,CONSTRAINT Internship_PK PRIMARY KEY (ID_OFFERS)

	,CONSTRAINT Internship_Locality_FK FOREIGN KEY (ID_LOCALITY) REFERENCES Locality(ID_LOCALITY) on delete cascade
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Permission
#------------------------------------------------------------

CREATE TABLE Permission(
        ID_PERMISSION            Int  Auto_increment  NOT NULL ,
        SEARCH_COMPANY           Int NOT NULL ,
        CREATE_COMPANY           Int NOT NULL ,
        UPDATE_COMPANY           Int NOT NULL ,
        EVALUATE_COMPANY         Int NOT NULL ,
        DELETE_COMPANY           Int NOT NULL ,
        STATS_COMPANY            Int NOT NULL ,
        SEARCH_OFFERS            Int NOT NULL ,
        CREATE_OFFERS            Int NOT NULL ,
        UPDATE_OFFERS            Int NOT NULL ,
        DELETE_OFFERS            Int NOT NULL ,
        STATS_OFFERS             Int NOT NULL ,
        SEARCH_PILOT_ACCOUNT     Int NOT NULL ,
        CREATE_PILOT_ACCOUNT     Int NOT NULL ,
        UPDATE_PILOT_ACCOUNT     Int NOT NULL ,
        DELETE_PILOT_ACCOUNT     Int NOT NULL ,
        SEARCH_DELEGUATE_ACCOUNT Int NOT NULL ,
        CREATE_DELEGUATE_ACCOUNT Int NOT NULL ,
        UPDATE_DELEGUATE_ACCOUNT Int NOT NULL ,
        DELETE_DELEGUATE_ACCOUNT Int NOT NULL ,
        ASSIGN_RIGHTS_DELEGUATE  Int NOT NULL ,
        SEARCH_STUDENT_ACCOUNT   Int NOT NULL ,
        CREATE_STUDENT_ACCOUNT   Int NOT NULL ,
        UPDATE_STUDENT_ACCOUNT   Int NOT NULL ,
        DELETE_STUDENT_ACCOUNT   Int NOT NULL ,
        STATS_STUDENT            Int NOT NULL ,
        ADD_OFFER_WISHLIST       Int NOT NULL ,
        DELETE_OFFER_WISHLIST    Int NOT NULL ,
        APPLY_OFFER              Int NOT NULL ,
        STATUS_STEP1_FEEDBACK    Int NOT NULL ,
        STATUS_STEP2_FEEDBACK    Int NOT NULL ,
        STATUS_STEP3_FEEDBACK    Int NOT NULL ,
        STATUS_STEP4_FEEDBACK    Int NOT NULL ,
        STATUS_STEP5_FEEDBACK    Int NOT NULL ,
        STATUS_STEP6_FEEDBACK    Int NOT NULL
	,CONSTRAINT Permission_PK PRIMARY KEY (ID_PERMISSION)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Wish
#------------------------------------------------------------

CREATE TABLE Wish(
        ID_OFFERS Int NOT NULL ,
        ID_PERSON Int NOT NULL
	,CONSTRAINT Wish_PK PRIMARY KEY (ID_OFFERS,ID_PERSON)

	,CONSTRAINT Wish_Internship_FK FOREIGN KEY (ID_OFFERS) REFERENCES Internship(ID_OFFERS) on delete cascade
	,CONSTRAINT Wish_User0_FK FOREIGN KEY (ID_PERSON) REFERENCES User(ID_PERSON) on delete cascade 
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Apply
#------------------------------------------------------------

CREATE TABLE Apply(
        ID_OFFERS        Int NOT NULL ,
        ID_PERSON        Int NOT NULL ,
        STATUS           Enum ("Apply","Company deny","Company accept","Validation sheet emitted by company","Validation sheet signed by pilot","Convention emitted to company","Convention signed by company") NOT NULL ,
        RESUME           Char (5) NOT NULL ,
        ML               Char (5) NOT NULL ,
        VALIDATION_SHEET Char (5) NOT NULL ,
        CONVENTION       Char (5) NOT NULL
	,CONSTRAINT Apply_PK PRIMARY KEY (ID_OFFERS,ID_PERSON)

	,CONSTRAINT Apply_Internship_FK FOREIGN KEY (ID_OFFERS) REFERENCES Internship(ID_OFFERS) on delete cascade
	,CONSTRAINT Apply_User0_FK FOREIGN KEY (ID_PERSON) REFERENCES User(ID_PERSON) on delete cascade 
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Be
#------------------------------------------------------------

CREATE TABLE Be(
        ID_ROLE   Int NOT NULL ,
        ID_PERSON Int NOT NULL
	,CONSTRAINT Be_PK PRIMARY KEY (ID_ROLE,ID_PERSON)

	,CONSTRAINT Be_ROLE_FK FOREIGN KEY (ID_ROLE) REFERENCES ROLE(ID_ROLE) on delete cascade
	,CONSTRAINT Be_User0_FK FOREIGN KEY (ID_PERSON) REFERENCES User(ID_PERSON) on delete cascade
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: has
#------------------------------------------------------------

CREATE TABLE has(
        ID_ROLE       Int NOT NULL ,
        ID_PERMISSION Int NOT NULL
	,CONSTRAINT has_PK PRIMARY KEY (ID_ROLE,ID_PERMISSION)

	,CONSTRAINT has_ROLE_FK FOREIGN KEY (ID_ROLE) REFERENCES ROLE(ID_ROLE) on delete cascade
	,CONSTRAINT has_Permission0_FK FOREIGN KEY (ID_PERMISSION) REFERENCES Permission(ID_PERMISSION) on delete cascade
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Grade
#------------------------------------------------------------

CREATE TABLE Grade(
        ID_COMPANY Int NOT NULL ,
        ID_PERSON  Int NOT NULL ,
        NOTE       Int NOT NULL
	,CONSTRAINT Grade_PK PRIMARY KEY (ID_COMPANY,ID_PERSON)

	,CONSTRAINT Grade_Company_FK FOREIGN KEY (ID_COMPANY) REFERENCES Company(ID_COMPANY) on delete cascade
	,CONSTRAINT Grade_User0_FK FOREIGN KEY (ID_PERSON) REFERENCES User(ID_PERSON) on delete cascade
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Correspond to 
#------------------------------------------------------------

CREATE TABLE Correspond_to(
        ID_PROMOTIONS Int NOT NULL ,
        ID_OFFERS     Int NOT NULL
	,CONSTRAINT Correspond_to_PK PRIMARY KEY (ID_PROMOTIONS,ID_OFFERS)

	,CONSTRAINT Correspond_to_Promotions_FK FOREIGN KEY (ID_PROMOTIONS) REFERENCES Promotions(ID_PROMOTIONS) on delete cascade
	,CONSTRAINT Correspond_to_Internship0_FK FOREIGN KEY (ID_OFFERS) REFERENCES Internship(ID_OFFERS) on delete cascade
)ENGINE=InnoDB;

