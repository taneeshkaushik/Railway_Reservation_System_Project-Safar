CREATE TABLE admin
(username    VARCHAR(25) NOT NULL, 
 password    VARCHAR(25) NOT NULL, 
 name        TEXT(25) NOT NULL, 
 designation VARCHAR(25) NOT NULL, 
 email       VARCHAR(25) NOT NULL, 
 mobile      VARCHAR(10) NOT NULL,
 PRIMARY KEY(username)
);

this table is dynamically created for each admin. 

CREATE TABLE admin_name_trains_added
(train_id         INT NOT NULL, 
 date_added DATE NOT NULL, 
 num_sl     INT, 
 num_ac     INT,
 primary KEY(train_id,date_added)
);

table for trains. 

create table trains
(
     train_id int  not null AUTO_INCREMENT,
     primary key(train_id)
);

this table is for booker
create table booker
(
 username    VARCHAR(25) NOT NULL, 
 password    VARCHAR(25) NOT NULL, 
 name        varchar(25) NOT NULL, 
 address VARCHAR(50) NOT NULL, 
 email       VARCHAR(25) NOT NULL, 
 mobile      VARCHAR(15) NOT NULL,
 PRIMARY KEY(username)
)

 following tables are created dynamically for each booker

create table (booker_name)_ticket_table
(
    pnr int, 
    train_id int,
    ticket_date date,
    primary key(pnr)
)

create table (booker_name)_passengers
(
    id INT AUTO_INCREMENT,
    name text,
    age int,
    sex TINYINT,
    PRIMARY key(id)
);

create table (booker_name_)tic_pas
(
    pnr int not null,
    passenger_id int not null,
    primary key(pnr, passenger_id),
    foreign key(pnr) REFERENCES (booker_name)_ticket_table(pnr), 
    foreign key (passenger_id) REFERENCES (booker_name)_passengers(id)

);


create table trains_running
(
    train_id int not null,
    journey_date date not null,
    num_sl int,
    num_ac int, 
    primary key(train_id, journey_date),
    FOREIGN key(train_id) references trains(train_id)
)
