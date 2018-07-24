 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
<style type="text/css">
        #heart {
            position: relative;    
            width: 500px;    
            height: 90px;
            }
            #heart:before,#heart:after{    
                position: absolute;    
                content: "";    
                left: 50px;    
                top: 0;    
                width: 50px;    
                height: 80px;    
                background: orange;    
                -moz-border-radius: 50px 50px 0 0;    
                border-radius: 50px 50px 0 0;    
                -webkit-transform: rotate(-45deg);       
                -moz-transform: rotate(-45deg);        
                -ms-transform: rotate(-45deg);         
                -o-transform: rotate(-45deg);            
                transform: rotate(-45deg);    
                -webkit-transform-origin: 0 100%;       
                -moz-transform-origin: 0 100%;        
                -ms-transform-origin: 0 100%;        
                 -o-transform-origin: 0 100%;            
                 transform-origin: 0 100%;
                 }
                 #heart:after{    
                    left: 0;    
                    -webkit-transform: rotate(45deg);       
                    -moz-transform: rotate(45deg);        
                    -ms-transform: rotate(45deg);         
                    -o-transform: rotate(45deg);            
                    transform: rotate(45deg);    
                    -webkit-transform-origin: 100% 100%;       
                    -moz-transform-origin: 100% 100%;        
                    -ms-transform-origin: 100% 100%;         
                    -o-transform-origin: 100% 100%;            
                    transform-origin :100% 100%;
                 } 

    #xiaozhe{
        position: absolute;
        left: 33px;
        top: 19px;
        font-family: "微软雅黑";
        font-weight: bolder;
        text-shadow:1px 1px 1px yellow;
        color: green;
        font-size: 27px;
        margin: 0 auto;
    }
    #xiaozhe:hover{
        transform:scale(1.1,1.1);
        cursor: pointer;
    }
</style>
</head>
<body>
    <div id="heart"></div>
    <span id="xiaozhe">小哲</span>
</body>
</html>