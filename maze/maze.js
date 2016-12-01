/* CSE326 : Web Application Development
 * Lab 11 - Maze game
 *
 */
"use strict";
var loser = null;  // whether the user has hit a wall
var end = null;
window.onload = function() {
  $("start").addEventListener("click",startClick);
  document.body.observe("mouseover",overBody);
  var boundaries = $$("#maze .boundary");
  for(var i = 0; i < boundaries.length; i++)
  {
    boundaries[i].onmouseover = overBoundary;
  }
  $("end").onmouseover = overEnd;
};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
  loser = true;
  if(end === false)
  {
    $("status").textContent = "You lose!";
    var boundaries = $$("#maze .boundary");
    for(var i = 0; i < boundaries.length; i++)
    {
      boundaries[i].addClassName("youlose");
    }
  }
  end = true;
  event.stop();
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
  if(end)
  {
    $("status").textContent = "start!";
  }
  end = false;
  var boundaries = $$("#maze .boundary");
  for(var i = 0; i < boundaries.length; i++)
  {
    boundaries[i].removeClassName("youlose");
  }
  end = false;
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
  loser = false;
  if(!loser && !end)
  {
      $("status").textContent = "You win!";
  }
  end = true;
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
  if(!end && event.element() === document.body)
  {
    loser = true;
    overBoundary(event);
  }
}
