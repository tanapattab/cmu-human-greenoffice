<?php
$pageTitle = "เอกสารที่เกี่ยวข้อง | GREEN OFFICE คณะมนุษยศาสตร์ มช.";
$__inc = dirname(__FILE__) . '/includes/header.php';
if (file_exists($__inc)) {
    include $__inc;
} else {
    die('<pre style="font-size:16px;color:#900;">ERROR: header.php not found at: ' . htmlspecialchars($__inc) . '</pre>');
}

$goDocumentsData = go_api_get('documents.php');
$goDocuments = isset($goDocumentsData['items']) ? $goDocumentsData['items'] : [];
?>


    <div class="page-header dark-section parallaxie" style="background-image:url('images/586048330_1320678639857334_2003215560779246887_n.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">เอกสารที่เกี่ยวข้อง</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo GO_BASE; ?>/">หน้าแรก</a></li>
                                <li class="breadcrumb-item active" aria-current="page">เอกสารที่เกี่ยวข้อง</li>
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
                        <span class="section-sub-title wow fadeInUp">เอกสารเผยแพร่</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">เอกสารที่เกี่ยวข้องกับสำนักงานสีเขียว</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <?php if (!empty($goDocuments)) : ?>
                        <ul class="doc-list wow fadeInUp">
                            <?php foreach ($goDocuments as $doc) : ?>
                                <?php $docUrl = $doc['pdf_url'] ?: $doc['external_link']; ?>
                                <?php if ($docUrl) : ?>
                                    <li>
                                        <i class="fa-solid <?php echo $doc['pdf_url'] ? 'fa-file-pdf' : 'fa-share-nodes'; ?>"></i>
                                        <a href="<?php echo htmlspecialchars($docUrl); ?>" target="_blank"><?php echo htmlspecialchars($doc['title']); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php else : ?>
                        <p class="note-text" style="text-align:center;">ยังไม่มีเอกสารเผยแพร่ในขณะนี้</p>
                    <?php endif; ?>
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
