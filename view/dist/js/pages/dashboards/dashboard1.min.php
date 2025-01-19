<?php

$query_total_cost_per_area = "SELECT development_area_name, total_cost FROM total_cost_per_area ";
$stmt_total_cost_per_area = $pdo->query($query_total_cost_per_area);
$data = [];
while ($row_total_cost_per_area = $stmt_total_cost_per_area->fetch(PDO::FETCH_ASSOC)) {
    $data_total_cost_per_area[] = "['{$row_total_cost_per_area['development_area_name']}', {$row_total_cost_per_area['total_cost']}]";
}
// Convert the PHP array to a JavaScript-compatible array
$total_cost_per_area = implode(',', $data_total_cost_per_area);

// New query to fetch data
$query_outcomes = "SELECT count(outcome_name) as count, outcome_name FROM `operational_plan_full` GROUP BY outcome_name";

$stmt_outcomes = $pdo->query($query_outcomes);
$data_outcomes = [];

// Fetch the query results and format them for JavaScript
while ($row_outcomes = $stmt_outcomes->fetch(PDO::FETCH_ASSOC)) {
    // Format each row as ['outcome_name', count]
    $data_outcomes[] = "['{$row_outcomes['outcome_name']}', {$row_outcomes['count']}]";
}

// Convert PHP array to JavaScript-compatible array
$outcomes_js_data = implode(',', $data_outcomes);

$query_count_by_remarks = "SELECT * FROM `count_by_remarks` ";
$stmt_count_by_remarks = $pdo->query($query_count_by_remarks);
$data = [];
while ($row_count_by_remarks = $stmt_count_by_remarks->fetch(PDO::FETCH_ASSOC)) {
    $data_count_by_remarks[] = "['{$row_count_by_remarks['remarks']}', {$row_count_by_remarks['remark_count']}]";
}
// Convert the PHP array to a JavaScript-compatible array
$total_count_by_remarks = implode(',', $data_count_by_remarks);




// Query the view to get quarterly sums
$query_quarterly_sums = "SELECT total_q1, total_q2, total_q3, total_q4 FROM operational_plan_quarterly_sums";
$stmt_quarterly_sums = $pdo->query($query_quarterly_sums);

// Initialize an array to store the sums
$quarterly_sums = [];

// Fetch the data
$row = $stmt_quarterly_sums->fetch(PDO::FETCH_ASSOC);
if ($row) {
    $quarterly_sums = [
        (int)$row['total_q1'],
        (int)$row['total_q2'],
        (int)$row['total_q3'],
        (int)$row['total_q4']
    ];
}
$highest_value = max($quarterly_sums);
    
// Add 1000 to the highest value
$highest_value_plus_1000_sums = $highest_value + 1000;


// Query the view to get quarterly sums
$query_quarterly_sums_bydname = "SELECT * FROM operational_plan_quarterly_sums_byd_name";
$stmt_quarterly_sums_bydname = $pdo->query($query_quarterly_sums_bydname);

// Initialize an array to store the sums
$quarterly_sums_bydname = [];
while ($row = $stmt_quarterly_sums_bydname->fetch(PDO::FETCH_ASSOC)) {
    $quarterly_sums_bydname[] = [
        $row['development_area_name'],
        (int)$row['total_q1'],
        (int)$row['total_q2'],
        (int)$row['total_q3'],
        (int)$row['total_q4']
    ];
}


// Query the month_year_costs view to get the monthly sums
$query_month_year_costs = "SELECT month_year, total_estimated_cost FROM month_year_costs";
$stmt_month_year_costs = $pdo->query($query_month_year_costs);

// Initialize arrays to store the months and costs
$months = [];
$costs = [];

// Fetch the data
while ($row = $stmt_month_year_costs->fetch(PDO::FETCH_ASSOC)) {
    $months[] = $row['month_year'];
    $costs[] = (float)$row['total_estimated_cost'];
}

// Find the highest value to set chart scale
$highest_value = max($costs);
$highest_value_plus_1000 = $highest_value + 1000;

?>


<script>



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
  bindto: "#campaign-v3",
  data: {
    columns: <?= json_encode($quarterly_sums_bydname) ?>,
    type: "line", // Line chart type
    tooltip: { show: true },
  },
  legend: { hide: true },
  color: { pattern: ["#C96868", "#5f76e8", "#ff4f70", "#01caf1", "#C96868"] },
});

d3.select("#campaign-v3 .c3-chart-arcs-title").style("font-family", "Rubik");

var e = {
  axisX: { showGrid: false },
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

  // Data prepared from PHP
var dataOutcomes = [
    <?php echo $outcomes_js_data; ?>
];

// Prepare data for the chart
var labels = [];
var counts = [];

dataOutcomes.forEach(function(item) {
    labels.push(item[0]); // Outcome name (X-axis)
    counts.push(item[1]); // Count of occurrences (Y-axis)
});

// Update the chart
new Chartist.Bar(
    ".net-income",
    {
        labels: labels, // Use dynamic labels from the query
        series: [counts] // Use dynamic counts from the query
    },
    {
        seriesBarDistance: 30,
        axisX: {
            labelInterpolationFnc: function(e) {
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
        labels: <?= json_encode($months) ?>, // Use months from PHP query
        series: [<?= json_encode($costs) ?>], // Use costs from PHP query
    },
    {
        low: 0,
        high: <?= $highest_value_plus_1000 ?>, // Adjusted high value for scale
        showArea: true,
        fullWidth: true,
        plugins: [Chartist.plugins.tooltip()],
        axisY: {
            onlyInteger: true,
            scaleMinSpace: 40,
            offset: 20,
            labelInterpolationFnc: function (e) {
                return e / 1000 + "k"; // Formatting as 'k' for thousands
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
