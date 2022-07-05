<?php
function uploadImage($directory,$file)
{
    $year = now()->year;
    $month = now()->month;
    $dir = "$directory/$year/$month";
    $name = $file->getClientOriginalName();
    $file->storeAs($dir,$name);
    return "$dir/$name";
}

function updateImage($directory,$file,$oldImage){

    $year = now()->year;
    $month = now()->month;
    $dir = "$directory/$year/$month";
    $name = $file->getClientOriginalName();
    if ($oldImage){
        unlink('storage'.'/'.$oldImage);
        $file->storeAs($dir,$name);
    }
    $file->storeAs($dir,$name);
    return "$dir/$name";

}
?>
