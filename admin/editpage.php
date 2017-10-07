<? include('header.php') ?>

		<? $Page = $Pages_obj->getPageById($_GET['id']); ?>
		<? $Menus = $Pages_obj->getAllMenus();?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Редагування сторінки <? echo $Page['name']; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-md-12 table-responsive">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Редагування
                        </div>
						<? 
						if(isset($_POST['submit'])){
							$Pages_obj->editPage($_GET['id']);
						} 
						?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Назва</label>
                                <input class="form-control" name="name" value="<? echo $Page['name']; ?>">
                            </div>
							<div class="form-group">
                                <label>Пункт меню</label>
                                <select class="form-control" name="menuid">
									<? for($i=0;$i<$Menus['count'];$i++){ ?>
									<option value="<? echo $Menus[$i]['mid']; ?>" <? if($Menus[$i]['mid']==$Page['menuid']){ echo 'selected';} ?>><? echo $Menus[$i]['mname']; ?></option>
									<? } ?>
                                </select>
                            </div>
							<div class="form-group">
                                <label>Вміст сторінки</label>
                                <textarea class="form-control" name="content" rows="3"><? echo $Page['content']; ?></textarea>
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
