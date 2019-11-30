<?php
require "vendor/autoload.php";
class first_guzzle_app {

    public function giphy_api_call($param_q,$limit,$offset,$rating,$lang)
    {
        $client = new GuzzleHttp\Client();
        $params = array(
            'query' => [
                'api_key'=> 'WAUPLYmyxnUQGfkph6Dt5KOnwdrsKKMa',
                'q' => $param_q,
                'limit'=>$limit?$limit:10,
                'offset'=>$offset?$offset:0,
                'rating'=>$rating,
                'lang'=>$lang
            ],
            'verify' => false,
        );
        $res = $client->request('GET', 'https://api.giphy.com/v1/gifs/search',$params);
        return $res->getBody();
    }

}

$guzzle_search = new first_guzzle_app();

if (isset($_POST['q'])) {
    echo $guzzle_search->giphy_api_call($_POST['q'],$_POST['limit'],$_POST['offset'],$_POST['rating'],$_POST['lang']);
}
