<!DOCTYPE HTML>
<html>
<head>
  <!-- reCAPTCHA를 사용하기 위해서는
  먼저 구글 리캡차(https://www.google.com/recaptcha/admin/create)에 가서
  사이트 등록부터 해야 합니다.-->

  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>
  function check_recaptcha()
  {
    var v = grecaptcha.getResponse();
    if (v.length ==0) {
      alert ("'로봇이 아닙니다.'를 체크해주세요.");
    return false; }
    else
    {
      document.frm.submit();
    }
  }
  </script>
</head>
<body>
  <div class="g-recaptcha" data-sitekey="받은 사이트키"></div>
  <button type="submit" onclick='return check_recaptcha();'>확인</button>

  <form name="frm" action="nextpage.php" method="post">
    <!-- 폼 구성 -->
  </form>
</body>
</html>
