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
    product_name varchar(1000) not null,
    product_type varchar(50) not null,
    product_price decimal(10,2) not null,
    product_brand varchar(50),
    product_quantity int not null,
    product_detail varchar(10000) not null,
    product_image varchar(1000) not null
);

INSERT INTO `products` (`product_id`, `product_name`, `product_type`, `product_price`, `product_brand`, `product_quantity`, `product_detail`, `product_image`) VALUES (NULL, 'SteelSeries Arctis 1 Wired Gaming Headset – Detachable ClearCast Microphone – Lightweight Steel-Rein', 'Gaming', '55.89', 'SteelSeries', '74', 'Designed for Xbox Series X|S and Xbox One, and compatible with all gaming platforms including PS4, PS5, and Switch via the universal 3.5mm connector.\r\nFeaturing the same signature soundscape, emphasizing subtle, yet critical sounds to give you an audio advantage.\r\nDetachable ClearCast noise canceling microphone provides natural sounding clarity and is Discord certified.\r\nAdjustable steel-reinforced headband for a perfect fit and lasting durability.\r\nPerfect for on-the-go with a sleek, low-profile design, detachable microphone, and fold-flat earcups', 'https://m.media-amazon.com/images/I/71AmD4ZUnGL._AC_SL1500_.jpg');
INSERT INTO `products` (`product_id`, `product_name`, `product_type`, `product_price`, `product_brand`, `product_quantity`, `product_detail`, `product_image`) VALUES (NULL, 'SteelSeries Apex 7 Mechanical Gaming Keyboard – OLED Smart Display – USB Passthrough and Media Control', 'Gaming', '134.84', 'SteelSeries', '100', 'OLED smart display: an integrated command center for adjusting settings and tracking on the fly info straight from your game, Spotify, discord, and more.\r\nAircraft grade aluminum alloy: built for a lifetime of durability and stability.\r\nRGB illumination: unmatched customization with 16.8 million colors per key; n-key roll over: 84-key.\r\nPremium magnetic wrist rest: provides full palm support and comfortable, ergonomic feel.\r\nPremium magnetic wrist rest: provides full palm support and comfortable, ergonomic feel.', 'https://m.media-amazon.com/images/I/81yOuAUQAiL._AC_SL1500_.jpg');
INSERT INTO `products` (`product_id`, `product_name`, `product_type`, `product_price`, `product_brand`, `product_quantity`, `product_detail`, `product_image`) VALUES (NULL, 'Amazon Basics Ergonomic Gaming Chair with Bluetooth Speakers and Built-in Mic, Push-Button Height Control - Blue', 'Gaming', '209.99', 'Amazon', '25', 'Ergonomic design: comfortable full-body support with a high back and plush, perfectly contoured cushions upholstered in Puresoft PU leather.\r\nAdjustable: height-adjustable arms with 3D PU arm pads; pivot angle adjustment, sliding depth adjustment, and push-button height control to ensure optimal comfort.\r\nDurable construction: sturdy metal frame with 275-pound weight capacity; 360-degree swivel mechanism with height and tension adjustments; rugged nylon base includes casters for smooth-rolling mobility; BIFMA certified.', 'https://m.media-amazon.com/images/I/71stPut1gjS._AC_SL1500_.jpg');
INSERT INTO `products` (`product_id`, `product_name`, `product_type`, `product_price`, `product_brand`, `product_quantity`, `product_detail`, `product_image`) VALUES (NULL, 'Corsair Dark Core RGB Pro, Wireless FPS/MOBA Gaming Mouse with SLIPSTREAM Technology, Black, Backlit RGB LED, 18000 DPI, Optical', 'Gaming', '79.99', 'Corsair', '97', 'Three ways to connect: sub-1ms SLIPSTREAM WIRELESS technology, low-latency Bluetooth wireless technology, or USB wired.\r\nPlay with pinpoint accuracy and precision thanks to a custom PixArt PAW3392 native 18,000 DPI optical sensor, optimized for wireless mice with extremely low power consumption and customizable in 1 DPI resolution steps.\r\nHyper-polling technology communicates with your PC at up to 2,000Hz, twice the speed of standard gaming mice, ensuring blazingly fast response times.\r\nNine-zone dynamic RGB backlighting, including an integrated light bar with five individually addressable RGB LEDs, offers near endless customization of colors and lighting effects.\r\nGet an in-game advantage with eight buttons, fully programmable with custom macros and button remaps.', 'https://m.media-amazon.com/images/I/61Q8UQrNpxL._AC_SL1500_.jpg');
INSERT INTO `products` (`product_id`, `product_name`, `product_type`, `product_price`, `product_brand`, `product_quantity`, `product_detail`, `product_image`) VALUES (NULL, 'Verdusa Women Long Sleeve Top Round Neck Drop Shoulder Pullover Sweatshirt', 'Fashion', '10.99', 'Amazon ', '300', '100% Polyester.\r\nPull On closure.\r\nCrew neck, long sleeve, drop shoulder, casual basic sweatshirt top.\r\nSoft fabric has some stretch.\r\nGreat to match well with pants, shorts, sweatpants, jeans and skirt.\r\nSuitable for school, outdoor, weekend, going out, street, dating and casual dailywear.\r\nPlease refer to size guide carefully before purchasing at below description.', 'https://m.media-amazon.com/images/I/71wlN2WH1US._AC_UL480_FMwebp_QL65_.jpg');
INSERT INTO `products` (`product_id`, `product_name`, `product_type`, `product_price`, `product_brand`, `product_quantity`, `product_detail`, `product_image`) VALUES (NULL, 'Champion Women Powerblend Joggers, Script Logo', 'Fashion', '22.99', 'Amazon', '459', '60% Polyester, 40% Cotton.\r\nImported.\r\nDrawstring closure.\r\nMachine Wash.\r\nSoft 9 oz. polyester/cotton blend helps reduce pilling and shrinkage. Fabric: Body: 60% Polyester/40% cotton; 1x1 rib: 65% polyester/35% cotton.\r\nModern, feminine fit with a tapered leg and ribbed cuff.\r\nFront pockets with rib detailing.\r\nElastic waistband with adjustable drawcord.\r\nResponsibly made with traceable U.S. grown cotton that requires 2-5 times less water and up to 10% recycled polyester fibers.\r\nPowerblend fleece is cold water wash, which diminishes energy usage.\r\n30\" inseam.\r\nC patch logo at hip.', 'https://m.media-amazon.com/images/I/51U1xBRDb1L._AC_UL480_FMwebp_QL65_.jpg');
INSERT INTO `products` (`product_id`, `product_name`, `product_type`, `product_price`, `product_brand`, `product_quantity`, `product_detail`, `product_image`) VALUES (NULL, 'Bioworld NES Retro Controller Design Knit Hat Beanie Grey and Black', 'Fashion', '8.89', 'Amazon', '300', 'Thick Warm Winter Hat.\r\nPatch on Cuff - Great Detail.', 'https://m.media-amazon.com/images/I/812tXSl+t1L._AC_UL480_FMwebp_QL65_.jpg');
INSERT INTO `products` (`product_id`, `product_name`, `product_type`, `product_price`, `product_brand`, `product_quantity`, `product_detail`, `product_image`) VALUES (NULL, 'Nintendo Men Keep It Classic T-Shirt', 'Fashion', '19.00', 'Amazon ', '74', '60% Cotton, 40% Polyester.\r\nMade in the USA and Imported.\r\nMachine Wash.\r\nDangerous to go alone, Super Mario, Legend of Zelda, Link, Breath of the Wild, Splatoon, Mario Kart, Game Boy, Nintendo consoles, vintage-style modern graphics.\r\nShort sleeve t-shirt, crew tee, slim fit, pre shrunk, made in USA, machine wash, fashion tee, Nintendo, Character, Gaming, Gamer, Vintage, Old School.\r\n60 percent cotton, 40 percent polyester.\r\nMario, Luigi, Yoshi, Bowser, Toad, Princess Peach, Boo, Raccoon Mario, Mushroom Kingdom, King Koopa.', 'https://m.media-amazon.com/images/I/A1jbkWUA30L._AC_UL480_FMwebp_QL65_.jpg');

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

