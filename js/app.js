let btnAddNote = document.getElementById("btnAddNote");
showNotes();
btnAddNote.addEventListener("click", function (e) {
    let notesEditor = document.getElementById("notesText");
    let notes = localStorage.getItem("notes");
    if (notes == null) {
        notesObj = [];
    }
    else {
        notesObj = JSON.parse(notes);
    }
    var currentdate = new Date();
    var notes_datetime = currentdate.getDate() + "/"
        + (currentdate.getMonth() + 1) + "/"
        + currentdate.getFullYear() + " @ "
        + currentdate.getHours() + ":"
        + currentdate.getMinutes() + ":"
        + currentdate.getSeconds();
    console.log(notes_datetime);
    var obj = {};
    obj["note_comment"] = notesEditor.value;
    obj["note_datetime"] = notes_datetime;
    notesObj.push(obj);
    localStorage.setItem("notes", JSON.stringify(notesObj));
    notesEditor.value = ""; 
    showNotes();
});

function showNotes() {
    let notes = localStorage.getItem("notes");
    if (notes == null) {
        notesObj = [];
    }
    else {
        notesObj = JSON.parse(notes);
    }
    let html = "";
    notesObj.forEach(function (element, index) {
       html += `<tr class="note-item"><th scope="row">${index + 1}</th><td><p>${element.note_comment}</p></td>
       <td>${element.note_datetime}</td>
       <td class="text-center"><button id="${index}" class="btn btn-default btn-danger" 
       onclick="deleteNote(this.id)">X</button></td></tr>`;
    });
    let notesElm = document.getElementById('notes');
    if (notesObj.length != 0) {
        notesElm.innerHTML = html;
    }
    else {
        notesElm.innerHTML = `No notes found for this session.`;        
    }
}

function deleteNote(index) {
    let notes = localStorage.getItem("notes");
    if (notes == null) {
        notesObj = [];
    }
    else {
        notesObj = JSON.parse(notes);
    }
    notesObj.splice(index, 1);
    localStorage.setItem("notes", JSON.stringify(notesObj));
    showNotes();
}

let search = document.getElementById('searchNote');
search.addEventListener("input", function () {
    let searchInput = search.value;
    console.log("Input event fired", searchInput);
    let noteItem = document.getElementsByClassName('note-item');
    Array.from(noteItem).forEach(function (element) {
        let noteContent = element.getElementsByTagName("p")[0].innerText;
        if (noteContent.includes(searchInput)) {
            element.style.display = "table-row";
        }
        else {
            element.style.display = "none";
        }
        console.log(noteContent);
    });
});






// //differentiates uppercase
// const timer = document.getElementById('stopwatch');

// var hr = 0;
// var min = 0;
// var sec = 0;
// var stoptime = true;
// startTimer();
// // localStorage.setItem('myTime', ((new Date()).getTime() * 1000));
// // console.log(localStorage.getItem('myTime'));
// function startTimer() {
//     if (stoptime == true) {
//         stoptime = false;
//         // timerCycle();
//     }
// }
// function stopTimer() {
//     if (stoptime == false) {
//         stoptime = true;
//     }
// }

// function timerCycle() {
//     if (stoptime == false) {
//         sec = parseInt(sec);
//         min = parseInt(min);
//         hr = parseInt(hr);

//         sec = sec + 1;

//         if (sec == 60) {
//             min = min + 1;
//             sec = 0;
//         }
//         if (min == 60) {
//             hr = hr + 1;
//             min = 0;
//             sec = 0;
//         }

//         if (sec < 10 || sec == 0) {
//             sec = '0' + sec;
//         }
//         if (min < 10 || min == 0) {
//             min = '0' + min;
//         }
//         if (hr < 10 || hr == 0) {
//             hr = '0' + hr;
//         }

//         timer.innerHTML = hr + ':' + min + ':' + sec;
//         localStorage.setItem('myTime', timer.innerHTML);
//         console.log(localStorage.getItem('myTime'));
//         setTimeout("timerCycle()", 1000);
//     }
// }

// function resetTimer() {
//     timer.innerHTML = '00:00:00';
// }

// if (localStorage.getItem('myTime')) {

//     Update();
// }
// // start.onclick = function () {
// //     localStorage.setItem('myTime', ((new Date()).getTime() + timerLength * 1000));
// //     if (timeoutID != undefined) window.clearTimeout(timeoutID);
// //     Update();
// // }

// function Update() {
//     finishTime = localStorage.getItem('myTime');
//     // dis.innerHTML = "Time Left: " + Math.max(timeLeft/1000,0);
//     timeoutID = window.setTimeout(Update, 100);
// }
// function createCookie(name, value, days) {
//     var expires;
//     if (days) {
//         var date = new Date();
//         date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
//         expires = "; expires=" + date.toGMTString();
//     }
//     else {
//         expires = "";
//     }
//     document.cookie = escape(name) + "=" + escape(value) + expires;
// }

function endSession() {
    var status = 2;
    let notes_list = [];
    createCookie("SessionStatus", status, 1);
    let link = document.getElementById('endSession');
    link.setAttribute('href', 'save_cbt_notes.php?j=' + JSON.stringify(notesObj));
}

function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires;
}

function endVRETSession() {
    var status = 2;
    let notes_list = [];
    createCookie("SessionStatus", status, 1);
    let link = document.getElementById('btnEndVRETSession');
    console.log("what up")
    link.setAttribute('href', 'save_vret_notes.php?vretnotes=' + JSON.stringify(notesObj));
}

function backToList(){
    localStorage.clear();
    window.location.href = "returnfromcbt.php";
}