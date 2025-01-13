<?php

$query_total_cost_per_area = "SELECT development_area_name, total_cost FROM total_cost_per_area ";
$stmt_total_cost_per_area = $pdo->query($query_total_cost_per_area);
$data = [];
while ($row_total_cost_per_area = $stmt_total_cost_per_area->fetch(PDO::FETCH_ASSOC)) {
    $data_total_cost_per_area[] = "['{$row_total_cost_per_area['development_area_name']}', {$row_total_cost_per_area['total_cost']}]";
}
// Convert the PHP array to a JavaScript-compatible array
$total_cost_per_area = implode(',', $data_total_cost_per_area);

$query_accomplishments_vs_variance = "
    SELECT * FROM `target_vs_actual_cost`
";

$stmt_accomplishments_vs_variance = $pdo->query($query_accomplishments_vs_variance);
$data_accomplishments_vs_variance = [];

while ($row_accomplishments_vs_variance = $stmt_accomplishments_vs_variance->fetch(PDO::FETCH_ASSOC)) {
    // Add each row to the data array, formatted as a JavaScript-compatible array
    $data_accomplishments_vs_variance[] = "['{$row_accomplishments_vs_variance['development_area']}', {$row_accomplishments_vs_variance['target_cost']}, {$row_accomplishments_vs_variance['actual_cost']}]";
}

// Convert the PHP array to a JavaScript-compatible array
$accomplishments_vs_variance = implode(',', $data_accomplishments_vs_variance);


$query_count_by_remarks = "SELECT * FROM `count_by_remarks` ";
$stmt_count_by_remarks = $pdo->query($query_count_by_remarks);
$data = [];
while ($row_count_by_remarks = $stmt_count_by_remarks->fetch(PDO::FETCH_ASSOC)) {
    $data_count_by_remarks[] = "['{$row_count_by_remarks['remarks']}', {$row_count_by_remarks['remark_count']}]";
}
// Convert the PHP array to a JavaScript-compatible array
$total_count_by_remarks = implode(',', $data_count_by_remarks);

?>


<script>

var dataAccomplishmentsVsVariance = [
    <?php echo $accomplishments_vs_variance; ?>
];

// Prepare data for the radar chart
var labels = [];
var accomplishments = [];
var variances = [];

dataAccomplishmentsVsVariance.forEach(function(item) {
    labels.push(item[0]); // Development area (X-axis)
    accomplishments.push(item[1]); // Total accomplishments (Y-axis)
    variances.push(item[2]); // Total variance (Y-axis)
});



const dataColumns = [
    <?php echo $total_cost_per_area; ?>
  ];


  const dataRemarks = [
    <?php echo $total_count_by_remarks; ?>
  ];


$(function () {
  c3.generate({
    bindto: "#campaign-v2",
    data: {
      columns: dataColumns,
      type: "bar",
      tooltip: { show: !0 },
    },
    donut: { label: { show: !1 }, title: "Sales", width: 18 },
    legend: { hide: !0 },
    color: { pattern: ["#C96868", "#5f76e8", "#ff4f70", "#01caf1", "#C96868" ] },
  });
  d3.select("#campaign-v2 .c3-chart-arcs-title").style("font-family", "Rubik");
  var e = {
    axisX: { showGrid: !1 },
    seriesBarDistance: 1,
    chartPadding: { top: 15, right: 15, bottom: 5, left: 0 },
    plugins: [Chartist.plugins.tooltip()],
    width: "100%",
  };


  c3.generate({
    bindto: ".remarks",
    data: {
      columns: dataRemarks,
      type: "pie",
      tooltip: { show: !0 },
    },
    donut: { label: { show: !1 }, title: "Sales", width: 18 },
    legend: { hide: !0 },
    color: { pattern: ["#C96868", "#5f76e8", "#ff4f70", "#01caf1", "#C96868" ] },
  });

  new Chartist.Bar(
  ".net-income",
  {
    labels: ["Economic Development", "Education Quality", "Environmental Sustainability", "Healthcare Improvement", "Infrastructure Development"],
    series: [
      accomplishments,
      variances
    ]
  },
  {
    seriesBarDistance: 30,
    axisX: {
      labelInterpolationFnc: function (e) {
        return e;
      }
    },
   
    plugins: [
      Chartist.plugins.tooltip() // Enable tooltips on hover
    ]
  }
),
    jQuery("#visitbylocate").vectorMap({
      map: "world_mill_en",
      backgroundColor: "transparent",
      borderColor: "#000",
      borderOpacity: 0,
      borderWidth: 0,
      zoomOnScroll: !1,
      color: "#d5dce5",
      regionStyle: {
        initial: {
          fill: "#d5dce5",
          "stroke-width": 1,
          stroke: "rgba(255, 255, 255, 0.5)",
        },
      },
      enableZoom: !0,
      hoverColor: "#bdc9d7",
      hoverOpacity: null,
      normalizeFunction: "linear",
      scaleColors: ["#d5dce5", "#FFB26F"],
      selectedColor: "#bdc9d7",
      selectedRegions: [],
      showTooltip: !0,
      onRegionClick: function (e, t, o) {
        var a =
          'You clicked "' + o + '" which has the code: ' + t.toUpperCase();
        alert(a);
      },
    });

jQuery("#visitbylocate").vectorMap({
  map: "world_mill_en",
  backgroundColor: "transparent",
  borderColor: "#000",
  borderOpacity: 0,
  borderWidth: 0,
  zoomOnScroll: false,
  color: "#d5dce5",
  regionStyle: {
    initial: {
      fill: "#d5dce5",
      "stroke-width": 1,
      stroke: "rgba(255, 255, 255, 0.5)",
    },
  },
  enableZoom: true,
  hoverColor: "#bdc9d7",
  hoverOpacity: null,
  normalizeFunction: "linear",
  scaleColors: ["#d5dce5", "#d5dce5"],
  selectedColor: "#bdc9d7",
  selectedRegions: [],
  showTooltip: true,
  onRegionClick: function (e, t, o) {
    var a =
      'You clicked "' + o + '" which has the code: ' + t.toUpperCase();
    alert(a);
  },
});

  var t = new Chartist.Line(
    ".stats",
    {
      labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      series: [[11, 10, 15, 21, 14, 23, 12]],
    },
    {
      low: 0,
      high: 28,
      showArea: !0,
      fullWidth: !0,
      plugins: [Chartist.plugins.tooltip()],
      axisY: {
        onlyInteger: !0,
        scaleMinSpace: 40,
        offset: 20,
        labelInterpolationFnc: function (e) {
          return e / 1 + "k";
        },
      },
    }
  );
  
  t.on("draw", function (e) {
    "area" === e.type && e.element.attr({ x1: e.x1 + 0.001 });
  }),
    t.on("created", function (e) {
      e.svg
        .elem("defs")
        .elem("linearGradient", { id: "gradient", x1: 0, y1: 1, x2: 0, y2: 0 })
        .elem("stop", { offset: 0, "stop-color": "rgba(255, 255, 255, 1)" })
        .parent()
        .elem("stop", { offset: 1, "stop-color": "rgba(80, 153, 255, 1)" });
    }),
    $(window).on("resize", function () {
      t.update();
    });
});
</script>
