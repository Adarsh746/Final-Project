<!DOCTYPE html>
<html>
<head>
    <title></title>
   <style >
       *{
    margin: 0;
    padding: 0;
}
.wrapper{
    width:1170px ;
    margin: auto;
}
header{
    background: url("/images/construction.jpg");
    height:100vh;
    -webkit-background-size:cover;
    background-size:    cover;
    background-position: center center;
    position: relative; 

}
.nav-area{
    float: right;
    list-style: none;
    margin-top: 30px;


}
.nav-area li{
    display: inline-block;
}
.nav-area li a{
    color: #fff;
    text-decoration: none;
    padding: 5px 20px;
    font-family: sans-serif;
    font-size: 16px;
}
.nav-area li a:hover{
    background: #000;
    color: #fff;    
}
.logo img{
    width: 100px;
    float: left;
    height: auto;
}
.welcome-text{
    position: absolute;
    width: 600px;
    height: 300px;
    margin: 20% 30%;
    text-align: center;
}
.welcome-text h1{
    text-align: center;
    color: #fff;
    text-transform: uppercase;
    font-size: 60px;
    font-family: Cursive;

}
.caption-text {
    text-align: center;
    color: #fff;
    font-size: 24px;
    font-family: Cursive;
     position: absolute;
     width: 600px;
    height: 300px;
    margin: 30% 30%;
   
}
.welcome-text a{

    border: 1px solid #fff;
    padding: 10px 25px;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 14px;
    margin-top: 20px;
    display: inline-block;
    color: #fff;
}


   </style>



</head>
<body>
    <header >
     <div class="center">
        <div class="logo">
            <img src="/images/logo1.jpg" alt="">
        </div>
        
        <ul class="nav-area">
            <li><a href="{{route('admin.login')}}">Admin</a></li>
                <li><a href="{{route('franchise.login')}}">Labour</a></li>
                    <li><a href="{{route('user.login')}}">User</a></li>
        </ul>
    </div>  
    <div class="welcome-text">
        <h1>Labours Online</h1>
    </div>
    <div class="caption-text">
       <h4>"No Human Masterpeice Has Been Created  
       Without Great Labour" </h4> 
    </div>>

    </header>

</body>
</html>
