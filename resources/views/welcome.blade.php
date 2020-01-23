<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .loader {
                position: fixed;
                left: 50%;
                top: 40%;
                -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                border: 16px solid #f3f3f3;
                border-radius: 50%;
                border-top: 16px solid #3498db;
                width: 120px;
                height: 120px;
                -webkit-animation: spin 2s linear infinite; /* Safari */
                animation: spin 2s linear infinite;
            }

            /* Safari */
            @-webkit-keyframes spin {
                0% { -webkit-transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            .hide{
                display: none;
            }

            .top-menu{width:100%;height:50px;}
            .top-menu ul{list-style-type:none;}
            .top-menu ul li{display:inline-block;}
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>
        <div class="top-menu">
            <ul>
                <li><a href="/categories">Category</a></li>
            </ul>
        </div>
        <div class="loader" style="display: none;">
        </div>
        <div class="test">
            @foreach($products as $product)
                <p class="el">{{$product->name}}</p><br><br>
            @endforeach
        </div>
    <script type="text/javascript">
        $(document).ready(function(){

            var chk = true;

            $(document).ajaxStart(function() {
                $(".loader").show();
            }).ajaxStop(function() {
                $(".loader").hide();
            });

            $(window).scroll(function() {
                if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
                    if(chk) {
                        chk = false;
                        var offset = $('.el').length;
                        $.ajax({
                            type: "GET",
                            url: "/load-products/" + offset,
                            success: function(resp){
                                var products = JSON.parse(resp.products);
                                for(i=0; i<products.length; i++){
                                    $('.test').append('<p class="el">'+products[i].name+'</p><br><br>');
                                }
                                chk = true;
                            }
                        });
                    }
                }
            });
        });
    </script>
    </body>
</html>
