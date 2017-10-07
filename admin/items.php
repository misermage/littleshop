<? include('header.php') ?>
<style>
.dataTables_filter{
	float:right;
}
</style>
<?
	if(isset($_GET['delete'])){
		$Items_obj->deleleById($_GET['delete']);
	}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Товари  <a href="additem.php"><button type="button" class="btn btn-primary pull-right">Додати товар</button></a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-md-12 table-responsive">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Товари 
                        </div>
						<? 

						$Item = $Items_obj->getList();
						
						?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва</th>
                                        <th>Ціна</th>
                                        <th>Кількість</th>
                                        <th>Категорія</th>
                                        <th>Адміністрування</th>
                                    </tr>
                                </thead>
                                <tbody>
									<? for($i=0;$i<$Item['count'];$i++){ ?>
                                    <tr class="odd gradeX">
                                        <td><center><? echo $Item[$i]['id']; ?></center></td>
                                        <td><? echo $Item[$i]['name']; ?></td>
                                        <td><center><? echo $Item[$i]['price']; ?> грн</center></td>
                                        <td><center><? echo $Item[$i]['count']; ?></center></td>
                                        <td><? echo $Items_obj->getCategoryList($Item[$i]['category_id']); ?></td>
                                        <td><center><a href="edititem.php?id=<? echo $Item[$i]['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>		<a href="?delete=<? echo $Item[$i]['id']; ?>"><i class="fa fa-minus" aria-hidden="true"></i></a></center></td>
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
