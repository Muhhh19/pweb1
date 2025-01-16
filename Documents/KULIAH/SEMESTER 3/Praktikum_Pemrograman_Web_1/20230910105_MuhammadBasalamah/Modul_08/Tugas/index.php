<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tracer Alumni</h1>
        <form action="process.php" method="POST">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">No. Telepon:</label>
            <input type="text" id="phone" name="phone" required>
            
            <label for="graduation_year">Tahun Lulus:</label>
            <input type="number" id="graduation_year" name="graduation_year" required>
            
            <label for="current_job">Pekerjaan Saat Ini:</label>
            <input type="text" id="current_job" name="current_job">
            
            <button type="submit">Kirim</button>
        </form>
    </div>
</body>
</html>
