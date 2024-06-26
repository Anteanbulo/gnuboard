<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
include_once(G5_THEME_PATH.'/head.php');
?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<ul id="page_nat">
    <li><a href="#about" class="on"><span class="sound_only">about 이동</span></a></li>
    <li><a href="#resume"><span class="sound_only">resume 이동</span></a></li>
    <li><a href="#contact"><span class="sound_only">contact 이동</span></a></li>
</ul>

<section id="about" class="about">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-8 col-lg-9">
                <h2 class="display-4 mx-xl-6 text-center">ABOUT</h2>
                <p class="lead">Anteanbolu의 차별화된 마케팅</p>
			</div>
		</div>
		<div class="row">
        <!-- 목록 타이틀입니다. -->
            <?php
            // 포트폴리오 게시판 테이블에서 제목 ABOUT 을 가져옴
            $sql = " select * from ".G5_WRITE_PORTFOLIO_TABLE." where wr_subject = 'ABOUT' ";
            $row = sql_fetch($sql);
            $arr = explode("\n", $row['wr_content']);
            $i=0;
            $about = array();
            foreach($arr as $str) {
                // 공백이 있는 라인으로 구분함
                if (trim($str) == '') {
                    $i++;
                }
                $about[$i] = $str.'<br>';
            }
            ?>

            <div class="col-md-4 col-lg-4 pofile_img" data-aos="fade-up" data-aos-duration="2000">
                <p class="my_profile_img text-center"><span><img src="<?php echo G5_THEME_IMG_URL ?>/face.png" alt="나의 프로필 사진" /></span></p>
                <p class="lead"><?php echo $about[0]; ?></p><!-- 1단 -->
            </div>
            <div class="col-md-4 col-lg-4" data-aos="fade-up" data-aos-duration="3000">
                <p class="lead"><?php echo $about[1]; ?></p><!-- 2단 -->
            </div>
            <div class="col-md-4 col-lg-4" data-aos="fade-up" data-aos-duration="4000">
                <p class="lead"><?php echo $about[2]; ?></p><!-- 3단 -->
            </div>
		</div>
    </div>
</section>


<section id="resume" class="resume">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-8 col-lg-9">
                <h2 class="display-4 mx-xl-6">RESUME</h2>
                <p class="lead">포트폴리오 테마 이력입니다.</p>
            </div>
        </div>
        <div class="row text-center">
            <?php
            // 포트폴리오 게시판 테이블에서 제목 RESUME 을 가져옴
            $sql = " select * from ".G5_WRITE_PORTFOLIO_TABLE." where wr_subject = 'RESUME' ";
            $row = sql_fetch($sql);
            $arr = explode("\n", $row['wr_content']);
            $i=0;
            $resume = array();
            foreach($arr as $str) {
                // 공백이 있는 라인으로 구분함
                if (trim($str) == '') {
                    $i++;
                }
                $resume[$i] = $resume[$i].$str."\n";
            }
            $education  = explode("\n", $resume[0]);
            $license    = explode("\n", $resume[1]);
            $experience = explode("\n", $resume[2]);
            ?>
            <dl class="col-md-4 col-lg-4 aos-init aos-animate re_edu text-center" data-aos="fade-up" data-aos-delay="100">
                <dt>소통의 게시판</dt>
                <?php
                foreach($education as $str){
                    echo '<dd>'.$str.'</dd>';
                }
                ?>
            </dl>
            <dl class="col-md-4 col-lg-4 aos-init aos-animate re_lic text-center" data-aos="fade-up" data-aos-delay="100">
                <dt>자격증</dt>
                <?php
                foreach($license as $str){
                    echo '<dd>'.$str.'</dd>';
                }
                ?>
            </dl>
            <dl class="col-md-4 col-lg-4 aos-init aos-animate re_exp text-center" data-aos="fade-up" data-aos-delay="100">
                <dt>경험공유,오류게시판</dt>
                <?php
                foreach($experience as $str){
                    echo '<dd>'.$str.'</dd>';
                }
                ?>
            </dl>
        </div>
    </div>
</section>




<section id="contact" class="contact">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-8 col-lg-9">
                <h2 class="display-4 mx-xl-6">CONTACT</h2>
                <p class="lead">연락처를 남겨주세요.</p>
			</div>
        </div>
        <div id="contact_from" data-aos="flip-left" class="container">
            <form name="fcontact" action="<?php echo G5_THEME_URL; ?>/contact_send.php" method="post" onsubmit="return fcontact_submit(this);">
                <fieldset id="contact_fs">
                    <legend>Contact</legend>
                    <p>
                        <label for="con_name">이름</label>
                        <input type="text" name="con_name" id="con_name" required class="frm_input required" minlength="2" maxlength="100" placeholder=" 보내실 분의 이름을 입력해 주세요.">
                    </p>
                    <p>
                        <label for="con_name">이메일</label>
                        <input type="text" name="con_email" id="con_email" required class="frm_input required email" maxlength="100" placeholder=" 보내실 분의 이메일을 입력해 주세요.">
                    </p>
                    <p>
                        <label for="con_tel">연락처</label>
                        <input type="text" name="con_tel" id="con_tel" required class="frm_input required telnum" maxlength="20" placeholder=" 예) 010-1234-5678">
                    </p>
                    <p>
                        <label for="con_message">메시지</label>
                        <textarea name="con_message" rows="10" cols="100%" id="con_message" title="내용쓰기" required class="required" placeholder=" 내용을 입력해주세요."></textarea>
                    </p>
                    <p class="captcha">
                        <?php echo captcha_html(); ?>
                    </p>
                    <button type="submit" id="btn_submit" class="btn_submit">보내기</button>
                </fieldset>
            </form>
        </div>
    </div>
</section>

<script>
    //skill
    $(function () {
        $('.percent').percentageLoader({
            valElement: 'p',
            strokeWidth: 20,
            bgColor: '#d9d9d9',
            ringColor: '#ff8400',
            textColor: '#2C3E50',
            fontSize: '16px',
            fontWeight: 'normal'
        });

    });

    $(function() {
        //var container_top = $("#container").position().top;
        //console.log( container_top );
        //$("html, body").animate({scrollTop:0}, '500');

        $(".sub_sbtn").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });
    });

    function fcontact_submit(f)
    {
        <?php echo chk_captcha_js();  ?>

        document.getElementById('btn_submit').disabled = true;

        return true;
    }


	AOS.init();
</script>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
