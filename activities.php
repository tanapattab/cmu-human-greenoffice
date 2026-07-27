<?php
$pageTitle = "การดำเนินงานสำนักงานสีเขียว | GREEN OFFICE คณะมนุษยศาสตร์ มช.";
$__inc = dirname(__FILE__) . '/includes/header.php';
if (file_exists($__inc)) {
    include $__inc;
} else {
    die('<pre style="font-size:16px;color:#900;">ERROR: header.php not found at: ' . htmlspecialchars($__inc) . '</pre>');
}

$goCampaignData = go_api_get('campaign.php');
$goCampaignItems = isset($goCampaignData['items']) ? $goCampaignData['items'] : [];

$goVideosData = go_api_get('videos.php');
$goVideoItems = isset($goVideosData['items']) ? $goVideosData['items'] : [];
?>


    <div class="page-header dark-section parallaxie" style="background-image:url('images/585056162_1320678793190652_5874898088255414504_n.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">การดำเนินงานสำนักงานสีเขียว</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo GO_BASE; ?>/">หน้าแรก</a></li>
                                <li class="breadcrumb-item active" aria-current="page">การดำเนินงาน</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="page-gallery bg-section" id="campaign">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">สื่อรณรงค์</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">สื่อรณรงค์สำนักงานสีเขียว (Green Office)</h2>
                    </div>
                </div>
            </div>
            <?php if (!empty($goCampaignItems)) : ?>
                <div class="row gallery-items page-gallery-box">
                    <?php foreach ($goCampaignItems as $i => $media) : ?>
                        <div class="col-lg-4 col-6">
                            <div class="photo-gallery wow fadeInUp" <?php echo $i > 0 ? 'data-wow-delay="0.' . (($i % 3) * 2) . 's"' : ''; ?>>
                                <a href="<?php echo htmlspecialchars($media['image_url']); ?>" data-cursor-text="View">
                                    <figure class="image-anime"><img src="<?php echo htmlspecialchars($media['image_url']); ?>" alt="<?php echo htmlspecialchars($media['title']); ?>"></figure>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p class="note-text" style="text-align:center;">ยังไม่มีสื่อรณรงค์ในขณะนี้</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="page-gallery" id="resources">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">สื่อการเรียนรู้</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">สื่อการเรียนรู้เพิ่มเติม</h2>
                    </div>
                </div>
            </div>
            <?php if (!empty($goVideoItems)) : ?>
                <div class="row">
                    <?php foreach ($goVideoItems as $i => $video) : ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="resource-card video-card wow fadeInUp" <?php echo $i > 0 ? 'data-wow-delay="0.' . (($i % 3) * 2) . 's"' : ''; ?>>
                                <a href="<?php echo htmlspecialchars(goc_safe_url($video['youtube_url'])); ?>" target="_blank" rel="noopener" class="video-thumb-wrap" data-cursor-text="Watch">
                                    <img src="<?php echo $video['youtube_thumbnail_url'] ? htmlspecialchars($video['youtube_thumbnail_url']) : 'images/post-1.jpg'; ?>" alt="<?php echo htmlspecialchars($video['title']); ?>">
                                    <span class="video-play-overlay"><i class="fa-solid fa-play"></i></span>
                                </a>
                                <div class="resource-card-body">
                                    <h3><?php echo htmlspecialchars($video['title']); ?></h3>
                                    <?php if (!empty($video['channel_name'])) : ?>
                                        <p class="video-channel"><i class="fa-brands fa-youtube"></i> <?php echo htmlspecialchars($video['channel_name']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p class="note-text" style="text-align:center;">ยังไม่มีสื่อการเรียนรู้ในขณะนี้</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="our-features bg-section" id="bins">
        <div class="container">
            <div class="row section-row">
                <div class="col-xl-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">คัดแยกขยะ</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">ถังสีไหน? ทิ้งขยะอะไร?</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">แนวทางการคัดแยกขยะภายในสำนักงานตามสีของถังขยะ เพื่อการจัดการของเสียอย่างถูกวิธี</p>
                    </div>
                </div>
            </div>
            <div class="waste-bin-list">
                <div class="waste-bin-item bin-green wow fadeInUp">
                    <div class="bin-icon"><i class="fa-solid fa-leaf"></i></div>
                    <h3>ถังสีเขียว</h3>
                    <p>ขยะเปียก/เศษอาหาร ที่เน่าเสียและย่อยสลายได้เร็ว เช่น เศษอาหาร เปลือกผลไม้ เศษผัก เนื้อสัตว์ ใบไม้แห้ง</p>
                </div>
                <div class="waste-bin-item bin-blue wow fadeInUp" data-wow-delay="0.2s">
                    <div class="bin-icon"><i class="fa-solid fa-trash"></i></div>
                    <h3>ถังสีน้ำเงิน</h3>
                    <p>ขยะทั่วไป ย่อยสลายไม่ได้หรือย่อยสลายยาก ไม่คุ้มค่าต่อการรีไซเคิล เช่น ซองขนม กล่องโฟม หลอด ถุงพลาสติก</p>
                </div>
                <div class="waste-bin-item bin-yellow wow fadeInUp" data-wow-delay="0.4s">
                    <div class="bin-icon"><i class="fa-solid fa-recycle"></i></div>
                    <h3>ถังสีเหลือง</h3>
                    <p>ขยะรีไซเคิล ที่นำกลับมาใช้ซ้ำหรือแปรรูปได้ เช่น ขวดพลาสติก ขวดแก้ว กระป๋อง กล่องกระดาษ กระดาษ</p>
                </div>
                <div class="waste-bin-item bin-red wow fadeInUp" data-wow-delay="0.6s">
                    <div class="bin-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    <h3>ถังสีแดง</h3>
                    <p>ขยะอันตราย ที่มีสารปนเปื้อนอันตราย เช่น ถ่านไฟฉาย อุปกรณ์อิเล็กทรอนิกส์ ยาหมดอายุ กระป๋องสเปรย์</p>
                </div>
            </div>
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
