//폰트 사이즈 조정
size = 90;

function zoom(n) {
  if (n == 0) {
    size = 90;
    document.getElementById('content').style.fontSize = "12px";
  } else {
    size = size + n;
    document.getElementById('content').style.fontSize = size + "%";
  }
}

//링크
function link(url) {
  document.location.href = url;
}

//정규식 검사
function regChk(obj) {
  var msg = 'true';
  var reg;

  switch (obj.name) {
    case 'name' :
      reg = new RegExp(/^[가-R]{2,}$/);
      if (reg.test(obj.value) == false) msg = "이름을 순 한글로 입력해주세요.";
      break;
    case 'num' :
      reg = new RegExp(/^[0-9]{1,2}$/);
      if (reg.test(obj.value) == false) msg = "숫자만 입력이 가능합니다.";
      break;
    case 'number' :
      reg = new RegExp(/^[0-9]{5}$/);
      if (reg.test(obj.value) == false) msg = "5자리의 숫자만 입력이 가능합니다.";
      break;
    case 'email' :
      reg = new RegExp(/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9._-]+$/);
      if (reg.test(obj.value) == false) msg = "이메일을 양식대로 입력해주세요.";
      break;
    case 'phone' :
      reg = new RegExp(/^[0-9]{2,3}\-[0-9]{3,4}\-[0-9]{4}$/);
      if (reg.test(obj.value) == false) msg = "핸드폰 번호를 양식대로 입력해주세요.";
      break;
    case 'pw' :
    case 're_pw' :
      if (obj.value.length < 4 || obj.value.length > 16) msg = obj.title + "을(를) 입력해주세요.";
      break;

    default :
      if (obj.value.length == 0) msg = obj.title + "을(를) 입력해주세요.";
      break;
  }
  return msg;
}

//폼 체크
function frmChk(frm) {
  var ok = new Array;
  var arg;
  var argLen = arguments.length - 1;

  for (var i = argLen; i >= 1; i--) {
    arg = arguments[i];
    ok[arg] = regChk(frm[arg]);
    if (ok[arg] != 'true') {
      frm[arg].style.backgroundColor = "#FF0";
      frm[arg].focus();
    } else {
      frm[arg].style.backgroundColor = "";
    }
  }

  for (var i = 1; i <= argLen; i++) {
    arg = arguments[i];
    if (ok[arg] != 'true') {
      alert(ok[arg]);
      return false;
    }
  }
}

//퀵메뉴
function quick(id, Y) {
  var m = document.getElementById(id);
  m.style.top = 0;
  setInterval(
    function () {
      var sp, ep, am;
      sp = parseInt(m.style.top);
      ep = Math.max(document.documentElement.scrollTop, document.body.scrollTop) + Y;
      am = Math.abs(Math.ceil(ep - sp) / 15);
      m.style.top = sp + ((ep < sp) ? -am : am) + "px";
    }, 10);
}

//하위 메뉴 보기
function dep2view(dep1idx, cnt) {
  var dep1 = document.getElementById('dep1' + dep1idx);
  dep1.innerHTML = dep1.innerHTML == '보기' ? '닫기' : '보기';
  dep1.title = dep1.title == '보기' ? '닫기' : '보기';
  for (var i = 1; i <= cnt; i++) {
    var dep2 = document.getElementById('dep2' + dep1idx + '_' + i);
    dep2.style.display = dep2.style.display == 'none' ? 'block' : 'none';
  }
}

//폼 전송
function frmSubmit(frm, idx, pass) {
  var frm = document.forms[frm];
  if (pass) {
    frm.idx.value = idx;
    frm.submit();
  } else {
    if (confirm('정말로 삭제하시겠습니까?')) {
      frm.idx.value = idx;
      frm.submit();
    }
  }
}

//디스플레이
function disp(one, two) {
  var one = document.getElementById(one);
  var two = document.getElementById(two);
  one.style.display = 'block';
  two.style.display = 'none';
}