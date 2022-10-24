<?php
	 class User{
		
		private $UserID="";
		private $Benutzername="";
		private $Passwort="";
        private $FavoritenRezepte="";

        public function __construct($UserID, $Benutzername, $Passwort, $FavoritenRezepte)
        {
            $this->UserID = $UserID;
            $this->Benutzername = $Benutzername;
            $this->Passwort = $Passwort;
            $this->FavoritenRezepte = $FavoritenRezepte;
        }
         public function getUserID()
         {
             return $this->UserID;
         }
         public function getBenutzername()
         {
             return $this->Benutzername;
         }
         public function setBenutzername($Benutzername)
         {
             $this->Benutzername = $Benutzername;
         }
         public function getPasswort()
         {
             return $this->Passwort;
         }
         public function setPasswort($Passwort)
         {
             $this->Passwort = $Passwort;
         }
         public function getFavoritenRezepte()
         {
             return $this->FavoritenRezepte;
         }
         public function setFavoritenRezepte($FavoritenRezepte)
         {
             $this->FavoritenRezepte = $FavoritenRezepte;
         }
     }