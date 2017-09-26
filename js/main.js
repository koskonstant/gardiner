var ROOTPATH = ""
console.log('file read');

function startGame(url, level) {
  var quizData = [];
  var index = -1;
  var $answer = $('#text');
  var $lvl = $('#levelid');
  var $levelText = $('#level');
  var $start = $('#start');
  var $image = $('#image');
  var $end = $('#end');
  var $seconds = $('#seconds');
  var $help = $('#hint-button');
  var $next = $('#next');
  var $hints = $('#hints');
  var $hintsused = $('#hintsused');
  var $nextlvl = $('#nextlvlbutton');
  var $myname = $('#myname');
  var $lvlid = $('#lvlid');

  var startTime;
  var timeInterval;
  var userAnswers = [];
  var currentAnswer;
  var Answer = function (id) {
    return {
      id: id,
      helps: 0,
      time: 0
    }
  };


  $.ajax({
    type: "POST",
    url: url,
    dataType: "JSON",
    data: { "level": level }
  })
    .done(function (data) {
      quizData = data;
      $lvl.text(level);
      $next.focus();
    })
    .always(function () {
      if (quizData.length < 1) {
        console.log(quizData.length);
        errorAction();
      }
    });

  function errorAction() {
    $("#start").text("An error occupied :( Please try to reload the page!");
    $next.hide();
    index = -2;
  }

  $next.click(function () {
    index++;
    update();
  });

  function update() {

    if (index === 0) {
      $start.hide();
      $myname.show();
      $answer.show();
      $help.show();
      $hints.show();
      $hintsused.show();
      $seconds.show();
      $next.addClass('pulse');
      startQuestion();
      console.log('quiz');
      return;
    }

    if (index === quizData.length) {
      $end.show();
      $next.hide();
      $myname.hide();
      $seconds.text('');
      $answer.hide();
      $help.hide();
      $hints.hide();
      $hintsused.hide();
      load('');
      $('#datasend').val(JSON.stringify(userAnswers));
      $lvlid.val(level);
      $('#results-button').focus();
      console.log(userAnswers);
      return;
    }

    startQuestion();
    console.log('no if');
  }

  function load(image) {
    $image.attr('src', '');
    $image.attr('src', image);
  }

  function startTimer() {
    startTime = Date.now();
    updateClock();
    timeInterval = setInterval(updateClock,1000);
  }

  function updateClock(){
    $seconds.text(Math.round((Date.now()-startTime)/1000));
  }

  function addListeners(name) {
    $answer.on('change', function () {
      var value = $(this).val().trim().toLowerCase();
      if (value === name.toLowerCase()) {
        completeQuestion();
        return;
      }
      Materialize.toast('No! Try again!', 2000);
    });

    $help.on('click', function () {
      if (currentAnswer.helps !== name.length - 1) {
        currentAnswer.helps++ ;
      }
      var tip = name.substr(0, currentAnswer.helps);
      Materialize.toast('Name starts with: ' + tip, 5000);
      $hintsused.text(currentAnswer.helps);
      $answer.val(tip);
    });
  }

  function removeListeners() {
    $answer.off('change');
    $help.off('click');
  }

  function startQuestion() {
    $next.removeClass('scale-in');
    $next.hide();
    load(ROOTPATH+quizData[index].image);
    addListeners(quizData[index].name);
    currentAnswer = Answer(quizData[index].id);
    $answer.val('');
    $answer.focus();
    startTimer();
  }

  function completeQuestion() {
    clearInterval(timeInterval);
    removeListeners();
    Materialize.toast('Thats Right!', 4000);
    currentAnswer.time = $seconds.text();
    userAnswers.push(currentAnswer);
    $next.addClass('scale-in');
    $next.show();
    $next.focus();
    console.log(userAnswers);
  }
}

// ========================================================================================

function loadFaces(url, level) {
  var quizData = [];
  var index = -1;
  var $start = $('#start');
  var $end = $('#end');
  var $image = $('#image');
  var $text = $('#text');
  var $name = $('#name');
  var $prev = $('#previous');
  var $next = $('#next');
  var $lvl = $('#levelid');

  $.getJSON(url, function (data) {
    console.log(data);
    quizData = data;
  })
    .always(function () {
      if (quizData.length < 1) {
        console.log(quizData.length);
        errorAction();
      }
    });


  function errorAction() {
    $("#start-title").text("An error occupied :( Please try to reload the page!");
    $next.hide();
    index = -2;
  }

  function update() {
    console.log('index is' + index)
    if (index === -1) {
      $start.show();
      $text.hide();
      $prev.hide();
      load('', '');
      return;
    }
    if (index === 0) {
      $start.hide();
      $text.show();
      $prev.show();
    }
    if (index === quizData.length - 1) {
      $end.hide();
      $text.show();
      $next.show();
    }
    if (index === quizData.length) {
      $end.show();
      $text.hide();
      $next.hide();
      load('', '');
      return;
    }
    console.log(quizData[index].image, quizData[index].name,quizData[index].audio );
    load(quizData[index].image, quizData[index].name, quizData[index].audio);
  }

  function load(image, name, audio) {
    console.log(image, name, audio);
    $image.attr('src', '');
    $image.attr('src', image);
    $name.text(name);
    if(typeof(quizData[index]) != "undefined"){    
      playNameAudio('mp3/my-name-is.mp3');
      setTimeout(function() {
        playAudio('mp3/faces/' + quizData[index].audio);
      }, 900); 
    }   
  }

  function playNameAudio(sAudio) {
    var audioName = document.getElementById('audioNameEngine');
    if(audioName !== null) {
      audioName.src = sAudio;
      audioName.play();
    } 
  }

  function playAudio(sAudio) {
    var audioElement = document.getElementById('audioEngine');
    if(audioElement !== null) {
      audioElement.src = sAudio;
      audioElement.play();
    } 
  }

  $next.click(function () {
    index++;
    update();
  });

  $prev.click(function () {
    index--;
    console.log('next is clicked')
    update();
  });
}