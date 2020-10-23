 --creating table users


CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` text NOT NULL
)

--creating table user_profile

CREATE TABLE `user_profile` (
  `userId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `userType` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp()
)

--creating table tour

CREATE TABLE `tour` (
  `tourId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `placename` varchar(50) NOT NULL,
  `departure` datetime NOT NULL,
  `arrival` datetime NOT NULL,
  `seats` int(5) NOT NULL,
  `details` text NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp()
)


--creating table booking
CREATE TABLE `booking` (
  `bookId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `tourId` int(11) NOT NULL,
  `seats` int(5) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) 

--making id of user table as a primary key

  ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--making id of table user a foreign key in user_profile table
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;


--making userId as a foreign key in tour table
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_profile` (`userId`);

--making tourId as a primary key in tour table
  ALTER TABLE `tour`
  ADD PRIMARY KEY (`tourId`),
  ADD KEY `userId_fk` (`userId`);



-- making bookId as primary key
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `userId_fk` (`userId`),
  ADD KEY `tourId_fk` (`tourId`);


--making userId and tourId as a foreignKey in booking table
  ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_profile` (`userId`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`tourId`) REFERENCES `tour` (`tourId`);












