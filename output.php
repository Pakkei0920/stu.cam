<?php
    $imageDirectory = __DIR__ . '/';
    $outputVideo = 'output.mp4';

    // Build FFmpeg command
    $cmd = "ffmpeg -framerate 10 -pattern_type glob -i '{$imageDirectory}t-20231111_*.jpg' -c:v libx264 -r 30 -pix_fmt yuv420p {$outputVideo}";

    // Execute the command
    $output = shell_exec($cmd);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.4/plyr.css" />
    <title>Plyr.io Example with Subtitles</title>
</head>
<body>

<video id="player" controls>
    <source src="output.mp4" type="video/mp4">
</video>

<script src="https://cdn.plyr.io/3.6.4/plyr.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const player = new Plyr('#player');
    });
</script>

</body>
</html>
