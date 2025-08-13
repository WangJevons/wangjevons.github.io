<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width = device-width, initial-scale = 1.0">
        <title>東華宿舍包裹系統</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <style>
            .flatpickr-calendar
            {
            z-index: 9999;
            }
        </style>
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
                <div style="text-align:left; margin-left: 20%; margin-top: 5%;">
                    <h4 class="detail">收件人姓名</h4>
                    <input type="text" class="info">
                    <h4 class="detail">送達時間</h4>
                    
                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/zh-tw.js"></script>
                    
                    <input type="text" id="datetime" class="info">
                    
                    <script>
                        flatpickr
                        ("#datetime",
                        {
                            enableTime: true, 
                            time_24hr: true, 
                            dateFormat: "Y-m-d H:i",
                            locale: "zh_tw",        
                            onOpen: function (selectedDates, datestr, instance)
                            {
                                setTimeout(()=>{
                                    const calendar = instance.calendarContainer;
                                    const inputRec = instance._positionElement.getBoundingClientRect();
                                    const inputMidY = inputRec.top + inputRec.height / 2;
                                    const calendarHeight = calendar.offsetHeight;
                                    const calendarTop = inputMidY - calendarHeight / 2;

                                    calendar.style.position = "fixed";
                                    calendar.style.left = inputRec.right + 10 + "px";
                                    calendar.style.top = calendarTop + "px";
                                },0);
                            }
                        
                        }
                        );     
                    </script>
                    <h4 class="detail">包裹數量</h4>
                    <input type="text" class="info">
                    <h4 class="detail">備註</h4>
                    <input type="text" class="info">
                    <button style="position: absolute; right: 5vw; top: 90%; text-decoration: none;" onclick="location.href='checkin.html'" class="bt">儲存</button>
                </div>
            </div>
        </div>
    </body>
</html>