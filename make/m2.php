<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      td {
      //  border : 1px solid;
      //  padding : 3px;
      }
      #title {
        color : blue;
        font-size: 20px;
        font-weight: bold;
      }
      .a {
        text-align: right;
        color: gray;
      }
    </style>
  </head>
  <body>
    <table>
      <tr>
        <td id="title">입력한 내용입니다.</td>
        <td></td>
      </tr>
      <tr>
        <td class="a">아이디</td>
        <td><?= $_POST["mid"] ?></td>
      </tr>
      <tr>
        <td class="a">비밀번호</td>
        <td><?= $_POST["mpass1"] ?></td>
      </tr>
      <tr>
        <td class="a">이름</td>
        <td><?= $_POST["mname"] ?></td>
      </tr>
      <tr>
        <td class="a">휴대폰</td>
        <td><?= $_POST["mphone"] ?></td>
      </tr>
      <tr>
        <td class="a">성별</td>
        <td><?= $_POST["mgender"] ?></td>
      </tr>
      <tr>
        <td class="a">학년</td>
        <td><?= $_POST["myear"] ?></td>
      </tr>
      <tr>
        <td class="a">희망동호회</td>
        <td>
        <?php
        $cnt = count($_POST["mclub"]);
        for ($i=0; $i<$cnt; $i++){
          $x = $_POST["mclub"][$i];
          echo "<a href='m3.php?goclub=$x'>$x</a>";
          if ($i != $cnt-1)
          echo ", ";
        }
       ?>
        </td>
      </tr>
      <tr>
        <td class="a">가입동기</td>
        <td>
          <?php
           $content = str_replace("\n", "<br/>", $_POST["mmotive"]);
           echo $content;
          ?></td>
      </tr>
    </table>
  </body>
</html>
