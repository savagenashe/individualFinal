-- create database id18099858_signup;

use id18099858_signup;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table Supplier(
supplierID int not null primary key,
supplyType varchar(50),
contact varchar(15),
email varchar(50),
address varchar(75)
);


create table Produce(
id int not null primary key,
supplierID int,
name varchar(75),
quantity int,
price double,
description varchar(75),
image BLOB,
foreign key (supplierID) references Supplier(supplierID) on delete cascade on update cascade
);

create table Livestock(
id varchar(15) primary key not null,
supplierID int,
name varchar(50),
quantity int,
price double,
description varchar(50),
image BLOB,
foreign key (supplierID) references Supplier(supplierID) on delete cascade on update cascade
);

create table Orders(
orderID int auto_increment not null primary key,
`id` int(11) not null,
item varchar(50),
paymentType varchar(50)
#foreign key (`id`) references `tbl_member`(`id`) on delete cascade on update cascade
);

create table Feedback(
name varchar(20),
email varchar(50),
feedback varchar(200)
);

create table OrderProduct(
orderID int,
quantity int not null,
foreign key (orderID) references Orders(orderID) on delete cascade on update cascade
);

ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


-- inserting into Supplier
insert into Supplier values( 100, 'mixed','055432567','kwameInt@gmail.com','123 Chimer Rd, Avenz');
insert into Supplier values(105, 'animals','077238239','davidEbo@gmail.com','12 Amen Rd, Dhaile');
insert into Supplier values(110, 'mixed','0324237234','megaStore@gmail.com','222 Allas Rd, Manss');
insert into Supplier values(115, 'perishables','0435273852','Kweku@gmail.com','8392 Melver Rd, Flassd');
insert into Supplier values(120, 'perishables','032456783','sampah@gmail.com','2342 Fedad, Alaskaa');
insert into Supplier values(125, 'animals','0326746783','theGreat@gmail.com','2342 Reds, Alaskaa');
insert into Supplier values(130, 'animals','092328342','farmFresh@gmail.com','2342 Klaks, Alaskaa');


-- inserting into produce
insert into Produce values(1, 100, 'avocado',20,6.95,'fresh avocados', load_file('/avocado.png'));
insert into Produce values(2, 110, 'guavas',50,4.20,'fresh guavas', load_file('/guava.png'));
insert into Produce values(3, 110, 'mango',200,6.90,'fresh ripe mango', load_file('/mango.png'));
insert into Produce values(4, 105, 'cucumber',100,5.20,'fresh cucumbers', load_file('/cucumber.png'));
insert into Produce values(5, 120, 'watermelon',50,8.00,'fresh juicy watemelons', load_file('/watermelon.png'));

insert into Produce values(6, 105, 'banana',400,7.50,'fresh bananas', load_file('/banana.png'));
insert into Produce values(7, 120, 'eggs',500,5.50,'fresh nice quality eggs', load_file('/egg.png'));
insert into Produce values(8, 115, 'apples',600,6.00,'fresh apples', load_file('/apple.png'));
insert into Produce values(9, 105, 'cabbage',100,4.99,'fresh cabbage', load_file('/cabbage.jpg'));

-- insert into livestock
insert into Livestock values(50 ,125,'sheep',34,200.00,'healthy sheep', load_file('/sheep.png'));
insert into Livestock values(51 ,130,'turkey',95,15.00,'healthy turkey', load_file('/turkey.png'));
insert into Livestock values(52 ,110,'cow',10,350.00,'healthy cattles', load_file('/cow.png'));
insert into Livestock values(53 ,105,'pig',20,110.00,'healthy pigs', load_file('/pig.png'));
insert into Livestock values(54 ,130,'donkey',9,150.00,'healthy donkeys', load_file('/donkey.png'));
insert into Livestock values(55 ,120,'chicken',45,8.00,'healthy chicken', load_file('/chicken.png'));






/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
