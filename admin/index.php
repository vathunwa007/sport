<?php
session_start();
include '../function/connect.php';
$sqlprofile = "SELECT * FROM `tb_member` WHERE m_id = $_SESSION[id]";
$queryprofile = mysqli_query($con,$sqlprofile);
$row_profile = mysqli_fetch_array($queryprofile);
?>

<?php
require_once "../function/connect.php";
$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];

switch ($page) {
    case 1:
        $active1 = "mm-active";
        break;
    case 2:
        $menuactive = "mm-active";
        $active2 = "mm-active";
        break;
    case 3:
        $menuactive = "mm-active";
        $active3 = "mm-active";
        break;
    case 4:
        $active4 = "mm-active";
        break;
    case "contact":
        $contact = "mm-active";
        break;
    default:
        $active1 = "mm-active";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "head.php"; ?>

    <style>
        .hide {
            display: none;
        }
    </style>
    <script>
        function confirm(massage) {
            swal({
                title: massage,
                text: "กดปุ่มตกลงเพื่อดำเนินการต่อ",
                icon: "success",
            });
        }
    </script>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"><img src="http://pub-static.haozhaopian.net/assets/projects/pages/dca71680-c318-11e9-ae0a-0d283ef8239c_118a85ea-30d6-4f5d-8da4-896794ecf8b2_thumb.jpg" width="150" height="60" class="d-inline-block align-top" alt=""></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    <ul class="header-menu nav">
                        <li class="nav-item ">
                            <a href="index.php?page=contact" class="nav-link <?= $contact ?>">
                                <i class="nav-link-icon fa fa-database"> </i> ข้อเสนอแนะ
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <a href="#" class="nav-link btn btn-primary text-light" id="create" data-toggle="modal" data-target="#editkatoo">
                                <i class="nav-link-icon fa fa-edit text-light"></i> สร้างกระทู้
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="../img/<?php echo $row_profile['imageprofile']; ?>" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item" data-toggle="modal" data-target="#profile" title="แก้ไขโปรไฟล์">Settings</button>
                                            <h6 tabindex="-1" class="dropdown-header">-------------------</h6>
                                            <a href="../function/logout.php" tabindex="0" class="dropdown-item">Logout</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        Admin Thanatip
                                    </div>
                                    <div class="widget-subheading">
                                        Admin Manager
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui-theme-settings">
            <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </button>
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                    <div class="theme-settings__options-wrapper">
                        <h3 class="themeoptions-heading">Layout Options
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-header">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Header
                                                </div>
                                                <div class="widget-subheading">Makes the header top fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Sidebar
                                                </div>
                                                <div class="widget-subheading">Makes the sidebar left fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-footer">
                                                    <div class="switch-animate switch-off">
                                                        <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Footer
                                                </div>
                                                <div class="widget-subheading">Makes the app footer bottom fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>
                                Header Options
                            </div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Choose Color Scheme
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-header-cs-class" data-class="bg-primary header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-secondary switch-header-cs-class" data-class="bg-secondary header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-success switch-header-cs-class" data-class="bg-success header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-info switch-header-cs-class" data-class="bg-info header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-warning switch-header-cs-class" data-class="bg-warning header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-danger switch-header-cs-class" data-class="bg-danger header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-light switch-header-cs-class" data-class="bg-light header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-dark switch-header-cs-class" data-class="bg-dark header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-focus switch-header-cs-class" data-class="bg-focus header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-alternate switch-header-cs-class" data-class="bg-alternate header-text-light">
                                        </div>
                                        <div class="divider">
                                        </div>
                                        <div class="swatch-holder bg-vicious-stance switch-header-cs-class" data-class="bg-vicious-stance header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-midnight-bloom switch-header-cs-class" data-class="bg-midnight-bloom header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-night-sky switch-header-cs-class" data-class="bg-night-sky header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-slick-carbon switch-header-cs-class" data-class="bg-slick-carbon header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-asteroid switch-header-cs-class" data-class="bg-asteroid header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-royal switch-header-cs-class" data-class="bg-royal header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-warm-flame switch-header-cs-class" data-class="bg-warm-flame header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-night-fade switch-header-cs-class" data-class="bg-night-fade header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-sunny-morning switch-header-cs-class" data-class="bg-sunny-morning header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-tempting-azure switch-header-cs-class" data-class="bg-tempting-azure header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-amy-crisp switch-header-cs-class" data-class="bg-amy-crisp header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-heavy-rain switch-header-cs-class" data-class="bg-heavy-rain header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-mean-fruit switch-header-cs-class" data-class="bg-mean-fruit header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-malibu-beach switch-header-cs-class" data-class="bg-malibu-beach header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-deep-blue switch-header-cs-class" data-class="bg-deep-blue header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-ripe-malin switch-header-cs-class" data-class="bg-ripe-malin header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-arielle-smile switch-header-cs-class" data-class="bg-arielle-smile header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-plum-plate switch-header-cs-class" data-class="bg-plum-plate header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-fisher switch-header-cs-class" data-class="bg-happy-fisher header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-happy-itmeo switch-header-cs-class" data-class="bg-happy-itmeo header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-mixed-hopes switch-header-cs-class" data-class="bg-mixed-hopes header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-strong-bliss switch-header-cs-class" data-class="bg-strong-bliss header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-grow-early switch-header-cs-class" data-class="bg-grow-early header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-love-kiss switch-header-cs-class" data-class="bg-love-kiss header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-premium-dark switch-header-cs-class" data-class="bg-premium-dark header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-green switch-header-cs-class" data-class="bg-happy-green header-text-light">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>Sidebar Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Choose Color Scheme
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-sidebar-cs-class" data-class="bg-primary sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-secondary switch-sidebar-cs-class" data-class="bg-secondary sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-success switch-sidebar-cs-class" data-class="bg-success sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-info switch-sidebar-cs-class" data-class="bg-info sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-warning switch-sidebar-cs-class" data-class="bg-warning sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-danger switch-sidebar-cs-class" data-class="bg-danger sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-light switch-sidebar-cs-class" data-class="bg-light sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-dark switch-sidebar-cs-class" data-class="bg-dark sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-focus switch-sidebar-cs-class" data-class="bg-focus sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-alternate switch-sidebar-cs-class" data-class="bg-alternate sidebar-text-light">
                                        </div>
                                        <div class="divider">
                                        </div>
                                        <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class" data-class="bg-vicious-stance sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class" data-class="bg-midnight-bloom sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-night-sky switch-sidebar-cs-class" data-class="bg-night-sky sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class" data-class="bg-slick-carbon sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-asteroid switch-sidebar-cs-class" data-class="bg-asteroid sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-royal switch-sidebar-cs-class" data-class="bg-royal sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-warm-flame switch-sidebar-cs-class" data-class="bg-warm-flame sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-night-fade switch-sidebar-cs-class" data-class="bg-night-fade sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class" data-class="bg-sunny-morning sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class" data-class="bg-tempting-azure sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class" data-class="bg-amy-crisp sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class" data-class="bg-heavy-rain sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class" data-class="bg-mean-fruit sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class" data-class="bg-malibu-beach sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-deep-blue switch-sidebar-cs-class" data-class="bg-deep-blue sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class" data-class="bg-ripe-malin sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class" data-class="bg-arielle-smile sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class" data-class="bg-plum-plate sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class" data-class="bg-happy-fisher sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class" data-class="bg-happy-itmeo sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class" data-class="bg-mixed-hopes sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class" data-class="bg-strong-bliss sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-grow-early switch-sidebar-cs-class" data-class="bg-grow-early sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-love-kiss switch-sidebar-cs-class" data-class="bg-love-kiss sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-premium-dark switch-sidebar-cs-class" data-class="bg-premium-dark sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-green switch-sidebar-cs-class" data-class="bg-happy-green sidebar-text-light">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>Main Content Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Page Section Tabs
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div role="group" class="mt-2 btn-group">
                                            <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line">
                                                Line
                                            </button>
                                            <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow">
                                                Shadow
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">ดูภาพรวมของระบบ</li>
                            <li>
                                <a href="index.php?page=1" class="<?= $active1 ?>">
                                    <i class="metismenu-icon pe-7s-rocket"></i> แสดงภาพรวม
                                </a>
                            </li>
                            <li class="app-sidebar__heading">เมนูหลัก</li>
                            <li class="<?= $menuactive ?>">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-diamond"></i>จัดการข้อมูล
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="index.php?page=2" class="<?= $active2 ?>">
                                            <i class="metismenu-icon"></i> จัดการประกาศสอน
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?page=3" class="<?= $active3 ?>">
                                            <i class="metismenu-icon">
                                            </i>จัดการกระดานถาม-ตอบ
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a href="index.php?page=4" class="<?= $active4 ?>">
                                    <i class="metismenu-icon pe-7s-id"></i> จัดการข้อมูลสมาชิก

                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">


                    <!-----------สำหรับแสดงข้อมูลแต่ละหน้า------------------------------------------------->
                    <div class="showinner">
                        <?php
                        if(isset($_GET['page']) != true){
                            include "page1.php";
                        }else{
                        switch ($page) {
                            case 1:
                                include "page1.php";
                                break;
                            case 2:
                                include "page2.php";
                                break;
                            case 3:
                                include "page3.php";
                                break;
                            case 4:
                                include "page4.php";
                                break;
                            case 'showpost':
                                include "showpost.php";
                                break;
                            case "contact":
                                include "contact.php";
                                break;
                            default:
                                include "page1.php";
                                break;
                        }

                    }
                        ?>

                    </div>
                    <!---------------------------------------------------------------------------------------->
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">

                            <div class="app-footer-right">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Thanatip
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <div class="badge badge-primary mr-1 ml-0">
                                                <small>FaceBook</small>
                                            </div>
                                            Thanathip asdasdasd
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include "footer.php"; ?>
     <!-- Modalprofile-->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profile" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profile">แก้ไขข้อมูลส่วนตัวแอดมิน</h5>
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../function/updateprofile.php" name="profile" id="profile" method="POST">
                    <div class="form-group">
                        <div class="card" style="width: 100%;">
                            <img src="../img/<?php echo $row_profile['imageprofile']; ?>" id="imgprofile" name="imgprofile" class="card-img-top" alt="..." style="border-radius: 50%; width:250px; height:250px; margin: 0 auto;">
                            <div class="card-body">
                                <p class="card-text text-warning">เปลี่ยนรูปภาพ.</p>
                                <input type='file' id="imgInp" name="imgInp" accept=".jpg,.jpeg,.png">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อผู้ใช้งาน</label>
                        <input type="text" class="form-control" name="username2" id="username2"placeholder="กรุณากรอกชื่อผู้ใช้งาน" value="<?php echo $row_profile['m_username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">รหัสผ่าน</label>
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="รหัสผ่านของคุณ" value="<?php echo $row_profile['m_password']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" name="name2" id="name2"placeholder="กรุณากรอก ชื่อ-นามสกุล" value="<?php echo $row_profile['m_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">อีเมล์</label>
                        <input type="email" class="form-control" name="email2" id="email2"placeholder="กรุณากรอก อีเมล" value="<?php echo $row_profile['m_email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" name="telephone2" id="telephone2"placeholder="กรุณากรอก เบอร์โทรศัพท์" value="<?php echo $row_profile['m_telephone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ที่อยู่</label>
                        <textarea class="form-control" id="address2" rows="3" name="address2"><?php echo $row_profile['m_address']; ?></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary  btn-block" name="btn-updateprofile" id="btn-updateprofile" value="บันทึก">

            </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>
<script>
    $('#imgid0').addClass('active');

    $(document).ready(function() {


        $('#datatable').DataTable({
            "scrollX": false,
            "columnDefs": [{}],

            "bFilter": false,

            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.20/i18n/Thai.json"
            }
        });


    });
</script>
<script>
    $(document).ready(function() {
        var urlParams = new URLSearchParams(window.location.search);
        var page = urlParams.get('page');

        if(page != 3){
            $('#create').addClass('hide');
        }
        //console.log(x);

        $("#btnSend").click(function() {
            $.ajax({
                type: "POST",
                url: "../function/register.php",
                data: $("#register").serialize(),
                success: function(result) {
                    if (result.status == 1) // Success
                    {
                        confirm(result.message);

                        $(".close").click();
                    } else // Err
                    {
                        confirm(result.message);

                    }
                }
            });

        });
        /*--------------------------------------------------------------------*/
        $("#btnedit").click(function() {
            $.ajax({
                type: "POST",
                url: "../function/updatemember.php",
                data: $("#register").serialize(),

                success: function(result) {
                    if (result.status == 1) // Success
                    {
                        confirm(result.message);
                        $(".close").click();
                    } else // Err
                    {
                        confirm(result.message);

                    }
                }
            });

        });
        //---------------------------------------------------------------------------------
        $("#btneditkatoo").click(function() {
            $.ajax({
                type: "POST",
                url: "../function/updatekatoo.php",
                data: $("#katoo").serialize(),
                success: function(result) {
                    if (result.status == 1) // Success
                    {
                        confirm(result.message);
                        $(".close").click();
                    } else // Err
                    {
                        confirm(result.message);

                    }
                }
            });

        });
        //------------------------------------------------------------------------------------------------
    });

    $('body').on('click', '[data-toggle="modal"]', function() {
        $($(this).data("target") + ' .modal-body').load($(this).data("remote"));
    });
    //---------------------------------------------------------------------------
    $("#insert").on('click', function() {
        $('#exampleModalScrollableTitle').text("เพิ่มสมาชิก");
        $('#btnedit').addClass('hide');
        $('#btnSend').removeClass('hide');
        $('#level').addClass('hide');
        $('#register')[0].reset();
        $('#inputpassword').attr('readonly', false);
    });
    //-----------------------------------------------------------------------------
    $("#create").on('click', function() {
        $('#exampleModalScrollableTitle').text("เพิ่มกระทู้");
        $('#btneditkatoo').addClass('hide');
        $('#btnsentkatoo').removeClass('hide');
        $('#katoo')[0].reset();
    });

    function loadpost(id) {

        $.ajax({
            url: '../detail.php?id=' + id,
            dataType: 'html',
            success: function(html) {
                var div = $('.card', $(html)).addClass('done');
                $('#showpost').html(div);

            }
        });
    }
</script>
<script type="text/javascript">
 function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#imgprofile').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>
<?php
if (isset($_REQUEST['success'])) {
    echo '<script> swal({
    title: "เข้าสู่ระบบแอดมินสำเร็จ!",
    text: "ทำการล็อกอินเข้าสู่ระบบสำเร็จ",
    icon: "success",

}).then((value) => {

});</script>';
}
?>
<?php
if(isset($_REQUEST['updateprofile'])){
    echo "<script> swal({
        title: 'บันทึกการแก้ไขเรียบร้อย!',
        text: 'ทำการบันทึกสำเร็จ',
        icon: 'success',
    });</script>";
}else if(isset($_REQUEST['updateprofileeror'])){
    echo "<script> swal({
        title: 'ไม่สามารถบันทึกการแก้ไขได้!',
        text: 'เกิดข้อผิดพลาด',
        icon: 'success',
    });</script>";
}
?>