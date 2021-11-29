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
ADD FOREIGN KEY (Chef_ID) REFERENCES COOK(ID) ;
ALTER TABLE COOK
ADD FOREIGN KEY (ID) REFERENCES EMPLOYEE(ID) ;
ALTER TABLE COOKS
ADD FOREIGN KEY (ID) REFERENCES COOK(ID) ;
ALTER TABLE COOKS
ADD FOREIGN KEY (Onumber) REFERENCES FOOD_ORDER(Number) ;
-- Foreign key An
ALTER TABLE EMPLOYEE
ADD FOREIGN KEY(Eaccount) REFERENCES ACCOUNT(Username) ,
ADD FOREIGN KEY(Bnumber) REFERENCES BRANCH(Number) ;
ALTER TABLE MANAGER
ADD FOREIGN KEY(ID) REFERENCES EMPLOYEE(ID) ;
ALTER TABLE SHIFT
ADD FOREIGN KEY(EID) REFERENCES EMPLOYEE(ID) ;
ALTER TABLE SERVERS
ADD FOREIGN KEY(ID) REFERENCES EMPLOYEE(ID) ;

-- Foreign key Tan
ALTER TABLE DEPENDENT
ADD FOREIGN KEY (Emp_ID) REFERENCES EMPLOYEE(ID);
ALTER TABLE PROCESSES
ADD FOREIGN KEY (CashierID) REFERENCES CASHIER(ID),
ADD FOREIGN KEY (Onumber) REFERENCES FOOD_ORDER(Number) ;
ALTER TABLE INCLUDES
ADD FOREIGN KEY (Dname) REFERENCES DISH(Name),
ADD FOREIGN KEY (Onum) REFERENCES FOOD_ORDER(Number) ;

-- Foreign key Toan

ALTER TABLE HAS_ACC
ADD  FOREIGN KEY (Customer_ID) REFERENCES CUSTOMER(ID),
ADD  FOREIGN KEY (Username) REFERENCES ACCOUNT(Username) ;
ALTER TABLE HAS_FOOD
ADD FOREIGN KEY (Dish_name) REFERENCES DISH(Name) ,
ADD FOREIGN KEY (Number) REFERENCES BRANCH(Number) ;
ALTER TABLE BRANCH
ADD FOREIGN KEY (Manager_ID) REFERENCES MANAGER(ID) ;

-- Foreign key Bão
ALTER TABLE BILL
ADD FOREIGN KEY (Order_Num) REFERENCES FOOD_ORDER(Number) ;
ALTER TABLE BUY_ONLINE
ADD FOREIGN KEY (ONumber) REFERENCES FOOD_ORDER (Number) ,
ADD FOREIGN KEY (Username) REFERENCES ACCOUNT (Username) ;
ALTER TABLE BUY_DIRECTLY
ADD FOREIGN KEY (ONumber) REFERENCES FOOD_ORDER (Number) ,
ADD FOREIGN KEY (CustomerID) REFERENCES CUSTOMER (ID) ;
-- Phần chỉnh sửa Tân
ALTER TABLE DISH
ADD Image_Link Text;

-- THANH AN PRIVATE
-- Câu 1)
Delimiter //
CREATE PROCEDURE Add_Employee( 	 ID_new char(9), 
								 Name_new VARCHAR(255), 
								 Email_new varchar(255), 
								 Phone_new char(10), 
								 Bdate_new date,
								 sex_new varchar(255),
								 address_new varchar(255),
								 Salary_new decimal(10,2),
								 Eaccount_new varchar(255),
								 Bnumber_new int)
BEGIN 
	DECLARE m_id char(9);
    DECLARE m_bnumber int;
    SET m_id = ( SELECT ID 
				 FROM EMPLOYEE
                 WHERE ID = ID_new);
	SET m_bnumber = (SELECT Number
					FROM BRANCH
                    WHERE Bnumber_new = Number);
	if (m_id is not null) then
		begin
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "ALREADY HAVE ID EMPLOYEE";
		end;
	elseif (m_bnumber is null) then
		begin
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "DON'T HAVE NUMBER BRANCH";
		end;
	else
		INSERT INTO ACCOUNT Value(Eaccount_new,"11111111", Email_new,"employee");
		INSERT INTO Employee Value( ID_new, Name_new,Email_new,Phone_new, Bdate_new, sex_new, address_new, Salary_new, Eaccount_new, Bnumber_new);
	end if;
END;
// Delimiter ;

-- Câu 2
DELIMITER $$
CREATE TRIGGER Check_age_employee
BEFORE INSERT
ON employee FOR EACH ROW
BEGIN
	IF(YEAR(NOW()) - YEAR(new.Bdate) < 18) THEN
		BEGIN
            signal sqlstate '45000' set message_text = 'Nhan vien phai lon hon 18 tuoi';
        END;
	END IF;
END$$
DELIMITER ;

Delimiter $$
CREATE TRIGGER Increase_salary
AFTER INSERT
ON SHIFT FOR EACH ROW
BEGIN
	DECLARE TOTAL INT default 0;
    SET TOTAL =( SELECT COUNT(*)
				 FROM SHIFT
                 WHERE new.EID = EID );
	IF TOTAL > 3 THEN
		BEGIN
			UPDATE Employee
            SET Salary = 6000000 + (TOTAL-3)*300000
            WHERE ID = new.EID;
		END;
	END IF;
END$$
Delimiter ;

-- Câu 3)
-- a)
Delimiter //
CREATE PROCEDURE EoB(Bname VARCHAR(255))
BEGIN
	DECLARE b_name VARCHAR(255);
    SET b_name = (  SELECT Name
					FROM Branch
                    WHERE Bname = Name );
	if (b_name is null) then
		signal sqlstate '45000' set message_text = 'Khong ton tai chi nhanh';
	else
		SELECT  employee.ID, employee.Name , employee.Email, employee.Phone,employee.Bdate,employee.Sex, employee.Address, employee.Salary, employee.Eaccount, employee.Bnumber
		FROM branch, employee
		WHERE branch.Number = employee.Bnumber AND branch.Name = Bname
		ORDER BY employee.ID;
	end if;
END;
// Delimiter ;

-- b)
Delimiter //
CREATE PROCEDURE Number_of_shift ( Num INT )
BEGIN
	SELECT employee.ID, employee.Name , employee.Email, employee.Phone,employee.Bdate,employee.Sex, employee.Address, employee.Salary, employee.Eaccount, employee.Bnumber
    FROM branch,employee, ( SELECT EID , COUNT(*) As NumShift
							FROM SHIFT
                            GROUP BY EID
                            HAVING NumShift >= Num) As shiftv2
    WHERE branch.Number= employee.Bnumber AND employee.ID = shiftv2.EID
    ORDER BY branch.Number;
END;
// Delimiter ;

-- Câu 4
-- Tinh quy luong cua moi Chi Nhanh
Delimiter //
CREATE FUNCTION Branch_salary( Bnum INT)
RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN
	DECLARE bid INT;
	DECLARE total DECIMAL(10,2);
    SET bid = ( SELECT Number
				FROM branch
                WHERE Bnum = Number);
	if bid is null then
		begin
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Chi Nhanh khong ton tai";
		end;
	end if;
	SET total = (SELECT SUM(Salary) As Quy_Luong
				 FROM Employee
                 WHERE Bnumber = Bnum);
	RETURN total;
END;
// Delimiter ;


-- Cong viec cua moi thanh vien
Delimiter //
CREATE FUNCTION employee_job (emp_ID CHAR(9))
RETURNS VARCHAR(32)
DETERMINISTIC
BEGIN
	DECLARE job_name VARCHAR(32) default "";
    DECLARE f_manager CHAR(9);
    DECLARE f_servers CHAR(9);
    DECLARE f_cook CHAR(9);
    DECLARE f_cashier CHAR(9);
    SET f_manager = ( SELECT ID
					  FROM MANAGER
                      WHERE ID = emp_ID);
	SET f_servers = ( SELECT ID
					  FROM SERVERS
                      WHERE ID = emp_ID);
    SET f_cook    = ( SELECT ID
					  FROM COOK
                      WHERE ID = emp_ID);                  
    SET f_cashier = ( SELECT ID
					  FROM CASHIER
                      WHERE ID = emp_ID);
	if f_manager is not null then
		SET job_name = "MANAGER";
	elseif f_servers is not null then
		SET job_name = "SERVERS";
	elseif f_cook is not null then
		SET job_name = "COOK";
	elseif f_cashier is not null then
		SET job_name = "CASHIER";
	end if;

    RETURN job_name;
END;
// Delimiter ;

-- MINH BAO PRIVATE
-- Câu 1 
DROP PROCEDURE IF EXISTS Add_Branch;
DELIMITER $$
CREATE PROCEDURE Add_Branch(
    IN NumberIN INT,
    IN NameIN VARCHAR(255),
    IN LocationIN VARCHAR(255),
    IN PhoneIN CHAR(10),
    IN Manager_IDIN CHAR(9))
proc_label:BEGIN
    IF (NOT EXISTS (SELECT * FROM manager WHERE ID = Manager_IDIN)) THEN
            BEGIN
                    signal sqlstate '45000' set message_text = 'Không tìm thấy manager_ID';
            END;
    ELSEIF(EXISTS (SELECT * FROM branch WHERE Number = NumberIN)) THEN
            BEGIN
                    signal sqlstate '45000' set message_text = 'Number đã tồn tại';
            END;
    ELSE
            INSERT INTO branch (Number, Name, Location, Phone, Manager_ID) VALUES (NumberIN, NameIN, LocationIN, PhoneIN, Manager_IDIN);
    END IF;
END$$
DELIMITER ;

-- Câu 2 trigger 1
DROP TRIGGER IF EXISTS Check_Manager;
DELIMITER $$
CREATE TRIGGER Check_Manager
BEFORE INSERT ON branch
FOR EACH ROW
proc_label: BEGIN
    IF (NOT EXISTS (SELECT * FROM manager WHERE ID = new.Manager_ID)) THEN
            BEGIN
                    signal sqlstate '45000' set message_text = 'Không tìm thấy manager_ID';
                    LEAVE proc_label;
            END;
    ELSEIF(EXISTS (SELECT * FROM branch WHERE Manager_ID = new.Manager_ID)) THEN
        BEGIN
            signal sqlstate '45000' set message_text = 'Manage đã quản lý nhà hàng. Xin hãy chọn người quản lý khác';
            LEAVE proc_label;
        END;
    END IF;
END$$
DELIMITER ;

-- trigger 2

 DROP TRIGGER IF EXISTS Quantity_Emloyee;
DELIMITER $$
CREATE TRIGGER Quantity_Emloyee
AFTER INSERT ON employee
FOR EACH ROW
proc_label: BEGIN
    UPDATE branch
    SET Quantity_Employee = Quantity_Employee + 1
    WHERE Number = new.Bnumber;
END$$
DELIMITER ;

-- Câu 3 
DROP PROCEDURE IF EXISTS Employee_Of_Branch;
DELIMITER $$
CREATE PROCEDURE Employee_Of_Branch(
    IN Num INT
)
proc_label:BEGIN
    SELECT ID, employee.Name, Email, employee.Phone, Bdate, Sex, Address, Salary
    FROM employee
    JOIN branch ON employee.Bnumber = branch.Number
    WHERE branch.Number = Num
    ORDER BY Name;
END$$
DELIMITER ;

DROP PROCEDURE IF EXISTS Check_Quantity_Employee;
DELIMITER $$
CREATE PROCEDURE Check_Quantity_Employee(
    IN Num INT
)
proc_label:BEGIN
    SELECT branch.Number, branch.Name, branch.Location, branch.Phone, branch.Manager_ID, branch.Quantity_Employee
    FROM branch 
    JOIN (SELECT Number, COUNT(*) AS count
        FROM branch 
        LEFT JOIN employee ON employee.Bnumber = branch.Number
	  WHERE employee.Sex = 'Nam'
        GROUP BY Number
        HAVING COUNT(*) >= Num) AS table_count
    ON branch.Number = table_count.Number
    ORDER BY branch.Number;
END$$
DELIMITER ;

-- Câu 4
DROP FUNCTION IF EXISTS Count_Dish;
DELIMITER $$
CREATE FUNCTION Count_Dish(
    Num INT
)
RETURNS INT
DETERMINISTIC
proc_label:BEGIN
    IF (NOT EXISTS (SELECT * FROM Branch WHERE Number = Num)) THEN
            BEGIN
                    signal sqlstate '45000' set message_text = 'Không tìm thấy Number Branch';
            END;
    ELSE
        return(
            SELECT COUNT(*)
            FROM has_food
            JOIN dish ON has_food.Dish_name = dish.Name WHERE has_food.Number = Num
        );
    END IF;
END $$
DELIMITER ;

DROP FUNCTION IF EXISTS stat;
DELIMITER $$
CREATE FUNCTION stat(
    Num INT
)
RETURNS decimal(10,2)
DETERMINISTIC
proc_label:BEGIN
    IF (NOT EXISTS (SELECT * FROM Branch WHERE Number = Num)) THEN
            BEGIN
                    signal sqlstate '45000' set message_text = 'Không tìm thấy Number Branch';
            END;
    ELSE
        BEGIN
            DECLARE male  decimal(10,2);
            DECLARE total decimal(10,2);
            SET male = (SELECT COUNT(*)
                        FROM branch
                        JOIN employee ON branch.Number = employee.Bnumber WHERE employee.Sex = 'Nu' AND branch.Number = Num);
            SET total = (SELECT COUNT(*)
                        FROM branch
                        JOIN employee ON branch.Number = employee.Bnumber WHERE branch.Number = Num);
            return (male / total) * 100;
        END;
    END IF;
END $$
DELIMITER ;

-- Hoài Bão PRIVATE
DELIMITER $$

CREATE PROCEDURE cau1 (IN num INT, IN dish_name VARCHAR(255), IN quantity INT)
BEGIN

DECLARE p DECIMAL(10,2);
DECLARE d VARCHAR(255);

SET p = (SELECT Price FROM dish D WHERE dish_name = D.Name);

SET d = (SELECT Dname FROM includes I WHERE I.Onum = num AND I.Dname = dish_name);

IF (num < 1) THEN
BEGIN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "INVALID NUMBER";
END;
ELSEIF (quantity < 1) THEN
BEGIN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "INVALID QUANTITY";
END;
ELSEIF (p is null) THEN
BEGIN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "DISH IS NOT EXIST";
END;
ELSEIF (d is not null) THEN
UPDATE includes SET Ord_quantity = Ord_quantity + quantity, Listed_price = Listed_price + quantity * p WHERE Onum = num AND Dname = dish_name;
ELSE
INSERT INTO includes VALUES (num, dish_name, quantity, p * quantity);
END IF;

END $$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER cau2_1
BEFORE INSERT ON includes
FOR EACH ROW
BEGIN
DECLARE x INT;
SET x = (SELECT Number FROM food_order F WHERE F.Number = NEW.Onum);
IF (x is null) THEN
INSERT INTO food_order VALUES (NEW.Onum, "Chưa xử lý");
END IF;
END $$

DELIMITER ;


DELIMITER $$
CREATE TRIGGER cau2_2
AFTER UPDATE ON food_order
FOR EACH ROW
BEGIN
DECLARE x INT;
DECLARE cus VARCHAR(255);

SET cus = (SELECT C.Name FROM customer C, buy_directly D WHERE D.ONumber = NEW.Number AND D.CustomerID = C.ID);
IF (cus is null) THEN
SET cus = (SELECT C.Name 
           FROM customer C, has_acc HA, buy_online O
           WHERE O.ONumber = NEW.Number AND O.Username = HA.Username AND HA.Customer_ID = C.ID);
END IF;
SET x = (SELECT MAX(B.Number) FROM bill B);
IF (NEW.Status = "Đã hoàn thành") THEN
INSERT INTO bill VALUES (x+1,NEW.Number,cus,0);
End IF;
END $$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE cau3_1 (IN dish_name VARCHAR(255))
BEGIN

BEGIN
SELECT F.Number, F.Status
FROM food_order F, includes I 
WHERE I.Dname = dish_name AND F.Number = I.Onum
ORDER BY F.Status;
END;

END $$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE cau3_2 (IN numb INT)
BEGIN

SELECT I.Dname, COUNT(*)
FROM includes I, buy_online O
WHERE I.Onum = O.ONumber
GROUP BY I.Dname
HAVING COUNT(*) > numb;

END $$

DELIMITER ;

DELIMITER $$

CREATE FUNCTION cau4_1 (Onl_or_Direct VARCHAR(10)) RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN

DECLARE summ DECIMAL(10,2);

IF (Onl_or_Direct = "Online") THEN
BEGIN
SET summ = (SELECT SUM(I.Listed_price) FROM includes I, buy_online O WHERE O.ONumber = I.Onum);
RETURN summ;
END;
ELSEIF (Onl_or_Direct = "Direct") THEN
BEGIN
SET summ = (SELECT SUM(I.Listed_price) FROM includes I, buy_directly D WHERE D.ONumber = I.Onum);
RETURN summ;
END;
ELSE
BEGIN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "WRONG METHOD";
END;
END IF;

END $$

DELIMITER ;


DELIMITER $$

CREATE FUNCTION cau4_2 (dishname VARCHAR(255)) RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN

DECLARE nnum INT;
DECLARE pri DECIMAL(10,2);
SET nnum = (SELECT COUNT(*) FROM includes I WHERE I.Dname = dishname);
IF (nnum = 0) THEN
BEGIN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "NO DISH BOOKING";
END;
ELSE
BEGIN
SET pri = (SELECT SUM(I.Listed_price) FROM includes I WHERE I.Dname = dishname);
IF (pri > 1000000) THEN RETURN pri;
ELSE
BEGIN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "NOT PASS KPI";
END;
END IF;
END;
END IF;
END $$
DELIMITER ;

-- Ngoc tan private



-- CÂU 1
DROP PROCEDURE IF EXISTS insert_DISH;
DELIMITER $$
CREATE PROCEDURE insert_DISH(
	new_Name VARCHAR(255), 
    new_Price DECIMAL(10,2),
    new_Image_Link TEXT)
BEGIN
	DECLARE C INT;
	SELECT COUNT(Name) INTO C
	FROM DISH
	WHERE Name = new_Name;

	IF C != 0 THEN 
		SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = "This Name of DISH already exists. Please try again!";
	ELSEIF new_Price < 20000 THEN
		SIGNAL SQLSTATE '45000'
		SET MESSAGE_TEXT = "Price must not be less then 20000. Please try again!";
	ELSEIF MOD(new_Price, 1000) != 0 THEN
		SIGNAL SQLSTATE '45000'
		SET MESSAGE_TEXT = "Price must be divisible by 1000. Please try again!";
	ELSE
		INSERT INTO DISH VALUES (new_Name, new_Price, new_Image_Link);
	END IF;	
END; $$
DELIMITER ;
-- CÂU 2
DROP TRIGGER IF EXISTS before_insert_HAS_FOOD;
DELIMITER $$
CREATE TRIGGER before_insert_HAS_FOOD
BEFORE INSERT
ON HAS_FOOD
FOR EACH ROW
BEGIN
	IF NEW.Available_quantity > 100 THEN
		BEGIN
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Available quantity can not exceed 100!";
        END;
	END IF;
END; $$
DELIMITER ;

--
DROP TRIGGER IF EXISTS after_insert_HAS_FOOD;
DELIMITER $$
CREATE TRIGGER after_insert_HAS_FOOD
AFTER INSERT
ON HAS_FOOD
FOR EACH ROW
BEGIN
    IF (SELECT COUNT(Number) FROM HAS_FOOD WHERE Dish_name = NEW.Dish_name) > 3 THEN
		BEGIN
			UPDATE DISH
			SET Price = Price - 3000
			WHERE Name = NEW.Dish_name;
        END;
	END IF;
END; $$
DELIMITER ;




--

-- CÂU 3
DROP PROCEDURE IF EXISTS Dish_Price_Filter $$
DELIMITER $$
CREATE PROCEDURE Dish_Price_Filter(
	Compared_Price DECIMAL(10,2),
    Branch_Num INT)
BEGIN
	IF Branch_num NOT IN (SELECT Number FROM BRANCH) THEN
		SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = "This Number of BRANCH does not exist. Please try again!";
	ELSE
		SELECT H.Number AS Branch_Num, D.Image_Link AS Image_Link, H.Dish_name AS Dish_Name, D.Price AS Price
        FROM DISH AS D, HAS_FOOD AS H
        WHERE H.Dish_name = D.Name AND D.Price <= Compared_Price AND H.number = Branch_Num
        ORDER BY Price;
	END IF;	
END; $$
DELIMITER ;
--
DROP PROCEDURE IF EXISTS Available_Dish $$
DELIMITER $$

CREATE PROCEDURE Available_Dish(
	Total_Qty INT)
BEGIN
		SELECT D.Image_Link AS Image_Link, H.Dish_name AS Dish_Name, D.Price AS Price,
			   COUNT(H.Number) AS Num_of_Branches, SUM(H.Available_quantity) AS Total_Quantity
		FROM DISH AS D, HAS_FOOD AS H
		WHERE H.Dish_name = D.Name
		GROUP BY H.Dish_name
		HAVING COUNT(H.Number) > 1 AND SUM(H.Available_quantity) >= Total_Qty
        ORDER BY H.Dish_name;
	-- END IF;	
END; $$
DELIMITER ;

--

-- CÂU 4
DROP FUNCTION IF EXISTS Price_level;
DELIMITER $$

CREATE FUNCTION Price_Level(Price DECIMAL(10,2)) 
RETURNS VARCHAR(12)
DETERMINISTIC
BEGIN
    DECLARE Price_Level VARCHAR(12);

    IF Price < 30000 THEN
		SET Price_Level = 'Thấp';
    ELSEIF (Price >= 30000 AND Price <= 50000) THEN
        SET Price_Level = 'Trung bình';
    ELSEIF Price > 50000 THEN
        SET Price_Level = 'Cao';
    END IF;

	RETURN (Price_Level);
END $$
DELIMITER ;


--
DROP FUNCTION IF EXISTS Unique_Dish;
DELIMITER $$

CREATE FUNCTION Unique_Dish(Dish VARCHAR(255)) 
RETURNS VARCHAR(8)
DETERMINISTIC
BEGIN
    DECLARE is_Unique VARCHAR(8) DEFAULT '';
    DECLARE Num_of_Branches INT DEFAULT 0;
    SELECT COUNT(Dish_Name) INTO Num_of_Branches
    FROM HAS_FOOD
    WHERE Dish_Name = Dish;

    IF Num_of_Branches = 1 THEN
		SET is_Unique = 'Đặc biệt';
    END IF;

	RETURN (is_Unique);
END $$
DELIMITER ;

INSERT INTO MANAGER VALUES ('200000005');
INSERT INTO MANAGER VALUES ('100000005');
INSERT INTO MANAGER VALUES ('100000001');
INSERT INTO MANAGER VALUES ('100000002');
INSERT INTO MANAGER VALUES ('100000003');

INSERT INTO BRANCH VALUES (1, 'HBT', '35 Hai Ba Trung', '090789001', '100000005',0);
INSERT INTO BRANCH VALUES (2, 'PCT', '411 Phan Chu Trinh', '090789002', '200000005',0);
INSERT INTO BRANCH VALUES (3, 'PCT', '41 Hoang Dieu', '090711111', '100000001',0);
INSERT INTO BRANCH VALUES (4, 'PCT', '11 Vo Thi Sau', '090722222', '100000002',0);

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

INSERT INTO SERVERS VALUES ('100000002',null);
INSERT INTO SERVERS VALUES ('200000002',null);

INSERT INTO DISH VALUES ("Cháo Ếch Singapore", 45000, "https://images.foody.vn/res/g108/1072266/prof/s640x400/foody-upload-api-foody-mobile-bia-210406100724.jpg");
INSERT INTO DISH VALUES ("Chân Gà Ngâm Sả Tắc", 70000, "https://images.foody.vn/res/g106/1052099/prof/s640x400/foody-upload-api-foody-mobile-chan-ga-sa-tac-500-201021160112.jpg");
INSERT INTO DISH VALUES ("Bánh Tráng Mỡ Hành Tóp Mỡ", 25000, "https://images.foody.vn/res/g97/960254/prof/s640x400/file_restaurant_photo_0pr0_16348-af99b606-211022145721.jpg");
INSERT INTO DISH VALUES ("Hủ Tiếu Nam Vang", 35000, "https://images.foody.vn/res/g70/699162/prof/s640x400/foody-upload-api-foody-mobile-foody-upload-api-foo-200728152955.jpg");
INSERT INTO DISH VALUES ("Bún Chả Lá Lốt", 30000, "https://images.foody.vn/res/g106/1050668/prof/s640x400/foody-upload-api-foody-mobile-36-201012145559.jpg");
INSERT INTO DISH VALUES ("Bánh Mì Hà Nội", 25000, "https://images.foody.vn/res/g109/1082517/prof/s640x400/foody-upload-api-foody-mobile-cv-2bbb053f-210614103407.jpeg");
INSERT INTO DISH VALUES ("Hamburger Bò Teriyaki", 40000, "https://images.foody.vn/res/g109/1081665/prof/s640x400/foody-upload-api-foody-mobile-ha-e5acab07-210607120946.jpeg");
INSERT INTO DISH VALUES ("Cơm Chiên Dương Châu", 32000, "https://images.foody.vn/res/g97/966840/prof/s640x400/image-be32b319-200910114138.jpeg");
INSERT INTO DISH VALUES ("Mì Trộn Muối Ớt", 37000, "https://images.foody.vn/res/g107/1060971/prof/s640x400/file_restaurant_photo_zc3t_16099-7f8de683-210106212421.jpg");
INSERT INTO DISH VALUES ("Gà Sốt Sệt", 180000, "https://images.foody.vn/res/g106/1053558/prof/s640x400/file_restaurant_photo_ioed_16213-6877b5bd-210518123042.jpeg");
 
INSERT INTO HAS_FOOD VALUES ("Cháo Ếch Singapore", 1, 30);
INSERT INTO HAS_FOOD VALUES ("Bánh Tráng Mỡ Hành Tóp Mỡ", 1, 50);
INSERT INTO HAS_FOOD VALUES ("Hủ Tiếu Nam Vang", 1, 35);
INSERT INTO HAS_FOOD VALUES ("Bún Chả Lá Lốt", 1, 37);
INSERT INTO HAS_FOOD VALUES ("Bánh Mì Hà Nội", 1, 60);
INSERT INTO HAS_FOOD VALUES ("Hamburger Bò Teriyaki", 1, 25);
INSERT INTO HAS_FOOD VALUES ("Gà Sốt Sệt", 1, 22);

INSERT INTO HAS_FOOD VALUES ("Chân Gà Ngâm Sả Tắc", 2, 45);
INSERT INTO HAS_FOOD VALUES ("Bánh Tráng Mỡ Hành Tóp Mỡ", 2, 30);
INSERT INTO HAS_FOOD VALUES ("Hủ Tiếu Nam Vang", 2, 20);
INSERT INTO HAS_FOOD VALUES ("Bún Chả Lá Lốt", 2, 28);
INSERT INTO HAS_FOOD VALUES ("Cơm Chiên Dương Châu", 2, 17);
INSERT INTO HAS_FOOD VALUES ("Mì Trộn Muối Ớt", 2, 33);

INSERT INTO HAS_FOOD VALUES ("Cháo Ếch Singapore", 3, 18);
INSERT INTO HAS_FOOD VALUES ("Chân Gà Ngâm Sả Tắc", 3, 27);
INSERT INTO HAS_FOOD VALUES ("Hủ Tiếu Nam Vang", 3, 31);
INSERT INTO HAS_FOOD VALUES ("Bún Chả Lá Lốt", 3, 25);
INSERT INTO HAS_FOOD VALUES ("Bánh Mì Hà Nội", 3, 39);
INSERT INTO HAS_FOOD VALUES ("Mì Trộn Muối Ớt", 3, 42);
INSERT INTO HAS_FOOD VALUES ("Gà Sốt Sệt", 3, 7);

INSERT INTO HAS_FOOD VALUES ("Cháo Ếch Singapore", 4, 23);
INSERT INTO HAS_FOOD VALUES ("Chân Gà Ngâm Sả Tắc", 4, 35);
INSERT INTO HAS_FOOD VALUES ("Bánh Tráng Mỡ Hành Tóp Mỡ", 4, 46);
INSERT INTO HAS_FOOD VALUES ("Bánh Mì Hà Nội", 4, 36);
INSERT INTO HAS_FOOD VALUES ("Cơm Chiên Dương Châu", 4, 21);
INSERT INTO HAS_FOOD VALUES ("Mì Trộn Muối Ớt", 4, 29);
 
INSERT INTO `food_order` (`Number`, `Status`) VALUES
(1, 'Chưa xử lý'),
(2, 'Chưa xử lý'),
(3, 'Đang xử lý'),
(4, 'Đã hoàn thành'),
(5, 'Đã hoàn thành');

INSERT INTO includes (Onum, Dname, Ord_quantity, Listed_price) VALUES
(1, 'Bánh Mì Hà Nội', 2, 50000),
(1, 'Gà Sốt Sệt', 1, 180000),
(1, 'Mì Trộn Muối Ớt', 3, 111000),
(2, 'Mì Trộn Muối Ớt', 1, 37000),
(2, 'Cơm Chiên Dương Châu', 1, 32000),
(3, 'Bánh Tráng Mỡ Hành Tóp Mỡ', 2, 50000),
(3, 'Bún Chả Lá Lốt', 1, 30000),
(3, 'Cháo Ếch Singapore', 2, 90000),
(3, 'Chân Gà Ngâm Sả Tắc', 3, 210000),
(3, 'Hamburger Bò Teriyaki', 2, 80000),
(4, 'Gà Sốt Sệt', 2, 360000),
(4, 'Hủ Tiếu Nam Vang', 2, 70000),
(4, 'Mì Trộn Muối Ớt', 4, 148000),
(5, 'Bánh Mì Hà Nội', 2, 50000),
(5, 'Hủ Tiếu Nam Vang', 1, 35000);

INSERT INTO BILL VALUES (1, 4, 'Nguyen Van B', 0.05);
INSERT INTO BILL VALUES (2, 5, 'Pham Thi C', 0.05);


INSERT INTO BUY_ONLINE VALUES (1, 'minhbaoTV1');
INSERT INTO BUY_ONLINE VALUES (3, 'ngoctanTV2');

INSERT INTO BUY_DIRECTLY VALUES (2, '000000001');
INSERT INTO BUY_DIRECTLY VALUES (4, '000000002');
INSERT INTO BUY_DIRECTLY VALUES (5, '000000003');

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

INSERT INTO HAS_ACC VALUES ('000000003', 'minhbaoTV1');
INSERT INTO HAS_ACC VALUES ('000000004', 'ngoctanTV2');
INSERT INTO HAS_ACC VALUES ('000000005', 'phuoctoanTV5');

INSERT INTO CASHIER
VALUE ('100000003');
INSERT INTO CASHIER
VALUE ('200000003');

INSERT INTO COOKS
VALUE ('100000001',1);
INSERT INTO COOKS
VALUE ('100000004', 2);
INSERT INTO COOKS
VALUE ('200000001', 3);
INSERT INTO COOKS
VALUE ('200000004', 3);

INSERT INTO COOK
VALUE ('100000001', 3, NULL);
INSERT INTO COOK
VALUE ('100000004', 1, '100000001');
INSERT INTO COOK
VALUE ('200000001', 2, null);
INSERT INTO COOK
VALUE ('200000004', 1, '200000001');

INSERT INTO CUSTOMER VALUES ('000000001', 'Le Van A', '0907894562', 0);
INSERT INTO CUSTOMER VALUES ('000000002', 'Nguyen Van B', '0907894563', 5);
INSERT INTO CUSTOMER VALUES ('000000003', 'Pham Thi C', '0907894564', 0);
INSERT INTO CUSTOMER VALUES ('000000004', 'Tran Duc D', '0907894565', 0);
INSERT INTO CUSTOMER VALUES ('000000005', 'To Hien E', '0907894566', 15);

CREATE INDEX indexDishNam
ON dish (name);
CREATE INDEX indexBranchName
ON branch (Name);
CREATE INDEX indexEmployeeID
ON employee (ID);
CREATE INDEX indexBranchName
ON includes (Onum, Dname);