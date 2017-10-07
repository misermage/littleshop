<? include('header.php') ?>
<style>
.dataTables_filter{
	float:right;
}
</style>
<?
	if(isset($_GET['delete'])){
		$Items_obj->deleteCategory($_GET['delete']);
	}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Категорії  <a href="addcategory.php"><button type="button" class="btn btn-primary pull-right">Додати категорію</button></a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-md-12 table-responsive">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Категорії 
                        </div>
						<? 

						$Categories = $Items_obj->getAllCategories();
						
						?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<? if(isset($_POST['submit'])){
									$Items_obj->editCategory($_GET['edit']);
								} ?>
							<? if(isset($_GET['edit'])){ ?><form method="POST"><?}?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Назва</th>
                                        <th>Батьківська категорія</th>
                                        <th>Адміністрування</th>
                                    </tr>
                                </thead>
                                <tbody>
									
									<? for($i=0;$i<$Categories['count'];$i++){ ?>
                                    <tr class="odd gradeX">
                                        <td>
											<center><? echo $Categories[$i]['id']; ?></center>
										</td>
                                        <td>
											<? if($_GET['edit']==$Categories[$i]['id']){ ?><input type="text" class="form-control" name="name" value="<?}?><? echo $Categories[$i]['name']; ?><? if($_GET['edit']==$Categories[$i]['id']){ ?>"><? } ?>
										</td>
                                        <td>
											<center><? if($_GET['edit']==$Categories[$i]['id']){ ?>
											<select class="form-control" name="parent_id">
												<option value="0">Немає</option>
												<? for($k=0;$k<$Categories['count'];$k++){ ?>
												<option value="<? echo $Categories[$k]['id']; ?>" <? if($Categories[$k]['id']==$Categories[$i]['parent_id']){ echo 'selected';} ?>><? echo $Categories[$k]['name']; ?></option>
												<? } ?>
											</select>
											<?}else{ echo $Items_obj->getCatName($Categories[$i]['parent_id']); } ?></center>
										</td>
                                        <td>
											<center>
												<? if($_GET['edit']==$Categories[$i]['id']){ ?>
													<button type="submit" class="btn btn-success" name="submit">Зберегти</button>
												<? }else{ ?>
													<a href="?edit=<? echo $Categories[$i]['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>		
													<a href="?delete=<? echo $Categories[$i]['id']; ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
												<? } ?>
											</center>
										</td>
                                    </tr>
                                    <? } ?>
                                </tbody>
                            </table>
							<? if(isset($_GET['edit'])){ ?></form><?}?>
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
