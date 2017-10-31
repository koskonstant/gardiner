/**
 * Memory Game
 *
 * This is the wrapper function for my memory game! It contains all of the core
 * functionality for the game to run.
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2014, Call Me Nick
 * http://callmenick.com
 */

;(function( window ) {

  'use strict';

  /**
   * Extend object function
   *
   */

  function extend( a, b ) {
    for( var key in b ) { 
      if( b.hasOwnProperty( key ) ) {
        a[key] = b[key];
      }
    }
    return a;
  }

  /**
   * Shuffle array function
   *
   */

  function shuffle(o) {
    for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
  };

  /**
   * Memory constructor
   *
   */

  function Memory( options ) {
    this.options = extend( {}, this.options );
    extend( this.options, options );
    this._init();
  }

  /**
   * Memory options
   *
   * Memory default options. Available options are:
   *
   * wrapperID: the element in which Memory gets built
   * cards: the array of cards
   * onGameStart: callback for when game starts
   * onGameEnd: callback for when game ends
   */

  Memory.prototype.options = {
    wrapperID : "container",
    cards : [
      {
        id : 1,
        title: "Apple",
        img: "images/fruits/apple.png",
        cat: "fruits",
        audio: "apple.mp3"
      },
      {
        id : 2,
        title: "Banana",
        img: "images/fruits/banana.png",
        cat: "fruits",
        audio: "banana.mp3"
      },
      {
        id : 3,
        title: "Grape",
        img: "images/fruits/grape.png",
        cat: "fruits",
        audio: "grape.mp3"
      },
      {
        id : 4,
        title: "Mandarin",
        img: "images/fruits/mandarin.png",
        cat: "fruits",
        audio: "mandarin.mp3"
      },
      {
        id : 5,
        title: "Melon",
        img: "images/fruits/melon.png",
        cat: "fruits",
        audio: "melon.mp3"
      },
      {
        id : 6,
        title: "Orange",
        img: "images/fruits/orange.png",
        cat: "fruits",
        audio: "orange.mp3"
      },
      {
        id : 7,
        title: "Peach",
        img: "images/fruits/peach.png",
        cat: "fruits",
        audio: "peach.mp3"
      },
      {
        id : 8,
        title: "Pear",
        img: "images/fruits/pear.png",
        cat: "fruits",
        audio: "pear.mp3"
      },
      {
        id : 9,
        title: "Pineapple",
        img: "images/fruits/pineapple.png",
        cat: "fruits",
        audio: "pineapple.mp3"
      },
      {
        id : 10,
        title: "Strawberry",
        img: "images/fruits/strawberry.png",
        cat: "fruits",
        audio: "strawberry.mp3"
      },
      {
        id : 11,
        title: "Watermelon",
        img: "images/fruits/watermelon.png",
        cat: "fruits",
        audio: "watermelon.mp3"
      },
      {
        id : 12,
        title: "Apricot",
        img: "images/fruits/apricot.png",
        cat: "fruits",
        audio: "apricot.mp3"
      },
      {
        id : 13,
        title: "Blueberry",
        img: "images/fruits/blueberry.png",
        cat: "fruits",
        audio: "blueberry.mp3"
      },
      {
        id : 14,
        title: "Avocado",
        img: "images/fruits/avocado.png",
        cat: "fruits",
        audio: "avocado.mp3"
      },
      {
        id : 15,
        title: "Grapefruit",
        img: "images/fruits/grapefruit.png",
        cat: "fruits",
        audio: "grapefruit.mp3"
      },
      {
        id : 16,
        title: "Papaya",
        img: "images/fruits/papaya.png",
        cat: "fruits",
        audio: "papaya.mp3"
      },
      {
        id : 17,
        title: "Black",
        img: "images/colors/black.png",
        cat: "colors",
        audio: "black.mp3"
      },
      {
        id : 8,
        title: "Blue",
        img: "images/colors/blue.png",
        cat: "colors",
        audio: "blue.mp3"
      },
      {
        id : 19,
        title: "Brown",
        img: "images/colors/brown.png",
        cat: "colors",
        audio: "brown.mp3"
      },
      {
        id : 20,
        title: "Fuchsia",
        img: "images/colors/fuchsia.png",
        cat: "colors",
        audio: "fuchsia.mp3"
      },
      {
        id : 21,
        title: "Gold",
        img: "images/colors/gold.png",
        cat: "colors",
        audio: "gold.mp3"
      },
      {
        id : 22,
        title: "Gray",
        img: "images/colors/gray.png",
        cat: "colors",
        audio: "gray.mp3"
      },
      {
        id : 23,
        title: "Green",
        img: "images/colors/green.png",
        cat: "colors",
        audio: "green.mp3"
      },
      {
        id : 24,
        title: "Magenta",
        img: "images/colors/magenta.png",
        cat: "colors",
        audio: "magenta.mp3"
      },
      {
        id : 25,
        title: "Olive",
        img: "images/colors/olive.png",
        cat: "colors",
        audio: "olive.mp3"
      },
      {
        id : 26,
        title: "Orange",
        img: "images/colors/orange.png",
        cat: "colors",
        audio: "orange.mp3"
      },
      {
        id : 27,
        title: "Pink",
        img: "images/colors/pink.png",
        cat: "colors",
        audio: "pink.mp3"
      },
      {
        id : 28,
        title: "Purple",
        img: "images/colors/purple.png",
        cat: "colors",
        audio: "purple.mp3"
      },
      {
        id : 29,
        title: "Red",
        img: "images/colors/red.png",
        cat: "colors",
        audio: "red.mp3"
      },
      {
        id : 30,
        title: "Turquoise",
        img: "images/colors/turquoise.png",
        cat: "colors",
        audio: "turquoise.mp3"
      },
      {
        id : 31,
        title: "White",
        img: "images/colors/white.png",
        cat: "colors",
        audio: "white.mp3"
      },
      {
        id : 33,
        title: "Yellow",
        img: "images/colors/yellow.png",
        cat: "colors",
        audio: "yellow.mp3"
      },
      {
        id : 34,
        title: "Albert",
        img: "images/faces/Albert.png",
        cat: "faces",
        audio: "Albert.mp3"
      },
      {
        id : 35,
        title: "Amanda",
        img: "images/faces/Amanda.png",
        cat: "faces",
        audio: "Amanda.mp3"
      },
      {
        id : 36,
        title: "Angela",
        img: "images/faces/Angela.png",
        cat: "faces",
        audio: "Angela.mp3"
      },
      {
        id : 37,
        title: "Anthony",
        img: "images/faces/Anthony.png",
        cat: "faces",
        audio: "Anthony.mp3"
      },
      {
        id : 38,
        title: "Bianca",
        img: "images/faces/Bianca.png",
        cat: "faces",
        audio: "Bianca.mp3"
      },
      {
        id : 39,
        title: "Carlos",
        img: "images/faces/Carlos.png",
        cat: "faces",
        audio: "Carlos.mp3"
      },
      {
        id : 40,
        title: "Chloe",
        img: "images/faces/Chloe.png",
        cat: "faces",
        audio: "Chloe.mp3"
      },
      {
        id : 41,
        title: "Chris",
        img: "images/faces/Chris.png",
        cat: "faces",
        audio: "Chris.mp3"
      },
      {
        id : 42,
        title: "Daniel",
        img: "images/faces/Daniel.png",
        cat: "faces",
        audio: "Daniel.mp3"
      },
      {
        id : 43,
        title: "Donald",
        img: "images/faces/Donald.png",
        cat: "faces",
        audio: "Donald.mp3"
      },
      {
        id : 44,
        title: "Elisa",
        img: "images/faces/Elisa.png",
        cat: "faces",
        audio: "Elisa.mp3"
      },
      {
        id : 45,
        title: "Gerald",
        img: "images/faces/Gerald.png",
        cat: "faces",
        audio: "Gerald.mp3"
      },
      {
        id : 46,
        title: "Hector",
        img: "images/faces/Hector.png",
        cat: "faces",
        audio: "Hector.mp3"
      },
      {
        id : 47,
        title: "James",
        img: "images/faces/James.png",
        cat: "faces",
        audio: "James.mp3"
      },
      {
        id : 48,
        title: "Kate",
        img: "images/faces/Kate.png",
        cat: "faces",
        audio: "Kate.mp3"
      },
      {
        id : 49,
        title: "Mary",
        img: "images/faces/Mary.png",
        cat: "faces",
        audio: "Mary.mp3"
      }    
    ],
    onGameStart : function() { return false; },
    onGameEnd : function() { return false; }
  }

  /**
   * Memory _init - initialise Memory
   *
   * Creates all the game content areas, adds the id's and classes, and gets
   * ready for game setup.
   */

  Memory.prototype._init = function() {
    this.game = document.createElement("div");
    this.game.id = "mg";
    this.game.className = "mg";
    document.getElementById(this.options.wrapperID).appendChild(this.game);

    this.gameMeta = document.createElement("div");
    this.gameMeta.className = "mg__meta clearfix";

    this.gameStartScreen = document.createElement("div");
    this.gameStartScreen.id = "mg__start-screen";
    this.gameStartScreen.className = "mg__start-screen";

    this.gameWrapper = document.createElement("div");
    this.gameWrapper.id = "mg__wrapper";
    this.gameWrapper.className = "mg__wrapper";
    this.gameContents = document.createElement("div");
    this.gameContents.id = "mg__contents";
    this.gameWrapper.appendChild(this.gameContents);

    this.gameMessages = document.createElement("div");
    this.gameMessages.id = "mg__onend";
    this.gameMessages.className = "mg__onend";

    this._setupGame();
  };

  /**
   * Memory _setupGame - Sets up the game
   *
   * We're caching all game related variables, and by default, displaying the
   * meta info bar and start screen HTML.
   *
   * A NOTE ABOUT GAME STATES:
   *
   * There are 4 game states in total, governed by the variable this.gameState.
   * Each game state allows for a certain series of functions to be performed.
   * The gameStates are as follows:
   *
   * 1 : default, allows user to choose level
   * 2 : set when user chooses level, and game is in play
   * 3 : game is finished
   */

  Memory.prototype._setupGame = function() {
    var self = this;
    this.gameState = 1;
    this.cards = shuffle(this.options.cards);
    this.card1 = "";
    this.card2 = "";
    this.card1id = "";
    this.card2id = "";
    this.card1flipped = false;
    this.card2flipped = false;
    this.flippedTiles = 0;
    this.chosenLevel = "";
    this.chosenCategory = "";
    this.numMoves = 0;
    this.timer = 0;

    this.gameMetaHTML = '<div class="mg__meta--right">\
      <button id="mg__button--restart" class="mg__button btn btn-game">Start Over</button>\
      </div>';
    this.gameMeta.innerHTML = this.gameMetaHTML;
    this.game.appendChild(this.gameMeta);
    this.gameStartScreenHTML = '<p class="mg__start-screen--text">The “Matching Tiles” game aims to reveal every tile by matching pairs of identical tiles. The user can continue to guess until matching right each tile. The game promotes point-and-click interactions. When the user turns over a tile there is an audio and visual feedback regarding the attached tile </p>\
      <div class="col-md-8 marginauto">\
      <div class="col-md-6">\
      <h3 class="mg__start-screen--sub-heading">Select Level</h3>\
      <select id="levels" class="mg__start-screen--level-select">\
        <option value="1" selected>Level 1 - (2 * 4) Tiles</option>\
        <option value="2">Level 2 - (3 * 6) Tiles</option>\
        <option value="3">Level 3 - (4 * 8) Tiles</option>\
      </select>\
      </div>\
      <div class="col-md-6">\
      <h3 class="mg__start-screen--sub-heading">Select Category</h3>\
      <select id="categories" class="mg__start-screen--category-select">\
        <option value="faces" data-catid="1" selected>Faces</option>\
        <option value="colors" data-catid="2">Colors</option>\
        <option value="fruits" data-catid="3">Fruits</option>\
      </select>\
      </div>\
      </div>\
      <div class="clear"></div>\
      <button id="btn" class="btn btn-game marginauto">Get Started</button>';
    this.gameStartScreen.innerHTML = this.gameStartScreenHTML;
    this.game.appendChild(this.gameStartScreen);
    document.getElementById("mg__button--restart").addEventListener( "click", function(e) {
      self.resetGame();      
    });
    this._startScreenEvents();
  }



  /**
   * Memory _startScreenEvents
   *
   * We're now listening for events on the start screen. That is, we're waiting
   * for when a user chooses a level.
   */

  Memory.prototype._startScreenEvents = function() {
    var levelsNodes = this.gameStartScreen.querySelectorAll("ul.mg__start-screen--level-select option");    
    var categoriesNodes = this.gameStartScreen.querySelectorAll("ul.mg__start-screen--category-select option");    
    var levelNode = document.getElementById("btn").selectedIndex;    
    this._startScreenEventsHandler(levelNode);    
  };

  /**
   * Memoery _startScreenEventsHandler
   *
   * A helper function to handle the click of the level inside the events
   * function.
   */

  Memory.prototype._startScreenEventsHandler = function(levelNode) {
    var self = this;
    document.getElementById("btn").addEventListener( "click", function(e) {      
      if (self.gameState === 1) {
        self._setupGameWrapper(this);
      }    
    });
  }

  /**
   * Memory _setupGameWrapper
   *
   * This function sets up the game wrapper, which is where the actual memory
   * tiles will reside and where all the game play happens.
   */

  Memory.prototype._setupGameWrapper = function(levelNode) {
    this.level = document.getElementById("levels").value;
    this.category = document.getElementById("categories").value;
    var e = document.getElementById("categories");
    this.categoryid = e.options[e.selectedIndex].dataset.catid;
    this.gameStartScreen.parentNode.removeChild(this.gameStartScreen);
    this.gameContents.className = "mg__contents mg__level-"+this.level;
    this.game.appendChild(this.gameWrapper);
    this.chosenLevel = this.level;
    this.chosenCategory = this.category;
    document.querySelector(".level-num").innerHTML = this.chosenLevel;
    document.querySelector(".category-num").innerHTML = this.chosenCategory;
    this._renderTiles();
  };


  /**
   * Memory _renderTiles
   *
   * This renders the actual tiles with content. A few thing happen here:
   *
   * 1. Calculate grid X and Y based on user level selection
   * 2. Calculate num tiles
   * 3. Create new cards array based on level, and draw cards from original array
   * 4. Shuffle the new cards array
   * 5. Cards get distributed into tiles
   * 6. gamePlay function gets triggered, taking care of all the game play action.
   */

  Memory.prototype._renderTiles = function() {
    this.gridX = this.level * 2 + 2;
    this.gridY = this.gridX / 2;
    this.numTiles = this.gridX * this.gridY;
    this.halfNumTiles = this.numTiles/2;
    this.newCards = [];

    for ( var i = 0; i < this.halfNumTiles; i++ ) {
      var filterObj = this.cards.filter(function(e) {
         return e.cat == document.querySelector(".category-num").innerHTML;
      });
      this.newCards.push(filterObj[i], filterObj[i]);
    }
    this.newCards = shuffle(this.newCards);

    for ( var i = 0; i < this.numTiles; i++  ) {
      var n = i + 1;    
      this.tilesHTML += '<div class="mg__tile mg__tile-' + n + '" data-number="tile' + n + '" data-clicks="0">\
        <div class="mg__tile--inner" data-id="' + this.newCards[i]["id"] + '" data-cat="' + this.newCards[i]["cat"] + '" data-audio="' + this.newCards[i]["audio"] + '" data-title="' + this.newCards[i]["title"] + '" >\
        <span class="mg__tile--outside"></span>\
        <span class="mg__tile--inside"><img src="' + this.newCards[i]["img"] + '"></span>\
        <div class="mg__tile--title">' + this.newCards[i]["title"] + '</div>\
        <audio id="audioEngine"></audio>\
        </div>\
        </div>';


    }
    this.gameContents.innerHTML = this.tilesHTML;
    this.gameState = 2;
    this.options.onGameStart();
    this._gamePlay();
    this._timerPlay();
    this._countClicks();        
  }

  Memory.prototype._timerPlay = function() {
    var time;
    time=setInterval(function (){updateTime()},1000);

    var timer = 0;
    function updateTime(){
      timer++;
      document.querySelector(".timer").innerHTML = timer;
    } 
  };

  Memory.prototype._timerStop = function() {
    var time;
    clearInterval(time);
    document.getElementById("clock").style.visibility="visible";
    document.querySelector(".timer").innerHTML = null;
    // window.location.reload();
  };


  /**
   * Memory _gamePlay
   *
   * Now that all the HTML is set up, the game is ready to be played. In this
   * function, we loop through all the tiles (goverend by the .mg__tile--inner)
   * class, and for each tile, we run the _gamePlayEvents function.
   */


  Memory.prototype._gamePlay = function() {
    var tiles = document.querySelectorAll("[data-cat='" + this.chosenCategory + "']");
    console.log(tiles);
    for (var i = 0, len = tiles.length; i < len; i++) {
      var tile = tiles[i];
      console.log(tile);
      this._gamePlayEvents(tile);
    };
  };

  /**
   * Memory _countClicks
   * Count the Clicks of each tile   
   */


  Memory.prototype._countClicks = function() {
    var tilenumber = document.querySelectorAll(".mg__tile");
    var tiles = document.querySelectorAll("[data-cat='" + this.chosenCategory + "']");
    for (var i = 0, len = tiles.length; i < len; i++) {
      var tile = tiles[i];
      var tilenum = tilenumber[i];   
      var numtile=tilenum.getAttribute("data-number");      
      tilenum.onclick = function() {
         var clicks = this.getAttribute("data-clicks");
         clicks++;
         var updatedClicks = this.setAttribute('data-clicks', clicks);
      };   
    };    
  };

  

  /**
   * Memory _gamePlayEvents
   *
   * This function takes care of the "events", which is basically the clicking
   * of tiles. Tiles need to be checked if flipped or not, flipped if possible,
   * and if zero, one, or two cards are flipped. When two cards are flipped, we
   * have to check for matches and mismatches. The _gameCardsMatch and 
   * _gameCardsMismatch functions perform two separate sets of functions, and are
   * thus separated below.
   */

  Memory.prototype._gamePlayEvents = function(tile) {
    var self = this;
    tile.addEventListener( "click", function(e) {

      
      if (!this.classList.contains("flipped")) {
        if (self.card1flipped === false && self.card2flipped === false) {
          this.classList.add("flipped");
          self.card1 = this;
          self.card1id = this.getAttribute("data-id");
          self.card1audio = this.getAttribute("data-audio");
          self.card1cat = this.getAttribute("data-cat");
          self.card1title = this.getAttribute("data-title");
          self.card1flipped = true;
          playAudio('mp3/' + self.card1cat + '/' + self.card1audio);
        } else if( self.card1flipped === true && self.card2flipped === false ) {
          this.classList.add("flipped");
          self.card2 = this;
          self.card2id = this.getAttribute("data-id");
          self.card2audio = this.getAttribute("data-audio");
          self.card2cat = this.getAttribute("data-cat");
          self.card2title = this.getAttribute("data-title");
          self.card2flipped = true;
          playAudio('mp3/' + self.card2cat + '/' + self.card2audio);
          if ( self.card1id == self.card2id ) {
            self._gameCardsMatch();
            // self._gameCounterMinusOne();
          } else {
            self._gameCardsMismatch();
          }
        }
      }
    });
  }

  /**
   * Memory _gameCardsMatch
   *
   * This function runs if the cards match. The "correct" class is added briefly
   * which fades in a background green colour. The times set on the two timeout
   * functions are chosen based on transition values in the CSS. The "flip" has
   * a 0.3s transition, so the "correct" class is added 0.3s later, shown for
   * 1.2s, then removed. The cards remain flipped due to the activated "flip"
   * class from the gamePlayEvents function.
   */

  Memory.prototype._gameCardsMatch = function() {
    // cache this
    var self = this;

    // add correct class
    window.setTimeout( function(){
      self.card1.classList.add("correct");
      self.card2.classList.add("correct");
    }, 300 );

    // remove correct class and reset vars
    window.setTimeout( function(){
      self.card1.classList.remove("correct");
      self.card2.classList.remove("correct");
      self._gameResetVars();
      self.flippedTiles = self.flippedTiles + 2;
      if (self.flippedTiles == self.numTiles) {
        self._winGame();
      }
    }, 500 );

    // plus one on the move counter
    this._gameCounterPlusOne();
  };

  /**
   * Memory _gameCardsMismatch
   *
   * This function runs if the cards mismatch. If the cards mismatch, we leave
   * them flipped for a little while so the user can see and remember what cards
   * they actually are. Then after that slight delay, we removed the flipped
   * class so they flip back over, and reset the vars.
   */

  Memory.prototype._gameCardsMismatch = function() {
    // cache this
    var self = this;

    // remove "flipped" class and reset vars
    window.setTimeout( function(){
      self.card1.classList.remove("flipped");
      self.card2.classList.remove("flipped");
      self._gameResetVars();
    }, 500 );

    

    // plus one on the move counter
    this._gameCounterPlusOne();
  };

  function playAudio(sAudio) {
  
  var audioElement = document.getElementById('audioEngine');
     console.log(audioElement);   
    if(audioElement !== null) {

      audioElement.src = sAudio;
      
      audioElement.play();
    } 
  }

  /**
   * Memory _gameResetVars
   *
   * For each turn, some variables are updated for reference. After the turn is
   * over, we need to reset these variables and get ready for the next turn.
   * This function handles all of that.
   */

  Memory.prototype._gameResetVars = function() {
    this.card1 = "";
    this.card2 = "";
    this.card1id = "";
    this.card2id = "";
    this.card1flipped = false;
    this.card2flipped = false;
  }

  /**
   * Memory _gameCounterPlusOne
   *
   * Each turn, the user completes 1 "move". The obective of memory is to
   * complete the game in as few moves as possible. Users need to know how many
   * moves they've had so far, so this function updates that number and updates
   * the HTML also.
   */

  Memory.prototype._gameCounterPlusOne = function() {
    this.numMoves = this.numMoves + 1;
    document.querySelector(".counter").innerHTML = this.numMoves;
  };

  // Memory.prototype._gameCounterMinusOne = function() {
  //   this.numMoves = this.numMoves - 1;
  //   document.querySelector(".counter").innerHTML = this.numMoves;
  // };
  

  /**
   * Memory _clearGame
   *
   * This function clears the game wrapper, by removing it from the game div. It
   * allows us to rerun setupGame, and clears the air for other info like
   * victory messages etc.
   */

  Memory.prototype._clearGame = function() {
    if (this.gameMeta.parentNode !== null) this.game.removeChild(this.gameMeta);
    if (this.gameStartScreen.parentNode !== null) this.game.removeChild(this.gameStartScreen);
    if (this.gameWrapper.parentNode !== null) this.game.removeChild(this.gameWrapper);
    if (this.gameMessages.parentNode !== null) this.game.removeChild(this.gameMessages);
  }

  /**
   * Memoray _winGame
   *
   * You won the game! This function runs the "onGameEnd" callback, which by
   * default clears the game div entirely and shows a "play again" button.
   */

  Memory.prototype._winGame = function() {
    var self = this;
    var clock;
    clock = document.getElementById("clock").innerHTML;
    if (this.options.onGameEnd() === false) {     
     var tilenumber = document.querySelectorAll(".mg__tile");     
     var tiles = document.querySelectorAll("[data-cat='" + this.chosenCategory + "']");     
     var tile;
     var tilenum;
     var tilename;
     var finalClicks;
     var tiletitle;
     var sumClicks = [];
     var sumClicks = [];
     for (var j = 0, len = tiles.length; j < len; j++) {
        tile = tiles[j];
        tilenum = tilenumber[j];
        finalClicks=tilenum.getAttribute("data-clicks");
        tiletitle = tile.getAttribute("data-title");
        tilename=tilenum.getAttribute("data-number");
        sumClicks.push({tileName: tilename,tileTitle: tiletitle, clicks: finalClicks});
     }
     var msg = '';
     sumClicks.forEach(function(curr){
       msg += '<p>'+curr.tileName+' ('+curr.tileTitle+')'+': '+curr.clicks+' Clicks '+'</p>'
     })
      this._clearGame();
      document.getElementById("time-block").classList.add("hide");
      this.gameMessages.innerHTML = '<h2 class="mg__onend--heading">Well Done!</h2>\
        <p class="mg__onend--message">You finished the round in ' + this.numMoves + ' moves in ' + clock + ' seconds. Go you.</p>\
        <div class="click_msg">' + msg + '</div>\
        <button id="mg__onend--restart" class="mg__button btn btn-game">Play again?</button>';
      this._timerStop();
      this.timeFinished = clock;
      this.game.appendChild(this.gameMessages);
      document.getElementById("mg__onend--restart").addEventListener( "click", function(e) {
        self.resetGame();
      });
    } else {
      // run callback
      this.options.onGameEnd();
    }
    this._storeData();
  }




Memory.prototype._storeData = function() {
  var clickMsg= document.querySelector(".click_msg").innerHTML;
  var TableData = { 
        "game_level" :this.chosenLevel,
        "game_category" :this.categoryid,
        "game_clicks" :clickMsg,
        "game_moves" :this.numMoves,
        "game_time_finished" :this.timeFinished
    };
   
    $.ajax({      
      url: "models/game2.php",
      data: TableData,
      success: function(data){
        // window.location='models/game2.php'
        // console.log(data);         
    }
  });
    
};



  /**
   * Memory resetGame
   *
   * This function resets the game. It can run at the end of the game when the
   * user is presented the option to play again, or at any time like a reset
   * button. It is a public function, and can be used in whatever custom calls
   * in your markup.
   */

  Memory.prototype.resetGame = function() {
    this._clearGame();
    this._setupGame();
    this._timerStop();
    window.location.reload();
  };

  /**
   * Add Memory to global namespace
   */

  window.Memory = Memory;

})( window );

