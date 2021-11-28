create table member(
	member_id int not null auto_increment primary key,
	member_name varchar(20) not null,
	member_password varchar(30) not null,
	member_email varchar(20) not null,
	member_phone int not null,
	member_avatar LONGBLOB
);
create table products (
    product_id int not null auto_increment primary key,
    product_name varchar(50) not null,
    product_type varchar(50) not null,
    product_price decimal(10,2) not null,
    product_quantity int not null,
    product_detail varchar(1000) not null,
    product_rating tinyint unsigned not null
);
create table order_product(
    order_id int not null auto_increment primary key,
	quantity int not null DEFAULT 1,
    user_member int,
    product_id int,
    FOREIGN KEY (user_member)
        REFERENCES member(member_id)
        ON DELETE SET NULL,
    FOREIGN KEY (product_id)
        REFERENCES products(product_id)
        ON DELETE SET NULL
);
insert into products (product_name, product_type, product_price, product_quantity, product_detail, product_rating)
values ('Product1', 'Type1', 1, 100, 'Product1 detail', 50);

insert into products (product_name, product_type, product_price, product_quantity, product_detail, product_rating)
values ('Product2', 'Type2', 2, 200, 'Product2 detail', 45);

insert into products (product_name, product_type, product_price, product_quantity, product_detail, product_rating)
values ('Product3', 'Type3', 3, 300, 'Product3 detail', 40);

insert into products (product_name, product_type, product_price, product_quantity, product_detail, product_rating)
values ('Product4', 'Type4', 1, 100, 'Product1 detail', 50);

insert into products (product_name, product_type, product_price, product_quantity, product_detail, product_rating)
values ('Product5', 'Type5', 2, 200, 'Product2 detail', 45);

insert into products (product_name, product_type, product_price, product_quantity, product_detail, product_rating)
values ('Product6', 'Type6', 3, 300, 'Product3 detail', 40);

insert into member (member_id,	member_name,	member_password,	member_email,	member_phone,	member_avatar )
values ('1', 'Ly Thanh Tong', '123', 'lythanhtong@gmail.com', '091234567', '');
insert into member (member_id,	member_name,	member_password,	member_email,	member_phone,	member_avatar )
values ('2', 'Le Dai Hanh', '345', 'ledaihanh@gmail.com', '091234568', '');
insert into member (member_id,	member_name,	member_password,	member_email,	member_phone,	member_avatar )
values ('4', 'Nguyen Anh', '456', 'nguyenanh@gmail.com', '091234569', '');
insert into member (member_id,	member_name,	member_password,	member_email,	member_phone,	member_avatar )
values ('5', 'Quang Trung', '789', 'quangtrung@gmail.com', '091234560', '');

INSERT INTO `order_product` (`order_id`, `quantity`, `user_member`, `product_id`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 3),
(3, 12, 5, 2);

