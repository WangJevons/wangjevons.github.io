<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width = device-width, initial-scale = 1.0">
        <title >東華宿舍包裹系統</title>
        <style type="text/css">
           
            div
            {
                border-radius: 50px;
            }
        </style>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="homepage">      
                <h1 style=" margin-left: 30vw; margin-right: 30vw;">東華宿舍包裹取件系統</h1>          
                <div class="login" >
                        <h2>登入頁面</h2>
                        <?php
                            if (!empty($_SESSION['error']))
                            {
                                echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
                                unset($_SESSION['error']);
                            }
                        ?>
                        <form method="POST" action="login.php">
                        <label class="identify">
                            <input type="radio" name="id" value="id1" id="student" onchange="updateplacehold()">學生
                        </label>
                        <label class="identify">
                        <input type="radio" name="id" value="id2" id="manager" onchange="updateplacehold()">管理員
                        </label>
                        <br>
                        <label class="front" for="account">帳號
                            <input name="account" type="text" id="userInput" class="in" placeholder="帳號" >
                        </label>
                        <br>
                        <label class="front" for="pass">密碼
                            <input type="password" id="password"  class="in" placeholder="同信箱密碼" >
                        </label>
                            <script>
                                function updateplacehold()
                                {
                                    let userInput= document.getElementById("userInput");

                                    if(document.getElementById("student").checked)
                                    {
                                        userInput.placeholder="預設為學號"
                                    }   
                                    else if(document.getElementById("manager").checked)
                                    {
                                        userInput.placeholder="預設為信箱@前";
                                    }
                                }
                                document.addEventListener("keydown", function(event) {
                                    if (event.key === "Enter") {
                                        login();
                                    }
                                });
                                function login()
                                {
                                    let userInput = document.getElementById("userInput").value.trim();
                                    let password = document.getElementById("password").value.trim();
                                    let student = document.getElementById("student");
                                    let manager = document.getElementById("manager");
                                    if (userInput==="")
                                    {
                                        alert("請輸入帳號!!!");
                                        return;
                                    }
                                    else if (password==="")
                                    {
                                        alert("請輸入密碼!!!");
                                        return;
                                    }
                                    if (student.checked )
                                    {
                                        window.location.href="takepack.html";
                                    }
                                    else if (manager.checked )
                                    {
                                        window.location.href="checkin.html";
                                    }
                                    else
                                    {
                                        alert("請選擇身分");
                                    }
                                }
                                
                                window.onload = function() 
                                {
                                    updateplacehold();
                                };
                            </script>   
                            
                        
                        <p></p>
                        
                    
                        
                        <p></p>
                        <div class="bt">
                            <button type="submit" onclick="login()">登入</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>      
    </body>
</html>