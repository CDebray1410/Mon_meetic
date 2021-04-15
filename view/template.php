<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Christopher Debray">
    <meta name="description" content="Site de gestion type meetic">
    <meta name="keywords" content="rencontre, meetic">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/main.css">
    <title><?php echo $title ?></title>
</head>
<body>
    <?php echo $header ?>
    
    <main>
        <?php echo $content ?>
    </main>
    <script type="text/javascript" src="public/javascript/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="public/javascript/main.js"></script>
    <script type="text/javascript" src="public/javascript/members.js"></script>
</body>
</html>