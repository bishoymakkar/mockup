
// this is javascript file for chart task.

function drawChart() {


        var dashboard = new google.visualization.Dashboard(
          document.getElementById('programmatic_dashboard_div'));

        // We omit "var" so that programmaticSlider is visible to changeRange.
        programmaticSlider = new google.visualization.ControlWrapper({
          'controlType': 'DateRangeFilter',
          'containerId': 'programmatic_control_div',
          'options': {
            
            'filterColumnLabel': 'Date',
            'ui': {'labelStacking': 'vertical'}
          }
        });


       programmaticChart  = new google.visualization.ChartWrapper({
        'chartType': 'AnnotationChart',
        'containerId': 'programmatic_chart_div',
        'options': {
          
          'width': 800,
          'height': 300,
           'chartArea': {'left': 15, 'top': 15, 'right': 0, 'bottom': 0},
            'trendlines': { 2: {} }
        }
      });
  
         var jsonData = 
         $.ajax({
          url: base_url + 'index.php/chart/getVal',
          dataType:"json",
          async: false
          }).responseText;

         console.log(jsonData);
          
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
      //var options = {width:1500,height:500, pointSize: 0.5 };




// programmaticButton = new google.visualization.ControlWrapper({
//            controlType: 'CategoryFilter',
//         containerId: 'programmatic_button',
//         dataTable: data,
//         options: {
//             filterColumnLabel: 'Date',
//             ui: {
//               sortValues:true,
//                 labelStacking: 'vertical',
//                 allowTyping: false,
//                 allowMultiple: true
//             }
//         },
//         });

      dashboard.bind([programmaticSlider],programmaticChart);
      dashboard.draw(data);
    }

    function changeRange() {
                programmaticSlider.setState();
                programmaticSlider.draw();
              }

             