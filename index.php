<?
$kv = new SaeKV(); //新建类也不用解释吧
if(isset($_GET['l']))
{
    $kv -> init(); //初始化KV数据库类
    $x = $kv -> get('a') + 1; //所有链接数目
    $kv -> set('s_'.$x, $_GET['l']); //对应KEY查询
    $kv -> set('a', $x); //所有链接数目增加
    echo 'URL:http://'.$_SERVER[HTTP_HOST].'/?s='.$x; //输出短网址
}
if(isset($_GET['s']))
{
    $kv -> init(); //初始化KV数据库类,放在里面可以减少请求次数!据说init();也算是一种消费
    header('Location:'.$kv -> get('s_'.$_GET['s'])); //跳转
}
?>
<form> <input type = 'text' name = "l"> <input type = "submit"> </form>
