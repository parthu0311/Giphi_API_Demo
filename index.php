<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);

        body{
            background: #f2f2f2;
            font-family: 'Open Sans', sans-serif;
        }

        .search {
            width: 100%;
            position: relative;
            display: flex;
        }

        .searchTerm {
            width: 100%;
            border: 3px solid #00B4CC;
            border-right: none;
            padding: 5px;
            height: 20px;
            border-radius: 5px 0 0 5px;
            outline: none;
            color: #9DBFAF;
        }

        .searchTerm:focus{
            color: #00B4CC;
        }

        .searchButton {
            width: 40px;
            height: 36px;
            border: 1px solid #00B4CC;
            background: #00B4CC;
            text-align: center;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-size: 20px;
        }

        /*Resize the wrap to see the search bar change!*/
        .wrap{
            width: 30%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>
<body>

    <div class="wrap">
        <input type="text" class="limit" id="limit" placeholder="limit">
        <input type="text" class="offset" id="offset" placeholder="offset">
        <select id="rating" class="query-param select-area">
            <option value="G" selected="">G</option>
            <option value="PG">PG</option>
            <option value="PG-13">PG-13</option>
            <option value="R">R</option>
        </select>
        <select id="lang" class="query-param select-area"><option value="en" selected="">en</option><option value="es">es</option><option value="pt">pt</option><option value="id">id</option><option value="fr">fr</option><option value="ar">ar</option><option value="tr">tr</option><option value="th">th</option><option value="vi">vi</option><option value="de">de</option><option value="it">it</option><option value="ja">ja</option><option value="zh-CN">zh-CN</option><option value="zh-TW">zh-TW</option><option value="ru">ru</option><option value="ko">ko</option><option value="pl">pl</option><option value="nl">nl</option><option value="ro">ro</option><option value="hu">hu</option><option value="sv">sv</option><option value="cs">cs</option><option value="hi">hi</option><option value="bn">bn</option><option value="da">da</option><option value="fa">fa</option><option value="tl">tl</option><option value="fi">fi</option><option value="iw">iw</option><option value="ms">ms</option><option value="no">no</option><option value="uk">uk</option></select>
        <div class="search">
            <input type="text" class="searchTerm" id="gift_search" placeholder="What are you looking for?">

            <a type="button" class="searchButton" onclick="create();">
                <i class="fa fa-search"></i>
            </a>
        </div>

    </div>
    <br>
    <div id="images"></div>

</body>
<script type="application/javascript">
    function create() {
        if($('#gift_search').val() !== "" && $('#gift_search').val() != undefined){
            $.ajax({
                url:"class_lib.php", //the page containing php script
                type: "post", //request type,
                dataType: 'json',
                data: {
                    q: $("#gift_search").val(),
                    limit: $("#limit").val(),
                    offset: $("#offset").val(),
                    rating: $("#rating").val(),
                    lang: $("#lang").val()
                },
                success:function(result){
                    $html = "<table>";
                    $.each(result.data, function(key,val) {
                        $html += "<tr><td>";
                        $html += '<img src="'+val.images.fixed_height_still.url+'">';
                        $html += "</td></tr>";
                    });
                    $html += "</table>";
                    $("#images").html($html);
                }
            });
        }else {
            alert("Please search your gift");
        }
    }
</script>
</html>
