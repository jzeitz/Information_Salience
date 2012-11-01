DROP DATABASE salience;
CREATE DATABASE IF NOT EXISTS salience;
GRANT ALL PRIVILEGES ON salience.* to 'user'@'localhost' identified by 'salience';
--
-- Table structure for table `abduction_reports`
--
USE salience;

CREATE TABLE IF NOT EXISTS `docs` (`docid` smallint(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, `title` varchar(100) NOT NULL, `authorlast` varchar(50) NOT NULL, `authorfirst` varchar(50) NOT NULL, `numreadby` smallint(6) NOT NULL) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO docs (title, authorlast, authorfirst, numreadby) VALUES ('Culture Does Matter', 'Romney', 'Mitt', 12);

INSERT INTO docs (title, authorlast, authorfirst, numreadby) VALUES ('Forged Transcripts and Fake Essays', 'Bergman', 'Justin', 12);

CREATE TABLE IF NOT EXISTS `sentences` (`sentid` smallint(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, `sent` varchar(500) NOT NULL, userscore smallint(6) NOT NULL, progscore dec(8,2) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO sentences (sent, userscore, progscore) VALUES ('During my recent trip to Israel, I had suggested that the choices a society makes about its culture play a role in creating prosperity, and that the significant disparity between Israeli and Palestinian living standards was powerfully influenced by it.', '5', '1000.24');

INSERT INTO sentences (sent, userscore, progscore) VALUES ('In some quarters, that comment became the subject of controversy.', '0', '0');

INSERT INTO sentences (sent, userscore, progscore) VALUES ('But what exactly accounts for prosperity if not culture?', '0', '0');

INSERT INTO sentences (sent, userscore, progscore) VALUES ('In the case of the United States, it is a particular kind of culture that has made us the greatest economic power in the history of the earth.', '0', '0');

INSERT INTO sentences (sent, userscore, progscore) VALUES ('Many significant features come to mind: our work ethic, our appreciation for education, our willingness to take risks, our commitment to honor and oath, our family orientation, our devotion to a purpose greater than ourselves, our patriotism.', '0', '0');

INSERT INTO sentences (sent, userscore, progscore) VALUES ('But one feature of our culture that propels the American economy stands out above all others: freedom.', '0', '0');

INSERT INTO sentences (sent, userscore, progscore) VALUES ('The American economy is fueled by freedom.', '0', '0');

INSERT INTO sentences (sent, userscore, progscore) VALUES ('Free people and their free enterprises are what drive our economic vitality.', '0', '0');

INSERT INTO sentences (sent, userscore, progscore) VALUES ('This fall, David Zhu will join an exodus of Chinese students boarding planes for the leafy, beer-soaked campuses of American colleges and universities.', '0', '0');

INSERT INTO sentences (sent, userscore, progscore) VALUES ('Zhu, currently a student at Shanghai’s prestigious Fudan University, will be enrolling at Oregon State University to pursue a bachelor’s degree in business — a dream his parents have had since they started saving a $157,000 nest egg for his education.', '0', '0');

INSERT INTO sentences (sent, userscore, progscore) VALUES ('But like many Chinese students who don’t speak English fluently, Zhu might not have been accepted without a little help.', '0', '0');

INSERT INTO sentences (sent, userscore, progscore) VALUES ('The 21-year-old hired an education agent in China to clean up and “elaborate” on the essay he submitted as part of his application.', '0', '0');

INSERT INTO sentences (sent, userscore, progscore) VALUES ('“Actually, the agency helped my application to some extent,” he says.', '0', '0');

CREATE TABLE IF NOT EXISTS `docpara` (`docid` smallint(6) NOT NULL, `paraid` smallint(6) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1 ;

INSERT INTO docpara (docid, paraid) VALUES (1, 1)

INSERT INTO docpara (docid, paraid) VALUES (1, 2)

INSERT INTO docpara (docid, paraid) VALUES (2, 3)

CREATE TABLE IF NOT EXISTS `parasent` (`paraid` smallint(6) NOT NULL, `sentid` smallint(6) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1 ;

INSERT INTO parasent (paraid, sentid) VALUES (1, 1);

INSERT INTO parasent (paraid, sentid) VALUES (1, 2);

INSERT INTO parasent (paraid, sentid) VALUES (2, 3);

INSERT INTO parasent (paraid, sentid) VALUES (2, 4);

INSERT INTO parasent (paraid, sentid) VALUES (2, 5);

INSERT INTO parasent (paraid, sentid) VALUES (2, 6);

INSERT INTO parasent (paraid, sentid) VALUES (3, 7);

INSERT INTO parasent (paraid, sentid) VALUES (3, 8);

INSERT INTO parasent (paraid, sentid) VALUES (3, 9);

INSERT INTO parasent (paraid, sentid) VALUES (3, 10);

INSERT INTO parasent (paraid, sentid) VALUES (3, 11);

INSERT INTO parasent (paraid, sentid) VALUES (3, 12);

INSERT INTO parasent (paraid, sentid) VALUES (3, 13);