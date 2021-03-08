$(document).ready(function(){
  if(document.getElementById('Chart')){
    var labels = $('#labelsChart').val();
    labels = labels.replace("[",'');
    labels = labels.replace("]",'');
    labels = labels.split(",");
    var data = $('#dataChart').val();
    data = data.replace("[",'');
    data = data.replace("]",'');
    data = data.split(",");
    var id = $("#idChart").val()
      let myChart = document.getElementById(id).getContext('2d');
        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 13;
        Chart.defaults.global.defaultFontColor = '#777';
        let massPopChart = new Chart(myChart, {
            type: 'line',
            data: {
              labels  : labels,
              datasets: [
                {
                  label               : 'Revenue',
                  fill                : false,
                  borderWidth         : 2,
                  lineTension         : 0.2,
                  spanGaps : true,
                  borderColor         : '#efefef',
                  pointRadius         : 2,
                  pointHoverRadius    : 7,
                  pointColor          : '#efefef',
                  pointBackgroundColor: '#efefef',
                  hoverBorderWidth: 2,
                  hoverBorderColor: 'red',
                  data                : data
                },
              ]
            },
            options: {
              maintainAspectRatio : false,
              responsive : true,
              legend: {
                display: false,
              },
              scales: {
                xAxes: [{
                  ticks : {
                    fontColor: '#efefef',
                  },
                  gridLines : {
                    display : false,
                    color: '#efefef',
                    drawBorder: false,
                  }
                }],
                yAxes: [{
                  ticks : {
                    stepSize: 0,
                    fontColor: '#efefef',
                  },
                  gridLines : {
                    display : true,
                    color: '#efefef',
                    drawBorder: false,
                  }
                }]
              }
            }  
        });
  }      
})  

$(document).ready(function(){
if(document.getElementById('SaleChart')){  
    var labels = $('#labelsChart').val();
      labels = labels.replace("[",'');
      labels = labels.replace("]",'');
      labels = labels.split(",");
    var data = $('#dataChart').val();
      data = data.replace("[",'');
      data = data.replace("]",'');
      data = data.split(",");
    var dataOff = $('#dataChartOff').val();
      dataOff = dataOff.replace("[",'');
      dataOff = dataOff.replace("]",'');
      dataOff = dataOff.split(",");
    var dataSM = $('#dataChartSM').val();
      dataSM = dataSM.replace("[",'');
      dataSM = dataSM.replace("]",'');
      dataSM = dataSM.split(",");
    var dataWeb = $('#dataChartWeb').val();
      dataWeb = dataWeb.replace("[",'');
      dataWeb = dataWeb.replace("]",'');
      dataWeb = dataWeb.split(",");  
    var id = $("#idChart").val()
      let myChart = document.getElementById(id).getContext('2d');

        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 13;
        Chart.defaults.global.defaultFontColor = '#17a2b8';
        let massPopChart = new Chart(myChart, {
            type: 'line',
            data: {
              labels  : labels,
              datasets: [
                {
                  label               : 'Total',
                  type                :'bar',
                  fill                : false,
                  borderWidth         : 1,
                  lineTension         : 0.2,
                  spanGaps : true,
                  borderColor         : '#17a2b8',
                  pointRadius         : 2,
                  pointHoverRadius    : 7,
                  hoverBorderWidth: 2,
                  hoverBorderColor: 'red',
                  data                : data
                },
                {
                  label               : 'In-Store',
                  fill                : false,
                  borderWidth         : 3,
                  lineTension         : 0.2,
                  spanGaps : true,
                  borderColor         : '#ffc000',
                  pointRadius         : 2,
                  pointHoverRadius    : 7,
                  hoverBorderWidth: 3,
                  pointColor          : '#ffc000',
                  pointBackgroundColor: '#ffc000',
                  data                : dataOff
                },
                {
                  label               : 'Social Media',
                  fill                : false,
                  borderWidth         : 3,
                  lineTension         : 0.2,
                  spanGaps : true,
                  borderColor         : '#ed7d31',
                  pointRadius         : 2,
                  pointHoverRadius    : 7,
                  pointColor          : '#ed7d31',
                  pointBackgroundColor: '#ed7d31',
                  data                : dataSM
                },
                {
                  label               : 'Web',
                  fill                : false,
                  borderWidth         : 3,
                  lineTension         : 0.2,
                  spanGaps : true,
                  borderColor         : '#5b9bd5',
                  pointRadius         : 2,
                  pointHoverRadius    : 7,
                  pointColor          : '#5b9bd5',
                  pointBackgroundColor: '#5b9bd5',
                  data                : dataWeb
                },
                
              ]
            },
            options: {
              maintainAspectRatio : false,
              responsive : true,
              legend: {
                display: true,
                position: 'right',
                labels: {
                    fontColor: '#17a2b8',
                    fontSize:20 ,
                }
              },
              scales: {
                xAxes: [{
                  ticks : {
                    fontColor: '#17a2b8',
                  },
                  gridLines : {
                    stepSize: 30,
                    display : true,
                    color: '#e5e5e5',
                    drawBorder: false,
                  }
                }],
                yAxes: [{
                  ticks : {
                    stepSize: 0,
                    fontColor: '#17a2b8',
                  },
                  gridLines : {
                    display : true,
                    color: '#e5e5e5',
                    drawBorder: false,
                  }
                }],
                tooltips: {
                  enabled: true
                }
              }
            }  
        });
  }      
}) 
