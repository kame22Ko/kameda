//[▲]専門家によるアフターフォロー内容追加
//[✓]chatlist[4]にURLの表示機能追加・変更
//[-]index書式への統合
//[-]CSSの最適化
//[▲]デザインアレンジ
//-----------------------------------------------------------------------------
//厳格モード
'use strict';
//-----------------------------------------------------------------------------
//chatList[1]のtext、continue、optionと管理
const chatList = {
    1: {text: 'Health First Assistant Stationへようこそ', continue: true, option: 'normal'},
    2: {text: {title: 'Q1', question: '何を知りたいですか？', choices: ['このサイトについて', '専門家によるアフタフォローを受ける']}, continue: false, option: 'choices', questionNextSupport: true}, // questionNextSupportは次に質問に対する詳細を投稿するかどうか
    // userCount1：URL追加
    3: {text: ['このサイトは貴方の健康を手助けするサイトです。','ユーザー様は野菜が不足している様です。野菜を多くとりましょう。'], continue: true, option: 'normal'},
    4: {text: 'お問い合わせにつきましてはこちらからアクセス下さい。', continue: true, option: 'normal'},
    5: {text: ['http://localhost/kame/form.html'], continue: true, option: 'normal', link: true},
    6: {text: '改善等のご意見がありましたらこちらにお書き下さい。', continue: false, option: 'normal'},
    // userCount2：名前
    7: {text: '', continue: true, option: 'normal'},
    8: {text: {title: '満足度調査', question: 'サービスの満足度を5段階で教えてください（数字が大きいほど満足度が高いものとします。）。', choices: ['5', '4', '3', '2', '1']}, continue: false, option: 'choices'},
    // userCount5：満足度
    9: {text: 'ありがとうございます。最後に、ご感想をお聞かせください。', continue: false, option: 'normal'},
    // userCount6：感想
    10: {text: '', continue: false, option: 'normal'}
};
//${UserData[1]}はUserData[]の「１」の空間を確保する。
//空の text を加工
// userData === ["何を知りたいですか？", 名前","体調","山の質問","満足度","感想"];
// userData はユーザーの回答内容の全てを記憶
function textSpecial() {
    chatList[7].text = `ありがとうございました。今日はここで終了とさせていただきます。`;
    chatList[10].text = `ユーザー様の満足度は「${userData[2]}」，ご感想は「${userData[3]}」ですね！ありがとうございました。`;
}

let userCount = 0;
// ユーザーの回答内容の全てを記憶する配列
let userData = [];


// 一番下へ
function chatToBottom() {
    const chatField = document.getElementById('chatbot-body');
    chatField.scroll(0, chatField.scrollHeight - chatField.clientHeight);
}

const userText = document.getElementById('chatbot-text');
const chatSubmitBtn = document.getElementById('chatbot-submit');

// チャットボットの投稿数
let robotCount = 0;
// 選択肢の正解個数
let qPoint = 0;

// 選択肢ボタンを押したときの次の選択肢（textのa，bなど）
let nextTextOption = '';

// 選択肢ボタンを押したとき（必要があれば、正解判別）
function pushChoice(e) {
    userCount ++;
    console.log('userCount：' + userCount);

    const choicedId = e.getAttribute('id'); // 選択した選択肢のid
    // 回答内容の保存
    userData.push(document.getElementById(choicedId).textContent);
    if (chatList[robotCount].text.answer) {
        // 正解，不正解のある選択肢
        const trueChoice = `q-${robotCount}-${chatList[robotCount].text.answer}`// 正解選択肢のid
        if (choicedId === trueChoice) {
            // 正解
            nextTextOption = 'qTrue';
            qPoint ++;
        } else {
            // 不正解
            nextTextOption = 'qFalse';
        }
    } else {
        // 正解のない質問
        if(chatList[robotCount].questionNextSupport) {
            if (String(robotCount).length === 1) {
                // robotCountの桁数が1桁の時
                nextTextOption = choicedId.slice(4);
            } else if (String(robotCount).length === 2) {
                // robotCountの桁数が2桁の時
                nextTextOption = choicedId.slice(5);
            } else if (String(robotCount).length === 3) {
                // robotCountの桁数が3桁の時
                nextTextOption = choicedId.slice(6);
            }
        }
    }
    for (let i = 0; i < chatList[robotCount].text.choices.length; i ++) {
        document.getElementById('q-' + robotCount + '-' + i).disabled = true;
        document.getElementById('q-' + robotCount + '-' + i).classList.add('choice-button-disabled');
        document.getElementById(choicedId).classList.remove('choice-button-disabled');
    }

   robotOutput();

    console.log(userData);
}

// 拡大ボタン
let chatbotZoomState = 'none';
const chatbot = document.getElementById('chatbot');
const chatbotBody = document.getElementById('chatbot-body');
const chatbotFooter = document.getElementById('chatbot-footer');
const chatbotZoomIcon = document.getElementById('chatbot-zoom-icon');
// --------------------画面への出力--------------------
function robotOutput() {
    // 相手の返信が終わるまで、その間は返信不可にする
    // なぜなら、自分の返信を複数受け取ったことになり、その全てに返信してきてしまうから
    // 例："Hi!〇〇!"を複数など
      
    robotCount ++;
    console.log(robotCount);

    chatSubmitBtn.disabled = true;
    
    const ul = document.getElementById('chatbot-ul');
    const li = document.createElement('li');
    li.classList.add('left');
    ul.appendChild(li);
    
    // 考え中アニメーションここから
    const robotLoadingDiv = document.createElement('div');

    setTimeout( ()=> {
        li.appendChild(robotLoadingDiv);
        robotLoadingDiv.classList.add('chatbot-left');
        robotLoadingDiv.innerHTML = '<div id= "robot-loading-field"><span id= "robot-loading-circle1" class="material-icons">circle</span> <span id= "robot-loading-circle2" class="material-icons">circle</span> <span id= "robot-loading-circle3" class="material-icons">circle</span>';
        console.log('考え中');
        // 考え中アニメーションここまで

        // 一番下までスクロール
        chatToBottom();
    }, 800);

    setTimeout( ()=> {

        // 考え中アニメーション削除
        robotLoadingDiv.remove();

        if (chatList[robotCount].option === 'choices') {
            const qAnswer = `q-${robotCount}-${chatList[robotCount].text.answer}`;
            const choiceField = document.createElement('div');
            choiceField.id = `q-${robotCount}`;
            choiceField.classList.add('chatbot-left-rounded');
            li.appendChild(choiceField);
          
            // 質問タイトル
            const choiceTitle = document.createElement('div');
            choiceTitle.classList.add('choice-title');
            choiceTitle.textContent = chatList[robotCount].text.title;
            choiceField.appendChild(choiceTitle);
            // 質問文
            const choiceQ = document.createElement('div');
            choiceQ.textContent = chatList[robotCount].text.question;
            choiceQ.classList.add('choice-q');
            choiceField.appendChild(choiceQ);
          
            // 選択肢作成
            for (let i = 0; i < chatList[robotCount].text.choices.length; i ++) {
                const choiceButton = document.createElement('button');
                choiceButton.id = `${choiceField.id}-${i}`; // id設定
                choiceButton.setAttribute('onclick', 'pushChoice(this)'); // ボタンを押した際の合図
                choiceButton.classList.add('choice-button');
                choiceField.appendChild(choiceButton);
                choiceButton.textContent = chatList[robotCount].text.choices[i];
            }
          
        } else {
            // このdivにテキストを指定
            const div = document.createElement('div');
            li.appendChild(div);
            div.classList.add('chatbot-left');
            
            // テキストを加工する場合（次の回答が選択型でも使えるようにここに設置）
            textSpecial();  
          
            switch(chatList[robotCount].option) {
                case 'normal':
                    if (chatList[robotCount].text.qTrue) {
                        // 複数のテキストのうち特定のものを設定するとき
                        if(chatList[robotCount].link) {
                            div.innerHTML = `<a href= "${chatList[robotCount].text[nextTextOption]}" onclick= "chatbotLinkClick()">${chatList[robotCount].text[nextTextOption]}</a>`;
                        } else {
                            div.textContent = chatList[robotCount].text[nextTextOption];
                        }
                    } else if (robotCount > 1 && chatList[robotCount - 1].questionNextSupport) {
                        console.log('次の質問は' + nextTextOption);
                        // 答えのない質問（次にサポートあり）
                        if(chatList[robotCount].link) {
                            div.innerHTML = `<a href= "${String(chatList[robotCount].text[nextTextOption])}" onclick= "chatbotLinkClick()">${String(chatList[robotCount].text[nextTextOption])}</a>`;
                        } else {
                            div.textContent = String(chatList[robotCount].text[nextTextOption]);
                        }
                    } else {
                        // 通常
                        if(chatList[robotCount].link) {
                            div.innerHTML = `<a href= "${chatList[robotCount].text}" onclick= "chatbotLinkClick()">${chatList[robotCount].text}</a>`;
                        } else {
                            div.textContent = chatList[robotCount].text;
                        }
                    }
                break;

                case 'random':
                    if(chatList[robotCount].link) {
                        div.innerHTML = `<a href= "${chatList[robotCount].text[Math.floor(Math.random() * chatList[robotCount].text.length)]}" onclick= "chatbotLinkClick()">${chatList[robotCount].text[Math.floor(Math.random() * chatList[robotCount].text.length)]}</a>`;
                    } else {
                        div.textContent = chatList[robotCount].text[Math.floor(Math.random() * chatList[robotCount].text.length)];
                    }
                    
                break;
            }
            chatSubmitBtn.disabled = false;
        }

        // 一番下までスクロール
        chatToBottom();

        // 連続投稿
        if (chatList[robotCount].continue) {
            robotOutput();
        }
    }, 2000);
}
robotOutput();
// --------------------送信ボタンを押した時の処理--------------------
chatSubmitBtn.addEventListener('click', () => {
  
    // 空行の場合送信不可
    if (!userText.value || !userText.value.match(/\S/g)) return false;
    
    userCount ++;
  
    console.log('userCount：' + userCount);

    userData.push(userText.value);
    console.log(userData);
  
    const ul = document.getElementById('chatbot-ul');
    const li = document.createElement('li');
    // このdivにテキストを指定
    const div = document.createElement('div');
  
    li.classList.add('right');
    ul.appendChild(li);
    li.appendChild(div);
    div.classList.add('chatbot-right');
    div.textContent = userText.value;
  
    if(robotCount < Object.keys(chatList).length) {
        robotOutput();
    } else {
        // repeatRobotOutput(userText.value);
        repeatRobotOutput();
    }
  
    // 一番下までスクロール
    chatToBottom();
  
    // テキスト入力欄を空白にする
    userText.value = '';
});


// 最後やまびこ
function repeatRobotOutput() {
    robotCount ++;
    console.log(robotCount);

    chatSubmitBtn.disabled = true;
                   
    const ul = document.getElementById('chatbot-ul');
    const li = document.createElement('li');
    li.classList.add('left');
    ul.appendChild(li);

    // 考え中アニメーションここから
    const robotLoadingDiv = document.createElement('div');

    setTimeout( ()=> {
        li.appendChild(robotLoadingDiv);
        robotLoadingDiv.classList.add('chatbot-left');
        robotLoadingDiv.innerHTML = '<div id= "robot-loading-field"><span id= "robot-loading-circle1" class="material-icons">circle</span> <span id= "robot-loading-circle2" class="material-icons">circle</span> <span id= "robot-loading-circle3" class="material-icons">circle</span>';
        console.log('考え中');
        // 考え中アニメーションここまで

        // 一番下までスクロール
        chatToBottom();
    }, 800);
    
    setTimeout( ()=> {

        // 考え中アニメーション削除
        robotLoadingDiv.remove();
      
        // このdivにテキストを指定
        const div = document.createElement('div');
        li.appendChild(div);
        div.classList.add('chatbot-left');

        div.textContent = userData[userCount - 1];
      
        // 一番下までスクロール
        chatToBottom();

        chatSubmitBtn.disabled = false;

    }, 2000);

    if(chatbotZoomState === 'large') {
        document.querySelectorAll('.chatbot-left').forEach((cl) => {
            cl.style.maxWidth = '52vw';
        });
        document.querySelectorAll('.chatbot-right').forEach((cr) => {
            cr.style.maxWidth = '52vw';
        });
        document.querySelectorAll('.chatbot-left-rounded').forEach((cr) => {
            cr.style.maxWidth = '52vw';
        });
    }
}



// チャットボット内のリンクが押されたとき
function chatbotLinkClick() {
    document.getElementById('chatbot').classList.add('chatbot-none');
    document.getElementById('chatbot-back').classList.add('none');
    document.getElementById('chatbot-start-button-icon').textContent = 'question_answer';
}


//参考文献：https://qiita.com/masa_mf3/items/75767d802f870421684e 2022年10月24日 閲覧