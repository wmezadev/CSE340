<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Search | PHP Motors</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div id="wrapper">
            <header>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
            </header>
            <nav>
                <?php echo $navList; ?>
            </nav>
            <main>
                <h1>Search</h1>
                <?php if (isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']); } ?>
                <form method="GET" action="/phpmotors/search" class="search-form">
                    <input type="hidden" name="action" value="q"/>
                    <div class="field">
                        <label for="query">What are you looking for today?</label><br/>
                        <input type="text" id="query" name="query" <?php if(isset($query)){ echo "value='$query'"; } ?>>
                    </div>
                    <div class="field">
                        <button class="btn btn--primary" type="submit">Search</button>
                    </div>
                </form>
                <?php 
                if(isset($query) && !empty($query)){
                    echo "<h2>Returned $results_count results for: $query</h2>";
                    echo "<ul class='search-results'>";
                    if(is_array($results)){
                        foreach ($results as $vehicle) {
                            echo "<li>";
                            echo "<a href='/phpmotors/vehicles/?action=getVehicleInfo&invId=$vehicle[invId]' target='_blank'>$vehicle[invYear] $vehicle[invMake] $vehicle[invModel]</a>";
                            echo "<p>$vehicle[invDescription]</p>";
                            echo "</li>";
                        }
                        echo "</ul>";
                    }
                }
                ?>
            </main>
            <hr>
            <footer>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
            </footer>
        </div>
    </body>
</html>