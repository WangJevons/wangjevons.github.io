<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width = device-width, initial-scale = 1.0">
        <title>東華宿舍包裹系統</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <script src="hamburger.js"></script>
        <div class="container">
            <div id="back">
                <div style="text-align: center;">
                    <h1 style="align-self: center;">東華宿舍包裹取件系統</h1>
                </div>
                <a  href="login.html" id="logout" class="desktop" >登出</a> 
                <!--漢堡選單-->
                <div class="hamburger" id="hamburger" onclick="toggleMenu()">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>  
                <div style="margin-left: 5vw; float: left;" id="list" class="menu">
                    <ul>
                        <li><a href="checkin.html"><b>包裹登錄</b><br></a></li>
                        <li><a href="receiveinstead.html"><b>包裹代領名單</b><br></a></li>
                        <li><a href="check.html"><b>包裹領取確認</b><br></a></li>
                        <li><a href="history.html"><b>收件紀錄</b><br></a></li>
                        <li><a href="login.html" class="mobile">登出</a></li>
                    </ul>
                </div>
                <br>
                <table>
                    <tr>
                        <th>領取人</th>
                        <th>代領人</th>
                        <th>申請時間</th>
                    </tr>
                    
                </table>
            </div>
        </div>
    </body>
</html>