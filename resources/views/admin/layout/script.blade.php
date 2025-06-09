<!-- Bootstrap JS -->
<script src="{{ url('rocker/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ url('rocker/assets/js/jquery.min.js') }}"></script>
<script src="{{ url('rocker/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ url('rocker/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ url('rocker/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ url('rocker/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ url('rocker/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ url('rocker/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
<script src="{{ url('rocker/assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
<script src="{{ url('rocker/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
<!--Morris JavaScript -->
<script src="{{ url('rocker/assets/plugins/raphael/raphael-min.js') }}"></script>
<script src="{{ url('rocker/assets/plugins/morris/js/morris.js') }}"></script>
<script src="{{ url('rocker/assets/js/index2.js') }}"></script>
<!--app JS-->
<script src="{{ url('rocker/assets/js/app.js') }}"></script>
<script src="{{ url('rocker/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
<script src="{{ url('rocker/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('rocker/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ url('rocker/assets/plugins/select2/js/select2.min.js') }}"></script>
<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>
@yield('script')