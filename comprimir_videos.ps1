# Carpeta donde están los videos
$ruta = "C:\xampp\htdocs\superman\assets\video"

# Cambia a esa carpeta
Set-Location $ruta

# Comprimir todos los MP4
foreach ($f in Get-ChildItem *.mp4) {
    $nombreTemp = "$($f.BaseName)_temp.mp4"
    ffmpeg -y -i $f.FullName -vcodec libx264 -crf 28 -preset veryfast $nombreTemp
    Remove-Item $f.FullName
    Rename-Item $nombreTemp $f.Name
    Write-Host "✅ Comprimido: $($f.Name)"
}
