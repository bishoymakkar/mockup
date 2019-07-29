
// this is javascript file for chart task.

function drawChart() {


        var dashboard = new google.visualization.Dashboard(
          document.getElementById('programmatic_dashboard_div'));

        // We omit "var" so that programmaticSlider is visible to changeRange.
        programmaticSlider = new google.visualization.ControlWrapper({
          'controlType': 'ChartRangeFilter',
        'containerId': 'programmatic_control_div',
       'options': {
            'filterColumnIndex': 0,
           'ui': {
                'chartOptions': {
                    'height': 50,
                    'width': 600,
                    'chartArea': {
                        'width': '80%'
                    }
                },
                'chartView': {
                    'columns': [0, 1]
                }
            }
        }
        });


       programmaticChart  = new google.visualization.ChartWrapper({
        'chartType': 'ComboChart',
        'containerId': 'programmatic_chart_div',
        'options':{
        
      vAxis: {title: 'Value'},
      hAxis: {title: 'Date'},
      seriesType: 'annotation',
      series: {2: {type: 'line'}},
        
      }
      });
  
         var jsonData = 
         $.ajax({
          url: base_url + 'index.php/chart/getVal',
          dataType:"json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
     

      //var options = {width:1500,height:500, pointSize: 0.5 };

      dashboard.bind([programmaticSlider],programmaticChart);
      dashboard.draw(data);
    }

    function changeRange() {
                programmaticSlider.setState();
                programmaticSlider.draw();
              }

             