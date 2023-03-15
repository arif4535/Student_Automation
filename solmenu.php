			<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Ana Sayfa</div>
                            <a class="nav-link" href="<?php echo $siteUrl; ?>/index.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-home-alt"></i></div>
                                Ana Sayfa
                            </a>
                            <div class="sb-sidenav-menu-heading">Öğrenci</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#ogrenci" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Öğrenci İşlemleri
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
							
                            <div class="collapse" id="ogrenci" aria-labelledby="heading" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <?php if($yetki == 1) { ?><a class="nav-link" href="<?php echo $siteUrl; ?>/ogrenci/ogrencidetay.php">Öğrenci Listesi</a><?php } ?>
                                    <?php if($yetki == 1) { ?><a class="nav-link" href="<?php echo $siteUrl; ?>/ogrenci/ekle.php">Öğrenci Ekle</a><?php } ?>
                                    <?php if($yetki == 2) { ?><a class="nav-link" href="<?php echo $siteUrl; ?>/ogrenci/guncelle.php?id=<?php echo  $_SESSION['id'] ; ?>">Bilgilerimi Güncelle</a><?php }?>
                                </nav>
                            </div>	
							
							<div class="sb-sidenav-menu-heading">Proje</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#proje" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Proje İşlemleri
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="proje" aria-labelledby="heading" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <?php if($yetki == 1) { ?><a class="nav-link" href="<?php echo $siteUrl; ?>/konu/index.php">Öğrenci Proje Listesi</a><?php } ?>
                                    <a class="nav-link" href="<?php echo $siteUrl; ?>/konu/konuekle.php">Proje Ekle</a>
									<a class="nav-link" href="<?php echo $siteUrl; ?>/upload/index.html">Belge ekle</a>
                                    <?php if($yetki == 1) { ?><a class="nav-link" href="<?php echo $siteUrl; ?>/ogrenci/ogrencidetay.php?id=<?php echo  $_SESSION['id'] ; ?>">Öğrenciye Proje Ata</a><?php }?>
                                </nav>
                            </div>					
                        </div>							
                    </div>
					<div class="sb-sidenav-footer">
                        <div class="small"></div>
                        <?php 
						$sql = "SELECT * FROM sinformation WHERE s_id = $kullaniciID";
						$result = $pdo->query($sql);
						$row = $result->fetch(PDO::FETCH_ASSOC);
						echo $row["Name"];
						if($yetki == 1){echo "<br/> Öğretmen";}
						if($yetki == 2){echo "<br/> Öğrenci";}
						?>
                    </div>
                </nav>
            </div>