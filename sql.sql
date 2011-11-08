-- phpMyAdmin SQL Dump
-- version 3.2.5deb2~sbp50+1
-- http://www.phpmyadmin.net
--
-- Host: tools.stanford.edu
-- Generation Time: Nov 07, 2011 at 08:10 PM
-- Server version: 5.1.49
-- PHP Version: 5.2.6-1+lenny13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `g_westcenter_teaching`
--

-- --------------------------------------------------------

--
-- Table structure for table `mailchecked`
--

CREATE TABLE IF NOT EXISTS `mailchecked` (
  `time` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailchecked`
--

INSERT INTO `mailchecked` (`time`) VALUES
('1320725182'),
('1320725194'),
('1320725319'),
('1320725387');
