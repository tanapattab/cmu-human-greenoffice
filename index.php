<?php
$pageTitle = "GREEN OFFICE : คณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่";
$__inc = dirname(__FILE__) . '/includes/header.php';
if (file_exists($__inc)) {
    include $__inc;
} else {
    die('<pre style="font-size:16px;color:#900;">ERROR: header.php not found at: ' . htmlspecialchars($__inc) . '</pre>');
}
?>

    <div class="hero dark-section parallaxie">
        <div class="hero-slideshow">
            <div class="hero-slide active" style="background-image:url('images/485159993_23970670855852936_3285528573380014631_n.jpg');"></div>
            <div class="hero-slide" style="background-image:url('images/586048330_1320678639857334_2003215560779246887_n.jpg');"></div>
            <div class="hero-slide" style="background-image:url('images/585056162_1320678793190652_5874898088255414504_n.jpg');"></div>
            <div class="hero-slide" style="background-image:url('images/HumanView_%E0%B9%92%E0%B9%91%E0%B9%90%E0%B9%98%E0%B9%91%E0%B9%97_0_0.jpg');"></div>
            <div class="hero-slide" style="background-image:url('images/HumanView_%E0%B9%92%E0%B9%91%E0%B9%90%E0%B9%98%E0%B9%91%E0%B9%97_9_0.jpg');"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-content">
                         <div class="section-title">
                            <span class="section-sub-title wow fadeInUp">คณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่</span>
                            <h1 class="text-anime-style-3" data-cursor="-opaque">ก้าวสู่สำนักงานสีเขียว (Green Office)</h1>
                        </div>

                        <div class="hero-content-footer wow fadeInUp" data-wow-delay="0.2s">
                            <div class="hero-btn">
                                <a href="<?php echo GO_BASE; ?>/about" class="btn-default btn-highlighted">เกี่ยวกับสำนักงานสีเขียว</a>
                            </div>

                            <div class="video-play-button">
                                <a href="https://www.facebook.com/humancmu/" target="_blank" rel="noopener" class="bg-effect" data-cursor-text="ติดตาม">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <p>ติดตามกิจกรรมของเราทาง Facebook</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Each .hero-slideshow container on the page runs its own independent
            // crossfade cycle. Wrapped in DOMContentLoaded because this script tag
            // sits before later sections (e.g. the news slideshow further down the page).
            document.querySelectorAll('.hero-slideshow').forEach(function (container) {
                var slides = container.querySelectorAll('.hero-slide');
                if (slides.length < 2) return;
                var idx = 0;
                setInterval(function () {
                    slides[idx].classList.remove('active');
                    idx = (idx + 1) % slides.length;
                    slides[idx].classList.add('active');
                }, 5000);
            });
        });
    </script>

    <div class="about-us" id="policy">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="about-us-image-box wow fadeInUp">
                        <div class="about-us-image">
                            <figure class="image-anime">
                                <img src="https://www.cmu.ac.th/content/organization/f45789f8-b4ae-46bd-a62a-4ea99608dde9/e2f1aef4-d5fb-444b-9cb6-7d061a5ca213.jpg" alt="อาคารคณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่">
                            </figure>
                        </div>

                        <div class="about-us-cta-box">
                            <div class="icon-box"><img src="images/icon-about-cta.svg" alt=""></div>
                            <div class="about-rating-content">
                                <span class="about-rating-star"><i class="fa-solid fa-leaf"></i></span>
                                <h2>ทุกคนมีส่วนร่วมสร้างสำนักงานสีเขียว</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7">
                    <div class="about-us-content">
                        <div class="section-title">
                            <span class="section-sub-title wow fadeInUp">เกี่ยวกับเรา</span>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">นโยบายการจัดการสำนักงานสีเขียวและเป้าหมายการใช้ทรัพยากรอย่างยั่งยืน</h2>
                        </div>

                        <div class="about-us-review-box wow fadeInUp" data-wow-delay="0.2s">
                            <div class="about-us-review-image">
                                <figure class="image-anime"><img src="images/about-us-review-image.jpg" alt=""></figure>
                            </div>

                            <div class="about-us-review-content-box">
                                <div class="about-us-review-content">
                                    <h3>"การใช้ทรัพยากรอย่างรู้คุณค่า คือความรับผิดชอบของทุกคนในองค์กร"</h3>
                                </div>
                                <div class="about-us-author-content">
                                    <h3>ทีมงานสำนักงานสีเขียว</h3>
                                    <p>คณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่</p>
                                </div>
                            </div>
                        </div>

                        <div class="about-us-body wow fadeInUp" data-wow-delay="0.4s">
                            <div class="about-us-body-item">
                                <div class="icon-box"><img src="images/icon-about-us-body-1.svg" alt=""></div>
                                <div class="about-us-body-item-content">
                                    <h3>การจัดการพลังงานและทรัพยากร</h3>
                                    <p>ใช้ไฟฟ้า น้ำ และกระดาษอย่างมีประสิทธิภาพและเกิดประโยชน์สูงสุด</p>
                                </div>
                            </div>

                            <div class="about-us-body-item">
                                <div class="icon-box"><img src="images/icon-about-us-body-2.svg" alt=""></div>
                                <div class="about-us-body-item-content">
                                    <h3>การสร้างจิตสำนึกด้านสิ่งแวดล้อม</h3>
                                    <p>ส่งเสริมให้บุคลากรและนักศึกษาร่วมอนุรักษ์สิ่งแวดล้อมในชีวิตประจำวัน</p>
                                </div>
                            </div>
                        </div>

                        <div class="about-us-content-list wow fadeInUp" data-wow-delay="0.6s">
                            <ul>
                                <li>ลดการใช้พลังงาน น้ำ และกระดาษอย่างเป็นระบบ</li>
                                <li>ดำเนินงานตามเกณฑ์การประเมินสำนักงานสีเขียว 6 หมวด</li>
                            </ul>
                        </div>

                        <div class="about-us-btn wow fadeInUp" data-wow-delay="0.8s">
                            <a href="<?php echo GO_BASE; ?>/about" class="btn-default">อ่านนโยบายฉบับเต็ม</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our-services dark-section" id="criteria">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">เกณฑ์การประเมิน</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">การดำเนินงานตามเกณฑ์การประเมินสำนักงานสีเขียว 6 หมวด</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">กรอบการดำเนินงานตามมาตรฐานสำนักงานสีเขียว (Green Office) ที่คณะฯ นำมาใช้เป็นแนวทางปฏิบัติ</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="service-item wow fadeInUp">
                        <div class="service-item-box">
                            <div class="service-item-header">
                                <div class="icon-box"><img src="images/icon-service-item-1.svg" alt=""></div>
                                <div class="service-item-content">
                                    <h2><a href="<?php echo GO_BASE; ?>/criteria/1">หมวดที่ 1: การกำหนดนโยบาย การวางแผนการดำเนินงาน และการปรับปรุงอย่างต่อเนื่อง</a></h2>
                                </div>
                            </div>
                            <div class="service-item-body">
                                <div class="service-item-btn">
                                    <a href="<?php echo GO_BASE; ?>/criteria/1" class="btn-default btn-highlighted">อ่านเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item-box">
                            <div class="service-item-header">
                                <div class="icon-box"><img src="images/icon-service-item-2.svg" alt=""></div>
                                <div class="service-item-content">
                                    <h2><a href="<?php echo GO_BASE; ?>/criteria/2">หมวดที่ 2: การสื่อสารและสร้างจิตสำนึก</a></h2>
                                </div>
                            </div>
                            <div class="service-item-body">
                                <div class="service-item-btn">
                                    <a href="<?php echo GO_BASE; ?>/criteria/2" class="btn-default btn-highlighted">อ่านเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="service-item-box">
                            <div class="service-item-header">
                                <div class="icon-box"><img src="images/icon-service-item-3.svg" alt=""></div>
                                <div class="service-item-content">
                                    <h2><a href="<?php echo GO_BASE; ?>/criteria/3">หมวดที่ 3: การใช้ทรัพยากรและพลังงาน</a></h2>
                                </div>
                            </div>
                            <div class="service-item-body">
                                <div class="service-item-btn">
                                    <a href="<?php echo GO_BASE; ?>/criteria/3" class="btn-default btn-highlighted">อ่านเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-item wow fadeInUp">
                        <div class="service-item-box">
                            <div class="service-item-header">
                                <div class="icon-box"><img src="images/icon-service-item-4.svg" alt=""></div>
                                <div class="service-item-content">
                                    <h2><a href="<?php echo GO_BASE; ?>/criteria/4">หมวดที่ 4: การจัดการของเสีย</a></h2>
                                </div>
                            </div>
                            <div class="service-item-body">
                                <div class="service-item-btn">
                                    <a href="<?php echo GO_BASE; ?>/criteria/4" class="btn-default btn-highlighted">อ่านเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item-box">
                            <div class="service-item-header">
                                <div class="icon-box"><img src="images/icon-service-item-5.svg" alt=""></div>
                                <div class="service-item-content">
                                    <h2><a href="<?php echo GO_BASE; ?>/criteria/5">หมวดที่ 5: สภาพแวดล้อมและความปลอดภัย</a></h2>
                                </div>
                            </div>
                            <div class="service-item-body">
                                <div class="service-item-btn">
                                    <a href="<?php echo GO_BASE; ?>/criteria/5" class="btn-default btn-highlighted">อ่านเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="service-item-box">
                            <div class="service-item-header">
                                <div class="icon-box"><img src="images/icon-service-item-6.svg" alt=""></div>
                                <div class="service-item-content">
                                    <h2><a href="<?php echo GO_BASE; ?>/criteria/6">หมวดที่ 6: การจัดซื้อและจัดจ้างที่เป็นมิตรกับสิ่งแวดล้อม</a></h2>
                                </div>
                            </div>
                            <div class="service-item-body">
                                <div class="service-item-btn">
                                    <a href="<?php echo GO_BASE; ?>/criteria/6" class="btn-default btn-highlighted">อ่านเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.4s">
                        <p>ศึกษารายละเอียดเกณฑ์การประเมินแต่ละหมวดเพิ่มเติมได้ที่ - <a href="<?php echo GO_BASE; ?>/about#criteria">หน้าเกี่ยวกับสำนักงานสีเขียว</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="why-choose-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="why-choose-content">
                        <div class="section-title">
                            <span class="section-sub-title wow fadeInUp">มาตรการและแนวทางปฏิบัติ</span>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">การจัดการพลังงานและสิ่งแวดล้อมในสำนักงาน</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">แนวปฏิบัติที่บุคลากรและนักศึกษาทุกคนร่วมกันทำได้ในชีวิตประจำวัน</p>
                        </div>

                        <div class="why-choose-body wow fadeInUp" data-wow-delay="0.4s">
                            <div class="why-choose-counter-box">
                                <div class="why-choose-counter-item">
                                    <h3><span class="counter">6</span></h3>
                                    <p>หมวดเกณฑ์การประเมินสำนักงานสีเขียว</p>
                                </div>
                                <div class="why-choose-counter-item">
                                    <h3><span class="counter">4</span></h3>
                                    <p>ประเภทถังคัดแยกขยะภายในคณะฯ</p>
                                </div>
                            </div>

                            <div class="why-choose-info-box">
                                <ul class="measures-list">
                                    <li><i class="fa-solid fa-check"></i>ปิดไฟและเครื่องปรับอากาศทุกครั้งที่ไม่ใช้งาน</li>
                                    <li><i class="fa-solid fa-check"></i>ใช้กระดาษอย่างคุ้มค่า พิมพ์สองหน้า และนำกลับมาใช้ซ้ำ</li>
                                    <li><i class="fa-solid fa-check"></i>คัดแยกขยะก่อนทิ้งตามประเภทถังขยะ</li>
                                    <li><i class="fa-solid fa-check"></i>ประหยัดน้ำ ปิดก๊อกน้ำให้สนิททุกครั้งหลังใช้งาน</li>
                                    <li><i class="fa-solid fa-check"></i>เลือกใช้ผลิตภัณฑ์และบริการที่เป็นมิตรต่อสิ่งแวดล้อม</li>
                                </ul>
                            </div>
                        </div>

                        <div class="why-choose-btn wow fadeInUp" data-wow-delay="0.6s">
                            <a href="<?php echo GO_BASE; ?>/activities" class="btn-default">ดูการดำเนินงานทั้งหมด</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="why-choose-image-box">
                        <div class="why-choose-image-box-1">
                            <div class="why-choose-image"><figure class="image-anime reveal"><img src="images/why-choose-image-1.jpg" alt=""></figure></div>
                        </div>
                        <div class="why-choose-image-box-2">
                            <div class="why-choose-image"><figure class="image-anime reveal"><img src="images/why-choose-image-2.jpg" alt=""></figure></div>
                            <div class="why-choose-image"><figure class="image-anime reveal"><img src="images/why-choose-image-3.jpg" alt=""></figure></div>
                            <div class="contact-us-circle"><a href="<?php echo GO_BASE; ?>/contact"><img src="images/contact-us-circle.svg" alt=""></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="what-we-do" id="activities">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">กิจกรรมของเรา</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">กิจกรรมสำนักงานสีเขียว (Green Office)</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="resource-card wow fadeInUp">
                        <img src="images/gallery-1.jpg" alt="">
                        <div class="resource-card-body">
                            <h3>กิจกรรม 5ส และ Big Cleaning Week</h3>
                            <p>ปรับปรุงพื้นที่ทำงานให้สะอาด เป็นระเบียบ และปลอดภัยตามหลัก 5ส</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="resource-card wow fadeInUp" data-wow-delay="0.2s">
                        <img src="images/gallery-2.jpg" alt="">
                        <div class="resource-card-body">
                            <h3>อบรมเกณฑ์การประเมินสำนักงานสีเขียว</h3>
                            <p>เสริมความรู้ความเข้าใจแก่บุคลากรเกี่ยวกับแนวทางปฏิบัติตามเกณฑ์ทั้ง 6 หมวด</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="resource-card wow fadeInUp" data-wow-delay="0.4s">
                        <img src="images/gallery-3.jpg" alt="">
                        <div class="resource-card-body">
                            <h3>รณรงค์คัดแยกขยะในหน่วยงาน</h3>
                            <p>ส่งเสริมการคัดแยกขยะตามประเภทถังสีต่างๆ อย่างถูกต้อง</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.4s">
                        <p>ชมภาพกิจกรรมและสื่อรณรงค์เพิ่มเติมได้ที่ - <a href="<?php echo GO_BASE; ?>/activities">หน้าการดำเนินงาน</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our-features bg-section" id="bins">
        <div class="container">
            <div class="row section-row">
                <div class="col-xl-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">คัดแยกขยะ</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">ถังสีไหน? ทิ้งขยะอะไร?</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">แนวทางการคัดแยกขยะภายในสำนักงานตามสีของถังขยะ</p>
                    </div>
                </div>
            </div>

            <div class="waste-bin-list">
                <div class="waste-bin-item bin-green wow fadeInUp">
                    <div class="bin-icon"><i class="fa-solid fa-leaf"></i></div>
                    <h3>ถังสีเขียว</h3>
                    <p>ขยะเปียก/เศษอาหาร ที่เน่าเสียและย่อยสลายได้เร็ว เช่น เศษอาหาร เปลือกผลไม้ ใบไม้แห้ง</p>
                </div>
                <div class="waste-bin-item bin-blue wow fadeInUp" data-wow-delay="0.2s">
                    <div class="bin-icon"><i class="fa-solid fa-trash"></i></div>
                    <h3>ถังสีน้ำเงิน</h3>
                    <p>ขยะทั่วไป ย่อยสลายยากและไม่คุ้มค่าต่อการรีไซเคิล เช่น ซองขนม ถุงพลาสติก โฟม</p>
                </div>
                <div class="waste-bin-item bin-yellow wow fadeInUp" data-wow-delay="0.4s">
                    <div class="bin-icon"><i class="fa-solid fa-recycle"></i></div>
                    <h3>ถังสีเหลือง</h3>
                    <p>ขยะรีไซเคิล นำกลับมาใช้ซ้ำได้ เช่น ขวดพลาสติก ขวดแก้ว กระป๋อง กระดาษ</p>
                </div>
                <div class="waste-bin-item bin-red wow fadeInUp" data-wow-delay="0.6s">
                    <div class="bin-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    <h3>ถังสีแดง</h3>
                    <p>ขยะอันตราย เช่น ถ่านไฟฉาย หลอดไฟ ยาหมดอายุ กระป๋องสเปรย์</p>
                </div>
            </div>
        </div>
    </div>

    <div class="our-testimonials bg-section dark-section parallaxie news-section-solid">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-xl-6">
                    <div class="section-title">
                        <span class="section-sub-title wow fadeInUp">ข่าวกิจกรรม</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">ความเคลื่อนไหวล่าสุดของสำนักงานสีเขียว</h2>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="section-content-btn">
                        <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                            <p>ติดตามข่าวสารและกิจกรรมล่าสุดของสำนักงานสีเขียว คณะมนุษยศาสตร์ มช.</p>
                        </div>
                        <div class="section-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="<?php echo GO_BASE; ?>/news" class="btn-default">ดูข่าวทั้งหมด</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="post-item wow fadeInUp">
                        <div class="post-featured-image">
                            <a href="<?php echo GO_BASE; ?>/news" data-cursor-text="View">
                                <figure class="image-anime"><img src="images/post-1.jpg" alt=""></figure>
                            </a>
                            <div class="post-item-tags"><a href="<?php echo GO_BASE; ?>/news">ตัวอย่างข่าวกิจกรรม</a></div>
                        </div>
                        <div class="post-item-body">
                            <div class="post-item-content"><h2><a href="<?php echo GO_BASE; ?>/news">อบรมเชิงปฏิบัติการ การดำเนินงานตามเกณฑ์สำนักงานสีเขียว</a></h2></div>
                            <div class="post-item-btn"><a href="<?php echo GO_BASE; ?>/news" class="readmore-btn">อ่านต่อ</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="post-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="post-featured-image">
                            <a href="<?php echo GO_BASE; ?>/news" data-cursor-text="View">
                                <figure class="image-anime"><img src="images/post-2.jpg" alt=""></figure>
                            </a>
                            <div class="post-item-tags"><a href="<?php echo GO_BASE; ?>/news">ตัวอย่างข่าวกิจกรรม</a></div>
                        </div>
                        <div class="post-item-body">
                            <div class="post-item-content"><h2><a href="<?php echo GO_BASE; ?>/news">ต้อนรับคณะศึกษาดูงานด้านสำนักงานสีเขียว</a></h2></div>
                            <div class="post-item-btn"><a href="<?php echo GO_BASE; ?>/news" class="readmore-btn">อ่านต่อ</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="post-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="post-featured-image">
                            <a href="<?php echo GO_BASE; ?>/news" data-cursor-text="View">
                                <figure class="image-anime"><img src="images/post-3.jpg" alt=""></figure>
                            </a>
                            <div class="post-item-tags"><a href="<?php echo GO_BASE; ?>/news">ตัวอย่างข่าวกิจกรรม</a></div>
                        </div>
                        <div class="post-item-body">
                            <div class="post-item-content"><h2><a href="<?php echo GO_BASE; ?>/news">กิจกรรม 5ส Before & After ประจำปี</a></h2></div>
                            <div class="post-item-btn"><a href="<?php echo GO_BASE; ?>/news" class="readmore-btn">อ่านต่อ</a></div>
                        </div>
                    </div>
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
