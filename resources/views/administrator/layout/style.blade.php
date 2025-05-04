<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>Luna Mapping System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('admintemplate/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admintemplate/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('admintemplate/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('admintemplate/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('admintemplate/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('admintemplate/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{asset('admintemplate/assets/css/style.css')}}" rel="stylesheet">




    <link href="https://api.mapbox.com/mapbox-gl-js/v3.6.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.6.0/mapbox-gl.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>


        @media (max-width: 1024px) {
    
    .pctr{
        padding-bottom: 40px;
       }
       
       .navigation-auto{
          margin-left: -180px;
       }
       
       .navigation-manual{
       margin-left: -80px;
       }
       
       .slider{
           width: 700px;
           height: 700px;
           border-radius: 10px;
           overflow: hidden;
           margin-left: 40px;
           margin-top: 10px;
       }
       
       .slides{
           width: 400%;
           height: 500px;
           display: flex;
       }
       
       .slide img{
           width: 700px;
           height: 660px;
       }
       
       .person{
           position: absolute;
           margin-left: 900px;
           margin-top: -700px;
       }
       
       .mayor h2{
           font-size: .8em;
           float: right;
           text-align: center;
           margin-top: 50px;
           margin-right: -80px;
          
           color: white;
       }
       .mayor h1{
           color: #50C878;
           float: right;
           font-size: 1em;
           margin-right: 10px;

       }
       .v_mayor{
           display: flex;
           
       }
       .v_mayor h1{
           font-size: 1em;
           color:#50C878;
           float: right;
           margin-right: 70px;
           
        }
        .v_mayor h2{
            font-size: .8em;
            float: right;
            text-align: center;
            margin-right: 20px;
            margin-top: -10px;
            color: white;
            
        }
        #map{
            width: 640px;
        }
        .mapa{
            font-size: 1em;
            margin-top: 150px;
            
        }
        .graphBox h1{
            font-size: 1em;
        }
        .graphBox .box{
            width: 600px;
            margin-left: 10px;
        }
    
 }

 /* large laptop */

 @media (max-width: 1440px){
    ul, a {
        font-family: "Motserrat", sans-serif;
        font-weight: 500;
        font-size: 12px;
        color: #0b171c;
        text-decoration: none;
        display: flex;
    }
    .nav_links a{
        background-color: transparent;
        color: white;
        
    }
    .nav_links{
        margin-left: 450px;
        list-style: none;
        
    }
    .nav_links li{
        display: inline-block;
        padding: 0px 20px;
    }
    .nav_links li a{
      transition:all 0.3s ease 0s;
    }
    .nav_links :hover{
        color:rgb(28, 106, 49)
    }
    .nav_links :active{
        color: rgb(37, 132, 39);
    }
    .login{
        border-color: #0b171c;
        border-style: solid;
        border-radius: 10px;
       
    }
    button{
        padding: 5px 20px;
        /* background: rgb(210, 214, 7); */
        border: #19191a;
        background: transparent;
        color: white;
        border-radius: 10px;
        cursor: pointer;
        transition:all 0.3s ease 0s;
        /* margin-right: 10px; */
    }
    
    
    .pctr{
       
       padding-bottom: 40px;   
    }
    .person h2{
        color: #19191a;  
    }
    .person img{
        background-color: #ffffff;
        border-radius: 30px;
        width: 200px;
        
    }
    .mayor{
        display: flex;
        padding-bottom: 40px;
        
    }
    .person img{
        box-shadow: 20px 20px 40px rgb(13, 15, 12), -10px -10px 30px #4a4a4a
    }
    .mayor h2{
        font-size: 1.2em;
        float: right;
        text-align: center;
        margin-top: -10px;
        margin-right: 120px;
        color: white;
    }
    .mayor h1{
        color: #50C878;
        float: right;
        font-size: 1em;
        margin-right: 200px;
    }
    .v_mayor{
        display: flex;
        
    }
    .v_mayor h2{
        font-size: 1.2em;
        float: right;
        text-align: center;
        margin-right: 100px;
        margin-top: -10px;
        color: white;
        
    }
    .v_mayor h1{
        font-size: 1em;
        color:#50C878;
        float: right;
        margin-right: 160px;
        
    }
    
 }

 /* tablet */
 
 @media (max-width: 768px){
    #map{
        width: 540px;
    }
    .mapa{
        font-size: 1em;
        margin-top: 150px;
        
    }
    .graphBox h1{
        font-size: 1em;
    }
    .graphBox .box{
        width: 500px;
        margin-left: 10px;
    }

    .pctr{
   
        padding-bottom: 40px;   
     }
     .person h2{
         color: #19191a;  
     }
     .person img{
         background-color: #ffffff;
         border-radius: 30px;
         width: 200px;
         
     }
     .mayor{
         display: flex;
         padding-bottom: 40px;
         
     }
     .person img{
         box-shadow: 20px 20px 40px rgb(13, 15, 12), -10px -10px 30px #4a4a4a
     }
     .mayor h2{
         font-size: 1.2em;
         float: right;
         text-align: center;
         margin-top: -10px;
         margin-right: 10px;
         color: white;
     }
     .mayor h1{
         color: #50C878;
         float: right;
         font-size: 1em;
         margin-right: 70px;
         
     }
     .v_mayor{
         display: flex;
         
     }
     .v_mayor h2{
         font-size: 1.2em;
         float: right;
         text-align: center;
         margin-right: 10px;
         margin-top: -10px;
         color: white;
     }
     .v_mayor h1{
         font-size: 1em;
         color:#50C878;
         float: right;
         margin-right: 50px;
         
     }
     
    }
    

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
    
    /* #map{
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
        
    }*/
   
    </style>

</head>