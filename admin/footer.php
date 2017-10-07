    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
	<script> 
$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            month: '2017-01',
            sells: <?  echo $Orders_obj->getItemsFraph('01'); ?>,
        }, {
            month: '2017-02',
            sells: <?  echo $Orders_obj->getItemsFraph('02'); ?>,
        }, {
            month: '2017-03',
            sells: <?  echo $Orders_obj->getItemsFraph('03'); ?>,
        }, {
            month: '2017-04',
            sells: <?  echo $Orders_obj->getItemsFraph('04'); ?>,
        }, {
            month: '2017-05',
            sells: <?  echo $Orders_obj->getItemsFraph('05'); ?>,
        }, {
            month: '2017-06',
            sells: <?  echo $Orders_obj->getItemsFraph('06'); ?>,
        }, {
            month: '2017-07',
            sells: <?  echo $Orders_obj->getItemsFraph('07'); ?>,
        }, {
            month: '2017-08',
            sells: <?  echo $Orders_obj->getItemsFraph('08'); ?>,
        }, {
            month: '2017-09',
            sells: <?  echo $Orders_obj->getItemsFraph('09'); ?>,
        }, {
            month: '2017-10',
            sells: <?  echo $Orders_obj->getItemsFraph('10'); ?>,
        }, {
            month: '2017-11',
            sells: <?  echo $Orders_obj->getItemsFraph('11'); ?>,
        }, {
            month: '2017-12',
            sells: <?  echo $Orders_obj->getItemsFraph('12'); ?>,
        }],
        xkey: 'month',
        ykeys: ['sells'],
        labels: ['Продажі'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });
    
});
</script> 

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
	
	
	<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

	<script>
	
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    
	</script>
</body>

</html> 