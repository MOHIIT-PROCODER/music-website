$basePath = "d:\music website\music-platform"
$emptyFiles = Get-ChildItem -Path $basePath -Recurse -File | Where-Object { $_.Length -le 100 }

foreach ($file in $emptyFiles) {
    $path = $file.FullName
    $relPath = $path.Substring($basePath.Length + 1).Replace('\', '/')
    $ext = $file.Extension
    $name = $file.Name
    $base = $file.BaseName
    
    $content = ""
    
    if ($ext -eq ".php") {
        if ($relPath -match "^api/") {
            $content = "<?php`n// API Endpoint: $relPath`nheader('Content-Type: application/json');`necho json_encode(['status' => 'success', 'message' => 'Not implemented yet']);`n"
        } elseif ($relPath -match "^components/" -or $relPath -match "-components/") {
            $content = "<?php`n// Component: $relPath`n?>`n<div class=""component-$base"">`n  <!-- $name placeholder -->`n</div>`n"
        } elseif ($relPath -match "^config/" -or $relPath -match "^core/" -or $relPath -match "^cron/") {
            $content = "<?php`n// Core/Config/Cron: $relPath`n"
        } else {
            # Determine relative path to root for includes
            $depth = ($relPath -split '/').Count - 1
            $up = ""
            if ($depth -gt 0) {
                for ($i = 0; $i -lt $depth; $i++) { $up += "../" }
            } else {
                $up = "./"
            }
            $content = "<?php`n// Page: $relPath`ninclude_once __DIR__ . '/" + $up + "components/layout/head.php';`n?>`n<main class=""page-wrapper"">`n  <div class=""container section"">`n    <h1 class=""heading-1"">$base</h1>`n    <p class=""text-muted"">This page ($relPath) is a work in progress...</p>`n  </div>`n</main>`n"
        }
    } elseif ($ext -eq ".js") {
        $content = "/**`n * Script: $relPath`n */`nconsole.log('$name loaded');`n"
    } elseif ($ext -eq ".css") {
        $content = "/* Stylesheet: $relPath */`n"
    } elseif ($ext -eq ".sql") {
        $content = "-- SQL File: $relPath`n"
    } else {
        $content = "<!-- Placeholder for $relPath -->`n"
    }
    
    Set-Content -Path $path -Value $content -Encoding UTF8
}
Write-Host "Filled $($emptyFiles.Count) empty files."
