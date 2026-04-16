$map = @{
    "sc_kimia_contact_page.html" = "contact.blade.php"
    "sc_kimia_information_center.html" = "info-center.blade.php"
    "sc_kimia_gallery_page.html" = "gallery.blade.php"
    "sc_kimia_login_page.html" = "login.blade.php"
    "sc_kimia_recruitment_page.html" = "recruitment.blade.php"
    "sc_kimia_profile_page.html" = "profile.blade.php"
    "science_club_hub_-_enhanced_universal_page.html" = "hub.blade.php"
    "sc_kimia_landing_page.html" = "landing.blade.php"
    "sc_kimia_member_directory.html" = "directory.blade.php"
    "sc_kimia_links_and_apps.html" = "links.blade.php"
}

$dir = "C:\laragon\www\study-club-v2\study-club-v2"
$outDir = "$dir\resources\views\pages"

foreach ($key in $map.Keys) {
    if (Test-Path "$dir\$key") {
        $content = Get-Content -Raw -Path "$dir\$key"
        
        # Regex to extract content between </nav> and <footer
        if ($content -match '(?si)</nav>\s*(.*?)\s*<footer\b') {
            $isolatedContent = $matches[1]
            $title = "SC Kimia"
            if ($content -match '(?si)<title>(.*?)</title>') {
                $title = $matches[1]
            }
            
            $bladeContent = "@extends('layouts.kimia')`n`n@section('title', '$title')`n`n@section('content')`n$isolatedContent`n@endsection"
            
            $outFile = "$outDir\" + $map[$key]
            Set-Content -Path $outFile -Value $bladeContent -Encoding UTF8
            Write-Host "Created $outFile"
            Remove-Item -Path "$dir\$key" -Force
        } else {
            Write-Host "Could not find </nav> and <footer in $key"
        }
    } else {
        Write-Host "File not found: $dir\$key"
    }
}
