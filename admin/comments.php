<? include('header.php') ?>
<style>
.dataTables_filter{
	float:right;
}
</style>
<?
	if(isset($_GET['delete'])){
		$Comments_obj->deleteComment($_GET['delete']);
	}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Коментарі</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-md-12 table-responsive">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Коментарі 
                        </div>
						<? 

						$Comments = $Comments_obj->getAllComments();
						
						?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<? if(isset($_POST['submit'])){
									$Comments_obj->editComment($_GET['edit']);
								} ?>
							<? if(isset($_GET['edit'])){ ?><form method="POST"><?}?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Текст</th>
                                        <th>ID товару</th>
                                        <th>Час</th>
                                        <th>Користувач</th>
                                        <th>Адміністрування</th>
                                    </tr>
                                </thead>
                                <tbody>
									
									<? for($i=0;$i<$Comments['count'];$i++){ ?>
                                    <tr class="odd gradeX">
                                        <td>
											<? echo $Comments[$i]['id']; ?>
										</td>
                                        <td>
											<? if($_GET['edit']==$Comments[$i]['id']){ ?><input type="text" class="form-control" name="text" value="<?}?><? echo $Comments[$i]['text']; ?><? if($_GET['edit']==$Comments[$i]['id']){ ?>"><? } ?>
											
										</td>
                                        <td>
											<? echo $Comments[$i]['item_id']; ?>
										</td>
										<td>
											<? echo $Comments[$i]['datetime']; ?>
										</td>
										<td>
											<? echo $Orders_obj->getUsername($Comments[$i]['user_id']); ?>
										</td>
										<td>
											<center>
												<? if($_GET['edit']==$Comments[$i]['id']){ ?>
													<button type="submit" class="btn btn-success" name="submit">Зберегти</button>
												<? }else{ ?>
													<a href="?edit=<? echo $Comments[$i]['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>		
													<a href="?delete=<? echo $Comments[$i]['id']; ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
												<? } ?>
											</center>
										</td>
                                    </tr>
                                    <? } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                             <? if(isset($_GET['edit'])){ ?></form><?}?>
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
