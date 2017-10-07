<? include('header.php') ?>
<style>
.dataTables_filter{
	float:right;
}
</style>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Користувачі</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-md-12 table-responsive">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Користувачі 
                        </div>
						<? 

						$Users = $Users_obj->getAllUsers();
						
						?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							
							
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Нікнейм</th>
                                        <th>Справжнє ім'я</th>
                                        <th>Адреса</th>
                                        <th>E-mail</th>
                                        <th>Номер телефону</th>
                                        <th>Аватар</th>
                                    </tr>
                                </thead>
                                <tbody>
									
									<? for($i=0;$i<$Users['count'];$i++){ ?>
                                    <tr class="odd gradeX">
                                        <td>
											<center><? echo $Users[$i]['id']; ?></center>
										</td>
                                        <td>
											<? echo $Users[$i]['username']; ?>
										</td>
                                        <td>
											<? echo $Users[$i]['realname']; ?>
										</td>
										<td>
											<? echo $Users[$i]['addr1']; ?>
										</td>
										<td>
											<? echo $Users[$i]['email']; ?>
										</td>
										<td>
											<? echo $Users[$i]['number']; ?>
										</td>
										<td>
											<? echo $Users[$i]['avatar']; ?>
										</td>
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
