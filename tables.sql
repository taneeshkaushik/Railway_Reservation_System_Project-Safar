CREATE TABLE admin
(username    VARCHAR(255) NOT NULL, 
 password    VARCHAR(255) NOT NULL, 
 name        TEXT(255) NOT NULL, 
 designation VARCHAR(255) NOT NULL, 
 email       VARCHAR(255) NOT NULL, 
 mobile      VARCHAR(15) NOT NULL,
 PRIMARY KEY(username)
);

this table is dynamically created for each admin. 

CREATE TABLE admin_name_trains_added
(train_id         INT NOT NULL, 
 date_added DATE NOT NULL, 
 num_sl     INT, 
 num_ac     INT,
 primary KEY(train_id,date_added)
 foreign key(train_id) references trains(train_id)
);

create table admin_trains
(
    train_id INT NOT NULL, 
    primary key (train_id)
    foreign key(train_id) references trains(train_id)

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
 username    VARCHAR(255) NOT NULL, 
 password    VARCHAR(255) NOT NULL, 
 name        varchar(255) NOT NULL, 
 address VARCHAR(50) NOT NULL, 
 email       VARCHAR(255) NOT NULL, 
 mobile      VARCHAR(15) NOT NULL,
 PRIMARY KEY(username)
)

 following tables are created dynamically for each booker

create table (booker_name)_ticket_table
(
    pnr int , 
    train_id int,
    ticket_date date,
    coach_num int, 
    seat_num,int
    primary key(pnr),
    foreign key(train_id) references trains(train_id)
);

create table (booker_name)_passengers
(
    aadhar INT NOT NULL,
    name text,
    age int,
    sex TINYINT,
    PRIMARY key(id)
);

create table (booker_name_)_tic_pas
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
);

for each train running

create table 'train_id_date'_booked
(
    coach_num varchar(6) not null, 
    seat_num int not null,
    booker_username varchar(255) not null, 
    FOREIGN key(booker_username) references booker(username)

)

create table `sensitive_info` (

    last_pnr_used int(255) not null;
    become_admin varchar(255) not null;
    high_security_key(255) not null;
);



tables for phase -2

create table trains
(
    id int Not null , 
    primary key (id)
)

create table train_name_stations
(
    
    station_id int  not null, 
    arrival_time time not null, 
    departure_time time , 
    primary key(count),
    foreign key(station_id) references stations(id)

)

create table stations
(
    id int not null, 
    name varchar(255) ,
    primary key(id)

)

create table station_id_trains
(
    train_id int not null, 
    arrival_time time not null, 
    departure_time time
    primary key(train_id, arrival_time), 
    foreign key(train_id) references trains(id)

)