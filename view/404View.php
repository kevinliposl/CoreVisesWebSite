<?php

//$data = SSession::getInstance();

if (isset($data->permiso)) {
//        include_once 'public/headerSec.php';
//        include_once 'public/headerSoc.php';
} else {
    include_once 'public/header.php';
    //header('Location:?');
}
?>

<section id="slider" class="slider-parallax full-screen dark error404-wrap" style="background: url(public/images/landing/static.jpg) center;">
    <div class="slider-parallax-inner">
        <div class="container vertical-middle center clearfix">
            <div class="error404">404</div>
            <div class="heading-block nobottomborder">
                <h4>¡Algo pas&oacute;!</h4>
                <span>Por favor intentalo m&aacute;s tarde</span>
            </div>
        </div>


<?php

include_once 'public/footer.php';

