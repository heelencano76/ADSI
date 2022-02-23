<?php 
    if($_SESSION['cargo_farmifarmacy']!="Administrador"){
        $ins_login->forzar_cierre_sesion_controlador();
        exit();
    }
