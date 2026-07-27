<?php
$__inc = dirname(__FILE__) . '/includes/header.php';
if (file_exists($__inc)) {
    // pageTitle is set below once we know the article title, but header.php
    // needs $pageTitle before include - set a placeholder first.
    $pageTitle = "ข่าวกิจกรรม | GREEN OFFICE คณะมนุษยศาสตร์ มช.";
    include $__inc;
} else {
    die('<pre style="font-size:16px;color:#900;">ERROR: header.php not found at: ' . htmlspecialchars($__inc) . '</pre>');
}

$goNewsId = !empty($_GET['id']) ? (int) $_GET['id'] : 0;
$goNews = $goNewsId ? go_api_get('news_detail.php', ['id' => $goNewsId]) : null;
?>


    <div class="page-header dark-section parallaxie" style="background-image:url('images/585056162_1320678793190652_5874898088255414504_n.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque"><?php echo $goNews ? htmlspecialchars($goNews['title_th']) : 'ข่าวกิจกรรม'; ?></h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo GO_BASE; ?>/">หน้าแรก</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo GO_BASE; ?>/news">ข่าวกิจกรรม</a></li>
                                <li class="breadcrumb-item active" aria-current="page">รายละเอียดข่าว</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="page-blog">
        <div class="container">
            <?php if (!$goNews) : ?>
                <div class="row section-row">
                    <div class="col-lg-12">
                        <p class="note-text wow fadeInUp" style="text-align:center;">ไม่พบข่าวที่ต้องการ หรือข่าวอาจถูกลบไปแล้ว</p>
                        <p style="text-align:center;"><a href="<?php echo GO_BASE; ?>/news" class="readmore-btn">&laquo; กลับไปหน้าข่าวกิจกรรม</a></p>
                    </div>
                </div>
            <?php else : ?>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <article class="post-item wow fadeInUp" style="margin-bottom:24px;">
                            <?php if (!empty($goNews['cover_image_url'])) : ?>
                                <div class="post-featured-image">
                                    <figure class="image-anime"><img src="<?php echo htmlspecialchars($goNews['cover_image_url']); ?>" alt=""></figure>
                                    <?php if (!empty($goNews['tag_name'])) : ?>
                                        <div class="post-item-tags"><a href="#"><?php echo htmlspecialchars($goNews['tag_name']); ?></a></div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <div class="post-item-body">
                                <p class="note-text" style="margin-bottom:12px;">
                                    <?php echo htmlspecialchars($goNews['news_date']); ?>
                                    <?php if (!empty($goNews['news_date_end']) && $goNews['news_date_end'] !== $goNews['news_date']) : ?>
                                        &ndash; <?php echo htmlspecialchars($goNews['news_date_end']); ?>
                                    <?php endif; ?>
                                </p>
                                <div class="post-item-content">
                                    <?php echo nl2br(htmlspecialchars($goNews['content_th'])); ?>
                                </div>
                                <?php if (!empty($goNews['gallery_images'])) : ?>
                                    <h3 style="margin:28px 0 16px;">ภาพประกอบ</h3>
                                    <div class="row gallery-items page-gallery-box">
                                        <?php foreach ($goNews['gallery_images'] as $i => $imgUrl) : ?>
                                            <div class="col-lg-4 col-6">
                                                <div class="photo-gallery wow fadeInUp" <?php echo $i > 0 ? 'data-wow-delay="0.' . (($i % 3) * 2) . 's"' : ''; ?>>
                                                    <a href="<?php echo htmlspecialchars($imgUrl); ?>" data-cursor-text="View">
                                                        <figure class="image-anime"><img src="<?php echo htmlspecialchars($imgUrl); ?>" alt=""></figure>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="post-item-btn" style="margin-top:20px;"><a href="<?php echo GO_BASE; ?>/news" class="readmore-btn">&laquo; กลับไปหน้าข่าวกิจกรรม</a></div>
                            </div>
                        </article>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php
$__inc2 = dirname(__FILE__) . '/includes/footer.php';
if (file_exists($__inc2)) {
    include $__inc2;
} else {
    echo '<pre style="font-size:16px;color:#900;">ERROR: footer.php not found at: ' . htmlspecialchars($__inc2) . '</pre>';
}
?>
