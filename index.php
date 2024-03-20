<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Configuration</title>
<style>
  #product-canvas {
    border: 1px solid black;
    cursor: move;
  }

  #move-buttons {
    margin-top: 10px;
  }
</style>
</head>
<body>
  <h1>Product Configuration</h1>
  <div id="options">
    <label for="color">Color:</label>
    <select id="color" onchange="updateProduct()">
      <option value="red">Red</option>
      <option value="blue">Blue</option>
      <option value="green">Green</option>
    </select><br>
    <label for="text">Text:</label>
    <input type="text" id="text" oninput="updateProduct()"><br>
    <label for="text-x">Text X:</label>
    <input type="number" id="text-x" min="0" max="400" step="1" value="20" oninput="updateProduct()"><br>
    <label for="text-y">Text Y:</label>
    <input type="number" id="text-y" min="0" max="300" step="1" value="50" oninput="updateProduct()"><br>
    <label for="text-color">Text Color:</label>
    <input type="color" id="text-color" value="#000000" onchange="updateProduct()"><br>
    <label for="text-font">Text Font:</label>
    <select id="text-font" onchange="updateProduct()">
      <option value="Arial">Arial</option>
      <option value="Verdana">Verdana</option>
      <option value="Times New Roman">Times New Roman</option>
      <option value="Courier New">Courier New</option>
    </select><br>
    <label for="text-size">Text Size:</label>
    <input type="number" id="text-size" min="8" max="72" step="1" value="30" oninput="updateProduct()"><br>
    <label for="text-style-bold">Bold:</label>
    <input type="checkbox" id="text-style-bold" onchange="updateProduct()"><br>
    <label for="text-style-italic">Italic:</label>
    <input type="checkbox" id="text-style-italic" onchange="updateProduct()"><br>
    <label for="image">Upload Image:</label>
    <input type="file" id="image" accept="image/*" onchange="updateProduct()"><br>
    <label for="image-size">Resize Image:</label>
    <input type="range" id="image-size" min="0.1" max="2" step="0.1" value="1" onchange="updateProduct()">
  </div>
  <div id="move-buttons">
    <button onclick="moveImage('left')">Left</button>
    <button onclick="moveImage('right')">Right</button>
    <button onclick="moveImage('up')">Up</button>
    <button onclick="moveImage('down')">Down</button>
  </div>
  
   <div>
    <button onclick="saveDesign()">Save Design</button>
  </div>
  
  <canvas id="product-canvas" width="400" height="300"></canvas>

  <script>
    var offsetX = 0;
    var offsetY = 0;

    function updateProduct() {
      var canvas = document.getElementById('product-canvas');
      var ctx = canvas.getContext('2d');

      // Clear canvas
      ctx.clearRect(0, 0, canvas.width, canvas.height);

      // Get selected color
      var color = document.getElementById('color').value;

      // Draw background
      ctx.fillStyle = color;
      ctx.fillRect(0, 0, canvas.width, canvas.height);

      // Add text
      var text = document.getElementById('text').value;
      var textX = parseInt(document.getElementById('text-x').value);
      var textY = parseInt(document.getElementById('text-y').value);
      var textColor = document.getElementById('text-color').value;
      var textSize = parseInt(document.getElementById('text-size').value);
      var textFont = document.getElementById('text-font').value;
      var textStyleBold = document.getElementById('text-style-bold').checked ? 'bold ' : '';
      var textStyleItalic = document.getElementById('text-style-italic').checked ? 'italic ' : '';

      ctx.fillStyle = textColor;
      ctx.font = textStyleBold + textStyleItalic + textSize + 'px ' + textFont;
      ctx.fillText(text, textX, textY);

      // Add image
      var imageInput = document.getElementById('image');
      var file = imageInput.files[0];
      if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
          var img = new Image();
          img.onload = function() {
            var scale = parseFloat(document.getElementById('image-size').value);
            var width = img.width * scale;
            var height = img.height * scale;
            
            // Resize if too big
            if (width > canvas.width || height > canvas.height) {
              var ratio = Math.min(canvas.width / width, canvas.height / height);
              width *= ratio;
              height *= ratio;
            }

            var x = (canvas.width - width) / 2;
            var y = (canvas.height - height) / 2;

            ctx.drawImage(img, x + offsetX, y + offsetY, width, height);
          };
          img.src = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    }

    function moveImage(direction) {
      var step = 10; // Adjust the step as needed
      switch (direction) {
        case 'left':
          offsetX -= step;
          break;
        case 'right':
          offsetX += step;
          break;
        case 'up':
          offsetY -= step;
          break;
        case 'down':
          offsetY += step;
          break;
      }
      updateProduct();
    }
	
	function saveDesign() {
      var canvas = document.getElementById('product-canvas');
      var dataURL = canvas.toDataURL('image/png');
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          alert('Design saved successfully!');
        }
      };
      xhr.open('POST', 'save_image.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.send('image=' + encodeURIComponent(dataURL));
    }
	
  </script>
</body>
</html>
