CREATE DATABASE RESTAURANT;
USE RESTAURANT;
-- An
SET FOREIGN_KEY_CHECKS=0;
CREATE TABLE EMPLOYEE(
	ID CHAR(9) NOT NULL PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Phone CHAR(10) NOT NULL,
	Bdate DATE NOT NULL,
    Sex VARCHAR(255) NOT NULL,
    Address VARCHAR(255) NOT NULL,
    Salary DECIMAL(10,2) NOT NULL,
    Eaccount VARCHAR(255),
    Bnumber INT NOT NULL
  --  FOREIGN KEY(Eaccount) REFERENCES ACCOUNT(Username)
);
CREATE TABLE MANAGER(
	ID CHAR(9) NOT NULL PRIMARY KEY
  --  FOREIGN KEY(ID) REFERENCES EMPLOYEE(ID)
);

CREATE TABLE SHIFT(
	EID CHAR(9) NOT NULL,
    Day_of_week VARCHAR(32) NOT NULL,
    Session VARCHAR(32) NOT NULL,
    Day VARCHAR(32) NOT NULL,
    PRIMARY KEY(EID,Day_of_week,Session,Day)
   -- FOREIGN KEY(EID) REFERENCES EMPLOYEE(ID)
);
CREATE TABLE SERVERS(
	ID CHAR(9) NOT NULL PRIMARY KEY,
	Work_experience VARCHAR(255) NULL
  --  FOREIGN KEY(ID) REFERENCES EMPLOYEE(ID)
);
-- Bảo
CREATE TABLE ACCOUNT(
	Username VARCHAR(255) NOT NULL PRIMARY KEY,
    Password INT NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Access_right VARCHAR(255) NOT NULL
);
CREATE TABLE COOK(
	ID CHAR(9) NOT NULL PRIMARY KEY,
    Years_of_experience INT  NULL,
    Chef_ID CHAR(9)
);
CREATE TABLE COOKS(
	ID CHAR(9) NOT NULL,
    Onumber INT NOT NULL,
    PRIMARY KEY (ID,Onumber)
);
CREATE TABLE CASHIER(
	ID CHAR(9) NOT NULL PRIMARY KEY
);
-- Tân
CREATE TABLE DEPENDENT
(
	Emp_ID CHAR(9) NOT NULL,
    Dependent_name VARCHAR(15) NOT NULL,
    Bdate DATE,
    Address VARCHAR(255),
    Sex VARCHAR(255),
    Relationship VARCHAR(255) NOT NULL,
    Phone CHAR(10) NOT NULL,
    PRIMARY KEY (Emp_ID, Dependent_name)
);

CREATE TABLE PROCESSES
(
	Onumber INT NOT NULL,
    CashierID CHAR(9) NOT NULL,
    PRIMARY KEY (Onumber)
);
CREATE TABLE FOOD_ORDER
(
	Number INT NOT NULL PRIMARY KEY,
    Status VARCHAR(255) NOT NULL
);

CREATE TABLE INCLUDES
(
	Onum INT NOT NULL,
    Dname VARCHAR(255) NOT NULL,
    Ord_quantity INT NOT NULL,
    Listed_price DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (Onum, Dname)
);

-- Toàn
CREATE TABLE CUSTOMER(
	ID CHAR(9) NOT NULL,
    Name VARCHAR(255) NOT NULL,
    Phone CHAR(10) NOT NULL,
    Accumulated_point INT NULL,
    PRIMARY KEY (ID)
);
CREATE TABLE HAS_ACC(
	Customer_ID CHAR(9) NOT NULL,
    Username VARCHAR(255) NOT NULL,
    PRIMARY KEY (Customer_ID)
   -- FOREIGN KEY (Customer_ID) REFERENCES Customer(ID),
   -- FOREIGN KEY (Username) REFERENCES Account(Username)
);
CREATE TABLE BRANCH(
	Number INT NOT NULL,
    Name VARCHAR(255) NOT NULL,
    Location VARCHAR(255),
    Phone CHAR(10) NOT NULL,
    Manager_ID CHAR(9) NOT NULL,
    Quantity_Employee INT NOT NULL DEFAULT 0,
    PRIMARY KEY (Number)
   -- FOREIGN KEY (Manager_ID) REFERENCES Manager(ID)
);
CREATE TABLE HAS_FOOD(
	Dish_name VARCHAR(255) NOT NULL,
    Number INT NOT NULL,
    Available_quantity INT NOT NULL,
    PRIMARY KEY (Dish_name, Number)
-- FOREIGN KEY (Dish_name) REFERENCES Dish(Name),
 --   FOREIGN KEY (Number) REFERENCES Branch(Number)
);
-- Bão

CREATE TABLE BILL
(
	Number INT NOT NULL,
	Order_Num INT NOT NULL,
	Customer_name VARCHAR(255) NOT NULL,
	Tax DECIMAL(3,2) NOT NULL,
	PRIMARY KEY (Number)
	-- FOREIGN KEY (Order_Num) REFERENCES ORDER (Number)
);

CREATE TABLE BUY_ONLINE
(
	ONumber INT NOT NULL,
	Username VARCHAR(255) NOT NULL,
	PRIMARY KEY (ONumber)
	-- FOREIGN KEY (ONumber) REFERENCES ORDER (Number),
	-- FOREIGN KEY (Username) REFERENCES ACCOUNT (Username)
);

CREATE TABLE BUY_DIRECTLY
(
	ONumber INT NOT NULL,
	CustomerID CHAR(9) NOT NULL,
	PRIMARY KEY (ONumber)
	-- FOREIGN KEY (ONumber) REFERENCES ORDER (Number),
	-- FOREIGN KEY (CustomerID) REFERENCES CUSTOMER (ID)
);

CREATE TABLE DISH
(
	Name VARCHAR(255) NOT NULL,
	Price DECIMAL(10,2) NOT NULL,
	PRIMARY KEY (Name)
);
-- Foreign key Bảo
ALTER TABLE COOK
ADD FOREIGN KEY (Chef_ID) REFERENCES COOK(ID);
ALTER TABLE COOK
ADD FOREIGN KEY (ID) REFERENCES EMPLOYEE(ID);
ALTER TABLE COOKS
ADD FOREIGN KEY (ID) REFERENCES COOK(ID);
ALTER TABLE COOKS
ADD FOREIGN KEY (Onumber) REFERENCES FOOD_ORDER(Number);
-- Foreign key An
ALTER TABLE EMPLOYEE
ADD FOREIGN KEY(Eaccount) REFERENCES ACCOUNT(Username),
ADD FOREIGN KEY(Bnumber) REFERENCES BRANCH(Number);
ALTER TABLE MANAGER
ADD FOREIGN KEY(ID) REFERENCES EMPLOYEE(ID);
ALTER TABLE SHIFT
ADD FOREIGN KEY(EID) REFERENCES EMPLOYEE(ID);
ALTER TABLE SERVERS
ADD FOREIGN KEY(ID) REFERENCES EMPLOYEE(ID);

-- Foreign key Tan
ALTER TABLE DEPENDENT
ADD FOREIGN KEY (Emp_ID) REFERENCES EMPLOYEE(ID);
ALTER TABLE PROCESSES
ADD FOREIGN KEY (CashierID) REFERENCES CASHIER(ID),
ADD FOREIGN KEY (Onumber) REFERENCES FOOD_ORDER(Number);
ALTER TABLE INCLUDES
ADD FOREIGN KEY (Dname) REFERENCES DISH(Name),
ADD FOREIGN KEY (Onum) REFERENCES FOOD_ORDER(Number);

-- Foreign key Toan

ALTER TABLE HAS_ACC
ADD  FOREIGN KEY (Customer_ID) REFERENCES CUSTOMER(ID),
ADD  FOREIGN KEY (Username) REFERENCES ACCOUNT(Username);
ALTER TABLE HAS_FOOD
ADD FOREIGN KEY (Dish_name) REFERENCES DISH(Name),
ADD FOREIGN KEY (Number) REFERENCES BRANCH(Number);
ALTER TABLE BRANCH
ADD FOREIGN KEY (Manager_ID) REFERENCES MANAGER(ID);

-- Foreign key Bão
ALTER TABLE BILL
ADD FOREIGN KEY (Order_Num) REFERENCES FOOD_ORDER(Number);
ALTER TABLE BUY_ONLINE
ADD FOREIGN KEY (ONumber) REFERENCES FOOD_ORDER (Number),
ADD FOREIGN KEY (Username) REFERENCES ACCOUNT (Username);
ALTER TABLE BUY_DIRECTLY
ADD FOREIGN KEY (ONumber) REFERENCES FOOD_ORDER (Number),
ADD FOREIGN KEY (CustomerID) REFERENCES CUSTOMER (ID);


-- An Value
INSERT INTO EMPLOYEE VALUE('100000001','Tran Van B','abc1@gmail.com','0903334441','2001-01-02','Nam','104 Thu Duc,TP Ho Chi Minh',6000000,'hoaibaoTV4',1);
INSERT INTO EMPLOYEE VALUE('100000002','Tran Thi C','abc2@gmail.com','0903334442','2001-01-02','Nu','105 Thu Duc,TP Ho Chi Minh',6000000,'hoaibaoTV4-1',1);
INSERT INTO EMPLOYEE VALUE('100000003','Tran Van D','abc3@gmail.com','0903334443','2001-01-02','Nam','106 Thu Duc,TP Ho Chi Minh',6000000,'hoaibaoTV4-2',1);
INSERT INTO EMPLOYEE VALUE('100000004','Tran Van E','abc4@gmail.com','0903334444','2001-01-02','Nam','107 Thu Duc,TP Ho Chi Minh',6000000,'hoaibaoTV4-3',1);
INSERT INTO EMPLOYEE VALUE('100000005','Tran Van F','abc5@gmail.com','0903334445','2001-01-02','Nam','108 Thu Duc,TP Ho Chi Minh',8000000,'hoanganTV3',1);

INSERT INTO EMPLOYEE VALUE('200000001','Tran Thi A','abc6@gmail.com','0903334441','2001-01-22','Nu','202 Quan6,TP Ho Chi Minh',6000000,'hoaibaoTV4',2);
INSERT INTO EMPLOYEE VALUE('200000002','Tran Nam B','abc7@gmail.com','0903334411','2001-01-22','Nam','203 Quan6,TP Ho Chi Minh',6000000,'hoaibaoTV4-10',2);
INSERT INTO EMPLOYEE VALUE('200000003','Tran Nam C','abc8@gmail.com','0903334421','2001-01-22','Nam','204 Quan6,TP Ho Chi Minh',6000000,'hoaibaoTV4-20',2);
INSERT INTO EMPLOYEE VALUE('200000004','Tran Nam D','abc9@gmail.com','0903334431','2001-01-22','Nam','205 Quan6,TP Ho Chi Minh',6000000,'hoaibaoTV4-30',2);
INSERT INTO EMPLOYEE VALUE('200000005','Tran Thi E','abc0@gmail.com','0903334451','2001-01-22','Nu','206 Quan6,TP Ho Chi Minh',6000000,'hoanganTV30',2);

INSERT INTO SHIFT VALUES ('100000005','T2','Sang','07');
INSERT INTO SHIFT VALUES ('100000005','T3','Chieu','08');
INSERT INTO SHIFT VALUES ('100000005','T4','Sang','09');
INSERT INTO SHIFT VALUES ('200000005','T2','Sang','07');
INSERT INTO SHIFT VALUES ('200000005','T3','Sang','08');
INSERT INTO SHIFT VALUES ('200000005','T4','Chieu','09');


INSERT INTO MANAGER VALUES ('200000005');
INSERT INTO MANAGER VALUES ('100000005');
INSERT INTO MANAGER VALUES ('100000001');
INSERT INTO MANAGER VALUES ('100000002');
INSERT INTO MANAGER VALUES ('100000003');


INSERT INTO SERVERS VALUES ('100000002',null);
INSERT INTO SERVERS VALUES ('200000002',null);



-- Minh Bao value
INSERT INTO ACCOUNT
VALUE ('minhbaoTV1', 20052001, 'minhbao@gmail.com','customer');
INSERT INTO ACCOUNT
VALUE ('ngoctanTV2', 11022001, 'ngoctan@gmail.com','customer');
INSERT INTO ACCOUNT
VALUE ('hoanganTV3', 23092001, 'hoangan@gmail.com','admin');
INSERT INTO ACCOUNT
VALUE ('hoaibaoTV4', 01012001, 'hoaibao@gmail.com','employee');
INSERT INTO ACCOUNT
VALUE ('hoaibaoTV4-1', 01012001, 'hoaibao@gmail.com','employee');
INSERT INTO ACCOUNT
VALUE ('hoaibaoTV4-2', 01012001, 'hoaibao@gmail.com','employee');
INSERT INTO ACCOUNT
VALUE ('hoaibaoTV4-3', 01012001, 'hoaibao@gmail.com','employee');
INSERT INTO ACCOUNT
VALUE ('phuoctoanTV5', 15122001, 'phuoctoan@gmail.com','customer');

INSERT INTO ACCOUNT
VALUE ('hoanganTV30', 23092001, 'hoangan@gmail.com','admin');
INSERT INTO ACCOUNT
VALUE ('hoaibaoTV40', 01012001, 'hoaibao@gmail.com','employee');
INSERT INTO ACCOUNT
VALUE ('hoaibaoTV4-10', 01012001, 'hoaibao@gmail.com','employee');
INSERT INTO ACCOUNT
VALUE ('hoaibaoTV4-20', 01012001, 'hoaibao@gmail.com','employee');
INSERT INTO ACCOUNT
VALUE ('hoaibaoTV4-30', 01012001, 'hoaibao@gmail.com','employee');


INSERT INTO COOK
VALUE ('100000001', 3, NULL);
INSERT INTO COOK
VALUE ('100000004', 1, '100000001');
INSERT INTO COOK
VALUE ('200000001', 2, null);
INSERT INTO COOK
VALUE ('200000004', 1, '200000001');

INSERT INTO COOKS
VALUE ('100000001',1);
INSERT INTO COOKS
VALUE ('100000004', 2);
INSERT INTO COOKS
VALUE ('200000001', 3);
INSERT INTO COOKS
VALUE ('200000004', 3);

INSERT INTO CASHIER
VALUE ('100000003');
INSERT INTO CASHIER
VALUE ('200000003');



-- Tan value
INSERT INTO `food_order` (`Number`, `Status`) VALUES
(1, 'Chưa xử lý'),
(2, 'Chưa xử lý'),
(3, 'Đang xử lý'),
(4, 'Đã hoàn thành'),
(5, 'Đã hoàn thành');

INSERT INTO `dependent` (`Emp_ID`, `Dependent_name`, `Bdate`, `Address`, `Sex`, `Relationship`, `Phone`) VALUES
('100000001', 'Phạm Hồng Hải', '1972-07-25', 'TP. Dĩ An, T. Bình Dương', 'Nam', 'Cha', '0549284506'),
('100000002', 'Phạm Hông Phước', '2001-05-10', 'TP. Dĩ An, T. Bình Dương', 'Nam', 'Em trai', '0457283905'),
('100000003', 'Trần Ánh Tuyết', '1977-11-30', 'TP. Dĩ An, T. Bình Dương', 'Nu', 'Mẹ', '0457239058'),
('100000004', 'Nguyễn Minh Tú', '1964-07-02', 'Quận 4, TP. HCM', 'Nam', 'Cha', '0456378377'),
('100000005', 'Trần Ngọc Trúc', '1995-05-30', 'TP. Dĩ An, T. Bình Dương', 'Nu', 'Vợ', '0567354671'),
('200000001', 'Trần Văn Bình', '1970-05-06', 'TP. Thủ Đức, TP.HCM', 'Nam', 'Cha', '0956234568'),
('200000002', 'Võ Thị Hoa', '1975-08-15', 'TP. Thủ Đức, TP.HCM', 'Nu', 'Mẹ', '0765224506'),
('200000003', 'Đỗ Thị Trang', '1998-02-15', 'TP. Thủ Đức, TP. HCM', 'Nu', 'Em gái', '0674890376'),
('200000004', 'Đỗ Văn Tân', '1965-03-15', 'TP. Thủ Đức, TP. HCM', 'Nam', 'Cha', '0768936471'),
('200000005', 'Hồ Minh Tâm', '1990-06-12', 'Quận 2, TP.HCM', 'Nam', 'Chồng', '0436287407');

INSERT INTO PROCESSES VALUE(4,'100000003');
INSERT INTO PROCESSES VALUE(5,'200000003');

INSERT INTO `includes` (`Onum`, `Dname`, `Ord_quantity`, `Listed_price`) VALUES
(1, 'Ca hoi phi le', 2, 300000),
(1, 'Suon Heo sot chanh day', 1, 210000),
(2, 'Pho cuon Ha Noi', 3, 240000),
(3, 'Pho cuon Ha Noi', 2, 160000),
(4, 'Ca hoi phi le', 1,150000),
(4, 'Suon Heo sot chanh day', 2, 420000),
(5,'Pho cuon Ha Noi', 2, 160000);

-- Hoai Bao value

INSERT INTO DISH VALUES ('Ca hoi phi le', 150000);
INSERT INTO DISH VALUES ('Suon Heo sot chanh day', 210000);
INSERT INTO DISH VALUES ('Pho cuon Ha Noi', 80000);

INSERT INTO BUY_ONLINE VALUES (1, 'minhbaoTV1');
INSERT INTO BUY_ONLINE VALUES (3, 'ngoctanTV2');

INSERT INTO BUY_DIRECTLY VALUES (2, '000000001');
INSERT INTO BUY_DIRECTLY VALUES (4, '000000002');
INSERT INTO BUY_DIRECTLY VALUES (5, '000000003');

INSERT INTO BILL VALUES (1, 4, 'Nguyen Van B', 0.05);
INSERT INTO BILL VALUES (2, 5, 'Pham Thi C', 0.05);


-- Toan value
INSERT INTO CUSTOMER VALUES ('000000001', 'Le Van A', '0907894562', 0);
INSERT INTO CUSTOMER VALUES ('000000002', 'Nguyen Van B', '0907894563', 5);
INSERT INTO CUSTOMER VALUES ('000000003', 'Pham Thi C', '0907894564', 0);
INSERT INTO CUSTOMER VALUES ('000000004', 'Tran Duc D', '0907894565', 0);
INSERT INTO CUSTOMER VALUES ('000000005', 'To Hien E', '0907894566', 15);

INSERT INTO HAS_ACC VALUES ('000000003', 'minhbaoTV1');
INSERT INTO HAS_ACC VALUES ('000000004', 'ngoctanTV2');
INSERT INTO HAS_ACC VALUES ('000000005', 'phuoctoanTV5');

INSERT INTO BRANCH VALUES (1, 'HBT', '35 Hai Ba Trung', '090789001', '100000005',0);
INSERT INTO BRANCH VALUES (2, 'PCT', '411 Phan Chu Trinh', '090789002', '200000005',0);
INSERT INTO BRANCH VALUES (3, 'PCT', '41 Hoang Dieu', '090711111', '100000001',0);
INSERT INTO BRANCH VALUES (4, 'PCT', '11 Vo Thi Sau', '090722222', '100000002',0);

INSERT INTO HAS_FOOD VALUES ('Ca hoi phi le', 1,10);
INSERT INTO HAS_FOOD VALUES ('Suon Heo sot chanh day', 1,10);
INSERT INTO HAS_FOOD VALUES ('Pho cuon Ha Noi', 1,10);
INSERT INTO HAS_FOOD VALUES ('Ca hoi phi le', 2,12);
INSERT INTO HAS_FOOD VALUES ('Suon Heo sot chanh day', 2,12);
INSERT INTO HAS_FOOD VALUES ('Pho cuon Ha Noi', 2,12);



