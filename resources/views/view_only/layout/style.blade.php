<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('lunamapping_template/style.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.6.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.6.0/mapbox-gl.js"></script>
<link href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <style>

    /* #map { position: absolute; top: 0; bottom: 0; width: 100%; }
        .coordinates {
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        position: absolute;
        bottom: 40px;
        left: 10px;
        padding: 5px 10px;
        margin: 0;
        font-size: 11px;
        line-height: 18px;
        border-radius: 3px;
        display: none;

    } */
    
     #map{
        position: relative;
        width: 900px; 
        height: 560px;
        margin-left: 250px;
        margin-top: 60px;

     }
     .mapboxgl-ctrl-attrib-button{
        background-color: none;
     }
    
    .select-menu{
        float: left;
        margin-top: 50px;
        margin-left: 20px;

    }
    .sBtn-text{
        background: none;
        height: 10px;
    }
    .select-btn{
        height: 10px;
    }
    .select-menu i{
        background: none;
    }
    .select-menu .options{
        position: relative;
        padding: 20px;
        border-radius: 8px;
        width: 190px;
        margin-top: 5px;
        background:aliceblue;
        box-shadow: 0 0 3px rgba(0,0,0,0.1);
    }
    .select-menu .select-btn{
        display: flex;
        height: 55px;
        background: aliceblue;
        padding: 30px;
        font-size: 18px;
        font-weight: 600;
        border-radius: 8px;
        align-items: center;
        cursor: pointer;
        justify-content: space-between;
        box-shadow: 0 0 5px rgb(0,0,0,0.1);
    }
    .options a{
        color: black;
        background:none;
    }
    .options .option{

        display: flex;
        height: 55px;
        cursor: pointer;
        padding: 0 10px;
        border-radius:0px;
        align-items: center;
        background: aliceblue;
    }
    .dropdown{
        /* min-width: 15em; */
        /* position: relative; */
        margin: 2em;
        padding: 15px;
        float: left;
    }
    .dropdown *{
        box-sizing: border-box;
        color: #fff;
    }
    .select{
        background: #2a2f3b;
        color: #fff;
        display: flex;
        width: 200px;
        justify-content: center;
        border: 2px #2a2f3b solid;
        border-radius: 0.5em;
        padding: 1em;
        cursor: pointer;
        transition: background 0.3s;
        
    }
    .select-clicked{
        border: 2px #26489a solid;
        box-shadow: 0 0 0.8em #26489a;
    }

    .select:hover{
        background: #323741;
    }
    .caret{
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid #fff;
        transition: 0.3s;
        margin-left: 10px;
        margin-top: 10px;
    }
    .caret-rotate{
        transform: rotate(180deg);
    }
    .menu{
        list-style: none;
        padding: 0.2em 0.5em;
        background: #323741;
        border: 1px #363a43 solid;
        box-shadow: 0 0.5em 1em rgba(0,0,0,0.2);
        border-radius: 0.5em;
        color: #9fa5b5;
        position: absolute;
        top: 12em;
        left: 155px;
        width: 200px;
        transform: translateX(-50%);
        opacity: 0;
        display: none;
        transform: 0.2s;
        z-index: 1;
    }
    .menu li{
        padding: 0.7em 0.5em;
        margin: 0.3em 0;
        border-radius: .5em;
        cursor: pointer;
    }
    .menu li:hover{
        background: #2a2d35;


    }
    .active{
        background: #23242a;
    }
    .menu-open{
        display: block;
        opacity: 1;

    }
    .mapa{
        color: white;
        
    }
   
    </style>

</head>