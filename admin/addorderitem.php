<? include('header.php') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Додавання товару до замовлення №<? echo $_GET['id']; ?></h1>
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
							$Orders_obj->addOrderItem($_GET['id']);
						} 
						?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>ID товару</label>
                                <input class="form-control" name="item_id">
                            </div>
							<div class="form-group">
                                <label>Кількість</label>
                                <input class="form-control" name="count">
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

