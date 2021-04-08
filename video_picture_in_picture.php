// add video html5 as mp.4
<video id="video" width="400" controls>
  // add #t=0.1 time delay to first frame otherwise will display blank video preview
  <source src="<?php the_field('video'); ?>#t=0.1" type="video/mp4">
  Your browser does not support HTML video.
</video>

// add picture in picture button and script
<button id="pipButton"></button>

<script>
  const video = document.getElementById("video");
  const pipButton = document.getElementById("pipButton");

  pipButton.addEventListener("click", async () => {
    try {
      await video.requestPictureInPicture();
    } catch (error) {
      // Video failed to enter Picture-in-Picture mode.
    }
  });

  video.addEventListener("enterpictureinpicture", (event) => {
    // Video entered Picture-in-Picture mode.
    const pipWindow = event.pictureInPictureWindow;
    updateVideoSize(pipWindow.width, pipWindow.height);
    pipWindow.addEventListener("resize", onPipWindowResize);
  });

  video.addEventListener("leavepictureinpicture", (event) => {
    // Video left Picture-in-Picture mode.
    const pipWindow = event.pictureInPictureWindow;
    pipWindow.removeEventListener("resize", onPipWindowResize);
  });

  function onPipWindowResize(event) {
    // Picture-in-Picture window has been resized.
    const { width, height } = event.target;
    updateVideoSize(width, height);
  }

  function updateVideoSize(width, height) {
    // TODO: Update video size based on pip window width and height.
  }
</script>
