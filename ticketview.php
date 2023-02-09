<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ticketview.css">
    <link href="https://fonts.google.com/specimen/Poppins?query=Popp" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6b465b3e69.js" crossorigin="anonymous"></script>
<title>Generate Ticket</title>
</head>
<body>
    <div class="ticket">
        <div>
            <img src="images/logocropped.png" alt="Tax Administration Logo">
        </div>
        <p><?= $dateandtime;?></p>
        <h1><?= $tid; ?></h1><br>
        <div id="ticketinfo">
            <h3><strong>ID No: </strong></h3> <h3><?= $gid;?></h3> <br>
            <h3><strong>Visitor Name: </strong></h3> <h3><?= $firstname." ".$lastname;?></h3> <br>
            <h3><strong>Floor No: </strong></h3> <h3><?= $floorno;?></h3> <br>
            <h3><strong>Purpose of Visit: </strong></h3> <h3><?= $purpose;?></h3> <br>
        </div>
    </div>
    <footer>
        <p> <strong>&copy;Tax Administration Jamaica 2022</strong></p>
    </footer>
    <button id="printBtn" class="hidden-print">Print</button>
    <script>
        const printBtn=document.querySelector("#printBtn");
        printBtn.addEventListener("click", function(){
          window.print();
        });
    </script>
</body>
</html>