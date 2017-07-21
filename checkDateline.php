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
    if($redis->lsize('list-order') > 0){
        $listStr = $redis->rpop('list-order');
        $list = unserialize($listStr);
//          var_dump($list);
            if(time() - $list['dateline'] < 60*100){
                $redis->lpush('list-order',$listStr);
            }else{
                $sql = 'select * from orderb where order_id = '.$list['orderId'];
                $res = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
//                var_dump($res);die;
                if($res['status'] == 0){
                    $changeSql = 'update orderb set status = 7 where order_id = '.$list['orderId'];
//                    var_dump($changeSql);
                    $res = $pdo->exec($changeSql);
//                    var_dump($list['seats']);
                    foreach ($list['seats'] as $v ){
                        $redis->srem('seats_'.$list['roundId'],$v);
//                        var_dump('seats_'.$list['roundId']);
                    }
                }
            }
//
    }else{
        sleep(2);
    }
}
