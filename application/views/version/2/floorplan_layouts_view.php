        <div class="container-fluid p-3">
            <header class="mb-auto">
                <nav class="navbar navbar-expand-lg navbar-dark bg-semidark rounded-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="<?php echo site_url('assets/images/logo-white.svg') ?>" alt="" />
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <!-- <li class="nav-item active">
                                    <a class="nav-link" href="#">
                                        Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0);" aria-disabled="false"><?php echo $fullname ?? 'username' ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('user/logout') ?>">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <section class="container-fluid my-3">
                <div class="row">
                	<div class="col-md-9">
                		<div class="card my-3">
                            <?php if (file_exists(FCPATH.'public/img/configrations/'.$big_img) && file_exists(FCPATH.'public/img/configrations/'.$big_img)): ?>
                            <img src="<?php echo site_url('public/img/configrations/'.$big_img) ?>" alt="" class="card-img-top" />
                            <?php else: ?>
                            <img src="<?php echo site_url('public/img/no-img.png') ?>" alt="" class="card-img-top" />
                            <?php endif ?>
                		</div>
                	</div>
                	<div class="col-md-3">
                		<div class="card my-3">
                			<div class="card-body">
                            <?php if (file_exists(FCPATH.'public/img/configrations/'.$conf_img) && file_exists(FCPATH.'public/img/configrations/'.$conf_img)): ?>
                            <img src="<?php echo site_url('public/img/configrations/'.$conf_img) ?>" alt="" class="card-img-top" />
                            <?php else: ?>
                            <img src="<?php echo site_url('public/img/no-img.png') ?>" alt="" class="card-img-top" />
                            <?php endif ?>
                			</div>
                		</div>
                	</div>
                </div>
            </section>
            <section class="container-fluid">
                <div class="owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
							<?php if (isset($layouts)): ?>
                                <?php if (!empty($layouts)): ?>
    								<?php foreach ($layouts as $layout => $data): ?>
                                        <div class="owl-item">
                                            <div class="item img-thumbnail rounded-0">
                                                <div class="item-overlay">
                                                    <p><?php echo $data['title'] ?></p>
                                                    <div class="item-overlay-check"></div>
                                                </div>
                                                <?php if (file_exists(FCPATH.'public/img/room_types/'.$data['img']) && file_exists(FCPATH.'public/img/room_types/'.$data['img'])): ?>
                                                <img src="<?php echo site_url('public/img/room_types/'.$data['img']) ?>" alt="" data-id="<?php echo $data['area_id'] ?>" />
                                                <?php else: ?>
                                                <img src="<?php echo site_url('public/img/no-img.png') ?>" alt="" data-id="<?php echo $data['area_id'] ?>" />
                                                <?php endif ?>
                                            </div>
                                        </div>
        							<?php endforeach ?>
        						<?php else: ?>
                                    <div class="owl-item">
                                        <div class="item img-thumbnail rounded-0">
                                            <div class="item-overlay">
                                                <p class="text-white">No room type styles yet.</p>
                                                <div class="item-overlay-check"></div>
                                            </div>
                                            <img src="<?php echo site_url('public/img/no-img.png') ?>" alt="" />
                                        </div>
                                    </div>
    							<?php endif ?>
                            <?php else: ?>
                                <div class="owl-item">
                                    <div class="item">
                                        <div class="card card-body">
                                            No Items
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
