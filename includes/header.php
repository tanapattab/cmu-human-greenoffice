<?php
// Force UTF-8 so Thai text isn't mangled if the server's default charset
// (php.ini default_charset) is not UTF-8 — common on older AppServ installs.
header('Content-Type: text/html; charset=utf-8');

// Set security headers here too, not just via .htaccess - confirmed on
// production that mod_rewrite/.htaccess is read (clean URLs work) but these
// headers still don't show up, meaning mod_headers is not enabled there.
// PHP's header() works regardless of which Apache modules are loaded.
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' data: https://fonts.gstatic.com; img-src 'self' data: https:; frame-src https://www.google.com; base-uri 'self'; object-src 'none'; form-action 'self'");

// Older AppServ builds sometimes ship with mbstring set to auto-convert
// output encoding (a leftover from TIS-620-era Thai hosting configs).
// If mbstring is loaded, force it to leave UTF-8 output untouched.
if (function_exists('mb_internal_encoding')) {
    mb_internal_encoding('UTF-8');
}
if (function_exists('mb_http_output')) {
    mb_http_output('UTF-8');
}
if (function_exists('ini_set')) {
    @ini_set('mbstring.internal_encoding', 'UTF-8');
    @ini_set('default_charset', 'UTF-8');
}

// Base path this site is deployed under (e.g. '' at domain root in
// production, or '/human-greenoffice' when running under a subfolder like
// http://localhost/human-greenoffice/ locally). Computed from the actual
// running script so internal links work in both setups without editing code.
if (!defined('GO_BASE')) {
    define('GO_BASE', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'));
}

require_once dirname(__FILE__) . '/api-client.php';
$goCriteriaData = go_api_get('criteria.php');
$goCategoryCount = isset($goCriteriaData['categories']) ? count($goCriteriaData['categories']) : 6;
?>
<!DOCTYPE html>
<html lang="th">
<head>
	<meta charset="utf-8">
	<base href="<?php echo GO_BASE; ?>/">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<meta name="description" content="สำนักงานสีเขียว (Green Office) คณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่">
	<meta name="keywords" content="Green Office, สำนักงานสีเขียว, คณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่">
	<meta name="author" content="คณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/slicknav.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/swiper-bundle.min.css">
	<link href="css/all.min.css" rel="stylesheet" media="screen">
	<link href="css/animate.css" rel="stylesheet">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link href="css/custom.css" rel="stylesheet" media="screen">

    <style>
        :root{--default-font:"Prompt", sans-serif;}
        body, h1, h2, h3, h4, h5, h6, p, a, span, li, input, textarea, select, button{font-family:"Prompt", sans-serif !important;}
        /* Disable theme custom mouse-follow cursor: restore normal pointer everywhere */
        *{cursor:auto !important;}
        a, button, .btn-default, .readmore-btn, .newsletter-btn, label, select, .photo-gallery a, .post-featured-image a, .service-item-btn a, input[type="submit"]{cursor:pointer !important;}
        .cb-cursor, .cb-cursor-text{display:none !important;}
        .brand-box{display:flex;align-items:center;gap:12px}
        .brand-box img.uni-logo{height:52px;width:auto;display:block}
        .brand-box .brand-text{color:#fff;line-height:1.25}
        .brand-box .brand-text strong{display:block;font-size:15px;letter-spacing:.5px}
        .brand-box .brand-text span{display:block;font-size:11px;opacity:.85;font-weight:400}
        .footer-logo .brand-box .brand-text{color:#fff}
        .criteria-num{display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:50%;background:var(--accent-color);color:var(--primary-color);font-weight:700;font-size:14px;margin-right:8px}
        .waste-bin-list{display:flex;flex-wrap:wrap;gap:24px;margin-top:20px}
        .waste-bin-item{flex:1 1 260px;background:#fff;border-radius:12px;padding:28px 24px;box-shadow:0 6px 24px rgba(3,22,0,0.08);text-align:center}
        .waste-bin-item .bin-icon{width:64px;height:64px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:26px;color:#fff}
        .bin-green .bin-icon{background:#2ea44f}
        .bin-blue .bin-icon{background:#1e6fd9}
        .bin-yellow .bin-icon{background:#e0b400}
        .bin-red .bin-icon{background:#d9342b}
        .waste-bin-item h3{font-size:18px;margin-bottom:8px}
        .waste-bin-item p{font-size:14px;line-height:1.6;margin:0}
        .doc-list{list-style:none;margin:0;padding:0}
        .doc-list li{display:flex;align-items:center;gap:14px;padding:16px 20px;border:1px solid rgba(3,22,0,0.1);border-radius:10px;margin-bottom:14px;background:#fff}
        .doc-list li i{font-size:20px;color:var(--primary-color);background:var(--accent-color);width:42px;height:42px;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0}
        .doc-list li a{font-weight:600;color:var(--primary-color)}
        .measures-list{list-style:none;margin:0;padding:0}
        .measures-list li{display:flex;gap:12px;align-items:flex-start;margin-bottom:14px;font-size:15px;line-height:1.6}
        .measures-list li i{color:var(--accent-color);margin-top:4px}
        .resource-card{background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 6px 24px rgba(3,22,0,0.08);height:100%}
        .resource-card img{width:100%;height:200px;object-fit:cover;display:block}
        .resource-card .resource-card-body{padding:22px}
        .resource-card .resource-card-body h3{font-size:18px;margin-bottom:8px}
        .resource-card .resource-card-body p{font-size:14px;line-height:1.6;color:rgba(3,22,0,0.7)}
        .accordion-criteria .accordion-button{font-weight:600;font-size:16px}
        .accordion-criteria .accordion-button:not(.collapsed){background:var(--accent-color);color:var(--primary-color)}
        .qr-box{background:#fff;border-radius:12px;padding:24px;text-align:center;box-shadow:0 6px 24px rgba(3,22,0,0.08)}
        .qr-box img{max-width:180px;margin-bottom:14px}
        .note-text{font-size:13px;opacity:.7;font-style:italic}
        .hero-slideshow{position:absolute;top:0;right:0;bottom:0;left:0;z-index:0;overflow:hidden;}
        .hero-slideshow .hero-slide{position:absolute;top:0;right:0;bottom:0;left:0;background-repeat:no-repeat;background-position:center center;background-size:cover;opacity:0;transition:opacity 1.8s ease-in-out;}
        .hero-slideshow .hero-slide.active{opacity:1;}
        .news-section-solid{background-image:linear-gradient(135deg, #031600 0%, #0c3d1f 55%, #0f5c3a 100%) !important;}
        .our-testimonials .post-item-body{background:#fff;padding:22px 24px;border-radius:0 0 14px 14px;margin-top:-8px;position:relative;z-index:1;}
        .our-testimonials .post-item-content h2 a{color:var(--primary-color);}
        .our-testimonials .post-item-content h2 a:hover{color:#0f5c3a;}
        .our-testimonials .post-item-btn{border-top:1px solid rgba(3,22,0,0.1);}
        .our-testimonials .post-item-btn .readmore-btn{color:var(--primary-color);font-weight:600;}
        .goc-filter-bar{display:flex;flex-wrap:wrap;gap:16px;margin-bottom:20px;justify-content:center}
        .goc-filter-bar select{padding:10px 18px;border-radius:8px;border:1px solid rgba(3,22,0,0.2);font-size:15px;min-width:220px;background:#fff}
        .goc-cat-pills{display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin-bottom:28px}
        .goc-cat-pill{padding:10px 20px;border-radius:30px;border:1px solid rgba(3,22,0,0.2);background:#fff;color:var(--primary-color);font-size:14.5px;font-weight:600;white-space:nowrap}
        .goc-cat-pill:hover{background:var(--accent-color);color:var(--primary-color)}
        .goc-cat-pill.active{background:var(--primary-color);border-color:var(--primary-color);color:#fff}
        .goc-table-wrap{overflow-x:auto;background:#fff;border-radius:12px;box-shadow:0 6px 24px rgba(3,22,0,0.08)}
        table.goc-table{width:100%;border-collapse:collapse;font-size:14.5px;min-width:720px}
        table.goc-table thead th{background:#0f5c56;color:#fff;text-align:left;padding:14px 18px;font-weight:600}
        table.goc-table thead th:last-child{width:160px;text-align:center}
        table.goc-table tr.goc-cat-bar td{background:var(--accent-color);color:var(--primary-color);font-weight:700;padding:12px 18px}
        table.goc-table tr.goc-sub-row td{background:#eaf3fb;font-weight:600;padding:10px 18px}
        table.goc-table tr.goc-item-row td{padding:12px 18px;border-bottom:1px solid rgba(3,22,0,0.08);vertical-align:top}
        table.goc-table tr.goc-item-row:nth-child(even){background:#fafafa}
        table.goc-table td.goc-status{text-align:center;color:rgba(3,22,0,0.45);font-size:13px}
        .goc-modal-itemno{display:inline-block;background:var(--accent-color);color:var(--primary-color);font-weight:700;padding:4px 12px;border-radius:20px;font-size:13px;margin-bottom:8px}
        .video-thumb-wrap{position:relative;display:block;overflow:hidden}
        .video-thumb-wrap img{width:100%;display:block}
        .video-play-overlay{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:56px;height:56px;border-radius:50%;background:var(--primary-color);color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;transition:background .2s}
        .video-thumb-wrap:hover .video-play-overlay{background:#0f5c3a}
        .video-channel{display:flex;align-items:center;gap:6px;font-size:13px;color:var(--text-color);margin:0}
        .goc-result-btn{padding:8px 18px;border-radius:8px;border:1px solid var(--primary-color);background:#fff;color:var(--primary-color);font-size:13.5px;font-weight:600;white-space:nowrap}
        .goc-result-btn:hover{background:var(--primary-color);color:#fff}
        .goc-attach-link{display:inline-flex;align-items:center;gap:6px;color:var(--primary-color);font-weight:600}
        .goc-attach-link:hover{color:#0f5c3a}
        .goc-gallery{display:flex;flex-wrap:wrap;gap:8px;margin-top:10px}
        .goc-gallery a{display:block;width:90px;height:90px;border-radius:8px;overflow:hidden}
        .goc-gallery img{width:100%;height:100%;object-fit:cover;display:block}
        .goc-cat-block{display:none}
        .goc-cat-block.active{display:block}
        .goc-note-box{background:#fff8e1;border:1px solid #f0d98c;border-radius:10px;padding:16px 20px;margin-bottom:20px;font-size:14px;line-height:1.7}
    </style>
</head>
<body>

	<div class="preloader">
		<div class="loading-container">
			<div class="loading"></div>
			<div id="loading-icon"><i class="fa-solid fa-leaf"></i></div>
		</div>
	</div>

	<header class="main-header">
		<div class="header-sticky">
			<nav class="navbar navbar-expand-lg">
				<div class="container-fluid">
					<a class="navbar-brand brand-box" href="<?php echo GO_BASE; ?>/">
						<img class="uni-logo" src="images/humanities-cmu-logo.png" alt="ตราคณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่">
						<span class="brand-text"><strong>GREEN OFFICE</strong><span>คณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่</span></span>
					</a>

                    <div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item"><a class="nav-link" href="<?php echo GO_BASE; ?>/">หน้าแรก</a></li>
                                <li class="nav-item submenu"><a class="nav-link" href="<?php echo GO_BASE; ?>/about">เกี่ยวกับสำนักงานสีเขียว</a>
                                    <ul>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo GO_BASE; ?>/about#policy">นโยบายและเป้าหมาย</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo GO_BASE; ?>/criteria">เกณฑ์การประเมิน <?php echo (int) $goCategoryCount; ?> หมวด (รายละเอียด)</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo GO_BASE; ?>/documents">เอกสารที่เกี่ยวข้อง</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item submenu"><a class="nav-link" href="<?php echo GO_BASE; ?>/activities">การดำเนินงาน</a>
                                    <ul>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo GO_BASE; ?>/activities#campaign">สื่อรณรงค์</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo GO_BASE; ?>/activities#resources">สื่อการเรียนรู้</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo GO_BASE; ?>/activities#bins">ถังสีไหน? ทิ้งขยะอะไร?</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo GO_BASE; ?>/news">ข่าวกิจกรรม</a></li>
                            </ul>
                        </div>

                        <div class="header-button-box">
                            <div class="header-sidebar-btn">
                                <button class="btn btn-popup" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-bars"></i></button>

                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>

                                    <div class="offcanvas-body">
                                        <div class="header-contact-box">
                                            <div class="icon-box"><i class="fa-solid fa-phone"></i></div>
                                            <div class="header-contact-box-content">
                                                <h3>โทรศัพท์</h3>
                                                <p><a href="tel:+6653943208">0 5394 3208</a></p>
                                            </div>
                                        </div>

                                        <div class="header-contact-box">
                                            <div class="icon-box"><i class="fa-solid fa-envelope"></i></div>
                                            <div class="header-contact-box-content">
                                                <h3>อีเมล</h3>
                                                <p><a href="mailto:humaninfo@cmu.ac.th">humaninfo@cmu.ac.th</a></p>
                                            </div>
                                        </div>

                                        <div class="header-contact-box">
                                            <div class="icon-box"><i class="fa-solid fa-location-dot"></i></div>
                                            <div class="header-contact-box-content">
                                                <h3>ที่อยู่</h3>
                                                <p>239 ถนนห้วยแก้ว ตำบลสุเทพ อำเภอเมือง จังหวัดเชียงใหม่ 50200</p>
                                            </div>
                                        </div>

                                        <div class="header-social-links">
                                            <h2>ติดตามเรา</h2>
                                            <ul>
                                                <li><a href="https://www.facebook.com/humancmu/" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a></li>
                                                <li><a href="http://www.human.cmu.ac.th/" target="_blank" rel="noopener"><i class="fa-solid fa-globe"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="navbar-toggle"></div>
				</div>
			</nav>
			<div class="responsive-menu"></div>
		</div>
	</header>
