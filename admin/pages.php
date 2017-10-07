<? include('header.php') ?>
<style>
.dataTables_filter{
	float:right;
}
</style>
<?
	if(isset($_GET['delete'])){
		$Pages_obj->delelePageById($_GET['delete']);
	}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Сторінки сайту<a href="addpage.php"><button type="button" class="btn btn-primary pull-right">Додати сторінку</button></a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-md-6 table-responsive">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Сторінки 
                        </div>
						<? 

						$Pages = $Pages_obj->getList();
						
						?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Назва</th>
                                        <th>Пункт меню</th>
                                        <th>Дата</th> 
                                        <th>Адміністрування</th>
                                    </tr>
                                </thead>
                                <tbody>
									<? for($i=0;$i<$Pages['count'];$i++){ ?>
                                    <tr class="odd gradeX">
                                        <td><center><? echo $Pages[$i]['id']; ?></center></td>
                                        <td><? echo $Pages[$i]['name']; ?></td>
                                        <td><? echo $Pages[$i]['mname']; ?></td>
                                        <td><? echo $Pages[$i]['datetime']; ?></td>
                                        <td><center><a href="editpage.php?id=<? echo $Pages[$i]['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>		<a href="?delete=<? echo $Pages[$i]['id']; ?>"><i class="fa fa-minus" aria-hidden="true"></i></a></center></td>
                                    </tr>
                                    <? } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
					
				</div>
				
				<div class="col-md-6 table-responsive">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Меню 
                        </div>
						<? 

						$Pages = $Pages_obj->getList();
						
						?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<? $Menus = $Pages_obj->getAllMenus();?>
							<? if(isset($_POST['submit'])){
								$Pages_obj->editMenus();
								
							} ?>
							<form method="POST">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tr>
									<th>Пункт №1</th>
									<td><input type="text" name="menu1" class="form-control" value="<? echo $Menus[0]['mname']; ?>"></td>
								</tr>
								<tr>
									<th>Пункт №2</th>
									<td><input type="text" name="menu2" class="form-control" value="<? echo $Menus[1]['mname']; ?>"></td>
								</tr>
								<tr>
									<th>Пункт №3</th>
									<td><input type="text" name="menu3" class="form-control" value="<? echo $Menus[2]['mname']; ?>"></td>
								</tr>
                            </table>
							<button type="submit" class="btn btn-default" name="submit">Зберегти</button>
							</form>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
				</div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	  <!-- DataTables JavaScript -->
    
<? include('footer.php'); ?>
