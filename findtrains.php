<php?



    $ stat_a;

    $ stat_b;

    $q="select * from stat_a_trains";
    result=mysqli($con,$q);

    $ans;
    for each $t of result,
        $q= "select station_id from $t_stations where station_id==$b"
        $res=mysqli($con, $q);
        if(sizeof($res)!=0)
            ans.add(train,arrival-time, departure time, arrival time at b, departure at b)
            continue;

        else

            $q="select  from $t_stations "
            $res=mysqli($con, $q)
            sort($res)
            for each station $s in $res
                
                $q=select * from $s_trains
                $res=mysqli($con, $q);
                







?>