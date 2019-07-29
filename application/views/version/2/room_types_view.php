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
                                      <?php if ($fullname != "Möbel DE") {
                                       echo " <a class='nav-link' href='javascript:void(0);' aria-disabled='false'>$fullname</a>";
                                    }

                                    ?>
                                </li>
                                <li class="nav-item" href="javascript:void(0);">
                                    <?php if ($fullname == "Möbel DE") 
                                    {
                                           echo" <a class='nav-link' href='user/logoutpublic'>Login</a>";
                                                                            
                                    }
                                    else
                                    {
                                      echo" <a class='nav-link' href='user/logout'>Logout</a>";
                                    } 
                                    ?>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <section class="p-3">
                <form action="<?php echo site_url('style_items/room_type_styles/') ?>" method="post" id="selectThisForm">
                    <input type="hidden" name="id" id="selectThisInputId">
                    <button type="submit" class="btn btn-warning rounded-pill" id="selectThisInputSubmit">Select this</button>
                     <a href="https://www.facebook.com/sharer.php?u=http://ec2-52-59-210-81.eu-central-1.compute.amazonaws.com/mockup/public/img/room_types/Einzelstudio_im_Altbau.jpg" target="_blank"><img style="width: 3%; height:3%;"  src="<?php echo site_url('public/img/room_types/facebook.png') ?>" alt="Facebook" /></a>
                     <a target="_blank" href="http://pinterest.com/pin/create/button/?url=http://ec2-52-59-210-81.eu-central-1.compute.amazonaws.com/mockup/public/img/room_types/Einzelstudio_im_Altbau.jpg&amp;media=http://ec2-52-59-210-81.eu-central-1.compute.amazonaws.com/mockup/public/img/room_types/Einzelstudio_im_Altbau.jpg&amp;description=An%20improved%20implementation%20of%20the%20Pinterest%20%22Pin%20It%22%20button%20with%20an%20HTML5-valid%20syntax%20option" class="pin-it-button" count-layout="horizontal">
                <img border="0" src="http://assets.pinterest.com/images/PinExt.png" title="Pin It" />
            </a>
            <a href="whatsapp://send?text=<?php echo urlencode ('http://ec2-52-59-210-81.eu-central-1.compute.amazonaws.com/mockup/public/img/room_types/Einzelstudio_im_Altbau.jpg'); ?>" data-action="share/whatsapp/share"> <img src="<?php echo site_url('public/img/room_types/whatsapp.png') ?>" style="width: 3%;height: 3%">
            </a> 

 
               </form>
            </section>
            <section class="container-fluid">
                <div class="owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
							<?php if (isset($room_types)): ?>
								<?php foreach ($room_types as $room_type => $data): ?>
                            <div class="owl-item">
                                <div class="item img-thumbnail rounded-0">
                                    <div class="item-overlay">
                                        <p><?php echo $data['title'] ?></p>
                                        <div class="item-overlay-check"></div>
                                    </div>
                                    <?php if (file_exists(FCPATH.'public/img/room_types/'.$data['image']) && file_exists(FCPATH.'public/img/room_types/'.$data['image'])): ?>
                                    <img src="<?php echo site_url('public/img/room_types/'.$data['image']) ?>" alt="" data-id="<?php echo $data['id'] ?>" />
                                    <?php else: ?>
                                    <img src="<?php echo site_url('public/img/no-img.png') ?>" alt="" data-id="<?php echo $data['id'] ?>" />
                                    <?php endif ?>
                                </div>
                            </div>
								<?php endforeach ?>
							<?php else: ?>
                            <div class="owl-item">
                                <div class="item img-thumbnail rounded-0">
                                    <div class="item-overlay">
                                        <p>No room types yet.</p>
                                        <div class="item-overlay-check"></div>
                                    </div>
                                    <img src="<?php echo site_url('public/img/no-img.png') ?>" alt="" />
                                </div>
                            </div>
							<?php endif ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
