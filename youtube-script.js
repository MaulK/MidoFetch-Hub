document.getElementById('convertButton').addEventListener('click', function() {
    const videoUrl = document.getElementById('youtubeLink').value;
    convertVideo(videoUrl);
});

function convertYoutube(videoUrl) {
    // Regular expression pattern to extract the video ID from the URL
    const videoIdPattern = /(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/|user\/\S+|shorts\/|%5Cembed%5CUCIYj6CeLFs%5C?))([\w-]{11})/;

    // Use the test() method to check if the URL matches the pattern
    if (videoIdPattern.test(videoUrl)) {
        // Use the exec() method to get the actual matched video ID
        const videoId = videoIdPattern.exec(videoUrl)[1];

        // Use the youtube-dl command to download the video
        const exec = require('child_process').exec;
        const command = `youtube-dl -f 'bestvideo[ext=mp4][height<=?720]+bestaudio[ext=m4a]/best[ext=mp4][height<=?720]' -o '%(title)s.%(ext)s' ${videoId}`;
        exec(command, (error, stdout, stderr) => {
            if (error) {
                console.error(`exec error: ${error}`);
                return;
            }
            console.log(`stdout: ${stdout}`);
            console.log(`stderr: ${stderr}`);
        });
    } else {
        alert('Invalid YouTube video URL');
    }
}