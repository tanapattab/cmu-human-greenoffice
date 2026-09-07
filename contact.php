<?php
$pageTitle = "ติดต่อเรา | GREEN OFFICE คณะมนุษยศาสตร์ มช.";
$__inc = dirname(__FILE__) . '/includes/header.php';
if (file_exists($__inc)) {
    include $__inc;
} else {
    die('<pre style="font-size:16px;color:#900;">ERROR: header.php not found at: ' . htmlspecialchars($__inc) . '</pre>');
}
?>


    <div class="page-header dark-section parallaxie" style="background-image:url('images/485159993_23970670855852936_3285528573380014631_n.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">ติดต่อเรา</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo GO_BASE; ?>/">หน้าแรก</a></li>
                                <li class="breadcrumb-item active" aria-current="page">ติดต่อเรา</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="page-contact-us">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="contact-us-image-box wow fadeInUp">
                        <div class="contact-us-image">
                            <figure class="image-anime"><img src="https://www.cmu.ac.th/content/organization/f45789f8-b4ae-46bd-a62a-4ea99608dde9/e2f1aef4-d5fb-444b-9cb6-7d061a5ca213.jpg" alt="อาคารคณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่"></figure>
                        </div>

                        <div class="contact-info-box">
                            <div class="contact-info-item">
                                <div class="icon-box"><i class="fa-solid fa-phone"></i></div>
                                <div class="contact-info-item-content">
                                    <h2>โทรศัพท์ / โทรสาร</h2>
                                    <p><a href="tel:+6653943208">0 5394 3208</a> / 0 5321 1595</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="icon-box"><i class="fa-solid fa-envelope"></i></div>
                                <div class="contact-info-item-content">
                                    <h2>อีเมล</h2>
                                    <p><a href="mailto:humaninfo@cmu.ac.th">humaninfo@cmu.ac.th</a></p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="icon-box"><i class="fa-solid fa-location-dot"></i></div>
                                <div class="contact-info-item-content">
                                    <h2>ที่อยู่</h2>
                                    <p>239 ถนนห้วยแก้ว ตำบลสุเทพ อำเภอเมือง จังหวัดเชียงใหม่ 50200</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7">
                    <div class="contact-us-form">
                        <div class="section-title">
                            <span class="section-sub-title wow fadeInUp">ติดต่อเรา</span>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">แจ้งข้อเสนอแนะ/ข้อคิดเห็นสำนักงานสีเขียว</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">ด้านสิ่งแวดล้อมและกายภาพ ทีมงานสำนักงานสีเขียวยินดีรับฟังทุกข้อเสนอแนะ</p>
                        </div>

                        <div class="contact-form">
                            <form id="contactForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.4s">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <label>ชื่อ:</label>
                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="กรอกชื่อ *" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <label>นามสกุล:</label>
                                        <input type="text" name="lname" class="form-control" id="lname" placeholder="กรอกนามสกุล *" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <label>อีเมล:</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="กรอกอีเมล *" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <label>เบอร์โทรศัพท์:</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="กรอกเบอร์โทรศัพท์ *" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-12 mb-5">
                                        <label>ข้อความ/ข้อเสนอแนะ:</label>
                                        <textarea name="message" class="form-control" id="message" rows="5" placeholder="ระบุข้อเสนอแนะของท่าน..."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn-default">ส่งข้อความ</button>
                                        <div id="msgSubmit" class="h3 hidden"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our-services bg-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="qr-box wow fadeInUp">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=https%3A//voc.cmu.ac.th/Choose.aspx" alt="QR Code ระบบรับข้อเสนอแนะ มช.">
                        <h3 style="margin-bottom:8px;">สแกนเพื่อแจ้งข้อเสนอแนะ</h3>
                        <p>ระบบรับข้อเสนอแนะ/ข้อร้องเรียน มหาวิทยาลัยเชียงใหม่ (Voice of Customer)</p>
                        <p><a href="https://voc.cmu.ac.th/Choose.aspx" target="_blank" rel="noopener">https://voc.cmu.ac.th/Choose.aspx</a></p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-8">
                    <div class="qr-box wow fadeInUp" data-wow-delay="0.2s">
                        <i class="fa-brands fa-facebook" style="font-size:64px;color:#1877f2;margin-bottom:14px;display:block;"></i>
                        <h3 style="margin-bottom:8px;">ติดตามข่าวสารทาง Facebook</h3>
                        <p>คณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่</p>
                        <p><a href="https://www.facebook.com/humancmu/" target="_blank" rel="noopener">https://www.facebook.com/humancmu/</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="google-map">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title">แผนที่</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">ที่ตั้งคณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">239 ถนนห้วยแก้ว ตำบลสุเทพ อำเภอเมือง จังหวัดเชียงใหม่ 50200</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="google-map-iframe wow fadeInUp" data-wow-delay="0.4s">
                        <iframe src="https://www.google.com/maps?q=239%20Huay%20Kaew%20Road%2C%20Suthep%2C%20Mueang%20Chiang%20Mai%2C%20Faculty%20of%20Humanities%20Chiang%20Mai%20University&output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
