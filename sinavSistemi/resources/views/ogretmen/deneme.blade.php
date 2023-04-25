<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="dosya.js"></script>

</head>
<body>

<button onclick="uyariPenceresi()">Uyarı</button>
<script>
 var car={
    model:"A40",
    yil:2019,
    marka:"auidi"
 };
 document.write(car.model);
 document.write(car["model"]);
</script>

</body>
</html>