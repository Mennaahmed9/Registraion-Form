<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/header.css">

</head>
<body>
    <header>
        <div class="logo">
            <img src="images/Logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#footer"onclick="scrollToFooter()">Contact US</a></li>
            </ul>
        </nav>
    </header>
    <script>
    function scrollToFooter() {
    const footer = document.getElementById('footer');
    footer.scrollIntoView({ behavior: 'smooth' });
}
 </script>
</body>
</html>
