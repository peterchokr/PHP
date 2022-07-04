<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      td {
        // border : 1px solid;
        padding : 3px;
      }
      #title {
        color : blue;
        font-size: 20px;
        font-weight: bold;
      }
      .a {
        text-align: right;
      }
    </style>
    <script type="text/javascript">
    function selftest() {
      if(document.club_form.mid.value==""){
        alert("아이디를 입력하세요");
        document.club_form.mid.focus();
        exit;
      }
      if(document.club_form.mpass1.value==""){
        alert("비밀번호를 입력하세요");
        document.club_form.mpass1.focus();
        exit;
      }
      if(document.club_form.mpass2.value==""){
        alert("비밀번호 재확인을 입력하세요");
        document.club_form.mpass2.focus();
        exit;
      }
      if(document.club_form.mpass1.value != document.club_form.mpass2.value){
        alert("비밀번호가 일치하지 않습니다.");
        document.club_form.mpass1.focus();
        exit;
      }
      document.club_form.submit();
   }
    </script>
  </head>
  <body>
    <form name="club_form" action="m2.php" method="post">
    <table>
      <tr>
        <td id="title" class="a">동호회 가입</td>
      </tr>
      <tr>
        <td class="a">아이디(필수)</td>
        <td><input type="text" name="mid" value=""></td>
      </tr>
      <tr>
        <td class="a">비밀번호(필수)</td>
        <td><input type="password" name="mpass1" value=""></td>
      </tr>
      <tr>
        <td class="a">비밀번호 재확인(필수)</td>
        <td><input type="password" name="mpass2" value=""></td>
      </tr>
      <tr>
        <td class="a">이름</td>
        <td><input type="text" name="mname" value=""></td>
      </tr>
      <tr>
        <td class="a">휴대폰</td>
        <td><input type="text" name="mphone" value="" placeholder="- 없이 입력해주세요"></td>
      </tr>
      <tr>
        <td class="a">성별</td>
        <td><input type="radio" name="mgender" value="남" checked>남자&nbsp;&nbsp;&nbsp;
        <input type="radio" name="mgender" value="여">여자</td>
      </tr>
      <tr>
        <td class="a">학년</td>
        <td><select name="myear">
          <option value="">선택하세요</option>
          <option value="1">1학년</option>
          <option value="2">2학년</option>
          <option value="3">3학년</option>
        </select></td>
      </tr>
      <tr>
        <td class="a">희망 동호회</td>
        <td><input type="checkbox" name="mclub[]" value="여행">여행&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="mclub[]" value="독서">독서&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="mclub[]" value="운동">운동&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="mclub[]" value="요리">요리&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="mclub[]" value="음악">음악</td>
      </tr>
      <tr>
        <td class="a">가입동기</td>
        <td><textarea name="mmotive" rows="8" cols="80"></textarea> </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="button" value="가입하기" onclick="javascript:selftest()">&nbsp;&nbsp;<input type="reset" value="취소하기"></td>
      </tr>
    </table>
  </form>
  </body>
</html>
