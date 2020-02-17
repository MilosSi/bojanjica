<?php 

    #Podesavanje Aposlutne putanje
    DEFINE("BASE_URL",$_SERVER["DOCUMENT_ROOT"].'/');


    #Ostala Podesavanja
    DEFINE("ENV",BASE_URL."app/config/.env");


    #Podesavanja Pristupa
    DEFINE("SERVER",env("SERVER"));
    DEFINE("DATABASE",env("DBNAME"));
    DEFINE("USERNAME",env("USERNAME"));
    DEFINE("PASSWORD",env("PASSWORD"));
    

    function env($naziv)
    {
        $nizFile=file(ENV);
        $vrednost="";
        foreach($nizFile as $file)
        {
            $fileDel=explode("=",trim($file));
            if($fileDel[0]==$naziv)
            {
                $vrednost=$fileDel[1];
            }
        }
        return $vrednost;
    }
   

?>