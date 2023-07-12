<html>
    <head>
        <style>
            @import url(https://fonts.googleapis.com/css?family=Raleway:700);

            *, *:before, *:after {
                box-sizing: border-box;
            }

            html {
                height: 100%;
            }

            body {
                font-family: 'Raleway', sans-serif;
                background-color: #342643; 
                height: 100%;
                padding: 10px;
            }

            a {
                color: #EE4B5E !important;
                text-decoration:none;
            }

            a:hover {
                color: #FFFFFF !important;
                text-decoration:none;
            }

            .text-wrapper {
                height: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .title {
                font-size: 5em;
                font-weight: 700;
                color: #EE4B5E;
            }

            .subtitle {
                font-size: 40px;
                font-weight: 700;
                color: #1FA9D6;
            }
            .isi {
                font-size: 18px;
                text-align: center;
                margin:30px;
                padding:20px;
                color: white;
            }
            .buttons {
                margin: 30px;
                font-weight: 700;
                border: 2px solid #EE4B5E;
                text-decoration: none;
                padding: 15px;
                text-transform: uppercase;
                color: #EE4B5E;
                border-radius: 26px;
                transition: all 0.2s ease-in-out;
                display: inline-block;
            }
            .buttons:hover {
                background-color: #EE4B5E;
                color: white;
                transition: all 0.2s ease-in-out;
            }
        </style>
    </head>
    <body>
        <div class="text-wrapper">
            <div class="title" data-content="404">
                403 - ACCESS DENIED
            </div>

            <div class="subtitle">
                Oops, You don't have permission to access this page.
            </div>
            <div class="isi">
                A web server may return a 403 Forbidden HTTP status code in response to a request from a client for a web page or resource to indicate that the server can be reached and understood the request, but refuses to take any further action. Status code 403 responses are the result of the web server being configured to deny access, for some reason, to the requested resource by the client.
                </div>

            <a class="button" href="../view/list_view.php">
                <div class="buttons">Go to homepage</div>
            </a>
        </div>
    </body>
</html>

<script>
    TweenMax.set('#policeman',{xPercent:-50, yPercent:0, left:"50%", bottom:"0%"});
    TweenMax.set('#hand',{transformOrigin:"center bottom",y:50});
    TweenMax.fromTo('#hand',0.3,{rotation:-10},{rotation:10,yoyo:true,repeat:-1,ease:Power1.easeInOut});
</script>

        <!--<div>Icons made by <a href="https://www.flaticon.com/authors/good-ware" title="Good Ware">Good Ware</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>-->