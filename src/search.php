<?php
include 'db_config.php';

$books = array();

if (isset($_REQUEST["search"])) {
    $searchTerm = filter_input(INPUT_GET, 'search');  // User input

    // Filtering out quotes
    $searchTerm = str_replace(["'", '"'], "", $searchTerm);

    $sql = "SELECT * FROM books WHERE title LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Search</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">Library Book Search</h1>
        <form action="search.php" method="GET" class="max-w-lg mx-auto bg-white p-8 shadow-md rounded-lg">
            <div class="mb-4">
                <label for="search" class="block text-gray-700 text-sm font-bold mb-2">Search for a book:</label>
                <input type="text" id="search" name="search" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="<?php echo $searchTerm ?? ''; ?>">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Search
                </button>
            </div>
            <!-- use php to loop through books array and display the author and title in a styled teble -->
            <div class="mt-6">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-200">Title</th>
                            <th class="py-2 px-4 border-b border-gray-200">Author</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book) { ?>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200"> <?php echo htmlspecialchars($book["title"], ENT_QUOTES) ?> </td>
                                <td class="py-2 px-4 border-b border-gray-200"> <?php echo htmlspecialchars($book["author"], ENT_QUOTES) ?> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</body>

</html>