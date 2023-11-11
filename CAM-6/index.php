<?php
    unlink("output_20231111.mp4");

    $imageDirectory = __DIR__ . '/';

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the value from the input field
        $dateVariable = $_POST['dateVariable'];

        // Build the output video filename with the date
        $outputVideo = "output_{$dateVariable}.mp4";

        // Build FFmpeg command using the provided date variable
        $cmd = "ffmpeg -framerate 10 -pattern_type glob -i '{$imageDirectory}t-{$dateVariable}_*.jpg' -c:v libx264 -r 30 -pix_fmt yuv420p {$outputVideo}";

        // Execute the command
        $output = shell_exec($cmd);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.4/plyr.css" />
    <title>STU CAM-6 | 監控回放</title>
</head>
<body>

<!-- Form to input date variable -->
<form method="post">
    <label for="dateVariable">請輸入日期變數(e.g. 20231101): </label>
    <input type="text" id="dateVariable" name="dateVariable" required>
    <button type="submit">確認</button>
</form>

    <p> 監控接口調用需時 | 耐心等待 | 如長時間無反應可 F5或刷新網站</p>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <!-- Display video if form is submitted -->
    <video id="player" controls>
        <source src="<?php echo $outputVideo; ?>" type="video/mp4">
    </video>
    <script src="https://cdn.plyr.io/3.6.4/plyr.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const player = new Plyr('#player');
        });
    </script>
<?php endif; ?>

</body>
</html>
