-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 10:16 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodlerecipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `rdetails`
--

CREATE TABLE `rdetails` (
  `Id` int(11) NOT NULL,
  `rname` varchar(60) DEFAULT NULL,
  `rauthor` varchar(20) DEFAULT NULL,
  `rtime` varchar(5) DEFAULT NULL,
  `rinstructions` varchar(1000) DEFAULT NULL,
  `ringredients` varchar(1000) DEFAULT NULL,
  `rimage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rdetails`
--

INSERT INTO `rdetails` (`Id`, `rname`, `rauthor`, `rtime`, `rinstructions`, `ringredients`, `rimage`) VALUES
(1, 'Black Forest Cake', 'Test', '60', 'Preheat oven to 350 degrees. Beat cake mix, water, eggs, and oil in a large bowl with an electric mixer on low speed until combined about 30 seconds.\r\nBake cakes in the preheated oven. Grate chocolate bar. Refrigerate cake ', '1 devil''s food chocolate cake mix. 1 1/4 cups water. 3 eggs. 2 cups heavy whipping cream', 'uploads/blackforest.jpg'),
(2, 'Red Velvet Cake', 'Test', '120', 'Preheat oven to 325.  In a medium bowl, whisk together flour, baking soda, baking powder, cocoa powder and salt. Set aside. Mix in the eggs, buttermilk, vanilla and red food coloring until combined.\r\nPour the batter evenly into each pan. Bake in the middle rack for 30-40 minutes', '2 cups all-purpose flour. 1 teaspoon baking soda. 1 teaspoon baking powder. 2 cups sugar', 'uploads/redvelvet.jpg'),
(3, 'Curried Crab with Coconut and Chili', 'Test', '120', 'Place the crab in the freezer for 2 hours or until it stops moving.  Remove the legs and crack them with a rolling pin. Heat a medium saute pan over medium heat.\r\nDivide the crab pieces and sauce among shallow wide soup plates and serve immediately', '2 1/4 pounds live crab. 1/4 cup coriander seeds. 1 1/2 tablespoons cumin seeds. 2 ounces desiccated coconut', 'uploads/curriedcrab.jpg'),
(4, 'Fajitas', 'David', '120', 'In a small 2 cup measuring cup, or something similar size and shape, combine all the marinade ingredients. Drain the marinade from the beef. Lightly oil the grill or grill pan. Once the beef is off the grill pan and resting, add the bell peppers and onions tossed with lime juice and olive oil, if using. Thinly slice the steak against the grain on a diagonal.', '4 tablespoons olive oil. 2 garlic cloves, roughly chopped. 3 chipolte chiles, in adobo sauce. 3 tablespoon roughly chopped fresh cilantro leaves.', NULL),
(5, 'Chicken Noodle Soup', 'Robert', '20', 'Bring water to a boil in a soup pot. While water comes to a boil, heat oil in a large skillet over medium-high heat until hot. SautÃ© chicken until browned on all sides and cooked through. Once water comes to a boil, add sautÃ©ed chicken, carrot, cabbage, garlic, and ginger to pot. Cook 2 minutes, then add ramen noodles along with only 2 of the flavor packets that come with the noodles. Cook 3 minutes and not a second longer â€“ ramen is best when not cooked to death. Taste, then add a slosh of soy sauce if you lik', '2 tablespoons oil . 2 boneless, skinless chicken breast halves, cut into bite-size pieces. 1 carrot, shredded .2 cloves garlic, minced or crushed ', 'uploads/1481058926.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `Id` int(11) NOT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`Id`, `Username`, `Password`) VALUES
(1, 'Test', 'ac1c196e84b05d59faea639d0cccb6c16f7568e0943f4c94c648bd8eefe5cf3978f8d4f99b1426e4ce3c6fa40e17cf68d6b86d42246333569b963ff4579c6355'),
(2, 'David', 'a378cc914b15bf3c81fd4b21e78b17a5a0fc437d5eeb6db43857fa07d3f917d1b1c6e5cafacda7cbb6bfb78f8b94262b51c0f719a0f473bfb71c632ad38cfa4a'),
(3, 'Robert', 'c0b3c746be04cd77ba709feb0d044d55e044e84fcbeb4ac4c72fd32c827212a4b148199edcea7f3e4aa2248bb2bf5afeee3f095f3c3c6cc3fede924e09823b7e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rdetails`
--
ALTER TABLE `rdetails`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rdetails`
--
ALTER TABLE `rdetails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
