-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2012 at 04:55 PM
-- Server version: 5.1.54
-- PHP Version: 5.3.5-1ubuntu7.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pcportal_video`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL,
  `slug` varchar(350) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `parent`, `title`, `slug`) VALUES
(1, 0, 'Gaming', 'gaming'),
(2, 0, 'Comedy', 'comedy'),
(3, 0, 'Film & Animation', 'film-and-animation'),
(4, 0, 'Sports', 'sports'),
(5, 4, 'Football', 'football'),
(6, 4, 'Baseball', 'baseball'),
(7, 4, 'Hockey', 'hockey'),
(8, 4, 'Handball', 'handball'),
(9, 4, 'Snooker', 'snooker'),
(10, 4, 'Poker', 'poker'),
(11, 0, 'Travels & Events', 'travels-and-events'),
(12, 0, 'News & Politics', 'news-and-politics'),
(13, 10, 'Hold''em', 'holdem'),
(14, 10, 'Ohama', 'ohama'),
(15, 1, 'Strategy', 'strategy');

-- --------------------------------------------------------

--
-- Table structure for table `community_menu`
--

CREATE TABLE IF NOT EXISTS `community_menu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `link` varchar(300) NOT NULL,
  `default` int(11) NOT NULL DEFAULT '0',
  `order` int(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `community_menu`
--

INSERT INTO `community_menu` (`ID`, `title`, `link`, `default`, `order`) VALUES
(1, 'Users List', '/community/users', 1, 1),
(2, 'Users Playlist', '/community/playlists', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `metadata`
--

CREATE TABLE IF NOT EXISTS `metadata` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` longtext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `metadata`
--

INSERT INTO `metadata` (`ID`, `meta_key`, `meta_value`) VALUES
(1, 'top_menu', 'a:3:{s:4:"home";s:8:"linkhome";s:6:"videos";s:10:"linkvideos";s:5:"users";s:9:"linkusers";}');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `data` longtext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`ID`, `name`, `data`) VALUES
(1, 'valid_types', 'a:4:{i:0;s:4:".avi";i:1;s:4:".3gp";i:2;s:4:".flv";i:3;s:5:".mpeg";}\r\n'),
(2, 'pagination', 'a:2:{s:14:"users_per_page";i:16;s:15:"videos_per_page";i:15;}');

-- --------------------------------------------------------

--
-- Table structure for table `topmenu`
--

CREATE TABLE IF NOT EXISTS `topmenu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `link` varchar(500) NOT NULL,
  `local` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `topmenu`
--

INSERT INTO `topmenu` (`ID`, `title`, `link`, `local`, `order`) VALUES
(1, 'Home', '/', 1, 0),
(2, 'Videos', '/videos', 1, 1),
(3, 'Categories', '/categories', 1, 2),
(4, 'Channels', '/channels', 1, 3),
(5, 'Community', '/community', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(400) NOT NULL,
  `email` varchar(150) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `name` varchar(200) NOT NULL,
  `years` int(11) NOT NULL,
  `IM` varchar(500) NOT NULL,
  `interest` longtext NOT NULL,
  `location` varchar(500) NOT NULL,
  `avatar` varchar(125) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `email`, `admin`, `date`, `name`, `years`, `IM`, `interest`, `location`, `avatar`) VALUES
(2, 'rgb', 'e06aeff25416650dcd7b97957d78dc4b', 'rgb@pcportal.ro', 1, '0000-00-00', '', 0, '', '', '', '0'),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', 'vladuemilian@gmail.com', 1, '0000-00-00', 'aaaaaaa', 21, 'vladuemilians@yahoo.com', 'programming', 'Otelu-Rosu', 'myavt.jpg'),
(4, 'sorin', 'f2b8be8959b96dc5b46409250320f1df', 'sorin@pcportal.ro', 0, '0000-00-00', '', 0, '', '', '', '0'),
(6, 'andrei', 'b2d09b73eb5ad0228f9cb2e51485a45f', 'andrei@pcportal.ro', 0, '0000-00-00', '', 0, '', '', '', '0'),
(7, 'puya', 'e06aeff25416650dcd7b97957d78dc4b', 'puya@pcportal.ro', 0, '0000-00-00', '', 0, '', '', '', '0'),
(8, 'test1', '5a105e8b9d40e1329780d62ea2265d8a', 'test1@yahoo.com', 0, '0000-00-00', '', 0, '', '', '', '0'),
(16, 'andra', '14180f38f11db420937b98aa24fad581', 'andra@yahoo.com', 0, '0000-00-00', '', 0, '', '', '', '0'),
(17, 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 'asdf@yahoo.com', 0, '0000-00-00', '', 0, '', '', '', '0'),
(18, 'teste26', 'e06aeff25416650dcd7b97957d78dc4b', 'teste@yahoo.com', 0, '0000-00-00', '', 0, '', '', '', '0'),
(19, 'cosmin', 'e06aeff25416650dcd7b97957d78dc4b', 'cosmin@yahoo.com', 0, '0000-00-00', '', 0, '', '', '', '0'),
(20, 'someone', 'e06aeff25416650dcd7b97957d78dc4b', 'someone@yahoo.com', 0, '0000-00-00', '', 0, '', '', '', '0'),
(21, 'alexa12', 'e06aeff25416650dcd7b97957d78dc4b', 'alexa12@yahoo.com', 0, '0000-00-00', '', 0, '', '', '', '0'),
(22, 'alexandru16', 'e06aeff25416650dcd7b97957d78dc4b', 'alexandru16@yahoo.com', 0, '0000-00-00', '', 0, '', '', '', '0'),
(23, 'twinkie', 'f80412f10a2d5c60e7569df402eb054c', 'alex1nut@gmail.com', 0, '0000-00-00', '', 0, '', '', '', '0'),
(24, 'sorin', 'f2b8be8959b96dc5b46409250320f1df', 'awdaw@adwd.com', 0, '0000-00-00', '', 0, '', '', '', '0'),
(25, 'mmark', 'e06aeff25416650dcd7b97957d78dc4b', 'awda@awd.com', 0, '0000-00-00', '', 0, '', '', '', '0'),
(26, 'sasha', 'e06aeff25416650dcd7b97957d78dc4b', 'awdawd@awd.com', 0, '0000-00-00', '', 0, '', '', '', '0'),
(27, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@dwada.com', 0, '0000-00-00', 'test name demo user', 21, 'sorin@adawd.com', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE IF NOT EXISTS `user_menu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `link` varchar(300) NOT NULL,
  `default` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`ID`, `title`, `link`, `default`, `order`) VALUES
(1, 'User Panel', '/user/panel', 1, 1),
(2, 'Private Messages', '/user/panel/private-messages', 1, 2),
(3, 'Friends', '/user/panel/friends', 1, 3),
(4, 'Playlists', '/user/panel/playlists', 1, 4),
(5, 'Profile', '/user/panel/profile', 1, 5),
(6, 'Upload', '/upload', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `desc` text NOT NULL,
  `from` int(11) NOT NULL COMMENT '(0 - local, 1 - remote)',
  `filename` varchar(300) NOT NULL,
  `author` int(11) NOT NULL,
  `relative_path` varchar(150) NOT NULL,
  `extension` varchar(100) NOT NULL,
  `embed` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`ID`, `cat`, `title`, `slug`, `desc`, `from`, `filename`, `author`, `relative_path`, `extension`, `embed`, `image`, `views`, `featured`) VALUES
(1, 1, 'This is my first video ', 'this-is-my-first-video', '', 0, '', 0, '', '', '', '', 0, 0),
(2, 1, 'A nice Mr.Bean comedy', 'a-nice-mr-bean-comedy', '', 0, '', 0, '', '', '', '', 0, 0),
(3, 1, 'Best comedy - friends movie', 'best-comedy-friends-movie', '', 0, '', 0, '', '', '', '', 0, 0),
(4, 1, 'A funny clip - nice moments', 'a-funny-clip-nice-moments', '', 0, '', 0, '', '', '', '', 0, 0),
(8, 1, 'qawdaqwd rg esrg esrdg', 'qawdaqwd-rg-esrg-esrdg', '', 0, '4e211604ea0f4', 3, '11/07', 'flv', '', '', 0, 0),
(9, 1, 'Full Title Name', 'full-title-name', '', 0, '4e2617e64a08e', 3, '11/07', 'flv', '', '', 0, 0),
(10, 1, 'testaaaa', 'testaaaa', '', 0, ' ', 3, '11/07', 'flv', '', '', 0, 0),
(12, 1, 'testqwdqawdqaw', 'testqwdqawdqaw', '', 0, ' ', 3, '11/07', 'flv', '', '', 0, 0),
(13, 1, 'testqwdqawdqaw', 'testqwdqawdqaw', '', 0, '4e2f0e1b0d02f', 3, '11/07', 'flv', '', '', 0, 0),
(14, 1, 'Shakira Loca ', 'shakira-loca', '', 0, '4e2f118c1a779', 3, '11/07', 'flv', '', '', 0, 0),
(15, 1, 'Full Title Name', 'full-title-name', '', 0, '4ea1844f85c07', 27, '11/10', 'flv', '', '', 0, 0),
(16, 1, 'Tom Boxer &amp; Morena feat J Warner - Deep In Love (Official Video)', 'tom-boxer-amp-morena-feat-j-warner-deep-in-love-official-video-', 'International Booking: booking@roton.ro\r\nhttp://www.facebook.com/pages/Tom-Boxer-Official/136582899732892', 1, '', 3, '', '', 'CIJ6vb3b4T0', '', 0, 0),
(17, 1, 'Alex Mica - Dalinda (by Dony, The kid, Alex Mica)', 'alex-mica-dalinda-by-dony-the-kid-alex-mica-', 'Concerte/Booking: booking@1artistmusic.com\n+40-72-3001311 (Manager)\nLicensing: office@1artistmusic.com\nLabel: 1ArtistMusic (all rights reserved)\nComposed by: Alex Mica\nProduced by: Dony &amp; The Kid', 1, '', 3, '', '', '1MVjV02xQCw', '', 0, 0),
(18, 1, 'Jessie J - Nobody''s Perfect', 'jessie-j-nobody-s-perfect', 'The Platinum edition of ''Who You Are'' is out now on iTunes: http://bit.ly/JJpni and HMV http://bit.ly/JJpnmhv', 1, '', 3, '', '', 'aSZVYZTze74', '', 0, 0),
(21, 1, 'Dan Balan- Timpul Trece Fara Noi', 'dan-balan-timpul-trece-fara-noi', 'Pics from Dan Balan, Radu and Arsenie.\r\nThe song is from DanÂ´s old album with his friend Petru.', 1, '', 0, '', '', 'qHMmEb6toGk', '', 0, 0),
(24, 1, 'Puya om bogat, om sarac necenzurat', 'puya-om-bogat-om-sarac-necenzurat', 'Puya...Necezurat music', 1, '', 3, '', '', 'UfGGF5VWfk0', '', 0, 0),
(25, 1, 'Sisu &amp; Puya - Asta e pentru', 'sisu-amp-puya-asta-e-pentru', 'Sisu &amp; Puya - Asta e pentru', 1, '', 3, '', '', 'BE_DQOQAr00', '', 0, 0),
(26, 1, 'DJ Project &amp; Giulia - Prima Noapte (Official Music Video) HD', 'dj-project-amp-giulia-prima-noapte-official-music-video-hd', 'DJ Project &amp; Giulia - Prima Noapte (C) Catmusic 2008. Original upload of the video. I own this video and i have permission to upload it. No copyright infringement intended. All copyright go to The Orchard, CatMusic, Media Services and DJ Project.\nYou can download the song here: http://www.musicmall.ro/artisti/dj_project/albume/fara_album/prima_noapte_%5Bfeat_giulia%5D.html\nOriginal and Official Upload of the video by DJProjectOfficial - Official Channel of DJ Project.', 1, '', 0, '', '', 'imrzzweuB5E', 'imrzzweuB5E.jpg', 0, 0),
(27, 1, 'Kamelia - Come again (Official video)', 'kamelia-come-again-official-video-', 'FACEBOOK : http://www.facebook.com/KameliaOfficial\n\nDirected / Produced / Edited by George Hora\nScript by Kamelia &amp; George Hora\nFilmed by Valentin Solomie (http://hdv.ro)\nMake-up &amp; Hairstyle by Sergiu Bechian\nStyling : Kamelia\n\nLicensing : office@robooking.com\nBooking : info@clubmanagement.ro\n(+4) 0723 632 639\n\nCopyright @ STUDIO66 ROMANIA 2011', 1, '', 0, '', '', '7YT5F20NnsI', '7YT5F20NnsI.jpg', 0, 0),
(28, 1, 'Akcent - Spanish Lover (Official Video)', 'akcent-spanish-lover-official-video-', 'Akcent - Spanish Lover (Official Video)', 1, '', 0, '', '', 'svm4rprABcc', 'svm4rprABcc.jpg', 0, 0),
(29, 1, 'Akcent feat Ruxandra Bar - Feelings On Fire ( full version )', 'akcent-feat-ruxandra-bar-feelings-on-fire-full-version-', 'www.akcentonline.com\r\nwww.facebook.com/akcentmusic\r\nwww.twitter.com/akcentofficial', 1, '', 0, '', '', 'faw4KpVQWcQ', 'faw4KpVQWcQ.jpg', 0, 0),
(30, 1, 'RUBY - Touch Me (DJ Andi Remix)', 'ruby-touch-me-dj-andi-remix-', 'Find RUBY on:\nhttp://www.facebook.com/RUBY\nhttp://twitter.com/RUBYisHot\n\nFOR BOOKING:\n+4 0721 490 080\nruby.romania@yahoo.com', 1, '', 0, '', '', 'Z0_IkiVh9pc', 'Z0_IkiVh9pc.jpg', 0, 0),
(31, 1, 'Delia - Dale (Official Video)', 'delia-dale-official-video-', 'iTunes download link http://itunes.apple.com/ro/album/dale-single/id471138574?uo=4\r\nhttp://www.catmusic.ro', 1, '', 0, '', '', 'mC2ZmMEBrw8', 'mC2ZmMEBrw8.jpg', 0, 0),
(32, 1, 'Andra - Telephone (Official Video)', 'andra-telephone-official-video-', 'Andra - Telephone (Official VIDEO 2011) [Full HD]  , visit the official site http://www.andramusic.ro http://www.facebook.com/AndraMusic\r\nSubscribe for more! \r\nAndra - Telephone official video Andra - Telephone Andra - Telephone videoclip oficial\r\n\r\nLYRICS\r\n\r\nOn the telephone phone phone\r\nShe said goodbye bye bye bye bye\r\nOn the telephone phone phone\r\nShe said goodbye bye bye bye bye\r\nOn the telephone phone phone\r\nShe said goodbye bye bye bye bye\r\nOn the telephone phone phone\r\nShe said goodbye bye bye bye bye\r\n\r\nI will be going I will be going my baby\r\nI will be going there is no reason to stay\r\nThat''s the only thing she said when she left him\r\nOooo yeah\r\nNow he is sorry but he is sorry don''t matter\r\nNow he is sorry but it''s really so late\r\nThat''s the only thing she said when she left him\r\nOooo\r\nOn the telephone phone phone\r\nOooo\r\nPhone phone ooo\r\n\r\nOn the telephone phone phone\r\nShe said goodbye bye bye bye bye\r\nOn the telephone phone phone\r\nShe said goodbye bye bye bye bye\r\n\r\nI will be going I will be going my baby\r\nI will be going there is no reason to stay\r\nThat''s the only thing she said when she left him\r\nOooo yeah\r\nNow he is sorry but he is sorry don''t matter\r\nNow he is sorry but it''s really so late\r\nThat''s the only thing she said when she left him\r\nOooo\r\n\r\nOn the telephone phone phone\r\nShe said goodbye bye bye bye bye\r\nOn the telephone phone phone\r\nShe said goodbye bye bye bye bye\r\n\r\nOn the telephone phone phone\r\nShe said goodbye bye bye bye bye\r\nOn the telephone phone phone\r\nShe said goodbye bye bye bye bye\r\n\r\nAndra Telephone new video hd Andra telephone videoclip original Andra telephone videoclip 2011', 1, '', 0, '', '', 'fzDZKUzCfDI', 'fzDZKUzCfDI.jpg', 0, 0),
(33, 1, 'Lucky Man Project - Pumpin'' (Official Video)', 'lucky-man-project-pumpin-official-video-', 'Record Label: http://www.facebook.com/RotonMusic\r\nFollow us on: http://www.facebook.com/LuckyManProject\r\nWebsite: http://www.luckymanproject.com/', 1, '', 0, '', '', 'mpG0ax0uAdo', 'mpG0ax0uAdo.jpg', 0, 1),
(34, 1, 'Inna feat. Juan Magan - Un Momento (Official Video)', 'inna-feat-juan-magan-un-momento-official-video-', '', 1, '', 0, '', '', 'fdfw_EuVxNg', 'fdfw_EuVxNg.jpg', 0, 0),
(35, 1, 'Adrian Eftimie - Lonely (Official Video)', 'adrian-eftimie-lonely-official-video-', 'http://www.facebook.com/djadrianeftimie\nhttp://www.catmusic.ro', 1, '', 0, '', '', 'fb7oN9YMxzk', 'fb7oN9YMxzk.jpg', 0, 1),
(36, 1, 'Michel TelÃ³ - Ai Se Eu Te Pego ENGLISH SUBTITTLES/ LYRICS', 'michel-tel-ai-se-eu-te-pego-english-subtittles-lyrics', 'FOR YOU WHO WANNA LEARN THE LYRICS OR WANNA KNOW WHAT SONGS MEAN SO HERE IS THE LYRICS FOR YOU IN ENGLISH\n\nMichel TelÃ³ - Ai Se Eu Te Pego ENGLISH SUBTITTLES/ LYRICS\n\nAh when I get my hands on you...\n\n\nWow, wow\nYou''re gonna kill me that way\nAh when I get my hands on you, (poor you)\nAh when I get my hands on you, (poor you)\n\nDelicious, delicious\nYou''re gonna kill me that way\nAh when I get my hands on you, (poor you)\nAh when I get my hands on you, (poor you)\n\nSaturday party night\nEveryone began to dance\nThe hottest girl of the place passed me by\nSo I got the guts up and began to say to her\n\nWow, wow\nYou''re gonna kill me that way\nAh when I get my hands on you, (poor you)\nAh when I get my hands on you, (poor you)\n\nDelicious, delicious\nYou''re gonna kill me that way\nAh when I get my hands on you, (poor you)\nAh when I get my hands on you, (poor you)', 1, '', 0, '', '', 'PvfvCU7tNKE', 'PvfvCU7tNKE.jpg', 0, 0),
(37, 1, 'Sweet November - Lost Without You', 'sweet-november-lost-without-you', 'My second Sweet November video, hope you like it!', 1, '', 0, '', '', 'st3qM7J3dAg', 'st3qM7J3dAg.jpg', 0, 0),
(38, 1, 'GIULIA - VORBE GOALE (RADIO EDIT)', 'giulia-vorbe-goale-radio-edit-', 'Noul single Giulia "Vorbe Goale" produs de Gala Records.\r\nhttp://www.galarecords.ro\r\nhttp://www.facebook.com/GalaRecords\r\nhttp://www.twitter.com/GalaRecords\r\n\r\nFollow Giulia:\r\nhttp://www.facebook.com/GiuliaAnghelescu\r\nhttp://www.twitter.com/mygiulia', 1, '', 0, '', '', '4-gTkwo9L1I', '4-gTkwo9L1I.jpg', 0, 1),
(39, 1, 'Andreea Banica - Electrified', 'andreea-banica-electrified', 'Andreea Banica - Electrified\r\n(P)&amp;(C) Cat Music Romania\r\n\r\nBuy "Electrified" from iTunes: http://itunes.apple.com/ro/album/electrified-single/id471502111?uo=4', 1, '', 0, '', '', 'fBFjf1LIRos', 'fBFjf1LIRos.jpg', 0, 0),
(40, 1, 'Aerosmith - I Don''t Wanna Miss A Thing (Armageddon)', 'aerosmith-i-don-t-wanna-miss-a-thing-armageddon-', 'This is the soundtrack song for the film Armageddon by Aerosmith - I Don''t Wanna Miss A Thing\r\n\r\nLyrics:\r\nI could stay awake just to hear you breathing\r\nWatch you smile while you are sleeping\r\nWhile you''re far away dreaming\r\nI could spend my life in this sweet surrender\r\nI could stay lost in this moment forever\r\nEvery moment spent with you is a moment I treasure\r\n\r\nDon''t want to close my eyes\r\nI dont want to fall asleep\r\nCause I''d miss you baby\r\nAnd I dont want to miss a thing\r\nCause even when I dream of you\r\nThe sweetest dream will never do\r\nI''d still miss you baby\r\nAnd I dont want to miss a thing\r\n\r\nLying close to you feeling your heart beating\r\nAnd I''m wondering what youre dreaming\r\nWondering if its me youre seeing\r\nThen I kiss your eyes\r\nAnd thank God were together\r\nI just want to stay with you in this moment forever\r\nForever and ever\r\n\r\nDon''t want to close my eyes\r\nI dont want to fall asleep\r\nCause I''d miss you baby\r\nAnd I dont want to miss a thing\r\nCause even when I dream of you\r\nThe sweetest dream will never do\r\nI''d still miss you baby\r\nAnd I dont want to miss a thing\r\n\r\nI dont want to miss one smile\r\nI dont want to miss one kiss\r\nI just want to be with you\r\nRight here with you, just like this\r\nI just want to hold you close\r\nFeel your heart so close to mine\r\nAnd just stay here in this moment\r\nFor all the rest of time\r\n\r\nDon''t want to close my eyes\r\nI dont want to fall asleep\r\nCause I''d miss you baby\r\nAnd I dont want to miss a thing\r\nCause even when I dream of you\r\nThe sweetest dream will never do\r\nI''d still miss you baby\r\nAnd I dont want to miss a thing\r\n\r\nDon''t want to close my eyes\r\nI dont want to fall asleep\r\nI dont want to miss a thing', 1, '', 0, '', '', 'rKAn1HvmRXM', 'rKAn1HvmRXM.jpg', 0, 0),
(41, 1, 'Dirty Dancing - Time of my Life (Final Dance) - High Quality', 'dirty-dancing-time-of-my-life-final-dance-high-quality', 'Johnny pulls Baby up on stage at the end of season revue at Kellermans. Features the classic "Time of my life".', 1, '', 0, '', '', 'WpmILPAcRQo', 'WpmILPAcRQo.jpg', 0, 0),
(42, 1, 'Nayer Ft. Pitbull &amp; Mohombi - Suavemente (Official Video HD) [Kiss Me / Suav', 'nayer-ft-pitbull-amp-mohombi-suavemente-official-video-hd-kiss-me-suave-', 'Add Me On Facebook: http://www.facebook.com/MusicRNB\nhttp://www.facebook.com/MusicRNB\nhttp://www.facebook.com/MusicRNB\n\nTwitter: http://twitter.com/#!/rnbx17\n\n\nNayer feat. Mohombi &amp; Pitbull - Suave \nNayer ft. Mohombi &amp; Pitbull - Suave \nNayer - Suave feat. Mohombi &amp; Pitbull \nNayer - Suave ft. Mohombi &amp; Pitbull\nNayer - Suave\nNayer - Kiss Me\nNayer - Suavemente\nPitbull - Suave\n_____________________________\nAdd Me On Facebook Please (;\nhttp://www.facebook.com/MusicRNB', 1, '', 0, '', '', 'd19eBjpP2Aw', 'd19eBjpP2Aw.jpg', 0, 0),
(43, 1, 'DJ Project - Departe de noi (Original Version)', 'dj-project-departe-de-noi-original-version-', 'DJ Project - Departe de noi', 1, '', 0, '', '', 'EobqGTZjou0', 'EobqGTZjou0.jpg', 0, 0),
(44, 1, 'Laurentiu Duta - Shining Heart ft. Andreea Banica', 'laurentiu-duta-shining-heart-ft-andreea-banica', '', 1, '', 0, '', '', 'tOyTweB_3ac', 'tOyTweB_3ac.jpg', 0, 0),
(45, 1, 'Meena K - Everybody on the floor (Radio Edit)', 'meena-k-everybody-on-the-floor-radio-edit-', '', 1, '', 0, '', '', 'A5ZB1DLYBio', 'A5ZB1DLYBio.jpg', 0, 0),
(46, 1, 'Lora - Un Vis [Radio Edit]', 'lora-un-vis-radio-edit-', '', 1, '', 0, '', '', '-EDo3Cnwb8E', '-EDo3Cnwb8E.jpg', 0, 0),
(47, 1, 'DJ Project - Esti tot ce am', 'dj-project-esti-tot-ce-am', '', 1, '', 0, '', '', 'veWIM0Clscw', 'veWIM0Clscw.jpg', 0, 0),
(48, 1, 'Giulia - Mai ramai si nu pleca', 'giulia-mai-ramai-si-nu-pleca', 'Eftimescu Giulia-Ioana interpreteaza melodia Mai ramai si nu pleca,muzica Marcel Dragomir,inregistrare&amp;master:Alin Radu', 1, '', 0, '', '', 'x3ez2nsfsY4', 'x3ez2nsfsY4.jpg', 0, 0),
(49, 1, 'Giulia-Te aud,nu te vad', 'giulia-te-aud-nu-te-vad', 'Giulia-Te aud,nu te vad;', 1, '', 0, '', '', 'JFWMrZAJnIc', 'JFWMrZAJnIc.jpg', 0, 0),
(50, 1, 'Giulia-Fara tine', 'giulia-fara-tine', 'Giulia-Fara tine muzica:Cornel Fugaru,text:Mirela Fugaru', 1, '', 0, '', '', 'SoHXdv38Rig', 'SoHXdv38Rig.jpg', 0, 0),
(51, 1, 'Giulia-Da`mi din nou curajul de`a trai', 'giulia-da-mi-din-nou-curajul-de-a-trai', 'Eftimescu Giulia-Ioana interpreteaza piesa ,,Da`mi din nou curajul de`a trai" muzica: Cornel Fugaru,text:Mirela Fugaru,inregistrare la studio la Alin Radu', 1, '', 0, '', '', 'G-5Aohy-lVc', 'G-5Aohy-lVc.jpg', 0, 0),
(52, 1, 'DJ Project Privirea Ta', 'dj-project-privirea-ta', 'Romanian Music', 1, '', 0, '', '', 'RtKO_Z_DW6Q', 'RtKO_Z_DW6Q.jpg', 0, 0),
(53, 1, 'I''M BACK - Ray William Johnson Video', 'i-m-back-ray-william-johnson-video', 'THANX FOR SUBSCRIBING TO MY VIDEOS!! :D\r\n\r\nMY TWITTER: https://twitter.com/RayWJ \r\n\r\nMY FACEBOOK: http://www.facebook.com/raywilliamjohnson\r\n\r\nMY GOOGLE+  http://Gplus.to/RayWJ\r\n\r\nSTORE: http://www.raywj.com/shop/\r\n\r\nWEBSITE: http://raywj.com\r\n\r\n=3 Tshirt Girl: http://twitter.com/TheKylaLeon\r\n\r\nEQUALS 3 IN SPANISH: http://www.youtube.com/IgualATres\r\n\r\n**********************************************************************\r\n   Here are the links to the full reviews of the content discussed in this video. Please don''t harass the video creators or send them hate-messages. If you like what you see on each of their channels, feel free to subscribe to them. \r\n:) Thanx:\r\n\r\n\r\nSheep Cyclone: http://www.youtube.com/watch?v=aSuaDmi7cmU&amp;feature=player_embedded\r\n\r\nGuitar Swing: http://www.youtube.com/watch?v=cirDaWcGwIE&amp;feature=player_embedded\r\n\r\nCat vs. Dog: http://www.youtube.com/watch?v=6gyswOlHUoY&amp;feature=player_embedded\r\n\r\nCQOTD: http://www.youtube.com/watch?v=qi36jStGZdA\r\n\r\n---\r\n"RAY WILLIAM JOHNSON" "Ray William Johnson" RAYWILLIAMJOHNSON video videos VIDEO VIDEOS raywilliamjohnson "ray william johnson" rwj equals three equalsthree =3 "equals three" "equals 3" raywiliamjohnson "ray wiliam johnson" "ray williams johnson" "sheep cyclone" "guitar swing" "cat vs dog"', 1, '', 0, '', '', 'lZSGnXoELzg', 'lZSGnXoELzg.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos_comments`
--

CREATE TABLE IF NOT EXISTS `videos_comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `videos_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `videos_tags`
--

CREATE TABLE IF NOT EXISTS `videos_tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_value` varchar(255) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `videos_tags`
--


-- --------------------------------------------------------

--
-- Table structure for table `videos_tags_relation`
--

CREATE TABLE IF NOT EXISTS `videos_tags_relation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `tag_id` (`tag_id`),
  KEY `video_id` (`video_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `videos_tags_relation`
--

