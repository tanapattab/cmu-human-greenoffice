<?php
$pageTitle = "เกี่ยวกับสำนักงานสีเขียว | GREEN OFFICE คณะมนุษยศาสตร์ มช.";
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
                        <h1 class="text-anime-style-3" data-cursor="-opaque">เกี่ยวกับสำนักงานสีเขียว</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo GO_BASE; ?>/">หน้าแรก</a></li>
                                <li class="breadcrumb-item active" aria-current="page">เกี่ยวกับสำนักงานสีเขียว</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="about-us" id="policy">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="about-us-image-box wow fadeInUp">
                        <div class="about-us-image">
                            <figure class="image-anime"><img src="https://e-humanities.human.cmu.ac.th/file/GreenOffice/news/20260902031644000000iIKnX.jpg" alt="อบรมขับเคลื่อนสำนักงานสีเขียว คณะมนุษยศาสตร์ มช."></figure>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="about-us-content">
                        <div class="section-title">
                            <span class="section-sub-title wow fadeInUp">นโยบาย</span>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">นโยบายการจัดการสำนักงานสีเขียว (Green Office)</h2>
                        </div>
                        <div class="about-us-content-list wow fadeInUp" data-wow-delay="0.2s">
                            <p style="margin-bottom:16px;line-height:1.8;">สำนักงานสีเขียว (Green Office) เป็นแนวคิดและแนวทางที่มุ่งให้การดำเนินงานของหน่วยงานใช้ทรัพยากรอย่างมีความรับผิดชอบต่อสิ่งแวดล้อม และลดผลกระทบเชิงลบที่เกิดจากกิจกรรมขององค์กร โดยมีเป้าหมายหลักคือการลดการใช้ทรัพยากรธรรมชาติ เช่น พลังงาน น้ำ และกระดาษ รวมถึงลดปริมาณของเสียที่เกิดขึ้นจากการดำเนินงาน</p>
                            <p style="margin-bottom:16px;line-height:1.8;">คณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่ มุ่งพัฒนาระบบบริหารจัดการสำนักงานตามแนวทางสำนักงานสีเขียว โดยส่งเสริมการมีส่วนร่วมของบุคลากรและนักศึกษาในการอนุรักษ์พลังงานและสิ่งแวดล้อม ควบคู่ไปกับการเรียนการสอนและการบริการวิชาการของคณะฯ</p>
                            <ul>
                                <li>ลดการใช้พลังงาน น้ำ กระดาษ และทรัพยากรอื่นๆ อย่างเป็นระบบ</li>
                                <li>ส่งเสริมการคัดแยกขยะและการจัดการของเสียอย่างถูกวิธี</li>
                                <li>สร้างจิตสำนึกด้านสิ่งแวดล้อมแก่บุคลากรและนักศึกษาอย่างต่อเนื่อง</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our-services bg-section" id="criteria">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">เกณฑ์การประเมิน</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">เกณฑ์การประเมินสำนักงานสีเขียว <?php echo (int) $goCategoryCount; ?> หมวด</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">คลิกแต่ละหมวดเพื่อดูรายละเอียดแนวทางการดำเนินงาน</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="accordion accordion-criteria wow fadeInUp" id="criteriaAccordion">
                <?php if (!empty($goCriteriaData['categories'])) : ?>
                    <?php foreach ($goCriteriaData['categories'] as $i => $cat) : ?>
                        <?php $catNo = (int) $cat['category_no']; $isFirst = ($i === 0); ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?php echo $catNo; ?>">
                                <button class="accordion-button<?php echo $isFirst ? '' : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $catNo; ?>" aria-expanded="<?php echo $isFirst ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $catNo; ?>">
                                    <span class="criteria-num"><?php echo $catNo; ?></span>&nbsp; <?php echo htmlspecialchars($cat['category_name']); ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $catNo; ?>" class="accordion-collapse collapse<?php echo $isFirst ? ' show' : ''; ?>" aria-labelledby="heading<?php echo $catNo; ?>" data-bs-parent="#criteriaAccordion">
                                <div class="accordion-body"><?php echo htmlspecialchars($cat['description']); ?><br><a href="<?php echo GO_BASE; ?>/criteria/<?php echo $catNo; ?>" class="readmore-btn">ดูรายละเอียดตัวชี้วัดและผลดำเนินการ</a></div>
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
    </div>

    <div class="page-contact-us" id="documents">
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
                            <?php foreach (array_slice($goDocuments, 0, 6) as $doc) : ?>
                                <?php $docUrl = $doc['pdf_url'] ?: $doc['external_link']; ?>
                                <?php if ($docUrl) : ?>
                                    <li>
                                        <i class="fa-solid <?php echo $doc['pdf_url'] ? 'fa-file-pdf' : 'fa-share-nodes'; ?>"></i>
                                        <a href="<?php echo htmlspecialchars(goc_safe_url($docUrl)); ?>" target="_blank" rel="noopener"><?php echo htmlspecialchars($doc['title']); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <p style="text-align:center;"><a href="<?php echo GO_BASE; ?>/documents" class="readmore-btn">ดูเอกสารทั้งหมด</a></p>
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
