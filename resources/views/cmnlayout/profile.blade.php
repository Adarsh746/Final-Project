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
    background: url("/images/homebg.jpg");
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
    background: #fff; 
    color: #444;    
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
     <div class="wrapper">
        <div class="logo">
            <img src="/images/Lawyer.jpg" alt="">
        </div>
        <ul class="nav-area">
            <li><a href="{{route('admin.login')}}">Admin</li>
                <li><a href="{{route('franchise.login')}}">Lawyer</li>
                    <li><a href="{{route('user.login')}}">Client</li>
        </ul>
    </div>  
    <div class="welcome-text">
        <h1>Legis Eye</h1>


    </div>

    </header>

</body>
</html>