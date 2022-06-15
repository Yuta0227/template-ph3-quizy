function check(question_number,choice_number, valid_name) {
    //選んだやつオレンジ色
    const selected = document.getElementById("answerlist_" + question_number + "_" + choice_number);
    selected.style.backgroundColor = "#fd6647";
    selected.style.color = "#ffffff";
    const answertext = document.getElementById("answertext_" + question_number);
    const answerbox = document.getElementById("answerbox_" + question_number);
    answerbox.style.display = "block";
    const answerlist = document.getElementsByName("answerlist_" + question_number);
    answerlist.forEach(function(answer){
        answer.style.pointerEvents = "none";;
        if(answer.innerHTML.trim()==valid_name){
            //正解は青色で上書き
            answer.style.backgroundColor = "#08b3f0";
            answer.style.color = "#ffffff";
        }
    });
    if(selected.innerHTML.trim()==valid_name){
        answertext.innerHTML = "正解！";
        answertext.className = "answerbox_valid";
    }else{   
        answertext.innerHTML = "不正解！";
        answertext.className = "answerbox_invalid";
    }
}
