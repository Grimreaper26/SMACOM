

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(100) DEFAULT NULL,
  `admin_pass` varchar(100) DEFAULT NULL,
  `admin_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO admin VALUES("1","admin","admin","Sulong Admin");



CREATE TABLE `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Photo` varchar(255) DEFAULT NULL,
  `Announcement` text NOT NULL,
  `Description` text DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO announcement VALUES("3","","Senior Citizen Meeting","Attention all residents of Brgy. Sulong, Alimodian, Iloilo: We are pleased to announce that a special event for senior citizens will be held next Saturday at the community center, featuring health screenings and social activities. We encourage all senior citizens to join us for a day of fun, information, and connection with fellow community members!","2024-10-17");
INSERT INTO announcement VALUES("6","","Mlbb Tournament","Attention, gamers of Brgy. Sulong, Alimodian, Iloilo! We are excited to announce an MLBB tournament happening next weekend at the community hall, where teams can compete for exciting prizes and bragging rights. Gather your friends, form a squad, and get ready to showcase your skills in this thrilling event!","2024-10-31");
INSERT INTO announcement VALUES("7","","Basketball League","Attention, basketball enthusiasts of Brgy. Sulong, Alimodian, Iloilo! We are thrilled to announce the start of our community basketball league, kicking off next month. Gather your teams, practice your skills, and get ready to compete for the championship title and community pride!","2024-11-07");



CREATE TABLE `barangayrevenue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Recipient` varchar(255) NOT NULL,
  `Details` text DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO barangayrevenue VALUES("43","Clarence Fernandez","BARANGAY RESIDENCY","100.00","2024-10-28");



CREATE TABLE `brgyofficial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fullname` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO brgyofficial VALUES("22","Raul Almorato","Barangay Captain","Active","../brgyofficialphoto/Captain.png");
INSERT INTO brgyofficial VALUES("24","Martin Jun Amamanglon","Secretary","Active","../brgyofficialphoto/Martin.png");
INSERT INTO brgyofficial VALUES("25","Beverly Felera","Treasurer","Active","../brgyofficialphoto/Beverly.png");
INSERT INTO brgyofficial VALUES("26","Rodel Camaña","Kagawad","Active","../brgyofficialphoto/az.png");
INSERT INTO brgyofficial VALUES("33","Anthony Amuan","Kagawad","Active","../brgyofficialphoto/aaw.png");
INSERT INTO brgyofficial VALUES("34","Emilio Amoyan","Kagawad","Active","../brgyofficialphoto/zza.png");
INSERT INTO brgyofficial VALUES("35","Navo Marañon","Kagawad","Active","../brgyofficialphoto/bb.png");
INSERT INTO brgyofficial VALUES("36","Edmar Amoncio","Kagawad","Active","../brgyofficialphoto/mu.png");
INSERT INTO brgyofficial VALUES("37","Angeli Gajardo","Kagawad","Active","../brgyofficialphoto/lol.png");
INSERT INTO brgyofficial VALUES("38","Florentino Altura","Kagawad","Active","../brgyofficialphoto/awz.png");



CREATE TABLE `documentissuance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fullname` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `Document` varchar(255) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Referenceno` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Contactno` varchar(255) NOT NULL,
  `Purpose` text NOT NULL,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO documentissuance VALUES("154","Clarence Fernandez","15","BARANGAY RESIDENCY","100.00","REF-671f1f0c06c5e","2024-10-28","0950505050","hahahahaha","Pending");



CREATE TABLE `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Documentname` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO documents VALUES("2","BARANGAY INDIGENCE"," View the requirements needed for Barangay Indigency and reserve online now.");
INSERT INTO documents VALUES("5","BARANGAY RESIDENCY","View the requirements needed for Barangay Residency and reserve online now.");



CREATE TABLE `incidents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Complainant` varchar(255) NOT NULL,
  `Respondent` varchar(255) NOT NULL,
  `Incident` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Victim` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO incidents VALUES("10","try","try","try","Ongoing","try");
INSERT INTO incidents VALUES("11","try","trt","try","Settled","yrt");
INSERT INTO incidents VALUES("12","try","try","trty","Active","trty");



CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `News` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO news VALUES("2","Brgy. Sulong Basketball League Launches","2024-10-09","In a bid to foster camaraderie and promote physical fitness, Brgy. Sulong, Alimodian, Iloilo, is launching a vibrant basketball league next month. Local teams will compete weekly, showcasing their talent and teamwork while bringing residents together for thrilling matches and community spirit.","");
INSERT INTO news VALUES("3","Senior Citizen Health Fair Announced","2024-10-25","Brgy. Sulong, Alimodian, Iloilo, is set to host a health fair for senior citizens next Saturday at the community center. The event will feature free health screenings, wellness talks, and activities aimed at promoting healthy lifestyles among older residents.","");
INSERT INTO news VALUES("4","MLBB Tournament Excitement Builds","2024-10-25","An MLBB tournament is coming to Brgy. Sulong, Alimodian, Iloilo, next weekend, inviting gamers to showcase their skills. Teams will compete for exciting prizes, fostering community engagement and friendly rivalry in the popular mobile game.","");
INSERT INTO news VALUES("8","Farmers Benefit from Harvester Rentals","2024-10-27","Brgy. Sulong, Alimodian, Iloilo, has introduced harvester rental services to support local farmers during the busy harvest season. This initiative aims to improve agricultural efficiency and help small-scale farmers maximize their yields without the burden of equipment costs.","");



CREATE TABLE `residentrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `MiddleInitial` varchar(10) NOT NULL,
  `Age` int(11) NOT NULL,
  `CivilStatus` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Sitio` varchar(50) NOT NULL,
  `Household` varchar(250) NOT NULL,
  `Photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO residentrecord VALUES("38","Clarence","Fernandez","P","23","Single","Male","09078282518","Sitio Ilogan","1124","");
INSERT INTO residentrecord VALUES("39","Benjamin","Galvez","M","25","Single","Male","0","Sitio Ilogan","hh1","uploads/benjaminkupal.jpg");



CREATE TABLE `servicerental` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fullname` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `ReferenceNo` varchar(255) DEFAULT NULL,
  `ContactNumber` int(50) NOT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Photo` blob DEFAULT NULL,
  `Purpose` text NOT NULL,
  `Rent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO servicerental VALUES("31","Clarence","","REF-671f0ae85a0ea","950505","Male","2024-10-28","01:05:00","03:53:00","uploads/indigence.jpg","try try try","Basketball Court");



CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Service_name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO services VALUES("1","Basketball Court","The basketball court at Brgy. Sulong, Alimodian, Iloilo, is a well-maintained facility ideal for casual games and events. With good lighting and a welcoming atmosphere, it's perfect for local teams and community gatherings. Renting is easy, making it accessible for all ages.");
INSERT INTO services VALUES("2","Harvester","In Brgy. Sulong, Alimodian, Iloilo, harvester renting services provide local farmers with access to modern machinery, enhancing their efficiency during the busy harvest season. These rental options allow small-scale farmers to optimize their yields without the financial burden of purchasing expensive equipment outright.");
INSERT INTO services VALUES("3","Tractors","In Brgy. Sulong, Alimodian, Iloilo, tractor rental services offer farmers a convenient solution for land preparation and cultivation, ensuring they can maximize their agricultural output. By renting tractors, local farmers can efficiently manage larger plots of land and complete tasks more quickly, helping to sustain their livelihoods while minimizing costs.");
INSERT INTO services VALUES("4","Mini Sound System","In Brgy. Sulong, Alimodian, Iloilo, mini sound system rentals cater to local events and gatherings, providing high-quality audio for celebrations, parties, and community functions. These compact systems are easy to set up and operate, ensuring that residents can enjoy clear sound and lively music without the need for expensive equipment.");



CREATE TABLE `skofficial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fullname` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO skofficial VALUES("9","Kyla Marie Tamagos","Sk Charmain","Active","");
INSERT INTO skofficial VALUES("10","Mary Joy Amoyan","Sk Secretary","Active","");
INSERT INTO skofficial VALUES("11","Bea Amoncio","Sk Treasurer","Active","");
INSERT INTO skofficial VALUES("12","Nicole Kelanie","Sk Kagawad","Active","");
INSERT INTO skofficial VALUES("13","Johanna Rose Angelitud","Sk Kagawad","Active","");
INSERT INTO skofficial VALUES("14","Kent Jannel  Angelada","Sk Kagawad","Active","");
INSERT INTO skofficial VALUES("15","Jun Jeric","Sk Kagawad","Active","");
INSERT INTO skofficial VALUES("16","Eugene Tapitan","Sk Kagawad","Active","");
INSERT INTO skofficial VALUES("17","Ian Nathaniel Alfafaras","Sk Kagawad","Active","");
INSERT INTO skofficial VALUES("18","Jeff Deo Alimpolo","Sk Kagawad","Active","");



CREATE TABLE `transparency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Manage` varchar(255) NOT NULL,
  `Project` varchar(255) NOT NULL,
  `Cost` decimal(10,2) NOT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO transparency VALUES("8","2024-10-27","Clarence Fernandez","Sulong New Health Center","1500000.00","transparencyphoto/benjaminkupal.jpg");



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES("38","Clarence","Clarence");
INSERT INTO users VALUES("39","Benjamin","Pogi");

