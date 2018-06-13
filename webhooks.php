<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<head>

  <title>Google Gauge - ThingSpeak</title>
<style type="text/css">
  body { background-color: #ffffff; }
</style>
  
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js'></script> 
<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script type='text/javascript'>

 var chart; 
 var charts;
 var data;

       google.load('visualization', '1', {packages:['gauge']});
       google.setOnLoadCallback(initChart);

 function displayData(point) {
 
  data.setValue(0, 0, 'Temp Dr');
  data.setValue(0, 1, point);
  chart.draw(data, options);
 
 }

 function loadData() {
 
  // variable for the data point
  var p;
 
               // ให้เปลี่ยนตัวเลข เป็น channel thingspeak เป็นของตัวเอง
  $.getJSON('https://api.thingspeak.com/channels/516462/feed/last.json?callback=?', function(data) {
  
  // get the data point
  p = data.field1;
 
  if (p)
  {
   //p = Math.round((p / 1023) * 100);
   displayData(p);
  }
 
  });
 
 }

 function initChart() {

  data = new google.visualization.DataTable();
  data.addColumn('string', 'Label');
  data.addColumn('number', 'Value');
  data.addRows(1);
         
         chart = new google.visualization.Gauge(document.getElementById('chart_div'));
         options = {width: 320, height: 320, redFrom: 40, redTo: 100,
             yellowFrom:25, yellowTo: 40, minorTicks: 5};
 
  loadData();

  setInterval('loadData()', 1500);
         
 }

</script>
  <body>
    <div id='chart_div' align="center"></div>
  </body>
</html> 
</HTML>
