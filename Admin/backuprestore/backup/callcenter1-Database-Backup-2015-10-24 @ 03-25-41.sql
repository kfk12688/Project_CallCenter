.navbar-inner a i {
	margin-top: 4px;
}

.box-header h2 i {
	margin-top: 1px;
}

.todo-actions i {
	margin: 2px 5px 0px 5px;	
}

.message .header i {
	margin-top: 3px;
}

.container-fluid-full {
	overflow: hidden;
	position: relative;
	height: 100%;
}

#content {
	width: 85.578%;
	padding: 28px;
	margin: 0px 0px;
	margin-left: 14.422% !important;
}
	
#sidebar-left {
	background: #3D3D3D;
	margin-left: 0px !important;
	position: absolute;
	height: 100%;
}

hr {
	height: 2px;
	border: none;
	background: #f9f9f9;
}

.dark {
	right: -12px;	
}

footer {
	margin: 0px 0px 0px 0px;
	padding: 10px 20px;
}

.hideInIE8 {
	display: none;
}

.task .time .date {
	font-size: 14px;
	margin-bottom: 5px;	
}

.statbox .footer {
	background:none;
	-ms-filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#19FFFFFF,endColorstr=#19FFFFFF);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#19FFFFFF,endColorstr=#19FFFFFF);
	zoom: 1;
}

.statbox .footer:hover {
	background:none;
	-ms-filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#33FFFFFF,endColorstr=#33FFFFFF);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#33FFFFFF,endColorstr=#33FFFFFF);
	zoom: 1;
}

.sidebar-nav > ul > li > ul {
	background:none;
	-ms-filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#3F000000,endColorstr=#3F000000);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#3F000000,endColorstr=#3F000000);
	zoom: 1;
}

.verticalChart .singleBar .bar .value span{
	color: #000;
}

.verticalChart .singleBar .bar {
	background:none;
	-ms-filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#33FFFFFF,endColorstr=#33FFFFFF);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#33FFFFFF,endColorstr=#33FFFFFF);
	zoom: 1;
}

ul.chat.metro li .message {
	background:none;
	-ms-filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#44000000,endColorstr=#44000000);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#44000000,endColorstr=#44000000);
	zoom: 1;
	border: 0px;
}

ul.chat.metro li.left .message .arrow {
	left: -20px;
}

ul.chat.metro li.right .message .arrow {
	right: -20px;
}                                                                                                                                                                                                                                                                                                                                                                                   name` varchar(200) NOT NULL,
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



