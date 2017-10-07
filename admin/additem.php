<? include('header.php') ?>

		<? $Categories = $Items_obj->getAllCategories();?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Додавання товару</h1>
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
							$Items_obj->addItem();
						} 
						?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Назва</label>
                                <input class="form-control" name="name">
                                <p class="help-block">До 100 символів.</p>
                            </div>
                            <div class="form-group">
                                <label>Ціна</label>
                                <input class="form-control" name="price">
                            </div>
							<div class="form-group">
                                <label>Кількість</label>
                                <input class="form-control" name="count">
                            </div>
							<div class="form-group">
                                <label>Категорія</label>
                                <select class="form-control" name="category_id">
									<? for($i=0;$i<$Categories['count'];$i++){ ?>
									<option value="<? echo $Categories[$i]['id']; ?>"><? echo $Categories[$i]['name']; ?></option>
									<? } ?>
                                </select>
                            </div>
							<div class="form-group">
                                <label>Короткий опис</label>
                                <textarea class="form-control" name="short_desc" rows="3"></textarea>
                            </div>
							<div class="form-group">
                                <label>Опис</label>
                                <textarea class="form-control" name="desc1" rows="3"></textarea>
                            </div>
							<div class="form-group">
                                <label>Короткі характеристики</label>
                                <textarea class="form-control" name="desc2" rows="3"></textarea>
                            </div>
							<div class="form-group">
                                <label>Усі характеристики</label>
                                <textarea class="form-control" name="desc3" rows="3"></textarea>
                            </div>
							<div class="form-group">
                                <label>Зображення</label>
								<br>
                                <input type="file" name="image">
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

