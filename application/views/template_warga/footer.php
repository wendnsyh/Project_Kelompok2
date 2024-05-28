<!-- Footer -->
<footer class="sticky-footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Website Pendataan Warga</span>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>/assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>/assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>/assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>/assets/js/demo/chart-pie-demo.js"></script>

<script src="<?php echo base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function() {
        $('#data').DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "Belum ada data",
                "lengthMenu": "_MENU_ data",
                "search": "Cari:",
                "infoEmpty": "0 sampai 0 dari 0 data",
                "info": "_START_ sampai _END_ dari _TOTAL_ data",
            }
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $("#datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            setDate: new Date(),
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#nama").select2({
            placeholder: "Silahkan Pilih"
        });
        $("#nik").select2({
            placeholder: "Silahkan Pilih"
        });
        $("#nik2").select2({
            placeholder: "Silahkan Pilih"
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            // Tampilkan tombol pagination
            "paging": true
        });
    });
</script>

<script type="text/javascript">
    // Bar Chart Example
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Laki laki", "Perempuan"],
            datasets: [{
                label: "Berdasarkan Jenis Kelamin",
                backgroundColor: ['orange', 'green'], // Warna untuk Laki-laki dan Perempuan
                borderColor: ['orange', 'green'],
                hoverBackgroundColor: ['lightcoral', 'darkorange', 'lightgreen'], // Warna hover untuk "Berdasarkan Jenis Kelamin", Laki-laki, dan Perempuan
                hoverBorderColor: ['black', 'black', 'black'],
                data: [
                    <?php echo $this->db->query("select jenis_kelamin from penduduk where jenis_kelamin='Laki laki'")->num_rows(); ?>,
                    <?php echo $this->db->query("select jenis_kelamin from penduduk where jenis_kelamin='Perempuan'")->num_rows(); ?>,
                ],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },

        }
    });
</script>



</body>

</html>

</body>

</html>