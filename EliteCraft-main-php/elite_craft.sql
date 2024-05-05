-- creating Database and Switching to it
create database eliteCraft;
use eliteCraft;
-- ceating Table `users`

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
  )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- inserting Data into Table `users`

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'qais1@example.com', 'Jx47KuYbTf'),
(2, 'ali1@example.com', 'gPm9JwCk3D'),
(3, 'osama232@example.com', 'zQo1NeRx4V'),
(4, 'qa_2me@example.com', 'hTl5FdGb2S'),
(6, '2me@example.com', 'rBw8UiYo7Q'),
(7, 'mohrouq@example.com', 'cHn3WdZf1O'),
(22, 'qais@gmail.com', 'testtest'),
(23, 'test@hotmail.com', '123456');
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

 
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;
 

-- creating Table `qais`

CREATE TABLE `qais` (
  `BuildingInfoID` int(11) NOT NULL,
  `BuildingInfo` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Area` varchar(50) DEFAULT NULL,
  `Floors` int(11) DEFAULT NULL,
  `Cost` decimal(10,2) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Picture` varchar(255) DEFAULT NULL
 )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- isarting Data into Table `qais`

INSERT INTO `qais` (`BuildingInfoID`, `BuildingInfo`, `Date`, `Area`, `Floors`, `Cost`, `Location`, `Picture`) VALUES
(1, 'Desert House', '2016-08-27', '650 m²', 1, 49218.22, 'Al Wusta/Mehoot', 'assets/desrt.jpg'),
(2, 'Al-Seeb Beach House', '2015-05-15', '800 m²', 2, 90683.04, 'Muscat/Al-Seeb', 'assets/seeb.jpg'),
(3, 'Mountain Cabin', '2018-03-03', '200 m²', 1, 15144.07, 'Al Dakhiliyah/Green Mountain', 'assets/mounten.jpg'),
(4, 'Alkhair Farm', '2005-06-12', '1200 m²', 0, 7196.88, 'Ash Sharqiyah/Al Mudaybi', 'assets/farm.jpg'),
(5, 'Alsalam Tower', '2001-03-15', '300 m²', 60, 1496270.16, 'UAE/Dubai', 'assets/sky.jpg'),
(6, 'Salala House', '2020-04-22', '350 m²', 1, 19836.92, 'Dhofar/Salala', 'assets/salala.jpg'),
(7, 'Bin Rashid Souq', '2018-02-02', '1600 m²', 1, 126956.26, 'Muscat/Alseeb', 'assets/souq.jpg'),
(8, 'Samad House', '2017-06-14', '450 m²', 2, 51009.21, 'Ash Sharqiyah/samad', 'assets/ddd (2).jpeg'),
(9, 'Sur Motel', '2021-02-19', '1300 m²', 1, 116303.92, 'Ash Sharqiyah/Sur', 'assets/ddd (1).jpeg'),
(10, 'Al-Seeb House', '2024-04-09', '500 m²', 2, 56676.90, 'Muscat/Alseeb', 'assets/mabala.jpg');

 -- creating Table `feedback`

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `satisfaction` enum('yes','no') DEFAULT NULL,
  `satisfaction_reason` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- inserting Data into Table `feedback`

INSERT INTO `feedback` (`id`, `name`, `email`, `phone`, `satisfaction`, `satisfaction_reason`, `message`) VALUES
(1, 'almakhtar albadowi', 'test@gmail.com', '94027100', 'yes', '', 'I didn''t received from the technical team any respond');

INSERT INTO `feedback` (`id`, `name`, `email`, `phone`, `satisfaction`, `satisfaction_reason`, `message`) VALUES
(2, 'John Doe', 'john.doe@example.com', '123456789', 'yes', '', 'I received my order promptly and I''m very satisfied with the service.'),
(3, 'Jane Smith', 'jane.smith@example.com', '987654321', 'no', 'Too slow response', 'Bad service'),
(4, 'Alice Johnson', 'alice.johnson@example.com', '555555555', 'yes', '', 'The customer service team was very polite and helpful throughout my inquiry.'),
(5, 'Bob Brown', 'bob.brown@example.com', '111111111', 'no', 'Poor product quality', 'very bad engineers'),
(6, 'Emily Davis', 'emily.davis@example.com', '999999999', 'yes', '', 'I had an issue with my order, but it was resolved promptly by the customer service team'),
(7, 'Michael Wilson', 'michael.wilson@example.com', '777777777', 'no', 'Bad customer service', 'nothing other to say i want to talk to the manger');

