<script src="{{ asset('assets/back/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/back/js/waves.min.js') }}"></script>
<script src="{{ asset('assets/back/js/jquery.slimscroll.min.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('assets/back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/back/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('assets/back/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/back/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/back/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/back/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/back/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/back/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/back/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/back/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/back/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/back/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ asset('assets/back/pages/jquery.table-datatable.js') }}"></script>


<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable( {
            destroy: true,
            language: {
                url: '{{ asset("libs/datatable/fr.json") }}'
            }
        } );
    } );
</script>
