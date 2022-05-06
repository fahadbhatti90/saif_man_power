
    <!--**********************************
        Scripts
    ***********************************-->
    
    <script>
	    const urlPath = '{{ url("") }}';
	    const CSRF_TOKEN = '{{ csrf_token() }}';
	</script>

    <!-- Required vendors -->
    <script src="{{ asset('back_end/vendor/global/global.min.js') }}"></script>
	<!-- <script src="{{ asset('back_end/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script> -->
	<script src="{{ asset('back_end/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('back_end/js/custom.min.js') }}"></script>
	<script src="{{ asset('back_end/js/deznav-init.js') }}"></script>
	
	<!-- Counter Up -->
    <script src="{{ asset('back_end/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('back_end/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>	
		
	<!-- Apex Chart -->
	<script src="{{ asset('back_end/vendor/apexchart/apexchart.js') }}"></script>	
	
	<!-- Chart piety plugin files -->
	<script src="{{ asset('back_end/vendor/peity/jquery.peity.min.js') }}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{ asset('back_end/js/dashboard/dashboard-1.js') }}"></script>
	
	<!-- Jquery Validation -->
    <script src="{{ asset('back_end/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- Form validate init -->
    <script src="{{ asset('back_end/js/plugins-init/jquery.validate-init.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('back_end/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back_end/js/plugins-init/datatables.init.js') }}"></script>
	<script src="{{ asset('back_end/js/deznav-init.js') }}"></script>
	<script src="{{ asset('back_end/vendor/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('back_end/js/custom.min.js') }}"></script>
   <!--  <script type="text/javascript">
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
</script> -->
    <script src="{{ asset('back_end/custom/custom.js') }}"></script>


