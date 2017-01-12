DROP TABLE IF EXISTS customermaster;

CREATE TABLE `customermaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `A` varchar(200) NOT NULL,
  `B` varchar(200) NOT NULL,
  `C` varchar(200) NOT NULL,
  `D` varchar(200) NOT NULL,
  `E` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO customermaster VALUES("1","CD001","Suresh","7896543210","Tirupur","");
INSERT INTO customermaster VALUES("2","Cd002","Ramesh","3216549870","Coimbatore","");



DROP TABLE IF EXISTS customers;

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(200) NOT NULL,
  `customername` varchar(200) NOT NULL,
  `contactnumber` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO customers VALUES("1","A15896","sathish","8344336123","dharapuram");



DROP TABLE IF EXISTS downloadrequest;

CREATE TABLE `downloadrequest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(200) NOT NULL,
  `customername` varchar(200) NOT NULL,
  `contactnumber` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `productid` varchar(200) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `producttype` varchar(200) NOT NULL,
  `modelnumber` varchar(200) NOT NULL,
  `serialnumber` varchar(200) NOT NULL,
  `warrentytype` varchar(200) NOT NULL,
  `requestid` varchar(200) NOT NULL,
  `dated` varchar(200) NOT NULL,
  `timed` varchar(200) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `servicetype` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS engineermaster;

CREATE TABLE `engineermaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `A` varchar(200) NOT NULL,
  `B` varchar(200) NOT NULL,
  `C` varchar(200) NOT NULL,
  `D` varchar(200) NOT NULL,
  `E` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO engineermaster VALUES("2","ENG526","karthik","7896541230","Covai","");



DROP TABLE IF EXISTS engineers;

CREATE TABLE `engineers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `engineerid` varchar(200) NOT NULL,
  `engineername` varchar(200) NOT NULL,
  `uprange` varchar(200) NOT NULL,
  `downrange` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO engineers VALUES("1","ENG347","kumar","200","255");
INSERT INTO engineers VALUES("2","ENG458","suresh","100","120");



DROP TABLE IF EXISTS login;

CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `view` varchar(200) NOT NULL,
  `value` varchar(200) NOT NULL,
  `assign` varchar(200) NOT NULL,
  `engineer` varchar(200) NOT NULL,
  `productview` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO login VALUES("1","sathish","sathish","Online","Cd002","35","C003","ENG458","X001");
INSERT INTO login VALUES("2","ENG347","ENG347","Offline","","C001","C001","","");
INSERT INTO login VALUES("3","developer","delevoper","","","","","","");



DROP TABLE IF EXISTS newrequest;

CREATE TABLE `newrequest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loginusername` varchar(200) NOT NULL,
  `customerid` varchar(200) NOT NULL,
  `customername` varchar(200) NOT NULL,
  `contactnumber` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `productid` varchar(200) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `producttype` varchar(200) NOT NULL,
  `modelnumber` varchar(200) NOT NULL,
  `serialnumber` varchar(200) NOT NULL,
  `warrentytype` varchar(200) NOT NULL,
  `requestid` varchar(200) NOT NULL,
  `dated` varchar(200) NOT NULL,
  `timed` varchar(200) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `servicetype` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `viewtable` varchar(200) NOT NULL,
  `download` varchar(200) NOT NULL,
  `print` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

INSERT INTO newrequest VALUES("35","sathish","A15896","sathish","8344336123","dharapuram","xss","DELL","Laptop","fyhfg","fghfghfgh","Yes","C002","2015/10/20","01:50:17pm","fghfgh","Service Type 4","notassigned","","YES","NO","");
INSERT INTO newrequest VALUES("36","sathish","Cd002","Ramesh","3216549870","Coimbatore","X001","Product 1","type 1","sdfsdf324","sdf453223","Yes","C003","2015/10/23","12:33:23pm","sdfg","Service Type 2","notassigned","","YES","NO","");



DROP TABLE IF EXISTS productmaster;

CREATE TABLE `productmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `A` varchar(200) NOT NULL,
  `B` varchar(200) NOT NULL,
  `C` varchar(200) NOT NULL,
  `D` varchar(200) NOT NULL,
  `E` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO productmaster VALUES("2","X001","type 1","Product 1","cvr4564","");



DROP TABLE IF EXISTS requests;

CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requestid` varchar(200) NOT NULL,
  `engineerid` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sparemaster;

CREATE TABLE `sparemaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `A` varchar(200) NOT NULL,
  `B` varchar(200) NOT NULL,
  `C` varchar(200) NOT NULL,
  `D` varchar(200) NOT NULL,
  `E` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO sparemaster VALUES("2","1","type 1","Product 1","cvr4564","");



DROP TABLE IF EXISTS spares;

CREATE TABLE `spares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requestid` varchar(200) NOT NULL,
  `engineerid` varchar(200) NOT NULL,
  `sparepart1` varchar(200) NOT NULL,
  `quantity1` varchar(200) NOT NULL,
  `sparepart2` varchar(200) NOT NULL,
  `quantity2` varchar(200) NOT NULL,
  `sparepart3` varchar(200) NOT NULL,
  `quantity3` varchar(200) NOT NULL,
  `sparepart4` varchar(200) NOT NULL,
  `quantity4` varchar(200) NOT NULL,
  `sparepart5` varchar(200) NOT NULL,
  `quantity5` varchar(200) NOT NULL,
  `dated` varchar(200) NOT NULL,
  `timed` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO spares VALUES("1","","","","2","","","","","","","","","","");
INSERT INTO spares VALUES("2","","","xxx","2","","","","","","","","","","");
INSERT INTO spares VALUES("3","","","xxx","2","","","","","","","","","","");
INSERT INTO spares VALUES("4","C001","","cxcx","4","","","","","","","","","","");
INSERT INTO spares VALUES("5","C001","ENG347","asdad","2","asdasd","22","","","","","","","","");



DROP TABLE IF EXISTS temp;

CREATE TABLE `temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignedby` varchar(200) NOT NULL,
  `requestid` varchar(200) NOT NULL,
  `engineersid` varchar(200) NOT NULL,
  `dated` varchar(200) NOT NULL,
  `timed` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO temp VALUES("1","sathish","C001","ENG347","","");
INSERT INTO temp VALUES("2","sathish","C001","ENG458","2015/10/22","02:30:44pm");



