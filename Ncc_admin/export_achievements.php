<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['export_excel_btn']) && isset($_POST['selected_year'])) {
    $selectedYear = $_POST['selected_year'];
    ?>
    <script>alert(<?php=$selectedYear?>)</script><?php
    // Directory path for the selected year
    $yearPath = '../cadet_achievements/'.$selectedYear;

    // Check if the selected year directory exists
    if (is_dir($yearPath)) {
        // Create a ZIP file
        $zip = new ZipArchive();
        $zipFileName = 'cadet_achievements_' . $selectedYear . '.zip';
        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($yearPath), RecursiveIteratorIterator::LEAVES_ONLY);

            // Add all files in the selected year directory to the ZIP file
            foreach ($files as $name => $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($yearPath) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }
            $zip->close();

            // Set headers for ZIP file download
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . $zipFileName . '"');
            header('Content-Length: ' . filesize($zipFileName));
            readfile($zipFileName);

            // Delete the ZIP file after download (optional)
            unlink($zipFileName);
            exit();
        } else {
            echo "Failed to create ZIP file.";
        }
    } else {
        echo "No data found for the selected year.";
    }
} else {
    // Handle invalid or missing parameters
    echo "Invalid request or missing parameters.";
}
?>
