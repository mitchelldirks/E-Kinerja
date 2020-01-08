<div id="container" style="width: 70%;">
<canvas id="chartMitchell3" height="100%"></canvas>
</div>
<script>
var ctx = document.getElementById('chartMitchell3').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Kurang','Cukup','Baik'],
        datasets: [{
            label: 'AHP Results',
            data: [<?php echo $ahpkurg.",".$ahpcuku.",".$ahpbaeklah; ?>],
            backgroundColor: [
                'rgba(201, 74, 74, 1)',
                'rgba(82, 189, 203, 1)',
                'rgba(86, 196, 59, 1)'
            ],
            borderColor: [
                'rgba(145, 43, 43, 1)',
                'rgba(45, 137, 149, 1)',
                'rgba(69, 157, 47, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>