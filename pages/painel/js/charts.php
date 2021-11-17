<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<?php 
    $paymentsChart = \MySql::connect()->prepare("SELECT * FROM `payments` ORDER BY created");
    $paymentsChart->execute();  
    $paymentsChart = $paymentsChart->fetchAll();
    foreach($paymentsChart as $key => $value){
        $getDate[] = date('M', strtotime($value['created']));
        $sum = array('Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0, 'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0);
        $year = date('Y');

        if(in_array('Jan', $getDate)){
            $jan = \MySql::connect()->prepare("SELECT * FROM `payments` WHERE `created` BETWEEN '$year-01-01' AND '$year-01-31'");
            $jan->execute();
            $jan = $jan->fetchAll();
            foreach($jan as $value){
                $sum['Jan'] += $value['amount'];
            }
        }
        if(in_array('Feb', $getDate)){
          $feb = \MySql::connect()->prepare("SELECT * FROM `payments` WHERE `created` BETWEEN '$year-02-01' AND '$year-02-31'");
          $feb->execute();
          $feb = $feb->fetchAll();
          foreach($feb as $value){
              $sum['Feb'] += $value['amount'];
          }
      }
        if(in_array('Mar', $getDate)){
          $mar = \MySql::connect()->prepare("SELECT * FROM `payments` WHERE `created` BETWEEN '$year-03-01' AND '$year-03-31'");
          $mar->execute();
          $mar = $mar->fetchAll();
          foreach($mar as $value){
              $sum['Mar'] += $value['amount'];
          }
      }
        if(in_array('Apr', $getDate)){
          $apr = \MySql::connect()->prepare("SELECT * FROM `payments` WHERE `created` BETWEEN '$year-04-01' AND '$year-04-31'");
          $apr->execute();
          $apr = $apr->fetchAll();
          foreach($apr as $value){
              $sum['Apr'] += $value['amount'];
          }
      }
        if(in_array('May', $getDate)){
          $may = \MySql::connect()->prepare("SELECT * FROM `payments` WHERE `created` BETWEEN '$year-05-01' AND '$year-05-31'");
          $may->execute();
          $may = $may->fetchAll();
          foreach($may as $value){
              $sum['May'] += $value['amount'];
          }
      }
        if(in_array('Jun', $getDate)){
          $jun = \MySql::connect()->prepare("SELECT * FROM `payments` WHERE `created` BETWEEN '$year-06-01' AND '$year-06-31'");
          $jun->execute();
          $jun = $jun->fetchAll();
          foreach($jun as $value){
              $sum['Jun'] += $value['amount'];
          }
        }
        if(in_array('Jul', $getDate)){
          $jul = \MySql::connect()->prepare("SELECT * FROM `payments` WHERE `created` BETWEEN '$year-07-01' AND '$year-07-31'");
          $jul->execute();
          $jul = $jul->fetchAll();
          foreach($jul as $value){
              $sum['Jul'] += $value['amount'];
          }
        }
        if(in_array('Aug', $getDate)){
          $aug = \MySql::connect()->prepare("SELECT * FROM `payments` WHERE `created` BETWEEN '$year-08-01' AND '$year-08-31'");
          $aug->execute();
          $aug = $aug->fetchAll();
          foreach($aug as $value){
              $sum['Aug'] += $value['amount'];
          }
        }
        if(in_array('Sep', $getDate)){
          $sep = \MySql::connect()->prepare("SELECT * FROM `payments` WHERE `created` BETWEEN '$year-09-01' AND '$year-09-31'");
          $sep->execute();
          $sep = $sep->fetchAll();
          foreach($sep as $value){
              $sum['Sep'] += $value['amount'];
          }
        }
        if(in_array('Oct', $getDate)){
          $oct = \MySql::connect()->prepare("SELECT * FROM `payments` WHERE `created` BETWEEN '$year-10-01' AND '$year-10-31'");
          $oct->execute();
          $oct = $oct->fetchAll();
          foreach($oct as $value){
              $sum['Oct'] += $value['amount'];
          }
        }
        if(in_array('Nov', $getDate)){
          $nov = \MySql::connect()->prepare("SELECT * FROM `payments` WHERE `created` BETWEEN '$year-11-01' AND '$year-11-31'");
          $nov->execute();
          $nov = $nov->fetchAll();
          foreach($nov as $value){
              $sum['Nov'] += $value['amount'];
          }
        }
        if(in_array('Dec', $getDate)){
          $dec = \MySql::connect()->prepare("SELECT * FROM `payments` WHERE `created` BETWEEN '$year-12-01' AND '$year-12-31'");
          $dec->execute();
          $dec = $dec->fetchAll();
          foreach($dec as $value){
              $sum['Dec'] += $value['amount'];
          }
        }

        echo $sum['Oct'];
      }
?>
<script>
    var options = {
  chart: {
    height: 150,
    type: "radialBar",
  },

  series: [<?php  $totalVisits = \controller\siteController::countVisits(); echo count($totalVisits); ?>],
  colors: ["#20E647"],
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "70%",
        background: "transparent"
      },
      track: {
        dropShadow: {
          enabled: true,
          top: 2,
          left: 0,
          blur: 4,
          opacity: 0.15
        }
      },
      dataLabels: {
        name: {
          offsetY: -10,
          color: "#fff",
          fontSize: "12px"
        },
        value: {
          color: "#fff",
          fontSize: "20px",
          show: true
        }
      }
    }
  },
  fill: {
    type: "gradient",
    gradient: {
      shade: "dark",
      type: "vertical",
      gradientToColors: ["#77b9ac"],
      stops: [0, 100]
    }
  },
  stroke: {
    lineCap: "round"
  },
  labels: ["Visitas"]
};

var chart = new ApexCharts(document.getElementById("chart"), options);

chart.render();
</script>

<script>
var options = {
  chart: {
    height: 230,
    type: "area"
  },
  dataLabels: {
    enabled: false
  },
  series: [
    {
      name: "Series 1",
      data: [<?php echo $sum['Jan']; echo ', '.$sum['Feb']; echo ', '.$sum['Mar']; echo ', '.$sum['Apr']; echo ', '.$sum['May']; echo ', '.$sum['Jun']; echo ', '.$sum['Jul']; echo ', '.$sum['Aug']; echo ', '.$sum['Sep']; echo ', '.$sum['Oct']; echo ', '.$sum['Nov']; echo ', '.$sum['Dec']; ?>]
    }
  ],
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.7,
      opacityTo: 0.9,
      stops: [0, 90, 100],
      colorStops: [
        {
          offset: 0,
          color: "#1a242a",
          opacity: 1
        },
        {
          offset: 20,
          color: "#242333",
          opacity: 1
        },
        {
          offset: 60,
          color: "#1a1c22",
          opacity: 1
        },
        {
          offset: 100,
          color: "#231a34",
          opacity: 1
        }
      ]
    }
  },
  grid: {
    show: false,  
    },
  xaxis: {
    categories: [
      'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ]
  },
};

var chart = new ApexCharts(document.querySelector("#chartMy"), options);

chart.render();


</script>