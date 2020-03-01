<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUAP project</title>

    <link rel="stylesheet" href="./style/background.css">
    <link rel="stylesheet" href="./style/loader.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="./system/fileControl.js"></script>
    <script src="./system/resultControl.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    
</head>
<body>
        <div class="container-fluid bg-dark text-white" id="main">
            <h2>Upload your image:</h2>
            <form action="./system/upload.php" method="POST" enctype="multipart/form-data">
                <div class ="container-fluid text-white" id="button-block">
                    <input type="file" name="fileToUpload" id="fileToUpload" style="display:none;">
                    <button type="button" class = "btn btn-outline-info" onclick="chooseFile()">Choose file</button>
                    <button type="submit" id="saveFile" name="saveFile" class = "btn btn-outline-info">Upload file</button>
                </div>
            </form>
            <div class ="container-fluid text-white" id="button-block">
                <p id="choosenFile" style="display:none;">.</p>
                <button type="submit" class = "btn btn-outline-success"  value="Upload Image" name="submit" onclick="getResult()">Get results</button>
            </div>
            <div>
                <div class="loader">
                    <svg class="circular" viewBox="25 25 50 50">
                        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                    </svg>
                </div>
                <div class ="container  text-white" id="graph-block" style="margin-top:15px;padding-bottom:2px; display:none;">                   
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
</body>
</html>