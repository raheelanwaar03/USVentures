<script src="{{ asset('admin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/src/waves/waves.min.js') }}"></script>
<script src="{{ asset('admin/app.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{ asset('admin/plugins/src/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/dashboard/dash_1.js') }}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true
        });

        const sidebar = document.querySelector('.sidebar');
        const toggleBtn = document.querySelector('.toggle-sidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    });
</script>
</body>
</html>
