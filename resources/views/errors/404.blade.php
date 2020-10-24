<head>
    <style>
        #errorhandler{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #errorimg{
            width: 80vw;
            height: auto;
        }

        #errortxt{
            color: #1F3896;
            transition: all .8s ease-in-out;
            text-decoration: none;
        }

        #errortxt:hover{
            color: #9B2A8D;
        }
    </style>
</head>

<body>
    <a href="{{ url('/') }}">
        <div id="errorhandler">
            <img id="errorimg" src="{{ asset('res/404/page-404-pour-phone.gif') }}">
            <h1 id="errortxt">Vous êtes venus sur la mauvaise planète, semble-t-il.</h1>
        </div>
    </a>
</body>
