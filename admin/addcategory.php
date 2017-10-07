<? include('header.php') ?>

		<? $Categories = $Items_obj->getAllCategories();?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Додавання категорії</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-md-12 table-responsive">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Додавання
                        </div>
						<? 
						if(isset($_POST['submit'])){
							$Items_obj->addCategory();
						} 
						?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Назва</label>
                                <input class="form-control" name="name">
                            </div>
							<div class="form-group">
                                <label>Батьківська категорія</label>
                                <select class="form-control" name="parent_id">
									<option value="0">Немає</option>
									<? for($i=0;$i<$Categories['count'];$i++){ ?>
									<option value="<? echo $Categories[$i]['id']; ?>"><? echo $Categories[$i]['name']; ?></option>
									<? } ?>
                                </select>
                            </div>
							<button type="submit" class="btn btn-default" name="submit">Зберегти</button>
							</form>
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

