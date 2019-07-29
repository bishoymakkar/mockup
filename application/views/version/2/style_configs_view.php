        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
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
            <section class="p-3">
                <form action="<?php echo site_url('floorplan/layouts/') ?>" method="post" id="selectThisForm">
                	<input type="hidden" name="id" id="selectThisInputId">
                </form>
            </section>
            <section class="container-fluid">
                <div class="owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
							<?php if (isset($style_configs)): ?>
                                <?php if (!empty($style_configs)): ?>
                                    <?php foreach ($style_configs as $style_config => $data): ?>
                                    <div class="owl-item">
                                        <div class="item">
                                            <div class="card">
                                                <?php if (file_exists(FCPATH.'public/img/room_types/'.$data['configuration_img']) && file_exists(FCPATH.'public/img/room_types/'.$data['configuration_img'])): ?>
                                                <img src="<?php echo site_url('public/img/room_types/'.$data['configuration_img']) ?>" alt="" class="card-img-top" data-id="<?php echo $data['configuration_id'] ?>" />
                                                <?php else: ?>
                                                <img src="<?php echo site_url('public/img/no-img.png') ?>" alt="" class="card-img-top" data-id="null" />
                                                <?php endif ?>
                                                <div class="card-body">
                                                    <p class="mb-0"><?php echo $data['configuration_title'] ?></p>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="#" class="btn btn-sm btn-dark float-right select-this-anchor" data-id="<?php echo $data['configuration_id'] ?>">Select this</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <div class="owl-item">
                                        <div class="item img-thumbnail rounded-0">
                                            <div class="item-overlay">
                                                <p class="text-white">No style configs yet.</p>
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
