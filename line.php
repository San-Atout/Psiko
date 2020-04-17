<?php include "db.php";?>
<html>
  <head>
    <script type="text/javascript" 
 src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Test de reflexe visuel', 'Test de température de la peau'],
          
          //PHP Code 
          <?php
              $query="select * from resultats";
              $res=mysqli_query($conn,$query);
              while($data=mysqli_fetch_array($res)){
                $year=$data['year'];
                $sale=$data['score1'];
                $expense=$data['score2'];
          ?>  
           ['<?php echo $year;?>',<?php echo $sale;?>,
<?php echo $expense;?>], 
          <?php      
              }

          ?> 
 
        ]);

        var options = {
          title: 'Résultats des tests pour un client lamba',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart 
(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
      
    <div id="curve_chart" style="height:800px","width:800px" ></div>
  </body>
</html>