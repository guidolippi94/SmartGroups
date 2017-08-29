<html>
<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">

        var keyword = "florence";

        $(document).ready(function(){

            $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",
                {
                    tags: keyword,
                    tagmode: "any",
                    format: "json"
                },
                function(data) {
                    var rnd = Math.floor(Math.random() * data.items.length);

                    var image_src = data.items[rnd]['media']['m'].replace("_m", "_b");

                    $('body').css('background-image', "url('" + image_src + "')");

                });

        });
    </script>
</head>
<body>

</body>
</html>