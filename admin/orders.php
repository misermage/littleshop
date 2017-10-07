<? include('header.php') ?>
<style>
.dataTables_filter{
	float:right;
}
.gradeX{
	cursor:pointer;
}
</style>
<?
	if(isset($_GET['delete'])){
		$Orders_obj->deleleById($_GET['delete']);
	}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Замовлення</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-md-12 table-responsive">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Замовлення 
                        </div>
						<? 

						$Orders = $Orders_obj->getList();
						
						?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Користувач</th>
                                        <th>Дата замовлення</th>
                                        <th>Статус</th>
                                        <th>Сума до сплати</th>
                                    </tr>
                                </thead>
                                <tbody>
									<? for($i=0;$i<$Orders['count'];$i++){ ?>
                                    <tr class="odd gradeX" onclick="window.location.href='orderdetails.php?id=<? echo $Orders[$i]['id']; ?>'">
                                        <td><? echo $Orders[$i]['id']; ?></td>
                                        <td><? echo $Orders_obj->getUsername($Orders[$i]['user_id']); ?></td>
                                        <td><? echo $Orders[$i]['dateq']; ?></td>
                                        <td><? echo $Orders[$i]['name']; ?></td>
                                        <td><? echo $Orders[$i]['suma']; ?> грн</td>
                                    </tr>
                                    <? } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
				</div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	  <!-- DataTables JavaScript -->
    
<? include('footer.php'); ?>
