<footer>
               
            </footer>
        </div>
    </div>
    <script>
    function confirmLogout(event) {
        event.preventDefault(); 
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan keluar dari sesi ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d31',
            confirmButtonText: 'Ya, keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo site_url('auth/login/logout'); ?>";
            }
        });
    }
</script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>


    <script src="<?php echo base_url('assets/admin/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/dist/assets/js/bootstrap.bundle.min.js'); ?>"></script>
    

    <script src="<?php echo base_url('assets/admin/dist/assets/js/main.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/dist/assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/dist/assets/vendors/simple-datatables/simple-datatables.js'); ?>"></script>
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>


<script>
    const transactions = <?php echo json_encode($transactions_per_month); ?>;
    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    const dataSeries = new Array(12).fill(0);
    transactions.forEach(item => {
        if (item.month >= 1 && item.month <= 12) {
            dataSeries[item.month - 1] = item.total; 
        }
    });

   
    const ctx = document.getElementById('chart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: months, 
            datasets: [{
                label: 'Jumlah Transaksi',
                data: dataSeries, 
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderRadius: 6, 
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false 
                },
                title: {
                    display: true,
                    text: 'Jumlah Transaksi per Bulan',
                    font: {
                        size: 18,
                        weight: 'bold'
                    },
                    padding: 20
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 14 
                        }
                    }
                },
                y: {
                    beginAtZero: true, 
                    grid: {
                        color: 'rgba(200, 200, 200, 0.5)', 
                        borderDash: [5, 5] 
                    },
                    ticks: {
                        font: {
                            size: 14 
                        }
                    }
                }
            }
        }
    });
</script>

<script>
    const labels = <?php echo $lapangan_labels; ?>;
    const data = <?php echo $lapangan_data; ?>;
    const colors = [
        'rgba(75, 192, 192, 0.8)', 
        'rgba(255, 99, 132, 0.8)', 
        'rgba(255, 206, 86, 0.8)', 
        'rgba(54, 162, 235, 0.8)', 
        'rgba(153, 102, 255, 0.8)', 
        'rgba(255, 159, 64, 0.8)' 
    ];

    const ctx1 = document.getElementById('chart2').getContext('2d');
    const myPieChart = new Chart(ctx1, {
        type: 'pie', 
        data: {
            labels: labels,
            datasets: [{
                label: 'Frekuensi Pemakaian Lapangan',
                data: data, 
                backgroundColor: colors, 
                borderWidth: 1,
                borderColor: '#fff' 
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        color: '#4e73df',
                        font: {
                            family: 'Poppins, sans-serif',
                            size: 12
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            return `${label}: ${value} kali`; 
                        }
                    },
                    backgroundColor: '#fff',
                    titleColor: '#4e73df',
                    bodyColor: '#858796',
                    borderColor: '#4e73df',
                    borderWidth: 1
                }
            },
           
            animation: {
                animateScale: true,
                animateRotate: true
            },
            aspectRatio: 1 
        }
    });
</script>









</body>

</html>