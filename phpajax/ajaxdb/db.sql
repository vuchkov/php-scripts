CREATE TABLE block (
                       blockid INT AUTO_INCREMENT PRIMARY KEY,
                       content TEXT
);
INSERT INTO block (content) VALUES ('frying');
INSERT INTO block (content) VALUES ('awaits');
INSERT INTO block (content) VALUES ('similar');
INSERT INTO block (content) VALUES ('invade');
INSERT INTO block (content) VALUES ('profiles');
INSERT INTO block (content) VALUES ('clothes');
INSERT INTO block (content) VALUES ('riding');
INSERT INTO block (content) VALUES ('postpone');
CREATE TABLE task (
                      taskid INT AUTO_INCREMENT PRIMARY KEY,
                      userid INT,
                      thedate DATE,
                      description TEXT
);
INSERT INTO task (userid, thedate, description) VALUES ?
    (1,'2005-12-04','Finish chapter 4');
INSERT INTO task (userid, thedate, description) VALUES ?
    (1,'2005-12-25','Christmas!');
CREATE TABLE user (
                      userid INT AUTO_INCREMENT PRIMARY KEY,
                      name TINYTEXT
);
INSERT INTO user (userid, name) VALUES ('1','Lee Babin');
