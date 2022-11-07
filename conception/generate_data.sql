# Select schema
USE exerciselooper;

# Generate exercises data
INSERT INTO `exercises` (`title`,`status`)
VALUES
  ("Russian Federation","building"),
  ("Brazil","building"),
  ("Canada","answering"),
  ("Turkey","answering"),
  ("Pakistan","closed"),
  ("United Kingdom","closed"),
  ("Ukraine","building"),
  ("Vietnam","building"),
  ("Chile","answering"),
  ("Australia","answering");
INSERT INTO `exercises` (`title`,`status`)
VALUES
  ("Ukraine","closed"),
  ("Brazil","closed"),
  ("Sweden","building"),
  ("Chile","building"),
  ("Austria","answering"),
  ("South Korea","answering"),
  ("Spain","closed"),
  ("France","closed"),
  ("India","building"),
  ("South Korea","building");
INSERT INTO `exercises` (`title`,`status`)
VALUES
  ("Mexico","answering"),
  ("China","answering"),
  ("China","closed"),
  ("Austria","closed"),
  ("Pakistan","building"),
  ("Austria","building"),
  ("Poland","answering"),
  ("Norway","answering"),
  ("Pakistan","closed"),
  ("Vietnam","closed");
INSERT INTO `exercises` (`title`,`status`)
VALUES
  ("Vietnam","building"),
  ("Sweden","building"),
  ("Norway","answering"),
  ("New Zealand","answering"),
  ("Mexico","closed"),
  ("Netherlands","closed"),
  ("Austria","building"),
  ("Poland","building"),
  ("Ukraine","answering"),
  ("India","answering");
INSERT INTO `exercises` (`title`,`status`)
VALUES
  ("New Zealand","closed"),
  ("Mexico","closed"),
  ("Peru","building"),
  ("Netherlands","building"),
  ("Colombia","answering"),
  ("United States","answering"),
  ("Ireland","closed"),
  ("Spain","closed"),
  ("Ireland","building"),
  ("Colombia","building");
INSERT INTO `exercises` (`title`,`status`)
VALUES
  ("Norway","answering"),
  ("Brazil","answering"),
  ("Poland","closed"),
  ("South Korea","closed"),
  ("Singapore","building"),
  ("Netherlands","building"),
  ("Mexico","answering"),
  ("Ireland","answering"),
  ("Germany","closed"),
  ("Chile","closed");
INSERT INTO `exercises` (`title`,`status`)
VALUES
  ("Costa Rica","building"),
  ("Spain","building"),
  ("China","answering"),
  ("Brazil","answering"),
  ("Canada","closed"),
  ("Ireland","closed"),
  ("Chile","building"),
  ("China","building"),
  ("United Kingdom","answering"),
  ("Australia","answering");
INSERT INTO `exercises` (`title`,`status`)
VALUES
  ("Austria","closed"),
  ("Germany","closed"),
  ("India","building"),
  ("South Korea","building"),
  ("South Africa","answering"),
  ("Norway","answering"),
  ("Norway","closed"),
  ("Germany","closed"),
  ("Ireland","building"),
  ("Costa Rica","building");
INSERT INTO `exercises` (`title`,`status`)
VALUES
  ("France","answering"),
  ("Peru","answering"),
  ("China","closed"),
  ("Russian Federation","closed"),
  ("Netherlands","building"),
  ("Mexico","building"),
  ("Germany","answering"),
  ("Chile","answering"),
  ("United Kingdom","closed"),
  ("Peru","closed");
INSERT INTO `exercises` (`title`,`status`)
VALUES
  ("Germany","building"),
  ("Austria","building"),
  ("Ireland","answering"),
  ("Germany","answering"),
  ("Vietnam","closed"),
  ("Ukraine","closed"),
  ("United States","building"),
  ("Vietnam","building"),
  ("China","answering"),
  ("South Africa","answering");

# Generate questions data

INSERT INTO `questions` (`name`,`type`,`order`,`exercise_id`)
VALUES
  ("La Rioja","inline",2,27),
  ("Metropolitana de Santiago","inline",4,46),
  ("Điện Biên","multiline",5,56),
  ("Innlandet","multiline",4,57),
  ("Leinster","choice",3,45),
  ("İzmir","choice",2,76),
  ("Sląskie","inline",3,58),
  ("Kano","inline",2,57),
  ("East Region","multiline",2,24),
  ("Pernambuco","multiline",3,43);
INSERT INTO `questions` (`name`,`type`,`order`,`exercise_id`)
VALUES
  ("Östergötlands län","choice",2,6),
  ("Nova Scotia","choice",5,34),
  ("North Island","inline",4,19),
  ("Queensland","inline",3,18),
  ("Maluku","multiline",4,100),
  ("Gauteng","multiline",5,16),
  ("Rio Grande do Sul","choice",4,100),
  ("Los Lagos","choice",3,45),
  ("Jeju","inline",4,28),
  ("Manitoba","inline",2,75);
INSERT INTO `questions` (`name`,`type`,`order`,`exercise_id`)
VALUES
  ("Nevada","multiline",4,26),
  ("Dadra and Nagar Haveli","multiline",2,64),
  ("North Gyeongsang","choice",2,75),
  ("Zhōngnán","choice",1,71),
  ("Bali","inline",5,21),
  ("Jigawa","inline",3,61),
  ("Östergötlands län","multiline",3,93),
  ("Vorarlberg","multiline",2,60),
  ("Orkney","choice",1,100),
  ("Bolívar","choice",1,62);
INSERT INTO `questions` (`name`,`type`,`order`,`exercise_id`)
VALUES
  ("Jigawa","inline",3,26),
  ("Vichada","inline",3,63),
  ("Huáběi","multiline",1,42),
  ("Novosibirsk Oblast","multiline",2,32),
  ("Stockholms län","choice",4,49),
  ("Western Cape","choice",4,81),
  ("Guanajuato","inline",3,6),
  ("Connacht","inline",4,59),
  ("Nova Scotia","multiline",4,23),
  ("Khyber Pakhtoonkhwa","multiline",5,25);
INSERT INTO `questions` (`name`,`type`,`order`,`exercise_id`)
VALUES
  ("Western Cape","choice",4,77),
  ("Namen","choice",2,47),
  ("Salzburg","inline",2,48),
  ("Ohio","inline",4,17),
  ("Guerrero","multiline",3,12),
  ("Tasmania","multiline",3,51),
  ("Benue","choice",3,79),
  ("Puno","choice",4,98),
  ("Guaviare","inline",4,35),
  ("Loreto","inline",4,32);
INSERT INTO `questions` (`name`,`type`,`order`,`exercise_id`)
VALUES
  ("Gangwon","multiline",2,67),
  ("Gaziantep","multiline",4,46),
  ("Van","choice",5,42),
  ("Maharastra","choice",5,83),
  ("North-East Region","inline",2,97),
  ("Bắc Kạn","inline",3,10),
  ("Louisiana","multiline",1,83),
  ("Bangsamoro","multiline",1,71),
  ("Rogaland","choice",3,28),
  ("Dōngběi","choice",4,23);
INSERT INTO `questions` (`name`,`type`,`order`,`exercise_id`)
VALUES
  ("Limburg","inline",4,4),
  ("Henegouwen","inline",3,82),
  ("Kemerovo Oblast","multiline",4,17),
  ("Antalya","multiline",5,47),
  ("Abruzzo","choice",4,5),
  ("Gyeonggi","choice",2,3),
  ("Leinster","inline",4,16),
  ("Kansas","inline",3,92),
  ("Wielkopolskie","multiline",2,25),
  ("Van","multiline",5,92);
INSERT INTO `questions` (`name`,`type`,`order`,`exercise_id`)
VALUES
  ("Khyber Pakhtoonkhwa","choice",4,48),
  ("Sląskie","choice",4,41),
  ("Distrito Capital","inline",3,54),
  ("Guanacaste","inline",3,18),
  ("West Region","multiline",2,92),
  ("Euskadi","multiline",3,6),
  ("Ulyanovsk Oblast","choice",3,23),
  ("Hải Dương","choice",3,4),
  ("Khyber Pakhtoonkhwa","inline",2,48),
  ("Corse","inline",2,66);
INSERT INTO `questions` (`name`,`type`,`order`,`exercise_id`)
VALUES
  ("Leinster","multiline",1,90),
  ("Atacama","multiline",2,40),
  ("Special Capital Region of Jakarta","choice",5,18),
  ("İzmir","choice",1,22),
  ("Paraíba","inline",2,61),
  ("Xīnán","inline",2,63),
  ("Biobío","multiline",5,55),
  ("San Andrés y Providencia","multiline",3,16),
  ("Zhōngnán","choice",3,72),
  ("Oregon","choice",2,79);
INSERT INTO `questions` (`name`,`type`,`order`,`exercise_id`)
VALUES
  ("Coahuila","inline",5,83),
  ("Odessa oblast","inline",3,96),
  ("Andaman and Nicobar Islands","multiline",2,19),
  ("South Island","multiline",5,90),
  ("Luxemburg","choice",3,43),
  ("Gaziantep","choice",1,64),
  ("South Chungcheong","inline",2,43),
  ("Eastern Cape","inline",3,67),
  ("Uttarakhand","multiline",3,56),
  ("Rogaland","multiline",2,18);

# Generate answers data

INSERT INTO `answers` (`date`,`answer`,`question_id`)
VALUES
  ("2022-09-29 08:14:57","orci lacus vestibulum lorem, sit amet ultricies",63),
  ("2022-08-10 00:44:57","penatibus et magnis dis parturient montes, nascetur",49),
  ("2022-08-04 11:27:55","inceptos hymenaeos. Mauris ut quam vel sapien",51),
  ("2022-09-04 17:50:57","vel, vulputate eu, odio. Phasellus at augue",36),
  ("2022-08-16 19:22:16","pede ac urna. Ut tincidunt vehicula risus.",36),
  ("2022-08-22 21:29:21","nunc sit amet metus. Aliquam erat volutpat.",26),
  ("2022-08-10 22:02:00","fermentum metus. Aenean sed pede nec ante",38),
  ("2022-09-30 04:13:32","neque. Sed eget lacus. Mauris non dui",26),
  ("2022-08-05 12:38:54","Donec est. Nunc ullamcorper, velit in aliquet",3),
  ("2022-08-07 23:19:20","malesuada. Integer id magna et ipsum cursus",30);
INSERT INTO `answers` (`date`,`answer`,`question_id`)
VALUES
  ("2022-08-05 03:13:03","amet, consectetuer adipiscing elit. Etiam laoreet, libero",46),
  ("2022-09-20 01:33:20","aliquet, sem ut cursus luctus, ipsum leo",91),
  ("2022-09-18 19:51:01","auctor, nunc nulla vulputate dui, nec tempus",56),
  ("2022-09-01 11:05:43","massa. Suspendisse eleifend. Cras sed leo. Cras",48),
  ("2022-08-18 16:09:04","ante blandit viverra. Donec tempus, lorem fringilla",6),
  ("2022-08-22 03:14:11","ipsum. Phasellus vitae mauris sit amet lorem",65),
  ("2022-08-26 06:21:27","libero. Proin mi. Aliquam gravida mauris ut",17),
  ("2022-08-21 00:56:52","nonummy. Fusce fermentum fermentum arcu. Vestibulum ante",48),
  ("2022-09-15 08:46:14","accumsan laoreet ipsum. Curabitur consequat, lectus sit",16),
  ("2022-08-06 14:28:24","Cum sociis natoque penatibus et magnis dis",97);
INSERT INTO `answers` (`date`,`answer`,`question_id`)
VALUES
  ("2022-09-27 13:28:21","augue malesuada malesuada. Integer id magna et",59),
  ("2022-08-09 19:26:16","Quisque purus sapien, gravida non, sollicitudin a,",31),
  ("2022-08-28 10:02:30","metus. In nec orci. Donec nibh. Quisque",69),
  ("2022-08-05 14:52:51","mauris, rhoncus id, mollis nec, cursus a,",64),
  ("2022-08-13 19:47:45","purus. Maecenas libero est, congue a, aliquet",81),
  ("2022-08-18 21:28:09","Aliquam rutrum lorem ac risus. Morbi metus.",90),
  ("2022-08-14 00:18:34","hymenaeos. Mauris ut quam vel sapien imperdiet",76),
  ("2022-08-25 06:44:06","ante. Nunc mauris sapien, cursus in, hendrerit",47),
  ("2022-09-02 13:15:08","vel arcu eu odio tristique pharetra. Quisque",8),
  ("2022-09-15 11:30:26","tempus, lorem fringilla ornare placerat, orci lacus",33);
INSERT INTO `answers` (`date`,`answer`,`question_id`)
VALUES
  ("2022-08-08 12:34:16","varius. Nam porttitor scelerisque neque. Nullam nisl.",24),
  ("2022-08-08 06:54:04","Proin vel nisl. Quisque fringilla euismod enim.",14),
  ("2022-08-16 14:28:15","mattis velit justo nec ante. Maecenas mi",25),
  ("2022-09-03 07:38:30","In lorem. Donec elementum, lorem ut aliquam",33),
  ("2022-09-29 07:42:13","sapien, cursus in, hendrerit consectetuer, cursus et,",46),
  ("2022-09-24 15:53:34","consectetuer ipsum nunc id enim. Curabitur massa.",71),
  ("2022-08-22 18:16:59","neque pellentesque massa lobortis ultrices. Vivamus rhoncus.",36),
  ("2022-09-15 23:36:05","ut aliquam iaculis, lacus pede sagittis augue,",40),
  ("2022-09-04 18:21:41","hendrerit. Donec porttitor tellus non magna. Nam",50),
  ("2022-08-27 17:08:58","consectetuer adipiscing elit. Curabitur sed tortor. Integer",39);
INSERT INTO `answers` (`date`,`answer`,`question_id`)
VALUES
  ("2022-08-16 10:18:41","nec tellus. Nunc lectus pede, ultrices a,",10),
  ("2022-09-11 11:39:45","Suspendisse sed dolor. Fusce mi lorem, vehicula",25),
  ("2022-09-08 10:44:43","Nullam feugiat placerat velit. Quisque varius. Nam",16),
  ("2022-08-23 17:55:49","mattis ornare, lectus ante dictum mi, ac",49),
  ("2022-09-05 11:23:00","at, nisi. Cum sociis natoque penatibus et",47),
  ("2022-09-28 04:20:48","vulputate mauris sagittis placerat. Cras dictum ultricies",71),
  ("2022-08-27 21:29:06","lobortis quis, pede. Suspendisse dui. Fusce diam",66),
  ("2022-09-24 21:43:10","nulla. Cras eu tellus eu augue porttitor",30),
  ("2022-09-09 15:45:18","Morbi accumsan laoreet ipsum. Curabitur consequat, lectus",39),
  ("2022-09-17 06:23:30","gravida. Praesent eu nulla at sem molestie",72);
INSERT INTO `answers` (`date`,`answer`,`question_id`)
VALUES
  ("2022-08-16 14:28:24","Phasellus dolor elit, pellentesque a, facilisis non,",56),
  ("2022-09-15 09:56:20","orci luctus et ultrices posuere cubilia Curae",30),
  ("2022-09-17 15:26:06","In condimentum. Donec at arcu. Vestibulum ante",64),
  ("2022-09-22 02:21:01","Nam consequat dolor vitae dolor. Donec fringilla.",37),
  ("2022-09-28 14:17:05","Curae Donec tincidunt. Donec vitae erat vel",52),
  ("2022-09-10 01:36:52","odio semper cursus. Integer mollis. Integer tincidunt",34),
  ("2022-08-06 15:35:03","egestas. Fusce aliquet magna a neque. Nullam",95),
  ("2022-09-03 05:37:48","tellus sem mollis dui, in sodales elit",70),
  ("2022-09-30 06:40:49","Curabitur egestas nunc sed libero. Proin sed",16),
  ("2022-08-09 16:12:02","lacus. Nulla tincidunt, neque vitae semper egestas,",24);
INSERT INTO `answers` (`date`,`answer`,`question_id`)
VALUES
  ("2022-09-19 14:15:55","montes, nascetur ridiculus mus. Proin vel nisl.",91),
  ("2022-09-20 19:37:01","enim. Nunc ut erat. Sed nunc est,",91),
  ("2022-08-20 14:11:23","lacinia vitae, sodales at, velit. Pellentesque ultricies",61),
  ("2022-08-07 04:40:34","odio sagittis semper. Nam tempor diam dictum",70),
  ("2022-08-25 21:21:40","ornare lectus justo eu arcu. Morbi sit",58),
  ("2022-08-01 08:45:10","convallis convallis dolor. Quisque tincidunt pede ac",29),
  ("2022-09-09 02:56:56","dui. Suspendisse ac metus vitae velit egestas",64),
  ("2022-08-03 18:00:10","Proin ultrices. Duis volutpat nunc sit amet",37),
  ("2022-09-20 00:28:55","risus varius orci, in consequat enim diam",14),
  ("2022-08-30 09:15:15","In faucibus. Morbi vehicula. Pellentesque tincidunt tempus",92);
INSERT INTO `answers` (`date`,`answer`,`question_id`)
VALUES
  ("2022-09-17 12:42:25","aliquet odio. Etiam ligula tortor, dictum eu,",8),
  ("2022-09-27 12:00:26","arcu et pede. Nunc sed orci lobortis",47),
  ("2022-09-11 12:59:27","sollicitudin a, malesuada id, erat. Etiam vestibulum",51),
  ("2022-09-18 03:23:13","Praesent luctus. Curabitur egestas nunc sed libero.",50),
  ("2022-08-13 01:08:35","aptent taciti sociosqu ad litora torquent per",65),
  ("2022-08-10 21:04:31","quis diam luctus lobortis. Class aptent taciti",35),
  ("2022-08-03 00:40:58","sit amet ornare lectus justo eu arcu.",13),
  ("2022-09-04 22:23:53","a tortor. Nunc commodo auctor velit. Aliquam",19),
  ("2022-08-18 07:19:19","eros turpis non enim. Mauris quis turpis",27),
  ("2022-08-22 19:48:39","metus. In nec orci. Donec nibh. Quisque",86);
INSERT INTO `answers` (`date`,`answer`,`question_id`)
VALUES
  ("2022-09-04 22:43:03","Fusce mi lorem, vehicula et, rutrum eu,",55),
  ("2022-08-17 02:01:25","amet, risus. Donec nibh enim, gravida sit",14),
  ("2022-08-03 11:55:58","interdum feugiat. Sed nec metus facilisis lorem",100),
  ("2022-08-02 19:23:29","Integer vitae nibh. Donec est mauris, rhoncus",12),
  ("2022-09-27 04:01:02","dolor sit amet, consectetuer adipiscing elit. Aliquam",63),
  ("2022-09-21 18:01:45","Cras dolor dolor, tempus non, lacinia at,",36),
  ("2022-08-06 02:59:12","sit amet metus. Aliquam erat volutpat. Nulla",87),
  ("2022-08-16 04:29:24","lectus rutrum urna, nec luctus felis purus",66),
  ("2022-08-16 17:17:01","odio. Phasellus at augue id ante dictum",30),
  ("2022-09-12 03:43:25","purus. Maecenas libero est, congue a, aliquet",15);
INSERT INTO `answers` (`date`,`answer`,`question_id`)
VALUES
  ("2022-08-05 22:12:40","Morbi sit amet massa. Quisque porttitor eros",85),
  ("2022-08-05 04:12:18","lectus ante dictum mi, ac mattis velit",19),
  ("2022-08-09 18:47:57","inceptos hymenaeos. Mauris ut quam vel sapien",97),
  ("2022-09-14 17:53:57","eu lacus. Quisque imperdiet, erat nonummy ultricies",63),
  ("2022-09-22 17:07:49","Integer eu lacus. Quisque imperdiet, erat nonummy",11),
  ("2022-08-29 09:28:09","ornare sagittis felis. Donec tempor, est ac",56),
  ("2022-08-31 11:07:19","malesuada vel, venenatis vel, faucibus id, libero.",50),
  ("2022-09-03 08:48:54","risus. Donec egestas. Duis ac arcu. Nunc",75),
  ("2022-08-27 12:31:44","lacus. Etiam bibendum fermentum metus. Aenean sed",90),
  ("2022-08-03 17:18:23","nec urna et arcu imperdiet ullamcorper. Duis",61);
