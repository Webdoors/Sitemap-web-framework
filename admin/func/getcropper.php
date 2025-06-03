<?php
$a=mysqli_real_escape_string($con,$_POST["a"]);
$q2=mysqli_query($con,"SELECT * FROM productimgs WHERE  id='".$a."'");
$r2=mysqli_fetch_array($q2);
?>
 <style>
    .container {
      margin: 20px auto;
      max-width: 100%;
    }

    img {
      max-width: 100%;
    }

    .cropper-view-box,
    .cropper-face {
      border-radius:0%;
    }
  </style>
  <div class="container">

    <div class="row">
    <div class="col-sm-6">
      <img id="image" src="<?=$r2["img"]?>" alt="Picture">
    </div>
    <div class="col-sm-1"></div>
    <div class="col-sm-4" id="result"></div>
	    <div class="col-sm-12">
	    <p>
      <button type="button" class="btn btn-primary" id="button">Crop</button>
      <button type="button" class="btn btn-success SAVECRO" d="<?=$a?>" id="">Save</button>
    </p>
		</div>
		</div>
  </div>
 
  <script>
    function getRoundedCanvas(sourceCanvas) {
      var canvas = document.createElement('canvas');
      var context = canvas.getContext('2d');
      var width = sourceCanvas.width;
      var height = sourceCanvas.height;

      canvas.width = width;
      canvas.height = height;
      context.imageSmoothingEnabled = true;
      context.drawImage(sourceCanvas, 0, 0, width, height);
      context.globalCompositeOperation = 'destination-in';
      context.beginPath();
      context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
      context.fill();
      return canvas;
    }

   $(function() {
      var image = document.getElementById('image');
      var button = document.getElementById('button');
      var result = document.getElementById('result');
      var croppable = false;
      var cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 1,
        ready: function () {
          croppable = true;
        },
      });

      button.onclick = function () {
        var croppedCanvas;
        var roundedCanvas;
        var roundedImage;

        if (!croppable) {
          return;
        }

        // Crop
        croppedCanvas = cropper.getCroppedCanvas();

        // Round
        // roundedCanvas = getRoundedCanvas(croppedCanvas);
        roundedCanvas = croppedCanvas;

        // Show
        roundedImage = document.createElement('img');
        $(roundedImage).addClass("CROPPED");
        roundedImage.src = roundedCanvas.toDataURL()
        result.innerHTML = '';
        result.appendChild(roundedImage);
      };
    });
  </script>