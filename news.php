<?php
$pageTitle = "ข่าวกิจกรรม | GREEN OFFICE คณะมนุษยศาสตร์ มช.";
$__inc = dirname(__FILE__) . '/includes/header.php';
if (file_exists($__inc)) {
    include $__inc;
} else {
    die('<pre style="font-size:16px;color:#900;">ERROR: header.php not found at: ' . htmlspecialchars($__inc) . '</pre>');
}

$goPage = !empty($_GET['page']) && (int) $_GET['page'] > 0 ? (int) $_GET['page'] : 1;
$goPerPage = 6;
$goNewsData = go_api_get('news.php', ['page' => $goPage, 'limit' => $goPerPage]);
$goNewsItems = isset($goNewsData['items']) ? $goNewsData['items'] : [];
$goNewsTotal = isset($goNewsData['total']) ? (int) $goNewsData['total'] : 0;
$goTotalPages = $goNewsTotal > 0 ? (int) ceil($goNewsTotal / $goPerPage) : 1;
?>


    <div class="page-header dark-section parallaxie" style="background-image:url('images/485159993_23970670855852936_3285528573380014631_n.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">ข่าวกิจกรรม</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo GO_BASE; ?>/">หน้าแรก</a></li>
                                <li class="breadcrumb-item active" aria-current="page">ข่าวกิจกรรม</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="page-blog">
        <div class="container">
            <?php if (empty($goNewsItems)) : ?>
                <div class="row section-row">
                    <div class="col-lg-12">
                        <p class="note-text wow fadeInUp" style="text-align:center;">ยังไม่มีข่าวกิจกรรมในขณะนี้</p>
                    </div>
                </div>
            <?php else : ?>
                <div class="row">
                    <?php foreach ($goNewsItems as $i => $news) : ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="post-item wow fadeInUp" <?php echo $i > 0 ? 'data-wow-delay="0.' . (($i % 3) * 2) . 's"' : ''; ?>>
                                <div class="post-featured-image">
                                    <a href="<?php echo GO_BASE; ?>/news/<?php echo (int) $news['news_id']; ?>" data-cursor-text="View">
                                        <figure class="image-anime"><img src="<?php echo $news['cover_image_url'] ? htmlspecialchars($news['cover_image_url']) : 'images/post-1.jpg'; ?>" alt=""></figure>
                                    </a>
                                    <?php if (!empty($news['tag_name'])) : ?>
                                        <div class="post-item-tags"><a href="#"><?php echo htmlspecialchars($news['tag_name']); ?></a></div>
                                    <?php endif; ?>
                                </div>
                                <div class="post-item-body">
                                    <div class="post-item-content"><h2><a href="<?php echo GO_BASE; ?>/news/<?php echo (int) $news['news_id']; ?>"><?php echo htmlspecialchars($news['title_th']); ?></a></h2></div>
                                    <div class="post-item-btn"><a href="<?php echo GO_BASE; ?>/news/<?php echo (int) $news['news_id']; ?>" class="readmore-btn">อ่านต่อ</a></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if ($goTotalPages > 1) : ?>
                        <div class="col-lg-12">
                            <div class="page-pagination wow fadeInUp" data-wow-delay="0.4s">
                                <ul class="pagination">
                                    <li><a href="<?php echo GO_BASE; ?>/news?page=<?php echo max(1, $goPage - 1); ?>"><i class="fa-solid fa-angle-left"></i></a></li>
                                    <?php for ($p = 1; $p <= $goTotalPages; $p++) : ?>
                                        <li class="<?php echo $p === $goPage ? 'active' : ''; ?>"><a href="<?php echo GO_BASE; ?>/news?page=<?php echo $p; ?>"><?php echo $p; ?></a></li>
                                    <?php endfor; ?>
                                    <li><a href="<?php echo GO_BASE; ?>/news?page=<?php echo min($goTotalPages, $goPage + 1); ?>"><i class="fa-solid fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
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
