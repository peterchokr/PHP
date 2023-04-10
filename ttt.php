<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="xxx.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="member" value="seoul"> <br>
    이름 : <input type="text" name="myname" id="y"> <br>
    암호 : <input type="password" name="pw" id="">  <br>
    자기소개 : <textarea name="profile" id="" cols="20" rows="3"></textarea> <br>
    학년 : 
    <input type="radio" name="styear" id="" value="1">1학년
    <input type="radio" name="styear" id="" value="2" checked>2학년
    <input type="radio" name="styear" id="" value="3">3학년 <br>  
    
    희망여행지 :
    <input type="checkbox" name="tour[]" id="" value="s">서울 
    <input type="checkbox" name="tour[]" id="" value="j">제주 
    <input type="checkbox" name="tour[]" id="" value="b">부산 
    <input type="checkbox" name="tour[]" id="" value="g">구미 <br>

    여행기간 :
    <select name="dcnt" id="">
        <option value="01">당일</option>
        <option value="12">1박2일</option>
        <option value="23">2박3일</option>
        <option value="34">3박4일</option>                
    </select>
    <br>

    첨부파일(사진) 제출 :
    <input type="file" name="myf" id="">
    <br>

    <input type="submit" value="완료">
    <input type="reset" value="취소">


    </form>
</body>
</html>
