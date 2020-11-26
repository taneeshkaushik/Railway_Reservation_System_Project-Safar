
<php?

    $train_num
    $stat_id
    $stat_name

<<<<<<< HEAD
    
    $q="insert into `trains`(`id`) values(`$train_num`);";
=======
    $q="insert into `trains`(`id`) values('$train_num');";
>>>>>>> ebd6e620b6b15a94b55c11f33be990119aed6042

    $q2 ="create table train_num_stations(
        count int auto_increment not null, 
        station_id int  not null, 
        arrival_time time not null, 
        departure_time time , 
        primary key(count),
        foreign key(station_id) references stations(id)
    )"    

    $res= mysqli($con,$q);



    $q= "select `station_id` from `stations` where station_id = `$stat_id`;";
    $res2= mysqli(con,$q);
    if(sizeof($res2) is zero)
        //yaar ye red matlab galat pata ni kyo aa raha hain ise dekhle

        insert into stations station_id, station_name

        $q3= "CREATE TABLE station_name_trains
        (
            train_id int not null, 
            arrival_time time not null, 
            departure_time time
            primary key(train_id, arrival_time), 
            foreign key(train_id) references trains(id)
        );";
        mysqli(con,$q3);
    

    $q4="insert into stat_num_trains(train_id, arrival_time, dept_time)";
    $res3= mysqli($con,$q);


    $a, $b
    





    







?>