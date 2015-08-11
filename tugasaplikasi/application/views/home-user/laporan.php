<div class="arriv">
    <div class="container">
        <body>
            <header>
                <h1>Kumpulan Anime Indonesia</h1>
            </header>
        <div class="left">
            <br />
            <left>
                <h1>Daftar Anime</h1>
                <br/>
                <nav>
                    <ul>
                        <li><a href="#">A</a></li>
                        <li><a href="#">B</a></li>
                        <li><a href="#">C</a></li>
                        <li><a href="#">D</a></li>
                        <li><a href="#">E</a></li>
                        <li><a href="#">F</a></li>
                        <li><a href="#">G</a></li>
                        <li><a href="#">H</a></li>
                        <li><a href="#">I</a></li>
                        <li><a href="#">J</a></li>
                        <li><a href="#">K</a></li>
                        <li><a href="#">L</a></li>
                        <li><a href="#">M</a></li>
                        <li><a href="#">N</a></li>
                        <li><a href="#">O</a></li>
                        <li><a href="#">P</a></li>
                        <li><a href="#">Q</a></li>
                        <li><a href="#">R</a></li>
                        <li><a href="#">S</a></li>
                        <li><a href="#">T</a></li>
                        <li><a href="#">U</a></li>
                        <li><a href="#">V</a></li>
                        <li><a href="#">W</a></li>
                        <li><a href="#">X</a></li>
                        <li><a href="#">Y</a></li>
                        <li><a href="#">Z</a></li>
                    </ul>
                    <br/><br/>
                    <table border=1 align="center" cellspacing=5 cellpadding=10>
                        <p style="color: black">
                            <!--Huruf-->
                        <tr>
                            <th align="left"><img src="A.jpg" width="80" height="70"><br>Accell World<br>Air Gear<br>AKB0048<br>Akuma no Riddle<br>Ao No Exorcist<br>Avatar: The Legend Of Korra<br></th>
                            <th align="left"><img src="B.jpg" width="80" height="70"><br>Baby Steps<br>Bellzebub<br>Black Bullet<br>Black Lagoon<br>Blood Lad<br>Brother Conflict<br></th>
                            <th align="left"><img src="C.jpg" width="80" height="70"><br><br>Campione!<br>Capteain Earth<br>Chuunibyou Demo Koi Ga Shitai<br>Coppelion<br>Cuticle Tantei Inaba<br></th>
                        </tr>
                        <tr>
                            <th align="left"><img src="D.jpg" width="80" height="70"><br>D-Frag!<br>Date A Life<br>Detective Conan<br>Devil Survivor 2<br>Diamond No Ace<br>Dragon Ball<br></th>
                            <th align="left"><img src="E.jpg" width="80" height="70"></th>
                            <th align="left"><img src="F.jpg" width="80" height="70"></th>
                        </tr>

                    </table>	
                </nav>
        </div>	
        <div class="kanan" >
            <br /><br /><p style="color:white">Mengenai Saya</p>
            <img src="C360_2013-12-30-13-12-04-162.jpg" width="100" height="100" />
            <table>

                <tr>

                    <td >Jauhar firdaus</td>
                <tr>
                    <td><a href="#" target="_blank" rel="dofollow" onclick="window.open('https://plus.google.com/101161042178506548557/posts'); return false;">Lihat Profil lengkapku</td>
                </tr>
                </tr>
            </table>
            <script>
                if (document.all||document.getElementById)
                    document.write('<span id="worldclock" style="font:bold 16px Arial;"></span>')
                zone=0;
                isitlocal=true;
                ampm='';
                function updateclock(z){
                    zone=z.options[z.selectedIndex].value;
                    isitlocal=(z.options[0].selected)?true:false;
                }
                function WorldClock(){
                    now=new Date();
                    ofst=now.getTimezoneOffset()/60;
                    secs=now.getSeconds();
                    sec=-1.57+Math.PI*secs/30;
                    mins=now.getMinutes();
                    min=-1.57+Math.PI*mins/30;
                    hr=(isitlocal)?now.getHours():(now.getHours() + parseInt(ofst)) + parseInt(zone);
                    hrs=-1.575+Math.PI*hr/6+Math.PI*parseInt(now.getMinutes())/360;
                    if (hr < 0) hr+=24;
                    if (hr > 23) hr-=24;
                    ampm = (hr > 11)?"PM":"AM";
                    statusampm = ampm.toLowerCase();
                    hr2 = hr;
                    if (hr2 == 0) hr2=12;
                    (hr2 < 13)?hr2:hr2 %= 12;
                    if (hr2<10) hr2="0"+hr2
                    var finaltime=hr2+':'+((mins < 10)?"0"+mins:mins)+':'+((secs < 10)?"0"+secs:secs)+' '+statusampm;
                    if (document.all)
                        worldclock.innerHTML=finaltime
                    else if (document.getElementById)
                        document.getElementById("worldclock").innerHTML=finaltime
                    else if (document.layers){
                        document.worldclockns.document.worldclockns2.document.write(finaltime)
                        document.worldclockns.document.worldclockns2.document.close()
                    }
                    setTimeout('WorldClock()',1000);
                }
                window.onload=WorldClock
                //-->
            </script>
        </div>


        <footer>
            <table>
                <th align="center"><img src="About.jpg" width="140" height="40">
                <br><h5>Kumpulan Anime Indonesia<br>adalah tempat daftar Anime<br> Jepang Bersubtitle Indonesia,<br> anda Bisa melihat Daftar Anime Jepang</h5>
                </th>
            </table>
        </footer>
        </body>
        </html>
        </html>
        <div>
        </div>