<?php
header('content-type:text/css; charset:UTF-8');
?> 
*{
  padding: 0;
  margin: 0;
  text-decoration: none;
  list-style: none;
  box-sizing: border-box;
}
body{
  font-family: montserrat;
 // Background-image: url('../Images/RO1.jpg')  ;
  background-attachment: fixed;  
  background-size: cover;
    background-repeat: no-repeat;
  
}

nav{
  background: #022f69;
  height: 80px;
  width: 100%;
  position: fixed;
}
img.logo{
  color: #fff;
  font-size: 35px;
  line-height: 80px;
  padding: 0 100px;
  font-weight: bold;

}
.button {
        display: inline-block;
        background-color: #7b38d8;
        border-radius: 10px;
        border: 4px double #cccccc;
        color: #eeeeee;
        text-align: center;
        font-size: 25px;
        padding: 10px;
        width: 200px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
      }
      .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
      }
      .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
      }
      .button:hover {
        background-color: #f7c2f9;
      }
      .button:hover span {
        padding-right: 25px;
      }
      .button:hover span:after {
        opacity: 1;
        right: 0;
      }

.button-5 {
  align-items: center;
  background-clip: padding-box;
  background-color: #fa6400;
  border: 1px solid transparent;
  border-radius: .25rem;
  box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 16px;
  font-weight: 600;
  justify-content: center;
  line-height: 1.25;
  margin: 0;
  min-height: 3rem;
  padding: calc(.875rem - 1px) calc(1.5rem - 1px);
  position: relative;
  text-decoration: none;
  transition: all 250ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  width: auto;
}

.button-5:hover,
.button-5:focus {
  background-color: red;
  box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
}

.button-5:hover {
  transform: translateY(-1px);
}

.button-5:active {
  background-color: #c85000;
  box-shadow: rgba(0, 0, 0, .06) 0 2px 4px;
  transform: translateY(0);
}
.upload {
  align-items: center;
  background-clip: padding-box;
  background-color: grey;
  border: 1px solid transparent;
  border-radius: 2.25rem;
  box-shadow: rgba(100, 10, 100, 0.5) 0 1px 3px 0;
  box-sizing: border-box;
  color: #00ff0f;
  cursor: pointer;
  display: inline-flex;
  font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 16px;
  font-weight: 500;
  justify-content: center;
  line-height: 1.00;
  margin: 0;
  min-height: 2rem;
  padding: calc(.875rem - 1px) calc(1.5rem - 1px);
  position: relative;
  text-decoration: none;
  transition: all 250ms;
  user-select: revert-layer;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  width: auto;
}
.upload:hover,
.upload:focus {
  background-color: yellow;
  box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
}

.upload:hover {
  transform: translateY(-1px);
}

.upload:active {
  background-color: #c85000;
  box-shadow: rgba(0, 0, 0, .06) 0 2px 4px;
  transform: translateY(0);
}
.caption{
  color: white;
}
.footer-menu{
  margin-bottom: 50px;
  align: center;
  background-color: black;
}
.footer{
  color: #cfd2d6;
  border: 1.3px solid white;
  padding: 6px 15px;
  border-radius: 50px;
  text-decoration: none;
  align: center;
  background-color: black;
}
.footer-menu ul{
  display: flex;
  align: center;
  background- color: black;
}
.footer-content{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
}
.footer-menu ul li{
padding-right: 10px;
display: block;
align: center;
background-color: black;

}
.footer-menu ul li a{
  color: #cfd2d6;
  border: 1.3px solid white;
  padding: 6px 15px;
  border-radius: 50px;
  text-decoration: none;
 
}
.footer-menu ul li a:hover{
  color: #27bcda;
}
.socials{
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1rem 0 3rem 0;
}

.socials li{
    margin: 0 10px;
}

.socials a{
    text-decoration: none;
    color: #fff;
    border: 1.1px solid white;
    padding: 5px;
    border-radius: 50%;
}
.socials a i{
    font-size: 1.1rem;
    width: 20px;
    transition: color .4s ease;
}

.socials a:hover i{
    color: aqua;
}


nav ul{
  float: right;
  margin-right: 50px;
}
nav ul li{
  display: inline-block;
  line-height: 80px;
  margin: 0 5px;
}
nav ul li a{
  color: #fff;
  font-size: 17px;
  padding: 7px 13px;
  border-radius: 3px;
  text-transform: uppercase;
}
a.active,a:hover{
  background: #fff;
  transition: .5s;
  color: #022f69;
}
.checkbtn{
  font-size: 30px;
  color: #fff;
  float: center;
  line-height: 80px;
  margin-right: 40px;
  cursor: pointer;
  display: none;
}
#check{
  display: none;
}
@media (max-width: 968px){
  label.logo{
    font-size: 30px;
    padding-left: 50px;
  }
  nav ul li a{
    font-size: 16px;
  }
}
@media (max-width: 875px){
  .checkbtn{
    display: block;
  }
  nav ul{
    position: right;
    width: 100%;
    height: 100vh;
    background: #27282c;
    top: 80px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }
  nav ul li{
    display: block;
    margin: 50px 0;
    line-height: 30px;
  }
  nav ul li a{
    font-size: 20px;
  }
  a:hover, a.active{
    background: none;
    color: #0082e6;
  }
  .button {
  background-color: #4CAF50;
  border: yellow;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 25px;
  margin: 5px 3px;
  cursor: pointer;
  }
 

  #check:checked ~ ul{
    left: 0;
  }

  
  
}