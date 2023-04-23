<head>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Orders Products Count"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		//yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: <?php echo $getproductname[0]['count']; ?>, label: "<?php echo $getproductname[0]['product_name']; ?>"},
			{y: <?php echo $getproductname[1]['count']; ?>, label: "<?php echo $getproductname[1]['product_name']; ?>"},
			{y: <?php echo $getproductname[2]['count']; ?>, label: "<?php echo $getproductname[2]['product_name']; ?>"}
		]
	}]
});
chart.render();

}
</script>

@extends('layouts.adminLayout.admin_design')
@section('content')

 <div class="content-wrapper">


  <section class="content">
    <div class="container-fluid">
      <div class="widget-content nopadding">
  
    <hr>

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Orders Product Reporting</h5>
          </div>
          <div class="widget-content nopadding">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
  </section>

</div>


@endsection