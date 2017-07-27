<?php
    $dsn="mysql:dbname=project;host=localhost";
    $db_user='root';
    $db_pass='111111';
    try{
        $pdo=new PDO($dsn,$db_user,$db_pass);
    }catch(PDOException $e){
        echo '数据库连接失败'.$e->getMessage();
    }
    $movieListSql = 'select movie_id from movie';
    $movieList = $pdo->query($movieListSql)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($movieList as $k=>$v){
        $scoreSql = 'select avg(star_level) from comment where movie_id = '.$v['movie_id'];
        $score = $pdo->query($scoreSql)->fetch(PDO::FETCH_ASSOC);
    //    var_dump($score);die;
        if($score['avg(star_level)'] == null){
            $score['avg(star_level)'] = 0;
        }
        $movieList[$k]['score'] = $score['avg(star_level)'];
    }
    $i = 0;
    foreach ($movieList as $k=>$v){
        $updateSql = 'update movie set score = '.$v['score'] . ' where movie_id = '.$v['movie_id'];
        if($pdo->exec($updateSql)){
            $i++;
        }
    }
    echo '更新'.$i.'条';