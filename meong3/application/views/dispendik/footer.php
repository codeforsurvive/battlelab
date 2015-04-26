
	<footer>

		<p>
			<table width=700>
			
				<span style="text-align:left;float:left">&copy; Rapor Online Sidoarjo - Dinas Pendidikan Kabupaten Sidoarjo </span>
				<span style="text-align:right;float:right">
					<script type='text/javascript'>
                            <!--
                            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                            var date = new Date();
                            var day = date.getDate();
                            var month = date.getMonth();
                            var thisDay = date.getDay(),
                                thisDay = myDays[thisDay];
                            var yy = date.getYear();
                            var year = (yy < 1000) ? yy + 1900 : yy;
                            document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                            //-->
                        </script>
					<div id="clock"></div>
                        <script type="text/javascript">
                        <!--
                        function showTime() {
                            var a_p = "";
                            var today = new Date();
                            var curr_hour = today.getHours();
                            var curr_minute = today.getMinutes();
                            var curr_second = today.getSeconds();
                            if (curr_hour < 12) {
                                a_p = "AM";
                            } else {
                                a_p = "PM";
                            }
                            if (curr_hour == 0) {
                                curr_hour = 12;
                            }
                            if (curr_hour > 12) {
                                curr_hour = curr_hour - 12;
                            }
                            curr_hour = checkTime(curr_hour);
                            curr_minute = checkTime(curr_minute);
                            curr_second = checkTime(curr_second);
                         document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                            }

                        function checkTime(i) {
                            if (i < 10) {
                                i = "0" + i;
                            }
                            return i;
                        }
                        setInterval(showTime, 500);
                        //-->
                        </script>
				</span>
			</table>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="asset/dispendik/js/jquery-1.9.1.min.js"></script>
		<!--script src="asset/dispendik/js/jquery-migrate-1.0.0.min.js"></script-->
		<script src="asset/dispendik/js/jquery-ui-1.10.0.custom.min.js"></script>
		<script src="asset/dispendik/js/jquery.ui.touch-punch.js"></script>
		<script src="asset/dispendik/js/modernizr.js"></script>
		<script src="asset/dispendik/js/bootstrap.min.js"></script>
		<script src="asset/dispendik/js/jquery.cookie.js"></script>
		<script src='asset/dispendik/js/fullcalendar.min.js'></script>
		<script src='asset/dispendik/js/jquery.dataTables.min.js'></script>
		<script src="asset/dispendik/js/excanvas.js"></script>
		<script src="asset/dispendik/js/jquery.flot.js"></script>
		<script src="asset/dispendik/js/jquery.flot.pie.js"></script>
		<script src="asset/dispendik/js/jquery.flot.stack.js"></script>
		<script src="asset/dispendik/js/jquery.flot.resize.min.js"></script>
		<script src="asset/dispendik/js/jquery.chosen.min.js"></script>
		<script src="asset/dispendik/js/jquery.uniform.min.js"></script>
		<script src="asset/dispendik/js/jquery.cleditor.min.js"></script>
		<script src="asset/dispendik/js/jquery.noty.js"></script>
		<script src="asset/dispendik/js/jquery.elfinder.min.js"></script>
		<script src="asset/dispendik/js/jquery.raty.min.js"></script>
		<script src="asset/dispendik/js/jquery.iphone.toggle.js"></script>
		<script src="asset/dispendik/js/jquery.uploadify-3.1.min.js"></script>
		<script src="asset/dispendik/js/jquery.gritter.min.js"></script>
		<script src="asset/dispendik/js/jquery.imagesloaded.js"></script>
		<script src="asset/dispendik/js/jquery.masonry.min.js"></script>
		<script src="asset/dispendik/js/jquery.knob.modified.js"></script>
		<script src="asset/dispendik/js/jquery.sparkline.min.js"></script>
		<script src="asset/dispendik/js/counter.js"></script>
		<script src="asset/dispendik/js/retina.js"></script>
		<script src="asset/dispendik/js/custom.js"></script>
		<script src="asset/dispendik/js/cobatab.js" ></script>
		
	<!-- end: JavaScript-->
	
</body>
</html>
