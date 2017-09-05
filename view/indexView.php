<?php
$session = SSession::getInstance();

if (isset($session->email)) {
    include_once 'public/headerUser.php';
} else {
    include_once 'public/header.php';
}
?>
<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="col_two_third bottommargin-lg">
                <div class="container clearfix">
                    <div class="col_one_third nobottommargin">

                        <div class="fancy-title title-border">
                        </div>

                        <div>
                            
                            <?php 
                            if(count($vars->Product)>1){
                                
                            for ($i = 0; $i < count($vars->Product); $i++) { ?>                     
                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <?php
                                        echo '<a><img style="width:100%;max-width:100%;" src="data:image/jpeg;base64,' . base64_encode($vars->Product[$i]->Picture) . '">';
                                        ?>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="?"><?php echo $vars->Product[$i]->Name; ?></a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color"><?php echo $vars->Product[$i]->Description; ?></li>
                                            <li class="color"><?php echo $vars->Product[$i]->Category; ?></li>
                                            <li class="color">&#36;<?php echo number_format($vars->Product[$i]->Price/tipo_cambio(),0);?> - &cent;<?php echo $vars->Product[$i]->Price; ?></li>
                                            
                                            <form method="POST" action="?controller=Invoice">
                                                <input type="hidden" name="id_product" value="<?php echo $vars->Product[$i]->Description; ?>"/>
                                                <input type="hidden" name="price" value="<?php echo $vars->Product[$i]->Price; ?>"/>
                                                <input type="hidden" name="name" value="<?php echo $vars->Product[$i]->Name; ?>"/>
                                                <?php if (!isset($session->email)) { ?>w
                                                    <br><input type="submit" value="Buy"/>
                                                <?php } ?>
                                            </form>                
                                        </ul>
                                    </div>
                                </div>
                            <?php } }else{
                             ?>   
                               <div class="spost clearfix">
                                    <div class="entry-image">
                                        <?php
                                        echo '<a><img style="width:100%;max-width:100%;" src="data:image/jpeg;base64,' . base64_encode($vars->Product->Picture) . '">';
                                        ?>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="?"><?php echo $vars->Product->Name; ?></a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color"><?php echo $vars->Product->Description; ?></li>
                                            <li class="color"><?php echo $vars->Product->Category; ?></li>
                                            <li class="color">&#36;<?php echo number_format($vars->Product->Price/tipo_cambio(),0);?> - &cent;<?php echo $vars->Product->Price; ?></li>
                                            
                                            <form method="POST" action="?controller=Invoice">
                                                <input type="hidden" name="id_product" value="<?php echo $vars->Product->Description; ?>"/>
                                                <input type="hidden" name="price" value="<?php echo $vars->Product->Price; ?>"/>
                                                <input type="hidden" name="name" value="<?php echo $vars->Product->Name; ?>"/>
                                                <?php if (!isset($session->email)) { ?>
                                                    <br><input type="submit" value="Buy"/>
                                                <?php } ?>
                                            </form>                
                                        </ul>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="clear"></div><div class="line"></div>

                    <div id="oc-clients-full" class="owl-carousel image-carousel carousel-widget" data-margin="30" data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xxs="2" data-items-xs="3" data-items-sm="4" data-items-md="5" data-items-lg="7">
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/1.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/2.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/3.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/4.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/5.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/6.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/7.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/8.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/9.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/10.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/11.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/12.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/13.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/14.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/15.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="public/images/clients/logo/18.png" alt="Clients"></a></div>
                    </div>
                </div>
                <?php
                include_once 'public/footer.php';
                