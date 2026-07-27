<?php
$pageTitle = "เกณฑ์การประเมินสำนักงานสีเขียว รายหมวด | GREEN OFFICE คณะมนุษยศาสตร์ มช.";
$__inc = dirname(__FILE__) . '/includes/header.php';
if (file_exists($__inc)) {
    include $__inc;
} else {
    die('<pre style="font-size:16px;color:#900;">ERROR: header.php not found at: ' . htmlspecialchars($__inc) . '</pre>');
}
?>
<?php
$goSelectedYear = !empty($_GET['year']) ? (int) $_GET['year'] : null;
$goCriteriaPageData = $goSelectedYear ? go_api_get('criteria.php', ['year' => $goSelectedYear]) : $goCriteriaData;
$goFiscalYears = go_api_get('fiscal_years.php');
if (!$goFiscalYears) {
    $goFiscalYears = [];
}
$goActiveYearBe = isset($goCriteriaPageData['fiscal_year']['year_be']) ? (int) $goCriteriaPageData['fiscal_year']['year_be'] : null;
$goRequestedCat = !empty($_GET['cat']) ? (int) $_GET['cat'] : (!empty($goCriteriaPageData['categories'][0]['category_no']) ? (int) $goCriteriaPageData['categories'][0]['category_no'] : 1);
$goYearQuery = $goSelectedYear ? '?year=' . (int) $goSelectedYear : '';
$goModals = [];
$goModalSeq = 0;
?>


    <div class="page-header dark-section parallaxie" style="background-image:url('images/485159993_23970670855852936_3285528573380014631_n.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">การดำเนินงานตามเกณฑ์การประเมิน<br>สำนักงานสีเขียว</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo GO_BASE; ?>/">หน้าแรก</a></li>
                                <li class="breadcrumb-item active" aria-current="page">เกณฑ์การประเมิน</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="page-blog">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">รายละเอียดเกณฑ์</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">การดำเนินงานตามเกณฑ์การประเมินสำนักงานสีเขียว</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">เลือกปีงบประมาณและหมวดเกณฑ์การประเมินเพื่อดูรายละเอียดตัวชี้วัดและผลดำเนินการ</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="goc-filter-bar wow fadeInUp">
                        <select id="gocYear" onchange="window.location='<?php echo GO_BASE; ?>/criteria/<?php echo $goRequestedCat; ?>?year='+this.value">
                            <?php if (!empty($goFiscalYears)) : ?>
                                <?php foreach ($goFiscalYears as $fy) : ?>
                                    <option value="<?php echo (int) $fy['year_be']; ?>" <?php echo ($fy['year_be'] == $goActiveYearBe) ? 'selected' : ''; ?>>ปีงบประมาณ <?php echo (int) $fy['year_be']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <select id="gocCategory" onchange="window.location='<?php echo GO_BASE; ?>/criteria/'+this.value<?php echo $goSelectedYear ? "+'?year=" . (int) $goSelectedYear . "'" : ''; ?>">
                            <?php if (!empty($goCriteriaPageData['categories'])) : ?>
                                <?php foreach ($goCriteriaPageData['categories'] as $cat) : ?>
                                    <option value="<?php echo (int) $cat['category_no']; ?>" <?php echo ((int) $cat['category_no'] === $goRequestedCat) ? 'selected' : ''; ?>><?php echo htmlspecialchars($cat['category_name']); ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
            <?php if (!empty($goCriteriaPageData['categories'])) : ?>
                <?php foreach ($goCriteriaPageData['categories'] as $i => $cat) : ?>
                    <?php $catNo = (int) $cat['category_no']; ?>
                    <div class="goc-cat-block<?php echo $catNo === $goRequestedCat ? ' active' : ''; ?>" id="cat-<?php echo $catNo; ?>" data-cat="<?php echo $catNo; ?>">
                        <h3 style="margin-bottom:16px;"><?php echo htmlspecialchars($cat['category_name']); ?></h3>
                        <div class="goc-table-wrap">
                            <table class="goc-table">
                                <thead><tr><th>หมวด/ตัวชี้วัด</th><th>ผลดำเนินการ</th></tr></thead>
                                <tbody>
                                    <?php if (!empty($cat['subcategories'])) : ?>
                                        <?php foreach ($cat['subcategories'] as $sub1) : ?>
                                            <tr class="goc-sub-row"><td colspan="2"><?php echo htmlspecialchars($sub1['sub1_no'] . ' ' . $sub1['sub1_name']); ?></td></tr>
                                            <?php if (!empty($sub1['items'])) : ?>
                                                <?php foreach ($sub1['items'] as $item) : ?>
                                                    <?php
                                                    $hasText = !empty($item['result_text']);
                                                    $hasDoc = !empty($item['result_doc_url']);
                                                    $hasDocLink = !empty($item['result_doc_link']);
                                                    $hasImages = !empty($item['result_images']);
                                                    $hasResult = $hasText || $hasDoc || $hasDocLink || $hasImages;
                                                    if ($hasResult) {
                                                        $goModalSeq++;
                                                        $modalId = 'gocResultModal' . $goModalSeq;
                                                        ob_start();
                                                    ?>
                                                        <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">ผลการดำเนินงาน</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="goc-modal-itemno"><?php echo htmlspecialchars($item['item_no']); ?></p>
                                                                        <h4><?php echo nl2br(htmlspecialchars($item['item_title'])); ?></h4>
                                                                        <?php if (!empty($item['item_detail'])) : ?>
                                                                            <p><?php echo nl2br(htmlspecialchars($item['item_detail'])); ?></p>
                                                                        <?php endif; ?>
                                                                        <hr>
                                                                        <?php if ($hasText) : ?>
                                                                            <h5>ผลดำเนินการ (ข้อความสรุป)</h5>
                                                                            <p><?php echo nl2br(htmlspecialchars($item['result_text'])); ?></p>
                                                                        <?php endif; ?>
                                                                        <?php if ($hasDoc) : ?>
                                                                            <p><a href="<?php echo htmlspecialchars($item['result_doc_url']); ?>" target="_blank" class="goc-attach-link"><i class="fa-solid fa-file-pdf"></i> เอกสาร (PDF)</a></p>
                                                                        <?php endif; ?>
                                                                        <?php if ($hasDocLink) : ?>
                                                                            <p><a href="<?php echo htmlspecialchars($item['result_doc_link']); ?>" target="_blank" class="goc-attach-link"><i class="fa-solid fa-share-nodes"></i> ลิงก์เอกสารภายนอก</a></p>
                                                                        <?php endif; ?>
                                                                        <?php if ($hasImages) : ?>
                                                                            <div class="gallery-items goc-gallery">
                                                                                <?php foreach ($item['result_images'] as $imgUrl) : ?>
                                                                                    <a href="<?php echo htmlspecialchars($imgUrl); ?>"><img src="<?php echo htmlspecialchars($imgUrl); ?>" alt=""></a>
                                                                                <?php endforeach; ?>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                        $goModals[] = ob_get_clean();
                                                    }
                                                    ?>
                                                    <tr class="goc-item-row">
                                                        <td>
                                                            <?php if (!empty($item['item_no'])) : ?><strong><?php echo htmlspecialchars($item['item_no']); ?></strong> <?php endif; ?>
                                                            <?php echo nl2br(htmlspecialchars($item['item_title'])); ?>
                                                            <?php if (!empty($item['item_detail'])) : ?>
                                                                <br><?php echo nl2br(htmlspecialchars($item['item_detail'])); ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="goc-status">
                                                            <?php if ($hasResult) : ?>
                                                                <button type="button" class="btn goc-result-btn" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId; ?>">ผลการดำเนินงาน</button>
                                                            <?php else : ?>
                                                                &ndash;
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="note-text" style="text-align:center;">ไม่สามารถโหลดข้อมูลเกณฑ์การประเมินได้ในขณะนี้</p>
            <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php echo implode("\n", $goModals); ?>

<?php
$__inc2 = dirname(__FILE__) . '/includes/footer.php';
if (file_exists($__inc2)) {
    include $__inc2;
} else {
    echo '<pre style="font-size:16px;color:#900;">ERROR: footer.php not found at: ' . htmlspecialchars($__inc2) . '</pre>';
}
?>
