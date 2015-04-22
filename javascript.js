/*************************
* javascript.js
************************/

function handleUpdateClick() {
  // handleUpdateClick
  if (confirm("Are you sure you want to append text?")) {
    var text = document.getElementById('text').value;
    var color = document.getElementById('color').value;

    appendText(text);
    updateColor(color);
  }
}

function appendText(text) {
  var htmlText = document.getElementById('results');
  htmlText.innerHTML += '\n' + text;
}

function updateColor(color) {
  document.getElementById("results").style.backgroundColor = color;
}

function toggleVisibility() {
  var isVisible = document.getElementById('results').style

  if (isVisible.visibility === 'hidden') {
    isVisible.visibility = 'visible';
  } else {
    isVisible.visibility = 'hidden';
  }
}