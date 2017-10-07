<? include('header.php') ?>

	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Редагування основної інформації</h1>
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
							$Siteinfo_obj->editData();
						} 
						?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Назва сайту</label>
                                <input class="form-control" name="sitename" value="<? echo $Siteinfo['sitename']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Адреса</label>
                                <input class="form-control" name="address" value="<? echo $Siteinfo['address']; ?>">
                            </div>
							<div class="form-group">
                                <label>Номер телефону</label>
                                <input class="form-control" name="telephone" value="<? echo $Siteinfo['telephone']; ?>">
                            </div>
							<div class="form-group">
                                <label>E-mail</label>
                                <input class="form-control" name="mail" value="<? echo $Siteinfo['mail']; ?>">
                            </div>
							<div class="form-group">
                                <label>Сайт</label>
                                <input class="form-control" name="site" value="<? echo $Siteinfo['site']; ?>">
                            </div>
							<div class="form-group">
                                <label>Робочі години</label>
                                <input class="form-control" name="hours_of_work" value="<? echo $Siteinfo['hours_of_work']; ?>">
                            </div>
							<div class="form-group">
                                <label>Посилання на місце знаходження Google Maps</label>
                                <input class="form-control" name="google_maps" value="<? echo $Siteinfo['google_maps']; ?>">
                            </div>
							<div class="form-group">
                                <label>Facebook</label>
                                <input class="form-control" name="facebook" value="<? echo $Siteinfo['facebook']; ?>">
                            </div>
							<div class="form-group">
                                <label>Google</label>
                                <input class="form-control" name="google" value="<? echo $Siteinfo['google']; ?>">
                            </div>
							<div class="form-group">
                                <label>Вконтакті</label>
                                <input class="form-control" name="vk" value="<? echo $Siteinfo['vk']; ?>">
                            </div>
							<div class="form-group">
                                <label>Twitter</label>
                                <input class="form-control" name="twitter" value="<? echo $Siteinfo['twitter']; ?>">
                            </div>
							<div class="form-group">
                                <label>Youtube</label>
                                <input class="form-control" name="youtube" value="<? echo $Siteinfo['youtube']; ?>">
                            </div>
							
							<div class="form-group">
                                <label>Зображення</label>
								<br>
								<img src="<? echo $Siteinfo['siteimg']; ?>" width="200px" height="200px">
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
