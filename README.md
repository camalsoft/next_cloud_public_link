# next_cloud_public_link
Generation of public links using directory listing.

1. Prepare the file `listing.txt` and save it in the directory.
2. Enter the settings into the file script.php:

    `$username`
    
    `$password`
    
    `$domain` *# example.com*
    
    `$basepath='';` *# Relative path. Root = root of the current user*
    
3. Run script on bash (`php script.php`)
4. After finishing, get the file `out.csv`
