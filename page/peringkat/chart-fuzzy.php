<div id="container" style="width: 70%;">
<canvas id="chartMitchell2" height="100%"></canvas>
</div>
<script>
var ctx = document.getElementById('chartMitchell2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Kurang','Cukup','Baik'],
        datasets: [{
            label: 'Fuzzy Results',
            data: [<?php echo $kurg.",".$cuku.",".$baeklah; ?>],
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