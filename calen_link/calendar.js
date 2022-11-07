
/*
   -----------------------------------------------------
   カレンダー（リンク機能付き）
   Ver. 1.0.2
   update 2011.3.5
   Copyright (C) WEB-JOZU  URL:http://www.web-jozu.com/
   -----------------------------------------------------
*/


function holidaySet(MM,DD,WEEK,DAY,TTL){
	holiMM[i] = MM; holiDD[i] = DD; holiWEEK[i] = WEEK; holiDAY[i] = DAY; holiTTL[i++] = TTL;
}

function linkdaySet(MM,DD,ACT,URL,TTL){
	this['link' + MM + 'MM']['ok'] = "ok";

	this['link' + MM + 'MM']['d' + DD] = new Array;
	this['link' + MM + 'MM']['d' + DD]['act'] = ACT;
	this['link' + MM + 'MM']['d' + DD]['url'] = URL;
	this['link' + MM + 'MM']['d' + DD]['ttl'] = TTL;

	// niti();
}

function showCalen(MM){
	calenData = createCalen(MM);
	if(document.getElementById) {
		document.getElementById('calenArea').innerHTML = calenData;
	}
}

function showTtl(MM,DD){
	if(document.getElementById && this['link' + MM + 'MM']['d' + DD]['ttl']) {
		document.getElementById('d' + MM + DD).innerHTML = '<span class="linkPopup"><span class="popArrow">△</span><span class="popTxt">' + this['link' + MM + 'MM']['d' + DD]['ttl'] + '</span>';
	}
}

function hideTtl(MM,DD){
	if(document.getElementById) {
		document.getElementById('d' + MM + DD).innerHTML = '';
	}
}

function linkGo(MM,DD){
	actObj = this['link' + MM + 'MM']['d' + DD]['act'];
	urlObj = this['link' + MM + 'MM']['d' + DD]['url'];

	if(actObj == 0 || urlObj == ""){

	}else if(actObj == 1){
		var form = document.createElement("form"); //formを作成
		form.action = 'http://'+ urlObj;
		form.method = "POST";

		// POSTパラメーターようにinputタグを生成
		var reqElm = document.createElement('input');
		// nameとvalueにそれぞれPOSTしたいパラメーターを追加
		reqElm.type = 'hidden';
		reqElm.name = "bbb";
		reqElm.value = "2022-11-04";//クリックした日付の値にできるようにする（下のも同じ値になるように）

		var reqElm2 = document.createElement('input');

		reqElm2.type = 'hidden';
		reqElm2.name = "aaa";
		reqElm2.value = "2022-11-04";//クリックした日付の値にできるようにする

		// フォームタグにinputタグを追加（formの中にinputを入れる）
		form.appendChild(reqElm);
		form.appendChild(reqElm2);

		// bodyにフォームタグを追加（htmlのbodyの中にformを入れる）
		document.body.appendChild(form);

		form.submit();

		//location.href = 'http://' + urlObj;
		// newWin1 = window.open('http://' + urlObj, null);
		// newWin1.focus();

	}else if(actObj == 3){
		newWin2 = window.open('http://' + urlObj, 'newWin', 'width=' + winWW + ', height=' + winHH + ', menubar=yes, toolbar=yes, scrollbars=' + winSCL + '');
		newWin2.focus();
	}
}


//リンクを設定
for(i=1; i<=12; i++){
	this['link' + i + 'MM'] = new Array;
	this['link' + i + 'MM']['ok'] = "";
}

i = 0;


//日付をクリックしたら日付の値をpostしてgallery.phpで値をgetしてその日の食事を表示（したい）
function niti(){
	var form = document.createElement("form");
	form.method = "POST";
	// document.body.append(form);
	// form.name = "name";
	

	// POSTパラメーターようにinputタグを生成
	var reqElm = document.createElement('input');

	// nameとvalueにそれぞれPOSTしたいパラメーターを追加
	reqElm.type = 'hidden';
	reqElm.name = 'name';
	reqElm.value = 1;

	// フォームタグにinputタグを追加
	form.appendChild(reqElm);

	// bodyにフォームタグを追加
	document.body.appendChild(form);

	form.submit();
}


/* ---------- 設定領域 start ---------- */

//リンクを設定
//linkdaySet(月,日,ウィンドウ [0:リンクなし, 1:自win, 2:別win, 3:PopUpWin],リンク先,説明)

linkdaySet(1,1,1,'localhost/kame/gallery.html','Yahoo!へのリンクです。<br>自ウィンドウで移動します。');
linkdaySet(1,10,2,'www.google.com/','Googleへのリンクです。<br>別ウィンドウで移動します。');
linkdaySet(1,25,0,'','リンクはしません。<br>メッセージのみ表示します。<br>写真も入ります。<br><img src="img/change_ph01.jpg" width="120" height="84" alt="写真" vspace="5">');
linkdaySet(1,29,3,'www.goo.ne.jp/','gooへのリンクです。<br>ポップアップで移動します。');

linkdaySet(2,8,1,'www.yahoo.co.jp/','Yahoo!へのリンクです。<br>自ウィンドウで移動します。');
linkdaySet(2,15,2,'www.google.com/','Googleへのリンクです。<br>別ウィンドウで移動します。');
linkdaySet(2,20,0,'','リンクはしません。<br>メッセージのみ表示します。<br>写真も入ります。<br><img src="img/change_ph01.jpg" width="120" height="84" alt="写真" vspace="5">');
linkdaySet(2,25,3,'www.goo.ne.jp/','gooへのリンクです。<br>ポップアップで移動します。');

linkdaySet(3,1,1,'www.yahoo.co.jp/','Yahoo!へのリンクです。<br>自ウィンドウで移動します。');
linkdaySet(3,10,2,'www.google.com/','Googleへのリンクです。<br>別ウィンドウで移動します。');
linkdaySet(3,25,0,'','リンクはしません。<br>メッセージのみ表示します。<br>写真も入ります。<br><img src="img/change_ph01.jpg" width="120" height="84" alt="写真" vspace="5">');
linkdaySet(3,29,3,'www.goo.ne.jp/','gooへのリンクです。<br>ポップアップで移動します。');

linkdaySet(4,8,1,'www.yahoo.co.jp/','Yahoo!へのリンクです。<br>自ウィンドウで移動します。');
linkdaySet(4,15,2,'www.google.com/','Googleへのリンクです。<br>別ウィンドウで移動します。');
linkdaySet(4,20,0,'','リンクはしません。<br>メッセージのみ表示します。<br>写真も入ります。<br><img src="img/change_ph01.jpg" width="120" height="84" alt="写真" vspace="5">');
linkdaySet(4,30,3,'www.goo.ne.jp/','gooへのリンクです。<br>ポップアップで移動します。');

linkdaySet(5,5,1,'www.yahoo.co.jp/','Yahoo!へのリンクです。<br>自ウィンドウで移動します。');
linkdaySet(5,15,2,'www.google.com/','Googleへのリンクです。<br>別ウィンドウで移動します。');
linkdaySet(5,20,0,'','リンクはしません。<br>メッセージのみ表示します。<br>写真も入ります。<br><img src="img/change_ph01.jpg" width="120" height="84" alt="写真" vspace="5">');
linkdaySet(5,24,3,'www.goo.ne.jp/','gooへのリンクです。<br>ポップアップで移動します。');

linkdaySet(6,1,1,'www.yahoo.co.jp/','Yahoo!へのリンクです。<br>自ウィンドウで移動します。');
linkdaySet(6,10,2,'www.google.com/','Googleへのリンクです。<br>別ウィンドウで移動します。');
linkdaySet(6,25,0,'','リンクはしません。<br>メッセージのみ表示します。<br>写真も入ります。<br><img src="img/change_ph01.jpg" width="120" height="84" alt="写真" vspace="5">');
linkdaySet(6,29,3,'www.goo.ne.jp/','gooへのリンクです。<br>ポップアップで移動します。');

linkdaySet(7,8,1,'www.yahoo.co.jp/','Yahoo!へのリンクです。<br>自ウィンドウで移動します。');
linkdaySet(7,15,2,'www.google.com/','Googleへのリンクです。<br>別ウィンドウで移動します。');
linkdaySet(7,20,0,'','リンクはしません。<br>メッセージのみ表示します。<br>写真も入ります。<br><img src="img/change_ph01.jpg" width="120" height="84" alt="写真" vspace="5">');
linkdaySet(7,30,3,'www.goo.ne.jp/','gooへのリンクです。<br>ポップアップで移動します。');

linkdaySet(8,5,1,'www.yahoo.co.jp/','Yahoo!へのリンクです。<br>自ウィンドウで移動します。');
linkdaySet(8,15,2,'www.google.com/','Googleへのリンクです。<br>別ウィンドウで移動します。');
linkdaySet(8,20,0,'','リンクはしません。<br>メッセージのみ表示します。<br>写真も入ります。<br><img src="img/change_ph01.jpg" width="120" height="84" alt="写真" vspace="5">');
linkdaySet(8,24,3,'www.goo.ne.jp/','gooへのリンクです。<br>ポップアップで移動します。');

linkdaySet(9,1,1,'www.yahoo.co.jp/','Yahoo!へのリンクです。<br>自ウィンドウで移動します。');
linkdaySet(9,10,2,'www.google.com/','Googleへのリンクです。<br>別ウィンドウで移動します。');
linkdaySet(9,25,0,'','リンクはしません。<br>メッセージのみ表示します。<br>写真も入ります。<br><img src="img/change_ph01.jpg" width="120" height="84" alt="写真" vspace="5">');
linkdaySet(9,29,3,'www.goo.ne.jp/','gooへのリンクです。<br>ポップアップで移動します。');

linkdaySet(10,8,1,'localhost/student/kame/gallery.php','Yahoo!へのリンクです。<br>自ウィンドウで移動します。');
linkdaySet(10,15,2,'www.google.com/','Googleへのリンクです。<br>別ウィンドウで移動します。');
linkdaySet(10,20,0,'','リンクはしません。<br>メッセージのみ表示します。<br>写真も入ります。<br><img src="img/change_ph01.jpg" width="120" height="84" alt="写真" vspace="5">');
linkdaySet(10,30,3,'www.goo.ne.jp/','gooへのリンクです。<br>ポップアップで移動します。');

//11月のリンク(左側が月の値で、真ん中が日付、右側がこのリンクに飛ばす役割をしている)
linkdaySet(11,1,1,'localhost/kame/gallery.php','');
linkdaySet(11,2,1,'localhost/kame/gallery.php','');
linkdaySet(11,3,1,'localhost/kame/gallery.php','');
linkdaySet(11,4,1,'localhost/kame/gallery.php','');
linkdaySet(11,5,1,'localhost/kame/gallery.php','');
linkdaySet(11,6,1,'localhost/kame/gallery.php','');
linkdaySet(11,7,1,'localhost/kame/gallery.php','');
linkdaySet(11,8,1,'localhost/kame/gallery.php','');
linkdaySet(11,9,1,'localhost/kame/gallery.php','');
linkdaySet(11,10,1,'localhost/kame/gallery.php','');
linkdaySet(11,11,1,'localhost/kame/gallery.php','');
linkdaySet(11,12,1,'localhost/kame/gallery.php','');
linkdaySet(11,13,1,'localhost/kame/gallery.php','');
linkdaySet(11,14,1,'localhost/kame/gallery.php','');
linkdaySet(11,15,1,'localhost/kame/gallery.php','');
linkdaySet(11,16,1,'localhost/kame/gallery.php','');
linkdaySet(11,17,1,'localhost/kame/gallery.php','');
linkdaySet(11,18,1,'localhost/kame/gallery.php','');
linkdaySet(11,19,1,'localhost/kame/gallery.php','');
linkdaySet(11,20,1,'localhost/kame/gallery.php','');
linkdaySet(11,21,1,'localhost/kame/gallery.php','');
linkdaySet(11,22,1,'localhost/kame/gallery.php','');
linkdaySet(11,23,1,'localhost/kame/gallery.php','');
linkdaySet(11,24,1,'localhost/kame/gallery.php','');
linkdaySet(11,25,1,'localhost/kame/gallery.php','');
linkdaySet(11,26,1,'localhost/kame/gallery.php','');
linkdaySet(11,27,1,'localhost/kame/gallery.php','');
linkdaySet(11,28,1,'localhost/kame/gallery.php','');
linkdaySet(11,29,1,'localhost/kame/gallery.php','');
linkdaySet(11,30,1,'localhost/kame/gallery.php','');

linkdaySet(12,1,1,'www.yahoo.co.jp/','Yahoo!へのリンクです。<br>自ウィンドウで移動します。');
linkdaySet(12,10,2,'www.google.com/','Googleへのリンクです。<br>別ウィンドウで移動します。');
linkdaySet(12,25,0,'','リンクはしません。<br>メッセージのみ表示します。<br>写真も入ります。<br><img src="img/change_ph01.jpg" width="120" height="84" alt="写真" vspace="5">');
linkdaySet(12,29,3,'www.goo.ne.jp/','gooへのリンクです。<br>ポップアップで移動します。');



//ポップアップウィンドウの幅と高さを指定
winWW = 400;	//幅
winHH = 400;	//高さ
winSCL = "no";	//スクロール [yes, no]

//現在の月から何ヶ月前まで表示
bfMonNm = 6;

//現在の月から何ヶ月後まで表示
afMonNm = 6;

/* ---------- 設定領域 end ---------- */




function dateReset(){
	//現在の日付を取得
	nowDate = new Date();
	theYear = nowDate.getFullYear();
	theMonth = nowDate.getMonth();
	theDate = nowDate.getDate();
	theDay = nowDate.getDay();

	//現在の日付を保持
	nowMonth = theMonth;
	nowYear = theYear;
}

dateReset();


//リンクの数を取得
linkNum = i;


//カレンダー表示 最後まで
function createCalen(MM){

	i = 0;
	holiMM = new Array;
	holiDD = new Array;
	holiWEEK = new Array;
	holiDAY = new Array;
	holiTTL = new Array;
	

	theMonth = MM;
	
	if(theMonth >= 12){
		theYear++;
		theMonth = 0;
	} else if(theMonth <= -1){
		theYear--;
		theMonth = 11;
	}
	
	
	//月の日数取得
	monNum = new Date(theYear, theMonth + 1, 0).getDate();
	
	//1日の曜日を取得
	firstDay = new Date(theYear, theMonth, 1).getDay();
	
	//月の週を取得
	theWeek = Math.ceil((monNum + firstDay) / 7);
	
	
	//祝日を設定
	holidaySet(1,1,0,0,'元旦');
	holidaySet(1,0,2,1,'成人の日');
	holidaySet(2,11,0,0,'建国記念の日');
	
	if(theYear%4 == 0 || theYear%4 == 1){
		holidaySet(3,20,0,0,'春分の日');
	}else{
		holidaySet(3,21,0,0,'春分の日');
	}
	
	holidaySet(4,29,0,0,'昭和の日');
	holidaySet(5,3,0,0,'憲法記念日');
	holidaySet(5,4,0,0,'みどりの日');
	holidaySet(5,5,0,0,'こどもの日');
	holidaySet(7,0,3,1,'海の日');
	holidaySet(9,0,3,1,'敬老の日');
	
	if(theYear >= 2012 && theYear <= 2044 && theYear%4 == 0){
		holidaySet(9,22,0,0,'秋分の日');
	}else{
		holidaySet(9,23,0,0,'秋分の日');
	}
	
	holidaySet(10,0,2,1,'体育の日');
	holidaySet(11,3,0,0,'文化の日');
	holidaySet(11,23,0,0,'勤労感謝の日');
	holidaySet(12,23,0,0,'天皇誕生日');
	
	//祝日の数を取得
	holiNum = i;
	

	diffY = (theYear - nowYear) * 12;
	diffM = theMonth - nowMonth;

	//月前後ボタンの表示非表示
	if(afMonNm > diffY + diffM){
		rtBtn = '<a href="javascript:showCalen(theMonth + 1); void(0);">＞</a>';
	}else{
		rtBtn = '&nbsp;';
	}

	if(bfMonNm > - diffY - diffM){
		ltBtn = '<a href="javascript:showCalen(theMonth - 1); void(0);">＜</a>';
	}else{
		ltBtn = '&nbsp;';
	}

	
	//カレンダー表示
	calenData = '';
	calenData += '<table class="calTable">';
	calenData += '<tr>';
	calenData += '<td class="btn">' + ltBtn + '</td>';
	calenData += '<td colspan="5" class="mon"><span class="yView">' + theYear + '年</span>&nbsp;' + (theMonth + 1) + '月&nbsp;</td>';
	calenData += '<td class="btn">' + rtBtn + '</td>';
	calenData += '</tr>';
	calenData += '<tr>';
	calenData += '<th>SUN</th>';
	calenData += '<th>MON</th>';
	calenData += '<th>TUE</th>';
	calenData += '<th>WED</th>';
	calenData += '<th>THU</th>';
	calenData += '<th>FRI</th>';
	calenData += '<th>SAT</th>';
	calenData += '</tr>';
	
	
	//重なり順用
	zNum = 32;
	
	dateNum = 0;
	subHoli = "off"
	nationHoli = "off";
	weekSun = 0;
	weekMon = 0;
	weekTue = 0;
	weekWed = 0;
	weekThu = 0;
	weekFri = 0;
	weekSat = 0;
	weekNum = new Array;
	for(i=0; i<=6; i++){
		weekNum[i] = 0;
	}
	
	for(i=0; i<theWeek; i++){
	
		calenData += '<tr>';
	
		for(j=0; j<7; j++){
	
			calenData += '<td';
	
			if(i == 0 && j == firstDay){
				dateNum++;
			}
	
			holiMMDDCk = "off";
			for(k=0; k<holiNum; k++){
	
				holiMMCk = "off";
				holiDDCk = "off";
				if((theMonth + 1) == holiMM[k]){
					holiMMCk = "on";
				}
	
				if(holiMMCk == "on" && dateNum != 0 && holiDD[k] == 0 && holiWEEK[k] - 1 == weekNum[holiDAY[k]] && holiDAY[k] == j){
					holiDDCk = "on";
	
					if(dateNum != 0 && holiMM[k + 1] == holiMM[k] && holiDD[k + 1] == 0 && holiWEEK[k + 1] - 1 == weekNum[holiDAY[k + 1]] && holiDAY[k + 1] == j + 2){
						nationHoli = "on";
					}else if(dateNum != 0 && holiMM[k + 1] == holiMM[k] && holiDD[k + 1] == dateNum + 2 && holiWEEK[k + 1] == 0 && holiDAY[k + 1] == 0){
						nationHoli = "on";
					}
	
				}else if(holiMMCk == "on" && dateNum != 0 && holiDD[k] == dateNum && holiWEEK[k] == 0 && holiDAY[k] == 0){
					holiDDCk = "on";
	
					if(dateNum != 0 && holiMM[k + 1] == holiMM[k] && holiDD[k + 1] == 0 && holiWEEK[k + 1] - 1 == weekNum[holiDAY[k + 1]] && holiDAY[k + 1] == j + 2){
						nationHoli = "on";
					}else if(dateNum != 0 && holiMM[k + 1] == holiMM[k] && holiDD[k + 1] == dateNum + 2 && holiWEEK[k + 1] == 0 && holiDAY[k + 1] == 0){
						nationHoli = "on";
					}
	
				}
	
				if(holiMMCk == "on" && holiDDCk == "on"){
					holiMMDDCk = "on";
					viewTtl = holiTTL[k];
				}
	
			}
	
			if(holiMMDDCk == "on"){
				if(dateNum == theDate && theMonth == nowDate.getMonth() && theYear == nowDate.getFullYear()){
					calenData += ' class="sun today" title="' + viewTtl + '"';
				}else{
					calenData += ' class="sun" title="' + viewTtl + '"';
				}
	
				if(j == 0){
					subHoli = "on";
				}
	
			}else if(nationHoli == "on"){
				if(dateNum == theDate && theMonth == nowDate.getMonth() && theYear == nowDate.getFullYear()){
					calenData += ' class="sun today" title="国民の休日"';
				}else{
					calenData += ' class="sun" title="国民の休日"';
				}
	
				nationHoli = "off";
		
			}else if(subHoli == "on"){
				if(dateNum == theDate && theMonth == nowDate.getMonth() && theYear == nowDate.getFullYear()){
					calenData += ' class="sun today" title="振替休日"';
				}else{
					calenData += ' class="sun" title="振替休日"';
				}
	
				subHoli = "off";
		
			}else if(j == 0){
				if(dateNum == theDate && theMonth == nowDate.getMonth() && theYear == nowDate.getFullYear()){
					calenData += ' class="sun today"';
				}else{
					calenData += ' class="sun"';
				}
		
			}else if(j == 6){
				if(dateNum == theDate && theMonth == nowDate.getMonth() && theYear == nowDate.getFullYear()){
					calenData += ' class="sat today"';
				}else{
					calenData += ' class="sat"';
				}
	
			}else if(dateNum == theDate && theMonth == nowDate.getMonth() && theYear == nowDate.getFullYear()){
				calenData += ' class="today"';
			}
	
			calenData += '>';
	
	
			if((i == 0 && j < firstDay) || dateNum > monNum){
				calenData += '&nbsp;';
	
			}else{
				aObj = "";
				if(this['link' + (theMonth + 1) + 'MM']['ok'] == "ok" && this['link' + (theMonth + 1) + 'MM']['d' + dateNum]){
					calenData += '<span style="position:relative; display:block; z-index:' + zNum-- + ';"><span id="d' + (theMonth + 1) + dateNum + '"></span><a href="javascript:linkGo(\'' + (theMonth + 1) + '\',\'' + dateNum + '\'); void(0);" onmouseover="showTtl(\'' + (theMonth + 1) + '\',\'' + dateNum + '\')"  onmouseout="hideTtl(\'' + (theMonth + 1) + '\',\'' + dateNum + '\')" class="linkArea">';
					aObj = "on";
				}

				calenData += dateNum;

				if(aObj == "on"){
					calenData += '</a></span>';
					aObj = "";
				}

				dateNum++;
	
				switch(j){
					case 0: weekNum[0] = ++weekSun; break;
					case 1: weekNum[1] = ++weekMon; break;
					case 2: weekNum[2] = ++weekTue; break;
					case 3: weekNum[3] = ++weekWed; break;
					case 4: weekNum[4] = ++weekThu; break;
					case 5: weekNum[5] = ++weekFri; break;
					case 6: weekNum[6] = ++weekSat; break;
				}
			}
	
			calenData += '</td>';
		}
	
		calenData += '</tr>';
	}
	
	calenData += '<tr>';
	calenData += '<td colspan="7" class="webJozu"><a href="http://www.web-jozu.com/" target="_blank" title="WEB上手 - JavaScript・PHP・Flashのサンプルや素材集">&copy;WEB上手</a></td>';
	calenData += '</tr>';
	calenData += '</table>';

	return calenData;
}
//最初から

showCalen(nowMonth);
