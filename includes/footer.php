
	<footer class="main-footer bg-section dark-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4">
                    <div class="about-footer">
                        <div class="footer-logo brand-box">
                            <img class="uni-logo" src="images/humanities-cmu-logo.png" alt="โลโก้">
                            <span class="brand-text"><strong>GREEN OFFICE</strong><span>คณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่</span></span>
                        </div>

                        <div class="about-footer-content">
                            <p>มุ่งสู่การเป็นสำนักงานสีเขียวที่ใช้ทรัพยากรและพลังงานอย่างรู้คุณค่า ลดผลกระทบต่อสิ่งแวดล้อม และสร้างจิตสำนึกด้านความยั่งยืนแก่บุคลากรและนักศึกษา</p>
                        </div>

                        <div class="about-footer-info-box">
                            <div class="footer-info-list">
                                <ul>
                                    <li><i class="fa-solid fa-phone"></i><span>โทรศัพท์: </span><a href="tel:+6653943208">0 5394 3208</a></li>
                                    <li><i class="fa-solid fa-envelope"></i><span>อีเมล: </span><a href="mailto:humaninfo@cmu.ac.th">humaninfo@cmu.ac.th</a></li>
                                </ul>
                            </div>

                            <div class="footer-social-links">
                                <h2>ติดตามเรา:</h2>
                                <ul>
                                    <li><a href="https://www.facebook.com/humancmu/" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="http://www.human.cmu.ac.th/" target="_blank" rel="noopener"><i class="fa-solid fa-globe"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="footer-links-box">
                        <div class="footer-links">
                            <h2>เมนูลัด</h2>
                            <ul>
                                <li><a href="<?php echo GO_BASE; ?>/">หน้าแรก</a></li>
                                <li><a href="<?php echo GO_BASE; ?>/about">เกี่ยวกับสำนักงานสีเขียว</a></li>
                                <li><a href="<?php echo GO_BASE; ?>/activities">การดำเนินงาน</a></li>
                                <li><a href="<?php echo GO_BASE; ?>/news">ข่าวกิจกรรม</a></li>
                                <li><a href="<?php echo GO_BASE; ?>/activities#resources">สื่อการเรียนรู้</a></li>
                            </ul>
                        </div>

                        <div class="footer-links">
                            <h2>เกณฑ์การประเมิน <?php echo (int) $goCategoryCount; ?> หมวด</h2>
                            <ul>
                                <?php if (!empty($goCriteriaData['categories'])) : ?>
                                    <?php foreach ($goCriteriaData['categories'] as $cat) : ?>
                                        <li><a href="<?php echo GO_BASE; ?>/criteria/<?php echo (int) $cat['category_no']; ?>"><?php echo (int) $cat['category_no']; ?>. <?php echo htmlspecialchars(preg_replace('/^หมวดที่\s*\d+\s*/u', '', $cat['category_name'])); ?></a></li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <li><a href="<?php echo GO_BASE; ?>/criteria">รายละเอียดเกณฑ์การประเมิน</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="footer-links footer-contact-list">
                            <div class="footer-contact-item">
                                <h2>ติดต่อ</h2>
                                <p>คณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่<br>239 ถนนห้วยแก้ว ตำบลสุเทพ อำเภอเมือง จังหวัดเชียงใหม่ 50200</p>
                            </div>

                            <div class="footer-working-hour-box">
                                <h2>เวลาทำการ</h2>
                                <ul>
                                    <li><span>จันทร์ - ศุกร์ :</span> 08:30 - 16:30 น.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="footer-copyright-text">
                            <p>Copyright © 2026 คณะมนุษยศาสตร์ มหาวิทยาลัยเชียงใหม่. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="gocCookieConsent" class="goc-cookie-consent" style="display:none;">
        <div class="goc-cookie-consent-inner">
            <p>เว็บไซต์นี้ใช้คุกกี้เพื่อเพิ่มประสิทธิภาพในการใช้งานเว็บไซต์ของท่านให้ดียิ่งขึ้น สามารถศึกษารายละเอียดได้ที่ <a href="https://www.cmu.ac.th/th/privacy-policy" target="_blank" rel="noopener">นโยบายความเป็นส่วนตัวของมหาวิทยาลัยเชียงใหม่</a></p>
            <button type="button" id="gocCookieAccept" class="btn-default btn-highlighted">ยอมรับ</button>
        </div>
    </div>
    <style>
        .goc-cookie-consent{position:fixed;left:0;right:0;bottom:0;z-index:99999;background:#031600;color:#fff;box-shadow:0 -4px 20px rgba(0,0,0,0.25)}
        .goc-cookie-consent-inner{max-width:1200px;margin:0 auto;padding:16px 24px;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:16px}
        .goc-cookie-consent-inner p{margin:0;font-size:14px;line-height:1.6;flex:1 1 320px}
        .goc-cookie-consent-inner a{color:#8be08b;text-decoration:underline}
        .goc-cookie-consent-inner .btn-highlighted{flex:0 0 auto;padding:10px 28px;cursor:pointer;border:none}
    </style>
    <script>
        (function(){
            try {
                if(!localStorage.getItem('goc_cookie_consent')){
                    document.getElementById('gocCookieConsent').style.display = 'block';
                }
            } catch(e) {}
            var btn = document.getElementById('gocCookieAccept');
            if(btn){
                btn.addEventListener('click', function(){
                    try { localStorage.setItem('goc_cookie_consent', '1'); } catch(e) {}
                    document.getElementById('gocCookieConsent').style.display = 'none';
                });
            }
        })();
    </script>

    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validator.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/SmoothScroll.js"></script>
    <script src="js/parallaxie.js"></script>
    <script src="js/gsap.min.js"></script>
    <script src="js/SplitText.min.js"></script>
    <script src="js/ScrollTrigger.min.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/function.js"></script>
</body>
</html>