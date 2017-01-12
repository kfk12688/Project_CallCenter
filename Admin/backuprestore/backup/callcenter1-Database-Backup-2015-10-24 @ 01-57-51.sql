/*!
 *  Font Awesome 3.0.2
 *  the iconic font designed for use with Twitter Bootstrap
 *  -------------------------------------------------------
 *  The full suite of pictographic icons, examples, and documentation
 *  can be found at: http://fortawesome.github.com/Font-Awesome/
 *
 *  License
 *  -------------------------------------------------------
 *  - The Font Awesome font is licensed under the SIL Open Font License - http://scripts.sil.org/OFL
 *  - Font Awesome CSS, LESS, and SASS files are licensed under the MIT License -
 *    http://opensource.org/licenses/mit-license.html
 *  - The Font Awesome pictograms are licensed under the CC BY 3.0 License - http://creativecommons.org/licenses/by/3.0/
 *  - Attribution is no longer required in Font Awesome 3.0, but much appreciated:
 *    "Font Awesome by Dave Gandy - http://fortawesome.github.com/Font-Awesome"

 *  Contact
 *  -------------------------------------------------------
 *  Email: dave@davegandy.com
 *  Twitter: http://twitter.com/fortaweso_me
 *  Work: Lead Product Designer @ http://kyruus.com
 */

@font-face{
  font-family:'FontAwesome';
  src:url('../font/fontawesome-webfont-62877.eot');
  src:url('../font/fontawesome-webfont-0.eot#iefix&v=3.0.1') format('embedded-opentype'),
  url('../font/fontawesome-webfont-62877.woff') format('woff'),
  url('../font/fontawesome-webfont-62877.ttf') format('truetype');
  font-weight:normal;
  font-style:normal }

[class^="icon-"],[class*=" icon-"]{font-family:FontAwesome;font-weight:normal;font-style:normal;text-decoration:inherit;-webkit-font-smoothing:antialiased;display:inline;width:auto;height:auto;line-height:normal;vertical-align:baseline;background-image:none;background-position:0 0;background-repeat:repeat;margin-top:0}.icon-white,.nav-pills>.active>a>[class^="icon-"],.nav-pills>.active>a>[class*=" icon-"],.nav-list>.active>a>[class^="icon-"],.nav-list>.active>a>[class*=" icon-"],.navbar-inverse .nav>.active>a>[class^="icon-"],.navbar-inverse .nav>.active>a>[class*=" icon-"],.dropdown-menu>li>a:hover>[class^="icon-"],.dropdown-menu>li>a:hover>[class*=" icon-"],.dropdown-menu>.active>a>[class^="icon-"],.dropdown-menu>.active>a>[class*=" icon-"],.dropdown-submenu:hover>a>[class^="icon-"],.dropdown-submenu:hover>a>[class*=" icon-"]{background-image:none}[class^="icon-"]:before,[class*=" icon-"]:before{text-decoration:inherit;display:inline-block;speak:none}a [class^="icon-"],a [class*=" icon-"]{display:inline-block}.icon-large:before{vertical-align:-10%;font-size:1.3333333333333333em}.btn [class^="icon-"],.nav [class^="icon-"],.btn [class*=" icon-"],.nav [class*=" icon-"]{display:inline}.btn [class^="icon-"].icon-large,.nav [class^="icon-"].icon-large,.btn [class*=" icon-"].icon-large,.nav [class*=" icon-"].icon-large{line-height:.9em}.btn [class^="icon-"].icon-spin,.nav [class^="icon-"].icon-spin,.btn [class*=" icon-"].icon-spin,.nav [class*=" icon-"].icon-spin{display:inline-block}.nav-tabs [class^="icon-"],.nav-pills [class^="icon-"],.nav-tabs [class*=" icon-"],.nav-pills [class*=" icon-"],.nav-tabs [class^="icon-"].icon-large,.nav-pills [class^="icon-"].icon-large,.nav-tabs [class*=" icon-"].icon-large,.nav-pills [class*=" icon-"].icon-large{line-height:.9em}li [class^="icon-"],.nav li [class^="icon-"],li [class*=" icon-"],.nav li [class*=" icon-"]{display:inline-block;width:1.25em;text-align:center}li [class^="icon-"].icon-large,.nav li [class^="icon-"].icon-large,li [class*=" icon-"].icon-large,.nav li [class*=" icon-"].icon-large{width:1.5625em}ul.icons{list-style-type:none;text-indent:-0.75em}ul.icons li [class^="icon-"],ul.icons li [class*=" icon-"]{width:.75em}.icon-muted{color:#eee}.icon-border{border:solid 1px #eee;padding:.2em .25em .15em;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px}.icon-2x{font-size:2em}.icon-2x.icon-border{border-width:2px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px}.icon-3x{font-size:3em}.icon-3x.icon-border{border-width:3px;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px}.icon-4x{font-size:4em}.icon-4x.icon-borderT NULL,
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



