<html>
    <head>
        <style>
            body {
                background: #1488EA;
            }

            #card {
                position: relative;
                top: 110px;
                width: 320px;
                display: block;
                margin: auto;
                text-align: center;
                font-family: 'Source Sans Pro', sans-serif;
                background-color: #F44336; /* Updated color to red */
            }

            #upper-side {
                padding: 2em;
                background-color: #E91E63;
                display: block;
                color: #fff;
                border-top-right-radius: 8px;
                border-top-left-radius: 8px;
            }

            #crossmark {
                font-weight: lighter;
                fill: #fff;
                margin: -3.5em auto auto 10px;
                margin-bottom: 10px;
            }

            #status {
                font-weight: lighter;
                text-transform: uppercase;
                letter-spacing: 2px;
                font-size: 1em;
                margin-top: -.2em;
                margin-bottom: 0;
            }

            #lower-side {
                padding: 2em 2em 5em 2em;
                background: #fff;
                display: block;
                border-bottom-right-radius: 8px;
                border-bottom-left-radius: 8px;
            }

            #message {
                margin-top: -.5em;
                color: #757575;
                letter-spacing: 1px;
            }

            #contBtn {
                position: relative;
                top: 1.5em;
                text-decoration: none;
                background: #E91E63;
                color: #fff;
                margin: auto;
                padding: .8em 3em;
                -webkit-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
                -moz-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
                box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
                border-radius: 25px;
                -webkit-transition: all .4s ease;
                        -moz-transition: all .4s ease;
                        -o-transition: all .4s ease;
                        transition: all .4s ease;
            }

            #contBtn:hover {
                -webkit-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
                -moz-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
                box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
                -webkit-transition: all .4s ease;
                        -moz-transition: all .4s ease;
                        -o-transition: all .4s ease;
                        transition: all .4s ease;
            }
        </style>
    </head>
    <body>
        <div id='card' class="animated fadeIn">
            <div id='upper-side'>
                <?xml version="1.0" encoding="utf-8"?>
                <!-- Generator: Adobe Illustrator 17.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                <svg version="1.1" id="crossmark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" xml:space="preserve">
                    <path d="M152.017,132.753L131.271,112l20.746-20.753c3.906-3.906,3.906-10.237,0-14.143s-10.237-3.906-14.143,0L117.128,97.857L96.382,77.104c-3.906-3.906-10.237-3.906-14.143,0s-3.906,10.237,0,14.143l20.746,20.753l-20.746,20.753c-3.906,3.906-3.906,10.237,0,14.143c1.953,1.953,4.512,2.929,7.071,2.929s5.119-0.976,7.071-2.929l20.746-20.753l20.746,20.753c1.953,1.953,4.512,2.929,7.071,2.929s5.119-0.976,7.071-2.929c3.906-3.906,3.906-10.237,0-14.143L152.017,132.753z"/>
                </svg>
                <h3 id='status'>
                    Failure
                </h3>
            </div>
            <div id='lower-side'>
                <p id='message'>
                    <?php
                        if (isset($_GET['error_msg'])) {
                            echo htmlspecialchars($_GET['error_msg']);
                        } else {
                            echo "Failure!";
                        }
                    ?>
                </p>
                <a href="../view/list_view.php" id="contBtn">Go Back</a>
            </div>
        </div>
    </body>
</html>
