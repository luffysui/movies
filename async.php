<?php
$redis = new Redis();
$redis->connect('localhost',6379);
$dsn="mysql:dbname=project;host=localhost";
$db_user='root';
$db_pass='111111';
try{
    $pdo=new PDO($dsn,$db_user,$db_pass);
}catch(PDOException $e){
    echo '数据库连接失败'.$e->getMessage();
}

while (1) {
    if($redis->lsize('list-seats') > 0){
        $listStr = $redis->rpop('list-seats');
        $list = unserialize($listStr);
        $round = 'seats_'.$list['round'];
        // var_dump($list);
        $flag = true;
        foreach ($list['seats'] as $value) {
            if($redis->sismember($round,$value)){
                $flag = false;
                $redis->set('result-'.$list['order'],2);
                break;
            }
        }
        if($flag){
            $i = 0;
            foreach ($list['seats'] as $value) {
                $redis->sadd($round,$value);
                $i++;
            }
            $redis->set('result-'.$list['order'],3);
            $seatsArr = $list['seats'];
            $seats = implode(',',$seatsArr);
            $userId = $list['userId'];
            $roundId = $list['round'];
            $ticketNum = $list['ticketNum'];
            $totalMoney = $list['totalMoney'];
            $cinemaId = $list['cinemaId'];
            $roomId = $list['roomId'];
            $movieId = $list['movieId'];
            $orderCode = $list['order'];//订单号
            $roundId = $list['round'];
            $code = $orderCode.rand(10000,99999);//验证券码
            $dateline = time();
            $roundSql = 'select * from round where round_id = '.$roundId;
            $res = $pdo->query($roundSql)->fetch(PDO::FETCH_ASSOC);
            $insertSql = "insert into orderb(user_id,ticket_num,cinema_id,code,total_money,seats,movie_id,room_id,dateline,round_id,status,order_code) values($userId,$ticketNum,$cinemaId,$code,$totalMoney,'".$seats."',$movieId,$roomId,$dateline,$roundId,0,$orderCode)";

            $doInsert = $pdo->exec($insertSql);//订单插入数据库
            $orderId = $pdo->lastInsertId();

            //订单号和订票时间插入redis 计算失效时间
            //队列为list-order
            $listOrder = array(
                'orderId'=>$orderId,
                'dateline'=> $dateline,
                'seats'=>$seatsArr,
                'roundId'=>$roundId
            );
            var_dump($listOrder);
            $listOrderStr = serialize($listOrder);
            $redis->lpush('list-order',$listOrderStr);
        }
    }else{
        sleep(2);
    }
}
