@extends('administrator.layout.master')

@section('css')
<style>
.right label{
    color: aliceblue;

    height: 10px;
}
.right{
    float: right;
    margin-right: 50px;
   margin-top: 40px;
   
}
.mayor{
    display: grid;
    padding: 20px;
}
#drop-area{
    margin-top: 100px;
    margin-left: 140px;
    width: 400px;
    height: 200px;
    padding: 30px; 
    background: #fff;
    text-align: center;
    border-radius: 10px;
    display: table;
}
#drop-area_right{
    margin-top: 40px;
    width: 400px;
    height: 200px;
    padding: 30px; 
    background: #fff;
    text-align: center;
    border-radius: 10px;
    display: table;
}
.left{
    float: left;
}
.v_mayor{
    display: grid;
    padding: 20px;
}
.sbmt{
    margin-left: 430px;
    margin-top: 10px;
}

  </style>
  
@endsection


@section('container')
 <br>
 <header class="header">
    <a href="index.html">
        <img class="logo" src="img/luna.jpg" alt="">
    </a>
    
    
</header>   


</div>

<form action="">
    <div class="container">
        <div class="left">
            <div class="image_1">
               <label for="input-file" id="drop-area">
                <input type="file" accept="image/*" id="input-file">
            </label>
            <input class="sbmt" type="submit">
            </div>
            <br>
            <div class="image_2">
               <label for="input-file" id="drop-area">
                <input type="file" accept="image/*" id="input-file">
            </label>
            <input class="sbmt" type="submit">
            </div>
            <br>
            <div class="image_3">
               <label for="input-file" id="drop-area">
                <input type="file" accept="image/*" id="input-file">
            </label>
            <input class="sbmt" type="submit">
            </div>
        </div>


        <div class="right">
            <div class="mayor" >
                <div class="drop">
                    <label for="input-file" id="drop-area_right">
                        <input type="file" accept="image/*" id="input-file">
                    </label>
                </div>
                <label for="mayor" class="lbl" ></label>
                <input type="text" id="mayor" name="mayor" placeholder=" Mayor's Full Name:">
                <div class="sbmt">
                    <input type="submit">
                </div>
            </div>
            <br>
            <div class="v_mayor" >
                <div class="drop">
                    <label for="input-file" id="drop-area_right">
                        <input type="file" accept="image/*" id="input-file">
                    </label>
                </div>
                <label for="v_mayor" class="lbl"></label>
                <input type="text" id="v_mayor" name="v_mayor" placeholder=" Vice Mayor's Full Name:">
                <div class="sbmt">
                    <input type="submit">
                </div>
            </div>
        </div>
        
    </div>
</form>
@endsection